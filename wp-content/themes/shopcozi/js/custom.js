jQuery(function($){
    "use strict";

    owl_register_carousel( null, jQuery );

    // List Layout
    jQuery(window).load(function(){
        if (jQuery('section[id]').length) {
            jQuery('section[id]').each(function() {
                var sectionID = jQuery(this).attr('id');
                var isotop_container = jQuery(this).find('.row.products');

                if( jQuery(this).find('.row.products').length > 0 ){               

                    var section_isotop = isotop_container.isotope({
                            itemSelector: '.col.product',
                            layoutMode: 'fitRows',
                            transitionDuration: '0.8s',
                            hiddenStyle: {
                                opacity: 0
                            },
                            visibleStyle: {
                                opacity: 1
                            }
                        });

                    var filterisotop = {
                        numberGreaterThan50: function() {
                            var number = jQuery(this).find('.number').text();
                            return parseInt( number, 10 ) > 50;
                        },
                        ium: function() {
                            var name = jQuery(this).find('.name').text();
                            return name.match( /ium$/ );
                        }
                    };
                
                    if( jQuery(this).find('.owl_filters').length > 0 ){
                        jQuery('#'+sectionID+' .owl_filters a.item').click(function(e) {
                            e.preventDefault();
                            var filter = jQuery(this).data( 'filter' );                    

                            filter = filterisotop[ filter ] || filter;
                            section_isotop.isotope({ filter: filter });

                            return false;
                        });
                    }
                }
            });
        }
    });


    if( window.matchMedia('(max-width: 991px)').matches ) {
        jQuery('.mobile-menu').find('.menu-item-has-children > a').each(function(){
            jQuery(this).append('<button class="btn menu-expend" data-menu-expend=""><i class="fa-solid fa-plus"></i></button>');
        });
    }

    jQuery('.browse-cat-menu-list .main-menu').find('li:has(ul) > a').each(function(){
        jQuery(this).append('<button class="menu-expend" data-menu-expend=""><i class="fa-solid fa-plus"></i></button>');
    });

    /*-- Browse Section Start --*/

    if( jQuery('.browse-cat-menu-list ul.main-menu').children().length >= 7 ) {
        jQuery(".browse-cat-menu-list").addClass("active");
        jQuery(".browse-cat-menu-list ul.main-menu").append('<li class="menu-item more-item"><button type="button" class="browse-more"><i class="fa-solid fa-plus"></i> <span>'+shopcozi_params.browse_cat_more_title+'</span></button></li>');
        jQuery(".browse-cat-menu-list > ul.main-menu > li:not(.more-item)").slice(0, 7).show();
        jQuery(".browse-more").on('click', function (e) {
            if (!jQuery(".browse-more").hasClass("active")) {
                jQuery(".browse-more").addClass("active");
                jQuery('.browse-more i').removeClass('fa-plus').addClass("fa-minus");
                jQuery(".browse-more").animate({display: "block"}, 500,
                    function () {
                        jQuery(".browse-cat-menu-list > ul.main-menu > li:not(.more-item):hidden").addClass('actived').slideDown(200);
                        if (jQuery(".browse-cat-menu-list > ul.main-menu > li:not(.more-item):hidden").length === 0) {
                            jQuery(".browse-more").html('<i class="fa-solid fa-minus"></i>  <span>'+shopcozi_params.browse_cat_nomore_title+'</span>');
                        }
                    }
                );
            } else {
                jQuery(".browse-more").removeClass("active");
                jQuery(".browse-more").animate({display: "none"}, 500,
                    function () {
                        if (jQuery(".browse-cat-menu-list > ul.main-menu > li:not(.more-item)").hasClass('actived')) {
                            jQuery(".browse-cat-menu-list > ul.main-menu > li:not(.more-item).actived").slideUp(200);
                            jQuery(".browse-more").html('<i class="fa-solid fa-plus"></i> <span>'+shopcozi_params.browse_cat_more_title+'</span>');
                        }
                    }
                );
            }
        });
    }

    jQuery('.product-cat-browse ').hasClass('active') ? browseMenuAccessibility() : jQuery('.product-browse-button').focus();
    function browseMenuAccessibility() {
        var e, t, i, n = document.querySelector(".product-cat-browse ");
        let a = document.querySelector(".product-browse-button"),
            s = n.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'),
            o = s[s.length - 1];
        if (!n) return !1;
        for (t = 0, i = (e = n.getElementsByTagName("a")).length; t < i; t++) e[t].addEventListener("focus", c, !0), e[t].addEventListener("blur", c, !0);
        function c() {
            for (var e = this; - 1 === e.className.indexOf("product-cat-browse ");) "li" === e.tagName.toLowerCase() && (-1 !== e.className.indexOf("focus") ? e.className = e.className.replace(" focus", "") : e.className += " focus"), e = e.parentElement
        }
        document.addEventListener("keydown", function(e) {
            ("Tab" === e.key || 9 === e.keyCode) && (e.shiftKey ? document.activeElement === a && (o.focus(), e.preventDefault()) : document.activeElement === o && (a.focus(), e.preventDefault()))
        })
    }

    var $els = jQuery('.browse-cat-menu-list a');
    var count = $els.length;
    var grouplength = Math.ceil(count/3);
    var groupNumber = 0;
    var i = 1;
    jQuery('.browse-cat-menu-list').css('--count',count+'');
    $els.each(function(j){
        if ( i > grouplength ) {
            groupNumber++;
            i=1;
        }
        jQuery(this).attr('data-group',groupNumber);
        i++;
    });

    if( window.matchMedia('(max-width: 991px)').matches ) {
        jQuery('.product-cat-browse').removeClass("active")
        jQuery('.browse-cat-menu-list').addClass('closed');
        jQuery('.browse-cat-menus .browse-cat-menu-list').css('display', 'none');
    } else {
        jQuery('.product-cat-browse').each(function(){
            if (jQuery('.product-cat-browse').hasClass("active") ) {
                setTimeout(function(){
                    jQuery('.browse-cat-menu-list').removeClass('closed');
                }, 100);
                jQuery('.browse-cat-menus .browse-cat-menu-list').slideDown(700);
            } else {
                jQuery('.browse-cat-menu-list').addClass('closed');
                jQuery('.browse-cat-menus .browse-cat-menu-list').css('display', 'none');
            }
        });
    }

    jQuery('.product-browse-button').on('click',function(e){
        e.preventDefault();
        $els.each(function(j){
            jQuery(this).css('--top',jQuery(this)[0].getBoundingClientRect().top + (jQuery(this).attr('data-group') * -15) - 20);
            jQuery(this).css('--delay-in',j*.1+'s');
            jQuery(this).css('--delay-out',(count-j)*.1+'s');
        });
        jQuery('.product-cat-browse').toggleClass("active");
        if (jQuery('.product-cat-browse').hasClass("active")) {
            setTimeout(function(){
                jQuery('.browse-cat-menu-list').removeClass('closed');
            }, 100);
            jQuery('.browse-cat-menus .browse-cat-menu-list').slideDown(700);
            if (jQuery(window).outerWidth() > 768 && !jQuery('.slider-section .col-lg-4').length > 0 ) {
                jQuery(".slider-area").css("width", "75%");
            }

        } else {
            jQuery('.browse-cat-menu-list').addClass('closed');
            jQuery('.browse-cat-menus .browse-cat-menu-list').slideUp(700);
            if (jQuery(window).outerWidth() > 768 && !jQuery('.slider-section .col-lg-4').length > 0 ) {
                jQuery(".slider-area").css("width", "100%");
            }
        }
        e.stopPropagation();
    });

    /*-- Browse Section End... --*/

    jQuery(window).on('scroll', function () {
      if (jQuery(this).scrollTop() > 200) {
        jQuery('.backTotop').addClass('is-active');
      } else {
        jQuery('.backTotop').removeClass('is-active');
      }
    });

    jQuery('.backTotop').on('click', function () {
      jQuery("html, body").animate({
        scrollTop: 0
      }, 600);
      return false;
    });

    jQuery(window).on('scroll', function() {
      if ( jQuery(window).scrollTop() >= 250 ) {
          jQuery('.is-sticky').addClass('is-sticky-fixed');
      } else {
          jQuery('.is-sticky').removeClass('is-sticky-fixed');
      }
    });
});

