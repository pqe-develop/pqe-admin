<?php

namespace Pqe\Admin\Traits;

use Illuminate\Database\Eloquent\Builder;
use Pqe\Admin\Utils\GetAdmin;

trait MultiTenantModelTrait {

    public static function bootMultiTenantModelTrait() {
        if (!app()->runningInConsole() && auth()->check()) {

            if (!GetAdmin::getAdmin() && auth()->user()->teams->count() > 0) {
                static::addGlobalScope('team_id',
                        function (Builder $builder) {
                    foreach (auth()->user()->teams->toArray() as $item) {
                        $arrayTeams[] = $item['id'];
                                $arrayCond[] = "'" . $item['id'] . "'";
                    }
                            $arrayCond = implode(",", $arrayCond);
                            $field = sprintf('%s.%s', $builder->getQuery()->from, 'team_id');
                            if ($field == 'resources.team_id') {
                    $builder->whereIn($field, $arrayTeams)->orWhere($field, Null);
                            } else {
                                $builder->whereRaw(
                                        'resource_code_id in (select id from resources where isnull(deleted_at) and (team_id in (' .
                                        $arrayCond . ') or team_id is null))');
                            }
                        });
            }
        }
    }
}
