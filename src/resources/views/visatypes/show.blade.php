@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('pqeAdmin::global.show') }} {{ trans('cruds.visatype.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
    			@include('pqeAdmin::partials.back')
                <a class="btn btn-warning" href="{{ route('dropdowns.index') }}">
                    {{ trans('pqeAdmin::global.back_to_list') }}
                </a>
            </div>
    	    <div class="card-body">
        		<div class="form-row"> 
        		    <div class="form-group col-6">
            			<label> {{ trans('cruds.visatype.fields.visa_type') }}</label>
            			<input class="form-control" readonly="readonly" type="text" value="{{ $visatype->visa_type ?? '' }}">
        		    </div>
        		    <div class="form-group col-6">
            			<label> {{ trans('cruds.visatype.fields.zone_id') }}</label>
            			<input class="form-control" readonly="readonly" type="text" value="{{ $visatype->company ? $visatype->company->company : 'N/A' }}">
        		     </div>
        		    <div class="form-group col-6">
            			<label> {{ trans('cruds.visatype.fields.renewal_days') }}</label>
            			<input class="form-control" readonly="readonly" type="text" value="{{ $visatype->renewal_days ?? '' }}">
        		     </div>
					 <div class="form-group col-6">
            			<label> {{ trans('cruds.visatype.fields.notes') }}</label>
            			<input class="form-control" readonly="readonly" type="text" value="{{ $visatype->notes ?? '' }}">
        		     </div>
          		</div>
    	    </div>
            <div class="form-group">
    			@include('pqeAdmin::partials.back')
                <a class="btn btn-warning" href="{{ route('dropdowns.index') }}">
                    {{ trans('pqeAdmin::global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
