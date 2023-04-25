<div class="container-fluid" id="Header">
    <div class="row justify-content-center align-content-center">
        <div class="col-md-10">
            <div class="HeaderFirst">
                <div class="HeaderFirstRight">
                    <div class="HeaderFirstRightInner">
                        <ul>
                            <li onclick="$(this).find('a')[0].click()">
                                <a class="d-none" href="{{ route('home') }}"></a>
                                الرئيسية
                                <div></div>
                            </li>
                            <li onclick="$(this).find('a')[0].click()" id="AboutHeaderBtn">
                                <a class="d-none" href="{{ route('about') }}"></a>
                                عن وظفني
                                <div></div>
                            </li>
                            @auth
                                @can('seeker_account')
                                    <li onclick="$(this).find('a')[0].click()" id="PreviewJobsHeaderBtn">
                                        <a class="d-none" href="{{ route('jobs.index') }}"></a>
                                        تصفح الوظائف
                                        <div></div>
                                    </li>
                                @else
                                    <li onclick="$(this).find('a')[0].click()" id="CreateJobUserHeaderBtn">
                                        <a class="d-none" href="{{ route('jobs.create') }}"></a>
                                        اعلن عن وظيفة
                                        <div></div>
                                    </li>
                                @endcan
                            @else
                                <li onclick="$('#HeaderLoginBtn').click()" id="CreateJobUserHeaderBtn">
                                    اعلن عن وظيفة
                                    <div></div>
                                </li>
                            @endauth
                            <li>
                                اتصل بنا
                                <div></div>
                            </li>
                            <li id="TermsPageHeaderBtn" onclick="$(this).find('a')[0].click()" id="CreateJobUserHeaderBtn">
                                <a class="d-none" href="{{ route('term') }}"></a>
                                شروط الإستخدام
                                <div></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="HeaderFirstLeft">
                    <div class="HeaderFirstLeftInner">
                        <div class="HeaderUserIndicator">
                            <h2>
                                @auth
                                <u onclick="UserOptions($(this))" rel=".UserOptions">
                                    <img src="{{ asset('') }}Wazefni/Requirements/IMG/User.png">
                                    <span>
                                        {{ Auth::user()->name }}
                                    </span>
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </u>
                                @else
                                <button type="button" id="HeaderLoginBtn" onclick="LoginPopUp($(this))" rel="#Login">
                                    <div></div>
                                    <i class="fas fa-sign-in-alt" aria-hidden="true"></i>
                                    تسجيل الدخول
                                </button>
                                @endauth
                            </h2>
                        </div>
                        <form id="SearchByCountry" action="{{ route('SearchByCountry') }}" method="GET" class="HeaderFirstCountry">
                            <select name="CountryID" onchange="$('#SearchByCountry').submit();">
                                @foreach($countries as $key => $country)
                                    <option {{ isset($_GET['CountryID']) && $_GET['CountryID'] == $country->id ? 'selected' : '' }} value="{{ $country->id ?? '' }}">
                                        {{ $country->name ?? '' }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                        <form action="{{ route('SearchByTyping') }}" method="GET" class="HeaderFirstSearch">
                            <div class="HeaderSearch">
                                <div class="HeaderSearchHolder">
                                    <input name="Typing" type="text" placeholder="ابحث عن الوظائف هنا ..">
                                    <button type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="UserOptions">
    <div class="UserOptionsEdge"></div>
    <ul>
        @auth
            @can('user_management_access')
                <li onclick="$(this).find('a')[0].click()">
                    <a href="{{ route('admin.home') }}" class="d-none"></a>
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    شاشة التحكم
                </li>
            @else
                <li onclick="$(this).find('a')[0].click()">
                    <a href="{{ route('profile', [Auth::user()->id]) }}" class="d-none"></a>
                    <i class="fas fa-user"></i>
                    الملف الشخصي
                </li>
            @endcan
        @endauth

        <li>
            <i class="fas fa-crown"></i>
            ترقية حسابي
        </li>
        <li onclick="EditProfilePop($(this))" rel="#EditInformation">
            <i class="fas fa-pen"></i>
            تعديل معلوماتي
        </li>
        <li onclick="$('#logoutform').submit()">
            <i class="fas fa-sign-out-alt"></i>
            تسجيل الخروج
        </li>
    </ul>
</div>

<div class="container-fluid" id="Banner">
    <div class="row justify-content-center align-content-center">
        <div class="col-md-10">
            <div class="BannerParent">
                <div class="Banner">
                    <div class="BannerLogo" onclick="$(this).find('a')[0].click()">
                        <a class="d-none" href="{{ route('home') }}"></a>
                        <img src="{{ asset('') }}Wazefni/Requirements/IMG/LogoText.png">
                    </div>
                </div>
                <div class="BannerText">
                    <h4>
                        موقع الوظائف الأول في الوطن العربي
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
