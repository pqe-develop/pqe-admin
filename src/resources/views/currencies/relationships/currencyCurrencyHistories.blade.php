<div class="m-3">
    <div class="card">
        <div class="card-header">
            {{ trans('pqeAdmin::cruds.currencyHistory.title_singular') }} {{ trans('pqeAdmin::global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-currencyCurrencyHistories">
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
</div>
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
  let table = $('.datatable-currencyCurrencyHistories:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
