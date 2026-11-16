<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartApiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $productPrice = $this->product?->productPrices
            ?->where('color_id', $this->color_id)
            ->where('guaranty_id', $this->guaranty_id)
            ->first();

        $price = $productPrice?->price ?? 0;
        $discount = $productPrice?->discount ?? 0;
        $finalPrice = $price - (($price * $discount) / 100);

        return [
            'id' => $this->id,
            'count' => $this->count,
            'product' => new ProductApiResource($this->whenLoaded('product')),
            'color' => new ColorApiResource($this->whenLoaded('color')),
            'guaranty' => new GuarantyApiResource($this->whenLoaded('guaranty')),
            'price' => $price,
            'discount' => $discount,
            'final_price' => $finalPrice,
            'total_price' => $price * $this->count,
            'total_discount' => (($price * $discount) / 100) * $this->count,
            'total_final_price' => $finalPrice * $this->count,
        ];
    }
}
