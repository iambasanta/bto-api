<?php

namespace App\Providers;

use App\Models\Payment;
use App\Providers\TicketPayment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoreTicketInformation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\TicketPayment  $event
     * @return void
     */
    public function handle(TicketPayment $event)
    {
        $laravel_event = $event;

        $bto_event = $event->event;

        $bto_event->decrement('total_tickets',$laravel_event->ticket_count);

        $bto_event->tickets()->create([
            'user_id'=>auth()->id(),
            'ticket_count'=>$laravel_event->ticket_count
        ]);

        $bto_event->payments()->save(
            new Payment([
                'user_id'=>auth()->id(),
                'payment_id'=>$laravel_event->payment_id,
                'amount'=>$laravel_event->amount,
            ])
        );
    }
}
