<?php

namespace Pqe\Admin\Controllers;

use Pqe\Admin\Models\AuditLog;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AuditLogsController extends Controller {

    public function index(Request $request) {
        abort_if(Gate::denies('audit_log_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AuditLog::query()->select(sprintf('%s.*', (new AuditLog())->table));

            // only modules enabled
            $abilityQuery = $this->getTableFromPermission();

            $query = $query->whereIn('subject_type', $abilityQuery);

            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions',
                    function ($row) {
                $viewGate = 'audit_log_access';
                        $editGate = '';
                        $deleteGate = '';
                $duplicateGate = '';
                $crudRoutePart = 'audit-logs';

                return view('pqeAdmin::partials.datatablesActions',
                                compact('viewGate', 'editGate', 'deleteGate', 'duplicateGate', 'crudRoutePart', 'row'));
            });

            $table->editColumn('code', function ($row) {
                return $row->code ? $row->code : "";
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : "";
            });
            $table->editColumn('subject_id', function ($row) {
                return $row->subject_id ? $row->subject_id : "";
            });
            $table->editColumn('subject_type', function ($row) {
                return $row->subject_type ? $row->subject_type : "";
            });
            $table->editColumn('user_name', function ($row) {
                return $row->user_name ? $row->user_name : "";
            });
            $table->editColumn('properties', function ($row) {
                return $row->properties ? $row->properties : "";
            });
            $table->editColumn('host', function ($row) {
                return $row->host ? $row->host : "";
            });
            $table->editColumn('created_at', function ($row) {
                return $row->created_at ? $row->created_at : "";
            });

            $table->rawColumns([
                'actions',
                'placeholder'
            ]);

            return $table->make(true);
        }

        return view('pqeAdmin::auditLogs.index');
    }

    public function show(AuditLog $auditLog) {
        abort_if(Gate::denies('audit_log_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pqeAdmin::auditLogs.show', compact('auditLog'));
    }

    private function getTableFromPermission() {
        $table = array(
            'audit_log' => 'audit_logs',
            'benefit' => 'benefits',
            'benefit_type' => 'benefit_type',
            'companies_bank_holiday' => 'companies_bank_holidays',
            'company' => 'companies',
            'contract' => 'contracts',
            'country' => 'countries',
            'course' => 'hse_courses',
            'currency' => 'currencies',
            'currency_history' => 'currency_histories',
            'dpi_assign' => 'hse_dpi_assig',
            'dropdown' => 'dropdowns',
            'education' => 'education',
            'grading' => 'grading',
            'highest_degree' => 'highest_degree',
            'job_experience' => 'job_experiences',
            'job_grade' => 'job_grades',
            'language' => 'languages',
            'medical_check' => 'hse_medical_check',
            'partner' => 'partners',
            'partner_level' => 'partner_levels',
            'permission' => 'permissions',
            'presentation' => 'presentations',
            'professionals_ass' => 'professionals_ass',
            'publications' => 'publications',
            'resource' => 'resources',
            'role' => 'roles',
            'salary' => 'salaries',
            'team' => 'teams',
            'training' => 'trainings',
            'unilav' => 'hse_unilav',
            'user' => 'users',
        );
        $abilityQuery = array();
        $abilities = Gate::abilities();
        foreach ($abilities as $ability => $params) {
            $params = $params;
            $pos = strpos($ability, '_access');
            if ($pos !== false) {
                $perm = str_replace('_access', '', $ability);
                if (isset($table[$perm])) {
                    array_push($abilityQuery, $table[$perm]);
}
                if ($perm == 'contract') {
                    array_push($abilityQuery, 'contract_details');
}
            }
        }
        return $abilityQuery;
    }
}

