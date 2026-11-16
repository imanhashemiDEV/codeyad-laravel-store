<?php

use App\Http\Controllers\Api\V1\AddressApiController;
use App\Http\Controllers\Api\V1\AuthApiController;
use App\Http\Controllers\Api\V1\BrandApiController;
use App\Http\Controllers\Api\V1\CartApiController;
use App\Http\Controllers\Api\V1\CategoryApiController;
use App\Http\Controllers\Api\V1\ColorApiController;
use App\Http\Controllers\Api\V1\GuarantyApiController;
use App\Http\Controllers\Api\V1\LocationApiController;
use App\Http\Controllers\Api\V1\OrderApiController;
use App\Http\Controllers\Api\V1\ProductApiController;
use App\Http\Controllers\Api\V1\UserApiController;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function () {
    // --- auth ---//
    Route::post('/register', [AuthApiController::class, 'register']);
    Route::post('/login', [AuthApiController::class, 'login']);

    // --- catalog ---//
    Route::get('/products', [ProductApiController::class, 'index']);
    Route::get('/products/{product}', [ProductApiController::class, 'show']);
    Route::get('/categories', [CategoryApiController::class, 'index']);
    Route::get('/brands', [BrandApiController::class, 'index']);
    Route::get('/colors', [ColorApiController::class, 'index']);
    Route::get('/guaranties', [GuarantyApiController::class, 'index']);

    // --- locations ---//
    Route::get('/provinces', [LocationApiController::class, 'provinces']);
    Route::get('/provinces/{province}/cities', [LocationApiController::class, 'cities']);

    Route::apiResource('/users', UserApiController::class);
});

Route::prefix('/v1')->middleware('auth:sanctum')->group(function () {
    // --- auth ---//
    Route::get('/profile', [AuthApiController::class, 'profile']);
    Route::put('/profile', [AuthApiController::class, 'updateProfile']);
    Route::post('/logout', [AuthApiController::class, 'logout']);
    Route::post('/get_user', [AuthApiController::class, 'getUser'])->middleware(['permission:ویرایش محصول']);
    Route::delete('/delete_user', [AuthApiController::class, 'deleteUser']);

    // --- cart ---//
    Route::get('/cart', [CartApiController::class, 'index']);
    Route::post('/cart', [CartApiController::class, 'store']);
    Route::delete('/cart', [CartApiController::class, 'clear']);
    Route::put('/cart/{cart}', [CartApiController::class, 'update']);
    Route::patch('/cart/{cart}', [CartApiController::class, 'update']);
    Route::delete('/cart/{cart}', [CartApiController::class, 'destroy']);

    // --- addresses ---//
    Route::apiResource('/addresses', AddressApiController::class);

    // --- orders ---//
    Route::get('/orders', [OrderApiController::class, 'index']);
    Route::post('/orders', [OrderApiController::class, 'store']);
    Route::get('/orders/{order}', [OrderApiController::class, 'show']);
    Route::post('/orders/{order}/pay', [OrderApiController::class, 'pay']);
});

Route::post('/foo', [UserApiController::class, 'foo']);
