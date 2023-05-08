<?php

namespace Pqe\Admin\Controllers;

use Pqe\Admin\Models\Currency;
use Pqe\Admin\Models\CurrencyHistory;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CurrencyHistoryController extends Controller {

    public function index() {
        abort_if(Gate::denies('currency_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currencyHistories = CurrencyHistory::all();

        $currencies = Currency::get()->pluck('code')->toArray();

        return view('pqeAdmin::currencyHistories.index', compact('currencyHistories', 'currencies'));
    }

    public function show(CurrencyHistory $currencyHistory) {
        abort_if(Gate::denies('currency_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currencyHistory->load('currency');

        return view('pqeAdmin::currencyHistories.show', compact('currencyHistory'));
    }

}
