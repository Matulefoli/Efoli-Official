<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Setting;
class EfoliMail extends Mailable
{
    use Queueable, SerializesModels;

    public $text;
    public $sub;
    public function __construct($subject,$text)
    {
        $this->text=$text;
        $this->subject=$subject;
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
                    ->subject($this->subject)
                    ->view('mail.group_mail');
    }
}
