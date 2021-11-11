<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Applyjob extends Mailable
{
    use Queueable, SerializesModels;

    protected   $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->data     =      $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');        
        $htmlTemplate       =   '<strong> Fist Name : </strong>' . $this->data['first_name'];
        $htmlTemplate       .=   '<strong> Last Name : </strong>' . $this->data['last_name'];
        $htmlTemplate       .=   '<strong> Email : </strong>' . $this->data['applicant_email'];
        $htmlTemplate       .=   '<strong> Phone : </strong>' . $this->data['applicant_phone'];

        return $this->subject('Job Applicant')
            ->view('email_template', compact('htmlTemplate'))
            ->attach($this->data['applicant_cv']->getRealPath(), [
                'as' =>  $this->data['applicant_cv']->getClientOriginalName()
            ])
            ->from('noreply@belvedereunion.com')
            ->to('belvedereunion@belvederecollege.ie');
    }
}
