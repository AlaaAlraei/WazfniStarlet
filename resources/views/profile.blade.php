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
                                        src="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? asset("system/storage/app/".$user->employee->image."") : str_replace("public", "storage", asset("".$user->employee->image."")) }}">
                                </div>
                                <div class="CompanyProfilePaperHeaderInfo">
                                    <h1>
                                        {{ $user->name ?? '' }} {{ $user->last_name ?? '' }}
                                    </h1>
                                    <span>
                                        @if(isset($user->employee))
                                            @if($user->employee->category->photo)
                                                <img
                                                    src="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $user->employee->category->photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $user->employee->category->photo->getUrl('thumb')) }}">
                                            @else
                                                <img
                                                    src=" {{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? asset("system/storage/app/".$user->employee->category->icon."") : str_replace("public", "storage", asset("".$user->employee->category->icon."")) }}">
                                            @endif
                                            {{ $user->employee->category->name ?? '' }}
                                        @endif
                                    </span>
                                </div>
                                <div class="CompanyProfilePaperHeaderOptions">
                                    <div class="CompanyProfilePaperHeaderOptionsInner">

                                        @if(isset($user->employee->resume))
                                            <button type="button" onclick="$(this).find('a')[0].click()"
                                                    class="CompanyWebsiteBtn">
                                                <a href="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? asset("system/storage/app/".$user->employee->resume."") : str_replace("public", "storage", asset("".$user->employee->resume."")) }}"
                                                   class="d-none" target="_blank"></a>
                                                <i class="fas fa-file"></i>
                                                السيرة الذاتية
                                            </button>
                                        @endif

                                        <div class="CompanySocials">
                                            @if(isset($user->employee->facebook))
                                                <button type="button" onclick="$(this).find('a')[0].click()">
                                                    <a href="{{ $user->employee->facebook ?? '' }}" class="d-none"
                                                       target="_blank"></a>
                                                    <i class="fab fa-facebook"></i>
                                                </button>
                                            @endif
                                            @if(isset($user->employee->twitter))
                                                <button type="button" onclick="$(this).find('a')[0].click()">
                                                    <a href="{{ $user->employee->twitter ?? '' }}" class="d-none"
                                                       target="_blank"></a>
                                                    <i class="fab fa-twitter"></i>
                                                </button>
                                            @endif
                                            @if(isset($user->employee->instagram))
                                                <button type="button" onclick="$(this).find('a')[0].click()">
                                                    <a href="{{ $user->employee->instagram ?? '' }}" class="d-none"
                                                       target="_blank"></a>
                                                    <i class="fab fa-instagram"></i>
                                                </button>
                                            @endif
                                            @if(isset($user->employee->linkedin))
                                                <button type="button" onclick="$(this).find('a')[0].click()">
                                                    <a href="{{ $user->employee->linkedin ?? '' }}" class="d-none"
                                                       target="_blank"></a>
                                                    <i class="fab fa-linkedin"></i>
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p class="CompanyBio">
                                <u>نبذة</u>
                                {{ $user->employee->bio ?? '' }}
                            </p>

                            <div class="JobPaperDetails">
                                <h1>
                                    تفاصيل
                                </h1>
                                <p>
                                    رقم الهاتف :
                                    <u dir="ltr">
                                        {{ $user->phone ?? '' }}
                                        <i class="fas fa-mobile-alt"></i>
                                    </u>
                                </p>
                                <p>
                                    الميلاد :
                                    <u>
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        {{ date($user->employee->birthday, strtotime('d F Y')) }}
                                    </u>
                                </p>
                                <p>
                                    الدولة :
                                    <u>
                                        <i class="fa fa-map-marker-alt" aria-hidden="true" style="color: #b52e2e;"></i>
                                        {{ $user->employee->country->name ?? '' }}
                                    </u>
                                </p>
                                <p>
                                    التخصص :
                                    <u>
                                        {{ $user->employee->category->name ?? '' }}
                                    </u>
                                </p>
                            </div>

                            <div class="CompanyJobsGHParent">
                                <div class="SectionHeader">
                                    <h10>
                                        نبذة عن اعمال
                                        <u>
                                            {{ $user->name ?? '' }} {{ $user->last_name ?? '' }}
                                        </u>
                                    </h10>
                                </div>
                                <div class="UserWorksGH">
                                    @foreach($user->employee->portfolios as $key => $portfolio)
                                        <div class="UserWorksItem">
                                            <div class="UserWorksImgHolder">
                                                @if(isset($portfolio->photo))
                                                    <img
                                                        src="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $portfolio->photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $portfolio->photo->getUrl('thumb')) }}">
                                                @endif
                                            </div>
                                            <div class="UserWorksItemFade"></div>
                                            <div class="UserWorksInfo">
                                                <h4> {{ $portfolio->title ?? '' }} </h4>
                                                <button type="button" class="animate__animated animate__zoomIn" onclick="$(this).find('a')[0].click()">
                                                    <a href="{{ $portfolio->url ?? '' }}" class="d-none" target="_blank"></a>
                                                    <i class="fas fa-eye"></i>
                                                    عرض
                                                </button>
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
                                    خبرات
                                </h10>
                            </div>
                            <div class="UserExperienceGH">
                                @if(isset($user->employee->experiences))
                                    @foreach($user->employee->experiences->sortBy('to_date') as $key => $experience)
                                        <div class="UserExperienceItem">
                                            <div class="UserExperienceImgHolder">
                                                @if(isset($experience->photo))
                                                    <img
                                                        src="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $experience->photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $experience->photo->getUrl('thumb')) }}">
                                                @endif
                                            </div>
                                            <h3>
                                                <g>{{ $experience->position ?? '' }}</g>
                                                -
                                                <u>{{ $experience->company ?? '' }}</u>
                                            </h3>
                                            <span>
                                        منذ
                                        <u><i class="fas fa-calendar-alt"></i>{{ $experience->from_date ?? '' }}</u>
                                        حتى
                                            @if($experience->to_date == null)
                                                    <u><i class="fas fa-calendar-alt"></i>الآن</u>
                                                @else
                                                    <u><i class="fas fa-calendar-alt"></i>{{ $experience->to_date ?? '' }}</u>
                                                @endif
                                    </span>
                                        </div>
                                    @endforeach
                                @else

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


