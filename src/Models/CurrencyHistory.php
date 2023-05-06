<?php

namespace Pqe\Admin\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use DateTimeInterface;

class CurrencyHistory extends Model {
    public $table = 'currency_histories';
    public static $searchable = [
        'date_validity',
        'conversion_rate',
    ];
    protected $dates = [
        'date_validity',
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'currency_id',
        'date_validity',
        'conversion_rate',
        'created_at',
        'updated_at',
    ];

    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }

    public function currency() {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function getDateValidityAttribute($value) {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateValidityAttribute($value) {
        $this->attributes['date_validity'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format(
                'Y-m-d') : null;
    }

    public static function convertToEurFromDB($value, $currency_id, $date = NULL) {
        $currencyHistory = NULL;
        if (!$date) {
            $currencyHistory = DB::table('currency_histories')->select('conversion_rate')->where('currency_id',
                    $currency_id)->orderBy('date_validity', 'DESC')->first();
        } else {
            $date = Carbon::parse($date)->format('Y-m-d');
            $currencyHistory = DB::table('currency_histories')->select('conversion_rate')->where('currency_id',
                    $currency_id)->where('date_validity', $date)->orderBy('date_validity', 'DESC')->first();
        }

        if ($currencyHistory && !empty($currencyHistory)) {
            $conversion_rate = $currencyHistory->conversion_rate;
            return round($value / $conversion_rate, 6);
        } else {
            return $value;
        }
    }

    public static function getConversionRate($currency_id, $date = NULL) {
        $currencyHistory = NULL;
        if (!$date) {
            $currencyHistory = DB::table('currency_histories')->select('conversion_rate')->where('currency_id',
                    $currency_id)->orderBy('date_validity', 'DESC')->first();
        } else {
            $date = Carbon::parse($date)->format('Y-m-d');
            $currencyHistory = DB::table('currency_histories')->select('conversion_rate')->where('currency_id',
                    $currency_id)->where('date_validity', $date)->orderBy('date_validity', 'DESC')->first();
        }

        if ($currencyHistory && !empty($currencyHistory)) {
            return $currencyHistory->conversion_rate;
        } else {
            return 1;
        }
    }

    public static function convertToEur($value, $conversion_rate) {
        return number_format(round($value / $conversion_rate, 6), 6, '.', '');
    }
}
