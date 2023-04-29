@extends('layouts.user')

@section('content')
    <div class="container-fluid" id="PromotAdPage">
        <div class="row justify-content-center align-content-center">
            <div class="col-md-10 col-sm-12">
                <div class="row">
                    <div class="col-md-8">
                        <div class="PromotAdPaper">
                            <div class="LatestJobsItemsGH">
                                <h8 class="PromotedAd">
                                    الإعلان المراد تمييزه :
                                </h8>
                                <div class="LatestJobsItem animate__animated animate__fadeIn mt-0">
                                    <div class="LatestJobsItemImage">
                                        <img
                                            src="https://i.insider.com/601441dd6dfbe10018e00c25?width=1136&format=jpeg">
                                    </div>
                                    <div class="LatestJobsItemInfo">
                                        <h3 onclick="$(this).find('a')[0].click()">
                                            <a href="http://127.0.0.1:8000/jobs/12" class="d-none"></a>
                                            مطلوب مبرمج laravel بخبرة لا تقل عن 4 سنوات ومعرفة جيدة في ال wordpress
                                        </h3>
                                        <p>
                                            هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ
                                            عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها.
                                            ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما-
                                            للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها
                                            تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير
                                            صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال
                                            "lorem ipsum" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج
                                            البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن
                                            طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.
                                        </p>
                                        <span title="تاريخ النشر"><i
                                                class="fas fa-clock"></i>الثلاثاء 14 مارس 2023</span>
                                        <div class="JobDetails">
                                            <h15 title="مكان الوظيفة" style="background: #a14444;"><img
                                                    src="http://127.0.0.1:8000/Wazefni/Requirements/IMG/Location.png">
                                                عمان - شارع الزهور
                                            </h15>
                                            <h15 title="الراتب">
                                                <img src="http://127.0.0.1:8000/Wazefni/Requirements/IMG/Salary.png">
                                                420 <u> دينار </u>
                                            </h15>
                                            <h15 style="background: #616161" class="NoImgJobDetail" title="نوع الوظيفة">
                                                عقد عمل
                                            </h15>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="PromotePlanes">
                                <h3 class="PromoteByLabel">
                                    تمييز الإعلان عن طريق :
                                    <div class="PromotePlanesOptions">
                                        <button type="button" class="ActivePlaneOption"
                                                onclick="ChoosePlaneOption($(this))" rel="#WazifnyPlans">
                                            <img src="{{asset("")}}Wazefni/Requirements/IMG/LogoIcon.png">
                                            خطط وظفني
                                        </button>
                                        <button type="button" onclick="ChoosePlaneOption($(this))" rel="#CreatePlane">
                                            <img src="{{asset("")}}Wazefni/Requirements/IMG/AddGreen.png">
                                            إنشاء خطة
                                        </button>
                                    </div>
                                </h3>

                                <div class="PromoteAdOptionViewsGH">
                                    <div class="PromoteAdOptionView animate__animated animate__fadeIn"
                                         style="display:block;" id="WazifnyPlans">
                                        <div class="PromoteAdOptionViewHeader">
                                            <h3>
                                                <img src="{{asset("")}}Wazefni/Requirements/IMG/LogoIcon.png">
                                                خطط وظفني
                                            </h3>
                                            <p>
                                                خطط وظفني تجهز لك العديد من الخيارات لتسهل عليك العملية وتوفر عليك الوقت
                                                لتمييز اعلاناتك باسرع وقت ممكن ومن دون مجهود لتحصل على منتسبيك اكثر من
                                                خلال
                                                توصيتنا لك بمميزات الخطط المتعددة.
                                            </p>
                                        </div>

                                        <div class="WzfniPlaneStepPage animate__animated animate__fadeInLeft" style="display: block" id="WzfniPlaneFirstStep">
                                            <div class="PromotWzfniPlaneStepsIndicator animate__animated animate__fadeInDown animate__delay-1s">
                                                <div class="PromotWzfniPlaneStepsIndicatorLine">
                                                    <div></div>
                                                </div>
                                                <div class="PromotWzfniPlaneStepsIndicatorItem">
                                                    <h15 class="ActivePromoteStep">
                                                        1
                                                    </h15>
                                                </div>
                                                <div class="PromotWzfniPlaneStepsIndicatorItem">
                                                    <h15>
                                                        2
                                                    </h15>
                                                </div>
                                                <div class="PromotWzfniPlaneStepsIndicatorItem">
                                                    <h15>
                                                        3
                                                    </h15>
                                                </div>
                                            </div>
                                            <h14>
                                                مدة تمييز الإعلان :
                                                <div class="WzfniPlaneDurationHolder">
                                                    <button type="button" style="right: 0"
                                                            onclick="ChangeWzfniPlanePrice($(this))" action="plus">
                                                        <img src="{{asset("")}}Wazefni/Requirements/IMG/HolderPlus.png">
                                                    </button>
                                                    <input id="WzfniPlaneDuration" type="number" placeholder="0"
                                                           value="1">
                                                    <button type="button" style="left: 0"
                                                            onclick="ChangeWzfniPlanePrice($(this))" action="minus">
                                                        <img
                                                            src="{{asset("")}}Wazefni/Requirements/IMG/HolderMinus.png">
                                                    </button>
                                                </div>

                                                يوم
                                            </h14>
                                            <h14>
                                                يرجى إختيار الخطة المناسبة لتمييز هذا الإعلان :
                                            </h14>
                                            <div class="WzfniPlansGH">
                                                @foreach($subscription_types as $key => $subscription_type)
                                                    <div rel="{{ $subscription_type->id ?? '' }}" class="WzfniPlansItem" onclick="ChooseThisPlane($(this))">
                                                        <img src="{{ str_replace('localhost', 'localhost:8000', $subscription_type->picture->getUrl('thumb')) }}">
                                                        <h2>
                                                            {{ $subscription_type->title ?? '' }}
                                                        </h2>
                                                        <span>
                                                            <s onclick="GetWzfniPlanePrice($(this))" value="{{ $subscription_type->amount ?? '' }}">{{ $subscription_type->amount ?? '' }}</s>
                                                            <u>دينار</u>
                                                        </span>
                                                        @foreach($features as $key => $feature)
                                                            @if($subscription_type->features->contains($feature->id))
                                                                <p>
                                                                    <i class="fas fa-check-circle" style="color: #4db945;"></i>
                                                                    {{ $feature->title ?? '' }}
                                                                </p>
                                                            @else
                                                                <p>
                                                                    <i class="fas fa-times-circle" style="color: #b94545;"></i>
                                                                    {{ $feature->title ?? '' }}
                                                                </p>
                                                            @endif

                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </div>
                                            <p class="WzfniPlaneValidation animate__animated animate__zoomIn">
                                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                <u></u>
                                            </p>
                                            <button type="button" onclick="WzfniPlabeFirstNextBtn($(this))"
                                                    class="WzfniPlaneNextBtn" rel="#WzfniPlaneSecondStep">
                                                <i class="fas fa-angle-left"></i>
                                                التالي
                                            </button>
                                        </div>

                                        <div class="WzfniPlaneStepPage animate__animated animate__fadeInLeft" id="WzfniPlaneSecondStep">
                                            <div class="PromotWzfniPlaneStepsIndicator animate__animated animate__fadeInDown animate__delay-1s">
                                                <div class="PromotWzfniPlaneStepsIndicatorLine">
                                                    <div></div>
                                                </div>
                                                <div class="PromotWzfniPlaneStepsIndicatorItem">
                                                    <h15>
                                                        1
                                                    </h15>
                                                </div>
                                                <div class="PromotWzfniPlaneStepsIndicatorItem">
                                                    <h15 class="ActivePromoteStep">
                                                        2
                                                    </h15>
                                                </div>
                                                <div class="PromotWzfniPlaneStepsIndicatorItem">
                                                    <h15>
                                                        3
                                                    </h15>
                                                </div>
                                            </div>

                                            <div class="WzfniPromoteTerms">
                                                <h2>
                                                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                                    وجب التنويه
                                                </h2>
                                                <p>
                                                    هناك بعض القوانين يجب اتباعها في اعلاناتك المميزة , سيتم مراجعة
                                                    اعلانك المميز من قبل فريق العمل الخاص بنا , يرجى اتباع المعايير
                                                    التالية في هذا الإعلان :
                                                </p>
                                                <span>
                                                    <u>1</u>
                                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى
                                                    المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضعَ
                                                </span>

                                                <span>
                                                    <u>2</u>
                                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى
                                                    المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع
                                                    الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ
                                                </span>

                                                <span>
                                                    <u>3</u>
                                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى
                                                </span>

                                                <span>
                                                    <u>4</u>
                                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى
                                                    المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع
                                                    الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ
                                                </span>

                                                <span>
                                                    <u>5</u>
                                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى
                                                    المقروء لصفحة ما سيلهي القارئ عن التركيزَ
                                                </span>
                                                <h13>
                                                    <input type="checkbox" id="WzfniPromoteTermsAccept">
                                                    موافق على جميع هذه الشروط
                                                </h13>
                                            </div>

                                            <p class="WzfniPlaneValidation animate__animated animate__zoomIn">
                                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                <u></u>
                                            </p>

                                            <button type="button"
                                                    onclick="$('.WzfniPlaneStepPage').hide();$('#WzfniPlaneFirstStep').show()"
                                                    class="WzfniPlanePreviusBtn">
                                                <i class="fas fa-angle-right"></i>
                                                السابق
                                            </button>

                                            <button type="button" onclick="WzfniPlabeSecondNextBtn($(this))"
                                                    class="WzfniPlaneNextBtn" rel="#WzfniPlaneThirdStep">
                                                <i class="fas fa-angle-left"></i>
                                                التالي
                                            </button>
                                        </div>

                                        <div class="WzfniPlaneStepPage animate__animated animate__fadeInLeft" id="WzfniPlaneThirdStep">
                                            <div class="PromotWzfniPlaneStepsIndicator animate__animated animate__fadeInDown animate__delay-1s">
                                                <div class="PromotWzfniPlaneStepsIndicatorLine">
                                                    <div></div>
                                                </div>
                                                <div class="PromotWzfniPlaneStepsIndicatorItem">
                                                    <h15>
                                                        1
                                                    </h15>
                                                </div>
                                                <div class="PromotWzfniPlaneStepsIndicatorItem">
                                                    <h15>
                                                        2
                                                    </h15>
                                                </div>
                                                <div class="PromotWzfniPlaneStepsIndicatorItem">
                                                    <h15 class="ActivePromoteStep">
                                                        3
                                                    </h15>
                                                </div>
                                            </div>

                                            <p class="WzfniPlaneValidation animate__animated animate__zoomIn">
                                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                <u></u>
                                            </p>

                                            <h1> هون بتحط ايفريم بوابة الدفع </h1>
                                            <h1> هون بتحط ايفريم بوابة الدفع </h1>
                                            <h1> هون بتحط ايفريم بوابة الدفع </h1>
                                            <h1> هون بتحط ايفريم بوابة الدفع </h1>
                                            <h1> هون بتحط ايفريم بوابة الدفع </h1>
                                            <h1> هون بتحط ايفريم بوابة الدفع </h1>

                                            <button type="button"
                                                    onclick="$('.WzfniPlaneStepPage').hide();$('#WzfniPlaneSecondStep').show()"
                                                    class="WzfniPlanePreviusBtn">
                                                <i class="fas fa-angle-right"></i>
                                                السابق
                                            </button>

                                            <button type="button" onclick="WzfniPlabeSecondNextBtn($(this))"
                                                    class="WzfniPlaneNextBtn" rel="#WzfniPlaneThirdStep">
                                                <i class="fas fa-angle-left"></i>
                                                تمييز الإعلان
                                            </button>
                                        </div>
                                    </div>

                                    <div class="PromoteAdOptionView animate__animated animate__fadeIn" id="CreatePlane">
                                        <div class="PromoteAdOptionViewHeader">
                                            <h3>
                                                <img src="{{asset("")}}Wazefni/Requirements/IMG/AddGreen.png">
                                                إنشاء خطة
                                            </h3>
                                            <p>
                                                ان لم تكن خطط وظفني كافية لتلبية احتياجاتك , ننصحك بإنشاء خطة جديدة
                                                مناسبة
                                                لمتطلباتك مهما كانت كبيرة او صغيرة لتلبية طموحك.
                                            </p>
                                        </div>

                                        <div class="CreatePlaneFormGH">
                                            <div class="CreatePlaneStepPage animate__animated animate__fadeInLeft" id="CreatePlaneFirstStep" style="display: block">
                                                <div class="CreatePlanePricing">
                                                    <h3>
                                                        <s value="25">25</s>
                                                        <u>دينار</u>
                                                    </h3>
                                                    <p>
                                                        <u> ملاحظة :</u>

                                                        يتغير السعر مع تغيير مميزات ومدة الخطة
                                                    </p>
                                                </div>

                                                <div class="PromotWzfniPlaneStepsIndicator animate__animated animate__fadeInDown animate__delay-1s">
                                                    <div class="PromotWzfniPlaneStepsIndicatorLine">
                                                        <div></div>
                                                    </div>
                                                    <div class="PromotWzfniPlaneStepsIndicatorItem">
                                                        <h15 class="ActivePromoteStep">
                                                            1
                                                        </h15>
                                                    </div>
                                                    <div class="PromotWzfniPlaneStepsIndicatorItem">
                                                        <h15>
                                                            2
                                                        </h15>
                                                    </div>
                                                    <div class="PromotWzfniPlaneStepsIndicatorItem">
                                                        <h15>
                                                            3
                                                        </h15>
                                                    </div>
                                                </div>

                                                <form class="CreatePlaneForm">
                                                    <div class="CreatePlaneFormRow">
                                                        <label> مدة التمييز </label>
                                                        <div class="CreatePlaneFormHolder">
                                                            <h3>
                                                                <div class="WzfniPlaneDurationHolder">
                                                                    <button type="button" style="right: 0"
                                                                            onclick="ChangeCreatePlanePrice($(this))"
                                                                            action="plus">
                                                                        <img
                                                                            src="{{asset("")}}Wazefni/Requirements/IMG/HolderPlus.png">
                                                                    </button>
                                                                    <input id="CreatePlaneDuration" type="number"
                                                                           placeholder="0" value="1">
                                                                    <button type="button" style="left: 0"
                                                                            onclick="ChangeCreatePlanePrice($(this))"
                                                                            action="minus">
                                                                        <img
                                                                            src="{{asset("")}}Wazefni/Requirements/IMG/HolderMinus.png">
                                                                    </button>
                                                                </div>
                                                                يوم
                                                            </h3>
                                                        </div>
                                                    </div>
                                                    <div class="CreatePlaneFormRow">
                                                        <label>
                                                            الدولة المستهدفة
                                                            <u>(إختياري)</u>
                                                        </label>
                                                        <div class="CreatePlaneFormHolder">
                                                            <select>
                                                                <option selected>
                                                                    يرجى إختيار الدولة
                                                                </option>
                                                                <option> الاردن </option>
                                                                <option> السعودية </option>
                                                                <option> الامارات </option>
                                                                <option> سوريا </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="CreatePlaneFormRow">
                                                        <label> عدد المنتسبين </label>
                                                        <div class="PlaneFormAssociateOptions">
                                                            <button type="button" rel="limited" class="ActivePlaneFormAssociateOption" onclick="SwitchAssociatePlaneOption($(this))">
                                                                محدود
                                                            </button>
                                                            <button type="button" id="UnlimitedAsosiateBtn" rel="unlimited" onclick="SwitchAssociatePlaneOption($(this))">
                                                                غير محدود
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <div class="CreatePlaneFormRow" id="AsosiateSelectionGH">
                                                        <label> عدد المنتسبين المطلوب </label>
                                                        <div class="CreatePlaneFormHolder">
                                                            <h3>
                                                                <div class="WzfniPlaneDurationHolder">
                                                                    <button type="button" style="right: 0"
                                                                            onclick="ChangeCreatePlanePriceAssociate($(this))"
                                                                            action="plus">
                                                                        <img
                                                                            src="{{asset("")}}Wazefni/Requirements/IMG/HolderPlus.png">
                                                                    </button>
                                                                    <input type="text" id="PricingAssociate" placeholder="0" value="10">
                                                                    <button type="button" style="left: 0"
                                                                            onclick="ChangeCreatePlanePriceAssociate($(this))"
                                                                            action="minus">
                                                                        <img
                                                                            src="{{asset("")}}Wazefni/Requirements/IMG/HolderMinus.png">
                                                                    </button>
                                                                </div>
                                                                منتسب
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </form>

                                                <button type="button" onclick="$('.CreatePlaneStepPage').hide();$('#CreatePlaneSecondStep').show()" class="WzfniPlaneNextBtn">
                                                    <i class="fas fa-angle-left"></i>
                                                    التالي
                                                </button>
                                            </div>

                                            <div class="CreatePlaneStepPage animate__animated animate__fadeInLeft" id="CreatePlaneSecondStep">
                                                <div class="PromotWzfniPlaneStepsIndicator animate__animated animate__fadeInDown animate__delay-1s">
                                                    <div class="PromotWzfniPlaneStepsIndicatorLine">
                                                        <div></div>
                                                    </div>
                                                    <div class="PromotWzfniPlaneStepsIndicatorItem">
                                                        <h15>
                                                            1
                                                        </h15>
                                                    </div>
                                                    <div class="PromotWzfniPlaneStepsIndicatorItem">
                                                        <h15 class="ActivePromoteStep">
                                                            2
                                                        </h15>
                                                    </div>
                                                    <div class="PromotWzfniPlaneStepsIndicatorItem">
                                                        <h15>
                                                            3
                                                        </h15>
                                                    </div>
                                                </div>
                                                <div class="WzfniPromoteTerms">
                                                    <h2>
                                                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                                        وجب التنويه
                                                    </h2>
                                                    <p>
                                                        هناك بعض القوانين يجب اتباعها في اعلاناتك المميزة , سيتم مراجعة
                                                        اعلانك المميز من قبل فريق العمل الخاص بنا , يرجى اتباع المعايير
                                                        التالية في هذا الإعلان :
                                                    </p>
                                                    <span>
                                                    <u>1</u>
                                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى
                                                    المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضعَ
                                                </span>

                                                    <span>
                                                    <u>2</u>
                                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى
                                                    المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع
                                                    الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ
                                                </span>

                                                    <span>
                                                    <u>3</u>
                                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى
                                                </span>

                                                    <span>
                                                    <u>4</u>
                                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى
                                                    المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع
                                                    الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ
                                                </span>

                                                    <span>
                                                    <u>5</u>
                                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى
                                                    المقروء لصفحة ما سيلهي القارئ عن التركيزَ
                                                </span>
                                                    <h13>
                                                        <input type="checkbox" id="CreatePromoteTermsAccept">
                                                        موافق على جميع هذه الشروط
                                                    </h13>
                                                </div>

                                                <p class="WzfniPlaneValidation animate__animated animate__zoomIn">
                                                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                    <u></u>
                                                </p>

                                                <button type="button" onclick="$('.CreatePlaneStepPage').hide();$('#CreatePlaneFirstStep').show()" class="WzfniPlanePreviusBtn">
                                                    <i class="fas fa-angle-right"></i>
                                                    السابق
                                                </button>
                                                <button type="button" onclick="CreatePlaneSecondNextBtn($(this))" class="WzfniPlaneNextBtn" rel="#CreatePlaneThirdStep">
                                                    <i class="fas fa-angle-left"></i>
                                                    التالي
                                                </button>
                                            </div>

                                            <div class="CreatePlaneStepPage animate__animated animate__fadeInLeft" id="CreatePlaneThirdStep">
                                                <div class="PromotWzfniPlaneStepsIndicator animate__animated animate__fadeInDown animate__delay-1s">
                                                    <div class="PromotWzfniPlaneStepsIndicatorLine">
                                                        <div></div>
                                                    </div>
                                                    <div class="PromotWzfniPlaneStepsIndicatorItem">
                                                        <h15>
                                                            1
                                                        </h15>
                                                    </div>
                                                    <div class="PromotWzfniPlaneStepsIndicatorItem">
                                                        <h15>
                                                            2
                                                        </h15>
                                                    </div>
                                                    <div class="PromotWzfniPlaneStepsIndicatorItem">
                                                        <h15 class="ActivePromoteStep">
                                                            3
                                                        </h15>
                                                    </div>
                                                </div>

                                                <h1> هون بتحط اي فريم بوابة الدفع </h1>
                                                <h1> هون بتحط اي فريم بوابة الدفع </h1>
                                                <h1> هون بتحط اي فريم بوابة الدفع </h1>
                                                <h1> هون بتحط اي فريم بوابة الدفع </h1>
                                                <h1> هون بتحط اي فريم بوابة الدفع </h1>

                                                <button type="button" onclick="$('.CreatePlaneStepPage').hide();$('#CreatePlaneSecondStep').show()" class="WzfniPlanePreviusBtn">
                                                    <i class="fas fa-angle-right"></i>
                                                    السابق
                                                </button>
                                                <button type="submit" onclick="CreatePlaneFormSubmit($(this))" class="WzfniPlaneNextBtn">
                                                    <i class="fas fa-angle-left"></i>
                                                    تمييز اللإعلان
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" dir="ltr">
                        <h1> Side To Use </h1>
                        <h1> Side To Use </h1>
                        <h1> Side To Use </h1>
                        <h1> Side To Use </h1>
                        <h1> Side To Use </h1>
                        <h1> Side To Use </h1>
                        <h1> Side To Use </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection


