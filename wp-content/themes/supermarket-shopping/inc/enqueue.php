<?php

// In your theme's functions.php or equivalent
add_action('customize_controls_enqueue_scripts', function() {
    $version = wp_get_theme()->get('Version');
    
    // Define parameters
    $customizer_params = array(
        'some_key' => 'some_value', // Add your parameters here
    );
    
    wp_enqueue_script(
        'supermarket-shopping-customize-section-button',
        get_theme_file_uri('assets/js/customize-controls.js'),
        ['customize-controls'],
        $version,
        true
    );

    wp_enqueue_style(
        'supermarket-shopping-customize-section-button',
        get_theme_file_uri('assets/css/customize-controls.css'),
        ['customize-controls'],
        $version
    );

    wp_localize_script(
        'supermarket-shopping-customize-section-button',
        'supermarket_shopping_customizer_params',
        $customizer_params
    );
});


 /**
 * Enqueue scripts and styles.
 */
function supermarket_shopping_scripts() {
	// Styles	 

	wp_enqueue_style('bootstrap-min',get_template_directory_uri().'/assets/css/bootstrap.min.css');

	// owl
	wp_enqueue_style( 'owl-carousel-css', get_theme_file_uri( '/assets/css/owl.carousel.css' ) );
		
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
	
	wp_enqueue_style('supermarket-shopping-editor-style',get_template_directory_uri().'/assets/css/editor-style.css');

	wp_enqueue_style('supermarket-shopping-main', get_template_directory_uri() . '/assets/css/main.css');

	wp_enqueue_style('supermarket-shopping-woo', get_template_directory_uri() . '/assets/css/woo.css');
	
	wp_enqueue_style( 'supermarket-shopping-style', get_stylesheet_uri() );


	wp_enqueue_style('supermarket-shopping-main', get_stylesheet_uri(), array() );
		wp_style_add_data('supermarket-shopping-main', 'rtl', 'replace');
	
	// Scripts

	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), false, true);

	wp_enqueue_script('supermarket-shopping-theme-js', get_template_directory_uri() . '/assets/js/theme.js', array('jquery'), false, true);

	wp_enqueue_script( 'owl-carousel-js', get_theme_file_uri( '/assets/js/owl.carousel.js' ), array( 'jquery' ), true );

	wp_enqueue_script( 'jquery-superfish', get_theme_file_uri( '/assets/js/jquery.superfish.js' ), array( 'jquery' ), '2.1.2', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// inlin css
	$supermarket_shopping_inline_style = '';

	$supermarket_shopping_slider_setting = get_theme_mod( 'supermarket_shopping_slider_setting', true);
	if($supermarket_shopping_slider_setting == false) {
	    $supermarket_shopping_inline_style .= '.page-template-template-frontpage .middle-header-area{';
	    $supermarket_shopping_inline_style .= 'position:static; border-bottom:1px solid #ccc;';
	    $supermarket_shopping_inline_style .= '}';
	}

	wp_add_inline_style( 'supermarket-shopping-style', $supermarket_shopping_inline_style );

}
add_action( 'wp_enqueue_scripts', 'supermarket_shopping_scripts' );

//Admin Enqueue for Admin
function supermarket_shopping_admin_enqueue_scripts(){
	wp_enqueue_style('supermarket-shopping-admin-style', esc_url( get_template_directory_uri() ) . '/inc/aboutthemes/admin.css');
	wp_enqueue_script('dismiss-notice-script', get_stylesheet_directory_uri() . '/inc/aboutthemes/theme-admin-notice.js', array('jquery'), null, true);
}
add_action( 'admin_enqueue_scripts', 'supermarket_shopping_admin_enqueue_scripts' );

// Function to enqueue custom CSS
function supermarket_shopping_enqueue_custom_css() {
    // Define a unique handle for your inline stylesheet
    $handle = 'supermarket-shopping-style';
    
    // Get the generated custom CSS
    $supermarket_shopping_custom_css = "";

    $supermarket_shopping_blog_layouts = get_theme_mod('supermarket_shopping_blog_layout_option_setting', 'Default');
    if ($supermarket_shopping_blog_layouts == 'Default') {
        $supermarket_shopping_custom_css .= '.blog-item{';
        $supermarket_shopping_custom_css .= 'text-align:center;';
        $supermarket_shopping_custom_css .= '}';
    } elseif ($supermarket_shopping_blog_layouts == 'Left') {
        $supermarket_shopping_custom_css .= '.blog-item{';
        $supermarket_shopping_custom_css .= 'text-align:Left;';
        $supermarket_shopping_custom_css .= '}';
    } elseif ($supermarket_shopping_blog_layouts == 'Right') {
        $supermarket_shopping_custom_css .= '.blog-item{';
        $supermarket_shopping_custom_css .= 'text-align:Right;';
        $supermarket_shopping_custom_css .= '}';
    }

    // Enqueue the inline stylesheet
    wp_add_inline_style($handle, $supermarket_shopping_custom_css);

    // Add inline style for Scroll to Top
    $supermarket_shopping_scroll_top_bg_color = get_theme_mod('supermarket_shopping_scroll_top_bg_color', '#78B85D');
    $supermarket_shopping_scroll_top_color = get_theme_mod('supermarket_shopping_scroll_top_color', '#fff');
    $supermarket_shopping_scroll_custom_css = "
        #scrolltop {
            background-color: {$supermarket_shopping_scroll_top_bg_color};
        }
        #scrolltop span {
            color: {$supermarket_shopping_scroll_top_color};
        }
    ";
    wp_add_inline_style('supermarket-shopping-style', $supermarket_shopping_scroll_custom_css);

    // Add inline style for Preloader
    $supermarket_shopping_preloader_bg_color = get_theme_mod('supermarket_shopping_preloader_bg_color', '#ffffff');
    $supermarket_shopping_preloader_color = get_theme_mod('supermarket_shopping_preloader_color', '#78B85D');
    $supermarket_shopping_preloader_custom_css = "
        .loading {
            background-color: {$supermarket_shopping_preloader_bg_color};
        }
        .loader {
            border-color: {$supermarket_shopping_preloader_color};
            color: {$supermarket_shopping_preloader_color};
            text-shadow: 0 0 10px {$supermarket_shopping_preloader_color};
        }
        .loader::before {
            border-top-color: {$supermarket_shopping_preloader_color};
            border-right-color: {$supermarket_shopping_preloader_color};
        }
        .loader span::before {
            background: {$supermarket_shopping_preloader_color};
            box-shadow: 0 0 10px {$supermarket_shopping_preloader_color};
        }
    ";
    wp_add_inline_style('supermarket-shopping-style', $supermarket_shopping_preloader_custom_css);
}

// Hook the function to the 'wp_enqueue_scripts' action
add_action('wp_enqueue_scripts', 'supermarket_shopping_enqueue_custom_css');