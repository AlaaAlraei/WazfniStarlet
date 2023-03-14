@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.country.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.countries.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.country.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($country) ? $country->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.country.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                <label for="code">{{ trans('cruds.country.fields.code') }}*</label>
                <input type="text" id="code" name="code" class="form-control" value="{{ old('code', isset($country) ? $country->code : '') }}" required>
                @if($errors->has('code'))
                    <em class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.country.fields.code_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('country_key') ? 'has-error' : '' }}">
                <label for="country_key">{{ trans('cruds.country.fields.country_key') }}*</label>
                <input type="number" id="country_key" name="country_key" class="form-control" value="{{ old('country_key', isset($country) ? $country->country_key : '') }}" required>
                @if($errors->has('country_key'))
                    <em class="invalid-feedback">
                        {{ $errors->first('country_key') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.country.fields.country_key_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
