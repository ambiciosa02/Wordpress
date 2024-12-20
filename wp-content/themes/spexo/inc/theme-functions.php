<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Tmpcoder_Main_Class 
{
    /*
     * Call All The Functions Using add_filter and add_action
    */
    public function __construct()
    {   
        /**
         * Sets up theme defaults and registers support for various WordPress features.
         *
         * Note that this function is hooked into the after_setup_theme hook, which
         * runs before the init hook. The init hook is too late for some features, such
         * as indicating support for post thumbnails.
        */

        add_action( 'after_setup_theme', array($this,'tmpcoder_setup') );
        add_action( 'after_setup_theme', array($this,'tmpcoder_content_width'), 0 );

        /*
         * Enqueue css and js files
        */

        add_action( 'wp_enqueue_scripts', array($this,'tmpcoder_enqueue_styles_scripts') );

        /* For Menu Section */

        add_filter( 'walker_nav_menu_start_el', array($this,'tmpcoder_add_plus_icon_menu'),10,4);
        add_filter('wp_nav_menu',array($this,'tmpcoder_add_class_in_submenu')); 

        // When activate theme follow wizard process - only admin access
        if ( !isset($_GET['page']) || (isset($_GET['page']) && 'tmpcoder-plugin-wizard' != $_GET['page'] && 'tmpcoder-theme-wizard' != $_GET['page']) ){// phpcs:ignore WordPress.Security.NonceVerification.Recommended
        add_action( 'tgmpa_register', array($this,'tmpcoder_require_plugins') );
        }
        
        add_filter( 'body_class', array($this, 'tmpcoder_import_demo_body_class') );

        add_action( 'tmpcoder_wp_body_open', array($this,'tmpcoder_load_preloder') );
    }

    function tmpcoder_load_preloder(){

        if ( Tmpcoder_Site_Settings::tmpcoder_has('tmpcoder_pre_loder') && Tmpcoder_Site_Settings::tmpcoder_get('tmpcoder_pre_loder') == 1) { ?>
    
        <div id="preloader">
            <div class="preloader">
                <?php
                    if (Tmpcoder_Site_Settings::tmpcoder_has('tmpcoder_preloder_custom_html')) 
                    {
                        echo wp_kses_post(Tmpcoder_Site_Settings::tmpcoder_get('tmpcoder_preloder_custom_html'));
                    } 
                ?>
            </div>
        </div>
        <?php }    
    }

    function tmpcoder_import_demo_body_class( $classes ) {
        
        $import_demo_class = get_option('tmpcoder_current_active_demo', '');

        return array_merge( $classes, array( $import_demo_class ) );
    }
    
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function tmpcoder_setup()
    {
        /*
            * Make theme available for translation.
            * Translations can be filed in the /languages/ directory.
            * If you're building a theme based on Spexo, use a find and replace
            * to change 'spexo' to the name of your theme in all the template files.
        */

        load_theme_textdomain( 'spexo', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.

        add_theme_support( 'automatic-feed-links' );
        
        add_theme_support( 'title-tag' );

        register_block_pattern(
            'spexo/hello-world',
            array(
                'title'   => __( 'Section','spexo' ),
                'content' => "<!-- wp:paragraph -->\n<section>Hello World</section>\n<!-- /wp:paragraph -->",
            )
        );

        add_theme_support( 'post-thumbnails' );

        add_theme_support( 'custom-logo' );

        add_theme_support( 'custom-background' );

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
        
        add_theme_support( 'responsive-embeds' );

        add_theme_support( 'align-wide' );

        add_theme_support( 'wp-block-styles' );
        
        add_theme_support( 'woocommerce' );

        add_theme_support( 'wc-product-gallery-zoom' );

        add_theme_support( 'wc-product-gallery-lightbox' );
        
        add_theme_support( 'wc-product-gallery-slider' );

        add_theme_support( 'editor-styles' );
        
        add_editor_style(get_template_directory().'/editor-style.css');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'primary' => esc_html__( 'Primary','spexo' ),
                'footer_menu' => __( 'Footer Menu','spexo' ),
            )
        );

        /*
            * Switch default core markup for search form, comment form, and comments
            * to output valid HTML5.
        */

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'tmpcoder_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );
        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */

        add_theme_support(
            'custom-logo',
            array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );
    }

    /**
     * Set the content width in pixels, based on the theme's design and stylesheet.
     *
     * Priority 0 to make it available to lower priority callbacks.
     *
     * @global int $content_width
     */
    function tmpcoder_content_width() {
        $GLOBALS['content_width'] = apply_filters( 'tmpcoder_content_width', 640 );
    }

    /* Class Over */
    /*
    * Enqueue Scripts and styles
    */
    function tmpcoder_enqueue_styles_scripts()
    {
        if ( is_rtl() ){
            wp_enqueue_style( 'tmpcoder-style-rtl', get_template_directory_uri().'/assets/css/tmpcoder-style-rtl'.tmpcoder_min_suffix().'.css', array(), TMPCODER_THEME_CORE_VERSION );
        }

        wp_enqueue_style('tmpcoder-google-fonts', 'https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

        wp_enqueue_style('tmpcoder-theme', get_template_directory_uri().'/assets/css/tmpcoder-theme'.tmpcoder_min_suffix().'.css', array(), TMPCODER_THEME_CORE_VERSION, false);

        wp_enqueue_style( 'tmpcoder-style', get_stylesheet_uri(), array(), TMPCODER_THEME_CORE_VERSION );

        $tmpcoder_custom_css_option = get_option(TMPCODER_THEME_OPTION_NAME);
        $tmpcoder_custom_css = isset($tmpcoder_custom_css_option['tmpcoder_custom_css']) ? $tmpcoder_custom_css_option['tmpcoder_custom_css'] : '';
        
        $sanitized_custom_css = wp_strip_all_tags($tmpcoder_custom_css);
        if (!empty($sanitized_custom_css)) {
            wp_add_inline_style('tmpcoder-style', $sanitized_custom_css);
        }

        wp_enqueue_style('tmpcoder-wc-style', get_template_directory_uri() . '/assets/css/tmpcoder-wc-style'.tmpcoder_min_suffix().'.css', array(), TMPCODER_THEME_CORE_VERSION, false  );        
        wp_enqueue_script('tmpcoder-theme-script-js', get_template_directory_uri().'/assets/js/tmpcoder-theme-script'.tmpcoder_min_suffix().'.js', array('jquery'), TMPCODER_THEME_CORE_VERSION,true);

        wp_localize_script( 'tmpcoder-theme-script-js', 'tmpcoderAjaxObject', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }

    /* Add Required Or RECOMMENDED Plugins And Active */
    function tmpcoder_require_plugins() {

        $plugins = array(               
            array(
                'name'     => esc_html__( 'Elementor','spexo' ),
                'slug'     => 'elementor',
            ),
            array(
                'name'     => esc_html__('Spexo Addons for Elementor','spexo'), 
                'slug'     => 'sastra-essential-addons-for-elementor', 
            ),
            array(
                'name'     => esc_html__( 'Redux Framework','spexo' ),
                'slug'     => 'redux-framework',
            ),              
        );

        $config = array(
            'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '',                      // Default absolute path to bundled plugins.
            'menu'         => 'tgmpa-install-plugins', // Menu slug.
            'has_notices'  => true,                    // Show admin notices or not.
            'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => false,                   // Automatically activate plugins after installation or not.
            'message'      => '',                      // Message to output right before the plugins table.
        );
        tgmpa( $plugins, $config );
    }

    /*
    *
    * Add plus icon in menu for mobile view  
    *
    */
    function tmpcoder_add_plus_icon_menu( $output, $item, $depth, $args ){
        
        if (in_array("menu-item-has-children", $item->classes)) {
            $output .='<span class="opener plus"></span>';
        }
        return $output;
    }

    /* Add or change class on Sub Menu */
    function tmpcoder_add_class_in_submenu($menu) {  
        $menu = preg_replace('/class="sub-menu"/','class="transition"',$menu);        
        return $menu;      
    }
}

$obj = new Tmpcoder_Main_Class();

if ( ! class_exists( 'Tmpcoder_Site_Settings' ) ):
    class Tmpcoder_Site_Settings {
        static public function tmpcoder_is( $key, $compare ) {
            $value = self::tmpcoder_get( $key );
            return $value === $compare;
        }
        static public function tmpcoder_not( $key, $compare ) {
            $value = self::tmpcoder_get( $key );
            return $value !== $compare;
        }
        static public function tmpcoder_has( $key ) {
            $value = self::tmpcoder_get( $key );
            return ! empty( $value );
        }
        static public function tmpcoder_get( $key ) {
            global $tmpcoder_global_theme_options_spexo;
            if ( ! isset( $tmpcoder_global_theme_options_spexo ) ) {
                return null;
            }
            return isset( $tmpcoder_global_theme_options_spexo[ $key ] ) ? $tmpcoder_global_theme_options_spexo[ $key ] : null;
        }
        static public function tmpcoder_get_all_data() {
            global $tmpcoder_global_theme_options_spexo;
            if ( ! isset( $tmpcoder_global_theme_options_spexo ) ) {
                return null;
            }
            return $tmpcoder_global_theme_options_spexo;
        }
    }
endif;

function tmpcoder_get_blog_list()
{
    $comments = get_comments_number();
        
    ?>
        <div class="blog-list-box tmpcoder-blog-list">
            <div class="blog-list-img">
                <a href="<?php echo esc_url( get_permalink() ) ?>"><?php the_post_thumbnail('full',array('class' => 'transition'))  ?>
                </a>
            </div>
            <div class="blog-list-content">
                <h3 class="entry-title"><a href="<?php echo esc_url( get_permalink() ) ?>" class="blog-list-title"><?php the_title(); ?></a></h3>
                <ul class="blog-date blog-meta-options">
                    <?php 
                        $comments = get_comments_number(); 
                        if ($comments) { ?>
                        <li class="post-meta-item"><?php tmpcoder_posted_comments() ?></li>
                    <?php } ?>                 
                        <li class="post-meta-item"><?php tmpcoder_posted_by() ?></li>
                        <li class="post-meta-item"><?php tmpcoder_posted_on() ?></li>
                </ul>
                <p class="blog-des"><?php echo esc_html(get_the_excerpt()); ?></p>
                <a href="<?php echo esc_url( get_permalink() ) ?>" class="read-more"><?php esc_html_e('Read More','spexo') ?></a>
            </div>
        </div>
        
    <?php
}

function tmpcoder_get_single_blog()
{
    ?>
    <header class="page-header">
        <h1 class="entry-title"><?php the_title() ?></h1>
    </header>
    <div class="page-content">
        <div class="blog-detail-img">
            <?php the_post_thumbnail('full') ?>
        </div>
        <div class="blog-detail-content">
            <h3><?php the_title() ?></h3>
            <ul class="blog-date blog-meta-options">
                <?php 
                $comments = get_comments_number(); 
                if ($comments) { ?>
                    <li class="post-meta-item"><?php tmpcoder_posted_comments() ?></li>
                <?php } ?>                 
                    <li class="post-meta-item"><?php tmpcoder_posted_by() ?></li>
                    <li class="post-meta-item"><?php tmpcoder_posted_on() ?></li>
            </ul>
            <div class="blog-detail-description">
                <?php the_content() ?>
            </div>
        </div>
        
        <?php 
        $tags_list = tmpcoder_show_tags();
        if ( $tags_list != "" ){ ?>
        <div class="wp-post-tags">
            <span class="wp-tag-label"><?php echo esc_html('Tags:'); ?></span>
            <?php echo wp_kses_post($tags_list); ?>
        </div>
        <?php } ?>

        <div class="post-authr-box">
            <?php 
            $post_id = get_the_ID();
            $author_id =  get_post_field( 'post_author', $post_id );
            $avatar = get_avatar( $author_id, 264 );
            $name = get_the_author_meta( 'display_name', $author_id);            
            $title = '';
            $biography = get_the_author_meta( 'description', $author_id );
            $website = '';

            echo '<div class="tmpcoder-author-box">';

            // Avatar
            if ( false !== $avatar ) {
                echo '<div class="tmpcoder-author-box-image">';
                    if ( $website != '' ) {
                        echo '<a href="'. esc_url( $website ) .'">'. wp_kses_post($avatar) .'</a>';
                    } else {
                        echo wp_kses_post($avatar);
                    }
                echo '</div>';
            }

            // Wrap All Text Blocks
            echo '<div class="tmpcoder-author-box-text">';
            
            // Author Name
            if ( '' !== $name ) {
                echo '<h3 class="tmpcoder-author-box-name">';
                if ( $website != '' ) {
                        echo '<a href="'. esc_url( $website ) .'">'. esc_html($name) .'</a>';
                    } else {
                        echo esc_html($name);
                    }
                echo '</h3>';
            }

            if ( '' !== $biography ) {
                echo '<p class="tmpcoder-author-box-bio">'. wp_kses_post($biography) .'</p>';
            }

            echo '</div>'; // End .tmpcoder-author-box-text

        echo '</div>';
            ?>
            
        </div>

        <?php 
            
        if ( comments_open() || get_comments_number() ) :
            comments_template(); 
        endif;

    echo '</div>';

    do_action('tmpcoder_blog_related_posts');
}

/*
 * Custom pagination
*/

function tmpcoder_posts_pagination() {

    // Don't print empty markup if there's only one page.
    if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
        return;
    }

    $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
    $pagenum_link =  get_pagenum_link();
    $query_args   = array();
    $url_parts    = explode( '?', $pagenum_link );

    if ( isset( $url_parts[1] ) ) {
        wp_parse_str( $url_parts[1], $query_args );
    }

    $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
    $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
    $format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
    $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

    // Set up paginated links.
    $links = paginate_links( array(
        'base'     => $pagenum_link,
        'format'   => $format,
        'total'    => $GLOBALS['wp_query']->max_num_pages,
        'current'  => $paged,
        'aria_current'  => 'page',
        'mid_size' => 3,
        'add_args' => array_map( 'urlencode', $query_args ),
        'prev_text' => __( '<i class="fa fa-angle-left" aria-hidden="true"></i>','spexo' ),
        'next_text' => __( '<i class="fa fa-angle-right" aria-hidden="true"></i>','spexo' ),
        'type'      => 'list',
    ));

    if ( $links ) :
    ?>
    <div class="blog-list-pagination" role="navigation">
        <?php echo wp_kses_post(str_replace('<span aria-current="page" class="page-numbers current">'.esc_html($paged).'</span>','<a aria-current="page" class="page-numbers active">'.esc_html($paged).'</a>', $links )); ?>
    </div>
    <?php
    endif;
}

