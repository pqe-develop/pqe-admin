<?php

namespace Pqe\Admin\Mails\Listeners;

use Illuminate\Mail\Events\MessageSending;
use Illuminate\Support\Facades\Log;
use Pqe\Admin\Models\Email;
use Carbon\Carbon;

class EmailSendingListener {

    /**
     * Create the event listener.
     * This job will inform the email is started sending from the queue.
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
    public function handle(MessageSending $email) {
        $emailid = $email->data['emailid'];
        Log::debug("Email Sending", [
//             "Mail Auto generated id" => $email->message->getId(),
//             "Mail Auto generated id" => $email->message->getHeaders()->get('X-Mailgun-Message-ID'),
            "Emailid" => $emailid
        ]);
        if (!is_null($emailid)) {
            $updateEmail = Email::find($emailid);
            $updateEmail->status = 'Sending';
            $updateEmail->sending_at = Carbon::now();
            $updateEmail->save();
        }
    }
}
