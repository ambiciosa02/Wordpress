<?php
function supermarket_shopping_blog_setting( $wp_customize ) {

$wp_customize->register_control_type( 'Supermarket_Shopping_Control_Upgrade' );

$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'supermarket_shopping_frontpage_sections', array(
			'priority' => 32,
			'title' => esc_html__( 'Frontpage Sections', 'supermarket-shopping' ),
		)
	);

	/*=========================================
	product cat 
	=========================================*/
	$wp_customize->add_section(
		'supermarket_shopping_top_product_category_section', array(
			'title' => esc_html__( 'Category Section', 'supermarket-shopping' ),
			'priority' => 12,
			'panel' => 'supermarket_shopping_frontpage_sections',
		)
	);

	// Slider Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_show_hide_category_section' , 
			array(
			'default' => true,
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	$wp_customize->add_control(
	'supermarket_shopping_show_hide_category_section', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'supermarket-shopping' ),
			'section'     => 'supermarket_shopping_top_product_category_section',
			'settings'    => 'supermarket_shopping_show_hide_category_section',
			'type'        => 'checkbox'
		)
	);

	$wp_customize->add_setting( 'supermarket_shopping_upgrade_page_settings_1110',
	array(
		'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Supermarket_Shopping_Control_Upgrade(
		$wp_customize, 'supermarket_shopping_upgrade_page_settings_1110',
			array(
				'priority'      => 200,
				'section'       => 'supermarket_shopping_top_product_category_section',
				'settings'      => 'supermarket_shopping_upgrade_page_settings_1110',
				'label'         => __( 'Supermarket Shopping Pro comes with additional features.', 'supermarket-shopping' ),
				'choices'       => array( __( '12+ Sections', 'supermarket-shopping' ), __( 'One Click Demo Importer', 'supermarket-shopping' ), __( 'Section Reordering Facility', 'supermarket-shopping' ),__( 'Advance Typography', 'supermarket-shopping' ),__( 'Easy Customization', 'supermarket-shopping' ),__( '24x7 Support', 'supermarket-shopping' ), )
			)
		)
	); 
	
	/*=========================================
	Slider Section
	=========================================*/
	$wp_customize->add_section(
		'supermarket_shopping_slider_section', array(
			'title' => esc_html__( 'Slider Section', 'supermarket-shopping' ),
			'priority' => 13,
			'panel' => 'supermarket_shopping_frontpage_sections',
		)
	);

	// Slider Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_slider_setting' , 
			array(
			'default' => true,
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_slider_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'supermarket-shopping' ),
			'section'     => 'supermarket_shopping_slider_section',
			'settings'    => 'supermarket_shopping_slider_setting',
			'type'        => 'checkbox'
		) 
	);
	
	for ( $supermarket_shopping_count = 1; $supermarket_shopping_count <= 4; $supermarket_shopping_count++ ) {

	// Add color scheme setting and control.
	$wp_customize->add_setting( 'supermarket_shopping_slider_page' . $supermarket_shopping_count, array(
		'default'           => get_page_id_by_slug('slider-page'),
		'sanitize_callback' => 'supermarket_shopping_sanitize_dropdown_pages'
	) );

	$wp_customize->add_control( 'supermarket_shopping_slider_page' . $supermarket_shopping_count, array(
		'label'    => __( 'Select Slide Image Page', 'supermarket-shopping' ),
		'section'  => 'supermarket_shopping_slider_section',
		'type'     => 'dropdown-pages'
	) );
	}

	// Slider Text
	$wp_customize->add_setting( 
    	'supermarket_shopping_slider_short_heading',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'priority'      => 1,
		)
	);	

	$wp_customize->add_control( 
		'supermarket_shopping_slider_short_heading',
		array(
		    'label'   		=> __('Add discount','supermarket-shopping'),
		    'section'		=> 'supermarket_shopping_slider_section',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_setting(
    	'supermarket_shopping_slider_btn_text',
    	array(
			'default' => 'DISCOVER MORE',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'supermarket_shopping_slider_btn_text',
		array(
		    'label'   		=> __('Slider Button Text','supermarket-shopping'),
		    'section'		=> 'supermarket_shopping_slider_section',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting(
    	'supermarket_shopping_slider_btn_link',
    	array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control( 
		'supermarket_shopping_slider_btn_link',
		array(
		    'label'   		=> __('Slider Button Link','supermarket-shopping'),
		    'section'		=> 'supermarket_shopping_slider_section',
			'type' 			=> 'url',
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_setting('supermarket_shopping_discount_sale_img1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'supermarket_shopping_discount_sale_img1',array(
	    'label' => __('Select Top Product Image 1','supermarket-shopping'),
	     'section' => 'supermarket_shopping_slider_section'
	)));

	$wp_customize->add_setting('supermarket_shopping_topproduct_title1',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('supermarket_shopping_topproduct_title1',array(
		'label'	=> __('Add Top Products Text 1','supermarket-shopping'),
		'section'=> 'supermarket_shopping_slider_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('supermarket_shopping_product_sale_discount_title1',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('supermarket_shopping_product_sale_discount_title1',array(
		'label'	=> __('Add Products Title 1','supermarket-shopping'),
		'section'=> 'supermarket_shopping_slider_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('supermarket_shopping_topproduct_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('supermarket_shopping_topproduct_content',array(
		'label'	=> __('Add Products Content 1','supermarket-shopping'),
		'section'=> 'supermarket_shopping_slider_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('supermarket_shopping_product_btn_text1',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('supermarket_shopping_product_btn_text1',array(
		'label'	=> esc_html__('Add Product Button Text 1','supermarket-shopping'),
		'section'=> 'supermarket_shopping_slider_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('supermarket_shopping_product_btn_link1',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('supermarket_shopping_product_btn_link1',array(
		'label'	=> esc_html__('Add Product Button link 1','supermarket-shopping'),
		'section'=> 'supermarket_shopping_slider_section',
		'type'=> 'url'
	));

	$wp_customize->add_setting('supermarket_shopping_discount_sale_img2',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'supermarket_shopping_discount_sale_img2',array(
	    'label' => __('Select Top Product Image 2','supermarket-shopping'),
	     'section' => 'supermarket_shopping_slider_section'
	)));

	$wp_customize->add_setting('supermarket_shopping_topproduct_title2',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('supermarket_shopping_topproduct_title2',array(
		'label'	=> __('Add Top Products Text 2','supermarket-shopping'),
		'section'=> 'supermarket_shopping_slider_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('supermarket_shopping_product_sale_discount_title2',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('supermarket_shopping_product_sale_discount_title2',array(
		'label'	=> __('Add Products Title 2','supermarket-shopping'),
		'section'=> 'supermarket_shopping_slider_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('supermarket_shopping_product_btn_text2',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('supermarket_shopping_product_btn_text2',array(
		'label'	=> esc_html__('Add Product Button Text 2','supermarket-shopping'),
		'section'=> 'supermarket_shopping_slider_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('supermarket_shopping_product_btn_link2',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('supermarket_shopping_product_btn_link2',array(
		'label'	=> esc_html__('Add Product Button link 2','supermarket-shopping'),
		'section'=> 'supermarket_shopping_slider_section',
		'type'=> 'url'
	));

	$wp_customize->add_setting( 'supermarket_shopping_upgrade_page_settings_1111',
	array(
		'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Supermarket_Shopping_Control_Upgrade(
		$wp_customize, 'supermarket_shopping_upgrade_page_settings_1111',
			array(
				'priority'      => 200,
				'section'       => 'supermarket_shopping_slider_section',
				'settings'      => 'supermarket_shopping_upgrade_page_settings_1111',
				'label'         => __( 'Supermarket Shopping Pro comes with additional features.', 'supermarket-shopping' ),
				'choices'       => array( __( '12+ Sections', 'supermarket-shopping' ), __( 'One Click Demo Importer', 'supermarket-shopping' ), __( 'Section Reordering Facility', 'supermarket-shopping' ),__( 'Advance Typography', 'supermarket-shopping' ),__( 'Easy Customization', 'supermarket-shopping' ),__( '24x7 Support', 'supermarket-shopping' ), )
			)
		)
	); 

	/*=========================================
	product Section
	=========================================*/
	$wp_customize->add_section(
		'supermarket_shopping_our_products_section', array(
			'title' => esc_html__( 'Best  Seller Section', 'supermarket-shopping' ),
			'priority' => 13,
			'panel' => 'supermarket_shopping_frontpage_sections',
		)
	);

	// About Us Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_our_products_show_hide_section' , 
			array(
			'default' => true,
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_our_products_show_hide_section', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'supermarket-shopping' ),
			'section'     => 'supermarket_shopping_our_products_section',
			'settings'    => 'supermarket_shopping_our_products_show_hide_section',
			'type'        => 'checkbox'
		) 
	);

	// About Heading
	$wp_customize->add_setting( 
    	'supermarket_shopping_our_products_heading_section',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);	

	$wp_customize->add_control( 
		'supermarket_shopping_our_products_heading_section',
		array(
		    'label'   		=> __('Add Heading','supermarket-shopping'),
		    'section'		=> 'supermarket_shopping_our_products_section',
			'type' 			=> 'text',
		)
	);

	$supermarket_shopping_args = array(
	    'type'           => 'product',
	    'child_of'       => 0,
	    'parent'         => '',
	    'orderby'        => 'term_group',
	    'order'          => 'ASC',
	    'hide_empty'     => false,
	    'hierarchical'   => 1,
	    'number'         => '',
	    'taxonomy'       => 'product_cat',
	    'pad_counts'     => false
	);
	$categories = get_categories($supermarket_shopping_args);
	$supermarket_shopping_cats = array();
	$i = 0;
	foreach ($categories as $category) {
	    if ($i == 0) {
	        $default = $category->slug;
	        $i++;
	    }
	    $supermarket_shopping_cats[$category->slug] = $category->name;
	}

	// Set the default value to "none"
	$supermarket_shopping_default_value = 'product_cat1';

	$wp_customize->add_setting(
	    'supermarket_shopping_our_product_product_category',
	    array(
	        'default'           => $supermarket_shopping_default_value,
	        'sanitize_callback' => 'supermarket_shopping_sanitize_select',
	    )
	);

	// Add "None" as an option in the select dropdown
	$supermarket_shopping_cats_with_none = array_merge(array('none' => 'None'), $supermarket_shopping_cats);

	$wp_customize->add_control(
	    'supermarket_shopping_our_product_product_category',
	    array(
	        'type'    => 'select',
	        'choices' => $supermarket_shopping_cats_with_none,
	        'label'   => __('Select Trending Products Category', 'supermarket-shopping'),
	        'section' => 'supermarket_shopping_our_products_section',
	    )
	);

	$wp_customize->add_setting( 'supermarket_shopping_upgrade_page_settings_101',
	array(
		'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Supermarket_Shopping_Control_Upgrade(
		$wp_customize, 'supermarket_shopping_upgrade_page_settings_101',
			array(
				'priority'      => 200,
				'section'       => 'supermarket_shopping_our_products_section',
				'settings'      => 'supermarket_shopping_upgrade_page_settings_101',
				'label'         => __( 'Supermarket Shopping Pro comes with additional features.', 'supermarket-shopping' ),
				'choices'       => array( __( '12+ Sections', 'supermarket-shopping' ), __( 'One Click Demo Importer', 'supermarket-shopping' ), __( 'Section Reordering Facility', 'supermarket-shopping' ),__( 'Advance Typography', 'supermarket-shopping' ),__( 'Easy Customization', 'supermarket-shopping' ),__( '24x7 Support', 'supermarket-shopping' ), )
			)
		)
	); 

}

add_action( 'customize_register', 'supermarket_shopping_blog_setting' );

// service selective refresh
function supermarket_shopping_blog_section_partials( $wp_customize ){	
	// blog_title
	$wp_customize->selective_refresh->add_partial( 'blog_title', array(
		'selector'            => '.home-blog .title h6',
		'settings'            => 'blog_title',
		'render_callback'  => 'supermarket_shopping_blog_title_render_callback',
	
	) );
	
	// blog_subtitle
	$wp_customize->selective_refresh->add_partial( 'blog_subtitle', array(
		'selector'            => '.home-blog .title h2',
		'settings'            => 'blog_subtitle',
		'render_callback'  => 'supermarket_shopping_blog_subtitle_render_callback',
	
	) );
	
	// blog_description
	$wp_customize->selective_refresh->add_partial( 'blog_description', array(
		'selector'            => '.home-blog .title p',
		'settings'            => 'blog_description',
		'render_callback'  => 'supermarket_shopping_blog_description_render_callback',
	
	) );	
	}

add_action( 'customize_register', 'supermarket_shopping_blog_section_partials' );

// blog_title
function supermarket_shopping_blog_title_render_callback() {
	return get_theme_mod( 'blog_title' );
}

// blog_subtitle
function supermarket_shopping_blog_subtitle_render_callback() {
	return get_theme_mod( 'blog_subtitle' );
}

// service description
function supermarket_shopping_blog_description_render_callback() {
	return get_theme_mod( 'blog_description' );
}