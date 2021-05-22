<?php

namespace App\Events;

use App\Models\StkRequest;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

class StkRequested
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public StkRequest $stkRequest;
    public Request $request;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(StkRequest $stkRequest, Request $request)
    {
        $this->stkRequest = $stkRequest;
        $this->request = $request;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|PrivateChannel|array
     */
    public function broadcastOn(): Channel|PrivateChannel|array {
        return new PrivateChannel('channel-name');
    }
}
