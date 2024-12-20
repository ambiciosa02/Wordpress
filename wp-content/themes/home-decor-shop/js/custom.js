function home_decor_shop_navigation_open() {
    jQuery(".side_gb_nav").addClass('show');
}
function home_decor_shop_navigation_close() {
    jQuery(".side_gb_nav").removeClass('show');
}

jQuery(function($){
    $('.gb_toggle').click(function () {
        home_decor_shop_keyboard_navigation_loop($('.side_gb_nav'));
    });
});

jQuery(document).ready(function($) {    
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').on('click', function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    var owl = jQuery('#home_slider .owl-carousel');
        owl.owlCarousel({
        margin:0,
        nav: false,
        lazyLoad: true,
        autoplayTimeout: 3000,
        loop: true,
        dots:true,
        rtl:true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          1000: {
            items: 1
          }
        },
        autoplayHoverPause : true,
        mouseDrag: true
    });

    function home_decor_shop_days_countdown() {
        const newYears = document.getElementById('new-year-date').value;
        const newYearsDate = new Date(newYears);
        const currentDate = new Date();

        var daysEl = document.getElementById('days');
        var hoursEl = document.getElementById('hours');
        var minsEL = document.getElementById('mins');
        var secondsEL = document.getElementById('seconds');

        const totalSeconds = (newYearsDate - currentDate) /1000;
        const minutes = Math.floor(totalSeconds/ 60) % 60;
        const hours = Math.floor(totalSeconds /3600) % 24;
        const days = Math.floor(totalSeconds /3600/ 24);
        const seconds = Math.floor(totalSeconds) % 60;
        
        daysEl.innerText = days;
        hoursEl.innerText = hours;
        minsEL.innerText = minutes;
        secondsEL.innerText = seconds;
    }

    var checkTimerDiv = document.getElementById('countdown-timer');
    if(checkTimerDiv) {
        setInterval(home_decor_shop_days_countdown, 1000);
    }
    
});

 window.addEventListener('load', (event) => {
    jQuery(".loading").delay(2000).fadeOut("slow");
});

//* Navbar Fixed  
function navbarFixed(){
    if ( jQuery('.navbar-area.is-sticky-on').length ){ 
        jQuery(window).on('scroll', function() {
            var scroll = jQuery(window).scrollTop();   
            if (scroll >= 295) {
                jQuery(".navbar-area.is-sticky-on").addClass("header-fixed");
            } else {
                jQuery(".navbar-area.is-sticky-on").removeClass("header-fixed");
            }
        });  
    };
}; 

navbarFixed(); 