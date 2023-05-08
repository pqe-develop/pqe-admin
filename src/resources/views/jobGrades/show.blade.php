@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('pqeAdmin::global.show') }} {{ trans('pqeAdmin::cruds.jobGrade.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                @if ((strpos(url()->previous(), 'create') === false) && (strpos(url()->previous(), 'duplicate') === false))
                <a class="btn btn-default" onClick="history.go(-1);return true;">
                    {{ trans('pqeAdmin::global.back') }}
                </a>
                @endif
                <a class="btn btn-info" href="{{ route('job-grades.index') }}">
                    {{ trans('pqeAdmin::global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.jobGrade.fields.id') }}
                        </th>
                        <td>
                            {{ $jobGrade->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.jobGrade.fields.job_grade_name') }}
                        </th>
                        <td>
                            {{ $jobGrade->job_grade_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.jobGrade.fields.job_grade') }}
                        </th>
                        <td>
                            {{ Pqe\Admin\Utils\Dropdowns::JOB_GRADE_SELECT[$jobGrade->job_grade] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.jobGrade.fields.job_level') }}
                        </th>
                        <td>
                            {{ Pqe\Admin\Utils\Dropdowns::JOB_LEVEL_SELECT[$jobGrade->job_level] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                @if ((strpos(url()->previous(), 'create') === false) && (strpos(url()->previous(), 'duplicate') === false))
                <a class="btn btn-default" onClick="history.go(-1);return true;">
                    {{ trans('pqeAdmin::global.back') }}
                </a>
                @endif
                <a class="btn btn-info" href="{{ route('job-grades.index') }}">
                    {{ trans('pqeAdmin::global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection