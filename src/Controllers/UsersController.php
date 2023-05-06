<?php

namespace Pqe\Admin\Controllers;

use Pqe\Admin\Models\Role;
use Pqe\Admin\Models\Team;
use Pqe\Admin\Models\User;
use Pqe\Admin\Requests\StoreUserRequest;
use Pqe\Admin\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller {

    public function indexShow() {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        // $users = User::all();
        $users = User::where('status', 'Active')->get();
        
        return view('pqeAdmin::users.index', compact('users'));
    }
    
    public function edit(User $user) {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        $teams = Team::all()->pluck('name', 'id');

        $user->load('roles', 'teams');

        return view('pqeAdmin::users.edit', compact('roles', 'teams', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user) {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));
        $user->teams()->sync($request->input('teams', []));

        return redirect()->route('users.index');
    }

    public function show(User $user) {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles', 'teams', 'userUserAlerts');

        return view('pqeAdmin::users.show', compact('user'));
    }

}
