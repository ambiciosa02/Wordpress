<?php
/**
 * Title: Featured Products
 * Slug: craftify/featured-products
 * Categories: craftify
 * Keywords: featured-products
 *
 * @package Craftify
 * @since 1.0.0
 */

?>

<?php if (function_exists('wc_booster_load') && class_exists('WooCommerce')) { ?>

<!-- wp:group {"className":"craftify-pro-featured-product","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"24px","left":"24px","top":"40px","bottom":"40px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group craftify-pro-featured-product" style="margin-top:0;margin-bottom:0;padding-top:40px;padding-right:24px;padding-bottom:40px;padding-left:24px"><!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"1.2","fontStyle":"normal","fontWeight":"700"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"40px","left":"0","right":"0"}}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-text-align-center has-large-font-size" style="margin-top:0;margin-right:0;margin-bottom:40px;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:700;line-height:1.2"><?php echo esc_html__( 'Featured Products', 'craftify' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:columns {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0px","left":"0px","right":"0px","bottom":"0px"},"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns" style="margin-top:0;margin-bottom:0;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:column {"width":"33.33%","className":"left-column","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}}} -->
<div class="wp-block-column left-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:33.33%"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/cover.jpg","id":82,"dimRatio":0,"customOverlayColor":"#cbcbca","isUserOverlayColor":true,"minHeight":690,"isDark":false,"style":{"border":{"radius":"12px"}}} -->
<div class="wp-block-cover is-light" style="border-radius:12px;min-height:690px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#cbcbca"></span><img class="wp-block-cover__image-background wp-image-82" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/cover.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"66.66%","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0"}}} -->
<div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:66.66%"><!-- wp:wc-booster/carousel-product {"block_id":"wc-booster-carousel-product-block-3bc4710c-ba51-4a98-8cf9-7587011752ae","alignment":"left","titleTypo":{"fontFamily":"Raleway, sans-serif","fontSize":{"units":["px","em","rem"],"activeUnit":"px","values":{"desktop":18,"tablet":18,"mobile":18},"range":{"min":0,"max":100}},"fontWeight":"500","lineHeight":{"activeUnit":"px","units":["px"],"values":{"desktop":28,"tablet":28,"mobile":28}},"":{"activeUnit":"px","range":{"min":0,"max":100},"values":{"desktop":18,"tablet":18,"mobile":18},"units":["px","em","rem"]}},"priceTypo":{"fontFamily":"","fontSize":{"units":["px","em","rem"],"activeUnit":"px","values":{"desktop":16,"tablet":16,"mobile":16},"range":{"min":0,"max":100}},"fontWeight":"400","lineHeight":{"activeUnit":"","units":[""],"values":{"desktop":1.2,"tablet":1.2,"mobile":1.2}},"":{"activeUnit":"px","range":{"min":0,"max":100},"values":{"desktop":16,"tablet":16,"mobile":16},"units":["px","em","rem"]}},"padding":{"activeUnit":"px","isLinkActive":false,"properties":["top","right","bottom","left"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","rem"],"values":{"desktop":[0,0,20,0],"tablet":[0,0,20,0],"mobile":[0,0,20,0]}},"productMargin":{"activeUnit":"px","isLinkActive":false,"properties":["top","right","bottom","left"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","rem"],"values":{"desktop":[0,10,0,10],"tablet":[0,10,0,10],"mobile":[0,10,0,10]}},"productPadding":{"activeUnit":"px","isLinkActive":false,"properties":["top","right","bottom","left"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","rem"],"values":{"desktop":[0,0,0,0],"tablet":[0,0,0,0],"mobile":[0,0,0,0]}},"enableQuickView":true,"enableWishList":true,"enableRating":false,"enableCategory":false,"enableButton":false,"productBgColor":"","bgColor":"","slidesToShow":{"activeUnit":"","range":{"min":1,"max":10},"values":{"desktop":3,"tablet":3,"mobile":1},"units":[""]},"imageRadius":12,"enableArrow":false} -->
<!-- wp:wc-booster/quick-view {"color":"#ffffff","bgColor":"#000"} /-->

<!-- wp:wc-booster/wish-list-button {"iconColor":"#ffffff","bgColor":"#000","position":{"activeUnit":"px","isLinkActive":false,"properties":["top","left"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","rem"],"values":{"desktop":[8,22],"tablet":[8,22],"mobile":[8,22]}},"padding":{"activeUnit":"px","isLinkActive":false,"properties":["top","right","bottom","left"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","rem"],"values":{"desktop":[7,8,7,8],"tablet":[7,8,7,8],"mobile":[7,8,7,8]}}} /-->
<!-- /wp:wc-booster/carousel-product -->

