<?php

namespace Pqe\Admin\Traits;

use Illuminate\Database\Eloquent\Builder;

trait MultiTenantModelTrait {

    public static function bootMultiTenantModelTrait() {
        if (!app()->runningInConsole() && auth()->check()) {
            $isAdmin = auth()->user()->roles->contains(1);  // id=1 is Admin in all databases

            if (!$isAdmin && auth()->user()->teams->count() > 0) {
                static::addGlobalScope('team_id', function (Builder $builder) {
                            $field = sprintf('%s.%s', $builder->getQuery()->from, 'team_id');
                    $builder->whereIn($field, auth()->user()->teams)
                        ->orWhere($field, Null);
                        });
            }
        }
    }
}
