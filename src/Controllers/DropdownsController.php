<?php

namespace Pqe\Admin\Controllers;

use Pqe\Admin\Models\Dropdowns;
use Pqe\Admin\Requests\MassDestroyDropdownsRequest;
use Pqe\Admin\Requests\StoreDropdownsRequest;
use Pqe\Admin\Requests\UpdateDropdownsRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class DropdownsController extends Controller {
    
    public function index() {
        abort_if(Gate::denies('dropdown_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $dropdowns = Dropdowns::all()->sortBy('title');
        
        return view('pqeAdmin::dropdowns.index', compact('dropdowns'));
    }
    
    public function create() {
        abort_if(Gate::denies('dropdown_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        return view('pqeAdmin::dropdowns.create');
    }
    
    public function store(StoreDropdownsRequest $request) {
        Dropdowns::create($request->all());
        
        return redirect()->route('dropdowns.index');
    }
    
    public function edit(Dropdowns $dropdown) {
        abort_if(Gate::denies('dropdown_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        return view('pqeAdmin::dropdowns.edit', compact('dropdown'));
    }
    
    public function update(UpdateDropdownsRequest $request, Dropdowns $dropdown) {
        $dropdown->update($request->all());
        
        return redirect()->route('dropdowns.index');
    }
    
    public function show(Dropdowns $dropdown) {
        abort_if(Gate::denies('dropdown_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        return view('pqeAdmin::dropdowns.show', compact('dropdown'));
    }
    
    public function destroy(Dropdowns $dropdown) {
        abort_if(Gate::denies('dropdown_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $dropdown->delete();
        
        return back();
    }
    
    public function massDestroy(MassDestroyDropdownsRequest $request) {
        Dropdowns::whereIn('id', request('ids'))->delete();
        
        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function getDropdownValues(Request $request)
    {
        $dropdown = $request->input('dropdown');
        $filterValue = $request->input('filter');

        // Query the database for the dependent values based on the Filter (key)
        $dependentValues = Dropdowns::where('dd_filter', $filterValue)->where('dropdown', $dropdown)
            ->pluck('label', 'name')
            ->toArray();

        // Return the dependent values as JSON response
        return response()->json($dependentValues);
    }
}
