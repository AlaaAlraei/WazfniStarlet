<?php

namespace App\Http\Requests;

use App\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'     => [
                'required',
                'string',
            ],
            'last_name'     => [
                'nullable',
                'string',
            ],
            'email'    => [
                'required',
                'email',
                'unique:users',
            ],
            'country_key'    => [
                'required',
                'string',
            ],
            'phone'    => [
                'required',
                'numeric',
                'unique:users',
            ],
            'privacy'    => [
                'required',
                'in:0,1',
            ],
            'role'    => [
                'required',
                'in:2,3',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ];
    }
}
