<?php

namespace Pqe\Admin\Controllers;

use Pqe\Admin\Models\Permission;
use Pqe\Admin\Models\Role;
use Pqe\Admin\Requests\MassDestroyRoleRequest;
use Pqe\Admin\Requests\StoreRoleRequest;
use Pqe\Admin\Requests\UpdateRoleRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class RolesController extends Controller {

    public function index() {
        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->sortBy('title');

        return view('pqeAdmin::roles.index', compact('roles'));
    }

    public function create() {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all()->sortBy('title')->pluck('title', 'id');

        return view('pqeAdmin::roles.create', compact('permissions'));
    }

    public function store(StoreRoleRequest $request) {
        $role = Role::create($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('roles.index');
    }

    public function edit(Role $role) {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all()->sortBy('title')->pluck('title', 'id');

        $role->load('permissions');

        return view('pqeAdmin::roles.edit', compact('permissions', 'role'));
    }

    public function update(UpdateRoleRequest $request, Role $role) {
        $role->update($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('roles.index');
    }

    public function show(Role $role) {
        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->load('permissions', 'rolesUsers');

        return view('pqeAdmin::roles.show', compact('role'));
    }

    public function destroy(Role $role) {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->delete();

        return back();
    }

    public function massDestroy(MassDestroyRoleRequest $request) {
        Role::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
