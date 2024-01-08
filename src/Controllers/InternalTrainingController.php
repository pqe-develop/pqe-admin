<?php

namespace Pqe\Admin\Controllers;

use Pqe\Admin\Models\InternalTraining;
use Pqe\Admin\Requests\StoreInternaltraningsRequest;
use Pqe\Admin\Requests\UpdateInternaltraningsRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;


class InternalTrainingController extends Controller {

    public function index() {
        abort_if(Gate::denies('highest_degree_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $internals = InternalTraining::all()->sortBy('training_name');
        return view('pqeAdmin::internalTrainings.index', compact('internals'));
    }

    public function create() {
        abort_if(Gate::denies('highest_degree_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('pqeAdmin::internalTrainings.create');
    }

    public function store(StoreInternaltraningsRequest $request) {

        InternalTraining::create($request->all());

        return redirect()->route('internal-trainings.index');
    }

    public function show($id)
    {
        abort_if(Gate::denies('highest_degree_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
		$internals = InternalTraining::findOrFail($id);
        return view('pqeAdmin::internalTrainings.show', compact('internals'));
    }

    public function edit($id)
    {
        abort_if(Gate::denies('highest_degree_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $internals = InternalTraining::findOrFail($id);
        return view('pqeAdmin::internalTrainings.edit', compact('internals'));
    }

    public function update(UpdateInternaltraningsRequest $request, $id)
    {
        $internals = InternalTraining::findOrFail($id);
        $internals->update($request->all());
        return redirect()->route('internal-trainings.index');
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('highest_degree_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        InternalTraining::findOrFail($id)->delete();

        return redirect()->route('internal-trainings.index');
    }

}
