<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Rules\PersianPhoneRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
class checkResetPasswordByMobileRequest extends FormRequest
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
            'code' => ['required', 'string', 'min:5'],
            'mobile' => ['required', 'string',new PersianPhoneRule(),  'max:11'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }
}
