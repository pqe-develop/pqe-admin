<?php

namespace Pqe\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Role extends Model {
    public $table = 'roles';
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
    ];

    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }

    public function rolesUsers() {
        return $this->belongsToMany(User::class);
    }

    public function permissions() {
        return $this->belongsToMany(Permission::class);
    }
}
