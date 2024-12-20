<?php

if ( class_exists("Kirki")){

	Kirki::add_config('theme_config_id', array(
		'capability'   =>  'edit_theme_options',
		'option_type'  =>  'theme_mod',
	));


	Kirki::add_field( 'theme_config_id', [
		'label'       => esc_html__( 'Logo Size','veterinary-shop' ),
		'section'     => 'title_tagline',
		'priority'    => 9,
		'type'        => 'range',
		'settings'    => 'logo_size',
		'choices' => [
			'step'             => 5,
			'min'              => 0,
			'max'              => 100,
			'aria-valuemin'    => 0,
			'aria-valuemax'    => 100,
			'aria-valuenow'    => 50,
			'aria-orientation' => 'horizontal',
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'veterinary_shop_enable_logo_text',
		'section'     => 'title_tagline',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'veterinary-shop' ) . '</h3>',
		'priority'    => 10,
	] );

  	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'veterinary_shop_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'veterinary-shop' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'veterinary-shop' ),
			'off' => esc_html__( 'Disable', 'veterinary-shop' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'veterinary_shop_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'veterinary-shop' ),
		'section'     => 'title_tagline',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'veterinary-shop' ),
			'off' => esc_html__( 'Disable', 'veterinary-shop' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'veterinary_shop_site_tittle_font_heading',
		'section'     => 'title_tagline',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Site Title Font Size', 'veterinary-shop' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'veterinary_shop_site_tittle_font_size',
		'type'        => 'number',
		'section'     => 'title_tagline',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.logo a'),
				'property' => 'font-size',
				'suffix' => 'px'
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'veterinary_shop_site_tagline_font_heading',
		'section'     => 'title_tagline',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Site Tagline Font Size', 'veterinary-shop' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'veterinary_shop_site_tagline_font_size',
		'type'        => 'number',
		'section'     => 'title_tagline',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.logo span'),
				'property' => 'font-size',
				'suffix' => 'px'
			),
		),
	) );

	// Theme color

	Kirki::add_section( 'veterinary_shop_theme_color_setting', array(
		'title'    => __( 'Color Option', 'veterinary-shop' ),
		'priority' => 10,
	) );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'veterinary_shop_theme_color',
		'label'       => __( 'Theme color', 'veterinary-shop'),
		'description'    => esc_html__( 'To customize the colors of the homepage, use the Elementor editor', 'veterinary-shop' ),
		'section'     => 'veterinary_shop_theme_color_setting',
		'type'        => 'color',
		'default'     => '#FF9D71',
	) );

	// TYPOGRAPHY SETTINGS

	Kirki::add_panel( 'veterinary_shop_typography_panel', array(
		'priority' => 10,
		'title'    => __( 'Typography', 'veterinary-shop' ),
	) );

	//Heading 1 Section

	Kirki::add_section( 'veterinary_shop_h1_typography_setting', array(
		'title'    => __( 'Heading 1', 'veterinary-shop' ),
		'panel'    => 'veterinary_shop_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'veterinary_shop_h1_typography_heading',
		'section'     => 'veterinary_shop_h1_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 1 Typography', 'veterinary-shop' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'veterinary_shop_h1_typography_font',
		'section'   =>  'veterinary_shop_h1_typography_setting',
		'default'   =>  [
			'font-family'   =>  'Delicious Handrawn',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  array('.header-image-box h1'),
				'suffix' => '!important'
			],
		],
	) );

	//Heading 2 Section

	Kirki::add_section( 'veterinary_shop_h2_typography_setting', array(
		'title'    => __( 'Heading 2', 'veterinary-shop' ),
		'panel'    => 'veterinary_shop_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'veterinary_shop_h2_typography_heading',
		'section'     => 'veterinary_shop_h2_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 2 Typography', 'veterinary-shop' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'veterinary_shop_h2_typography_font',
		'section'   =>  'veterinary_shop_h2_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Figtree', sans-serif",
			'font-size'       => '',
			'variant'       =>  '700',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h2',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 3 Section

	Kirki::add_section( 'veterinary_shop_h3_typography_setting', array(
		'title'    => __( 'Heading 3', 'veterinary-shop' ),
		'panel'    => 'veterinary_shop_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'veterinary_shop_h3_typography_heading',
		'section'     => 'veterinary_shop_h3_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 3 Typography', 'veterinary-shop' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'veterinary_shop_h3_typography_font',
		'section'   =>  'veterinary_shop_h3_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Figtree', sans-serif",
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h3',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 4 Section

	Kirki::add_section( 'veterinary_shop_h4_typography_setting', array(
		'title'    => __( 'Heading 4', 'veterinary-shop' ),
		'panel'    => 'veterinary_shop_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'veterinary_shop_h4_typography_heading',
		'section'     => 'veterinary_shop_h4_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 4 Typography', 'veterinary-shop' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'veterinary_shop_h4_typography_font',
		'section'   =>  'veterinary_shop_h4_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Figtree', sans-serif",
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h4',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 5 Section

	Kirki::add_section( 'veterinary_shop_h5_typography_setting', array(
		'title'    => __( 'Heading 5', 'veterinary-shop' ),
		'panel'    => 'veterinary_shop_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'veterinary_shop_h5_typography_heading',
		'section'     => 'veterinary_shop_h5_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 5 Typography', 'veterinary-shop' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'veterinary_shop_h5_typography_font',
		'section'   =>  'veterinary_shop_h5_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Figtree', sans-serif",
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h5',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 6 Section

	Kirki::add_section( 'veterinary_shop_h6_typography_setting', array(
		'title'    => __( 'Heading 6', 'veterinary-shop' ),
		'panel'    => 'veterinary_shop_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'veterinary_shop_h6_typography_heading',
		'section'     => 'veterinary_shop_h6_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 6 Typography', 'veterinary-shop' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'veterinary_shop_h6_typography_font',
		'section'   =>  'veterinary_shop_h6_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Figtree', sans-serif",
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h6',
				'suffix' => '!important'
			],
		],
	) );

	//body Typography

	Kirki::add_section( 'veterinary_shop_body_typography_setting', array(
		'title'    => __( 'Content Typography', 'veterinary-shop' ),
		'panel'    => 'veterinary_shop_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'veterinary_shop_body_typography_heading',
		'section'     => 'veterinary_shop_body_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Content  Typography', 'veterinary-shop' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'veterinary_shop_body_typography_font',
		'section'   =>  'veterinary_shop_body_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Figtree', sans-serif",
			'variant'       =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   => 'body',
				'suffix' => '!important'
			],
		],
	) ); 

	// Theme Options Panel

	Kirki::add_panel( 'veterinary_shop_theme_options_panel', array(
		'priority' => 10,
		'title'    => __( 'Theme Options', 'veterinary-shop' ),
	) );

	// HEADER SECTION

	Kirki::add_section( 'veterinary_shop_section_header',array(
		'title' => esc_html__( 'Header Settings', 'veterinary-shop' ),
		'description'    => esc_html__( 'Here you can add header information.', 'veterinary-shop' ),
		'panel' => 'veterinary_shop_theme_options_panel',
		'tabs'  => [
			'header' => [
				'label' => esc_html__( 'Header', 'veterinary-shop' ),
			],
			'menu'  => [
				'label' => esc_html__( 'Menu', 'veterinary-shop' ),
			],
		],
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'menu',
		'settings'    => 'veterinary_shop_menu_size_heading',
		'section'     => 'veterinary_shop_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Menu Font Size(px)', 'veterinary-shop' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'veterinary_shop_menu_size',
		'tab'      => 'menu',
		'label'       => __( 'Enter a value in pixels. Example:20px', 'veterinary-shop' ),
		'type'        => 'text',
		'section'     => 'veterinary_shop_section_header',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array( '#main-menu a', '#main-menu ul li a', '#main-menu li a'),
				'property' => 'font-size',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'menu',
		'settings'    => 'veterinary_shop_menu_text_transform_heading',
		'section'     => 'veterinary_shop_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Menu Text Transform', 'veterinary-shop' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'menu',
		'settings'    => 'veterinary_shop_menu_text_transform',
		'section'     => 'veterinary_shop_section_header',
		'default'     => 'capitalize',
		'choices'     => [
			'none' => esc_html__( 'Normal', 'veterinary-shop' ),
			'uppercase' => esc_html__( 'Uppercase', 'veterinary-shop' ),
			'lowercase' => esc_html__( 'Lowercase', 'veterinary-shop' ),
			'capitalize' => esc_html__( 'Capitalize', 'veterinary-shop' ),
		],
		'output' => array(
			array(
				'element'  => array( '#main-menu a', '#main-menu ul li a', '#main-menu li a'),
				'property' => ' text-transform',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header',
		'settings'    => 'veterinary_shop_header_advertisement_heading',
		'section'     => 'veterinary_shop_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Advertisement Text', 'veterinary-shop' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'tab'      => 'header',
		'settings' => 'veterinary_shop_header_advertisement_text',
		'section'  => 'veterinary_shop_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'tab'      => 'header',
		'settings'    => 'veterinary_shop_search_enable',
		'label'       => esc_html__( 'Enable/Disable Search', 'veterinary-shop' ),
		'section'     => 'veterinary_shop_section_header',
		'default'     => 'on',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'veterinary-shop' ),
			'off' => esc_html__( 'Disable', 'veterinary-shop' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header',
		'settings'    => 'veterinary_shop_header_button_url_heading',
		'section'     => 'veterinary_shop_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Wishlist Button Link', 'veterinary-shop' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'url',
		'tab'      => 'header',
		'settings' => 'veterinary_shop_header_button_url',
		'section'  => 'veterinary_shop_section_header',
		'default'  => '',
	] );

	// WOOCOMMERCE SETTINGS

	Kirki::add_section( 'veterinary_shop_woocommerce_settings', array(
		'title'          => esc_html__( 'Woocommerce Settings', 'veterinary-shop' ),
		'description'    => esc_html__( 'Woocommerce Settings of themes', 'veterinary-shop' ),
		'panel'    => 'woocommerce',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'veterinary_shop_shop_page_sidebar',
		'label'       => esc_html__( 'Enable/Disable Shop Page Sidebar', 'veterinary-shop' ),
		'section'     => 'veterinary_shop_woocommerce_settings',
		'default'     => 'false',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Shop Page Layouts', 'veterinary-shop' ),
		'settings'    => 'veterinary_shop_shop_page_layout',
		'section'     => 'veterinary_shop_woocommerce_settings',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'veterinary-shop' ),
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'veterinary-shop' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'veterinary_shop_shop_page_sidebar',
				'operator' => '===',
				'value'    => true,
			],
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'label'       => esc_html__( 'Products Per Row', 'veterinary-shop' ),
		'settings'    => 'veterinary_shop_products_per_row',
		'section'     => 'veterinary_shop_woocommerce_settings',
		'default'     => '4',
		'priority'    => 10,
		'choices'     => [
			'2' => '2',
			'3' => '3',
			'4' => '4',
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'label'       => esc_html__( 'Products Per Page', 'veterinary-shop' ),
		'settings'    => 'veterinary_shop_products_per_page',
		'section'     => 'veterinary_shop_woocommerce_settings',
		'default'     => '9',
		'priority'    => 10,
		'choices'  => [
					'min'  => 0,
					'max'  => 50,
					'step' => 1,
				],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'veterinary_shop_single_product_sidebar',
		'label'       => esc_html__( 'Enable / Disable Single Product Sidebar', 'veterinary-shop' ),
		'section'     => 'veterinary_shop_woocommerce_settings',
		'default'     => 'true',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Single Product Layout', 'veterinary-shop' ),
		'settings'    => 'veterinary_shop_single_product_sidebar_layout',
		'section'     => 'veterinary_shop_woocommerce_settings',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'veterinary-shop' ),
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'veterinary-shop' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'veterinary_shop_single_product_sidebar',
				'operator' => '===',
				'value'    => true,
			],
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'veterinary_shop_products_button_border_radius_heading',
		'section'     => 'veterinary_shop_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Products Button Border Radius', 'veterinary-shop' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'veterinary_shop_products_button_border_radius',
		'section'     => 'veterinary_shop_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
		'choices'  => [
					'min'  => 1,
					'max'  => 50,
					'step' => 1,
				],
		'output' => array(
			array(
				'element'  => array('.woocommerce ul.products li.product .button',' a.checkout-button.button.alt.wc-forward','.woocommerce #respond input#submit', '.woocommerce a.button', '.woocommerce button.button','.woocommerce input.button','.woocommerce #respond input#submit.alt','.woocommerce button.button.alt','.woocommerce input.button.alt'),
				'property' => 'border-radius',
				'units' => 'px',
			),
		),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'veterinary_shop_sale_badge_position_heading',
		'section'     => 'veterinary_shop_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Sale Badge Position', 'veterinary-shop' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'veterinary_shop_sale_badge_position',
		'section'     => 'veterinary_shop_woocommerce_settings',
		'default'     => 'right',
		'choices'     => [
			'right' => esc_html__( 'Right', 'veterinary-shop' ),
			'left' => esc_html__( 'Left', 'veterinary-shop' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'veterinary_shop_products_sale_font_size_heading',
		'section'     => 'veterinary_shop_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Sale Font Size', 'veterinary-shop' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'text',
		'settings'    => 'veterinary_shop_products_sale_font_size',
		'section'     => 'veterinary_shop_woocommerce_settings',
		'priority'    => 10,
		'output' => array(
			array(
				'element'  => array('.woocommerce span.onsale','.woocommerce ul.products li.product .onsale'),
				'property' => 'font-size',
				'units' => 'px',
			),
		),
	] );
	
	//ADDITIONAL SETTINGS

	Kirki::add_section( 'veterinary_shop_additional_setting', array(
		'title'          => esc_html__( 'Additional Settings', 'veterinary-shop' ),
		'description'    => esc_html__( 'Additional Settings of themes', 'veterinary-shop' ),
		'panel'    => 'veterinary_shop_theme_options_panel',
		'priority'       => 10,
		'tabs'  => [
			'general' => [
				'label' => esc_html__( 'General', 'veterinary-shop' ),
			],
			'header-image'  => [
				'label' => esc_html__( 'Header Image', 'veterinary-shop' ),
			],
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'veterinary_shop_preloader_hide',
		'label'       => esc_html__( 'Here you can enable or disable your preloader.', 'veterinary-shop' ),
		'section'     => 'veterinary_shop_additional_setting',
		'default'     => '0',
		'priority'    => 10,
		'tab'      => 'general',
	] );
 
	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'veterinary_shop_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'veterinary-shop' ),
		'section'     => 'veterinary_shop_additional_setting',
		'default'     => '0',
		'priority'    => 10,
		'tab'      => 'general',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'veterinary_shop_scroll_alignment_heading',
		'section'     => 'veterinary_shop_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Scroll To Top Position', 'veterinary-shop' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'radio-buttonset',
		'tab'      => 'general',
		'settings'    => 'veterinary_shop_scroll_alignment',
		'section'     => 'veterinary_shop_additional_setting',
		'default'     => 'right',
		'choices'     => [
			'left' => esc_html__( 'left', 'veterinary-shop' ),
			'center' => esc_html__( 'center', 'veterinary-shop' ),
			'right' => esc_html__( 'right', 'veterinary-shop' ),
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'veterinary_shop_scroller_border_radius_heading',
		'section'     => 'veterinary_shop_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Scroll To Top Border Radius', 'veterinary-shop' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'slider',
		'tab'      => 'general',
		'settings'    => 'veterinary_shop_scroller_border_radius',
		'section'     => 'veterinary_shop_additional_setting',
		'default'     => '3',
		'choices'     => [
			'min'  => 0,
			'max'  => 25,
			'step' => 1,
		],
		'output' => array(
			array(
				'element'  => '.scroll-up a',
				'property' => 'border-radius',
				'units' => 'px',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'veterinary_shop_single_page_layout_heading',
		'section'     => 'veterinary_shop_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Single Page Layout', 'veterinary-shop' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'general',
		'settings'    => 'veterinary_shop_single_page_layout',
		'section'     => 'veterinary_shop_additional_setting',
		'default'     => 'One Column',
		'choices'     => [
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'veterinary-shop' ),
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'veterinary-shop' ),
			'One Column' => esc_html__( 'One Column', 'veterinary-shop' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header-image',
		'settings'    => 'veterinary_shop_header_background_attachment_heading',
		'section'     => 'veterinary_shop_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image Attachment', 'veterinary-shop' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'header-image',
		'settings'    => 'veterinary_shop_header_background_attachment',
		'section'     => 'veterinary_shop_additional_setting',
		'default'     => 'scroll',
		'choices'     => [
			'scroll' => esc_html__( 'Scroll', 'veterinary-shop' ),
			'fixed' => esc_html__( 'Fixed', 'veterinary-shop' ),
		],
		'output' => array(
			array(
				'element'  => '.header-image-box',
				'property' => 'background-attachment',
			),
		),
	 ) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header-image',
		'settings'    => 'veterinary_shop_header_overlay_heading',
		'section'     => 'veterinary_shop_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image Overlay', 'veterinary-shop' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'veterinary_shop_header_overlay_setting',
		'tab'      => 'header-image',
		'label'       => __( 'Overlay Color', 'veterinary-shop' ),
		'type'        => 'color',
		'section'     => 'veterinary_shop_additional_setting',
		'transport' => 'auto',
		'default'     => '#00000061',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.header-image-box:before',
				'property' => 'background',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'header-image',
		'settings'    => 'veterinary_shop_header_page_title',
		'label'       => esc_html__( 'Enable / Disable Header Image Page Title.', 'veterinary-shop' ),
		'section'     => 'veterinary_shop_additional_setting',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'header-image',
		'settings'    => 'veterinary_shop_header_breadcrumb',
		'label'       => esc_html__( 'Enable / Disable Header Image Breadcrumb.', 'veterinary-shop' ),
		'section'     => 'veterinary_shop_additional_setting',
		'default'     => '1',
		'priority'    => 10,
	] );

	// POST SECTION

	Kirki::add_section( 'veterinary_shop_blog_post', array(
		'title'          => esc_html__( 'Post Settings', 'veterinary-shop' ),
		'description'    => esc_html__( 'Here you can add post information.', 'veterinary-shop' ),
		'panel'    => 'veterinary_shop_theme_options_panel',
		'tabs'  => [
			'blog-post' => [
				'label' => esc_html__( 'Blog Post', 'veterinary-shop' ),
			],
			'single-post'  => [
				'label' => esc_html__( 'Single Post', 'veterinary-shop' ),
			],
		],
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'blog-post',
		'settings'    => 'veterinary_shop_post_layout_heading',
		'section'     => 'veterinary_shop_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Layout', 'veterinary-shop' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'blog-post',
		'settings'    => 'veterinary_shop_post_layout',
		'section'     => 'veterinary_shop_blog_post',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'veterinary-shop' ),
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'veterinary-shop' ),
			'One Column' => esc_html__( 'One Column', 'veterinary-shop' ),
			'Three Columns' => esc_html__( 'Three Columns', 'veterinary-shop' ),
			'Four Columns' => esc_html__( 'Four Columns', 'veterinary-shop' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'veterinary_shop_date_hide',
		'label'       => esc_html__( 'Enable / Disable Post Date', 'veterinary-shop' ),
		'section'     => 'veterinary_shop_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'veterinary_shop_author_hide',
		'label'       => esc_html__( 'Enable / Disable Post Author', 'veterinary-shop' ),
		'section'     => 'veterinary_shop_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'veterinary_shop_comment_hide',
		'label'       => esc_html__( 'Enable / Disable Post Comment', 'veterinary-shop' ),
		'section'     => 'veterinary_shop_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'veterinary_shop_blog_post_featured_image',
		'label'       => esc_html__( 'Enable / Disable Post Image', 'veterinary-shop' ),
		'section'     => 'veterinary_shop_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'blog-post',
		'settings'    => 'veterinary_shop_length_setting_heading',
		'section'     => 'veterinary_shop_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Post Content Limit', 'veterinary-shop' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'tab'      => 'blog-post',
		'settings'    => 'veterinary_shop_length_setting',
		'section'     => 'veterinary_shop_blog_post',
		'default'     => '15',
		'priority'    => 10,
		'choices'  => [
					'min'  => -10,
					'max'  => 40,
		 			'step' => 1,
				],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'veterinary_shop_single_post_date_hide',
		'label'       => esc_html__( 'Enable / Disable Single Post Date', 'veterinary-shop' ),
		'section'     => 'veterinary_shop_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'veterinary_shop_single_post_author_hide',
		'label'       => esc_html__( 'Enable / Disable Single Post Author', 'veterinary-shop' ),
		'section'     => 'veterinary_shop_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'veterinary_shop_single_post_comment_hide',
		'label'       => esc_html__( 'Enable / Disable Single Post Comment', 'veterinary-shop' ),
		'section'     => 'veterinary_shop_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'label'       => esc_html__( 'Enable / Disable Single Post Tag', 'veterinary-shop' ),
		'settings'    => 'veterinary_shop_single_post_tag',
		'section'     => 'veterinary_shop_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'label'       => esc_html__( 'Enable / Disable Single Post Category', 'veterinary-shop' ),
		'settings'    => 'veterinary_shop_single_post_category',
		'section'     => 'veterinary_shop_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'veterinary_shop_single_post_featured_image',
		'label'       => esc_html__( 'Enable / Disable Single Post Image', 'veterinary-shop' ),
		'section'     => 'veterinary_shop_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'single-post',
		'settings'    => 'veterinary_shop_single_post_radius',
		'section'     => 'veterinary_shop_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Single Post Image Border Radius(px)', 'veterinary-shop' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'veterinary_shop_single_post_border_radius',
		'label'       => __( 'Enter a value in pixels. Example:15px', 'veterinary-shop' ),
		'type'        => 'text',
		'tab'      => 'single-post',
		'section'     => 'veterinary_shop_blog_post',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.post-img img'),
				'property' => 'border-radius',
			),
		),
	) );

	// No Results Page Settings

	Kirki::add_section( 'veterinary_shop_no_result_section', array(
		'title'          => esc_html__( '404 & No Results Page Settings', 'veterinary-shop' ),
		'panel'    => 'veterinary_shop_theme_options_panel',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'veterinary_shop_page_not_found_title_heading',
		'section'     => 'veterinary_shop_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( '404 Page Title', 'veterinary-shop' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'veterinary_shop_page_not_found_title',
		'section'  => 'veterinary_shop_no_result_section',
		'default'  => esc_html__('404 Error!', 'veterinary-shop'),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'veterinary_shop_page_not_found_text_heading',
		'section'     => 'veterinary_shop_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( '404 Page Text', 'veterinary-shop' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'veterinary_shop_page_not_found_text',
		'section'  => 'veterinary_shop_no_result_section',
		'default'  => esc_html__('The page you are looking for may have been moved, deleted, or possibly never existed.', 'veterinary-shop'),
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'     => 'custom',
		'settings' => 'veterinary_shop_page_not_found_line_break',
		'section'  => 'veterinary_shop_no_result_section',
		'default'  => '<hr>',
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'veterinary_shop_no_results_title_heading',
		'section'     => 'veterinary_shop_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'No Results Title', 'veterinary-shop' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'veterinary_shop_no_results_title',
		'section'  => 'veterinary_shop_no_result_section',
		'default'  => esc_html__('Nothing Found', 'veterinary-shop'),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'veterinary_shop_no_results_content_heading',
		'section'     => 'veterinary_shop_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'No Results Content', 'veterinary-shop' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'veterinary_shop_no_results_content',
		'section'  => 'veterinary_shop_no_result_section',
		'default'  => esc_html__('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'veterinary-shop'),
	] );
	
	// FOOTER SECTION

	Kirki::add_section( 'veterinary_shop_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'veterinary-shop' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'veterinary-shop' ),
        'panel'    => 'veterinary_shop_theme_options_panel',
		'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'veterinary_shop_footer_text_heading',
		'section'     => 'veterinary_shop_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'veterinary-shop' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'veterinary_shop_footer_text',
		'section'  => 'veterinary_shop_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'veterinary_shop_footer_enable_heading',
		'section'     => 'veterinary_shop_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'veterinary-shop' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'veterinary_shop_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'veterinary-shop' ),
		'section'     => 'veterinary_shop_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'veterinary-shop' ),
			'off' => esc_html__( 'Disable', 'veterinary-shop' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'veterinary_shop_footer_background_widget_heading',
		'section'     => 'veterinary_shop_footer_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Widget Background', 'veterinary-shop' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id',
	[
		'settings'    => 'veterinary_shop_footer_background_widget',
		'type'        => 'background',
		'section'     => 'veterinary_shop_footer_section',
		'default'     => [
			'background-color'      => 'rgba(23,20,20,1)',
			'background-image'      => '',
			'background-repeat'     => 'no-repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'transport'   => 'auto',
		'output'      => [
			[
				'element' => '.footer-widget',
			],
		],
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'veterinary_shop_footer_copright_color_heading',
		'section'     => 'veterinary_shop_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Copyright Background Color', 'veterinary-shop' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'veterinary_shop_footer_copright_color',
		'type'        => 'color',
		'label'       => __( 'Background Color', 'veterinary-shop' ),
		'section'     => 'veterinary_shop_footer_section',
		'transport' => 'auto',
		'default'     => '#FF9D71',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.footer-copyright',
				'property' => 'background',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'veterinary_shop_footer_copright_text_color_heading',
		'section'     => 'veterinary_shop_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Copyright Text Color', 'veterinary-shop' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'veterinary_shop_footer_copright_text_color',
		'type'        => 'color',
		'label'       => __( 'Text Color', 'veterinary-shop' ),
		'section'     => 'veterinary_shop_footer_section',
		'transport' => 'auto',
		'default'     => '#ffffff',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => array( '.footer-copyright a', '.footer-copyright p'),
				'property' => 'color',
			),
		),
	) );

	// Footer Social Icons Section

	Kirki::add_section( 'veterinary_shop_footer_social_media_section', array(
		'title'          => esc_html__( 'Footer Social Icons', 'veterinary-shop' ),
		'panel'    => 'veterinary_shop_theme_options_panel',
		'priority'       => 160,
	) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'veterinary_shop_footer_social_icon_hide_heading',
		'section'     => 'veterinary_shop_footer_social_media_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable or Disable your Footer Social Icon', 'veterinary-shop' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'veterinary_shop_footer_social_icon_hide',
		'label'       => esc_html__( 'Enable or Disable Social Icon.', 'veterinary-shop' ),
		'section'     => 'veterinary_shop_footer_social_media_section',
		'default'     => false,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'veterinary_shop_enable_footer_socail_link_align_heading',
		'section'     => 'veterinary_shop_footer_social_media_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Social Media Text Align', 'veterinary-shop' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'veterinary_shop_enable_footer_socail_link_align',
		'type'        => 'select',
		'priority'    => 10,
		'label'       => __( 'Text Align', 'veterinary-shop' ),
		'section'     => 'veterinary_shop_footer_social_media_section',
		'default'     => 'left',
		'choices'     => [
			'center' => esc_html__( 'center', 'veterinary-shop' ),
			'right' => esc_html__( 'right', 'veterinary-shop' ),
			'left' => esc_html__( 'left', 'veterinary-shop' ),
		],
		'output' => array(
			array(
				'element'  => array( '.footer-links'),
				'property' => 'text-align',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'priority'    => 10,
		'settings'    => 'veterinary_shop_enable_footer_socail_link',
		'section'     => 'veterinary_shop_footer_social_media_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Social Media Link', 'veterinary-shop' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'priority'    => 10,
		'section'     => 'veterinary_shop_footer_social_media_section',
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Footer Social Icons', 'veterinary-shop' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'veterinary-shop' ),
		'settings'     => 'veterinary_shop_social_links_settings_footer',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'veterinary-shop' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'veterinary-shop' ). ' <a href="https://fontawesome.com/search?o=r&m=free&f=brands" target="_blank"><strong>' . esc_html__( 'View All', 'veterinary-shop' ) . ' </strong></a>',
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'veterinary-shop' ),
				'description' => esc_html__( 'Add the social icon url here.', 'veterinary-shop' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 20
		],
	] );

	load_template( trailingslashit( get_template_directory() ) . '/includes/logo/logo-resizer.php' );
}
