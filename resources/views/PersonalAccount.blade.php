@extends('layouts.user')

@section('content')
    <div class="container-fluid" id="CompanyProfilePage">
        <div class="row justify-content-center align-content-center">
            <div class="col-md-10 col-sm-12">
                <div class="row">
                    <div class="col-md-8">
                        <div class="CompanyProfilePaper">
                            <div class="CompanyProfilePaperHeader">
                                <div class="CompanyProfileImgHolder MyUserImage">
                                    @if(Auth::check() && isset(Auth::user()->picture))
                                        <img id="UserImage"
                                             src="{{ str_replace('localhost', 'localhost:8000', Auth::user()->picture->getUrl('thumb')) }}">
                                    @else
                                        <img id="UserImage"
                                             src="{{asset("")}}Wazefni/Requirements/IMG/DefultUser.jpg">
                                    @endif

                                    <div class="UserImageLoader">
                                        <div class="UserImageLoaderInner">
                                            <img src="{{asset("")}}Wazefni/Requirements/IMG/Loader.gif">
                                        </div>
                                    </div>
                                    <div class="ChangeProfileImage animate__animated animate__zoomIn"
                                         onclick="ChangeUserProfileImage($(this))">
                                        <form id="UserImageForm" action="{{ route("profile.ChangeProfilePicture") }}"
                                              method="POST" enctype="multipart/form-data" class="d-none">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group {{ $errors->has('picture') ? 'has-error' : '' }}">
                                                <div class="needsclick dropzone" id="picture-dropzone">
                                                </div>
                                                <p class="helper-block">
                                                </p>
                                            </div>
                                        </form>


                                        <div class="ChangeProfileImageInner">
                                            <div class="ChangeProfileImageDiv">
                                                <i class="fas fa-camera"></i>
                                                <span> تعديل الصورة </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="CompanyProfilePaperHeaderInfo">
                                    <h1 class="EditProfileBtnParent">
                                        {{ Auth::user()->name ?? '' }} {{ Auth::user()->last_name ?? '' }}
                                        <u class="EditProfileBtn" onclick="EditProfilePop($(this))"
                                           rel="#EditInformation">
                                            <i class="fas fa-pen"></i>
                                        </u>
                                    </h1>
                                    <span>
                                        @if(isset(Auth::user()->employee->category->photo))
                                            <img
                                                src="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , Auth::user()->employee->category->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', Auth::user()->employee->category->photo->getUrl('thumb')) }}">
                                        @else
                                            <img src="{{asset("")}}Wazefni/Requirements/IMG/RF.png">
                                        @endif
                                        {{ Auth::user()->employee->category->name ?? '' }}
                                    </span>
                                </div>
                                <div class="CompanyProfilePaperHeaderOptions">
                                    <div class="CompanyProfilePaperHeaderOptionsInner">
                                        <button type="button" onclick="AddResumeBTn($(this))" rel="#UploadResumeView"
                                                class="CompanyWebsiteBtn">
                                            <i class="fas fa-file"></i>
                                            السيرة الذاتية
                                        </button>
                                        <div class="CompanySocials">
                                            <button type="button" onclick="$(this).find('a')[0].click()" {{ Auth::user()->employee->facebook ?? 'disabled' }}>
                                                <a href="{{ Auth::user()->employee->facebook ?? '' }}" class="d-none"
                                                   target="_blank"></a>
                                                <i class="{{ Auth::user()->employee->facebook ?? '' }} fab fa-facebook"></i>
                                            </button>

                                            <button type="button" onclick="$(this).find('a')[0].click()" {{ Auth::user()->employee->twitter ?? 'disabled' }}>
                                                <a href="{{ Auth::user()->employee->twitter ?? '' }}" class="d-none"
                                                   target="_blank"></a>
                                                <i class="{{ Auth::user()->employee->twitter ?? '' }} fab fa-twitter"></i>
                                            </button>

                                            <button type="button" onclick="$(this).find('a')[0].click()" {{ Auth::user()->employee->instagram ?? 'disabled' }}>
                                                <a href="{{ Auth::user()->employee->instagram ?? '' }}" class="d-none"
                                                   target="_blank"></a>
                                                <i class="{{ Auth::user()->employee->instagram ?? '' }} fab fa-instagram"></i>
                                            </button>

                                            <button type="button" onclick="$(this).find('a')[0].click()" {{ Auth::user()->employee->linkedin ?? 'disabled' }}>
                                                <a href="{{ Auth::user()->employee->linkedin ?? '' }}" class="d-none"
                                                   target="_blank"></a>
                                                <i class="{{ Auth::user()->employee->linkedin ?? '' }} fab fa-linkedin"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p class="CompanyBio">
                                <u>نبذة</u>
                                @if(Auth::check() && Auth::user()->employee->bio == null)
                                    <span class="NoBio" onclick="$('#BioForm').slideToggle()">
                                        <i class="fas fa-pen"></i>
                                        اكتب هنا : نبذة عن نفسك/اعمالك/هواباتك إلخ
                                    </span>
                                @else
                                    {{ Auth::user()->employee->bio }}
                                    <g class="EditBioBtn animate__animated animate__zoomIn" title="تعديل نبذة"
                                       onclick="$('#BioForm').slideToggle()">
                                        <i class="fas fa-pen"></i>
                                    </g>
                                @endif

                            </p>

                            <form id="BioForm" action="{{ route("profile.UpdateBioEmployeeProfile") }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="BioFormInner">
                                    @if(Auth::check() && Auth::user()->employee->bio == null)
                                        <textarea name="bio"
                                                  placeholder="اكتب هنا : نبذة عن نفسك/اعمالك/هواباتك إلخ"></textarea>
                                    @else
                                        <textarea name="bio"
                                                  placeholder="اكتب هنا : نبذة عن نفسك/اعمالك/هواباتك إلخ">{{ Auth::user()->employee->bio }}</textarea>
                                    @endif
                                    <button type="submit">
                                        <i class="fas fa-floppy-o"></i>
                                        حفظ
                                    </button>
                                </div>
                            </form>

                            <div class="JobPaperDetails">
                                <h1>
                                    تفاصيل
                                </h1>
                                <p>
                                    رقم الهاتف :
                                    <u dir="ltr">
                                        +{{ Auth::user()->employee->country->country_key ?? '' }}
                                        -{{ Auth::user()->phone ?? '' }}
                                        <i class="fas fa-mobile-alt"></i>
                                    </u>
                                </p>
                                <p>
                                    الميلاد :
                                    <u>
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        {{ date(Auth::user()->employee->birthday, strtotime('d F Y')) }}
                                    </u>
                                </p>
                                <p>
                                    الدولة :
                                    <u>
                                        <i class="fa fa-map-marker-alt" aria-hidden="true" style="color: #b52e2e;"></i>
                                        {{ Auth::user()->employee->country->name ?? '' }}
                                    </u>
                                </p>
                                <p>
                                    التخصص :
                                    <u>
                                        {{ Auth::user()->employee->category->name ?? '' }}
                                    </u>
                                </p>
                            </div>

                            <div class="CompanyprofileGHParent">
                                <div class="SectionHeader">
                                    <h10>
                                        نبذة عن اعمال
                                        <u>
                                            {{ Auth::user()->name ?? '' }}
                                        </u>
                                    </h10>
                                </div>
                                <div class="UserWorksGH">
                                    <h1>
                                        اعمالي
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" dir="ltr">
                        <div class="SimilerCompanies">
                            <div class="SectionHeader">
                                <h10>
                                    خبرات
                                </h10>
                            </div>
                            <div class="UserExperienceGH">
                                <h1> خبراتي </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="UploadResumeView">
        <div class="UploadResumeViewInner">
            <div class="UploadResumeViewFade" onclick="$('#UploadResumeView').fadeOut(600)"></div>
            <div class="UploadResumeViewDiv animate__animated animate__zoomIn">
                <form id="ResumeForm" action="{{ route("profile.UpdateResumeEmployeeProfile") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h1>
                        السيرة الذاتية
                    </h1>

                    @if(Auth::check() && Auth::user()->employee->resume)
                        <p>
                            هناك العديد من المعايير يفضل اتباعها في السيرة الذاتية كذكر المعلومات باختصار ووضوح وذكر
                            جميع الخبرات السابقة والمهارات المكتسبة من خلالها , اتباع هذه المعايير قد يسرع من عملية
                            ايجادك للوظيفة المناسبة لمهاراتك وخبرتك.
                        </p>
                        <div class="ResumeUploaded">
                            <button type="button" onclick="$(this).find('input')[0].click()">
                                <input class="d-none" name="resumePC" type="file" accept="application/pdf" onchange="$('#ResumeForm').submit()">
                                <i class="fas fa-pen"></i>
                                تغيير الملف
                            </button>
                            <g onclick="$(this).find('a')[0].click()">
                                <a href="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? asset("system/storage/app/".Auth::user()->employee->resume) : str_replace("public", "storage", asset("".Auth::user()->employee->resume)) }}" target="_blank" class="d-none"></a>
                                <i class="fas fa-eye"></i>
                                معاينة الملف
                            </g>
                        </div>
                    @else
                        {{--  ما في سي في --}}
                        <p>
                            قم برفع السيرة الذاتية لكي تسهل عملية التواصل معك من قبل الشركات الباحثة على الموظفين
                            وللظهور بنتائج البحث بشكل اكبر.
                        </p>
                        <button type="button" onclick="$(this).find('input')[0].click()">
                            <input name="resumePC" type="file" accept="application/pdf" class="d-none"
                                   onchange="$('#ResumeForm').submit()">
                            <i class="fas fa-file-upload"></i>
                            رفع الملف
                        </button>
                    @endif


                    <span>
                        يجب ان يكون الملف بصيغة ال PDF
                        <br>
                        ان لا تتجاوز مساحة الملف ال 2MB
                    </span>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        Dropzone.options.pictureDropzone = {
            url: '{{ route('profile.storeMedia') }}',
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
                $('form').find('input[name="picture"]').remove()
                $('form').append('<input type="hidden" name="picture" value="' + response.name + '">')
                $('#UserImage').attr('src', $('.dz-image img').attr('src'))
                $('.UserImageLoader').show()
                $('.ChangeProfileImageInner').remove()
                setTimeout(function () {
                    $('#UserImageForm').submit();
                }, 1000)
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="picture"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(Auth::check() && Auth::user()->picture)
                var file = {!! json_encode(Auth::user()->picture) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, '{{ str_replace('localhost', 'localhost:8000', Auth::user()->picture->getUrl('thumb')) }}')
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="picture" value="' + file.file_name + '">')
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


