<?php
/**
 * Supermarket Shopping Theme Customizer.
 *
 * @package Supermarket Shopping
 */

 if ( ! class_exists( 'Supermarket_Shopping_Customizer' ) ) {

	/**
	 * Customizer Loader
	 *
	 * @since 1.0.0
	 */
	class Supermarket_Shopping_Customizer {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			/**
			 * Customizer
			 */
			add_action( 'customize_preview_init',                  array( $this, 'Supermarket_Shopping_Customize_preview_js' ) );
			add_action( 'customize_controls_enqueue_scripts', 	   array( $this, 'Supermarket_Shopping_Customizer_script' ) );
			add_action( 'customize_register',                      array( $this, 'Supermarket_Shopping_Customizer_register' ) );
			add_action( 'after_setup_theme',                       array( $this, 'Supermarket_Shopping_Customizer_settings' ) );
		}
		
		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		function Supermarket_Shopping_Customizer_register( $wp_customize ) {
			
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
			$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
			$wp_customize->get_setting('custom_logo')->transport = 'refresh';			
			
			/**
			 * Helper files
			 */
			require SUPERMARKET_SHOPPING_PARENT_INC_DIR . '/customizer/sanitization.php';
		} 
		
		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 */
		function Supermarket_Shopping_Customize_preview_js() {
			wp_enqueue_script( 'supermarket-shopping-customizer', SUPERMARKET_SHOPPING_PARENT_INC_URI . '/customizer/assets/js/customizer-preview.js', array( 'customize-preview' ), '20151215', true );
		}		
		
		function Supermarket_Shopping_Customizer_script() {
			 wp_enqueue_script( 'supermarket-shopping-customizer-section', SUPERMARKET_SHOPPING_PARENT_INC_URI .'/customizer/assets/js/customizer-section.js', array("jquery"),'', true  );
		}

		// Include customizer customizer settings.
			
		function Supermarket_Shopping_Customizer_settings() {
			require SUPERMARKET_SHOPPING_PARENT_INC_DIR . '/customizer/customizer-options/header.php';
			require SUPERMARKET_SHOPPING_PARENT_INC_DIR . '/customizer/customizer-options/upper-header.php';
			require SUPERMARKET_SHOPPING_PARENT_INC_DIR . '/customizer/customizer-options/frontpage.php';
			require SUPERMARKET_SHOPPING_PARENT_INC_DIR . '/customizer/customizer-options/footer.php';
			require SUPERMARKET_SHOPPING_PARENT_INC_DIR . '/customizer/customizer-options/post.php';
			require SUPERMARKET_SHOPPING_PARENT_INC_DIR . '/customizer/customizer-options/general.php';
			require SUPERMARKET_SHOPPING_PARENT_INC_DIR . '/customizer/customizer-pro/class-customize.php';
			require SUPERMARKET_SHOPPING_PARENT_INC_DIR . '/customizer/customizer-options/sidebar-option.php';
			require SUPERMARKET_SHOPPING_PARENT_INC_DIR . '/customizer/customizer-options/typography.php';
			require SUPERMARKET_SHOPPING_PARENT_INC_DIR . '/customizer/customizer-pro/customizer-upgrade-class.php';
		}

	}
}

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Supermarket_Shopping_Customizer::get_instance();