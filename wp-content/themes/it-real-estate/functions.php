<?php
/**
 * Main functions.php file for IT Real Estate WordPress Theme
 */
if (!defined('ABSPATH')) {
    exit('No direct access allowed!');
}

class IT_Real_Estate {

    static private $instance;

    private function __construct() {

        if ( ! defined('ITREST_VERSION') ) {
            define( 'ITREST_VERSION', wp_get_theme()->get('Version') );
        }

        if ( ! defined('ITREST_PATH') ) {
            define( 'ITREST_PATH', get_stylesheet_directory() );
        }

        if ( ! defined('ITREST_URI') ) {
            define( 'ITREST_URI', get_stylesheet_directory_uri() );
        }

        // Including file overriding parent PHP functions
        require ITREST_PATH . '/inc/overrides.php';
        
        // Include Customizer Controls
        require ITREST_PATH . '/inc/customizer.php';
        
        add_action('wp_enqueue_scripts', [$this, 'itrest_enqueue_scripts']);
        add_action('wp_loaded', [$this, 'itrest_remove_ajax_functions']);
        add_action('wp_enqueue_scripts', [$this, 'itrest_deregister_scripts'], 100);
        add_action('pre_get_posts', [$this, 'itrest_filter_property_query']);

        add_filter('get_the_archive_title', [$this, 'itrest_filter_archive_title']);
    }

    static public function getInstance() {
        if (empty(self::$insance)) {
            self::$instance = new IT_Real_Estate();
        }

        return self::$instance;
    }

    /**
     * Enqueuing Child Theme Scripts and Styles
     *
     * @return  void  Enqueued Scripts and Styles
     */
    public function itrest_enqueue_scripts() {
        $parentStyle = 'itre-style';
        $parentMainStyle = 'itre-main';
        $theme = wp_get_theme();

        wp_enqueue_style( $parentStyle, esc_url(get_template_directory_uri() . '/style.css'), array(), $theme->parent()->get('Version') );
        wp_enqueue_style( $parentMainStyle, esc_url(get_template_directory_uri() . '/assets/theme-styles/css/main.min.css'), array(), $theme->parent()->get('Version') );
        wp_enqueue_style( 'itrest-style', esc_url(ITREST_URI . '/style.css'), array( $parentMainStyle ), $theme->get('Version') );
        wp_enqueue_style( 'itrest-main', esc_url(ITREST_URI . '/assets/css/main.css'), array( $parentMainStyle ), $theme->get('Version') );
    }

    /**
     * Remove the parent scripts
     *
     * @return  void
     */
    public function itrest_deregister_scripts() {
        wp_dequeue_script('itre-property-js');
        wp_deregister_script('itre-property-js');
    }

    /**
     * Remove AJAX functionality in parent theme
     *
     * @return  void
     */
    public function itrest_remove_ajax_functions() {
        remove_action('wp_ajax_filter_properties', 'itre_get_filtered_properties');
        remove_action('wp_ajax_nopriv_filter_properties', 'itre_get_filtered_properties');
        remove_action('itre_property_filter', 'itre_property_listing', 20);
        remove_action('itre_property_filter', 'itre_property_filter_form');
    }

    /**
     * Modify the $query main query to filter properties
     *
     * @param   WP_Query  $query  WP_Query Instance
     *
     * @return  void
     */
    public function itrest_filter_property_query( $query ) {
        if (!is_admin() && $query->is_main_query() && is_post_type_archive( 'property' )) {
            
            $tax_query = [];
            $meta_query = [];

            if (!empty($_GET['type'])) {
                $tax_query[] = array(
                    'taxonomy'  =>  'property-type',
                    'field'     =>  'slug',
                    'terms'     =>  $_GET['type']
                );
            }

            if (!empty($_GET['place'])) {
                $tax_query[] = array(
                    'taxonomy'  =>  'location',
                    'field'     =>  'slug',
                    'terms'     =>  [$_GET['place']]
                );
            }

            if (!empty($_GET['for'])) {
                $meta_query[] = array(
                    'key'       =>  'for',
                    'value'     =>  $_GET['for']
                );
            }
            

            if (!empty($tax_query)) {
                $query->set('tax_query', $tax_query);
            }
            
            if (!empty($meta_query)) {
                $query->set('meta_query', $meta_query);
            }
        }
    }

    /**
     * Filter the Property archive page title
     *
     * @param   string  $title  Archive page Title
     *
     * @return  string  $title  Filtered archive page title         
     */
    public function itrest_filter_archive_title($title) {

        // Only modify title if filter is used
        if (empty($_GET)) {
            return;
        }

        return __('Search Results', 'it-real-estate');
    }
}
$instance = IT_Real_Estate::getInstance();