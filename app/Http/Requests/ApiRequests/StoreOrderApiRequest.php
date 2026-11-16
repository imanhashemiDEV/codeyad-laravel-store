<?php

namespace App\Http\Requests\ApiRequests;

use App\Enums\PaymentType;
use Illuminate\Validation\Rule;

class StoreOrderApiRequest extends BaseApiRequest
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
            'address_id' => [
                'required',
                'integer',
                Rule::exists('addresses', 'id')
                    ->where('user_id', $this->user()->id)
                    ->whereNull('deleted_at'),
            ],
            'payment_type' => ['required', Rule::enum(PaymentType::class)],
        ];
    }
}
