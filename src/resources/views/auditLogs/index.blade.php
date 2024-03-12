@extends('pqeAdmin::layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('pqeAdmin::cruds.auditLog.title_singular') }} {{ trans('pqeAdmin::global.list') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped table-hover ajaxTable datatable datatable-AuditLog">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        &nbsp;
                    </th>
                    <th>
                        {{ trans('pqeAdmin::cruds.auditLog.fields.code') }}
                    </th>
                    <th>
                        {{ trans('pqeAdmin::cruds.auditLog.fields.description') }}
                    </th>
                    <th>
                        {{ trans('pqeAdmin::cruds.auditLog.fields.subject_id') }}
                    </th>
                    <th>
                        {{ trans('pqeAdmin::cruds.auditLog.fields.subject_type') }}
                    </th>
                    <th>
                        {{ trans('pqeAdmin::cruds.auditLog.fields.user_name') }}
                    </th>
                    <th>
                        {{ trans('pqeAdmin::cruds.auditLog.fields.host') }}
                    </th>
                    <th>
                        {{ trans('pqeAdmin::cruds.auditLog.fields.created_at') }}
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  
  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('audit-logs.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
      { data: 'actions', name: '{{ trans('pqeAdmin::global.actions') }}' },
{ data: 'code', name: 'code' },
{ data: 'description', name: 'description' },
{ data: 'subject_id', name: 'subject_id' },
{ data: 'subject_type', name: 'subject_type' },
{ data: 'user_name', name: 'user_name' },
{ data: 'host', name: 'host' },
{ data: 'created_at', name: 'created_at' },
    ], 
columnDefs: [{
        orderable: false,
        className: 'select-checkbox',
        targets: 0
    }, {
        orderable: false,
        searchable: false,
        targets: 1
    }],
   orderCellsTop: true,
   order: [[ 8, 'DESC' ] ],   //To sort record by CODE
	pageLength: {{ trans('pqeAdmin::config.pgLen') }},
	lengthMenu: [[ {{ trans('pqeAdmin::config.lenMenu') }} ], [ {{ trans('pqeAdmin::config.desMenu') }}, "All" ]]
  };
   let table = $('.datatable-AuditLog').DataTable(dtOverrideGlobals);
$('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection