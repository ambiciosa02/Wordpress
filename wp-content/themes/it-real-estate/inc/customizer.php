<?php
if (!defined('ABSPATH')) {
    exit('No direct access allowed!');
}

function itrest_customize_register( $wp_customize ) {
    $wp_customize->get_setting('itre_header_height')->default               =   650;
    $wp_customize->get_control('itre_header_height')->active_callback       =   'itrest_front_page_or_home';
    $wp_customize->get_control('itre_header_height')->input_attrs['min']    =   500;
    $wp_customize->get_control('itre_header_height')->input_attrs['max']    =   800;
}
add_action('customize_register', 'itrest_customize_register', 100);

/**
 * Active Callack function for Header HHeight
 *
 * @return  boolean  Check whether current page is the front page or bloc page
 */
function itrest_front_page_or_home() {
    return is_front_page() || is_home() ? true : false;    
}
