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
                <label class="required" for="username">{{ trans('pqeAdmin::cruds.user.fields.username') }}</label>
                <input class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" type="text" name="username" id="username" value="{{ old('username', $user->username) }}" required>
                @if($errors->has('username'))
                    <span class="text-danger">{{ $errors->first('username') }}</span>
                @endif
                <span class="help-block">{{ trans('pqeAdmin::cruds.user.fields.username_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('pqeAdmin::cruds.user.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('pqeAdmin::cruds.user.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('pqeAdmin::cruds.user.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('pqeAdmin::global.pleaseSelect') }}</option>
                    @foreach(App\Utils\Dropdowns::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $user->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('pqeAdmin::cruds.user.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('pqeAdmin::cruds.user.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $user->email) }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('pqeAdmin::cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_admin') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="is_admin" id="is_admin" value="1" {{ $user->is_admin || old('is_admin', 0) === 1 ? 'checked' : '' }}>
                    <label for="is_admin">{{ trans('pqeAdmin::cruds.user.fields.is_admin') }}</label>
                </div>
                @if($errors->has('is_admin'))
                    <span class="text-danger">{{ $errors->first('is_admin') }}</span>
                @endif
                <span class="help-block">{{ trans('pqeAdmin::cruds.user.fields.is_admin_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('external_auth') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="external_auth" value="0">
                    <input class="form-check-input" type="checkbox" name="external_auth" id="external_auth" value="1" {{ $user->external_auth || old('external_auth', 0) === 1 ? 'checked' : '' }}>
                    <label for="external_auth">{{ trans('pqeAdmin::cruds.user.fields.external_auth') }}</label>
                </div>
                @if($errors->has('external_auth'))
                    <span class="text-danger">{{ $errors->first('external_auth') }}</span>
                @endif
                <span class="help-block">{{ trans('pqeAdmin::cruds.user.fields.external_auth_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="password">{{ trans('pqeAdmin::cruds.user.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password">
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <span class="help-block">{{ trans('pqeAdmin::cruds.user.fields.password_helper') }}</span>
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
