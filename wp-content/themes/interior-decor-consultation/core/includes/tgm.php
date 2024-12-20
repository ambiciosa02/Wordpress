<?php
	
require get_template_directory() . '/core/includes/class-tgm-plugin-activation.php';

/**
 * Recommended plugins.
 */
function interior_decor_consultation_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Kirki Customizer Framework', 'interior-decor-consultation' ),
			'slug'             => 'kirki',
			'required'         => false,
			'force_activation' => false,
		),
	);
	$config = array();
	interior_decor_consultation_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'interior_decor_consultation_register_recommended_plugins' );