<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserApiRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()->paginate(3);

        return response()->json([
            'result' => true,
            'message' => "user list",
            'data' => $users
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserApiRequest $request)
    {

        $user = User::query()->create([
            'name'=>$request->input('name'),
            'email'=>$request->get('email'),
            'password'=>Hash::make($request->password),
        ]);
        return response()->json([
            'result' => true,
            'message' => "user is created",
            'data' => $user
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::query()->findOrFail($id);
        return response()->json([
            'result' => true,
            'message' => "user is found",
            'data' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::query()->findOrFail($id);
        $user->update([
            'name'=>$request->input('name') ?? $user->name,
            'email'=>$request->get('email') ?? $user->email,
            'password'=>Hash::make($request->password) ?? $user->password,
        ]);
        return response()->json([
            'result' => true,
            'message' => "user is updated",
            'data' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::query()->findOrFail($id)->delete();
        return response()->json([
            'result' => true,
            'message' => "user is deleted",
            'data' => []
        ]);
    }

    public function foo()
    {
        return response()->json([
            'result' => true,
            'message' => "user found",
            'data' => 'foo'
        ],401);
    }
}
