<?php

namespace Pqe\Admin\Controllers;


use App\Http\Requests\StoreVisaTypeRequest;
//use App\Http\Requests\MassDestroyVisaTypeRequest;
use App\Http\Requests\UpdateVisaTypeRequest;
use App\Models\Resource;
use App\Models\VisaType;
use Pqe\Admin\Models\Company;

use Pqe\Admin\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\File;


class VisaTypeController extends Controller
{
  
    public function index() {
        abort_if(Gate::denies('visa_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $visatype = visatype::with('company')->get()->sortBy('title');
        return view('pqeAdmin::visatypes.index', compact('visatype'));
    }

    public function create() {
        abort_if(Gate::denies('visa_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $company = Company::all()->pluck('company', 'id')->prepend(trans('pqeAdmin::global.pleaseSelect'), '');
        return view('pqeAdmin::visatypes.create',compact('company'));
    }

    public function store(StoreVisaTypeRequest $request) {
        VisaType::create($request->all());
        
        return redirect()->route('visatypes.index');
    }

	public function show($id)
    {
        abort_if(Gate::denies('visa_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $visatype = VisaType::with('company')->findOrFail($id);
        return view('pqeAdmin::visatypes.show', compact('visatype'));
    }

    public function edit($id)
    {
        abort_if(Gate::denies('visa_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $visatype = VisaType::with('company')->findOrFail($id);
        $company = Company::all()->pluck('company', 'id')->prepend(trans('pqeAdmin::global.pleaseSelect'), '');
        return view('pqeAdmin::visatypes.edit', compact('visatype','company'));
    }

    public function update(UpdateVisaTypeRequest $request, $id)
    {
        $visatype = VisaType::findOrFail($id);
        $visatype->update($request->all());
        return redirect()->route('visatypes.index');
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('visa_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        VisaType::findOrFail($id)->delete();

        return redirect()->route('visatypes.index');
    }

}