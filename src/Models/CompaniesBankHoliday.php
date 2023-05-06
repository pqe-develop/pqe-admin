<?php

namespace Pqe\Admin\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class CompaniesBankHoliday extends Model {
    public $table = 'companies_bank_holidays';
    protected $dates = [
        'bank_holiday_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
        'company_id',
        'year',
        'bank_holiday_date',
        'bank_holiday_name',
        'bank_holiday_fix',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }

    public function company() {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function getBankHolidayDateAttribute($value) {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBankHolidayDateAttribute($value) {
        $this->attributes['bank_holiday_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format(
                'Y-m-d') : null;
    }
}