new WOW().init();

function blend_colors(color1, color2, percentage){
    // check input
    color1 = color1 || '#000000';
    color2 = color2 || '#ffffff';
    percentage = percentage || 0.5;

    // 1: validate input, make sure we have provided a valid hex
    if (color1.length != 4 && color1.length != 7)
        throw new error('colors must be provided as hexes');

    if (color2.length != 4 && color2.length != 7)
        throw new error('colors must be provided as hexes');    

    if (percentage > 1 || percentage < 0)
        throw new error('percentage must be between 0 and 1');

    // output to canvas for proof
    var cvs = document.createElement('canvas');
        cvs.setAttribute('style','display:none;');
    var ctx = cvs.getContext('2d');
    cvs.width = 90;
    cvs.height = 25;
    document.body.appendChild(cvs);

    // color1 on the left
    ctx.fillStyle = color1;
    ctx.fillRect(0, 0, 30, 25);

    // color2 on the right
    ctx.fillStyle = color2;
    ctx.fillRect(60, 0, 30, 25);

    // 2: check to see if we need to convert 3 char hex to 6 char hex, else slice off hash
    //      the three character hex is just a representation of the 6 hex where each character is repeated
    //      ie: #060 => #006600 (green)
    if (color1.length == 4)
        color1 = color1[1] + color1[1] + color1[2] + color1[2] + color1[3] + color1[3];
    else
        color1 = color1.substring(1);
    if (color2.length == 4)
        color2 = color2[1] + color2[1] + color2[2] + color2[2] + color2[3] + color2[3];
    else
        color2 = color2.substring(1);   

    // 3: we have valid input, convert colors to rgb
    color1 = [parseInt(color1[0] + color1[1], 16), parseInt(color1[2] + color1[3], 16), parseInt(color1[4] + color1[5], 16)];
    color2 = [parseInt(color2[0] + color2[1], 16), parseInt(color2[2] + color2[3], 16), parseInt(color2[4] + color2[5], 16)];

    // 4: blend
    var color3 = [ 
        (1 - percentage) * color1[0] + percentage * color2[0], 
        (1 - percentage) * color1[1] + percentage * color2[1], 
        (1 - percentage) * color1[2] + percentage * color2[2]
    ];

    // 5: convert to hex
    color3 = '#' + int_to_hex(color3[0]) + int_to_hex(color3[1]) + int_to_hex(color3[2]);

    // color3 in the middle
    ctx.fillStyle = color3;
    ctx.fillRect(30, 0, 30, 25);

    // return hex
    return color3;
}

function int_to_hex(num){
    var hex = Math.round(num).toString(16);
    if (hex.length == 1)
        hex = '0' + hex;
    return hex;
}

class OWL_Carousel{

    register( $scope, $ ){
        var carousel = this;
        if (jQuery('.owl-carousel').length) {
            jQuery('.owl-carousel').each(function(index, value) {
                carousel.run(jQuery(this), $);
            });
        }
    }

    run( data, $ ){
        jQuery(data[0]).each(function(index){
            
            if( !jQuery(this).hasClass('owl-carousel') || jQuery(this).hasClass('owl-loaded') ){
                return;
            }
        
            var element = jQuery(this);
            var unique_id = 'owl-slider-' + Math.floor(Math.random() * 10000) + '-' + index;
            element.attr('id',unique_id);

            var slider = element.owlCarousel({
                rtl: jQuery("html").attr("dir") == 'rtl' ? true : false,
                items: element.data("collg"),
                margin: element.data("itemspace"),
                loop: element.data("loop"),
                center: element.data("center"),
                thumbs: false,
                thumbImage: false,
                autoplay: element.data("autoplay"),
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                smartSpeed: element.data("smartspeed"),
                dots: element.data("dots"),
                nav: element.data("nav"),
                navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
                responsive: {
                    0: {
                        items: element.data("colxs"),
                    },
                    768: {
                        items: element.data("colsm"),
                    },
                    992: {
                        items: element.data("colmd"),
                    },
                    1200: {
                        items: element.data("collg"),
                    }
                },
            });

            if( element.parents('section').find('.owl-slider-nav').length > 0 ){
                var section_id = element.parents('section').attr('id');
                jQuery('#'+section_id+' .owl-slider-nav .owl-next').click(function(e) {
                    e.preventDefault();
                    slider.trigger('next.owl.carousel');
                });
                jQuery('#'+section_id+' .owl-slider-nav .owl-prev').click(function(e) {
                    e.preventDefault();
                    slider.trigger('prev.owl.carousel');
                });
            }

            if( element.parents('section').find('.owl_filters').length > 0 ){
                var section_id = element.parents('section').attr('id');
                jQuery('#'+section_id+' .owl_filters a.item').click(function(e) {
                    e.preventDefault();
                    var filter = jQuery(this).data( 'filter' );
                    slider.owlcarousel2_filter( filter );
                    return false;
                });
            }

            slider.on('change.owl.carousel', function(event) { // before slides are active
                jQuery('.owl-item').remove('animate__animated animate__fadeInUp');
            });
            slider.on('changed.owl.carousel', function(event) { //when slides are actives
                jQuery('.owl-item').addClass('animate__animated animate__fadeInUp');
            });

        });
    }

}

function owl_register_carousel( $scope, $ ){
    var owl_carousel = new OWL_Carousel();
    owl_carousel.register( $scope, jQuery );
}