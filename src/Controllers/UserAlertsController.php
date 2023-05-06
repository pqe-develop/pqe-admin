<?php

namespace Pqe\Admin\Controllers;

use Pqe\Admin\Models\User;
use Pqe\Admin\Models\UserAlert;
use Pqe\Admin\Requests\MassDestroyUserAlertRequest;
use Pqe\Admin\Requests\StoreUserAlertRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAlertsController extends Controller {

    public function index() {
        abort_if(Gate::denies('user_alert_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userAlerts = UserAlert::all();

        return view('pqeAdmin::userAlerts.index', compact('userAlerts'));
    }

    public function create() {
        abort_if(Gate::denies('user_alert_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('username', 'id');

        return view('pqeAdmin::userAlerts.create', compact('users'));
    }

    public function store(StoreUserAlertRequest $request) {
        $userAlert = UserAlert::create($request->all());
        $userAlert->users()->sync($request->input('users', []));

        return redirect()->route('user-alerts.index');
    }

    public function show(UserAlert $userAlert) {
        abort_if(Gate::denies('user_alert_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userAlert->load('users');

        return view('pqeAdmin::userAlerts.show', compact('userAlert'));
    }

    public function destroy(UserAlert $userAlert) {
        abort_if(Gate::denies('user_alert_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userAlert->delete();

        return back();
    }

    public function close(Request $request) {
        abort_if(Gate::denies('user_alert_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user_alert_request = $request->all();
        $user_alert_id = $user_alert_request['id'];
        $user_alerts = auth()->user()->userUserAlerts();
        $user_alerts->updateExistingPivot($user_alert_id, [
            'close' => true,
        ]);
        return back();
    }

    public function massDestroy(MassDestroyUserAlertRequest $request) {
        UserAlert::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function read(Request $request) {
        $alerts = Auth::user()->userUserAlerts()->where('read', false)->get();
        foreach ($alerts as $alert) {
            $pivot = $alert->pivot;
            $pivot->read = true;
            $pivot->save();
        }
    }
}
