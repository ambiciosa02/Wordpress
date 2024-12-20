<?php
if( ! function_exists('shopcozi_enqueue_scripts') ):
	function shopcozi_enqueue_scripts(){
		$option = shopcozi_theme_options();
		wp_enqueue_style('shopcozi-fonts', shopcozi_fonts_url(), array(), SHOPCOZI_THEME_VERSION);

		// CSS files		
		wp_enqueue_style('bootstrap-min',get_template_directory_uri().'/css/bootstrap.min.css',array(), SHOPCOZI_THEME_VERSION);
		wp_enqueue_style('fontawesome-all',get_template_directory_uri().'/css/all.min.css',array(), SHOPCOZI_THEME_VERSION);
		wp_enqueue_style('owl-carousel-min',get_template_directory_uri().'/css/owl.carousel.min.css',array(), SHOPCOZI_THEME_VERSION);
		wp_enqueue_style('swiper-bundle-min',get_template_directory_uri().'/css/swiper-bundle.min.css',array(), SHOPCOZI_THEME_VERSION);
		wp_enqueue_style('animate-min',get_template_directory_uri().'/css/animate.min.css',array(), SHOPCOZI_THEME_VERSION);
		wp_enqueue_style('shopcozi-contents',get_template_directory_uri().'/css/contents.css',array(), SHOPCOZI_THEME_VERSION);
		wp_enqueue_style('shopcozi-main',get_template_directory_uri().'/css/main.css',array(), SHOPCOZI_THEME_VERSION);
		wp_enqueue_style('shopcozi-widget',get_template_directory_uri().'/css/widget.css',array(), SHOPCOZI_THEME_VERSION);
		wp_enqueue_style('shopcozi-form',get_template_directory_uri().'/css/form.css',array(), SHOPCOZI_THEME_VERSION);		
		wp_enqueue_style('shopcozi-woo',get_template_directory_uri().'/css/woo.css',array(), SHOPCOZI_THEME_VERSION);
		wp_enqueue_style('shopcozi-style',get_stylesheet_uri());	

		// JS files
		wp_enqueue_script('jquery');
		wp_enqueue_script('bootstrap-bundle-min',get_template_directory_uri().'/js/bootstrap.bundle.min.js',array('jquery'),SHOPCOZI_THEME_VERSION,true);
		wp_enqueue_script('owl-carousel-min',get_template_directory_uri().'/js/owl.carousel.min.js',array(),SHOPCOZI_THEME_VERSION,true);
		wp_enqueue_script('owlcarousel2-filter-min',get_template_directory_uri().'/js/owlcarousel2-filter.min.js',array(),SHOPCOZI_THEME_VERSION,true);
		wp_enqueue_script('swiper-bundle-min',get_template_directory_uri().'/js/swiper-bundle.min.js',array(),SHOPCOZI_THEME_VERSION,true);
		wp_enqueue_script('wow-min',get_template_directory_uri().'/js/wow.min.js',array(),SHOPCOZI_THEME_VERSION,true);
		wp_enqueue_script('isotope-pkgd-min',get_template_directory_uri().'/js/isotope.pkgd.min.js',array(),SHOPCOZI_THEME_VERSION,true);
		wp_enqueue_script('shopcozi-custom',get_template_directory_uri().'/js/custom.js',array(),SHOPCOZI_THEME_VERSION,true);
		wp_enqueue_script('shopcozi-woo',get_template_directory_uri().'/js/woo.js',array(),SHOPCOZI_THEME_VERSION,true);
		wp_enqueue_script('shopcozi-script',get_template_directory_uri().'/js/script.js',array(),SHOPCOZI_THEME_VERSION,true);

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}


		if( defined('ICL_LANGUAGE_CODE') ){
			$ajax_url = admin_url('admin-ajax.php?lang='.ICL_LANGUAGE_CODE, 'relative');
		}
		else{
			$ajax_url = admin_url('admin-ajax.php', 'relative');
		}

		$shopcozi_params = array(
			'ajax_url' => $ajax_url,
			'browse_cat_more_title' => $option['shopcozi_browse_cat_more_title']!=''?$option['shopcozi_browse_cat_more_title']:__('More Category','shopcozi'),
			'browse_cat_nomore_title' => $option['shopcozi_browse_cat_nomore_title']!=''?$option['shopcozi_browse_cat_nomore_title']:__('No More','shopcozi'),
		);
		wp_localize_script('shopcozi-woo', 'shopcozi_params', $shopcozi_params);
		wp_localize_script('shopcozi-custom', 'shopcozi_params', $shopcozi_params);
	}
	add_action( 'wp_enqueue_scripts', 'shopcozi_enqueue_scripts' );
endif;

if( ! function_exists('shopcozi_admin_enqueue_scripts') ):
	function shopcozi_admin_enqueue_scripts(){
		wp_enqueue_style('shopcozi_admin_notice',get_template_directory_uri().'/css/admin_notice.css');
		wp_enqueue_script('shopcozi_admin_notice',get_template_directory_uri().'/js/admin_notice.js');
		wp_localize_script( 'shopcozi_admin_notice', 'shopcozi_ajax_object',
	        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
	    );
	}
	add_action( 'admin_enqueue_scripts', 'shopcozi_admin_enqueue_scripts' );
endif;