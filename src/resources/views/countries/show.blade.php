@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('pqeAdmin::global.show') }} {{ trans('pqeAdmin::cruds.country.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('countries.index') }}">
                    {{ trans('pqeAdmin::global.back_to_list') }}
                </a>

            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.country.fields.id') }}
                        </th>
                        <td>
                            {{ $country->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.country.fields.name') }}
                        </th>
                        <td>
                            {{ $country->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.country.fields.short_code') }}
                        </th>
                        <td>
                            {{ $country->short_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.country.fields.region') }}
                        </th>
                        <td>
                            {{ $country->region }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.country.fields.country_kpi') }}
                        </th>
                        <td>
                            {{ $country->country_kpi }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('countries.index') }}">
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
            <a class="nav-link" href="#country_currencies" role="tab" data-toggle="tab">
                {{ trans('pqeAdmin::cruds.currency.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#country_companies" role="tab" data-toggle="tab">
                {{ trans('pqeAdmin::cruds.company.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="country_currencies">
            @includeIf('countries.relationships.countryCurrencies', ['currencies' => $country->countryCurrencies])
        </div>
        <div class="tab-pane" role="tabpanel" id="country_companies">
            @includeIf('countries.relationships.countryCompanies', ['companies' => $country->countryCompanies])
        </div>
    </div>
</div>

@endsection
