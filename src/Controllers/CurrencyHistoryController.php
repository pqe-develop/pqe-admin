<?php

namespace Pqe\Admin\Controllers;

use Pqe\Admin\Models\Currency;
use Pqe\Admin\Models\CurrencyHistory;
use Pqe\Admin\Controllers\Controller;
use Pqe\Admin\Requests\MassDestroyCurrencyHistoryRequest;
use Pqe\Admin\Requests\StoreCurrencyHistoryRequest;
use Pqe\Admin\Requests\UpdateCurrencyHistoryRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CurrencyHistoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('currency_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currencyHistories = CurrencyHistory::all();

        $currencies = Currency::get()->pluck('code')->toArray();

        return view('pqeAdmin::currencyHistories.index', compact('currencyHistories', 'currencies'));
    }

    public function create()
    {
        abort_if(Gate::denies('currency_history_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currencies = Currency::all()->sortBy('code')->pluck('code', 'id')->prepend(trans('pqeAdmin::global.pleaseSelect'), '');

        return view('pqeAdmin::currencyHistories.create', compact('currencies'));
    }

    public function store(StoreCurrencyHistoryRequest $request)
    {
        CurrencyHistory::create($request->all());

        return redirect()->route('currency-histories.index');
    }

    public function edit(CurrencyHistory $currencyHistory)
    {
        abort_if(Gate::denies('currency_history_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currencies = Currency::all()->sortBy('code')->pluck('code', 'id')->prepend(trans('pqeAdmin::global.pleaseSelect'), '');

        $currencyHistory->load('currency');

        return view('pqeAdmin::currencyHistories.edit', compact('currencies', 'currencyHistory'));
    }

    public function update(UpdateCurrencyHistoryRequest $request, CurrencyHistory $currencyHistory)
    {
        $currencyHistory->update($request->all());

        return redirect()->route('currency-histories.index');
    }

    public function show(CurrencyHistory $currencyHistory)
    {
        abort_if(Gate::denies('currency_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currencyHistory->load('currency');

        return view('pqeAdmin::currencyHistories.show', compact('currencyHistory'));
    }

    public function destroy(CurrencyHistory $currencyHistory)
    {
        abort_if(Gate::denies('currency_history_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currencyHistory->delete();

        return back();
    }

    public function massDestroy(MassDestroyCurrencyHistoryRequest $request)
    {
        CurrencyHistory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
