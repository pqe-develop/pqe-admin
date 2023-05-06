@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('pqeAdmin::cruds.jobGrade.title_singular') }} {{ trans('pqeAdmin::global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-JobGrade">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.jobGrade.fields.id') }}
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.jobGrade.fields.job_grade_name') }}
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.jobGrade.fields.job_grade') }}
                        </th>
                        <th>
                            {{ trans('pqeAdmin::cruds.jobGrade.fields.job_level') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobGrades as $key => $jobGrade)
                        <tr data-entry-id="{{ $jobGrade->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $jobGrade->id ?? '' }}
                            </td>
                            <td>
                                {{ $jobGrade->job_grade_name ?? '' }}
                            </td>
                            <td>
                                {{ App\Utils\Dropdowns::JOB_GRADE_SELECT[$jobGrade->job_grade] ?? '' }}
                            </td>
                            <td>
                                {{ App\Utils\Dropdowns::JOB_LEVEL_SELECT[$jobGrade->job_level] ?? '' }}
                            </td>
                            <td>
                                @can('job_grade_access')
                                    <a class="btn btn-xs btn-primary" href="{{ route('job-grades.show', $jobGrade->id) }}">
                                        {{ trans('pqeAdmin::global.view') }}
                                    </a>
                                @endcan

                                @can('job_grade_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('job-grades.edit', $jobGrade->id) }}">
                                        {{ trans('pqeAdmin::global.edit') }}
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
  let table = $('.datatable-JobGrade:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection