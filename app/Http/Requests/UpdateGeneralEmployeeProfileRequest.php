<?php

namespace App\Http\Requests;

use App\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UpdateGeneralEmployeeProfileRequest extends FormRequest
{
    public function authorize()
    {
//        abort_if(Gate::denies('seeker_account'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'    => [
                'required',
                'string',
                'regex:/^[a-zA-Z ]+$/u',
                'min:3',
                'max:10',
                'unique:users,name,' . Auth::user()->id,
            ],
            'last_name'    => [
                'required',
                'string',
                'regex:/^[a-zA-Z ]+$/u',
                'min:3',
                'max:10',
                'unique:users,last_name,' . Auth::user()->id,
            ],
            'facebook'   => [
                'nullable',
                'string',
            ],
            'instagram'   => [
                'nullable',
                'string',
            ],
            'linkedin'   => [
                'nullable',
                'string',
            ],
            'twitter'   => [
                'nullable',
                'string',
            ],
            'category_id'   => [
                'required',
                'integer',
            ],
            'country_id'   => [
                'required',
                'integer',
            ],
            'phone'   => [
                'required',
                'string',
                'regex:/^[0-9]+$/u',
            ],
        ];
    }
}
