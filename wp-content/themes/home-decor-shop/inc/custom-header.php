<?php
function home_decor_shop_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'home_decor_shop_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 2000,
		'height'                 => 200,
		'flex-height'            => true,
		'flex-width'            => true,
	) ) );
}
add_action( 'after_setup_theme', 'home_decor_shop_custom_header_setup' );


