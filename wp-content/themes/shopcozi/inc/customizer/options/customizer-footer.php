<?php
function shopcozi_customizer_footer( $wp_customize ){

	$option = shopcozi_default_options();

	// Shopcozi Footer Panel
	$wp_customize->add_panel( 'shopcozi_footer',
		array(
			'priority'       => 32,
			'capability'     => 'edit_theme_options',
			'title'          => esc_html__('Shopcozi Footer','shopcozi'),
		)
	);

		// Footer Middle Section
		$wp_customize->add_section( 'footer_middle',
			array(
				'priority'    => 2,
				'title'       => esc_html__('Footer Widget','shopcozi'),
				'panel'       => 'shopcozi_footer',
			)
		);

			// shopcozi_footer_middle_columns
			$wp_customize->add_setting('shopcozi_footer_middle_columns',
					array(
						'sanitize_callback' => 'shopcozi_sanitize_select',
						'default'           => $option['shopcozi_footer_middle_columns'],
						'priority'          => 1,
					)
				);
			$wp_customize->add_control('shopcozi_footer_middle_columns',
				array(
					'type'        => 'select',
					'label'       => esc_html__('Widgets Column Layout', 'shopcozi'),
					'section'     => 'footer_middle',
					'choices' => array(
						'4' => 4,
						'3' => 3,
						'2' => 2,
						'1' => 1,
						'0' => esc_html__('Disable footer widgets', 'shopcozi'),
					),
				)
			);

			for ( $i = 1; $i<=4; $i ++ ) {
				$df = 12;
				if ( $i > 1 ) {
					$_n = 12/$i;
					$df = array();
					for ( $j = 0; $j < $i; $j++ ) {
						$df[ $j ] = $_n;
					}
					$df = join( '+', $df );
				}
				$wp_customize->add_setting('footer_custom_'.$i.'_columns',
					array(
						'sanitize_callback' => 'sanitize_text_field',
						'default' => $df,
						'transport' => 'postMessage',
					)
				);
				$wp_customize->add_control('footer_custom_'.$i.'_columns',
					array(
						'label' => $i == 1 ? __('Custom footer 1 column width', 'shopcozi') : sprintf( __('Custom footer %s columns width', 'shopcozi'), $i ),
						'section' => 'footer_middle',
						'description' => esc_html__('Enter int numbers and sum of them must smaller or equal 12, separated by "+"', 'shopcozi'),
					)
				);
			}

		// Footer Copyright Section
		$wp_customize->add_section( 'footer_copyright',
			array(
				'priority'    => 4,
				'title'       => esc_html__('Footer Copyright','shopcozi'),
				'panel'       => 'shopcozi_footer',
			)
		);

			// shopcozi_footer_copyright_show
			$wp_customize->add_setting('shopcozi_footer_copyright_show',
					array(
						'sanitize_callback' => 'shopcozi_sanitize_checkbox',
						'default'           => $option['shopcozi_footer_copyright_show'],
						'priority'          => 1,
					)
				);
			$wp_customize->add_control('shopcozi_footer_copyright_show',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide/Show copyright footer?', 'shopcozi'),
					'section'     => 'footer_copyright',
				)
			);

			// shopcozi_footer_copyright
			$wp_customize->add_setting('shopcozi_footer_copyright',
					array(
						'sanitize_callback' => 'wp_kses_post',
						'default'           => $option['shopcozi_footer_copyright'],
						'priority'          => 2,
					)
				);
			$wp_customize->add_control('shopcozi_footer_copyright',
				array(
					'type'        => 'textarea',
					'label'       => esc_html__('Copyright Text', 'shopcozi'),
					'description' => __('<code>%current_year%</code> to update the year automatically.<br/><code>%copy%</code> to include the copyright symbol.<br/>HTML is allowed.', 'shopcozi'),
					'section'     => 'footer_copyright',
				)
			);

		// Footer Background Settings
		$wp_customize->add_section( 'footer_background',
			array(
				'priority'    => 5,
				'title'       => esc_html__('Footer Background','shopcozi'),
				'panel'       => 'shopcozi_footer',
			)
		);

			// shopcozi_footer_bg_color
			$wp_customize->add_setting('shopcozi_footer_bg_color',
					array(
						'sanitize_callback' => 'shopcozi_sanitize_color_alpha',
						'default'           => $option['shopcozi_footer_bg_color'],
						'priority'          => 1,
					)
				);
			$wp_customize->add_control(new Shopcozi_Alpha_Color_Control($wp_customize,'shopcozi_footer_bg_color',
				array(
					'label' 		=> esc_html__('Background Color', 'shopcozi'),
					'section' 		=> 'footer_background',
				)
			) );
}
add_action('customize_register','shopcozi_customizer_footer');