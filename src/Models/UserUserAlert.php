<?php

namespace Pqe\Admin\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $user_alert_id
 * @property int $user_id
 * @property boolean $read
 * @property boolean $close
 * @property UserAlert $userAlert
 */
class UserUserAlert extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'user_user_alert';

    /**
     * @var array
     */
    protected $fillable = ['user_alert_id', 'user_id', 'read', 'close'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userAlert()
    {
        return $this->belongsTo('Pqe\Admin\Models\UserAlert');
    }
}
