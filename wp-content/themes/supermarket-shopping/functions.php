<?php
if ( ! function_exists( 'supermarket_shopping_setup' ) ) :
function supermarket_shopping_setup() {

// Root path/URI.
define( 'SUPERMARKET_SHOPPING_PARENT_DIR', get_template_directory() );
define( 'SUPERMARKET_SHOPPING_PARENT_URI', get_template_directory_uri() );

// Root path/URI.
define( 'SUPERMARKET_SHOPPING_PARENT_INC_DIR', SUPERMARKET_SHOPPING_PARENT_DIR . '/inc');
define( 'SUPERMARKET_SHOPPING_PARENT_INC_URI', SUPERMARKET_SHOPPING_PARENT_URI . '/inc');

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-slider' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );
	
	add_theme_support( 'custom-header' );

	add_theme_support( 'responsive-embeds' );
	
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	
	//Add selective refresh for sidebar widget
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'supermarket-shopping', get_stylesheet_directory() . '/languages' );
		
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'  => esc_html__( 'Primary Menu', 'supermarket-shopping' ),
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
		
	add_theme_support('custom-logo');

	/*
	 * WooCommerce Plugin Support
	 */
	add_theme_support( 'woocommerce' );
	
	// Gutenberg wide images.
	add_theme_support( 'align-wide' );
	
	
	//Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'supermarket_shopping_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css', supermarket_shopping_google_font_url() ) );

}
endif;
add_action( 'after_setup_theme', 'supermarket_shopping_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function supermarket_shopping_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'supermarket_shopping_content_width', 1170 );
}
add_action( 'after_setup_theme', 'supermarket_shopping_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function supermarket_shopping_widgets_init() {
	
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'supermarket-shopping' ),
		'id' => 'supermarket-shopping-sidebar-primary',
		'description' => __( 'The Primary Widget Area', 'supermarket-shopping' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4><div class="title"><span class="shap"></span></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'supermarket-shopping' ),
		'id' => 'supermarket-shopping-footer-widget-area',
		'description' => __( 'The Footer Widget Area', 'supermarket-shopping' ),
		'before_widget' => '<div class="footer-widget col-lg-3 col-sm-6 wow fadeIn" data-wow-delay="0.2s"><aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside></div>',
		'before_title' => '<h5 class="widget-title w-title">',
		'after_title' => '</h5><span class="shap"></span>',
	) );
}
add_action( 'widgets_init', 'supermarket_shopping_widgets_init' );

/**
 * All Styles & Scripts.
 */

require_once get_template_directory() . '/inc/enqueue.php';

/**
 * Nav Walker fo Bootstrap Dropdown Menu.
 */

require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Implement the Custom Header feature.
 */
require_once get_template_directory() . '/inc/custom-header.php';

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

require_once get_template_directory() . '/inc/fonts.php';

require_once get_template_directory() . '/wptt-webfont-loader.php';

/**
 * Load Theme About Page
 */
require get_parent_theme_file_path( '/inc/aboutthemes/about-theme.php' );

/**
 * Demo Import
 */
require get_parent_theme_file_path( '/demo-import/demo-import-settings.php' );

/*
 * Enable support for Post Formats.
 *
 * See: https://codex.wordpress.org/Post_Formats
*/
add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

function supermarket_shopping_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/customizer/customizer-custom-controls.php' );
}
add_action( 'customize_register', 'supermarket_shopping_custom_controls' );


add_filter( 'nav_menu_link_attributes', 'supermarket_shopping_dropdown_data_attribute', 20, 3 );
/**
 * Use namespaced data attribute for Bootstrap's dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array
 */
function supermarket_shopping_dropdown_data_attribute( $atts, $item, $args ) {
    if ( is_a( $args->walker, 'WP_Bootstrap_Navwalker' ) ) {
        if ( array_key_exists( 'data-toggle', $atts ) ) {
            unset( $atts['data-toggle'] );
            $atts['data-bs-toggle'] = 'dropdown';
        }
    }
    return $atts;
}

function supermarket_shopping_remove_theme_customizer_setting($wp_customize) {
    // Remove the setting
    $wp_customize->remove_setting('display_header_text');
    // Remove the control
    $wp_customize->remove_control('display_header_text');
}
add_action('customize_register', 'supermarket_shopping_remove_theme_customizer_setting', 20); 
// Use a priority greater than the one used for adding the setting


// Set the number of products per row to 3 on the shop page
add_filter('loop_shop_columns', 'supermarket_shopping_custom_shop_loop_columns');

if (!function_exists('supermarket_shopping_custom_shop_loop_columns')) {
    function supermarket_shopping_custom_shop_loop_columns() {
        // Retrieve the number of columns from theme customizer setting (default: 3)
        $supermarket_shopping_columns = get_theme_mod('supermarket_shopping_custom_shop_per_columns', 3);
        return $supermarket_shopping_columns;
    }
}

// Set the number of products per page on the shop page
add_filter('loop_shop_per_page', 'supermarket_shopping_custom_shop_per_page', 20);

