<?php

namespace Pqe\Admin\Controllers;

use Pqe\Admin\Models\AuditLog;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AuditLogsController extends Controller {

    public function index(Request $request) {
        abort_if(Gate::denies('audit_log_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AuditLog::query()->select(sprintf('%s.*', (new AuditLog())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'audit_log_access';
                $editGate = 'audit_log_edit';
                $deleteGate = 'audit_log_edit';
                $duplicateGate = '';
                $crudRoutePart = 'audit-logs';

                return view('pqeAdmin::partials.datatablesActions', compact('viewGate', 'editGate', 'deleteGate', 'duplicateGate', 'crudRoutePart', 'row'));
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
                'placeholder']);

            return $table->make(true);
        }

        return view('pqeAdmin::auditLogs.index');
    }

    public function show(AuditLog $auditLog) {
        abort_if(Gate::denies('audit_log_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pqeAdmin::auditLogs.show', compact('auditLog'));
    }
}
