<?php
/**
 * Title: Banner
 * Slug: craftify/banner
 * Categories: craftify
 * Keywords: banner
 *
 * @package Craftify
 * @since 1.0.0
 */

?>
<!-- wp:group {"metadata":{"name":"Banner"},"className":"craftify-banner","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"bottom":"40px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group craftify-banner" style="margin-top:0;margin-bottom:0;padding-bottom:40px"><!-- wp:group {"metadata":{"categories":["header"],"patternName":"core/header-inside-full-width-background-image","name":"Header inside full-width background image"},"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner.jpg","id":72,"dimRatio":30,"overlayColor":"black","isUserOverlayColor":true,"minHeight":50,"contentPosition":"center center","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-30 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-72" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"20px","bottom":"20px","left":"24px","right":"24px"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","justifyContent":"center"}} -->
<div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0;padding-top:20px;padding-right:24px;padding-bottom:20px;padding-left:24px"><!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center is-not-stacked-on-mobile" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--40);padding-right:0;padding-bottom:var(--wp--preset--spacing--40);padding-left:0"><!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%"><!-- wp:navigation {"textColor":"base","metadata":{"ignoredHookedBlocks":["woocommerce/mini-cart"]},"style":{"spacing":{"margin":{"top":"0"},"blockGap":"32px"},"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"flex","justifyContent":"left","orientation":"horizontal"}} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"20%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:20%"><!-- wp:site-logo {"width":144,"shouldSyncIcon":true,"align":"center","style":{"color":{"duotone":["rgb(255, 255, 255)","rgb(0, 0, 0)"]}}} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%"><!-- wp:group {"style":{"spacing":{"blockGap":"15px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
<div class="wp-block-group"><?php if (function_exists('wc_booster_load') && class_exists('WooCommerce')) { ?>

<!-- wp:wc-booster/wish-list-item {"block_id":"wc-booster-wishlist-item-block-instance-0-3448f9e5-b86c-4e1b-b903-1de83c6d301d","color":"#ffffff","iconSize":{"activeUnit":"px","range":{"min":1,"max":2000},"values":{"desktop":18,"tablet":18,"mobile":18},"units":["px","em"]}} /-->

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

<!-- wp:spacer {"height":"120px"} -->
<div style="height:120px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"style":{"spacing":{"padding":{"right":"24px","left":"24px"}}},"layout":{"type":"constrained","contentSize":"750px"}} -->
<div class="wp-block-group" style="padding-right:24px;padding-left:24px"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.4","textTransform":"none"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-text-align-center has-x-large-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:500;line-height:1.4;text-transform:none"><?php echo esc_html__( 'Make Your Interior Unique.', 'craftify' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|70","left":"0","right":"0"}},"typography":{"lineHeight":"1.7"}}} -->
<p class="has-text-align-center" style="margin-top:var(--wp--preset--spacing--30);margin-right:0;margin-bottom:var(--wp--preset--spacing--70);margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1.7"><?php echo esc_html__( 'Turn your room with panto into a lot more minimalist and modern.Get modern and stylish functional living spaces.', 'craftify' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"textAlign":"center","style":{"typography":{"textTransform":"capitalize"}},"fontSize":"small"} -->
<div class="wp-block-button has-custom-font-size has-small-font-size" style="text-transform:capitalize"><a class="wp-block-button__link has-text-align-center wp-element-button"><?php echo esc_html__( 'Discover now', 'craftify' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"200px"} -->
<div style="height:200px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->