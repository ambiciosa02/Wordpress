<?php
/**
 * Theme Page
 *
 * @package Supermarket Shopping
 */

if ( ! defined( 'SUPERMARKET_SHOPPING_FREE_THEME_URL' ) ) {
	define( 'SUPERMARKET_SHOPPING_FREE_THEME_URL', 'https://www.seothemesexpert.com/products/free-supermarket-wordpress-theme' );
}
if ( ! defined( 'SUPERMARKET_SHOPPING_PRO_THEME_URL' ) ) {
	define( 'SUPERMARKET_SHOPPING_PRO_THEME_URL', 'https://www.seothemesexpert.com/products/supermarket-website-template' );
}
if ( ! defined( 'SUPERMARKET_SHOPPING_FREE_DOCS_THEME_URL' ) ) {
    define( 'SUPERMARKET_SHOPPING_FREE_DOCS_THEME_URL', 'https://demo.seothemesexpert.com/documentation/supermarket-shopping/' );
}
if ( ! defined( 'SUPERMARKET_SHOPPING_DEMO_THEME_URL' ) ) {
	define( 'SUPERMARKET_SHOPPING_DEMO_THEME_URL', 'https://demo.seothemesexpert.com/supermarket-shopping/' );
}
if ( ! defined( 'SUPERMARKET_SHOPPING_RATE_THEME_URL' ) ) {
    define( 'SUPERMARKET_SHOPPING_RATE_THEME_URL', 'https://wordpress.org/support/theme/supermarket-shopping/reviews/#new-post' );
}
if ( ! defined( 'SUPERMARKET_SHOPPING_SUPPORT_THEME_URL' ) ) {
    define( 'SUPERMARKET_SHOPPING_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/supermarket-shopping/' );
}
if ( ! defined( 'SUPERMARKET_SHOPPING_THEME_BUNDLE_URL' ) ) {
    define( 'SUPERMARKET_SHOPPING_THEME_BUNDLE_URL', 'https://www.seothemesexpert.com/products/wordpress-theme-bundle' );
}

/**
 * Add theme page
 */
function supermarket_shopping_menu() {
	add_theme_page( esc_html__( 'About Theme', 'supermarket-shopping' ), esc_html__( 'About Theme', 'supermarket-shopping' ), 'edit_theme_options', 'supermarket-shopping-about', 'supermarket_shopping_about_display' );
}
add_action( 'admin_menu', 'supermarket_shopping_menu' );

/**
 * Display About page
 */
