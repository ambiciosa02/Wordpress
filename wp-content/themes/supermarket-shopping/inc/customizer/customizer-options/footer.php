<?php

function supermarket_shopping_footer( $wp_customize ) {
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Footer Panel // 
	$wp_customize->add_panel( 
		'supermarket_shopping_footer_section', 
		array(
			'priority'      => 34,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Footer', 'supermarket-shopping'),
		) 
	);

	// Footer Widgets // 
	$wp_customize->add_section(
        'footer_top',
        array(
            'title' 		=> __('Footer Widgets','supermarket-shopping'),
			'panel'  		=> 'supermarket_shopping_footer_section',
			'priority'      => 3,
		)
    );

    // Footer Widgets Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_footer_widgets_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_footer_widgets_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Footer Widgets', 'supermarket-shopping' ),
			'section'     => 'footer_top',
			'settings'    => 'supermarket_shopping_footer_widgets_setting',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting( 'supermarket_shopping_upgrade_page_settings_33',
	array(
		'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Supermarket_Shopping_Control_Upgrade(
		$wp_customize, 'supermarket_shopping_upgrade_page_settings_33',
			array(
				'priority'      => 200,
				'section'       => 'footer_top',
				'settings'      => 'supermarket_shopping_upgrade_page_settings_33',
				'label'         => __( 'Supermarket Shopping Pro comes with additional features.', 'supermarket-shopping' ),
				'choices'       => array( __( '12+ Sections', 'supermarket-shopping' ), __( 'One Click Demo Importer', 'supermarket-shopping' ), __( 'Section Reordering Facility', 'supermarket-shopping' ),__( 'Advance Typography', 'supermarket-shopping' ),__( 'Easy Customization', 'supermarket-shopping' ),__( '24x7 Support', 'supermarket-shopping' ), )
			)
		)
	); 

	// Footer Bottom // 
	$wp_customize->add_section(
        'supermarket_shopping_footer_bottom',
        array(
            'title' 		=> __('Footer Bottom','supermarket-shopping'),
			'panel'  		=> 'supermarket_shopping_footer_section',
			'priority'      => 3,
		)
    );
	
	// Footer Copyright Head
	$wp_customize->add_setting(
		'supermarket_shopping_footer_btm_copy_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'supermarket_shopping_sanitize_text',
			'priority'  => 3,
		)
	);

	// Site Title Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_footer_copyright_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_footer_copyright_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Footer Copytight', 'supermarket-shopping' ),
			'section'     => 'supermarket_shopping_footer_bottom',
			'settings'    => 'supermarket_shopping_footer_copyright_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// Footer Copyright 
	$wp_customize->add_setting(
    	'supermarket_shopping_footer_copyright',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);

	$wp_customize->add_control( 
		'supermarket_shopping_footer_copyright',
		array(
		    'label'   		=> __('Copyright','supermarket-shopping'),
		    'section'		=> 'supermarket_shopping_footer_bottom',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting( 'supermarket_shopping_copyright_alignment', array(
        'default'   => 'center',
        'sanitize_callback' => 'supermarket_shopping_sanitize_copyright_position',
    ));

    $wp_customize->add_control( 'supermarket_shopping_copyright_alignment', array(
        'label'    => __( 'Copyright Position', 'supermarket-shopping' ),
        'section'  => 'supermarket_shopping_footer_bottom',
        'settings' => 'supermarket_shopping_copyright_alignment',
        'type'     => 'radio',
        'choices'  => array(
            'right' => __( 'Right Align', 'supermarket-shopping' ),
            'left'  => __( 'Left Align', 'supermarket-shopping' ),
            'center'  => __( 'Center Align', 'supermarket-shopping' ),
        ),
    ));

	$wp_customize->add_setting( 'supermarket_shopping_upgrade_page_settings_122',
	array(
		'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Supermarket_Shopping_Control_Upgrade(
		$wp_customize, 'supermarket_shopping_upgrade_page_settings_122',
			array(
				'priority'      => 200,
				'section'       => 'supermarket_shopping_footer_bottom',
				'settings'      => 'supermarket_shopping_upgrade_page_settings_122',
				'label'         => __( 'Supermarket Shopping Pro comes with additional features.', 'supermarket-shopping' ),
				'choices'       => array( __( '12+ Sections', 'supermarket-shopping' ), __( 'One Click Demo Importer', 'supermarket-shopping' ), __( 'Section Reordering Facility', 'supermarket-shopping' ),__( 'Advance Typography', 'supermarket-shopping' ),__( 'Easy Customization', 'supermarket-shopping' ),__( '24x7 Support', 'supermarket-shopping' ), )
			)
		)
	); 
}
add_action( 'customize_register', 'supermarket_shopping_footer' );

// Footer selective refresh
function supermarket_shopping_footer_partials( $wp_customize ){
	// footer_copyright
	$wp_customize->selective_refresh->add_partial( 'footer_copyright', array(
		'selector'            => '.copy-right .copyright-text',
		'settings'            => 'footer_copyright',
		'render_callback'  => 'supermarket_shopping_footer_copyright_render_callback',
	) );
}
add_action( 'customize_register', 'supermarket_shopping_footer_partials' );

// copyright_content
function supermarket_shopping_footer_copyright_render_callback() {
	return get_theme_mod( 'footer_copyright' );
}