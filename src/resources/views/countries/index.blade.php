@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('pqeAdmin::cruds.country.title_singular') }} {{ trans('pqeAdmin::global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Country">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.country.fields.id') }}
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.country.fields.name') }}
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.country.fields.short_code') }}
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.country.fields.region') }}
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.country.fields.country_kpi') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($countries as $key => $country)
                        <tr data-entry-id="{{ $country->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $country->id ?? '' }}
                            </td>
                            <td>
                                {{ $country->name ?? '' }}
                            </td>
                            <td>
                                {{ $country->short_code ?? '' }}
                            </td>
                            <td>
                                {{ $country->region ?? '' }}
                            </td>
                            <td>
                                {{ $country->country_kpi ?? '' }}
                            </td>
                            <td>
                                @can('country_access')
                                    <a class="btn btn-xs btn-primary" href="{{ route('countries.show', $country->id) }}">
                                        {{ trans('pqeAdmin::global.view') }}
                                    </a>
                                @endcan

                                @can('country_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('countries.edit', $country->id) }}">
                                        {{ trans('pqeAdmin::global.edit') }}
                                    </a>
                                @endcan

                                @can('country_edit')
                                    <form action="{{ route('countries.destroy', $country->id) }}" method="POST" onsubmit="return confirm('{{ trans('pqeAdmin::global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('pqeAdmin::global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@can('country_edit')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('countries.create') }}">
                {{ trans('pqeAdmin::global.add') }} {{ trans('pqeAdmin::cruds.country.title_singular') }}
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
@can('country_edit')
  let deleteButtonTrans = '{{ trans('pqeAdmin::global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('countries.massDestroy') }}",
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
  let table = $('.datatable-Country:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection