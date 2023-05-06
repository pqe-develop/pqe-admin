<?php

namespace Pqe\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Country extends Model {
    public $table = 'countries';
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'name',
        'short_code',
        'region',
        'country_kpi',
        'created_at',
        'updated_at',
    ];

    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }

    public function countryCurrencies() {
        return $this->hasMany(Currency::class, 'country_id', 'id');
    }

    public function countryCompanies() {
        return $this->belongsToMany(Company::class);
    }
}
