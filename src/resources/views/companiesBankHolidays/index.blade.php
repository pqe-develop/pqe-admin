@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('pqeAdmin::cruds.companiesBankHoliday.title_singular') }} {{ trans('pqeAdmin::global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CompaniesBankHoliday">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            &nbsp;
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.companiesBankHoliday.fields.company') }}
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.companiesBankHoliday.fields.year') }}
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.companiesBankHoliday.fields.bank_holiday_date') }}
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.companiesBankHoliday.fields.bank_holiday_name') }}
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.companiesBankHoliday.fields.bank_holiday_fix') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companiesBankHolidays as $key => $companiesBankHoliday)
                        <tr data-entry-id="{{ $companiesBankHoliday->id }}">
                            <td>

                            </td>
                            <td>
                                @can('companies_bank_holiday_access')
                                    <a class="btn btn-xs btn-primary" href="{{ route('companies-bank-holidays.show', $companiesBankHoliday->id) }}">
                                        {{ trans('pqeAdmin::global.view') }}
                                    </a>
                                @endcan

                                @can('companies_bank_holiday_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('companies-bank-holidays.edit', $companiesBankHoliday->id) }}">
                                        {{ trans('pqeAdmin::global.edit') }}
                                    </a>
                                @endcan

                                @can('companies_bank_holiday_edit')
                                    <form action="{{ route('companies-bank-holidays.destroy', $companiesBankHoliday->id) }}" method="POST" onsubmit="return confirm('{{ trans('pqeAdmin::global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('pqeAdmin::global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                            <td>
                                {{ $companiesBankHoliday->company->company ?? '' }}
                            </td>
                            <td>
                                {{ $companiesBankHoliday->year ?? '' }}
                            </td>
                            <td>
                                {{ $companiesBankHoliday->bank_holiday_date ?? '' }}
                            </td>
                            <td>
                                {{ $companiesBankHoliday->bank_holiday_name ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $companiesBankHoliday->bank_holiday_fix ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $companiesBankHoliday->bank_holiday_fix ? 'checked' : '' }}>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@can('companies_bank_holiday_edit')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('companies-bank-holidays.create') }}">
                {{ trans('pqeAdmin::global.add') }} {{ trans('pqeAdmin::cruds.companiesBankHoliday.title_singular') }}
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
@can('companies_bank_holiday_edit')
  let deleteButtonTrans = '{{ trans('pqeAdmin::global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('companies-bank-holidays.massDestroy') }}",
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
  let table = $('.datatable-CompaniesBankHoliday:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection