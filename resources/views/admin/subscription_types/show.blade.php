@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.subscription_type.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.subscription_type.fields.id') }}
                        </th>
                        <td>
                            {{ $subscription_type->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscription_type.fields.title') }}
                        </th>
                        <td>
                            {{ $subscription_type->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscription_type.fields.kind') }}
                        </th>
                        <td>
                            {{ $subscription_type->kind == 0 ? 'Single' : '' }}
                            {{ $subscription_type->kind == 1 ? 'Dual' : '' }}
                            {{ $subscription_type->kind == 2 ? 'Choose' : '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscription_type.fields.kind') }}
                        </th>
                        <td>
                            {{ $subscription_type->kind }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscription_type.fields.picture') }}
                        </th>
                        <td>
                            @if($subscription_type->picture)
                                <a href="{{ str_replace('localhost', 'localhost:8000', $subscription_type->picture->getUrl()) }}" target="_blank">
                                    <img src="{{ str_replace('localhost', 'localhost:8000', $subscription_type->picture->getUrl('thumb')) }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection