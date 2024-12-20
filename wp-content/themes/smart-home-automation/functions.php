<?php
/**
 * Smart Home Automation functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package smart-home-automation
 * @since smart-home-automation 1.0
 */

if ( ! function_exists( 'smart_home_automation_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since smart-home-automation 1.0
	 *
	 * @return void
	 */
	function smart_home_automation_support() {

		load_theme_textdomain( 'smart-home-automation', get_template_directory() . '/languages' );
		
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'align-wide' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

		add_theme_support( 'responsive-embeds' );
		
		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );
	}

endif;

add_action( 'after_setup_theme', 'smart_home_automation_support' );

if ( ! function_exists( 'smart_home_automation_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since smart-home-automation 1.0
	 *
	 * @return void
	 */
	function smart_home_automation_styles() {

		// Register theme stylesheet.
		wp_register_style(
			'smart-home-automation-style',
			get_template_directory_uri() . '/style.css',
			array(),
			wp_get_theme()->get( 'Version' )
		);

		wp_enqueue_style( 
			'smart-home-automation-animate-css', 
			esc_url(get_template_directory_uri()).'/assets/css/animate.css' 
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'smart-home-automation-style' );

		wp_enqueue_style( 'dashicons' );

		wp_style_add_data( 'smart-home-automation-style', 'rtl', 'replace' );
	}

endif;

add_action( 'wp_enqueue_scripts', 'smart_home_automation_styles' );

/* Enqueue Wow Js */
function smart_home_automation_scripts() {
	wp_enqueue_script( 
		'smart-home-automation-wow', esc_url(get_template_directory_uri()) . '/assets/js/wow.js', 
		array('jquery') 
	);
	wp_enqueue_script(
        'smart-home-automation-scroll-to-top', 
        esc_url(get_template_directory_uri()) . '/assets/js/scroll-to-top.js', 
        array(), 
        null, 
        true // Load in footer
    );
}
add_action( 'wp_enqueue_scripts', 'smart_home_automation_scripts' );

// Add block patterns
require get_template_directory() . '/inc/block-pattern.php';

// Add block Style
require get_template_directory() . '/inc/block-style.php';

// Add Customizer
require get_template_directory() . '/inc/customizer.php';

// Get Started
require get_template_directory() . '/get-started/getstart.php';

// Notice
require get_template_directory() . '/get-started/notice.php';

// TGM
require get_template_directory() . '/inc/tgm/plugin-activation.php';