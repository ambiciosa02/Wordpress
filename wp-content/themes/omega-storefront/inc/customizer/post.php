<?php
/**
* Posts Settings.
*
* @package Omega Storefront
*/

$omega_storefront_default = omega_storefront_get_default_theme_options();

// Single Post Section.
$wp_customize->add_section( 'omega_storefront_single_posts_settings',
    array(
    'title'      => esc_html__( 'Single Meta Information Settings', 'omega-storefront' ),
    'priority'   => 35,
    'capability' => 'edit_theme_options',
    'panel'      => 'omega_storefront_theme_option_panel',
    )
);

$wp_customize->add_setting('omega_storefront_post_author',
    array(
        'default' => $omega_storefront_default['omega_storefront_post_author'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_storefront_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_storefront_post_author',
    array(
        'label' => esc_html__('Enable Posts Author', 'omega-storefront'),
        'section' => 'omega_storefront_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('omega_storefront_post_date',
    array(
        'default' => $omega_storefront_default['omega_storefront_post_date'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_storefront_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_storefront_post_date',
    array(
        'label' => esc_html__('Enable Posts Date', 'omega-storefront'),
        'section' => 'omega_storefront_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('omega_storefront_post_category',
    array(
        'default' => $omega_storefront_default['omega_storefront_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_storefront_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_storefront_post_category',
    array(
        'label' => esc_html__('Enable Posts Category', 'omega-storefront'),
        'section' => 'omega_storefront_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('omega_storefront_post_tags',
    array(
        'default' => $omega_storefront_default['omega_storefront_post_tags'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_storefront_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_storefront_post_tags',
    array(
        'label' => esc_html__('Enable Posts Tags', 'omega-storefront'),
        'section' => 'omega_storefront_single_posts_settings',
        'type' => 'checkbox',
    )
);

// Archive Post Section.
$wp_customize->add_section( 'omega_storefront_posts_settings',
    array(
    'title'      => esc_html__( 'Archive Meta Information Settings', 'omega-storefront' ),
    'priority'   => 36,
    'capability' => 'edit_theme_options',
    'panel'      => 'omega_storefront_theme_option_panel',
    )
);

$wp_customize->add_setting('omega_storefront_display_archive_post_sticky_post',
    array(
        'default' => $omega_storefront_default['omega_storefront_display_archive_post_sticky_post'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_storefront_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_storefront_display_archive_post_sticky_post',
    array(
        'label' => esc_html__('Enable sticky Post', 'omega-storefront'),
        'section' => 'omega_storefront_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('omega_storefront_display_archive_post_image',
    array(
        'default' => $omega_storefront_default['omega_storefront_display_archive_post_image'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_storefront_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_storefront_display_archive_post_image',
    array(
        'label' => esc_html__('Enable Posts Image', 'omega-storefront'),
        'section' => 'omega_storefront_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('omega_storefront_display_archive_post_category',
    array(
        'default' => $omega_storefront_default['omega_storefront_display_archive_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_storefront_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_storefront_display_archive_post_category',
    array(
        'label' => esc_html__('Enable Posts Category', 'omega-storefront'),
        'section' => 'omega_storefront_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('omega_storefront_display_archive_post_title',
    array(
        'default' => $omega_storefront_default['omega_storefront_display_archive_post_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_storefront_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_storefront_display_archive_post_title',
    array(
        'label' => esc_html__('Enable Posts Title', 'omega-storefront'),
        'section' => 'omega_storefront_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('omega_storefront_display_archive_post_content',
    array(
        'default' => $omega_storefront_default['omega_storefront_display_archive_post_content'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_storefront_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_storefront_display_archive_post_content',
    array(
        'label' => esc_html__('Enable Posts Content', 'omega-storefront'),
        'section' => 'omega_storefront_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('omega_storefront_display_archive_post_button',
    array(
        'default' => $omega_storefront_default['omega_storefront_display_archive_post_button'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_storefront_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_storefront_display_archive_post_button',
    array(
        'label' => esc_html__('Enable Posts Button', 'omega-storefront'),
        'section' => 'omega_storefront_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('omega_storefront_excerpt_limit',
    array(
        'default'           => $omega_storefront_default['omega_storefront_excerpt_limit'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'omega_storefront_sanitize_number_range',
    )
);
$wp_customize->add_control('omega_storefront_excerpt_limit',
    array(
        'label'       => esc_html__('Blog Post Excerpt limit', 'omega-storefront'),
        'section'     => 'omega_storefront_posts_settings',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 45,
           'step'   => 1,
        ),
    )
);