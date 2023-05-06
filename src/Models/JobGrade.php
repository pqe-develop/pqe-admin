<?php

namespace Pqe\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class JobGrade extends Model {
    public $table = 'job_grades';
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'job_grade_name',
        'job_grade',
        'job_level',
        'created_at',
        'updated_at',
    ];

    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }
}
