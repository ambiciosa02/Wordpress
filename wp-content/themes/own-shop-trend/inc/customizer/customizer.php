<?php
/**
 * Own Shop Trend Theme Customizer
 *
 * @package own-shop-trend
 */



if ( ! function_exists( 'own_shop_trend_customize_register' ) ) :
function own_shop_trend_customize_register( $wp_customize ) {

    // Add custom controls.
    require_once( get_stylesheet_directory(). '/inc/customizer/custom-controls/info/class-info-control.php' );
    require_once( get_stylesheet_directory(). '/inc/customizer/custom-controls/info/class-title-info-control.php' );
    require_once( get_stylesheet_directory(). '/inc/customizer/custom-controls/toggle-button/class-login-designer-toggle-control.php' );
    require_once( get_stylesheet_directory(). '/inc/customizer/custom-controls/radio-images/class-radio-image-control.php' );


    // Section Category Menu ===================================================
    $wp_customize->add_section(
        'own_shop_trend_header_category_menu_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Category Menu', 'own-shop-trend' ),
            'panel'          => 'own_shop_header_settings_panel',
        )
    ); 

    // Title label
    $wp_customize->add_setting( 
        'own_shop_trend_label_header_category_menu_show', 
        array(
            'sanitize_callback' => 'own_shop_trend_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Own_Shop_Trend_Title_Info_Control( $wp_customize, 'own_shop_trend_label_header_category_menu_show', 
        array(
            'label'       => esc_html__( 'Category Menu Settings', 'own-shop-trend' ),
            'section'     => 'own_shop_trend_header_category_menu_settings',
            'type'        => 'own-shop-trend-title',
            'settings'    => 'own_shop_trend_label_header_category_menu_show',
        ) 
    ));

    // Add an option to enable the category menu
    $wp_customize->add_setting( 
        'own_shop_trend_enable_header_category_menu', 
        array(
            'default'           => false,
            'type'              => 'theme_mod',
            'sanitize_callback' => 'own_shop_trend_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control( 
        new Own_Shop_Trend_Toggle_Control( $wp_customize, 'own_shop_trend_enable_header_category_menu', 
        array(
            'label'       => esc_html__( 'Show Category Menu', 'own-shop-trend' ),
            'section'     => 'own_shop_trend_header_category_menu_settings',
            'type'        => 'own-shop-trend-toggle',
            'settings'    => 'own_shop_trend_enable_header_category_menu',
        ) 
    ));

    // Title label
    $wp_customize->add_setting( 
        'own_shop_trend_label_header_category_menu_heading', 
        array(
            'sanitize_callback' => 'own_shop_trend_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Own_Shop_Trend_Title_Info_Control( $wp_customize, 'own_shop_trend_label_header_category_menu_heading', 
        array(
            'label'       => esc_html__( 'Category Menu Heading', 'own-shop-trend' ),
            'section'     => 'own_shop_trend_header_category_menu_settings',
            'type'        => 'own-shop-trend-title',
            'settings'    => 'own_shop_trend_label_header_category_menu_heading',
            'active_callback' => 'own_shop_trend_header_product_category_menu_enable',
        ) 
    ));

    // Add category heading text
    $wp_customize->add_setting(
        'own_shop_trend_header_category_heading_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Browse Categories', 'own-shop-trend' ),
            'sanitize_callback' => 'own_shop_trend_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'own_shop_trend_header_category_heading_text',
        array(
            'settings'      => 'own_shop_trend_header_category_heading_text',
            'section'       => 'own_shop_trend_header_category_menu_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Category Menu Heading', 'own-shop-trend' ),
            'active_callback' => 'own_shop_trend_header_product_category_menu_enable',
        )
    );



}
endif;
add_action( 'customize_register', 'own_shop_trend_customize_register' );



/**
 * Sanitize checkbox.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
if ( ! function_exists( 'own_shop_trend_sanitize_checkbox' ) ) :
function own_shop_trend_sanitize_checkbox( $checked ) {
    // Boolean check.
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
endif;


/**
 * URL sanitization.
 *
 * @see esc_url_raw() https://developer.wordpress.org/reference/functions/esc_url_raw/
 *
 * @param string $url URL to sanitize.
 * @return string Sanitized URL.
 */
if ( ! function_exists( 'own_shop_trend_sanitize_url' ) ) :
function own_shop_trend_sanitize_url( $url ) {
    return esc_url_raw( $url );
}
endif;


/**
 * String sanitization.
 *
 * @see sanitize_text_field() https://developer.wordpress.org/reference/functions/sanitize_text_field/
 *
 * @param string $str to sanitize.
 * @return string Sanitized string.
 */
if ( ! function_exists( 'own_shop_trend_sanitize_text_field' ) ) :
function own_shop_trend_sanitize_text_field( $str ) {
    return sanitize_text_field( $str );
}
endif;


/**
 * Multiline String sanitization.
 *
 * @see sanitize_textarea_field() https://developer.wordpress.org/reference/functions/sanitize_textarea_field/
 *
 * @param string $str to sanitize.
 * @return string Sanitized string.
 */
if ( ! function_exists( 'own_shop_trend_sanitize_textarea_field' ) ) :
function own_shop_trend_sanitize_textarea_field( $str ) {
    return sanitize_textarea_field( $str );
}
endif;


/**
 * Select sanitization.
 */
if ( ! function_exists( 'own_shop_trend_sanitize_select' ) ) :
function own_shop_trend_sanitize_select( $input, $setting ) {
    // Ensure input is a slug.
    $input = sanitize_key( $input );
    // Get list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control( $setting->id )->choices;
    // If the input is a valid key, return it; otherwise, return the default.
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
endif;

/**
 * Title sanitization.
 */
if ( ! function_exists( 'own_shop_trend_sanitize_title' ) ) :
function own_shop_trend_sanitize_title( $str ) {
    return sanitize_title( $str );  
}
endif;



/**
 * Check if the header product category menu is enabled or not
 */
function own_shop_trend_header_product_category_menu_enable( $control ) {
    if ( $control->manager->get_setting( 'own_shop_trend_enable_header_category_menu' )->value() == true ) :
        return true;
    else :
        return false;
    endif;
}



/**
 * Enqueue the customizer stylesheet.
 */
if ( ! function_exists( 'own_shop_trend_enqueue_customizer_stylesheets' ) ) :
function own_shop_trend_enqueue_customizer_stylesheets() {
    wp_register_style( 'own-shop-trend-customizer', trailingslashit(get_stylesheet_directory_uri()) . 'inc/customizer/assets/css/customizer.css', NULL, NULL, 'all' );
    wp_enqueue_style( 'own-shop-trend-customizer' );
    wp_enqueue_script( 'own-shop-trend-customizer-js', trailingslashit(get_stylesheet_directory_uri()) . 'inc/customizer/assets/js/customizer.js', false, true);
}
endif;
add_action( 'customize_controls_print_styles', 'own_shop_trend_enqueue_customizer_stylesheets' );