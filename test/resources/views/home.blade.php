@extends('layouts.layouts')

@php

    //    $title = langTitle($lang);

@endphp

@section('content')

    <!-- start Main Wrapper -->
    <div class="main-wrapper scrollspy-container">

        <div
            id="op"
            class="hero-banner hero-banner-01 overlay-light opacity-2 overlay-relative overlay-gradient gradient-white alt-option-03"
            style=" background-position: top center; background-image: url({{ url('/pages/mainpage/'. $mainImage) }});" >

            <div class="overlay-holder bottom"></div>

            <div class="hero-inner">
                <div class="container">
                    <h1>   
                        {{ $bigTitle_arr[0] ?? '' }} <span class="font200"> <span class="block">{{ $bigTitle_arr[1] ?? '' }} <span class="font700">{{ $bigTitle_arr[2] ?? ''}}</span></span></span>
                    </h1>
                    <p class="font-lg spacing-1">{{$smallTitle}}
                    </p>

                    <div class="search-form-main">
                        <form id="SearchForm" method="get" action="">
                            <div class="from-inner">

                                <div class="row shrink-auto-md gap-1">

                                    <div class="col-12 col-auto">
                                        <div class="col-inner">
                                            <div class="row cols-1 cols-md-5 gap-1">

                                                <div class="col">
                                                    <div class="col-inner">
                                                        <div class="form-group form-index">
                                                            <label>{{__("messages.search_box.country")}}</label>
                                                            <select name="country" class="form-control form-control-sm"
                                                                    placeholder="Select Category"
                                                                    id="country">
                                                                <option value="0" disabled selected>
                                                                    {{__("messages.search_box.select country")}}</option>
                                                                @foreach($countries as $country)
                                                                    @if( get_default_lang() =="ar")
                                                                        <option value="{{ $country->id }}">
                                                                            {{ ucfirst($country->titleAr) }}</option>
                                                                    @else
                                                                        <option value="{{ $country->id }}">
                                                                            {{ ucfirst($country->titleEn) }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="col-inner">
                                                        <div class="form-group form-index">
                                                            <label>{{__("messages.search_box.city")}}</label>
                                                            <select name="city" class="form-control formselect required"
                                                                    placeholder="{{__("messages.search_box.city")}}"  id="city">
                                                                <option value="0" disabled selected>{{__("messages.search_box.all cities")}}</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="col-inner">
                                                        <div class="form-group form-index">
                                                            <label>{{__("messages.search_box.duration")}}</label>
                                                            <select name="duration" class="chosen-the-basic form-control form-control-sm"
                                                                placeholder="Select one" tabindex="2">
                                                                <option class="opt-selc"><a
                                                                        class="reer"> {{__("messages.search_box.select duration")}}</a>
                                                                </option>
                                                                @for($i = 1; $i <= 48; $i++)
                                                                    <option value="{{$i}}">{{$i}} {{ $i > 1 ? __('messages.search_box.Weeks') : __('messages.search_box.Week')  }}</option> 
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="col-inner">
                                                        <div class="form-group form-index">
                                                            <label>{{__("messages.search_box.course")}}</label>
                                                            <select name="courseType" class="chosen-the-basic form-control form-control-sm"
                                                                placeholder="Select one" tabindex="2">
                                                                <option
                                                                    class="opt-selc">{{__("messages.search_box.select course")}}</option>
                                                                @foreach($coursetypes as $coursetype)
                                                                    @if( get_default_lang() =="ar")
                                                                        <option value="{{$coursetype->id}}">{{$coursetype->titleAr}}</option>
                                                                    @else
                                                                        <option value="{{$coursetype->id}}">{{$coursetype->titleEn}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="col-inner">
                                                        <div class="form-group form-index">
                                                            <label>{{__("messages.search_box.start date")}}</label>
                                                            <input id="id_start_date" name="start_date" type="text"
                                                                   class="form-control form-control-sm" value=""
                                                                   placeholder="{{__('messages.search_box.select date')}}"
                                                                   readonly>
                                                            <aside
                                                                class="lingo-dateWidget is-floating bg-white u-boxShadow-pop"
                                                                data-show="none">
                                                                <template>
                                                                    <div class="px-1 pb-2 col-6">
                                                                        <button type="button"
                                                                                class="btn btn-primary w-100"></button>
                                                                    </div>
                                                                    <div class="px-1 pb-2 col-12">
                                                                        <button type="button"
                                                                                class="btn btn-primary w-100"></button>
                                                                    </div>
                                                                </template>
                                                                <div class="row no-gutters" data-pane="month"></div>
                                                                <div class="row no-gutters" data-pane="date"></div>
                                                            </aside>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-shrink">
                                        <div class="col-inner">
                                            <button type="submit" class="btn btn-primary btn-block"><i
                                                    class="ion-android-search ss"></i></button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>

        <section class="pb-0">

            <div class="container">

                <!-- Features -->
                <div class="row cols-1 cols-lg-3 gap-20 gap-lg-40">
                    <div class="col">
                        <div class="featured-icon-horizontal-01 clearfix">
                            <div class="icon-font">
                                <img src="{{ asset('/pages/mainpage/' . getValueOfOptionMainPage('featureOneIcon')) }}" class="mw-100">
                                <!-- <i class="elegent-icon-gift_alt text-primary"></i> -->
                            </div>
                            <div class="content">
                                @if(app()->getLocale() == 'ar')
                                <h6>{{ getValueOfOptionMainPage('featureOneTitleAr') }}</h6>
                                <p class="text-muted">{{ getValueOfOptionMainPage('featureOneDescAr') }} </p>
                                @else
                                <h6>{{ getValueOfOptionMainPage('featureOneTitleEn') }}</h6>
                                <p class="text-muted">{{ getValueOfOptionMainPage('featureOneDescEn') }} </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="featured-icon-horizontal-01 clearfix">
                            <div class="icon-font">
                                <img src="{{ asset('/pages/mainpage/' . getValueOfOptionMainPage('featureTwoIcon')) }}" class="mw-100">
                                <!-- <i class="elegent-icon-wallet text-primary"></i> -->
                            </div>
                            <div class="content">
                                @if(app()->getLocale() == 'ar')
                                <h6>{{ getValueOfOptionMainPage('featureTwoTitleAr') }}</h6>
                                <p class="text-muted">{{ getValueOfOptionMainPage('featureTwoDescAr') }} </p>
                                @else
                                <h6>{{ getValueOfOptionMainPage('featureTwoTitleEn') }}</h6>
                                <p class="text-muted">{{ getValueOfOptionMainPage('featureTwoDescEn') }} </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="featured-icon-horizontal-01 clearfix">
                            <div class="icon-font">
                                <img src="{{ asset('/pages/mainpage/' . getValueOfOptionMainPage('featureThreeIcon')) }}" class="mw-100">
                                <!-- <i class="elegent-icon-heart_alt text-primary"></i> -->
                            </div>
                            <div class="content">
                                @if(app()->getLocale() == 'ar')
                                <h6>{{ getValueOfOptionMainPage('featureThreeTitleAr') }}</h6>
                                <p class="text-muted">{{ getValueOfOptionMainPage('featureThreeDescAr') }} </p>
                                @else
                                <h6>{{ getValueOfOptionMainPage('featureThreeTitleEn') }}</h6>
                                <p class="text-muted">{{ getValueOfOptionMainPage('featureThreeDescEn') }} </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clear mb-70"></div>

                <div class="section-title">
                    <h2><span><span>{{__("messages.best")}}</span> {{__("messages.countries")}}</span>
                    </h2>
                </div>

                <div class="row cols-3 cols-md-3 gap-5">
                    @php $j = 1 @endphp
                    @for($i = 0; $i < $featuredCountries->count(); $i+=2)
                        <div class="col">
                            <div class="col-inner">
                                @php $country = $featuredCountries[$i] @endphp
                                @php $height = $j @endphp
                                <a href="{{ get_default_lang() . '/search/country/' . $country->slug}}" class="destination-grid-item-02 caption-relative set-height-{{$height}}">
                                    <div class="image"
                                         style="margin-bottom: 0px !important;margin-top: 0px !important;">
                                        <img src="{{asset($country->image)}}" alt="image"/>
                                    </div>

                                    <div class="content caption-holder">
                                        <div class="caption-inner caption-bottom caption-gradient">
                                            <div class="row shrink-auto-sm gap-20 align-items-end">
                                                <div class="col-auto">
                                                    <div class="col-inner">
                                                        <h6>@if( get_default_lang() =="ar")
                                                                {{$country->titleAr}}
                                                            @else
                                                                {{$country->titleEn}}
                                                            @endif
                                                        </h6>
                                                    </div>
                                                </div>

                                                <div class="col-shrink">
                                                    <div class="col-inner">
                                                        <span class="caption-label">
                                                            {{ $count =  $country->schools->count() }}
                                                            {{ $count > 1 ? __('messages.schools') : __('messages.school') }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @if ( $i+1 >= $featuredCountries->count() )
                                    @php break; @endphp
                                @else
                                    @php $country = $featuredCountries[$i+1]; @endphp
                                    @php $height = 4-$j @endphp
                                
                                <a href="{{ get_default_lang() . '/search/country/' . $country->slug}}" class="destination-grid-item-02 caption-relative set-height-{{$height}}">
                                    <div class="image"
                                         style="margin-bottom: 0px !important;margin-top: 0px !important;">
                                        <img src="{{asset($country->image)}}" alt="image"/>
                                    </div>

                                    <div class="content caption-holder">
                                        <div class="caption-inner caption-bottom caption-gradient">
                                            <div class="row shrink-auto-sm gap-20 align-items-end">
                                                <div class="col-auto">
                                                    <div class="col-inner">
                                                        <h6>@if( get_default_lang() =="ar")
                                                                {{$country->titleAr}}
                                                            @else
                                                                {{$country->titleEn}}
                                                            @endif
                                                        </h6>
                                                    </div>
                                                </div>

                                                <div class="col-shrink">
                                                    <div class="col-inner">
                                                        <span class="caption-label">
                                                            {{ $count =  $country->schools->count() }}
                                                            {{ $count > 1 ? __('messages.schools') : __('messages.school') }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @endif
                            </div>
                        </div>
                        @php $j++ @endphp
                        @if ($j >= 4) @php $j=0 @endphp @endif
                    @endfor
                </div>
                <div class="clear mb-70"></div>

                <!-- Best schools -->
                <div class="section-title with-link">
                    <h2><span><span>{{__("messages.best")}} </span> {{__("messages.the schools")}}</span>
                    </h2>
                    <a href="courses">{{__("messages.all schools")}}
                        <i @if(get_default_lang()=="ar")
                           class="elegent-icon-arrow_left"
                           @else
                           class="elegent-icon-arrow_right"@endif>
                        </i>
                    </a>
                </div>

                <div class="courses-slider row equal-height cols-1 cols-sm-2 cols-xl-4 gap-20 mb-10 pb-30" {{ get_default_lang() == 'ar' ? 'data-rtl="true"' : '' }}>
                    @foreach($schools as $school)
                        <div class="col">
                            <figure class="tour-grid-item-01">
                                <a href="{{ route('school.course', ($lang == 'ar' ? $school->slugAr : $school->slugEn)) }}">
                                    <div class="image">
                                        <img
                                            src="{{ asset('Schools/photos/' . $school->files->where('type', 1)->first()->file) }}"
                                            alt="images"/>
                                        <p class="mt-3 price">
                                            <span class="h6 line-1 text-primary font16">{{ $school->registrationFee }}</span>
                                            <span class="text-muted mx-1">
                                                $150.00</span>
                                            <small class="duration sar"><span class="text-uppercase">{{ GLOBAL_CURRENCY ?? 'USD' }}</span> {{ __('messages.per week') }}</small>
                                        </p>
                                        <div
                                            class="sc-AxjAm bcMPWx absolute br--right br1 f8 flex items-center pl1 pr2 z-1 top-1 bg-red white">
                                            <svg xmlns="http://www.w3.org/2000/svg" id="" width="20" height="14"
                                                 class="mr1 fill-white" viewBox="13 15 15 15">
                                                <path
                                                    d="M16.835 21.67a2.823 2.823 0 0 0 2.835-2.835A2.823 2.823 0 0 0 16.835 16 2.823 2.823 0 0 0 14 18.835a2.846 2.846 0 0 0 2.835 2.835zm0-3.815c.525 0 .945.42.945.945 0 .525-.42.945-.945.945a.941.941 0 0 1-.945-.945c0-.525.42-.945.945-.945zM24.115 23.21a2.823 2.823 0 0 0-2.835 2.835 2.823 2.823 0 0 0 2.835 2.835 2.823 2.823 0 0 0 2.835-2.835 2.846 2.846 0 0 0-2.835-2.835zm0 3.815a.941.941 0 0 1-.945-.945c0-.525.42-.945.945-.945.525 0 .945.42.945.945 0 .525-.42.945-.945.945zM25.865 17.05c-.385-.385-.98-.385-1.33 0l-9.45 9.415c-.385.385-.385.98 0 1.33.175.175.42.28.665.28.245 0 .49-.105.665-.28l9.415-9.415c.385-.35.385-.945.035-1.33z"></path>
                                            </svg>
                                            20 {{ __('messages.discount') }}
                                        </div>
                                    </div>

                                    <figcaption class="content">
                                        <ul class="item-meta">
                                            <li>
                                                <i class="elegent-icon-pin_alt text-warning"></i>
                                                <span class="country">{{ get_default_lang() == 'ar' ? $school->country->titleAr : $school->country->titleEn }} </span>
                                                <span class="city">{{ get_default_lang() == 'ar' ? $school->city->titleAr : $school->city->titleEn }} </span>
                                            </li>
                                            <li>
                                                <div class="rating-item rating-sm rating-inline clearfix">
                                                    <div class="rating-icons">
                                                        <input type="hidden" class="rating"
                                                               data-filled="rating-icon ri-star rating-rated"
                                                               data-empty="rating-icon ri-star-empty" data-fractions="2"
                                                               data-readonly value="{{ $school->rating }}"/>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <h5>
                                            {{ get_default_lang() == 'ar' ? $school->titleAr : $school->titleEn }}
                                        </h5>
                                        @if($course = $school->featuredCourse)
                                        <ul class="item-meta time justify-content-start mt-10 mb-10 grid-hours">
                                            <li>
                                                <i class="fas fa-book-open text-primary {{ get_default_lang() == 'ar' ? 'ml-1' : 'mr-1' }}"></i>
                                                {{ $lang == 'ar' ? $course->titleAr : $course->titleEn }}
                                            </li>
                                            <li class="{{ get_default_lang() == 'ar' ? 'text-left' : 'text-right' }}">
                                                <i class="far fa-clock text-primary {{ get_default_lang() == 'ar' ? 'ml-1' : 'mr-1' }}"></i>
                                                {{  $course->hoursPerWeek . ' ' . ( $course->hoursPerWeek > 1 ? __('messages.hours') : __('messages.hour') ) }}
                                            </li>
                                        </ul>
                                        @endif
                                    </figcaption>
                                </a>
                            </figure>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

        <!-- Packages -->
        <section class="pb-30 pt-30">
            <div class="container">
                <div class="section-title with-link">
                    <h2><span><span>{{ __('messages.packages') }}</span>
                        </span>
                    </h2>
                    <a href="packages">{{ __('messages.all packages') }}
                        <i class="{{ get_default_lang()=='ar' ? 'elegent-icon-arrow_left' : 'elegent-icon-arrow_right' }}"></i>
                    </a>
                </div>

                <div class="packages-slider row equal-height cols-1 cols-sm-2 cols-xl-4 gap-30 mb-10" {{ get_default_lang() == 'ar' ? 'data-rtl="true"' : '' }}>
                    @foreach($featuredPackages as $package)
                        <div class="col">
                            <figure class="tour-grid-item-01">
                                <a href="{{ url(get_default_lang() . '/packages/' . $package->id) }}">
                                    <div class="image">
                                        <img src="{{ asset('Packages/' . '01.jpg') }}" alt="images">
                                        <p class="mt-3 price">
                                            @if($package->feeDiscount)
                                            <span class="h6 line-1 text-primary font16">{{ $package->fee }}</span>
                                            <span class="text-muted mx-1">{{ $package->feeDiscount }}</span>
                                            @else
                                            <span class="text-muted mx-1">{{ $package->fee }}</span>
                                            @endif
                                            <small class="duration sar text-uppercase">{{ GLOBAL_CURRENCY ?? 'USD' }} {{ __('messages.per week') }}</small>

                                            <small class="duration border border-infos rounded-left pl-3 pr-3">
                                                {{ $duration = $package->duration }}
                                                {{ $duration > 1 ? __('messages.weeks') : __('messages.week') }}
                                            </small>
                                        </p>
                                        
                                        @if($package->feeDiscount)
                                        <div class="sc-AxjAm bcMPWx absolute br--right br1 f8 flex items-center pl1 pr2 z-1 top-1 bg-white soft-black">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="text-dark" id="" width="20" height="15" viewBox="13 15 15 15"><path d="M16.835 21.67a2.823 2.823 0 0 0 2.835-2.835A2.823 2.823 0 0 0 16.835 16 2.823 2.823 0 0 0 14 18.835a2.846 2.846 0 0 0 2.835 2.835zm0-3.815c.525 0 .945.42.945.945 0 .525-.42.945-.945.945a.941.941 0 0 1-.945-.945c0-.525.42-.945.945-.945zM24.115 23.21a2.823 2.823 0 0 0-2.835 2.835 2.823 2.823 0 0 0 2.835 2.835 2.823 2.823 0 0 0 2.835-2.835 2.846 2.846 0 0 0-2.835-2.835zm0 3.815a.941.941 0 0 1-.945-.945c0-.525.42-.945.945-.945.525 0 .945.42.945.945 0 .525-.42.945-.945.945zM25.865 17.05c-.385-.385-.98-.385-1.33 0l-9.45 9.415c-.385.385-.385.98 0 1.33.175.175.42.28.665.28.245 0 .49-.105.665-.28l9.415-9.415c.385-.35.385-.945.035-1.33z"></path></svg>
                                            {{ (int)(($package->feeDiscount / $package->fee) * 100) }} {{ __('messages.special discount') }}
                                        </div>
                                        @endif
                                    </div>

                                    <figcaption class="content">
                                        <ul class="item-meta">
                                            <li>
                                                <i class="elegent-icon-pin_alt text-warning"></i> {{ get_default_lang() == 'ar' ? $package->country->titleAr : $package->country->titleEn }}
                                                <span class="city">{{ get_default_lang() == 'ar' ? $package->city->titleAr : $package->city->titleEn }}</span>
                                            </li>
                                            <li>
                                                <div class="rating-item rating-sm rating-inline clearfix">
                                                    <div class="rating-icons">
                                                        <input type="hidden" class="rating"
                                                               data-filled="rating-icon ri-star rating-rated"
                                                               data-empty="rating-icon ri-star-empty" data-fractions="2"
                                                               data-readonly value="{{ $package->rating }}"/>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <h5>{{ get_default_lang() == 'ar' ? $package->titleAr : $package->titleEn }}</h5>
                                        <ul class="item-meta time justify-content-start mt-10 mb-10 grid-hours">
                                            <li>
                                                <i class="fas fa-book-open text-primary {{ get_default_lang() == 'ar' ? 'ml-1' : 'mr-1' }}"></i> {{ get_default_lang() == 'ar' ? $package->courseType->titleAr : $package->courseType->titleEn }}
                                            </li>
                                            <li>
                                                <i class="far fa-clock text-primary {{ get_default_lang() == 'ar' ? 'ml-1' : 'mr-1' }}"></i>
                                                20 {{ __('messages.hours') }}
                                            </li>
                                        </ul>
                                    </figcaption>
                                </a>

                                <div class="row  ato clearfix ">
                                    <div class="col tag-item text-center ajh">Accommodation</div>
                                    <div class="col tag-item text-center ajh">Meals </div>
                                    <div class="col tag-item text-center ajh">Visas </div>
                                </div>
                            </figure>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Articles -->
        <section class="pt-30 pb-30">

            <div class="container">

                <div class="section-title with-link">
                    @if(get_default_lang() == 'ar')
                        <h2><span><span>المقالات</span> الدراسية</span></h2>
                    @else
                        <h2><span><span>Study</span> Articles</span></h2>
                    @endif
                    <a href="blog">
                        {{ __('messages.all articles') }} 
                        <i class="{{ get_default_lang() == 'ar' ? 'elegent-icon-arrow_left' : 'elegent-icon-arrow_right' }}"></i>
                    </a>
                </div>

                <div class="post-grid-wrapper-01">
                    <div class="row equal-height cols-1 cols-sm-2 cols-md-3 gap-10 gap-md-20 mb-40">
                        @foreach($featuredArticles as $article)
                        <div class="col">
                            <article class="post-grid-01">
                                <div class="image">
                                    <a href="{{ url(get_default_lang() . '/articles/' . (get_default_lang() == 'ar' ? $article->slugAr : $article->slugEn)) }}">
                                        <img src="{{asset('Articles/'.$article->image)}}" alt="images"/>
                                    </a>
                                </div>
                                <div class="content">
                                    <span class="post-date text-muted" style="letter-spacing: 1px">
                                        @php $date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $article->date) @endphp
                                        {{ __('months.' . $date->format("M")) .  ' ' . $date->format('d') . ', ' . $date->format('Y') }}
                                    </span>
                                    <h4><a href="{{ url(get_default_lang() . '/articles/' . (get_default_lang() == 'ar' ? $article->slugAr : $article->slugEn)) }}">

                                            @if( get_default_lang()=="ar")
                                                {{$article->titleAr}}
                                            @else
                                                {{$article->titleEn}}
                                            @endif
                                        </a>
                                    </h4>
                                    <a href="{{ url(get_default_lang() . '/articles/' . (get_default_lang() == 'ar' ? $article->slugAr : $article->slugEn)) }}"
                                       class="h6">{{__("messages.read more")}} <i 
                                       class=" {{ get_default_lang() == 'ar' ? 'elegent-icon-arrow_left' : 'elegent-icon-arrow_right' }}"></i></a>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section class="brands-section pt-10 pb-10">
            <div class="container image-responsive">
                <div class="brand-slider py-2" {{ get_default_lang() == 'ar' ? 'data-rtl="true"' : '' }}>
                    @foreach($partners as $partner)
                        <div class="brand-img">
                            <img src="{{asset('partner/logos/' . $partner->logo)}}" style="height: 48px; width: auto;">
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        @section('script')
            <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

            <script>
                $(document).ready(function () {
                    $('#country').on('change', function () {
                        let id = $(this).val();
                        $('#city').empty();
                        $('#city').append(`<option value="0" dissabled selected>{{__("messages.search_box.wait")}}</option>`);
                        $.ajax({
                            type: 'GET',
                            url: "/{{ get_default_lang() }}/GetCityAgainstMainCatEdit/" + id,
                            success: function (response) {
                                console.log(response);
                                $('#city').empty();
                                $('#city').append(`<option value="*"  selected>{{__("messages.search_box.all cities")}}</option>`);
                                response.forEach(element => {
                                    @if( get_default_lang() == "ar")
                                    $('#city').append(`<option value="${element['id']}">${element['titleAr']}</option>`);
                                    @else
                                    $('#city').append(`<option value="${element['id']}">${element['titleEn']}</option>`);
                                    @endif
                                });
                            }
                        });
                    });
                });
            </script>
    @endsection
    <!-- end Main Wrapper -->
@endsection
