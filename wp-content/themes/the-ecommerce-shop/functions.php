<?php

/**
 * [the_ecommerce_shop_setup description]
 * @return [type] [description]
 */
function the_ecommerce_shop_setup() {

	// Register Overlay Menu
	register_nav_menus( array(
		'overlaymenu'	=> __( 'Overlay Menu', 'the-ecommerce-shop' ),
	) );

}
add_action( 'after_setup_theme', 'the_ecommerce_shop_setup' );

/**
 * [the_ecommerce_shop_styles_scripts description]
 * @return [type] [description]
 */
function the_ecommerce_shop_styles_scripts() {

	$dependency = array( 'bootstrap', 'font-awesome', 'di-ecommerce-style-default', 'di-ecommerce-style-core' );
	if( class_exists( 'WooCommerce' ) ) {
		$dependency = array( 'bootstrap', 'font-awesome', 'di-ecommerce-style-default', 'di-ecommerce-style-core', 'di-ecommerce-style-woo' ); 
	}

	/**
	 * Add the default/main css file of parent theme.
	 */
    wp_enqueue_style( 'di-ecommerce-style-default', get_template_directory_uri() . '/style.css' );

    /**
	 * Add the main css file of the child theme after all css files of parent theme.
	 */
    wp_enqueue_style( 'the-ecommerce-shop',  get_stylesheet_directory_uri() . '/style.css', $dependency, wp_get_theme()->get('Version'), 'all' );

    // Load overlay-menu.js if overlay menu enabled in customize and enabled top bar
    if( get_theme_mod( 'display_top_bar', '1' ) == 1 && get_theme_mod( 'ovrly_menu_endis', '1' ) == 1 ) {
    	wp_enqueue_script( 'the-ecommerce-shop-overlay-menu', get_stylesheet_directory_uri() . '/assets/js/overlay-menu.js', array( 'jquery' ), wp_get_theme()->get('Version'), true );
    }

}
add_action( 'wp_enqueue_scripts', 'the_ecommerce_shop_styles_scripts' );

/**
 * [the_ecommerce_shop_customize_pr_handle description]
 * @param  [type] $wp_customize [description]
 * @return [type]               [description]
 */
function the_ecommerce_shop_customize_pr_handle( $wp_customize ) {

	// For CTA
	$wp_customize->get_setting( 'cta_endis' )->transport   = 'refresh';
	$wp_customize->selective_refresh->add_partial( 'cta_endis', array(
		'selector'	=> '.di-cta',
	) );

	// For overlay menu
	$wp_customize->get_setting( 'ovrly_menu_endis' )->transport   = 'refresh';
	$wp_customize->selective_refresh->add_partial( 'ovrly_menu_endis', array(
		'selector'	=> '.ovrly-menu-otr',
	) );

}
add_action( 'customize_register', 'the_ecommerce_shop_customize_pr_handle', 9999999 );

/**
 * [the_ecommerce_shop_customizer_scripts_and_styles description]
 * @return [type] [description]
 */
function the_ecommerce_shop_customizer_scripts_and_styles() {

	wp_enqueue_style( 'the-ecommerce-shop-customize-preview', get_stylesheet_directory_uri() . '/assets/css/customizer.css', array( 'customize-preview', 'di-ecommerce-customize-preview' ), wp_get_theme()->get('Version'), 'all' );

}
add_action( 'customize_preview_init', 'the_ecommerce_shop_customizer_scripts_and_styles' );


/**
 * [the_ecommerce_shop_cta_options description]
 * @return [type] [description]
 */
