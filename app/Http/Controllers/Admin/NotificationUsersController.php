<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Api\V1\UserApiController;
use App\Http\Controllers\Controller;
use App\Jobs\EmailToAllUsersJob;
use App\Jobs\NotificationToAllUsersJob;
use App\Jobs\SMSToAllUsersJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Log;
use Throwable;

class NotificationUsersController extends Controller
{
    public function notificationToAllUsers(): void
    {
        $users = User::query()->get();
        foreach ($users as $user) {
            Bus::chain([
              new  EmailToAllUsersJob($user),
              new SMSToAllUsersJob($user),
                function () {
                    Log::info('jobs done');
                }
            ])->catch(function (Throwable $e) {
                Log::error($e->getMessage());
            })->onQueue('chain-notification')->dispatch();
        }
    }
}
