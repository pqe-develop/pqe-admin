<?php

namespace Pqe\Admin\Controllers;

use Pqe\Admin\Models\Permission;
use Pqe\Admin\Requests\MassDestroyPermissionRequest;
use Pqe\Admin\Requests\StorePermissionRequest;
use Pqe\Admin\Requests\UpdatePermissionRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PermissionsController extends Controller {

    public function index() {
        abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all()->sortBy('title');

        return view('pqeAdmin::permissions.index', compact('permissions'));
    }

    public function create() {
        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pqeAdmin::permissions.create');
    }

    public function store(StorePermissionRequest $request) {
        Permission::create($request->all());

        return redirect()->route('permissions.index');
    }

    public function edit(Permission $permission) {
        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pqeAdmin::permissions.edit', compact('permission'));
    }

    public function update(UpdatePermissionRequest $request, Permission $permission) {
        $permission->update($request->all());

        return redirect()->route('permissions.index');
    }

    public function show(Permission $permission) {
        abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pqeAdmin::permissions.show', compact('permission'));
    }

    public function destroy(Permission $permission) {
        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permission->delete();

        return back();
    }

    public function massDestroy(MassDestroyPermissionRequest $request) {
        Permission::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
