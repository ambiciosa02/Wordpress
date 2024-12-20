<?php
	
require get_template_directory() . '/inc/tgm-plugin/class-tgm-plugin-activation.php';

/**
 * Recommended plugins.
 */
function home_decor_shop_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Kirki Customizer Framework', 'home-decor-shop' ),
			'slug'             => 'kirki',
			'required'         => false,
			'force_activation' => false,
		),
	);
	$config = array();
	home_decor_shop_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'home_decor_shop_register_recommended_plugins' );