<?php
/**
* Footer Settings.
*
* @package Omega Storefront
*/

$omega_storefront_default = omega_storefront_get_default_theme_options();

$wp_customize->add_section( 'omega_storefront_footer_widget_area',
	array(
	'title'      => esc_html__( 'Footer Settings', 'omega-storefront' ),
	'priority'   => 200,
	'capability' => 'edit_theme_options',
	'panel'      => 'omega_storefront_theme_option_panel',
	)
);

$wp_customize->add_setting('omega_storefront_display_footer',
    array(
        'default' => $omega_storefront_default['omega_storefront_display_footer'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_storefront_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_storefront_display_footer',
    array(
        'label' => esc_html__('Enable Footer', 'omega-storefront'),
        'section' => 'omega_storefront_footer_widget_area',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'omega_storefront_footer_column_layout',
	array(
	'default'           => $omega_storefront_default['omega_storefront_footer_column_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'omega_storefront_sanitize_select',
	)
);
$wp_customize->add_control( 'omega_storefront_footer_column_layout',
	array(
	'label'       => esc_html__( 'Footer Column Layout', 'omega-storefront' ),
	'section'     => 'omega_storefront_footer_widget_area',
	'type'        => 'select',
	'choices'               => array(
		'1' => esc_html__( 'One Column', 'omega-storefront' ),
		'2' => esc_html__( 'Two Column', 'omega-storefront' ),
		'3' => esc_html__( 'Three Column', 'omega-storefront' ),
	    ),
	)
);

$wp_customize->add_setting( 'omega_storefront_footer_widget_title_alignment',
        array(
        'default'           => $omega_storefront_default['omega_storefront_footer_widget_title_alignment'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'omega_storefront_sanitize_footer_widget_title_alignment',
        )
);
$wp_customize->add_control( 'omega_storefront_footer_widget_title_alignment',
    array(
    'label'       => esc_html__( 'Footer Widget Title Alignment', 'omega-storefront' ),
    'section'     => 'omega_storefront_footer_widget_area',
    'type'        => 'select',
    'choices'     => array(
        'left' => esc_html__( 'Left', 'omega-storefront' ),
        'center'  => esc_html__( 'Center', 'omega-storefront' ),
        'right'    => esc_html__( 'Right', 'omega-storefront' ),
        ),
    )
);

$wp_customize->add_setting( 'omega_storefront_footer_copyright_text',
	array(
	'default'           => $omega_storefront_default['omega_storefront_footer_copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'omega_storefront_footer_copyright_text',
	array(
	'label'    => esc_html__( 'Footer Copyright Text', 'omega-storefront' ),
	'section'  => 'omega_storefront_footer_widget_area',
	'type'     => 'text',
	)
);

$wp_customize->add_setting('omega_storefront_copyright_font_size',
    array(
        'default'           => $omega_storefront_default['omega_storefront_copyright_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'omega_storefront_sanitize_number_range',
    )
);
$wp_customize->add_control('omega_storefront_copyright_font_size',
    array(
        'label'       => esc_html__('Copyright Font Size', 'omega-storefront'),
        'section'     => 'omega_storefront_footer_widget_area',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 5,
           'max'   => 30,
           'step'   => 1,
    	),
    )
);

$wp_customize->add_setting( 'omega_storefront_footer_widget_background_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'omega_storefront_footer_widget_background_color', array(
    'label'     => __('Footer Widget Background Color', 'omega-storefront'),
    'description' => __('It will change the complete footer widget background color.', 'omega-storefront'),
    'section' => 'omega_storefront_footer_widget_area',
    'settings' => 'omega_storefront_footer_widget_background_color',
)));

$wp_customize->add_setting('omega_storefront_footer_widget_background_image',array(
    'default'   => '',
    'sanitize_callback' => 'esc_url_raw',
));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'omega_storefront_footer_widget_background_image',array(
    'label' => __('Footer Widget Background Image','omega-storefront'),
    'section' => 'omega_storefront_footer_widget_area'
)));

$wp_customize->add_setting('omega_storefront_enable_to_the_top',
    array(
        'default' => $omega_storefront_default['omega_storefront_enable_to_the_top'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_storefront_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_storefront_enable_to_the_top',
    array(
        'label' => esc_html__('Enable To The Top', 'omega-storefront'),
        'section' => 'omega_storefront_footer_widget_area',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'omega_storefront_to_the_top_text',
    array(
    'default'           => $omega_storefront_default['omega_storefront_to_the_top_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'omega_storefront_to_the_top_text',
    array(
    'label'    => esc_html__( 'To The Top Text', 'omega-storefront' ),
    'section'  => 'omega_storefront_footer_widget_area',
    'type'     => 'text',
    )
);