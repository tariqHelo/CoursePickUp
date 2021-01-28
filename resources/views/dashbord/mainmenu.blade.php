<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="navigation-header"><span>ADMIN PANEL</span><i class="la la-ellipsis-h" data-toggle="tooltip"
                    data-placement="right" data-original-title="Admin Panels"></i></li>
            <li class="nav-item">
                <a href="{{route('HomeDashbord')}}"><i class="la la-home"></i><span class="menu-title"
                        data-i18n="eCommerce">Dashboard
                    </span></a>
            </li>

            <!-- <li class="nav-item">
                <a href="{{route('booking.requests')}}"><i class="la la-bell"></i><span class="menu-title"
                        data-i18n="Booking Requests">Booking Requests
                    </span></a>
            </li> -->

            <li class="nav-item">
                <a href="#"><i class="la la-bell"></i><span class="menu-title" data-i18n="Project">Booking Requests</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{route('booking.requests')}}"><i></i><span data-i18n="Project Bugs"> Confirmed</span></a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('booking.requests.unconfirmed')}}"><i></i><span data-i18n="Project Bugs"> Unconfirmed</span></a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('booking.requests.draft')}}"><i></i><span
                                data-i18n="Project Summary">Draft</span></a>
                    </li>
                </ul>
            </li>

            @if(Auth::user()->role == 1 || getPermissionUser('Leads','create', Auth::user()->id) == 1 || getPermissionUser('Leads','edit', Auth::user()->id) == 1)

            <li class="nav-item">
                <a href="#"><i class="la la-comments"></i><span class="menu-title" data-i18n="Project">Leads</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{route('leads',1)}}"><i></i><span data-i18n="Project Bugs">Add
                                Lead</span></a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('leads',2)}}"><i></i><span
                                data-i18n="Project Summary">Booking Form</span></a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('leads',3)}}"><i></i><span data-i18n="Project Task">Help
                                Button</span></a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('leads',4)}}"><i></i><span data-i18n="Project Bugs">Articles
                                Form</span></a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('leads',5)}}"><i></i><span data-i18n="Project Bugs">Work With
                                Us Form</span></a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('leads',6)}}"><i></i><span data-i18n="Project Bugs">Our
                                Partner Form</span></a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('leads',7)}}"><i></i><span data-i18n="Project Bugs">Contact
                                Us Form</span></a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('leads',8)}}"><i></i><span data-i18n="Project Bugs">Feedback
                                Form</span></a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('leads',9)}}"><i></i><span data-i18n="Project Bugs">FAQ
                                Form</span></a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('leads',10)}}"><i></i><span
                                data-i18n="Project Bugs">Newsletter Emails</span></a>
                    </li>
                </ul>
            </li>
            @endif
            @if(Auth::user()->role == 1 || getPermissionUser('Articles','create', Auth::user()->id) == 1 || getPermissionUser('Articles','edit', Auth::user()->id) == 1)

            <li class="nav-item">
                <a href="{{route('articles.index')}}"><i class="la la-file-text"></i><span class="menu-title"
                        data-i18n="Hospital">Articles</span></a>
            </li>
            @endif
            @if(Auth::user()->role == 1 || getPermissionUser('Packages','create', Auth::user()->id) == 1 || getPermissionUser('Packages','edit', Auth::user()->id) == 1)
            <li class="nav-item">
                <a href="{{route('packages.index')}}"><i class="la la-briefcase"></i><span class="menu-title"
                        data-i18n="Crypto">Packages</span></a>
            </li>
            @endif
            @if(Auth::user()->role == 1 || getPermissionUser('Schools','create', Auth::user()->id) == 1 || getPermissionUser('Schools','edit', Auth::user()->id) == 1)
           
            <li class="nav-item">
                <a href="{{route('schools.index')}}"><i class="la la-book"></i><span class="menu-title"
                        data-i18n="Crypto">Schools</span></a>
            </li>
            @endif
            @if(Auth::user()->role == 1 || getPermissionUser('Promotions','create', Auth::user()->id) == 1 || getPermissionUser('Promotions','edit', Auth::user()->id) == 1)

            <li class="nav-item">
                <a href="{{route('promotion.index')}}"><i class="la la-money"></i><span class="menu-title"
                        data-i18n="Support Ticket">Promotion</span></a>
            </li>
            @endif
            @if(Auth::user()->role == 1 || getPermissionUser('Site','edit', Auth::user()->id) == 1 ||
            getPermissionUser('Site','create', Auth::user()->id) == 1)
            <li class="nav-item">
                <a href="#"><i class="la la-gear"></i><span class="menu-title" data-i18n="Project">Site
                        Settings</span></a>
                <ul class="menu-content">
                    
                    <li>
                        <a class="menu-item" href="{{route('services.index')}}"><i></i><span
                                data-i18n="Project Task">Services</span></a>
                    </li>
                    @if(Auth::user()->role == 1)
                    <li>
                        <a class="menu-item" href="{{route('pages.index')}}"><i></i><span
                                data-i18n="Project Summary">Pages</span></a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('mainpage')}}"><i></i><span data-i18n="Project Bugs">Main
                                Page</span></a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('footer')}}"><i></i><span
                                data-i18n="Project Bugs">Footer</span></a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif
            @if(Auth::user()->role == 1 || getPermissionUser('Core','create', Auth::user()->id) == 1 || getPermissionUser('Core','edit', Auth::user()->id) == 1 || getPermissionUser('Core','delete', Auth::user()->id) == 1)

            <li class="nav-item">
                <a href="#"><i class="la la-sliders"></i><span class="menu-title" data-i18n="Project">Core
                        Settings</span></a>
                <ul class="menu-content">
                    @if(Auth::user()->role == 1 || getPermissionUser('Core','delete', Auth::user()->id) == 1)
                    <li>
                        <a class="menu-item" href="{{route('generalSetting')}}"><i></i><span
                                data-i18n="Project Summary">General Settings</span></a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('languages')}}"><i></i><span
                                data-i18n="Project Task">Site Languages</span></a>
                    </li>
                    @endif

                    <li>
                        <a class="menu-item" href="{{action('CurrencyController@index')}}"><i></i><span
                                data-i18n="Project Bugs">Currency</span></a>
                    </li>
                    
                    
                    @if(Auth::user()->role == 1 || getPermissionUser('Core','create', Auth::user()->id) == 1 || getPermissionUser('Core','edit', Auth::user()->id) == 1)

                    <li>
                        <a class="menu-item" href="{{action('VisaController@index')}}"><i></i><span
                                data-i18n="Project Bugs">Visa</span></a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{action('CountriesController@index')}}"><i></i><span
                                data-i18n="Project Bugs">Countries</span></a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('cities.index')}}"><i></i><span
                                data-i18n="Project Bugs">City</span></a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('facilities.index')}}"><i></i><span
                                data-i18n="Project Bugs">Facilities</span></a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('roomtype.index')}}"><i></i><span
                                data-i18n="Project Bugs">Room Type</span></a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('accommodationstype.index')}}"><i></i><span
                                data-i18n="Project Bugs">Accommodations Type</span></a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('coursetype.index')}}"><i></i><span
                                data-i18n="Project Bugs">Course Type</span></a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('mealtype.index')}}"><i></i><span
                                data-i18n="Project Bugs">Meal Type</span></a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('nationality.index')}}"><i></i><span
                                data-i18n="Project Bugs">Nationalities</span></a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('residence.index')}}"><i></i><span
                                data-i18n="Project Bugs">Places of Residences</span></a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('destinations.index')}}"><i></i><span
                                data-i18n="Project Bugs">Destinations</span></a>
                    </li>
                    @endif

                </ul>
            </li>
            @endif
            @if(Auth::user()->role == 1 || getPermissionUser('Users','edit', Auth::user()->id) == 1 ||
            getPermissionUser('Users','create', Auth::user()->id) == 1)

            <li class="nav-item has-sub"><a href="#"><i class="la la-user"></i><span class="menu-title"
                        data-i18n="Users">Users</span></a>
                <ul class="menu-content" style="">
                    <li class=""><a class="menu-item" href="{{action('UsersController@index')}}"><i></i><span
                                data-i18n="Users List">Users List</span></a>
                    </li>
                </ul>
            </li>
            @endif

        </ul>
    </div>
</div>