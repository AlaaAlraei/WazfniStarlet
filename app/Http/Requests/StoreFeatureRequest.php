<?php

namespace App\Http\Requests;

use App\Feature;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreFeatureRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('feature_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
