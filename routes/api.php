<?php

use App\Http\Controllers\Api\V1\AuthApiController;
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

//    Route::get('/users',[UserApiController::class,'index']);
//    Route::post('/users',[UserApiController::class,'store']);
//    Route::get('/users/{id}',[UserApiController::class,'show']);
//    Route::put('/users/{id}',[UserApiController::class,'update']);
//    Route::delete('/users/{id}',[UserApiController::class,'destroy']);

    Route::post('/register',[AuthApiController::class, 'register']);
    Route::post('/login',[AuthApiController::class, 'login']);
});


Route::prefix('/v1')->middleware('auth:sanctum')->group(function(){
    Route::post('/get_user',[AuthApiController::class, 'getUser'])->middleware(['permission:ویرایش محصول']);
    Route::delete('/delete_user',[AuthApiController::class, 'deleteUser']);
});
