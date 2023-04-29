<?php

namespace App\Http\Requests;

use App\Employee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UpdateResumeEmployeeProfileRequest extends FormRequest
{
    public function authorize()
    {
//        abort_if(Gate::denies('seeker_account'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'resumePC'    => [
                'required',
                'file',
                'mimes:pdf',
                'max:2048',
            ],
        ];
    }
}
