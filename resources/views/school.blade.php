@extends('layouts.layouts')

@section('meta-description')
{{get_default_lang() == 'ar' ? $school->content->metaDescriptionAr : $school->content->metaDescriptionEn }}
@endsection
@section('meta-keywords', '')

@section('content')

<!-- coursesTypes modal -->
<div class="modal fade pt-30 coursesTypes-modal" id="coursesTypes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="container contai-padd">

        <div class="modal-dialog modal-mobs" role="document" style="max-width: 70%; margin: 5rem auto;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Choose Your Courses</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="fullwidth-section">

                            <div class="mb-20"></div>
                            <nav>
                                <div class="nav nav-tabs grid-change" id="nav-tab" role="tablist">

                                    @foreach($courseTypes as $group_id => $coursesSection)
                                    <a class="nav-item nav-link btn btn-primary link-drop-ms" id="nav-{{$group_id}}-tab" data-toggle="tab" href="#tab-{{$group_id}}" role="tab" aria-controls="nav-profile" aria-selected="false">
                                        {{-- $group_id --}}
                                        @if($group_id == 1)
                                        General Courses
                                        @elseif($group_id == 2)
                                        Exam Preperation courses
                                        @elseif($group_id == 3)
                                        Bussiness courses
                                        @endif
                                    </a>
                                    @endforeach
                                </div>
                            </nav>

                            <div class="loader">
                                <div class="tab-content courseSectionContainer" id="nav-tabContent">
                                    @foreach($courseTypes as $group_id => $coursesSection)
                                    <div class="tab-pane fade show " id="tab-{{$group_id}}" role="tabpanel" aria-labelledby="nav-{{$group_id}}-tab">
                                        <div class="collapsej  mt-40 ">

                                            @foreach($coursesSection as $courses)
                                                @if($courses->courses->count())
                                                    @if($courses->courses->where('school_id', $school->id)->count())
                                                        @foreach($coursesSchool = $courses->courses->where('school_id', $school->id)->where('minBookingWeeks', '<=',$weeks) as $course)
                                                            @if($course->weeksrange_fees->count())

                                                                @php
                                                                    if(\Session::has('search')){
                                                                        $search = \Session::get('search');
                                                                        if(array_key_exists('weeks', $search)){
                                                                            $weeks = $search['weeks'];
                                                                        }else{
                                                                            $weeks = 1;
                                                                        }
                                                                    }else{
                                                                       $weeks = 1;
                                                                    }
                                                                @endphp

                                                                @php
                                                                $records = $course->weeksrange_fees->where('fromWeek', "<=", $weeks)->where('toWeek', ">=", $weeks);
                                                                if ($records->count()) {
                                                                    $record = $records->first();
                                                                }else{
                                                                    $latest = $course->weeksrange_fees->last();
                                                                    $biggestWeek = $course->weeksrange_fees->last()->toWeek;
                                                                    if ($weeks > $biggestWeek) {
                                                                        $record = $latest;
                                                                    }else{
                                                                        $record = $course->weeksrange_fees->first();
                                                                    }
                                                                }
                                                                
                                                                if ($record) {
                                                                    $fee = ($record->fee);
                                                                }else{
                                                                    $fee = ($course->weeksrange_fees->first()->fee);
                                                                }
                                                                @endphp

                                                            @else
                                                            @php $fee = 0 @endphp
                                                            @endif


                                                            @if($course->materialFeeType_id == 3)
                                                                @if($course->weeksrangematerial_fees->count())
                                                                    @if($materialFeeRecord = $course->weeksrangematerial_fees->where('fromWeek', '<=', $weeks)->where('toWeek', '>=', $weeks)->first())
                                                                        @php $materialFee = $materialFeeRecord->fee @endphp
                                                                        @php $materialFeeId = $materialFeeRecord->id @endphp
                                                                    @else
                                                                        @php $materialFee = '0' @endphp
                                                                        @php $materialFeeId = '0' @endphp
                                                                    @endif
                                                                @else
                                                                    @php $materialFee = '0' @endphp
                                                                    @php $materialFeeId = '0' @endphp
                                                                @endif
                                                            @elseif($course->materialFeeType_id == 2)
                                                                @php $materialFee = $course->materialFeeAmount*$weeks @endphp
                                                                @php $materialFeeId = 0 @endphp
                                                            @else
                                                                @php $materialFee = $course->materialFeeAmount @endphp
                                                                @php $materialFeeId = 0 @endphp
                                                            @endif
                                                        <div class="card card-body mb-15 courseSection" 
                                                            data-course="{{$course->id}}" 
                                                            data-course-title="{{get_default_lang() == 'ar' ? $course->titleAr : $course->titleEn}}" 
                                                            data-course-lesson="{{$course->lessonsPerWeek}}" 
                                                            data-course-hour="{{$course->hoursPerWeek}}"
                                                            data-course-fee="{{$fee}}"
                                                            data-course-materialFee="{{$materialFee}}"
                                                            data-course-materialFeeId="{{$materialFeeId}}"
                                                            data-course-materialFeeType="{{$course->materialFeeType_id}}"
                                                            data-course-courierFees="{{$course->courierFees}}"
                                                            data-course-visaTitle="{{$visa['visaTitle']}}"
                                                            data-course-visaFee="{{$visa['visa']}}">
                                                            <div class="row coursesData" id="coursesData">
                                                                <div class="col-md-3 col-6">
                                                                    <p class="mb-0">Course Name</p>
                                                                    <p class="text-primary mb-10 name">{{ get_default_lang() == 'ar' ? $course->titleAr : $course->titleEn }}</p>
                                                                </div>
                                                                <div class="col-md-3 col-6">
                                                                    <p class="mb-0">Hours / week</p>
                                                                    <p class="text-primary mb-10 hoursPerWeek">{{ $course->hoursPerWeek }} Hour / Week</p>
                                                                </div>
                                                                <div class="col-md-3 col-6">
                                                                    <p class="mb-0">Lessons / Week</p>
                                                                    <p class="text-primary mb-10 lessonsPerWeek">{{ $course->lessonsPerWeek }} Lesson / Week</p>
                                                                </div>
                                                                <div class="col-md-3 col-6">
                                                                    <p class="mb-0">Minimum Week</p>
                                                                    <p class="text-primary mb-10 minWeeks">{{ $course->minBookingWeeks }} Weeks</p>
                                                                </div>
                                                                <div class="col-md-3 col-6">
                                                                    <p class="mb-0">Class Capacity</p>
                                                                    <p class="text-primary mb-10 classCapacity">{{ $course->maxStudents }} Student</p>
                                                                </div>
                                                                <div class="col-md-3 col-6">
                                                                    <p class="mb-0">Minimum Age</p>
                                                                    <p class="text-primary mb-10 minAge">{{ $course->minAge }} Years</p>
                                                                </div>
                                                                <div class="col-md-3 col-6">
                                                                    <p class="mb-0">Required Level</p>
                                                                    <p class="text-primary mb-10 level">{{ get_default_lang() == 'ar' ? $course->level->titleAr : $course->level->titleEn }}</p>
                                                                </div>
                                                                <div class="col-md-3 col-6">
                                                                    <p class="mb-0">Course Fee</p>
                                                                    <p class="text-primary mb-10 fee"> {{$fee}}</p>
                                                                </div>
                                                                <div class="col-12">
                                                                    <a href="#" class="btn btn-secondary btn-block btn-sm mt-3 selectCourseBtn">Select this</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        @endforeach
                                                    @endif
                                                @else
                                                @php $fee = 0; @endphp
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mb-50"></div>

                            <button class="btn btn-info btn-block btn-close">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>