if (!function_exists('supermarket_shopping_custom_shop_per_page')) {
    function supermarket_shopping_custom_shop_per_page($supermarket_shopping_products_per_page) {
        // Retrieve the number of products per page from theme customizer setting (default: 9)
        $supermarket_shopping_products_per_page = get_theme_mod('supermarket_shopping_custom_shop_product_per_page', 9);
        return $supermarket_shopping_products_per_page;
    }
}

/**
 * Generate Google fonts URL.
 */
function supermarket_shopping_google_font_url() {
    $font_family = array(
        'Inter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900'
    );

    $query_args = array(
        'family' => implode('|', $font_family), // No need for rawurlencode in this case
        'display' => 'swap' // Add display=swap to improve loading performance
    );

    return esc_url(add_query_arg($query_args, 'https://fonts.googleapis.com/css2')); // Use https://fonts.googleapis.com/css2 for variable fonts
}


/**
 * Enqueue theme styles and scripts.
 */
function supermarket_shopping_scripts_styles() {
    // Enqueue Google Fonts
    wp_enqueue_style('supermarket-shopping-google-fonts', supermarket_shopping_google_font_url(), array(), null);
    
    // Enqueue other styles and scripts as needed
    wp_enqueue_style('supermarket-shopping-main-style', get_stylesheet_uri(), array(), '1.0.0');
    // Add more enqueuing here if needed
}
add_action('wp_enqueue_scripts', 'supermarket_shopping_scripts_styles');

function supermarket_shopping_activation_notice() {
    // Check if the notice has already been dismissed
    if (get_option('supermarket_shopping_notice_dismissed')) {
        return;
    }

    // Avoid showing the notice on the demo import wizard page
    if (isset($_GET['page']) && $_GET['page'] === 'supermarketshopping-wizard') {
        return;
    }
    ?>
    <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
        <div class="supermarket-shopping-getting-started-notice clearfix">
            <div class="supermarket-shopping-theme-notice-content">
                <h2 class="supermarket-shopping-notice-h2">
                    <?php
                    printf(
                        /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                        esc_html__('Welcome! Thank you for choosing %1$s!', 'supermarket-shopping'), '<strong>' . wp_get_theme()->get('Name') . '</strong>'
                    );
                    ?>
                </h2>
                <a class="supermarket-shopping-btn-get-started button button-primary button-hero supermarket-shopping-button-padding" 
                    href="<?php echo esc_url(admin_url('themes.php?page=supermarketshopping-wizard')); ?>" 
                    id="supermarket-shopping-import-button">
                    <?php esc_html_e('One Click Demo Import', 'supermarket-shopping') ?>
                </a>
            </div>
        </div>
    </div>
    <?php
}

add_action('admin_notices', 'supermarket_shopping_activation_notice');

// Add Ajax action to handle dismiss
add_action('wp_ajax_supermarket_shopping_dismiss_notice', 'supermarket_shopping_dismiss_notice');

// Reset the dismissed status when the theme is activated
function supermarket_shopping_notice_status() {
    delete_option('supermarket_shopping_notice_dismissed');
}
add_action('after_switch_theme', 'supermarket_shopping_notice_status');

function supermarket_shopping_dismiss_notice() {
    // Update the option to mark the notice as dismissed
    update_option('supermarket_shopping_notice_dismissed', true);

    // Return a JSON response to indicate the success of the action
    wp_send_json_success();
}


function supermarket_shopping_customize_css() {
    ?>
    <style type="text/css">
        :root {
            --color-primary1: <?php echo esc_html( get_theme_mod( 'supermarket_shopping_dynamic_color_one', '#78B85D' ) ); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'supermarket_shopping_customize_css' );

/**
 * Enqueue theme copyright alignment style.
 */
function supermarket_shopping_copyright_alignment_option() {
    // Get the alignment setting from the theme customizer.
    $supermarket_shopping_copyright_alignment = get_theme_mod('supermarket_shopping_copyright_alignment', 'center');

    // Start building the CSS string for the alignment.
    $supermarket_shopping_copyright_alignment_css = '
        p.copyright-text{
            text-align: ' . esc_attr($supermarket_shopping_copyright_alignment) . ';
        }
    ';

    // Add the inline style to the theme's main stylesheet.
    wp_add_inline_style('supermarket-shopping-style', $supermarket_shopping_copyright_alignment_css);
}

add_action('wp_enqueue_scripts', 'supermarket_shopping_copyright_alignment_option');

// Sanitize the input
function supermarket_shopping_sanitize_sidebar_position( $input ) {
    $valid = array( 'right', 'left' );

    if ( in_array( $input, $valid ) ) {
        return $input;
    } else {
        return 'right';
    }
}

// Helper function to get page ID by slug
function get_page_id_by_slug($slug) {
    $page = get_page_by_path($slug); // Get the page by slug
    return $page ? $page->ID : 0;   // Return the page ID or 0 if not found
}