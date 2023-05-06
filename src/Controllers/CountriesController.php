<?php

namespace Pqe\Admin\Controllers;

use Pqe\Admin\Models\Country;
use Pqe\Admin\Controllers\Controller;
use Pqe\Admin\Requests\MassDestroyCountryRequest;
use Pqe\Admin\Requests\StoreCountryRequest;
use Pqe\Admin\Requests\UpdateCountryRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CountriesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('country_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::all();

        return view('pqeAdmin::countries.index', compact('countries'));
    }

    public function create()
    {
        abort_if(Gate::denies('country_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pqeAdmin::countries.create');
    }

    public function store(StoreCountryRequest $request)
    {
        Country::create($request->all());

        return redirect()->route('countries.index');
    }

    public function edit(Country $country)
    {
        abort_if(Gate::denies('country_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pqeAdmin::countries.edit', compact('country'));
    }

    public function update(UpdateCountryRequest $request, Country $country)
    {
        $country->update($request->all());

        return redirect()->route('countries.index');
    }

    public function show(Country $country)
    {
        abort_if(Gate::denies('country_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $country->load('countryCurrencies', 'countryCompanies');

        return view('pqeAdmin::countries.show', compact('country'));
    }

    public function destroy(Country $country)
    {
        abort_if(Gate::denies('country_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $country->delete();

        return back();
    }

    public function massDestroy(MassDestroyCountryRequest $request)
    {
        Country::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
