@extends('layouts.user')

@section('content')
    <div class="container-fluid" id="SpecialOffers">
        <div class="row justify-content-center align-content-center">
            <div class="col-md-10" style="position: relative">
                <div class="SectionHeader">
                    <h10>
                        اعلانات مميزة
                    </h10>
                </div>
                <div class="SpecialOffersSlider" dir="ltr">
                    @foreach($jobPromotes as $key => $jobPromote)
                        <div class="SpecialOffersSliderItem">
                            <div class="SpecialOffersSliderItemInner">
                                <div class="SpecialOffersSliderItemimgHolder">
                                    <h5 onclick="$(this).find('a')[0].click()">
                                        @if($jobPromote->company->logo)
                                            <img src="{{ str_replace('localhost', 'localhost:8000', $jobPromote->company->logo->getUrl('thumb')) }}" class="SpecialSliderUser">
                                        @else
                                            <img src="{{ asset('') }}Wazefni/Requirements/IMG/RF.png" class="SpecialSliderUser">
                                        @endif

                                        {{ $jobPromote->company->name ?? '' }}
                                        <a class="d-none" href="{{ route('CompanyProfile', [$jobPromote->company->id]) }}"></a>
                                    </h5>
                                    @if($jobPromote->photo)
                                        <img src="{{ str_replace('localhost', 'localhost:8000', $jobPromote->photo->getUrl('thumb')) }}" class="SpecialSliderImage">
                                    @else
                                        <img src="{{ asset('') }}Wazefni/Requirements/IMG/RF.png" class="SpecialSliderImage">
                                    @endif
                                </div>
                                <div class="SpecialOffersSliderItemInfo">
                                    <h3 onclick="$(this).find('a')[0].click()">
                                        <a href="{{ route('jobs.show', [$jobPromote->id]) }}" class="d-none"></a>
                                        {{ $jobPromote->title }}
                                    </h3>
                                    <span>
                                      <i class="fas fa-clock"></i>
                                        <u id="TopCreatedAtFormed{{ $jobPromote->id }}"></u>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="HomeSections">
        <div class="row justify-content-center align-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-12">
                                <p class="CategoriesHeader">
                                    لضمان نتيجة افضل , قم بإختيار الفئة المناسبة لتخصص عملك
                                </p>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="JobCategoryItem" onclick="SelectThisCategory($(this))" url="{{ route('GetAllJobs') }}">
                                    <div class="JobCategoryItemDiv ActiveCategory">
                                        <div class="JobCategoryItemInner">
                                            <img src="https://cdn-icons-png.flaticon.com/128/3388/3388617.png"
                                                 style="padding: 15px;">
                                        </div>
                                        <span>
                                           الكل
                                       </span>
                                    </div>
                                </div>
                            </div>
                            @foreach($searchCategories as $key => $searchCategory)
                                <div class="col-lg-2 col-md-4 col-sm-6">
                                    <div class="JobCategoryItem" onclick="SelectThisCategory($(this))" url="{{ route('GetByCategoriesJobs', [$searchCategory->id]) }}">
                                        <div class="JobCategoryItemDiv">
                                            <div class="JobCategoryItemInner">
                                                @if($searchCategory->photo)
                                                    <img src="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $searchCategory->photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $searchCategory->photo->getUrl('thumb')) }}">
                                                @else
                                                    <img src="{{ asset('') }}Wazefni/Requirements/IMG/LogoIcon.png" style="filter: grayscale(1);padding: 11px;">
                                                @endif
                                            </div>
                                            <span rel="{{ $searchCategory->id ?? '' }}">
                                                {{ $searchCategory->name ?? '' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                            <div class="col-md-12">
                                <div class="SeeAllCATEGORIES">
                                    <button type="button">
                                        جميع الفئات
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="LatestJobsGH">
                                <div class="SectionHeader">
                                    <h10>
                                        اخر الوظائف
                                        <u>
                                            الكل
                                        </u>
                                        <div class="Reload">
                                            <button type="button" onclick="$('.ActiveCategory').parent().click()">
                                                <img src="{{ asset('') }}Wazefni/Requirements/IMG/Reload.png">
                                                تحديث
                                            </button>
                                        </div>
                                    </h10>
                                </div>
                                <div class="JobsCardLoader">
                                    <div class="JobsCardLoaderInner">
                                        <div class="JobsCardLoaderDiv">
                                            <img src="{{asset("")}}Wazefni/Requirements/IMG/Loader.gif">
                                        </div>
                                    </div>
                                </div>

                                <div class="LatestJobsItemsGH">

                                </div>

                                <div class="LatestJobsPagination">
                                    <div class="LatestJobsPaginationInner">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4" dir="ltr">
                        <div class="SubscribeMail">
                            <div class="SectionHeader">
                                <h10>
                                    <div class="MailSubHeaderIcon">
                                        <img src="{{ asset('') }}Wazefni/Requirements/IMG/Mail.png">
                                    </div>
                                    اشترك بالنشرة البريدية للموقع
                                </h10>
                            </div>
                            <form class="OutSideJobsForm">
                                <p>
                                    أدخل بريدك الإلكتروني للإشتراك في هذا الموقع لتستقبل أحدث المواضيع من خلال البريد
                                    الإلكتروني.
                                </p>
                                <input type="text" placeholder="اكتب هنا : بريدك الإلكتروني">
                                <input type="submit" value="إشترك">
                            </form>
                        </div>

                        <div class="HomeAds">
                            <div class="HomeAdsSliderGH">
                                @foreach($advertisings as $key => $advertising)
                                    <div class="HomeAdsSliderItem">
                                        <div class="HomeAdsSliderItemInner">
                                            @if($advertising->photo)
                                                <img src="{{ str_replace('localhost', 'localhost:8000', $advertising->photo->getUrl('thumb')) }}">
                                            @else
                                                <img src="{{ asset('') }}Wazefni/Requirements/IMG/RF.png">
                                            @endif
                                            <button type="button" onclick="$(this).find('a')[0].click()">
                                                <a href="{{ $advertising->url ?? '' }}" class="d-none" target="_blank"></a>
                                                <i class="fas fa-eye"></i>
                                                المزيد
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <p class="ContactAds">
                                <img src="{{ asset('') }}Wazefni/Requirements/IMG/Up.png" class="ContactAdsImg">
                                اعلن هنا
                                <button type="button" onclick="$(this).find('a')[0].click()">
                                    <a href="#" class="d-none" target="_blank"></a>
                                    <img src="{{ asset('') }}Wazefni/Requirements/IMG/Whatsapp.png">
                                    تواصل معنا
                                </button>
                            </p>
                        </div>

                        <div class="OutSideJobs">
                            <div class="SectionHeader">
                                <h10>
                                    وظائف خارج الأردن
                                </h10>
                            </div>
                            <div class="OutSideJobsGH">
                                @foreach($jobOutOfJordans as $key => $jobOutOfJordan)
                                    <div class="OutSideJobsItem">
                                        <div class="OutSideJobsItemImg">
                                            <img src="{{ asset('') }}Wazefni/Requirements/IMG/Job.webp">
                                        </div>
                                        <div class="OutSideJobsItemInfo">
                                            <h5 title="حساب موثق">
                                                @if($jobOutOfJordan->company->logo)
                                                    <img src="{{ str_replace('localhost', 'localhost:8000', $jobOutOfJordan->company->logo->getUrl('thumb')) }}" class="SpecialSliderUser">
                                                @else
                                                    <img src="{{ asset('') }}Wazefni/Requirements/IMG/RF.png" class="SpecialSliderUser">
                                                @endif
                                                {{ $jobOutOfJordan->company->name ?? '' }}
                                                <u>
                                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                </u>
                                            </h5>
                                            <h3>
                                                {{ $jobOutOfJordan->title ?? '' }} - {{ $jobOutOfJordan->location->country->name ?? '' }} - {{ $jobOutOfJordan->location->name ?? '' }}
                                            </h3>
                                            <span>
                                        <i class="fas fa-clock"></i>
                                        {{ $jobOutOfJordan->created_at->format('Y-m-d') ?? '' }}
                                    </span>
                                            @if($jobOutOfJordan->top_rated == 1)
                                                <h12 title="إعلان مميز">
                                                    <img src="{{ asset('') }}Wazefni/Requirements/IMG/Promoted.png">
                                                </h12>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                                <div class="SeeAllCATEGORIES">
                                    <button onclick="$(this).find('a')[0].click()" type="button">
                                        <a class="d-none" href="{{ route('jobs.index') }}?Outside=Jordan"></a>
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

    <input type="hidden" id="HomePage">
@endsection


@section('scripts')

        <script>
            $(document).ready(function () {
                @foreach($jobTops as $key => $jobTop)
                    var d = new Date("{{ $jobTop->created_at }}");
                    var month = d.toLocaleString('default', {month: 'long'});
                    var strDate = d.getFullYear() + "-" + month + "-" + d.getDate();


                    var date = new Date(strDate);
                    var months = ["يناير", "فبراير", "مارس", "إبريل", "مايو", "يونيو",
                        "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"
                    ];
                    var days = ["اﻷحد", "اﻷثنين", "الثلاثاء", "اﻷربعاء", "الخميس", "الجمعة", "السبت"];
                    var delDateString = days[date.getDay()] + ' ' + date.getDate() + ' ' + months[date.getMonth()] + ' ' + date.getFullYear();
                      $('#TopCreatedAtFormed{{ $jobTop->id }}').text(delDateString)
                @endforeach

                $('.SpecialOffersSlider').slick({
                    dots: true,
                    arrows: false,
                    infinite: false,
                    speed: 300,
                    slidesToShow: 5,
                    autoplay: true,
                    infinite: true,
                    slidesToScroll: 5,
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 4,
                                infinite: true,
                                dots: true
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2
                            }
                        }
                        // You can unslick at a given breakpoint now by adding:
                        // settings: "unslick"
                        // instead of a settings object
                    ]
                });

                $('.SpecialOffersSlider .slick-dots li').html('<div></div>')
            });
        </script>
@endsection
