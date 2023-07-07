@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('pqeAdmin::global.show') }} {{ trans('pqeAdmin::cruds.company.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-warning" href="{{ route('companies.index') }}">
                    {{ trans('pqeAdmin::global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.company.fields.id') }}
                        </th>
                        <td>
                            {{ $company->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.company.fields.company') }}
                        </th>
                        <td>
                            {{ $company->company }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.company.fields.company_name') }}
                        </th>
                        <td>
                            {{ $company->company_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.company.fields.currency') }}
                        </th>
                        <td>
                            {{ $company->currency->code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.company.fields.invoice_prefix') }}
                        </th>
                        <td>
                            {{ $company->invoice_prefix }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.company.fields.project_prefix') }}
                        </th>
                        <td>
                            {{ $company->project_prefix }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.company.fields.legal_working_hours') }}
                        </th>
                        <td>
                            {{ $company->legal_working_hours }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.company.fields.monthly_instalments') }}
                        </th>
                        <td>
                            {{ $company->monthly_instalments }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.company.fields.country') }}
                        </th>
                        <td>
                            @foreach($company->countries as $key => $country)
                                <span class="label label-info">{{ $country->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.company.fields.suite_id') }}
                        </th>
                        <td>
                            {{ $company->suite_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.company.fields.reimb_km') }}
                        </th>
                        <td>
                            {{ $company->reimb_km }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.company.fields.order_number') }}
                        </th>
                        <td>
                            {{ $company->order_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.company.fields.week_working_string') }}
                        </th>
                        <td>
                            {{ $company->week_working_string }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.company.fields.team') }}
                        </th>
                        <td>
                            {{ $company->team->name ?? ''}}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-warning" href="{{ route('companies.index') }}">
                    {{ trans('pqeAdmin::global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('pqeAdmin::global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#company_companies_bank_holidays" role="tab" data-toggle="tab">
                {{ trans('pqeAdmin::cruds.companiesBankHoliday.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="company_companies_bank_holidays">
            @includeIf('companies.relationships.companyCompaniesBankHolidays', ['companiesBankHolidays' => $company->companyCompaniesBankHolidays])
        </div>
    </div>
</div>

@endsection
