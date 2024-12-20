<?php
/**
 * Theme Customizer Controls
 *
 * @package own-shop
 */


if ( ! function_exists( 'own_shop_customizer_shop_register' ) ) :
function own_shop_customizer_shop_register( $wp_customize ) {


    // Section Product Archive Page ===================================================
    $wp_customize->add_section(
        'own_shop_shop_page_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Product Archive', 'own-shop' ),
            'panel'          => 'woocommerce',
        )
    ); 

    // Title label
    $wp_customize->add_setting( 
        'own_shop_label_shop_page_show', 
        array(
            'sanitize_callback' => 'own_shop_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_shop_page_show', 
        array(
            'label'       => esc_html__( 'Product Archive Settings', 'own-shop' ),
            'section'     => 'own_shop_shop_page_settings',
            'type'        => 'own-shop-title',
            'settings'    => 'own_shop_label_shop_page_show',
        ) 
    ));

    // Sidebar layout
    $wp_customize->add_setting(
        'own_shop_shop_page_sidebar_layout',
        array(
            'default'           => 'right',
            'type'              => 'theme_mod',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'own_shop_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new Own_shop_Radio_Image_Control( $wp_customize,'own_shop_shop_page_sidebar_layout',
            array(
                'settings'      => 'own_shop_shop_page_sidebar_layout',
                'section'       => 'own_shop_shop_page_settings',
                'label'         => esc_html__( 'Sidebar Layout', 'own-shop' ),
                'choices'       => array(
                    'right'         => OWN_SHOP_DIR_URI . '/inc/customizer/assets/images/cr.png',
                    'left'          => OWN_SHOP_DIR_URI . '/inc/customizer/assets/images/cl.png',
                    'no'            => OWN_SHOP_DIR_URI . '/inc/customizer/assets/images/cn.png',
                )
            )
        )
    );

	// Section Cart Sidebar ===================================================
    $wp_customize->add_section(
        'own_shop_cart_sidebar_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Cart Sidebar', 'own-shop' ),
            'panel'          => 'woocommerce',
        )
    ); 

    // Title label
	$wp_customize->add_setting( 
		'own_shop_label_cart_page_show', 
		array(
		    'sanitize_callback' => 'own_shop_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_cart_page_show', 
		array(
		    'label'       => esc_html__( 'Cart Page Sidebar', 'own-shop' ),
		    'section'     => 'own_shop_cart_sidebar_settings',
		    'type'        => 'own-shop-title',
		    'settings'    => 'own_shop_label_cart_page_show',
		) 
	));

	// Sidebar layout
    $wp_customize->add_setting(
        'own_shop_cart_page_sidebar_layout',
        array(
            'default'			=> 'no',
            'type'				=> 'theme_mod',
            'capability'		=> 'edit_theme_options',
            'sanitize_callback'	=> 'own_shop_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new Own_shop_Radio_Image_Control( $wp_customize,'own_shop_cart_page_sidebar_layout',
            array(
                'settings'		=> 'own_shop_cart_page_sidebar_layout',
                'section'		=> 'own_shop_cart_sidebar_settings',
                'label'			=> esc_html__( 'Sidebar Layout', 'own-shop' ),
                'choices'		=> array(
                    'right'	        => OWN_SHOP_DIR_URI . '/inc/customizer/assets/images/cr.png',
                    'left' 	        => OWN_SHOP_DIR_URI . '/inc/customizer/assets/images/cl.png',
                    'no' 	        => OWN_SHOP_DIR_URI . '/inc/customizer/assets/images/cn.png',
                )
            )
        )
    );


	// Section Checkout Page ===================================================
    $wp_customize->add_section(
        'own_shop_checkout_sidebar_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Checkout Sidebar', 'own-shop' ),
            'panel'          => 'woocommerce',
        )
    ); 

    // Title label
	$wp_customize->add_setting( 
		'own_shop_label_checkout_page_show', 
		array(
		    'sanitize_callback' => 'own_shop_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_checkout_page_show', 
		array(
		    'label'       => esc_html__( 'Checkout Page Sidebar', 'own-shop' ),
		    'section'     => 'own_shop_checkout_sidebar_settings',
		    'type'        => 'own-shop-title',
		    'settings'    => 'own_shop_label_checkout_page_show',
		) 
	));
	
	// Sidebar layout
    $wp_customize->add_setting(
        'own_shop_checkout_page_sidebar_layout',
        array(
            'default'			=> 'no',
            'type'				=> 'theme_mod',
            'capability'		=> 'edit_theme_options',
            'sanitize_callback'	=> 'own_shop_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new Own_shop_Radio_Image_Control( $wp_customize,'own_shop_checkout_page_sidebar_layout',
            array(
                'settings'		=> 'own_shop_checkout_page_sidebar_layout',
                'section'		=> 'own_shop_checkout_sidebar_settings',
                'label'			=> esc_html__( 'Sidebar Layout', 'own-shop' ),
                'choices'		=> array(
                    'right'	        => OWN_SHOP_DIR_URI . '/inc/customizer/assets/images/cr.png',
                    'left' 	        => OWN_SHOP_DIR_URI . '/inc/customizer/assets/images/cl.png',
                    'no' 	        => OWN_SHOP_DIR_URI . '/inc/customizer/assets/images/cn.png',
                )
            )
        )
    );


    // Section Product Extra ===================================================

    $wp_customize->add_section(
        'own_shop_product_extra_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Product Extra', 'own-shop' ),
            'panel'          => 'woocommerce',
        )
    ); 

    // Title label
    $wp_customize->add_setting( 
        'own_shop_label_product_save_text', 
        array(
            'sanitize_callback' => 'own_shop_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_product_save_text', 
        array(
            'label'       => esc_html__( 'Product Save Text', 'own-shop' ),
            'section'     => 'own_shop_product_extra_settings',
            'type'        => 'own-shop-title',
            'settings'    => 'own_shop_label_product_save_text',
        ) 
    ));

    // Add product save text
    $wp_customize->add_setting(
        'own_shop_product_save_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Save', 'own-shop' ),
            'sanitize_callback' => 'own_shop_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'own_shop_product_save_text',
        array(
            'settings'      => 'own_shop_product_save_text',
            'section'       => 'own_shop_product_extra_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Product Save Text', 'own-shop' ),
        )
    );

}
endif;

add_action( 'customize_register', 'own_shop_customizer_shop_register' );