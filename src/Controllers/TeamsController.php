<?php

namespace Pqe\Admin\Controllers;

use Pqe\Admin\Models\Team;
use Pqe\Admin\Requests\MassDestroyTeamRequest;
use Pqe\Admin\Requests\StoreTeamRequest;
use Pqe\Admin\Requests\UpdateTeamRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class TeamsController extends Controller {

    public function index() {
        abort_if(Gate::denies('team_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::all()->sortBy('name');

        return view('pqeAdmin::teams.index', compact('teams'));
    }

    public function create() {
        abort_if(Gate::denies('team_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pqeAdmin::teams.create');
    }

    public function store(StoreTeamRequest $request) {
        Team::create($request->all());

        return redirect()->route('teams.index');
    }

    public function edit(Team $team) {
        abort_if(Gate::denies('team_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pqeAdmin::teams.edit', compact('team'));
    }

    public function update(UpdateTeamRequest $request, Team $team) {
        $team->update($request->all());

        return redirect()->route('teams.index');
    }

    public function show(Team $team) {
        abort_if(Gate::denies('team_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pqeAdmin::teams.show', compact('team'));
    }

    public function destroy(Team $team) {
        abort_if(Gate::denies('team_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $team->delete();

        return back();
    }

    public function massDestroy(MassDestroyTeamRequest $request) {
        Team::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
