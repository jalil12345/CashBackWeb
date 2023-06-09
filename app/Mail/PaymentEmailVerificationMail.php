<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentEmailVerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $verificationLink;
    /**
     * Create a new message instance.
     *
     * @param string $verificationLink
     * @return void
     */
    public function __construct($verificationLink)
    {
        $this->verificationLink = $verificationLink;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Payment Email Verification')
                 ->view('emails.payment-email-verification', ['verificationLink' => $this->verificationLink]);
    }
    
}
