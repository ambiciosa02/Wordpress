<?php
function shopcozi_customizer_blog_settings( $wp_customize ){

	$option = shopcozi_default_options();

		// Blog Section
		$wp_customize->add_section( 'section_news',
			array(
				'priority'    => 40,
				'title'       => esc_html__('Section Blog','shopcozi'),
				'panel'       => 'shopcozi_homepage',
			)
		);

			// shopcozi_news_show
			$wp_customize->add_setting('shopcozi_news_show',
					array(
						'sanitize_callback' => 'shopcozi_sanitize_checkbox',
						'default'           => $option['shopcozi_news_show'],
						'priority'          => 1,
					)
				);
			$wp_customize->add_control('shopcozi_news_show',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide/Show this section?', 'shopcozi'),
					'section'     => 'section_news',
				)
			);

			// shopcozi_news_title
			$wp_customize->add_setting('shopcozi_news_title',
					array(
						'sanitize_callback' => 'wp_kses_post',
						'default'           => $option['shopcozi_news_title'],
						'priority'          => 2,
					)
				);
			$wp_customize->add_control('shopcozi_news_title',
				array(
					'type'        => 'text',
					'label'       => esc_html__('Title', 'shopcozi'),
					'section'     => 'section_news',
				)
			);

			// shopcozi_news_category
			$wp_customize->add_setting('shopcozi_news_category',
					array(
						'sanitize_callback' => 'shopcozi_sanitize_array',
						'default'           => $option['shopcozi_news_category'],
						'transport'         => 'refresh',
						'priority'          => 5,
					)
				);
			$wp_customize->add_control(new Shopcozi_Multiselect_Control($wp_customize,'shopcozi_news_category',
				array(
					'label'       => esc_html__('Select Categories', 'shopcozi'),
					'section'     => 'section_news',
					'description' => '',
					'input_attrs' => array(
						'placeholder' => __( 'Please select a cate...', 'shopcozi' ),
						'multiselect' => true,
					),
					'choices' => shopcozi_categories(),
				)
			) );

			// shopcozi_news_posts_per_page
			$wp_customize->add_setting('shopcozi_news_posts_per_page',
					array(
						'sanitize_callback' => 'shopcozi_sanitize_range_value',
						'priority'          => 3,
						'transport'         => 'postMessage',
					)
				);
			$wp_customize->add_control(new Shopcozi_Range_Control($wp_customize,'shopcozi_news_posts_per_page',
				array(
					'label' 		=> esc_html__('No. of posts to show', 'shopcozi'),
					'section' 		=> 'section_news',
					'type'          => 'range-value',
					'media_query'   => false,
                    'input_attr' => array(
                        'mobile' => array(
                            'min' => 1,
                            'max' => 50,
                            'step' => 1,
                            'default_value' => $option['shopcozi_news_posts_per_page'],
                        ),
                        'tablet' => array(
                            'min' => 1,
                            'max' => 10,
                            'step' => 1,
                            'default_value' => $option['shopcozi_news_posts_per_page'],
                        ),
                        'desktop' => array(
                            'min' => 1,
                            'max' => 50,
                            'step' => 1,
                            'default_value' => $option['shopcozi_news_posts_per_page'],
                        ),
                    ),
				)
			) );
}
add_action('customize_register','shopcozi_customizer_blog_settings');