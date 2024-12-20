<div id="navbarouter" class="navbarouter">
<?php
if( class_exists( 'Mega_Menu' ) && max_mega_menu_is_enabled( 'primary' ) ) {
	wp_nav_menu( array( 'theme_location' => 'primary' ) );
} else {
?>
	<nav id="navbarprimary" class="navbar navbar-expand-md navbarprimary">
		<div class="container">
			<div class="navbar-header">
				<span class="small-menu-label"><?php esc_html_e( 'Menu', 'the-ecommerce-shop' ); ?></span>
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#collapse-navbarprimary">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
					
			<?php
			wp_nav_menu( array(
				'theme_location'    => 'primary',
				'depth'             =>  3,
				'container'         => 'div',
				'container_id'      => 'collapse-navbarprimary',
				'container_class'   => 'collapse navbar-collapse',
				'menu_id' 			=> 'primary-menu',
				'menu_class'        => 'nav navbar-nav primary-menu',
				'fallback_cb'       => 'di_ecommerce_nav_fallback',
				'walker'            => new Di_eCommerce_Nav_Menu_Walker()
				));
			?>

			<?php
			if( get_theme_mod( 'cta_endis', '1' ) == '1' ) {

				$cta_trgt = '';
				if( get_theme_mod( 'cta_link_trgt', '0' ) == 1 ) {
					$cta_trgt = 'target="_blank"';
				}

				?>
				<a class="di-cta larged" <?php echo $cta_trgt; ?> href="<?php echo esc_url( get_theme_mod( 'cta_link', home_url( '/' ) ) ); ?>"><?php echo esc_html( get_theme_mod( 'cta_label', __( 'Shop Now!', 'the-ecommerce-shop' ) ) ); ?></a>
				<?php
			}
			?>

		</div>
	</nav>

	<?php
	if( get_theme_mod( 'cta_endis', '1' ) == '1' ) {

		$cta_trgt = '';
		if( get_theme_mod( 'cta_link_trgt', '0' ) == 1 ) {
			$cta_trgt = 'target="_blank"';
		}
		
		?>
		<a class="di-cta smalld" <?php echo $cta_trgt; ?> href="<?php echo esc_url( get_theme_mod( 'cta_link', home_url( '/' ) ) ); ?>"><?php echo esc_html( get_theme_mod( 'cta_label', __( 'Shop Now!', 'the-ecommerce-shop' ) ) ); ?></a>
		<?php
	}
	?>

<?php
}
?>
</div>
