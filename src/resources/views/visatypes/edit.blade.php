@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('pqeAdmin::global.edit') }} {{ trans('pqeAdmin::cruds.dropdowns.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('visatypes.update', $visatype->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group col-6">
                <label class="required" for="dropdown">{{ trans('cruds.visatype.fields.visa_type') }}</label>
                <input class="form-control {{ $errors->has('visa_type') ? 'is-invalid' : '' }}" type="text" name="visa_type" id="visa_type" value="{{ old('dropdown', $visatype->visa_type) }}" required>
                @if($errors->has('dropdown'))
                    <span class="text-danger">{{ $errors->first('dropdown') }}</span>
                @endif
                <span class="help-block">{{ trans('pqeAdmin::cruds.dropdowns.fields.dropdown_helper') }}</span>
            </div>
            <div class="form-group col-6">
                <label class="required" for="name">{{ trans('cruds.visatype.fields.zone_id') }}</label>
                <select class="form-control select2 {{ $errors->has('zone_id') ? 'is-invalid' : '' }}" name="zone_id" id="zone_id">
                    @foreach($company as $companyId => $companyName)
                        <option value="{{ $companyId }}" {{ old('zone_id', $visatype->company->id) == $companyId ? 'selected' : '' }}>
                            {{ $companyName }}
                        </option>
                    @endforeach
                </select>                
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('pqeAdmin::cruds.dropdowns.fields.name_helper') }}</span>
            </div>
            <div class="form-group col-6">
                <label class="required" for="label">{{ trans('cruds.visatype.fields.renewal_days') }}</label>
                <input class="form-control {{ $errors->has('renewal_days') ? 'is-invalid' : '' }}" type="text" name="renewal_days" id="renewal_days" value="{{ old('label', $visatype->renewal_days) }}" required>
                @if($errors->has('label'))
                    <span class="text-danger">{{ $errors->first('renewal_days') }}</span>
                @endif
                <span class="help-block">{{ trans('pqeAdmin::cruds.dropdowns.fields.label_helper') }}</span>
            </div>
            <div class="form-group col-6">
                <label for="label">{{ trans('cruds.visatype.fields.notes') }}</label>
                <input class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" type="text" name="notes" id="notes" value="{{ old('notes', $visatype->notes) }}">
                @if($errors->has('notes'))
                    <span class="text-danger">{{ $errors->first('notes') }}</span>
                @endif
                <span class="help-block">{{ trans('pqeAdmin::cruds.dropdowns.fields.dd_filter_helper') }}</span>
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
