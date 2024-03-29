@extends('pqeAdmin::layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('pqeAdmin::cruds.dropdowns.title_singular') }} {{ trans('pqeAdmin::global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Dropdowns">
                <thead>
                    <tr>
                        <th width="10">
                        </th>
                        <th>
                            &nbsp;
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.dropdowns.fields.dropdown') }}
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.dropdowns.fields.name') }}
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.dropdowns.fields.label') }}
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.dropdowns.fields.dd_filter') }}
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.dropdowns.fields.prog') }}
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.dropdowns.fields.disactivated') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dropdowns as $key => $dropdown)
                        <tr data-entry-id="{{ $dropdown->id }}">
                            <td>

                            </td>
                            <td>
                                @can('dropdown_access')
                                    <a class="btn btn-xs btn-primary" href="{{ route('dropdowns.show', $dropdown->id) }}">
                                        {{ trans('pqeAdmin::global.view') }}
                                    </a>
                                @endcan

                                @can('dropdown_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('dropdowns.edit', $dropdown->id) }}">
                                        {{ trans('pqeAdmin::global.edit') }}
                                    </a>
                                @endcan

                                @can('dropdown_edit')
                                    <form action="{{ route('dropdowns.destroy', $dropdown->id) }}" method="POST" onsubmit="return confirm('{{ trans('pqeAdmin::global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('pqeAdmin::global.delete') }}">
                                    </form>
                                @endcan

                            </td>
                            <td>
                                {{ $dropdown->dropdown ?? '' }}
                            </td>
                            <td>
                                {{ $dropdown->name ?? '' }}
                            </td>
                            <td>
                                {{ $dropdown->label ?? '' }}
                            </td>
                            <td>
                                {{ $dropdown->dd_filter ?? '' }}
                            </td>
                            <td>
                                {{ $dropdown->prog ?? '' }}
                            </td>
                            <td>
                                {{ $dropdown->disactivated ? 'Yes' : 'No' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@can('dropdown_edit')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('dropdowns.create') }}">
                {{ trans('pqeAdmin::global.add') }} {{ trans('pqeAdmin::cruds.dropdowns.title_singular') }}
            </a>
        </div>
    </div>
@endcan



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('dropdowns_edit')
  let deleteButtonTrans = '{{ trans('pqeAdmin::global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('dropdowns.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('pqeAdmin::global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('pqeAdmin::global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 2, 'asc' ]],
	pageLength: {{ trans('pqeAdmin::config.pgLen') }},
	lengthMenu: [[ {{ trans('pqeAdmin::config.lenMenu') }} ], [ {{ trans('pqeAdmin::config.desMenu') }}, "All" ]]
  });
  let table = $('.datatable-Dropdowns:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection