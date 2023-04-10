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
                                    @if(isset($company->logo))
                                        <img src="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $company->logo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $company->logo->getUrl('thumb')) }}">
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
                                        @if(isset($company->category->photo))
                                            <img src="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $company->category->photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $company->category->photo->getUrl('thumb')) }}">
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
                                    @if(isset($company->jobs))
                                        @foreach($company->jobs->sortByDesc('top_rated') as $key => $job)
                                            <div class="LatestJobsItem animate__animated animate__fadeIn">
                                                <div class="LatestJobsItemImage">
                                                    @if($job->photo)
                                                        <img src="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $job->photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $job->photo->getUrl('thumb')) }}">
                                                    @else
                                                        <img src="{{ asset('') }}Wazefni/Requirements/IMG/LogoIcon.png" style="filter: grayscale(1);padding: 11px;">
                                                    @endif
                                                </div>
                                                <div class="LatestJobsItemInfo SpecialOfferIndicator">
                                                    <h3 onclick="$(this).find('a')[0].click()"><a
                                                            href="/jobs/{{ $job->id ?? '' }}" class="d-none"></a>{{ $job->name ?? '' }}
                                                    </h3>
                                                    <p>{{ $job->short_description ?? '' }}</p><span
                                                        title="تاريخ النشر"><i
                                                            class="fas fa-clock"></i>{{ $job->created_at ?? '' }} </span>
                                                    <div class="JobDetails">
                                                        <h15 title="مكان الوظيفة" style="background: #a14444;">
                                                            <img src="http://127.0.0.1:8000/Wazefni/Requirements/IMG/Location.png">
                                                            {{ $job->address ?? '' }}
                                                        </h15>
                                                        <h15 title="الراتب"><img
                                                                src="/Wazefni/Requirements/IMG/Salary.png">{{ $job->salary ?? '' }}<u>
                                                                دينار </u></h15>
                                                        <h15 style="background: #616161" class="NoImgJobDetail"
                                                             title="نوع الوظيفة">{{ $job->job_nature ?? '' }}
                                                        </h15>
                                                    </div>
                                                    <input type="hidden" class="IsRated1" rel="1">
                                                    @if($job->top_rated == 1)
                                                        <h12 title="إعلان مميز">
                                                            <img src="/Wazefni/Requirements/IMG/Promoted.png">
                                                        </h12>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
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
                                @if(isset($company->category->companies))
                                    @foreach($company->category->companies as $key => $OtherCompany)
                                        <div class="SimilerCompaniesItem">
                                            <div class="SimilerCompaniesImgHolder">
                                                <img src="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $company->logo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $company->logo->getUrl('thumb')) }}">
                                            </div>
                                            <div class="SimilerCompaniesItemInfo">
                                                <h2 onclick="$(this).find('a')[0].click()">
                                                    <a href="#" class="d-none"></a>
                                                    {{ $OtherCompany->name ?? '' }}
                                                </h2>
                                                <p>
                                                    <i class="fas fa-calendar"></i>
                                                    عضو منذ:
                                                    <u>
                                                        {{ $OtherCompany->created_at->format('Y/m/d') ?? '' }}
                                                    </u>
                                                </p>
                                                <p>
                                                    <i class="fas fa-shopping-bag" style="color: #488334"></i>
                                                    وظائف متاحة:
                                                    <u>
                                                        {{ $OtherCompany->jobs->count() ?? '' }}
                                                    </u>
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
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


