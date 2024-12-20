<?php

function shoppy_customizer_header( $wp_customize ){

	$option = shopcozi_default_options();

	// shopcozi_nav_content_show
	$wp_customize->add_setting('shopcozi_nav_content_show',
			array(
				'sanitize_callback' => 'shopcozi_sanitize_checkbox',
				'default'           => $option['shopcozi_nav_content_show'],
				'priority'          => 10,
			)
		);
	$wp_customize->add_control('shopcozi_nav_content_show',
		array(
			'type'        => 'checkbox',
			'label'       => esc_html__('Hide/Show navigation info?','shoppy'),
			'section'     => 'header_navigation',
		)
	);

	// shopcozi_nav_content
	$wp_customize->add_setting('shopcozi_nav_content',array(
		'sanitize_callback' => 'shopcozi_sanitize_repeatable_data_field',
		'transport' => 'refresh', // refresh or postMessage
		'priority'  => 11,
		'default' => $option['shopcozi_nav_content'],
	) );

	$wp_customize->add_control(new Shopcozi_Repeatable_Control($wp_customize,'shopcozi_nav_content',
			array(
				'label'         => esc_html__('Info','shoppy'),
				'section'       => 'header_navigation',
				'live_title_id' => 'title', // apply for unput text and textarea only
				'title_format'  => esc_html__('[live_title]','shoppy'), // [live_title]
				'max_item'      => 20,
				'limited_msg' 	=> shopcozi_upgrade_pro_msg(),
				'fields'    => array(
					'icon_type'  => array(
						'title' => esc_html__('Custom icon','shoppy'),
						'type'  =>'select',
						'options' => array(
							'icon' => esc_html__('Icon', 'shoppy'),
							//'image' => esc_html__('image','shoppy'),
						),
					),
					'icon'  => array(
						'title' => esc_html__('Icon','shoppy'),
						'type'  =>'icon',
						'required' => array('icon_type','=','icon'),
					),
					'title' => array(
						'title' => esc_html__('Title','shoppy'),
						'type'  =>'text',
						'desc'  => '',
					),
					'text' => array(
						'title' => esc_html__('Text','shoppy'),
						'type'  =>'text',
						'desc'  => '',
					),
				),
			)
		)
	);

}
add_action('customize_register','shoppy_customizer_header', 999);