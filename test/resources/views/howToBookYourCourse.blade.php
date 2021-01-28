@extends('layouts.layouts')
@section('content')
    <!-- start Main Wrapper -->
    <div class="main-wrapper scrollspy-container">

        <section class="page-wrapper page-detail">

            <div class="page-title bg-light border-bottom pt-25 mb-0 border-bottom-0">

                <div class="container">

                    <div class="row gap-15 align-items-center">

                        <div class="col-12 col-md-7">

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <a href="#"><i class="fas fa-home"></i></a>  <li style="margin: 5px 5px;" @if( get_default_lang() =="ar")class="oi oi-arrow-thick-left"@else class="oi oi-arrow-thick-right" @endif></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{__("messages.كيف تحجز دورتك")}}</li>
                                </ol>
                            </nav>
                            <h4 class="mt-0 line-125">{{__("messages.كيف تحجز دورتك")}}</h4>

                            <!-- <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Blogs</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Blog single - full width</li>
                                </ol>
                            </nav> -->

                        </div>

                    </div>

                </div>

            </div>

            <div class="container pt-30">

                <div class="row gap-20 gap-lg-40">

                    <div class="col-12 col-lg-12">

                        <div class="content-wrapper">

                            <article class="blog-single-wrapper full-width">

                                <div class="row justify-content-center ">

                                    <div class="col-12 col-lg-10 col-xl-9">

                                        <div class="blog-single-heading text-center">
                                            <h1> @if( get_default_lang() =="ar"){{$data->titleAr}} @else {{$data->titleEn}} @endif</h1>
                                            <!-- <ul class="meta-list text-muted">
                                                <li>by <a href="#">Admin</a></li>
                                                <li>on January 09, 2019</li>
                                                <li>in <a href="#">Adventure</a>, <a href="#">Backpack</a></li>
                                                <li>32 comments</li>
                                            </ul> -->
                                        </div>

                                    </div>

                                </div>

                                <div class="image">
                                    <img src="{{asset("$data->image")}}" alt="images"/>
                                </div>

                                <div class="row justify-content-center ">

                                    <div class="col-12 col-lg-10 col-xl-9">

                                        <div class="blog-entry">

                                            <p>{!! $data->contentAr !!} </p>


                                            <div class="row gap-30 mt-40">


                                            </div>

                                        </div>


                                        <!-- End Comment -->
                                        <!--
                                        <div class="mb-50"></div> -->

                                        <div class="border-top pv-60">

                                            <h4 class="heading-title"><span>{{__("messages.احصل على استشارة مجانية")}} </span></h4>

                                            <div class="container">

                                                <div class="col-12">
                                                    <form  action="{{route('sendLeadsPageHowToBookYourCourse')}}"
                                                           method="POST"
                                                           enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="contact-successful-messages"></div>
                                                        <div class="contact-inner row">
                                                            <div @if(get_default_lang()=="ar") class="form-group col-sm-6 inner-addon right-addon" @else  class="form-group col-sm-6 inner-addon left-addon" @endif>
                                                                <i class="fa fa-user text-danger"></i>

                                                                <input type="text" name="fName" class="form-control icon "
                                                                       required="required" placeholder="{{__('messages.full name')}}"
                                                                       data-error="Your name is required.">
                                                                <div class="help-block with-errors text-danger">


                                                                </div>
                                                            </div>
                                                            <div  @if(get_default_lang()=="ar") class="form-group col-sm-6 inner-addon right-addon" @else  class="form-group col-sm-6 inner-addon left-addon" @endif>
                                                                <i class="fa fa-envelope text-danger"></i>
                                                                <input type="email" name="email" class="form-control icon "
                                                                       required="required" placeholder="{{__("messages.email address")}}"
                                                                       data-error="Valid email is required.">
                                                                <div class="help-block with-errors text-danger"></div>
                                                            </div>
                                                            <div @if(get_default_lang()=="ar") class="form-group col-sm-6 inner-addon right-addon" @else  class="form-group col-sm-6 inner-addon left-addon" @endif >
                                                                <i class="fa fa-phone text-danger" aria-hidden="true"></i>
                                                                <input type="text" name="phone" class="form-control icon "
                                                                       placeholder="{{__("messages.mobile number")}}" required="required">
                                                            </div>
                                                            <div  class="form-group col-sm-6 inner-addon right-addon">
                                                                <i class="fa fa-map text-danger" aria-hidden="true"></i>
                                                                <select name="nationality" class="form-control icon  paddingIcon"
                                                                        required="required">
                                                                    <option selected disabled value="">{{ __('messages.nationality') }}</option>
                                                                    @foreach($nationalities as $nationality)
                                                                        @if( get_default_lang() =="ar")
                                                                            <option value="{{$nationality->id}}">{{$nationality->titleAr}}</option>
                                                                        @else
                                                                            <option style="" value="{{$nationality->id}}">{{$nationality->titleEn}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                                <div class="help-block with-errors text-danger"></div>
                                                            </div>
                                                            <div @if(get_default_lang()=="ar") class="form-group col-sm-6 inner-addon right-addon" @else  class="form-group col-sm-6 inner-addon left-addon" @endif>
                                                                <i class="fa fa-map-marker text-danger"></i>
                                                                <select name="placeOfResidence" class="form-control icon  paddingIcon"
                                                                        required="required">
                                                                    <option selected disabled value="">{{ __('messages.place of residence') }}</option>
                                                                    @foreach($cities as $city)
                                                                        @if( get_default_lang() =="ar")
                                                                            <option value="{{$city->id}}">{{$city->titleAr}}</option>
                                                                        @else
                                                                            <option value="{{$city->id}}">{{$city->titleEn}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                                <div class="help-block with-errors text-danger"></div>
                                                            </div>
                                                            <div @if(get_default_lang()=="ar") class="form-group col-sm-6 inner-addon right-addon" @else  class="form-group col-sm-6 inner-addon left-addon" @endif>
                                                                <i class="fa fa-plane-departure text-danger"
                                                                   aria-hidden="true"></i>
                                                                <select name="destination" class="form-control icon  paddingIcon">
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
                                                                      placeholder="{{__("messages.any notes")}}" rows="7s"></textarea>
                                                            </div>

                                                            {{--                                                        <button type="submit"--}}
                                                            {{--                                                             > {{__("messages.إرسال الإستشارة")}}--}}
                                                            {{--                                                        </button>--}}
                                                            <input type="submit" class="btn btn-primary btn-send btn-wide mt-15 m-auto" value='{{__("messages.إرسال الإستشارة")}}'>


                                                        </div>

                                                    </form>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>

                </div>

            </div>

        </section>

    </div>
    <!-- end Main Wrapper -->



@endsection
