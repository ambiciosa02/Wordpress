<?php
function supermarket_shopping_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'supermarket_shopping_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'fff',
		'width'                  => 2000, 
		'height'                 => 200,
		'flex-width'    		 => true,
		'flex-height'    		 => true,
		'default-image'          => get_template_directory_uri() . '/assets/images/custom-header.png',
	) ) );
}
add_action( 'after_setup_theme', 'supermarket_shopping_custom_header_setup' );

register_default_headers( array(
	'default-image' => array(
		'url'           => get_template_directory_uri() . '/assets/images/custom-header.png',
		'thumbnail_url' => get_template_directory_uri() . '/assets/images/custom-header.png',
		'description'   => __( 'Default Header Image', 'supermarket-shopping' ),
	),
) );