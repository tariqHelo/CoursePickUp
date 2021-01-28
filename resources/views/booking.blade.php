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
                                <li class="breadcrumb-item px-2"><a href="{{ get_default_lang() == 'ar' ? route('school.course', $school->slugAr) : route('school.course', $school->slugEn) }}">{{ __('messages.school') }}</a></li>
                                <li class="breadcrumb-item px-2 active" aria-current="page">{{ __('messages.booking') }}</li>
                            </ol>
                        </nav>

                    </div>

                </div>

            </div>

        </div>

        <div class="container pt-30">

            <div class="row gap-20 gap-lg-40">

                <div class="col-12 col-lg-7">

                    <div class="content-wrapper">

                        <div class="form-draft-payment">

                            <form method="POST" action="{{route('setBooking')}}">
                                @csrf

                                @php $admin_logged_in = (Auth::user()) && (Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3) ? 1 : 0 @endphp

                                <h4 class="heading-title"><span> {{ __('messages.student details') }}</span></h4>
                                <p class="post-heading font-weight-bold">  {{ __('messages.our team will contact you to confirm all details, therefore, please verify that your mobile number and email are correct.') }}</p>


                                <div class="row gap-15 mb-15">

                                    @if($errors->any())
                                    <div class="col-12 my-3">
                                        @foreach($errors->all() as $error)
                                        <div class="alert alert-danger">
                                            {{ $error }}
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif

                                    <div class="w-100 d-block d-md-none"></div>

                                    <div class="col-12 col-sm-6">

                                        <div class="form-group">
                                            <label>{{ __('messages.first name') }}</label>
                                            <input type="text" class="form-control" placeholder="{{ __('messages.first name') }}" {{ $admin_logged_in ? '' : 'required' }} value="{{old('first_name')}}" name="first_name" />
                                        </div>

                                    </div>

                                    <div class="col-12 col-sm-6">

                                        <div class="form-group">
                                            <label>{{ __('messages.last name') }}</label>
                                            <input type="text" class="form-control" placeholder="{{ __('messages.last name') }}" {{ $admin_logged_in ? '' : 'required' }} value="{{old('last_name')}}" name="last_name" />
                                        </div>

                                    </div>

                                    <div class="col-12 col-sm-6">

                                        <div class="form-group">
                                            <label>{{ __('messages.email') }}</label>
                                            <input type="email" class="form-control" placeholder="{{ __('messages.email address') }}" {{ $admin_logged_in ? '' : 'required' }} value="{{old('email')}}" name="email" />
                                        </div>

                                    </div>

                                    <div class="col-12 col-sm-6">

                                        <div class="form-group">
                                            <label>{{ __('messages.phone') }}</label>
                                            <input type="text" class="form-control" placeholder="{{ __('messages.phone') }}" {{ $admin_logged_in ? '' : 'required' }} value="{{old('phone')}}" name="phone" />
                                        </div>

                                    </div>

                                    <div class="col-12 col-sm-6">

                                        <div class="form-group">

                                            <label for="inputState">{{ __('messages.nationality') }}</label>
                                            <!-- <select id="inputState" class="form-control chosen-the-basic">
												
											</select> -->
                                            <select name="nationality" class="form-control icon  paddingIcon placeholder-style"
                                                    {{ $admin_logged_in ? '' : 'required' }} id="inputState">
                                                <option selected disabled value="">{{ __('messages.nationality') }}</option>
                                                @foreach($nationalities as $nationality)
                                                    @if( get_default_lang() =="ar")
                                                        <option value="{{$nationality->id}}" {{ old('nationality') == $nationality->id ? 'selected' : '' }}>{{$nationality->titleAr}}</option>
                                                    @else
                                                        <option value="{{$nationality->id}}" {{ old('nationality') == $nationality->id ? 'selected' : '' }}>{{$nationality->titleEn}}</option>
                                                    @endif
                                                @endforeach
                                            </select>

                                        </div>

                                    </div>

                                    <div class="col-12 col-sm-6">

                                        <div class="form-group">
                                            <label for="inputState">{{ __('messages.place of residence') }}</label>
                                            <select name="residence" class="form-control icon  paddingIcon placeholder-style"
                                                        {{ $admin_logged_in ? '' : 'required' }}>
                                            <option selected disabled value="">{{ __('messages.place of residence') }}</option>
                                            @foreach($residences as $residence)
                                                @if( get_default_lang() =="ar")
                                                    <option value="{{$residence->id}}" {{ old('residence') == $residence->id ? 'selected' : '' }}>{{$residence->titleAr}}</option>
                                                @else
                                                    <option value="{{$residence->id}}" {{ old('residence') == $residence->id ? 'selected' : '' }}>{{$residence->titleEn}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        </div>

                                    </div>

                                    <div class="col-12 col-md-12">

                                        <div class="form-group">
                                            <label>{{ __('messages.notes') }}</label>
                                            <textarea class="form-control" placeholder="{{ __('messages.any notes') }}" name="notes"></textarea>
                                        </div>

                                    </div>

                                </div>


                                <div class="row mt-20">

                                    <div class="col-sm-8 col-md-6">

                                        <button class="btn btn-primary">{{ __('messages.book now') }}</button>

                                        <p class="line-145 mt-20 font-italic font-sm"><span class="font600">{{ __('messages.no charges will apply') }}</span></p>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

                <div class="col-12 col-lg-5">

                    <aside class="sticky-kit sidebar-wrapper no-border">

                        <div class="booking-box">

                            <div class="box-heading">
                                <h3 class="h6 text-white text-uppercase">{{ __('messages.booking details') }}</h3>
                            </div>
                            <div class="box-content">

                                <a href="{{ get_default_lang() == 'ar' ? route('school.course', $school->slugAr) : route('school.course', $school->slugEn) }}" class="tour-small-grid-01 mb-20 clearfix">

                                    <div class="image"><img src="{{ asset('/Schools/Logo/' . $school->logo) }}" alt="image" class="mw-100" style="height: unset;" /></div>

                                        
                                    <div class="content mx-0 {{ get_default_lang() == 'ar' ? 'pr-40' : 'pl-40'}}">
                                        <h6>{{ get_default_lang() == 'ar' ? $school->titleAr : $school->titleEn }}</h6>
                                        <ul class="item-meta">
                                            <li><i class="elegent-icon-pin_alt text-warning"></i> {{ get_default_lang() == 'ar' ? $school->country->titleAr : $school->country->titleEn }}</li>
                                            <li>{{ get_default_lang() == 'ar' ? $school->city->titleAr : $school->city->titleEn }}</li>
                                        </ul>
                                        <!-- <span class="price">Price from <span class="h6 line-1 text-primary number">$125.99</span></span> -->
                                    </div>

                                </a>

                                <span class="font600 text-muted line-125">{{ __('messages.your choosen course is') }}</span>
                                <h4 class="line-125 choosen-date mt-3">
                                    <i class="fab fa-leanpub book-size"></i>
                                    {{ get_default_lang() == 'ar' ? $course->titleAr : $course->titleEn }} - 
                                    ({{ $course->hoursPerWeek }}) {{ __('messages.hour') }} - 
                                    ({{ $course->lessonsPerWeek }}) {{ __('messages.lesson') }}

                                    <small class="d-block">
                                        {{ $start_date->format('d M, Y') }} - 
                                        {{ $end_date->format('d M, Y') }}
                                        ({{ $data['weeks'] }} {{ __('messages.weeks') }})

                                        @if($data['extra_weeks_promotion'])
                                            + ({{$data['extra_weeks_promotion']}} {{ __('messages.weeks') }})
                                        @endif
                                    </small></h4>

                                <ul class="mt-20 pt-15">
                                    <li class="clearfix">
                                        <span class="courseName">{{ __('messages.course fee') }}</span>
                                        <span class=" {{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                            $<span class="courseFee">{{$courseFee*$data['weeks']}}</span>
                                        </span></li>
                                    <li class="clearfix">
                                        <span>{{ __('messages.registration fee') }}</span>
                                        <span class=" {{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                            $<span class="registrationFee">{{$school->registrationFee}}</span>
                                        </span>
                                    </li>
                                    <li class="clearfix">{{ __('messages.material fee') }}<span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                        $<span class="materialFee">{{ $data['materialFee'] }}</span>
                                        </span>
                                    </li>

                                    @if($course->courierFees)
                                    <li class="clearfix">{{ __('messages.courier fee') }} <span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                        $<span class="courierFees">{{ $course->courierFees }}</span></span></li>
                                    @endif

                                    @if(count($promotions))
                                    @foreach($promotions as $promotion)
                                    @if($promotion[0] == 'course' || $promotion[0] == 'school')
                                    <li class="clearfix">{{ $promotion[1] }}<span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                        <span class="materialFee text-primary">{{ $promotion[2] }}</span>
                                        </span>
                                    </li>
                                    @endif
                                    @endforeach
                                    @endif

                                    @if($data['extra_weeks_promotion'])
                                    <li class="clearfix">{{ get_default_lang() == 'ar' ? $data['extra_weeks_promotionTitleAr'] : $data['extra_weeks_promotionTitleEn'] }}<span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                        <span class="materialFee text-primary">0.00</span>
                                        </span>
                                    </li>
                                    @endif

                                    @if($data['discount_weeks_promotion'])
                                    <li class="clearfix">{{ get_default_lang() == 'ar' ? $data['discount_weeks_promotionTitleAr'] : $data['discount_weeks_promotionTitleEn'] }}<span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                        <span class="materialFee text-primary">-{{ $courseFee*$data['discount_weeks_promotion'] }}</span>
                                        </span>
                                    </li>
                                    @endif



                                    @if($accommodationOption)
                                    <div class="border-top pt-20"></div>
                                    <li class="clearfix">
                                        <div class="mt-1">
                                            <span class="font700">{{ __('messages.accommodation') }}</span>
                                            <span> {{ $data['accommodationTitle'] }} </span>
                                        </div>
                                        <div class="small" style="color: #9B9B9B">
                                            <span> {{ get_default_lang() == 'ar' ? $accommodationOption->accommodation->accommodationType->titleAr :$accommodationOption->accommodation->accommodationType->titleEn }} </span>
                                            <span> - </span>
                                            <span> {{  get_default_lang() == 'ar' ? $accommodationOption->roomType->titleAr :$accommodationOption->roomType->titleEn }} </span>
                                            <span> - </span>
                                            <span> {{ get_default_lang() == 'ar' ? $accommodationOption->mealType->titleAr :$accommodationOption->mealType->titleEn }} </span>
                                            <span> - </span>
                                            <span> {{ get_default_lang() == 'ar' ? $accommodationOption->facilitie->titleAr :$accommodationOption->facilitie->titleEn }} </span>
                                            <span> - </span>
                                            <span> {{ get_default_lang() == 'ar' ? $accommodationOption->supplementAr :$accommodationOption->supplement }} </span>
                                        </div>
                                        <div class="small" style="color: #9B9B9B">
                                            <i class="ri-calendar"></i>
                                            <span class="px-1"></span>
                                            <span>{{ (clone $start_date)->format('M d, Y') }}</span>
                                            <span> - </span>
                                            <span>{{ (clone $start_date)->addWeeks($data['accommodationWeeks'])->subDays(2)->format('M d, Y') }}</span>
                                            <span>({{ $data['accommodationWeeks'] }} {{ __('messages.weeks') }})</span>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <span class="accommodationTitle"> {{ $data['accommodationTitle'] }} </span>
                                        <span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">$<span class="accommodationPrice">{{ $data['accommodationOptionPrice']*$data['accommodationWeeks'] }}</span></span>
                                    </li>
                                    <li class="clearfix">
                                        <span class="accommodationName">{{ __('messages.accommodation booking fee') }} </span>
                                        <span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">$<span class="accommodationBookingFee">{{ $data['accommodationBookinFee'] }}</span></span>
                                    </li>

                                    @if(count($promotions))
                                    @foreach($promotions as $promotion)
                                    @if($promotion[0] == 'accommodation')
                                    <li class="clearfix">{{ $promotion[1] }}<span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                        <span class="materialFee text-primary">{{ $promotion[2] }}</span>
                                        </span>
                                    </li>
                                    @endif
                                    @endforeach
                                    @endif

                                    @endif


                                    @if($data['airportPickUp'])
                                    <div class="border-top pt-20"></div>
                                    <li class="clearfix">
                                        <div class="mt-1">
                                            <span class="font700">{{ __('messages.transportation') }}</span>
                                        </div>
                                    </li>
                                    @if($data['airportPickUp'])
                                    <li class="clearfix"><span class="airportPickUpTitle"> {{ $data['airportPickUpType'] == 2 ? __('messages.round ways') : __('messages.one way') }} - {{ $data['airportPickUpTitle'] }}</span>
                                        <span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                            $<span class="airportPickUp">{{ $data['airportPickUp'] }}</span>
                                        </span>
                                    </li>
                                    @endif

                                    @endif

                                    @if($data['insurancePrice'] || $data['visaStatus'])
                                    <div class="border-top pt-20"></div>
                                    <li class="clearfix">
                                        <div class="mt-1">
                                            <span class="font700">{{ __('messages.other') }}</span>
                                        </div>
                                    </li>
                                    @if($data['insurancePrice'])
                                    <li class="clearfix"><span class="insuranceTitle"> {{ $data['insuranceTitle'] }}</span>
                                        <span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                            $<span class="insurance">{{ $data['insurancePrice']*$data['weeks'] }}</span>
                                        </span>
                                    </li>
                                    @endif
                                    @if($data['visaStatus'])
                                    <li class="clearfix">
                                        <span class="visaTitle">{{ $data['visaTitle'] }}</span>
                                        <span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                        $<span class="visa">{{ $data['visa'] }}</span></span>
                                    </li>
                                    @endif
                                    @endif

                                    <li class="clearfix border-top font700 text-uppercase">
                                        <div class="border-top mt-1">
                                            <span>{{ __('messages.total') }}</span><span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }} text-dark">${{ $data['total'] }}</span>
                                        </div>
                                    </li>

                                </ul>

                                <p class="text-right font-sm">{{ __('messages.100% satisfaction guaranteed') }}</p>

                            </div>

                            <div class="box-bottom bg-light">
                                <h6 class="font-sm">{{ __('messages.this is the initial booking, and our team will contact you to confirm your booking') }}</h6>

                            </div>

                        </div>

                    </aside>

                </div>

            </div>

        </div>

    </section>

</div>
<!-- end Main Wrapper -->


@endsection

@section('script')
<script>
/**
 * Payment Option
 */
$(".box-payment .payment-form").hide();
$("input[name$='BoxPayment']").on("click", function() {
    var BoxPayment = $(this).val();
    $(".box-payment .payment-form").hide();
    $("#" + BoxPayment).show();
});
</script>


@endsection