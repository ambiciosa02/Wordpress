<?php
/**
 * Title: Template Single Product
 * Slug: craftify/template-single-product
 * Categories: craftify
 *
 * @package Craftify
 * @since 1.0.0
 */

?>

<!-- wp:group {"tagName":"main","style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"padding":{"right":"2px","left":"2px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-right:2px;padding-left:2px"><!-- wp:woocommerce/store-notices /-->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%">
	
<!-- wp:woocommerce/product-gallery {"thumbnailsNumberOfThumbnails":5,"pagerDisplayMode":"off","productGalleryClientId":"4f0e8050-42c5-49a6-9eb6-12e0902527e5"} -->
<div class="wp-block-woocommerce-product-gallery wc-block-product-gallery wc-block-product-gallery--has-next-previous-buttons-inside-image">
<!-- wp:group {"metadata":{"name":"Gallery Area"},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group">
<!-- wp:woocommerce/product-gallery-thumbnails {"lock":{"move":true,"remove":true}} /-->
<!-- wp:group {"lock":{"move":true,"remove":true},"metadata":{"name":"Large Image and Navigation"},"style":{"layout":{"selfStretch":"fixed","flexSize":"99.9%"},"dimensions":{"minHeight":""},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"radius":"0px","width":"0px","style":"none"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"top"}} -->
<div class="wp-block-group" style="border-style:none;border-width:0px;border-radius:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
<!-- wp:woocommerce/product-gallery-large-image {"lock":{"move":true,"remove":true}} -->
<div class="wp-block-woocommerce-product-gallery-large-image wc-block-product-gallery-large-image__inner-blocks"><!-- wp:woocommerce/product-sale-badge {"isDescendentOfSingleProductTemplate":true,"align":"right","lock":{"move":true},"style":{"spacing":{"margin":{"top":"4px","right":"4px","bottom":"4px","left":"4px"}}}} /-->

<!-- wp:woocommerce/product-gallery-large-image-next-previous {"lock":{"move":true,"remove":true},"layout":{"type":"flex","verticalAlignment":"bottom"}} -->
<div class="wp-block-woocommerce-product-gallery-large-image-next-previous"></div>
<!-- /wp:woocommerce/product-gallery-large-image-next-previous -->
<?php if (function_exists('wc_booster_load') && class_exists('WooCommerce')) { ?>
<!-- wp:wc-booster/wish-list-button {"iconSize":{"activeUnit":"px","range":{"min":1,"max":2000},"values":{"desktop":18,"tablet":16,"mobile":16},"units":["px","em"]},"iconColor":"#ffffff","selectedIconColor":"transparent","bgColor":"#000","position":{"activeUnit":"px","isLinkActive":false,"properties":["top","left"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","rem"],"values":{"desktop":[15,20],"tablet":[8,22],"mobile":[8,22]}},"padding":{"activeUnit":"px","isLinkActive":false,"properties":["top","right","bottom","left"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","rem"],"values":{"desktop":[7,8,7,8],"tablet":[7,8,7,8],"mobile":[7,8,7,8]}}} /-->
<?php } ?>
</div>
<!-- /wp:woocommerce/product-gallery-large-image -->
<!-- wp:woocommerce/product-gallery-pager {"lock":{"move":true,"remove":true}} /-->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:woocommerce/product-gallery --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"50%","style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"16px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:16px"><!-- wp:post-title {"level":1,"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"typography":{"lineHeight":"1"}},"fontSize":"large","__woocommerceNamespace":"woocommerce/product-query/product-title"} /-->

<!-- wp:woocommerce/product-meta -->
<div class="wp-block-woocommerce-product-meta"><!-- wp:woocommerce/product-sku {"isDescendentOfSingleProductTemplate":true} /-->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:post-terms {"term":"product_tag","prefix":"Tags: "} /--></div>
<!-- /wp:group --></div>
<!-- /wp:woocommerce/product-meta --></div>
<!-- /wp:group -->

