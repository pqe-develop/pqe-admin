<?php

namespace Pqe\Admin\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

trait Userstamps {

    public static function bootUserstamps() {
        static::created(function (Model $model) {
            self::setUserStamps('created_by', $model);
            self::setUserStamps('updated_by', $model);
        });

        static::updated(function (Model $model) {
            self::setUserStamps('updated_by', $model);
        });

        static::deleted(function (Model $model) {
            self::setUserStamps('updated_by', $model);
        });
    }
    
    private static function setUserStamps($column, $model) {
        $user = Auth::user();
        $value = $user->username;

//         $value = 'BDA';
        $model::where('id',$model->id)->update(array($column => $value));
    }
}