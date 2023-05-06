<?php

namespace Pqe\Admin\Traits;

use Illuminate\Database\Eloquent\Builder;

trait MultiTenantModelTrait {

    public static function bootMultiTenantModelTrait() {
        if (!app()->runningInConsole() && auth()->check()) {
            $isAdmin = auth()->user()->roles->contains(1);

            static::creating(
                    function ($model) use ($isAdmin) {
                        // Prevent admin from setting his own id - admin entries are global.

                        // If required, remove the surrounding IF condition and admins will act as users
                        if (!$isAdmin && !empty(auth()->user()->team_id)) {
                            // $model->team_id = auth()->user()->team_id; Condition is not required as per the PQE requirnment, the team ID in othere modules shold be replace from the related resource ID.
                        }
                    });

            if (!$isAdmin && !empty(auth()->user()->team_id)) {
                static::addGlobalScope('team_id',
                        function (Builder $builder) {
                            $field = sprintf('%s.%s', $builder->getQuery()->from, 'team_id');
                            $builder->where($field, auth()->user()->team_id)->orWhere($field, Null);
                        });
            }
        }
    }
}
