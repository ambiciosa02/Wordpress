<?php

/**
 * Wizard
 *
 * @package Whizzie
 * @author Catapult Themes
 * @since 1.0.0
 */

class Whizzie {
	
	protected $version = '1.1.0';
	
	/** @var string Current theme name, used as namespace in actions. */
	protected $supermarket_shopping_theme_name = '';
	protected $supermarket_shopping_theme_title = '';
	
	/** @var string Wizard page slug and title. */
	protected $supermarket_shopping_page_slug = '';
	protected $supermarket_shopping_page_title = '';
	
	/** @var array Wizard steps set by user. */
	protected $config_steps = array();
	
	/**
	 * Relative plugin url for this plugin folder
	 * @since 1.0.0
	 * @var string
	 */
	protected $supermarket_shopping_plugin_url = '';

	public $supermarket_shopping_plugin_path;
	public $parent_slug;
	
	/**
	 * TGMPA instance storage
	 *
	 * @var object
	 */
	protected $tgmpa_instance;
	
	/**
	 * TGMPA Menu slug
	 *
	 * @var string
	 */
	protected $tgmpa_menu_slug = 'tgmpa-install-plugins';
	
	/**
	 * TGMPA Menu url
	 *
	 * @var string
	 */
	protected $tgmpa_url = 'themes.php?page=tgmpa-install-plugins';
	
	/**
	 * Constructor
	 *
	 * @param $config	Our config parameters
	 */
	public function __construct( $config ) {
		$this->set_vars( $config );
		$this->init();
	}
	
	/**
	 * Set some settings
	 * @since 1.0.0
	 * @param $config	Our config parameters
	 */
	public function set_vars( $config ) {
	
		require_once trailingslashit( WHIZZIE_DIR ) . 'tgm/class-tgm-plugin-activation.php';
		require_once trailingslashit( WHIZZIE_DIR ) . 'tgm/tgm.php';

		if( isset( $config['supermarket_shopping_page_slug'] ) ) {
			$this->supermarket_shopping_page_slug = esc_attr( $config['supermarket_shopping_page_slug'] );
		}
		if( isset( $config['supermarket_shopping_page_title'] ) ) {
			$this->supermarket_shopping_page_title = esc_attr( $config['supermarket_shopping_page_title'] );
		}
		if( isset( $config['steps'] ) ) {
			$this->config_steps = $config['steps'];
		}
		
		$this->supermarket_shopping_plugin_path = trailingslashit( dirname( __FILE__ ) );
		$relative_url = str_replace( get_template_directory(), '', $this->supermarket_shopping_plugin_path );
		$this->supermarket_shopping_plugin_url = trailingslashit( get_template_directory_uri() . $relative_url );
		$supermarket_shopping_current_theme = wp_get_theme();
		$this->supermarket_shopping_theme_title = $supermarket_shopping_current_theme->get( 'Name' );
		$this->supermarket_shopping_theme_name = strtolower( preg_replace( '#[^a-zA-Z]#', '', $supermarket_shopping_current_theme->get( 'Name' ) ) );
		$this->supermarket_shopping_page_slug = apply_filters( $this->supermarket_shopping_theme_name . '_theme_setup_wizard_supermarket_shopping_page_slug', $this->supermarket_shopping_theme_name . '-wizard' );
		$this->parent_slug = apply_filters( $this->supermarket_shopping_theme_name . '_theme_setup_wizard_parent_slug', '' );

	}
	
	/**
	 * Hooks and filters
	 * @since 1.0.0
	 */	
	public function init() {
		
		if ( class_exists( 'TGM_Plugin_Activation' ) && isset( $GLOBALS['tgmpa'] ) ) {
			add_action( 'init', array( $this, 'get_tgmpa_instance' ), 30 );
			add_action( 'init', array( $this, 'set_tgmpa_url' ), 40 );
		}
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_menu', array( $this, 'menu_page' ) );
		add_action( 'admin_init', array( $this, 'get_plugins' ), 30 );
		add_filter( 'tgmpa_load', array( $this, 'tgmpa_load' ), 10, 1 );
		add_action( 'wp_ajax_setup_plugins', array( $this, 'setup_plugins' ) );
		add_action( 'wp_ajax_setup_widgets', array( $this, 'setup_widgets' ) );
		
	}
	
	public function enqueue_scripts() {
		wp_enqueue_style( 'supermarket-shopping-demo-import-style', get_template_directory_uri() . '/demo-import/assets/css/demo-import-style.css');
		wp_register_script( 'supermarket-shopping-demo-import-script', get_template_directory_uri() . '/demo-import/assets/js/demo-import-script.js', array( 'jquery' ), time() );
		wp_localize_script( 
			'supermarket-shopping-demo-import-script',
			'whizzie_params',
			array(
				'ajaxurl' 		=> admin_url( 'admin-ajax.php' ),
				'wpnonce' 		=> wp_create_nonce( 'whizzie_nonce' ),
				'verify_text'	=> esc_html( 'verifying', 'supermarket-shopping' )
			)
		);
		wp_enqueue_script( 'supermarket-shopping-demo-import-script' );
	}
	
	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	
	public function tgmpa_load( $status ) {
		return is_admin() || current_user_can( 'install_themes' );
	}
			
