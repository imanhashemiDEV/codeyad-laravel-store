<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Api\V1\UserApiController;
use App\Http\Controllers\Controller;
use App\Jobs\EmailToAllUsersJob;
use App\Jobs\NotificationToAllUsersJob;
use App\Jobs\SMSToAllUsersJob;
use App\Models\User;
use Illuminate\Bus\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Log;
use Throwable;

class NotificationUsersController extends Controller
{
    public function notificationToAllUsers()
    {
        $users = User::query()->get();
        $jobs =[];
        foreach ($users as $user) {
            $jobs[] = new  EmailToAllUsersJob($user);
            $jobs[]=new SMSToAllUsersJob($user);
        }

//        Bus::chain([
//            ...$jobs,
//            function () {
//                Log::info('jobs done');
//            }
//        ])->catch(function (Throwable $e) {
//            Log::error($e->getMessage());
//        })->onQueue('chain-notification')->dispatch();


        $batch = Bus::batch([
            ...$jobs,
            function () {
                Log::info('jobs done');
            }
        ])->before(function (Batch $batch) {
            // The batch has been created but no jobs have been added...
        })->progress(function (Batch $batch) {
            // A single job has completed successfully...
        })->then(function (Batch $batch) {
            // All jobs completed successfully...
        })->catch(function (Batch $batch, Throwable $e) {
            // First batch job failure detected...
        })->finally(function (Batch $batch) {
            // The batch has finished executing...
        })->onQueue('batch-notification')
            ->name('new_year')
            ->allowFailures()
            ->dispatch();

      // $campaign = Bus::findBatch("9e588744-409f-4cb0-b6e8-900387259229");
       //dd($campaign->progress());
      // dd($campaign->cancel());
    }
}
