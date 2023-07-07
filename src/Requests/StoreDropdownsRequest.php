<?php

namespace Pqe\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDropdownsRequest extends FormRequest {

    public function authorize() {
        // abort_if(Gate::denies('team_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return true;
    }

    public function rules() {
        return [
            'dropdown' => [
                'required',
            ],
            'name' => [
                'required',
            ],
        ];
    }
}
