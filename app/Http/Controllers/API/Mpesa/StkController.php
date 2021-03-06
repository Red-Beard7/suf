<?php

namespace App\Http\Controllers\API\Mpesa;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStkRequest;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class StkController extends Controller
{
    /**
     * @param StoreStkRequest $request
     * @return JsonResponse|RedirectResponse
     */
    public function initiatePush(StoreStkRequest $request): JsonResponse|RedirectResponse {
        $data = $request->all();

        $phone = "254" . (Str::length($data['phone']) > 9 ? Str::substr($data['phone'], -9) : $data['phone']);
        $amount = 1;    //currencyToFloat(session('grandTotal'))
        $reference = 'SUF-PAYMENT';
        $description = 'Payment made to SUF Web store';

        try {
            $stkRequest = mpesa_request($phone, $amount, $reference, $description);

            return redirect()->route('mpesa')->with('stk', ['checkout_request_id' => $stkRequest->CheckoutRequestID]);
        } catch (Exception $exception) {
            $stkRequest = ['ResponseCode' => 900, 'ResponseDescription' => 'Invalid request', 'extra' => $exception->getMessage()];
        }

        Log::debug($stkRequest['extra']);
        return back()->with('alert', alert('info', 'Sorry!', 'Unable to process request at this time, please try again shortly.', 7));
    }

    /**
     * @param $reference
     * @return JsonResponse
     */
    public function stkStatus($reference): JsonResponse {
        $stkStatus = mpesa_validate($reference);
        $url = "";

        if(property_exists($stkStatus, 'errorCode')) {
            $status = 'processing';
            $message = 'Waiting for customer response...';
        } else {
            $status = 'processed';
            $resultCode = (int)$stkStatus->ResultCode;

            if($resultCode === 0) {
                $message = 'Payment Successful!';
                $icon = 'success';
                $url = route('thank-you');
            } else if($resultCode === 1032) {
                $message = 'Payment Cancelled';
                $icon = 'info';
            } else if($resultCode === 1) {
                $message = 'Your M-PESA balance is insufficient.';
                $icon = 'info';
            } else {
                $message = 'Something did not go right somewhere.';
                $icon = 'warning';
            }

            return response()->json(['status' => $status, 'message' => $message, 'icon' => $icon,'url' => $url]);
        }

        return response()->json(['status' => $status, 'message' => $message]);
    }
}
