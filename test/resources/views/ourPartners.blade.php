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
                                    <a href="#"><i class="fas fa-home"></i></a>
                                    <li style="margin: 5px 5px;"
                                        @if( get_default_lang() =="ar")class="oi oi-arrow-thick-left"
                                        @else class="oi oi-arrow-thick-right" @endif></li>
                                    <li class="breadcrumb-item active"
                                        aria-current="page">{{__("messages.شركاؤنا")}}</li>
                                </ol>
                            </nav>
                            <h4 class="mt-0 line-125">{{__("messages.شركاؤنا")}}</h4>

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
                                            <h1>@if( get_default_lang() =="ar"){{$data->titleAr}} @else {{$data->titleEn}} @endif</h1>
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

                                            <div class="container">
                                                @if(app()->getLocale() == 'ar')
                                                <h4 class="heading-title"><span>هل  <span class="font200">ترغب في أن تكون أحد شركائنا الرائعين؟ أرسل لنا رسالة</span></span></h4>
                                                @else
                                                <h4 class="heading-title"><span>Interested <span class="font200">to be one of our amazing partners? Send us a massage</span></span></h4>
                                                @endif      

                                                <form action="{{route('sendLeadsPageOurPartners')}}"
                                                      method="POST"
                                                      enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="row gap-20 align-items-center mb-0 mt-30">

                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <input type="text" name="fName"
                                                                       class="form-control icon "
                                                                       required="required"
                                                                       placeholder="{{__('messages.full name')}}"
                                                                       data-error="Your name is required."></div>
                                                        </div>


                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <input type="email" name="email"
                                                                       class="form-control icon "
                                                                       required="required"
                                                                       placeholder="{{__("messages.email address")}}"
                                                                       data-error="Valid email is required."></div>
                                                        </div>

                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <input type="text" name="phone"
                                                                       class="form-control icon "
                                                                       placeholder="{{__("messages.mobile number")}}"
                                                                       required="required"></div>
                                                        </div>

                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <input type="text" name="institution" class="form-control"
                                                                       placeholder="{{__("messages.institution name")}}"/>
                                                            </div>
                                                        </div>


                                                        <div class="col-12 col-md-12">
                                                            <div class="form-group">
                                                                <textarea class="form-control" name="notes" rows="9"
                                                                          placeholder="{{__("messages.any notes")}}"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-md-2">
                                                            <div class="col-inner">
{{--                                                                <a href="thank_you1.html"--}}
{{--                                                                   class="btn btn-primary btn-block">Submit</a>--}}

                                                                <input type="submit" class="btn px-0 btn-primary btn-block" value='{{__("messages.إرسال الإستشارة")}}'>

                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="col-inner">
                                                                <span class="font-italic font12 text-danger">* is neccesary field</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </form>
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