function the_ecommerce_shop_cta_options() {

	// CTA
	Kirki::add_section( 'cta', array(
		'title'          => esc_html__( 'CTA Options', 'the-ecommerce-shop' ),
		'panel'          => 'di_ecommerce_options',
		'capability'     => 'edit_theme_options',
	) );

	Kirki::add_field( 'di_ecommerce_config', array(
		'type'        => 'toggle',
		'settings'    => 'cta_endis',
		'label'       => esc_html__( 'CTA Feature', 'the-ecommerce-shop' ),
		'description' => esc_html__( 'Turn on to enable CTA', 'the-ecommerce-shop' ),
		'section'     => 'cta',
		'default'     => '1',
	) );

	Kirki::add_field( 'di_ecommerce_config', array(
		'type'			=> 'text',
		'settings'		=> 'cta_label',
		'label'			=> esc_html__( 'Label', 'the-ecommerce-shop' ),
		'description' 	=> esc_html__( 'Label of CTA', 'the-ecommerce-shop' ),
		'section'		=> 'cta',
		'default'		=> esc_html__( 'Shop Now!', 'the-ecommerce-shop' ),
		'active_callback'  => array(
			array(
				'setting'  => 'cta_endis',
				'operator' => '==',
				'value'    => '1',
			),
		),
	) );

	Kirki::add_field( 'di_ecommerce_config', array(
		'type'			=> 'url',
		'settings'		=> 'cta_link',
		'label'			=> esc_html__( 'Link', 'the-ecommerce-shop' ),
		'description' 	=> esc_html__( 'Link of CTA', 'the-ecommerce-shop' ),
		'section'		=> 'cta',
		'default'		=> esc_url( home_url( '/' ) ),
		'active_callback'  => array(
			array(
				'setting'  => 'cta_endis',
				'operator' => '==',
				'value'    => '1',
			),
		),
	) );

	Kirki::add_field( 'di_ecommerce_config', array(
		'type'        => 'toggle',
		'settings'    => 'cta_link_trgt',
		'label'       => esc_html__( 'Link Target', 'the-ecommerce-shop' ),
		'description' => esc_html__( 'Turn on to open link in new tab.', 'the-ecommerce-shop' ),
		'section'     => 'cta',
		'default'     => '0',
		'active_callback'  => array(
			array(
				'setting'  => 'cta_endis',
				'operator' => '==',
				'value'    => '1',
			),
		),
	) );

	Kirki::add_field( 'di_ecommerce_config', array(
		'type'        => 'typography',
		'settings'    => 'cta_typog',
		'label'       => esc_html__( 'Typography', 'the-ecommerce-shop' ),
		'description' => esc_html__( 'Typography of the CTA', 'the-ecommerce-shop' ),
		'section'     => 'cta',
		'default'     => array(
			'font-family'    => 'Lora',
			'variant'        => '500',
			'font-size'      => '16px',
			'letter-spacing' => '1px',
			'text-transform' => 'capitalize',
			'color' 		 => '#ffffff',
		),
		'output'      => array(
			array(
				'element' => '.di-cta',
			),
		),
		'transport' => 'auto',
		'active_callback'  => array(
			array(
				'setting'  => 'cta_endis',
				'operator' => '==',
				'value'    => '1',
			),
		),
	) );

	Kirki::add_field( 'di_ecommerce_config', array(
		'type'        => 'color',
		'settings'    => 'cta_hvr_clr',
		'label'       => esc_html__( 'Hover Color', 'the-ecommerce-shop' ),
		'description' => esc_html__( 'Hover color of the CTA', 'the-ecommerce-shop' ),
		'section'     => 'cta',
		'default'     => '#ffffff',
		'choices'     => array(
			'alpha' => true,
		),
		'output' => array(
			array(
				'element'	=> '.di-cta:hover, .di-cta:focus',
				'property'	=> 'color',
			),
		),
		'transport' => 'auto',
		'active_callback'  => array(
			array(
				'setting'  => 'cta_endis',
				'operator' => '==',
				'value'    => '1',
			),
		),
	) );

	Kirki::add_field( 'di_ecommerce_config', array(
		'type'        => 'color',
		'settings'    => 'cta_bg_clr',
		'label'       => esc_html__( 'Background Color', 'the-ecommerce-shop' ),
		'description' => esc_html__( 'Background color of the CTA', 'the-ecommerce-shop' ),
		'section'     => 'cta',
		'default'     => '#fd5757',
		'choices'     => array(
			'alpha' => true,
		),
		'output' => array(
			array(
				'element'	=> '.di-cta',
				'property'	=> 'background-color',
			),
		),
		'transport' => 'auto',
		'active_callback'  => array(
			array(
				'setting'  => 'cta_endis',
				'operator' => '==',
				'value'    => '1',
			),
		),
	) );

	Kirki::add_field( 'di_ecommerce_config', array(
		'type'        => 'color',
		'settings'    => 'cta_hver_bg_clr',
		'label'       => esc_html__( 'Hover Background Color', 'the-ecommerce-shop' ),
		'description' => esc_html__( 'Hover background color of the CTA', 'the-ecommerce-shop' ),
		'section'     => 'cta',
		'default'     => '#fe2020',
		'choices'     => array(
			'alpha' => true,
		),
		'output' => array(
			array(
				'element'	=> '.di-cta:hover',
				'property'	=> 'background-color',
			),
		),
		'transport' => 'auto',
		'active_callback'  => array(
			array(
				'setting'  => 'cta_endis',
				'operator' => '==',
				'value'    => '1',
			),
		),
	) );

}
add_action( 'di_ecommerce_sec_aftr_typog', 'the_ecommerce_shop_cta_options' );


