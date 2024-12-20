<?php
function shopcozi_customizer_header( $wp_customize ){

	$option = shopcozi_default_options();

	// Shopcozi Header Panel
	$wp_customize->add_panel( 'shopcozi_header',
		array(
			'priority'       => 30,
			'capability'     => 'edit_theme_options',
			'title'          => esc_html__('Shopcozi Header','shopcozi'),
		)
	);
		// Site identity
        $wp_customize->add_section('title_tagline',
            array(
                'priority'     => 1,
                'title'        => __('Site Identity','shopcozi'),
                'panel'        => 'shopcozi_header',
            )
        );

        	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

        	// shopcozi_h_logo_width
			$wp_customize->add_setting('shopcozi_h_logo_width',
					array(
						'sanitize_callback' => 'shopcozi_sanitize_range_value',
						'priority'          => 6,
						'transport'         => 'postMessage',
					)
				);
			$wp_customize->add_control(new Shopcozi_Range_Control($wp_customize,'shopcozi_h_logo_width',
				array(
					'label' 		=> esc_html__('Logo Width', 'shopcozi'),
					'section' 		=> 'title_tagline',
					'type'          => 'range-value',
					'media_query'   => true,
                    'input_attr' => array(
                        'mobile' => array(
                            'min' => 10,
                            'max' => 300,
                            'step' => 1,
                            'default_value' => $option['shopcozi_h_logo_width'],
                        ),
                        'tablet' => array(
                            'min' => 10,
                            'max' => 300,
                            'step' => 1,
                            'default_value' => $option['shopcozi_h_logo_width'],
                        ),
                        'desktop' => array(
                            'min' => 10,
                            'max' => 300,
                            'step' => 1,
                            'default_value' => $option['shopcozi_h_logo_width'],
                        ),
                    ),
				)
			) );

		// Header Navigation Section
		$wp_customize->add_section( 'header_navigation',
			array(
				'priority'    => 3,
				'title'       => esc_html__('Header Navigation','shopcozi'),
				'panel'       => 'shopcozi_header',
			)
		);

			// shopcozi_nav_account_icon_show
			$wp_customize->add_setting('shopcozi_nav_account_icon_show',
					array(
						'sanitize_callback' => 'shopcozi_sanitize_checkbox',
						'default'           => $option['shopcozi_nav_account_icon_show'],
						'priority'          => 1,
					)
				);
			$wp_customize->add_control('shopcozi_nav_account_icon_show',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide/Show account icon?','shopcozi'),
					'section'     => 'header_navigation',
				)
			);

			// shopcozi_nav_cart_icon_show
			$wp_customize->add_setting('shopcozi_nav_cart_icon_show',
					array(
						'sanitize_callback' => 'shopcozi_sanitize_checkbox',
						'default'           => $option['shopcozi_nav_cart_icon_show'],
						'priority'          => 6,
					)
				);
			$wp_customize->add_control('shopcozi_nav_cart_icon_show',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide/Show cart icon?','shopcozi'),
					'section'     => 'header_navigation',
				)
			);

			// shopcozi_nav_btn_label
			$wp_customize->add_setting('shopcozi_nav_btn_label',
					array(
						'sanitize_callback' => 'sanitize_text_field',
						'default'           => $option['shopcozi_nav_btn_label'],
						'priority'          => 7,
					)
				);
			$wp_customize->add_control('shopcozi_nav_btn_label',
				array(
					'type'        => 'text',
					'label'       => esc_html__('Buttton Label','shopcozi'),
					'section'     => 'header_navigation',
				)
			);

			// shopcozi_nav_btn_link
			$wp_customize->add_setting('shopcozi_nav_btn_link',
					array(
						'sanitize_callback' => 'sanitize_text_field',
						'default'           => $option['shopcozi_nav_btn_link'],
						'priority'          => 8,
					)
				);
			$wp_customize->add_control('shopcozi_nav_btn_link',
				array(
					'type'        => 'text',
					'label'       => esc_html__('Buttton Link','shopcozi'),
					'section'     => 'header_navigation',
				)
			);

			// shopcozi_nav_btn_target
			$wp_customize->add_setting('shopcozi_nav_btn_target',
					array(
						'sanitize_callback' => 'shopcozi_sanitize_checkbox',
						'default'           => $option['shopcozi_nav_btn_target'],
						'priority'          => 9,
					)
				);
			$wp_customize->add_control('shopcozi_nav_btn_target',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Button open in new tab?','shopcozi'),
					'section'     => 'header_navigation',
				)
			);

		if( class_exists('woocommerce') ){

		// Header Browse
		$wp_customize->add_section( 'header_browse',
			array(
				'priority'    => 4,
				'title'       => esc_html__('Header Browse','shopcozi'),
				'panel'       => 'shopcozi_header',
			)
		);

			// shopcozi_browse_cat_show
			$wp_customize->add_setting('shopcozi_browse_cat_show',
					array(
						'sanitize_callback' => 'shopcozi_sanitize_checkbox',
						'default'           => $option['shopcozi_browse_cat_show'],
						'priority'          => 1,
					)
				);
			$wp_customize->add_control('shopcozi_browse_cat_show',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide/Show browse category?','shopcozi'),
					'section'     => 'header_browse',
				)
			);

			// shopcozi_browse_cat_title
			$wp_customize->add_setting('shopcozi_browse_cat_title',
					array(
						'sanitize_callback' => 'sanitize_text_field',
						'default'           => $option['shopcozi_browse_cat_title'],
						'priority'          => 2,
					)
				);
			$wp_customize->add_control('shopcozi_browse_cat_title',
				array(
					'type'        => 'text',
					'label'       => esc_html__('Category title','shopcozi'),
					'section'     => 'header_browse',
				)
			);

			// shopcozi_browse_cat_more_title
			$wp_customize->add_setting('shopcozi_browse_cat_more_title',
					array(
						'sanitize_callback' => 'sanitize_text_field',
						'default'           => $option['shopcozi_browse_cat_more_title'],
						'priority'          => 3,
					)
				);
			$wp_customize->add_control('shopcozi_browse_cat_more_title',
				array(
					'type'        => 'text',
					'label'       => esc_html__('Load more title','shopcozi'),
					'section'     => 'header_browse',
				)
			);

			// shopcozi_browse_cat_nomore_title
			$wp_customize->add_setting('shopcozi_browse_cat_nomore_title',
					array(
						'sanitize_callback' => 'sanitize_text_field',
						'default'           => $option['shopcozi_browse_cat_nomore_title'],
						'priority'          => 3,
					)
				);
			$wp_customize->add_control('shopcozi_browse_cat_nomore_title',
				array(
					'type'        => 'text',
					'label'       => esc_html__('No more title','shopcozi'),
					'section'     => 'header_browse',
				)
			);

			// shopcozi_browse_form_show
			$wp_customize->add_setting('shopcozi_browse_form_show',
					array(
						'sanitize_callback' => 'shopcozi_sanitize_checkbox',
						'default'           => $option['shopcozi_browse_form_show'],
						'priority'          => 4,
					)
				);
			$wp_customize->add_control('shopcozi_browse_form_show',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide/Show search form?','shopcozi'),
					'section'     => 'header_browse',
				)
			);

			// shopcozi_browse_form_field
			$wp_customize->add_setting('shopcozi_browse_form_field',
					array(
						'sanitize_callback' => 'sanitize_text_field',
						'default'           => $option['shopcozi_browse_form_field'],
						'priority'          => 5,
					)
				);
			$wp_customize->add_control('shopcozi_browse_form_field',
				array(
					'type'        => 'text',
					'label'       => esc_html__('Search form field title','shopcozi'),
					'section'     => 'header_browse',
				)
			);

			// shopcozi_browse_form_dropdown
			$wp_customize->add_setting('shopcozi_browse_form_dropdown',
					array(
						'sanitize_callback' => 'sanitize_text_field',
						'default'           => $option['shopcozi_browse_form_dropdown'],
						'priority'          => 6,
					)
				);
			$wp_customize->add_control('shopcozi_browse_form_dropdown',
				array(
					'type'        => 'text',
					'label'       => esc_html__('Search form category title','shopcozi'),
					'section'     => 'header_browse',
				)
			);

		}

		// Header Sticky
		$wp_customize->add_section( 'header_sticky',
			array(
				'priority'    => 5,
				'title'       => esc_html__('Header Sticky','shopcozi'),
				'panel'       => 'shopcozi_header',
			)
		);

			// shopcozi_h_sticky_show
			$wp_customize->add_setting('shopcozi_h_sticky_show',
					array(
						'sanitize_callback' => 'shopcozi_sanitize_checkbox',
						'default'           => $option['shopcozi_h_sticky_show'],
						'priority'          => 1,
					)
				);
			$wp_customize->add_control('shopcozi_h_sticky_show',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide/Show sticky header?','shopcozi'),
					'section'     => 'header_sticky',
				)
			);
}
add_action('customize_register','shopcozi_customizer_header');