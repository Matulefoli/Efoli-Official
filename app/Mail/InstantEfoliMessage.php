<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Setting;

class InstantEfoliMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;
    public function __construct($contact)
    {
        $this->contact=$contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $site=Setting::first();
        return $this ->from($site->ws_email)
                    ->subject('Thank you message')
                    ->view('mail.instant');
    }
}
