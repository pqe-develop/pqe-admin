<?php

namespace Pqe\Admin\Requests;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserAlertRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('user_alert_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [];
    }
}
