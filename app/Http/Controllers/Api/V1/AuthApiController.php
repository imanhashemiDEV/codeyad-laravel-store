<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiRequests\CreateUserApiRequest;
use App\Http\Resources\UserApiResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    // 2|EONrwUrY39G34FcL0zQg2JUsoSVBWYFIJqXwBqNQ6c24c141

    public function register(CreateUserApiRequest $request): JsonResponse
    {
        $user = User::query()->create([
            'name'=>$request->input('name'),
            'email'=>$request->get('email'),
            'password'=>Hash::make($request->password),
        ]);
        return response()->json([
            'result' => true,
            'message' => "user is created",
            'data' => [
                'user'=> new UserApiResource($user),
                'token'=> $user->createToken($request->header('User-Agent'))->plainTextToken,
            ]
        ]);
    }
}
