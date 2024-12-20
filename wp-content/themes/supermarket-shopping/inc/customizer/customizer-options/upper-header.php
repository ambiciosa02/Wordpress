<?php
function supermarket_shopping_upper_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

	/*=========================================
	top header
	=========================================*/
	$wp_customize->add_section(
        'supermarket_shopping_topbar',
        array(
        	'priority'      => 3,
            'title' 		=> __('Header Information','supermarket-shopping'),
			'panel'  		=> 'supermarket_shopping_header_section',
		)
    );

    $wp_customize->add_setting( 
		'supermarket_shopping_top_header' , 
			array(
			'default' => true,
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	$wp_customize->add_control(
	'supermarket_shopping_top_header', 
		array(
			'label'	      => esc_html__( 'Show / Hide Topbar', 'supermarket-shopping' ),
			'section'     => 'supermarket_shopping_topbar',
			'settings'    => 'supermarket_shopping_top_header',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting(
	    'supermarket_shopping_cart_language_translator',
	    array(
	        'default'           => true, // Default value: unchecked
	        'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox', // Custom sanitization function
	        'capability'        => 'edit_theme_options',
	    )
	);
	$wp_customize->add_control(
	    'supermarket_shopping_cart_language_translator',
	    array(
	        'label'    => esc_html__('Show / Hide Language Translator Option', 'supermarket-shopping'),
	        'section'  => 'supermarket_shopping_topbar', // Section where the control appears
	        'settings' => 'supermarket_shopping_cart_language_translator',
	        'type'     => 'checkbox', 
	    )
	);

    $wp_customize->add_setting('supermarket_shopping_topbar_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('supermarket_shopping_topbar_text',array(
		'label'	=> __('Topbar Text','supermarket-shopping'),
		'section'=> 'supermarket_shopping_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('supermarket_shopping_about_us_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('supermarket_shopping_about_us_text',array(
		'label'	=> __('My About Us Text','supermarket-shopping'),
		'section'	=> 'supermarket_shopping_topbar',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('supermarket_shopping_about_us_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('supermarket_shopping_about_us_link',array(
		'label'	=> __('My About Us Page Link','supermarket-shopping'),
		'section'	=> 'supermarket_shopping_topbar',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('supermarket_shopping_order_tracking_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('supermarket_shopping_order_tracking_text',array(
		'label'	=> __('Order Tracking Text','supermarket-shopping'),
		'section'	=> 'supermarket_shopping_topbar',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('supermarket_shopping_order_tracking_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('supermarket_shopping_order_tracking_link',array(
		'label'	=> __('Order Tracking Link','supermarket-shopping'),
		'section'	=> 'supermarket_shopping_topbar',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('supermarket_shopping_facebook_url',array(
		'default'=> '#',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('supermarket_shopping_facebook_url',array(
		'label'	=> __('Facebook Link','supermarket-shopping'),
		'section'=> 'supermarket_shopping_topbar',
		'type'=> 'url'
	));

	$wp_customize->add_setting('supermarket_shopping_twitter_url',array(
		'default'=> '#',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('supermarket_shopping_twitter_url',array(
		'label'	=> __('Twitter Link','supermarket-shopping'),
		'section'=> 'supermarket_shopping_topbar',
		'type'=> 'url'
	));

	$wp_customize->add_setting('supermarket_shopping_instagram_url',array(
		'default'=> '#',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('supermarket_shopping_instagram_url',array(
		'label'	=> __('Instagram Link','supermarket-shopping'),
		'section'=> 'supermarket_shopping_topbar',
		'type'=> 'url'
	));

	$wp_customize->add_setting('supermarket_shopping_youtube_url',array(
		'default'=> '#',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('supermarket_shopping_youtube_url',array(
		'label'	=> __('Youtube Link','supermarket-shopping'),
		'section'=> 'supermarket_shopping_topbar',
		'type'=> 'url'
	));

	$wp_customize->add_setting( 'supermarket_shopping_upgrade_page_settingahdv',
	array(
		'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Supermarket_Shopping_Control_Upgrade(
		$wp_customize, 'supermarket_shopping_upgrade_page_settingahdv',
			array(
				'priority'      => 200,
				'section'       => 'supermarket_shopping_topbar',
				'settings'      => 'supermarket_shopping_upgrade_page_settingahdv',
				'label'         => __( 'Supermarket Shopping Pro comes with additional features.', 'supermarket-shopping' ),
				'choices'       => array( __( '12+ Sections', 'supermarket-shopping' ), __( 'One Click Demo Importer', 'supermarket-shopping' ), __( 'Section Reordering Facility', 'supermarket-shopping' ),__( 'Advance Typography', 'supermarket-shopping' ),__( 'Easy Customization', 'supermarket-shopping' ),__( '24x7 Support', 'supermarket-shopping' ), )
			)
		)
	); 

}
add_action( 'customize_register', 'supermarket_shopping_upper_header_settings' );