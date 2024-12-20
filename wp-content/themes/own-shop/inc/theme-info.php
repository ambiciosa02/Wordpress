<?php
/**
 * Theme information Own Shop
 *
 * @package own-shop
 */


 define('OWN_SHOP_THEME_URL','https://spiraclethemes.com/own-shop-free-wordpress-theme/');
 define('OWN_SHOP_THEME_PRO_URL','https://spiraclethemes.com/own-shop-pro-addons/');
 define('OWN_SHOP_THEME_DOC_URL','https://spiraclethemes.com/own-shop-documentation/');
 define('OWN_SHOP_THEME_VIDEOS_URL','https://spiraclethemes.com/own-shop-video-tutorials/');
 define('OWN_SHOP_THEME_SUPPORT_URL','https://wordpress.org/support/theme/own-shop/');
 define('OWN_SHOP_THEME_RATINGS_URL','https://wordpress.org/support/theme/own-shop/reviews/#new-post');
 define('OWN_SHOP_THEME_CHANGELOGS_URL','https://themes.trac.wordpress.org/log/own-shop/');
 define('OWN_SHOP_THEME_CONTACT_URL','https://spiraclethemes.com/contact/');
 


if ( ! class_exists( 'Own_Shop_About_Page' ) ) {
	/**
	 * Singleton class used for generating the about page of the theme.
	 */
	class Own_Shop_About_Page {
		/**
		 * Define the version of the class.
		 *
		 * @var string $version The Own_Shop_About_Page class version.
		 */
		private $version = '1.0.0';
		/**
		 * Used for loading the texts and setup the actions inside the page.
		 *
		 * @var array $config The configuration array for the theme used.
		 */
		private $config;
		/**
		 * Get the theme name using wp_get_theme.
		 *
		 * @var string $theme_name The theme name.
		 */
		private $theme_name;
		/**
		 * Get the theme slug ( theme folder name ).
		 *
		 * @var string $theme_slug The theme slug.
		 */
		private $theme_slug;
		/**
		 * The current theme object.
		 *
		 * @var WP_Theme $theme The current theme.
		 */
		private $theme;
		/**
		 * Holds the theme version.
		 *
		 * @var string $theme_version The theme version.
		 */
		private $theme_version;		
		/**
		 * Define the html notification content displayed upon activation.
		 *
		 * @var string $notification The html notification content.
		 */
		private $notification;
		/**
		 * The single instance of Own_Shop_About_Page
		 *
		 * @var Own_Shop_About_Page $instance The Own_Shop_About_Page instance.
		 */
		private static $instance;
		/**
		 * The Main Own_Shop_About_Page instance.
		 *
		 * We make sure that only one instance of Own_Shop_About_Page exists in the memory at one time.
		 *
		 * @param array $config The configuration array.
		 */
		public static function own_shop_init( $config ) {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Own_Shop_About_Page ) ) {
				self::$instance = new Own_Shop_About_Page;				
				self::$instance->config = $config;
				self::$instance->own_shop_setup_config();
			}
		}

		/**
		 * Setup the class props based on the config array.
		 */
		public function own_shop_setup_config() {
			$theme = wp_get_theme();
			if ( is_child_theme() ) {
				$this->theme_name = $theme->parent()->get( 'Name' );
				$this->theme      = $theme->parent();
			} else {
				$this->theme_name = $theme->get( 'Name' );
				$this->theme      = $theme->parent();
			}
			$this->theme_version = $theme->get( 'Version' );
			$this->theme_slug    = $theme->get_template();			
				
		}	
	}
}


/**
 *  Adding a About page 
 */
add_action('admin_menu', 'own_shop_add_menu');
function own_shop_add_menu() {
     add_theme_page(esc_html__('About Own Shop Theme','own-shop'), esc_html__('Own Shop Info','own-shop'),'manage_options', esc_html__('own-shop-theme-info','own-shop'), esc_html__('own_shop_theme_info','own-shop'));
}

/**
 *  Callback
 */
