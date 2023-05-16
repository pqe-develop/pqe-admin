<?php

namespace Pqe\Admin\Traits;

use Illuminate\Database\Eloquent\Builder;
use Pqe\Admin\Utils\GetAdmin;

trait MultiTenantModelTrait {

    public static function bootMultiTenantModelTrait() {
        if (!app()->runningInConsole() && auth()->check()) {

            if (!GetAdmin::getAdmin() && auth()->user()->teams->count() > 0) {
                static::addGlobalScope('team_id', function (Builder $builder) {
                            $field = sprintf('%s.%s', $builder->getQuery()->from, 'team_id');
                    foreach (auth()->user()->teams->toArray() as $item) {
                        $arrayTeams[] = $item['id'];
                    }
                    $builder->whereIn($field, $arrayTeams)->orWhere($field, Null);
                        });
            }
        }
    }
}
