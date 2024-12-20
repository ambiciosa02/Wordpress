<?php
function supermarket_shopping_general_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'supermarket_shopping_general', array(
			'priority' => 31,
			'title' => esc_html__( 'General', 'supermarket-shopping' ),
		)
	);

	/*=========================================
	Breadcrumb  Section
	=========================================*/
	$wp_customize->add_section(
		'supermarket_shopping_breadcrumb_setting', array(
			'title' => esc_html__( 'Breadcrumb Section', 'supermarket-shopping' ),
			'priority' => 1,
			'panel' => 'supermarket_shopping_general',
		)
	);
	
	// Settings 
	$wp_customize->add_setting(
		'supermarket_shopping_breadcrumb_settings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'supermarket_shopping_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'supermarket_shopping_breadcrumb_settings',
		array(
			'type' => 'hidden',
			'label' => __('Settings','supermarket-shopping'),
			'section' => 'supermarket_shopping_breadcrumb_setting',
		)
	);
	
	// Breadcrumb Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_hs_breadcrumb' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_hs_breadcrumb', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'supermarket-shopping' ),
			'section'     => 'supermarket_shopping_breadcrumb_setting',
			'settings'    => 'supermarket_shopping_hs_breadcrumb',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting(
    	'supermarket_shopping_breadcrumb_seprator',
    	array(
			'default' => '/',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'supermarket_shopping_breadcrumb_seprator',
		array(
		    'label'   		=> __('Breadcrumb separator','supermarket-shopping'),
		    'section'		=> 'supermarket_shopping_breadcrumb_setting',
			'type' 			=> 'text',
		)  
	);

	$wp_customize->add_setting( 'supermarket_shopping_upgrade_page_settings_5',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Supermarket_Shopping_Control_Upgrade(
        $wp_customize, 'supermarket_shopping_upgrade_page_settings_5',
            array(
                'priority'      => 200,
                'section'       => 'supermarket_shopping_breadcrumb_setting',
                'settings'      => 'supermarket_shopping_upgrade_page_settings_5',
                'label'         => __( 'Supermarket Shopping Pro comes with additional features.', 'supermarket-shopping' ),
                'choices'       => array( __( '12+ Sections', 'supermarket-shopping' ), __( 'One Click Demo Importer', 'supermarket-shopping' ), __( 'Section Reordering Facility', 'supermarket-shopping' ),__( 'Advance Typography', 'supermarket-shopping' ),__( 'Easy Customization', 'supermarket-shopping' ),__( '24x7 Support', 'supermarket-shopping' ), )
            )
        )
    ); 

	/*=========================================
	Preloader Section
	=========================================*/
	$wp_customize->add_section(
		'supermarket_shopping_preloader_section_setting', array(
			'title' => esc_html__( 'Preloader', 'supermarket-shopping' ),
			'priority' => 3,
			'panel' => 'supermarket_shopping_general',
		)
	);

	// Preloader Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_preloader_setting' , 
			array(
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_preloader_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Preloader', 'supermarket-shopping' ),
			'section'     => 'supermarket_shopping_preloader_section_setting',
			'settings'    => 'supermarket_shopping_preloader_setting',
			'type'        => 'checkbox'
		) 
	);

	// Preloader Background Color Setting
	$wp_customize->add_setting(
		'supermarket_shopping_preloader_bg_color',
		array(
			'default' => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'supermarket_shopping_preloader_bg_color',
			array(
				'label' => esc_html__('Preloader Background Color', 'supermarket-shopping'),
				'section' => 'supermarket_shopping_preloader_section_setting', // Adjust section if needed
				'settings' => 'supermarket_shopping_preloader_bg_color',
			)
		)
	);

	// Preloader Color Setting
	$wp_customize->add_setting(
		'supermarket_shopping_preloader_color',
		array(
			'default' => '#78B85D',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'supermarket_shopping_preloader_color',
			array(
				'label' => esc_html__('Preloader Color', 'supermarket-shopping'),
				'section' => 'supermarket_shopping_preloader_section_setting', // Adjust section if needed
				'settings' => 'supermarket_shopping_preloader_color',
			)
		)
	);

	$wp_customize->add_setting( 'supermarket_shopping_upgrade_page_settings_6',
		array(
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Supermarket_Shopping_Control_Upgrade(
		$wp_customize, 'supermarket_shopping_upgrade_page_settings_6',
			array(
				'priority'      => 200,
				'section'       => 'supermarket_shopping_preloader_section_setting',
				'settings'      => 'supermarket_shopping_upgrade_page_settings_6',
				'label'         => __( 'Supermarket Shopping Pro comes with additional features.', 'supermarket-shopping' ),
				'choices'       => array( __( '12+ Sections', 'supermarket-shopping' ), __( 'One Click Demo Importer', 'supermarket-shopping' ), __( 'Section Reordering Facility', 'supermarket-shopping' ),__( 'Advance Typography', 'supermarket-shopping' ),__( 'Easy Customization', 'supermarket-shopping' ),__( '24x7 Support', 'supermarket-shopping' ), )
			)
		)
	); 


	/*=========================================
	Scroll To Top Section
	=========================================*/
	$wp_customize->add_section(
		'supermarket_shopping_scroll_to_top_section_setting', array(
			'title' => esc_html__( 'Scroll To Top', 'supermarket-shopping' ),
			'priority' => 3,
			'panel' => 'supermarket_shopping_general',
		)
	);

	// Scroll To Top Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_scroll_top_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_scroll_top_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Scroll To Top', 'supermarket-shopping' ),
			'section'     => 'supermarket_shopping_scroll_to_top_section_setting',
			'settings'    => 'supermarket_shopping_scroll_top_setting',
			'type'        => 'checkbox'
		) 
	);

	// Scroll To Top Color Setting
	$wp_customize->add_setting(
		'supermarket_shopping_scroll_top_color',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'supermarket_shopping_scroll_top_color',
			array(
				'label'    => esc_html__( 'Scroll To Top Color', 'supermarket-shopping' ),
				'section'  => 'supermarket_shopping_scroll_to_top_section_setting',
				'settings' => 'supermarket_shopping_scroll_top_color',
			)
		)
	);

	// Scroll To Top Background Color Setting
	$wp_customize->add_setting(
		'supermarket_shopping_scroll_top_bg_color',
		array(
			'default'           => '#78B85D',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'supermarket_shopping_scroll_top_bg_color',
			array(
				'label'    => esc_html__( 'Scroll To Top Background Color', 'supermarket-shopping' ),
				'section'  => 'supermarket_shopping_scroll_to_top_section_setting',
				'settings' => 'supermarket_shopping_scroll_top_bg_color',
			)
		)
	);

	 $wp_customize->add_setting( 'supermarket_shopping_upgrade_page_settings_7',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Supermarket_Shopping_Control_Upgrade(
        $wp_customize, 'supermarket_shopping_upgrade_page_settings_7',
            array(
                'priority'      => 200,
                'section'       => 'supermarket_shopping_scroll_to_top_section_setting',
                'settings'      => 'supermarket_shopping_upgrade_page_settings_7',
                'label'         => __( 'Supermarket Shopping Pro comes with additional features.', 'supermarket-shopping' ),
                'choices'       => array( __( '12+ Sections', 'supermarket-shopping' ), __( 'One Click Demo Importer', 'supermarket-shopping' ), __( 'Section Reordering Facility', 'supermarket-shopping' ),__( 'Advance Typography', 'supermarket-shopping' ),__( 'Easy Customization', 'supermarket-shopping' ),__( '24x7 Support', 'supermarket-shopping' ), )
            )
        )
    ); 


	/*=========================================
	Woocommerce Section
	=========================================*/
	$wp_customize->add_section(
		'supermarket_shopping_woocommerce_section_setting', array(
			'title' => esc_html__( 'Woocommerce Settings', 'supermarket-shopping' ),
			'priority' => 3,
			'panel' => 'woocommerce',
		)
	);

	$wp_customize->add_setting(
    	'supermarket_shopping_custom_shop_per_columns',
    	array(
			'default' => '3',
			'sanitize_callback' => 'absint',
		)
	);	
	$wp_customize->add_control( 
		'supermarket_shopping_custom_shop_per_columns',
		array(
		    'label'   		=> __('Product Per Columns','supermarket-shopping'),
		    'section'		=> 'supermarket_shopping_woocommerce_section_setting',
			'type' 			=> 'number',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting(
    	'supermarket_shopping_custom_shop_product_per_page',
    	array(
			'default' => '9',
			'sanitize_callback' => 'absint',
		)
	);	
	$wp_customize->add_control( 
		'supermarket_shopping_custom_shop_product_per_page',
		array(
		    'label'   		=> __('Product Per Page','supermarket-shopping'),
		    'section'		=> 'supermarket_shopping_woocommerce_section_setting',
			'type' 			=> 'number',
			'transport'         => $selective_refresh,
		)  
	);

	// Woocommerce Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_wocommerce_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_wocommerce_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Woocommerce Sidebar', 'supermarket-shopping' ),
			'section'     => 'supermarket_shopping_woocommerce_section_setting',
			'settings'    => 'supermarket_shopping_wocommerce_sidebar_setting',
			'type'        => 'checkbox'
		)
	);

	$wp_customize->add_setting( 'supermarket_shopping_upgrade_page_settings_22',
	array(
		'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Supermarket_Shopping_Control_Upgrade(
		$wp_customize, 'supermarket_shopping_upgrade_page_settings_22',
			array(
				'priority'      => 200,
				'section'       => 'supermarket_shopping_woocommerce_section_setting',
				'settings'      => 'supermarket_shopping_upgrade_page_settings_22',
				'label'         => __( 'Supermarket Shopping Pro comes with additional features.', 'supermarket-shopping' ),
				'choices'       => array( __( '12+ Sections', 'supermarket-shopping' ), __( 'One Click Demo Importer', 'supermarket-shopping' ), __( 'Section Reordering Facility', 'supermarket-shopping' ),__( 'Advance Typography', 'supermarket-shopping' ),__( 'Easy Customization', 'supermarket-shopping' ),__( '24x7 Support', 'supermarket-shopping' ), )
			)
		)
	); 

	/*=========================================
	Sticky Header Section
	=========================================*/
	$wp_customize->add_section(
		'sticky_header_section_setting', array(
			'title' => esc_html__( 'Sticky Header Settings', 'supermarket-shopping' ),
			'priority' => 3,
			'panel' => 'supermarket_shopping_general',
		)
	);

	// Sticky Header Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_sticky_header' , 
			array(
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_sticky_header', 
		array(
			'label'	      => esc_html__( 'Hide / Show Sticky Header', 'supermarket-shopping' ),
			'section'     => 'sticky_header_section_setting',
			'settings'    => 'supermarket_shopping_sticky_header',
			'type'        => 'checkbox'
		) 
	);

	 $wp_customize->add_setting( 'supermarket_shopping_upgrade_page_settings_9',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Supermarket_Shopping_Control_Upgrade(
        $wp_customize, 'supermarket_shopping_upgrade_page_settings_9',
            array(
                'priority'      => 200,
                'section'       => 'sticky_header_section_setting',
                'settings'      => 'supermarket_shopping_upgrade_page_settings_9',
                'label'         => __( 'Supermarket Shopping Pro comes with additional features.', 'supermarket-shopping' ),
                'choices'       => array( __( '12+ Sections', 'supermarket-shopping' ), __( 'One Click Demo Importer', 'supermarket-shopping' ), __( 'Section Reordering Facility', 'supermarket-shopping' ),__( 'Advance Typography', 'supermarket-shopping' ),__( 'Easy Customization', 'supermarket-shopping' ),__( '24x7 Support', 'supermarket-shopping' ), )
            )
        )
    ); 

	/*=========================================
	404 Section
	=========================================*/
	$wp_customize->add_section(
		'supermarket_shopping_404_section', array(
			'title' => esc_html__( '404 Section', 'supermarket-shopping' ),
			'priority' => 1,
			'panel' => 'supermarket_shopping_general',
		)
	);

	$wp_customize->add_setting(
    	'supermarket_shopping_404_title',
    	array(
			'default' => '404',
			'sanitize_callback' => 'sanitize_text_field',
			'priority' => 2,
		)
	);	
	$wp_customize->add_control( 
		'supermarket_shopping_404_title',
		array(
		    'label'   		=> __('404 Heading','supermarket-shopping'),
		    'section'		=> 'supermarket_shopping_404_section',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting(
    	'supermarket_shopping_404_Text',
    	array(
			'default' => 'Page Not Found',
			'sanitize_callback' => 'sanitize_text_field',
			'priority' => 2,
		)
	);	
	$wp_customize->add_control( 
		'supermarket_shopping_404_Text',
		array(
		    'label'   		=> __('404 Title','supermarket-shopping'),
		    'section'		=> 'supermarket_shopping_404_section',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting(
    	'supermarket_shopping_404_content',
    	array(
			'default' => 'The page you were looking for could not be found.',
			'sanitize_callback' => 'sanitize_text_field',
			'priority' => 2,
		)
	);	
	$wp_customize->add_control( 
		'supermarket_shopping_404_content',
		array(
		    'label'   		=> __('404 Content','supermarket-shopping'),
		    'section'		=> 'supermarket_shopping_404_section',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	 $wp_customize->add_setting( 'supermarket_shopping_upgrade_page_settings_10',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Supermarket_Shopping_Control_Upgrade(
        $wp_customize, 'supermarket_shopping_upgrade_page_settings_10',
            array(
                'priority'      => 200,
                'section'       => 'supermarket_shopping_404_section',
                'settings'      => 'supermarket_shopping_upgrade_page_settings_10',
                'label'         => __( 'Supermarket Shopping Pro comes with additional features.', 'supermarket-shopping' ),
                'choices'       => array( __( '12+ Sections', 'supermarket-shopping' ), __( 'One Click Demo Importer', 'supermarket-shopping' ), __( 'Section Reordering Facility', 'supermarket-shopping' ),__( 'Advance Typography', 'supermarket-shopping' ),__( 'Easy Customization', 'supermarket-shopping' ),__( '24x7 Support', 'supermarket-shopping' ), )
            )
        )
    ); 

}

add_action( 'customize_register', 'supermarket_shopping_general_setting' );