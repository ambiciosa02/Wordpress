<?php
/**
* Header Options.
*
* @package Omega Storefront
*/

$omega_storefront_default = omega_storefront_get_default_theme_options();

// Header Section.
$wp_customize->add_section( 'omega_storefront_social_media_setting',
	array(
	'title'      => esc_html__( 'Social Media Settings', 'omega-storefront' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
	'panel'      => 'omega_storefront_theme_option_panel',
	)
);

$wp_customize->add_setting( 'omega_storefront_header_layout_facebook_link',
    array(
    'default'           => $omega_storefront_default['omega_storefront_header_layout_facebook_link'], 
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'omega_storefront_header_layout_facebook_link',
    array(
    'label'    => esc_html__( 'Facebook Link', 'omega-storefront' ),
    'section'  => 'omega_storefront_social_media_setting',
    'type'     => 'url',
    )
);

$wp_customize->add_setting( 'omega_storefront_header_layout_twitter_link',
    array(
    'default'           => $omega_storefront_default['omega_storefront_header_layout_twitter_link'], 
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'omega_storefront_header_layout_twitter_link',
    array(
    'label'    => esc_html__( 'Twitter Link', 'omega-storefront' ),
    'section'  => 'omega_storefront_social_media_setting',
    'type'     => 'url',
    )
);

$wp_customize->add_setting( 'omega_storefront_header_layout_pintrest_link',
    array(
   'default'           => $omega_storefront_default['omega_storefront_header_layout_pintrest_link'], 
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'omega_storefront_header_layout_pintrest_link',
    array(
    'label'    => esc_html__( 'Pintrest Link', 'omega-storefront' ),
    'section'  => 'omega_storefront_social_media_setting',
    'type'     => 'url',
    )
);

$wp_customize->add_setting( 'omega_storefront_header_layout_instagram_link',
    array(
   'default'           => $omega_storefront_default['omega_storefront_header_layout_instagram_link'], 
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'omega_storefront_header_layout_instagram_link',
    array(
    'label'    => esc_html__( 'Instagram Link', 'omega-storefront' ),
    'section'  => 'omega_storefront_social_media_setting',
    'type'     => 'url',
    )
);

$wp_customize->add_setting( 'omega_storefront_header_layout_youtube_link',
    array(
    'default'           => $omega_storefront_default['omega_storefront_header_layout_youtube_link'], 
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'omega_storefront_header_layout_youtube_link',
    array(
    'label'    => esc_html__( 'Youtube Link', 'omega-storefront' ),
    'section'  => 'omega_storefront_social_media_setting',
    'type'     => 'url',
    )
);