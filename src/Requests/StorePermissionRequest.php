<?php

namespace Pqe\Admin\Requests;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StorePermissionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'title' => [
                'required',
            ],
        ];
    }
}
