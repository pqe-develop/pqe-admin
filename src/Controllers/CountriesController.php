<?php

namespace Pqe\Admin\Controllers;

use Pqe\Admin\Models\Country;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CountriesController extends Controller {

    public function index() {
        abort_if(Gate::denies('country_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::all();

        return view('pqeAdmin::countries.index', compact('countries'));
    }

    public function show(Country $country) {
        abort_if(Gate::denies('country_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $country->load('countryCurrencies', 'countryCompanies');

        return view('pqeAdmin::countries.show', compact('country'));
    }

}
