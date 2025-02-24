<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class SendVerificationEmailJob implements ShouldQueue
{
    use Queueable;
   // public $user;

    //public $tries =3;
   // public $backoff=[60,600,6000];
    public $backoff=3600;
    public $maxException = 5;

//    public function tries(): int{
//        return 5;
//    }

//    public function backoff(): int
//    {
//        return 3600;
//    }

    /**
     * Create a new job instance.
     */
    public function __construct(public User $user)
    {
      // $this->user = $user;
        $this->onQueue('sendEmailVerification');
    }

    public function retryUntil(): \Illuminate\Support\Carbon
    {
        return  now()->addHours(10);
    }

    public function failed(\Throwable $exception)
    {
       Log::error($exception->getMessage());
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->user->sendEmailVerificationNotification();
    }
}
