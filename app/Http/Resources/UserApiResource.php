<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserApiResource extends JsonResource
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
            'email' => $this->email,
            'mobile' => $this->mobile,
            'image' => $this->image,
            'mobile_verified_at' => $this->mobile_verified_at,
            'email_verified_at' => $this->email_verified_at,
            //            'addresses'=> UserAddressApiResource::collection($this->addresses)
        ];
    }
}
