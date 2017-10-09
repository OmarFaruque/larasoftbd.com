(function($) {
	
	"use strict";
	
	//Hide Loading Box (Preloader)
	function handlePreloader() {
		if($('.preloader').length){
			$('.preloader').delay(200).fadeOut(500);
		}
	}

	//Update Scroll to Top
	function headerStyle() {
		if($('.main-header').length){
			var windowpos = $(window).scrollTop();
			if (windowpos >= 200) {
				$('.main-header').addClass('fixed-header');
				$('.scroll-to-top').fadeIn(300);
			} else {
				$('.main-header').removeClass('fixed-header');
				$('.scroll-to-top').fadeOut(300);
			}
		}
	}
	
	headerStyle();

    //Add One Page Nav
    if($('ul.one-page-nav').length) {
        $('ul.one-page-nav').onePageNav();
    }
    
    //Submenu Dropdown Toggle
    if($('.main-header li.dropdown ul').length){
        $('.main-header li.dropdown').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>');
        
        //Dropdown Button
        $('.main-header li.dropdown .dropdown-btn').on('click', function() {
            $(this).prev('ul').slideToggle(500);
        });
        
        
        //Disable dropdown parent link
        $('.navigation li.dropdown > a').on('click', function(e) {
            e.preventDefault();
        });
    }

    /*------------------------------------------
        = HIDE PRELOADER
    -------------------------------------------*/
    function preloader() {
        if($('.preloader').length) {
            $('.preloader').delay(100).fadeOut(500, function() {

            if ($(".welcome").length) {
                wow.init();
            }

                // Call slider parallax function
                sliderBgSetting();

                 if ($(".hero-slider").length) {
                    //active wow
                   
                    $(".hero-slider").owlCarousel({
                        items: 1,
                        autoplay: true,
                        mouseDrag: false,
                        loop: true,
                        nav: true,
                        navText: ["<i class='fa fa-long-arrow-left'></i>","<i class='fa fa-long-arrow-right'></i>"],
                        autoplaySpeed: 700,
                        navSpeed: 700,
                        dotsSpeed: 700
                    });
                }
            });
        }
    } 

	// Hero slider background setting
    function sliderBgSetting() {
        if ($(".hero-slider .slide").length) {
            $(".hero-slider .slide").each(function() {
                var $this = $(this);
                var img = $this.children(img);
                var imgSrc = img.attr("src");

                $this.css({
                    backgroundImage: "url("+ imgSrc +")",
                    backgroundSize: "cover",
                    backgroundPosition: "center center"
                })
            });
        }
    }


	// Owl Carousel 
	$(".clients-slider-1").owlCarousel({
	  loop: true,
	  items: 1,
	  dots: false,
	  nav: false,
	  autoHeight: false,
	  touchDrag: true,
	  mouseDrag: true,
	  margin: 0,
	  autoplay: true,
	  slideSpeed: 300,
	  navText: ['', ''],
	  responsive: {
	    0: {
	        items: 1,
	        nav: false,
	        dots: false,
	    },
	    600: {
	        items: 1,
	        nav: false,
	        dots: false,
	    },
	    768: {
	        items: 1,
	        nav: false,
	    },
	    1100: {
	        items: 1,
	        nav: false,
	    }
	  }
	});

	//Clients SliderThree Column
	if ($('.clients-slider').length) {
		$('.clients-slider').owlCarousel({
			loop:true,
			margin:50,
			nav:false,
			dots:false,
			smartSpeed: 500,
			autoplay: 5000,
			responsive:{
				0:{
					items:2
				},
				600:{
					items:2
				},
				1024:{
					items:4
				},
				1200:{
					items:4
				}
			}
		});
	}


    //carousel-col-2 Column
    if ($('.carousel-col-1').length) {
        $('.carousel-col-1').owlCarousel({
            loop:true,
            margin:50,
            nav:false,
            dots:true,
            smartSpeed: 500,
            autoplay: 5000,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                600: {
                    items: 1
                },
                750: {
                    items: 1
                },
                960: {
                    items: 1
                },
                1170: {
                    items: 1
                },
                1300: {
                    items: 1
                }
            }
        });
    }
    //carousel-col-2 Column
    if ($('.carousel-col-2').length) {
        $('.carousel-col-2').owlCarousel({
            loop:true,
            margin:50,
            nav:false,
            dots:true,
            smartSpeed: 500,
            autoplay: 5000,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                600: {
                    items: 1
                },
                750: {
                    items: 1
                },
                960: {
                    items: 1
                },
                1170: {
                    items: 2
                },
                1300: {
                    items: 2
                }
            }
        });
    }

    //carousel-col-3 Column
    if ($('.carousel-col-3').length) {
        $('.carousel-col-3').owlCarousel({
            loop:true,
            margin:50,
            nav:false,
            dots:false,
            smartSpeed: 500,
            autoplay: 5000,
            responsive: {
                        0: {
                            items: 1
                        },
                        480: {
                            items: 1
                        },
                        600: {
                            items: 1
                        },
                        750: {
                            items: 2
                        },
                        960: {
                            items: 3
                        },
                        1170: {
                            items: 3
                        },
                        1300: {
                            items: 3
                        }
                    }
        });
    }

    //carousel-col-3 Column
    if ($('.carousel-col-4').length) {
        $('.carousel-col-4').owlCarousel({
            loop:true,
            nav:false,
            dots:false,
            smartSpeed: 500,
            autoplay: 5000,
            
            responsive: {
                0: {
                    items: 1,
                    center: false
                },
                480: {
                    items: 1,
                    center: false
                },
                600: {
                    items: 1,
                    center: false
                },
                750: {
                    items: 2,
                    center: false
                },
                960: {
                    items: 3
                },
                1170: {
                    items: 4
                },
                1300: {
                    items: 4
                }
            }
        });
    }


    //carousel-col-5 Column
    if ($('.carousel-col-5').length) {
        $('.carousel-col-5').owlCarousel({
            loop:true,
            smartSpeed: 500,
            autoplay: 5000,
            margin: 0,
            navText: [
                '<i class="fa fa-long-arrow-left"></i>',
                '<i class="fa fa-long-arrow-right"></i>'
            ],
            responsive: {
                0: {
                    items: 1,
                    center: false
                },
                480: {
                    items: 1,
                    center: false
                },
                600: {
                    items: 1,
                    center: false
                },
                750: {
                    items: 2,
                    center: false
                },
                960: {
                    items: 3
                },
                1170: {
                    items: 5
                },
                1300: {
                    items: 5
                }
            }
        });
    }

    //shop-col Four Column
        if ($('.shop-col').length) {
            $('.shop-col').owlCarousel({
                loop:true,
                margin:50,
                nav:false,
                smartSpeed: 500,
                autoplay: 5000,
                navText: [ '<span class="fa fa-angle-double-left"></span>', '<span class="fa fa-angle-double-right"></span>' ],
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1024:{
                        items:4
                    },
                    1199:{
                        items:4
                    },
                    1200:{
                        items:4
                    }
                }
            });         
        }

	//LightBox / Fancybox
	if($('.lightbox-image').length) {
		$('.lightbox-image').fancybox({
			openEffect  : 'elastic',
			closeEffect : 'elastic',
			helpers : {
				media : {}
			}
		});
	}

	// Scroll to a Specific Div
	if($('.scroll-to-target').length){
		$(".scroll-to-target").on('click', function() {
			var target = $(this).attr('data-target');
		   // animate
		   $('html, body').animate({
			   scrollTop: $(target).offset().top
			 }, 1000);
	
		});
	}

    //Progress Bar / Levels
    if($('.progress-levels .progress-box .bar-fill').length){
        $(".progress-box .bar-fill").each(function() {
            var progressWidth = $(this).attr('data-percent');
            $(this).css('width',progressWidth+'%');
            $(this).parents('.progress-box').children('.percent').html(progressWidth+'%');
        });
    }

  
    /*------------------------------------------
    = FUNFACT
    -------------------------------------------*/  
    if ($(".fun-fact").length) {

        $('.counter').appear();

        $(document.body).on('appear', '.counter', function(e) {
            var $this = $(this),
            countTo = $this.attr('data-count');

            $({ countNum: $this.text()}).animate({
                countNum: countTo
            }, {
                duration: 3000,
                easing:'linear',
                step: function() {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                    $this.text(this.countNum);
                }
            });
        });
    }
	
	
	// Elements Animation
	if($('.wow').length){
		var wow = new WOW(
		  {
			boxClass:     'wow',      // animated element css class (default is wow)
			animateClass: 'animated', // animation css class (default is animated)
			offset:       0,          // distance to the element when triggering the animation (default is 0)
			mobile:       true,       // trigger animations on mobile devices (default is true)
			live:         true       // act on asynchronously loaded content (default is true)
		  }
		);
		wow.init();
	}


    /* ---------------------------------------------
     portfolio filter set active class
     --------------------------------------------- */

    $('.portfolio-filter li').on("click",function (event) {
        $(this).siblings('.active').removeClass('active');
        $(this).addClass('active');
        event.preventDefault();
    });


    /* ---------------------------------------------
     isotope | init Isotope
     --------------------------------------------- */

    var $container = $(".portfolio:not(.portfolio-masonry)");
    if ($.fn.imagesLoaded && $container.length > 0) {
        imagesLoaded($container, function () {
            setTimeout(function(){
                $container.isotope({
                    itemSelector: '.portfolio-item',
                    layoutMode: 'fitRows',
                    filter: '*'
                });

                $(window).trigger("resize");
                // filter items on button click
            },500);

        });
    }


    /* ---------------------------------------------
     portfolio gallery
     --------------------------------------------- */


    $('.portfolio-gallery').each(function () { // the containers for all your galleries
        $(this).find(".popup-gallery").magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });
        $(this).find(".popup-gallery2").magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    });


    /* ---------------------------------------------
     portfolio filtering
     --------------------------------------------- */

    $('.portfolio-filter').on('click', 'a', function () {
        $('#filters button').removeClass('current');
        $(this).addClass('current');
        var filterValue = $(this).attr('data-filter');
        $(this).parents(".portfolio-filter-item").next().isotope({filter: filterValue});
    });

     /* ---------------------------------------------
     popup link
     --------------------------------------------- */

    $('.popup-link').magnificPopup({
        type: 'image'
        // other options
    });

     /* ---------------------------------------------
        accordion
        ---------------------------------------------- */

        var allPanels = $(".accordion > dd").hide();
            allPanels.first().slideDown("easeOutExpo");
            $(".accordion").each(function () {
                $(this).find("dt > a").first().addClass("active").parent().next().css({display: "block"});
            });

        $(".accordion > dt > a").click(function () {

            var current = $(this).parent().next("dd");
            $(this).parents(".accordion").find("dt > a").removeClass("active");
            $(this).addClass("active");
            $(this).parents(".accordion").find("dd").slideUp("easeInExpo");
            $(this).parent().next().slideDown("easeOutExpo");

            return false;

        });



        // filter-price
        $('.nstSlider').nstSlider({
            "left_grip_selector": ".leftGrip",
            "right_grip_selector": ".rightGrip",
            "value_bar_selector": ".bar",
            "value_changed_callback": function(cause, leftValue, rightValue) {
                $(this).parent().find('.leftLabel').text(leftValue);
                $(this).parent().find('.rightLabel').text(rightValue);
            }
        });


	/* ---------------------------------------------------------------------------
	 * Paralex Backgrounds
	* --------------------------------------------------------------------------- */
	var ua = navigator.userAgent,
		  isMobileWebkit = /WebKit/.test(ua) && /Mobile/.test(ua);
		  if( ! isMobileWebkit && jQuery(window).width() >= 768 ){
			$.stellar({
				horizontalScrolling	: false,
				responsive			: true
			});
	}

	// Parallax background
    function bgParallax() {
        if ($(".parallax").length) {
            $(".parallax").each(function() {
                var height = $(this).position().top;
                var resize     = height - $(window).scrollTop();
                var doParallax = -(resize/5);
                var positionValue   = doParallax + "px";
                var img = $(this).data("bg-image");

                $(this).css({
                    backgroundImage: "url(" + img + ")",
                    backgroundPosition: "50%" + positionValue,
                    backgroundSize: "cover"
                });
            });
        }
    }

    // Zoom
    $('.hover-zoom').zoom();
    
    // FlexSlider
    $('.flexslider').flexslider({ 
        animation: "slide",
        controlNav: false
    });

    // Nivoslider
    function nivoSlider() {
        $('.nivoSlider').nivoSlider({
        effect: 'random',
        slices: 15,
        boxCols: 8,
        boxRows: 4,
        animSpeed: 500,
        pauseTime: 3000,
        startSlide: 0,
        directionNav: true,
        controlNav: false,
        controlNavThumbs: false,
        prevText: '<i class="icon-angle-left"></i>',
        nextText: '<i class="icon-angle-right"></i>'
        });
    }

    // Bxslider
    $('.bxslider').bxSlider({
       pagerCustom: '#bx-pager',
       adaptiveHeight: false,
       mode: 'fade',
       auto: true,
       autoControls: true
    });

    // 3D Slider    
     $(".threeDslider").waterwheelCarousel({
    });

     // fullScreen div style
  if($('.fullScreen').length){
        $('.fullScreen').css({'height':($(window).height())+'px'});
        $(window).resize(function(){
        $('.fullScreen').css({'height':($(window).height())+'px'});
    });
  }


  


/* ==========================================================================
   When document is Scrollig, do
   ========================================================================== */
	
	$(window).on('scroll', function() {
		headerStyle();
        bgParallax();
	});
	
/* ==========================================================================
   When document is loading, do
   ========================================================================== */
    $(window).load(function() {
            sliderBgSetting();
            preloader();
			handlePreloader();
            bgParallax();
            nivoSlider();

    });

})(window.jQuery);





jQuery(document).ready(function(){
        // Swiper Slider
        var swiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination',
            effect: 'flip',
            autoplay: 4000,
            grabCursor: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev'
        });
    
});