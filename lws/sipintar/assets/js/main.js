$(document).ready(function() {
    "use strict";

    // $(document).ready(function() {

    (function ($) {
    "use strict";
    // TOP Menu Sticky
    $(window).on('scroll', function () {
    	var scroll = $(window).scrollTop();
    	if (scroll < 400) {
        $("#sticky-header").removeClass("sticky");
        $('#back-top').fadeIn(500);
    	} else {
        $("#sticky-header").addClass("sticky");
        $('#back-top').fadeIn(500);
    	}
    });





    $(document).ready(function(){

    // mobile_menu
    var menu = $('ul#navigation');
    if(menu.length){
    	menu.slicknav({
    		prependTo: ".mobile_menu",
    		closedSymbol: '+',
    		openedSymbol:'-'
    	});
    };
    // blog-menu
      // $('ul#blog-menu').slicknav({
      //   prependTo: ".blog_menu"
      // });

    // review-active
    $('.slider_active').owlCarousel({
      loop:true,
      margin:0,
    items:1,
    autoplay:true,
    navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
      nav:true,
    dots:false,
    autoplayHoverPause: true,
    autoplaySpeed: 800,
      responsive:{
          0:{
              items:1,
              nav:false,
          },
          767:{
              items:1,
              nav:false,
          },
          992:{
              items:1,
              nav:false
          },
          1200:{
              items:1,
              nav:false
          },
          1600:{
              items:1,
              nav:true
          }
      }
    });

    // review-active
    $('.testmonial_active ').owlCarousel({
      loop:true,
      margin:0,
    items:1,
    autoplay:true,
    navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
      nav:true,
    dots:false,
    autoplayHoverPause: true,
    autoplaySpeed: 800,

      responsive:{
          0:{
              items:1,
              dots:false,
              nav:false,
          },
          767:{
              items:1,
              dots:false,
              nav:false,
          },
          992:{
              items:1,
              nav:false
          },
          1200:{
              items:1,
              nav:false
          },
          1500:{
              items:1
          }
      }
    });

    // review-active
    $('.case_active').owlCarousel({
      loop:true,
      margin:30,
    items:1,
    autoplay:true,
    navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
      nav:false,
    dots:true,
    autoplayHoverPause: true,
    autoplaySpeed: 800,
      responsive:{
          0:{
              items:1,
              nav:false
          },
          767:{
              items:2,
          },
          992:{
              items:3
          },
          1200:{
              items:3
          },
          1500:{
              items:3
          }
      }
    });

    // review-active
    $('.testmonial_active2').owlCarousel({
      loop:true,
      margin:0,
    items:1,
    autoplay:false,
    navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
      nav:false,
    dots:true,
    autoplayHoverPause: true,
    autoplaySpeed: 800,
    // dotsData: true,
    center: true,
      responsive:{
          0:{
              items:1,
              nav:false
          },
          767:{
              items:1,
              nav:false
          },
          992:{
              items:1
          },
          1200:{
              items:1
          },
          1500:{
              items:1
          }
      }
    });

    // for filter
      // init Isotope
      var $grid = $('.grid').isotope({
        itemSelector: '.grid-item',
        percentPosition: true,
        masonry: {
          // use outer width of grid-sizer for columnWidth
          columnWidth: 1
        }
      });

      // filter items on button click
      $('.portfolio-menu').on('click', 'button', function () {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue });
      });

      //for menu active class
      $('.portfolio-menu button').on('click', function (event) {
        $(this).siblings('.active').removeClass('active');
        $(this).addClass('active');
        event.preventDefault();
    	});

      // wow js
      new WOW().init();

      // counter
      $('.counter').counterUp({
        delay: 10,
        time: 10000
      });

    /* magnificPopup img view */
    $('.popup-image').magnificPopup({
    	type: 'image',
    	gallery: {
    	  enabled: true
    	}
    });

    /* magnificPopup img view */
    $('.img-pop-up').magnificPopup({
    	type: 'image',
    	gallery: {
    	  enabled: true
    	}
    });

    /* magnificPopup video view */
    $('.popup-video').magnificPopup({
    	type: 'iframe'
    });


      // scrollIt for smoth scroll
      $.scrollIt({
        upKey: 38,             // key code to navigate to the next section
        downKey: 40,           // key code to navigate to the previous section
        easing: 'linear',      // the easing function for animation
        scrollTime: 600,       // how long (in ms) the animation takes
        activeClass: 'active', // class given to the active nav element
        onPageChange: null,    // function(pageIndex) that is called when page is changed
        topOffset: 0           // offste (in px) for fixed top navigation
      });

      // scrollup bottom to top
      $.scrollUp({
        scrollName: 'scrollUp', // Element ID
        topDistance: '4500', // Distance from top before showing element (px)
        topSpeed: 300, // Speed back to top (ms)
        animation: 'fade', // Fade, slide, none
        animationInSpeed: 200, // Animation in speed (ms)
        animationOutSpeed: 200, // Animation out speed (ms)
        scrollText: '<i class="fa fa-angle-double-up"></i>', // Text for element
        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
      });


      // blog-page

      //brand-active
    $('.brand-active').owlCarousel({
      loop:true,
      margin:30,
    items:1,
    autoplay:true,
      nav:false,
    dots:false,
    autoplayHoverPause: true,
    autoplaySpeed: 800,
      responsive:{
          0:{
              items:1,
              nav:false

          },
          767:{
              items:4
          },
          992:{
              items:7
          }
      }
    });

    // blog-dtails-page

      //project-active
    $('.project-active').owlCarousel({
      loop:true,
      margin:30,
    items:1,
    // autoplay:true,
    navText:['<i class="Flaticon flaticon-left-arrow"></i>','<i class="Flaticon flaticon-right-arrow"></i>'],
    nav:true,
    dots:false,
    // autoplayHoverPause: true,
    // autoplaySpeed: 800,
      responsive:{
          0:{
              items:1,
              nav:false

          },
          767:{
              items:1,
              nav:false
          },
          992:{
              items:2,
              nav:false
          },
          1200:{
              items:1,
          },
          1501:{
              items:2,
          }
      }
    });

    if (document.getElementById('default-select')) {
      $('select').niceSelect();
    }

      //about-pro-active
    $('.details_active').owlCarousel({
      loop:true,
      margin:0,
    items:1,
    // autoplay:true,
    navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
    nav:true,
    dots:false,
    // autoplayHoverPause: true,
    // autoplaySpeed: 800,
      responsive:{
          0:{
              items:1,
              nav:false

          },
          767:{
              items:1,
              nav:false
          },
          992:{
              items:1,
              nav:false
          },
          1200:{
              items:1,
          }
      }
    });

    });

    // resitration_Form
    $(document).ready(function() {
    	$('.popup-with-form').magnificPopup({
    		type: 'inline',
    		preloader: false,
    		focus: '#name',

    		// When elemened is focused, some mobile browsers in some cases zoom in
    		// It looks not nice, so we disable it:
    		callbacks: {
    			beforeOpen: function() {
    				if($(window).width() < 700) {
    					this.st.focus = false;
    				} else {
    					this.st.focus = '#name';
    				}
    			}
    		}
      });
      var wow = new WOW(
        {
          boxClass:     'wow',      // animated element css class (default is wow)
          animateClass: 'animated', // animation css class (default is animated)
          offset:       0,          // distance to the element when triggering the animation (default is 0)
          mobile:       true,       // trigger animations on mobile devices (default is true)
          live:         true,       // act on asynchronously loaded content (default is true)
          callback:     function(box) {
            // the callback is fired every time an animation is started
            // the argument that is passed in is the DOM node being animated
          },
          scrollContainer: null,    // optional scroll container selector, otherwise use window,
          resetAnimation: true,     // reset animation on end (default is true)
        }
      );
      wow.init();
    });



    //------- Mailchimp js --------//
    function mailChimp() {
      $('#mc_embed_signup').find('form').ajaxChimp();
    }
    mailChimp();



            // Search Toggle
            $("#search_input_box").hide();
            $("#search").on("click", function () {
                $("#search_input_box").slideToggle();
                $("#search_input").focus();
            });
            $("#close_search").on("click", function () {
                $('#search_input_box').slideUp(500);
            });
            // Search Toggle
            $("#search_input_box").hide();
            $("#search_1").on("click", function () {
                $("#search_input_box").slideToggle();
                $("#search_input").focus();
            });

    })(jQuery);


    // });


    //------- Niceselect  js --------//

    if (document.getElementById("default-select")) {
        $('select').niceSelect();
    };
    if (document.getElementById("default-select2")) {
        $('select').niceSelect();
    };
    if (document.getElementById("service-select")) {
        $('select').niceSelect();
    };

    //------- Lightbox  js --------//

    $('.img-pop-up').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });

    $('.play-btn').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });

    //------- Counter  js --------//

     if(document.getElementById("facts-area")){
      $('.counter').counterUp({
          delay: 10,
          time: 1000
      });
    }

    //------- Skill  js --------//

    $('.skill').simpleSkillbar();

    //------- Filter  js --------//

      $('.filters ul li').click(function(){
        $('.filters ul li').removeClass('active');
        $(this).addClass('active');

        var data = $(this).attr('data-filter');
        $grid.isotope({
          filter: data
        })
      });


      if(document.getElementById("portfolio")){
            var $grid = $(".grid").isotope({
              itemSelector: ".all",
              percentPosition: true,
              masonry: {
                columnWidth: ".all"
              }
            })
      };


    //------- Timeline js --------//


    $('.content').each( function(i){

      var bottom_of_object= $(this).offset().top + $(this).outerHeight();
      var bottom_of_window = $(window).height();

      if( bottom_of_object > bottom_of_window){
        $(this).addClass('hidden');
      }
    });


    $(window).scroll( function(){
        /* Check the location of each element hidden */
        $('.hidden').each( function(i){

            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();

            /* If the object is completely visible in the window, fadeIn it */
            if( bottom_of_window > bottom_of_object ){
              $(this).animate({'opacity':'1'},700);
            }
        });
    });


    //------- Superfish nav menu  js --------//

    $('.nav-menu').superfish({
        animation: {
            opacity: 'show'
        },
        speed: 400
    });

    //------- Accordian Js --------//

    var allPanels = $(".accordion > dd").hide();
    allPanels.first().slideDown("easeOutExpo");
    $(".accordion").each(function() {
        $(this).find("dt > a").first().addClass("active").parent().next().css({
            display: "block"
        });
    });


     $(document).on('click', '.accordion > dt > a', function(e) {

        var current = $(this).parent().next("dd");
        $(this).parents(".accordion").find("dt > a").removeClass("active");
        $(this).addClass("active");
        $(this).parents(".accordion").find("dd").slideUp("easeInExpo");
        $(this).parent().next().slideDown("easeOutExpo");

        return false;

    });

    //------- Tabs Js --------//
    if (document.getElementById("horizontalTab")) {

    $('#horizontalTab').jqTabs({
        direction: 'horizontal',
        duration: 200
    });

    };


    //------- Owl Carusel  js --------//

    $('.active-review-carusel').owlCarousel({
        items:1,
        loop:true,
        autoplay:true,
        autoplayHoverPause: true,
        margin:30,
        dots: true
    });

     $('.active-testimonial').owlCarousel({
            items: 2,
            loop: true,
            margin: 30,
            autoplayHoverPause: true,
            dots: true,
            autoplay: true,
            nav: true,
            navText: ["<span class='lnr lnr-arrow-up'></span>", "<span class='lnr lnr-arrow-down'></span>"],
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1,
                },
                768: {
                    items: 2,
                }
            }
        });



    $('.active-brand-carusel').owlCarousel({
        items: 5,
        loop: true,
        autoplayHoverPause: true,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            455: {
                items: 2
            },
            768: {
                items: 3,
            },
            991: {
                items: 4,
            },
            1024: {
                items: 5,
            }
        }
    });

    //------- Mobile Nav  js --------//

    if ($('#nav-menu-container').length) {
        var $mobile_nav = $('#nav-menu-container').clone().prop({
            id: 'mobile-nav'
        });
        $mobile_nav.find('> ul').attr({
            'class': '',
            'id': ''
        });
        $('body').append($mobile_nav);
        $('body').prepend('<button type="button" id="mobile-nav-toggle"><i class="lnr lnr-menu"></i></button>');
        $('body').append('<div id="mobile-body-overly"></div>');
        $('#mobile-nav').find('.menu-has-children').prepend('<i class="lnr lnr-chevron-down"></i>');

        $(document).on('click', '.menu-has-children i', function(e) {
            $(this).next().toggleClass('menu-item-active');
            $(this).nextAll('ul').eq(0).slideToggle();
            $(this).toggleClass("lnr-chevron-up lnr-chevron-down");
        });

        $(document).on('click', '#mobile-nav-toggle', function(e) {
            $('body').toggleClass('mobile-nav-active');
            $('#mobile-nav-toggle i').toggleClass('lnr-cross lnr-menu');
            $('#mobile-body-overly').toggle();
        });

            $(document).on('click', function(e) {
            var container = $("#mobile-nav, #mobile-nav-toggle");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('#mobile-nav-toggle i').toggleClass('lnr-cross lnr-menu');
                    $('#mobile-body-overly').fadeOut();
                }
            }
        });
    } else if ($("#mobile-nav, #mobile-nav-toggle").length) {
        $("#mobile-nav, #mobile-nav-toggle").hide();
    }

    //------- Smooth Scroll  js --------//

    $('.nav-menu a, #mobile-nav a, .scrollto').on('click', function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            if (target.length) {
                var top_space = 0;

                if ($('#header').length) {
                    top_space = $('#header').outerHeight();

                    if (!$('#header').hasClass('header-fixed')) {
                        top_space = top_space;
                    }
                }

                $('html, body').animate({
                    scrollTop: target.offset().top - top_space
                }, 1500, 'easeInOutExpo');

                if ($(this).parents('.nav-menu').length) {
                    $('.nav-menu .menu-active').removeClass('menu-active');
                    $(this).closest('li').addClass('menu-active');
                }

                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('#mobile-nav-toggle i').toggleClass('lnr-times lnr-bars');
                    $('#mobile-body-overly').fadeOut();
                }
                return false;
            }
        }
    });

    $(document).ready(function() {

        $('html, body').hide();

        if (window.location.hash) {

            setTimeout(function() {

                $('html, body').scrollTop(0).show();

                $('html, body').animate({

                    scrollTop: $(window.location.hash).offset().top - 108

                }, 1000)

            }, 0);

        } else {

            $('html, body').show();

        }

    });


    jQuery(document).ready(function($) {
        // Get current path and find target link
        var path = window.location.pathname.split("/").pop();

        // Account for home page with empty path
        if (path == '') {
            path = 'index.html';
        }

        var target = $('nav a[href="' + path + '"]');
        // Add active class to target link
        target.addClass('menu-active');
    });

    $(document).ready(function() {
        if ($('.menu-has-children ul>li a').hasClass('menu-active')) {
            $('.menu-active').closest("ul").parentsUntil("a").addClass('parent-active');
        }
    });




    //------- Header Scroll Class  js --------//

    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('#header').addClass('header-scrolled');
        } else {
            $('#header').removeClass('header-scrolled');
        }
    });

    //------- Google Map  js --------//

    if (document.getElementById("map")) {
        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            var mapOptions = {
                zoom: 11,
                center: new google.maps.LatLng(40.6700, -73.9400), // New York
                styles: [{
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#e9e9e9"
                    }, {
                        "lightness": 17
                    }]
                }, {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#f5f5f5"
                    }, {
                        "lightness": 20
                    }]
                }, {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "color": "#ffffff"
                    }, {
                        "lightness": 17
                    }]
                }, {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                        "color": "#ffffff"
                    }, {
                        "lightness": 29
                    }, {
                        "weight": 0.2
                    }]
                }, {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#ffffff"
                    }, {
                        "lightness": 18
                    }]
                }, {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#ffffff"
                    }, {
                        "lightness": 16
                    }]
                }, {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#f5f5f5"
                    }, {
                        "lightness": 21
                    }]
                }, {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#dedede"
                    }, {
                        "lightness": 21
                    }]
                }, {
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "visibility": "on"
                    }, {
                        "color": "#ffffff"
                    }, {
                        "lightness": 16
                    }]
                }, {
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "saturation": 36
                    }, {
                        "color": "#333333"
                    }, {
                        "lightness": 40
                    }]
                }, {
                    "elementType": "labels.icon",
                    "stylers": [{
                        "visibility": "off"
                    }]
                }, {
                    "featureType": "transit",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#f2f2f2"
                    }, {
                        "lightness": 19
                    }]
                }, {
                    "featureType": "administrative",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "color": "#fefefe"
                    }, {
                        "lightness": 20
                    }]
                }, {
                    "featureType": "administrative",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                        "color": "#fefefe"
                    }, {
                        "lightness": 17
                    }, {
                        "weight": 1.2
                    }]
                }]
            };
            var mapElement = document.getElementById('map');
            var map = new google.maps.Map(mapElement, mapOptions);
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(40.6700, -73.9400),
                map: map,
                title: 'Snazzy!'
            });
        }
    }

    //------- Mailchimp js --------//

    $(document).ready(function() {
        $('#mc_embed_signup').find('form').ajaxChimp();
    });

});
