<?php
/**
* Typography Settings.
*
* @package Omega Storefront
*/

$omega_storefront_default = omega_storefront_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'omega_storefront_typography_setting',
	array(
	'title'      => esc_html__( 'Typography Settings', 'omega-storefront' ),
	'priority'   => 21,
	'capability' => 'edit_theme_options',
	'panel'      => 'omega_storefront_theme_option_panel',
	)
);

// -----------------  Font array
$omega_storefront_fonts = array(
    'bad-script' => 'Bad Script',
    'bitter'     => 'Bitter',
    'charis-sil' => 'Charis SIL',
    'cuprum'     => 'Cuprum',
    'exo-2'      => 'Exo 2',
    'jost'       => 'Jost',
    'open-sans'  => 'Open Sans',
    'oswald'     => 'Oswald',
    'play'       => 'Play',
    'roboto'     => 'Roboto',
    'outfit'     => 'Outfit',
    'ubuntu'     => 'Ubuntu',
);

 // -----------------  General text font
 $wp_customize->add_setting( 'omega_storefront_content_typography_font', array(
    'default'           => 'roboto',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'omega_storefront_radio_sanitize',
) );
$wp_customize->add_control( 'omega_storefront_content_typography_font', array(
    'type'     => 'select',
    'label'    => esc_html__( 'General Content font', 'omega-storefront' ),
    'section'  => 'omega_storefront_typography_setting',
    'settings' => 'omega_storefront_content_typography_font',
    'choices'  => $omega_storefront_fonts,
) );

 // -----------------  General Heading font
$wp_customize->add_setting( 'omega_storefront_heading_typography_font', array(
    'default'           => 'outfit',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'omega_storefront_radio_sanitize',
) );
$wp_customize->add_control( 'omega_storefront_heading_typography_font', array(
    'type'     => 'select',
    'label'    => esc_html__( 'General heading font', 'omega-storefront' ),
    'section'  => 'omega_storefront_typography_setting',
    'settings' => 'omega_storefront_heading_typography_font',
    'choices'  => $omega_storefront_fonts,
) );