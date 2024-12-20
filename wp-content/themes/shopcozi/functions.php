<?php

/**
 * Shopcozi theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Shopcozi
 * 
 * @since Shopcozi 0.1
 */

// Creating some of the theme constant variables here
$shopcozi_theme = wp_get_theme();
define('SHOPCOZI_THEME_DIR', get_template_directory() );
define('SHOPCOZI_THEME_URI', get_template_directory_uri() );
define('SHOPCOZI_THEME_NAME', $shopcozi_theme->get('Name') );
define('SHOPCOZI_THEME_VERSION', $shopcozi_theme->get('Version') );

if( ! function_exists( 'shopcozi_setup' ) ):
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Shopcozi 0.1
	 *
	 * @return void
	 */
	function shopcozi_setup() {
		
		// Defining a text domain name for the theme
		load_theme_textdomain('shopcozi');
		
		// Supporting automatic feed links here
		add_theme_support('automatic-feed-links');
		
		// Supporting WordPress "Title" tags here
		add_theme_support('title-tag');
		
		// Supporting "Pages" and "Excerpt" here
		add_post_type_support('page','excerpt');
		
		// Supporting "Featured Images" for the pages here
		add_theme_support('post-thumbnails');

		add_theme_support('align-wide');
		add_theme_support('responsive-embeds');
		add_theme_support('wp-block-styles');

		// Setup global content-width here
		global $content_width;
		
		if ( ! isset( $content_width ) ) {
			$content_width = 800;
		}
		
		// Registering primary navigation area here
		register_nav_menus( array(
			'primary' => esc_html__('Primary Menu','shopcozi'),
		) );
		
		// Supporting HTML5 tags on the following theme parts
		add_theme_support('html5',array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		
		// Enqueue editor styles for the theme
		add_editor_style( array('css/editor-style.css', shopcozi_fonts_url() ) );
		
		// Adding a custom logo image here
		add_theme_support('custom-logo',array(
            'height'      => 73,
            'width'       => 210,
            'flex-height' => true,
            'flex-width'  => true,
        ) );        
		
		// Adding a custom header image here
		$args = array(
			'width'        => 1600,
			'flex-width'   => true,
			'default-image'=> '',
			'header-text'  => false,
		);
		add_theme_support( 'custom-header', $args );

		// Custom background theme supports
		add_theme_support( 'custom-background' );
		
		// Supporting following plugins for adding advanced theme features
		add_theme_support( 'recommend-plugins', array(
			'britetechs-companion' => array(
                'name' => esc_html__( 'Britetechs Companion', 'shopcozi' ),
                'active_filename' => 'britetechs-companion/britetechs-companion.php',
				'desc' => esc_html__( 'We highly recommend that you install the britetechs companion plugin to gain access to the team and testimonial sections.', 'shopcozi' ),
            ),
            'contact-form-7' => array(
                'name' => esc_html__( 'Contact Form 7', 'shopcozi' ),
                'active_filename' => 'contact-form-7/wp-contact-form-7.php',
            ),
        ) );
		
		// Adding selective refresh feature in the theme
		add_theme_support( 'customize-selective-refresh-widgets' );
		
		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'video',
			'quote',
			'gallery',
			'audio',
		) );

		/*
		 * Woocommerce plugin support
		 */
		add_theme_support('woocommerce' );
		add_theme_support('wc-product-gallery-slider');
		add_theme_support('wc-product-gallery-zoom');
		add_theme_support('wc-product-gallery-lightbox');	

		// load starter Content.
		add_theme_support( 'starter-content', shopcozi_wp_starter_pack() );
	}
	add_action( 'after_setup_theme', 'shopcozi_setup' );
endif;

if ( ! function_exists( 'shopcozi_fonts_url' ) ) :
	/**
	 * Enqueue google fonts.
	 *
	 * @since Shopcozi 0.1
	 *
	 * @return void
	 */
	function shopcozi_fonts_url() {
	    $fonts_url = '';
	    $Inter = _x( 'on', 'Inter font: on or off', 'shopcozi' );

	    if ( 'off' !== $Inter ) {

	        $font_families = array();
	        
	        if ( 'off' !== $Inter ) {
	            $font_families[] = 'Inter:100,200,300,400,500,600,700,800,900,italic';
	        }
	        
	        $subset = 'latin';
	        $query_args = array(
	            'family' => urlencode( implode( '|', $font_families ) ),
	            'subset' => urlencode( $subset ),
	        );
	        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css?family=' );
	    }
	    return esc_url_raw( $fonts_url );
	}
endif;

if( ! function_exists('shopcozi_widgets_register') ):
	/**
	 * Registering theme widgets.
	 *
	 * @since Shopcozi 0.1
	 *
	 * @return void
	 */
	function shopcozi_widgets_register(){
		register_sidebar( array(
			'name'          => esc_html__( 'Primary Right Sidebar', 'shopcozi' ),
			'id'            => 'sidebar-1',
			'description'   => 'This sidebar contents will be show on the blog archive pages.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Primary Left Sidebar', 'shopcozi' ),
			'id'            => 'sidebar-2',
			'description'   => 'This sidebar contents will be show on the blog archive pages.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		) );
		
		for ( $i = 1; $i<= 4; $i++ ) {
			register_sidebar( array(
				'name'          => sprintf( __('Footer %s', 'shopcozi'), $i ),
				'id'            => 'footer-' . $i,
				'description'   => 'This sidebar contents will be show in the footer '.$i.' column area.',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );
		}
	}
	add_action('widgets_init','shopcozi_widgets_register');
endif;

// Include default data file
get_template_part('/inc/default_data');

// Include css and js files
get_template_part('/inc/enqueue');

// Include nav walker file
get_template_part('/inc/theme_nav_walker');

// Include template tags file
get_template_part('/inc/template_tags');
get_template_part('/inc/woo_theme_functions');
get_template_part('/inc/woo_hooks_product_single');
get_template_part('/inc/woo_hooks_products_loop');
get_template_part('/inc/woo_plugins_functions');

// Include helpers functions files
get_template_part('/inc/header_helpers');
get_template_part('/inc/footer_helpers');
get_template_part('/inc/section_helpers');

// Include dynamic css files
get_template_part('/inc/class-frontend-css');
get_template_part('/inc/css_output');

// Include customizer file
get_template_part('/inc/customizer/customizer');

// Include customizer recommanded plugins files
require get_parent_theme_file_path('/inc/customizer/install/class-install-helper.php');
require get_parent_theme_file_path('/inc/customizer/install/customizer_recommended_plugin.php');