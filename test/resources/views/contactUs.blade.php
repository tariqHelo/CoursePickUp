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
                                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item active"
                                        aria-current="page">{{__("messages.اتصل بنا")}}</li>
                                </ol>
                            </nav>

                            <h4 class="mt-0 line-125">{{__("messages.اتصل بنا")}}</h4>

                        </div>

                    </div>

                </div>

            </div>

            <div class="container pv-60">

                <div class="map-contact-wrapper">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d623523.5289838408!2d27.56473815143242!3d39.723641221623694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cab6515a60157b%3A0x22ac9af4915a1de8!2s%C4%B0stanbul%2C%20Turkey!5e0!3m2!1sen!2seg!4v1599143803249!5m2!1sen!2seg"
                        width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""
                        aria-hidden="false" tabindex="0"></iframe>
                </div>

                <div class="mb-50"></div>

                <div class="row gap-50 gap-lg-0">

                    <div class="col-12 col-lg-5 col-xl-4 mb-60">

                        <h4 class="heading-title"><span>{{__("messages.أرسل لنا رسالة:")}}</span>
                        </h4>

                        <form action="{{route('formSendContactUs')}}"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="contact-successful-messages"></div>

                            <div class="contact-inner">

                                <div class="form-group">
                                    <label for="form_name">{{__("messages.الإسم")}}</label>
                                    <input id="form_name" type="text" name="fName" class="form-control"
                                           required="required" data-error="Your name is required.">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>

                                <div class="form-group">
                                    <label for="form_email">{{__("messages.البريد الإلكتروني")}}</label>
                                    <input id="form_email" type="email" name="email" class="form-control"
                                           required="required" data-error="Valid email is required.">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>

                                <div class="form-group">
                                    <label for="form_subject">{{__("messages.الموضوع")}}</label>
                                    <input id="form_subject" type="text" name="subject" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="form_message">{{__("messages.نص الرسالة")}}</label>
                                    <textarea id="form_message" name="notes" class="form-control" rows="7s"
                                              required="required" data-error="Please,leave us a message."></textarea>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>

                                <a>
                                    <input type="submit" class="btn btn-primary btn-send btn-wide mt-15"
                                           value="{{__("messages.إرسال")}}">
                                </a>

                                {{--                                <input type="submit" class="btn btn-primary btn-block" value='{{__("messages.إرسال الإستشارة")}}'>--}}


                            </div>

                        </form>

                    </div>

                    <div class="col-12 col-lg-6 ml-auto" style="padding-right:5%;">

                        <h4 class="heading-title"><span>{{__("messages.معلومات التواصل معنا:")}}</span>
                        </h4>
                        <p class="post-heading">Please feel free to contact us by Form, Email, or phone, We are more
                            than happy to answer all inquiries.
                        </p>

                        <ul class="contact-list-01">

                            <li>
                                <span class="icon-font"><i class="ion-android-pin"></i></span>
                                <h6>{{__("messages.العنوان")}}</h6>
                                545, Marina Rd.,<br/>Mohammed Bin Rashid Boulevard,<br/>Dubai 123234
                            </li>

                            <li>
                                <span class="icon-font"><i class="ion-android-mail"></i></span>
                                <h6>{{__("messages.البريد الإلكتروني")}}</h6>
                                <a href="#">{{App\generalSetting::query()->find(7)->value}}</a>
                            </li>

                            <li>
                                <span class="icon-font"><i class="ion-android-call"></i></span>
                                <h6>{{__("messages.رقم الموبايل")}}</h6>
                                1-866-599-6674
                            </li>


                        </ul>

                        <div class="mb-50"></div>

                        <h4 class="heading-title"><span>{{__("messages.تجدنا على:")}}</span></span>
                        </h4>

                        <div class="social-btns-01">
                            <a href="{{App\generalSetting::query()->find(8)->value}}"><i
                                    class="fab fa-facebook-square"></i></a>
                            <a href="{{App\generalSetting::query()->find(9)->value}}"><i
                                    class="fab fa-instagram"></i></a>
                            <a href="{{App\generalSetting::query()->find(10)->value}}"><i
                                    class="fab fa-twitter-square"></i></a>
                            <a href="{{App\generalSetting::query()->find(11)->value}}"><i
                                    class="fab fa-youtube-square"></i></a>
                            <a href="{{App\generalSetting::query()->find(12)->value}}"><i
                                    class="fab fa-linkedin"></i></a>
                        </div>

                    </div>

                </div>

            </div>

        </section>

    </div>
    <!-- end Main Wrapper -->



@endsection