/**
 * Block Styles
 */
function tmpcoder_register_block_styles() {

    if ( function_exists( 'register_block_style' ) ) {

        register_block_style(
            'core/image',
            array(
                'name'  => 'bottom-right',
                'label' => __( 'Bottom Right','spexo' ),
            )
        );
        
        register_block_style(
            'core/image',
            array(
                'name'  => 'bottom-left',
                'label' => __( 'Bottom Left','spexo' ),
            )
        );

        register_block_style(
            'core/image',
            array(
                'name'  => 'center',
                'label' => __( 'Center','spexo' ),
            )
        );
    }
}
add_action( 'after_setup_theme', 'tmpcoder_register_block_styles' );

if ( !function_exists('tmpcoder_get_theme_logo') ){

    function tmpcoder_get_theme_logo(){
        if ( class_exists('Tmpcoder_Site_Settings') ){
            $tmpcoder_logo_image = Tmpcoder_Site_Settings::tmpcoder_get('tmpcoder_logo_image');
            $site_logo = ( Tmpcoder_Site_Settings::tmpcoder_has('tmpcoder_logo_image') ) ? $tmpcoder_logo_image['url'] : '';
            return $site_logo;
        }else{
            return '';
        }
    }
}

if ( !function_exists('tmpcoder_get_theme_text') ){
    
    function tmpcoder_get_theme_text(){
        if ( class_exists('Tmpcoder_Site_Settings') ){
            $site_logo = ( Tmpcoder_Site_Settings::tmpcoder_has('tmpcoder_get_theme_text') ) ? Tmpcoder_Site_Settings::tmpcoder_get('tmpcoder_get_theme_text') : '';
            return $site_logo;
        }else{
            return '';
        }
    }
}