@extends('layouts.user')

@section('content')
    <div class="container-fluid" id="CreateJobPage">
        <div class="row justify-content-center align-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-8">
                        <div class="AddNewJobPaper">
                            <h1>
                                إنشاء اعلان جديد
                            </h1>
                            @if($errors->count() > 0)
                                <div class="alert alert-danger">
                                    <ul class="list-unstyled">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="CreateNewAdForm" action="{{ route("jobs.store") }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="CreateNewAdFormRow">
                                    <label>
                                        عنوان الإعلان
                                    </label>
                                    <div class="CreateNewAdFormInputHolder">
                                        <input value="{{ old('title', isset($job) ? $job->title : '') }}" name="title" type="text" placeholder="اكتب هنا : عنوان الإعلان">
                                    </div>
                                </div>
                                <div class="CreateNewAdFormRow">
                                    <label>
                                        فئة الوظيفة
                                    </label>
                                    <div class="CreateNewAdFormInputHolder">
                                        <button type="button" class="AuthCtegorySelect" id="SelectedCategoryOnCreate">
                                            <g onclick="ShowCustomSelect($(this))" rel="#CreateAdSelectCat">اختيار فئة الوظيفة</g>
                                            <i class="fas fa-angle-down" rel="#CreateAdSelectCat" onclick="ClearCreateJobCategory($(this))" title="حذف الفئة"></i>
                                        </button>
                                    </div>
                                    <div class="SelectAuthCategoryList" id="CreateAdSelectCat">
                                        <div class="SelectAuthCategoryListInner">
                                            @foreach($categories as $key => $category)
                                                <div class="SelectAuthCategoryListItem" onclick="SelectThisJobCreateCategory($(this))" rel="#SelectedCategoryOnCreate">
                                                    <input type="radio" name="categories[]" value="{{ $category->id }}" {{ (in_array($category->id, old('categories', [])) || isset($job) && $job->categories->contains($category->id)) ? 'checked' : '' }} class="d-none">
                                                    @if(isset($category->photo))
                                                        <img src="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $category->photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $category->photo->getUrl('thumb')) }}">
                                                    @else
                                                        <img src="{{asset("")}}Wazefni/Requirements/IMG/MotorcyclesHome.webp">
                                                    @endif
                                                    <span> {{ $category->name }} </span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="CreateNewAdFormRow">
                                    <label>
                                        إرفاق صورة الإعلان
                                        <u>
                                            ( إختياري )
                                        </u>
                                    </label>
{{--                                    <div class="needsclick dropzone" id="photo-dropzone">--}}

