<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    public function __construct()
    {
        $this->details = $details;
    }

    public function build()
    {
        return $this->subject('Test Mail')
            ->view('emails.code');
    }
}
