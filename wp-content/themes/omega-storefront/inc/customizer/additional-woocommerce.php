<?php
/**
* Additional Woocommerce Settings.
*
* @package Omega Storefront
*/

$omega_storefront_default = omega_storefront_get_default_theme_options();

// Additional Woocommerce Section.
$wp_customize->add_section( 'omega_storefront_additional_woocommerce_options',
	array(
	'title'      => esc_html__( 'Additional Woocommerce Options', 'omega-storefront' ),
	'priority'   => 210,
	'capability' => 'edit_theme_options',
	'panel'      => 'omega_storefront_theme_option_panel',
	)
);

	$wp_customize->add_setting('omega_storefront_per_columns',
		array(
		'default'           => $omega_storefront_default['omega_storefront_per_columns'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'omega_storefront_sanitize_number_range',
		)
	);
	$wp_customize->add_control('omega_storefront_per_columns',
		array(
		'label'       => esc_html__('Product Per Column', 'omega-storefront'),
		'section'     => 'omega_storefront_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 10,
		'step'   => 1,
		),
		)
	);

	$wp_customize->add_setting('omega_storefront_product_per_page',
		array(
		'default'           => $omega_storefront_default['omega_storefront_product_per_page'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'omega_storefront_sanitize_number_range',
		)
	);
	$wp_customize->add_control('omega_storefront_product_per_page',
		array(
		'label'       => esc_html__('Product Per Page', 'omega-storefront'),
		'section'     => 'omega_storefront_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 15,
		'step'   => 1,
		),
		)
	);

	$wp_customize->add_setting('omega_storefront_show_hide_related_product',
    array(
        'default' => $omega_storefront_default['omega_storefront_show_hide_related_product'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_storefront_sanitize_checkbox',
    )
	);
	$wp_customize->add_control('omega_storefront_show_hide_related_product',
	    array(
	        'label' => esc_html__('Enable Related Products', 'omega-storefront'),
	        'section' => 'omega_storefront_additional_woocommerce_options',
	        'type' => 'checkbox',
	    )
	);