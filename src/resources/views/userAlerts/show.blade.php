@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('pqeAdmin::global.show') }} {{ trans('pqeAdmin::cruds.userAlert.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('user-alerts.index') }}">
                    {{ trans('pqeAdmin::global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.userAlert.fields.id') }}
                        </th>
                        <td>
                            {{ $userAlert->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.userAlert.fields.alert_text') }}
                        </th>
                        <td>
                            {{ $userAlert->alert_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.userAlert.fields.alert_link') }}
                        </th>
                        <td>
                            {{ $userAlert->alert_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.userAlert.fields.user') }}
                        </th>
                        <td>
                            @foreach($userAlert->users as $key => $user)
                                <span class="label label-info">{{ $user->username }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.userAlert.fields.created_at') }}
                        </th>
                        <td>
                            {{ $userAlert->created_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('user-alerts.index') }}">
                    {{ trans('pqeAdmin::global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection