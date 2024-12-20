jQuery(function($){
    "use strict";

    sc_register_carousel( null, jQuery );

    /* Carousel */
    $(window).on('sc_slider_middle_navigation_position', function(e, swiper){
        if( swiper.parents('.sc-slider.middle-thumbnail.rows-1').length || swiper.parents('.related').length || swiper.parents('.upsells').length || swiper.parents('.cross-sells').length ){
            var thumbnail = swiper.find('.swiper-slide-active').first().find('.product-wrapper .thumbnail-wrapper, .product-wrapper > a, .article-content .thumbnail-content > a.thumbnail');
            var top = thumbnail.length ? thumbnail.height() / 2 : 0;
            if( top ){
                swiper.find('.swiper-button-prev, .swiper-button-next').css('top', top);
            }
        }
    });

    /* [wrapper selector, slider selector, slider options, extra settings] */

    var carousel_data = [
        ['.single-product .related .products, .single-product .upsells .products, .woocommerce .cross-sells .products', null, null, {show_nav: true, auto_play: false}]
    ];
    
    $.each(carousel_data, function( i, data ){
        $(data[0]).each(function( index ){
            var element = $(this);
            if( typeof data[1] != 'undefined' && data[1] != null ){
                var swiper = element.find(data[1]);
            }
            else{
                var swiper = element;
            }
            
            if( swiper.find('> *').length <= 1 ){
                element.removeClass('loading');
                swiper.parent().removeClass('loading');
                return;
            }
            
            var unique_class = 'swiper-theme-' + Math.floor(Math.random() * 10000) + '-' + index;
        
            swiper.addClass('swiper ' + unique_class);
            swiper.find('> *').addClass('swiper-slide');
            swiper.wrapInner('<div class="swiper-wrapper"></div>');
            
            if( $('body').hasClass('rtl') ){
                swiper.attr('dir', 'rtl');
            }
            
            var slider_options = {
                loop: true,
                spaceBetween: 30,
                breakpointsBase: 'container',
                breakpoints:{
                    0:{slidesPerView:1},
                    664:{slidesPerView:2},
                    768:{slidesPerView:3},
                    991:{slidesPerView:3},
                    1024:{slidesPerView:3},
                    1200:{slidesPerView:4}
                },
                on: {
                    init: function(){
                        element.removeClass('loading');
                        swiper.parent().removeClass('loading');
                        $(window).trigger('sc_slider_middle_navigation_position', [swiper]);
                    },
                    resize: function(){
                        $(window).trigger('sc_slider_middle_navigation_position', [swiper]);
                    }
                }
            };
            
            if( typeof data[2] != 'undefined' && data[2] != null ){
                $.extend( slider_options, data[2] );
            }
            
            if( typeof data[3] != 'undefined' && data[3] != null ){
                var extra_settings = data[3];

                if( typeof extra_settings.show_nav != 'undefined' && extra_settings.show_nav ){
                    swiper.append('<div class="swiper-button-prev"></div><div class="swiper-button-next"></div>');
                    
                    slider_options.navigation = {
                        prevEl: '.swiper-button-prev'
                        ,nextEl: '.swiper-button-next'
                    };
                }
                
                if( typeof extra_settings.auto_play != 'undefined' && extra_settings.auto_play ){
                    slider_options.autoplay = {
                        delay: 5000,
                        disableOnInteraction: false,
                        pauseOnMouseEnter: true
                    };
                }
            }
            
            new Swiper( '.' + unique_class, slider_options );
        });
    });

    /* Image Lazy Load */
    function lazyload_slider_middle_navigation_position( img ){
        if( img.parents('.swiper').length && !img.parents('.swiper.lazy-recalc-nav-pos').length && img.parents('.swiper-slide-active').length ){
            img.parents('.swiper').addClass('lazy-recalc-nav-pos');
            $(window).trigger('sc_slider_middle_navigation_position', [img.parents('.swiper')]);
            img.on('load', function(){ /* recalc if image is not loaded */
                $(window).trigger('sc_slider_middle_navigation_position', [img.parents('.swiper')]);
            });
        }
    }

    if( $('img.sc-lazy-load').length ){
        $(window).on('scroll sc_lazy_load', function(){
            var scroll_top = $(this).scrollTop();
            var window_height = $(this).height();
            $('img.sc-lazy-load:not(.loaded)').each(function(){
                if( $(this).data('src') && $(this).offset().top < scroll_top + window_height + 900 ){
                    $(this).attr('src', $(this).data('src')).addClass('loaded');
                    lazyload_slider_middle_navigation_position( $(this) );
                }
            });
        });
        
        if( $('img.sc-lazy-load:first').offset().top < $(window).scrollTop() + $(window).height() + 200 ){
            $(window).trigger('sc_lazy_load');
        }
    }

    /*** Color Swatch - Product Gallery ***/
    $(document).on('click', '.products .product .color-swatch > div, .products .product .sc-product-galleries > div', function(){
        $(this).addClass('active').siblings().removeClass('active');
        /* Change thumbnail */
        $(this).closest('.product').find('figure img:first').attr('src', $(this).data('thumb')).removeAttr('srcset sizes');
        /* Change price */
        var term_id = $(this).data('term_id');
        if( typeof term_id != 'undefined' ){
            var variable_prices = $(this).parent().siblings('.variable-prices');
            var price_html = variable_prices.find('[data-term_id="'+term_id+'"]').html();
            $(this).closest('.product').find('.meta-wrapper .price:not(.hidden-price)').html( price_html ).addClass('variation-price');
        }
    });
    /*** Product Stock - Variable Product ***/
    function single_variable_product_reset_stock( wrapper ){
        var stock_html = wrapper.find('.availability').data('original');
        var classes = wrapper.find('.availability').data('class');
        if( classes == '' ){
            classes = 'in-stock';
        }
        wrapper.find('.availability .availability-text').html(stock_html);
        wrapper.find('.availability').removeClass('in-stock out-of-stock').addClass(classes);
    }
    $(document).on('found_variation', 'form.variations_form', function( e, variation ){
        var wrapper = $(this).parents('.summary');
        if( wrapper.find('.single_variation .stock').length > 0 ){
            var stock_html = wrapper.find('.single_variation .stock').html();
            var classes = wrapper.find('.single_variation .stock').hasClass('out-of-stock')?'out-of-stock':'in-stock';
            wrapper.find('.availability .availability-text').html(stock_html);
            wrapper.find('.availability').removeClass('in-stock out-of-stock').addClass(classes);
        }
        else{
            single_variable_product_reset_stock( wrapper );
        }
        
        if( typeof variation.discount_percent != 'undefined' && variation.discount_percent ){
            wrapper.find('.sc-discount-percent').removeClass('hidden');
            wrapper.find('.sc-discount-percent span').html(variation.discount_percent);
        }
        else{
            wrapper.find('.sc-discount-percent').addClass('hidden');
        }
        
        if( typeof variation.low_stock_notice != 'undefined' ){
            wrapper.find('.sc-low-stock-notice').html(variation.low_stock_notice);
        }
    });
    $(document).on('reset_image', 'form.variations_form', function(){
        var wrapper = $(this).parents('.summary');
        single_variable_product_reset_stock( wrapper );
        
        wrapper.find('.sc-discount-percent').addClass('hidden');
        
        wrapper.find('.sc-low-stock-notice').html('');
    });
    /*** Variation attribute ***/
    $(document).on('change', 'form.variations_form .variations select', function(){
        var val = $(this).val();
        var text = val.length ? $(this).find('option[value="' + val + '"]').text() : '';
        var label = $(this).parent().siblings('.label');
        if( label.find('.selected-value').length ){
            label.find('.selected-value').text(text);
        }
        else{
            label.append('<span class="selected-value">' + text + '</span>');
        }
    });
    $('form.variations_form .variations select').trigger('change');
    /*** Variation price ***/
    $(document).on('found_variation', 'form.variations_form', function(e, variation){
        var summary = $(this).parents('.summary');
        if( variation.price_html ){
            summary.find('.sc-variation-price').html( variation.price_html ).removeClass('hidden');
            summary.find('p.price').addClass('hidden');
        }
    });
    $(document).on('reset_image', 'form.variations_form', function(){
        var summary = $(this).parents('.summary');
        summary.find('p.price').removeClass('hidden');
        summary.find('.sc-variation-price').addClass('hidden');
    });
    /*** Hide product attribute if not available ***/
    $(document).on('update_variation_values', 'form.variations_form', function(){
        if( $(this).find('.sc-product-attribute').length > 0 ){
            $(this).find('.sc-product-attribute').each(function(){
                var attr = $(this);
                var values = [];
                attr.siblings('select').find('option').each(function(){
                    if( $(this).attr('value') ){
                        values.push( $(this).attr('value') );
                    }
                });
                attr.find('.option').removeClass('hidden');
                attr.find('.option').each(function(){
                    if( $.inArray($(this).attr('data-value'), values) == -1 ){
                        $(this).addClass('hidden');
                    }
                });
            });
        }
    });

    /* Single Product - Variable Product options */
    $(document).on('click', '.variations_form .sc-product-attribute .option a', function(){
        var _this = $(this);
        var val = _this.closest('.option').data('value');
        var selector = _this.closest('.sc-product-attribute').siblings('select');
        if( selector.length > 0 ){
            if( selector.find('option[value="' + val + '"]').length > 0 ){
                selector.val(val).change();
                _this.closest('.sc-product-attribute').find('.option').removeClass('selected');
                _this.closest('.option').addClass('selected');
            }
        }
        return false;
    });
    $('.variations_form').on('click', '.reset_variations', function(){
        $(this).closest('.variations').find('.sc-product-attribute .option').removeClass('selected');
    });

    $(document).on('found_variation', 'form.variations_form', function(){
        $(this).parents('.summary').find('.sc-buy-now-button').removeClass('disabled');
    });
    
    $(document).on('reset_image', 'form.variations_form', function(){
        $(this).parents('.summary').find('.sc-buy-now-button').addClass('disabled');
    });

    /* Image Lazy Load */
    function lazyload_slider_middle_navigation_position( img ){
        if( img.parents('.swiper').length && !img.parents('.swiper.lazy-recalc-nav-pos').length && img.parents('.swiper-slide-active').length ){
            img.parents('.swiper').addClass('lazy-recalc-nav-pos');
            $(window).trigger('sc_slider_middle_navigation_position', [img.parents('.swiper')]);
            img.on('load', function(){ /* recalc if image is not loaded */
                $(window).trigger('sc_slider_middle_navigation_position', [img.parents('.swiper')]);
            });
        }
    }
    
    if( $('img.sc-lazy-load').length ){
        $(window).on('scroll sc_lazy_load', function(){
            var scroll_top = $(this).scrollTop();
            var window_height = $(this).height();
            $('img.sc-lazy-load:not(.loaded)').each(function(){
                if( $(this).data('src') && $(this).offset().top < scroll_top + window_height + 900 ){
                    $(this).attr('src', $(this).data('src')).addClass('loaded');
                    lazyload_slider_middle_navigation_position( $(this) );
                }
            });
        });
        
        if( $('img.sc-lazy-load:first').offset().top < $(window).scrollTop() + $(window).height() + 200 ){
            $(window).trigger('sc_lazy_load');
        }
    }
});

