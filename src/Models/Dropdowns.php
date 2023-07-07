<?php

namespace Pqe\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dropdowns extends Model {
    use HasFactory;
    protected $table = 'dropdowns';
    public $incrementing = false;
    public $timestamps = false; // by default timestamp true
    protected $fillable = [
        'dropdown',
        'name',
        'label',
        'group',
        'disactivated',
    ];
}
