<?php

namespace Pqe\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Currency extends Model {
    public $table = 'currencies';
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'code',
        'description',
        'symbol',
        'country_id',
        'order_number',
        'decimal_digits',
        'suite_id',
        'created_at',
        'updated_at',
    ];

    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }

    public function currencyCurrencyHistories() {
        return $this->hasMany(CurrencyHistory::class, 'currency_id', 'id');
    }

    public function country() {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
