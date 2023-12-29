@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('pqeAdmin::global.create') }} {{ trans('pqeAdmin::cruds.internal_trainings.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("internal-trainings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-6">
                <label class="required" for="training_name">{{ trans('pqeAdmin::cruds.internal_trainings.fields.training_name') }}</label>
                <input class="form-control {{ $errors->has('training_name') ? 'is-invalid' : '' }}" type="text" name="training_name" id="training_name" value="{{ old('training_name', '') }}" required>
                @if($errors->has('training_name'))
                    <span class="text-danger">{{ $errors->first('training_name') }}</span>
                @endif
                <span class="help-block">{{ trans('pqeAdmin::cruds.internal_trainings.fields.training_name_helper') }}</span>
            </div>
            <div class="form-group col-6">
                <label class="required" for="training_duration">{{ trans('pqeAdmin::cruds.internal_trainings.fields.training_duration') }}</label>
                <input class="form-control {{ $errors->has('training_duration') ? 'is-invalid' : '' }}" type="text" name="training_duration" id="training_duration" value="{{ old('training_duration', '') }}" required>
                @if($errors->has('training_duration'))
                    <span class="text-danger">{{ $errors->first('training_duration') }}</span>
                @endif
                <span class="help-block">{{ trans('pqeAdmin::cruds.internal_trainings.fields.training_duration_helper') }}</span>
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
