<?php
/**
 * Title: Header
 * Slug: craftify/header
 * Categories: craftify
 *
 * @package Craftify
 * @since 1.0.0
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"15px","bottom":"15px","left":"24px","right":"24px"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"primary","layout":{"type":"constrained","justifyContent":"center"}} -->
<div class="wp-block-group alignwide has-primary-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:15px;padding-right:24px;padding-bottom:15px;padding-left:24px"><!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center is-not-stacked-on-mobile" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--40);padding-right:0;padding-bottom:var(--wp--preset--spacing--40);padding-left:0"><!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%"><!-- wp:navigation {"textColor":"base","metadata":{"ignoredHookedBlocks":["woocommerce/mini-cart"]},"style":{"spacing":{"margin":{"top":"0"},"blockGap":"32px"},"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"flex","justifyContent":"left","orientation":"horizontal"}} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"20%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:20%"><!-- wp:site-logo {"width":144,"shouldSyncIcon":true,"align":"center","style":{"color":{"duotone":["rgb(255, 255, 255)","rgb(0, 0, 0)"]}}} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%"><!-- wp:group {"style":{"spacing":{"blockGap":"15px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
<div class="wp-block-group">
<?php if (function_exists('wc_booster_load') && class_exists('WooCommerce')) { ?>

<!-- wp:wc-booster/wish-list-item {"block_id":"wc-booster-wishlist-item-block-instance-1-435efeb9-b9b4-44a5-8f9f-2a890277fd97","color":"#ffffff","iconSize":{"activeUnit":"px","range":{"min":1,"max":2000},"values":{"desktop":18,"tablet":18,"mobile":18},"units":["px","em"]}} /-->

<?php } else { ?>

<!-- wp:image {"id":76,"width":"22px","sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":["#fff","#fff"]}}} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/heart.png" alt="" class="wp-image-76" style="width:22px" /></figure>
<!-- /wp:image -->

<?php } ?>

<?php if ( class_exists( 'WooCommerce' ) ) { ?>
<!-- wp:woocommerce/mini-cart {"priceColor":{},"iconColor":{"slug":"base","color":"#fff","name":"Base","class":"has-base-product-count-color"},"productCountColor":{"slug":"base","color":"#fff","name":"Base","class":"has-base-product-count-color"}} /-->

<!-- wp:woocommerce/customer-account {"displayStyle":"icon_only","iconStyle":"line","iconClass":"wc-block-customer-account__account-icon","textColor":"base","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}}} /-->
<?php } ?>
</div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->