<?php
/**
 * Omega Storefront functions and definitions
 * @package Omega Storefront
 */

if ( ! function_exists( 'omega_storefront_after_theme_support' ) ) :

	function omega_storefront_after_theme_support() {
		
		add_theme_support( 'automatic-feed-links' );

		add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
        add_theme_support('woocommerce', array(
            'gallery_thumbnail_image_width' => 300,
        ));

        load_theme_textdomain( 'omega-storefront', get_template_directory() . '/languages' );
		
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'ffffff',
			)
		);

		$GLOBALS['content_width'] = apply_filters( 'omega_storefront_content_width', 1140 );
		
		add_theme_support( 'post-thumbnails' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 270,
				'width'       => 90,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);
		
		add_theme_support( 'title-tag' );

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		add_theme_support( 'post-formats', array(
		    'video',
		    'audio',
		    'gallery',
		    'quote',
		    'image'
		) );
		
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );

	}

endif;

add_action( 'after_setup_theme', 'omega_storefront_after_theme_support' );

/**
 * Register and Enqueue Styles.
 */
function omega_storefront_register_styles() {

	wp_enqueue_style( 'dashicons' );

    $omega_storefront_theme_version = wp_get_theme()->get( 'Version' );
	$omega_storefront_fonts_url = omega_storefront_fonts_url();
    if( $omega_storefront_fonts_url ){
    	require_once get_theme_file_path( 'lib/custom/css/wptt-webfont-loader.php' );
        wp_enqueue_style(
			'omega-storefront-google-fonts',
			wptt_get_webfont_url( $omega_storefront_fonts_url ),
			array(),
			$omega_storefront_theme_version
		);
    }

    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/lib/swiper/css/swiper-bundle.min.css');
    wp_enqueue_style( 'owl.carousel', get_template_directory_uri() . '/lib/custom/css/owl.carousel.min.css');
	wp_enqueue_style( 'omega-storefront-style', get_stylesheet_uri(), array(), $omega_storefront_theme_version );

	wp_enqueue_style( 'omega-storefront-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/custom_css.php' );
	wp_add_inline_style( 'omega-storefront-style',$omega_storefront_custom_css );

	$omega_storefront_css = '';

	if ( get_header_image() ) :

		$omega_storefront_css .=  '
			.main-header{
				background-image: url('.esc_url(get_header_image()).');
				-webkit-background-size: cover !important;
				-moz-background-size: cover !important;
				-o-background-size: cover !important;
				background-size: cover !important;
			}';

	endif;

	wp_add_inline_style( 'omega-storefront-style', $omega_storefront_css );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}	

	wp_enqueue_script( 'imagesloaded' );
    wp_enqueue_script( 'masonry' );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/lib/swiper/js/swiper-bundle.min.js', array('jquery'), '', 1);
	wp_enqueue_script( 'omega-storefront-custom', get_template_directory_uri() . '/lib/custom/js/theme-custom-script.js', array('jquery'), '', 1);
	wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/lib/custom/js/owl.carousel.js', array('jquery'), '', 1);

    // Global Query
    if( is_front_page() ){

    	$omega_storefront_posts_per_page = absint( get_option('posts_per_page') );
        $omega_storefront_c_paged = ( get_query_var( 'page' ) ) ? absint( get_query_var( 'page' ) ) : 1;
        $omega_storefront_posts_args = array(
            'posts_per_page'        => $omega_storefront_posts_per_page,
            'paged'                 => $omega_storefront_c_paged,
        );
        $omega_storefront_posts_qry = new WP_Query( $omega_storefront_posts_args );
        $max = $omega_storefront_posts_qry->max_num_pages;

    }else{
        global $wp_query;
        $max = $wp_query->max_num_pages;
        $omega_storefront_c_paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    }

    $omega_storefront_default = omega_storefront_get_default_theme_options();
    $omega_storefront_pagination_layout = get_theme_mod( 'omega_storefront_pagination_layout',$omega_storefront_default['omega_storefront_pagination_layout'] );
}

add_action( 'wp_enqueue_scripts', 'omega_storefront_register_styles',200 );

function omega_storefront_admin_enqueue_scripts_callback() {
    if ( ! did_action( 'wp_enqueue_media' ) ) {
    wp_enqueue_media();
    }
    wp_enqueue_script('omega-storefront-uploaderjs', get_stylesheet_directory_uri() . '/lib/custom/js/uploader.js', array(), "1.0", true);
}
add_action( 'admin_enqueue_scripts', 'omega_storefront_admin_enqueue_scripts_callback' );

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function omega_storefront_menus() {

	$omega_storefront_locations = array(
		'omega-storefront-primary-menu'  => esc_html__( 'Primary Menu', 'omega-storefront' ),
	);

	register_nav_menus( $omega_storefront_locations );
}

