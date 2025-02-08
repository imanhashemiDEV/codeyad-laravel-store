<?php

namespace App\Http\Requests\ApiRequests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseApiRequest extends FormRequest
{
     protected function failedValidation(Validator $validator)
     {
         throw new HttpResponseException(
             response()->json([
                 'result' => false,
                 'message' => $validator->errors()->first(),
                 'data' => []
             ],\Illuminate\Http\Response::HTTP_UNPROCESSABLE_ENTITY)
         );
     }
}
