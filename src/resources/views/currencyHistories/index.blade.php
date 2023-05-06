@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('pqeAdmin::cruds.currencyHistory.title_singular') }} {{ trans('pqeAdmin::global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CurrencyHistory">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('pqeAdmin::cruds.currencyHistory.fields.id') }}
                    </th>
                    <th>
                        {{ trans('pqeAdmin::cruds.currencyHistory.fields.currency') }}
                    </th>
                    <th>
                        {{ trans('pqeAdmin::cruds.currencyHistory.fields.date_validity') }}
                    </th>
                    <th>
                        {{ trans('pqeAdmin::cruds.currencyHistory.fields.conversion_rate') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('pqeAdmin::global.search') }}">
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('pqeAdmin::global.all') }}</option>
                            @foreach($currencies as $key => $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('pqeAdmin::global.search') }}">
                    </td>
                    <td>
                    </td>
                </tr>
            </thead>
                <tbody>
                    @foreach($currencyHistories as $key => $currencyHistory)
                        <tr data-entry-id="{{ $currencyHistory->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $currencyHistory->id ?? '' }}
                            </td>
                            <td>
                                {{ $currencyHistory->currency->code ?? '' }}
                            </td>
                            <td>
                                {{ $currencyHistory->date_validity ?? '' }}
                            </td>
                            <td>
                                {{ $currencyHistory->conversion_rate ?? '' }}
                            </td>
                            <td>
                                @can('currency_history_access')
                                    <a class="btn btn-xs btn-primary" href="{{ route('currency-histories.show', $currencyHistory->id) }}">
                                        {{ trans('pqeAdmin::global.view') }}
                                    </a>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
    </div>
</div>


@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 2, 'asc' ]],
	pageLength: {{ trans('pqeAdmin::config.pgLen') }},
	lengthMenu: [[ {{ trans('pqeAdmin::config.lenMenu') }} ], [ {{ trans('pqeAdmin::config.desMenu') }}, "All" ]]
  });
  let table = $('.datatable-CurrencyHistory:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  $('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value
      table
        .column($(this).parent().index())
        .search(value, strict)
        .draw()
  });
})

</script>
@endsection