	/**
	 * Get configured TGMPA instance
	 *
	 * @access public
	 * @since 1.1.2
	 */
	public function get_tgmpa_instance() {
		$this->tgmpa_instance = call_user_func( array( get_class( $GLOBALS['tgmpa'] ), 'get_instance' ) );
	}
	
	/**
	 * Update $tgmpa_menu_slug and $tgmpa_parent_slug from TGMPA instance
	 *
	 * @access public
	 * @since 1.1.2
	 */
	public function set_tgmpa_url() {
		$this->tgmpa_menu_slug = ( property_exists( $this->tgmpa_instance, 'menu' ) ) ? $this->tgmpa_instance->menu : $this->tgmpa_menu_slug;
		$this->tgmpa_menu_slug = apply_filters( $this->supermarket_shopping_theme_name . '_theme_setup_wizard_tgmpa_menu_slug', $this->tgmpa_menu_slug );
		$tgmpa_parent_slug = ( property_exists( $this->tgmpa_instance, 'parent_slug' ) && $this->tgmpa_instance->parent_slug !== 'themes.php' ) ? 'admin.php' : 'themes.php';
		$this->tgmpa_url = apply_filters( $this->supermarket_shopping_theme_name . '_theme_setup_wizard_tgmpa_url', $tgmpa_parent_slug . '?page=' . $this->tgmpa_menu_slug );
	}
	
	/**
	 * Make a modal screen for the wizard
	 */
	public function menu_page() {
		add_theme_page( esc_html( $this->supermarket_shopping_page_title ), esc_html( $this->supermarket_shopping_page_title ), 'manage_options', $this->supermarket_shopping_page_slug, array( $this, 'wizard_page' ) );
	}
	
