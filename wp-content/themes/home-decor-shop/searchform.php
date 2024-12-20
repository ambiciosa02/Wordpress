<?php
/**
 * The template for displaying search form.
 *
 * @package Home Decor Shop
 * @since   1.0
 */
?>

<form class="search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search....', 'home-decor-shop' ); ?>" name="s">
	</label>
	<button class="search-submit"><i class="fa fa-search"></i></button>
</form>