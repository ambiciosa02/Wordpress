<?php
/**
* Layouts Settings.
*
* @package Omega Storefront
*/

$omega_storefront_default = omega_storefront_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'omega_storefront_layout_setting',
	array(
	'title'      => esc_html__( 'Sidebar Settings', 'omega-storefront' ),
	'priority'   => 20,
	'capability' => 'edit_theme_options',
	'panel'      => 'omega_storefront_theme_option_panel',
	)
);

$wp_customize->add_setting( 'omega_storefront_global_sidebar_layout',
    array(
    'default'           => $omega_storefront_default['omega_storefront_global_sidebar_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'omega_storefront_sanitize_sidebar_option',
    )
);
$wp_customize->add_control( 'omega_storefront_global_sidebar_layout',
    array(
    'label'       => esc_html__( 'Global Sidebar Layout', 'omega-storefront' ),
    'section'     => 'omega_storefront_layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'right-sidebar' => esc_html__( 'Right Sidebar', 'omega-storefront' ),
        'left-sidebar'  => esc_html__( 'Left Sidebar', 'omega-storefront' ),
        'no-sidebar'    => esc_html__( 'No Sidebar', 'omega-storefront' ),
        ),
    )
);

$wp_customize->add_setting('omega_storefront_page_sidebar_layout', array(
    'default'           => $omega_storefront_default['omega_storefront_global_sidebar_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'omega_storefront_sanitize_sidebar_option',
));

$wp_customize->add_control('omega_storefront_page_sidebar_layout', array(
    'label'       => esc_html__('Single Page Sidebar Layout', 'omega-storefront'),
    'section'     => 'omega_storefront_layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'right-sidebar' => esc_html__('Right Sidebar', 'omega-storefront'),
        'left-sidebar'  => esc_html__('Left Sidebar', 'omega-storefront'),
        'no-sidebar'    => esc_html__('No Sidebar', 'omega-storefront'),
    ),
));

$wp_customize->add_setting('omega_storefront_post_sidebar_layout', array(
    'default'           => $omega_storefront_default['omega_storefront_global_sidebar_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'omega_storefront_sanitize_sidebar_option',
));

$wp_customize->add_control('omega_storefront_post_sidebar_layout', array(
    'label'       => esc_html__('Single Post Sidebar Layout', 'omega-storefront'),
    'section'     => 'omega_storefront_layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'right-sidebar' => esc_html__('Right Sidebar', 'omega-storefront'),
        'left-sidebar'  => esc_html__('Left Sidebar', 'omega-storefront'),
        'no-sidebar'    => esc_html__('No Sidebar', 'omega-storefront'),
    ),
));