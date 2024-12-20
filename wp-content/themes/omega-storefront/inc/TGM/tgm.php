<?php

require get_template_directory() . '/inc/TGM/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function omega_storefront_register_recommended_plugins() {
	$plugins = array(	
		array(
			'name'             => __( 'WooCommerce', 'omega-storefront' ),
			'slug'             => 'woocommerce',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),	
		array(
			'name'             => __( 'Google Language Translator', 'omega-storefront' ),
			'slug'             => 'google-language-translator',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'WooCommerce Currency Switcher', 'omega-storefront' ),
			'slug'             => 'woocommerce-currency-switcher',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		)
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'omega_storefront_register_recommended_plugins' );