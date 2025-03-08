<?php

namespace App\Services\Contact;

use App\Models\Job;
use App\Models\Candidate;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;


final class SendApplyConfirmService extends Mailable
{
    public function __construct(
        private Candidate $candidate,
        private Job $job,
    ) {}


    public function envelope(): Envelope
    {
        return new Envelope(
            from: env('MAIL_FROM_ADDRESS'),
            subject: 'Confirmation de candidature',
            to: $this->candidate->email,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'email_apply_confirm',
            with: ['candidate' => $this->candidate, 'job' => $this->job]
        );
    }
}
