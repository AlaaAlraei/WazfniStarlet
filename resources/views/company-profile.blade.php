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
                                    @if($company->logo)
                                        <img src="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost', $_SERVER['SERVER_NAME'] , $company->logo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $company->logo->getUrl('thumb')) }}">
                                    @else
                                        <img src="#">
                                    @endif
                                </div>
                                <div class="CompanyProfilePaperHeaderInfo">
                                    <h1>
                                        {{ $company->name ?? '' }}
                                        @if($company->email_verified_at)
                                            <i class="fas fa-check-circle" title="حساب موثق"></i>
                                        @endif

                                    </h1>
                                    <span>
                                          @if($company->category->photo)
                                            <img src="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost', $_SERVER['SERVER_NAME'] , $company->category->photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $company->category->photo->getUrl('thumb')) }}">
                                        @else
                                            <img src="#">
                                        @endif
                                        {{ $company->category->name ?? '' }}
                                    </span>
                                </div>
                                <div class="CompanyProfilePaperHeaderOptions">
                                    <div class="CompanyProfilePaperHeaderOptionsInner">
                                        @if($company->website)
                                            <button type="button" onclick="$(this).find('a')[0].click()"
                                                    class="CompanyWebsiteBtn">
                                                <a href="{{ $company->website ?? '' }}" class="d-none" target="_blank"></a>
                                                <i class="fas fa-globe"></i>
                                                الموقع اللالكتروني
                                            </button>
                                        @endif
                                        <div class="CompanySocials">
                                            @if($company->facebook)
                                                <button type="button" onclick="$(this).find('a')[0].click()">
                                                    <a href="{{ $company->facebook }}" class="d-none" target="_blank"></a>
                                                    <i class="fab fa-facebook"></i>
                                                </button>
                                            @endif
                                            @if($company->twitter)
                                                <button type="button" onclick="$(this).find('a')[0].click()">
                                                    <a href="{{ $company->twitter }}" class="d-none" target="_blank"></a>
                                                    <i class="fab fa-twitter"></i>
                                                </button>
                                            @endif
                                            @if($company->instagram)
                                                <button type="button" onclick="$(this).find('a')[0].click()">
                                                    <a href="{{ $company->instagram }}" class="d-none" target="_blank"></a>
                                                    <i class="fab fa-instagram"></i>
                                                </button>
                                            @endif
                                            @if($company->linkedin)
                                                <button type="button" onclick="$(this).find('a')[0].click()">
                                                    <a href="{{ $company->linkedin }}" class="d-none" target="_blank"></a>
                                                    <i class="fab fa-linkedin"></i>
                                                </button>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p class="CompanyBio">
                                <u>نبذة</u>
                                {!! $company->about ?? '' !!}
                            </p>

                            <div class="JobPaperDetails">
                                <h1>
                                    تفاصيل
                                </h1>
                                <p>
                                    عضو منذ :
                                    <u>
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        {{ $company->created_at->format('Y/m/d') ?? '' }}
                                    </u>
                                </p>
                                <p>
                                    مكان الشركة :
                                    <u>
                                        <i class="fa fa-map-marker-alt" aria-hidden="true" style="color: #b52e2e;"></i>
                                        {{ $company->address ?? '' }}
                                    </u>
                                </p>
                                <p>
                                    عدد الوظائف :
                                    <u>
                                        {{ $company->jobs->count() ?? '' }} وظيفة
                                    </u>
                                </p>
                                <p>
                                    عدد المنتسبين :
                                    <u>
                                        {{ $FormCount ?? '' }}
                                    </u>
                                </p>
                            </div>

                            <div class="CompanyJobsGHParent">
                                <div class="SectionHeader">
                                    <h10>
                                        اخر الوظائف المتاحة في
                                        <u>
                                            {{ $company->name ?? '' }}
                                        </u>
                                    </h10>
                                </div>
                                <div class="CompanyJobsGH">
                                    @foreach($company->jobs->sortByDesc('id') as $key => $job)
                                        <div class="LatestJobsItem animate__animated animate__fadeIn">
                                            <div class="LatestJobsItemImage">
                                                @if($job->photo)
                                                    <img src="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost', $_SERVER['SERVER_NAME'] , $job->photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $job->photo->getUrl('thumb')) }}">
                                                @endif
                                            </div>
                                            <div class="LatestJobsItemInfo SpecialOfferIndicator"><h5
                                                    title="Starlet IT Company" onclick="$(this).find('a')[0].click()"><a
                                                        href="/company-profile/1" class="d-none"></a><img
                                                        src="http://localhost:8000/storage/7/conversions/64091257c03bf_dsfdf-thumb.jpg"
                                                        class="SpecialSliderUser">Starlet IT Company<u> <i
                                                            class="fa fa-check-circle" aria-hidden="true"></i></u></h5>
                                                <h3 onclick="$(this).find('a')[0].click()"><a
                                                        href="http://127.0.0.1:8000/jobs/2" class="d-none"></a>Job Title
                                                </h3>
                                                <p>مطلوب مدخل بيانات بخبرة لا تقل عن 3 سنوات في السوق المحلي</p><span
                                                    title="تاريخ النشر"><i
                                                        class="fas fa-clock"></i>اﻷربعاء 8 مارس 2023</span>
                                                <div class="JobDetails">
                                                    <h15 title="مكان الوظيفة" style="background: #a14444;"><img
                                                            src="http://127.0.0.1:8000/Wazefni/Requirements/IMG/Location.png">al
                                                        madina
                                                    </h15>
                                                    <h15 title="الراتب"><img
                                                            src="http://127.0.0.1:8000/Wazefni/Requirements/IMG/Salary.png">420<u>
                                                            دينار </u></h15>
                                                    <h15 style="background: #616161" class="NoImgJobDetail"
                                                         title="نوع الوظيفة">Full-Time
                                                    </h15>
                                                </div>
                                                <input type="hidden" class="IsRated1" rel="1">
                                                <h12 title="إعلان مميز"><img
                                                        src="http://127.0.0.1:8000/Wazefni/Requirements/IMG/Promoted.png">
                                                </h12>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" dir="ltr">
                        <div class="SimilerCompanies">
                            <div class="SectionHeader">
                                <h10>
                                    شركات مشابهة
                                </h10>
                            </div>
                            <div class="SimilerCompaniesGH">
                                <div class="SimilerCompaniesItem">
                                    <div class="SimilerCompaniesImgHolder">
                                        <img src="https://www.designhill.com/resize_img.php?atyp=page_file&pth=ft_ca_ct||117||contestfile_7&flp=1554116646-12909290705ca1f02620ebf2-09367637.jpg">
                                    </div>
                                    <div class="SimilerCompaniesItemInfo">
                                        <h2 onclick="$(this).find('a')[0].click()">
                                            <a href="#" class="d-none"></a>
                                            اسم الشركة
                                        </h2>
                                        <p>
                                            <i class="fas fa-calendar"></i>
                                            عضو منذ:
                                            <u>
                                                9/10/2023
                                            </u>
                                        </p>
                                        <p>
                                            <i class="fas fa-circle" style="color: #488334"></i>
                                            وظائف متاحة:
                                            <u>
                                                14
                                            </u>
                                        </p>
                                    </div>
                                </div>
                                <div class="SimilerCompaniesItem">
                                    <div class="SimilerCompaniesImgHolder">
                                        <img src="https://www.designhill.com/resize_img.php?atyp=page_file&pth=ft_ca_ct||117||contestfile_7&flp=1554116646-12909290705ca1f02620ebf2-09367637.jpg">
                                    </div>
                                    <div class="SimilerCompaniesItemInfo">
                                        <h2 onclick="$(this).find('a')[0].click()">
                                            <a href="#" class="d-none"></a>
                                            اسم الشركة
                                        </h2>
                                        <p>
                                            <i class="fas fa-calendar"></i>
                                            عضو منذ:
                                            <u>
                                                9/10/2023
                                            </u>
                                        </p>
                                        <p>
                                            <i class="fas fa-circle" style="color: #488334"></i>
                                            وظائف متاحة:
                                            <u>
                                                14
                                            </u>
                                        </p>
                                    </div>
                                </div>
                                <div class="SimilerCompaniesItem">
                                    <div class="SimilerCompaniesImgHolder">
                                        <img src="https://www.designhill.com/resize_img.php?atyp=page_file&pth=ft_ca_ct||117||contestfile_7&flp=1554116646-12909290705ca1f02620ebf2-09367637.jpg">
                                    </div>
                                    <div class="SimilerCompaniesItemInfo">
                                        <h2 onclick="$(this).find('a')[0].click()">
                                            <a href="#" class="d-none"></a>
                                            اسم الشركة
                                        </h2>
                                        <p>
                                            <i class="fas fa-calendar"></i>
                                            عضو منذ:
                                            <u>
                                                9/10/2023
                                            </u>
                                        </p>
                                        <p>
                                            <i class="fas fa-circle" style="color: #488334"></i>
                                            وظائف متاحة:
                                            <u>
                                                14
                                            </u>
                                        </p>
                                    </div>
                                </div>
                                <div class="SimilerCompaniesItem">
                                    <div class="SimilerCompaniesImgHolder">
                                        <img src="https://www.designhill.com/resize_img.php?atyp=page_file&pth=ft_ca_ct||117||contestfile_7&flp=1554116646-12909290705ca1f02620ebf2-09367637.jpg">
                                    </div>
                                    <div class="SimilerCompaniesItemInfo">
                                        <h2 onclick="$(this).find('a')[0].click()">
                                            <a href="#" class="d-none"></a>
                                            اسم الشركة
                                        </h2>
                                        <p>
                                            <i class="fas fa-calendar"></i>
                                            عضو منذ:
                                            <u>
                                                9/10/2023
                                            </u>
                                        </p>
                                        <p>
                                            <i class="fas fa-circle" style="color: #488334"></i>
                                            وظائف متاحة:
                                            <u>
                                                14
                                            </u>
                                        </p>
                                    </div>
                                </div>
                                <div class="SimilerCompaniesItem">
                                    <div class="SimilerCompaniesImgHolder">
                                        <img src="https://www.designhill.com/resize_img.php?atyp=page_file&pth=ft_ca_ct||117||contestfile_7&flp=1554116646-12909290705ca1f02620ebf2-09367637.jpg">
                                    </div>
                                    <div class="SimilerCompaniesItemInfo">
                                        <h2 onclick="$(this).find('a')[0].click()">
                                            <a href="#" class="d-none"></a>
                                            اسم الشركة
                                        </h2>
                                        <p>
                                            <i class="fas fa-calendar"></i>
                                            عضو منذ:
                                            <u>
                                                9/10/2023
                                            </u>
                                        </p>
                                        <p>
                                            <i class="fas fa-circle" style="color: #488334"></i>
                                            وظائف متاحة:
                                            <u>
                                                14
                                            </u>
                                        </p>
                                    </div>
                                </div>
                                <div class="SimilerCompaniesItem">
                                    <div class="SimilerCompaniesImgHolder">
                                        <img src="https://www.designhill.com/resize_img.php?atyp=page_file&pth=ft_ca_ct||117||contestfile_7&flp=1554116646-12909290705ca1f02620ebf2-09367637.jpg">
                                    </div>
                                    <div class="SimilerCompaniesItemInfo">
                                        <h2 onclick="$(this).find('a')[0].click()">
                                            <a href="#" class="d-none"></a>
                                            اسم الشركة
                                        </h2>
                                        <p>
                                            <i class="fas fa-calendar"></i>
                                            عضو منذ:
                                            <u>
                                                9/10/2023
                                            </u>
                                        </p>
                                        <p>
                                            <i class="fas fa-circle" style="color: #488334"></i>
                                            وظائف متاحة:
                                            <u>
                                                14
                                            </u>
                                        </p>
                                    </div>
                                </div>
                                <div class="SimilerCompaniesItem">
                                    <div class="SimilerCompaniesImgHolder">
                                        <img src="https://www.designhill.com/resize_img.php?atyp=page_file&pth=ft_ca_ct||117||contestfile_7&flp=1554116646-12909290705ca1f02620ebf2-09367637.jpg">
                                    </div>
                                    <div class="SimilerCompaniesItemInfo">
                                        <h2 onclick="$(this).find('a')[0].click()">
                                            <a href="#" class="d-none"></a>
                                            اسم الشركة
                                        </h2>
                                        <p>
                                            <i class="fas fa-calendar"></i>
                                            عضو منذ:
                                            <u>
                                                9/10/2023
                                            </u>
                                        </p>
                                        <p>
                                            <i class="fas fa-circle" style="color: #488334"></i>
                                            وظائف متاحة:
                                            <u>
                                                14
                                            </u>
                                        </p>
                                    </div>
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