	/**
	 * Make an interface for the wizard
	 */
	public function wizard_page() { 
		tgmpa_load_bulk_installer();

		if ( ! class_exists( 'TGM_Plugin_Activation' ) || ! isset( $GLOBALS['tgmpa'] ) ) {
			die( esc_html__( 'Failed to find TGM', 'supermarket-shopping' ) );
		}

		$url = wp_nonce_url( add_query_arg( array( 'plugins' => 'go' ) ), 'whizzie-setup' );
		$method = '';
		$fields = array_keys( $_POST );

		if ( false === ( $creds = request_filesystem_credentials( esc_url_raw( $url ), $method, false, false, $fields ) ) ) {
			return true;
		}

		if ( ! WP_Filesystem( $creds ) ) {
			request_filesystem_credentials( esc_url_raw( $url ), $method, true, false, $fields );
			return true;
		}

		$supermarket_shopping_theme = wp_get_theme();
		$supermarket_shopping_theme_title = $supermarket_shopping_theme->get( 'Name' );
		$supermarket_shopping_theme_version = $supermarket_shopping_theme->get( 'Version' );

		?>
		<div class="wrap">
			<?php 
			// Theme Title and Version
			printf( '<h1>%s %s</h1>', esc_html( $supermarket_shopping_theme_title ), esc_html( '(Version :- ' . $supermarket_shopping_theme_version . ')' ) );
			?>
			
			<div class="card whizzie-wrap">
				<div class="demo_content_image">
					<div class="demo_content">
						<?php

						$supermarket_shopping_steps = $this->get_steps();
						echo '<ul class="whizzie-menu">';
						foreach ( $supermarket_shopping_steps as $supermarket_shopping_step ) {
							$class = 'step step-' . esc_attr( $supermarket_shopping_step['id'] );
							echo '<li data-step="' . esc_attr( $supermarket_shopping_step['id'] ) . '" class="' . esc_attr( $class ) . '">';
							printf( '<h2>%s</h2>', esc_html( $supermarket_shopping_step['title'] ) );

							$content = call_user_func( array( $this, $supermarket_shopping_step['view'] ) );
							if ( isset( $content['summary'] ) ) {
								printf(
									'<div class="summary">%s</div>',
									wp_kses_post( $content['summary'] )
								);
							}
							if ( isset( $content['detail'] ) ) {
								printf( '<p><a href="#" class="more-info">%s</a></p>', esc_html__( 'More Info', 'supermarket-shopping' ) );
								printf(
									'<div class="detail">%s</div>',
									wp_kses_post( $content['detail'] )
								);
							}
							if ( isset( $supermarket_shopping_step['button_text'] ) && $supermarket_shopping_step['button_text'] ) {
								printf( 
									'<div class="button-wrap"><a href="#" class="button button-primary do-it" data-callback="%s" data-step="%s">%s</a></div>',
									esc_attr( $supermarket_shopping_step['callback'] ),
									esc_attr( $supermarket_shopping_step['id'] ),
									esc_html( $supermarket_shopping_step['button_text'] )
								);
							}
							if ( isset( $supermarket_shopping_step['can_skip'] ) && $supermarket_shopping_step['can_skip'] ) {
								printf( 
									'<div class="button-wrap" style="margin-left: 0.5em;"><a href="#" class="button button-secondary do-it" data-callback="%s" data-step="%s">%s</a></div>',
									esc_attr( 'do_next_step' ),
									esc_attr( $supermarket_shopping_step['id'] ),
									esc_html__( 'Skip', 'supermarket-shopping' )
								);
							}
							echo '</li>';
						}
						echo '</ul>';
						?>
						
						<ul class="whizzie-nav">
							<?php
							foreach ( $supermarket_shopping_steps as $supermarket_shopping_step ) {
								if ( isset( $supermarket_shopping_step['icon'] ) && $supermarket_shopping_step['icon'] ) {
									echo '<li class="nav-step-' . esc_attr( $supermarket_shopping_step['id'] ) . '"><span class="dashicons dashicons-' . esc_attr( $supermarket_shopping_step['icon'] ) . '"></span></li>';
								}
							}
							?>
						</ul>

						<div class="step-loading"><span class="spinner"></span></div>
					</div> <!-- .demo_content -->

					<div class="demo_image">
						<div class="demo_image buttons">
							<a href="<?php echo esc_url( SUPERMARKET_SHOPPING_PRO_THEME_URL ); ?>" class="button button-primary bundle" target="_blank"><?php echo esc_html__( 'Buy Now', 'supermarket-shopping' ); ?></a>
							<a href="<?php echo esc_url( SUPERMARKET_SHOPPING_THEME_BUNDLE_URL ); ?>" class="button button-primary bundle pro" target="_blank"><?php echo esc_html__( 'Buy All Themes', 'supermarket-shopping' ); ?></a>
							<a href="<?php echo esc_url( SUPERMARKET_SHOPPING_FREE_DOCS_THEME_URL ); ?>" target="_blank" class="button button-primary"><?php echo esc_html__( 'Free Documentation', 'supermarket-shopping' ); ?></a>
							<a href="<?php echo esc_url( SUPERMARKET_SHOPPING_SUPPORT_THEME_URL ); ?>" target="_blank" class="button button-primary"><?php echo esc_html__( 'Support', 'supermarket-shopping' ); ?></a>
						</div>
						<img src="<?php echo esc_url( get_template_directory_uri() . '/screenshot.png' ); ?>" alt="<?php echo esc_attr( $supermarket_shopping_theme_title ); ?>" />
					</div> <!-- .demo_image -->

				</div> <!-- .demo_content_image -->
			</div> <!-- .whizzie-wrap -->
		</div> <!-- .wrap -->
		<?php
	}


		
	/**
	 * Set options for the steps
	 * Incorporate any options set by the theme dev
	 * Return the array for the steps
	 * @return Array
	 */
	public function get_steps() {
		$supermarket_shopping_dev_steps = $this->config_steps;
		$supermarket_shopping_steps = array( 
			'intro' => array(
				'id'			=> 'intro',
				'title'			=> __( 'Welcome to ', 'supermarket-shopping' ) . $this->supermarket_shopping_theme_title,
				'icon'			=> 'dashboard',
				'view'			=> 'get_step_intro',
				'callback'		=> 'do_next_step',
				'button_text'	=> __( 'Start Now', 'supermarket-shopping' ),
				'can_skip'		=> false
			),
			'plugins' => array(
				'id'			=> 'plugins',
				'title'			=> __( 'Plugins', 'supermarket-shopping' ),
				'icon'			=> 'admin-plugins',
				'view'			=> 'get_step_plugins',
				'callback'		=> 'install_plugins',
				'button_text'	=> __( 'Install Plugins', 'supermarket-shopping' ),
				'can_skip'		=> true
			),
			'widgets' => array(
				'id'			=> 'widgets',
				'title'			=> __( 'Demo Importer', 'supermarket-shopping' ),
				'icon'			=> 'welcome-widgets-menus',
				'view'			=> 'get_step_widgets',
				'callback'		=> 'install_widgets',
				'button_text'	=> __( 'Import Demo Content', 'supermarket-shopping' ),
				'can_skip'		=> true
			),
			'done' => array(
				'id'			=> 'done',
				'title'			=> __( 'All Done', 'supermarket-shopping' ),
				'icon'			=> 'yes',
				'view'			=> 'get_step_done',
				'callback'		=> ''
			)
		);
		
		// Iterate through each step and replace with dev config values
		if( $supermarket_shopping_dev_steps ) {
			// Configurable elements - these are the only ones the dev can update from demo-import-settings.php
			$can_config = array( 'title', 'icon', 'button_text', 'can_skip' );
			foreach( $supermarket_shopping_dev_steps as $supermarket_shopping_dev_step ) {
				// We can only proceed if an ID exists and matches one of our IDs
				if( isset( $supermarket_shopping_dev_step['id'] ) ) {
					$id = $supermarket_shopping_dev_step['id'];
					if( isset( $supermarket_shopping_steps[$id] ) ) {
						foreach( $can_config as $element ) {
							if( isset( $supermarket_shopping_dev_step[$element] ) ) {
								$supermarket_shopping_steps[$id][$element] = $supermarket_shopping_dev_step[$element];
							}
						}
					}
				}
			}
		}
		return $supermarket_shopping_steps;
	}
	
