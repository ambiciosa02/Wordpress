<?php
if ( ! function_exists( 'home_decor_shop_setup' ) ) :
function home_decor_shop_setup() {

	add_theme_support( "woocommerce" );	

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( "responsive-embeds" );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );
	
	
	add_theme_support( 'custom-header' );
	
	//Add selective refresh for sidebar widget
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary_menu' => esc_html__( 'Primary Menu', 'home-decor-shop' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	/*
	 * Enable support for custom logo.
	 */
	add_theme_support('custom-logo');
	
	remove_theme_support( 'widgets-block-editor' );

	// -- Disable Custom Colors
	add_theme_support( 'disable-custom-colors' );
		
	// Gutenberg wide images.
	add_theme_support( 'align-wide' );
		
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css' ) );
	
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'home_decor_shop_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'home_decor_shop_setup' );

/*
 * Enable support for Post Formats.
 *
 * See: https://codex.wordpress.org/Post_Formats
*/
add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

load_theme_textdomain( 'home-decor-shop', get_stylesheet_directory() . '/languages' );

// Change number or products per row to 3
add_filter('loop_shop_columns', 'home_decor_shop_loop_columns');
if (!function_exists('home_decor_shop_loop_columns')) {
    function home_decor_shop_loop_columns() {
        $columns = get_theme_mod( 'home_decor_shop_per_columns', 3 );
        return $columns;
    }
}

function home_decor_shop_customize_remove_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'display_header_text' );
    $wp_customize->remove_control( 'display_header_text' );
    
}
add_action( 'customize_register', 'home_decor_shop_customize_remove_register', 11 );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function home_decor_shop_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'home_decor_shop_content_width', 1170 );
}
add_action( 'after_setup_theme', 'home_decor_shop_content_width', 0 );

/**
 * All Styles & Scripts.
 */
require_once get_template_directory() . '/inc/enqueue.php';

/**
 * Implement the Custom Header feature.
 */
require_once get_template_directory() . '/inc/custom-header.php';

/**
 * Sidebar.
 */
require_once get_template_directory() . '/inc/sidebar/sidebar.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require_once get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
 require_once get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require_once get_template_directory() . '/inc/jetpack.php';

/**
 * Load Web Font
 */
require_once get_template_directory() . '/inc/wptt-webfont-loader.php';

/**
 * Load Recommended Plugin
 */
require_once get_template_directory() . '/inc/tgm-plugin/tgm.php';

/**
 * Called all the Customize file.
 */
require( get_template_directory() . '/inc/customize/premium.php');

/**
 * Get Started.
 */
require( get_template_directory() . '/inc/started/main.php');

/**
 * Admin notice function.
 */
require_once get_template_directory() . '/inc/admin-notice/admin.php';

/* 
* Logo Resizer
*/
function home_decor_shop_logo_resizer_setting() {

    $home_decor_shop_theme_logo_size_css = '';
    $home_decor_shop_logo_resizer_setting = get_theme_mod('home_decor_shop_logo_resizer_setting');

	$home_decor_shop_theme_logo_size_css = '
		.custom-logo{
			height: '.esc_attr($home_decor_shop_logo_resizer_setting).'px !important;
			width: '.esc_attr($home_decor_shop_logo_resizer_setting).'px !important;
		}
	';
    wp_add_inline_style( 'home-decor-shop-style',$home_decor_shop_theme_logo_size_css );

}
add_action( 'wp_enqueue_scripts', 'home_decor_shop_logo_resizer_setting' );

/**
 * Function that returns if the menu is sticky
 */
if (!function_exists('home_decor_shop_sticky_header')):
    function home_decor_shop_sticky_header()
    {
        $is_sticky = get_theme_mod('home_decor_shop_sticky_header_setting', false);

        if ($is_sticky == false):
            return 'not-sticky';
        else:
            return 'is-sticky-on';
        endif;
    }
endif;

$separator = ' → '; // Define the separator outside

function home_decor_shop_breadcrumb() {
    global $separator; // Make the separator accessible inside the function

    if (is_home()) {
        echo "<span>Home</span>";
    } else if (!is_home()) {
        echo '<a href="' . home_url() . '">Home</a>' . $separator;

        if (is_archive()) {
            if (is_category()) {
                // If it's a category archive page
                echo "<span>";
                single_cat_title();
                echo "</span>";
            } elseif (is_tag()) {
                // If it's a tag archive page
                echo "<span>";
                single_tag_title();
                echo "</span>";
            } elseif (is_date()) {
                // If it's a date-based archive page
                echo "<span>";
                echo get_the_date('F Y');
                echo "</span>";
            } elseif (is_author()) {
                echo '<span>Author: ';
                the_author();
                echo '</span>';
            } else {
                // For other archive pages
                echo post_type_archive_title() . $separator;
            }
        } elseif (is_single()) {
            // Check if it's a single product (or any custom post type)
            if ('product' === get_post_type()) {
                // WooCommerce product breadcrumb
                echo '<a href="' . get_permalink(wc_get_page_id('shop')) . '">Shop</a>' . $separator;
                echo "<span>";
                the_title();
                echo "</span>";
            } else {
                // For regular posts or categories
                the_category(', ');
                echo $separator; // Add the separator here
                echo "<span>";
                the_title();
                echo "</span>";
            }
        } elseif (is_page()) {
            // For regular pages
            echo "<span>";
            the_title();
            echo "</span>";
        } elseif (is_search()) {
            // Search results
            echo '<span>Search Results for: ' . get_search_query() . '</span>';
        } elseif (is_404()) {
            echo "<span>404</span>";
        } else {
            echo "<span>";
            the_title();
            echo "</span>";
        }
    }
}