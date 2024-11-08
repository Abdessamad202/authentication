<?php

namespace App\Jobs;

use App\Models\User;
// use App\Mail\EmailChanging;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailChangeNotification;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailChanging implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    private $email ;
    private $user ;
    public function __construct($email , User $user)
    {
        $this->email = $email;
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        Mail::to($this->email)->send(new EmailChangeNotification($this->user));

    }
}