function own_shop_theme_info() {
	$theme = wp_get_theme();
?>
	<div class="theme-info">
		<div class="top-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="title">
							<h1><?php esc_html_e( 'Own Shop WordPress Theme', 'own-shop' ); ?> <span><?php echo $theme->get( 'Version' ); ?></span> </h1>
							<p><?php esc_html_e( '', 'own-shop' ); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="middle-section">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="quick-links">
							<h2><?php esc_html_e( 'Quick Customizer Settings', 'own-shop' ); ?> </h2>
							<div class="row">
								<div class="col-md-4">
									<div class="customizer-title">
										<h3>
											<span class="dashicons dashicons-format-image"></span>
											<a href="<?php echo esc_url(admin_url('customize.php?autofocus[control]=custom_logo')); ?>"> 
										        <?php esc_html_e('Upload Logo', 'own-shop'); ?> 
										    </a>
										</h3>
									</div>
								</div>
								<div class="col-md-4">
									<div class="customizer-title">
										<h3>
											<span class="dashicons dashicons-admin-tools"></span> 
											<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[panel]=own_shop_header_settings_panel')) ?>"> <?php esc_html_e( 'Header Settings', 'own-shop' ); ?> </a>
										</h3>
									</div>
								</div>
								<div class="col-md-4">
									<div class="customizer-title">
										<h3>
											<span class="dashicons dashicons-admin-customizer"></span> 
											<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[control]=own_shop_site_primary_color')) ?>"> <?php esc_html_e( 'Color Settings', 'own-shop' ); ?> </a>
										</h3>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="customizer-title">
										<h3>
											<span class="dashicons dashicons-media-default"></span> 
											<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[control]=own_shop_enable_page_title')) ?>"> <?php esc_html_e( 'Page Settings', 'own-shop' ); ?> </a>
										</h3>
									</div>
								</div>
								<div class="col-md-4">
									<div class="customizer-title">
										<h3>
											<span class="dashicons dashicons-columns"></span> 
											<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[control]=own_shop_footer_copyright_text')) ?>"> <?php esc_html_e( 'Footer Settings', 'own-shop' ); ?> </a>
										</h3>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="customizer-title">
										<h3>
											<span class="dashicons dashicons-image-filter"></span> 
											<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[control]=own_shop_enable_preloader')) ?>"> <?php esc_html_e( 'Preloader Settings', 'own-shop' ); ?> </a>
										</h3>
									</div>
								</div>
								<div class="col-md-4">
									<div class="customizer-title">
										<h3>
											<span class="dashicons dashicons-edit-large"></span> 
											<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[panel]=own_shop_blog_settings_panel')) ?>"> <?php esc_html_e( 'Blog Settings', 'own-shop' ); ?> </a>
										</h3>
									</div>
								</div>
								
							</div>
						</div>

						<div class="comp-box">
							<center><h2 class="table-heading"><?php esc_html_e( 'Why should you Upgrade to our PRO Addon ?', 'own-shop' ); ?></h2></center>
							<div class="comp-table">
								<table>
									<thead> 
										<tr> 
										 	<td class="thead-column1"><strong><h4><?php esc_html_e( 'Feature', 'own-shop' ); ?></h4></strong></td>
											<td class="thead-column2"><strong><h4><?php esc_html_e( 'Own Shop Free', 'own-shop' ); ?></h4></strong></td>
											<td class="thead-column3"><strong><h4><?php esc_html_e( 'Pro Addon Plugin', 'own-shop' ); ?></h4></strong></td>
										</tr> 
									</thead>
									<tbody>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Favicon, Logo, Title and Tagline Customization', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Customizer Theme Options', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( '2 Custom Widgets', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'WooCommerce', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Product Category Menu', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Menu Cart', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( '2 Layout Settings', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Top Bar', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Preloader', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Responsive Design', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'RTL Support', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Sidebar Options (Full, Left and Right)', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Gutenberg Compatible', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( '1 Click Demo Import', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Color Settings', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><?php esc_html_e( 'Limited', 'own-shop' ); ?></td>
						 					<td class="tbody-column3"><?php esc_html_e( 'Extended', 'own-shop' ); ?></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Light and Dark Mode', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( '800+ Google Fonts', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Social Sharing Icons', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Author Details in Single Post', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Author Widget with Social Icons', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>

										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'WooCommerce Extra Settings', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Products Wishlist', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Products Compare', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Sticky Header', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Breadcrumb Display', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Footer Editor', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Related Posts', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Header Slider', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Testimonial Slider', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Footer Columns Widgets', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( '4 Extra PRO Demos', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr>
										<tr> 
						 					<td class="tbody-column1"><?php esc_html_e( 'Priority Support', 'own-shop' ); ?></td>
						 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
						 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
										</tr> 
										<tr class="last-row"> 
						 					<td class="tbody-column1"></td>
						 					<td class="tbody-column2"></td>
						 					<td class="tbody-column3"><a class="button button-primary button-large" href="<?php echo esc_url(OWN_SHOP_THEME_PRO_URL); ?>" target="_blank"><?php esc_html_e( 'Upgrade to PRO', 'own-shop' ); ?></a></td>
										</tr> 
					   				</tbody>
								</table>
							</div>
						</div>
					</div>

					<div class="col-md-3 sidebar-right">
						<div class="sidebar">
							<div class="section-box first">
								<div class="icon">
									<span class="dashicons dashicons-visibility"></span>
								</div>
								<div class="heading">
									<h3><a href="<?php echo esc_url(OWN_SHOP_THEME_URL); ?>" target="_blank"><?php esc_html_e( 'VIEW DEMOS', 'own-shop' ); ?></a></h3>
								</div>	
							</div>	

							<div class="section-box">
								<div class="icon">
									<span class="dashicons dashicons-star-filled"></span>
								</div>
								<div class="heading">
									<h3><a href="<?php echo esc_url(OWN_SHOP_THEME_RATINGS_URL); ?>" target="_blank"><?php esc_html_e( 'RATE OUR THEME', 'own-shop' ); ?></a></h3>
								</div>						
							</div>

							<div class="section-box">
								<div class="icon">
									<span class="dashicons dashicons-format-aside"></span>
								</div>
								<div class="heading">
									<h3><a href="<?php echo esc_url(OWN_SHOP_THEME_DOC_URL); ?>" target="_blank"><?php esc_html_e( 'VIEW DOCUMENTATION', 'own-shop' ); ?></a></h3>
								</div>						
							</div>

							<div class="section-box">
								<div class="icon">
									<span class="dashicons dashicons-video-alt2"></span>
								</div>
								<div class="heading">
									<h3><a href="<?php echo esc_url(OWN_SHOP_THEME_VIDEOS_URL); ?>" target="_blank"><?php esc_html_e( 'VIDEO TUTORIALS', 'own-shop' ); ?></a></h3>
								</div>						
							</div>

							<div class="section-box">
								<div class="icon">
									<span class="dashicons dashicons-sos"></span>
								</div>
								<div class="heading">
									<h3><a href="<?php echo esc_url(OWN_SHOP_THEME_SUPPORT_URL); ?>" target="_blank"><?php esc_html_e( 'ASK FOR SUPPORT', 'own-shop' ); ?></a></h3>
								</div>						
							</div>

							<div class="section-box">
								<div class="icon">
									<span class="dashicons dashicons-admin-tools"></span>
								</div>
								<div class="heading">
									<h3><a href="<?php echo esc_url(OWN_SHOP_THEME_CHANGELOGS_URL); ?>" target="_blank"><?php esc_html_e( 'VIEW CHANGELOGS', 'own-shop' ); ?></a></h3>
								</div>						
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="title">
							<div class="review-content">
								<p><?php esc_html_e( ' Please ', 'own-shop' )  ?>
									<a href="<?php echo esc_url(OWN_SHOP_THEME_RATINGS_URL); ?>" target="_blank"><?php esc_html_e( 'rate our theme', 'own-shop' ); ?></a>
									<span>★★★★★</span>
									<?php esc_html_e( ' to help us spread the word. Thank you from the Spiracle Themes team!', 'own-shop' ); ?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</div>
<?php
}
