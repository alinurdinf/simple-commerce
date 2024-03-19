<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Log;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserRegisterNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $maildata;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($maildata)
    {
        $this->maildata = $maildata;
    }

    public function build()
    {
        $subject = "Welcome to " . env('APP_NAME', 'E-Commerce');
        $mail = $this->subject($subject)
            ->markdown('mailable.register_password_notification')
            ->with('maildata', $this->maildata);
        Log::info('Mold Maintenance Notification Email Sent');
        return $mail;
    }
    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
