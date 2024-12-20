<?php 


/**
 *  Defining Constants
 */

// Core Constants
define('OWN_SHOP_TREND_CONTAINER_CLASS', esc_html(get_theme_mod('own_shop_layout_content_width_ratio','os-container')));


/**
 * Own Shop Trend theme functions
 */	
function own_shop_trend_theme_setup(){

	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	//remove theme support for new widgets block editor
	remove_theme_support( 'widgets-block-editor' );
    
    remove_action( 'admin_menu', 'own_shop_add_menu' );
    remove_action( 'enqueue_block_editor_assets', 'own_shop_block_editor_width_styles' );
	add_action('wp_enqueue_scripts', 'own_shop_trend_load_scripts');

	/**
	* Adding translation file
	*/
	$path = get_stylesheet_directory().'/languages';
    load_child_theme_textdomain( 'own-shop-trend', $path );
}
add_action( 'after_setup_theme', 'own_shop_trend_theme_setup', 99 );



/**
 * Setting default theme mods value for child theme
 */
function own_shop_trend_set_default_theme_mods() {
	set_theme_mod('own_shop_site_primary_color', '#333333');
    set_theme_mod('own_shop_site_secondary_color', '#000000');
}
add_action('after_switch_theme', 'own_shop_trend_set_default_theme_mods');


/**
 * Load Scripts
 */
function own_shop_trend_load_scripts() {

	//dequeue parent blocks-frontend
	wp_dequeue_style( 'blocks-frontend' );
	
	wp_register_style( 'own-shop-trend-style' , trailingslashit(get_stylesheet_directory_uri()).'style.css', false, wp_get_theme()->get('Version'), 'all');
	wp_style_add_data( 'own-shop-trend-style', 'rtl', 'replace' );
	wp_enqueue_style( 'own-shop-trend-style' );

	if ( own_shop_trend_is_active_woocommerce() ) :
		wp_register_style( 'own-shop-trend-woocommerce-style', trailingslashit(get_stylesheet_directory_uri()) . 'css/woo-style.css', array(), wp_get_theme()->get('Version'));
    	wp_style_add_data( 'own-shop-trend-woocommerce-style', 'rtl', 'replace' );
		wp_enqueue_style( 'own-shop-trend-woocommerce-style' );
	endif;

}

/**
 * Display dynamic CSS.
 */
function own_shop_trend_dynamic_css_wrap() {
    require_once( get_stylesheet_directory(). '/css/dynamic.css.php' );
    ?>
       	<style type="text/css" id="own-shop-trend-dynamic-style">
        	<?php echo own_shop_trend_dynamic_css_stylesheet(); ?>
       	</style>
    <?php 
}
add_action( 'wp_head', 'own_shop_trend_dynamic_css_wrap',20 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function own_shop_trend_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Topbar Sidebar', 'own-shop-trend' ),
		'id'            => 'topsidebar',
		'description'   => esc_html__( 'Add widgets here.', 'own-shop-trend' ),
		'before_widget' => '<ul id="%1$s" class="widget %2$s">',
		'after_widget'  => '</ul>',
	) );
}
add_action( 'widgets_init', 'own_shop_trend_widgets_init', 20 );


/**
 * Adding class to body
 */
if ( ! function_exists( 'own_shop_trend_add_classes_to_body' ) ) :
function own_shop_trend_add_classes_to_body($classes = '') {
    return array_merge( $classes, array( 'own-shop-trend','layout-'.OWN_SHOP_TREND_CONTAINER_CLASS ) );
}
endif;
add_filter('body_class', 'own_shop_trend_add_classes_to_body');


/**
 * Function for Minimizing dynamic CSS
 */
function own_shop_trend_minimize_css($css){
    $css = preg_replace('/\/\*((?!\*\/).)*\*\//', '', $css);
    $css = preg_replace('/\s{2,}/', ' ', $css);
    $css = preg_replace('/\s*([:;{}])\s*/', '$1', $css);
    $css = preg_replace('/;}/', '}', $css);
    return $css;
}


/**
 * Add class to body
 */

function own_shop_trend_body_class_blocks( $classes ) {
	if ( is_singular() && has_blocks() && !is_single() ) {
		$classes[] = 'has-blocks';
	}
	return $classes;
}
add_filter( 'body_class', 'own_shop_trend_body_class_blocks' );



 /**
 * Register admin scripts
 */
function own_shop_trend_admin_scripts () {
    // admin css
    wp_enqueue_style( 'own-shop-trend-admin', trailingslashit(get_stylesheet_directory_uri()).'admin/admin.css', false, wp_get_theme()->get('Version'), 'all');
}
add_action('admin_enqueue_scripts', 'own_shop_trend_admin_scripts' );


/**
* Includes
*/

//include customizer
require_once( get_stylesheet_directory(). '/inc/customizer/customizer.php' );


//include template functions
require_once( get_stylesheet_directory(). '/inc/template-functions.php' );


//include template hooks
require_once( get_stylesheet_directory(). '/inc/template-hooks.php' );


/**
 * Upgrade to Pro
 */
require_once( get_stylesheet_directory(). '/own-shop-trend-pro/class-customize.php' );
