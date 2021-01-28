@extends('layouts.layouts')
@section('content')


    <!-- start Main Wrapper -->
    <div class="main-wrapper scrollspy-container">
        <section class="page-wrapper page-result pb-0">
            <div class="page-title bg-light mb-0">
                <div class="container">
                    <div class="row gap-15 align-items-center">
                        <div class="col-12 col-md-7">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item px-2"><a href="{{ url(app()->getLocale() . '/services') }}">{{__("messages.services")}}</a></li>
                                    <li class="breadcrumb-item active px-2" aria-current="page">{{__("messages.service details")}}</li>
                                </ol>
                            </nav>
                            <h4 class="mt-0 line-125">{{__("messages.service details")}}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row equal-height gap-0 gap-lg-40 mb-80">
                    <div class="col-12 col-lg-9">
                        <div class="content-wrapper pt-50 pb-0 pb-lg-50">
                            <div class="image">

                                <img src=" {{asset('services/image/'.$service->image)}}" alt="image"/>
                            </div>
                            <div class="mb-50"></div>
                            <h3 class="heading-title">
                                <span>{{ get_default_lang() =="ar" ? $service->titleAr : $service->titleEn }}</span>
                            </h3>
                            <p class="lead">
                                {!! $lang == 'ar' ? $service->contentAr : $service->contentEn !!}
                            </p>

                            <div class="mb-50"></div>
                            @if($lang == 'ar')
                            <h3 class="heading-title"><span>اطلب <span class="font200">الخدمة المناسبة لك</span></span></h3>
                            @else
                            <h3 class="heading-title"><span>Ask for <span class="font200">the right service</span></span></h3>
                            @endif

                            <div class="container">
                                <div class="col-12">
                                    <form  action="{{route('servicesSendLeads')}}"
                                           method="POST"
                                           enctype="multipart/form-data">
                                        @csrf

                                        <div class="contact-successful-messages"></div>
                                        <div class="contact-inner row">
                                            <div class="form-group col-sm-6 inner-addon {{ $lang == 'ar' ? 'right-addon' : 'left-addon' }}">
                                                <i class="fa fa-user text-danger"></i>

                                                <input type="text" name="fName" class="form-control icon "
                                                       required="required" placeholder="{{__('messages.full name')}}"
                                                       data-error="Your name is required.">
                                                <div class="help-block with-errors text-danger">


                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6 inner-addon {{ $lang == 'ar' ? 'right-addon' : 'left-addon' }}">
                                                <i class="fa fa-envelope text-danger"></i>
                                                <input type="email" name="email" class="form-control icon "
                                                       required="required" placeholder="{{__('messages.email address')}}"
                                                       data-error="Valid email is required.">
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
                                            <div class="form-group col-sm-6 inner-addon {{ $lang == 'ar' ? 'right-addon' : 'left-addon' }}">
                                                <i class="fa fa-phone text-danger" aria-hidden="true"></i>
                                                <input type="text" name="phone" class="form-control icon "
                                                       placeholder="{{__('messages.mobile number')}}" required="required">
                                            </div>
                                            <div class="form-group col-sm-6 inner-addon {{ $lang == 'ar' ? 'right-addon' : 'left-addon' }}">
                                                <i class="fa fa-map text-danger" aria-hidden="true"></i>
                                                <select name="nationality" class="form-control icon  paddingIcon placeholder-style"
                                                        required="required">
                                                    <option selected disabled value="">{{ __('messages.nationality') }}</option>
                                                    @foreach($nationalities as $nationality)
                                                        @if( get_default_lang() =="ar")
                                                            <option value="{{$nationality->id}}">{{$nationality->titleAr}}</option>
                                                        @else
                                                            <option value="{{$nationality->id}}">{{$nationality->titleEn}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
                                            <div class="form-group col-sm-6 inner-addon {{ $lang == 'ar' ? 'right-addon' : 'left-addon' }}">
                                                <i class="fa fa-map-marker text-danger"></i>
                                                <select name="placeOfResidence" class="form-control icon  paddingIcon placeholder-style"
                                                        required="required">
                                                    <option selected disabled value="">{{ __('messages.place of residence') }}</option>
                                                    @foreach($residences as $residence)
                                                        @if( get_default_lang() =="ar")
                                                            <option value="{{$residence->id}}">{{$residence->titleAr}}</option>
                                                        @else
                                                            <option value="{{$residence->id}}">{{$residence->titleEn}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
                                            <div class="form-group col-sm-6 inner-addon {{ $lang == 'ar' ? 'right-addon' : 'left-addon' }}">
                                                <i class="fa fa-plane-departure text-danger"
                                                   aria-hidden="true"></i>
                                                <select name="destination" class="form-control icon  paddingIcon placeholder-style">
                                                    <option selected disabled value="">{{ __('messages.destination') }}</option>
                                                    @foreach($destinations as $destination)
                                                        @if( get_default_lang() =="ar")
                                                            <option value="{{$destination->id}}">{{$destination->titleAr}}</option>
                                                        @else
                                                            <option value="{{$destination->id}}">{{$destination->titleEn}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <textarea name="notes" class="form-control"
                                                          placeholder="{{__('messages.any notes')}}" rows="7s"></textarea>
                                            </div>
                                            <input type="submit" class="btn btn-primary btn-send btn-wide mt-15 m-auto" value='{{__("messages.send message")}}'>

                                        </div>
                                    </form>
                                </div>

                            </div>


                        </div>

                    </div>

                    <div class="col-12 col-lg-3 order-lg-first">

                        <aside class="sidebar-wrapper pv on-left mb-50 mb-lg-0 w-100">

                            <nav class="menu-vertical-01">

                                <ul>
                                    <li class="active"><a>{{ $lang == 'ar' ? $service->titleAr : $service->titleEn }}</a></li>
                                    @foreach($services as $service)
                                        <li><a href="{{ url(get_default_lang() . '/services/' . (get_default_lang() == 'ar' ? $service->slugAr : $service->slugEn)) }}">{{ $lang == 'ar' ? $service->titleAr : $service->titleEn }}</a></li>
                                    @endforeach
                                </ul>

                            </nav>

                            <div class="mb-40"></div>
                            <div class="sidebar-box">
                                <div class="box-title">
                                    <h5>{{__("messages.download brochure")}}</h5>
                                </div>

                                <div class="box-content">

                                    <a href="/services/brochure/{{$service->brochure}}" download
                                       class="cta-small-item">
                                            <span class="icon-font">
												<i class="elegent-icon-cloud-download_alt"></i>
											</span>
                                        <h5>{{__("messages.download")}}</h5>
                                        <span class="text-muted">PDF</span>
                                    </a>
                                </div>
                            </div>

                            <div class="mb-40"></div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- end Main Wrapper -->
@endsection
