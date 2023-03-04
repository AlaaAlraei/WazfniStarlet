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
