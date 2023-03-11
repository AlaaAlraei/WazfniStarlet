<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> وظفني - wzfni </title>
    <meta name="description" content="An interactive getting started guide for Brackets.">

    <link rel="icon" href="{{ asset('') }}Wazefni/Requirements/IMG/LogoIcon.png">

    <link rel="stylesheet" href="{{ asset('') }}Wazefni/Requirements/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('') }}Wazefni/Requirements/CSS/slick.css">
    <link rel="stylesheet" href="{{ asset('') }}Wazefni/Requirements/CSS/animate.min.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('') }}Wazefni/Requirements/CSS/style.css">
    <link rel="stylesheet" href="{{ asset('') }}Wazefni/Requirements/CSS/mobile.css">
</head>
<body dir="rtl">

@include('partials.header')

@yield('content')
<div class="Preloader">
    <div class="PreloaderInner animate__animated">
        <img src="https://wallpaperaccess.com/full/3175367.jpg" class="PreloaderBG">
        <div class="PreloaderDiv">
            <img src="{{ asset('') }}Wazefni/Requirements/IMG/LogoIcon.png">
            <p>
                لحظة من فضلك ...
            </p>
        </div>
    </div>
</div>

@auth()
    <div id="EditInformation">
        <div class="LoginInner">
            <div class="LoginFade" onclick="$('#EditInformation').fadeOut(600)"></div>
            <div class="LoginDiv animate__animated animate__zoomIn">
                <div class="LoginRegisterTabs">
                    <button type="button" onclick="SwitchRegSignStatus($(this))" rel="#UserInfoForm">
                        تعديل معلوماتي
                        <div></div>
                    </button>
                    <button type="button" onclick="SwitchRegSignStatus($(this))" rel="#PasswordChangeForm">
                        كلمة المرور
                        <div></div>
                    </button>
                </div>
                <form class="LoginForm animate__animated animate__fadeInUp" id="UserInfoForm" method="POST"
                      action="{{ route('clientLogin') }}">
                    @csrf
                    <div class="LoginFormRow">
                        <label>
                            الاسم
                        </label>
                        <div class="InputHolder">
                            <u>
                                <i class="fas fa-user"></i>
                            </u>
                            <input type="email" placeholder="اكتب هنا : اسمك من مقطعين على الاقل"
                                   value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                    <div class="LoginFormRow">
                        <label>
                            كلمة المرور
                        </label>
                        <div class="InputHolder">
                            <u>
                                <i class="fas fa-key"></i>
                            </u>
                            <input type="password" placeholder="اكتب هنا : كلمة المرور" name="password" required>
                            <button type="button" class="SeePassword" onclick="ShowPassword($(this))">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <span class="RememberMe">
                    <input value="{{ csrf_token() }}" type="checkbox" name="remember_token">
                    تذكرني
                    <a href="{{ route('password.request') }}" target="_blank">
                        نسيت كلمة السر ؟
                    </a>
                </span>
                    <div class="LoginFormRow">
                        <button type="submit">
                            تسجيل الدخول
                        </button>
                    </div>
                    <div class="OtherLoginMethods">
                        <h3>
                            أو يمكنك تسجيل الدخول عن طريق
                        </h3>
                        <div class="OtherLoginMethodsOptions">
                            <button type="button" style="background-color: #394e7c">
                                <img src="https://cdn-icons-png.flaticon.com/128/3128/3128208.png">
                                فيسبوك
                            </button>
                            <button type="button" style="background-color: #e74233">
                                <img src="https://cdn-icons-png.flaticon.com/128/2991/2991147.png">
                                جوجل
                            </button>
                            <button type="button" style="background-color: #0074b1">
                                <img src="https://cdn-icons-png.flaticon.com/128/3128/3128219.png">
                                لينكد إن
                            </button>
                        </div>
                    </div>
                </form>

                <form class="LoginForm animate__animated animate__fadeInUp" id="PasswordChangeForm" method="POST"
                      action="{{ route('clientLogin') }}">
                    @csrf
                    <div class="LoginFormRow">
                        <label>
                            الاسم
                        </label>
                        <div class="InputHolder">
                            <u>
                                <i class="fas fa-user"></i>
                            </u>
                            <input type="email" placeholder="اكتب هنا : اسمك من مقطعين على الاقل"
                                   value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                    <div class="LoginFormRow">
                        <label>
                            كلمة المرور
                        </label>
                        <div class="InputHolder">
                            <u>
                                <i class="fas fa-key"></i>
                            </u>
                            <input type="password" placeholder="اكتب هنا : كلمة المرور" name="password" required>
                            <button type="button" class="SeePassword" onclick="ShowPassword($(this))">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <span class="RememberMe">
                    <input value="{{ csrf_token() }}" type="checkbox" name="remember_token">
                    تذكرني
                    <a href="{{ route('password.request') }}" target="_blank">
                        نسيت كلمة السر ؟
                    </a>
                </span>
                    <div class="LoginFormRow">
                        <button type="submit">
                            تسجيل الدخول
                        </button>
                    </div>
                    <div class="OtherLoginMethods">
                        <h3>
                            أو يمكنك تسجيل الدخول عن طريق
                        </h3>
                        <div class="OtherLoginMethodsOptions">
                            <button type="button" style="background-color: #394e7c">
                                <img src="https://cdn-icons-png.flaticon.com/128/3128/3128208.png">
                                فيسبوك
                            </button>
                            <button type="button" style="background-color: #e74233">
                                <img src="https://cdn-icons-png.flaticon.com/128/2991/2991147.png">
                                جوجل
                            </button>
                            <button type="button" style="background-color: #0074b1">
                                <img src="https://cdn-icons-png.flaticon.com/128/3128/3128219.png">
                                لينكد إن
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@else
    <div id="Login">
        <div class="LoginInner">
            <div class="LoginFade" onclick="$('#Login').fadeOut(600)"></div>
            <div class="LoginDiv animate__animated animate__zoomIn">
                <div class="LoginRegisterTabs">
                    <button type="button" onclick="SwitchRegSignStatus($(this))" rel="#LoginForm">
                        تسجيل الدخول
                        <div></div>
                    </button>
                    <button type="button" onclick="SwitchRegSignStatus($(this))" rel="#RegisterForm">
                        إنشاء حساب
                        <div></div>
                    </button>
                </div>
                <form class="LoginForm animate__animated animate__fadeInUp" id="LoginForm" method="POST"
                      action="{{ route('clientLogin') }}">
                    @csrf
                    <div class="LoginFormRow">
                        <label>
                            البريد الاكتروني
                        </label>
                        <div class="InputHolder">
                            <u>
                                <i class="fas fa-envelope"></i>
                            </u>
                            <input type="email" placeholder="example@wzfni.com" name="username" required>
                        </div>
                    </div>
                    <div class="LoginFormRow">
                        <label>
                            كلمة المرور
                        </label>
                        <div class="InputHolder">
                            <u>
                                <i class="fas fa-key"></i>
                            </u>
                            <input type="password" placeholder="اكتب هنا : كلمة المرور" name="password" required>
                            <button type="button" class="SeePassword" onclick="ShowPassword($(this))">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <span class="RememberMe">
                    <input value="{{ csrf_token() }}" type="checkbox" name="remember_token">
                    تذكرني
                    <a href="{{ route('password.request') }}" target="_blank">
                        نسيت كلمة السر ؟
                    </a>
                </span>
                    <div class="LoginFormRow">
                        <button type="submit">
                            تسجيل الدخول
                        </button>
                    </div>
                    <div class="OtherLoginMethods">
                        <h3>
                            أو يمكنك تسجيل الدخول عن طريق
                        </h3>
                        <div class="OtherLoginMethodsOptions">
                            <button type="button" style="background-color: #394e7c">
                                <img src="https://cdn-icons-png.flaticon.com/128/3128/3128208.png">
                                فيسبوك
                            </button>
                            <button type="button" style="background-color: #e74233">
                                <img src="https://cdn-icons-png.flaticon.com/128/2991/2991147.png">
                                جوجل
                            </button>
                            <button type="button" style="background-color: #0074b1">
                                <img src="https://cdn-icons-png.flaticon.com/128/3128/3128219.png">
                                لينكد إن
                            </button>
                        </div>
                    </div>
                </form>

                <form class="LoginForm animate__animated animate__fadeInUp" id="RegisterForm" method="POST" action="">
                    <div class="LoginFormRow">
                        <div class="FormTwoBtns">
                            <button type="button" onclick="RegOptionsFunc($(this))" rel="Personal">
                                <input type="radio" name="AuthType">
                                صاحب عمل
                            </button>
                            <button type="button" onclick="RegOptionsFunc($(this))" rel="Buissnes">
                                <input type="radio" name="AuthType">
                                باحث عن وظيفة
                            </button>
                        </div>
                    </div>
                    <div class="LoginFormRow" id="RegNAME">
                        <label>

                        </label>
                        <div class="InputHolder">
                            <u>
                                <i class="fas fa-user"></i>
                            </u>
                            <input type="text" placeholder="" name="name" required>
                        </div>
                    </div>
                    <div class="LoginFormRow">
                        <label>
                            رقم الموبايل
                        </label>
                        <div class="InputHolder InputWithSelect">
                            <u>
                                <i class="fas fa-mobile"></i>
                            </u>
                            <input type="number" placeholder="رقم الهاتف ( من غير مفتاح الدولة )" name="mobile"
                                   required>
                            <div class="MobileNumberSelectCountry">
                                <select>
                                    <option>
                                        الأردن
                                        (+962)
                                    </option>
                                    <option>
                                        السعودية
                                        (+584)
                                    </option>
                                    <option>
                                        قطر
                                        (+745)
                                    </option>
                                    <option>
                                        تركيا
                                        (+852)
                                    </option>
                                    <option>
                                        الكويت
                                        (+125)
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="LoginFormRow">
                        <label>
                            البريد الاكتروني
                        </label>
                        <div class="InputHolder">
                            <u>
                                <i class="fas fa-envelope"></i>
                            </u>
                            <input type="text" placeholder="example@wzfni.com" name="email" required>
                        </div>
                    </div>
                    <div class="LoginFormRow">
                        <label>
                            كلمة المرور
                        </label>
                        <div class="InputHolder">
                            <u>
                                <i class="fas fa-key"></i>
                            </u>
                            <input type="password" placeholder="اكتب هنا : كلمة المرور" name="password" required>
                            <button type="button" class="SeePassword" onclick="ShowPassword($(this))">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="LoginFormRow">
                        <label>
                            تأكيد كلمة المرور
                        </label>
                        <div class="InputHolder">
                            <u>
                                <i class="fas fa-key"></i>
                            </u>
                            <input type="password" placeholder="اكتب هنا : كلمة المرور مرة اخرى" name="password"
                                   required>
                            <button type="button" class="SeePassword" onclick="ShowPassword($(this))">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <span class="RememberMe">
                    <input type="checkbox" name="AcceptTerms" required>
                    موافق على جميع
                    <u onclick="$(this).find('a')[0].click()">
                        <a href="#" target="_blank" class="d-none"></a>
                        الشروط والأحكام
                    </u>
                </span>
                    <div class="LoginFormRow">
                        <button type="submit">
                            إنشاء حساب
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endauth
<form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
@include('partials.footer')

