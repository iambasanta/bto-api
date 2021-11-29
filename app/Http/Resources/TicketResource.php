<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'event'=> new EventResource($this->event),
            'ticket_count'=>$this->ticket_count,
            'created_at'=>$this->created_at->format('d M,Y')
        ];
    }
}
