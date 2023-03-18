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
            'country_id'    => [
                'required',
                'integer',
            ],
            'phone'    => [
                'required',
                'numeric',
                'unique:users',
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
