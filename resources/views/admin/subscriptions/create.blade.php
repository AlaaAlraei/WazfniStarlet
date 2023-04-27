@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.subscription.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.subscriptions.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('type_id') ? 'has-error' : '' }}">
                <label for="type_id">{{ trans('cruds.subscription.fields.type_id') }}*</label>
                <select id="type_id" name="type_id" class="form-control" required>
                    @foreach($subscription_types as $key => $subscription_type)
                        <option value="{{ $id }}" {{ old('type_id', isset($subscription) && $subscription->type_id == $id ? 'selected' : '') }}>{{ $subscription_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('type_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('type_id') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.subscription.fields.type_id_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
                <label for="user_id">{{ trans('cruds.subscription.fields.user_id') }}*</label>
                <select id="user_id" name="user_id" class="form-control" required>
                    @foreach($users as $key => $user)
                        <option value="{{ $id }}" {{ old('user_id', isset($subscription) && $subscription->user_id == $id ? 'selected' : '') }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('user_id') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.subscription.fields.user_id_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}">
                <label for="start_date">{{ trans('cruds.subscription.fields.start_date') }}*</label>
                <input type="text" id="start_date" name="start_date" class="form-control" value="{{ old('start_date', isset($subscription) ? $subscription->start_date : '') }}" required>
                @if($errors->has('start_date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.subscription.fields.start_date_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
