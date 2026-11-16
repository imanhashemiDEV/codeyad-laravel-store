<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderApiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'order_code' => $this->order_code,
            'status' => $this->status,
            'payment_type' => $this->payment_type,
            'transaction_id' => $this->transaction_id,
            'total_price' => $this->total_price,
            'total_discount' => $this->total_discount,
            'payable_price' => $this->total_price - $this->total_discount,
            'address' => new AddressApiResource($this->whenLoaded('address')),
            'details' => OrderDetailApiResource::collection($this->whenLoaded('orderDetails')),
            'created_at' => $this->created_at,
        ];
    }
}
