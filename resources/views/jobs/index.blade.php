@extends('layouts.user')

@section('content')

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
                            <div class="col-md-2 col-sm-4">
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
                                <div class="col-md-2 col-sm-4">
                                    <div class="JobCategoryItem" onclick="SelectThisCategory($(this))" url="{{ route('GetByCategoriesJobs', [$searchCategory->id]) }}">
                                        <div class="JobCategoryItemDiv">
                                            <div class="JobCategoryItemInner">
                                                <img
                                                    src="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? asset("system/storage/app/$searchCategory->icon") : str_replace("public", "storage", asset("$searchCategory->icon")) }}">
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
                                <div class="LatestJobsItemsGH">
                                    @foreach($jobs as $key => $job)
                                        <div class="LatestJobsItem">
                                            <div class="LatestJobsItemImage">
                                                <img src="{{ asset('') }}Wazefni/Requirements/IMG/Job.webp">
                                            </div>
                                            <div class="LatestJobsItemInfo">
                                                <h5 title="{{ isset($job->company->created_by->email_verified_at) ? 'حساب موثق' : '' }}">
                                                    <img src="{{ asset('') }}Wazefni/Requirements/IMG/User.jpg"
                                                         class="SpecialSliderUser">
                                                    {{ $job->company->name ?? '' }}
                                                    <u>
                                                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                    </u>
                                                </h5>
                                                <h3>
                                                    {{ $job->short_description ?? '' }}
                                                </h3>
                                                <span>
                                                <i class="fas fa-clock"></i>
                                                {{ $job->created_at->format('l jS \o\f F Y h:i:s A') ?? '' }}
                                            </span>
                                                @if($job->promoted == 1)
                                                    <h12 title="إعلان مميز">
                                                        <img src="{{ asset('') }}Wazefni/Requirements/IMG/Promoted.png">
                                                    </h12>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="LatestJobsPagination">
                                    <div class="LatestJobsPaginationInner">
                                        <button type="button" class="ActivePagination">
                                            1
                                        </button>
                                        <button type="button">
                                            2
                                        </button>
                                        <button type="button">
                                            3
                                        </button>
                                        <button type="button">
                                            4
                                        </button>
                                        <button type="button">
                                            5
                                        </button>
                                        <button type="button">
                                            6
                                        </button>
                                        <button type="button">
                                            7
                                        </button>
                                        <button type="button">
                                            8
                                        </button>
                                        <button type="button">
                                            9
                                        </button>
                                        <button type="button">
                                            10
                                        </button>
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

                        <div class="OutSideJobs">
                            <div class="SectionHeader">
                                <h10>
                                    وظائف خارج الأردن
                                    <div class="Reload">
                                        <button type="button">
                                            <img src="{{ asset('') }}Wazefni/Requirements/IMG/Reload.png">
                                            تحديث
                                        </button>
                                    </div>
                                </h10>
                            </div>
                            <div class="OutSideJobsGH">
                                <div class="OutSideJobsItem">
                                    <div class="OutSideJobsItemImg">
                                        <img src="{{ asset('') }}Wazefni/Requirements/IMG/Job.webp">
                                    </div>
                                    <div class="OutSideJobsItemInfo">
                                        <h5 title="حساب موثق">
                                            <img src="{{ asset('') }}Wazefni/Requirements/IMG/User.jpg"
                                                 class="SpecialSliderUser">
                                            ابو غلوس
                                            - قطر
                                            <u>
                                                <i class="fa fa-check-circle" aria-hidden="true"></i>
                                            </u>
                                        </h5>
                                        <h3>
                                            مطلوب مدخل بيانات بخبرة لا تقل عن 3 سنوات في السوق المحلي
                                        </h3>
                                        <span>
                                        <i class="fas fa-clock"></i>
                                        قبل 3 ساعات
                                    </span>
                                        <h12 title="إعلان مميز">
                                            <img src="{{ asset('') }}Wazefni/Requirements/IMG/Promoted.png">
                                        </h12>
                                    </div>
                                </div>
                                <div class="OutSideJobsItem">
                                    <div class="OutSideJobsItemImg">
                                        <img src="{{ asset('') }}Wazefni/Requirements/IMG/Job.webp">
                                    </div>
                                    <div class="OutSideJobsItemInfo">
                                        <h5 title="حساب موثق">
                                            <img src="{{ asset('') }}Wazefni/Requirements/IMG/User.jpg"
                                                 class="SpecialSliderUser">
                                            ابو غلوس
                                            - قطر
                                            <u>
                                                <i class="fa fa-check-circle" aria-hidden="true"></i>
                                            </u>
                                        </h5>
                                        <h3>
                                            مطلوب مدخل بيانات بخبرة لا تقل عن 3 سنوات في السوق المحلي
                                        </h3>
                                        <span>
                                        <i class="fas fa-clock"></i>
                                        قبل 3 ساعات
                                    </span>
                                        <h12 title="إعلان مميز">
                                            <img src="{{ asset('') }}Wazefni/Requirements/IMG/Promoted.png">
                                        </h12>
                                    </div>
                                </div>
                                <div class="OutSideJobsItem">
                                    <div class="OutSideJobsItemImg">
                                        <img src="{{ asset('') }}Wazefni/Requirements/IMG/Job.webp">
                                    </div>
                                    <div class="OutSideJobsItemInfo">
                                        <h5 title="حساب موثق">
                                            <img src="{{ asset('') }}Wazefni/Requirements/IMG/User.jpg"
                                                 class="SpecialSliderUser">
                                            ابو غلوس
                                            - قطر
                                            <u>
                                                <i class="fa fa-check-circle" aria-hidden="true"></i>
                                            </u>
                                        </h5>
                                        <h3>
                                            مطلوب مدخل بيانات بخبرة لا تقل عن 3 سنوات في السوق المحلي
                                        </h3>
                                        <span>
                                        <i class="fas fa-clock"></i>
                                        قبل 3 ساعات
                                    </span>
                                        <h12 title="إعلان مميز">
                                            <img src="{{ asset('') }}Wazefni/Requirements/IMG/Promoted.png">
                                        </h12>
                                    </div>
                                </div>
                                <div class="OutSideJobsItem">
                                    <div class="OutSideJobsItemImg">
                                        <img src="{{ asset('') }}Wazefni/Requirements/IMG/Job.webp">
                                    </div>
                                    <div class="OutSideJobsItemInfo">
                                        <h5>
                                            <img src="{{ asset('') }}Wazefni/Requirements/IMG/User.jpg"
                                                 class="SpecialSliderUser">
                                            ابو غلوس
                                            - قطر
                                        </h5>
                                        <h3>
                                            مطلوب مدخل بيانات بخبرة لا تقل عن 3 سنوات في السوق المحلي
                                        </h3>
                                        <span>
                                        <i class="fas fa-clock"></i>
                                        قبل 3 ساعات
                                    </span>
                                    </div>
                                </div>
                                <div class="OutSideJobsItem">
                                    <div class="OutSideJobsItemImg">
                                        <img src="{{ asset('') }}Wazefni/Requirements/IMG/Job.webp">
                                    </div>
                                    <div class="OutSideJobsItemInfo">
                                        <h5>
                                            <img src="{{ asset('') }}Wazefni/Requirements/IMG/User.jpg"
                                                 class="SpecialSliderUser">
                                            ابو غلوس
                                            - قطر
                                        </h5>
                                        <h3>
                                            مطلوب مدخل بيانات بخبرة لا تقل عن 3 سنوات في السوق المحلي
                                        </h3>
                                        <span>
                                        <i class="fas fa-clock"></i>
                                        قبل 3 ساعات
                                    </span>
                                    </div>
                                </div>
                                <div class="OutSideJobsItem">
                                    <div class="OutSideJobsItemImg">
                                        <img src="{{ asset('') }}Wazefni/Requirements/IMG/Job.webp">
                                    </div>
                                    <div class="OutSideJobsItemInfo">
                                        <h5>
                                            <img src="{{ asset('') }}Wazefni/Requirements/IMG/User.jpg"
                                                 class="SpecialSliderUser">
                                            ابو غلوس
                                            - قطر
                                        </h5>
                                        <h3>
                                            مطلوب مدخل بيانات بخبرة لا تقل عن 3 سنوات في السوق المحلي
                                        </h3>
                                        <span>
                                        <i class="fas fa-clock"></i>
                                        قبل 3 ساعات
                                    </span>
                                    </div>
                                </div>
                                <div class="OutSideJobsItem">
                                    <div class="OutSideJobsItemImg">
                                        <img src="{{ asset('') }}Wazefni/Requirements/IMG/Job.webp">
                                    </div>
                                    <div class="OutSideJobsItemInfo">
                                        <h5>
                                            <img src="{{ asset('') }}Wazefni/Requirements/IMG/User.jpg"
                                                 class="SpecialSliderUser">
                                            ابو غلوس
                                            - قطر
                                        </h5>
                                        <h3>
                                            مطلوب مدخل بيانات بخبرة لا تقل عن 3 سنوات في السوق المحلي
                                        </h3>
                                        <span>
                                        <i class="fas fa-clock"></i>
                                        قبل 3 ساعات
                                    </span>
                                    </div>
                                </div>
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
        function SelectThisCategory(el) {
            $('.JobCategoryItemDiv').removeClass('ActiveCategory')
            el.find('.JobCategoryItemDiv').addClass('ActiveCategory')
            $('.LatestJobsGH .SectionHeader h10 u').text(el.find('span').text())

            $.ajax({
                url: el.attr('url'),
                type: "GET",
                dataType: 'json',
                complete: function (){
                    setTimeout(function (){
                        alert('Completed')
                    }, 1000)
                },
                success: function (data) {
                    alert('phase02')
                    $('.LatestJobsItemsGH').html('')
                    $.each(data.jobs['data'], function (k, v) {
                        $(".LatestJobsItemsGH").append('<div class="LatestJobsItem">' +
                            '<div class="LatestJobsItemImage">' +
                            '<img src="http://127.0.0.1:8000/Wazefni/Requirements/IMG/Job.webp">' +
                            '</div>' +
                            '<div class="LatestJobsItemInfo">' +
                            '<h5 title="">' +
                            '<img src="http://127.0.0.1:8000/Wazefni/Requirements/IMG/User.jpg" class="SpecialSliderUser">' +
                            ' Starlet IT Company' +
                            '<u>' +
                            ' <i class="fa fa-check-circle" aria-hidden="true"></i>' +
                            '</u>' +
                            '</h5>' +
                            '<h3>' +
                            ' Description  Description  Description  Description  Description  ' +
                            '</h3>' +
                            '<span>' +
                            '<i class="fas fa-clock"></i>' +
                            ' Wednesday 8th of March 2023 06:00:29 PM' +
                            '</span>' +
                            '</div>' +
                            '</div>');
                    });

                    console.log('im here');
                    if (data.jobs['next_page_url'] == null)
                    {
                        console.log('No More');
                    } else
                    {

                        // $("#MoreOtherExperiences").attr('rel', data.jobs['next_page_url']);
                        $('.LatestJobsPaginationInner').html('')
                        $.each(data.jobs['links'], function (k, v) {
                            var urlWithPaginationNumber = v['url'];
                            console.log(v['url']);
                            console.log(v['label']);
                            $('.LatestJobsPaginationInner').append('<button type="button" onclick="SelectThisCategory($(this))" url="'+urlWithPaginationNumber+'">'
                            +v['label']+
                            '</button>')
                        });

                    }
                },
                error: function (xhr, ajaxOptions, thrownError, data) {
                    console.log(xhr);
                    console.log(ajaxOptions);
                    console.log(thrownError);
                    console.log(data);
                }

            });
        }

    </script>

@endsection

@foreach($jobs as $key => $job)

@endforeach

