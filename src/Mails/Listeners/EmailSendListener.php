<?php

namespace Pqe\Admin\Mails\Listeners;

use Illuminate\Mail\Events\MessageSent;
use Pqe\Admin\Logging\PqeLog;
use Pqe\Admin\Models\Email;
use Carbon\Carbon;

class EmailSendListener {

    /**
     * Create the event listener.
     * To update the email status "Sent" in Emails table of PQEIS.
     * This will tells applcaation i.e. emails has been sent succesfully.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(MessageSent $email) {
        // $message = $email->message;
        $emailid = $email->data['emailid'];
        PqeLog::debug("Mail Sent", [
//             "Mail Auto generated id" => $email->message->getId(),
//             "Mail Auto generated id" => $email->message->getHeaders()->get('X-Mailgun-Message-ID'),
            "Emailid" => $emailid
        ]);
        $updateEmail = Email::find($emailid);
        $updateEmail->status = 'Sent';
        $updateEmail->sent_at = Carbon::now();
        $updateEmail->save();
    }
}