class SC_Carousel{
    register( $scope, $ ){
        var carousel = this;
        
        /* [wrapper selector, slider selector, slider options (remove dynamic columns at last)] */
        var data = [
            ['.sc-product-wrapper', '.products', { breakpoints:{0:{slidesPerView:1},320:{slidesPerView:2},520:{slidesPerView:3},700:{slidesPerView:4},910:{slidesPerView:5}} }]
            ,['.sc-product-deals-wrapper', '.products', { breakpoints:{0:{slidesPerView:1},320:{slidesPerView:2},550:{slidesPerView:3},700:{slidesPerView:4},910:{slidesPerView:5}} }]
            ,['.sc-product-category-wrapper', '.products', { breakpoints:{0:{slidesPerView:2},340:{slidesPerView:3},480:{slidesPerView:4},650:{slidesPerView:5},700:{slidesPerView:6},900:{slidesPerView:7}} }]
            ,['.sc-product-brand-wrapper', '.content-wrapper', { breakpoints:{0:{slidesPerView:1},300:{slidesPerView:2},690:{slidesPerView:3}} }]
            ,['.sc-products-widget-wrapper', null, { spaceBetween: 10, breakpoints:{0:{slidesPerView:1}} }]
            ,['.sc-blogs-wrapper', '.content-wrapper > .blogs', { breakpoints:{0:{slidesPerView:1},550:{slidesPerView:2},690:{slidesPerView:3}} }]
            ,['.sc-logo-slider-wrapper', '.items', { breakpoints:{0:{slidesPerView:1},300:{slidesPerView:2},400:{slidesPerView:3},640:{slidesPerView:4},840:{slidesPerView:5},950:{slidesPerView:6},1150:{slidesPerView:7}} }]
            ,['.sc-team-members', '.items', { breakpoints:{0:{slidesPerView:1},350:{slidesPerView:2},590:{slidesPerView:3},650:{slidesPerView:4}} }]
            ,['.sc-instagram-wrapper', '.items', { spaceBetween: 0, breakpoints: {0:{slidesPerView:1},300:{slidesPerView:2},400:{slidesPerView:3},580:{slidesPerView:4},700:{slidesPerView:5},840:{slidesPerView:6}} }]
            ,['.sc-testimonial-wrapper', '.items', { breakpoints:{0:{slidesPerView:1},520:{slidesPerView:2},980:{slidesPerView:3}} }]
            ,['.sc-blogs-widget-wrapper', null, { spaceBetween: 10, breakpoints: {0:{slidesPerView:1}} }]
            ,['.sc-recent-comments-widget-wrapper', null, { spaceBetween: 10, breakpoints: {0:{slidesPerView:1}} }]
            ,['.sc-product-in-category-tab-wrapper, .sc-product-in-product-type-tab-wrapper', '.products', { breakpoints:{0:{slidesPerView:1},320:{slidesPerView:2},610:{slidesPerView:3},700:{slidesPerView:4}} }]
            ,['.sc-videos-elementor-widget', '.videos', { breakpoints: {0:{slidesPerView:1},600:{slidesPerView:2}} }]
            ,['.sc-blogs-wrapper .thumbnail.gallery', 'figure', { autoplay: true, effect: 'fade', spaceBetween: 10, simulateTouch: false, allowTouchMove: false, breakpoints:{0:{slidesPerView:1}} }]
        ];
        
        $.each(data, function(index, value){
            if( $(value).length ){
                carousel.run( value, $ );
            }
        });
    }
    
