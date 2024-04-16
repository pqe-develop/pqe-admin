<?php

namespace Pqe\Admin\Controllers;

use Pqe\Admin\Models\KafkaJobs;
use Pqe\Admin\Requests\MassDestroyKafkaJobsRequest;
use Pqe\Admin\Requests\StoreKafkaJobsRequest;
use Pqe\Admin\Requests\UpdateKafkaJobsRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class KafkaJobsController extends Controller {
    
    public function index() {
        abort_if(Gate::denies('kafkaJobs_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $kafkaJobs = KafkaJobs::all()->sortBy('name');
        
        return view('pqeAdmin::kafkaJobs.index', compact('kafkaJobs'));
    }
    
    public function create() {
        abort_if(Gate::denies('kafkaJobs_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        return view('pqeAdmin::kafkaJobs.create');
    }
    
    public function store(StoreKafkaJobsRequest $request) {
        KafkaJobs::create($request->all());
        
        return redirect()->route('kafkaJobs.index');
    }
    
    public function edit(KafkaJobs $team) {
        abort_if(Gate::denies('kafkaJobs_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        return view('pqeAdmin::kafkaJobs.edit', compact('team'));
    }
    
    public function update(UpdateKafkaJobsRequest $request, KafkaJobs $team) {
        $team->update($request->all());
        
        return redirect()->route('kafkaJobs.index');
    }
    
    public function show(KafkaJobs $team) {
        abort_if(Gate::denies('kafkaJobs_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        return view('pqeAdmin::kafkaJobs.show', compact('team'));
    }
    
    public function destroy(KafkaJobs $team) {
        abort_if(Gate::denies('kafkaJobs_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $team->delete();
        
        return back();
    }
    
    public function massDestroy(MassDestroyKafkaJobsRequest $request) {
        KafkaJobs::whereIn('id', request('ids'))->delete();
        
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