	/**
	 * Print the content for the intro step
	 */
	public function get_step_intro() { ?>
		<div class="summary">
			<div class="steps_content">
				<p>
					<?php printf(
						/* translators: %s: Theme name. */
						esc_html__('Thank you for choosing the %s theme. You will only need a few minutes to configure and launch your new website with the help of this quick setup tutorial. To begin using your website, simply follow the wizard\'s instructions.', 'supermarket-shopping'),
						esc_html($this->supermarket_shopping_theme_title)
					); ?>
				</p>
			</div>
		</div>
	<?php }

	/**
	 * Get the content for the plugins step
	 * @return $content Array
	 */
	public function get_step_plugins() {
	$plugins = $this->get_plugins();
	$content = array(); ?>
		<div class="summary">
			<p>
				<?php esc_html_e('Additional plugins always make your website exceptional. Install these plugins by clicking the install button. You may also deactivate them from the dashboard.','supermarket-shopping') ?>
			</p>
		</div>
		<?php // The detail element is initially hidden from the user
		$content['detail'] = '<ul class="whizzie-do-plugins">';
		// Add each plugin into a list
		foreach( $plugins['all'] as $slug=>$plugin ) {
			$content['detail'] .= '<li data-slug="' . esc_attr( $slug ) . '">' . esc_html( $plugin['name'] ) . '<span>';
			$keys = array();
			if ( isset( $plugins['install'][ $slug ] ) ) {
				$keys[] = 'Installation';
			}
			if ( isset( $plugins['update'][ $slug ] ) ) {
				$keys[] = 'Update';
			}
			if ( isset( $plugins['activate'][ $slug ] ) ) {
				$keys[] = 'Activation';
			}
			$content['detail'] .= implode( ' and ', $keys ) . ' required';
			$content['detail'] .= '</span></li>';
		}
		$content['detail'] .= '</ul>';
		
		return $content;
	}
	
	/**
	 * Print the content for the widgets step
	 * @since 1.1.0
	 */
	public function get_step_widgets() { ?>
	<div class="summary">
		<p>
			<?php esc_html_e('This theme supports importing the demo content and adding widgets. Get them installed with the below button. Using the Customizer, it is possible to update or even deactivate them.','supermarket-shopping'); ?>
		</p>
	</div>
	<?php }
	
	/**
	 * Print the content for the final step
	 */
	public function get_step_done() { ?>
		<div id="supermarket-shopping-demo-setup-guid">
			<div class="customize_div"><?php echo esc_html( 'Now Customize your website' ); ?>
				<a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="customize_link">
					<?php echo esc_html( 'Customize ' ); ?> 
					<span class="dashicons dashicons-share-alt2"></span>
				</a>
			</div>
			<div class="supermarket-shopping-setup-finish">
				<a target="_blank" href="<?php echo esc_url( admin_url() ); ?>" class="button button-primary">
					<?php esc_html_e( 'Go To Dashboard', 'supermarket-shopping' ); ?>
				</a>
				<a target="_blank" href="<?php echo esc_url( get_home_url() ); ?>" class="button button-primary">
					<?php esc_html_e( 'Preview Site', 'supermarket-shopping' ); ?>
				</a>
			</div>
		</div>
	<?php }


	/**
	 * Get the plugins registered with TGMPA
	 */
	public function get_plugins() {
		$instance = call_user_func( array( get_class( $GLOBALS['tgmpa'] ), 'get_instance' ) );
		$plugins = array(
			'all' 		=> array(),
			'install'	=> array(),
			'update'	=> array(),
			'activate'	=> array()
		);
		foreach( $instance->plugins as $slug=>$plugin ) {
			if( $instance->is_plugin_active( $slug ) && false === $instance->does_plugin_have_update( $slug ) ) {
				// Plugin is installed and up to date
				continue;
			} else {
				$plugins['all'][$slug] = $plugin;
				if( ! $instance->is_plugin_installed( $slug ) ) {
					$plugins['install'][$slug] = $plugin;
				} else {
					if( false !== $instance->does_plugin_have_update( $slug ) ) {
						$plugins['update'][$slug] = $plugin;
					}
					if( $instance->can_plugin_activate( $slug ) ) {
						$plugins['activate'][$slug] = $plugin;
					}
				}
			}
		}
		return $plugins;
	}

	/**
	 * Get the widgets.wie file from the /content folder
	 * @return Mixed	Either the file or false
	 * @since 1.1.0
	 */
	public function has_widget_file() {
		if( file_exists( $this->widget_file_url ) ) {
			return true;
		}
		return false;
	}
	
