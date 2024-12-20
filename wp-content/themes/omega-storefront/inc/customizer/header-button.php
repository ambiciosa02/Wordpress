<?php
/**
* Header Options.
*
* @package Omega Storefront
*/

$omega_storefront_default = omega_storefront_get_default_theme_options();

// Header Section.
$wp_customize->add_section( 'omega_storefront_button_header_setting',
	array(
	'title'      => esc_html__( 'Header Settings', 'omega-storefront' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
	'panel'      => 'omega_storefront_theme_option_panel',
	)
);

$wp_customize->add_setting( 'omega_storefront_header_layout_phone_number',
    array(
    'default'           => $omega_storefront_default['omega_storefront_header_layout_phone_number'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'omega_storefront_header_layout_phone_number',
    array(
    'label'    => esc_html__( 'Header Phone Number', 'omega-storefront' ),
    'section'  => 'omega_storefront_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'omega_storefront_header_layout_email_id',
    array(
    'default'           => $omega_storefront_default['omega_storefront_header_layout_email_id'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'omega_storefront_header_layout_email_id',
    array(
    'label'    => esc_html__( 'Header Email Address', 'omega-storefront' ),
    'section'  => 'omega_storefront_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'omega_storefront_header_layout_text',
    array(
    'default'           => $omega_storefront_default['omega_storefront_header_layout_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'omega_storefront_header_layout_text',
    array(
    'label'    => esc_html__( 'Header Discount Text', 'omega-storefront' ),
    'section'  => 'omega_storefront_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting('omega_storefront_menu_font_size',
    array(
        'default'           => $omega_storefront_default['omega_storefront_menu_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'omega_storefront_sanitize_number_range',
    )
);
$wp_customize->add_control('omega_storefront_menu_font_size',
    array(
        'label'       => esc_html__('Menu Font Size', 'omega-storefront'),
        'section'     => 'omega_storefront_button_header_setting',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 30,
           'step'   => 1,
        ),
    )
);


$wp_customize->add_setting( 'omega_storefront_menu_text_transform',
    array(
    'default'           => $omega_storefront_default['omega_storefront_menu_text_transform'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'omega_storefront_sanitize_menu_transform',
    )
);
$wp_customize->add_control( 'omega_storefront_menu_text_transform',
    array(
    'label'       => esc_html__( 'Menu Text Transform', 'omega-storefront' ),
    'section'     => 'omega_storefront_button_header_setting',
    'type'        => 'select',
    'choices'     => array(
        'capitalize' => esc_html__( 'Capitalize', 'omega-storefront' ),
        'uppercase'  => esc_html__( 'Uppercase', 'omega-storefront' ),
        'lowercase'    => esc_html__( 'Lowercase', 'omega-storefront' ),
        ),
    )
);


$wp_customize->add_setting('omega_storefront_sticky',
    array(
        'default' => $omega_storefront_default['omega_storefront_sticky'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_storefront_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_storefront_sticky',
    array(
        'label' => esc_html__('Enable Sticky Header', 'omega-storefront'),
        'section' => 'omega_storefront_button_header_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('omega_storefront_header_layout_enable_translator',
    array(
        'default' => $omega_storefront_default['omega_storefront_header_layout_enable_translator'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_storefront_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_storefront_header_layout_enable_translator',
    array(
        'label' => esc_html__('Enable Translater', 'omega-storefront'),
        'section' => 'omega_storefront_button_header_setting',
        'type' => 'checkbox',
    )
);