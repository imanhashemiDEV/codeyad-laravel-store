<?php

namespace App\Http\Requests\ApiRequests;

use Illuminate\Validation\Rule;

class UpdateAddressApiRequest extends BaseApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'province_id' => 'sometimes|required|integer|exists:provinces,id',
            'city_id' => [
                'sometimes',
                'required',
                'integer',
                Rule::exists('cities', 'id')
                    ->where('province_id', $this->input('province_id'))
                    ->whereNull('deleted_at'),
            ],
            'name' => 'sometimes|nullable|string|max:255',
            'mobile' => 'sometimes|nullable|string|max:20',
            'address' => 'sometimes|required|string',
        ];
    }
}
