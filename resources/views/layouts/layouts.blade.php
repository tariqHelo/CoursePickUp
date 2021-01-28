<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title Of Site -->
    <title>
        {{ $pageTitle ?? setting('siteName') }}
    </title>
    <meta name="description" content="@yield('meta-description')"/>
    <meta name="keywords"
          content="@yield('meta-keywords')"/>
    <meta name="author" content="crenoveative">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#FF1944">


    <!-- Fav and Touch Icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('site/' .setting('favicon')) }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('site/' .setting('favicon')) }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('site/' .setting('favicon')) }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('site/' .setting('favicon')) }}">
    <link rel="shortcut icon" href="{{ asset('site/' .setting('favicon')) }}">

    <!-- Font face -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;400;700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i|Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;display=swap"
        rel="stylesheet">
    <link href="font-faces/metropolis/metropolis.css" rel="stylesheet">


@if(app()->getLocale() =='en')
    <!-- CSS Plugins -->

        <link href="{{asset('students/css/font-icons.css')}}" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="{{asset('students/bootstrap/css/bootstrap.min.css')}}"
              media="screen">
        {{-- <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous"> --}}

        <link href="{{asset('students/css/animate.html')}}" rel="stylesheet">
        <link href="{{asset('students/css/main.css')}}" rel="stylesheet">
        <link href="{{asset('students/css/plugin.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('students/css/select-date.css')}}">
        <!-- CSS Custom -->
        <link href="{{asset('students/css/style.css')}}" rel="stylesheet">
        <!-- CSS Custom -->
        <link href="{{asset('students/css/your-style.css')}}" rel="stylesheet">
@else

    <!-- CSS Plugins -->
        <link href="{{asset('students/css/bootstrap-rtl.css')}}" rel="stylesheet">
        <link href="{{asset('students/css/font-icons.css')}}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('students/bootstrap/css/bootstrap.min.css')}}"
              media="screen">
        <link href="{{asset('students/css/animate.html')}}" rel="stylesheet">
        <link href="{{asset('students/css/main-rtl.css')}}" rel="stylesheet">
        <link href="{{asset('students/css/plugin_rtl.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('students/css/select-date.css')}}">
        <!-- CSS Custom -->
        <link href="{{asset('students/css/style-rtl.css')}}" rel="stylesheet">
        <!-- CSS Custom -->
        <link href="{{asset('students/css/your-style.css')}}" rel="stylesheet">
@endif


@if(app()->getLocale() =='ar')
<link href="{{asset('students/css/custom-rtl.css')}}" rel="stylesheet">
@endif



<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        h6,
        .h6 {
            font-size: 14px;
            letter-spacing: 0px;
        }
    </style>

</head>


<body class="with-waypoint-sticky">



    
<!-- start Body Inner -->
<div class="body-inner">


    <!-- start Header -->
@include('layouts.header')
<!-- start Header -->


    @yield('content')


</div>
<!-- end Body Inner -->


<!-- start Footer Wrapper -->

@include('layouts.footer')

<!-- start Footer Wrapper -->


<!-- end Body Inner -->


<!-- start Login modal -->
<div class="modal fade modal-with-tabs form-login-modal" id="loginFormTabInModal"
     aria-labelledby="modalWIthTabsLabel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content shadow-lg">

            <nav class="d-none">
                <ul class="nav external-link-navs clearfix">
                    <li><a class="active" data-toggle="tab" href="#loginFormTabInModal-login">Sign-in</a></li>
                    <li><a data-toggle="tab" href="#loginFormTabInModal-register">Register </a></li>
                    <li><a data-toggle="tab" href="#loginFormTabInModal-forgot-pass">Forgot Password </a></li>
                </ul>
            </nav>

            <div class="tab-content">

                <div role="tabpanel" class="tab-pane active" id="loginFormTabInModal-login">

                    <div class="form-login">

                        <div class="form-header">
                            <h4>Welcome Back to SiteName</h4>
                            <p>Sign in to your account to continue using SiteName</p>
                        </div>

                        <div class="form-body">

                            <form method="post" action="#">

                                <div class="d-flex flex-column flex-lg-row align-items-stretch">

                                    <div class="flex-md-grow-1 bg-primary-light">

                                        <div class="form-inner">
                                            <div class="form-group">
                                                <label>Email adress/username</label>
                                                <input required type="text" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input required type="password" class="form-control"/>
                                            </div>
                                            <div class="d-flex flex-column flex-md-row mt-25">
                                                <div class="flex-shrink-0">
                                                    <a href="#" class="btn btn-primary btn-wide">Sign-in</a>
                                                </div>
                                                <div class="ml-0 ml-md-15 mt-15 mt-md-0">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="loginFormTabInModal-rememberMe">
                                                        <label class="custom-control-label"
                                                               for="loginFormTabInModal-rememberMe">Remember me</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#loginFormTabInModal-forgot-pass"
                                               class="tab-external-link block mt-25 font600">Forgot password?</a>
                                        </div>

                                    </div>

                                    <div class="form-login-socials">
                                        <div class="login-socials-inner">
                                            <h5 class="mb-20">Or sign-up with your socials</h5>
                                            <button class="btn btn-login-with btn-facebook btn-block"><i
                                                    class="fab fa-facebook"></i> facebook
                                            </button>
                                            <button class="btn btn-login-with btn-google btn-block"><i
                                                    class="fab fa-google"></i> google
                                            </button>
                                            <button class="btn btn-login-with btn-twitter btn-block"><i
                                                    class="fab fa-twitter"></i> google
                                            </button>
                                        </div>
                                    </div>

                                </div>

                            </form>

                        </div>

                        <div class="form-footer">
                            <p>Not a member yet? <a href="#loginFormTabInModal-register"
                                                    class="tab-external-link font600">Sign up</a> for free</p>
                        </div>

                    </div>

                </div>

                <div role="tabpanel" class="tab-pane fade in" id="loginFormTabInModal-register">

                    <div class="form-login">

                        <div class="form-header">
                            <h4>Join SiteName for Free</h4>
                            <p>Access thousands of online classes in design, business, and more!</p>
                        </div>

                        <div class="form-body">

                            <form method="post" action="#">

                                <div class="d-flex flex-column flex-lg-row align-items-stretch">

                                    <div class="flex-grow-1 bg-primary-light">

                                        <div class="form-inner">
                                            <div class="form-group">
                                                <label>Full name</label>
                                                <input required type="text" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Email adress</label>
                                                <input required type="text" class="form-control"/>
                                            </div>
                                            <div class="row cols-2 gap-10">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input required type="password" class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Confirm password</label>
                                                        <input required type="password" class="form-control"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-login-socials">
                                        <div class="login-socials-inner">
                                            <h5 class="mb-20">Or sign-in with your socials</h5>
                                            <button class="btn btn-login-with btn-facebook btn-block"><i
                                                    class="fab fa-facebook"></i> facebook
                                            </button>
                                            <button class="btn btn-login-with btn-google btn-block"><i
                                                    class="fab fa-google"></i> google
                                            </button>
                                            <button class="btn btn-login-with btn-twitter btn-block"><i
                                                    class="fab fa-twitter"></i> google
                                            </button>
                                        </div>
                                    </div>

                                </div>

                                <div class="d-flex flex-column flex-md-row mt-30 mt-lg-10">
                                    <div class="flex-shrink-0">
                                        <a href="#" class="btn btn-primary btn-wide mt-5">Sign-up</a>
                                    </div>
                                    <div class="pt-1 ml-0 ml-md-15 mt-15 mt-md-0">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="loginFormTabInModal-acceptTerm">
                                            <label class="custom-control-label line-145"
                                                   for="loginFormTabInModal-acceptTerm">By clicking this, you are agree
                                                to to our <a href="#">terms of use</a> and <a href="#">privacy
                                                    policy</a> including the use of cookies</label>
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>

                        <div class="form-footer">
                            <p>Already a member? <a href="#loginFormTabInModal-login"
                                                    class="tab-external-link font600">Sign in</a></p>
                        </div>

                    </div>

                </div>

                <div role="tabpanel" class="tab-pane fade in" id="loginFormTabInModal-forgot-pass">

                    <div class="form-login">

                        <div class="form-header">
                            <h4>Lost your password?</h4>
                            <p>Please provide your detail.</p>
                        </div>

                        <div class="form-body">
                            <form method="post" action="#">
                                <p class="line-145">We'll send password reset instructions to the email address
                                    associated with your account.</p>
                                <div class="row">
                                    <div class="col-12 col-md-10 col-lg-8">
                                        <div class="form-group">
                                            <input required type="password" class="form-control"
                                                   placeholder="password"/>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary mt-5">Retreive password</button>
                            </form>
                        </div>

                        <div class="form-footer">
                            <p>Back to <a href="#loginFormTabInModal-login" class="tab-external-link font600">Sign
                                    in</a> or <a href="#loginFormTabInModal-register"
                                                 class="tab-external-link font600">Sign up</a></p>
                        </div>

                    </div>

                </div>

            </div>

            <div class="text-center pb-20">
                <button type="button" class="close" data-dismiss="modal" aria-labelledby="Close">
                    <span aria-hidden="true"><i class="far fa-times-circle"></i></span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end Login modal -->


<!-- start Back To Top -->
<a id="back-to-top" href="#" class="back-to-top" role="button" title="Click to return to top" data-toggle="tooltip"
   data-placement="left"><i class="elegent-icon-arrow_carrot-up"></i></a>
<!-- end Back To Top -->

<!-- Call center -->
<div id="call-center">
    <div class="call-img">
        <img src="{{ asset('students/images/icons/call-phone.svg')}}">
    </div>
    <div class="call-link">
        <h6>{{ __('messages.talk to our consultants now') }}</h6>
        <a href="call-center.html" class="btn btn-primary btn-block d-none d-md-block " data-toggle="modal" data-target="#call-center-modal">{{ __('messages.for a free consultation') }}</a>
        <a href="call-center.html" class="d-block d-md-none text-primary" data-toggle="modal" data-target="#call-center-modal"><i class="{{ get_default_lang() == 'ar' ? 'fas fa-arrow-alt-circle-left' : 'fas fa-arrow-alt-circle-right'}}"></i></a>
    </div>
    <button class="close">x</button>
</div>

<!-- call center modal -->
<div class="modal fade call-center-modal" id="call-center-modal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{__('messages.get free consultation')}}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row gap-50 gap-lg-0">
                        <div class="col-12">
                            <form action="{{route('sendLeadsPageHowToBookYourCourse')}}"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="contact-successful-messages"></div>
                                <div class="contact-inner row">
                                    <div
                                        class="form-group col-sm-6 inner-addon {{ get_default_lang() == 'ar' ? 'right-addon' : 'left-addon' }}">
                                        <i class="fa fa-user text-danger"></i>

                                        <input type="text" name="fName" class="form-control icon "
                                               required="required" placeholder="{{__('messages.full name')}}"
                                               data-error="Your name is required.">
                                        <div class="help-block with-errors text-danger">


                                        </div>
                                    </div>
                                    <div
                                        class="form-group col-sm-6 inner-addon {{ get_default_lang() == 'ar' ? 'right-addon' : 'left-addon' }}">
                                        <i class="fa fa-envelope text-danger"></i>
                                        <input type="email" name="email" class="form-control icon "
                                               required="required" placeholder="{{__("messages.email address")}}"
                                               data-error="Valid email is required.">
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                    <div
                                        class="form-group col-sm-6 inner-addon {{ get_default_lang() == 'ar' ? 'right-addon' : 'left-addon' }}">
                                        <i class="fa fa-phone text-danger" aria-hidden="true"></i>
                                        <input type="text" name="phone" class="form-control icon "
                                               placeholder="{{__("messages.mobile number")}}" required="required">
                                    </div>
                                    <div
                                        class="form-group col-sm-6 inner-addon {{ get_default_lang() == 'ar' ? 'right-addon' : 'left-addon' }}">
                                        <i class="fa fa-map text-danger" aria-hidden="true"></i>
                                        <select name="nationality" class="form-control icon  paddingIcon"
                                                required="required">
                                            <option selected disabled value="">{{ __('messages.nationality') }}</option>
                                            @foreach($nationalities as $nationality)
                                                @if( get_default_lang() =="ar")
                                                    <option
                                                        value="{{$nationality->id}}">{{$nationality->titleAr}}</option>
                                                @else
                                                    <option
                                                        value="{{$nationality->id}}">{{$nationality->titleEn}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                    <div
                                        class="form-group col-sm-6 inner-addon {{ get_default_lang() == 'ar' ? 'right-addon' : 'left-addon' }}">
                                        <i class="fa fa-map-marker text-danger"></i>
                                        <select name="placeOfResidence" class="form-control icon  paddingIcon"
                                                required="required">
                                            <option selected disabled value="">{{ __('messages.place of residence') }}</option>
                                            @foreach(\App\residences::where('status', 1)->get() as $residence)
                                                @if( get_default_lang() =="ar")
                                                    <option value="{{$residence->id}}">{{$residence->titleAr}}</option>
                                                @else
                                                    <option value="{{$residence->id}}">{{$residence->titleEn}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                    <div
                                        class="form-group col-sm-6 inner-addon {{ get_default_lang() == 'ar' ? 'right-addon' : 'left-addon' }}">
                                        <i class="fa fa-plane-departure text-danger"
                                           aria-hidden="true"></i>
                                        <select name="destination" class="form-control icon  paddingIcon">
                                            <option selected disabled value="">{{ __('messages.destination') }}</option>
                                            @foreach($destinations as $destination)
                                                @if( get_default_lang() =="ar")
                                                    <option
                                                        value="{{$destination->id}}">{{$destination->titleAr}}</option>
                                                @else
                                                    <option
                                                        value="{{$destination->id}}">{{$destination->titleEn}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <textarea name="notes" class="form-control"
                                            placeholder="{{__("messages.any notes")}}"
                                            rows="2s"></textarea>
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-send btn-wide mt-15 m-auto"
                                           value='{{__("messages.send message")}}'>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS -->
<script type="text/javascript" src="{{asset('students/js/jquery-2.2.4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('students/js/plugins.js')}}"></script>
<script type="text/javascript" src="{{asset('students/js/select-date.js')}}"></script>
<script type="text/javascript" src="{{asset('students/js/custom-core.js')}}"></script>

<!-- select-date -->

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const $form = document.getElementById('SearchForm');
        initDateWidget($form);
    });
</script>
<script>
    GLOBAL = {};
</script>

@yield('script')


</body>


</html>
