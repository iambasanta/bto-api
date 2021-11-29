<?php

namespace App\Providers;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TicketPayment
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $event;
    public $ticket_count;
    public $amount;
    public $payment_id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($event,$ticket_count,$amount,$payment_id)
    {
        $this->event = $event;
        $this->ticket_count = $ticket_count;
        $this->amount = $amount;
        $this->payment_id = $payment_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
