@extends('pqeAdmin::layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('pqeAdmin::cruds.company.title_singular') }} {{ trans('pqeAdmin::global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Company">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            &nbsp;
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.company.fields.company') }}
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.company.fields.company_name') }}
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.company.fields.currency') }}
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.company.fields.invoice_prefix') }}
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.company.fields.project_prefix') }}
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.company.fields.legal_working_hours') }}
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.company.fields.week_working_string') }}
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.company.fields.monthly_instalments') }}
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.company.fields.reimb_km') }}
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.company.fields.order_number') }}
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.company.fields.country') }}
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.company.fields.suite_id') }}
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.company.fields.team') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $key => $company)
                        <tr data-entry-id="{{ $company->id }}">
                            <td>

                            </td>
                            <td>
                                @can('company_access')
                                    <a class="btn btn-xs btn-primary" href="{{ route('companies.show', $company->id) }}">
                                        {{ trans('pqeAdmin::global.view') }}
                                    </a>
                                @endcan

                                @can('company_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('companies.edit', $company->id) }}">
                                        {{ trans('pqeAdmin::global.edit') }}
                                    </a>
                                @endcan

                                @can('company_edit')
                                    <form action="{{ route('companies.destroy', $company->id) }}" method="POST" onsubmit="return confirm('{{ trans('pqeAdmin::global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('pqeAdmin::global.delete') }}">
                                    </form>
                                @endcan

                            </td>
                            <td>
                                {{ $company->company ?? '' }}
                            </td>
                            <td>
                                {{ $company->company_name ?? '' }}
                            </td>
                            <td>
                                {{ $company->currency->code ?? '' }}
                            </td>
                            <td>
                                {{ $company->invoice_prefix ?? '' }}
                            </td>
                            <td>
                                {{ $company->project_prefix ?? '' }}
                            </td>
                            <td>
                                {{ $company->legal_working_hours ?? '' }}
                            </td>
                            <td>
                                {{ $company->week_working_string ?? '' }}
                            </td>
                            <td>
                                {{ $company->monthly_instalments ?? '' }}
                            </td>
                            <td>
                                {{ $company->reimb_km ?? '' }}
                            </td>
                            <td>
                                {{ $company->order_number ?? '' }}
                            </td>
                            <td>
                                @foreach($company->countries as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $company->suite_id ?? '' }}
                            </td>

                            <td>
                                {{ $company->team->name ?? '' }}
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@can('company_edit')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('companies.create') }}">
                {{ trans('pqeAdmin::global.add') }} {{ trans('pqeAdmin::cruds.company.title_singular') }}
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
@can('company_edit')
  let deleteButtonTrans = '{{ trans('pqeAdmin::global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('companies.massDestroy') }}",
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
    order: [[ 11	, 'asc' ]],
	pageLength: {{ trans('pqeAdmin::config.pgLen') }},
	lengthMenu: [[ {{ trans('pqeAdmin::config.lenMenu') }} ], [ {{ trans('pqeAdmin::config.desMenu') }}, "All" ]]
  });
  let table = $('.datatable-Company:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection