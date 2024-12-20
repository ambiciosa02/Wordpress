<?php
/**
 * Title: Best Selling
 * Slug: craftify/best-selling
 * Categories: craftify
 *
 * @package Craftify
 * @since 1.0.0
 */

?>


<?php if (function_exists('wc_booster_load') && class_exists('WooCommerce')) { ?>
<!-- wp:group {"style":{"spacing":{"padding":{"right":"24px","left":"24px","top":"40px","bottom":"40px"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:40px;padding-right:24px;padding-bottom:40px;padding-left:24px"><!-- wp:heading {"textAlign":"center","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"40px","left":"0","right":"0"}},"typography":{"lineHeight":"1.2","fontStyle":"normal","fontWeight":"700"}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-text-align-center has-large-font-size" style="margin-top:0;margin-right:0;margin-bottom:40px;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:700;line-height:1.2"><?php echo esc_html__( 'Best Selling Products', 'craftify' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:wc-booster/carousel-product {"block_id":"wc-booster-carousel-product-block-b24b1585-4db6-40ef-b996-155626184a17","categories":"38","titleTypo":{"fontFamily":"","fontSize":{"units":["px","em","rem"],"activeUnit":"px","values":{"desktop":18,"tablet":18,"mobile":18},"range":{"min":0,"max":100}},"fontWeight":500,"lineHeight":{"activeUnit":"px","units":["px"],"values":{"desktop":28,"tablet":28,"mobile":28}},"":{"activeUnit":"px","range":{"min":0,"max":100},"values":{"desktop":18,"tablet":18,"mobile":18},"units":["px","em","rem"]}},"priceTypo":{"fontFamily":"","fontSize":{"units":["px","em","rem"],"activeUnit":"px","values":{"desktop":16,"tablet":16,"mobile":16},"range":{"min":0,"max":100}},"fontWeight":400,"lineHeight":{"activeUnit":"","units":[""],"values":{"desktop":1.2,"tablet":1.2,"mobile":1.2}},"":{"activeUnit":"px","range":{"min":0,"max":100},"values":{"desktop":16,"tablet":16,"mobile":17},"units":["px","em","rem"]}},"ratingTypo":{"fontFamily":"","fontSize":{"units":["px","em","rem"],"activeUnit":"px","values":{"desktop":18,"tablet":18,"mobile":18},"range":{"min":0,"max":100}},"fontWeight":400,"lineHeight":{"activeUnit":"","units":[""],"values":{"desktop":1.2,"tablet":1.2,"mobile":1.2}},"":{"activeUnit":"px","range":{"min":0,"max":100},"values":{"desktop":18,"tablet":18,"mobile":17},"units":["px","em","rem"]}},"padding":{"activeUnit":"px","isLinkActive":true,"properties":["top","right","bottom","left"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","rem"],"values":{"desktop":[0,0,0,0],"tablet":[20,20,20,20],"mobile":[20,20,20,20]}},"productPadding":{"activeUnit":"px","isLinkActive":false,"properties":["top","right","bottom","left"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","rem"],"values":{"desktop":[0,0,0,0],"tablet":[0,0,15,0],"mobile":[0,0,15,0]}},"enableQuickView":true,"enableWishList":true,"enableCategory":false,"enableButton":false,"productBgColor":"","bgColor":"","arrowRadius":12,"imageRadius":12,"arrowPositionTop":{"activeUnit":"em","range":{"min":-1000,"max":1000},"values":{"desktop":7,"tablet":7,"mobile":8},"responsiveViews":["desktop","tablet","mobile"],"units":["px","em"]},"arrowPositionRight":{"activeUnit":"px","range":{"min":-2000,"max":2000},"values":{"desktop":-3,"tablet":-3,"mobile":-3},"responsiveViews":["desktop","tablet","mobile"],"units":["px","em"]},"arrowSize":{"activeUnit":"px","isLinkActive":true,"properties":["height","width"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","em"],"values":{"desktop":[40,40],"tablet":[35,35],"mobile":[35,35]}}} -->
<!-- wp:wc-booster/quick-view {"color":"#ffffff","bgColor":"#000"} /-->

<!-- wp:wc-booster/wish-list-button {"iconColor":"#ffffff","bgColor":"#000","position":{"activeUnit":"px","isLinkActive":false,"properties":["top","left"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","rem"],"values":{"desktop":[8,22],"tablet":[8,22],"mobile":[8,22]}},"padding":{"activeUnit":"px","isLinkActive":false,"properties":["top","right","bottom","left"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","rem"],"values":{"desktop":[7,8,7,8],"tablet":[7,8,7,8],"mobile":[7,8,7,8]}}} /-->
<!-- /wp:wc-booster/carousel-product --></div>
<!-- /wp:group -->

