<?php
/**
 * Titan Notice Handler
 */

defined( 'ABSPATH' ) || exit;

define('HOME_APPLIANCES_STORE_FREE_URL',__('https://www.titanthemes.net/themes/free-appliances-wordpress-theme/','home-appliances-store'));
define('HOME_APPLIANCES_STORE_PREMIUM_DOCUMENTATION',__('https://www.titanthemes.net/documentation/home-appliances-store-pro/','home-appliances-store'));
define('HOME_APPLIANCES_STORE_SUPPORT',__('https://wordpress.org/support/theme/home-appliances-store/','home-appliances-store'));
define('HOME_APPLIANCES_STORE_REVIEW',__('https://wordpress.org/support/theme/home-appliances-store/reviews/#new-post','home-appliances-store'));
define('HOME_APPLIANCES_STORE_BUY_NOW',__('https://www.titanthemes.net/themes/home-appliances-wordpress-theme/','home-appliances-store'));
define('HOME_APPLIANCES_STORE_DOC_URL',__('https://titanthemes.net/documentation/home-appliances-store/','home-appliances-store'));
define('HOME_APPLIANCES_STORE_LIVE_DEMO',__('https://titanthemes.net/preview/home-appliances-store/','home-appliances-store'));
/**
 * Admin Hook
 */
function home_appliances_store_admin_menu_page() {
    $home_appliances_store_theme = wp_get_theme( get_template() );

    add_theme_page(
        $home_appliances_store_theme->display( 'Name' ),
        $home_appliances_store_theme->display( 'Name' ),
        'manage_options',
        'home-appliances-store',
        'home_appliances_store_do_admin_page'
    );
}
add_action( 'admin_menu', 'home_appliances_store_admin_menu_page' );

/**
 * Enqueue getting started styles and scripts
 */
function titan_widgets_backend_enqueue() {
    wp_enqueue_style( 'titan-getting-started', get_template_directory_uri() . '/about-theme/about-theme.css' );
}
add_action( 'admin_enqueue_scripts', 'titan_widgets_backend_enqueue' );

/**
 * Class Titan_Notice_Handler
 */
class Titan_Notice_Handler {

    public static $nonce;

    /**
     * Empty Constructor
     */
    public function __construct() {
        // Activation notice
        add_action( 'switch_theme', array( $this, 'flush_dismiss_status' ) );
        add_action( 'admin_init', array( $this, 'getting_started_notice_dismissed' ) );
        add_action( 'admin_notices', array( $this, 'titan_theme_info_welcome_admin_notice' ), 3 );
        add_action( 'wp_ajax_titan_getting_started', array( $this, 'titan_getting_started' ) );
    }

    /**
     * Display an admin notice linking to the about page
     */
    public function titan_theme_info_welcome_admin_notice() {

    $current_screen = get_current_screen();

    $home_appliances_store_theme = wp_get_theme();
    if ( is_admin() && ! get_user_meta( get_current_user_id(), 'gs_notice_dismissed' ) && $current_screen->base != 'appearance_page_home-appliances-store' ) {
        echo '<div class="updated notice notice-success is-dismissible getting-started">';
        echo '<p><strong>' . sprintf( esc_html__( 'Welcome! Thank you for choosing %1$s.', 'home-appliances-store' ), esc_html( $home_appliances_store_theme->get( 'Name' ) ) ) . '</strong></p>';
        echo '<p class="plugin-notice">' . esc_html__( 'By clicking "Get Started," you can access our theme features.', 'home-appliances-store' ) . '</p>';
        echo '<div class="titan-buttons">';
        echo '<p><a href="' . esc_url(admin_url('themes.php?page=home-appliances-store')) . '" class="titan-install-plugins button button-primary">' . sprintf( esc_html__( 'Get started with %s', 'home-appliances-store' ), esc_html( $home_appliances_store_theme->get( 'Name' ) ) ) . '</a></p>';
        echo '<p><a href="' . esc_url( HOME_APPLIANCES_STORE_BUY_NOW ) . '" class="button button-secondary" target="_blank">' . esc_html__( 'GO FOR PREMIUM', 'home-appliances-store' ) . '</a></p>';
        echo '</div>';
        echo '<a href="' . esc_url( wp_nonce_url( add_query_arg( 'gs-notice-dismissed', 'dismiss_admin_notices' ) ) ) . '" class="getting-started-notice-dismiss">Dismiss</a>';
        echo '</div>';
    }
}

    /**
     * Register dismissal of the getting started notification.
     * Acts on the dismiss link.
     * If clicked, the admin notice disappears and will no longer be visible to this user.
     */
    public function getting_started_notice_dismissed() {
        if ( isset( $_GET['gs-notice-dismissed'] ) ) {
            add_user_meta( get_current_user_id(), 'gs_notice_dismissed', 'true' );
        }
    }

    /**
     * Deletes the getting started notice's dismiss status upon theme switch.
     */
    public function flush_dismiss_status() {
        delete_user_meta( get_current_user_id(), 'gs_notice_dismissed' );
    }
}
new Titan_Notice_Handler();

/**
 * Render admin page.
 *
 * @since 1.0.0
 */
