<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketResource;

class TicketController extends Controller
{
    public function index(){
        $tickets = auth()->user()->tickets;
        return TicketResource::collection($tickets);
    }
}
