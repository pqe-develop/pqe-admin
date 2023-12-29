<?php

namespace Pqe\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class InternalTraining extends Model {
    public $table = 'internal_training_info';
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'training_name',
        'training_duration',
        'created_at',
        'updated_at',
    ];

    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }

}
