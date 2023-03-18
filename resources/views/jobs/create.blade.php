
@extends('layouts.user')

@section('content')
    <div class="container-fluid" id="CreateJobPage">
        <div class="row justify-content-center align-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-8">
                        <div class="AddNewJobPaper">
                            <h1>
                                إنشاء اعلان جديد
                            </h1>
                            <form class="CreateNewAdForm">
                                <div class="CreateNewAdFormRow">
                                    <label>
                                        عنوان الإعلان
                                    </label>
                                    <div class="CreateNewAdFormInputHolder">
                                        <input type="text" placeholder="اكتب هنا : عنوان الإعلان">
                                    </div>
                                </div>
                                <div class="CreateNewAdFormRow">
                                    <label>
                                        فئة الوظيفة
                                    </label>
                                    <div class="CreateNewAdFormInputHolder">
                                        <button type="button" class="AuthCtegorySelect" id="SelectedCategoryOnCreate">
                                            <g onclick="ShowCustomSelect($(this))" rel="#CreateAdSelectCat">اختيار فئة الوظيفة</g>
                                            <i class="fas fa-angle-down" rel="#CreateAdSelectCat" onclick="ClearCreateJobCategory($(this))" title="حذف الفئة"></i>
                                        </button>
                                    </div>
                                    <div class="SelectAuthCategoryList" id="CreateAdSelectCat">
                                        <div class="SelectAuthCategoryListInner">
                                            <div class="SelectAuthCategoryListItem" onclick="SelectThisJobCreateCategory($(this))" rel="#SelectedCategoryOnCreate">
                                                <input type="radio" name="CreateJobCategory" value="1" class="d-none">
                                                <img src="{{asset("")}}Wazefni/Requirements/IMG/MotorcyclesHome.webp">
                                                <span> فئة 1 </span>
                                            </div>

                                            <div class="SelectAuthCategoryListItem" onclick="SelectThisJobCreateCategory($(this))" rel="#SelectedCategoryOnCreate">
                                                <input type="radio" name="CreateJobCategory" value="2" class="d-none">
                                                <img src="{{asset("")}}Wazefni/Requirements/IMG/MotorcyclesHome.webp">
                                                <span> فئة 2 </span>
                                            </div>

                                            <div class="SelectAuthCategoryListItem" onclick="SelectThisJobCreateCategory($(this))" rel="#SelectedCategoryOnCreate">
                                                <input type="radio" name="CreateJobCategory" value="3" class="d-none">
                                                <img src="{{asset("")}}Wazefni/Requirements/IMG/MotorcyclesHome.webp">
                                                <span> فئة 3 </span>
                                            </div>

                                            <div class="SelectAuthCategoryListItem" onclick="SelectThisJobCreateCategory($(this))" rel="#SelectedCategoryOnCreate">
                                                <input type="radio" name="CreateJobCategory" value="4" class="d-none">
                                                <img src="{{asset("")}}Wazefni/Requirements/IMG/MotorcyclesHome.webp">
                                                <span> فئة 4 </span>
                                            </div>

                                            <div class="SelectAuthCategoryListItem" onclick="SelectThisJobCreateCategory($(this))" rel="#SelectedCategoryOnCreate">
                                                <input type="radio" name="CreateJobCategory" value="5" class="d-none">
                                                <img src="{{asset("")}}Wazefni/Requirements/IMG/MotorcyclesHome.webp">
                                                <span> فئة 5 </span>
                                            </div>

                                            <div class="SelectAuthCategoryListItem" onclick="SelectThisJobCreateCategory($(this))" rel="#SelectedCategoryOnCreate">
                                                <input type="radio" name="CreateJobCategory" value="6" class="d-none">
                                                <img src="{{asset("")}}Wazefni/Requirements/IMG/MotorcyclesHome.webp">
                                                <span> فئة 6 </span>
                                            </div>

                                            <div class="SelectAuthCategoryListItem" onclick="SelectThisJobCreateCategory($(this))" rel="#SelectedCategoryOnCreate">
                                                <input type="radio" name="CreateJobCategory" value="7" class="d-none">
                                                <img src="{{asset("")}}Wazefni/Requirements/IMG/MotorcyclesHome.webp">
                                                <span> فئة 7 </span>
                                            </div>

                                            <div class="SelectAuthCategoryListItem" onclick="SelectThisJobCreateCategory($(this))" rel="#SelectedCategoryOnCreate">
                                                <input type="radio" name="CreateJobCategory" value="8" class="d-none">
                                                <img src="{{asset("")}}Wazefni/Requirements/IMG/MotorcyclesHome.webp">
                                                <span> فئة 8 </span>
                                            </div>

                                            <div class="SelectAuthCategoryListItem" onclick="SelectThisJobCreateCategory($(this))" rel="#SelectedCategoryOnCreate">
                                                <input type="radio" name="CreateJobCategory" value="9" class="d-none">
                                                <img src="{{asset("")}}Wazefni/Requirements/IMG/MotorcyclesHome.webp">
                                                <span> فئة 9 </span>
                                            </div>


                                            <div class="SelectAuthCategoryListItem" onclick="SelectThisJobCreateCategory($(this))" rel="#SelectedCategoryOnCreate">
                                                <input type="radio" name="CreateJobCategory" value="10" class="d-none">
                                                <img src="{{asset("")}}Wazefni/Requirements/IMG/MotorcyclesHome.webp">
                                                <span> فئة 10 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="CreateNewAdFormRow">
                                    <label>
                                        إرفاق صورة الإعلان
                                        <u>
                                            ( إختياري )
                                        </u>
                                    </label>
                                    <button type="button" class="AddAdImage" onclick="$(this).find('input')[0].click()">
                                        <input type="file" accept="image/*" class="d-none" onchange="CheckAdImageHolder($(this))">
                                        <i class="fas fa-image"></i>
                                        <g>
                                            <y>
                                                صورة الإعلان
                                            </y>
                                        </g>
                                    </button>
                                </div>
                                <div class="CreateNewAdFormRow">
                                    <label>
                                        الحد الأقصى للمنتسبين
                                        <u>
                                            ( إختياري )
                                        </u>
                                    </label>
                                    <div class="CreateNewAdFormInputHolder">
                                        <input type="number" placeholder="اكتب هنا : الحد الأقصى للمنتسبين">
                                    </div>
                                    <h14>
                                        <i class="fas fa-info-circle"></i>
                                        سيتم حذف الإعلان عند بلوغه الحد الأقصى من المنتسبين .
                                    </h14>
                                </div>
                                <div class="CreateNewAdFormRow">
                                    <label>
                                        نوع الوظيفة
                                    </label>
                                    <div class="CreateNewAdFormInputHolder">
                                        <select>
                                            <option selected disabled> نوع الوظيفة </option>
                                            <option> عمل حر </option>
                                            <option> عقد دائم </option>
                                            <option> عقد قصير الامد </option>
                                        </select>
                                        <f>
                                            <i class="fas fa-angle-down"></i>
                                        </f>
                                    </div>
                                </div>
                                <div class="CreateNewAdFormRow">
                                    <label>
                                        مكان الوظيفة
                                        <u>
                                            ( إسم المدينة - الشارع )
                                        </u>
                                    </label>
                                    <div class="CreateNewAdFormInputHolder">
                                        <input type="text" placeholder=" اكتب هنا : مكان الوظيفة ( إسم المدينة - الشارع )">
                                        <s>
                                            <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
                                        </s>
                                    </div>
                                </div>
                                <div class="CreateNewAdFormRow">
                                    <label>
                                        الراتب
                                        <u>
                                            ( إختياري )
                                        </u>
                                    </label>
                                    <div class="CreateNewAdFormInputHolder">
                                        <input type="number" placeholder=" اكتب هنا : الراتب المقدر ( إختياري )">
                                        <s>
                                            <img src="{{asset("")}}Wazefni/Requirements/IMG/Salary.png">
                                        </s>
                                    </div>
                                </div>
                                <div class="CreateNewAdFormRow">
                                    <label>
                                        مميزات الوظيفة
                                        <u>
                                            ( إختياري )
                                        </u>
                                    </label>
                                    <div class="CreateNewAdFormInputHolder">
                                        <button type="button" class="AuthCtegorySelect">
                                            <g onclick="ShowCustomSelect($(this))" rel="#CreateAdSelectFeatures"> اختيار مميزات الوظيفة </g>
                                            <i class="fas fa-angle-down" onclick="ClearAuthCategory()" title="حذف الفئة"></i>
                                        </button>
                                    </div>
                                    <div class="SelectAuthCategoryList" id="CreateAdSelectFeatures">
                                        <div class="SelectAuthCategoryListInner">
                                            <div class="SelectAuthCategoryListItem JF1" target=".JF1" onclick="SelectThisAuthFeatures($(this))" rel="#JobFeatursGH" JobFeatureNumber="FeatureN1">
                                                <input type="checkbox" name="JobFeature" value="1" class="d-none">
                                                <span> ضمان اجتماعي </span>
                                            </div>

                                            <div class="SelectAuthCategoryListItem JF2" target=".JF2" onclick="SelectThisAuthFeatures($(this))" rel="#JobFeatursGH" JobFeatureNumber="FeatureN2">
                                                <input type="checkbox" name="JobFeature" value="2" class="d-none">
                                                <span> تأمين صحي </span>
                                            </div>

                                            <div class="SelectAuthCategoryListItem JF3" target=".JF3" onclick="SelectThisAuthFeatures($(this))" rel="#JobFeatursGH" JobFeatureNumber="FeatureN3">
                                                <input type="checkbox" name="JobFeature" value="3" class="d-none">
                                                <span> ثالث عشر </span>
                                            </div>

                                            <div class="SelectAuthCategoryListItem JF4" target=".JF4" onclick="SelectThisAuthFeatures($(this))" rel="#JobFeatursGH" JobFeatureNumber="FeatureN4">
                                                <input type="checkbox" name="JobFeature" value="4" class="d-none">
                                                <span> رابع عشر </span>
                                            </div>

                                            <div class="SelectAuthCategoryListItem JF5" target=".JF5" onclick="SelectThisAuthFeatures($(this))" rel="#JobFeatursGH" JobFeatureNumber="FeatureN5">
                                                <input type="checkbox" name="JobFeature" value="5" class="d-none">
                                                <span> صندوق ادخار </span>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 id="JobFeatursGH"></h4>
                                </div>
                                <div class="CreateNewAdFormRow w-100">
                                    <label>
                                        تفاصيل اخرى - شرح
                                    </label>
                                    <textarea placeholder="اكتب هنا : تفاصيل اخرى - شرح"></textarea>
                                </div>
                                <div class="CreateNewAdFormRow w-100">
                                    <button type="submit" class="SubmitCreateAdButton">
                                        <i class="fas fa-plus-circle"></i>
                                        انشاء اعلان جديد
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="PromotYourAdNowSection">
                            <h1> PromotAd </h1>
                            <h1> PromotAd </h1>
                            <h1> PromotAd </h1>
                            <h1> PromotAd </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="CreateJobUser">
@endsection
@section('scripts')

@endsection
