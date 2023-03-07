<?php

namespace App\Http\Requests;

use App\SubscriptionType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateSubscriptionTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('subscription_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'title' => [
                'required',
                'string',
            ],
            'num_month' => [
                'required',
                'integer',
                'min:1',
            ],
            'amount' => [
                'required',
                'numeric',
            ],
        ];
    }
}
