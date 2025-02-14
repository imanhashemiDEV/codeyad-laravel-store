<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiRequests\CreateUserApiRequest;
use App\Http\Resources\UserApiResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    // 5|BRILvQtal2VRv6cibTVtBoocxam46C9s5S5ibZU23ec49410
    // hashemi.iman@gmail.com
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

    public function login(Request $request): JsonResponse
    {
        if( auth()->attempt($request->only('email', 'password'))){
            $user = User::query()->where('email',$request->get('email'))->first();
            return response()->json([
                'result' => true,
                'message' => "user is created",
                'data' => [
                    'user'=> new UserApiResource($user),
                    'token'=> $user->createToken($request->header('User-Agent'))->plainTextToken,
                ]
            ]);
        }

        return response()->json([
            'result' => false,
            'message' => "user not found",
            'data' => []
        ]);

    }

    public function getUser(): JsonResponse
    {
        $user = auth()->user();
        //Gate::authorize('ویرایش محصول',$user);
        return response()->json([
            'result' => true,
            'message' => "user is founded",
            'data' => [
                'user'=> new UserApiResource($user),
            ]
        ]);
    }

    public function deleteUser()
    {
        $user = auth()->user();
        //$user->tokens()->delete(); // delete all tokens
        $user->currentAccessToken()->delete();

        return response()->json([
            'result' => true,
            'message' => "user token is deleted",
            'data' => []
        ]);
    }
}
