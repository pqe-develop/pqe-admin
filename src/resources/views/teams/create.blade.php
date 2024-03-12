@extends('pqeAdmin::layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('pqeAdmin::global.create') }} {{ trans('pqeAdmin::cruds.team.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("teams.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('pqeAdmin::cruds.team.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('pqeAdmin::cruds.team.fields.name_helper') }}</span>
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