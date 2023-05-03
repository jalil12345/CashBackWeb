<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this->from($this->contact['email'])
                    ->subject('New Contact Form Submission')
                    ->markdown('emails.contact-form')
                    ->with([
                        'name' => $this->contact['name'],
                        'email' => $this->contact['email'],
                        'message' => $this->contact['message'],
                    ]);
    }
}
