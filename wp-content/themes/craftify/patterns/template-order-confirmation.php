<?php
/**
 * Title: Template Order Confirmation
 * Slug: craftify/template-order-confirmation
 * Categories: craftify
 *
 * @package Craftify
 * @since 1.0.0
 */

?>
<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"80px","bottom":"80px","left":"24px","right":"24px"}}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<main class="wp-block-group has-base-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:80px;padding-right:24px;padding-bottom:80px;padding-left:24px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px"><!-- wp:woocommerce/order-confirmation-status {"fontSize":"large"} /-->

<!-- wp:woocommerce/order-confirmation-summary /-->

<!-- wp:woocommerce/order-confirmation-totals-wrapper {"align":"wide"} -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"24px"}}} -->
<h3 class="wp-block-heading" style="font-size:24px"><?php echo esc_html__( 'Order details', 'craftify' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:woocommerce/order-confirmation-totals {"lock":{"remove":true}} /-->
<!-- /wp:woocommerce/order-confirmation-totals-wrapper -->

<!-- wp:woocommerce/order-confirmation-downloads-wrapper {"align":"wide"} -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"24px"}}} -->
<h3 class="wp-block-heading" style="font-size:24px"><?php echo esc_html__( 'Downloads', 'craftify' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:woocommerce/order-confirmation-downloads {"lock":{"remove":true}} /-->
<!-- /wp:woocommerce/order-confirmation-downloads-wrapper -->

<!-- wp:columns {"align":"wide","className":"woocommerce-order-confirmation-address-wrapper"} -->
<div class="wp-block-columns alignwide woocommerce-order-confirmation-address-wrapper"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:woocommerce/order-confirmation-shipping-wrapper {"align":"wide"} -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"24px"}}} -->
<h3 class="wp-block-heading" style="font-size:24px"><?php echo esc_html__( 'Shipping address', 'craftify' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:woocommerce/order-confirmation-shipping-address {"lock":{"remove":true}} /-->
<!-- /wp:woocommerce/order-confirmation-shipping-wrapper --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:woocommerce/order-confirmation-billing-wrapper {"align":"wide"} -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"24px"}}} -->
<h3 class="wp-block-heading" style="font-size:24px"><?php echo esc_html__( 'Billing address', 'craftify' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:woocommerce/order-confirmation-billing-address {"lock":{"remove":true}} /-->
<!-- /wp:woocommerce/order-confirmation-billing-wrapper --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:woocommerce/order-confirmation-additional-information /--></div>
<!-- /wp:group --></main>
<!-- /wp:group -->