@extends('layouts.user')

@section('content')
    <div class="container-fluid" id="CompanyProfilePage">
        <div class="row justify-content-center align-content-center">
            <div class="col-md-10 col-sm-12">
                <div class="row">
                    <div class="col-md-8">
                        <div class="CompanyProfilePaper">
                            <div class="CompanyProfilePaperHeader">
                                <div class="CompanyProfileImgHolder">
                                    <img
                                        src="https://mymodernmet.com/wp/wp-content/uploads/2019/09/100k-ai-faces-6.jpg">
                                </div>
                                <div class="CompanyProfilePaperHeaderInfo">
                                    <h1>
                                        محمد الترك
                                    </h1>
                                    <span>
                                        <img src="{{asset("")}}Wazefni/Requirements/IMG/MotorcyclesHome.webp">
                                        التسويق
                                    </span>
                                </div>
                                <div class="CompanyProfilePaperHeaderOptions">
                                    <div class="CompanyProfilePaperHeaderOptionsInner">

                                        <button type="button" onclick="$(this).find('a')[0].click()"
                                                class="CompanyWebsiteBtn">
                                            <a href="#" class="d-none" target="_blank"></a>
                                            <i class="fas fa-file"></i>
                                            السيرة الذاتية
                                        </button>

                                        <div class="CompanySocials">
                                            <button type="button" onclick="$(this).find('a')[0].click()">
                                                <a href="#" class="d-none"
                                                   target="_blank"></a>
                                                <i class="fab fa-facebook"></i>
                                            </button>
                                            <button type="button" onclick="$(this).find('a')[0].click()">
                                                <a href="#" class="d-none"
                                                   target="_blank"></a>
                                                <i class="fab fa-twitter"></i>
                                            </button>
                                            <button type="button" onclick="$(this).find('a')[0].click()">
                                                <a href="#" class="d-none"
                                                   target="_blank"></a>
                                                <i class="fab fa-instagram"></i>
                                            </button>
                                            <button type="button" onclick="$(this).find('a')[0].click()">
                                                <a href="#" class="d-none"
                                                   target="_blank"></a>
                                                <i class="fab fa-linkedin"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p class="CompanyBio">
                                <u>نبذة</u>
                                لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى)
                                ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ
                                القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص،
                                لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا
                                النص،
                                <br>
                                <br>
                                بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل
                                كبير في ستينيّات هذا القرن مع إصدار رقائق "ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع
                                من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج
                                مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.
                            </p>

                            <div class="JobPaperDetails">
                                <h1>
                                    تفاصيل
                                </h1>
                                <p>
                                    رقم الهاتف :
                                    <u dir="ltr">
                                        +962 565 4885 65
                                        <i class="fas fa-mobile-alt"></i>
                                    </u>
                                </p>
                                <p>
                                    الميلاد :
                                    <u>
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        9 اكتوبر 1996
                                    </u>
                                </p>
                                <p>
                                    الدولة :
                                    <u>
                                        <i class="fa fa-map-marker-alt" aria-hidden="true" style="color: #b52e2e;"></i>
                                        الاردن
                                    </u>
                                </p>
                                <p>
                                    التخصص :
                                    <u>
                                        التسويق
                                    </u>
                                </p>
                            </div>

                            <div class="CompanyJobsGHParent">
                                <div class="SectionHeader">
                                    <h10>
                                        نبذة عن اعمال
                                        <u>
                                            محمد الترك
                                        </u>
                                    </h10>
                                </div>
                                <div class="UserWorksGH">
                                    <div class="UserWorksItem">
                                        <div class="UserWorksImgHolder">
                                            <img src="https://cdn.dribbble.com/users/541143/screenshots/14425593/media/0b9cf82584216494b96b8371efff3e49.png?compress=1&resize=400x300">
                                        </div>
                                        <div class="UserWorksItemFade"></div>
                                        <div class="UserWorksInfo">
                                            <h4> SasWamy UI/UX </h4>
                                            <button type="button" class="animate__animated animate__zoomIn">
                                                <i class="fas fa-eye"></i>
                                                عرض
                                            </button>
                                        </div>
                                    </div>

                                    <div class="UserWorksItem">
                                        <div class="UserWorksImgHolder">
                                            <img src="https://cdn.dribbble.com/users/541143/screenshots/14425593/media/0b9cf82584216494b96b8371efff3e49.png?compress=1&resize=400x300">
                                        </div>
                                        <div class="UserWorksItemFade"></div>
                                        <div class="UserWorksInfo">
                                            <h4> SasWamy UI/UX </h4>
                                            <button type="button" class="animate__animated animate__zoomIn">
                                                <i class="fas fa-eye"></i>
                                                عرض
                                            </button>
                                        </div>
                                    </div>

                                    <div class="UserWorksItem">
                                        <div class="UserWorksImgHolder">
                                            <img src="https://cdn.dribbble.com/users/541143/screenshots/14425593/media/0b9cf82584216494b96b8371efff3e49.png?compress=1&resize=400x300">
                                        </div>
                                        <div class="UserWorksItemFade"></div>
                                        <div class="UserWorksInfo">
                                            <h4> SasWamy UI/UX </h4>
                                            <button type="button" class="animate__animated animate__zoomIn">
                                                <i class="fas fa-eye"></i>
                                                عرض
                                            </button>
                                        </div>
                                    </div>

                                    <div class="UserWorksItem">
                                        <div class="UserWorksImgHolder">
                                            <img src="https://cdn.dribbble.com/users/541143/screenshots/14425593/media/0b9cf82584216494b96b8371efff3e49.png?compress=1&resize=400x300">
                                        </div>
                                        <div class="UserWorksItemFade"></div>
                                        <div class="UserWorksInfo">
                                            <h4> SasWamy UI/UX </h4>
                                            <button type="button" class="animate__animated animate__zoomIn">
                                                <i class="fas fa-eye"></i>
                                                عرض
                                            </button>
                                        </div>
                                    </div>

                                    <div class="UserWorksItem">
                                        <div class="UserWorksImgHolder">
                                            <img src="https://cdn.dribbble.com/users/541143/screenshots/14425593/media/0b9cf82584216494b96b8371efff3e49.png?compress=1&resize=400x300">
                                        </div>
                                        <div class="UserWorksItemFade"></div>
                                        <div class="UserWorksInfo">
                                            <h4> SasWamy UI/UX </h4>
                                            <button type="button" class="animate__animated animate__zoomIn">
                                                <i class="fas fa-eye"></i>
                                                عرض
                                            </button>
                                        </div>
                                    </div>

                                    <div class="UserWorksItem">
                                        <div class="UserWorksImgHolder">
                                            <img src="https://cdn.dribbble.com/users/541143/screenshots/14425593/media/0b9cf82584216494b96b8371efff3e49.png?compress=1&resize=400x300">
                                        </div>
                                        <div class="UserWorksItemFade"></div>
                                        <div class="UserWorksInfo">
                                            <h4> SasWamy UI/UX </h4>
                                            <button type="button" class="animate__animated animate__zoomIn">
                                                <i class="fas fa-eye"></i>
                                                عرض
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" dir="ltr">
                        <div class="SimilerCompanies">
                            <div class="SectionHeader">
                                <h10>
                                    خبرات
                                </h10>
                            </div>
                            <div class="UserExperienceGH">
                                <div class="UserExperienceItem">
                                    <div class="UserExperienceImgHolder">
                                        <img src="http://localhost:8000/storage/32/conversions/643367317c233_asfgh-thumb.jpg">
                                    </div>
                                    <h3>
                                        <g>مدير الشؤون</g>
                                        -
                                        <u>القيصر الصغير</u>
                                    </h3>
                                    <span>
                                        منذ
                                        <u><i class="fas fa-calendar-alt"></i>2018</u>
                                        حتى
                                        <u><i class="fas fa-calendar-alt"></i>2022</u>
                                    </span>
                                </div>
                                <div class="UserExperienceItem">
                                    <div class="UserExperienceImgHolder">
                                        <img src="http://localhost:8000/storage/27/conversions/643365a860e02_C2-thumb.jpg">
                                    </div>
                                    <h3>
                                        <g>مدير تسويق</g>
                                        -
                                        <u>BatTechno</u>
                                    </h3>
                                    <span>
                                        منذ
                                        <u><i class="fas fa-calendar-alt"></i>2018</u>
                                        حتى
                                        <u><i class="fas fa-calendar-alt"></i>2022</u>
                                    </span>
                                </div>
                                <div class="UserExperienceItem">
                                    <div class="UserExperienceImgHolder">
                                        <img src="http://localhost:8000/storage/31/conversions/643366ffa6dc5_Orange-thumb.jpg">
                                    </div>
                                    <h3>
                                        <g>مدير تسويق</g>
                                        -
                                        <u>Starlet IT</u>
                                    </h3>
                                    <span>
                                        منذ
                                        <u><i class="fas fa-calendar-alt"></i>2018</u>
                                        حتى
                                        <u><i class="fas fa-calendar-alt"></i>2022</u>
                                    </span>
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

@endsection


