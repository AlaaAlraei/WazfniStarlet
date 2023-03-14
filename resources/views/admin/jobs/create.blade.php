@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.job.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.jobs.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.job.fields.title') }}*</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($job) ? $job->title : '') }}" required>
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.job.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                <label for="photo">{{ trans('cruds.company.fields.photo') }}</label>
                <div class="needsclick dropzone" id="photo-dropzone">

                </div>
                @if($errors->has('photo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.company.fields.photo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('company_id') ? 'has-error' : '' }}">
                <label for="company">{{ trans('cruds.job.fields.company') }}*</label>
                <select name="company_id" id="company" class="form-control select2" required>
                    @foreach($companies as $id => $company)
                        <option value="{{ $id }}" {{ (isset($job) && $job->company ? $job->company->id : old('company_id')) == $id ? 'selected' : '' }}>{{ $company }}</option>
                    @endforeach
                </select>
                @if($errors->has('company_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('company_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('short_description') ? 'has-error' : '' }}">
                <label for="short_description">{{ trans('cruds.job.fields.short_description') }}</label>
                <input type="text" id="short_description" name="short_description" class="form-control" value="{{ old('short_description', isset($job) ? $job->short_description : '') }}">
                @if($errors->has('short_description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('short_description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.job.fields.short_description_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('full_description') ? 'has-error' : '' }}">
                <label for="full_description">{{ trans('cruds.job.fields.full_description') }}</label>
                <textarea id="full_description" name="full_description" class="form-control ">{{ old('full_description', isset($job) ? $job->full_description : '') }}</textarea>
                @if($errors->has('full_description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('full_description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.job.fields.full_description_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('requirements') ? 'has-error' : '' }}">
                <label for="requirements">{{ trans('cruds.job.fields.requirements') }}</label>
                <textarea id="requirements" name="requirements" class="form-control ">{{ old('requirements', isset($job) ? $job->requirements : '') }}</textarea>
                @if($errors->has('requirements'))
                    <em class="invalid-feedback">
                        {{ $errors->first('requirements') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.job.fields.requirements_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('job_nature') ? 'has-error' : '' }}">
                <label for="job_nature">{{ trans('cruds.job.fields.job_nature') }}</label>
                <select id="job_nature" name="job_nature" class="form-control">
                    <option value="Full-Time" {{ old('job_nature', isset($job) && $job->job_nature == 'Full-Time' ? 'selected' : '') }}>Full-Time</option>
                    <option value="Part-Time" {{ old('job_nature', isset($job) && $job->job_nature == 'Part-Time' ? 'selected' : '') }}>Part-Time</option>
                    <option value="Casual" {{ old('job_nature', isset($job) && $job->job_nature == 'Casual' ? 'selected' : '') }}>Casual</option>
                </select>
                @if($errors->has('job_nature'))
                    <em class="invalid-feedback">
                        {{ $errors->first('job_nature') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.job.fields.job_nature_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('location_id') ? 'has-error' : '' }}">
                <label for="location">{{ trans('cruds.job.fields.location') }}*</label>
                <select name="location_id" id="location" class="form-control select2" required>
                    @foreach($locations as $id => $location)
                        <option value="{{ $id }}" {{ (isset($job) && $job->location ? $job->location->id : old('location_id')) == $id ? 'selected' : '' }}>{{ $location }}</option>
                    @endforeach
                </select>
                @if($errors->has('location_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('location_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="address">{{ trans('cruds.job.fields.address') }}</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ old('address', isset($job) ? $job->address : '') }}">
                @if($errors->has('address'))
                    <em class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.job.fields.address_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('categories') ? 'has-error' : '' }}">
                <label for="categories">{{ trans('cruds.job.fields.categories') }}</label>
                <select name="categories[]" id="categories" class="form-control select2">
                    @foreach($categories as $id => $categories)
                        <option value="{{ $id }}" {{ (in_array($id, old('categories', [])) || isset($job) && $job->categories->contains($id)) ? 'selected' : '' }}>{{ $categories }}</option>
                    @endforeach
                </select>
                @if($errors->has('categories'))
                    <em class="invalid-feedback">
                        {{ $errors->first('categories') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.job.fields.categories_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('salary') ? 'has-error' : '' }}">
                <label for="salary">{{ trans('cruds.job.fields.salary') }}*</label>
                <input type="text" id="salary" name="salary" class="form-control" value="{{ old('salary', isset($job) ? $job->salary : '') }}" required>
                @if($errors->has('salary'))
                    <em class="invalid-feedback">
                        {{ $errors->first('salary') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.job.fields.salary_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('top_rated') ? 'has-error' : '' }}">
                <label for="top_rated">{{ trans('cruds.job.fields.top_rated') }}</label>
                <input name="top_rated" type="hidden" value="0">
                <input value="1" type="checkbox" id="top_rated" name="top_rated" {{ old('top_rated', 0) == 1 ? 'checked' : '' }}>
                @if($errors->has('top_rated'))
                    <em class="invalid-feedback">
                        {{ $errors->first('top_rated') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.job.fields.top_rated_helper') }}
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
        Dropzone.options.photoDropzone = {
            url: '{{ route('admin.jobs.storeMedia') }}',
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
                $('form').find('input[name="photo"]').remove()
                $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="photo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($job) && $job->photo)
                var file = {!! json_encode($job->photo) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, '{{ $job->photo->getUrl('thumb') }}')
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
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
