<div class="container-fluid" id="Header">
    <div class="row justify-content-center align-content-center">
        <div class="col-md-10">
            <div class="HeaderFirst">
                <div class="HeaderFirstRight">
                    <div class="HeaderFirstRightInner">
                        <ul>
                            <li>
                                الرئيسية
                                <div></div>
                            </li>
                            <li>
                                عن وظفني
                                <div></div>
                            </li>
                            <li>
                                اعلن عن وظيفة
                                <div></div>
                            </li>
                            <li>
                                اتصل بنا
                                <div></div>
                            </li>
                            <li>
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
                                <u>
                                    <img src="{{ asset('') }}Wazefni/Requirements/IMG/User.png">
                                    <span>
                                        محمد الترك
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
                        <div class="HeaderFirstCountry">
                            <select>
                                <option selected> الأردن </option>
                                <option> السعودية </option>
                                <option> الإمارات </option>
                                <option> قطر </option>
                                <option> العراق </option>
                                <option> الكويت </option>
                                <option> مصر </option>
                                <option> عمان </option>
                            </select>
                        </div>
                        <div class="HeaderFirstSearch">
                            <div class="HeaderSearch">
                                <div class="HeaderSearchHolder">
                                    <input type="text" placeholder="ابحث عن الوظائف هنا ..">
                                    <button type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" id="Banner">
    <div class="row justify-content-center align-content-center">
        <div class="col-md-10">
            <div class="BannerParent">
                <div class="Banner">
                    <div class="BannerLogo">
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
