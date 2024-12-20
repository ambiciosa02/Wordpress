<?php
function supermarket_shopping_post_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'supermarket_shopping_post', array(
			'priority' => 31,
			'title' => esc_html__( 'Post Option', 'supermarket-shopping' ),
		)
	);

	/*=========================================
	Archive Post  Section
	=========================================*/
	$wp_customize->add_section(
		'supermarket_shopping_archive_post_setting', array(
			'title' => esc_html__( 'Archive Post', 'supermarket-shopping' ),
			'priority' => 1,
			'panel' => 'supermarket_shopping_post',
		)
	);

	// Layouts Post
	$wp_customize->add_setting('supermarket_shopping_blog_layout_option_setting',array(
	'default' => 'Default',
	'sanitize_callback' => 'supermarket_shopping_sanitize_choices'
	));
	$wp_customize->add_control(new Supermarket_Shopping_Image_Radio_Control($wp_customize, 'supermarket_shopping_blog_layout_option_setting', array(
	'type' => 'select',
	'label' => __('Blog Post Layouts','supermarket-shopping'),
	'section' => 'supermarket_shopping_archive_post_setting',
	'choices' => array(
		'Default' => esc_url(get_template_directory_uri()).'/assets/images/layout-1.png',
		'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout-2.png',
		'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout-3.png',
	))));
		
	// Post Heading Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_post_heading_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
		'supermarket_shopping_post_heading_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Heading', 'supermarket-shopping' ),
			'section'     => 'supermarket_shopping_archive_post_setting',
			'settings'    => 'supermarket_shopping_post_heading_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Content Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_post_content_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_post_content_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Content', 'supermarket-shopping' ),
			'section'     => 'supermarket_shopping_archive_post_setting',
			'settings'    => 'supermarket_shopping_post_content_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Featured Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_post_featured_image_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_post_featured_image_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Feature Image', 'supermarket-shopping' ),
			'section'     => 'supermarket_shopping_archive_post_setting',
			'settings'    => 'supermarket_shopping_post_featured_image_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_post_date_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_post_date_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Date', 'supermarket-shopping' ),
			'section'     => 'supermarket_shopping_archive_post_setting',
			'settings'    => 'supermarket_shopping_post_date_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_post_comments_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_post_comments_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Comment', 'supermarket-shopping' ),
			'section'     => 'supermarket_shopping_archive_post_setting',
			'settings'    => 'supermarket_shopping_post_comments_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_post_author_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_post_author_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Author', 'supermarket-shopping' ),
			'section'     => 'supermarket_shopping_archive_post_setting',
			'settings'    => 'supermarket_shopping_post_author_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Tags Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_post_tags_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_post_tags_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Tags', 'supermarket-shopping' ),
			'section'     => 'supermarket_shopping_archive_post_setting',
			'settings'    => 'supermarket_shopping_post_tags_settings',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting( 'supermarket_shopping_upgrade_page_settings_1223',
	array(
		'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Supermarket_Shopping_Control_Upgrade(
		$wp_customize, 'supermarket_shopping_upgrade_page_settings_1223',
			array(
				'priority'      => 200,
				'section'       => 'supermarket_shopping_archive_post_setting',
				'settings'      => 'supermarket_shopping_upgrade_page_settings_1223',
				'label'         => __( 'Supermarket Shopping Pro comes with additional features.', 'supermarket-shopping' ),
				'choices'       => array( __( '12+ Sections', 'supermarket-shopping' ), __( 'One Click Demo Importer', 'supermarket-shopping' ), __( 'Section Reordering Facility', 'supermarket-shopping' ),__( 'Advance Typography', 'supermarket-shopping' ),__( 'Easy Customization', 'supermarket-shopping' ),__( '24x7 Support', 'supermarket-shopping' ), )
			)
		)
	); 

	/*=========================================
	Single Post  Section
	=========================================*/
	$wp_customize->add_section(
		'supermarket_shopping_single_post', array(
			'title' => esc_html__( 'Single Post', 'supermarket-shopping' ),
			'priority' => 3,
			'panel' => 'supermarket_shopping_post',
		)
	);
	
	// Post Heading Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_single_post_heading_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_single_post_heading_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Heading', 'supermarket-shopping' ),
			'section'     => 'supermarket_shopping_single_post',
			'settings'    => 'supermarket_shopping_single_post_heading_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Content Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_single_post_content_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_single_post_content_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Content', 'supermarket-shopping' ),
			'section'     => 'supermarket_shopping_single_post',
			'settings'    => 'supermarket_shopping_single_post_content_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Featured Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_single_post_featured_image_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_single_post_featured_image_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Feature Image', 'supermarket-shopping' ),
			'section'     => 'supermarket_shopping_single_post',
			'settings'    => 'supermarket_shopping_single_post_featured_image_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_single_post_date_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_single_post_date_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Date', 'supermarket-shopping' ),
			'section'     => 'supermarket_shopping_single_post',
			'settings'    => 'supermarket_shopping_single_post_date_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_single_post_comments_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_single_post_comments_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Comment', 'supermarket-shopping' ),
			'section'     => 'supermarket_shopping_single_post',
			'settings'    => 'supermarket_shopping_single_post_comments_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_single_post_author_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_single_post_author_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Author', 'supermarket-shopping' ),
			'section'     => 'supermarket_shopping_single_post',
			'settings'    => 'supermarket_shopping_single_post_author_settings',
			'type'        => 'checkbox'
		) 
	);
	// Post Tags Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_single_post_tags_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_single_post_tags_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Tags', 'supermarket-shopping' ),
			'section'     => 'supermarket_shopping_single_post',
			'settings'    => 'supermarket_shopping_single_post_tags_settings',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting( 'supermarket_shopping_upgrade_page_settings_144',
	array(
		'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Supermarket_Shopping_Control_Upgrade(
		$wp_customize, 'supermarket_shopping_upgrade_page_settings_144',
			array(
				'priority'      => 200,
				'section'       => 'supermarket_shopping_single_post',
				'settings'      => 'supermarket_shopping_upgrade_page_settings_144',
				'label'         => __( 'Supermarket Shopping Pro comes with additional features.', 'supermarket-shopping' ),
				'choices'       => array( __( '12+ Sections', 'supermarket-shopping' ), __( 'One Click Demo Importer', 'supermarket-shopping' ), __( 'Section Reordering Facility', 'supermarket-shopping' ),__( 'Advance Typography', 'supermarket-shopping' ),__( 'Easy Customization', 'supermarket-shopping' ),__( '24x7 Support', 'supermarket-shopping' ), )
			)
		)
	); 
}

add_action( 'customize_register', 'supermarket_shopping_post_setting' );