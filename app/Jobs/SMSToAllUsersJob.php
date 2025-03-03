<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Batchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\Middleware\SkipIfBatchCancelled;
use Illuminate\Support\Facades\Log;

class SMSToAllUsersJob implements ShouldQueue
{
    use Queueable, Batchable;
     //public $tries=3;
    /**
     * Create a new job instance.
     */
    public function __construct(public User $user)
    {
       // $this->onQueue('send-sms');
    }

    public function middleware()
    {
        return [
            new SkipIfBatchCancelled()
        ];
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
//        if($this->batch()->cancelled())
//            return;

        sleep(2);
//        try {
//            throw new \Exception('error');
//        }catch (\Exception $e){
//             if ($this->attempts() < 3){
//                 $this->release(60);
//             }else{
//                 Log::error($e->getMessage());
//                 $this->delete();
//             }
//        }
    }
}