<?php } else { ?>

<!-- wp:group {"metadata":{"name":"Best Selling"},"className":"craftify-best-selling","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"24px","left":"24px","bottom":"40px","top":"40px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group craftify-best-selling" style="margin-top:0;margin-bottom:0;padding-top:40px;padding-right:24px;padding-bottom:40px;padding-left:24px"><!-- wp:heading {"textAlign":"center","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"40px","left":"0","right":"0"}},"typography":{"lineHeight":"1.2","fontStyle":"normal","fontWeight":"700"}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-text-align-center has-large-font-size" style="margin-top:0;margin-right:0;margin-bottom:40px;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:700;line-height:1.2"><?php echo esc_html__( 'Best Selling Products', 'craftify' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:columns {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-columns" style="margin-top:0;margin-bottom:0"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner.jpg","id":72,"dimRatio":0,"customOverlayColor":"#f0f0ef","isUserOverlayColor":true,"minHeight":320,"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"0"}},"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover" style="border-radius:12px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:320px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#f0f0ef"></span><img class="wp-block-cover__image-background wp-image-72" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:0"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|luminous-vivid-amber"}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"textColor":"luminous-vivid-amber","fontSize":"medium"} -->
<p class="has-luminous-vivid-amber-color has-text-color has-link-color has-medium-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php echo esc_html__( '☆☆☆☆☆', 'craftify' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"typography":{"lineHeight":"1.5"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"textColor":"secondary","fontSize":"small"} -->
<h2 class="wp-block-heading has-secondary-color has-text-color has-link-color has-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1.5"><a href="#"><?php echo esc_html__( 'White Fabric Sofa', 'craftify' ); ?></a></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"var:preset|spacing|20","bottom":"0","left":"0","right":"0"}}},"fontSize":"medium-small"} -->
<p class="has-medium-small-font-size" style="margin-top:var(--wp--preset--spacing--20);margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php echo esc_html__( '$112.00', 'craftify' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/kitchen.jpg","id":127,"dimRatio":0,"customOverlayColor":"#f0f0ef","isUserOverlayColor":true,"minHeight":320,"isDark":false,"style":{"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light" style="border-radius:12px;min-height:320px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#f0f0ef"></span><img class="wp-block-cover__image-background wp-image-127" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/kitchen.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:0"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|luminous-vivid-amber"}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"textColor":"luminous-vivid-amber","fontSize":"medium"} -->
<p class="has-luminous-vivid-amber-color has-text-color has-link-color has-medium-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php echo esc_html__( '☆☆☆☆☆', 'craftify' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"typography":{"lineHeight":"1.5"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"textColor":"secondary","fontSize":"small"} -->
<h2 class="wp-block-heading has-secondary-color has-text-color has-link-color has-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1.5"><a href="#"><?php echo esc_html__( 'White Fabric Sofa', 'craftify' ); ?></a></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"var:preset|spacing|20","bottom":"0","left":"0","right":"0"}}},"fontSize":"medium-small"} -->
<p class="has-medium-small-font-size" style="margin-top:var(--wp--preset--spacing--20);margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php echo esc_html__( '$112.00', 'craftify' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner.jpg","id":72,"dimRatio":0,"customOverlayColor":"#f0f0ef","isUserOverlayColor":true,"minHeight":320,"style":{"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover" style="border-radius:12px;min-height:320px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#f0f0ef"></span><img class="wp-block-cover__image-background wp-image-72" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30)"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|luminous-vivid-amber"}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"textColor":"luminous-vivid-amber","fontSize":"medium"} -->
<p class="has-luminous-vivid-amber-color has-text-color has-link-color has-medium-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php echo esc_html__( '☆☆☆☆☆', 'craftify' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"typography":{"lineHeight":"1.5"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"textColor":"secondary","fontSize":"small"} -->
<h2 class="wp-block-heading has-secondary-color has-text-color has-link-color has-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1.5"><a href="#"><?php echo esc_html__( 'White Fabric Sofa', 'craftify' ); ?></a></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"var:preset|spacing|20","bottom":"0","left":"0","right":"0"}}},"fontSize":"medium-small"} -->
<p class="has-medium-small-font-size" style="margin-top:var(--wp--preset--spacing--20);margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php echo esc_html__( '$112.00', 'craftify' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/kitchen.jpg","id":127,"dimRatio":0,"customOverlayColor":"#f0f0ef","isUserOverlayColor":true,"minHeight":320,"isDark":false,"style":{"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light" style="border-radius:12px;min-height:320px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#f0f0ef"></span><img class="wp-block-cover__image-background wp-image-127" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/kitchen.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30)"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|luminous-vivid-amber"}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"textColor":"luminous-vivid-amber","fontSize":"medium"} -->
<p class="has-luminous-vivid-amber-color has-text-color has-link-color has-medium-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php echo esc_html__( '☆☆☆☆☆', 'craftify' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"typography":{"lineHeight":"1.5"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"textColor":"secondary","fontSize":"small"} -->
<h2 class="wp-block-heading has-secondary-color has-text-color has-link-color has-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1.5"><a href="#"><?php echo esc_html__( 'White Fabric Sofa', 'craftify' ); ?></a></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"0","left":"0","right":"0"}}},"fontSize":"medium-small"} -->
<p class="has-medium-small-font-size" style="margin-top:var(--wp--preset--spacing--20);margin-right:0;margin-bottom:0;margin-left:0"><?php echo esc_html__( '$112.00', 'craftify' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<?php } ?>