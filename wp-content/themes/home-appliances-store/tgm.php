<?php

require get_template_directory() . '/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function home_appliances_store_register_recommended_plugins() {
	$plugins = array(		
		array(
			'name'      => esc_html__( 'WooCommerce', 'home-appliances-store' ),
			'slug'      => 'woocommerce',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),

		array(
			'name'             => __( 'woocommerce-currency-switcher', 'home-appliances-store' ),
			'slug'             => 'woocommerce-currency-switcher',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),

		array(
			'name'             => __( 'MC Woocommerce Wishlist', 'home-appliances-store' ),
			'slug'             => 'smart-wishlist-for-more-convert',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),

		array(
            'name'             => __( 'GTranslate', 'home-appliances-store' ),
            'slug'             => 'gtranslate',
            'source'           => '',
			'required'         => false,
			'force_activation' => false,
        )
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'home_appliances_store_register_recommended_plugins' );