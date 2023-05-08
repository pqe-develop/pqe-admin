@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('pqeAdmin::cruds.currencyHistory.title_singular') }} {{ trans('pqeAdmin::global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover">
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

@endsection