<script src="{{ asset('') }}Wazefni/Requirements/JS/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('') }}Wazefni/Requirements/JS/aos.js"></script>
<script type="text/javascript" src="http://www.datejs.com/build/date.js"></script>
<script src="{{ asset('') }}Wazefni/Requirements/JS/jquery-3.6.0.min.js"></script>
<script src="{{ asset('') }}Wazefni/Requirements/JS/numscroller-1.0.js"></script>
<script src="{{ asset('') }}Wazefni/Requirements/JS/slick.min.js"></script>
<script src="{{ asset('') }}Wazefni/Requirements/JS/javascript.js"></script>

<script>
    function SelectThisCategory(el) {
        if ($('.JobCategoryItem').hasClass('scrollonclick')) {
            $('html, body').animate({
                scrollTop: $(".LatestJobsItemsGH").offset().top
            }, 2000);
        }

        if (el.parent().hasClass('LatestJobsPaginationInner')) {
            el.parent().find('button').removeClass('ActivePagination')
            el.addClass('ActivePagination')
        } else {
            $('.JobCategoryItemDiv').removeClass('ActiveCategory')
            el.find('.JobCategoryItemDiv').addClass('ActiveCategory')
            $('.LatestJobsGH .SectionHeader h10 u').text(el.find('span').text())
            $('.LatestJobsPaginationInner').html('')
        }
        $('.LatestJobsItemsGH').html('')
        $('.LatestJobsItem').hide()
        $('.LatestJobsPagination').hide()
        $('.JobsCardLoader').show()

        $.ajax({
            url: el.attr('url'),
            type: "GET",
            dataType: 'json',
            complete: function () {
                setTimeout(function () {
                    $('.JobsCardLoader').hide()
                    $('.LatestJobsItem').show()
                    $('.LatestJobsPagination').show()
                    $('.JobCategoryItem').addClass('scrollonclick')
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
                    console.log(data); // Outputs اﻷحد, 4 ديسمبر, 2016


                    var Name = v['company']['logo']['thumbnail'];
                    var NewName = Name.replace('localhost', 'localhost:8000')
                    $(".LatestJobsItemsGH").append('<div class="LatestJobsItem animate__animated animate__fadeIn" style="display: none">' +
                        '<div class="LatestJobsItemImage">' +
                        '<img src="http://127.0.0.1:8000/Wazefni/Requirements/IMG/Job.webp">' +
                        '</div>' +
                        '<div class="LatestJobsItemInfo">' +
                        '<h5 title="' + v['company']['name'] + '" onclick="$(this).find(\'a\')[0].click()">' +
                        '<a href="{{asset("")}}Company/'+v['company']['id']+'" class="d-none"></a>' +
                        '<img src="' + NewName + '" class="SpecialSliderUser">' +
                        v['company']['name'] +
                        '<u>' +
                        ' <i class="fa fa-check-circle" aria-hidden="true"></i>' +
                        '</u>' +
                        '</h5>' +
                        '<h3 onclick="$(this).find(\'a\')[0].click()">' +
                        '<a href="{{asset("")}}jobs/'+v['id']+'" class="d-none"></a>' +
                        v['title'] +
                        '</h3>' +
                        '<p>' +
                        v['full_description'] +
                        '</p>' +
                        '<span title="تاريخ النشر">' +
                        '<i class="fas fa-clock"></i>' +
                        delDateString +
                        '</span>' +
                        '<div class="JobDetails">' +
                        '<h15 title="مكان الوظيفة" style="background: #a14444;">' +
                        '<img src="{{asset("")}}Wazefni/Requirements/IMG/Location.png">' +
                        v['address']+
                        '</h15>' +
                        '<h15 title="الراتب">' +
                        '<img src="{{asset("")}}Wazefni/Requirements/IMG/Salary.png">' +
                        v['salary']+'<u> دينار </u>' +
                        '</h15>' +
                        '<h15 style="background: #616161" class="NoImgJobDetail" title="نوع الوظيفة">' +
                        v['job_nature']+
                        '</h15>' +
                        '</div>'+
                        '<input type="hidden" class="IsRated' + v['top_rated'] + '" rel="' + v['location_id'] + '">' +
                        '</div>' +
                        '</div>');
                });

                $('.IsRated1').parent().addClass('SpecialOfferIndicator');
                $('.IsRated1').parent().append('<h12 title="إعلان مميز"><img src="{{asset("")}}Wazefni/Requirements/IMG/Promoted.png"></h12>');

                console.log('im here');
                if (data.jobs['next_page_url'] == null) {
                    console.log('No More');
                } else {
                    $('.LatestJobsPaginationInner').html('')
                    // $("#MoreOtherExperiences").attr('rel', data.jobs['next_page_url']);
                    $.each(data.jobs['links'], function (k, v) {
                        var urlWithPaginationNumber = v['url'];
                        console.log(v['url']);
                        console.log(v['label']);
                        $('.LatestJobsPaginationInner').append('<button type="button" onclick="SelectThisCategory($(this))" url="' + urlWithPaginationNumber + '">'
                            + v['label'] +
                            '</button>')
                    });
                    $('.LatestJobsPaginationInner button').first().addClass('ActivePagination')

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
@yield('scripts')
</body>
</html>
