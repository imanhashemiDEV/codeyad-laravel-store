<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Batchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\Middleware\SkipIfBatchCancelled;

class EmailToAllUsersJob implements ShouldQueue
{
    use Queueable,Batchable;

    /**
     * Create a new job instance.
     */
    public function __construct(public User $user)
    {
       // $this->onQueue('send-email');
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
        sleep(2);
    }
}
