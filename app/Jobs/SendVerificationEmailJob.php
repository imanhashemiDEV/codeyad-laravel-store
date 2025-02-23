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

    public $tries =3;
    public $backoff=[60,600,6000];

    /**
     * Create a new job instance.
     */
    public function __construct(public User $user)
    {
      // $this->user = $user;
        $this->onQueue('sendEmailVerification');
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->user->sendEmailVerificationNotification();
    }
}
