<?php

namespace Pqe\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class AuditLog extends Model {
    public $table = 'audit_logs';
    protected $fillable = [
        'code',
        'description',
        'subject_id',
        'subject_type',
        'user_name',
        'user_id',
        'properties',
        'updated_data',
        'host',
    ];
    protected $casts = [
        'properties' => 'collection',
        'updated_data' => 'collection',
    ];

    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }
}
