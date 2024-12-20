<?php
/**
 * Home Appliances Store functions
 */

if ( ! function_exists( 'home_appliances_store_styles' ) ) :
	function home_appliances_store_styles() {
		// Register theme stylesheet.
		wp_register_style('home-appliances-store-style',
			get_template_directory_uri() . '/style.css',array(),
			wp_get_theme()->get( 'Version' )
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'home-appliances-store-style' );
	}
endif;
add_action( 'wp_enqueue_scripts', 'home_appliances_store_styles' );

/**
 * TGM
 */
require get_template_directory() . '/tgm.php';

/**
 * About Theme Function
 */
require get_theme_file_path( '/about-theme/about-theme.php' );

/**
 * Customizer
 */
require get_template_directory() . '/inc/customizer.php';