function home_appliances_store_do_admin_page() { 
    $home_appliances_store_theme = wp_get_theme(); ?>
    <div class="home-appliances-store-themeinfo-page--wrapper">
        <div class="free&pro">
            <div id="home-appliances-store-admin-about-page-1">
                <div class="theme-detail">
                   <div class="home-appliances-store-admin-card-header-1">
                    <div class="home-appliances-store-header-left">
                        <h2>
                            <?php echo esc_html( $home_appliances_store_theme->Name ); ?> <span><?php echo esc_html($home_appliances_store_theme['Version']);?></span>
                        </h2>
                        <p>
                            <?php
                            echo wp_kses_post( apply_filters( 'titan_theme_description', esc_html( $home_appliances_store_theme->get( 'Description' ) ) ) );
                        ?>
                        </p>
                    </div>
                    <div class="home-appliances-store-header-right">
                        <div class="home-appliances-store-pro-button">
                            <a href="<?php echo esc_url( HOME_APPLIANCES_STORE_BUY_NOW ); ?>" class="home-appliances-store-button button-primary" target="_blank" rel="noreferrer">
                                <?php esc_html_e( 'UPGRADE TO PREMIUM', 'home-appliances-store' ); ?>
                            </a>
                        </div>
                    </div>
                </div>   
                </div>   
                <div class="home-appliances-store-features">
                    <div class="home-appliances-store-features-box">
                        <h3><?php esc_html_e( 'PREMIUM DEMONSTRATION', 'home-appliances-store' ); ?></h3>
                        <p><?php esc_html_e( 'Effortlessly create and customize your website by arranging text, images, and other elements using the Gutenberg editor, making web design easy and accessible for all skill levels.', 'home-appliances-store' ); ?></p>
                        <a href="<?php echo esc_url( HOME_APPLIANCES_STORE_LIVE_DEMO ); ?>" class="home-appliances-store-button button-secondary-1" target="_blank" rel="noreferrer">
                                <?php esc_html_e( 'DEMONSTRATION', 'home-appliances-store' ); ?>
                            </a>
                    </div>
                    <div class="home-appliances-store-features-box">
                        <h3><?php esc_html_e( 'REVIEWS', 'home-appliances-store' ); ?></h3>
                        <p><?php esc_html_e( 'We would be happy to hear your thoughts and value your evaluation.', 'home-appliances-store' ); ?></p>
                        <a href="<?php echo esc_url( HOME_APPLIANCES_STORE_REVIEW ); ?>" class="home-appliances-store-button button-secondary-1" target="_blank" rel="noreferrer">
                                <?php esc_html_e( 'REVIEWS', 'home-appliances-store' ); ?>
                            </a>
                    </div>
                    <div class="home-appliances-store-features-box">
                        <h3><?php esc_html_e( '24/7 SUPPORT', 'home-appliances-store' ); ?></h3>
                        <p><?php esc_html_e( 'Please do not hesitate to contact us at support if you need help installing our lite theme. We are prepared to assist you!', 'home-appliances-store' ); ?></p>
                        <a href="<?php echo esc_url( HOME_APPLIANCES_STORE_SUPPORT ); ?>" class="home-appliances-store-button button-secondary-1" target="_blank" rel="noreferrer">
                            <?php esc_html_e( 'SUPPORT', 'home-appliances-store' ); ?>
                        </a>
                    </div>
                    <div class="home-appliances-store-features-box">
                        <h3><?php esc_html_e( 'THEME INSTRUCTION', 'home-appliances-store' ); ?></h3>
                        <p><?php esc_html_e( 'If you need assistance configuring and setting up the theme, our tutorial is available. A fast and simple method for setting up the theme.', 'home-appliances-store' ); ?></p>
                        <a href="<?php echo esc_url( HOME_APPLIANCES_STORE_DOC_URL ); ?>" class="home-appliances-store-button button-secondary-1" target="_blank" rel="noreferrer">
                                <?php esc_html_e( 'DOCUMENTATION', 'home-appliances-store' ); ?>
                            </a>
                    </div> 
                </div>   
            </div>
            <div id="home-appliances-store-admin-about-page-2">
                <div class="theme-detail">
                   <div class="home-appliances-store-admin-card-header-1">
                        <div class="home-appliances-store-header-left-pro"> 
                            <h2><?php esc_html_e( 'The premium version of this theme will be available for you to enhance or unlock our premium features.', 'home-appliances-store' ); ?></h2>
                        </div>
                        <div class="home-appliances-store-header-right-2">
                            <div class="home-appliances-store-pro-button">
                                <a href="<?php echo esc_url( HOME_APPLIANCES_STORE_BUY_NOW ); ?>" class="home-appliances-store-button button-primary-1 buy-now" target="_blank" rel="noreferrer">
                                    <?php esc_html_e( 'GO TO PREMIUM', 'home-appliances-store' ); ?>
                                </a>
                            </div>
                            <div class="home-appliances-store-pro-button">
                                <a href="<?php echo esc_url( HOME_APPLIANCES_STORE_LIVE_DEMO ); ?>" class="home-appliances-store-button button-primary-1 pro-demo" target="_blank" rel="noreferrer">
                                    <?php esc_html_e( 'PREMIUM DEMO', 'home-appliances-store' ); ?>
                                </a>
                            </div> 
                            <div class="home-appliances-store-pro-button">
                                <a href="<?php echo esc_url( HOME_APPLIANCES_STORE_PREMIUM_DOCUMENTATION ); ?>" class="home-appliances-store-button button-primary-1 buy-now" target="_blank" rel="noreferrer">
                                    <?php esc_html_e( 'PRO DOCUMENTATION', 'home-appliances-store' ); ?>
                                </a>
                            </div> 
                        </div>
                    </div>
                    <div class="home-appliances-store-admin-card-header-2">
                        <img class="img_responsive" style="width: 100%;" src="<?php echo esc_url( $home_appliances_store_theme->get_screenshot() ); ?>" />
                    </div> 
                </div>    
            </div>
        </div>
    </div>
<?php } ?>