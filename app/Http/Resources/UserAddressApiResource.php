<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserAddressApiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
            'name'=>$this->name,
            'mobile'=>$this->mobile,
            'address'=>$this->address,
            'province_id'=>$this->province_id,
            'province'=>$this->province->name,
        ];
    }
}
