<?php

namespace App\Http\Requests\ApiRequests;

class StoreCartApiRequest extends BaseApiRequest
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
            'product_id' => 'required|integer|exists:products,id',
            'color_id' => 'nullable|integer|exists:colors,id',
            'guaranty_id' => 'nullable|integer|exists:guaranties,id',
            'count' => 'required|integer|min:1',
        ];
    }
}
