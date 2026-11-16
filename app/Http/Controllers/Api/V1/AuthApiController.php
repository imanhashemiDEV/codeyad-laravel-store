<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiRequests\CreateUserApiRequest;
use App\Http\Requests\ApiRequests\LoginApiRequest;
use App\Http\Requests\ApiRequests\UpdateUserApiRequest;
use App\Http\Resources\UserApiResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    // 5|BRILvQtal2VRv6cibTVtBoocxam46C9s5S5ibZU23ec49410
    // hashemi.iman@gmail.com
    public function register(CreateUserApiRequest $request): JsonResponse
    {
        $user = User::query()->create([
            'name' => $request->input('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'result' => true,
            'message' => 'user is created',
            'data' => [
                'user' => new UserApiResource($user),
                'token' => $user->createToken($request->header('User-Agent'))->plainTextToken,
            ],
        ]);
    }

    public function login(LoginApiRequest $request): JsonResponse
    {
        if (auth()->attempt($request->only('email', 'password'))) {
            $user = User::query()->where('email', $request->get('email'))->first();

            return response()->json([
                'result' => true,
                'message' => 'user is logged in',
                'data' => [
                    'user' => new UserApiResource($user),
                    'token' => $user->createToken($request->header('User-Agent'))->plainTextToken,
                ],
            ]);
        }

        return response()->json([
            'result' => false,
            'message' => 'email or password is incorrect',
            'data' => [],
        ], 401);
    }

    public function getUser(): JsonResponse
    {
        $user = auth()->user();

        return response()->json([
            'result' => true,
            'message' => 'user is founded',
            'data' => [
                'user' => new UserApiResource($user),
            ],
        ]);
    }

    public function profile(Request $request): JsonResponse
    {
        return response()->json([
            'result' => true,
            'message' => 'user profile',
            'data' => new UserApiResource($request->user()),
        ]);
    }

    public function updateProfile(UpdateUserApiRequest $request): JsonResponse
    {
        $user = $request->user();

        $data = $request->only(['name', 'email', 'mobile']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->input('password'));
        }

        $user->update($data);

        return response()->json([
            'result' => true,
            'message' => 'user profile updated',
            'data' => new UserApiResource($user),
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'result' => true,
            'message' => 'user logged out',
            'data' => [],
        ]);
    }

    public function deleteUser(): JsonResponse
    {
        $user = auth()->user();
        // $user->tokens()->delete(); // delete all tokens
        $user->currentAccessToken()->delete();

        return response()->json([
            'result' => true,
            'message' => 'user token is deleted',
            'data' => [],
        ]);
    }
}
