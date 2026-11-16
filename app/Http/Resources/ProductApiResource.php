<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductApiResource extends JsonResource
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
            'name' => $this->name,
            'e_name' => $this->e_name,
            'slug' => $this->slug,
            'price' => $this->price,
            'discount' => $this->discount,
            'final_price' => $this->price - (($this->price * $this->discount) / 100),
            'count' => $this->count,
            'max_sell' => $this->max_sell,
            'viewed' => $this->viewed,
            'sold' => $this->sold,
            'status' => $this->status,
            'image' => $this->image,
            'image_url' => $this->image ? url('images/products/'.$this->image) : null,
            'description' => $this->description,
            'category' => new CategoryApiResource($this->whenLoaded('category')),
            'brand' => new BrandApiResource($this->whenLoaded('brand')),
            'colors' => ColorApiResource::collection($this->whenLoaded('colors')),
            'guaranties' => GuarantyApiResource::collection($this->whenLoaded('guaranties')),
            'properties' => ProductPropertyApiResource::collection($this->whenLoaded('productProperties')),
            'galleries' => $this->whenLoaded('galleries', fn () => $this->galleries->map(fn ($gallery) => [
                'id' => $gallery->id,
                'name' => $gallery->name,
                'url' => url('images/products/'.$gallery->name),
            ])),
            'prices' => ProductPriceApiResource::collection($this->whenLoaded('productPrices')),
        ];
    }
}