add_action( 'init', 'omega_storefront_menus' );

add_filter('loop_shop_columns', 'omega_storefront_loop_columns');
if (!function_exists('omega_storefront_loop_columns')) {
	function omega_storefront_loop_columns() {
		$omega_storefront_columns = get_theme_mod( 'omega_storefront_per_columns', 3 );
		return $omega_storefront_columns;
	}
}

add_filter( 'loop_shop_per_page', 'omega_storefront_per_page', 20 );
function omega_storefront_per_page( $omega_storefront_cols ) {
  	$omega_storefront_cols = get_theme_mod( 'omega_storefront_product_per_page', 9 );
	return $omega_storefront_cols;
}

require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/classes/class-svg-icons.php';
require get_template_directory() . '/classes/class-walker-menu.php';
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/custom-functions.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/classes/body-classes.php';
require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/metabox.php';
require get_template_directory() . '/inc/pagination.php';
require get_template_directory() . '/lib/breadcrumbs/breadcrumbs.php';
require get_template_directory() . '/lib/custom/css/dynamic-style.php';
require get_template_directory() . '/inc/TGM/tgm.php';

/**
 * For Admin Page
 */
if (is_admin()) {
	require get_template_directory() . '/inc/get-started/get-started.php';
}

if (! defined( 'OMEGA_STOREFRONT_DOCS_PRO' ) ){
define('OMEGA_STOREFRONT_DOCS_PRO',__('https://layout.omegathemes.com/steps/pro-omega-storefront/','omega-storefront'));
}
if (! defined( 'OMEGA_STOREFRONT_BUY_NOW' ) ){
define('OMEGA_STOREFRONT_BUY_NOW',__('https://www.omegathemes.com/products/storefront-wordpress-theme','omega-storefront'));
}
if (! defined( 'OMEGA_STOREFRONT_SUPPORT_FREE' ) ){
define('OMEGA_STOREFRONT_SUPPORT_FREE',__('https://wordpress.org/support/theme/omega-storefront/','omega-storefront'));
}
if (! defined( 'OMEGA_STOREFRONT_REVIEW_FREE' ) ){
define('OMEGA_STOREFRONT_REVIEW_FREE',__('https://wordpress.org/support/theme/omega-storefront/reviews/#new-post','omega-storefront'));
}
if (! defined( 'OMEGA_STOREFRONT_DEMO_PRO' ) ){
define('OMEGA_STOREFRONT_DEMO_PRO',__('https://layout.omegathemes.com/omega-storefront/','omega-storefront'));
}
if (! defined( 'OMEGA_STOREFRONT_LITE_DOCS_PRO' ) ){
define('OMEGA_STOREFRONT_LITE_DOCS_PRO',__('https://layout.omegathemes.com/steps/free-omega-storefront/','omega-storefront'));
}

function omega_storefront_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'display_header_text' );
    $wp_customize->remove_control( 'display_header_text' );

}

add_action( 'customize_register', 'omega_storefront_remove_customize_register', 11 );

// Apply styles based on customizer settings

function omega_storefront_customizer_css() {
    ?>
    <style type="text/css">
        <?php
        $omega_storefront_footer_widget_background_color = get_theme_mod('omega_storefront_footer_widget_background_color');
        if ($omega_storefront_footer_widget_background_color) {
            echo '.footer-widgetarea { background-color: ' . esc_attr($omega_storefront_footer_widget_background_color) . '; }';
        }

        $omega_storefront_footer_widget_background_image = get_theme_mod('omega_storefront_footer_widget_background_image');
        if ($omega_storefront_footer_widget_background_image) {
            echo '.footer-widgetarea { background-image: url(' . esc_url($omega_storefront_footer_widget_background_image) . '); }';
        }
        $omega_storefront_copyright_font_size = get_theme_mod('omega_storefront_copyright_font_size');
        if ($omega_storefront_copyright_font_size) {
            echo '.footer-copyright { font-size: ' . esc_attr($omega_storefront_copyright_font_size) . 'px;}';
        }
        ?>
    </style>
    <?php
}
add_action('wp_head', 'omega_storefront_customizer_css');


function omega_storefront_radio_sanitize(  $omega_storefront_input, $omega_storefront_setting  ) {
	$omega_storefront_input = sanitize_key( $omega_storefront_input );
	$omega_storefront_choices = $omega_storefront_setting->manager->get_control( $omega_storefront_setting->id )->choices;
	return ( array_key_exists( $omega_storefront_input, $omega_storefront_choices ) ? $omega_storefront_input : $omega_storefront_setting->default );
}
require get_template_directory() . '/inc/general.php';