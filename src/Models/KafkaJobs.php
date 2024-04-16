<?php

namespace Pqe\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class KafkaJobs extends Model
{
    
    public $table = 'kafka_jobs';
    protected $dates = [
            'created_at',
    ];
    protected $fillable = [
            'id',
            'kafka_type',
            'kafka_id',
            'kafka_ref',
            'kafka_source',
            'kafka_dest',
            'kafka_payload',
            'kafka_status',
            'kafka_message',
            'attempts',
            'created_at',
    ];

}
