<?php

namespace App\Misc\Overrides\Mpesa\C2B;

use App\Events\StkRequested;
use App\Exceptions\MpesaException;
use App\Models\StkRequest;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;
use SmoDav\Mpesa\Repositories\Endpoint;
use SmoDav\Mpesa\Traits\UsesCore;
use App\Misc\Overrides\Mpesa\Traits\Validates;


class STK
{
    use UsesCore, Validates;

    const CUSTOMER_BUYGOODS_ONLINE = 'CustomerBuyGoodsOnline';
    const CUSTOMER_PAYBILL_ONLINE = 'CustomerPayBillOnline';
    const VALID_COMMANDS = [
        self::CUSTOMER_BUYGOODS_ONLINE,
        self::CUSTOMER_PAYBILL_ONLINE,
    ];

    /**
     * The mobile number
     *
     * @var string
     */
    protected $number;

    /**
     * The amount to request
     *
     * @var int
     */
    protected $amount;

    /**
     * The transaction reference
     *
     * @var string
     */
    protected $reference;

    /**
     * The transaction description
     *
     * @var string
     */
    protected $description;

    /**
     * The MPesa account to be used.
     *
     * @var string
     */
    protected $account = null;

    /**
     * The transaction command to be used.
     *
     * @var string
     */
    protected $command = self::CUSTOMER_PAYBILL_ONLINE;

    /**
     * The MPesa callback URL to be used for the request.
     *
     * @var string
     */
    protected $callback = null;

    /**
     * Set the callback on completion.
     *
     * @param string $callback
     *
     * @return self
     */
    public function setCallback(string $callback)
    {
        $this->callback = $callback;

        return $this;
    }

    /**
     * Set the account to be used.
     *
     * @param string $account
     *
     * @return self
     */
    public function usingAccount($account)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Set the request amount to be deducted.
     *
     * @param int $amount
     *
     * @return self
     *
     * @throws InvalidArgumentException
     */
    public function request($amount)
    {
        $this->validateAmount($amount);

        $this->amount = $amount;

        return $this;
    }

    /**
     * Set the Mobile Subscriber Number to deduct the amount from.
     * Must be in format 2547XXXXXXXX.
     *
     * @param int $number
     *
     * @return self
     *
     * @throws InvalidArgumentException
     */
    public function from($number)
    {
        $this->validateNumber($number);

        $this->number = $number;

        return $this;
    }

    /**
     * Set the product reference number to bill the account.
     *
     * @param int    $reference
     * @param string $description
     *
     * @return self
     */
    public function usingReference($reference, $description)
    {
        $this->reference   = $reference;
        $this->description = $description;

        return $this;
    }

    /**
     * Set the unique command for this transaction type.
     *
     * @param string $command
     *
     * @return self
     *
     * @throws InvalidArgumentException
     */
    public function setCommand($command)
    {
        if (! in_array($command, self::VALID_COMMANDS)) {
            throw new InvalidArgumentException('Invalid command sent');
        }

        $this->command = $command;

        return $this;
    }

    /**
     * Set the properties that require validation.
     *
     * @param string|null $amount
     * @param string|null $number
     * @param string|null $command
     *
     * @return void
     */
    private function set($amount, $number, $command)
    {
        $map = [
            'amount' => 'request',
            'number' => 'from',
            'command' => 'setCommand',
        ];

        foreach ($map as $var => $method) {
            if ($$var) {
                call_user_func([$this, $method], $$var);
            }
        }
    }

    /**
     * Prepare the STK Push request
     *
     * @param int|null    $amount
     * @param int|null $number
     * @param string|null $reference
     * @param string|null $description
     * @param string|null $account
     * @param string|null $command
     *
     * @return mixed
     */
    public function push($amount = null, int $number = null, string $reference = null, string $description = null, $account = null, $command = null): mixed {
        $this->set($amount, $number, $command);

        $this->core->useAccount($account ?: $this->account);
        $time = Carbon::now()->format('YmdHis');

        $payBill   = $this->core->configRepository()->getAccountKey('lnmo.paybill');
        $shortCode = $this->core->configRepository()->getAccountKey('lnmo.shortcode');
        $passkey   = $this->core->configRepository()->getAccountKey('lnmo.passkey');
        $callback  = $this->callback ? : $this->core->configRepository()->getAccountKey('lnmo.callback');

        $partyB  = $this->command == self::CUSTOMER_PAYBILL_ONLINE ? $shortCode : $payBill;

        $body = [
            'BusinessShortCode' => $shortCode,
            'Password'          => $this->password($shortCode, $passkey, $time),
            'Timestamp'         => $time,
            'TransactionType'   => $this->command,
            'Amount'            => $this->amount,
            'PartyA'            => $this->number,
            'PartyB'            => $partyB,
            'PhoneNumber'       => $number ?: $this->number,
            'CallBackURL'       => $callback,
            'AccountReference'  => $reference ?: $this->reference,
            'TransactionDesc'   => $description ?: $this->description,
        ];

        try {
            $response = $this->clientRequest(
                $body,
                $this->core->configRepository()->url(Endpoint::MPESA_LNMO)
            );

            $response = json_decode($response->getBody());

            return $this->saveStkRequest($body, (array)$response);
        } catch (RequestException $exception) {
            return json_decode($exception->getResponse()->getBody());
        } catch(MpesaException | Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param array $body
     * @param array $response
     * @return StkRequest|Model
     * @throws Exception
     * @throws MpesaException
     */
    private function saveStkRequest(array $body, array $response): Model|StkRequest {
        if ($response['ResponseCode'] == 0) {
            $incoming = [
                'phone' => $body['PartyA'],
                'amount' => $body['Amount'],
                'reference' => $body['AccountReference'],
                'description' => $body['TransactionDesc'],
                'merchant_request_id' => $response['MerchantRequestID'],
                'checkout_request_id' => $response['CheckoutRequestID'],
                'user_id' => @(Auth::id() ?: request('user_id')),
            ];

            $stk = DB::transaction(function() use ($incoming) {
                return StkRequest::create($incoming);
            });

            StkRequested::dispatch($stk, request());

            return $stk;
        }
        throw new MpesaException($response['ResponseDescription']);
    }

    /**
     * Validate an initialized transaction.
     *
     * @param string $checkoutRequestID
     *
     * @return json
     */
    public function validate($checkoutRequestID, $account = null)
    {
        $this->core->useAccount($account ?: $this->account);
        $time = Carbon::now()->format('YmdHis');

        $shortCode = $this->core->configRepository()->getAccountKey('lnmo.shortcode');
        $passkey   = $this->core->configRepository()->getAccountKey('lnmo.passkey');

        $body = [
            'BusinessShortCode' => $shortCode,
            'Password'          => $this->password($shortCode, $passkey, $time),
            'Timestamp'         => $time,
            'CheckoutRequestID' => $checkoutRequestID,
        ];

        try {
            $response = $this->clientRequest(
                $body,
                $this->core->configRepository()->url(Endpoint::MPESA_LNMO_VALIDATE)
            );

            return json_decode($response->getBody());
        } catch (RequestException $exception) {
            return json_decode($exception->getResponse()->getBody());
        }
    }
}