<!-- wp:woocommerce/product-rating {"isDescendentOfSingleProductTemplate":true,"style":{"spacing":{"margin":{"top":"0","bottom":"16px"}}}} /-->
<?php if (function_exists('wc_booster_load') && class_exists('WooCommerce')) { ?>
<!-- wp:wc-booster/product-price {"block_id":"wc-booster-product-price-block-f5c35fed-5efe-4e53-bde5-61971729c160","textTypo":{"fontFamily":"","fontSize":{"units":["px","em","rem"],"activeUnit":"px","values":{"desktop":24,"tablet":30,"mobile":30},"range":{"min":0,"max":100}},"fontWeight":700,"lineHeight":{"activeUnit":"px","units":["px"],"values":{"desktop":48.3,"tablet":28,"mobile":28},"range":{"min":0,"max":100}}},"margin":{"activeUnit":"px","isLinkActive":false,"properties":["top","right","bottom","left"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","rem"],"values":{"desktop":[0,0,16,0],"tablet":[0,0,0,0],"mobile":[0,0,0,0]}}} /-->
<?php } else { ?>
<!-- wp:woocommerce/product-price {"isDescendentOfSingleProductTemplate":true,"style":{"typography":{"fontSize":"24px","fontStyle":"normal","fontWeight":"500"}}} /-->

<?php } ?>

<!-- wp:post-excerpt {"style":{"typography":{"lineHeight":"1.5","fontSize":"15px"},"spacing":{"margin":{"bottom":"17px"}},"elements":{"link":{"color":{"text":"#646464"}}},"color":{"text":"#646464"}},"__woocommerceNamespace":"woocommerce/product-query/product-summary"} /-->

<?php if (function_exists('wc_booster_load') && class_exists('WooCommerce')) { ?>
<!-- wp:wc-booster/usp {"block_id":"wc-booster-usp-block-f506d0d8-3632-4516-a71a-afa179cdc00c","textColor":"#646464","iconColor":"#1d8516","textTypo":{"fontFamily":"","fontSize":{"units":["px","em","rem"],"activeUnit":"px","values":{"desktop":15,"tablet":15,"mobile":15},"range":{"min":0,"max":100}},"fontWeight":"500","lineHeight":{"activeUnit":"","units":[""],"values":{"desktop":1.5,"tablet":1,"mobile":1},"range":{"min":0,"max":100}}}} /-->
<?php } ?>

<!-- wp:woocommerce/add-to-cart-form /-->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|50"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--20);margin-bottom:var(--wp--preset--spacing--50)"><!-- wp:button {"width":100,"style":{"border":{"radius":"50px"}}} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button" style="border-radius:50px"><?php echo esc_html__( 'Buy with Gpay', 'craftify' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<?php if (function_exists('wc_booster_pro_load') && class_exists('WooCommerce')) { ?>
<!-- wp:wc-booster-pro/product-categories {"block_id":"wc-booster-pro-product-categories-block-e61c8014-8058-4862-8029-26251abd7d0a","categoryPadding":{"activeUnit":"px","isLinkActive":false,"properties":["top","right","bottom","left"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","rem"],"values":{"desktop":[5,12,5,12],"tablet":[0,12,0,12],"mobile":[0,12,0,12]}},"iconColor":"#646464","textColor":"#646464"} /-->
<?php } else { ?>
<!-- wp:post-terms {"term":"product_cat"} /-->
<?php } ?>
</div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:woocommerce/product-details {"align":"wide","className":"is-style-minimal","style":{"spacing":{"margin":{"top":"var:preset|spacing|70"}}}} /--></div>
<!-- /wp:group -->

<?php  
if (function_exists('wc_booster_load') && class_exists('WooCommerce') ) { ?>
<!-- wp:heading {"style":{"spacing":{"margin":{"top":"40px","bottom":"40px"}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size" style="margin-top:40px;margin-bottom:40px;font-style:normal;font-weight:700"><?php echo esc_html__( 'You may also like', 'craftify' ); ?>...</h2>
<!-- /wp:heading -->
<!-- wp:wc-booster/linked-product {"block_id":"wc-booster-linked-product-block-96fd46ba-374c-4cef-8453-7359a6bfd7d4","alignment":"left","postsToShow":8,"titleTypo":{"fontFamily":"","fontSize":{"units":["px","em","rem"],"activeUnit":"px","values":{"desktop":18,"tablet":20,"mobile":20},"range":{"min":0,"max":100}},"fontWeight":"600","lineHeight":{"activeUnit":"px","units":["px"],"values":{"desktop":28,"tablet":28,"mobile":28}}},"metaTypo":{"fontFamily":"","fontSize":{"units":["px","em","rem"],"activeUnit":"px","values":{"desktop":14,"tablet":12,"mobile":12},"range":{"min":0,"max":100}},"fontWeight":400,"lineHeight":{"activeUnit":"","units":[""],"values":{"desktop":1.2,"tablet":1.2,"mobile":1.2}}},"priceTypo":{"fontFamily":"","fontSize":{"units":["px","em","rem"],"activeUnit":"px","values":{"desktop":14,"tablet":17,"mobile":17},"range":{"min":0,"max":100}},"fontWeight":400,"lineHeight":{"activeUnit":"","units":[""],"values":{"desktop":1.2,"tablet":1.2,"mobile":1.2}}},"ratingTypo":{"fontFamily":"","fontSize":{"units":["px","em","rem"],"activeUnit":"px","values":{"desktop":16,"tablet":17,"mobile":17},"range":{"min":0,"max":100}},"fontWeight":400,"lineHeight":{"activeUnit":"","units":[""],"values":{"desktop":1.2,"tablet":1.2,"mobile":1.2}}},"buttonTypo":{"fontFamily":"","fontSize":{"units":["px","em","rem"],"activeUnit":"px","values":{"desktop":16,"tablet":17,"mobile":17},"range":{"min":0,"max":100}},"fontWeight":400,"lineHeight":{"activeUnit":"","units":[""],"values":{"desktop":1.2,"tablet":1.2,"mobile":1.2}},"textTransform":"uppercase"},"buttonPadding":{"activeUnit":"px","isLinkActive":false,"properties":["top","right","bottom","left"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","rem"],"values":{"desktop":[10,0,10,110],"tablet":[14,0,14,100],"mobile":[14,0,14,150]}},"buttonMargin":{"activeUnit":"px","isLinkActive":false,"properties":["top","right","bottom","left"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","rem"],"values":{"desktop":[23,0,16,0],"tablet":[23,0,15,0],"mobile":[23,0,15,0]}},"shopNowText":"Add to Cart","buttonTextColor":"#000","buttonBackground":"transparent","buttonRadius":28,"padding":{"activeUnit":"px","isLinkActive":true,"properties":["top","right","bottom","left"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","rem"],"values":{"desktop":[0,0,0,0],"tablet":[0,0,0,0],"mobile":[0,0,0,0]}},"productMargin":{"activeUnit":"px","isLinkActive":false,"properties":["top","right","bottom","left"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","rem"],"values":{"desktop":[0,15,0,0],"tablet":[0,15,0,0],"mobile":[0,15,0,0]}},"productPadding":{"activeUnit":"px","isLinkActive":false,"properties":["top","right","bottom","left"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","rem"],"values":{"desktop":[0,0,0,0],"tablet":[0,0,15,0],"mobile":[0,0,15,0]}},"enableQuickView":true,"enableWishList":true,"enableRating":false,"enableCategory":false,"enableDescription":false,"ratingColor":"#fdc62c","arrowRightBgColor":"#454245","arrowLeftBgColor":"#454245","slidesToShow":{"activeUnit":"","range":{"min":1,"max":10},"values":{"desktop":4,"tablet":3,"mobile":1},"units":[""]},"arrowHeight":42,"arrowWidth":42,"imageRadius":2,"arrowPositionTop":{"activeUnit":"em","range":{"min":-1000,"max":1000},"values":{"desktop":8,"tablet":8,"mobile":8},"responsiveViews":["desktop","tablet","mobile"],"units":["px","em"]},"arrowPositionRight":{"activeUnit":"px","range":{"min":-2000,"max":2000},"values":{"desktop":5,"tablet":-3,"mobile":-3},"responsiveViews":["desktop","tablet","mobile"],"units":["px","em"]},"arrowPositionLeft":{"activeUnit":"px","range":{"min":-2000,"max":2000},"values":{"desktop":-20,"tablet":-20,"mobile":-12},"responsiveViews":["desktop","tablet","mobile"],"units":["px","em"]}} -->


<?php  
if (function_exists('wc_booster_load') && class_exists('WooCommerce') ) { ?>

<!-- wp:wc-booster/quick-view {"top":{"activeUnit":"px","range":{"min":1,"max":500},"values":{"desktop":40,"tablet":45,"mobile":45},"units":["px","em"]},"left":{"activeUnit":"px","range":{"min":1,"max":500},"values":{"desktop":15,"tablet":22,"mobile":22},"units":["px","em"]},"color":"#ffffff","bgColor":"#000"} /-->

<!-- wp:wc-booster/wish-list-button {"iconSize":{"activeUnit":"px","range":{"min":1,"max":2000},"values":{"desktop":18,"tablet":16,"mobile":16},"units":["px","em"]},"iconColor":"#ffffff","selectedIconColor":"transparent","bgColor":"#000","position":{"activeUnit":"px","isLinkActive":false,"properties":["top","left"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","rem"],"values":{"desktop":[15,20],"tablet":[8,22],"mobile":[8,22]}},"padding":{"activeUnit":"px","isLinkActive":false,"properties":["top","right","bottom","left"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","rem"],"values":{"desktop":[7,8,7,8],"tablet":[7,8,7,8],"mobile":[7,8,7,8]}}} /-->
<?php } ?>

<!-- /wp:wc-booster/linked-product -->
<?php } else { ?>
	<!-- wp:woocommerce/related-products {"align":"wide"} -->
<div class="wp-block-woocommerce-related-products alignwide"><!-- wp:query {"queryId":0,"query":{"perPage":5,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","author":"","search":"","exclude":[],"sticky":"","inherit":false},"namespace":"woocommerce/related-products","lock":{"remove":true,"move":true}} -->
<div class="wp-block-query"><!-- wp:heading {"style":{"spacing":{"margin":{"top":"40px","bottom":"40px"}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size" style="margin-top:40px;margin-bottom:40px;font-style:normal;font-weight:700">
<?php echo esc_html__( 'Related products', 'craftify' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:post-template {"className":"products-block-post-template","layout":{"type":"grid","columnCount":4},"__woocommerceNamespace":"woocommerce/product-query/product-template"} -->

<?php  
if (function_exists('wc_booster_load') && class_exists('WooCommerce') ) { ?>
<!-- wp:wc-booster/quick-view {"top":{"activeUnit":"px","range":{"min":1,"max":500},"values":{"desktop":40,"tablet":45,"mobile":45},"units":["px","em"]},"left":{"activeUnit":"px","range":{"min":1,"max":500},"values":{"desktop":15,"tablet":22,"mobile":22},"units":["px","em"]},"color":"#ffffff","bgColor":"#000"} /-->

<!-- wp:wc-booster/wish-list-button {"iconSize":{"activeUnit":"px","range":{"min":1,"max":2000},"values":{"desktop":18,"tablet":16,"mobile":16},"units":["px","em"]},"iconColor":"#ffffff","selectedIconColor":"transparent","bgColor":"#000","position":{"activeUnit":"px","isLinkActive":false,"properties":["top","left"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","rem"],"values":{"desktop":[15,20],"tablet":[8,22],"mobile":[8,22]}},"padding":{"activeUnit":"px","isLinkActive":false,"properties":["top","right","bottom","left"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","rem"],"values":{"desktop":[7,8,7,8],"tablet":[7,8,7,8],"mobile":[7,8,7,8]}}} /-->
<?php } ?>

<!-- wp:woocommerce/product-image {"isDescendentOfQueryLoop":true,"height":"320px","style":{"border":{"radius":"4px"}},"metadata":{"ignoredHookedBlocks":["wc-booster/wish-list-button","wc-booster/quick-view"]}} /-->

<!-- wp:post-title {"textAlign":"left","level":3,"fontSize":"medium","__woocommerceNamespace":"woocommerce/product-query/product-title"} /-->

<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"left","fontSize":"small","style":{"spacing":{"margin":{"bottom":"1rem"}}}} /-->
 

<!-- wp:woocommerce/product-button {"textAlign":"center","width":100,"isDescendentOfQueryLoop":true,"className":"is-style-outline","fontSize":"small","style":{"spacing":{"margin":{"bottom":"1rem"}},"border":{"radius":"50px"}}} /-->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:woocommerce/related-products -->
<?php } ?>
</main>
<!-- /wp:group -->