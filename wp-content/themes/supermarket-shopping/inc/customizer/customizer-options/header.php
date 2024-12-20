<?php
function supermarket_shopping_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

    // Site Title Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_site_title_setting' , 
			array(
			'default' => '0',
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_site_title_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Site Title', 'supermarket-shopping' ),
			'section'     => 'title_tagline',
			'settings'    => 'supermarket_shopping_site_title_setting',
			'type'        => 'checkbox'
		) 
	);

	// Tagline Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'supermarket_shopping_tagline_setting' , 
			array(
			'default' => '',
			'sanitize_callback' => 'supermarket_shopping_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'supermarket_shopping_tagline_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Tagline', 'supermarket-shopping' ),
			'section'     => 'title_tagline',
			'settings'    => 'supermarket_shopping_tagline_setting',
			'type'        => 'checkbox'
		) 
	);

	// Add the setting for logo width
	$wp_customize->add_setting(
		'supermarket_shopping_logo_width',
		array(
			'default' => '200',
			'sanitize_callback' => 'supermarket_shopping_sanitize_logo_width',
			'priority'          => 2,
		)
	);

	// Add control for logo width
	$wp_customize->add_control( 
		'supermarket_shopping_logo_width',
		array(
			'label'     => __('Logo Width', 'supermarket-shopping'),
			'section'   => 'title_tagline',
			'type'      => 'number',
			'input_attrs' => array(
				'min'   => 1,
				'max'   => 150,
				'step'  => 1,
			),
			'transport' => $selective_refresh,
		)  
	);

	$wp_customize->add_setting( 'supermarket_shopping_upgrade_page_settings_111',
	array(
		'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Supermarket_Shopping_Control_Upgrade(
		$wp_customize, 'supermarket_shopping_upgrade_page_settings_111',
			array(
				'priority'      => 200,
				'section'       => 'title_tagline',
				'settings'      => 'supermarket_shopping_upgrade_page_settings_111',
				'label'         => __( 'Supermarket Shopping Pro comes with additional features.', 'supermarket-shopping' ),
				'choices'       => array( __( '12+ Sections', 'supermarket-shopping' ), __( 'One Click Demo Importer', 'supermarket-shopping' ), __( 'Section Reordering Facility', 'supermarket-shopping' ),__( 'Advance Typography', 'supermarket-shopping' ),__( 'Easy Customization', 'supermarket-shopping' ),__( '24x7 Support', 'supermarket-shopping' ), )
			)
		)
	); 

	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'supermarket_shopping_header_section', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header', 'supermarket-shopping'),
		) 
	);

	/*=========================================
	Supermarket Shopping Site Identity
	=========================================*/
	$wp_customize->add_section(
        'title_tagline',
        array(
        	'priority'      => 1,
            'title' 		=> __('Site Identity','supermarket-shopping'),
			'panel'  		=> 'supermarket_shopping_header_section',
		)
    );

	$wp_customize->register_panel_type( 'Supermarket_Shopping_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'Supermarket_Shopping_WP_Customize_Section' );

}
add_action( 'customize_register', 'supermarket_shopping_header_settings' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class Supermarket_Shopping_WP_Customize_Panel extends WP_Customize_Panel {
	   public $panel;
	   public $type = 'supermarket_shopping_panel';
	   public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class Supermarket_Shopping_WP_Customize_Section extends WP_Customize_Section {
	   public $section;
	   public $type = 'supermarket_shopping_section';
	   public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}