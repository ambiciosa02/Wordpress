<?php 
namespace Craftify;

require_once get_template_directory() . '/class/helper.php';

if( !class_exists( 'Craftify' ) ){
    class Theme extends Helper{

        protected static $instance = false;

        public static function get_instance(){

            if( !self::$instance ){
                self::$instance = new self();
            }

            return self::$instance;
        }

        public function __construct(){

            add_action( 'after_setup_theme', [ $this, 'support' ] );
            add_action( 'wp_enqueue_scripts', [ $this, 'scripts' ] );
            add_action( 'init', [ $this, 'pattern_categories' ] );

            // enqueue dashicons
            add_action( 'enqueue_block_assets', function (): void {
                wp_enqueue_style( 'dashicons' );
            });

            require get_template_directory() . '/inc/tgm-plugin/tgmpa-hook.php';

        }

        public function support(){

            add_editor_style( $this->get_uri( 'assets/css/editor.css' ) );

            load_theme_textdomain( 'craftify', $this->get_path( 'languages' ) );

            add_theme_support( 'wp-block-styles' );

            add_theme_support( 'post-thumbnails' );
        }


        public function scripts(){

            wp_enqueue_style('craftify-style', $this->get_uri( '/style.css' ));

            wp_enqueue_style( 'fontawesome', $this->get_uri( 'assets/vendor/font-awesome/css/all.min.css' ), [], '5.15.3' );

            wp_enqueue_script( 'custom-script',  $this->get_uri( 'assets/js/custom-script.js' ), [ 'jquery' ] );

            wp_enqueue_style( 'dashicons' );

        }

        public function pattern_categories() {
            register_block_pattern_category(
                'craftify',
                array(
                    'label'       => __( 'Craftify', 'craftify' ),
                    'description' => __( 'A collection of patterns.', 'craftify' ),
                )
            );
        }
    } 
}

function craftify(){
    return Theme::get_instance();
}
craftify();