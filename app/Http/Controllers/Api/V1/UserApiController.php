<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
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
            'message' => "user found",
            'data' => $users
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::query()->create([
            'name'=>$request->input('name'),
            'mobile'=>$request->get('mobile'),
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
        return response()->json([
            'result' => true,
            'message' => "user found",
            'data' => 'show'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return response()->json([
            'result' => true,
            'message' => "user found",
            'data' => 'update'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response()->json([
            'result' => true,
            'message' => "user found",
            'data' => 'destroy'
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
