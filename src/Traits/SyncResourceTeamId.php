<?php

namespace Pqe\Admin\Traits;

trait SyncResourceTeamId {

    /*
     * Purpose: update the team_id of respective modal
     * * return Null
     * * created by TIA - 24-02-2023
	 * classResource = App\Models\Resource
     */
    public function InsertCurrentModelTeamID($classResource, $modalName, $resource_id, $current_record_id) {
        $modelClass = "App\Models\\" . $modalName;
        $model = resolve($modelClass);
        $resource_team_id = $classResource::select("team_id")->where('id', $resource_id)->first();
        $model::find($current_record_id)->update([
            'team_id' => $resource_team_id->team_id
        ]);
    }
}