<?php
/**
* Get started notice
*/
add_action( 'wp_ajax_interior_decor_consultation_dismissed_notice_handler', 'interior_decor_consultation_ajax_notice_handler' );

function interior_decor_consultation_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function interior_decor_consultation_deprecated_hook_admin_notice() {
    if ( ! get_option('dismissed-get_started', FALSE ) ) { ?>
        <?php
        require_once get_template_directory() .'/core/includes/demo-import.php';
        $current_screen = get_current_screen();
			if ($current_screen->id !== 'appearance_page_interior-decor-consultation-guide-page') {
         $interior_decor_consultation_comments_theme = wp_get_theme(); ?>
        <div class="interior-decor-consultation-notice-wrapper updated notice notice-get-started-class is-dismissible" data-notice="get_started">
		<div class="interior-decor-consultation-notice">
			<div class="interior-decor-consultation-notice-img">
				<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/admin-logo.png'); ?>" alt="<?php esc_attr_e('logo', 'interior-decor-consultation'); ?>">
			</div>
			<div class="interior-decor-consultation-notice-content">
				<div class="interior-decor-consultation-notice-heading"><?php esc_html_e('Thanks for installing ','interior-decor-consultation'); ?><?php echo esc_html( $interior_decor_consultation_comments_theme ); ?> <?php esc_html_e('Theme','interior-decor-consultation'); ?></div>
				<p><?php echo esc_html__('Get started with the wordpress theme installation','interior-decor-consultation'); ?></p>
				<div class="diplay-flex-btn">
					<a class="button button-primary" href="<?php echo esc_url(admin_url('themes.php?page=interior-decor-consultation-guide-page')); ?>"><?php echo esc_html__('More Option','interior-decor-consultation'); ?></a>
					<?php if(isset($_GET['import-demo']) && $_GET['import-demo'] == true){ ?>
			    		<a class="button button-success" href="<?php echo esc_url(home_url()); ?>" target="_blank"><?php echo esc_html__('Go to Homepage','interior-decor-consultation'); ?></a> <span class="imp-success"><?php echo esc_html__('Imported Successfully','interior-decor-consultation'); ?></span>
			    	<?php } else { ?>
					<form id="demo-importer-form" action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.phps" method="POST">
			        	<input  type="submit" name="submit" value="<?php esc_attr_e('Demo Import','interior-decor-consultation'); ?>" class="button button-primary">
			    	</form>
			    	<?php } ?>
				</div>
			</div>
		</div>
	</div>
    <?php }
	}
}
add_action( 'admin_notices', 'interior_decor_consultation_deprecated_hook_admin_notice' );

add_action( 'admin_menu', 'interior_decor_consultation_getting_started' );
function interior_decor_consultation_getting_started() {
	add_theme_page( esc_html__('Get Started', 'interior-decor-consultation'), esc_html__('Get Started', 'interior-decor-consultation'), 'edit_theme_options', 'interior-decor-consultation-guide-page', 'interior_decor_consultation_test_guide');	
}

