<?php


use App\Livewire\Admin\Brands\BrandList;
use App\Livewire\Admin\Categories\CategoryList;
use App\Livewire\Admin\Categories\TrashedCategoryList;
use App\Livewire\Admin\Panel;
use App\Livewire\Admin\Users\UserList;
use Illuminate\Support\Facades\Route;

Route::get('/', Panel::class)->name('panel');

//--- users ---//
Route::get('/users', UserList::class)->name('admin.users.list');

//--- categories ---//
Route::get('/categories', CategoryList::class)->name('admin.categories.list');
Route::get('/trashed_categories', TrashedCategoryList::class)->name('admin.trashed_categories.list');

//--- brands ---//
Route::get('/brands', BrandList::class)->name('admin.brands.list');
