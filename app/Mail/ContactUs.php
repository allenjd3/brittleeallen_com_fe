<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $name,
        public string $email,
        public string $content,
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Message from Britt Lee Allen Blog',
            replyTo: [
                new Address($this->email, $this->name)
            ]
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.contact-us',
        );
    }
}
