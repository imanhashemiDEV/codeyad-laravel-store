<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewYearNotificationJob;
use App\Models\User;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function newYearNotification()
    {
        $users = User::query()->get();
        foreach ($users->chunk(5) as $key=>$userGroup){
            foreach ($userGroup as $user){
                 NewYearNotificationJob::dispatch($user)->delay($key * 60);
            }
        }

    }
}
