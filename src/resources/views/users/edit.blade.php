@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('pqeAdmin::global.edit') }} {{ trans('pqeAdmin::cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("users.update", [$user->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
        <div class="form-group">
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
                            {{ Pqe\Admin\Utils\Dropdowns::STATUS_SELECT[$user->status] ?? '' }}
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
                </tbody>
            </table>
        </div>

            <div class="form-group">
                <label for="roles">{{ trans('pqeAdmin::cruds.user.fields.roles') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('pqeAdmin::global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('pqeAdmin::global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles" multiple>
                    @foreach($roles as $id => $roles)
                        <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <span class="text-danger">{{ $errors->first('roles') }}</span>
                @endif
                <span class="help-block">{{ trans('pqeAdmin::cruds.user.fields.roles_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="teams">{{ trans('pqeAdmin::cruds.user.fields.teams') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('pqeAdmin::global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('pqeAdmin::global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('teams') ? 'is-invalid' : '' }}" name="teams[]" id="teams" multiple>
                    @foreach($teams as $id => $teams)
                        <option value="{{ $id }}" {{ (in_array($id, old('teams', [])) || $user->teams->contains($id)) ? 'selected' : '' }}>{{ $teams }}</option>
                    @endforeach
                </select>
                @if($errors->has('teams'))
                    <span class="text-danger">{{ $errors->first('teams') }}</span>
                @endif
                <span class="help-block">{{ trans('pqeAdmin::cruds.user.fields.teams_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('pqeAdmin::global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
