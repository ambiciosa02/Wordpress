<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package WordPress
 * @subpackage smart-home-automation
 * @since smart-home-automation 1.0
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @since smart-home-automation 1.0
	 *
	 * @return void
	 */
	function smart_home_automation_register_block_styles() {
		

		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'smart-home-automation-border',
				'label' => esc_html__( 'Borders', 'smart-home-automation' ),
			)
		);

		
	}
	add_action( 'init', 'smart_home_automation_register_block_styles' );
}