<!-- wp:wc-booster/carousel-product {"block_id":"wc-booster-carousel-product-block-97bf08d5-7930-459b-9886-ebcd720d854d","alignment":"left","order":"asc","orderBy":"title","titleTypo":{"fontFamily":"Raleway, sans-serif","fontSize":{"units":["px","em","rem"],"activeUnit":"px","values":{"desktop":18,"tablet":18,"mobile":18},"range":{"min":0,"max":100}},"fontWeight":"500","lineHeight":{"activeUnit":"px","units":["px"],"values":{"desktop":28,"tablet":28,"mobile":28}},"":{"activeUnit":"px","range":{"min":0,"max":100},"values":{"desktop":18,"tablet":18,"mobile":18},"units":["px","em","rem"]}},"priceTypo":{"fontFamily":"","fontSize":{"units":["px","em","rem"],"activeUnit":"px","values":{"desktop":16,"tablet":16,"mobile":16},"range":{"min":0,"max":100}},"fontWeight":"400","lineHeight":{"activeUnit":"","units":[""],"values":{"desktop":1.2,"tablet":1.2,"mobile":1.2}},"":{"activeUnit":"px","range":{"min":0,"max":100},"values":{"desktop":16,"tablet":16,"mobile":16},"units":["px","em","rem"]}},"padding":{"activeUnit":"px","isLinkActive":false,"properties":["top","right","bottom","left"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","rem"],"values":{"desktop":[0,0,0,0],"tablet":[0,0,0,0],"mobile":[0,0,0,25]}},"productMargin":{"activeUnit":"px","isLinkActive":false,"properties":["top","right","bottom","left"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","rem"],"values":{"desktop":[0,10,0,10],"tablet":[0,15,0,15],"mobile":[0,15,0,15]}},"productPadding":{"activeUnit":"px","isLinkActive":false,"properties":["top","right","bottom","left"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","rem"],"values":{"desktop":[0,0,0,0],"tablet":[0,0,0,0],"mobile":[0,0,0,0]}},"enableQuickView":true,"enableWishList":true,"enableRating":false,"enableCategory":false,"enableButton":false,"productBgColor":"","bgColor":"","slidesToShow":{"activeUnit":"","range":{"min":1,"max":10},"values":{"desktop":3,"tablet":3,"mobile":1},"units":[""]},"imageRadius":12,"enableArrow":false} -->
<!-- wp:wc-booster/quick-view {"color":"#ffffff","bgColor":"#000"} /-->

<!-- wp:wc-booster/wish-list-button {"iconColor":"#ffffff","bgColor":"#000","position":{"activeUnit":"px","isLinkActive":false,"properties":["top","left"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","rem"],"values":{"desktop":[8,22],"tablet":[8,22],"mobile":[8,22]}},"padding":{"activeUnit":"px","isLinkActive":false,"properties":["top","right","bottom","left"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","rem"],"values":{"desktop":[7,8,7,8],"tablet":[7,8,7,8],"mobile":[7,8,7,8]}}} /-->
<!-- /wp:wc-booster/carousel-product --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<?php } else { ?>

<!-- wp:group {"metadata":{"name":"Featured Products"},"className":"craftify-featured-products","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"24px","left":"24px","top":"40px","bottom":"40px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group craftify-featured-products" style="margin-top:0;margin-bottom:0;padding-top:40px;padding-right:24px;padding-bottom:40px;padding-left:24px"><!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"1.2","fontStyle":"normal","fontWeight":"700"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"40px","left":"0","right":"0"}}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-text-align-center has-large-font-size" style="margin-top:0;margin-right:0;margin-bottom:40px;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:700;line-height:1.2"><?php echo esc_html__( 'Featured Products', 'craftify' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"33.33%"} -->
<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:image {"id":82,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/cover.jpg" alt="" class="wp-image-82" style="border-radius:12px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"66.66%"} -->
<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/living-2.jpg","id":126,"dimRatio":0,"customOverlayColor":"#f0f0ef","isUserOverlayColor":true,"minHeight":250,"isDark":false,"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"0"}},"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light" style="border-radius:12px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:250px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#f0f0ef"></span><img class="wp-block-cover__image-background wp-image-126" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/living-2.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->

<!-- wp:heading {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"0","right":"0"}},"typography":{"lineHeight":"1.5"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"textColor":"secondary","fontSize":"small"} -->
<h2 class="wp-block-heading has-secondary-color has-text-color has-link-color has-small-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-right:0;margin-bottom:var(--wp--preset--spacing--30);margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1.5"><a href="#"><?php echo esc_html__( 'White Fabric Sofa', 'craftify' ); ?></a></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"medium-small"} -->
<p class="has-medium-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php echo esc_html__( '$112.00', 'craftify' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/kitchen.jpg","id":127,"dimRatio":0,"customOverlayColor":"#f0f0ef","isUserOverlayColor":true,"minHeight":250,"isDark":false,"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"0"}},"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light" style="border-radius:12px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:250px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#f0f0ef"></span><img class="wp-block-cover__image-background wp-image-127" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/kitchen.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->

<!-- wp:heading {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"0","right":"0"}},"typography":{"lineHeight":"1.5"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"textColor":"secondary","fontSize":"small"} -->
<h2 class="wp-block-heading has-secondary-color has-text-color has-link-color has-small-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-right:0;margin-bottom:var(--wp--preset--spacing--30);margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1.5"><a href="#"><?php echo esc_html__( 'White Fabric Sofa', 'craftify' ); ?></a></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"medium-small"} -->
<p class="has-medium-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php echo esc_html__( '$112.00', 'craftify' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner.jpg","id":72,"dimRatio":0,"customOverlayColor":"#f0f0ef","isUserOverlayColor":true,"minHeight":250,"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"0"}},"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover" style="border-radius:12px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:250px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#f0f0ef"></span><img class="wp-block-cover__image-background wp-image-72" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->

