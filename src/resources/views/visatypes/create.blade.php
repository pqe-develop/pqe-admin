@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('pqeAdmin::global.create') }} {{ trans('cruds.visatype.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('visatypes.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-6">
                <label class="required" for="visa_type">{{ trans('cruds.visatype.fields.visa_type') }}</label>
                <input class="form-control {{ $errors->has('visa_type') ? 'is-invalid' : '' }}" type="text" name="visa_type" id="visa_type" value="{{ old('dropdown', '') }}" required>
                @if($errors->has('visa_type'))
                    <span class="text-danger">{{ $errors->first('visa_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.visatype.fields.visa_type_helper') }}</span>
            </div>
            <div class="form-group col-6">
                <label class="required" for="zone_id">{{ trans('cruds.visatype.fields.zone_id') }}</label>
                 <select class="form-control select2 {{ $errors->has('zone_id') ? 'is-invalid' : '' }}" name="zone_id" id="zone_id">
                    @foreach($company as $key => $label)
  
                    @if (!empty(old('company')))
                    <?php
                    $eval_array_row[] =  old('company');
                    ?>
                    <option value="{{ $key }}" {{  (in_array($key,$eval_array_row ?? '') || old('company') === (string) $key) ? 'selected' :'' }}>{{ $label }}</option>
                    @else
                    <option value="{{ $key }}" {{  (old('company') ?? '' === (string) $key) ? 'selected' :'' }}>{{ $label }}</option>
                    @endif
  
                    @endforeach
                  </select>
                @if($errors->has('zone_id'))
                    <span class="text-danger">{{ $errors->first('zone_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.visatype.fields.zone_id_helper') }}</span>
            </div>
            <div class="form-group col-6">
                <label class="required" for="renewal_days">{{ trans('cruds.visatype.fields.renewal_days') }}</label>
                <input class="form-control {{ $errors->has('renewal_days') ? 'is-invalid' : '' }}" type="text" name="renewal_days" id="renewal_days" value="{{ old('label', '') }}" required>
                @if($errors->has('renewal_days'))
                    <span class="text-danger">{{ $errors->first('renewal_days') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.visatype.fields.renewal_days_helper') }}</span>
            </div>
            <div class="form-group col-6 textarea-container">
                <label for="label">{{ trans('cruds.visatype.fields.notes') }}</label>
                <textarea class="final {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="final_span" rows="5" required>{{ old('notes') }}</textarea>
                <span class="help-block">{{ trans('cruds.visatype.fields.notes_helper') }}</span>
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
