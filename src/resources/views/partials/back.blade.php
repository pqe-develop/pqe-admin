				@if ((strpos(url()->previous(), 'create') === false) && (strpos(url()->previous(), 'duplicate') === false))
    				<a class="btn btn-default" onClick="history.go(-1);return true;">
    					{{ trans('pqeAdmin::global.back') }}
    				</a>
				@else
                    <a class="btn btn-default" onClick="history.go(-2);return true;">
                        {{ trans('pqeAdmin::global.back') }}
                    </a>
				@endif
