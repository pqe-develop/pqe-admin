@can($viewGate)
    <a class="btn btn-xs btn-primary" href="{{ route('' . $crudRoutePart . '.show', $row->id) }}">
        {{ trans('pqeAdmin::global.view') }}
    </a>
@endcan
@can($editGate)
    <a class="btn btn-xs btn-info" href="{{ route('' . $crudRoutePart . '.edit', $row->id) }}">
        {{ trans('pqeAdmin::global.edit') }}
    </a>
@endcan
@can($duplicateGate)
    <a class="btn btn-xs btn-warning" href="{{ route('' . $crudRoutePart . '.duplicate', $row->id) }}">
        {{ trans('pqeAdmin::global.duplicate') }}
    </a>
@endcan
@can($deleteGate)
    <form action="{{ route('' . $crudRoutePart . '.destroy', $row->id) }}" method="POST" onsubmit="return confirm('{{ trans('pqeAdmin::global.areYouSure') }}');" style="display: inline-block;">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('pqeAdmin::global.delete') }}">
    </form>
@endcan