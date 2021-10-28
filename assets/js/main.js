(function($){

    "use strict";

    jQuery(document).ready(function ($) {

        // Home Page Counter Area JQuery Codes
        jQuery(document).ready(function($) {
            $('.counter-number').counterUp({
                delay: 15,
                time: 1200,
            });
        });


        // Gallery Filter JQuery Codes
        var $grid = $('.grid').isotope({
        });
        // filter items on button click
        $('.gallery-filter-option').on( 'click', 'li', function() {
            $(this).addClass('active').siblings().removeClass('active');
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({ filter: filterValue });
        });
        $('.grid').isotope({
          itemSelector: '.gallery-item',
          percentPosition: true,
          masonry: {
            // use outer width of grid-sizer for columnWidth
            columnWidth: '.gallery-item'
          }
        });

        // Video Popup
        $(".video-presentetion").fancybox({
            maxWidth    : 800,
            maxHeight   : 600,
            fitToView   : false,
            width       : '65%',
            height      : '65%',
            autoSize    : false,
            closeClick  : false,
            openEffect  : 'none',
            closeEffect : 'none'
        });

        // Fency Box
        $('[data-fancybox]').fancybox({
            loop: true,
            keyboard: true,
            arrows: true,
            buttons: [
                "slideShow",
                "fullScreen",
                "thumbs",
                "close"
              ],
            animationEffect: "fade",
            transitionEffect: "slide",
            iframe : {
                preload : false,
            },
        });


        // Client Testimonial JQuery Codes
        $('.client-testimonial').owlCarousel({
            items: 2,
            loop: true, 
            autoplay: true,
            autoplayTimeout:8000,
            dots: false,
            nav: true,
            navText: ["<i class='fa fa-arrow-left'></i>", "<i class='fa fa-arrow-right'></i>"],
            responsive:{
                0:{items:1},
                600:{items:1},
                1000:{items:2}
            },
        });


        // Home Page Client Logo ShowCase
        $('.client-logo').owlCarousel({
            loop:true,
            autoplay: true,
            autoplayTimeout:5000,
            dots: false,
            nav: false,
            responsive:{
                0:{items:1},
                600:{items:3},
                1000:{items:5}
            }
        });

        // Blog Side Bar Latest News
        $('.sidebar-latest-news').owlCarousel({
            loop:true,
            autoplay: true,
            autoplayTimeout:5000,
            dots: true,
            nav: false,
            //animateOut: 'fadeOut',
            responsive:{
                0:{items:1},
                600:{items:1},
                1000:{items:1}
            }
        });

        // Team Page Circle Pie Chart
        $(function() {
            $('.chart').easyPieChart({
                size: 150,
                barColor: '#ffc400',
                scaleColor: false,
                lineWidth: '10',
                trackColor: '#4f4f4f', 
                animate: 1800
            });
        });


    });
    

})(jQuery);
