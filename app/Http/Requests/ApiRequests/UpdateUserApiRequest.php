<?php

namespace App\Http\Requests\ApiRequests;

use Illuminate\Validation\Rule;

class UpdateUserApiRequest extends BaseApiRequest
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
            'name' => 'sometimes|required|string|max:255',
            'email' => [
                'sometimes',
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->user()->id),
            ],
            'mobile' => 'sometimes|nullable|string|max:20',
            'password' => 'sometimes|nullable|string|min:6',
        ];
    }
}
