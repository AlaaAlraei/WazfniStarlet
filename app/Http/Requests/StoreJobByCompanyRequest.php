<?php

namespace App\Http\Requests;

use App\Job;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreJobByCompanyRequest extends FormRequest
{
    public function authorize()
    {
//        abort_if(Gate::denies('business_account'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'title'        => [
                'required',
            ],
            'company_id'   => [
                'required',
                'integer',
            ],
            'location_id'  => [
                'required',
                'integer',
            ],
            'categories.*' => [
                'integer',
            ],
            'categories'   => [
                'array',
            ],
            'types.*' => [
                'integer',
            ],
            'types'   => [
                'array',
            ],
            'salary'       => [
                'nullable',
                'numeric',
            ],
        ];
    }
}
