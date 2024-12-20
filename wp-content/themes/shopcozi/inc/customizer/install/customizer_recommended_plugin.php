<?php
get_template_part('/inc/customizer/custom-controls/customizer-notify/customizer-notify');

	$plugins = array(
		'woocommerce' => array(
			'recommended' => true,
			'description' => sprintf('Install and activate <strong>Wocommerce</strong> plugin for taking full advantage of all the shop features this theme has to offer %s.', 'shopcozi'),
		)
	);

	if(SHOPCOZI_THEME_NAME=="Shopcozi"){
		$plugins['britetechs-companion'] = array(
			'recommended' => true,
			'description' => sprintf('Install and activate <strong>Britetechs Companion</strong> plugin for taking full advantage of all the features this theme has to offer %s.', 'shopcozi'),
		);
	}

	$config_customizer = array(
	'recommended_plugins'       => $plugins,
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'shopcozi' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'shopcozi' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'shopcozi' ),
	'activate_button_label'     => esc_html__( 'Activate', 'shopcozi' ),
	'deactivate_button_label'   => esc_html__( 'Deactivate', 'shopcozi' ),
);
Shopcozi_Customizer_Notify::init( apply_filters( 'shopcozi_customizer_notify_array', $config_customizer ) );