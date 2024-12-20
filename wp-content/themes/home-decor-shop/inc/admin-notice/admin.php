<?php 
/*******************************************************************************
 *  Get Started Notice
 *******************************************************************************/

add_action( 'wp_ajax_home_decor_shop_dismissed_notice_handler', 'home_decor_shop_ajax_notice_handler' );

/** * AJAX handler to record dismissible notice status. */
function home_decor_shop_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function home_decor_shop_admin_notice_deprecated_hook() {
        $current_screen = get_current_screen();
        if ($current_screen->id !== 'appearance_page_home-decor-shop-guide-page') {
        if ( ! get_option('dismissed-get_started', FALSE ) ) { ?>
            <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
                <div class="home-decor-shop-getting-started-notice clearfix">
                    <div class="home-decor-shop-theme-notice-content">
                        <h2 class="home-decor-shop-notice-h2">
                            <?php
                            echo esc_html__( 'Let\'s Create Your website With', 'home-decor-shop' ) . ' <strong>' . esc_html( wp_get_theme()->get('Name') ) . '</strong>';
                            ?>
                        </h2>
                        <span class="st-notification-wrapper">
                            <span class="st-notification-column-wrapper">
                                <span class="st-notification-column">
                                    <h2><?php echo esc_html('Feature Rich WordPress Theme','home-decor-shop'); ?></h2>
                                    <ul class="st-notification-column-list">
                                        <li><?php echo esc_html('Live Customize','home-decor-shop'); ?></li>
                                        <li><?php echo esc_html('Detailed theme Options','home-decor-shop'); ?></li>
                                        <li><?php echo esc_html('Cleanly Coded','home-decor-shop'); ?></li>
                                        <li><?php echo esc_html('Search Engine Friendly','home-decor-shop'); ?></li>
                                    </ul>
                                    <a href="<?php echo esc_url( admin_url( 'themes.php?page=home-decor-shop-guide-page' ) ); ?>" target="_blank" class="button-primary button"><?php echo esc_html('Theme Info','home-decor-shop'); ?></a>
                                </span>
                                <span class="st-notification-column">
                                    <h2><?php echo esc_html('Customize Your Website','home-decor-shop'); ?></h2>
                                    <ul>
                                        <li><a href="<?php echo esc_url( admin_url( 'customize.php' ) ) ?>" target="_blank" class="button button-primary"><?php echo esc_html('Customize','home-decor-shop'); ?></a></li>
                                        <li><a href="<?php echo esc_url( admin_url( 'widgets.php' ) ) ?>" class="button button-primary"><?php echo esc_html('Add Widgets','home-decor-shop'); ?></a></li>
                                        <li><a href="<?php echo esc_url( HOME_DECOR_SHOP_SUPPORT_FREE ); ?>" target="_blank" class="button button-primary"><?php echo esc_html('Get Support','home-decor-shop'); ?></a> </li>
                                    </ul>
                                </span>
                                <span class="st-notification-column">
                                    <h2><?php echo esc_html('Get More Options','home-decor-shop'); ?></h2>
                                    <ul>
                                        <li><a href="<?php echo esc_url( HOME_DECOR_SHOP_DEMO_PRO ); ?>" target="_blank" class="button button-primary"><?php echo esc_html('View Live Demo','home-decor-shop'); ?></a></li>
                                        <li><a href="<?php echo esc_url( HOME_DECOR_SHOP_BUY_NOW ); ?>" class="button button-primary"><?php echo esc_html('Purchase Now','home-decor-shop'); ?></a></li>
                                        <li><a href="<?php echo esc_url( HOME_DECOR_SHOP_DOCS_FREE ); ?>" target="_blank" class="button button-primary"><?php echo esc_html('Free Documentation','home-decor-shop'); ?></a> </li>
                                    </ul>
                                </span>
                            </span>
                        </span>

                        <style>
                        </style>
                    </div>
                </div>
            </div>
        <?php }
    }
}

add_action( 'admin_notices', 'home_decor_shop_admin_notice_deprecated_hook' );

function home_decor_shop_switch_theme_function () {
    delete_option('dismissed-get_started', FALSE );
}

add_action('after_switch_theme', 'home_decor_shop_switch_theme_function');