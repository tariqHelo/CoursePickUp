jQuery(function($) {



    "use strict";


    var $window = $(window);



    /**
     * Main Menu Slide Down Effect
     */
    var navbar = $(".main-nav-menu");

    // Main Menu 
    navbar.find('li').on("mouseenter", function() {
        if ($(window).width() > 991) {
            $(this).find('ul').first().stop(true, true).delay(250).slideDown(500, 'easeInOutQuad');
        }
    });
    navbar.find('li').on("mouseleave", function() {
        if ($(window).width() > 991) {
            $(this).find('ul').first().stop(true, true).delay(100).slideUp(150, 'easeInOutQuad');
        }
    });

    // Arrow for Menu has sub-menu
    $(".navbar-arrow ul li").has("ul").children("a").append("<span class='arrow-indicator'></span>");

    $(".navbar-arrow ul li a .arrow-indicator").click(function(e) {
        if ($(window).width() <= 991) {
            e.stopPropagation();
            $(this).toggleClass('active');
            $(this).parent().next('ul').slideToggle(500, 'easeInOutQuad');
        }
    });

    //    $(".navbar-arrow ul li a .arrow-indicator").click(function (e) {
    //        if ($(window).width() < 767){
    //            e.stopPropagation();
    //            $(this).parent().next('ul').slideToggle(500, 'easeInOutQuad');
    //        }    
    //    });


    /**
     * Sticky Header
     */
    $(".with-waypoint-sticky").waypoint(function() {
        $("#header-waypoint-sticky").toggleClass("header-waypoint-sticky");
        return false;
    }, { offset: "-20px" });




    /**
     *	Dropdown effect
     */

    var dropdownSmooth02 = $(".dropdown.dropdown-smooth-02");

    dropdownSmooth02.on('show.bs.dropdown', function(e) {
        var $dropdownSmooth02Menu = $(this).find('.dropdown-menu');
        var orig_margin_top = parseInt($dropdownSmooth02Menu.css('margin-top'));
        $dropdownSmooth02Menu.css({ 'margin-top': (orig_margin_top + 10) + 'px', opacity: 0 }).animate({ 'margin-top': orig_margin_top + 'px', opacity: 1 }, 300, function() {
            $(this).css({ 'margin-top': '' });
        });
    });
    dropdownSmooth02.on('hide.bs.dropdown', function(e) {
        var $dropdownSmooth02Menu = $(this).find('.dropdown-menu');
        var orig_margin_top = parseInt($dropdownSmooth02Menu.css('margin-top'));
        $dropdownSmooth02Menu.css({ 'margin-top': orig_margin_top + 'px', opacity: 1, display: 'block' }).animate({ 'margin-top': (orig_margin_top + 10) + 'px', opacity: 0 }, 300, function() {
            $(this).css({ 'margin-top': '', display: '' });
        });
    });


    $('[data-toggle="tooltip"]').tooltip()



    /**
     *  Tab in dropdown
     */
    $('.tab-in-dropdown').on('click', '.nav a', function() {
        $(this).closest('.dropdown').addClass('dontClose');
    })

    $('.dropdown-tab').on('hide.bs.dropdown', function(e) {
        if ($(this).hasClass('dontClose')) {
            e.preventDefault();
        }
        $(this).removeClass('dontClose');
    });

    $('a.tab-external-link').on("click", function(e) {
        e.preventDefault();
        var tabPattern = /#.+/gi //use regex to get anchor(==selector)
        var tabContentID = e.target.toString().match(tabPattern)[0]; //get anchor   
        $('.external-link-navs a[href="' + tabContentID + '"]').tab('show');
    });



    /**
     *  Open specific tab in modal
     */
    $('a[data-toggle=modal][data-target]').on("click", function() {
        var tabTargetInModal = $(this).attr('href');
        $('a[data-toggle=tab][href=' + tabTargetInModal + ']').tab('show');
    })



    /**
     * Chosen
     */

    $(".chosen-the-basic").chosen({ disable_search_threshold: 2 });
    $(".chosen-no-search").chosen({ disable_search: true });



    /**
     * Input Spinner
     */

    $(".touch-spin-03").TouchSpin({
        min: 1,
        max: 10,
        buttondown_class: "btn btn-light btn-touch-spin",
        buttonup_class: "btn btn-light btn-touch-spin"
    });

    /**
     *  close call-center
     */
    $('#call-center .close').click(function() {
        $(this).parent('#call-center').fadeOut();
    });

    /**
     *  More Description
     */
    $('.more-desc').click(function(e) {
        e.preventDefault();
        $(this).prev('.desc-text').toggleClass('visible');
        var text = $(this).text();
        $(this).text(text === 'About the school' ? 'Less Details' : 'About the school');
    });


    /**
     * Sticky sidebar
     */

    $(".sticky-kit").stick_in_parent({
        offset_top: 105,
    });

    $(".sticky-kit-02").stick_in_parent({
        offset_top: 130,
    });



    /**
     * Date and month Picker
     */
    var disabledDays = [0, 2, 3, 4, 5, 6];
    $('.air-datepicker').datepicker({
        minDate: new Date(),
        onRenderCell: function(date, cellType) {
            if (cellType == 'day') {
                var day = date.getDay(),
                    isDisabled = disabledDays.indexOf(day) != -1;

                return {
                    disabled: isDisabled
                }
            }
        }
    });

    /**
     * Accommodation select
     */
    /*$('#accommodation').change(function() {
        $('.accommodation-modal').fadeIn(300);
    });
    $('.accommodation-modal .close').click(function() {
        $('.accommodation-modal').fadeOut(300);
    });*/


    /**
     * Slick carousel
     */

    $('.slick-the-basic').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        dots: true,
    });

    $('.slick-testimonial-grid-arrows').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        prevArrow: $('.testimonial-grid-prev'),
        nextArrow: $('.testimonial-grid-next'),
        responsive: [{
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                }
            }
        ]
    });

    $('.gallery-slideshow').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        arrows: true,
        fade: true,
        asNavFor: '.gallery-nav'
    });

    $('.gallery-nav').slick({
        slidesToShow: 7,
        slidesToScroll: 1,
        speed: 500,
        asNavFor: '.gallery-slideshow',
        dots: false,
        centerMode: true,
        focusOnSelect: true,
        infinite: true,
        responsive: [{
                breakpoint: 1199,
                settings: {
                    slidesToShow: 7,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 5,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 5,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 3,
                }
            }
        ]
    });

    $('.slick-hero').slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        variableWidth: true,
        centerMode: true,
    });
    
    let courses_slider_rtl = $('.courses-slider').attr('data-rtl') ? true : false;
    $('.courses-slider').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        autoplay: true,
        autoplay: 3000,
        rtl: courses_slider_rtl,
        responsive: [{
                breakpoint: 1199,
                settings: {
                    slidesToShow: 3,
                    rtl: courses_slider_rtl,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    rtl: courses_slider_rtl,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    rtl: courses_slider_rtl,
                }
            }
        ]
    });

    let packages_slider_rtl = $('.packages-slider').attr('data-rtl') ? true : false;
    $('.packages-slider').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 4000,
        rtl: packages_slider_rtl,
        responsive: [{
                breakpoint: 1199,
                settings: {
                    slidesToShow: 3,
                    rtl: packages_slider_rtl,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    rtl: packages_slider_rtl,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    rtl: packages_slider_rtl,
                }
            }
        ]
    });

    $('.slick-hero-alt').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 2,
        dots: false,
        responsive: [{
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false,
                arrows: false,
            }
        }, ]
    });

    $('.slick-hero-alt-02').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        responsive: [{
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false,
                arrows: false,
            }
        }, ]
    });

    $('.slick-top-destination').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        responsive: [{
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    $('.slick-top-destination-alt').slick({
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        responsive: [{
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    let brand_slider_rtl = $('.brand-slider').attr('data-rtl') ? true : false;
    $('.brand-slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 1000,
        rtl: brand_slider_rtl,
        variableWidth: true,
        centerMode: true,
        responsive: [{
                breakpoint: 1199,
                settings: {
                    slidesToShow: 1,
                    rtl: brand_slider_rtl,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    rtl: brand_slider_rtl,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    rtl: brand_slider_rtl,
                }
            }
        ]
    });

    /**
     * Counter - Number animation
     */

    $(".counter").countimator();



    /**
     * Range Slider
     */

    $("#price_range").ionRangeSlider({
        type: "double",
        grid: true,
        min: 0,
        max: 1000,
        from: 200,
        to: 800,
        prefix: "$"
    });

    $("#star_range").ionRangeSlider({
        type: "double",
        grid: false,
        from: 1,
        to: 2,
        values: [
            "<i class='ri-star'></i>",
            "<i class='ri-star'></i> <i class='ri-star'></i>",
            "<i class='ri-star'></i> <i class='ri-star'></i> <i class='ri-star'></i>",
            "<i class='ri-star'></i> <i class='ri-star'></i> <i class='ri-star'></i> <i class='ri-star'></i>",
            "<i class='ri-star'></i> <i class='ri-star'></i> <i class='ri-star'></i> <i class='ri-star'></i> <i class='ri-star'></i>"
        ]
    });



    /**
     * Smooth scroll to anchor
     */
    $('a.anchor[href*=#]:not([href=#])').on("click", function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: (target.offset().top - 140) // 70px offset for navbar menu
                }, 300);
                return false;
            }
        }
    });



    /**
     * Input masking
     */
    $('.mask-data-mask').mask();




    /**
     * Contact for validator
     */

    var contactFormValidator = $("#contact-form");

    contactFormValidator.validator();

    contactFormValidator.on('submit', function(e) {
        if (!e.isDefaultPrevented()) {
            var url = "contact.php";

            $.ajax({
                type: "POST",
                url: url,
                data: $(this).serialize(),
                success: function(data) {
                    var messageAlert = 'alert-' + data.type;
                    var messageText = data.message;

                    var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';
                    if (messageAlert && messageText) {
                        $('#contact-form').find('.contact-successful-messages').html(alertBox);
                        $('#contact-form')[0].reset();
                    }
                }
            });
            return false;
        }
    })



    /**
     * Back To Top
     */

    var backToTop = $("#back-to-top");

    $window.scroll(function() {
        if ($(this).scrollTop() > 50) {
            backToTop.fadeIn();
        } else {
            backToTop.fadeOut();
        }
    });

    // scroll body to 0px on click
    backToTop.on("click", function() {
        backToTop.tooltip('hide');
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });

    backToTop.tooltip('show');


});