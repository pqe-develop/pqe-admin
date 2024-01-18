<?php

namespace Pqe\Admin\Models;

use Pqe\Admin\Models\Company as AdminCompany; // Adjust the namespace for the Company model
use Pqe\Admin\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class VisaType extends Model
{
    use Auditable;

    public $table = 'visa_type';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'id',
        'visa_type',
        'zone_id',
        'renewal_days',
        'notes',
        'created_at',
        'updated_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function company()
    {
        return $this->belongsTo(AdminCompany::class, 'zone_id');
    }
}
