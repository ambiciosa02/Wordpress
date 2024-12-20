<?php

if ( class_exists("Kirki")){

	// LOGO

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'interior_decor_consultation_logo_resizer',
		'label'       => esc_html__( 'Adjust Your Logo Size ', 'interior-decor-consultation' ),
		'section'     => 'title_tagline',
		'default'     => 70,
		'choices'     => [
			'min'  => 10,
			'max'  => 300,
			'step' => 10,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'interior_decor_consultation_enable_logo_text',
		'section'     => 'title_tagline',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'interior-decor-consultation' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'interior_decor_consultation_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'interior-decor-consultation' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'interior-decor-consultation' ),
			'off' => esc_html__( 'Disable', 'interior-decor-consultation' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'interior_decor_consultation_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'interior-decor-consultation' ),
		'section'     => 'title_tagline',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'interior-decor-consultation' ),
			'off' => esc_html__( 'Disable', 'interior-decor-consultation' ),
		],
	] );

	// FONT STYLE TYPOGRAPHY

	Kirki::add_panel( 'interior_decor_consultation_panel_id_1', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Typography', 'interior-decor-consultation' ),
	) );

	Kirki::add_section( 'interior_decor_consultation_font_style_section', array(
		'title'      => esc_html__( 'Typography Option',  'interior-decor-consultation' ),
		'panel'          => 'interior_decor_consultation_panel_id_1',
		'priority'   => 2,
		'capability' => 'edit_theme_options',
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'interior_decor_consultation_all_headings_typography',
		'section'     => 'interior_decor_consultation_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading Of All Sections',  'interior-decor-consultation' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'interior_decor_consultation_all_headings_typography',
		'label'       => esc_html__( 'Heading Typography',  'interior-decor-consultation' ),
		'description' => esc_html__( 'Select the typography options for your heading.',  'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'h1','h2','h3','h4','h5','h6', ),
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'interior_decor_consultation_body_content_typography',
		'section'     => 'interior_decor_consultation_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Body Content',  'interior-decor-consultation' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'interior_decor_consultation_body_content_typography',
		'label'       => esc_html__( 'Content Typography',  'interior-decor-consultation' ),
		'description' => esc_html__( 'Select the typography options for your content.',  'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'body', ),
			),
		),
	) );

	// PANEL
	Kirki::add_panel( 'interior_decor_consultation_panel_id_5', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Animations', 'interior-decor-consultation' ),
	) );

	// ANIMATION SECTION
	Kirki::add_section( 'interior_decor_consultation_section_animation', array(
	    'title'          => esc_html__( 'Animations', 'interior-decor-consultation' ),
	    'panel'          => 'interior_decor_consultation_panel_id_5',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'interior_decor_consultation_animation_enabled',
		'label'       => esc_html__( 'Turn On To Show Animation', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_section_animation',
		'default'     => true,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'interior-decor-consultation' ),
			'off' => esc_html__( 'Disable', 'interior-decor-consultation' ),
		],
	] );

	// PANEL
	Kirki::add_panel( 'interior_decor_consultation_panel_id_2', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Dark Mode', 'interior-decor-consultation' ),
	) );

	// COLOR SECTION
	Kirki::add_section( 'interior_decor_consultation_section_dark_mode', array(
	    'title'          => esc_html__( 'Dark Mode', 'interior-decor-consultation' ),
	    'panel'          => 'interior_decor_consultation_panel_id_2',
	    'priority'       => 160,
	) );

	// CUSTOM HEADER FIELD
	Kirki::add_field( 'theme_config_id', [
	    'type'        => 'custom',
	    'settings'    => 'interior_decor_consultation_dark_colors',
	    'section'     => 'interior_decor_consultation_section_dark_mode',
	    'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Dark Appearance', 'interior-decor-consultation' ) . '</h3>',
	    'priority'    => 10,
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'interior_decor_consultation_is_dark_mode_enabled',
		'label'       => esc_html__( 'Turn To Dark Mode', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_section_dark_mode',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'interior-decor-consultation' ),
			'off' => esc_html__( 'Disable', 'interior-decor-consultation' ),
		],
	] );

	// PANEL

	Kirki::add_panel( 'interior_decor_consultation_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Options', 'interior-decor-consultation' ),
	) );

	// COLOR SECTION

	Kirki::add_section( 'interior_decor_consultation_section_color', array(
	    'title'          => esc_html__( 'Global Color', 'interior-decor-consultation' ),
	    'panel'          => 'interior_decor_consultation_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'interior_decor_consultation_global_colors',
		'section'     => 'interior_decor_consultation_section_color',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Here you can change your theme color on one click.', 'interior-decor-consultation' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'interior_decor_consultation_global_color',
		'label'       => __( 'choose your Appropriate Color', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_section_color',
		'default'     => '#CD9967',
	] );

	// Additional Settings

	Kirki::add_section( 'interior_decor_consultation_additional_settings', array(
	    'title'          => esc_html__( 'Additional Settings', 'interior-decor-consultation' ),
	    'panel'          => 'interior_decor_consultation_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'interior_decor_consultation_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_additional_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	new \Kirki\Field\Radio_Buttonset(
	[
		'settings'    => 'interior_decor_consultation_scroll_top_position',
		'label'       => esc_html__( 'Alignment for Scroll To Top', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_additional_settings',
		'default'     => 'Right',
		'priority'    => 10,
		'choices'     => [
			'Left'   => esc_html__( 'Left', 'interior-decor-consultation' ),
			'Center' => esc_html__( 'Center', 'interior-decor-consultation' ),
			'Right'  => esc_html__( 'Right', 'interior-decor-consultation' ),
		],
	]
	);

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'dashicons',
		'settings' => 'interior_decor_consultation_scroll_top_icon',
		'label'    => esc_html__( 'Select Appropriate Scroll Top Icon', 'interior-decor-consultation' ),
		'section'  => 'interior_decor_consultation_additional_settings',
		'default'  => 'dashicons dashicons-arrow-up-alt',
		'priority' => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'interior_decor_consultation_menu_text_transform',
		'label'       => esc_html__( 'Menus Text Transform', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_additional_settings',
		'default'     => 'CAPITALISE',
		'placeholder' => esc_html__( 'Choose an option', 'interior-decor-consultation' ),
		'choices'     => [
			'CAPITALISE' => esc_html__( 'CAPITALISE', 'interior-decor-consultation' ),
			'UPPERCASE' => esc_html__( 'UPPERCASE', 'interior-decor-consultation' ),
			'LOWERCASE' => esc_html__( 'LOWERCASE', 'interior-decor-consultation' ),

		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'interior_decor_consultation_menu_zoom',
		'label'       => esc_html__( 'Menu Transition', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_additional_settings',
		'default' => 'Zoom Out',
		'placeholder' => esc_html__( 'Choose an option', 'interior-decor-consultation' ),
		'choices'     => [
			'Zoomout' => __('Zoom Out','interior-decor-consultation'),
            'Zoominn' => __('Zoom Inn','interior-decor-consultation'),
            
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'interior_decor_consultation_container_width',
		'label'       => esc_html__( 'Theme Container Width', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_additional_settings',
		'default'     => 100,
		'choices'     => [
			'min'  => 50,
			'max'  => 100,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'interior_decor_consultation_site_loader',
		'label'       => esc_html__( 'Here you can enable or disable your Site Loader.', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_additional_settings',
		'default'     => false,
		'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'interior_decor_consultation_preloader_type',
		'label'       => esc_html__( 'Preloader Type', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_additional_settings',
		'default' => 'four-way-loader',
		'placeholder' => esc_html__( 'Choose an option', 'interior-decor-consultation' ),
		'choices'     => [
			'four-way-loader' => __('Type 1','interior-decor-consultation'),
            'cube-loader' => __('Type 2','interior-decor-consultation'),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'interior_decor_consultation_sticky_header',
		'label'       => esc_html__( 'Here you can enable or disable your Sticky Header.', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_additional_settings',
		'default'     => false,
		'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'interior_decor_consultation_page_layout',
		'label'       => esc_html__( 'Page Layout Setting', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_additional_settings',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'interior-decor-consultation' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','interior-decor-consultation'),
            'Right Sidebar' => __('Right Sidebar','interior-decor-consultation'),
            'One Column' => __('One Column','interior-decor-consultation')
		],
	] );

	if ( class_exists("woocommerce")){

	// Woocommerce Settings

	Kirki::add_section( 'interior_decor_consultation_woocommerce_settings', array(
			'title'          => esc_html__( 'Woocommerce Settings', 'interior-decor-consultation' ),
			'panel'          => 'interior_decor_consultation_panel_id',
			'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'interior_decor_consultation_shop_sidebar',
		'label'       => esc_html__( 'Here you can enable or disable shop page sidebar.', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'interior_decor_consultation_product_sidebar',
		'label'       => esc_html__( 'Here you can enable or disable product page sidebar.', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'interior_decor_consultation_related_product_setting',
		'label'       => esc_html__( 'Here you can enable or disable your related products.', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_woocommerce_settings',
		'default'     => true,
		'priority'    => 10,
	] );

	new \Kirki\Field\Number(
		[
			'settings' => 'interior_decor_consultation_per_columns',
			'label'    => esc_html__( 'Product Per Row', 'interior-decor-consultation' ),
			'section'  => 'interior_decor_consultation_woocommerce_settings',
			'default'  => 3,
			'choices'  => [
				'min'  => 1,
				'max'  => 4,
				'step' => 1,
			],
		]
	);

	new \Kirki\Field\Number(
		[
			'settings' => 'interior_decor_consultation_product_per_page',
			'label'    => esc_html__( 'Product Per Page', 'interior-decor-consultation' ),
			'section'  => 'interior_decor_consultation_woocommerce_settings',
			'default'  => 9,
			'choices'  => [
				'min'  => 1,
				'max'  => 15,
				'step' => 1,
			],
		]
	);

	new \Kirki\Field\Number(
	[
		'settings' => 'custom_related_products_number_per_row',
		'label'    => esc_html__( 'Related Product Per Column', 'interior-decor-consultation' ),
		'section'  => 'interior_decor_consultation_woocommerce_settings',
		'default'  => 3,
		'choices'  => [
			'min'  => 1,
			'max'  => 4,
			'step' => 1,
		],
	]
	);

	new \Kirki\Field\Number(
	[
		'settings' => 'custom_related_products_number',
		'label'    => esc_html__( 'Related Product Per Page', 'interior-decor-consultation' ),
		'section'  => 'interior_decor_consultation_woocommerce_settings',
		'default'  => 3,
		'choices'  => [
			'min'  => 1,
			'max'  => 10,
			'step' => 1,
		],
	]
	);

	new \Kirki\Field\Select(
	[
		'settings'    => 'interior_decor_consultation_shop_page_layout',
		'label'       => esc_html__( 'Shop Page Layout Setting', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_woocommerce_settings',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'interior-decor-consultation' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','interior-decor-consultation'),
            'Right Sidebar' => __('Right Sidebar','interior-decor-consultation')
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'interior_decor_consultation_product_page_layout',
		'label'       => esc_html__( 'Product Page Layout Setting', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_woocommerce_settings',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'interior-decor-consultation' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','interior-decor-consultation'),
            'Right Sidebar' => __('Right Sidebar','interior-decor-consultation')
		],
	] );

	new \Kirki\Field\Radio_Buttonset( [
		'settings'    => 'interior_decor_consultation_woocommerce_pagination_position',
		'label'       => esc_html__( 'Woocommerce Pagination Alignment', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_woocommerce_settings',
		'default'     => 'Center',
		'priority'    => 10,
		'choices'     => [
			'Left'   => esc_html__( 'Left', 'interior-decor-consultation' ),
			'Center' => esc_html__( 'Center', 'interior-decor-consultation' ),
			'Right'  => esc_html__( 'Right', 'interior-decor-consultation' ),
		],
	]
	);

}

	// POST SECTION

	Kirki::add_section( 'interior_decor_consultation_section_post', array(
	    'title'          => esc_html__( 'Post Settings', 'interior-decor-consultation' ),
	    'panel'          => 'interior_decor_consultation_panel_id',
	    'priority'       => 160,
	) );

	new \Kirki\Field\Sortable(
	[
		'settings' => 'interior_decor_consultation_archive_element_sortable',
		'label'    => __( 'Archive Post Page element Reordering', 'interior-decor-consultation' ),
		'section'  => 'interior_decor_consultation_section_post',
		'default'  => [ 'option1', 'option2', 'option3' ],
		'choices'  => [
			'option1' => esc_html__( 'Post Meta', 'interior-decor-consultation' ),
			'option2' => esc_html__( 'Post Title', 'interior-decor-consultation' ),
			'option3' => esc_html__( 'Post Content', 'interior-decor-consultation' ),
		],
	]
	);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'interior_decor_consultation_post_excerpt_number',
		'label'       => esc_html__( 'Post Content Range', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_section_post',
		'default'     => 15,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'interior_decor_consultation_pagination_setting',
		'label'       => esc_html__( 'Here you can enable or disable your Pagination.', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_section_post',
		'default'     => true,
		'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'interior_decor_consultation_archive_sidebar_layout',
		'label'       => esc_html__( 'Archive Post Sidebar Layout Setting', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'interior-decor-consultation' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','interior-decor-consultation'),
            'Right Sidebar' => __('Right Sidebar','interior-decor-consultation'),
            'Three Column' => __('Three Column','interior-decor-consultation'),
            'Four Column' => __('Four Column','interior-decor-consultation'),
            'Grid Layout Without Sidebar' => __('Grid Layout Without Sidebar','interior-decor-consultation'),
            'Grid Layout With Right Sidebar' => __('Grid Layout With Right Sidebar','interior-decor-consultation'),
            'Grid Layout With Left Sidebar' => __('Grid Layout With Left Sidebar','interior-decor-consultation')
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'interior_decor_consultation_single_post_sidebar_layout',
		'label'       => esc_html__( 'Single Post Sidebar Layout Setting', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'interior-decor-consultation' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','interior-decor-consultation'),
            'Right Sidebar' => __('Right Sidebar','interior-decor-consultation'),
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'interior_decor_consultation_search_sidebar_layout',
		'label'       => esc_html__( 'Search Page Sidebar Layout Setting', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'interior-decor-consultation' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','interior-decor-consultation'),
            'Right Sidebar' => __('Right Sidebar','interior-decor-consultation'),
            'Three Column' => __('Three Column','interior-decor-consultation'),
            'Four Column' => __('Four Column','interior-decor-consultation'),
            'Grid Layout Without Sidebar' => __('Grid Layout Without Sidebar','interior-decor-consultation'),
            'Grid Layout With Right Sidebar' => __('Grid Layout With Right Sidebar','interior-decor-consultation'),
            'Grid Layout With Left Sidebar' => __('Grid Layout With Left Sidebar','interior-decor-consultation')
		],
	] );

	Kirki::add_field( 'interior_decor_consultation_config', [
		'type'        => 'select',
		'settings'    => 'interior_decor_consultation_post_column_count',
		'label'       => esc_html__( 'Grid Column for Archive Page', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_section_post',
		'default'    => '2',
		'choices' => [
				'1' => __( '1 Column', 'interior-decor-consultation' ),
				'2' => __( '2 Column', 'interior-decor-consultation' ),
			],
	] );

	// Breadcrumb
	Kirki::add_section( 'interior_decor_consultation_bradcrumb', array(
	    'title'          => esc_html__( 'Breadcrumb Settings', 'interior-decor-consultation' ),
	    'panel'          => 'interior_decor_consultation_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'interior_decor_consultation_enable_breadcrumb_heading',
		'section'     => 'interior_decor_consultation_bradcrumb',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Single Page Breadcrumb', 'interior-decor-consultation' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'interior_decor_consultation_breadcrumb_enable',
		'label'       => esc_html__( 'Breadcrumb Enable / Disable', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_bradcrumb',
		'default'     => true,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'interior-decor-consultation' ),
			'off' => esc_html__( 'Disable', 'interior-decor-consultation' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
        'type'     => 'text',
        'default'     => '/',
        'settings' => 'interior_decor_consultation_breadcrumb_separator' ,
        'label'    => esc_html__( 'Breadcrumb Separator',  'interior-decor-consultation' ),
        'section'  => 'interior_decor_consultation_bradcrumb',
    ] );

	// HEADER SECTION

	Kirki::add_section( 'interior_decor_consultation_header_section', array(
        'title'          => esc_html__( 'Header Settings', 'interior-decor-consultation' ),
        'panel'          => 'interior_decor_consultation_panel_id',
        'priority'       => 160,
    ) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'interior_decor_consultation_header_button_heading',
		'section'     => 'interior_decor_consultation_header_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Button',  'interior-decor-consultation' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
        'type'     => 'url',
        'settings' => 'interior_decor_consultation_header_button' ,
        'section'  => 'interior_decor_consultation_header_section',
    ] );

	// SLIDER SECTION

	Kirki::add_section( 'interior_decor_consultation_blog_slide_section', array(
        'title'          => esc_html__( 'Slider Settings', 'interior-decor-consultation' ),
        'panel'          => 'interior_decor_consultation_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'interior_decor_consultation_enable_heading',
		'section'     => 'interior_decor_consultation_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Slider', 'interior-decor-consultation' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'interior_decor_consultation_blog_box_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_blog_slide_section',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'interior-decor-consultation' ),
			'off' => esc_html__( 'Disable', 'interior-decor-consultation' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'interior_decor_consultation_slider_heading',
		'section'     => 'interior_decor_consultation_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Slider', 'interior-decor-consultation' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'interior_decor_consultation_blog_slide_number',
		'label'       => esc_html__( 'Number of slides to show', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_blog_slide_section',
		'default'     => 3,
		'choices'     => [
			'min'  => 0,
			'max'  => 3,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'settings'    => 'interior_decor_consultation_blog_slide_category',
		'label'       => esc_html__( 'Select the category to show slider ( Image Dimension 1600 x 600 )', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_blog_slide_section',
		'default'     => '',
		'placeholder' => esc_html__( 'Select an category...', 'interior-decor-consultation' ),
		'priority'    => 10,
		'choices'     => interior_decor_consultation_get_categories_select(),
	] );

	$count = get_theme_mod('interior_decor_consultation_blog_slide_number');

	for ($i=1; $i <= (int)$count; $i++) {

		Kirki::add_field( 'theme_config_id', [
			'type'        => 'custom',
			'settings'    => 'interior_decor_consultation_slider_enable_heading'.$i,
			'section'     => 'interior_decor_consultation_blog_slide_section',
				'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Slide Content ', 'interior-decor-consultation' ).$i . '</h3>',
		] );

		Kirki::add_field( 'theme_config_id', [
			'type'     => 'text',
			'settings' => 'interior_decor_consultation_slider_extra_text'.$i,
			'label'    => esc_html__( 'Slider Extra Text ', 'interior-decor-consultation' ).$i,
			'section'  => 'interior_decor_consultation_blog_slide_section',
	    ] );

		new \Kirki\Field\Image(
			[
				'settings'    => 'interior_decor_consultation_slider1_'.$i,
				'label'       => esc_html__( 'Upload Image ', 'interior-decor-consultation' ).$i,
				'section'     => 'interior_decor_consultation_blog_slide_section',
				'default'     => '',
			]
		);

		new \Kirki\Field\Image(
			[
				'settings'    => 'interior_decor_consultation_slider2_'.$i,
				'label'       => esc_html__( 'Upload Image ', 'interior-decor-consultation' ).$i,
				'section'     => 'interior_decor_consultation_blog_slide_section',
				'default'     => '',
			]
		);

	}

	//PROJECTS SECTION

	Kirki::add_section( 'interior_decor_consultation_project_section', array(
	    'title'          => esc_html__( 'Our Project Settings', 'interior-decor-consultation' ),
	    'panel'          => 'interior_decor_consultation_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'interior_decor_consultation_enable_heading',
		'section'     => 'interior_decor_consultation_project_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Our Project',  'interior-decor-consultation' ) . '</h3>',
		'priority'    => 1,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'interior_decor_consultation_projects_section_enable',
		'label'       => esc_html__( 'Section Enable / Disable',  'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_project_section',
		'default'     => false,
		'priority'    => 2,
		'choices'     => [
			'on'  => esc_html__( 'Enable',  'interior-decor-consultation' ),
			'off' => esc_html__( 'Disable',  'interior-decor-consultation' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'interior_decor_consultation_projects_text_heading',
		'section'     => 'interior_decor_consultation_project_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Project', 'interior-decor-consultation' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'       => esc_html__( 'Heading', 'interior-decor-consultation' ),
		'settings' => 'interior_decor_consultation_projects_heading',
		'section'  => 'interior_decor_consultation_project_section',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'interior_decor_consultation_projects_number',
		'label'       => esc_html__( 'Number of tabs to show', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_project_section',
		'default'     => '',
		'choices'     => [
			'min'  => 0,
			'max'  => 8,
			'step' => 1,
		],
	] );

	$featured_post = get_theme_mod('interior_decor_consultation_projects_number','');
    	for ( $j = 1; $j <= $featured_post; $j++ ) :

    	Kirki::add_field( 'theme_config_id', [
	        'type'        => 'text',
	        'settings'    => 'interior_decor_consultation_projects_text' .$j,
	        'label'       => esc_html__( 'Tab Text ', 'interior-decor-consultation' ).$j,
	        'section'     => 'interior_decor_consultation_project_section',
	        'default'     => '',
	    ] );

		Kirki::add_field( 'theme_config_id', [
			'type'        => 'select',
			'settings'    => 'interior_decor_consultation_projects_category'.$j,
			'label'       => esc_html__( 'Select the category to show project ', 'interior-decor-consultation' ).$j,
			'section'     => 'interior_decor_consultation_project_section',
			'default'     => '',
			'placeholder' => esc_html__( 'Select an category...', 'interior-decor-consultation' ),
			'priority'    => 10,
			'choices'     => interior_decor_consultation_get_categories_select(),
		] );

	endfor;

	// FOOTER SECTION

	Kirki::add_section( 'interior_decor_consultation_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'interior-decor-consultation' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'interior-decor-consultation' ),
        'panel'          => 'interior_decor_consultation_panel_id',
        'priority'       => 160,
    ) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'interior_decor_consultation_footer_enable_heading',
		'section'     => 'interior_decor_consultation_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'interior-decor-consultation' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'interior_decor_consultation_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'interior-decor-consultation' ),
			'off' => esc_html__( 'Disable', 'interior-decor-consultation' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'interior_decor_consultation_footer_text_heading',
		'section'     => 'interior_decor_consultation_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'interior-decor-consultation' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'interior_decor_consultation_footer_text',
		'section'  => 'interior_decor_consultation_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
	'type'        => 'custom',
	'settings'    => 'interior_decor_consultation_footer_text_heading_2',
	'section'     => 'interior_decor_consultation_footer_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Alignment', 'interior-decor-consultation' ) . '</h3>',
	'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'interior_decor_consultation_copyright_text_alignment',
		'label'       => esc_html__( 'Copyright text Alignment', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_footer_section',
		'default'     => 'LEFT-ALIGN',
		'placeholder' => esc_html__( 'Choose an option', 'interior-decor-consultation' ),
		'choices'     => [
			'LEFT-ALIGN' => esc_html__( 'LEFT-ALIGN', 'interior-decor-consultation' ),
			'CENTER-ALIGN' => esc_html__( 'CENTER-ALIGN', 'interior-decor-consultation' ),
			'RIGHT-ALIGN' => esc_html__( 'RIGHT-ALIGN', 'interior-decor-consultation' ),

		],
	] );

	Kirki::add_field( 'theme_config_id', [
	'type'        => 'custom',
	'settings'    => 'interior_decor_consultation_footer_text_heading_1',
	'section'     => 'interior_decor_consultation_footer_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Background Color', 'interior-decor-consultation' ) . '</h3>',
	'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'interior_decor_consultation_copyright_bg',
		'label'       => __( 'Choose Your Copyright Background Color', 'interior-decor-consultation' ),
		'section'     => 'interior_decor_consultation_footer_section',
		'default'     => '',
	] );
}