<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'result' => true,
            'message' => "user found",
            'data' => 'index'
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json([
            'result' => true,
            'message' => "user found",
            'data' => 'store'
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