    run( data, $ ){
        $(data[0]).each(function(index){
            if( ! $(this).hasClass('sc-slider') || $(this).hasClass('generated-slider') ){
                return;
            }
            $(this).addClass('generated-slider');
            
            var element = $(this);
            var show_nav = typeof element.attr('data-nav') != 'undefined' && element.attr('data-nav') == 1?true:false;
            var show_dots = typeof element.attr('data-dots') != 'undefined' && element.attr('data-dots') == 1?true:false;
            var show_scrollbar = typeof element.attr('data-scrollbar') != 'undefined' && element.attr('data-scrollbar') == 1?true:false;
            var auto_play = typeof element.attr('data-autoplay') != 'undefined' && element.attr('data-autoplay') == 1?true:false;
            var columns = typeof element.attr('data-columns') != 'undefined'?parseInt(element.attr('data-columns')):5;
            var disable_responsive = typeof element.attr('data-disable_responsive') != 'undefined' && element.attr('data-disable_responsive') == 1?true:false;
            var prev_nav_text = typeof element.attr('data-prev_nav_text') != 'undefined'?element.attr('data-prev_nav_text'):'';
            var next_nav_text = typeof element.attr('data-next_nav_text') != 'undefined'?element.attr('data-next_nav_text'):'';
                
            if( typeof data[1] != 'undefined' && data[1] != null ){
                var swiper = element.find(data[1]);
            }
            else{
                var swiper = element;
            }
            
            if( swiper.find('> *').length <= 1 ){
                element.removeClass('loading').find('.loading').removeClass('loading');
                return;
            }
            
            var unique_class = 'swiper-' + Math.floor(Math.random() * 10000) + '-' + index;
            
            swiper.addClass('swiper ' + unique_class);
            swiper.find('> *').addClass('swiper-slide');
            swiper.wrapInner('<div class="swiper-wrapper"></div>');
            
            if( $('body').hasClass('rtl') ){
                swiper.attr('dir', 'rtl');
            }
            
            var slider_options = {
                    loop: true
                    ,spaceBetween: 0
                    ,breakpointsBase: 'container'
                    ,breakpoints:{0:{slidesPerView:1},320:{slidesPerView:2},580:{slidesPerView:3},810:{slidesPerView:columns}}
                    ,on: {
                        init: function(){
                            element.removeClass('loading').find('.loading').removeClass('loading');
                            $(window).trigger('sc_slider_middle_navigation_position', [swiper]);
                        }
                        ,resize: function(){
                            $(window).trigger('sc_slider_middle_navigation_position', [swiper]);
                        }
                    }
                };
            
            if( show_nav ){
                swiper.append('<div class="swiper-button-prev">' + prev_nav_text + '</div><div class="swiper-button-next">' + next_nav_text + '</div>');
                
                slider_options.navigation = {
                    prevEl: '.swiper-button-prev'
                    ,nextEl: '.swiper-button-next'
                };
            }
            
            if( show_dots ){
                swiper.append('<div class="swiper-pagination"></div>');
                
                slider_options.pagination = {
                    el: '.swiper-pagination'
                    ,clickable: true
                };
            }
            
            if( show_scrollbar ){
                swiper.append('<div class="swiper-scrollbar"></div>');
                
                slider_options.scrollbar = {
                    el: '.swiper-scrollbar'
                    ,draggable: true
                };
                
                slider_options.loop = false;
            }
            
            if( auto_play ){
                slider_options.autoplay = {
                    delay: 5000
                    ,disableOnInteraction: false
                    ,pauseOnMouseEnter: true
                };
            }
            
            if( typeof data[2] != 'undefined' && data[2] != null ){
                $.extend( slider_options, data[2] );
                
                if( typeof data[2].breakpoints != 'undefined' ){ /* change breakpoints => add dynamic columns at last */
                    switch( data[0] ){
                        case '.sc-product-deals-wrapper':
                        case '.sc-blogs-wrapper':
                        case '.sc-product-wrapper':
                            slider_options.breakpoints[1200] = {slidesPerView:columns};
                            if( element.hasClass('layout-list') ){
                                 slider_options.breakpoints = {0:{slidesPerView:columns}};
                            }
                        break;
                        case '.sc-product-brand-wrapper':
                            slider_options.breakpoints[1000] = {slidesPerView:columns};
                        break;
                        case '.sc-product-category-wrapper':
                            slider_options.breakpoints[1000] = {slidesPerView:columns};
                            if( element.hasClass('show-icon') ){
                                 slider_options.breakpoints = {0:{slidesPerView:2},320:{slidesPerView:3},410:{slidesPerView:4},650:{slidesPerView:5},700:{slidesPerView:6},800:{slidesPerView:7},900:{slidesPerView:8},1100:{slidesPerView:columns}};
                            }
                            if( element.hasClass('style-horizontal') ){
                                 slider_options.breakpoints = {0:{slidesPerView:1},320:{slidesPerView:2},600:{slidesPerView:3},700:{slidesPerView:4},950:{slidesPerView:5},1091:{slidesPerView:columns}};
                            }
                            if( element.hasClass('columns-10') && element.hasClass('style-vertical') ){
                                 slider_options.breakpoints = {0:{slidesPerView:2},320:{slidesPerView:3},600:{slidesPerView:4},700:{slidesPerView:6},950:{slidesPerView:8},1200:{slidesPerView:columns}};
                            }
                        break;
                        case '.sc-team-members':
                            slider_options.breakpoints[800] = {slidesPerView:columns};
                        break;
                        case '.sc-testimonial-wrapper':
                            slider_options.breakpoints[1200] = {slidesPerView:columns};
                        break;
                        case '.sc-instagram-wrapper':
                            slider_options.breakpoints[1200] = {slidesPerView:columns};
                        break;
                        case '.sc-product-in-category-tab-wrapper, .sc-product-in-product-type-tab-wrapper':
                            slider_options.breakpoints[1200] = {slidesPerView:columns};
                            if( element.hasClass('item-layout-list') ){
                                slider_options.breakpoints = {0:{slidesPerView:1},620:{slidesPerView:2},1200:{slidesPerView:columns}};
                            }
                        break;
                        case '.sc-videos-elementor-widget':
                            slider_options.breakpoints[700] = {slidesPerView:columns};
                            if( element.hasClass('partial-view') ){
                                slider_options.centeredSlides = true;
                            }
                        break;
                        default:
                    }
                }
            }
            
            if( element.hasClass('use-logo-setting') ){ /* Product Brands - Logos */
                var break_point = element.data('break_point');
                var item = element.data('item');
                if( break_point.length > 0 ){
                    slider_options.breakpoints = {};
                    for( var i = 0; i < break_point.length; i++ ){
                        slider_options.breakpoints[break_point[i]] = {slidesPerView: item[i]};
                    }
                }
            }
            
            if( disable_responsive ){
                if( columns > 2){
                    slider_options.breakpoints = {0:{slidesPerView:1},320:{slidesPerView:2},520:{slidesPerView:columns}};
                }
                else{
                    slider_options.breakpoints = {0:{slidesPerView:columns}};
                }
            }
            
            new Swiper( '.' + unique_class, slider_options );
        });
    }
}

function sc_register_carousel( $scope, $ ){
    var carousel = new SC_Carousel();
    carousel.register( $scope, jQuery );
}