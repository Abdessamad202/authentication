<?php

namespace App\Jobs;

use App\Mail\ConfirmationLoginMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendConfirmationEmail implements ShouldQueue
{
    use Queueable;
    private $user;
    private $href;
    public function __construct($user,$href)
    {
        //
        $this->user = $user;
        $this->href = $href;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        Mail::to($this->user->email)->send(new ConfirmationLoginMail($this->user,$this->href));

    }
}
