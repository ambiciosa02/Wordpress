<?php
/**
* Widget Functions.
*
* @package Omega Storefront
*/

function omega_storefront_widgets_init(){

	register_sidebar(array(
	    'name' => esc_html__('Main Sidebar', 'omega-storefront'),
	    'id' => 'sidebar-1',
	    'description' => esc_html__('Add widgets here.', 'omega-storefront'),
	    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h3 class="widget-title"><span>',
	    'after_title' => '</span></h3>',
	));


    $omega_storefront_default = omega_storefront_get_default_theme_options();
    $omega_storefront_footer_column_layout = absint( get_theme_mod( 'omega_storefront_footer_column_layout',$omega_storefront_default['omega_storefront_footer_column_layout'] ) );

    for( $i = 0; $i < $omega_storefront_footer_column_layout; $i++ ){
    	
    	if( $i == 0 ){ $count = esc_html__('One','omega-storefront'); }
    	if( $i == 1 ){ $count = esc_html__('Two','omega-storefront'); }
    	if( $i == 2 ){ $count = esc_html__('Three','omega-storefront'); }

	    register_sidebar( array(
	        'name' => esc_html__('Footer Widget ', 'omega-storefront').$count,
	        'id' => 'omega-storefront-footer-widget-'.$i,
	        'description' => esc_html__('Add widgets here.', 'omega-storefront'),
	        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h2 class="widget-title">',
	        'after_title' => '</h2>',
	    ));
	}

}

add_action('widgets_init', 'omega_storefront_widgets_init');