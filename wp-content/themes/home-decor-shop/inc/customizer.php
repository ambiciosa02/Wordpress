<?php
/**
 * home-decor-shop Theme Customizer.
 *
 * @package home-decor-shop
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function home_decor_shop_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
	$wp_customize->get_setting('custom_logo')->transport = 'refresh';	
}
add_action( 'customize_register', 'home_decor_shop_customize_register' );

if ( ! defined( 'HOME_DECOR_SHOP_BUY_NOW_1' ) ) {
define('HOME_DECOR_SHOP_BUY_NOW_1',__('https://www.mishkatwp.com/themes/decor-wordpress-theme/','home-decor-shop'));
}

if ( ! defined( 'HOME_DECOR_SHOP_THEME_BUNDLE_1' ) ) {
define('HOME_DECOR_SHOP_THEME_BUNDLE_1',__('https://www.mishkatwp.com/themes/wordpress-theme-bundle/','home-decor-shop'));
}

if ( class_exists("Kirki")){

	/* Logo */

	/* Logo Size limit Option End */
	new \Kirki\Field\Slider(
		[
			'settings'    => 'home_decor_shop_logo_resizer_setting',
			'label'       => esc_html__( 'Logo Size Limit', 'home-decor-shop' ),
			'section'     => 'title_tagline',
			'default'     => 70,
			'choices'     => [
				'min'  => 10,
				'max'  => 300,
				'step' => 10,
			],
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'home_decor_shop_site_title_setting',
			'label'       => esc_html__( 'Site Title On / Off', 'home-decor-shop' ),
			'section'     => 'title_tagline',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'home-decor-shop' ),
				'off' => esc_html__( 'Disable', 'home-decor-shop' ),
			],
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'home_decor_shop_tagline_setting',
			'label'       => esc_html__( 'Tagline On / Off', 'home-decor-shop' ),
			'section'     => 'title_tagline',
			'default'     => 'off',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'home-decor-shop' ),
				'off' => esc_html__( 'Disable', 'home-decor-shop' ),
			],
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'home-decor-shop' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'home-decor-shop' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_THEME_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'home-decor-shop' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'title_tagline',
    ] );

	/* Logo End */

	
		/* Typography Section */

	new \Kirki\Section(
		'home_decor_shop_theme_typography_section',
		[
			'title'       => esc_html__( 'Theme Typography', 'home-decor-shop' ),
			'description' => esc_html__( 'Here you can customize Heading or other body text font settings', 'home-decor-shop' ),
			'priority'    => 30,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'home_decor_shop_all_headings_typography',
		'section'     => 'home_decor_shop_theme_typography_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading Of All Sections',  'home-decor-shop' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'home_decor_shop_all_headings_typography',
		'label'       => esc_html__( 'Heading Typography',  'home-decor-shop' ),
		'description' => esc_html__( 'Select the typography options for your heading.',  'home-decor-shop' ),
		'section'     => 'home_decor_shop_theme_typography_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'h1','h2','h3','h4','h5','h6', ),
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'home_decor_shop_body_content_typography',
		'section'     => 'home_decor_shop_theme_typography_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Body Content',  'home-decor-shop' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'home_decor_shop_body_content_typography',
		'label'       => esc_html__( 'Content Typography',  'home-decor-shop' ),
		'description' => esc_html__( 'Select the typography options for your content.',  'home-decor-shop' ),
		'section'     => 'home_decor_shop_theme_typography_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'body', ),
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'home-decor-shop' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'home-decor-shop' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_THEME_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'home-decor-shop' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'home_decor_shop_theme_typography_section',
    ] );

     /* End Typography */

    /* Woocommerce Section */

	new \Kirki\Section(
		'home_decor_shop_theme_product_sidebar',
		[
			'title'       => esc_html__( 'Woocommerce Sidebars', 'home-decor-shop' ),
			'description' => esc_html__( 'Here you can change woocommerce sidebar', 'home-decor-shop' ),
			'panel' =>'woocommerce',
			'priority'    => 30,
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => 'home_decor_shop_product_sidebar_position',
			'label'       => esc_html__( 'Sidebar Option', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_theme_product_sidebar',
			'default'     => 'right',
			'choices'     => [
				'left' => esc_html__( 'Left Sidebar', 'home-decor-shop' ),
				'right' => esc_html__( 'Right Sidebar', 'home-decor-shop' ),
				'none' => esc_html__( 'No Sidebar', 'home-decor-shop' ),
			],
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'home-decor-shop' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'home-decor-shop' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_THEME_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'home-decor-shop' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'home_decor_shop_theme_product_sidebar',
    ] );

    /* Woocommerce Section End */

	//Home page Setting Panel
	new \Kirki\Panel(
		'home_decor_shop_home_page_section',
		[
			'priority'    => 10,
			'title'       => esc_html__( 'Home Page Sections', 'home-decor-shop' ),
		]
	);

	/* Top Header */

	new \Kirki\Section(
		'home_decor_shop_header_section',
		[
			'title'       => esc_html__( 'Top Header', 'home-decor-shop' ),
			'description' => esc_html__( 'Here you can add contact information.', 'home-decor-shop' ),
			'panel'		  => 'home_decor_shop_home_page_section',
			'priority'    => 30,
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'home_decor_shop_top_header_display_setting',
			'label'       => esc_html__( 'Top Header On / Off', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_header_section',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'home-decor-shop' ),
				'off' => esc_html__( 'Disable', 'home-decor-shop' ),
			],
		]
	);

	new \Kirki\Field\URL(
		[
			'settings' => 'home_decor_shop_header_myaccount_feild',
			'label'    => esc_html__( 'My Account Url', 'home-decor-shop' ),
			'section'  => 'home_decor_shop_header_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	new \Kirki\Field\URL(
		[
			'settings' => 'home_decor_shop_header_wishlist_feild',
			'label'    => esc_html__( 'Wishlist Url', 'home-decor-shop' ),
			'section'  => 'home_decor_shop_header_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'home-decor-shop' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'home-decor-shop' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_THEME_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'home-decor-shop' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'home_decor_shop_header_section',
    ] );

        /* Breadcrumb Section */

	new \Kirki\Section(
		'home_decor_shop_breadcrumb_section',
		[
			'title'       => esc_html__( 'Theme Breadcrumb Option', 'home-decor-shop' ),
			'description' => esc_html__( 'The breadcrumbs for your theme can be included here.', 'home-decor-shop' ),
			'priority'    => 30,
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'home_decor_shop_breadcrumb_setting',
			'label'       => esc_html__( 'Enable Breadcrumbs Option', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_breadcrumb_section',
			'default'     => true,
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'home-decor-shop' ),
				'off' => esc_html__( 'Disable', 'home-decor-shop' ),
			],
		]
	);


	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'home-decor-shop' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'home-decor-shop' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_THEME_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'home-decor-shop' ) . '</a>',
        'type'        => 'custom',
        'priority'    => 100,
        'section'     => 'home_decor_shop_breadcrumb_section',
    ] );

    /* Breadcrumb section End */

	/* Top Header End */

	/* Header */

	new \Kirki\Section(
		'home_decor_shop_header_button_section',
		[
			'title'       => esc_html__( 'Header', 'home-decor-shop' ),
			'description' => esc_html__( 'Here you can add header button text and link.', 'home-decor-shop' ),
			'panel'		  => 'home_decor_shop_home_page_section',
			'priority'    => 30,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'home_decor_shop_header_timer_text_feild',
			'label'    => esc_html__( 'Discount Text', 'home-decor-shop' ),
			'section'  => 'home_decor_shop_header_button_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'home_decor_shop_header_timer_feild',
			'label'    => esc_html__( 'Discount Timer', 'home-decor-shop' ),
			'description' => esc_html__( 'Ex: 20 Octobar 2023', 'home-decor-shop' ),
			'section'  => 'home_decor_shop_header_button_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'home_decor_shop_header_btn_text',
			'label'    => esc_html__( 'Button Text', 'home-decor-shop' ),
			'section'  => 'home_decor_shop_header_button_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	new \Kirki\Field\URL(
		[
			'settings' => 'home_decor_shop_header_btn_link',
			'label'    => esc_html__( 'Button Link', 'home-decor-shop' ),
			'section'  => 'home_decor_shop_header_button_section',
			'default'  => '',
			'priority' => 10,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'home-decor-shop' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'home-decor-shop' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_THEME_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'home-decor-shop' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'home_decor_shop_header_button_section',
    ] );

	/* Header End */

	/* Home Slider */

	new \Kirki\Section(
		'home_decor_shop_home_slider_section',
		[
			'title'       => esc_html__( 'Home Slider', 'home-decor-shop' ),
			'description' => esc_html__( 'Here you can add slider image, title and text.', 'home-decor-shop' ),
			'panel'		  => 'home_decor_shop_home_page_section',
			'priority'    => 30,
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'home_decor_shop_slide_on_off',
			'label'       => esc_html__( 'Slider On / Off', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_home_slider_section',
			'default'     => 'off',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'home-decor-shop' ),
				'off' => esc_html__( 'Disable', 'home-decor-shop' ),
			],
		]
	);

	new \Kirki\Field\Number(
		[
			'settings' => 'home_decor_shop_slide_count',
			'label'    => esc_html__( 'Slider Number Control', 'home-decor-shop' ),
			'section'  => 'home_decor_shop_home_slider_section',
			'default'  => '',
			'choices'  => [
				'min'  => 1,
				'max'  => 2,
				'step' => 1,
			],
		]
	);

	$slide_count = get_theme_mod('home_decor_shop_slide_count');

	for ($i=1; $i <= $slide_count; $i++) { 
		
		new \Kirki\Field\Image(
			[
				'settings'    => 'home_decor_shop_slider_image'.$i,
				'label'       => esc_html__( 'Slider Image 0', 'home-decor-shop' ).$i,
				'section'     => 'home_decor_shop_home_slider_section',
				'default'     => '',
			]
		);

		new \Kirki\Field\Text(
			[
				'settings' => 'home_decor_shop_slider_short_heading'.$i,
				'label'    => esc_html__( 'Short Heading 0', 'home-decor-shop' ).$i,
				'section'  => 'home_decor_shop_home_slider_section',
			]
		);

		new \Kirki\Field\Text(
			[
				'settings' => 'home_decor_shop_slider_heading'.$i,
				'label'    => esc_html__( 'Main Heading 0', 'home-decor-shop' ).$i,
				'section'  => 'home_decor_shop_home_slider_section',
			]
		);

		new \Kirki\Field\Text(
			[
				'settings' => 'home_decor_shop_slider_text'.$i,
				'label'    => esc_html__( 'Text 0', 'home-decor-shop' ).$i,
				'section'  => 'home_decor_shop_home_slider_section',
			]
		);

		new \Kirki\Field\Text(
			[
				'settings' => 'home_decor_shop_slider_button_text'.$i,
				'label'    => esc_html__( 'Button Text 0', 'home-decor-shop' ).$i,
				'section'  => 'home_decor_shop_home_slider_section',
			]
		);

		new \Kirki\Field\URL(
			[
				'settings' => 'home_decor_shop_slider_button_link'.$i,
				'label'    => esc_html__( 'Button Url 0', 'home-decor-shop' ).$i,
				'section'  => 'home_decor_shop_home_slider_section',
				'default'  => '',
			]
		);

	}

	new \Kirki\Field\Image(
		[
			'settings'    => 'home_decor_shop_banner_image1',
			'label'       => esc_html__( 'Banner Image 1', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_home_slider_section',
			'default'     => '',
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'home_decor_shop_banner_short_heading1',
			'label'    => esc_html__( 'Short Heading 1', 'home-decor-shop' ),
			'section'  => 'home_decor_shop_home_slider_section',
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'home_decor_shop_banner_heading1',
			'label'    => esc_html__( 'Main Heading 1', 'home-decor-shop' ),
			'section'  => 'home_decor_shop_home_slider_section',
		]
	);

	new \Kirki\Field\Image(
		[
			'settings'    => 'home_decor_shop_banner_image2',
			'label'       => esc_html__( 'Banner Image 2', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_home_slider_section',
			'default'     => '',
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'home_decor_shop_banner_short_heading2',
			'label'    => esc_html__( 'Short Heading 2', 'home-decor-shop' ),
			'section'  => 'home_decor_shop_home_slider_section',
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'home_decor_shop_banner_heading2',
			'label'    => esc_html__( 'Main Heading 2', 'home-decor-shop' ),
			'section'  => 'home_decor_shop_home_slider_section',
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'home-decor-shop' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'home-decor-shop' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_THEME_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'home-decor-shop' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'home_decor_shop_home_slider_section',
    ] );

	/* Home Slider End */

	/* Home About Us */

	new \Kirki\Section(
		'home_decor_shop_home_aboutus_section',
		[
			'title'       => esc_html__( 'Home About Us', 'home-decor-shop' ),
			'description' => esc_html__( 'Here you can add about us image, title and text.', 'home-decor-shop' ),
			'panel'		  => 'home_decor_shop_home_page_section',
			'priority'    => 30,
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'home_decor_shop_aboutus_on_off',
			'label'       => esc_html__( 'Abouts Us On / Off', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_home_aboutus_section',
			'default'     => 'off',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'home-decor-shop' ),
				'off' => esc_html__( 'Disable', 'home-decor-shop' ),
			],
		]
	);
		
	new \Kirki\Field\Image(
		[
			'settings'    => 'home_decor_shop_aboutus_image1',
			'label'       => esc_html__( 'About Us Image 1', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_home_aboutus_section',
			'default'     => '',
		]
	);

	new \Kirki\Field\Image(
		[
			'settings'    => 'home_decor_shop_aboutus_image2',
			'label'       => esc_html__( 'About Us Image 2', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_home_aboutus_section',
			'default'     => '',
		]
	);


	new \Kirki\Field\Image(
		[
			'settings'    => 'home_decor_shop_aboutus_image3',
			'label'       => esc_html__( 'About Us Image 3', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_home_aboutus_section',
			'default'     => '',
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'home_decor_shop_aboutus_heading',
			'label'    => esc_html__( 'Heading', 'home-decor-shop' ),
			'section'  => 'home_decor_shop_home_aboutus_section',
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'home_decor_shop_aboutus_main_heading',
			'label'    => esc_html__( 'Main Heading', 'home-decor-shop' ),
			'section'  => 'home_decor_shop_home_aboutus_section',
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'home_decor_shop_aboutus_text',
			'label'    => esc_html__( 'Text', 'home-decor-shop' ),
			'section'  => 'home_decor_shop_home_aboutus_section',
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'home_decor_shop_aboutus_button_text',
			'label'    => esc_html__( 'Button Text', 'home-decor-shop' ),
			'section'  => 'home_decor_shop_home_aboutus_section',
		]
	);

	new \Kirki\Field\URL(
		[
			'settings' => 'home_decor_shop_aboutus_button_link',
			'label'    => esc_html__( 'Button Url', 'home-decor-shop' ),
			'section'  => 'home_decor_shop_home_aboutus_section',
			'default'  => '',
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'home-decor-shop' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'home-decor-shop' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_THEME_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'home-decor-shop' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'home_decor_shop_home_aboutus_section',
    ] );

	/* Home About Us End */

	/* Pro Our Product */

    new \Kirki\Section(
		'home_decor_shop_our_product_section',
		[
			'title'       => esc_html__( 'Our Product Section', 'home-decor-shop' ),
			'panel'       => 'home_decor_shop_home_page_section',
			'priority'    => 30,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Details for the Premium Theme', 'home-decor-shop' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'home-decor-shop' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_THEME_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'home-decor-shop' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'home_decor_shop_our_product_section',
        'description' => __( '<p>a. Add more Our Product Effortlessly </p><p>b. Easily change the color of specific text elements </p><p>c. Buy Our Premium Theme For Our Product Section</p>', 'home-decor-shop' ),
    ] );

	/* Pro Our Product End */

	/* Pro Category */

    new \Kirki\Section(
		'home_decor_shop_category_section',
		[
			'title'       => esc_html__( 'Category Section', 'home-decor-shop' ),
			'panel'       => 'home_decor_shop_home_page_section',
			'priority'    => 30,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Details for the Premium Theme', 'home-decor-shop' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'home-decor-shop' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_THEME_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'home-decor-shop' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'home_decor_shop_category_section',
        'description' => __( '<p>a. Add more Category Effortlessly </p><p>b. Easily change the color of specific text elements </p><p>c. Buy Our Premium Theme For Category Section</p>', 'home-decor-shop' ),
    ] );

	/* Pro Category End */

	/* Pro Our Projects */

    new \Kirki\Section(
		'home_decor_shop_our_projects_section',
		[
			'title'       => esc_html__( 'Our Projects Section', 'home-decor-shop' ),
			'panel'       => 'home_decor_shop_home_page_section',
			'priority'    => 30,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Details for the Premium Theme', 'home-decor-shop' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'home-decor-shop' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_THEME_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'home-decor-shop' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'home_decor_shop_our_projects_section',
        'description' => __( '<p>a. Add more Our Projects Effortlessly </p><p>b. Easily change the color of specific text elements </p><p>c. Buy Our Premium Theme For Our Projects Section</p>', 'home-decor-shop' ),
    ] );

	/* Pro Our Projects End */

	/* Pro Our Team */

    new \Kirki\Section(
		'home_decor_shop_our_team_section',
		[
			'title'       => esc_html__( 'Our Team Section', 'home-decor-shop' ),
			'panel'       => 'home_decor_shop_home_page_section',
			'priority'    => 30,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Details for the Premium Theme', 'home-decor-shop' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'home-decor-shop' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_THEME_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'home-decor-shop' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'home_decor_shop_our_team_section',
        'description' => __( '<p>a. Add more Our Team Effortlessly </p><p>b. Easily change the color of specific text elements </p><p>c. Buy Our Premium Theme For Our Team Section</p>', 'home-decor-shop' ),
    ] );

	/* Pro Our Team End */

	/* Pro Our Testimonial */

    new \Kirki\Section(
		'home_decor_shop_our_testimonial_section',
		[
			'title'       => esc_html__( 'Our Testimonial Section', 'home-decor-shop' ),
			'panel'       => 'home_decor_shop_home_page_section',
			'priority'    => 30,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Details for the Premium Theme', 'home-decor-shop' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'home-decor-shop' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_THEME_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'home-decor-shop' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'home_decor_shop_our_testimonial_section',
        'description' => __( '<p>a. Add more Our Testimonial Effortlessly </p><p>b. Easily change the color of specific text elements </p><p>c. Buy Our Premium Theme For Our Testimonial Section</p>', 'home-decor-shop' ),
    ] );

	/* Pro Our Testimonial End */

	/* Pro Featured Product */

    new \Kirki\Section(
		'home_decor_shop_featured_product_section',
		[
			'title'       => esc_html__( 'Featured Product Section', 'home-decor-shop' ),
			'panel'       => 'home_decor_shop_home_page_section',
			'priority'    => 30,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Details for the Premium Theme', 'home-decor-shop' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'home-decor-shop' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_THEME_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'home-decor-shop' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'home_decor_shop_featured_product_section',
        'description' => __( '<p>a. Add more Featured Product Effortlessly </p><p>b. Easily change the color of specific text elements </p><p>c. Buy Our Premium Theme For Featured Product Section</p>', 'home-decor-shop' ),
    ] );

	/* Pro Featured Product End */

	/* Pro Our Blogs */

    new \Kirki\Section(
		'home_decor_shop_our_blog_section',
		[
			'title'       => esc_html__( 'Our Blogs Section', 'home-decor-shop' ),
			'panel'       => 'home_decor_shop_home_page_section',
			'priority'    => 30,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Details for the Premium Theme', 'home-decor-shop' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'home-decor-shop' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_THEME_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'home-decor-shop' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'home_decor_shop_our_blog_section',
        'description' => __( '<p>a. Add more Our Blogs Effortlessly </p><p>b. Easily change the color of specific text elements </p><p>c. Buy Our Premium Theme For Our Blogs Section</p>', 'home-decor-shop' ),
    ] );

	/* Pro Our Blogs End */


	/* Pro Sponsor */

    new \Kirki\Section(
		'home_decor_shop_our_sponsor_section',
		[
			'title'       => esc_html__( 'Sponsor Section', 'home-decor-shop' ),
			'panel'       => 'home_decor_shop_home_page_section',
			'priority'    => 30,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Details for the Premium Theme', 'home-decor-shop' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'home-decor-shop' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_THEME_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'home-decor-shop' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'home_decor_shop_our_sponsor_section',
        'description' => __( '<p>a. Add more Sponsor Effortlessly </p><p>b. Easily change the color of specific text elements </p><p>c. Buy Our Premium Theme For Sponsor Section</p>', 'home-decor-shop' ),
    ] );

	/* Pro Sponsor End */

	/* Footer */

	new \Kirki\Section(
		'home_decor_shop_footer_section',
		[
			'title'       => esc_html__( 'Footer', 'home-decor-shop' ),
			'description' => esc_html__( 'Here you can add footer copyright text.', 'home-decor-shop' ),
			'panel'		  => 'home_decor_shop_home_page_section',
			'priority'    => 30,
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'home_decor_shop_footer_widgets_on_off',
			'label'       => esc_html__( 'Footer On / Off', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_footer_section',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'home-decor-shop' ),
				'off' => esc_html__( 'Disable', 'home-decor-shop' ),
			],
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'home_decor_shop_copyright_on_off',
			'label'       => esc_html__( 'Footer Copyright On / Off', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_footer_section',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'home-decor-shop' ),
				'off' => esc_html__( 'Disable', 'home-decor-shop' ),
			],
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'home_decor_shop_copyright_content_text',
			'label'    => esc_html__( 'Copyright Text', 'home-decor-shop' ),
			'section'  => 'home_decor_shop_footer_section',
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'home-decor-shop' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'home-decor-shop' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_THEME_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'home-decor-shop' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'home_decor_shop_footer_section',
    ] );

    /* Footer  End*/

	/* Single Post Options */

	new \Kirki\Section(
		'home_decor_shop_single_post_options',
		[
			'title'       => esc_html__( 'Single Post Options', 'home-decor-shop' ),
			'priority'    => 30,
		]
	);
    
    /* Single Post Heading Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'home_decor_shop_single_post_heading_on_off',
			'label'       => esc_html__( 'Single Post Heading On / Off', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_single_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'home-decor-shop' ),
				'off' => esc_html__( 'Disable', 'home-decor-shop' ),
			],
		]
	);

	/* Single Post Content Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'home_decor_shop_single_post_content_on_off',
			'label'       => esc_html__( 'Single Post Content On / Off', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_single_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'home-decor-shop' ),
				'off' => esc_html__( 'Disable', 'home-decor-shop' ),
			],
		]
	);

	/* Single Post Meta Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'home_decor_shop_single_meta_on_off',
			'label'       => esc_html__( 'Single Post Meta On / Off', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_single_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'home-decor-shop' ),
				'off' => esc_html__( 'Disable', 'home-decor-shop' ),
			],
		]
	);

	/* Single Post Feature Image Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'home_decor_shop_single_post_image_on_off',
			'label'       => esc_html__( 'Single Post Feature Image On / Off', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_single_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'home-decor-shop' ),
				'off' => esc_html__( 'Disable', 'home-decor-shop' ),
			],
		]
	);

	/* Single Post Pagination Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'home_decor_shop_single_post_pagination_on_off',
			'label'       => esc_html__( 'Single Post Pagination On / Off', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_single_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'home-decor-shop' ),
				'off' => esc_html__( 'Disable', 'home-decor-shop' ),
			],
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'home-decor-shop' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'home-decor-shop' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_THEME_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'home-decor-shop' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'home_decor_shop_single_post_options',
    ] );

    /* Single Post Options End */

    /* Page Options */
		new \Kirki\Section(
		'home_decor_shop_single_page_options',
		[
			'title'       => esc_html__( 'Page Sidebar Options', 'home-decor-shop' ),
			'priority'    => 30,
		]
	);

	new \Kirki\Field\Radio(
	[
		'settings'    => 'home_decor_shop_single_page_sidebar_option',
		'label'       => esc_html__( 'Page Sidebar Settings', 'home-decor-shop' ),
		'section'     => 'home_decor_shop_single_page_options',
		'default'     => 'right',
		'priority'    => 10,
		'choices'     => [
			'right'   => esc_html__( 'Page With Right Sidebar', 'home-decor-shop' ),
			'left' => esc_html__( 'Page With Left Sidebar', 'home-decor-shop' ),
			'none'  => esc_html__( 'Page With No Sidebar', 'home-decor-shop' ),

		],
	]
);
	/* Page Options End*/

	/* Post Options */

	new \Kirki\Section(
		'home_decor_shop_post_options',
		[
			'title'       => esc_html__( 'Post Options', 'home-decor-shop' ),
			'priority'    => 30,
		]
	);
    
    /* Post Image Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'home_decor_shop_post_image_on_off',
			'label'       => esc_html__( 'Post Image On / Off', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'home-decor-shop' ),
				'off' => esc_html__( 'Disable', 'home-decor-shop' ),
			],
		]
	);

	/* Post Heading Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'home_decor_shop_post_heading_on_off',
			'label'       => esc_html__( 'Post Heading On / Off', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'home-decor-shop' ),
				'off' => esc_html__( 'Disable', 'home-decor-shop' ),
			],
		]
	);

	/* Post Content Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'home_decor_shop_post_content_on_off',
			'label'       => esc_html__( 'Post Content On / Off', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'home-decor-shop' ),
				'off' => esc_html__( 'Disable', 'home-decor-shop' ),
			],
		]
	);

	/* Post Date Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'home_decor_shop_post_date_on_off',
			'label'       => esc_html__( 'Post Date On / Off', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'home-decor-shop' ),
				'off' => esc_html__( 'Disable', 'home-decor-shop' ),
			],
		]
	);

	/* Post Comments Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'home_decor_shop_post_comment_on_off',
			'label'       => esc_html__( 'Post Comments On / Off', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'home-decor-shop' ),
				'off' => esc_html__( 'Disable', 'home-decor-shop' ),
			],
		]
	);

	/* Post Author Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'home_decor_shop_post_author_on_off',
			'label'       => esc_html__( 'Post Author On / Off', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'home-decor-shop' ),
				'off' => esc_html__( 'Disable', 'home-decor-shop' ),
			],
		]
	);

	/* Post Categories Option End */
	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'home_decor_shop_post_categories_on_off',
			'label'       => esc_html__( 'Post Categories On / Off', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_post_options',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'home-decor-shop' ),
				'off' => esc_html__( 'Disable', 'home-decor-shop' ),
			],
		]
	);

	/* Post limit Option End */
	new \Kirki\Field\Slider(
		[
			'settings'    => 'home_decor_shop_post_content_limit',
			'label'       => esc_html__( 'Post Content Limit', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_post_options',
			'default'     => 15,
			'choices'     => [
				'min'  => 0,
				'max'  => 50,
				'step' => 1,
			],
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'home-decor-shop' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'home-decor-shop' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_THEME_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'home-decor-shop' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'home_decor_shop_post_options',
    ] );

	/* Post Options End */

	/* Post Layout Options */

	new \Kirki\Section(
		'home_decor_shop_post_layouts_section',
		[
			'title'       => esc_html__( 'Post Layout Options', 'home-decor-shop' ),
			'priority'    => 30,
		]
	);

	new \Kirki\Field\Radio_Image(
		[
			'settings'    => 'home_decor_shop_post_layout',
			'label'       => esc_html__( 'Blog Layout', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_post_layouts_section',
			'default'     => 'two_column_right',
			'priority'    => 10,
			'choices'     => [
				'one_column'   => get_template_directory_uri().'/images/1column.png',
				'two_column_right' => get_template_directory_uri().'/images/right-sidebar.png',
				'two_column_left'  => get_template_directory_uri().'/images/left-sidebar.png',
				'three_column'  => get_template_directory_uri().'/images/3column.png',
				'four_column'  => get_template_directory_uri().'/images/4column.png',
				'grid_post'  => get_template_directory_uri().'/images/grid.png',
			],
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'home-decor-shop' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'home-decor-shop' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_THEME_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'home-decor-shop' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'home_decor_shop_post_layouts_section',
    ] );

	/* Post Layout Options End */

	/* 404 Page */

	new \Kirki\Section(
		'home_decor_shop_404_page_section',
		[
			'title'       => esc_html__( '404 Page', 'home-decor-shop' ),
			'description' => esc_html__( 'Here you can add 404 Page information.', 'home-decor-shop' ),
			'priority'    => 30,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'home_decor_shop_404_page_heading',
			'label'    => esc_html__( 'Add Heading', 'home-decor-shop' ),
			'section'  => 'home_decor_shop_404_page_section',
			'default'  => esc_html__( '404', 'home-decor-shop' ),
			'priority' => 10,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'home_decor_shop_404_page_content',
			'label'    => esc_html__( 'Add Content', 'home-decor-shop' ),
			'section'  => 'home_decor_shop_404_page_section',
			'default'  => esc_html__( 'Ops! Something happened...', 'home-decor-shop' ),
			'priority' => 10,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'home_decor_shop_404_page_button',
			'label'    => esc_html__( 'Add Button', 'home-decor-shop' ),
			'section'  => 'home_decor_shop_404_page_section',
			'default'  => esc_html__( 'Home', 'home-decor-shop' ),
			'priority' => 10,
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'home-decor-shop' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'home-decor-shop' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_THEME_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'home-decor-shop' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'home_decor_shop_404_page_section',
    ] );

	/* 404 Page End */

	/* General Options */

	new \Kirki\Section(
		'home_decor_shop_general_options_section',
		[
			'title'       => esc_html__( 'General Options', 'home-decor-shop' ),
			'priority'    => 30,
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'home_decor_shop_sticky_header_setting',
			'label'       => esc_html__( 'Show Hide Sticky Header', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_general_options_section',
			'default'     => 'off',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'home-decor-shop' ),
				'off' => esc_html__( 'Disable', 'home-decor-shop' ),
			],
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'home_decor_shop_preloader_setting',
			'label'       => esc_html__( 'Preloader On / Off', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_general_options_section',
			'default'     => 'off',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'home-decor-shop' ),
				'off' => esc_html__( 'Disable', 'home-decor-shop' ),
			],
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'home_decor_shop_scroll_to_top_setting',
			'label'       => esc_html__( 'Scroll To Top On / Off', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_general_options_section',
			'default'     => 'on',
			'choices'     => [
				'on'  => esc_html__( 'Enable', 'home-decor-shop' ),
				'off' => esc_html__( 'Disable', 'home-decor-shop' ),
			],
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => 'home_decor_shop_scroll_top_alignment',
			'label'       => esc_html__( 'Scroll Top Alignment', 'home-decor-shop' ),
			'section'     => 'home_decor_shop_general_options_section',
			'default'     => 'Right',
			'choices'     => [
				'Left' => esc_html__( 'Left Align', 'home-decor-shop' ),
				'Center' => esc_html__( 'Center Align', 'home-decor-shop' ),
				'Right' => esc_html__( 'Right Align', 'home-decor-shop' ),
			],
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Buy Our Premium Theme For More Feature', 'home-decor-shop' ),
		'default'  => 
	        '<a class="premium_info_btn" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_BUY_NOW_1 ) . '">' . __( 'Buy Pro', 'home-decor-shop' ) . '</a>' .
	        '<a class="premium_info_btn bundle" target="_blank" href="' . esc_url( HOME_DECOR_SHOP_THEME_BUNDLE_1 ) . '">' . __( 'Buy All Themes In Single Package', 'home-decor-shop' ) . '</a>',
        'type'        => 'custom',
        'section'     => 'home_decor_shop_general_options_section',
    ] );

	/* General Options End */
}