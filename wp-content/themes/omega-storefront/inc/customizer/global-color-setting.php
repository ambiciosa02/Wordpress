<?php
/**
* Global Color Settings.
*
* @package Omega Storefront
*/

$omega_storefront_default = omega_storefront_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'omega_storefront_global_color_setting',
	array(
	'title'      => esc_html__( 'Global Color Settings', 'omega-storefront' ),
	'priority'   => 21,
	'capability' => 'edit_theme_options',
	'panel'      => 'omega_storefront_theme_option_panel',
	)
);

$wp_customize->add_setting( 'omega_storefront_global_color',
    array(
    'default'           => '#5482F7',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'omega_storefront_global_color',
    array(
        'label'      => esc_html__( 'Global Color', 'omega-storefront' ),
        'section'    => 'omega_storefront_global_color_setting',
        'settings'   => 'omega_storefront_global_color',
    ) ) 
);