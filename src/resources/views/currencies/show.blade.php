@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('pqeAdmin::global.show') }} {{ trans('pqeAdmin::cruds.currency.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-warning" href="{{ route('currencies.index') }}">
                    {{ trans('pqeAdmin::global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.currency.fields.id') }}
                        </th>
                        <td>
                            {{ $currency->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.currency.fields.code') }}
                        </th>
                        <td>
                            {{ $currency->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.currency.fields.description') }}
                        </th>
                        <td>
                            {{ $currency->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.currency.fields.symbol') }}
                        </th>
                        <td>
                            {{ $currency->symbol }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.currency.fields.country') }}
                        </th>
                        <td>
                            {{ $currency->country->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.currency.fields.order_number') }}
                        </th>
                        <td>
                            {{ $currency->order_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('pqeAdmin::cruds.currency.fields.decimal_digits') }}
                        </th>
                        <td>
                            {{ $currency->decimal_digits }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-warning" href="{{ route('currencies.index') }}">
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
            <a class="nav-link" href="#currency_currency_histories" role="tab" data-toggle="tab">
                {{ trans('pqeAdmin::cruds.currencyHistory.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="currency_currency_histories">
            @includeIf('currencies.relationships.currencyCurrencyHistories', ['currencyHistories' => $currency->currencyCurrencyHistories])
        </div>
    </div>
</div>

@endsection