@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.subscription_type.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.subscription_types.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('kind') ? 'has-error' : '' }}">
                <label for="kind">{{ trans('cruds.subscription_type.fields.kind') }}*</label>
                <select type="text" id="kind" name="kind" class="form-control" required>
                    <option value="0" {{ old('kind', isset($subscription_type) && $subscription_type->kind == 0 ? 'selected' : '') }}>Single</option>
                    <option value="1" {{ old('kind', isset($subscription_type) && $subscription_type->kind == 1 ? 'selected' : '') }}>Dual</option>
                    <option value="2" {{ old('kind', isset($subscription_type) && $subscription_type->kind == 2 ? 'selected' : '') }}>Choose</option>
                </select>
                @if($errors->has('kind'))
                    <em class="invalid-feedback">
                        {{ $errors->first('kind') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.subscription_type.fields.kind_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.subscription_type.fields.title') }}*</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($subscription_type) ? $subscription_type->title : '') }}" required>
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.subscription_type.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('num_job_post') ? 'has-error' : '' }}">
                <label for="num_job_post">{{ trans('cruds.subscription_type.fields.num_job_post') }}*</label>
                <input type="number" id="num_job_post" name="num_job_post" class="form-control" value="{{ old('num_job_post', isset($subscription_type) ? $subscription_type->num_job_post : '') }}" required>
                @if($errors->has('num_job_post'))
                    <em class="invalid-feedback">
                        {{ $errors->first('num_job_post') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.subscription_type.fields.num_job_post_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('num_month') ? 'has-error' : '' }}">
                <label for="num_month">{{ trans('cruds.subscription_type.fields.num_month') }}*</label>
                <input type="number" id="num_month" name="num_month" class="form-control" value="{{ old('num_month', isset($subscription_type) ? $subscription_type->num_month : '') }}" required>
                @if($errors->has('num_month'))
                    <em class="invalid-feedback">
                        {{ $errors->first('num_month') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.subscription_type.fields.num_month_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                <label for="amount">{{ trans('cruds.subscription_type.fields.amount') }}*</label>
                <input type="number" step="0.001" id="amount" name="amount" class="form-control" value="{{ old('amount', isset($subscription_type) ? $subscription_type->amount : '') }}" required>
                @if($errors->has('amount'))
                    <em class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.subscription_type.fields.amount_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('features') ? 'has-error' : '' }}">
                <label for="features">{{ trans('cruds.subscription_type.fields.features') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="features[]" id="features" class="form-control select2" multiple="multiple" required>
                    @foreach($features as $id => $features)
                        <option value="{{ $id }}" {{ (in_array($id, old('features', [])) || isset($subscription_type) && $subscription_type->features->contains($id)) ? 'selected' : '' }}>{{ $features }}</option>
                    @endforeach
                </select>
                @if($errors->has('features'))
                    <em class="invalid-feedback">
                        {{ $errors->first('features') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.subscription_type.fields.features_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
