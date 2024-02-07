<?php

namespace App\Mail;

use App\Models\RefundOperation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Str;

class CancellationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public RefundOperation $refundOperation)
    {
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $operationType = Str::ucfirst($this->refundOperation->operationType->name);
        $invoiceType = $this->refundOperation->oldInvoice->invoiceType->name;
        $invoiceName = $this->refundOperation->oldInvoice->name;

        return new Envelope(
            subject: "$operationType para $invoiceType con folio $invoiceName",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.cancellation',
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
