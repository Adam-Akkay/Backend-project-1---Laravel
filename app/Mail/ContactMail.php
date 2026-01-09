<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $name;
    public string $email;
<<<<<<< HEAD
    public string $contactMessage;
=======
    public string $message;
>>>>>>> d8a97282b9145629dc952d67913417992d407051

    /**
     * Create a new message instance.
     */
    public function __construct(string $name, string $email, string $message)
    {
        $this->name = $name;
        $this->email = $email;
<<<<<<< HEAD
        $this->contactMessage = $message;
=======
        $this->message = $message;
>>>>>>> d8a97282b9145629dc952d67913417992d407051
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nieuw contactformulier bericht - Zaalvoetbal Soda JC',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