/**
 * [the_ecommerce_shop_overlaymenu description]
 * @return [type] [description]
 */
function the_ecommerce_shop_overlaymenu() {

	Kirki::add_field( 'di_ecommerce_config', array(
		'type'        => 'toggle',
		'settings'    => 'ovrly_menu_endis',
		'label'       => esc_html__( 'Overlay Menu', 'the-ecommerce-shop' ),
		'description' => esc_html__( 'Turn on to enable Overlay menu. you can create or select menu, here: Dashboard > Appearance > ', 'the-ecommerce-shop' ) . ' <a target="_blank" href="' . esc_url( get_admin_url() . 'nav-menus.php' ) .' ">' . esc_html__( 'Menus', 'the-ecommerce-shop' ) . '</a>',
		'section'     => 'top_bar',
		'default'     => '1',
		'active_callback'  => array(
			array(
				'setting'  => 'display_top_bar',
				'operator' => '==',
				'value'    => 1,
			),
		)
	) );

	Kirki::add_field( 'di_ecommerce_config', array(
		'type'			=> 'text',
		'settings'		=> 'ovrly_menu_ttl_attr',
		'label'			=> esc_html__( 'Title', 'the-ecommerce-shop' ),
		'description' 	=> esc_html__( 'Title of the overlay menu icon', 'the-ecommerce-shop' ),
		'section'		=> 'top_bar',
		'default'		=> esc_html__( 'Overlay Menu', 'the-ecommerce-shop' ),
		'active_callback'  => array(
			array(
				'setting'  => 'display_top_bar',
				'operator' => '==',
				'value'    => 1,
			),
			array(
				'setting'  => 'ovrly_menu_endis',
				'operator' => '==',
				'value'    => '1',
			),
		),
	) );

	Kirki::add_field( 'di_ecommerce_config', array(
		'type'        => 'color',
		'settings'    => 'ovrly_menu_clr',
		'label'       => esc_html__( 'Links Color', 'the-ecommerce-shop' ),
		'description' => esc_html__( 'Color of the overlay menu items', 'the-ecommerce-shop' ),
		'section'     => 'top_bar',
		'default'     => '#818181',
		'choices'     => array(
			'alpha' => true,
		),
		'output' => array(
			array(
				'element'	=> 'ul.overlaymenu-class li a, .ovrly .ovrly-menu-closebtn',
				'property'	=> 'color',
			),
		),
		'transport' => 'auto',
		'active_callback'  => array(
			array(
				'setting'  => 'display_top_bar',
				'operator' => '==',
				'value'    => 1,
			),
			array(
				'setting'  => 'ovrly_menu_endis',
				'operator' => '==',
				'value'    => '1',
			),
		),
	) );

	Kirki::add_field( 'di_ecommerce_config', array(
		'type'        => 'color',
		'settings'    => 'ovrly_menu_hvr_clr',
		'label'       => esc_html__( 'Hover Links Color', 'the-ecommerce-shop' ),
		'description' => esc_html__( 'Hover color of the overlay menu items', 'the-ecommerce-shop' ),
		'section'     => 'top_bar',
		'default'     => '#f1f1f1',
		'choices'     => array(
			'alpha' => true,
		),
		'output' => array(
			array(
				'element'	=> 'ul.overlaymenu-class li a:hover, ul.overlaymenu-class li a:focus, .ovrly .ovrly-menu-closebtn:hover, .ovrly .ovrly-menu-closebtn:focus',
				'property'	=> 'color',
			),
		),
		'transport' => 'auto',
		'active_callback'  => array(
			array(
				'setting'  => 'display_top_bar',
				'operator' => '==',
				'value'    => 1,
			),
			array(
				'setting'  => 'ovrly_menu_endis',
				'operator' => '==',
				'value'    => '1',
			),
		),
	) );

	Kirki::add_field( 'di_ecommerce_config', array(
		'type'        => 'background',
		'settings'    => 'ovrly_menu_bg',
		'label'       => esc_html__( 'Overlay Menu Background Property', 'the-ecommerce-shop' ),
		'description' => esc_html__( 'Display background color or image.', 'the-ecommerce-shop' ),
		'section'     => 'top_bar',
		'default'     => array(
			'background-color'      => 'rgba(0,0,0, 0.8)',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'fixed',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.ovrly',
			),
		),
		'active_callback'  => array(
			array(
				'setting'  => 'display_top_bar',
				'operator' => '==',
				'value'    => 1,
			),
			array(
				'setting'  => 'ovrly_menu_endis',
				'operator' => '==',
				'value'    => '1',
			),
		),
	) );

	Kirki::add_field( 'di_ecommerce_config', array(
		'type'        => 'color',
		'settings'    => 'ovrly_menu_bg_overlay',
		'label'       => esc_html__( 'Background Image Overlay Color', 'the-ecommerce-shop' ),
		'description' => esc_html__( 'This color will apply over the background image.', 'the-ecommerce-shop' ),
		'section'     => 'top_bar',
		'default'     => '',
		'choices'     => array(
			'alpha' => true,
		),
		'output' => array(
			array(
				'element'  => '.overlay-bgoverlay-color',
				'property' => 'background-color',
			),
		),
		'transport' => 'auto',
		'active_callback'  => array(
			array(
				'setting'  => 'display_top_bar',
				'operator' => '==',
				'value'    => 1,
			),
			array(
				'setting'  => 'ovrly_menu_endis',
				'operator' => '==',
				'value'    => '1',
			),
		),
	) );

	Kirki::add_field( 'di_ecommerce_config', array(
		'type'        => 'typography',
		'settings'    => 'ovrly_menu_typog',
		'label'       => esc_html__( 'Overlay Menu Typography', 'the-ecommerce-shop' ),
		'description' => esc_html__( 'Typography of the overlay menu items', 'the-ecommerce-shop' ),
		'section'     => 'top_bar',
		'default'     => array(
			'font-family'    => 'Lora',
			'variant'        => 'regular',
			'font-size'      => '26px',
			'letter-spacing' => '0px',
			'text-transform' => 'none',
		),
		'output'      => array(
			array(
				'element' => 'ul.overlaymenu-class li',
			),
		),
		'transport' => 'auto',
		'active_callback'  => array(
			array(
				'setting'  => 'display_top_bar',
				'operator' => '==',
				'value'    => 1,
			),
			array(
				'setting'  => 'ovrly_menu_endis',
				'operator' => '==',
				'value'    => '1',
			),
		),
	) );

}
add_action( 'di_ecommerce_top_bar_search_form', 'the_ecommerce_shop_overlaymenu' );

