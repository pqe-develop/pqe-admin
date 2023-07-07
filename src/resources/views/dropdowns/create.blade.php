@extends('layouts.menu')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('pqeAdmin::global.create') }} {{ trans('pqeAdmin::cruds.dropdowns.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("dropdowns.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-6">
                <label class="required" for="dropdown">{{ trans('pqeAdmin::cruds.dropdowns.fields.dropdown') }}</label>
                <input class="form-control {{ $errors->has('dropdown') ? 'is-invalid' : '' }}" type="text" name="dropdown" id="dropdown" value="{{ old('dropdown', '') }}" required>
                @if($errors->has('dropdown'))
                    <span class="text-danger">{{ $errors->first('dropdown') }}</span>
                @endif
                <span class="help-block">{{ trans('pqeAdmin::cruds.dropdowns.fields.dropdown_helper') }}</span>
            </div>
            <div class="form-group col-6">
                <label class="required" for="name">{{ trans('pqeAdmin::cruds.dropdowns.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('pqeAdmin::cruds.dropdowns.fields.name_helper') }}</span>
            </div>
            <div class="form-group col-6">
                <label class="required" for="label">{{ trans('pqeAdmin::cruds.dropdowns.fields.label') }}</label>
                <input class="form-control {{ $errors->has('label') ? 'is-invalid' : '' }}" type="text" name="label" id="label" value="{{ old('label', '') }}" required>
                @if($errors->has('label'))
                    <span class="text-danger">{{ $errors->first('label') }}</span>
                @endif
                <span class="help-block">{{ trans('pqeAdmin::cruds.dropdowns.fields.label_helper') }}</span>
            </div>
            <div class="form-group col-6">
                <label class="required" for="label">{{ trans('pqeAdmin::cruds.dropdowns.fields.group') }}</label>
                <input class="form-control {{ $errors->has('group') ? 'is-invalid' : '' }}" type="text" name="group" id="group" value="{{ old('group', '') }}" required>
                @if($errors->has('group'))
                    <span class="text-danger">{{ $errors->first('group') }}</span>
                @endif
                <span class="help-block">{{ trans('pqeAdmin::cruds.dropdowns.fields.group_helper') }}</span>
            </div>
            <div class="form-group col-6">
              <div class="form-check {{ $errors->has('disactivated') ? 'is-invalid' : '' }}">
                <input type="hidden" name="disactivated" value="0">
                <input class="form-check-input" type="checkbox" name="disactivated" onclick="handledisactivatedClick(this);" id="disactivated" value="1" {{ old('disactivated', 0) == 1 ? 'checked' : '' }}>
                <label for="disactivated">{{ trans('pqeAdmin::cruds.dropdowns.fields.disactivated') }}</label>
              </div>
              @if($errors->has('disactivated'))
              <span class="text-danger">{{ $errors->first('disactivated') }}</span>
              @endif
              <span class="help-block">{{ trans('pqeAdmin::cruds.dropdowns.fields.disactivated_helper') }}</span>
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