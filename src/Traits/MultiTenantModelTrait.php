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
                    }
                            $field = sprintf('%s.%s', $builder->getQuery()->from, 'team_id');
                            if ($field == 'resources.team_id') {
                    $builder->whereIn($field, $arrayTeams)->orWhere($field, Null);
//                             } else {
//                                 // $builder->join('resources', 'resources.id', $fieldJoin)
//                                 // ->whereIn($fieldTeam, $arrayTeams)->orWhere($fieldTeam, Null)
//                                 // ->whereNull('resources.deleted_at');

//                                 // $builder->addSelect(
//                                 // [
//                                 // 'resource_code_id' => Resource::select('id')->whereColumn('id', $fieldJoin)->whereIn(
//                                 // $fieldTeam, $arrayTeams)->orWhere($fieldTeam, Null)->whereNull(
//                                 // 'resources.deleted_at')
//                                 // ]);

//                                 $builder->whereIn('resource_code_id',
//                                         function ($query) {
//                                             foreach (auth()->user()->teams->toArray() as $item) {
//                                                 $arrayTeams[] = $item['id'];
//                                             }
//                                             $query->select('id')->from('resources')->whereIn('resources.team_id',
//                                                     $arrayTeams)->orWhere('resources.team_id', Null)->whereNull(
//                                                     'resources.deleted_at');
//                                         });
                            }
                        });
            }
        }
    }
}
