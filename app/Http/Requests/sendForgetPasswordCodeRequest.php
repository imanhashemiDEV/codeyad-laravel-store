<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Rules\PersianPhoneRule;
use Illuminate\Foundation\Http\FormRequest;

class sendForgetPasswordCodeRequest extends FormRequest
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
            'mobile'=>['required', 'string',new PersianPhoneRule(),'max:11']
        ];
    }
}
