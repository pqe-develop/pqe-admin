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

    // WWS means week working string
    public function getCompanyWWS(Request $request) {
        $company_id = $request->company_id;
        # New Rule Based on start date and resource code id
        $contract = Company::select('week_working_string', 'legal_working_hours')->where('id', $company_id)->first();
        $data = [];
        if ($contract) {
            $data['week_working_string'] = $contract->week_working_string;
            $data['legal_working_hours'] = $contract->legal_working_hours;
            return json_encode($data);
        } else {
            $data['week_working_string'] = '';
            $data['legal_working_hours'] = '';
            return json_encode($data);
        }
    }
}
