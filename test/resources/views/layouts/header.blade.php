<!-- start Header -->
<header id="header-waypoint-sticky" class="header-main header-mobile-menu with-absolute-navbar">
    <div class="header-outer clearfix">
        <div class="header-inner">
            <div class="row shrink-auto-lg gap-0 align-items-center">

                <div class="col-5 col-shrink">
                    <div class="col-inner">
                        <div class="main-logo">
                            <a href="/"><img src="{{ asset('site/' . setting('logo') ) }}" alt="images"/></a>
                        </div>
                    </div>
                </div>
                @php $phoneNumber_trimmed = str_replace(' ', '', setting('phoneNumber') ) @endphp
                <div class="col-7 col-shrink order-last-lg">
                    <div class="col-inner d-flex justify-content-end">
                        <ul class="nav-mini-right">
                            <li class="d-block d-sm-none call">
                                <a href="tel:{{ $phoneNumber_trimmed }}"><i class="fas fa-phone-square"></i></a>
                            </li>
                            <li class="d-block d-sm-none whatsapp">
                                <a href="whatsapp://send?text={!! get_default_lang() == 'ar' ? urlencode(setting('whatsappMessageAr')) : urlencode(setting('whatsappMessageEn')) !!}&amp;phone={{ setting('whatsappPhone') }}"><i
                                    class="fab fa-whatsapp"></i></a>
                            </li>
                            <!-- here -->

                            <li class="btn-group d-block d-sm-none whatsapp">
                                <button type="button" class="btn dropdown-toggle icon-coll" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <span class="image">
                                        <img class="fas img-currency mt-30"
                                            src="{{asset('students/font-icons/flaticon-flags-4/png/dollar.png')}}"
                                            alt="image">
                                    </span>
                                </button>
                                <div class="dropdown-menu">
                                    @foreach ($currencies = \App\currency::all() as $currency)
                                    <a class="dropdown-item drop-style" href="{{ route('setCurrency', $currency->code) }}"><i
                                        class="fas pr-5 fa-dollar-sign text-primary"></i> 
                                        {{ $currency->code }} 
                                    </a>
                                    @endforeach
                                </div>
                            </li>

                            <li class="btn-group d-block d-sm-none whatsapp">
                                <button type="button" class="langbut btn dropdown-toggle icon-coll"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="image">
                                        <img class="fas img-langua mt-30"
                                            src="{{asset('students/font-icons/flaticon-flags-4/png/260-united-kingdom.png')}}"
                                            alt="image">
                                    </span>
                                </button>
                                <div class="dropdown-menu">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <a class="dropdown-item drop-style" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }} </a>
                                    @endforeach
                                </div>
                            </li>
                            <li>
                                <button class="btn btn-toggle collapsed" data-toggle="collapse" data-target="#mobileMenu"></button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-12 col-auto">
                    <div class="navbar-wrapper">
                        <div class="navbar navbar-expand-lg">
                            <div id="mobileMenu" class="collapse navbar-collapse px-0">
                                <nav class="main-nav-menu main-menu-nav navbar-arrow">
                                    <ul class="main-nav">
                                        <li><a href="/">{{__("messages.home")}}</a></li>
                                        <li><a href="{{route('howToBookYourCourse')}}">{{__("messages.how to book your course")}}</a></li>
                                        <li><a href="javascript:void(0)">{{__('messages.services')}}
                                                <span class="fas fa-sort-down arrow-indicator-color"></span>
                                            </a>
                                            <ul style="overflow-y: auto;max-height:150px;height: auto;overflow-style: revert !important;">
                                                <li><a href="{{route('services')}}">{{__("messages.all services")}}</a>
                                                </li>

                                                @foreach($services as $service)
                                                <li>
                                                    <a  href="{{ url(get_default_lang() . '/services/' . (get_default_lang() == 'ar' ? $service->slugAr : $service->slugEn)) }}">{{ get_default_lang() == 'ar' ? $service->titleAr : $service->titleEn }}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="{{route('articles')}}">{{__("messages.articles")}}</a></li>
                                    </ul>
                                    <span class="nav-divider"></span>

                                    <ul class="main-nav">
                                        <li class="lang-dropdown">
                                            <a href="javascript:void(0)"><img
                                                @if(get_default_lang()=="ar")
                                                src="{{asset('languages\ar.png')}}"
                                                @else
                                                src="{{asset('languages\en.png')}}"
                                                @endif
                                                alt="image" class="mx-2"><span
                                                class="fas fa-sort-down arrow-indicator-color arrow-indicator-margin"></span>
                                            </a>
                                            <ul>

                                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                <li>
                                                    <a class="" rel="alternate"
                                                       hreflang="{{ $localeCode }}"
                                                       href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                                       data-i18n="nav.dash.ecommerce">
                                                        <img src="/languages/{{$localeCode}}.png" alt="image"> 
                                                        {{ $properties['native'] }}
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="currency-dropdown">
                                            <a href="javascript:void(0)">
                                                <span class="icon-font"><i
                                                        class="oi oi-dollar text-primary mx-2"></i></span>
                                                <span class="fas fa-sort-down arrow-indicator-color"></span>
                                            </a>
                                            <ul>
                                                @foreach ($currencies = \App\currency::all() as $currency)
                                                <li>
                                                    <a href="{{ route('setCurrency', $currency->code) }}"><span class="icon-font"><i
                                                        class="oi oi-dollar text-primary oi-currency"></i></span>
                                                                {{ $currency->code }} {{ get_default_lang() == 'ar' ? $currency->titleAr : $currency->titleEn }}
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="whatsapp d-lg-block d-none">
                                            <a href="https://wa.me/send?text={!! get_default_lang() == 'ar' ? urlencode(setting('whatsappMessageAr')) : urlencode(setting('whatsappMessageEn')) !!}&amp;phone={{ setting('whatsappPhone') }}"><i
                                                    class="fab fa-whatsapp"></i></a>
                                        </li>
                                        <li class="call d-lg-block d-none">
                                            <a href="tel:{{ $phoneNumber_trimmed }}"><i class="fas fa-phone-square"></i> <small dir="ltr">{{ setting('phoneNumber') }}</small></a>
                                        </li>
                                    </ul>
                                </nav>
                                <!--/.nav-collapse -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- start Header -->