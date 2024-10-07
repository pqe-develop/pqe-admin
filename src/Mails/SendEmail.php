<?php

namespace Pqe\Admin\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable {
    use Queueable, SerializesModels;

    public $emailid;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email) {
        $this->emailbody = $email->body;
        $this->subject = $email->subject ?? 'Exception';
        $this->emailid = $email->id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        /* Display the view file with the values of the array variable */
        return $this->subject($this->subject)->emailid($this->emailid)->view('pqeAdmin::emails.sendEmail')->with('emailbody', $this->emailbody);
    }
    
    public function emailid($emailid)
    {
        $this->emailid = $emailid;
        
        return $this;
    }
    
}
