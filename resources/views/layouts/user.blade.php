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
            <form class="LoginForm animate__animated animate__fadeInUp" id="LoginForm" method="POST" action="{{ route('clientLogin') }}">
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
                        <input type="number" placeholder="رقم الهاتف ( من غير مفتاح الدولة )" name="mobile" required>
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
                        <input type="password" placeholder="اكتب هنا : كلمة المرور مرة اخرى" name="password" required>
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
<form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
@include('partials.footer')

<script src="{{ asset('') }}Wazefni/Requirements/JS/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('') }}Wazefni/Requirements/JS/aos.js"></script>
<script src="{{ asset('') }}Wazefni/Requirements/JS/jquery-3.6.0.min.js"></script>
<script src="{{ asset('') }}Wazefni/Requirements/JS/numscroller-1.0.js"></script>
<script src="{{ asset('') }}Wazefni/Requirements/JS/slick.min.js"></script>
<script src="{{ asset('') }}Wazefni/Requirements/JS/javascript.js"></script>
@yield('scripts')
</body>
</html>