function interior_decor_consultation_admin_enqueue_scripts() {
	wp_enqueue_style( 'interior-decor-consultation-admin-style', esc_url( get_template_directory_uri() ).'/css/main.css' );
	wp_enqueue_script( 'interior-decor-consultation-admin-script', get_template_directory_uri() . '/js/interior-decor-consultation-admin-script.js', array( 'jquery' ), '', true );
    wp_localize_script( 'interior-decor-consultation-admin-script', 'interior_decor_consultation_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
    wp_enqueue_script( 'interior-decor-consultation-demo-script', get_template_directory_uri() . '/js/demo-script.js', array( 'jquery' ), '', true );
}
add_action( 'admin_enqueue_scripts', 'interior_decor_consultation_admin_enqueue_scripts' );


if ( ! defined( 'INTERIOR_DECOR_CONSULTATION_DOCS_FREE' ) ) {
define('INTERIOR_DECOR_CONSULTATION_DOCS_FREE',__('https://demo.misbahwp.com/docs/interior-decor-consultation-free-docs/','interior-decor-consultation'));
}
 if ( ! defined( 'INTERIOR_DECOR_CONSULTATION_DOCS_PRO' ) ) {
define('INTERIOR_DECOR_CONSULTATION_DOCS_PRO',__('https://demo.misbahwp.com/docs/interior-decor-consultation-pro-docs/','interior-decor-consultation'));
}
if ( ! defined( 'INTERIOR_DECOR_CONSULTATION_BUY_NOW' ) ) {
define('INTERIOR_DECOR_CONSULTATION_BUY_NOW',__('https://www.misbahwp.com/products/interior-decor-consultation-wordpress-theme','interior-decor-consultation'));
}
if ( ! defined( 'INTERIOR_DECOR_CONSULTATION_SUPPORT_FREE' ) ) {
define('INTERIOR_DECOR_CONSULTATION_SUPPORT_FREE',__('https://wordpress.org/support/theme/interior-decor-consultation','interior-decor-consultation'));
}
if ( ! defined( 'INTERIOR_DECOR_CONSULTATION_REVIEW_FREE' ) ) {
define('INTERIOR_DECOR_CONSULTATION_REVIEW_FREE',__('https://wordpress.org/support/theme/interior-decor-consultation/reviews/#new-post','interior-decor-consultation'));
}
if ( ! defined( 'INTERIOR_DECOR_CONSULTATION_DEMO_PRO' ) ) {
define('INTERIOR_DECOR_CONSULTATION_DEMO_PRO',__('https://demo.misbahwp.com/interior-decor-consultation/','interior-decor-consultation'));
}
if( ! defined( 'INTERIOR_DECOR_CONSULTATION_THEME_BUNDLE' ) ) {
define('INTERIOR_DECOR_CONSULTATION_THEME_BUNDLE',__('https://www.misbahwp.com/products/wordpress-bundle','interior-decor-consultation'));
}

function interior_decor_consultation_test_guide() { 
	$interior_decor_consultation_theme = wp_get_theme();
	require_once get_template_directory() .'/core/includes/demo-import.php';
	?>
	<div class="wrap" id="main-page">
		<div id="lefty">
			<div id="admin_links">
				<a href="<?php echo esc_url( INTERIOR_DECOR_CONSULTATION_DOCS_FREE ); ?>" target="_blank" class="blue-button-1"><?php esc_html_e( 'Documentation', 'interior-decor-consultation' ) ?></a>
				<a href="<?php echo esc_url( admin_url('customize.php') ); ?>" id="customizer" target="_blank"><?php esc_html_e( 'Customize', 'interior-decor-consultation' ); ?> </a>
				<a class="blue-button-1" href="<?php echo esc_url( INTERIOR_DECOR_CONSULTATION_SUPPORT_FREE ); ?>" target="_blank" class="btn3"><?php esc_html_e( 'Support', 'interior-decor-consultation' ) ?></a>
				<a class="blue-button-2" href="<?php echo esc_url( INTERIOR_DECOR_CONSULTATION_REVIEW_FREE ); ?>" target="_blank" class="btn4"><?php esc_html_e( 'Review', 'interior-decor-consultation' ) ?></a>
			</div>
			<div id="description">
				<h3><?php esc_html_e('Welcome! Thank you for choosing ','interior-decor-consultation'); ?><?php echo esc_html( $interior_decor_consultation_theme ); ?>  <span><?php esc_html_e('Version: ', 'interior-decor-consultation'); ?><?php echo esc_html($interior_decor_consultation_theme['Version']);?></span></h3>
				<div class="demo-import-box">
					<h4><?php echo esc_html__('Import homepage demo in just one click.','interior-decor-consultation'); ?></h4>
					<p><?php echo esc_html__('Get started with the wordpress theme installation','interior-decor-consultation'); ?></p>
					<?php if(isset($_GET['import-demo']) && $_GET['import-demo'] == true){ ?>
			    		<span class="imp-success"><?php echo esc_html__('Imported Successfully','interior-decor-consultation'); ?></span>  <a class="button button-success" href="<?php echo esc_url(home_url()); ?>" target="_blank"><?php echo esc_html__('Go to Homepage','interior-decor-consultation'); ?></a>
			    	<?php } else { ?>
					<form id="demo-importer-form" action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.phps" method="POST">
			        	<input  type="submit" name="submit" value="<?php esc_attr_e('Demo Import','interior-decor-consultation'); ?>" class="button button-primary">
			    	</form>
			    	<?php } ?>
				</div>
				<img class="img_responsive" style="width: 100%;" src="<?php echo esc_url( $interior_decor_consultation_theme->get_screenshot() ); ?>" />
				<div id="description-insidee">
					<?php
						$interior_decor_consultation_theme = wp_get_theme();
						echo wp_kses_post( apply_filters( 'misbah_theme_description', esc_html( $interior_decor_consultation_theme->get( 'Description' ) ) ) );
					?>
				</div>
			</div>
		</div>

		<div id="righty">
			<div class="volleyball-postboxx">
				<h3 class="hndle"><?php esc_html_e( 'Upgrade to Premium', 'interior-decor-consultation' ); ?></h3>
				<div class="volleyball-insidee">
					<p><?php esc_html_e('Discover upgraded pro features with premium version click to upgrade.','interior-decor-consultation'); ?></p>
					<div id="admin_pro_links">
						<a class="blue-button-2" href="<?php echo esc_url( INTERIOR_DECOR_CONSULTATION_BUY_NOW ); ?>" target="_blank"><?php esc_html_e( 'Go Pro', 'interior-decor-consultation' ); ?></a>
						<a class="blue-button-1" href="<?php echo esc_url( INTERIOR_DECOR_CONSULTATION_DEMO_PRO ); ?>" target="_blank"><?php esc_html_e( 'Live Demo', 'interior-decor-consultation' ) ?></a>
						<a class="blue-button-2" href="<?php echo esc_url( INTERIOR_DECOR_CONSULTATION_DOCS_PRO ); ?>" target="_blank"><?php esc_html_e( 'Pro Docs', 'interior-decor-consultation' ) ?></a>
					</div>
				</div>

				<h3 class="hndle bundle"><?php esc_html_e( 'Go For Theme Bundle', 'interior-decor-consultation' ); ?></h3>
				<div class="insidee theme-bundle">
					<p class="offer"><?php esc_html_e('Get 80+ Perfect WordPress Theme In A Single Package at just $99."','interior-decor-consultation'); ?></p>
					<p class="coupon"><?php esc_html_e('Get Our Theme Pack of 80+ WordPress Themes At 15% Off','interior-decor-consultation'); ?><span class="coupon-code"><?php esc_html_e('"Bundleup15"','interior-decor-consultation'); ?></span></p>
					<div id="admin_pro_linkss">
						<a class="blue-button-1" href="<?php echo esc_url( INTERIOR_DECOR_CONSULTATION_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e( 'Theme Bundle', 'interior-decor-consultation' ) ?></a>
					</div>
				</div>
				<div class="d-table">
			    <ul class="d-column">
			      <li class="feature"><?php esc_html_e('Features','interior-decor-consultation'); ?></li>
			      <li class="free"><?php esc_html_e('Pro','interior-decor-consultation'); ?></li>
			      <li class="plus"><?php esc_html_e('Free','interior-decor-consultation'); ?></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('24hrs Priority Support','interior-decor-consultation'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('LearnPress Campatiblity','interior-decor-consultation'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Kirki Framework','interior-decor-consultation'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Posttype','interior-decor-consultation'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('One Click Demo Import','interior-decor-consultation'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Reordering','interior-decor-consultation'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Enable / Disable Option','interior-decor-consultation'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Multiple Sections','interior-decor-consultation'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Color Pallete','interior-decor-consultation'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Widgets','interior-decor-consultation'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Page Templates','interior-decor-consultation'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Typography','interior-decor-consultation'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Background Image / Color ','interior-decor-consultation'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
	  		</div>
			</div>
		</div>
	</div>
<?php } ?>