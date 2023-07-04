<?php

namespace Pqe\Admin\Controllers;

use Pqe\Admin\Models\Company;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompaniesController extends Controller {

    public function index() {
        abort_if(Gate::denies('company_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companies = Company::all();

        return view('pqeAdmin::companies.index', compact('companies'));
    }

    public function show(Company $company) {
        abort_if(Gate::denies('company_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $company->load('currency', 'countries', 'companyCompaniesBankHolidays', 'team');

        return view('pqeAdmin::companies.show', compact('company'));
    }

}
