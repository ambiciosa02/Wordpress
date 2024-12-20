<?php
function supermarket_shopping_typography_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'supermarket_shopping_typography', array(
			'priority' => 31,
			'title' => esc_html__( 'Typography', 'supermarket-shopping' ),
		)
	);

	/*=========================================
	Archive Post  Section
	=========================================*/
	$wp_customize->add_section(
		'supermarket_shopping_typography_settings', array(
			'title' => esc_html__( 'Typography Option', 'supermarket-shopping' ),
			'priority' => 1,
			'panel' => 'supermarket_shopping_typography',
		)
	);
	$supermarket_shopping_font_choices = array(
		'' => 'Select',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);

	$wp_customize->add_setting( 'supermarket_shopping_headings_text', array(
		'sanitize_callback' => 'supermarket_shopping_sanitize_fonts',
	));

	$wp_customize->add_control( 'supermarket_shopping_headings_text', array(
		'type' => 'select',
		'description' => __('Select your appropriate font for the headings.', 'supermarket-shopping'),
		'section' => 'supermarket_shopping_typography_settings',
		'choices' => $supermarket_shopping_font_choices

	));

	$wp_customize->add_setting( 'supermarket_shopping_body_text', array(
		'sanitize_callback' => 'supermarket_shopping_sanitize_fonts'
	));

	$wp_customize->add_control( 'supermarket_shopping_body_text', array(
		'type' => 'select',
		'description' => __( 'Select your appropriate font for the body.', 'supermarket-shopping' ),
		'section' => 'supermarket_shopping_typography_settings',
		'choices' => $supermarket_shopping_font_choices
	) );
	
	$wp_customize->add_section(
	'supermarket_shopping_dynamic_color_settings', array(
		'title' => esc_html__( 'Dynamic Color Options', 'supermarket-shopping' ),
		'priority' => 1,
		'panel' => 'supermarket_shopping_typography',
		)
	);

	$wp_customize->add_setting('supermarket_shopping_dynamic_color_one', array(
        'default'           => '#78B85D',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'supermarket_shopping_dynamic_color_one', array(
        'label'    => __('First Dynamic Color', 'supermarket-shopping'),
        'section'  => 'supermarket_shopping_dynamic_color_settings',
    )));

	

	$wp_customize->add_setting( 'supermarket_shopping_upgrade_page_settings_20_color',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Supermarket_Shopping_Control_Upgrade(
        $wp_customize, 'supermarket_shopping_upgrade_page_settings_20_color',
            array(
                'priority'      => 200,
                'section'       => 'supermarket_shopping_dynamic_color_settings',
                'settings'      => 'supermarket_shopping_upgrade_page_settings_20_color',
                'label'         => __( 'Supermarket Shopping Pro comes with additional features.', 'supermarket-shopping' ),
                'choices'       => array( __( '12+ Sections', 'supermarket-shopping' ), __( 'One Click Demo Importer', 'supermarket-shopping' ), __( 'Section Reordering Facility', 'supermarket-shopping' ),__( 'Advance Typography', 'supermarket-shopping' ),__( 'Easy Customization', 'supermarket-shopping' ),__( '24x7 Support', 'supermarket-shopping' ), )
            )
        )
    ); 

	$wp_customize->add_setting( 'supermarket_shopping_upgrade_page_settings_20',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Supermarket_Shopping_Control_Upgrade(
        $wp_customize, 'supermarket_shopping_upgrade_page_settings_20',
            array(
                'priority'      => 200,
                'section'       => 'supermarket_shopping_typography_settings',
                'settings'      => 'supermarket_shopping_upgrade_page_settings_20',
                'label'         => __( 'Supermarket Shopping Pro comes with additional features.', 'supermarket-shopping' ),
                'choices'       => array( __( '12+ Sections', 'supermarket-shopping' ), __( 'One Click Demo Importer', 'supermarket-shopping' ), __( 'Section Reordering Facility', 'supermarket-shopping' ),__( 'Advance Typography', 'supermarket-shopping' ),__( 'Easy Customization', 'supermarket-shopping' ),__( '24x7 Support', 'supermarket-shopping' ), )
            )
        )
    ); 
}

add_action( 'customize_register', 'supermarket_shopping_typography_setting' );