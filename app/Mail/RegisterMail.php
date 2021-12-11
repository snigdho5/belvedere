<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }


    public function build()
    {
        return $this->subject('Belvedereunion - Registered Successfully')
            ->from('noreply@belvedereunion.com')
            // ->to($this->data['email'])
            ->view('email.registermail');
    }
}
