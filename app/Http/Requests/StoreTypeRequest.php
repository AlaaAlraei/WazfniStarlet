<?php

namespace App\Http\Requests;

use App\Type;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'title' => [
                'required',
                'string',
            ],
        ];
    }
}
