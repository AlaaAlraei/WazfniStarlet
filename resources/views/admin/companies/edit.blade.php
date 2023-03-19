@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.company.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.companies.update", [$company->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                <label for="category_id">{{ trans('cruds.company.fields.category_id') }}*</label>
                <select id="category_id" name="category_id" class="form-control" required>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id ?? '' }}" {{ old('category_id', isset($company) && $company->category_id == $id ? 'selected' : '') }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('category_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('category_id') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.company.fields.category_id_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.company.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($company) ? $company->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.company.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('about') ? 'has-error' : '' }}">
                <label for="about">{{ trans('cruds.company.fields.about') }}*</label>
                <textarea type="text" id="about" name="about" class="form-control" required>{{ old('about', isset($company) ? $company->about : '') }}</textarea>
                @if($errors->has('about'))
                    <em class="invalid-feedback">
                        {{ $errors->first('about') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.company.fields.about_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="address">{{ trans('cruds.company.fields.address') }}*</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ old('address', isset($company) ? $company->address : '') }}" required>
                @if($errors->has('address'))
                    <em class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.company.fields.address_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('website') ? 'has-error' : '' }}">
                <label for="website">{{ trans('cruds.company.fields.website') }}</label>
                <input type="text" id="website" name="website" class="form-control" value="{{ old('website', isset($company) ? $company->website : '') }}">
                @if($errors->has('website'))
                    <em class="invalid-feedback">
                        {{ $errors->first('website') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.company.fields.website_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('linked') ? 'has-error' : '' }}">
                <label for="linked">{{ trans('cruds.company.fields.linked') }}</label>
                <input type="text" id="linked" name="linked" class="form-control" value="{{ old('linked', isset($company) ? $company->linked : '') }}">
                @if($errors->has('linked'))
                    <em class="invalid-feedback">
                        {{ $errors->first('linked') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.company.fields.linked_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('instagram') ? 'has-error' : '' }}">
                <label for="instagram">{{ trans('cruds.company.fields.instagram') }}</label>
                <input type="text" id="instagram" name="instagram" class="form-control" value="{{ old('instagram', isset($company) ? $company->instagram : '') }}">
                @if($errors->has('instagram'))
                    <em class="invalid-feedback">
                        {{ $errors->first('instagram') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.company.fields.instagram_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('twitter') ? 'has-error' : '' }}">
                <label for="twitter">{{ trans('cruds.company.fields.twitter') }}</label>
                <input type="text" id="twitter" name="twitter" class="form-control" value="{{ old('twitter', isset($company) ? $company->twitter : '') }}">
                @if($errors->has('twitter'))
                    <em class="invalid-feedback">
                        {{ $errors->first('twitter') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.company.fields.twitter_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('facebook') ? 'has-error' : '' }}">
                <label for="facebook">{{ trans('cruds.company.fields.facebook') }}</label>
                <input type="text" id="facebook" name="facebook" class="form-control" value="{{ old('facebook', isset($company) ? $company->facebook : '') }}">
                @if($errors->has('facebook'))
                    <em class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.company.fields.facebook_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                <label for="logo">{{ trans('cruds.company.fields.logo') }}</label>
                <div class="needsclick dropzone" id="logo-dropzone">

                </div>
                @if($errors->has('logo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.company.fields.logo_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.companies.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($company) && $company->logo)
      var file = {!! json_encode($company->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost', $_SERVER['SERVER_NAME'] , $company->logo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $company->logo->getUrl('thumb')) }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@stop
