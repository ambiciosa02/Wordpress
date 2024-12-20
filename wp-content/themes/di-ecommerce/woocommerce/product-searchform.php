<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<form class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">

	<input class="search-field" type="text" name="s" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" placeholder="<?php esc_attr_e( 'Search products&hellip;', 'di-ecommerce');  ?>" value="<?php echo get_search_query(); ?>">

	<button type="submit"><span class="fa fa-search <?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ); ?>"></span></button>

    <input type="hidden" name="post_type" value="product" />

</form>