	public function setup_plugins() {
		if ( ! check_ajax_referer( 'whizzie_nonce', 'wpnonce' ) || empty( $_POST['slug'] ) ) {
			wp_send_json_error( array( 'error' => 1, 'message' => esc_html__( 'No Slug Found','supermarket-shopping' ) ) );
		}
		$json = array();
		// send back some json we use to hit up TGM
		$plugins = $this->get_plugins();
		
		// what are we doing with this plugin?
		foreach ( $plugins['activate'] as $slug => $plugin ) {
			if ( $_POST['slug'] == $slug ) {
				$json = array(
					'url'           => admin_url( $this->tgmpa_url ),
					'plugin'        => array( $slug ),
					'tgmpa-page'    => $this->tgmpa_menu_slug,
					'plugin_status' => 'all',
					'_wpnonce'      => wp_create_nonce( 'bulk-plugins' ),
					'action'        => 'tgmpa-bulk-activate',
					'action2'       => - 1,
					'message'       => esc_html__( 'Activating Plugin','supermarket-shopping' ),
				);
				break;
			}
		}
		foreach ( $plugins['update'] as $slug => $plugin ) {
			if ( $_POST['slug'] == $slug ) {
				$json = array(
					'url'           => admin_url( $this->tgmpa_url ),
					'plugin'        => array( $slug ),
					'tgmpa-page'    => $this->tgmpa_menu_slug,
					'plugin_status' => 'all',
					'_wpnonce'      => wp_create_nonce( 'bulk-plugins' ),
					'action'        => 'tgmpa-bulk-update',
					'action2'       => - 1,
					'message'       => esc_html__( 'Updating Plugin','supermarket-shopping' ),
				);
				break;
			}
		}
		foreach ( $plugins['install'] as $slug => $plugin ) {
			if ( $_POST['slug'] == $slug ) {
				$json = array(
					'url'           => admin_url( $this->tgmpa_url ),
					'plugin'        => array( $slug ),
					'tgmpa-page'    => $this->tgmpa_menu_slug,
					'plugin_status' => 'all',
					'_wpnonce'      => wp_create_nonce( 'bulk-plugins' ),
					'action'        => 'tgmpa-bulk-install',
					'action2'       => - 1,
					'message'       => esc_html__( 'Installing Plugin','supermarket-shopping' ),
				);
				break;
			}
		}
		if ( $json ) {
			$json['hash'] = md5( serialize( $json ) ); // used for checking if duplicates happen, move to next plugin
			wp_send_json( $json );
		} else {
			wp_send_json( array( 'done' => 1, 'message' => esc_html__( 'Success','supermarket-shopping' ) ) );
		}
		exit;
	}


