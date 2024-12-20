<?php
function shopcozi_customizer_general( $wp_customize ){
	
	$option = shopcozi_default_options();

	$default_sidebars = function_exists('shopcozi_get_list_sidebars')? shopcozi_get_list_sidebars(): array();
	$sidebar_options = array('0' => esc_html__('Default', 'shopcozi'));
	foreach( $default_sidebars as $key => $_sidebar ){
		$sidebar_options[$_sidebar['id']] = $_sidebar['name'];
	}

	// General Panel
	$wp_customize->add_panel( 'shopcozi_general',
		array(
			'priority'       => 31,
			'capability'     => 'edit_theme_options',
			'title'          => esc_html__('Shopcozi Global','shopcozi'),
		)
	);

		// Header Breadcrumb
		$wp_customize->add_section( 'section_breadcrumb',
			array(
				'priority'    => 2,
				'title'       => esc_html__('Breadcrumbs','shopcozi'),
				'panel'       => 'shopcozi_general',
			)
		);

			// shopcozi_breadcrumb_show
			$wp_customize->add_setting('shopcozi_breadcrumb_show',
					array(
						'sanitize_callback' => 'shopcozi_sanitize_checkbox',
						'default'           => $option['shopcozi_breadcrumb_show'],
						'priority'          => 1,
					)
				);
			$wp_customize->add_control('shopcozi_breadcrumb_show',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide/Show breadcrumb section?', 'shopcozi'),
					'section'     => 'section_breadcrumb',
				)
			);

			// shopcozi_breadcrumb_title_show
			$wp_customize->add_setting('shopcozi_breadcrumb_title_show',
					array(
						'sanitize_callback' => 'shopcozi_sanitize_checkbox',
						'default'           => $option['shopcozi_breadcrumb_title_show'],
						'priority'          => 2,
					)
				);
			$wp_customize->add_control('shopcozi_breadcrumb_title_show',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide/Show breadcrumb title?', 'shopcozi'),
					'section'     => 'section_breadcrumb',
				)
			);

			// shopcozi_breadcrumb_path_show
			$wp_customize->add_setting('shopcozi_breadcrumb_path_show',
					array(
						'sanitize_callback' => 'shopcozi_sanitize_checkbox',
						'default'           => $option['shopcozi_breadcrumb_path_show'],
						'priority'          => 3,
					)
				);
			$wp_customize->add_control('shopcozi_breadcrumb_path_show',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide/Show breadcrumb page path?', 'shopcozi'),
					'section'     => 'section_breadcrumb',
				)
			);

			// shopcozi_breadcrumb_bg_color
			$wp_customize->add_setting('shopcozi_breadcrumb_bg_color', 
				array(
				'default'    => $option['shopcozi_breadcrumb_bg_color'],
				'sanitize_callback' => 'sanitize_text_field',
				'priority'          => 3,
				)
			);
			$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'shopcozi_breadcrumb_bg_color', 
				array(
				'label' => __('Background Color','shopcozi'),
				'section' => 'section_breadcrumb',
				'settings'=>'shopcozi_breadcrumb_bg_color'
			) ) );

		// BackTotop Button
		$wp_customize->add_section( 'section_backtotop',
			array(
				'priority'    => 3,
				'title'       => esc_html__('Back To Top','shopcozi'),
				'panel'       => 'shopcozi_general',
			)
		);

			// shopcozi_backTotop_show
			$wp_customize->add_setting('shopcozi_backTotop_show',
					array(
						'sanitize_callback' => 'shopcozi_sanitize_checkbox',
						'default'           => $option['shopcozi_backTotop_show'],
						'priority'          => 1,
					)
				);
			$wp_customize->add_control('shopcozi_backTotop_show',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide/Show back to top button?', 'shopcozi'),
					'section'     => 'section_backtotop',
				)
			);

		// Archive Blog
		$wp_customize->add_section( 'section_archive_blog',
			array(
				'priority'    => 4,
				'title'       => esc_html__('Blog','shopcozi'),
				'panel'       => 'shopcozi_general',
			)
		);

			// shopcozi_archive_blog_layout
			$wp_customize->add_setting('shopcozi_archive_blog_layout',
					array(
						'sanitize_callback' => 'shopcozi_sanitize_select',
						'default'           => $option['shopcozi_archive_blog_layout'],
						'priority'          => 2,
					)
				);
			$wp_customize->add_control('shopcozi_archive_blog_layout',
				array(
					'type'        => 'select',
					'label'       => esc_html__('Blog Layout', 'shopcozi'),
					'section'     => 'section_archive_blog',
					'choices'     => array(
						'0-1-1' => __('Blog Right Sidebar','shopcozi'),
						'1-1-0' => __('Blog Left Sidebar','shopcozi'),
						'0-1-0' => __('Blog No Sidebar','shopcozi'),
					),
				)
			);

		// Page
		$wp_customize->add_section( 'section_page',
			array(
				'priority'    => 4,
				'title'       => esc_html__('Page','shopcozi'),
				'panel'       => 'shopcozi_general',
			)
		);

			// shopcozi_page_layout
			$wp_customize->add_setting('shopcozi_page_layout',
					array(
						'sanitize_callback' => 'shopcozi_sanitize_select',
						'default'           => $option['shopcozi_page_layout'],
						'priority'          => 2,
					)
				);
			$wp_customize->add_control('shopcozi_page_layout',
				array(
					'type'        => 'select',
					'label'       => esc_html__('Page Layout', 'shopcozi'),
					'section'     => 'section_page',
					'choices'     => array(
						'0-1-1' => __('Page Right Sidebar','shopcozi'),
						'1-1-0' => __('Page Left Sidebar','shopcozi'),
						'0-1-0' => __('Page No Sidebar','shopcozi'),
					),
				)
			);

		// Woocomerce
		$wp_customize->add_section( 'section_product_loop',
			array(
				'priority'    => 5,
				'title'       => esc_html__('Products Loop','shopcozi'),
				'panel'       => 'shopcozi_general',
			)
		);

			// shopcozi_woo_layout
			$wp_customize->add_setting('shopcozi_woo_layout',
					array(
						'sanitize_callback' => 'shopcozi_sanitize_select',
						'default'           => $option['shopcozi_woo_layout'],
						'priority'          => 2,
					)
				);
			$wp_customize->add_control('shopcozi_woo_layout',
				array(
					'type'        => 'select',
					'label'       => esc_html__('Shop Page Layout', 'shopcozi'),
					'section'     => 'section_product_loop',
					'choices'     => array(
						'0-1-1' => __('Shop Right Sidebar','shopcozi'),
						'1-1-0' => __('Shop Left Sidebar','shopcozi'),
						'0-1-0' => __('Shop No Sidebar','shopcozi'),
					),
				)
			);

		// Woocomerce Product
		$wp_customize->add_section( 'section_product_detail',
			array(
				'priority'    => 6,
				'title'       => esc_html__('Product Details','shopcozi'),
				'panel'       => 'shopcozi_general',
			)
		);

			// shopcozi_prod_layout
			$wp_customize->add_setting('shopcozi_prod_layout',
					array(
						'sanitize_callback' => 'shopcozi_sanitize_select',
						'default'           => $option['shopcozi_prod_layout'],
						'priority'          => 2,
					)
				);
			$wp_customize->add_control('shopcozi_prod_layout',
				array(
					'type'        => 'select',
					'label'       => esc_html__('Product Page Layout', 'shopcozi'),
					'section'     => 'section_product_detail',
					'choices'     => array(
						'0-1-1' => __('Product Right Sidebar','shopcozi'),
						'1-1-0' => __('Product Left Sidebar','shopcozi'),
						'0-1-0' => __('Product No Sidebar','shopcozi'),
					),
				)
			);
}
add_action('customize_register','shopcozi_customizer_general');