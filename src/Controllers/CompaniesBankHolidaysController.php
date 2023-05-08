<?php

namespace Pqe\Admin\Controllers;

use Pqe\Admin\Models\CompaniesBankHoliday;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CompaniesBankHolidaysController extends Controller {

    public function index() {
        abort_if(Gate::denies('companies_bank_holiday_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companiesBankHolidays = CompaniesBankHoliday::all();

        return view('pqeAdmin::companiesBankHolidays.index', compact('companiesBankHolidays'));
    }

    public function show(CompaniesBankHoliday $companiesBankHoliday) {
        abort_if(Gate::denies('companies_bank_holiday_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companiesBankHoliday->load('company');

        return view('pqeAdmin::companiesBankHolidays.show', compact('companiesBankHoliday'));
    }

}
