@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('pqeAdmin::global.show') }} {{ trans('pqeAdmin::cruds.dropdowns.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                @if ((strpos(url()->previous(), 'create') === false) && (strpos(url()->previous(), 'duplicate') === false))
                <a class="btn btn-default" onClick="history.go(-1);return true;">
                    {{ trans('pqeAdmin::global.back') }}
                </a>
                @endif
                <a class="btn btn-warning" href="{{ route('dropdowns.index') }}">
                    {{ trans('pqeAdmin::global.back_to_list') }}
                </a>
            </div>
    	    <div class="card-body">
        		<div class="form-row"> 
        		    <div class="form-group col-6">
            			<label> {{ trans('pqeAdmin::cruds.dropdowns.fields.dropdown') }}</label>
            			<input class="form-control" readonly="readonly" type="text" value="{{ $dropdown->dropdown ?? '' }}">
        		    </div>
        		    <div class="form-group col-6">
            			<label> {{ trans('pqeAdmin::cruds.dropdowns.fields.name') }}</label>
            			<input class="form-control" readonly="readonly" type="text" value="{{ $dropdown->name ?? '' }}">
        		     </div>
        		    <div class="form-group col-6">
            			<label> {{ trans('pqeAdmin::cruds.dropdowns.fields.label') }}</label>
            			<input class="form-control" readonly="readonly" type="text" value="{{ $dropdown->label ?? '' }}">
        		     </div>
        		    <div class="form-group col-6">
            			<label> {{ trans('pqeAdmin::cruds.dropdowns.fields.dd_filter') }}</label>
            			<input class="form-control" readonly="readonly" type="text" value="{{ $dropdown->dd_filter ?? '' }}">
        		     </div>
                     <div class="form-group col-6">
                      <div class="form-check {{ $errors->has('disactivated') ? 'is-invalid' : '' }}">
                        <input type="hidden" name="disactivated" value="0">
                        <input class="form-check-input" type="checkbox"  disabled="disabled" value="{{ $dropdown->disactivated ? 'checked' : '' }}"> 
                        <label for="disactivated">{{ trans('pqeAdmin::cruds.dropdowns.fields.disactivated') }}</label>
                      </div> 
                    </div>
          		</div>
    	    </div>
            <div class="form-group">
                @if ((strpos(url()->previous(), 'create') === false) && (strpos(url()->previous(), 'duplicate') === false))
                <a class="btn btn-default" onClick="history.go(-1);return true;">
                    {{ trans('pqeAdmin::global.back') }}
                </a>
                @endif
                <a class="btn btn-warning" href="{{ route('dropdowns.index') }}">
                    {{ trans('pqeAdmin::global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
