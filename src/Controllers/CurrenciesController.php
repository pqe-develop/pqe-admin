<?php

namespace Pqe\Admin\Controllers;

use Pqe\Admin\Models\Currency;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CurrenciesController extends Controller {

    public function index() {
        abort_if(Gate::denies('currency_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currencies = Currency::all()->sortBy([
            'order_number',
            'full_code'
        ]);

        return view('pqeAdmin::currencies.index', compact('currencies'));
    }

    public function show(Currency $currency) {
        abort_if(Gate::denies('currency_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currency->load('country', 'currencyCurrencyHistories');

        return view('pqeAdmin::currencies.show', compact('currency'));
    }

}
