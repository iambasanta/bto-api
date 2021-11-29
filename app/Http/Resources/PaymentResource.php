<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'amount'=>$this->amount/100,
            'payment_id'=>$this->payment_id,
            'product'=>  new EventResource($this->product),
            'created_at'=>$this->created_at->format('d M, Y')
        ];
    }
}
