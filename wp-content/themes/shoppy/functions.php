<?php

/* Enqueue chlid theme scripts */
function shoppy_enqueue_script() {
  	$parent_style = 'parent-style';
  	wp_enqueue_style('shoppy-style', get_stylesheet_directory_uri().'/style.css', $parent_style);
}
add_action('wp_enqueue_scripts' ,'shoppy_enqueue_script', 99);

if( ! function_exists( 'shoppy_setup' ) ):
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function shoppy_setup() {
		
		// Defining a text domain name for the theme
		load_theme_textdomain('shoppy');
		
		// Supporting automatic feed links here
		add_theme_support('automatic-feed-links');
		
		// Supporting WordPress "Title" tags here
		add_theme_support('title-tag');
		
		// Supporting "Pages" and "Excerpt" here
		add_post_type_support('page','excerpt');
		
		// Supporting "Featured Images" for the pages here
		add_theme_support('post-thumbnails');

		add_theme_support('align-wide');
		add_theme_support('responsive-embeds');
		add_theme_support('wp-block-styles');
		
		// Supporting HTML5 tags on the following theme parts
		add_theme_support('html5',array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		
		// Adding a custom logo image here
		add_theme_support('custom-logo',array(
            'height'      => 73,
            'width'       => 210,
            'flex-height' => true,
            'flex-width'  => true,
        ) );        
		
		// Adding a custom header image here
		$args = array(
			'width'        => 1600,
			'flex-width'   => true,
			'default-image'=> '',
			'header-text'  => false,
		);
		add_theme_support( 'custom-header', $args );

		// Custom background theme supports
		add_theme_support( 'custom-background' );

		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'register_block_style' );
		add_theme_support( 'register_block_pattern' );
		add_theme_support( 'add_editor_style()' );
	}
	add_action( 'after_setup_theme', 'shoppy_setup' );
endif;

remove_action('widgets_init','shopcozi_widgets_register');

if( ! function_exists('shoppy_widgets_register') ):
	function shoppy_widgets_register(){
		register_sidebar( array(
			'name'          => esc_html__( 'Primary Right Sidebar', 'shopcozi' ),
			'id'            => 'sidebar-1',
			'description'   => 'This sidebar contents will be show on the blog archive pages.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Primary Left Sidebar', 'shopcozi' ),
			'id'            => 'sidebar-2',
			'description'   => 'This sidebar contents will be show on the blog archive pages.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		) );
		
		for ( $i = 1; $i<= 4; $i++ ) {
			register_sidebar( array(
				'name'          => sprintf( __('Footer %s', 'shopcozi'), $i ),
				'id'            => 'footer-' . $i,
				'description'   => 'This sidebar contents will be show in the footer '.$i.' column area.',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );
		}
	}
	add_action('widgets_init','shoppy_widgets_register');
endif;

/* Overriding custom theme color scheme of parent theme. */
function shoppy_reset_data( $data ){
	
	$new_data = array(
		'shopcozi_accent_color1' => '#ea0065',
		'shopcozi_h_style' => 'two',
		'shopcozi_nav_content_show' => true,
        'shopcozi_nav_content' => shoppy_header_nav_default_data(),
	);

	$data = array_merge($data, $new_data);
	return $data;
}
add_filter('shopcozi_default_options','shoppy_reset_data', 999);

function shoppy_header_nav_default_data(){
	return  array(
	            array(
	                'icon' => 'fa-solid fa-phone',
	                'title' => __('Phone Number','shoppy'),
	                'text' => __('(+096) 468 235','shoppy'),
	            ),
	            array(
	                'icon' => 'fa-regular fa-clock',
	                'title' => __('Office Time','shoppy'),
	                'text' => __('8:00 - 7:00','shoppy'),
	            ),
	        );
}


/* Overriding parent theme function */
function shopcozi_header_nav_data(){
    $items = get_theme_mod('shopcozi_nav_content');

    if(is_string($items)){
        $items = json_decode($items);
    }

    if ( empty( $items ) || !is_array( $items ) ) {
        $items = array();
    }

    $val = array();
    if (!empty($items) && is_array($items)) {
        foreach ($items as $k => $v) {
            $val[] = wp_parse_args($v,array(
                    'icon' => 'fa-solid fa-envelope',
                    'text' => 'info@example.com',
                    'link' => '#',
                    ));
        }
    }else{
        $val = shoppy_header_nav_default_data();
    }

    return $val;
}

// Changing slider content images
function shoppy_slider_default_data( $data ){
	// slide 1
	$data[0]['image']['url'] = get_stylesheet_directory_uri() . '/img/slide-1.jpg';
	$data[0]['subtitle'] = __('Deal of the day 35% OFF','shoppy');
	$data[0]['subtitle_color'] = 'ffffff';
	$data[0]['title_color'] = 'ffffff';
	$data[0]['title'] = __('Apple MackBook Pro<br/> Laptop','shoppy');
	$data[0]['desc_color'] = 'ffffff';
	$data[0]['right_image']['url'] = get_stylesheet_directory_uri() . '/img/slide-1-1.png';

	$data[1]['image']['url'] = get_stylesheet_directory_uri() . '/img/slide-2.jpg';
	$data[1]['subtitle'] = __('Best deal on shoes 25% OFF','shoppy');
	$data[1]['subtitle_color'] = '161824';
	$data[1]['title'] = __('Sports Running<br/> Shoes','shoppy');
	$data[1]['title_color'] = '161824';
	$data[1]['desc_color'] = '161824';
	$data[1]['right_image']['url'] = get_stylesheet_directory_uri() . '/img/slide-2-1.png';

	return $data;
}
add_filter('shopcozi_slider_default_data','shoppy_slider_default_data');

function shoppy_slider_right_default_data( $data ){
	// slide 1
	$data[0]['image']['url'] = get_stylesheet_directory_uri() . '/img/slider-right-1.png';
	$data[0]['title'] = __('Body Trimmer Special Edition','shoppy');
	$data[0]['desc'] = __('Start price at $39','shoppy');
	$data[1]['image']['url'] = get_stylesheet_directory_uri() . '/img/slider-right-2.png';
	$data[1]['title'] = __('Silver Watches For Mens','shoppy');
	$data[1]['desc'] = __('Start price at $49','shoppy');
	$data[2]['image']['url'] = get_stylesheet_directory_uri() . '/img/slider-right-3.png';
	$data[2]['title'] = __('Wired Headphones With Mic','shoppy');
	$data[2]['desc'] = __('Start price at $30','shoppy');

	return $data;
}
add_filter('shopcozi_slider_right_default_data','shoppy_slider_right_default_data');

// Importing theme options from parent themes
function shoppy_parent_theme_options() {
	$options = get_option( 'theme_mods_shopcozi' );
	if ( ! empty( $options ) ) {
		foreach ( $options as $key => $val ) {
			set_theme_mod( $key, $val );
		}
	}
}
add_action( 'after_switch_theme', 'shoppy_parent_theme_options' );

// Include customizer file
get_template_part('inc/customizer/options/customizer-header-navigation');