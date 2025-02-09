<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserListApiResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'meta'=>[
                'total'=>$this->total(),
                'per_page'=>$this->perPage(),
                'last_page'=>$this->lastPage(),
                'current_page'=>$this->currentPage(),
                'first_item'=>$this->firstItem(),
                'last_item'=>$this->lastItem(),
            ],
            'links'=>[
                'first'=>$this->url(1),
                'last'=>$this->url($this->lastPage()),
                'prev'=>$this->url($this->currentPage() - 1),
                'next'=>$this->url($this->currentPage() + 1),
            ],
            'users'=> UserApiResource::collection($this->collection)
        ];
    }
}
