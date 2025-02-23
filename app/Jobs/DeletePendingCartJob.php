<?php

namespace App\Jobs;

use App\Models\Cart;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class DeletePendingCartJob implements ShouldQueue
{
    use Queueable;

    public $tries = 3;
    public $backoff = 3600 * 24 * 7;

    /**
     * Create a new job instance.
     */
    public function __construct(public Cart $cart)
    {
        $this->onQueue('deletePendingCart');
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        switch ($this->attempts()) {
            case 1:
                // send Email
                $this->release(now()->addDays(7));
                break;
            case 2:
                // send SMS
                $this->release(now()->addDays(7));
                break;
            case 3:
                $this->cart->delete();
                break;
        }
    }
}
