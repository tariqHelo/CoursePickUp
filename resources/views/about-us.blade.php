@extends('layouts.layouts')
@section('content')
    <!-- start Main Wrapper -->
    <div class="main-wrapper scrollspy-container">

        <section class="page-wrapper">

            <div class="container pt-50">

                <div class="section-title text-center w-100">
                    <h2><span>{{__("messages.عنا")}}</span></h2>
                    <p>{{__("messages.نحن في شركة الرحلات منذ عام 2001")}}</p>
                </div>

                <div class="two-column-css">

                    <p> @if(get_default_lang() =="ar")
                        <p>{!! $data->contentAr !!} </p>
                    @else
                        <p>{!! $data->contentEn !!} </p>
                        @endif</p>


                </div>

                <div class="mb-100"></div>

                <div class="row justify-content-center">

                    <div class="col-12 col-lg-11 col-xl-10">

                        <div class="counting-wrapper">

                            <div class="bg-image overlay-relative"
                                 style="background-image:url('images/image-bg/44.jpg');">

                                <div class="overlay-holder overlay-white opacity-8"></div>

                                <div class="row equal-height cols-1 cols-sm-3 cols-md-3 gap-30">

                                    <div class="col">

                                        <div class="item-counting">
                                            <div class="counting-inner">
                                                <div class="counting-number">
                                                    <span class="counter" data-decimal-delimiter=","
                                                          data-thousand-delimiter="," data-value="{{}}"></span>
                                                </div>
                                                <span class="counting-label">{{__("messages.الزبائن سعداء")}}</span>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col">

                                        <div class="item-counting">
                                            <div class="counting-inner">
                                                <div class="counting-number">
                                                    <span class="counter" data-decimal-delimiter=","
                                                          data-thousand-delimiter="," data-value="{{App\packages::query()->count()}}"></span>
                                                </div>
                                                <span class="counting-label">{{__("messages.برامج سياحية")}}</span>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col">

                                        <div class="item-counting">
                                            <div class="counting-inner">
                                                <div class="counting-number">
                                                    <span class="counter" data-decimal-delimiter=","
                                                          data-thousand-delimiter="," data-value="365"></span>
                                                </div>
                                                <span class="counting-label">Great places</span>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="mb-100"></div>

                <div class="section-title text-center w-100">
                    <h2><span><span>Our</span> features</span></h2>
                    <p>He doors quick child an point</p>
                </div>

                <div class="row cols-1 cols-sm-2 cols-lg-3 gap-20 gap-md-40">

                    <div class="col">
                        <div class="featured-icon-horizontal-01 clearfix">
                            <div class="icon-font">
                                <i class="elegent-icon-gift_alt text-primary"></i>
                            </div>
                            <div class="content">
                                <h6>We ﬁnd better deals</h6>
                                <p class="text-muted">Considered an invitation do introduced sufficient understood
                                    instrument it. </p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="featured-icon-horizontal-01 clearfix">
                            <div class="icon-font">
                                <i class="elegent-icon-wallet text-primary"></i>
                            </div>
                            <div class="content">
                                <h6>Best price guaranteed</h6>
                                <p class="text-muted">Discovery sweetness principle discourse shameless bed one
                                    excellent.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="featured-icon-horizontal-01 clearfix">
                            <div class="icon-font">
                                <i class="elegent-icon-heart_alt text-primary"></i>
                            </div>
                            <div class="content">
                                <h6>Travellers love us</h6>
                                <p class="text-muted">Sentiments of surrounded friendship dispatched connection john
                                    shed hope.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="featured-icon-horizontal-01 clearfix">
                            <div class="icon-font">
                                <i class="elegent-icon-heart_alt text-primary"></i>
                            </div>
                            <div class="content">
                                <h6>Travellers love us</h6>
                                <p class="text-muted">Sentiments of surrounded friendship dispatched connection john
                                    shed hope.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="featured-icon-horizontal-01 clearfix">
                            <div class="icon-font">
                                <i class="elegent-icon-gift_alt text-primary"></i>
                            </div>
                            <div class="content">
                                <h6>We ﬁnd better deals</h6>
                                <p class="text-muted">Considered an invitation do introduced sufficient understood
                                    instrument it. </p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="featured-icon-horizontal-01 clearfix">
                            <div class="icon-font">
                                <i class="elegent-icon-wallet text-primary"></i>
                            </div>
                            <div class="content">
                                <h6>Best price guaranteed</h6>
                                <p class="text-muted">Discovery sweetness principle discourse shameless bed one
                                    excellent.</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mb-100"></div>

                <div class="section-title text-center w-100">
                    <h2><span><span>Our</span> teams</span></h2>
                    <p>People who control making Tourperator run</p>
                </div>

                <div class="row equal-height cols-2 cols-sm-3 cols-lg-4 gap-30 mb-40">

                    <div class="col">

                        <figure class="user-grid">

                            <div class="image">
                                <img src="images/image-man/01.jpg" alt="Team" class="img-circle"/>
                            </div>

                            <figcaption class="content">

                                <h6 class="text-uppercase">Robert Smith</h6>
                                <p>CEO</p>
                                <ul class="social">
                                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>

                            </figcaption>

                        </figure>

                    </div>

                    <div class="col">

                        <figure class="user-grid">

                            <div class="image">
                                <img src="images/image-man/02.jpg" alt="Team" class="img-circle"/>
                            </div>

                            <figcaption class="content">

                                <h6 class="text-uppercase">Ange Ermolova</h6>
                                <p>Manager</p>
                                <ul class="social">
                                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>

                            </figcaption>

                        </figure>

                    </div>

                    <div class="col">

                        <figure class="user-grid">

                            <div class="image">
                                <img src="images/image-man/03.jpg" alt="Team" class="img-circle"/>
                            </div>

                            <figcaption class="content">

                                <h6 class="text-uppercase">Chaiyapatt Putsathit</h6>
                                <p>Marketing</p>
                                <ul class="social">
                                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>

                            </figcaption>

                        </figure>

                    </div>

                    <div class="col">

                        <figure class="user-grid">

                            <div class="image">
                                <img src="images/image-man/04.jpg" alt="Team" class="img-circle"/>
                            </div>

                            <figcaption class="content">

                                <h6 class="text-uppercase">Khairoz Nadzri</h6>
                                <p>Accounting</p>
                                <ul class="social">
                                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>

                            </figcaption>

                        </figure>

                    </div>

                    <div class="col">

                        <figure class="user-grid">

                            <div class="image">
                                <img src="images/image-man/03.jpg" alt="Team" class="img-circle"/>
                            </div>

                            <figcaption class="content">

                                <h6 class="text-uppercase">Chaiyapatt Putsathit</h6>
                                <p>Marketing</p>
                                <ul class="social">
                                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>

                            </figcaption>

                        </figure>

                    </div>

                    <div class="col">

                        <figure class="user-grid">

                            <div class="image">
                                <img src="images/image-man/04.jpg" alt="Team" class="img-circle"/>
                            </div>

                            <figcaption class="content">

                                <h6 class="text-uppercase">Khairoz Nadzri</h6>
                                <p>Accounting</p>
                                <ul class="social">
                                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>

                            </figcaption>

                        </figure>

                    </div>

                    <div class="col">

                        <figure class="user-grid">

                            <div class="image">
                                <img src="images/image-man/01.jpg" alt="Team" class="img-circle"/>
                            </div>

                            <figcaption class="content">

                                <h6 class="text-uppercase">Robert Smith</h6>
                                <p>CEO</p>
                                <ul class="social">
                                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>

                            </figcaption>

                        </figure>

                    </div>

                    <div class="col">

                        <figure class="user-grid">

                            <div class="image">
                                <img src="images/image-man/02.jpg" alt="Team" class="img-circle"/>
                            </div>

                            <figcaption class="content">

                                <h6 class="text-uppercase">Ange Ermolova</h6>
                                <p>Manager</p>
                                <ul class="social">
                                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>

                            </figcaption>

                        </figure>

                    </div>

                </div>

            </div>

        </section>

        <section class="brands-section pt-10 pb-10">
            <div class="container image-responsive">
                <div class="brand-slider">
                    <div class="brand-img">
                        <img src="images/image-logo/logo-sm-bl-04.png">
                    </div>
                    <div class="brand-img">
                        <img src="images/image-logo/logo-sm-bl-08.png">
                    </div>
                    <div class="brand-img">
                        <img src="images/image-logo/logo-sm-bl-04.png">
                    </div>
                    <div class="brand-img">
                        <img src="images/image-logo/logo-sm-bl-08.png">
                    </div>
                    <div class="brand-img">
                        <img src="images/image-logo/logo-sm-bl-08.png">
                    </div>
                    <div class="brand-img">
                        <img src="images/image-logo/logo-sm-bl-04.png">
                    </div>
                    <div class="brand-img">
                        <img src="images/image-logo/logo-sm-bl-08.png">
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- end Main Wrapper -->
@endsection
