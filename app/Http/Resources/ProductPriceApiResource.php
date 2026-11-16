<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductPriceApiResource extends JsonResource
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
            'main_price' => $this->main_price,
            'price' => $this->price,
            'discount' => $this->discount,
            'final_price' => $this->price - (($this->price * $this->discount) / 100),
            'count' => $this->count,
            'max_sell' => $this->max_sell,
            'sold' => $this->sold,
            'viewed' => $this->viewed,
            'status' => $this->status,
            'color' => new ColorApiResource($this->whenLoaded('color')),
            'guaranty' => new GuarantyApiResource($this->whenLoaded('guaranty')),
        ];
    }
}
