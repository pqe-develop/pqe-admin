<?php

namespace Pqe\Admin\Controllers;

use Pqe\Admin\Models\Country;
use Pqe\Admin\Models\Currency;
use Pqe\Admin\Controllers\Controller;
use Pqe\Admin\Requests\MassDestroyCurrencyRequest;
use Pqe\Admin\Requests\StoreCurrencyRequest;
use Pqe\Admin\Requests\UpdateCurrencyRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CurrenciesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('currency_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currencies = Currency::all()->sortBy('code');

        return view('pqeAdmin::currencies.index', compact('currencies'));
    }

    public function create()
    {
        abort_if(Gate::denies('currency_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::all()->pluck('name', 'id')->prepend(trans('pqeAdmin::global.pleaseSelect'), '');

        return view('pqeAdmin::currencies.create', compact('countries'));
    }

    public function store(StoreCurrencyRequest $request)
    {
        Currency::create($request->all());

        return redirect()->route('currencies.index');
    }

    public function edit(Currency $currency)
    {
        abort_if(Gate::denies('currency_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::all()->pluck('name', 'id')->prepend(trans('pqeAdmin::global.pleaseSelect'), '');

        $currency->load('country');

        return view('pqeAdmin::currencies.edit', compact('countries', 'currency'));
    }

    public function update(UpdateCurrencyRequest $request, Currency $currency)
    {
        $currency->update($request->all());

        return redirect()->route('currencies.index');
    }

    public function show(Currency $currency)
    {
        abort_if(Gate::denies('currency_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currency->load('country', 'currencyCurrencyHistories');

        return view('pqeAdmin::currencies.show', compact('currency'));
    }

    public function destroy(Currency $currency)
    {
        abort_if(Gate::denies('currency_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currency->delete();

        return back();
    }

    public function massDestroy(MassDestroyCurrencyRequest $request)
    {
        Currency::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
