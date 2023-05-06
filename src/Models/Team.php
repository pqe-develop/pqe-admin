<?php

namespace Pqe\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Team extends Model {
    public $table = 'teams';
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'created_at',
        'updated_at',
        'name',
    ];

    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }
    
    public function teamUsers() {
        return $this->belongsToMany(User::class);
    }
    
    
}
