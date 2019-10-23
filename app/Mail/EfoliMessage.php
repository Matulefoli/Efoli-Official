<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Setting;
class EfoliMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $text;
    public function __construct($text)
    {
        $this->text=$text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    { $site=Setting::first();
        return $this ->from($site->ws_email)
        ->subject($this->subject)
        ->with('text',$this->text)
        ->view('mail.efoli_message');
    }
}