<!-- wp:heading {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"0","right":"0"}},"typography":{"lineHeight":"1.5"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"textColor":"secondary","fontSize":"small"} -->
<h2 class="wp-block-heading has-secondary-color has-text-color has-link-color has-small-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-right:0;margin-bottom:var(--wp--preset--spacing--30);margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1.5"><a href="#"><?php echo esc_html__( 'White Fabric Sofa', 'craftify' ); ?></a></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"medium-small"} -->
<p class="has-medium-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php echo esc_html__( '$112.00', 'craftify' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner.jpg","id":72,"dimRatio":0,"customOverlayColor":"#f0f0ef","isUserOverlayColor":true,"minHeight":250,"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"0"}},"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover" style="border-radius:12px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:250px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#f0f0ef"></span><img class="wp-block-cover__image-background wp-image-72" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->

<!-- wp:heading {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"0","right":"0"}},"typography":{"lineHeight":"1.5"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"textColor":"secondary","fontSize":"small"} -->
<h2 class="wp-block-heading has-secondary-color has-text-color has-link-color has-small-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-right:0;margin-bottom:var(--wp--preset--spacing--30);margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1.5"><a href="#"><?php echo esc_html__( 'White Fabric Sofa', 'craftify' ); ?></a></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"medium-small"} -->
<p class="has-medium-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php echo esc_html__( '$112.00', 'craftify' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/living-2.jpg","id":126,"dimRatio":0,"customOverlayColor":"#f0f0ef","isUserOverlayColor":true,"minHeight":250,"isDark":false,"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"0"}},"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light" style="border-radius:12px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:250px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#f0f0ef"></span><img class="wp-block-cover__image-background wp-image-126" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/living-2.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->

<!-- wp:heading {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"0","right":"0"}},"typography":{"lineHeight":"1.5"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"textColor":"secondary","fontSize":"small"} -->
<h2 class="wp-block-heading has-secondary-color has-text-color has-link-color has-small-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-right:0;margin-bottom:var(--wp--preset--spacing--30);margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1.5"><a href="#"><?php echo esc_html__( 'White Fabric Sofa', 'craftify' ); ?></a></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"medium-small"} -->
<p class="has-medium-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php echo esc_html__( '$112.00', 'craftify' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/kitchen.jpg","id":127,"dimRatio":0,"customOverlayColor":"#f0f0ef","isUserOverlayColor":true,"minHeight":250,"isDark":false,"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"0"}},"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light" style="border-radius:12px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:250px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#f0f0ef"></span><img class="wp-block-cover__image-background wp-image-127" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/kitchen.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->

<!-- wp:heading {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"0","right":"0"}},"typography":{"lineHeight":"1.5"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"textColor":"secondary","fontSize":"small"} -->
<h2 class="wp-block-heading has-secondary-color has-text-color has-link-color has-small-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-right:0;margin-bottom:var(--wp--preset--spacing--30);margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1.5"><a href="#"><?php echo esc_html__( 'White Fabric Sofa', 'craftify' ); ?></a></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"medium-small"} -->
<p class="has-medium-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php echo esc_html__( '$112.00', 'craftify' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<?php } ?>