function supermarket_shopping_about_display() { ?>
	<div class="wrap about-wrap full-width-layout">		
		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'supermarket-shopping' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'supermarket-shopping-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'supermarket-shopping-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'supermarket-shopping' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'supermarket-shopping-about', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Compare free Vs Pro', 'supermarket-shopping' ); ?></a>
		</nav>

		<?php
			supermarket_shopping_main_screen();

			supermarket_shopping_free_vs_pro();
		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'supermarket-shopping' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'supermarket-shopping' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'supermarket-shopping' ) : esc_html_e( 'Go to Dashboard', 'supermarket-shopping' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function supermarket_shopping_main_screen() {
	if ( isset( $_GET['page'] ) && 'supermarket-shopping-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="main-col-box">
			<div class="feature-section two-col">
				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Upgrade To Pro', 'supermarket-shopping' ); ?></h2>
					<p><?php esc_html_e( 'Take a step towards excellence, try our premium theme. Use Code', 'supermarket-shopping' ) ?><span class="usecode">" STEPRO10 "</span></p>
					<p><a target="_blank" href="<?php echo esc_url( SUPERMARKET_SHOPPING_PRO_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Upgrade Pro', 'supermarket-shopping' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Lite Documentation', 'supermarket-shopping' ); ?></h2>
					<p><?php esc_html_e( 'The free theme documentation can help you set up the theme.', 'supermarket-shopping' ) ?></p>
					<p><a target="_blank" href="<?php echo esc_url( SUPERMARKET_SHOPPING_FREE_DOCS_THEME_URL ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Lite Documentation', 'supermarket-shopping' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Theme Info', 'supermarket-shopping' ); ?></h2>
					<p><?php esc_html_e( 'Know more about Supermarket Shopping.', 'supermarket-shopping' ) ?></p>
					<p><a target="_blank" href="<?php echo esc_url( SUPERMARKET_SHOPPING_FREE_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Theme Info', 'supermarket-shopping' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'supermarket-shopping' ); ?></h2>
					<p><?php esc_html_e( 'You can get all theme options in customizer.', 'supermarket-shopping' ) ?></p>
					<p><a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'supermarket-shopping' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Need Support?', 'supermarket-shopping' ); ?></h2>
					<p><?php esc_html_e( 'If you are having some issues with the theme or you want to tweak some thing, you can contact us our expert team will help you.', 'supermarket-shopping' ) ?></p>
					<p><a target="_blank" href="<?php echo esc_url( SUPERMARKET_SHOPPING_SUPPORT_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Support Forum', 'supermarket-shopping' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Review', 'supermarket-shopping' ); ?></h2>
					<p><?php esc_html_e( 'If you have loved our theme please show your support with the review.', 'supermarket-shopping' ) ?></p>
					<p><a target="_blank" href="<?php echo esc_url( SUPERMARKET_SHOPPING_RATE_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Rate Us', 'supermarket-shopping' ); ?></a></p>
				</div>		
			</div>
			<div class="about-theme">
				<?php $supermarket_shopping_theme = wp_get_theme(); ?>

				<h1><?php echo esc_html( $supermarket_shopping_theme ); ?></h1>
				<p class="version"><?php esc_html_e( 'Version', 'supermarket-shopping' ); ?>: <?php echo esc_html($supermarket_shopping_theme['Version']);?></p>
				<div class="theme-description">
					<p class="actions">
						<a target="_blank" href="<?php echo esc_url( SUPERMARKET_SHOPPING_PRO_THEME_URL ); ?>" class="protheme button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'supermarket-shopping' ); ?></a>

						<a target="_blank" href="<?php echo esc_url( SUPERMARKET_SHOPPING_DEMO_THEME_URL ); ?>" class="demo button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'supermarket-shopping' ); ?></a>

						<a target="_blank" href="<?php echo esc_url( SUPERMARKET_SHOPPING_THEME_BUNDLE_URL ); ?>" class="bundle button button-secondary" target="_blank"><?php esc_html_e( 'Buy All Themes', 'supermarket-shopping' ); ?></a>

						<a target="_blank" href="<?php echo esc_url( SUPERMARKET_SHOPPING_FREE_DOCS_THEME_URL ); ?>" class="docs button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'supermarket-shopping' ); ?></a>
					</p>
				</div>
				<div class="theme-screenshot">
					<img src="<?php echo esc_url( $supermarket_shopping_theme->get_screenshot() ); ?>" />
				</div>
			</div>
		</div>
	<?php
	}
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function supermarket_shopping_free_vs_pro() {
	if ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<div class="theme-description">
				<p class="actions">
					<a target="_blank" href="<?php echo esc_url( SUPERMARKET_SHOPPING_PRO_THEME_URL ); ?>" class="protheme button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'supermarket-shopping' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( SUPERMARKET_SHOPPING_DEMO_THEME_URL ); ?>" class="demo button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'supermarket-shopping' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( SUPERMARKET_SHOPPING_THEME_BUNDLE_URL ); ?>" class="bundle button button-secondary" target="_blank"><?php esc_html_e( 'Buy All Themes', 'supermarket-shopping' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( SUPERMARKET_SHOPPING_FREE_DOCS_THEME_URL ); ?>" class="docs button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'supermarket-shopping' ); ?></a>
				</p>
			</div>
			<p class="about-description"><?php esc_html_e( 'View Free vs Pro Table below:', 'supermarket-shopping' ); ?></p>
			<div class="vs-theme-table">
				<table>
					<thead>
						<tr><th scope="col"></th>
							<th class="head" scope="col"><?php esc_html_e( 'Free Theme', 'supermarket-shopping' ); ?></th>
							<th class="head" scope="col"><?php esc_html_e( 'Pro Theme', 'supermarket-shopping' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><span><?php esc_html_e( 'One click demo import', 'supermarket-shopping' ); ?></span></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Color pallete and font options', 'supermarket-shopping' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Demo Content has 8 to 10 sections', 'supermarket-shopping' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Rearrange sections as per your need', 'supermarket-shopping' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Internal Pages', 'supermarket-shopping' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Plugin Integration', 'supermarket-shopping' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Ultimate technical support', 'supermarket-shopping' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Access our Support Forums', 'supermarket-shopping' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Get regular updates', 'supermarket-shopping' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Install theme on unlimited domains', 'supermarket-shopping' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Mobile Responsive', 'supermarket-shopping' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Easy Customization', 'supermarket-shopping' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td class="feature feature--empty"></td>
							<td class="feature feature--empty"></td>
							<td headers="comp-2" class="td-btn-2"><a class="sidebar-button single-btn protheme button button-secondary" href="<?php echo esc_url(SUPERMARKET_SHOPPING_PRO_THEME_URL);?>"><?php esc_html_e( 'Go for Premium', 'supermarket-shopping' ); ?></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<?php
	}
}
