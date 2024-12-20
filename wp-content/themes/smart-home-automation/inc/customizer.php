<?php
/**
 * Customizer
 * 
 * @package WordPress
 * @subpackage smart-home-automation
 * @since smart-home-automation 1.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function smart_home_automation_customize_register( $wp_customize ) {
	$wp_customize->add_section( new Smart_Home_Automation_Upsell_Section($wp_customize,'upsell_section',array(
		'title'            => __( 'Smart Home Automation Pro', 'smart-home-automation' ),
		'button_text'      => __( 'Upgrade Pro', 'smart-home-automation' ),
		'url'              => 'https://www.wpradiant.net/products/smart-home-wordpress-theme',
		'priority'         => 0,
	)));
}
add_action( 'customize_register', 'smart_home_automation_customize_register' );

/**
 * Enqueue script for custom customize control.
 */
function smart_home_automation_custom_control_scripts() {
	wp_enqueue_script( 'smart-home-automation-custom-controls-js', get_template_directory_uri() . '/assets/js/custom-controls.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), '1.0', true );
	wp_enqueue_style( 'smart-home-automation-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'smart_home_automation_custom_control_scripts' );