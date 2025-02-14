<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
//        Permission::query()->with('roles')->each(function ($permission){
//            Gate::define($permission->name, function ($user) use ($permission){
//                foreach ($user->roles as $role){
//                    if($role->hasPermissionTo($permission)){
//                       return true;
//                    }
//                }
//            });
//        });
    }
}