	public function supermarket_shopping_customizer_nav_menu() {

		// ---------------- Create Primary Menu ---------------- //

		$supermarket_shopping_themename = 'Supermarket Shopping';
		$supermarket_shopping_menuname = $supermarket_shopping_themename . ' Primary Menu';
		$supermarket_shopping_menulocation = 'primary';
		$supermarket_shopping_menu_exists = wp_get_nav_menu_object($supermarket_shopping_menuname);

		if (!$supermarket_shopping_menu_exists) {
			$supermarket_shopping_menu_id = wp_create_nav_menu($supermarket_shopping_menuname);

			// Home
			wp_update_nav_menu_item($supermarket_shopping_menu_id, 0, array(
				'menu-item-title' => __('Home', 'supermarket-shopping'),
				'menu-item-classes' => 'home',
				'menu-item-url' => home_url('/'),
				'menu-item-status' => 'publish'
			));

			// About
			$supermarket_shopping_page_about = get_page_by_path('about');
			if($supermarket_shopping_page_about){
				wp_update_nav_menu_item($supermarket_shopping_menu_id, 0, array(
					'menu-item-title' => __('About', 'supermarket-shopping'),
					'menu-item-classes' => 'about',
					'menu-item-url' => get_permalink($supermarket_shopping_page_about),
					'menu-item-status' => 'publish'
				));
			}

			// Services
			$supermarket_shopping_page_services = get_page_by_path('services');
			if($supermarket_shopping_page_services){
				wp_update_nav_menu_item($supermarket_shopping_menu_id, 0, array(
					'menu-item-title' => __('Services', 'supermarket-shopping'),
					'menu-item-classes' => 'services',
					'menu-item-url' => get_permalink($supermarket_shopping_page_services),
					'menu-item-status' => 'publish'
				));
			}

			// Blog
			$supermarket_shopping_page_blog = get_page_by_path('blog');
			if($supermarket_shopping_page_blog){
				wp_update_nav_menu_item($supermarket_shopping_menu_id, 0, array(
					'menu-item-title' => __('Blog', 'supermarket-shopping'),
					'menu-item-classes' => 'blog',
					'menu-item-url' => get_permalink($supermarket_shopping_page_blog),
					'menu-item-status' => 'publish'
				));
			}

			// 404 Page
			$supermarket_shopping_notfound = get_page_by_path('404 Page');
			if($supermarket_shopping_notfound){
				wp_update_nav_menu_item($supermarket_shopping_menu_id, 0, array(
					'menu-item-title' => __('404 Page', 'supermarket-shopping'),
					'menu-item-classes' => '404',
					'menu-item-url' => get_permalink($supermarket_shopping_notfound),
					'menu-item-status' => 'publish'
				));
			}

			// Contact Us
			$supermarket_shopping_page_contact = get_page_by_path('contact');
			if($supermarket_shopping_page_contact){
				wp_update_nav_menu_item($supermarket_shopping_menu_id, 0, array(
					'menu-item-title' => __('Contact Us', 'supermarket-shopping'),
					'menu-item-classes' => 'contact',
					'menu-item-url' => get_permalink($supermarket_shopping_page_contact),
					'menu-item-status' => 'publish'
				));
			}

			if (!has_nav_menu($supermarket_shopping_menulocation)) {
				$supermarket_shopping_locations = get_theme_mod('nav_menu_locations');
				$supermarket_shopping_locations[$supermarket_shopping_menulocation] = $supermarket_shopping_menu_id;
				set_theme_mod('nav_menu_locations', $supermarket_shopping_locations);
			}
		}
	}

	
	/**
	 * Imports the Demo Content
	 * @since 1.1.0
	 */
	public function setup_widgets(){

		//................................................. MENUS .................................................//
		
			// Creation of home page //
			$supermarket_shopping_home_content = '';
			$supermarket_shopping_home_title = 'Home';
			$supermarket_shopping_home = array(
					'post_type' => 'page',
					'post_title' => $supermarket_shopping_home_title,
					'post_content'  => $supermarket_shopping_home_content,
					'post_status' => 'publish',
					'post_author' => 1,
					'post_slug' => 'home'
			);
			$supermarket_shopping_home_id = wp_insert_post($supermarket_shopping_home);

			add_post_meta( $supermarket_shopping_home_id, '_wp_page_template', 'templates/template-frontpage.php' );

			$supermarket_shopping_home = get_page_by_title( 'Home' );
			update_option( 'page_on_front', $supermarket_shopping_home->ID );
			update_option( 'show_on_front', 'page' );

			// Creation of blog page //
			$supermarket_shopping_blog_title = 'Blog';
			$supermarket_shopping_blog_check = get_page_by_path('blog');
			if (!$supermarket_shopping_blog_check) {
				$supermarket_shopping_blog = array(
					'post_type'    => 'page',
					'post_title'   => $supermarket_shopping_blog_title,
					'post_status'  => 'publish',
					'post_author'  => 1,
					'post_name'    => 'blog'
				);
				$supermarket_shopping_blog_id = wp_insert_post($supermarket_shopping_blog);

				if (!is_wp_error($supermarket_shopping_blog_id)) {
					update_option('page_for_posts', $supermarket_shopping_blog_id);
				}
			}

			// Creation of contact us page //
			$supermarket_shopping_contact_title = 'Contact Us';
			$supermarket_shopping_contact_content = 'What is Lorem Ipsum?
														Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
														&nbsp;
														Why do we use it?
														It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
														&nbsp;
														Where does it come from?
														There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
														&nbsp;
														Why do we use it?
														It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
														&nbsp;
														Where does it come from?
														There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
			$supermarket_shopping_contact_check = get_page_by_path('contact');
			if (!$supermarket_shopping_contact_check) {
				$supermarket_shopping_contact = array(
					'post_type'    => 'page',
					'post_title'   => $supermarket_shopping_contact_title,
					'post_content'   => $supermarket_shopping_contact_content,
					'post_status'  => 'publish',
					'post_author'  => 1,
					'post_name'    => 'contact' // Unique slug for the Contact Us page
				);
				wp_insert_post($supermarket_shopping_contact);
			}

			// Creation of about page //
			$supermarket_shopping_about_title = 'About';
			$supermarket_shopping_about_content = 'What is Lorem Ipsum?
														Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
														&nbsp;
														Why do we use it?
														It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
														&nbsp;
														Where does it come from?
														There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
														&nbsp;
														Why do we use it?
														It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
														&nbsp;
														Where does it come from?
														There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
			$supermarket_shopping_about_check = get_page_by_path('about');
			if (!$supermarket_shopping_about_check) {
				$supermarket_shopping_about = array(
					'post_type'    => 'page',
					'post_title'   => $supermarket_shopping_about_title,
					'post_content'   => $supermarket_shopping_about_content,
					'post_status'  => 'publish',
					'post_author'  => 1,
					'post_name'    => 'about' // Unique slug for the About page
				);
				wp_insert_post($supermarket_shopping_about);
			}

			// Creation of services page //
			$supermarket_shopping_services_title = 'Services';
			$supermarket_shopping_services_content = 'What is Lorem Ipsum?
														Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
														&nbsp;
														Why do we use it?
														It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
														&nbsp;
														Where does it come from?
														There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
														&nbsp;
														Why do we use it?
														It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
														&nbsp;
														Where does it come from?
														There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
			$supermarket_shopping_services_check = get_page_by_path('services');
			if (!$supermarket_shopping_services_check) {
				$supermarket_shopping_services = array(
					'post_type'    => 'page',
					'post_title'   => $supermarket_shopping_services_title,
					'post_content'   => $supermarket_shopping_services_content,
					'post_status'  => 'publish',
					'post_author'  => 1,
					'post_name'    => 'services' // Unique slug for the Services page
				);
				wp_insert_post($supermarket_shopping_services);
			}

			// Creation of 404 page //
			$supermarket_shopping_notfound_title = '404 Page';
			$supermarket_shopping_notfound = array(
				'post_type'   => 'page',
				'post_title'  => $supermarket_shopping_notfound_title,
				'post_status' => 'publish',
				'post_author' => 1,
				'post_slug'   => '404'
			);
			$supermarket_shopping_notfound_id = wp_insert_post($supermarket_shopping_notfound);
			add_post_meta($supermarket_shopping_notfound_id, '_wp_page_template', '404.php');


			$supermarket_shopping_slider_title = 'Where Every Aisle is Packed with Savings.';
			$supermarket_shopping_slider_content = 'Free shipping an all your order.';
			$supermarket_shopping_slider_check = get_page_by_path('slider-page');

			// Check if the page already exists, if not, create the page
			if (!$supermarket_shopping_slider_check) {
				// Insert the page
				$supermarket_shopping_slider = array(
					'post_type'   => 'page',
					'post_title'  => $supermarket_shopping_slider_title,
					'post_content'  => $supermarket_shopping_slider_content,
					'post_status' => 'publish',
					'post_author' => 1,
					'post_name'   => 'slider-page'
				);
				
				// Insert the post (page)
				$page_id = wp_insert_post($supermarket_shopping_slider);
				
				// Get the image URL (replace 'slider.png' with the actual path to the image)
				$image_path = get_template_directory() . '/assets/images/slider.png';  // Path to your image in theme folder
				
				// If the image exists, upload it to the media library and set it as the featured image
				if (file_exists($image_path)) {
					// Upload the image
					$upload = wp_upload_bits('slider.png', null, file_get_contents($image_path));
					
					// Check if the upload was successful
					if (!$upload['error']) {
						// Create an attachment post
						$attachment = array(
							'guid' => $upload['url'], 
							'post_mime_type' => 'image/png',
							'post_title' => basename($image_path),
							'post_content' => '',
							'post_status' => 'inherit'
						);
						
						// Insert the attachment into the media library
						$attachment_id = wp_insert_attachment($attachment, $upload['file'], $page_id);
						
						// Generate the metadata for the attachment
						$attachment_data = wp_generate_attachment_metadata($attachment_id, $upload['file']);
						wp_update_attachment_metadata($attachment_id, $attachment_data);
						
						// Set the image as the featured image for the page
						set_post_thumbnail($page_id, $attachment_id);
					}
				}
			}


		/* -------------- Slider ------------------*/
	
			set_theme_mod('supermarket_shopping_topbar_text', 'Welcome to Worldwide Ecommerce Store');
			set_theme_mod('supermarket_shopping_about_us_text', 'About Us');
			set_theme_mod('supermarket_shopping_about_us_link', '#');
			set_theme_mod('supermarket_shopping_order_tracking_text', 'Order Tracking');
			set_theme_mod('supermarket_shopping_order_tracking_link', '#');

			
		/* -------------- Products ------------------*/

			$supermarket_shopping_uncategorized_term = get_term_by('name', 'Uncategorized', 'product_cat');
			if ($supermarket_shopping_uncategorized_term) {
				wp_delete_term($supermarket_shopping_uncategorized_term->term_id, 'product_cat');
			}

			$supermarket_shopping_product_category= array(
				'snacks' => array(
							'Lorem Ipsum is simply dummy 1',
							'Lorem Ipsum is simply dummy 2',
							'Lorem Ipsum is simply dummy 3',
							'Lorem Ipsum is simply dummy 4',
				),
				'fruits' => array(
				),
				'party snacks' => array(
				),
				'almonds' => array(
				),
				'vegetable' => array(
				),
				'biscuits' => array(
				)
			);
			$k = 1;
			foreach ( $supermarket_shopping_product_category as $supermarket_shopping_product_cats => $supermarket_shopping_products_name ) {

				// Insert porduct cats Start
				$content = 'Lorem ipsum dolor sit amet';
				$parent_category	=	wp_insert_term(
				$supermarket_shopping_product_cats, // the term
				'product_cat', // the taxonomy
				array(
					'description'=> $content,
					'slug' => 'product_cat'.$k
				));

				$image_url = get_template_directory_uri().'/assets/images/slider'.$k.'.png';

				$supermarket_shopping_image_name= 'slider'.$k.'.png';
				$upload_dir       = wp_upload_dir();
				// Set upload folder
				$supermarket_shopping_image_data= file_get_contents($image_url);
				// Get image data
				$unique_file_name = wp_unique_filename( $upload_dir['path'], $supermarket_shopping_image_name );
				// Generate unique name
				$filename= basename( $unique_file_name );
				// Create image file name

				// Check folder permission and define file location
				if( wp_mkdir_p( $upload_dir['path'] ) ) {
				$file = $upload_dir['path'] . '/' . $filename;
				} else {
				$file = $upload_dir['basedir'] . '/' . $filename;
				}

				// Create the image  file on the server
				if ( ! function_exists( 'WP_Filesystem' ) ) {
					require_once( ABSPATH . 'wp-admin/includes/file.php' );
				}
				
				WP_Filesystem();
				global $wp_filesystem;
				
				if ( ! $wp_filesystem->put_contents( $file, $supermarket_shopping_image_data, FS_CHMOD_FILE ) ) {
					wp_die( 'Error saving file!' );
				}
				
				// Check image file type
				$wp_filetype = wp_check_filetype( $filename, null );

				// Set attachment data
				$attachment = array(
				'post_mime_type' => $wp_filetype['type'],
				'post_title'     => sanitize_file_name( $filename ),
				'post_content'   => '',
				'post_type'     => 'product',
				'post_status'    => 'inherit'
				);

				// Create the attachment
				$attach_id = wp_insert_attachment( $attachment, $file, $post_id );

				// Include image.php
				require_once(ABSPATH . 'wp-admin/includes/image.php');

				// Define attachment metadata
				$attach_data = wp_generate_attachment_metadata( $attach_id, $file );

				// Assign metadata to attachment
				wp_update_attachment_metadata( $attach_id, $attach_data );

				update_woocommerce_term_meta( $parent_category['term_id'], 'thumbnail_id', $attach_id );

				// create Product START
				foreach ( $supermarket_shopping_products_name as $key => $supermarket_shopping_product_title ) {

					$content = 'Te obtinuit ut adepto satis somno.';
					// Create post object
					$my_post = array(
						'post_title'    => wp_strip_all_tags( $supermarket_shopping_product_title ),
						'post_content'  => $content,
						'post_status'   => 'publish',
						'post_type'     => 'product',
					);

					// Insert the post into the database
					$post_id    = wp_insert_post($my_post);

					wp_set_object_terms( $post_id, 'product_cat' . $k, 'product_cat', true );

					update_post_meta($post_id, '_regular_price', '52'); // Set regular price	
					update_post_meta($post_id, '_sale_price', '32'); // Set sale price
					update_post_meta($post_id, '_price', '32'); // Set current price (sale price is applied)

					// Now replace meta w/ new updated value array
					$image_url = get_template_directory_uri().'/assets/images/'.str_replace( " ", "-", $supermarket_shopping_product_title).'.png';

					echo $image_url . "<br>";

					$supermarket_shopping_image_name       = $supermarket_shopping_product_title.'.png';
					$upload_dir = wp_upload_dir();
					// Set upload folder
					$supermarket_shopping_image_data = file_get_contents(esc_url($image_url));

					// Get image data
					$unique_file_name = wp_unique_filename($upload_dir['path'], $supermarket_shopping_image_name);
					// Generate unique name
					$filename = basename($unique_file_name);
					// Create image file name

					// Check folder permission and define file location
					if (wp_mkdir_p($upload_dir['path'])) {
						$file = $upload_dir['path'].'/'.$filename;
					} else {
						$file = $upload_dir['basedir'].'/'.$filename;
					}

					// Create the image  file on the server
					if ( ! function_exists( 'WP_Filesystem' ) ) {
						require_once( ABSPATH . 'wp-admin/includes/file.php' );
					}
					
					WP_Filesystem();
					global $wp_filesystem;
					
					if ( ! $wp_filesystem->put_contents( $file, $supermarket_shopping_image_data, FS_CHMOD_FILE ) ) {
						wp_die( 'Error saving file!' );
					}

					// Check image file type
					$wp_filetype = wp_check_filetype($filename, null);

					// Set attachment data
					$attachment = array(
						'post_mime_type' => $wp_filetype['type'],
						'post_title'     => sanitize_file_name($filename),
						'post_type'      => 'product',
						'post_status'    => 'inherit',
					);

					// Create the attachment
					$attach_id = wp_insert_attachment($attachment, $file, $post_id);

					// Include image.php
					require_once (ABSPATH.'wp-admin/includes/image.php');

					// Define attachment metadata
					$attach_data = wp_generate_attachment_metadata($attach_id, $file);

					// Assign metadata to attachment
					wp_update_attachment_metadata($attach_id, $attach_data);

					// And finally assign featured image to post
					set_post_thumbnail($post_id, $attach_id);
				}
				// Create product END
				++$k;
			}


		/* -------------- Slider ------------------*/
	
			set_theme_mod('supermarket_shopping_slider_short_heading', 'Sale up to 30% OFF');
			set_theme_mod('supermarket_shopping_slider_btn_text', 'DISCOVER MORE');
			set_theme_mod('supermarket_shopping_slider_btn_link', '#');

			set_theme_mod('supermarket_shopping_discount_sale_img1', get_template_directory_uri().'/assets/images/service1.png');
			set_theme_mod('supermarket_shopping_topproduct_title1', 'SUMMER SALE');
			set_theme_mod('supermarket_shopping_product_sale_discount_title1', '75% OFF');
			set_theme_mod('supermarket_shopping_topproduct_content', 'Lorem Ipsum is simply dummy text industry.');
			set_theme_mod('supermarket_shopping_product_btn_text1', 'Shop Now');
			set_theme_mod('supermarket_shopping_product_btn_link1', '#');

			set_theme_mod('supermarket_shopping_discount_sale_img2', get_template_directory_uri().'/assets/images/service2.png');
			set_theme_mod('supermarket_shopping_topproduct_title2', 'SALE');
			set_theme_mod('supermarket_shopping_product_sale_discount_title2', 'Lorem Ipsum is simply dummy text industry.');
			set_theme_mod('supermarket_shopping_product_btn_text2', 'Shop Now');
			set_theme_mod('supermarket_shopping_product_btn_link2', '#');


		/* -------------- Products ------------------*/

			set_theme_mod('supermarket_shopping_our_products_heading_section', 'Best Seller');

        
        $this->supermarket_shopping_customizer_nav_menu();

	    exit;
	}
}