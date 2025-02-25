<?php

namespace App\Services\Contact;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

final class SendEmailService extends Mailable
{
    public function __construct(
        private readonly array $datas,
    ) {}


    public function envelope(): Envelope
    {
        return new Envelope(
            from: env('MAIL_FROM_ADDRESS'),
            subject: 'LeBonDév : formulaire de contact',
            to: env('MAIL_TO_ADDRESS'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'email_template',
            with: ['datas' => $this->datas]
        );
    }
}
