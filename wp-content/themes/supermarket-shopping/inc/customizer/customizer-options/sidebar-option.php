<?php
function supermarket_shopping_sidebar_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'supermarket_shopping_sidebar', array(
			'priority' => 31,
			'title' => esc_html__( 'Sidebar Options', 'supermarket-shopping' ),
		)
	);

	/*=========================================
	Sidebar Option  Section
	=========================================*/
	$wp_customize->add_section(
		'supermarket_shopping_sidebar_settings', array(
			'title' => esc_html__( 'Sidebar Options', 'supermarket-shopping' ),
			'priority' => 1,
			'panel' => 'supermarket_shopping_sidebar',
		)
	);
	

	// Archive Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_archive_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_archive_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Archive Sidebar', 'supermarket-shopping' ),
			'section'     => 'supermarket_shopping_sidebar_settings',
			'settings'    => 'supermarket_shopping_archive_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Index Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_index_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_index_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Index Sidebar', 'supermarket-shopping' ),
			'section'     => 'supermarket_shopping_sidebar_settings',
			'settings'    => 'supermarket_shopping_index_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Pages Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_paged_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_paged_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Pages Sidebar', 'supermarket-shopping' ),
			'section'     => 'supermarket_shopping_sidebar_settings',
			'settings'    => 'supermarket_shopping_paged_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Search Result Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_search_result_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_search_result_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Search Result Sidebar', 'supermarket-shopping' ),
			'section'     => 'supermarket_shopping_sidebar_settings',
			'settings'    => 'supermarket_shopping_search_result_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Single Post Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_single_post_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_single_post_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Single Post Sidebar', 'supermarket-shopping' ),
			'section'     => 'supermarket_shopping_sidebar_settings',
			'settings'    => 'supermarket_shopping_single_post_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Sidebar Page Sidebar Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_single_page_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_single_page_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Page Width Sidebar', 'supermarket-shopping' ),
			'section'     => 'supermarket_shopping_sidebar_settings',
			'settings'    => 'supermarket_shopping_single_page_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting( 'supermarket_shopping_sidebar_position', array(
        'default'   => 'right',
        'sanitize_callback' => 'supermarket_shopping_sanitize_sidebar_position',
    ));

    $wp_customize->add_control( 'supermarket_shopping_sidebar_position', array(
        'label'    => __( 'Sidebar Position', 'supermarket-shopping' ),
        'section'  => 'supermarket_shopping_sidebar_settings',
        'settings' => 'supermarket_shopping_sidebar_position',
        'type'     => 'radio',
        'choices'  => array(
            'right' => __( 'Right Sidebar', 'supermarket-shopping' ),
            'left'  => __( 'Left Sidebar', 'supermarket-shopping' ),
        ),
    ));

	 $wp_customize->add_setting( 'supermarket_shopping_upgrade_page_settings_15',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Supermarket_Shopping_Control_Upgrade(
        $wp_customize, 'supermarket_shopping_upgrade_page_settings_15',
            array(
                'priority'      => 200,
                'section'       => 'supermarket_shopping_sidebar_settings',
                'settings'      => 'supermarket_shopping_upgrade_page_settings_15',
                'label'         => __( 'Supermarket Shopping Pro comes with additional features.', 'supermarket-shopping' ),
                'choices'       => array( __( '12+ Sections', 'supermarket-shopping' ), __( 'One Click Demo Importer', 'supermarket-shopping' ), __( 'Section Reordering Facility', 'supermarket-shopping' ),__( 'Advance Typography', 'supermarket-shopping' ),__( 'Easy Customization', 'supermarket-shopping' ),__( '24x7 Support', 'supermarket-shopping' ), )
            )
        )
    ); 
}

add_action( 'customize_register', 'supermarket_shopping_sidebar_setting' );