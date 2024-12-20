<?php

add_action( 'admin_menu', 'home_decor_shop_getting_started' );
function home_decor_shop_getting_started() {
	add_theme_page( esc_html__('Theme Info', 'home-decor-shop'), esc_html__('Theme Info', 'home-decor-shop'), 'edit_theme_options', 'home-decor-shop-guide-page', 'home_decor_shop_test_guide', 1);
}

if ( ! defined( 'HOME_DECOR_SHOP_DOCS_FREE' ) ) {
define('HOME_DECOR_SHOP_DOCS_FREE',__('https://mishkatwp.com/instruction/home-decor-shop-free-docs/','home-decor-shop'));
}
if ( ! defined( 'HOME_DECOR_SHOP_DOCS_PRO' ) ) {
define('HOME_DECOR_SHOP_DOCS_PRO',__('https://mishkatwp.com/instruction/home-decor-shop-pro-docs/','home-decor-shop'));
}
if ( ! defined( 'HOME_DECOR_SHOP_BUY_NOW' ) ) {
define('HOME_DECOR_SHOP_BUY_NOW',__('https://www.mishkatwp.com/themes/decor-wordpress-theme/','home-decor-shop'));
}
if ( ! defined( 'HOME_DECOR_SHOP_SUPPORT_FREE' ) ) {
define('HOME_DECOR_SHOP_SUPPORT_FREE',__('https://wordpress.org/support/theme/home-decor-shop','home-decor-shop'));
}
if ( ! defined( 'HOME_DECOR_SHOP_REVIEW_FREE' ) ) {
define('HOME_DECOR_SHOP_REVIEW_FREE',__('https://wordpress.org/support/theme/home-decor-shop/reviews/#new-post','home-decor-shop'));
}
if ( ! defined( 'HOME_DECOR_SHOP_DEMO_PRO' ) ) {
define('HOME_DECOR_SHOP_DEMO_PRO',__('https://mishkatwp.com/pro/home-decor-shop/','home-decor-shop'));
}
if ( ! defined( 'HOME_DECOR_SHOP_THEME_BUNDLE' ) ) {
define('HOME_DECOR_SHOP_THEME_BUNDLE',__('https://www.mishkatwp.com/themes/wordpress-theme-bundle/','home-decor-shop'));
}

