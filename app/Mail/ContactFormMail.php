<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $formData;

    public function __construct($formData)
    {
        $this->formData = $formData;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            // Use your own verified domain address for "from" to avoid spam filters in 2026
            from: new Address(config('mail.from.address'), $this->formData['name']),
            replyTo: [
                new Address($this->formData['email'], $this->formData['name']),
            ],
            subject: "New Inquiry from " . ($this->formData['company'] ?? 'Website'),
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contact-form',
        );
    }
}
