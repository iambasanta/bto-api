<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventController extends Controller
{
    public function allEvents(){
        $events = Event::orderBy('id','desc')->get();
        return EventResource::collection($events);
    }

    public function index(){
        $events = Event::orderBy('id','desc')->published()->get();
        return EventResource::collection($events);
    }

    public function store(EventRequest $request){
        $event = Event::create($request->except('image'));
        $event->attachImage($request->image);
        return response($event,Response::HTTP_CREATED);
    }

    public function show(Event $event){
        return new EventResource($event);
    }

    public function update(Request $request, Event $event){
        $event->update($request->except('image'));
        return new EventResource($event);
    }

    public function destroy(Event $event){
        $event->delete();
        return response(Response::HTTP_NO_CONTENT);
    }
}
