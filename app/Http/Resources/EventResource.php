<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
            'name'=>$this->name,
            'slug'=>$this->slug,
            'description'=>$this->description,
            'image'=>asset(str_replace('public','storage',$this->image)),
            'address'=>$this->address,
            'ticket_price'=>$this->ticket_price,
            'total_tickets'=>$this->total_tickets,
            'published_at'=>$this->published_at,
            'date'=>$this->date,
        ];
    }
}
