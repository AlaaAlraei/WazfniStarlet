<?php

namespace App\Http\Requests;

use App\Advertising;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateAdvertisingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('advertising_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'title' => [
                'required',
                'string',
            ],
            'url' => [
                'required',
                'string',
            ],
        ];
    }
}
