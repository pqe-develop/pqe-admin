<?php

namespace Pqe\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

class UserAlert extends Model
{
    public $table = 'user_alerts';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'alert_text',
        'alert_link',
        'alert_type',
        'record_id',
        'created_at',
        'updated_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function userUserAlerts()
    {
        return $this->hasMany(UserUserAlert::class);
    }

}