<!-- start Main Wrapper -->
<div class="main-wrapper scrollspy-container">

    <section class="page-wrapper page-detail">

        <div class="page-title bg-light">

            <div class="container">

                <div class="row gap-15 align-items-center">

                    <div class="col-12 col-md-7">

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('messages.school details') }}</li>
                            </ol>
                        </nav>

                    </div>

                </div>

            </div>

        </div>


        <div class="container pt-30">
            <div class="row gap-20 gap-lg-40 side-fixed">

                <div class="col-12 col-lg-4">
                    <aside class="sticky-kit-02 sidebar-wrapper no-border mt-20 mt-lg-0">
                        <form id="SearchForm" method="POST" action="{{ route('booking') }}">
                            @csrf

                            <input type="hidden" name="course" value="{{$course_->id}}" id="courseInput">
                            <input type="hidden" name="courseFeeInput" value="{{$courseFee? $courseFee : 0}}" id="courseFeeInput">
                            <input type="hidden" name="school" value="{{$school->id}}" id="schoolInput">
                            <input type="hidden" name="registrationFee" value="{{$school->registrationFee}}" id="registrationFee">
                            
                            <input type="hidden" name="courierFee" value="{{$course_->courierFees}}" id="courierFee">

                            <input type="hidden" name="accommodation" value="" id="accommodationInput">
                            <input type="hidden" name="accommodationFee" value="" id="accommodationFeeInput"> <!-- record -->
                            <input type="hidden" name="accommodationBookinFee" value="" id="accommodationBookinFee">
                            <input type="hidden" name="accommodationOptionPrice" value="" id="accommodationOptionPrice">
                            <input type="hidden" name="accommodationTitle" value="" id="accommodationTitle">

                            <input type="hidden" name="airportPickUpPrice" value="" id="airportPickUpPrice">
                            <input type="hidden" name="airportPickUpTitle" value="" id="airportPickUpTitle">
                            <input type="hidden" name="airportPickUpType" value="" id="airportPickUpType">
                            <input type="hidden" name="airportPickUpId" value="" id="airportPickUpId">

                            <input type="hidden" name="insurancePrice" value="" id="insurancePrice">
                            <input type="hidden" name="insuranceTitle" value="" id="insuranceTitle">
                            <input type="hidden" name="insuranceId" value="" id="insuranceId">

                            <input type="hidden" name="visaTitle" value="{{$visa['visaTitle']?$visa['visaTitle']:''}}" id="visaTitle">
                            <input type="hidden" name="visa" value="{{$visa['visa']?$visa['visa']:''}}" id="visa">
                            <input type="hidden" name="visaStatus" value="" id="visaStatus">
                            <input type="hidden" name="visaId" value="{{$visa['visaId']?$visa['visaId']:''}}" id="visaId">

                            <input type="hidden" name="materialFee" value="{{$courseMaterialFee['materialFee']?$courseMaterialFee['materialFee']:''}}" id="materialFee">
                            <input type="hidden" name="materialFeeId" value="{{$courseMaterialFee['materialFeeId']?$courseMaterialFee['materialFeeId']:''}}" id="materialFeeId">
                            <input type="hidden" name="materialFeeType" value="{{$courseMaterialFee['materialFeeType']?$courseMaterialFee['materialFeeType']:''}}" id="materialFeeType">
                            
                            <input type="hidden" name="accommodationMaxWeeksInput" value="48" id="accommodationMaxWeeksInput">
                            <input type="hidden" name="accommodationPrice" value="" id="accommodationInputPrice">

                            <input type="hidden" name="total" value="0" id="totalInput">
                            <input type="hidden" name="promotionsInput" value="" id="promotionsInput">

                            <input type="hidden" name="extra_weeks_promotion" value="" id="extra_weeks_promotion">
                            <input type="hidden" name="extra_weeks_promotionTitleEn" value="" id="extra_weeks_promotionTitleEn">
                            <input type="hidden" name="extra_weeks_promotionTitleAr" value="" id="extra_weeks_promotionTitleAr">
                            <input type="hidden" name="discount_weeks_promotion" value="" id="discount_weeks_promotion">
                            <input type="hidden" name="discount_weeks_promotionTitleEn" value="" id="discount_weeks_promotionTitleEn">
                            <input type="hidden" name="discount_weeks_promotionTitleAr" value="" id="discount_weeks_promotionTitleAr">

                            <div class="booking-box">
                                <div class="box-heading">
                                    <h3 class="h6 text-white text-uppercase">{{ __('messages.make a booking') }}</h3>
                                </div>

                                <div class="box-content">
                                    <h4 class="line-125 choosen-date mt-3" id="coursesTypesBtn">
                                        <i class="fab fa-leanpub book-size"></i> 
                                        <span class="courseName">{{ get_default_lang() == 'ar' ? $course_->titleAr : $course_->titleEn }}</span> 
                                        <small class="d-block"> 
                                            {{ __('messages.hour') }} (<span class="courseHour">{{ $course_->hoursPerWeek }}</span>) /  
                                            {{ __('messages.lesson') }} (<span class="courseLesson">{{ $course_->lessonsPerWeek }}</span>)
                                            <a href="#" class="anchor font10  d-block text-uppercase h6 text-primary mt-5 {{ get_default_lang() == 'ar' ? 'float-left pr-40' : 'float-right pl-40' }}" data-toggle="modal" data-target="#coursesTypes">{{ __('messages.change') }}</a>
                                        </small>
                                    </h4>

                                    <div class="form-group form-spin-group border-top mt-30 pt-10 position-relative">
                                        <label class="h6 font-sm">{{ __('messages.course start date') }}</label>
                                        <input id="id_start_date" name="start_date" type="text" class="form-control form-control-sm bg-white"
                                        value="{{isset($start_date) ? $start_date : '' }}" placeholder="{{ __('messages.select date') }}" readonly>
                                        <aside class="lingo-dateWidget is-floating bg-white u-boxShadow-pop mt-10" data-show="none">
                                            <template>
                                                <div class="px-1 pb-2 col-6">
                                                    <button type="button" class="btn btn-primary w-100"></button>
                                                </div>
                                                <div class="px-1 pb-2 col-12">
                                                    <button type="button" class="btn btn-primary w-100"></button>
                                                </div>
                                            </template>
                                            <div class="row no-gutters" data-pane="month"></div>
                                            <div class="row no-gutters" data-pane="date"></div>
                                        </aside>
                                    </div>

                                    <div class="form-group form-spin-group border-top mt-15 pt-10">
                                        <label class="h6 font-sm">{{ __('messages.course duration') }}</label>
                                        <select class="form-control touch-spin-03" name="weeks" id="weeks">
                                            @for($i = 1; $i <= 48; $i++)
                                                <option value="{{$i}}"  {{ ($weeks) == $i ? 'selected' : '' }} >{{$i}} {{ $i > 1 ? __('messages.search_box.Weeks') : __('messages.search_box.Week')  }}</option> 
                                            @endfor
                                        </select>
                                    </div>

                                    <div class="form-group form-spin-group border-top mt-15 pt-10">
                                        <label class="h6 font-sm">{{ __('messages.accommodation options') }}</label>

                                        <!-- <div class="dropdown">
                                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Dropdown button
                                          </button>
                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                          </div>
                                        </div> -->

                                        <select class="form-control touch-spin-03" id="accommodation">
                                            <option value="0">{{ __('messages.i don\'t need accommodation') }}</option>
                                            <!-- @foreach($accommodationAges as $accommodationAge) -->
                                            <!-- <option value="{{$accommodationAge}}">{{ $accommodationAge }}</option> -->
                                            <!-- @endforeach -->
                                            @php
                                            if($search = \Session::get('search')){
                                                $age = array_key_exists('age', $search) ?? 0;
                                            }else{
                                                $age = 0;
                                            }
                                            @endphp
                                            <option 
                                                data-toggle="modal" data-target="#accommodation-16-modal"
                                                value="16" {{ ($age??'') == 16 ? 'selected' : '' }}
                                                >{{ get_default_lang() == 'ar' ? 'عمر ' . '16' . ' سنة' : '16' . ' Years Old' }}</option>
                                            <option 
                                                data-toggle="modal" data-target="#accommodation-16-modal"
                                                value="17" {{ ($age??'') == 17 ? 'selected' : '' }}
                                                >{{ get_default_lang() == 'ar' ? 'عمر ' . '17' . ' سنة' : '17' . ' Years Old' }}</option>
                                            <option 
                                                data-toggle="modal" data-target="#accommodation-16-modal"
                                                value="18" {{ ($age??'') == 18 ? 'selected' : '' }}
                                                >{{ get_default_lang() == 'ar' ? 'عمر ' . '18' . ' سنة' : '18' . ' Years Old' }}</option>
                                            <option 
                                                data-toggle="modal" data-target="#accommodation-16-modal"
                                                value="19" {{ ($age??'') == 19 ? 'selected' : '' }}
                                                >{{ get_default_lang() == 'ar' ? 'أكثر من ' . '19' . ' سنة' : 'Over ' . '19' . ' Years Old' }}</option>

                                        </select>

                                    </div>
                                    <div class="form-group form-spin-group border-top mt-15 pt-10 " id="accommodationWeeksSection" style="display: none;">
                                        <label class="h6 font-sm">{{ __('messages.accommodation duration') }}</label>
                                        <select class="form-control touch-spin-03" name="accommodationWeeks" id="accommodationWeeks" min="1" max="{{$weeks}}" data-accommodation-duration="1" data-accommodation-fee="" data-week-identifier="{{ __('messages.week') }}" data-weeks-identifier="{{ __('messages.weeks') }}">
                                            <option value="1">1 {{ __('messages.week') }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group form-spin-group border-top mt-15 pt-10">
                                        <label class="h6 font-sm">{{ __('messages.airport pick-up') }}</label>
                                        <select class="form-control touch-spin-03" name="airportPickUp" id="airportPickUp">
                                            <option value=""> {{ __('messages.i don\'t need airport pick-up') }}</option>
                                            @foreach($airportPickUps as $airportPickUp)
                                                <option 
                                                    data-airportPickUpId="{{$airportPickUp->id}}" 
                                                    data-airportPickUpType="1"
                                                    data-airportPickUpTitle="{{get_default_lang() == 'ar' ? $airportPickUp->titleAr : $airportPickUp->titleEn}}"
                                                    value="{{ $airportPickUp->oneWay }}">{{ get_default_lang() == 'ar' ? $airportPickUp-> titleAr : $airportPickUp-> titleEn }} - {{ __('messages.one way') }} - {{ $airportPickUp->oneWay }} {{ __('messages.usd') }}
                                                </option>
                                                <option 
                                                    data-airportPickUpId="{{$airportPickUp->id}}" 
                                                    data-airportPickUpType="2"
                                                    data-airportPickUpTitle="{{get_default_lang() == 'ar' ? $airportPickUp->titleAr : $airportPickUp->titleEn}}"
                                                    value="{{ $airportPickUp->roundWay }}">{{ get_default_lang() == 'ar' ? $airportPickUp-> titleAr : $airportPickUp-> titleEn }} - {{ __('messages.round ways') }} - {{ $airportPickUp->roundWay }} {{ __('messages.usd') }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group form-spin-group border-top mt-15 pt-10">
                                        <label class="h6 font-sm">{{ __('messages.health insurance') }}</label>
                                        <div id="insuranceContainer">
                                            <select class="form-control touch-spin-03" name="insurance" id="insurance">
                                                <option value="" selected>{{ __('messages.i don\'t need health insurance') }}</option>
                                                @foreach($insurances as $insurance)
                                                <option data-insuranceId="{{$insurance->id}}" data-insuranceTitle="{{get_default_lang() == 'ar' ? $insurance->titleAr : $insurance->titleEn}}"
                                                    value="{{$insurance->fee}}">{{ get_default_lang() == 'ar' ? $insurance->titleAr : $insurance->titleEn }} - <span class="ifee">{{$insurance->fee*$weeks}}</span> {{ __('messages.usd') }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="custom-control custom-checkbox mt-10">
                                            <input type="checkbox" class="custom-control-input" id="checkbox" name="visaInput" {{ $visa['visa'] == 0 ? 'disabled' : '' }}>
                                            <label class="custom-control-label line-145" for="checkbox" > {{ __('messages.i need visa') }} - <a href="blank_page2.html" target="_blank">{{ __('messages.do i need visa ?') }}</a></label>
                                        </div>
                                    </div>

                                    <ul class="border-top mt-20 pt-15">
                                        <li class="clearfix">
                                            <span class="courseName">{{ get_default_lang() == 'ar' ? $course_->titleAr : $course_->titleEn }}</span>
                                            <span class=" {{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                                $<span class="courseFee">{{$courseFee?$courseFee*$weeks:0}}</span>
                                            </span></li>
                                        <li class="clearfix">
                                            <span>{{ __('messages.registration fee') }}</span>
                                            <span class=" {{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                                $<span class="registrationFee">{{$school->registrationFee}}</span>
                                            </span></li>
                                        <li class="clearfix" {{ $courseMaterialFee ? '' : 'style="display: none"' }} >{{ __('messages.material fee') }}<span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                            $<span class="materialFee">{{$courseMaterialFee['materialFee'] ? $courseMaterialFee['materialFee'] : '0.00'}}</span>
                                        </span></li>
                                        <li class="clearfix" {{ $course_->courierFees ? '' : 'style="display: none"' }}> {{ __('messages.courier fee') }} <span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                            $<span class="courierFees">{{$course_->courierFees}}</span></span></li>
                                        <li class="clearfix" style="display: none">
                                            <span class="accommodationName">{{ __('messages.accommodation booking fee') }} </span>
                                            <span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">$<span class="accommodationBookingFee">0.00</span></span>
                                        </li>
                                        <li class="clearfix" style="display: none">
                                            <span class="accommodationTitle">{{ __('messages.accommodation') }} </span>
                                            <span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">$<span class="accommodationPrice">0.00</span></span>
                                        </li>
                                        <li class="clearfix" style="display: none"><span class="airportPickUpTitle"> {{ __('messages.airport pick-up') }}</span>
                                            <span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                                $<span class="airportPickUp">0.00</span>
                                            </span>
                                        </li>
                                        <li class="clearfix" style="display: none"><span class="insuranceTitle"> {{ __('messages.insurance') }}</span>
                                            <span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                                $<span class="insurance">0.00</span>
                                            </span>
                                        </li>
                                        <!-- <li class="clearfix">Regestration<span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">$0.00</span></li> -->
                                        <li class="clearfix" style="display: none">
                                            <span class="visaTitle">{{ __('messages.visa') }}</span>
                                            <span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                            $<span class="visa">0.00</span></span></li>
                                        <!-- <li class="clearfix"
                                            @if(!((isset($schoolPromotion['discount']) && $schoolPromotion['discount']) || (isset($schoolPromotion['percentage']) && $schoolPromotion['percentage'])))
                                            style="display: none"
                                            @endif
                                            >promotion<span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                            $<span class="promotion">
                                                @if (isset($schoolPromotion['discount']) && $schoolPromotion['discount'])
                                                    @if (isset($schoolPromotion['percentage']) && $schoolPromotion['percentage'])
                                                        {{$schoolPromotion['amount']}} % -
                                                    @elseif(isset($schoolPromotion['monetary']) && $schoolPromotion['monetary'])
                                                        {{$multiPromotionAmount}} -
                                                    @endif
                                                @else
                                                    @if (isset($schoolPromotion['percentage']) && $schoolPromotion['percentage'])
                                                        {{$schoolPromotion['amount']}} % +
                                                    @elseif(isset($schoolPromotion['monetary']) && $schoolPromotion['monetary'])
                                                        {{$schoolPromotion['amount']}} +
                                                    @endif
                                                @endif
                                            </span>
                                        </span></li> -->

                                        
                                        <!-- to be cloned -->
                                        <li class="clearfix promotion_item" id="promotion_item" data-promotion-type data-promotion-title data-promotion-value="" style="display: none;">
                                            <span class="promotionTitle">Title</span>
                                            <span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                                <span class="promotionValue">value</span>
                                            </span>
                                        </li>

                                        <li class="clearfix weeks_promotion_item" id="weeks_promotion_item" data-promotion-type data-promotion-title data-promotion-value="" style="display: none;">
                                            <span class="promotionTitle">Title</span>
                                            <span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                                <span class="promotionValue">0.00</span>
                                            </span>
                                        </li>
                                        

                                        <li class="clearfix">
                                            <ul class="promotions">
                                            </ul>
                                        </li>

                                        <li class="clearfix">
                                            <ul class="weeks_promotions">
                                            </ul>
                                        </li>

                                        <li class="clearfix border-top font700">
                                            <div class="border-top mt-1">
                                                <span>{{ __('messages.total') }}</span><span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }} text-dark">$<span class="total" id="total">0.00</span></span>
                                            </div>
                                        </li>
                                    </ul>

                                    <p class="text-right font-sm">{{ __('messages.no charges will apply') }}</p>

                                    <a href="payment.html">

                                        <button class="btn btn-primary btn-block">{{ __('messages.instant free booking') }}</button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </aside>
                </div>

                <div class="col-12 col-lg-8">
                    <div class="content-wrapper">
                        <div id="detail-content-sticky-nav-01" class="detail-header mb-30">
                            <h1 class="hrsize">{{ get_default_lang() == 'ar' ? $school->titleAr : $school->titleEn }}</h1>

                            <div class="d-flex flex-column flex-sm-row align-items-sm-center mb-20">
                                <div class="mr-15 font-lg">
                                    {{ __('messages.school destination') }}: <a href="#"><i class="elegent-icon-pin_alt text-warning"></i> {{ get_default_lang() == 'ar' ? $school->country->titleAr : $school->country->titleEn }},</a> <a href="#">
                                        {{ get_default_lang() == 'ar' ? $school->city->titleAr : $school->city->titleEn }}</a>
                                </div>
                                <div>
                                    <div class="rating-item rating-inline">
                                        <div class="rating-icons">
                                            <input type="hidden" class="rating" data-filled="rating-icon ri-star rating-rated" data-empty="rating-icon ri-star-empty" data-fractions="2" data-readonly value="{{ $school->rating }}" />
                                        </div>
                                        <!-- <p class="rating-text font600 text-muted font-12 letter-spacing-1"><span class="text-dark mr-3">4.5/5</span> 26 reviews</p> -->
                                    </div>
                                </div>
                            </div>

                            <div class="slick-gallery-slideshow detail-gallery mt-20 mb-40">

                                <div class="slider gallery-slideshow" dir="ltr">
                                    @foreach($school->images as $file )
                                    <div>
                                        <div class="sc-AxjAm bcMPWxx absolute br--right br1 f88 flex items-center pl11 pr22 z-11 top-11 bg-red white"><svg xmlns="http://www.w3.org/2000/svg" id="" width="22" height="16" class="mr1 fill-white" viewBox="13 15 15 15"><path d="M16.835 21.67a2.823 2.823 0 0 0 2.835-2.835A2.823 2.823 0 0 0 16.835 16 2.823 2.823 0 0 0 14 18.835a2.846 2.846 0 0 0 2.835 2.835zm0-3.815c.525 0 .945.42.945.945 0 .525-.42.945-.945.945a.941.941 0 0 1-.945-.945c0-.525.42-.945.945-.945zM24.115 23.21a2.823 2.823 0 0 0-2.835 2.835 2.823 2.823 0 0 0 2.835 2.835 2.823 2.823 0 0 0 2.835-2.835 2.846 2.846 0 0 0-2.835-2.835zm0 3.815a.941.941 0 0 1-.945-.945c0-.525.42-.945.945-.945.525 0 .945.42.945.945 0 .525-.42.945-.945.945zM25.865 17.05c-.385-.385-.98-.385-1.33 0l-9.45 9.415c-.385.385-.385.98 0 1.33.175.175.42.28.665.28.245 0 .49-.105.665-.28l9.415-9.415c.385-.35.385-.945.035-1.33z"></path></svg>20 Discount
                                        </div>
                                        <div class="image"><img src="{{ asset('/Schools/photos/' . $file->file) }}" alt="Images" /></div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="slider gallery-nav">
                                    @foreach($school->images as $file )
                                    <div>
                                        <div class="image"><img src="{{ asset('/Schools/photos/' . $file->file) }}" alt="Images" /></div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>



                            <div class="mb-30"></div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="img border pr-20 pl-20 pt-20 pb-20"><img src="{{ asset('/Schools/Logo/' . $school->logo) }}"></div>
                                </div>
                                <div class="col-md-8">
                                    <h6>{{ get_default_lang() == 'ar' ? $school->titleAr : $school->titleEn }}</h6>

                                    <p class="desc-text">
                                        {!! get_default_lang() == 'ar' ? nl2br(e($school->content->shortDescriptionAr)) : nl2br(e($school->content->shortDescriptionEn)) !!}
                                    </p>
                                    <a href="#" class="btn btn-primary btn-block more-desc">About the school</a>


                                </div>
                            </div>

                            <div class="mb-30"></div>

                            <h4 class="mt-30 heading-title">{{ __('messages.accreditation') }}</h4>
                            <div class="logos accreditation">
                                <div class="row">
                                    <div class="col img-dep" style="max-height: 48px">
                                    @foreach($school->accreditations as $accreditation)
                                        <img src="{{ asset('Schools/accreditations/' . $accreditation->logo) }}">
                                    @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="mb-30"></div>

                            <div>
                                <!-- list-icon-data-attr font-ionicons -->
                                @if( (get_default_lang() == 'ar' && $school->content->headingAr) ||  (get_default_lang() != 'ar' && $school->content->headingEn))
                                <h4 class="mt-30 heading-title">{{ get_default_lang() == 'ar' ? $school->content->headingAr : $school->content->headingEn }}</h4>
                                {!! get_default_lang() == 'ar' ? $school->content->descriptionAr : $school->content->descriptionEn !!}
                                @endif
                            </div>

                        </div>


                        <div id="detail-content-sticky-nav-03" class="fullwidth-horizon-sticky-section">

                            <h4 class="heading-title">{{ __('messages.map') }}</h4>

                            <div class="map-box mt-40">
                                
                                <iframe class="map-iframe" src="https://www.google.com/maps?q={{ $school->latitude . ',' . $school->longitude }}&hl=en&z=14&amp;output=embed"
                                    style="border:0;" aria-hidden="false" tabindex="0"></iframe>
                            </div>

                            <div class="mb-50"></div>

                        </div>



                        <div id="detail-content-sticky-nav-05" class="fullwidth-horizon-sticky-section">

                            <h4 class="heading-title cityh">{{ __('messages.city') }}</h4>
                            <h6 class="hmobile mt-20"><img src="{{ asset('pages/schoolpage/world2.svg') }}" class="d-inline-block align-middle" style="width: 30px;"> 
                                {{ __('messages.city name') }} | {{ get_default_lang() == 'ar' ? $school->city->titleAr : $school->city->titleEn }}
                            </h6><br>
                            <h6 class="hmobile"><img src="{{ asset('pages/schoolpage/size-medium.svg') }}" class="d-inline-block align-middle" style="width: 30px;"> 
                                {{ __('messages.population') }}: {{ $school->city->population }}
                            </h6>

                            <div class="mb-20"></div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="slick-gallery-slideshow detail-gallery mt-20 mb-40">
                                        <div class="slider gallery-slideshow" dir="ltr">
                                            @foreach($school->city->files->where('type', 1) as $file)
                                            <div>
                                                <div class="image"><img src="{{ asset('imageCities/' . $file->file) }}" alt="Images" /></div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h6 class="hdesktop"><img src="{{ asset('pages/schoolpage/world2.svg') }}" class="d-inline-block align-middle" style="width: 30px;"> 
                                        {{ __('messages.city name') }} | {{ get_default_lang() == 'ar' ? $school->city->titleAr : $school->city->titleEn }}
                                    </h6>
                                    <h6 class="hdesktop"><img src="{{ asset('pages/schoolpage/size-medium.svg') }}" class="d-inline-block align-middle" style="width: 30px;"> 
                                        {{ __('messages.population') }}: {{ $school->city->population }}
                                    </h6>
                                    <p>
                                        {!! get_default_lang() == 'ar' ? $school->city->contentAr : $school->city->contentEn !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--  -->

        <!-- <div class="collapse mt-40" id="collapseExample3">
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-3 col-6">
                        <p class="mb-0">Name</p>
                        <p class="text-primary mb-10">Accommodation</p>
                    </div>
                    <div class="col-md-3 col-6">
                        <p class="mb-0">Type of Accommodation</p>
                        <p class="text-primary mb-10">Type of Accomm</p>
                    </div>
                    <div class="col-md-3 col-6">
                        <p class="mb-0">Facilities</p>
                        <p class="text-primary mb-10">Facilities</p>
                    </div>
                    <div class="col-md-3 col-6">
                        <p class="mb-0">Type of Meals</p>
                        <p class="text-primary mb-10">Type of Meals</p>
                    </div>
                    <div class="col-md-3 col-6">
                        <p class="mb-0">Extra</p>
                        <p class="text-primary mb-10">Extra</p>
                    </div>
                    <div class="col-md-3 col-6">
                        <p class="mb-0">Minimum Weeks</p>
                        <p class="text-primary mb-10">04</p>
                    </div>
                    <div class="col-md-3 col-6">
                        <p class="mb-0">Minimum Age</p>
                        <p class="text-primary mb-10">20</p>
                    </div>
                    <div class="col-md-3 col-6">
                        <p class="mb-0">Price</p>
                        <p class="text-primary mb-10">$20</p>
                    </div>
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary btn-block btn-sm mt-3">Select this</a>
                    </div>
                </div>
            </div>
        </div> -->
</div>
</div>
</section>

</div>
<!-- end Main Wrapper -->


<!-- accommodation modals -->
<!-- 16 -->

@for($i=16; $i<20; $i++)
<div class="accommodation-modal pt-30" id="accommodation-{{$i}}-modal-div">
    <div class="container contai-padd">
        <div class="modal-dialog modal-mobs" id="accommodation-{{$i}}-modal" role="document" style="max-width: 70%; margin: 5rem auto;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Label-{{$i}}">{{ __('messages.choose your accommodation') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="fullwidth-section">

                            <div class="mb-20"></div>
                            <nav>
                                <div class="nav nav-tabs grid-change" id="nav-tab-{{$i}}" role="tablist">

                                    @foreach($accommodationTypes as $accommodationType)
                                    <a id="nav-{{$accommodationType->slugEn}}-{{$i}}-tabs"  role="tab" aria-controls="nav-{{$accommodationType->slugEn}}-{{$i}}" aria-selected="true"
                                        class="nav-item nav-link link-drop-ms btn btn-primary" 
                                        data-toggle="tab" 
                                        href="#nav-{{$accommodationType->slugEn}}-{{$i}}" >
                                        {{ get_default_lang() == 'ar' ? $accommodationType->titleAr : $accommodationType->titleEn }}
                                    </a>
                                    @endforeach
                                </div>
                            </nav>

                            <div class="loader-acc-{{$i}}">
                                <div class="tab-content ajax-load-{{$i}}" id="nav-tabContent-{{$i}}">
                                    @foreach($accommodationTypes as $accommodationType)
                                    <div class="tab-pane fade show" id="nav-{{$accommodationType->slugEn}}-{{$i}}" role="tabpanel" aria-labelledby="nav-{{$accommodationType->slugEn}}-{{$i}}-tabs">
                                        <div class="collapsej  mt-40">
                                            @if($accommodationType->accommodations->count() && $accommodationType->accommodations->where('school_id', $school->id))
                                            @foreach($accommodationType->accommodations->where('school_id', $school->id) as $accommodation )
                                            @if ($accommodationOptions = $accommodation->accommodationOptions->where('accommodationAge', '<=', $i)->where('minimumNumberOfWeeksToBook', '<=', $weeks))
                                            @foreach($accommodationOptions as $accommodationOption)
                                                @php $accommodationFees = $accommodationOption->feeWeeksOptions->where('fromWeek', "<=", $weeks)->where('toWeek', ">=", $weeks) @endphp
                                                @if($accommodationFees->count())
                                                @foreach($accommodationFees as $accommodationFee)
                                                <div class="card card-body padd-homes accommodationSection"
                                                    data-accommodationOption={{$accommodationOption->id}}
                                                    data-accommodationTitle="{{get_default_lang() == 'ar' ? $accommodationOption->accommodation->titleAr : $accommodationOption->accommodation->titleEn}}"
                                                    data-accommodationFee={{$accommodationFee->id}}
                                                    data-accommodationOption-price={{$accommodationFee->fee}}
                                                    data-accommodationOption-minWeeks={{$accommodationOption->minimumNumberOfWeeksToBook}}
                                                    data-accommodation-bookingFee={{$accommodation->bookingFee}}>
                                                    <div class="row ">
                                                        <div class="col-md-3 col-6">
                                                            <p class="mb-0">{{ __('messages.accommodation name') }}</p>
                                                            <p class="text-primary mb-10">
                                                                {{ get_default_lang() == 'ar' ? $accommodation->titleAr : $accommodation->titleEn }}
                                                            </p>
                                                        </div>
                                                        <div class="col-md-3 col-6">
                                                            <p class="mb-0">{{ __('messages.room type') }}</p>
                                                            <p class="text-primary mb-10">
                                                                {{ $accommodationOption->roomType ? (get_default_lang() == 'ar' ? $accommodationOption->roomType->titleAr : $accommodationOption->roomType->titleEn) : null }}
                                                            </p>
                                                        </div>
                                                        <div class="col-md-3 col-6">
                                                            <p class="mb-0">{{ __('messages.facilities') }}</p>
                                                            <p class="text-primary mb-10">
                                                                {{ $accommodationOption->facilitie ? (get_default_lang() == 'ar' ? $accommodationOption->facilitie->titleAr : $accommodationOption->facilitie->titleEn) : null }}
                                                            </p>
                                                        </div>
                                                        <div class="col-md-3 col-6">
                                                            <p class="mb-0">{{ __('messages.type of meals') }}</p>
                                                            <p class="text-primary mb-10">
                                                                {{ $accommodationOption->mealType ? (get_default_lang() == 'ar' ? $accommodationOption->mealType->titleAr : $accommodationOption->mealType->titleEn) : null }}
                                                            </p>
                                                        </div>
                                                        <div class="col-md-3 col-6">
                                                            <p class="mb-0">{{ __('messages.supplement') }}</p>
                                                            <p class="text-primary mb-10">
                                                                {{ get_default_lang() == 'ar' ? $accommodationOption->supplementAr : $accommodationOption->supplement }}
                                                            </p>
                                                        </div>
                                                        <div class="col-md-3 col-6">
                                                            <p class="mb-0">{{ __('messages.minimum weeks') }}</p>
                                                            <p class="text-primary mb-10">
                                                                {{ $accommodationOption->minimumNumberOfWeeksToBook ?? null }}
                                                            </p>
                                                        </div>
                                                        <div class="col-md-3 col-6">
                                                            <p class="mb-0">{{ __('messages.minimum age') }}</p>
                                                            <p class="text-primary mb-10">
                                                                {{ $accommodationOption->accommodationAge ?? null }} {{ __('messages.years') }}
                                                            </p>
                                                        </div>
                                                        <div class="col-md-3 col-6">
                                                            <p class="mb-0">{{ __('messages.price') }}</p>
                                                            <p class="text-primary mb-10">
                                                                {{ $accommodationFee->fee ?? null }} {{ __('messages.per week') }}
                                                            </p>
                                                        </div>
                                                        <div class="col-12">
                                                            <a href="#" class="btn btn-secondary btn-block btn-sm mt-3 selectAccommodation">{{ __('messages.select this') }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @endif
                                            @endforeach
                                            @endif
                                            @endforeach
                                            @else
                                            nothing
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="mt-50"></div>
                    <button class="btn btn-info btn-block btn-reset">{{ __('messages.i don\'t need accommodation') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endfor


@endsection


@section('script')
    <script type="text/javascript">
        var data;

        setVisa = function () {
            let visaTitle = $("form#SearchForm").find('#visaTitle').val();
            let visa = $("form#SearchForm").find('#visa').val();

            if (visa != 0) {
                $('input#checkbox[name=visa]').removeAttr('disabled')
            }else{
                $('input#checkbox[name=visa]').removeAttr('checked').attr('disabled','disabled')
                $('.visaTitle').text('Visa')
                $('.visa').text('0.00').closest('li').css('display', 'none')
            }

            let visaCheck = $('#checkbox').is(':checked');
            if(visaCheck){
                $('form#SearchForm').find('#visaStatus').val(1);
                $('.visaTitle').text(visaTitle)
                $('.visa').text(visa).closest('li').css('display', 'block')
            }else{
                $('form#SearchForm').find('#visaStatus').val(0);
                $('.visaTitle').text('Visa')
                $('.visa').text('0.00').closest('li').css('display', 'none')
            }

            $("form#SearchForm").find('#visa').val(visa)
        }

        setPromotion = function (response) {
            $('.promotions').html("")
            $('.weeks_promotions').html("")
            let course_promotion = false;
            let school_promotion = false;
            let accommodation_promotion = false;
            let extra_weeks_promotion = false;
            let discount_weeks_promotion = false;
            
            if (response) {
                if (course_values = response.course_values.length) {
                    for (var i = 0; i < course_values; i++) {
                        if (response.course_values[i].amount > 0) {
                            let sign = response.course_values[i].discount ? '-' : '+';
                            let item = $('#promotion_item').clone().attr('id', '')
                            let weeks = $("#weeks").val();
                            let titleEn = response.course_values[i].titleEn;
                            let titleAr = response.course_values[i].titleAr;
                            
                            let value = sign + Math.abs((response.course_values[i].fee * weeks) - response.course_values[i].value);
                            // console.log(value)
                            item.attr('data-promotion-value', value);
                            item.attr('data-promotion-title', @if(get_default_lang() == 'ar') titleAr @else titleEn @endif);
                            item.attr('data-promotion-type', 'course');
                            item.css('display', 'block');
                            item.find('.promotionTitle').text(@if(get_default_lang() == 'ar') titleAr @else titleEn @endif);
                            item.find('.promotionValue').text(value);
                            item.appendTo($('.promotions'));
                            course_promotion = course_promotion ? true : (response.course_values[i].amount ? true : false);
                        }
                    }
                }

                if (school_values = response.school_values.length) {
                    for (var i = 0; i < school_values; i++) {
                        if (response.school_values[i].amount > 0) {
                            let sign = response.school_values[i].discount ? '-' : '+';
                            let item = $('#promotion_item').clone().attr('id', '')
                            let weeks = $("#weeks").val();
                            let titleEn = response.school_values[i].titleEn;
                            let titleAr = response.school_values[i].titleAr;

                            let value = sign + Math.abs((response.school_values[i].fee) - response.school_values[i].value);
                            item.attr('data-promotion-value', value);
                            item.attr('data-promotion-title', @if(get_default_lang() == 'ar') titleAr @else titleEn @endif);
                            item.attr('data-promotion-type', 'school');
                            item.css('display', 'block');
                            item.find('.promotionTitle').text(@if(get_default_lang() == 'ar') titleAr @else titleEn @endif);
                            item.find('.promotionValue').text(value);
                            item.appendTo($('.promotions'));
                            school_promotion = school_promotion ? true : (response.school_values[i].amount ? true : false);
                        }
                    }
                }

                if (accommodation_values = response.accommodation_values.length) {
                    for (var i = 0; i < accommodation_values; i++) {
                        if (response.accommodation_values[i].amount > 0) {
                            let sign = response.accommodation_values[i].discount ? '-' : '+';
                            let item = $('#promotion_item').clone().attr('id', '');
                            let accommodationWeeks = $("#accommodationWeeks").val();
                            let titleEn = response.accommodation_values[i].titleEn;
                            let titleAr = response.accommodation_values[i].titleAr;
                            
                            let value = sign + Math.abs((response.accommodation_values[i].fee*accommodationWeeks) - response.accommodation_values[i].value);

                            item.attr('data-promotion-value', value);
                            item.attr('data-promotion-title', @if(get_default_lang() == 'ar') titleAr @else titleEn @endif);
                            item.attr('data-promotion-type', 'accommodation');
                            item.css('display', 'block');
                            item.find('.promotionTitle').text(@if(get_default_lang() == 'ar') titleAr @else titleEn @endif);
                            item.find('.promotionValue').text(value);
                            item.appendTo($('.promotions'));
                            accommodation_promotion = accommodation_promotion ? true : (response.accommodation_values[i].amount ? true : false);
                        }
                    }
                }

                if (extra_weeks_values = response.extra_weeks_values.length) {
                    for (var i = 0; i < extra_weeks_values; i++) {
                        if (response.extra_weeks_values[i].amount > 0) {
                            let item = $('#weeks_promotion_item').clone().attr('id', '');
                            let weeks = $("#weeks").val();
                            let amount = response.extra_weeks_values[i].amount;
                            let titleEn = response.extra_weeks_values[i].titleEn;
                            let titleAr = response.extra_weeks_values[i].titleAr;
                            let total_weeks = Number(weeks)+Number(amount);
                            
                            let value = (response.extra_weeks_values[i].fee*(amount));

                            item.attr('data-promotion-value', value);
                            item.attr('data-promotion-title', @if(get_default_lang() == 'ar') titleAr @else titleEn @endif);
                            item.attr('data-promotion-type', 'extra_weeks');
                            item.css('display', 'block');
                            item.find('.promotionTitle').text(@if(get_default_lang() == 'ar') titleAr @else titleEn @endif);
                            // item.find('.promotionValue').text(value);
                            item.appendTo($('.weeks_promotions'));

                            $('form#SearchForm').find('#extra_weeks_promotion').val(amount)
                            $('form#SearchForm').find('#extra_weeks_promotionTitleEn').val(titleEn)
                            $('form#SearchForm').find('#extra_weeks_promotionTitleAr').val(titleAr)
                            extra_weeks_promotion = extra_weeks_promotion ? true : (response.extra_weeks_values[i].amount ? true : false);
                        }
                    }
                }

                if (discount_weeks_values = response.discount_weeks_values.length) {
                    for (var i = 0; i < discount_weeks_values; i++) {
                        if (response.discount_weeks_values[i].amount > 0) {
                            let item = $('#promotion_item').clone().attr('id', '');
                            let weeks = $("#weeks").val();
                            let amount = response.discount_weeks_values[i].amount;
                            let titleEn = response.discount_weeks_values[i].titleEn;
                            let titleAr = response.discount_weeks_values[i].titleAr;
                            
                            let value = '-'+(response.discount_weeks_values[i].fee*(amount));

                            item.attr('data-promotion-value', value);
                            item.attr('data-promotion-title', @if(get_default_lang() == 'ar') titleAr @else titleEn @endif);
                            item.attr('data-promotion-type', 'discount_weeks');
                            item.css('display', 'block');
                            item.find('.promotionTitle').text(@if(get_default_lang() == 'ar') titleAr @else titleEn @endif);
                            item.find('.promotionValue').text(value);
                            item.appendTo($('.promotions'));

                            $('form#SearchForm').find('#discount_weeks_promotion').val(amount)
                            $('form#SearchForm').find('#discount_weeks_promotionTitleEn').val(titleEn)
                            $('form#SearchForm').find('#discount_weeks_promotionTitleAr').val(titleAr)
                            discount_weeks_promotion = discount_weeks_promotion ? true : (response.discount_weeks_values[i].amount ? true : false);
                        }
                    }
                }


            }else{
                $('.promotions').text("0.00").closest('li').css('display', 'none')
            }

            if (course_promotion || school_promotion || accommodation_promotion || discount_weeks_promotion) {
                $('.promotions').closest('li').css('display', 'block')
            }else{
                $('.promotions').text("0.00").closest('li').css('display', 'none')
            }
            if (extra_weeks_promotion) {
                $('.weeks_promotions').closest('li').css('display', 'block');
            }else{
                console.log('hh')
                $('.weeks_promotions').text("").closest('li').css('display', 'none')
            }
            if(!extra_weeks_promotion){
                $('form#SearchForm').find('#extra_weeks_promotion').val(0);
            }
            if(!discount_weeks_promotion){
                $('form#SearchForm').find('#discount_weeks_promotion').val(0);
            }
        }


        getPromotion =function () {
            let start_date = $("#id_start_date").val();
            let weeks = $("#weeks").val();
            let school = $("form#SearchForm").find('#schoolInput').val();
            let course = $("form#SearchForm").find('#courseInput').val();
            let accommodationOption = $("form#SearchForm").find('#accommodationInput').val() ? $("form#SearchForm").find('#accommodationInput').val() : 0;
            let accommodationFee = $("form#SearchForm").find('#accommodationFeeInput').val() ? $("form#SearchForm").find('#accommodationFeeInput').val() : 0;
            let accommodationWeeks = $("#accommodationWeeks").val() ? $("#accommodationWeeks").val() : 1;
            if(start_date){
                $.ajax({
                    type: 'GET',
                    url: "/<?php echo get_default_lang() ?>/GetSchoolPromotion/"+school+"/course/"+course+"/date/"+start_date+"/weeks/"+weeks+"/acc/"+accommodationFee+"/accweeks/"+accommodationWeeks,
                    success: function (response) {
                        // console.log(response)
                        setPromotion(response);
                        getTotal();
                    }
                });
            }
        }

        renderOptions = function () {
            let min = parseInt($('#accommodationWeeks').attr('min'));
            let max = parseInt($('#accommodationWeeks').attr('max'));
            let accommodationDuration = $('#accommodationWeeks').attr('data-accommodation-duration');
            var accommodationFee = $('#accommodationWeeks').attr('data-accommodation-fee');

            var extra_weeks = $("form#SearchForm").find('#extra_weeks_promotion').val() ?? 0;
            if (extra_weeks) {
                max += parseInt(extra_weeks);
            }


            let week_identifier = $('#accommodationWeeks').attr('data-week-identifier');
            let weeks_identifier = $('#accommodationWeeks').attr('data-weeks-identifier');
            $('#accommodationWeeks').html("")
            for (var i = min; i <= max; i++) {
                let selected = (accommodationDuration  == i) ? 'selected' : '';
                let d = (i == 1 ? week_identifier : weeks_identifier );

                $('#accommodationWeeks').append(`<option value="${i}" ${selected}>${i} ${d}</option>`)
            }
        }

        getTotal = function () {
            let weeks = $("#weeks").val();
            let accommodationWeeks = $("#accommodationWeeks").val()
            let courseFee = $("form#SearchForm").find('#courseFeeInput').val();
            let registrationFee = $("form#SearchForm").find('#registrationFee').val();
            let courierFee = $("form#SearchForm").find('#courierFee').val();
            let accommodationBookinFee = $("form#SearchForm").find('#accommodationBookinFee').val();
            let accommodationFeeFee = $("form#SearchForm").find('#accommodationOptionPrice').val();
            let materialFee = $("form#SearchForm").find('#materialFee').val();
            let airportPickUpPrice = $("form#SearchForm").find('#airportPickUpPrice').val();
            let insurancePrice = $("form#SearchForm").find('#insurancePrice').val();
            let visaStatus = $("form#SearchForm").find('#visaStatus').val();
            let visa = visaStatus != 0 ? $("form#SearchForm").find('#visa').val() : 0;

            let promotions = [];
            let promotion_items = $('.promotion_item');
            $.each(promotion_items, function () {
                let item = [$(this).attr('data-promotion-type'), $(this).attr('data-promotion-title'), $(this).attr('data-promotion-value')];
                promotions.push(item)
            })
            
            let promotions_value = 0;
            for (var i = 1; i < promotions.length; i++) {
                promotions_value += Number(promotions[i][2])
            }

            let total = (Number(courseFee)*Number(weeks)) + Number(registrationFee) + Number(courierFee) + Number(accommodationBookinFee) + (Number(accommodationFeeFee)*Number(accommodationWeeks)) + Number(materialFee) + Number(airportPickUpPrice) + Number(insurancePrice)*weeks + Number(visa);

            $('#total').text(total+promotions_value)
            $("form#SearchForm").find('#totalInput').val(total+promotions_value)
            $("form#SearchForm").find('#promotionsInput').val(JSON.stringify(promotions))
        }

        setVisa();
        getPromotion();

        $(document).on('click', '#checkbox', function () {
            setVisa();
            getTotal()
        })

        $('#accommodation').change(function() {
            var opval = $(this).val();
            $('#accommodation-' + opval +'-modal-div').fadeIn(300);
            $('#accommodation-' + opval + '-modal').modal("show");
            
            if (opval == 0) {
                $(".accommodationPrice").text("0.00").closest('li').css('display', 'none')
                $(".accommodationBookingFee").text('0.00').closest('li').css('display', 'none');
            }
            getTotal()
        });

        $('#accommodationWeeks').change(function () {
            var accommodationDuration = $(this).val();
            var accommodationFee = $('#accommodationWeeks').attr('data-accommodation-fee');
            $('#accommodationWeeks').attr('data-accommodation-duration', accommodationDuration)
            $(".accommodationPrice").text(Number(accommodationFee)*Number(accommodationDuration))
            getPromotion();
            getTotal()
        })

        $(document).on('click', '.selectAccommodation',function (e) {
            e.preventDefault();
            let course = $("form#SearchForm").find('#courseInput').val();
            let weeks = $('#weeks').val();
            
            let accommodationOption = $(this).closest('.accommodationSection').attr('data-accommodationOption');
            let accommodationTitle = $(this).closest('.accommodationSection').attr('data-accommodationTitle');
            let accommodationFee = $(this).closest('.accommodationSection').attr('data-accommodationOption-price');
            let accommodationFee_ = $(this).closest('.accommodationSection').attr('data-accommodationFee');
            let accommodationMinWeeksInput = $(this).closest('.accommodationSection').attr('data-accommodationOption-minWeeks');
            let accommodationBookinFee = $(this).closest('.accommodationSection').attr('data-accommodation-bookingFee');
            $("form#SearchForm").find('#accommodationInput').val(accommodationOption)
            $("form#SearchForm").find('#accommodationFeeInput').val(accommodationFee_)
            $("form#SearchForm").find('#accommodationBookinFee').val(accommodationBookinFee);
            $("form#SearchForm").find('#accommodationOptionPrice').val(accommodationFee);
            $("form#SearchForm").find('#accommodationTitle').val(accommodationTitle);

            $('#accommodationWeeks').attr('data-accommodation-fee', accommodationFee)

            let accommodationWeeks = $('#accommodationWeeks').val()
            if (accommodationBookinFee != 0) {
                $(".accommodationTitle").text(accommodationTitle);
                $(".accommodationPrice").text(Number(accommodationFee)*Number(accommodationWeeks)).closest('li').css('display', 'block')
                $(".accommodationBookingFee").text(accommodationBookinFee).closest('li').css('display', 'block');
            }else{
                $(".accommodationPrice").text('0.00').closest('li').css('display', 'none')
                $(".accommodationBookingFee").text('0.00').closest('li').css('display', 'none');
            }

            $('#accommodationWeeks').attr('min', accommodationMinWeeksInput)
            $('.accommodation-modal').fadeOut(300);
            $('#accommodation-16-modal, #accommodation-17-modal, #accommodation-18-modal, #accommodation-19-modal').modal('hide')

            $(".loader").load(location.href + " .courseSectionContainer")

            renderOptions();
            $('#accommodationWeeksSection').fadeIn(300);
            getPromotion()
            getTotal()

        })

        


        $('#weeks').change(function () {
            let course = $("form#SearchForm").find('#courseInput').val();
            let weeks = $(this).val();
            let accommodationOption = $("form#SearchForm").find('#accommodationInput').val() ? $("form#SearchForm").find('#accommodationInput').val() : 0;
            let accommodationWeeks = $("#accommodationWeeks").val() ? $("#accommodationWeeks").val() : 1;

                    // console.log(course)
            $.ajax({
                type: 'GET',
                url: "/<?php echo get_default_lang() ?>/GetCourseFee/"+course+"/weeks/"+weeks+"/acc/"+accommodationOption+"/accweeks/"+accommodationWeeks,
                success: function (response) {
                    $(".loader").load(location.href + " .courseSectionContainer")
                    $(".loader-acc-16").load(location.href + " .ajax-load-16")
                    $(".loader-acc-17").load(location.href + " .ajax-load-17")
                    $(".loader-acc-18").load(location.href + " .ajax-load-18")
                    $(".loader-acc-19").load(location.href + " .ajax-load-19")
                    $("form#SearchForm").find('#courseFeeInput').val(response.fee)
                    $('.courseFee').text(response.fee*weeks)
                    $('#accommodationWeeks').attr('max', weeks)
                    $("form#SearchForm").find('#materialFee').val(response.materialFee.materialFee);
                    $("form#SearchForm").find('#materialFeeId').val(response.materialFee.materialFeeId);
                    $("form#SearchForm").find('#materialFeeType').val(response.materialFee.materialFeeType);
                    if (response.materialFee.materialFee == 0) { 
                        $('.materialFee').text('0.00').closest('li').css('display', 'none');
                    }else{
                        $('.materialFee').text(response.materialFee.materialFee).closest('li').css('display', 'block');
                    }
                    let insurance = $('#insurance').val();
                    $('.insurance').text(insurance?insurance*weeks:'');
                    $('#insuranceContainer').load(location.href + " #insurance", function () {
                    console.log(insurance)
                    $("#insurance option[value="+insurance??0+"]").attr('selected', 'selected')
                        
                    })

                    $("form#SearchForm").find('#visaTitle').val(response.visa.visaTitle);
                    $("form#SearchForm").find('#visa').val(response.visa.visa);
                    $("form#SearchForm").find('#visaId').val(response.visa.visaId);

                    setVisa();
                    setPromotion(response.promotion);
                    renderOptions();
                    getTotal();
                }
            });
        })

        $('.lingo-dateWidget div[data-pane="date"]').on('click', function() {
            setTimeout(function () {
                getPromotion();
                getTotal()
            }, 1000)
        })



        $('#airportPickUp').change(function () {
            let airportPickUp = $(this).val();
            let airportPickUpTitle = $(this).find('option:selected').attr('data-airportPickUpTitle');
            let airportPickUpType = $(this).find('option:selected').attr('data-airportPickUpType');
            let airportPickUpId = $(this).find('option:selected').attr('data-airportPickUpId');

            @if(get_default_lang() == 'ar')
            let airportPickUpTypeText = airportPickUpType == 2 ? 'استقبال وعودة' : 'استقبال فقط';
            @else
            let airportPickUpTypeText = airportPickUpType == 2 ? 'Round Ways' : 'One Way';
            @endif

            $("form#SearchForm").find('#airportPickUpPrice').val(airportPickUp);
            $("form#SearchForm").find('#airportPickUpTitle').val(airportPickUpTitle);
            $("form#SearchForm").find('#airportPickUpType').val(airportPickUpType);
            $("form#SearchForm").find('#airportPickUpId').val(airportPickUpId);
            if (airportPickUp==0) {
                $(".airportPickUpTitle").text('Airport PickUp');
                $(".airportPickUp").text("0.00").closest('li').css('display', 'none');
            }else{
                $(".airportPickUpTitle").text(airportPickUpTypeText + ' - ' + airportPickUpTitle);
                $(".airportPickUp").text(airportPickUp).closest('li').css('display', 'block');
            }
            getTotal()
        })

        $(document).on('change', '#insurance', function () {
            let weeks = $('#weeks').val();
            let insurance_val = $(this).val();
            let insurance = Number(insurance_val);
            let insuranceTitle = $(this).find('option:selected').attr('data-insuranceTitle');
            let insuranceId = $(this).find('option:selected').attr('data-insuranceId');

            $("form#SearchForm").find('#insurancePrice').val(insurance);
            $("form#SearchForm").find('#insuranceTitle').val(insuranceTitle);
            $("form#SearchForm").find('#insuranceId').val(insuranceId);

            $('.insurance').text(insurance * Number(weeks))
            if (insurance==0) {
                $(".insuranceTitle").text('Insurance');
                $(".insurance").text("0.00").closest('li').css('display', 'none')
            }else{
                $(".insuranceTitle").text(insuranceTitle);
                $(".insurance").closest('li').css('display', 'block');
            }
            getTotal()
        })

        $(document).on('click', '.selectCourseBtn', function (e) {
            e.preventDefault();
            let weeks = $('#weeks').val();
            let courseSection = $(this).closest('.courseSection');
            let course = courseSection.attr('data-course');
            let courseName = courseSection.attr('data-course-title');
            let courseLesson = courseSection.attr('data-course-lesson');
            let courseHour = courseSection.attr('data-course-hour');
            let courseFee = courseSection.attr('data-course-fee');
            let materialFee = courseSection.attr('data-course-materialFee')
            let materialFeeId = courseSection.attr('data-course-materialFeeId')
            let materialFeeType = courseSection.attr('data-course-materialFeeType')
            let courierFees = courseSection.attr('data-course-courierFees')


            $("form#SearchForm").find('#courseInput').val(course)
            $("form#SearchForm").find('#courseFeeInput').val(courseFee)
            $("form#SearchForm").find('#materialFee').val(materialFee);
            $("form#SearchForm").find('#materialFeeId').val(materialFeeId);
            $("form#SearchForm").find('#materialFeeType').val(materialFeeType);
            $("form#SearchForm").find('#courierFee').val(courierFees);
            $('.courseName').text(courseName)
            $('.courseLesson').text(courseLesson)
            $('.courseHour').text(courseHour)

            $('.courseFee').text(courseFee*weeks)
            if (materialFee == 0) {
                $('.materialFee').text('0.00').closest('li').css('display', 'none')
            }else{
                $('.materialFee').text(materialFee).closest('li').css('display', 'block')
            }

            if (courierFees == 0) {
                $('.courierFees').text('0.00').closest('li').css('display', 'none')
            }else{
                $('.courierFees').text(courierFees).closest('li').css('display', 'block')
            }

            $('.coursesTypes-modal').fadeOut(300).modal('hide');
            setVisa()
            getTotal()

            $.ajax({
                type: 'GET',
                url: "/<?php echo get_default_lang() ?>/search/course/"+course,
                success: function (response) {
                    console.log(response)
                }
            })
        })


        $(document).on('click', '.accommodation-modal .btn-reset, .accommodation-modal .close', function() {
            $('select#accommodation').val(0)
            $("form#SearchForm").find('#accommodationInput').val(0)
            $(".accommodationPrice").text('0.00').closest('li').css('display', 'none')
            $(".accommodationBookingFee").text('0.00').closest('li').css('display', 'none');
            $('.accommodation-modal').fadeOut(300);
            $('#accommodation-16-modal, #accommodation-17-modal, #accommodation-18-modal, #accommodation-19-modal').modal('hide')
        });
        /*$(document).on('click', '.accommodation-modal .close', function() {
            $('.accommodation-modal').fadeOut(300);
            $('#accommodation-16-modal, #accommodation-17-modal, #accommodation-18-modal, #accommodation-19-modal').modal('hide')
        });*/
        
        $(document).on('click', '.coursesTypes-modal .close, .coursesTypes-modal .btn-close', function() {
            $('.coursesTypes-modal').fadeOut(300).modal('hide');
        });

        getTotal();






    </script>
@endsection
