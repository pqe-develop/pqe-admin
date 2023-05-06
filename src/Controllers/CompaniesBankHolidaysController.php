<?php

namespace Pqe\Admin\Controllers;

use Pqe\Admin\Models\CompaniesBankHoliday;
use Pqe\Admin\Models\Company;
use Pqe\Admin\Requests\MassDestroyCompaniesBankHolidayRequest;
use Pqe\Admin\Requests\StoreCompaniesBankHolidayRequest;
use Pqe\Admin\Requests\UpdateCompaniesBankHolidayRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CompaniesBankHolidaysController extends Controller {

    public function index() {
        abort_if(Gate::denies('companies_bank_holiday_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companiesBankHolidays = CompaniesBankHoliday::all();

        return view('pqeAdmin::companiesBankHolidays.index', compact('companiesBankHolidays'));
    }

    public function create() {
        abort_if(Gate::denies('companies_bank_holiday_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companies = Company::all()->pluck('company', 'id')->prepend(trans('pqeAdmin::global.pleaseSelect'), '');

        return view('pqeAdmin::companiesBankHolidays.create', compact('companies'));
    }

    public function store(StoreCompaniesBankHolidayRequest $request) {
        CompaniesBankHoliday::create($request->all());

        return redirect()->route('tables.companies-bank-holidays.index');
    }

    public function edit(CompaniesBankHoliday $companiesBankHoliday) {
        abort_if(Gate::denies('companies_bank_holiday_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companies = Company::all()->pluck('company', 'id')->prepend(trans('pqeAdmin::global.pleaseSelect'), '');

        $companiesBankHoliday->load('company');

        return view('pqeAdmin::companiesBankHolidays.edit', compact('companies', 'companiesBankHoliday'));
    }

    public function update(UpdateCompaniesBankHolidayRequest $request, CompaniesBankHoliday $companiesBankHoliday) {
        $companiesBankHoliday->update($request->all());

        return redirect()->route('tables.companies-bank-holidays.index');
    }

    public function show(CompaniesBankHoliday $companiesBankHoliday) {
        abort_if(Gate::denies('companies_bank_holiday_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companiesBankHoliday->load('company');

        return view('pqeAdmin::companiesBankHolidays.show', compact('companiesBankHoliday'));
    }

    public function destroy(CompaniesBankHoliday $companiesBankHoliday) {
        abort_if(Gate::denies('companies_bank_holiday_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companiesBankHoliday->delete();

        return back();
    }

    public function massDestroy(MassDestroyCompaniesBankHolidayRequest $request) {
        CompaniesBankHoliday::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
