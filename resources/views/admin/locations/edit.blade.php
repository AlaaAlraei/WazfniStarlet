@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.location.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.locations.update", [$location->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('country_id') ? 'has-error' : '' }}">
                <label for="country_id">{{ trans('cruds.location.fields.country_id') }}*</label>
                <select id="country_id" name="country_id" class="form-control" required>
                    @foreach($countries as $id => $country)
                        <option value="{{ $id }}" {{ old('country_id', isset($location) && $location->country_id == $id ? 'selected' : '') }}>{{ $country }}</option>
                    @endforeach
                </select>
                @if($errors->has('country_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('country_id') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.location.fields.country_id_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.location.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($location) ? $location->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.location.fields.name_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
