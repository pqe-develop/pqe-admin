@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('cruds.visatype.title_singular') }} {{ trans('pqeAdmin::global.list') }}
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
                            {{ trans('cruds.visatype.fields.visa_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.visatype.fields.zone_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.visatype.fields.renewal_days') }}
                        </th>
                        <th>
                            {{ trans('cruds.visatype.fields.notes') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($visatype as $key => $dropdown)
                        <tr data-entry-id="{{ $dropdown->id }}">
                            <td>

                            </td>
                            <td>
                                @can('visa_access')
                                    <a class="btn btn-xs btn-primary" href="{{ route('visatypes.show', $dropdown->id) }}">
                                        {{ trans('pqeAdmin::global.view') }}
                                    </a>
                                @endcan

                                @can('visa_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('visatypes.edit', $dropdown->id) }}">
                                        {{ trans('pqeAdmin::global.edit') }}
                                    </a>
                                @endcan

                                @can('visa_edit')
                                <form action="{{ route('visatypes.destroy', $dropdown->id) }}" method="POST" onsubmit="return confirm('{{ trans('pqeAdmin::global.areYouSure') }}');" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-xs btn-danger">{{ trans('pqeAdmin::global.delete') }}</button>
                                </form>
                            @endcan

                            </td>
                            <td>
                                {{ $dropdown->visa_type ?? '' }}
                            </td>
                            <td>
                                {{ $dropdown->company ? $dropdown->company->company : 'N/A' }}
                            </td>
                            <td>
                                {{ $dropdown->renewal_days ?? '' }}
                            </td>
                            <td>
                                {{ $dropdown->notes ?? '' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@can('visa_edit')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('visatypes.create') }}">
                {{ trans('pqeAdmin::global.add') }} {{ trans('cruds.visatype.title_singular') }}
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