<?php

namespace App\Http\Requests;

use App\Country;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreCountryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('country_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
            ],
            'code' => [
                'required',
                'string',
            ],
            'country_key' => [
                'required',
                'integer',
                'unique:countries',
            ],
        ];
    }
}
