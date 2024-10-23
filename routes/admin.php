<?php


use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Admin\Panel::class)->name('panel');
Route::get('/users', \App\Livewire\Admin\Users\UserList::class)->name('admin.users.list');
