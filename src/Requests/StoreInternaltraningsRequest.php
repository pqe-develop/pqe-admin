<?php

namespace Pqe\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInternaltraningsRequest extends FormRequest {

    public function authorize() {
        // abort_if(Gate::denies('highest_degree_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return true;
    }

    public function rules() {
        return [
            'training_name' => [
                'required',
            ],
            'training_duration' => [
                'required',
            ],
        ];
    }
}
