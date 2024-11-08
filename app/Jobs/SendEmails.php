<?php

namespace App\Jobs;

use App\Mail\VerificationEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendEmails implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    private $mail;
    private $user;
    private $code;
    public function __construct($mail,$user,$code)
    {
        $this->mail = $mail;
        $this->user = $user;
        $this->code = $code;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        Mail::to($this->mail)->send(new VerificationEmail($this->user,$this->code));
    }
}
