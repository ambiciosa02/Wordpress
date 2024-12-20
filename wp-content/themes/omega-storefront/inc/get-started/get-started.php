<?php
/**
 * Added Omega Page. */

/**
 * Add a new page under Appearance
 */
function omega_storefront_menu()
{
  add_theme_page(__('Omega Options', 'omega-storefront'), __('Omega Options', 'omega-storefront'), 'edit_theme_options', 'omega-storefront-theme', 'omega_storefront_page');
}
add_action('admin_menu', 'omega_storefront_menu');

/**
 * Enqueue styles for the help page.
 */
function omega_storefront_admin_scripts($hook)
{
	wp_enqueue_style('omega-storefront-admin-style', get_template_directory_uri() . '/inc/get-started/get-started.css', array(), '');
}
add_action('admin_enqueue_scripts', 'omega_storefront_admin_scripts');

/**
 * Add the theme page
 */
function omega_storefront_page(){
$omega_storefront_user = wp_get_current_user();
$omega_storefront_theme = wp_get_theme();
?>
<div class="das-wrap">
  <div class="omega-storefront-panel header">
    <div class="omega-storefront-logo">
      <span></span>
      <h2><?php echo esc_html( $omega_storefront_theme ); ?></h2>
    </div>
    <p>
      <?php
            $omega_storefront_theme = wp_get_theme();
            echo wp_kses_post( apply_filters( 'omega_theme_description', esc_html( $omega_storefront_theme->get( 'Description' ) ) ) );
          ?>
    </p>
    <a class="btn btn-primary" href="<?php echo esc_url(admin_url('/customize.php?'));
?>"><?php esc_html_e('Edit With Customizer - Click Here', 'omega-storefront'); ?></a>
  </div>

  <div class="das-wrap-inner">
    <div class="das-col das-col-7">
      <div class="omega-storefront-panel">
        <div class="omega-storefront-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('If you are facing any issue with our theme, submit a support ticket here.', 'omega-storefront'); ?></h3>
          </div>
          <a href="<?php echo esc_url( OMEGA_STOREFRONT_SUPPORT_FREE ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Lite Theme Support.', 'omega-storefront'); ?></a>
        </div>
      </div>
      <div class="omega-storefront-panel">
        <div class="omega-storefront-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Please write a review if you appreciate the theme.', 'omega-storefront'); ?></h3>
          </div>
          <a href="<?php echo esc_url( OMEGA_STOREFRONT_REVIEW_FREE ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Rank this topic.', 'omega-storefront'); ?></a>
        </div>
      </div>
       <div class="omega-storefront-panel"><div class="omega-storefront-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Follow our lite theme documentation to set up our lite theme as seen in the screenshot.', 'omega-storefront'); ?></h3>
          </div>
          <a href="<?php echo esc_url( OMEGA_STOREFRONT_LITE_DOCS_PRO ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Lite Documentation.', 'omega-storefront'); ?></a>
        </div>
      </div>
    </div>
    <div class="das-col das-col-3">
      <div class="upgrade-div">
        <p><strong><?php esc_html_e('Premium Features Include:', 'omega-storefront'); ?></strong></p>
        <ul>
          <li>
          <?php esc_html_e('One Click Demo Content Importer', 'omega-storefront'); ?>
          </li>
          <li>
          <?php esc_html_e('Woocommerce Plugin Compatibility', 'omega-storefront'); ?>
          </li>
          <li>
          <?php esc_html_e('Multiple Section for the templates', 'omega-storefront'); ?>            
          </li>
          <li>
          <?php esc_html_e('For a better user experience, make the top of your menu sticky.', 'omega-storefront'); ?>  
          </li>
        </ul>
        <div class="text-center">
          <a href="<?php echo esc_url( OMEGA_STOREFRONT_BUY_NOW ); ?>" target="_blank"
            class="btn btn-success"><?php esc_html_e('Upgrade Pro $40', 'omega-storefront'); ?></a>
        </div>
      </div>
      <div class="omega-storefront-panel">
        <div class="omega-storefront-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Kindly view the premium themes live demo.', 'omega-storefront'); ?></h3>
          </div>
          <a class="btn btn-primary demo" href="<?php echo esc_url( OMEGA_STOREFRONT_DEMO_PRO ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Live Demo.', 'omega-storefront'); ?></a>
        </div>
        <div class="omega-storefront-panel-content pro-doc">
          <div class="theme-title">
            <h3><?php esc_html_e('Follow our pro theme documentation to set up our premium theme as seen in the screenshot.', 'omega-storefront'); ?></h3>
          </div>
          <a href="<?php echo esc_url( OMEGA_STOREFRONT_DOCS_PRO ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Pro Documentation.', 'omega-storefront'); ?></a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
}