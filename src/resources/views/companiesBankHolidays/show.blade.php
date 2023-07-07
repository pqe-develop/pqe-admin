@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('pqeAdmin::global.show') }} {{ trans('pqeAdmin::cruds.companiesBankHoliday.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-warning" href="{{ route('companies-bank-holidays.index') }}">
                    {{ trans('pqeAdmin::global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.companiesBankHoliday.fields.id') }}
                        </th>
                        <td>
                            {{ $companiesBankHoliday->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.companiesBankHoliday.fields.company') }}
                        </th>
                        <td>
                            {{ $companiesBankHoliday->company->company ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.companiesBankHoliday.fields.year') }}
                        </th>
                        <td>
                            {{ $companiesBankHoliday->year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.companiesBankHoliday.fields.bank_holiday_date') }}
                        </th>
                        <td>
                            {{ $companiesBankHoliday->bank_holiday_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.companiesBankHoliday.fields.bank_holiday_name') }}
                        </th>
                        <td>
                            {{ $companiesBankHoliday->bank_holiday_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.companiesBankHoliday.fields.bank_holiday_fix') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $companiesBankHoliday->bank_holiday_fix ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-warning" href="{{ route('companies-bank-holidays.index') }}">
                    {{ trans('pqeAdmin::global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection