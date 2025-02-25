<?php

namespace App\Services\Contact;

use App\Models\Profile;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use App\Services\Contact\FileService\CsvFileService;

final class SendEmailToProfileService extends Mailable
{
    public function __construct(
        private readonly Profile $profile,
        private readonly array $datas,
    ) {}


    public function envelope(): Envelope
    {
        return new Envelope(
            from: env('MAIL_FROM_ADDRESS'),
            subject: 'LeBonDév : un client cherche à te joindre',
            to: $this->profile->email,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'email_template',
            with: ['datas' => $this->datas, 'profile' => $this->profile]
        );
    }
}
