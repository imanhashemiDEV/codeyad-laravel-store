<?php

use App\Http\Controllers\Api\V1\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');


//Route::get('/user', function (Request $request) {
//    return response()->json([
//        'result'=>true,
//        'message'=>"user found",
//        'data'=> \App\Models\User::query()->get()
//    ]);
//});

//Route::apiResource('/users', \App\Http\Controllers\Api\V1\UserApiController::class)->only(['store', 'update', 'destroy']);

//Route::apiResource('/users', \App\Http\Controllers\Api\V1\UserApiController::class)->except(['show']);



Route::post('/foo', [UserApiController::class, 'foo']);


Route::prefix('/v1')->group(function(){
    Route::apiResource('/users', UserApiController::class);
});
