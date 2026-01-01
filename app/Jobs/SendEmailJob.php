<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Queue\Middleware\RateLimited;

class SendEmailJob implements ShouldQueue
{
    use Queueable;

     // Number of automatic attempts before sending to failed_jobs
    public $tries = 3;

    // Wait time (in seconds) between retries if it fails
    public $backoff = 10;
    protected $user;

    /**
     * Create a new job instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        

        Mail::to($this->user)->queue(new OrderShipped());
        
    }
    public function middleware()
    {
        return [
            new RateLimited('email-sender'),
        ];
    }
}