{{--                                    </div>--}}
                                    <button type="button" class="AddAdImage" onclick="$(this).find('input')[0].click()">
                                        <div class="needsclick dropzone" id="photo-dropzone">

                                        </div>
                                        <input type="file" accept="image/*" class="d-none" onchange="CheckAdImageHolder($(this))">
                                        <i class="fas fa-image"></i>
                                        <g>
                                            <y>
                                                صورة الإعلان
                                            </y>
                                        </g>
                                    </button>
                                </div>
                                <div class="CreateNewAdFormRow">
                                    <label>
                                        الحد الأقصى للمنتسبين
                                        <u>
                                            ( إختياري )
                                        </u>
                                    </label>
                                    <div class="CreateNewAdFormInputHolder">
                                        <input value="{{ old('max_apply', isset($job) ? $job->max_apply : '') }}" name="max_apply" type="number" placeholder="اكتب هنا : الحد الأقصى للمنتسبين">
                                    </div>
                                    <h14>
                                        <i class="fas fa-info-circle"></i>
                                        سيتم حذف الإعلان عند بلوغه الحد الأقصى من المنتسبين .
                                    </h14>
                                </div>
                                <div class="CreateNewAdFormRow">
                                    <label>
                                        نوع الوظيفة
                                    </label>
                                    <div class="CreateNewAdFormInputHolder">
                                        <select name="job_nature">
                                            <option selected disabled> نوع الوظيفة </option>
                                            <option value="Full-Time" {{ old('job_nature', isset($job) && $job->job_nature == 'Full-Time' ? 'selected' : '') }}>Full-Time</option>
                                            <option value="Part-Time" {{ old('job_nature', isset($job) && $job->job_nature == 'Part-Time' ? 'selected' : '') }}>Part-Time</option>
                                            <option value="Casual" {{ old('job_nature', isset($job) && $job->job_nature == 'Casual' ? 'selected' : '') }}>Casual</option>
                                        </select>
                                        <f>
                                            <i class="fas fa-angle-down"></i>
                                        </f>
                                    </div>
                                </div>
                                <div class="CreateNewAdFormRow">
                                    <label>
                                        الفرع
                                    </label>
                                    <div class="CreateNewAdFormInputHolder">
                                        <select name="company_id" id="company" class="form-control select2" required>
                                            @foreach($companies as $id => $company)
                                                <option value="{{ $id }}" {{ (isset($job) && $job->company ? $job->company->id : old('company_id')) == $id ? 'selected' : '' }}>{{ $company }}</option>
                                            @endforeach
                                        </select>
                                        <s>
                                            <i class="fa fa-building" aria-hidden="true"></i>
                                        </s>
                                    </div>
                                </div>
                                <div class="CreateNewAdFormRow">
                                    <label>
                                        المدينة
                                    </label>
                                    <div class="CreateNewAdFormInputHolder">
                                        <select name="location_id" id="location" class="form-control select2" required>
                                            @foreach($locations as $id => $location)
                                                <option value="{{ $id }}" {{ (isset($job) && $job->location ? $job->location->id : old('location_id')) == $id ? 'selected' : '' }}>{{ $location }}</option>
                                            @endforeach
                                        </select>
                                        <s>
                                            <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
                                        </s>
                                    </div>
                                </div>
                                <div class="CreateNewAdFormRow">
                                    <label>
                                        مكان الوظيفة
                                        <u>
                                            ( إسم الحي - الشارع )
                                        </u>
                                    </label>
                                    <div class="CreateNewAdFormInputHolder">
                                        <input value="{{ old('address', isset($job) ? $job->address : '') }}" name="address" type="text" placeholder=" اكتب هنا : مكان الوظيفة ( إسم المدينة - الشارع )">
                                        <s>
                                            <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
                                        </s>
                                    </div>
                                </div>
                                <div class="CreateNewAdFormRow">
                                    <label>
                                        الراتب
                                        <u>
                                            ( إختياري )
                                        </u>
                                    </label>
                                    <div class="CreateNewAdFormInputHolder">
                                        <input value="{{ old('salary', isset($job) ? $job->salary : '') }}" name="salary" type="number" placeholder=" اكتب هنا : الراتب المقدر ( إختياري )">
                                        <s>
                                            <img src="{{asset("")}}Wazefni/Requirements/IMG/Salary.png">
                                        </s>
                                    </div>
                                </div>
                                <div class="CreateNewAdFormRow">
                                    <label>
                                        مميزات الوظيفة
                                        <u>
                                            ( إختياري )
                                        </u>
                                    </label>
                                    <div class="CreateNewAdFormInputHolder">
                                        <button type="button" class="AuthCtegorySelect">
                                            <g onclick="ShowCustomSelect($(this))" rel="#CreateAdSelectFeatures"> اختيار مميزات الوظيفة </g>
                                            <i class="fas fa-angle-down" onclick="ClearAuthCategory()" title="حذف الفئة"></i>
                                        </button>
                                    </div>
                                    <div class="SelectAuthCategoryList" id="CreateAdSelectFeatures">
                                        <div class="SelectAuthCategoryListInner">
                                            @foreach($types as $id => $types)
                                                <div class="SelectAuthCategoryListItem JF1" target=".JF1" onclick="SelectThisAuthFeatures($(this))" rel="#JobFeatursGH" JobFeatureNumber="FeatureN1">
                                                    <input type="checkbox" {{ (in_array($id, old('types', [])) || isset($job) && $job->types->contains($id)) ? 'checked' : '' }} name="JobFeature" value="{{ $id }}" class="d-none">
                                                    <span> {{ $types }} </span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <h4 id="JobFeatursGH"></h4>
                                </div>
                                <div class="CreateNewAdFormRow w-100">
                                    <label>
                                        تفاصيل اخرى - شرح
                                    </label>
                                    <textarea name="full_description" placeholder="اكتب هنا : تفاصيل اخرى - شرح">{{ old('full_description', isset($job) ? $job->full_description : '') }}</textarea>
                                </div>
                                <div class="CreateNewAdFormRow w-100">
                                    <button type="submit" class="SubmitCreateAdButton">
                                        <i class="fas fa-plus-circle"></i>
                                        انشاء اعلان جديد
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="PromotYourAdNowSection">
                            <h1> هل تريد مشاهدات اعلى لإعلاناتك ؟ </h1>
                            <p>
                                <i class="fas fa-circle"></i>
                                منتسبين اكثر
                            </p>
                            <p>
                                <i class="fas fa-circle"></i>
                                توظيف بسرعة اكبر
                            </p>
                            <p>
                                <i class="fas fa-circle"></i>
                                عدد مشاهدات اكبر بكثير
                            </p>
                            <p>
                                <i class="fas fa-circle"></i>
                                الظهور اكثر في نتائج البحث
                            </p>

                            <button type="button">
                                <img src="{{asset("")}}Wazefni/Requirements/IMG/Promoted.png">
                                ميز اعلاناك الاَن
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="CreateJobUser">
@endsection
@section('scripts')
    <script>
        Dropzone.options.photoDropzone = {
            url: '{{ route('jobs.storeMedia') }}',
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
                // alert('هسا اشتغلت');
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
@endsection
