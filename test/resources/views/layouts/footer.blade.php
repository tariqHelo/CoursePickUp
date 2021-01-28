<footer class="footer-wrapper light scrollspy-footer">

    <div class="footer-top">

        <div class="container">

            <div class="row shrink-auto-md align-items-lg-center gap-10">

                <div class="col-12 col-shrink order-last-md">

                    <div class="col-inner">

                        <div class="footer-dropdowns">

                            <div class="row shrink-auto gap-30 align-items-center">

                                <div class="col-auto">

                                    <div class="col-inner">

                                        <div class="dropdown dropdown-smooth-01 dropdown-language dropdown-footers">
                                            <a href="#" class="btn btn-text-inherit btn-interactive"
                                               id="dropdownLangauge" data-toggle="dropdown" aria-haspopup="true"
                                               aria-expanded="false">
                                                <span class="image"><img
                                                    @if(get_default_lang()=="ar")
                                                    src="{{asset('languages\ar.png')}}"

                                                    @else
                                                    src="{{asset('languages\en.png')}}"
                                                    @endif
                                                    alt="image"/>
                                                </span>
                                                <span class="mx-2">{{__("messages.languages")}}</span>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownLangauge">
                                                <div class="dropdown-menu-inner">
                                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                        <a class="dropdown-item" rel="alternate"
                                                           hreflang="{{ $localeCode }}"
                                                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                                           data-i18n="nav.dash.ecommerce">
                                                            <!-- <form id="logout-form" action="{{ route('logout')}}"
                                                                  method="POST"
                                                                  style="display: none;">
                                                                @csrf
                                                            </form> -->
                                                            <span class="image"><img src="{{asset('/languages/' . $localeCode . '.png') }}" alt="image"></span>
                                                            {{ $properties['native'] }}
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-shrink">

                                    <div class="col-inner">

                                        <div class="dropdown dropdown-smooth-01 dropdown-currency">
                                            <a href="#" class="btn mx-2 btn-text-inherit btn-interactive"
                                               id="dropdownCurrency" data-toggle="dropdown" aria-haspopup="true"
                                               aria-expanded="false">
                                                <span class="icon-font"><i
                                                    class="oi oi-dollar text-primary"></i>
                                                </span>
                                                <span class="mx-2">{{__("messages.coins")}}</span>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownCurrency">
                                                <div class="dropdown-menu-inner {{ get_default_lang() == 'ar' ? 'text-right' : 'text-left' }}">
                                                    @foreach ($currencies = \App\currency::all() as $currency)
                                                    <a class="dropdown-item" href="{{ route('setCurrency', $currency->code) }}">
                                                        <span class="icon-font"><i class="oi oi-dollar text-primary oi-currency mx-0"></i>
                                                        </span>
                                                        {{ $currency->code }} {{ get_default_lang() == 'ar' ? $currency->titleAr : $currency->titleEn }}
                                                    </a>
                                                    @endforeach
                                                    <!-- <a class="dropdown-item" href="#">
                                                        <span class="icon-font"><i class="oi oi-british-pound text-primary oi-currency"></i>
                                                        </span>
                                                        UK {{__("messages.جنيه")}}
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <span class="icon-font"><i class="oi oi-euro text-primary oi-currency"></i>
                                                        </span>
                                                        EU {{__("messages.يورو")}}
                                                    </a> -->

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-12 col-auto">

                    <div class="col-inner">
                        <ul class="footer-contact-list">
                            <li dir="LTR">
                                <span class="icon-font text-primary inline-block-middle font16"><i
                                        class="fa fa-phone"></i></span> <span class="font700 text-black mx-2" dir="LTR">{{ setting('phoneNumber') }}
                                    </span> <span class="text-muted">{{ get_default_lang() == 'ar' ? getValueOfOptionFooter('workDaysTo') : getValueOfOptionFooter('workDaysFrom') }}</span>
                            </li>
                            <li dir="LTR">
                                <span class="icon-font text-primary inline-block-middle font16"><i
                                        class="fa fa-envelope"></i></span> <span
                                    class="font700 text-black mx-2">{{setting('email')}}</span>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>

            <hr class="opacity-7"/>

        </div>

    </div>

    <div class="main-footer">
        <div class="container">
            <div class="row gap-50">
                <div class="col-12 col-lg-5">
                    <div class="footer-logo uplogo">
                        <a href="/">
                            <img src="{{ asset('site/' . setting('logo')) }}" alt="images"/>
                        </a>
                    </div>

                    <p class="mt-20">
                        {{ get_default_lang() == 'ar' ? getValueOfOptionFooter('aboutCompanyTitleAr') : getValueOfOptionFooter('aboutCompanyTitleEn') }}
                    </p>

                    <a href="{{ url(get_default_lang() . '/about/us') }}"
                        class="text-capitalize font14 h6 line-1 mb-0 font500 mt-30">{{__("messages.read more")}}
                        <i class="font18 inline-block-middle {{ get_default_lang()=='ar' ? 'elegent-icon-arrow_left' : 'elegent-icon-arrow_right' }}"></i>
                    </a>
                </div>

                <div class="col-12 col-lg-7">
                    <div class="col-inner">
                        <div class="row shrink-auto-sm gap-30">
                            <div class="col-6 col-shrink">
                                <div class="col-inner">
                                    <h5 class="footer-title">
                                        {{ get_default_lang() == 'ar' ? getValueOfOptionFooter('generalInformationAr') : getValueOfOptionFooter('generalInformationEn') }}
                                    </h5>
                                    <ul class="footer-menu-list set-width">
                                        <li><a href="{{route('aboutUs')}}">{{__("messages.about us")}}</a></li>
                                        <li><a href="{{route('whoWeAre')}}">{{__("messages.who we are")}}</a></li>
                                        <li><a href="{{route('ourPartners')}}">{{__("messages.our partners")}}</a></li>
                                        <li><a href="{{route('workWithUs')}}">{{__("messages.work with us")}}</a></li>
                                        <li><a href="{{route('refundPolicy')}}">{{__("messages.refund policy")}}
                                            </a></li>
                                        <li><a href="{{route('termsConditions')}}">{{__("messages.terms & conditions")}}</a>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                            <div class="col-6 col-shrink">
                                <div class="col-inner">
                                    <h5 class="footer-title">
                                        {{ get_default_lang() == 'ar' ? getValueOfOptionFooter('customerServiceTitleAr') : getValueOfOptionFooter('customerServiceTitleEn') }}
                                    </h5>
                                    <ul class="footer-menu-list set-width">
                                        <li><a href="{{route('whyBookWithUs')}}">{{__("messages.why book with us?")}}</a></li>
                                        <li><a href="{{route('feedBacks')}}">{{__("messages.feedback")}}</a></li>
                                        <li><a href="#">{{__("messages.contact us")}}</a></li>
                                        <li><a href="#">{{__("messages.language test")}}</a></li>
                                        <li><a href="#">{{__("messages.instructions")}}</a></li>
                                        <li><a href="#">{{__("messages.site map")}}</a></li>
                                    </ul>
                                </div>

                            </div>

                            <div class="col-12 col-auto">
                                <div class="col-inner">
                                    <h5 class="footer-title">
                                        {{ __('messages.newsletter & social description') }}
                                    </h5>
                                    <p class="font12">
                                        {{ get_default_lang() == 'ar' ? getValueOfOptionFooter('newsletterSocialDesAr') : getValueOfOptionFooter('newsletterSocialDesEn') }}
                                    </p>
                                    <form class="footer-newsletter mt-20" action="{{route('formSendMail')}}"
                                          method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="input-group">

                                            <input required type="email" name="email" class="form-control"
                                                   placeholder="{{__('messages.email address')}}">
                                            <div class="input-group-append">
                                                <a>
                                                    <button class="btn btn-primary"  type="submit"><i
                                                            class="far fa-envelope"></i></button>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="footer-socials mt-20">
                                        <a href="{{ setting('facebook') }}"><i class="fab fa-facebook-square"></i></a>
                                        <a href="{{ setting('instagram') }}"><i class="fab fa-instagram"></i></a>
                                        <a href="{{ setting('twitter') }}"><i class="fab fa-twitter-square"></i></a>
                                        <a href="{{ setting('youtube') }}"><i class="fab fa-youtube-square"></i></a>
                                        <a href="{{ setting('linkedin') }}"><i class="fab fa-linkedin"></i></a>

                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="bottom-footer">

        <div class="container">

            <div class="row shrink-auto-md gap-10 gap-40-lg">

                <div class="col-auto">
                    <div class="col-inner">
                        <ul class="footer-menu-list-02">
                            <li><a href="{{route('cookies')}}">{{__("messages.cookies")}}</a></li>
                            <li><a href="{{route('policies')}}">{{__("messages.policies")}}</a></li>
                            <li><a href="{{route('legal')}}">{{__("messages.legal")}}</a></li>
                            <li><a href="{{route('copyright')}}">{{__("messages.copyright")}}</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-shrink">
                    <div class="col-inner">
                        <p class="footer-copy-right" dir="ltr"> &#169; 2020 – 2021 <span
                                class="text-primary">PickUpCourse.com </span>{{__("messages.all rights reserved")}}</p>
                    </div>
                </div>

            </div>

        </div>

    </div>

</footer>
