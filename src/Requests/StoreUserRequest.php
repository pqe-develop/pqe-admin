<?php

namespace Pqe\Admin\Requests;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreUserRequest extends FormRequest {

    public function authorize() {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules() {
        return [
            'username' => [
                'min:3',
                'max:10',
                'required'],
            'name' => [
                'required'],
            'status' => [
                'required'],
            'password' => [
                'required'],
            'roles.*' => [
                'integer'],
            'roles' => [
                'array']];
    }
}
