<?php
//about theme info
add_action( 'admin_menu', 'veterinary_shop_gettingstarted' );
function veterinary_shop_gettingstarted() {
	add_theme_page( esc_html__('Veterinary Shop', 'veterinary-shop'), esc_html__('Veterinary Shop', 'veterinary-shop'), 'edit_theme_options', 'veterinary_shop_about', 'veterinary_shop_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function veterinary_shop_admin_theme_style() {
	wp_enqueue_style('veterinary-shop-custom-admin-style', esc_url(get_template_directory_uri()) . '/includes/getstart/getstart.css');
	wp_enqueue_script('veterinary-shop-tabs', esc_url(get_template_directory_uri()) . '/includes/getstart/js/tab.js');
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
}
add_action('admin_enqueue_scripts', 'veterinary_shop_admin_theme_style');

// Changelog
if ( ! defined( 'VETERINARY_SHOP_CHANGELOG_URL' ) ) {
    define( 'VETERINARY_SHOP_CHANGELOG_URL', get_template_directory() . '/readme.txt' );
}

function veterinary_shop_changelog_screen() {	
	global $wp_filesystem;
	$veterinary_shop_changelog_file = apply_filters( 'veterinary_shop_changelog_file', VETERINARY_SHOP_CHANGELOG_URL );
	if ( $veterinary_shop_changelog_file && is_readable( $veterinary_shop_changelog_file ) ) {
		WP_Filesystem();
		$veterinary_shop_changelog = $wp_filesystem->get_contents( $veterinary_shop_changelog_file );
		$veterinary_shop_changelog_list = veterinary_shop_parse_changelog( $veterinary_shop_changelog );
		echo wp_kses_post( $veterinary_shop_changelog_list );
	}
}

function veterinary_shop_parse_changelog( $veterinary_shop_content ) {
	$veterinary_shop_content = explode ( '== ', $veterinary_shop_content );
	$veterinary_shop_changelog_isolated = '';
	foreach ( $veterinary_shop_content as $key => $veterinary_shop_value ) {
		if (strpos( $veterinary_shop_value, 'Changelog ==') === 0) {
	    	$veterinary_shop_changelog_isolated = str_replace( 'Changelog ==', '', $veterinary_shop_value );
	    }
	}
	$veterinary_shop_changelog_array = explode( '= ', $veterinary_shop_changelog_isolated );
	unset( $veterinary_shop_changelog_array[0] );
	$veterinary_shop_changelog = '<div class="changelog">';
	foreach ( $veterinary_shop_changelog_array as $veterinary_shop_value) {
		$veterinary_shop_value = preg_replace( '/\n+/', '</span><span>', $veterinary_shop_value );
		$veterinary_shop_value = '<div class="block"><span class="heading">= ' . $veterinary_shop_value . '</span></div><hr>';
		$veterinary_shop_changelog .= str_replace( '<span></span>', '', $veterinary_shop_value );
	}
	$veterinary_shop_changelog .= '</div>';
	return wp_kses_post( $veterinary_shop_changelog );
}

//guidline for about theme
function veterinary_shop_mostrar_guide() { 
	//custom function about theme customizer
	$veterinary_shop_return = add_query_arg( array()) ;
	$veterinary_shop_theme = wp_get_theme( 'veterinary-shop' );
?>

    <div class="top-head">
		<div class="top-title">
			<h2><?php esc_html_e( 'Veterinary Shop', 'veterinary-shop' ); ?></h2>
		</div>
		<div class="top-right">
			<span class="version"><?php esc_html_e( 'Version', 'veterinary-shop' ); ?>: <?php echo esc_html($veterinary_shop_theme['Version']);?></span>
		</div>
    </div>

    <div class="inner-cont">
	    <div class="tab-sec">
	    	<div class="tab">
				<button class="tablinks" onclick="veterinary_shop_open_tab(event, 'wpelemento_importer_editor')"><?php esc_html_e( 'Setup With Elementor', 'veterinary-shop' ); ?></button>
				<button class="tablinks" onclick="veterinary_shop_open_tab(event, 'setup_customizer')"><?php esc_html_e( 'Setup With Customizer', 'veterinary-shop' ); ?></button>
				<button class="tablinks" onclick="veterinary_shop_open_tab(event, 'changelog_cont')"><?php esc_html_e( 'Changelog', 'veterinary-shop' ); ?></button>
			</div>

			<div id="wpelemento_importer_editor" class="tabcontent open">
				<?php if(!class_exists('WPElemento_Importer_ThemeWhizzie')){
					$veterinary_shop_plugin_ins = Veterinary_Shop_Plugin_Activation_WPElemento_Importer::get_instance();
					$veterinary_shop_actions = $veterinary_shop_plugin_ins->veterinary_shop_recommended_actions;
					?>
					<div class="veterinary-shop-recommended-plugins ">
						<div class="veterinary-shop-action-list">
							<?php if ($veterinary_shop_actions): foreach ($veterinary_shop_actions as $veterinary_shop_key => $veterinary_shop_actionValue): ?>
									<div class="veterinary-shop-action" id="<?php echo esc_attr($veterinary_shop_actionValue['id']);?>">
										<div class="action-inner plugin-activation-redirect">
											<h3 class="action-title"><?php echo esc_html($veterinary_shop_actionValue['title']); ?></h3>
											<div class="action-desc"><?php echo esc_html($veterinary_shop_actionValue['desc']); ?></div>
											<?php echo wp_kses_post($veterinary_shop_actionValue['link']); ?>
										</div>
									</div>
								<?php endforeach;
							endif; ?>
						</div>
					</div>
				<?php }else{ ?>
					<div class="tab-outer-box">
						<h3><?php esc_html_e('Welcome to WPElemento Theme!', 'veterinary-shop'); ?></h3>
						<p><?php esc_html_e('Click on the quick start button to import the demo.', 'veterinary-shop'); ?></p>
						<div class="info-link">
							<a  href="<?php echo esc_url( admin_url('admin.php?page=wpelementoimporter-wizard') ); ?>"><?php esc_html_e('Quick Start', 'veterinary-shop'); ?></a>
						</div>
					</div>
				<?php } ?>
			</div>

			<div id="setup_customizer" class="tabcontent">
				<div class="tab-outer-box">
				  	<div class="lite-theme-inner">
						<h3><?php esc_html_e('Theme Customizer', 'veterinary-shop'); ?></h3>
						<p><?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'veterinary-shop'); ?></p>
						<div class="info-link">
							<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'veterinary-shop'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Help Docs', 'veterinary-shop'); ?></h3>
						<p><?php esc_html_e('The complete procedure to configure and manage a WordPress Website from the beginning is shown in this documentation .', 'veterinary-shop'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( VETERINARY_SHOP_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'veterinary-shop'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Need Support?', 'veterinary-shop'); ?></h3>
						<p><?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'veterinary-shop'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( VETERINARY_SHOP_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'veterinary-shop'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Reviews & Testimonials', 'veterinary-shop'); ?></h3>
						<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'veterinary-shop'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( VETERINARY_SHOP_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'veterinary-shop'); ?></a>
						</div>
						<hr>
						<div class="link-customizer">
							<h3><?php esc_html_e( 'Link to customizer', 'veterinary-shop' ); ?></h3>
							<div class="first-row">
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','veterinary-shop'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','veterinary-shop'); ?></a>
									</div>
								</div>
							
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=header_image') ); ?>" target="_blank"><?php esc_html_e('Header Image','veterinary-shop'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','veterinary-shop'); ?></a>
									</div>
								</div>
							</div>
						</div>
				  	</div>
				</div>
			</div>

			<div id="changelog_cont" class="tabcontent">
				<div class="tab-outer-box">
					<?php veterinary_shop_changelog_screen(); ?>
				</div>
			</div>			
		</div>

		<div class="inner-side-content">
			<h2><?php esc_html_e('Premium Theme', 'veterinary-shop'); ?></h2>
			<div class="tab-outer-box">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" alt="" />
				<h3><?php esc_html_e('Veterinary Shop WordPress Theme', 'veterinary-shop'); ?></h3>
				<div class="iner-sidebar-pro-btn">
					<span class="premium-btn"><a href="<?php echo esc_url( VETERINARY_SHOP_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Premium', 'veterinary-shop'); ?></a>
					</span>
					<span class="demo-btn"><a href="<?php echo esc_url( VETERINARY_SHOP_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'veterinary-shop'); ?></a>
					</span>
					<span class="doc-btn"><a href="<?php echo esc_url( VETERINARY_SHOP_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e('Theme Bundle', 'veterinary-shop'); ?></a>
					</span>
				</div>
				<hr>
				<div class="premium-coupon">
					<div class="premium-features">
						<h3><?php esc_html_e('premium Features', 'veterinary-shop'); ?></h3>
						<ul>
							<li><?php esc_html_e( 'Multilingual', 'veterinary-shop' ); ?></li>
							<li><?php esc_html_e( 'Drag and drop features', 'veterinary-shop' ); ?></li>
							<li><?php esc_html_e( 'Zero Coding Required', 'veterinary-shop' ); ?></li>
							<li><?php esc_html_e( 'Mobile Friendly Layout', 'veterinary-shop' ); ?></li>
							<li><?php esc_html_e( 'Responsive Layout', 'veterinary-shop' ); ?></li>
							<li><?php esc_html_e( 'Unique Designs', 'veterinary-shop' ); ?></li>
						</ul>
					</div>
					<div class="coupon-box">
						<h3><?php esc_html_e('Use Coupon Code', 'veterinary-shop'); ?></h3>
						<a class="coupon-btn" href="<?php echo esc_url( VETERINARY_SHOP_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('UPGRADE NOW', 'veterinary-shop'); ?></a>
						<div class="coupon-container">
							<h3><?php esc_html_e( 'elemento20', 'veterinary-shop' ); ?></h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php } ?>