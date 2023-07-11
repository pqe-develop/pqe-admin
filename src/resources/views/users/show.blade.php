@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('pqeAdmin::global.show') }} {{ trans('pqeAdmin::cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-warning" href="{{ route('users.index') }}">
                    {{ trans('pqeAdmin::global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.user.fields.username') }}
                        </th>
                        <td>
                            {{ $user->username }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.user.fields.status') }}
                        </th>
                        <td>
                            {{ $dropdowns->getItem('STATUS_SELECT',$user->status) ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.user.fields.is_admin') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $user->is_admin ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.user.fields.external_auth') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $user->external_auth ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.user.fields.roles') }}
                        </th>
                        <td>
                            @foreach($user->roles as $key => $roles)
                            <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.user.fields.teams') }}
                        </th>
                        <td>
                            @foreach($user->teams as $key => $teams)
                            <span class="label label-info">{{ $teams->name }}</span>
                            @endforeach
                        </td>
                    </tr>

                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-warning" href="{{ route('users.index') }}">
                    {{ trans('pqeAdmin::global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('pqeAdmin::global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#user_user_alerts" role="tab" data-toggle="tab">
                {{ trans('pqeAdmin::cruds.userAlert.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="user_user_alerts">
            @includeIf('users.relationships.userUserAlerts', ['userAlerts' => $user->userUserAlerts])
        </div>
    </div>
</div>

@endsection