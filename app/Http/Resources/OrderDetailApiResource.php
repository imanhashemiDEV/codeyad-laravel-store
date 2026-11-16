<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailApiResource extends JsonResource
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
            'product' => new ProductApiResource($this->whenLoaded('product')),
            'color' => new ColorApiResource($this->whenLoaded('color')),
            'guaranty' => new GuarantyApiResource($this->whenLoaded('guaranty')),
            'main_price' => $this->main_price,
            'price' => $this->price,
            'discount' => $this->discount,
            'count' => $this->count,
            'status' => $this->status,
        ];
    }
}
