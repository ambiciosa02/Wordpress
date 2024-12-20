<?php
/**
 * Theme About Page
 *
 * @package Decorative
 * @since 1.0
 */

function decorative_theme_page_admin_style( $hook ) {
	if ( 'appearance_page_decorative-theme' === $hook ) {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_enqueue_style(
			'decorative-theme-admin-style',
			get_theme_file_uri( 'assets/css/about-admin.css' ),
			array(),
			$version_string
		);
	}
}
add_action( 'admin_enqueue_scripts', 'decorative_theme_page_admin_style' );

/**
 * Add theme page
 */
function decorative_menu() {
	add_theme_page( esc_html__( 'Decorative', 'decorative' ), esc_html__( 'Decorative Theme Info', 'decorative' ), 'edit_theme_options', 'decorative-theme', 'decorative_theme_page_display' );
}
add_action( 'admin_menu', 'decorative_menu' );

/**
 * Display About page
 */
function decorative_theme_page_display() {
	$theme = wp_get_theme();
	
	if ( is_child_theme() ) {
		$theme = wp_get_theme()->parent();
	}
	?>
	
	<div id="welcome-panel" class="welcome-panel">
		<div class="welcome-panel-content">
			<div class="welcome-panel-header">
				<h2><?php echo esc_html( $theme->Name ); ?></h2>
				<p><?php esc_html_e( 'Free Full Site Editing WordPress Theme', 'decorative' ); ?></p>
				<div class="logo-panel">
					<a href="<?php echo esc_url('https://flythemes.net/','decorative'); ?>"><img src="<?php echo esc_url( get_template_directory_uri().'/images/flylogo.png' ); ?>"></a>
				</div>
			</div>
			
			<div class="welcome-panel-column-container">
				<div class="container-wrap">
					<div class="welcome-panel-column two-columns">
						<!-- <div class="welcome-panel-icon-pages"></div> -->
						<div class="welcome-panel-column-content">
							<h3><?php esc_html_e( 'Getting Started with Decorative!', 'decorative' ); ?></h3>
							<p><?php esc_html_e( 'Awesome! Decorative has been installed and activated successfully. Now, you can start building your dream website with a wide range of highly-customizable block patterns, templates, and template parts available in this astounding theme.', 'decorative' ); ?></p>
						</div>
					</div>
					
					<div class="welcome-panel-column two-columns">
						<div class="welcome-panel-column-content">
							<h3><?php esc_html_e( 'More Features with Decorative Pro Theme', 'decorative' ); ?></h3>
							<p><?php esc_html_e( 'To get more features and unique home page sections, we recommend you activate the Decorative Pro. With the pro theme installed, get more options like google fonts, colors, sliders, page template, shortcodes and more.', 'decorative' ); ?></p>
							<a target="_blank" class="button green button-primary button-hero green" href=<?php echo esc_url("https://flythemes.net/wordpress-themes/decorative-wordpress-theme/"); ?>><?php esc_html_e( 'Buy Decorative Pro', 'decorative' ); ?></a>
						</div>
					</div>
					
				</div>
				<div class="sidebar">
					<div class="welcome-panel-column important-links">
					<!-- <div class="welcome-panel-icon-pages"></div> -->
					<div class="welcome-panel-column-content">
						<h3><?php esc_html_e( 'Important Links', 'decorative' ); ?></h3>
						<a target="_blank" href="<?php echo esc_url( 'https://flythemes.net/wordpress-themes/decorative-wordpress-theme/' ); ?>"><?php esc_html_e( 'Theme Info', 'decorative' ); ?></a>
						<a target="_blank" href="https://flydemos.net/decorative/"><?php esc_html_e( 'View Demo', 'decorative' ); ?></a>
						<a target="_blank" href="<?php echo esc_url( 'https://flythemes.net/forums/' ); ?>"><?php esc_html_e( 'Support', 'decorative' ); ?></a>
					</div>
				</div>
				
				<div class="welcome-panel-column review">
					<!-- <div class="welcome-panel-icon-pages"></div> -->
					<div class="welcome-panel-column-content">
						<h3><?php esc_html_e( 'Leave us a review', 'decorative' ); ?></h3>
						<p><?php esc_html_e( 'Loved Decorative? Feel free to leave your feedback. Your opinion helps us reach more audiences!', 'decorative' ); ?></p>
						<a href="https://wordpress.org/support/theme/decorative/reviews/" class="button button-primary button-hero" style="text-decoration: none;" target="_blank"><?php esc_html_e( 'Review', 'decorative' ); ?></a>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
