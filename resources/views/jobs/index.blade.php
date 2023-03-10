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
            $('.LatestJobsItemsGH').html('')
            $('.LatestJobsPaginationInner').html('')
            $('.LatestJobsItem').hide()
            $('.LatestJobsPagination').hide()
            $('.JobsCardLoader').show()
            $('html, body').animate({
                scrollTop: $(".LatestJobsItemsGH").offset().top
            }, 2000);

            $.ajax({
                url: el.attr('url'),
                type: "GET",
                dataType: 'json',
                complete: function (){
                    setTimeout(function (){
                        $('.JobsCardLoader').hide()
                        $('.LatestJobsItem').show()
                        $('.LatestJobsPagination').show()
                    }, 1000)
                },
                success: function (data) {
                    $.each(data.jobs['data'], function (k, v) {
                        var d = new Date(v['created_at']);
                        var month = d.toLocaleString('default', {month: 'long'});
                        var strDate = d.getFullYear() + "-" + month + "-" + d.getDate();


                        var date = new Date(strDate);
                        var months = ["يناير", "فبراير", "مارس", "إبريل", "مايو", "يونيو",
                            "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"
                        ];
                        var days = ["اﻷحد", "اﻷثنين", "الثلاثاء", "اﻷربعاء", "الخميس", "الجمعة", "السبت"];
                        var delDateString = days[date.getDay()] + ' ' + date.getDate() + ' ' + months[date.getMonth()] + ' ' + date.getFullYear();

                        console.log(delDateString); // Outputs اﻷحد, 4 ديسمبر, 2016



                        var Name    = v['company']['logo']['thumbnail'];
                        var NewName = Name.replace('localhost','localhost:8000')
                        $(".LatestJobsItemsGH").append('<div class="LatestJobsItem animate__animated animate__fadeIn" style="display: none">' +
                            '<div class="LatestJobsItemImage">' +
                            '<img src="http://127.0.0.1:8000/Wazefni/Requirements/IMG/Job.webp">' +
                            '</div>' +
                            '<div class="LatestJobsItemInfo">' +
                            '<h5 title="'+v['company']['name']+'">' +
                            '<img src="'+NewName+'" class="SpecialSliderUser">' +
                             v['company']['name']+
                            '<u>' +
                            ' <i class="fa fa-check-circle" aria-hidden="true"></i>' +
                            '</u>' +
                            '</h5>' +
                            '<h3>' +
                             v['title'] +
                            '</h3>' +
                             '<p title="'+v['full_description']+'">' +
                             v['full_description'] +
                            '</p>'+
                            '<span>' +
                            '<i class="fas fa-clock"></i>' +
                            delDateString +
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

