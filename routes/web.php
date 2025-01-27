<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Front\Cart;
use App\Livewire\Front\HomePage;
use App\Livewire\Front\Shipping;
use App\Livewire\Front\SingleProduct;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', HomePage::class)->name('home');
Route::get('/single_product/{product}', SingleProduct::class)->name('single.product');
Route::get('/user_cart', Cart::class)->name('user.cart');
Route::get('/shipping', Shipping::class)->name('shipping');
