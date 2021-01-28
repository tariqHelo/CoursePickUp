@extends('layouts.layouts')
@section('content')

<!-- start Main Wrapper -->
<div class="main-wrapper scrollspy-container">

    <section class="page-wrapper page-detail">

        <div class="page-title border-bottom pt-25 mb-0 border-bottom-0">

            <div class="container">

                <div class="row gap-15 align-items-center">

                    <div class="col-12 col-md-7">

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ get_default_lang() == 'ar' ? route('school.course', $school->slugAr) : route('school.course', $school->slugEn) }}">{{ __('messages.school') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('messages.confirmation') }}</li>
                            </ol>
                        </nav>

                    </div>

                </div>

            </div>

        </div>

        <div class="container pt-50">

            <div class="row justify-content-center">

                <div class="col-12 col-md-11 col-lg-10 col-xl-9">

                    <div class="content-wrapper">

                        <div class="success-icon-text">
                            <span class="icon-font  text-success"><i class="elegent-icon-check_alt2"></i></span>
                            <h4 class="text-uppercase letter-spacing-1">{{ __('messages.congratulations!') }}</h4>
                            <p>{{ __('messages.thank you for choosing pickupcourse. a student counselor will get in touch with you as soon as possible.') }}</p>
                        </div>

                        <div class="mb-50"></div>

                        <div class="text-center">

                            <h3 class="text-primary line-125 mv-10">{{ __('messages.your booking is completed') }}</h3>

                            <a href="{{url('/invoices/'.$booking->invoice)}}" download class="btn btn-success btn-lg btn-wide">{{ __('messages.download your booking') }}
                            </a>
                        </div>

                        <div class="mb-50"></div>

                        <div class="booking-box" id="booking-box">

                            <div class="box-heading">
                                <h3 class="h6 text-white text-uppercase">{{ __('messages.your booking details') }}</h3>
                            </div>

                            <div class="box-content">

                                <figure class="tour-long-item-01">

                                    <a href="{{ get_default_lang() == 'ar' ? route('school.course', $school->slugAr) : route('school.course', $school->slugEn) }}">

                                        <div class="d-flex flex-column flex-sm-row align-items-xl-center">

                                            <div>
                                                <div class="image">
                                                    <img src="{{ asset('/Schools/Logo/' . $school->logo) }}" alt="image" class="mw-100" style="height: unset;" />
                                                </div>
                                            </div>

                                            <div>
                                                <figcaption class="content">
                                                    <h5>{{ get_default_lang() == 'ar' ? $school->titleAr : $school->titleEn }}</h5>
                                                    <ul class="item-meta">
                                                        <li>
                                                            <i class="elegent-icon-pin_alt text-warning"></i> 
                                                            {{ get_default_lang() == 'ar' ? $school->country->titleAr : $school->country->titleEn }}
                                                        </li>
                                                        <li>
                                                            <div class="rating-item rating-sm rating-inline clearfix">
                                                                <div class="rating-icons">
                                                                    <input type="hidden" class="rating" data-filled="rating-icon ri-star rating-rated" data-empty="rating-icon ri-star-empty" data-fractions="2" data-readonly value="{{$school->rating}}" />
                                                                </div>
                                                                <!-- <p class="rating-text font600 text-muted font-12 letter-spacing-1">26 reviews</p> -->
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <p>{{ get_default_lang() == 'ar' ? $school->content->shortDescriptionAr : $school->content->shortDescriptionEn }} </p>
                                                    <ul class="item-meta mt-15">
                                                        <li>
                                                            <span class="font700">{{ get_default_lang() == 'ar' ? $course->titleAr : $course->titleEn }}</span>
                                                        </li>
                                                        <li>
                                                            ({{ $course->hoursPerWeek }}) {{ __('messages.hour') }} - 
                                                            ({{ $course->lessonsPerWeek }}) {{ __('messages.lesson') }}
                                                        </li>

                                                        <li>
                                                            <span class="font700">{{ __('messages.start') }}: </span>
                                                            {{ $start_date->format('M d, Y') }} - 
                                                            <span class="font700">{{ __('messages.end') }}: </span>
                                                            {{ $end_date->format('M d, Y') }}
                                                            ({{ $booking->weeks }} {{ __('messages.weeks') }})
                                                            @if($extra_weeks)
                                                            + ({{ $extra_weeks[2] }} {{ __('messages.weeks') }})
                                                            @endif
                                                        </li>
                                                    </ul>
                                                    <!-- <p class="mt-3 mb-0">Price from <span class="h6 line-1 text-primary font16">$125.99</span> <span class="text-muted mr-5"></span></p> -->
                                                </figcaption>
                                            </div>

                                        </div>

                                    </a>

                                </figure>

                                <ul class="list-li-border-top mt-30">
                                    <li class="clearfix">
                                        <span class="font600">{{ __('messages.booking id') }}:</span>
                                        <span class="d-block {{ get_default_lang() == 'ar' ? 'float-sm-left' : 'float-sm-right' }}">#{{ $booking->booking_id }}</span>
                                    </li>



                                    <li class="clearfix">
                                        <span class="courseName">{{ __('messages.course fee') }}</span>
                                        <span class=" {{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                            $<span class="courseFee">{{$courseFee*$booking->weeks}}</span>
                                        </span></li>
                                    <li class="clearfix">
                                        <span>{{ __('messages.registration fee') }}</span>
                                        <span class=" {{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                            $<span class="registrationFee">{{$school->registrationFee}}</span>
                                        </span>
                                    </li>
                                    <li class="clearfix">{{ __('messages.material fee') }}<span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                        $<span class="materialFee">{{ $materialFee['materialFee'] }}</span>
                                        </span>
                                    </li>

                                    @if($course->courierFees)
                                    <li class="clearfix">{{ __('messages.courier fee') }} <span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                        $<span class="courierFees">{{ $course->courierFees }}</span></span></li>
                                    @endif

                                    @if($promotions && count($promotions))
                                    @foreach($promotions as $promotion)
                                    @if($promotion[0] == 'course' || $promotion[0] == 'school')
                                    <li class="clearfix">{{ $promotion[1] }}<span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                        <span class="materialFee">{{ $promotion[2] }}</span>
                                        </span>
                                    </li>
                                    @endif
                                    @endforeach
                                    @endif

                                    @if($extra_weeks)
                                    <li class="clearfix">{{ get_default_lang() == 'ar' ? $extra_weeks[1] : $extra_weeks[0] }}<span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                        <span class="materialFee">0.00</span>
                                        </span>
                                    </li>
                                    @endif

                                    @if($discount_weeks)
                                    <li class="clearfix">{{ get_default_lang() == 'ar' ? $discount_weeks[1] : $discount_weeks[0] }}<span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                        <span class="materialFee text-primary">-{{ $courseFee*$discount_weeks[2] }}</span>
                                        </span>
                                    </li>
                                    @endif


                                    

                                    @if($accommodationOption)
                                    <li class="clearfix">
                                        <div class="mt-1">
                                            <span class="font700">{{ __('messages.accommodation') }}</span>
                                            <span> {{ $lang == 'ar' ? $accommodationOption->accommodation->titleAr : $accommodationOption->accommodation->titleEn }} </span>
                                        </div>
                                        <div class="small" style="color: #9B9B9B">
                                            <span> {{ $lang == 'ar' ? $accommodationOption->accommodation->accommodationType->titleAr :$accommodationOption->accommodation->accommodationType->titleEn }} </span>
                                            <span> - </span>
                                            <span> {{  $lang == 'ar' ? $accommodationOption->roomType->titleAr :$accommodationOption->roomType->titleEn }} </span>
                                            <span> - </span>
                                            <span> {{ $lang == 'ar' ? $accommodationOption->mealType->titleAr :$accommodationOption->mealType->titleEn }} </span>
                                            <span> - </span>
                                            <span> {{ $lang == 'ar' ? $accommodationOption->facilitie->titleAr :$accommodationOption->facilitie->titleEn }} </span>
                                            <span> - </span>
                                            <span> {{ $lang == 'ar' ? $accommodationOption->supplementAr :$accommodationOption->supplement }} </span>
                                        </div>
                                        <div class="small" style="color: #9B9B9B">
                                            <i class="ri-calendar"></i>
                                            <span class="px-1"></span>
                                            <span>{{ (clone $start_date)->format('M d, Y') }}</span>
                                            <span> - </span>
                                            <span>{{ (clone $start_date)->addWeeks($booking->accommodation_weeks)->subDays(2)->format('M d, Y') }}</span>
                                            <span>({{ $booking->accommodation_weeks }} {{ __('messages.weeks') }})</span>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <span> {{ $lang == 'ar' ? $accommodationOption->accommodation->titleAr : $accommodationOption->accommodation->titleEn }} </span>
                                        <span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">$<span class="accommodationPrice">{{ $booking->feeweeksoption->fee*$booking->accommodation_weeks }}</span></span>
                                    </li>
                                    <li class="clearfix">
                                        <span>{{ __('messages.accommodation booking fee') }} </span>
                                        <span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">$<span class="accommodationBookingFee">{{ $accommodationOption->accommodation->bookingFee }}</span></span>
                                    </li>

                                    @if($promotions && count($promotions))
                                    @foreach($promotions as $promotion)
                                    @if($promotion[0] == 'accommodation')
                                    <li class="clearfix">{{ $promotion[1] }}<span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                        <span class="materialFee">{{ $promotion[2] }}</span>
                                        </span>
                                    </li>
                                    @endif
                                    @endforeach
                                    @endif

                                    @endif


                                    @if($booking->airportPickUp_id)
                                    <li class="clearfix">
                                        <div class="mt-1">
                                            <span class="font700">{{ __('messages.transportation') }}</span>
                                        </div>
                                    </li>
                                    @if($booking->airportPickUp_id)
                                    <li class="clearfix"><span class="airportPickUpTitle"> {{ $booking->airportPickUp_type == 2 ? __('messages.round ways') : __('messages.one way') }} - {{ $lang == 'ar' ? $booking->airportPickUp->titleAr : $booking->airportPickUp->titleEn }}</span>
                                        <span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                            $<span class="airportPickUp">{{ $booking->airportPickUp_type == 2 ? $booking->airportPickUp->roundWay : $booking->airportPickUp->oneWay }}</span>
                                        </span>
                                    </li>
                                    @endif

                                    
                                    @endif

                                    @if($booking->insurance_id || $booking->visa_id)
                                    <li class="clearfix">
                                        <div class="mt-1">
                                            <span class="font700">{{ __('messages.other') }}</span>
                                        </div>
                                    </li>
                                    @if($booking->insurance_id)
                                    <li class="clearfix"><span class="insuranceTitle"> {{ $lang == 'ar' ? $booking->insurance->titleAr : $booking->insurance->titleEn }}</span>
                                        <span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                            $<span class="insurance">{{ $booking->insurance->fee*$booking->weeks }}</span>
                                        </span>
                                    </li>
                                    @endif
                                    @if($booking->visa_id)
                                    <li class="clearfix">
                                        <span class="visaTitle">{{ $lang == 'ar' ? $booking->visa->titleAr : $booking->visa->titleEn }}</span>
                                        <span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                        $<span class="visa">{{ $booking->visa->fee }}</span></span>
                                    </li>
                                    @endif
                                    @endif

                                    <li class="clearfix border-top font700 text-uppercase">
                                        <div class=" mt-1">
                                            <span>{{ __('messages.total') }}</span><span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }} text-dark">${{ $booking->total }}</span>
                                        </div>
                                    </li>
                                </ul>

                                <p class="text-right font-sm">{{ __('messages.100% satisfaction guaranteed') }}</p>

                                <div class="mb-20"></div>

                                <!-- <h6>Cancellation policy</h6>
                                <p>Spot of come to ever hand as lady meet on. Delicate contempt received two yet advanced. Gentleman as belonging he commanded believing dejection in by. On no am winding chicken so behaved. Its preserved sex enjoyment
                                    new way behaviour. Him yet devonshire celebrated especially. Unfeeling one provision are smallness resembled repulsive.</p> -->

                            </div>

                            <div class="box-bottom bg-light">
                                <h6 class="font-sm">{{ __('messages.this is the initial booking, and our team will contact you to confirm your booking') }}</h6>
                                <!-- <p class="font-sm">Our custom tour program, direct call <span class="text-primary">+66857887444</span>.</p> -->
                            </div>

                        </div>

                        <div class="mb-50"></div>



                        <div class="mb-50"></div>



                    </div>

                </div>

            </div>

        </div>

    </section>

</div>
<!-- end Main Wrapper -->


@endsection