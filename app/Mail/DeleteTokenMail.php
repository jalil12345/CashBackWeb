<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DeleteTokenMail extends Mailable
{
    use Queueable, SerializesModels;

    public $deleteToken;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($deleteToken)
    {
        $this->deleteToken = $deleteToken;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.delete_token')
                    ->subject('Confirmation for Account Deletion');
    }
}
