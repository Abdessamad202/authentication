<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConfirmationLoginMail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $href;

    /**
     * Create a new message instance.
     *
     * @param mixed $user
     * @param string $href
     */
    public function __construct($user, string $href)
    {
        $this->user = $user;
        $this->href = $href;
    }

    /**
     * Get the message envelope.
     *
     * @return Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmation Login Mail'
        );
    }

    /**
     * Get the message content definition.
     *
     * @return Content
     */
    public function content(): Content
    {
        return new Content(
            view: 'auth.mailcopy',
            with: [
                'user' => $this->user,
                'href' => $this->href,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments(): array
    {
        return [];
    }
}
