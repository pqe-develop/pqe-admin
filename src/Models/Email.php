<?php

namespace Pqe\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model {
    public $table = "emails";
    protected $dates = [
        'sent_at',
        'sending_at',
        'send_at',
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'subject',
        'body',
        'source',
        'status',
        'attempts',
        'error_log',
        'sending_at',
        'send_at',
        'sent_at',
        'created_at',
        'updated_at'
    ];

    public function createEmail() {
        $this->status = 'Tosend';
        $this->source = 'Internal';
        $this->save();
    }
}
