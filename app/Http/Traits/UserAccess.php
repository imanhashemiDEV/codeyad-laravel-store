<?php

namespace App\Http\Traits;

trait UserAccess
{

    public function isSuperAdmin(): bool
    {
        $user = auth()->user();
        return $user->id === 1 || $user->is_admin || $user->hasRole("ادمین");
    }

    public function isUserAdmin(): bool
    {
        $user = auth()->user();
        return $this->isSuperAdmin() || $user->hasRole('مدیر کل');
    }

}
