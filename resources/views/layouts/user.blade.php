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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet"/>
</head>
<body dir="rtl">
@if($errors->count() > 0)
    @if (Session::has('login'))
        <div class="alert alert-danger">{{ Session::get('login') }}</div>
    @else
        <div class="alert alert-danger">Error Because Register</div>
    @endif
    <div class="alert alert-danger">
        <ul class="list-unstyled">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


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

<div class="ads" id="ad">
    <img src="{{asset("")}}Wazefni/Requirements/IMG/ads.jpg" height="250" width="300" alt="">
</div>


@auth
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
                      action="{{ route('profile.UpdateGeneralEmployeeProfile') }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="LoginFormRow">
                                <label>
                                    الاسم الاول
                                </label>
                                <div class="InputHolder">
                                    <u>
                                        <i class="fas fa-user"></i>
                                    </u>
                                    <input name="name" type="text" placeholder="اكتب هنا : اسمك الاول" value="{{ Auth::user()->name }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="LoginFormRow">
                                <label>
                                    الاسم الثاني
                                </label>
                                <div class="InputHolder">
                                    <u>
                                        <i class="fas fa-user"></i>
                                    </u>
                                    <input name="last_name" type="text" placeholder="اكتب هنا : اسمك الثاني" value="{{ Auth::user()->last_name }}" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="SocialMediaTrigger" onclick="$('.EditSocialMediaParent').slideToggle()">
                        <span>
                            <i class="fas fa-angle-down"></i>
                            التواصل الاجتماعي
                        </span>
                    </div>

                    <div class="EditSocialMediaParent">
                        <div class="row EditSocialMedia animate__animated animate__zoomIn">
                            <div class="col-md-6">
                                <div class="LoginFormRow">
                                    <label>
                                        <i class="fab fa-facebook"></i>
                                        فيس بوك
                                    </label>
                                    <div class="InputHolder">
                                        <u>
                                            <i class="fab fa-facebook"></i>
                                        </u>
                                        <input name="facebook" type="text" placeholder="اكتب هنا: رابط ملف الفيس بوك" value="{{ Auth::user()->employee->facebook ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="LoginFormRow">
                                    <label>
                                        <i class="fab fa-instagram"></i>
                                        انستغرام
                                    </label>
                                    <div class="InputHolder">
                                        <u>
                                            <i class="fab fa-instagram"></i>
                                        </u>
                                        <input name="instagram" type="text" placeholder="اكتب هنا: رابط ملف الانستغرام" value="{{ Auth::user()->employee->instagram ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="LoginFormRow">
                                    <label>
                                        <i class="fab fa-linkedin"></i>
                                        لينكد إن
                                    </label>
                                    <div class="InputHolder">
                                        <u>
                                            <i class="fab fa-linkedin"></i>
                                        </u>
                                        <input name="linkedin" type="text" placeholder="اكتب هنا: رابط ملف اللينكد إن" value="{{ Auth::user()->employee->linkedin ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="LoginFormRow">
                                    <label>
                                        <i class="fab fa-twitter"></i>
                                        تويتر
                                    </label>
                                    <div class="InputHolder">
                                        <u>
                                            <i class="fab fa-twitter"></i>
                                        </u>
                                        <input name="twitter" type="text" placeholder="اكتب هنا: رابط ملف التويتر" value="{{ Auth::user()->employee->twitter ?? '' }}">
                                    </div>
                                </div>
                            </div>
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
                            <input type="text" value="{{ Auth::user()->phone }}" placeholder="رقم الهاتف ( من غير مفتاح الدولة )" name="phone" required="">
                            <div class="MobileNumberSelectCountry">
                                <select name="country_id" required>
                                    @foreach($countries as $key => $country)
                                        <option value="{{ $country->id ?? '' }}">
                                            {{ $country->name ?? '' }}
                                            (+{{ $country->country_key ?? '' }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="LoginFormRow SelectAuthCategoryParent">
                        <label>
                            فئة العمل
                            (إختياري)
                        </label>
                        <div class="InputHolder">
                            <button type="button" class="AuthCtegorySelect" id="SelectedCategoryOnUserEdit">
                                <g onclick="ShowCustomSelect($(this))" rel="#EditInfoSelectCat">اختيار فئة الوظيفة</g>
                                <i class="fas fa-angle-down" rel="#EditInfoSelectCat"
                                   onclick="ClearEditInfoCategory($(this))" title="حذف الفئة"></i>
                            </button>
                        </div>
                        <div class="SelectAuthCategoryList" id="EditInfoSelectCat">
                            <div class="SelectAuthCategoryListInner">
                                @foreach($HeadCategories as $key => $category)
                                    <div class="SelectAuthCategoryListItem" onclick="SelectThisJobCreateCategory($(this))" rel="#SelectedCategoryOnCreate">
                                        <input type="radio" name="category_id" value="{{ $category->id }}" {{ old('category_id', isset(Auth::user()->employee->category_id) && Auth::user()->employee->category_id == $category->id ? $category->name : '') ? 'checked' : '' }} class="d-none">
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
                        <h15>
                            (ينصح به) ,
                            يقوم نظامنا الذكي بحصر المعلومات عند اختيارك فئة العمل المناسبة لك مما يسهل عملية البحث
                            ويساعد في عرض الوظائف المنسبة لنخصصك .
                        </h15>
                    </div>

                    <div class="LoginFormRow">
                        <button type="submit">
                            حفظ المعلومات
                        </button>
                    </div>
                </form>

                <form class="LoginForm animate__animated animate__fadeInUp" id="PasswordChangeForm" method="POST"
                      action="{{ route('clientLogin') }}">
                    @csrf
                    <div class="LoginFormRow">
                        <label>
                            كلمة السر الحالية
                        </label>
                        <div class="InputHolder">
                            <u>
                                <i class="fas fa-user"></i>
                            </u>
                            <input type="password" placeholder="اكتب هنا : كلمة السر الحالية">
                            <button type="button" class="SeePassword" onclick="ShowPassword($(this))">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="LoginFormRow">
                        <label>
                            كلمة السر الجديدة
                        </label>
                        <div class="InputHolder">
                            <u>
                                <i class="fas fa-user"></i>
                            </u>
                            <input type="password" placeholder="اكتب هنا : كلمة السر الجديدة">
                            <button type="button" class="SeePassword" onclick="ShowPassword($(this))">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="LoginFormRow">
                        <label>
                            تأكيد كلمة السر الجديدة
                        </label>
                        <div class="InputHolder">
                            <u>
                                <i class="fas fa-user"></i>
                            </u>
                            <input type="password" placeholder="اكتب هنا : كلمة السر الجديدة مرة اخرى">
                            <button type="button" class="SeePassword" onclick="ShowPassword($(this))">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="LoginFormRow">
                        <button type="submit">
                            حفظ لكة المرور
                        </button>
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
                    <button type="button" onclick="SwitchRegSignStatus($(this))" rel="#RegisterForm"
                            id="CraeateAccountTab">
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

                <form class="LoginForm animate__animated animate__fadeInUp" id="RegisterForm" method="POST"
                      action="{{ route('Register') }}">
                    @csrf
                    <div class="LoginFormRow">
                        <div class="FormTwoBtns">
                            <button class="{{ old('role', null) == 2 ? 'class' : '' }}" type="button"
                                    onclick="RegOptionsFunc($(this))" rel="Buissnes">
                                <input {{ old('role', null) == 2 ? 'checked' : '' }} value="2" type="radio" name="role"
                                       required>
                                صاحب عمل
                            </button>
                            <button class="{{ old('role', null) == 3 ? 'class' : '' }}" type="button"
                                    onclick="RegOptionsFunc($(this))" rel="Personal">
                                <input {{ old('role', null) == 3 ? 'checked' : '' }} value="3" type="radio" name="role"
                                       required>
                                باحث عن وظيفة
                            </button>
                        </div>
                    </div>

                    <div class="row AuthSelector" id="RegPersonal">
                    </div>

                    <div class="LoginFormRow AuthSelector" id="RegBuissnes">

                    </div>

                    <div class="LoginFormRow">
                        <label>
                            رقم الموبايل
                        </label>
                        <div class="InputHolder InputWithSelect">
                            <u>
                                <i class="fas fa-mobile"></i>
                            </u>
                            <input type="number" placeholder="رقم الهاتف ( من غير مفتاح الدولة )" name="phone" required
                                   value="{{ old('phone', null) }}">
                            <div class="MobileNumberSelectCountry">
                                <select name="country_id" required>
                                    @foreach($countries as $key => $country)
                                        <option value="{{ $country->id ?? '' }}">
                                            {{ $country->name ?? '' }}
                                            (+{{ $country->country_key ?? '' }})
                                        </option>
                                    @endforeach
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
                            <input type="email" placeholder="example@wzfni.com" name="email"
                                   value="{{ old('email', null) }}" required>
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
                            <input type="password" placeholder="اكتب هنا : كلمة المرور مرة اخرى"
                                   name="password_confirmation"
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
                    <div class="FormErrorsGH" id="RegErrorsGH">

                    </div>
                    <div class="LoginFormRow">
                        <button type="submit">
                            إنشاء حساب
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @auth
        <input type="hidden" id="AuthStatus" value="1">
    @else
        <input type="hidden" id="AuthStatus" value="0">
    @endauth

    @can('Seeker')
        <input type="hidden" id="RoleStatus" value="Seeker">
    @elsecan('Business')
        <input type="hidden" id="RoleStatus" value="Business">
    @else
        <input type="hidden" id="RoleStatus" value="Admin">
    @endcan
@endauth
<form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
@include('partials.footer')

<div class="BlockerDetected">
    <div class="BlockerDetectedInner">
        <img src="{{ asset('') }}Wazefni/Requirements/IMG/BlockerIndicator.png" class="BlockerIndicator">
        <div class="BlockerDetectedFade"></div>
        <div class="BlockerDetectedDiv animate__animated animate__zoomIn">
            <img src="{{ asset('') }}Wazefni/Requirements/IMG/Blocker.png" class="BlockerLogo">
            <h3>
                 أداة حظر الإعلانات
            </h3>
            <p>
                لتتمكن من الإستمرار في الموقع , يرجى اغلاق اداة حظر الإعلانات من اعدادات المتصفح.
            </p>
            <button type="button" onclick="location.reload();">
                <img src="{{ asset('') }}Wazefni/Requirements/IMG/Refresh.png">
                إعادة تحميل الصفحة
            </button>
        </div>
    </div>
</div>

<script src="{{ asset('') }}Wazefni/Requirements/JS/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('') }}Wazefni/Requirements/JS/aos.js"></script>
<script type="text/javascript" src="http://www.datejs.com/build/date.js"></script>
<script src="{{ asset('') }}Wazefni/Requirements/JS/jquery-3.6.0.min.js"></script>
<script src="{{ asset('') }}Wazefni/Requirements/JS/numscroller-1.0.js"></script>
<script src="{{ asset('') }}Wazefni/Requirements/JS/slick.min.js"></script>
<script src="{{ asset('') }}Wazefni/Requirements/JS/javascript.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

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

                    // console.log(delDateString); // Outputs اﻷحد, 4 ديسمبر, 2016
                    // console.log(data); // Outputs اﻷحد, 4 ديسمبر, 2016


                    var Name = v['company']['logo']['thumbnail'];
                    var NewName = Name.replace('localhost', 'localhost:8000')

                    var NewJobThumb = '{{asset("")}}Wazefni/Requirements/IMG/RF.png';

                    if (v['photo'] != null) {
                        var JobThumb = v['photo']['thumbnail'];
                        NewJobThumb = JobThumb.replace('localhost', 'localhost:8000')
                    }

                    console.log(NewJobThumb);

                    $(".LatestJobsItemsGH").append('<div class="LatestJobsItem animate__animated animate__fadeIn" style="display: none">' +
                        '<div class="LatestJobsItemImage">' +
                        '<img src="' + NewJobThumb + '">' +
                        '</div>' +
                        '<div class="LatestJobsItemInfo">' +
                        '<h5 title="' + v['company']['name'] + '" onclick="$(this).find(\'a\')[0].click()">' +
                        '<a href="/company-profile/' + v['company']['id'] + '" class="d-none"></a>' +
                        // '<a class="d-none" onclick="$(\'#HeaderLoginBtn\).click()"></a>' +
                        '<img src="' + NewName + '" class="SpecialSliderUser">' +
                        v['company']['name'] +
                        '<u>' +
                        ' <i class="fa fa-check-circle" aria-hidden="true"></i>' +
                        '</u>' +
                        '</h5>' +
                        '<h3 onclick="$(this).find(\'a\')[0].click()">' +
                        '<a href="{{asset("")}}jobs/' + v['id'] + '" class="d-none"></a>' +
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
                        v['address'] +
                        '</h15>' +
                        '<h15 title="الراتب">' +
                        '<img src="{{asset("")}}Wazefni/Requirements/IMG/Salary.png">' +
                        v['salary'] + '<u> دينار </u>' +
                        '</h15>' +
                        '<h15 style="background: #616161" class="NoImgJobDetail" title="نوع الوظيفة">' +
                        v['job_nature'] +
                        '</h15>' +
                        '</div>' +
                        '<input type="hidden" class="IsRated' + v['top_rated'] + '" rel="' + v['location_id'] + '">' +
                        '</div>' +
                        '</div>');
                });

                $('.IsRated1').parent().addClass('SpecialOfferIndicator');
                $('.IsRated1').parent().append('<h12 title="إعلان مميز"><img src="{{asset("")}}Wazefni/Requirements/IMG/Promoted.png"></h12>');

                // console.log('im here');
                if (data.jobs['next_page_url'] == null) {
                    // console.log('No More');
                } else {
                    $('.LatestJobsPaginationInner').html('')
                    // $("#MoreOtherExperiences").attr('rel', data.jobs['next_page_url']);
                    $.each(data.jobs['links'], function (k, v) {
                        var urlWithPaginationNumber = v['url'];
                        console.log(v['url']);
                        console.log(v['label']);
                        if (v['label'] != "&laquo; Previous" && v['label'] != "Next &raquo;") {
                            $('.LatestJobsPaginationInner').append('<button type="button" onclick="SelectThisCategory($(this))" url="' + urlWithPaginationNumber + '">'
                                + v['label'] +
                                '</button>')
                        }

                    });
                    $('.LatestJobsPaginationInner button').first().addClass('ActivePagination')

                }

                if ($('#AuthStatus').val() === '0') {
                    $('.LatestJobsItem .LatestJobsItemInfo h3 a').remove()
                    $('.LatestJobsItem .LatestJobsItemInfo h3').append('<a onclick="$(\'#HeaderLoginBtn\').click()"></a>')
                }
            },
            error: function (xhr, ajaxOptions, thrownError, data) {
                // console.log(xhr);
                // console.log(ajaxOptions);
                // console.log(thrownError);
                // console.log(data);
            }

        });
    }

    // Registration Form Role Selecter
    function RegOptionsFunc(el) {
        el.find('input').prop('checked', 'true')
        el.parent().find('button').removeClass('ActiveRegOption')
        el.addClass('ActiveRegOption')
        if (el.attr('rel') === 'Buissnes') {
            $('#RegPersonal').html('')
            $('#RegPersonal').hide()
            $('#RegBuissnes').html('')
            $('#RegBuissnes').append('<label>\n' +
                '                            اسم الشركة المؤسسة/الشركة\n' +
                '</label>\n' +
                '<div class="InputHolder">\n' +
                '    <u>\n' +
                '        <i class="fas fa-building"></i>\n' +
                '    </u>\n' +
                '    <input name="name" type="text" placeholder="اكتب هنا : اسم الشركة المؤسسة/الشركة" required>\n' +
                '</div>')
            $('#RegBuissnes').show()
        } else {
            $('#RegBuissnes').html('')
            $('#RegBuissnes').hide()
            $('#RegPersonal').append('<div class="col-md-6">\n' +
                '<div class="LoginFormRow">\n' +
                '<label>\n' +
                '                                    الاسم الاول\n' +
                '</label>\n' +
                '<div class="InputHolder">\n' +
                '    <u>\n' +
                '        <i class="fas fa-user"></i>\n' +
                '    </u>\n' +
                '    <input name="name" type="text" placeholder="اكتب هنا : اسمك الاول" required>\n' +
                '</div>\n' +
                '</div>\n' +
                '</div>\n' +
                '<div class="col-md-6">\n' +
                '<div class="LoginFormRow">\n' +
                '<label>\n' +
                '                                    الاسم الثاني\n' +
                '</label>\n' +
                '<div class="InputHolder">\n' +
                '    <u>\n' +
                '        <i class="fas fa-user"></i>\n' +
                '    </u>\n' +
                '    <input name="last_name" type="text" placeholder="اكتب هنا : اسمك الثاني" required>\n' +
                '</div>\n' +
                '    </div>\n' +
                '</div>')
            $('#RegPersonal').css('display', 'flex')
        }
    }

    // Registration Form Role Selecter
</script>
@yield('scripts')

</body>
</html>
