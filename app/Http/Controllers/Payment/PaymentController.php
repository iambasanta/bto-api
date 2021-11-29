<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Providers\TicketPayment;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentController extends Controller
{
    public function payment(Request $request,Event $event){
        $amount = $event->ticket_price * 100;

        $payment = auth()->user()->charge($amount,$request->paymentMethod['id']);

        event(new TicketPayment($event, $request->ticket_count, $amount, $payment->id));

        return response('Payment Successfull !',Response::HTTP_OK);
    }
}
