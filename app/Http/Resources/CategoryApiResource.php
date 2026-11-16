<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryApiResource extends JsonResource
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
            'slug' => $this->slug,
            'image' => $this->image,
            'image_url' => $this->image ? url('images/categories/'.$this->image) : null,
            'status' => $this->status,
            'parent_id' => $this->parent_id,
            'children' => CategoryApiResource::collection($this->whenLoaded('childCategory')),
            'parent' => new CategoryApiResource($this->whenLoaded('parentCategory')),
        ];
    }
}
