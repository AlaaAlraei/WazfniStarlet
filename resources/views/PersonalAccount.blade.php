@extends('layouts.user')

@section('content')
    <div class="container-fluid" id="CompanyProfilePage">
        <div class="row justify-content-center align-content-center">
            <div class="col-md-10 col-sm-12">
                <div class="row">
                    <div class="col-md-8">
                        <div class="CompanyProfilePaper">
                            <div class="CompanyProfilePaperHeader">
                                <div class="CompanyProfileImgHolder MyUserImage">
                                    <img src="https://lh6.googleusercontent.com/-UYKv4Oo4AL4/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3reOcBoiruxfuiRHs8VAoE-HvgnBDw/mo/photo.jpg?sz=256">
                                    <div class="ChangeProfileImage animate__animated animate__zoomIn" onclick="$(this).find('input')[0].click()">
                                        <form id="ProfileImageForm" class="d-none">
                                            <input type="file" accept="image/*" onchange="$('#ProfileImageForm').submit()">
                                        </form>
                                        <div class="ChangeProfileImageInner">
                                            <div class="ChangeProfileImageDiv">
                                                <i class="fas fa-camera"></i>
                                                <span> تعديل الصورة </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="CompanyProfilePaperHeaderInfo">
                                    <h1 class="EditProfileBtnParent">
                                        محمد الترك
                                        <u class="EditProfileBtn" onclick="EditProfilePop($(this))" rel="#EditInformation">
                                            <i class="fas fa-pen"></i>
                                        </u>
                                    </h1>
                                    <span>
                                        <img src="dfg">
                                            بنشرجي
                                    </span>
                                </div>
                                <div class="CompanyProfilePaperHeaderOptions">
                                    <div class="CompanyProfilePaperHeaderOptionsInner">
                                                <button type="button" onclick="AddResumeBTn($(this))" rel="#UploadResumeView"
                                                    class="CompanyWebsiteBtn">
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
                                <span class="NoBio" onclick="$('#BioForm').slideToggle()">
                                    <i class="fas fa-pen"></i>
                                    اكتب هنا : نبذة عن نفسك/اعمالك/هواباتك إلخ
                                </span>
                            </p>

                            <form id="BioForm">
                                <div class="BioFormInner">
                                    <textarea placeholder="اكتب هنا : نبذة عن نفسك/اعمالك/هواباتك إلخ"></textarea>
                                    <button type="submit">
                                        <i class="fas fa-floppy-o"></i>
                                        حفظ
                                    </button>
                                </div>
                            </form>

                            <div class="JobPaperDetails">
                                <h1>
                                    تفاصيل
                                </h1>
                                <p>
                                    رقم الهاتف :
                                    <u dir="ltr">
                                        654654654654654
                                        <i class="fas fa-mobile-alt"></i>
                                    </u>
                                </p>
                                <p>
                                    الميلاد :
                                    <u>
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        120 قبل الهجرة
                                    </u>
                                </p>
                                <p>
                                    الدولة :
                                    <u>
                                        <i class="fa fa-map-marker-alt" aria-hidden="true" style="color: #b52e2e;"></i>
                                        الاردن للاسف
                                    </u>
                                </p>
                                <p>
                                    التخصص :
                                    <u>
                                        بنشرجي
                                    </u>
                                </p>
                            </div>

                            <div class="CompanyJobsGHParent">
                                <div class="SectionHeader">
                                    <h10>
                                        نبذة عن اعمال
                                        <u>
                                            محمد
                                        </u>
                                    </h10>
                                </div>
                                <div class="UserWorksGH">
                                    <h1>
                                        اعمالي
                                    </h1>
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
                                <h1> خبراتي </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="UploadResumeView">
        <div class="UploadResumeViewInner">
            <div class="UploadResumeViewFade" onclick="$('#UploadResumeView').fadeOut(600)"></div>
            <div class="UploadResumeViewDiv animate__animated animate__zoomIn">
                <form id="ResumeForm">
                    <h1>
                        السيرة الذاتية
                    </h1>
                    <p>
                        قم برفع السيرة الذاتية لكي تسهل عملية التواصل معك من قبل الشركات الباحثة على الموظفين وللظهور بنتائج البحث بشكل اكبر.
                    </p>
                    <button type="button" onclick="$(this).find('input')[0].click()">
                        <input type="file" accept="application/pdf" class="d-none" onchange="$('#ResumeForm').submit()">
                        <i class="fas fa-file-upload"></i>
                        اختيار الملف
                    </button>
                    <span>
                        يجب ان يكون الملف بصيغة ال PDF
                        <br>
                        ان لا تتجاوز مساحة الملف ال 2MB
                    </span>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection


