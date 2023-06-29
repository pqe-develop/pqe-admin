<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class TimeDimensionCompany extends Model {
    public $table = 'time_dimension_company';
    protected $dates = [
        'db_date',
    ];
    protected $fillable = [
            'id',
            'db_date',
            'year',
            'month',
            'day',
            'quarter',
            'week',
            'day_name',
            'month_name',
            'holiday_flag',
            'weekend_flag',
            'event',
            'company',
            'company_id',
            'hrdb_company_id',
    ];

    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }

}
