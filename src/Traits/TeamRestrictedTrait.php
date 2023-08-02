<?php
namespace Pqe\Admin\Traits;

use Pqe\Admin\Utils\GetAdmin;

trait TeamRestrictedTrait
{
    /**
     * Add team restriction to the given query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function checkTeams($query, $relatedTable)
    {
        $countTeams = auth()->user()->teams->count();
        if (!GetAdmin::getAdmin() && $countTeams > 0) {
            $arrayTeams = auth()->user()->teams->pluck('id')->toArray();
            $query = $query->join('resources', 'resources.id', '=', $relatedTable . '.resource_code_id')
                           ->whereIn('resources.team_id', $arrayTeams);
        }
        return $query;
    }
}

?>
