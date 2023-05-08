<?php

namespace Pqe\Admin\Controllers;

use Pqe\Admin\Models\JobGrade;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class JobGradesController extends Controller {

    public function index() {
        abort_if(Gate::denies('job_grade_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobGrades = JobGrade::all();

        return view('pqeAdmin::jobGrades.index', compact('jobGrades'));
    }

    public function show(JobGrade $jobGrade) {
        abort_if(Gate::denies('job_grade_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pqeAdmin::jobGrades.show', compact('jobGrade'));
    }
}