function home_decor_shop_test_guide() { ?>
	<?php $home_decor_shop_theme = wp_get_theme();

	require_once get_template_directory() .'/inc/started/demo-import.php'; ?>

	<div class="wrap" id="main-page">
		<div id="righty">
			<div class="postbox donate">
				<h4><?php esc_html_e( 'Discount Upto 25%', 'home-decor-shop' ); ?> <span><?php esc_html_e( '"Special25"', 'home-decor-shop' ); ?></span></h4>
				<h3 class="hndle"><?php esc_html_e( 'Upgrade to Premium', 'home-decor-shop' ); ?></h3>
				<div class="inside">
					<p><?php esc_html_e('Click to upgrade to see the enhanced pro features available in the premium version.','home-decor-shop'); ?></p>
					<div id="admin_pro_links">
						<a class="blue-button-2" href="<?php echo esc_url( HOME_DECOR_SHOP_BUY_NOW ); ?>" target="_blank"><?php esc_html_e( 'Go Pro', 'home-decor-shop' ); ?></a>
						<a class="blue-button-1" href="<?php echo esc_url( HOME_DECOR_SHOP_DEMO_PRO ); ?>" target="_blank"><?php esc_html_e( 'Live Demo', 'home-decor-shop' ) ?></a>
						<a class="blue-button-2" href="<?php echo esc_url( HOME_DECOR_SHOP_DOCS_PRO ); ?>" target="_blank"><?php esc_html_e( 'Pro Docs', 'home-decor-shop' ) ?></a>
					</div>
				</div>
				<div class="d-table">
				    <ul class="d-column">
				      <li class="feature"><?php esc_html_e('Features','home-decor-shop'); ?></li>
				      <li class="free"><?php esc_html_e('Pro','home-decor-shop'); ?></li>
				      <li class="plus"><?php esc_html_e('Free','home-decor-shop'); ?></li>
				    </ul>
				    <ul class="d-row">
				      <li class="points"><?php esc_html_e('24hrs Priority Support','home-decor-shop'); ?></li>
				      <li class="right"><span class="dashicons dashicons-yes"></span></li>
				      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
				    </ul>
				    <ul class="d-row">
				      <li class="points"><?php esc_html_e('LearnPress Campatiblity','home-decor-shop'); ?></li>
				      <li class="right"><span class="dashicons dashicons-yes"></span></li>
				      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
				    </ul>
				    <ul class="d-row">
				      <li class="points"><?php esc_html_e('Kirki Framework','home-decor-shop'); ?></li>
				      <li class="right"><span class="dashicons dashicons-yes"></span></li>
				      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
				    </ul>
				    <ul class="d-row">
				      <li class="points"><?php esc_html_e('Advance Posttype','home-decor-shop'); ?></li>
				      <li class="right"><span class="dashicons dashicons-yes"></span></li>
				      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
				    </ul>
				    <ul class="d-row">
				      <li class="points"><?php esc_html_e('One Click Demo Import','home-decor-shop'); ?></li>
				      <li class="right"><span class="dashicons dashicons-yes"></span></li>
				      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
				    </ul>
				    <ul class="d-row">
				      <li class="points"><?php esc_html_e('Section Reordering','home-decor-shop'); ?></li>
				      <li class="right"><span class="dashicons dashicons-yes"></span></li>
				      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
				    </ul>
				    <ul class="d-row">
				      <li class="points"><?php esc_html_e('Enable / Disable Option','home-decor-shop'); ?></li>
				      <li class="right"><span class="dashicons dashicons-yes"></span></li>
				      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
				    </ul>
				    <ul class="d-row">
				      <li class="points"><?php esc_html_e('Multiple Sections','home-decor-shop'); ?></li>
				      <li class="right"><span class="dashicons dashicons-yes"></span></li>
				      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
				    </ul>
				    <ul class="d-row">
				      <li class="points"><?php esc_html_e('Advance Color Pallete','home-decor-shop'); ?></li>
				      <li class="right"><span class="dashicons dashicons-yes"></span></li>
				      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
				    </ul>
				    <ul class="d-row">
				      <li class="points"><?php esc_html_e('Advance Widgets','home-decor-shop'); ?></li>
				      <li class="right"><span class="dashicons dashicons-yes"></span></li>
				      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
				    </ul>
				    <ul class="d-row">
				      <li class="points"><?php esc_html_e('Page Templates','home-decor-shop'); ?></li>
				      <li class="right"><span class="dashicons dashicons-yes"></span></li>
				      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
				    </ul>
		  		</div>
			</div>
		</div>
		<div id="lefty">
			<div id="description">
				<h3><?php esc_html_e('Welcome! Thank you for choosing ','home-decor-shop'); ?><?php echo esc_html( $home_decor_shop_theme ); ?>  <span><?php esc_html_e('Version: ', 'home-decor-shop'); ?><?php echo esc_html($home_decor_shop_theme['Version']);?></span></h3>
				<div class="demo-import-box">
					<h4><?php echo esc_html('Import homepage demo in just one click.','home-decor-shop'); ?></h4>
					<p><?php echo esc_html('Get started with the wordpress theme installation','home-decor-shop'); ?></p>
					<?php if(isset($_GET['import-demo']) && $_GET['import-demo'] == true){ ?>
			    		<p class="imp-success"><?php echo esc_html('Imported Successfully','home-decor-shop'); ?></p>
			    		<a class="blue-button-1" href="<?php echo esc_url(home_url()); ?>" target="_blank"><?php echo esc_html('Go to Homepage','home-decor-shop'); ?></a>
			    	<?php } else { ?>
					<form id="demo-importer-form" action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.php" method="POST">
			        	<input type="submit" name="submit" value="<?php esc_attr_e('Get Start With Home Decor Shop','home-decor-shop'); ?>" class="blue-button-2">
			    	</form>
			    	<?php } ?>
				</div>
				<h4><?php esc_html_e('Begin with our theme features','home-decor-shop'); ?></span></h4>
				<div class="customizer-inside">
										<div class="home-decor-shop-theme-setting-item">
                        <div class="home-decor-shop-theme-setting-item-header">
                            <?php esc_html_e( 'Add Menus', 'home-decor-shop' ); ?>                            
                       	</div>
                        <div class="home-decor-shop-theme-setting-item-content">
                        	<a target="_blank" href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>"><?php esc_html_e('Go to Menu', 'home-decor-shop'); ?></a>
                     	</div>
                     	<p><?php esc_html_e( 'After Clicking go to customizer >> Go to menu >> Select menu which you had created >> Then Publish ', 'home-decor-shop' ); ?></p>
                	</div>
                	<div class="home-decor-shop-theme-setting-item">
                        <div class="home-decor-shop-theme-setting-item-header">
                            <?php esc_html_e( 'Add Logo', 'home-decor-shop' ); ?>                            
                       	</div>
                        <div class="home-decor-shop-theme-setting-item-content">
                        	<a target="_blank" href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>"><?php esc_html_e('Go to Site Identity', 'home-decor-shop'); ?></a>
                     	</div>
                     	<p><?php esc_html_e( 'After Clicking go to customizer >> Go to Site Identity >> Select Logo Add Title or Tagline >> Then Publish ', 'home-decor-shop' ); ?></p>
                	</div>
                	<div class="home-decor-shop-theme-setting-item">
                        <div class="home-decor-shop-theme-setting-item-header">
                            <?php esc_html_e( 'Home Page Section', 'home-decor-shop' ); ?>                            
                       	</div>
                        <div class="home-decor-shop-theme-setting-item-content">
                        	<a target="_blank" href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=home_decor_shop_home_page_section') ); ?>"><?php esc_html_e('Go to Home Page Section', 'home-decor-shop'); ?></a>
                     	</div>
                     	<p><?php esc_html_e( 'After Clicking go to customizer >> Go to Home Page Sections >> Then go to different section which ever you want >> Then Publish ', 'home-decor-shop' ); ?></p>
                	</div>
                	<div class="home-decor-shop-theme-setting-item">
                        <div class="home-decor-shop-theme-setting-item-header">
                            <?php esc_html_e( 'Post Options', 'home-decor-shop' ); ?>                            
                       	</div>
                        <div class="home-decor-shop-theme-setting-item-content">
                        	<a target="_blank" href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=home_decor_shop_post_image_on_off') ); ?>"><?php esc_html_e('Go to Post Options', 'home-decor-shop'); ?></a>
                     	</div>
                     	<p><?php esc_html_e( 'After Clicking go to customizer >> Go to Post Options >> Then go to different settings which ever you want >> Then Publish ', 'home-decor-shop' ); ?></p>
                	</div>
                	<div class="home-decor-shop-theme-setting-item">
                        <div class="home-decor-shop-theme-setting-item-header">
                            <?php esc_html_e( 'Post Layout Options', 'home-decor-shop' ); ?>                            
                       	</div>
                        <div class="home-decor-shop-theme-setting-item-content">
                        	<a target="_blank" href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=home_decor_shop_post_layout') ); ?>"><?php esc_html_e('Go to Post Layout Options', 'home-decor-shop'); ?></a>
                     	</div>
                     	<p><?php esc_html_e( 'After Clicking go to customizer >> Go to Post Layout Options >> Then go to different settings which ever you want >> Then Publish ', 'home-decor-shop' ); ?></p>
                	</div>
                	<div class="home-decor-shop-theme-setting-item">
                        <div class="home-decor-shop-theme-setting-item-header">
                            <?php esc_html_e( 'General Options Options', 'home-decor-shop' ); ?>                            
                       	</div>
                        <div class="home-decor-shop-theme-setting-item-content">
                        	<a target="_blank" href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=home_decor_shop_preloader_setting') ); ?>"><?php esc_html_e('Go to General Options', 'home-decor-shop'); ?></a>
                     	</div>
                     	<p><?php esc_html_e( 'After Clicking go to customizer >> Go to Post General Options >> Then go to different settings which ever you want >> Then Publish ', 'home-decor-shop' ); ?></p>
                	</div>
                	
                	<a target="_blank" href="<?php echo esc_url( HOME_DECOR_SHOP_BUY_NOW ); ?>" class="home-decor-shop-theme-setting-item home-decor-shop-theme-setting-item-unavailable">
					    <div class="home-decor-shop-theme-setting-item-header">
					        <span><?php esc_html_e("Customize All Fonts", "home-decor-shop"); ?></span> <span><?php esc_html_e("Premium", "home-decor-shop"); ?></span>
					    </div>
					    <div class="home-decor-shop-theme-setting-item-content">
					        <span><?php esc_html_e("Go to Customizer", "home-decor-shop"); ?></span>
					    </div>
					</a>

					<a target="_blank" href="<?php echo esc_url( HOME_DECOR_SHOP_BUY_NOW ); ?>" class="home-decor-shop-theme-setting-item home-decor-shop-theme-setting-item-unavailable">
					    <div class="home-decor-shop-theme-setting-item-header">
					        <span><?php esc_html_e("Customize All Color", "home-decor-shop"); ?></span> <span><?php esc_html_e("Premium", "home-decor-shop"); ?></span>
					    </div>
					    <div class="home-decor-shop-theme-setting-item-content">
					        <span><?php esc_html_e("Go to Customizer", "home-decor-shop"); ?></span>
					    </div>
					</a>

					<a target="_blank" href="<?php echo esc_url( HOME_DECOR_SHOP_BUY_NOW ); ?>" class="home-decor-shop-theme-setting-item home-decor-shop-theme-setting-item-unavailable">
					    <div class="home-decor-shop-theme-setting-item-header">
					        <span><?php esc_html_e("Section Reorder", "home-decor-shop"); ?></span> <span><?php esc_html_e("Premium", "home-decor-shop"); ?></span>
					    </div>
					    <div class="home-decor-shop-theme-setting-item-content">
					        <span><?php esc_html_e("Go to Customizer", "home-decor-shop"); ?></span>
					    </div>
					</a>

					<a target="_blank" href="<?php echo esc_url( HOME_DECOR_SHOP_BUY_NOW ); ?>" class="home-decor-shop-theme-setting-item home-decor-shop-theme-setting-item-unavailable">
					    <div class="home-decor-shop-theme-setting-item-header">
					        <span><?php esc_html_e("Typography Options", "home-decor-shop"); ?></span> <span><?php esc_html_e("Premium", "home-decor-shop"); ?></span>
					    </div>
					    <div class="home-decor-shop-theme-setting-item-content">
					        <span><?php esc_html_e("Go to Customizer", "home-decor-shop"); ?></span>
					    </div>
					</a>

					<a target="_blank" href="<?php echo esc_url( HOME_DECOR_SHOP_BUY_NOW ); ?>" class="home-decor-shop-theme-setting-item home-decor-shop-theme-setting-item-unavailable">
					    <div class="home-decor-shop-theme-setting-item-header">
					        <span><?php esc_html_e("One Click Demo Import", "home-decor-shop"); ?></span> <span><?php esc_html_e("Premium", "home-decor-shop"); ?></span>
					    </div>
					    <div class="home-decor-shop-theme-setting-item-content">
					        <span><?php esc_html_e("Go to Customizer", "home-decor-shop"); ?></span>
					    </div>
					</a>
					<a target="_blank" href="<?php echo esc_url( HOME_DECOR_SHOP_BUY_NOW ); ?>" class="home-decor-shop-theme-setting-item home-decor-shop-theme-setting-item-unavailable">
					    <div class="home-decor-shop-theme-setting-item-header">
					        <span><?php esc_html_e("Background  Settings", "home-decor-shop"); ?></span> <span><?php esc_html_e("Premium", "home-decor-shop"); ?></span>
					    </div>
					    <div class="home-decor-shop-theme-setting-item-content">
					        <span><?php esc_html_e("Go to Customizer", "home-decor-shop"); ?></span>
					    </div>
					</a>
					
				</div>
			</div>
		</div>
				<div id="righty">
			<div class="home-decor-shop-theme-setting-sidebar-item">
		        <div class="home-decor-shop-theme-setting-sidebar-header"><?php esc_html_e( 'Theme Bundle', 'home-decor-shop' ) ?></div>
		        <div class="home-decor-shop-theme-setting-sidebar-content">
		            <p class="m-0"><?php esc_html_e( 'Get our all themes in single pack.', 'home-decor-shop' ) ?></p>
		            <div id="admin_links">
		            	<a href="<?php echo esc_url( HOME_DECOR_SHOP_THEME_BUNDLE ); ?>" target="_blank" class="blue-button-2"><?php esc_html_e( 'Theme Bundle', 'home-decor-shop' ) ?></a>
		            </div>
		        </div>
		    </div>
			<div class="home-decor-shop-theme-setting-sidebar-item">
		        <div class="home-decor-shop-theme-setting-sidebar-header"><?php esc_html_e( 'Free Documentation', 'home-decor-shop' ) ?></div>
		        <div class="home-decor-shop-theme-setting-sidebar-content">
		            <p class="m-0"><?php esc_html_e( 'Our guide is available if you require any help configuring and setting up the theme.', 'home-decor-shop' ) ?></p>
		            <div id="admin_links">
		            	<a href="<?php echo esc_url( HOME_DECOR_SHOP_DOCS_FREE ); ?>" target="_blank" class="blue-button-1"><?php esc_html_e( 'Free Documentation', 'home-decor-shop' ) ?></a>
		            </div>
		        </div>
		    </div>
		    <div class="home-decor-shop-theme-setting-sidebar-item">
		        <div class="home-decor-shop-theme-setting-sidebar-header"><?php esc_html_e( 'Support', 'home-decor-shop' ) ?></div>
		        <div class="home-decor-shop-theme-setting-sidebar-content">
		            <p class="m-0"><?php esc_html_e( 'Visit our website to contact us if you face any issues with our lite theme!', 'home-decor-shop' ) ?></p>
		            <div id="admin_links">
		            	<a class="blue-button-2" href="<?php echo esc_url( HOME_DECOR_SHOP_SUPPORT_FREE ); ?>" target="_blank" class="btn3"><?php esc_html_e( 'Support', 'home-decor-shop' ) ?></a>
		            </div>
		        </div>
		    </div>
		    <div class="home-decor-shop-theme-setting-sidebar-item">
		        <div class="home-decor-shop-theme-setting-sidebar-header"><?php esc_html_e( 'Review', 'home-decor-shop' ) ?></div>
		        <div class="home-decor-shop-theme-setting-sidebar-content">
		            <p class="m-0"><?php esc_html_e( 'Are you having fun with Home Decor Shop? Review us on WordPress.org to show your support!', 'home-decor-shop' ) ?></p>
		            <div id="admin_links">
		            	<a href="<?php echo esc_url( HOME_DECOR_SHOP_REVIEW_FREE ); ?>" target="_blank" class="blue-button-1"><?php esc_html_e( 'Review', 'home-decor-shop' ) ?></a>
		            </div>
		        </div>
		    </div>
		</div>
	</div>

<?php } ?>