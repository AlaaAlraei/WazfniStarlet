@extends('layouts.user')

@section('content')

    <div class="container-fluid" id="JobShowContainer">
        <div class="row justify-content-center align-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-8">
                        <div class="JobShowPaper">
                            @if($job->photo)
                                <div class="JobShowPaperImgHolder">
                                    <div class="JobShowPaperImgHolderInner">
                                        <img
                                            src="{{ str_replace('localhost', 'localhost:8000', $job->photo->getUrl()) }}">
                                    </div>
                                </div>
                            @endif
                            <div class="JobPaperInfo">
                                <h1>
                                    {{ $job->title }}
                                </h1>
                                <span title="تاريخ نشر الوظيفة">
                                    <i class="fas fa-calendar"></i>
                                    <g id="CreatedAtFormed"></g>
                                    {{--اﻷربعاء 8 مارس 2023--}}
                                </span>
                                <div class="JobPaperOptions">
                                    <div class="JobPaperOptionsInner">
                                        <button type="button" title="حفظ الوظيفة">
                                            <img src="{{asset("")}}Wazefni/Requirements/IMG/Save.png">
                                            حفظ
                                        </button>
                                        <button type="button" title="شارك الوظيفة على منصات التواصل الاجتماعي">
                                            <img src="{{asset("")}}Wazefni/Requirements/IMG/Share.png">
                                            شارك
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="JobPaperDetails">
                                <h1>
                                    تفاصيل
                                </h1>
                                <p>
                                    ناشر اللإعلان :
                                    <u>
                                        شركة حول العالم للتسويق الالكتروني
                                    </u>
                                </p>
                                <p>
                                    الفئة :
                                    <u>
                                        التسويق
                                    </u>
                                </p>
                                <p>
                                    نوع الوظيفة :
                                    <u>
                                        {{ $job->job_nature }}
                                    </u>
                                </p>
                                <p>
                                    مكان الوظيفة :
                                    <u>
                                        <i class="fa fa-map-marker-alt" aria-hidden="true" style="color: #b52e2e;"></i>
                                        {{ $job->address }}
                                    </u>
                                </p>
                                <p>
                                    الراتب المتوقع :
                                    <u>
                                        {{ $job->salary }} دينار
                                    </u>
                                </p>
                                <p style="border-bottom: none">
                                    مميزات الوظيفة :
                                </p>
                                <div class="JobFeaturesGH">
                                    @foreach($job->types as $key => $type)
                                        <h12>
                                            {{ $type->title ?? '' }}
                                        </h12>
                                    @endforeach
                                </div>
                            </div>

                            <div class="JobPaperMoreDetails">
                                <h1>
                                    تفاصيل اخرى
                                </h1>
                                <p>
                                    {{ $job->full_description }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" dir="ltr">
                        <div class="InteractWithJob">
                            <div class="InteractWithJobInner">
                                <button type="button">
                                    قدم على الوظيفة
                                </button>
                                <div class="InterActWithJobNotes">
                                    <h1> وجب التنويه </h1>
                                    <p>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        لا تشارك بيانات سرية أو شخصية
                                    </p>
                                    <p>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        احذر وتأكد أن جهة التوظيف موثوقة
                                    </p>
                                    <p>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        لا تقم بدفع المال لتوظيفك أو تدريبك
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="PublishedBy">
                            <div class="PublishedByInner">
                                <div class="PublishedByImgHolder" onclick="$(this).fidn('a')[0].click()">
                                    <a href="#" class="d-none"></a>
                                    @if($job->company->logo)
                                        <img src="{{ str_replace('localhost', 'localhost:8000', $job->company->logo->getUrl('thumb')) }}">
                                    @else
                                        <img src="{{ asset('') }}Wazefni/Requirements/IMG/RF.png">
                                    @endif

                                </div>
                                <h1 onclick="$(this).fidn('a')[0].click()">
                                    <a href="#" class="d-none"></a>
                                    {{ $job->company->name ?? '' }}
                                    <i class="fas fa-check-circle"></i>
                                </h1>
                                <p>
                                    <i class="fas fa-calendar"></i>
                                    عضو منذ:
                                    <u>
                                        {{ $job->company->created_at->format('d/m/Y') ?? '' }}
                                    </u>
                                </p>
                                <p>
                                    <i class="fas fa-circle" style="color: #488334"></i>
                                    وظائف متاحة:
                                    <u>
                                        {{ $job->company->jobs->count() ?? '' }}
                                    </u>
                                </p>
                            </div>
                        </div>

                        <div class="OutSideJobs">
                            <div class="SectionHeader">
                                <h10>
                                    وظائف مشابهة
                                </h10>
                            </div>
                            <div class="OutSideJobsGH">
                                @foreach($similar as $key => $other)
                                    <div class="OutSideJobsItem">
                                        <div class="OutSideJobsItemImg">
                                            <img src="{{ asset('') }}Wazefni/Requirements/IMG/Job.webp">
                                        </div>
                                        <div class="OutSideJobsItemInfo">
                                            <h5 title="حساب موثق">
                                                @if($other->company->logo)
                                                    <img src="{{ str_replace('localhost', 'localhost:8000', $other->company->logo->getUrl('thumb')) }}" class="SpecialSliderUser">
                                                @else
                                                    <img src="{{ asset('') }}Wazefni/Requirements/IMG/RF.png" class="SpecialSliderUser">
                                                @endif
                                                {{ $other->company->name ?? '' }}
                                                <u>
                                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                </u>
                                            </h5>
                                            <h3>
                                                {{ $other->title ?? '' }} - {{ $other->location->country->name ?? '' }} - {{ $other->location->name ?? '' }}
                                            </h3>
                                            <span>
                                        <i class="fas fa-clock"></i>
                                        {{ $other->created_at->format('Y-m-d') ?? '' }}
                                    </span>
                                            @if($other->top_rated == 1)
                                                <h12 title="إعلان مميز">
                                                    <img src="{{ asset('') }}Wazefni/Requirements/IMG/Promoted.png">
                                                </h12>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                                <div class="SeeAllCATEGORIES">
                                    <button type="button">
                                        رؤية المزيد
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            var d = new Date("{{ $job->created_at }}");
            var month = d.toLocaleString('default', {month: 'long'});
            var strDate = d.getFullYear() + "-" + month + "-" + d.getDate();


            var date = new Date(strDate);
            var months = ["يناير", "فبراير", "مارس", "إبريل", "مايو", "يونيو",
                "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"
            ];
            var days = ["اﻷحد", "اﻷثنين", "الثلاثاء", "اﻷربعاء", "الخميس", "الجمعة", "السبت"];
            var delDateString = days[date.getDay()] + ' ' + date.getDate() + ' ' + months[date.getMonth()] + ' ' + date.getFullYear();
            $('#CreatedAtFormed').text(delDateString)

            if($('#AuthStatus').val() === '0'){
                window.location.replace("{{ route('home') }}")
            }
        });
    </script>
@endsection


