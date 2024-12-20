<?php
function shopcozi_customizer_p_recent_settings( $wp_customize ){

	$option = shopcozi_default_options();

		// Product Section
		$wp_customize->add_section( 'section_p_recent',
			array(
				'priority'    => 7,
				'title'       => esc_html__('Section Latest Product','shopcozi'),
				'panel'       => 'shopcozi_homepage',
			)
		);

			// shopcozi_p_recent_show
			$wp_customize->add_setting('shopcozi_p_recent_show',
					array(
						'sanitize_callback' => 'shopcozi_sanitize_checkbox',
						'default'           => $option['shopcozi_p_recent_show'],
						'priority'          => 1,
					)
				);
			$wp_customize->add_control('shopcozi_p_recent_show',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide/Show this section?', 'shopcozi'),
					'section'     => 'section_p_recent',
				)
			);

			// shopcozi_p_recent_title
			$wp_customize->add_setting('shopcozi_p_recent_title',
					array(
						'sanitize_callback' => 'wp_kses_post',
						'default'           => $option['shopcozi_p_recent_title'],
						'priority'          => 2,
					)
				);
			$wp_customize->add_control('shopcozi_p_recent_title',
				array(
					'type'        => 'text',
					'label'       => esc_html__('Title', 'shopcozi'),
					'section'     => 'section_p_recent',
				)
			);

			// shopcozi_p_recent_category
			$wp_customize->add_setting('shopcozi_p_recent_category',
					array(
						'sanitize_callback' => 'shopcozi_sanitize_array',
						'default'           => $option['shopcozi_p_recent_category'],
						'transport'         => 'refresh',
						'priority'          => 7,
					)
				);
			$wp_customize->add_control(new Shopcozi_Multiselect_Control($wp_customize,'shopcozi_p_recent_category',
				array(
					'label'       => esc_html__('Select Categories', 'shopcozi'),
					'section'     => 'section_p_recent',
					'description' => '',
					'input_attrs' => array(
						'placeholder' => __( 'Please select a cate...', 'shopcozi' ),
						'multiselect' => true,
					),
					'choices' => shopcozi_product_categories(),
				)
			) );
}
add_action('customize_register','shopcozi_customizer_p_recent_settings');