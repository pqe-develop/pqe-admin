@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('pqeAdmin::global.show') }} {{ trans('pqeAdmin::cruds.internal_trainings.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
    			@include('pqeAdmin::partials.back')
                <a class="btn btn-warning" href="{{ route('internal-trainings.index') }}">
                    {{ trans('pqeAdmin::global.back_to_list') }}
                </a>
            </div>
    	    <div class="card-body">
        		<div class="form-row">
        		    <div class="form-group col-6">
            			<label> {{ trans('pqeAdmin::cruds.internal_trainings.fields.training_name') }}</label>
            			<input class="form-control" readonly="readonly" type="text" value="{{ $internals->training_name ?? '' }}">
        		    </div>
        		    <div class="form-group col-6">
            			<label> {{ trans('pqeAdmin::cruds.internal_trainings.fields.training_duration') }}</label>
            			<input class="form-control" readonly="readonly" type="text" value="{{ number_format($internals->training_duration ?? 0, 2, '.', '') }}">
        		     </div>
          		</div>
    	    </div>
            <div class="form-group">
    			@include('pqeAdmin::partials.back')
                <a class="btn btn-warning" href="{{ route('internal-trainings.index') }}">
                    {{ trans('pqeAdmin::global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
