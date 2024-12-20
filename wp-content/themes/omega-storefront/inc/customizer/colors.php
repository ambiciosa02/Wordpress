<?php
/**
* Color Settings.
* @package Omega Storefront
*/

$omega_storefront_default = omega_storefront_get_default_theme_options();

$wp_customize->add_setting( 'omega_storefront_default_text_color',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'omega_storefront_default_text_color',
    array(
        'label'      => esc_html__( 'Text Color', 'omega-storefront' ),
        'section'    => 'colors',
        'settings'   => 'omega_storefront_default_text_color',
    ) ) 
);

$wp_customize->add_setting( 'omega_storefront_border_color',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'omega_storefront_border_color',
    array(
        'label'      => esc_html__( 'Border Color', 'omega-storefront' ),
        'section'    => 'colors',
        'settings'   => 'omega_storefront_border_color',
    ) ) 
);