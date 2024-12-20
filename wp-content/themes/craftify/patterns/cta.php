<?php
/**
 * Title: Cta
 * Slug: craftify/cta
 * Categories: craftify
 *
 * @package Craftify
 * @since 1.0.0
 */

?>

<?php if (function_exists('wc_booster_load') && class_exists('WooCommerce')) { ?>

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"40px","bottom":"40px","left":"0px","right":"0px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:40px;padding-right:0px;padding-bottom:40px;padding-left:0px"><!-- wp:wc-booster/call-to-action {"block_id":"wc-booster-cta-block-43d07948-e416-46a9-bcdc-43839d168ac0","bgImage":{"size":"full","id":153,"alt":"","url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner-2.jpg","height":796,"width":1200,"sizes":{"full":{"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner-2.jpg","height":796,"width":1200,"orientation":"landscape"}}},"bgColor":"","bgAttachment":true,"padding":{"activeUnit":"px","isLinkActive":false,"properties":["top","right","bottom","left"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","rem"],"values":{"desktop":[120,24,120,24],"tablet":[100,24,100,24],"mobile":[80,24,80,24]}},"subDescriptionMargin":{"activeUnit":"px","isLinkActive":false,"properties":["top","right","bottom","left"],"responsiveViews":["desktop","tablet","mobile"],"units":["px","rem"],"values":{"desktop":[20,0,30,0],"tablet":[15,0,25,0],"mobile":[15,0,20,0]}},"heading":"\u003cbr\u003eUnique Furniture Inspirations","subDescription":"Explore craftify’s curated collection of and classic contemporary pieces designed to\u003cbr\u003ecreate luxury and functional living spaces.","subDescriptionColor":"#ffffff","alignment":"center","headingColor":"#ffffff","opacity":4,"headingTypo":{"fontFamily":"","fontSize":{"units":["px","em","rem"],"activeUnit":"px","values":{"desktop":48,"tablet":38,"mobile":28},"range":{"min":0,"max":100}},"fontWeight":600,"lineHeight":{"activeUnit":"","units":[""],"values":{"desktop":1,"tablet":1,"mobile":1}},"":{"activeUnit":"px","range":{"min":0,"max":100},"values":{"desktop":48,"tablet":38,"mobile":28},"units":["px","em","rem"]}}} -->
<!-- wp:buttons {"align":"left","layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"textAlign":"center"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-align-center wp-element-button"><?php echo esc_html__( 'Explore Now', 'craftify' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
<!-- /wp:wc-booster/call-to-action --></div>
<!-- /wp:group -->

<?php } else { ?>

<!-- wp:group {"metadata":{"name":"Cta"},"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"bottom":"40px","top":"40px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:40px;padding-bottom:40px"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner-2.jpg","id":153,"hasParallax":true,"dimRatio":40,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":500,"style":{"spacing":{"padding":{"right":"24px","left":"24px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover has-parallax" style="padding-right:24px;padding-left:24px;min-height:500px"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-40 has-background-dim"></span><div class="wp-block-cover__image-background wp-image-153 has-parallax" style="background-position:50% 50%;background-image:url(<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner-2.jpg)"></div><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"780px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"500","textTransform":"capitalize","lineHeight":"1.3"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-text-align-center has-x-large-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:500;line-height:1.3;text-transform:capitalize"><?php echo esc_html__( 'unique furniture inspirations', 'craftify' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"0","right":"0"}},"typography":{"lineHeight":"1.7"}}} -->
<p class="has-text-align-center" style="margin-top:var(--wp--preset--spacing--40);margin-right:0;margin-bottom:var(--wp--preset--spacing--40);margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1.7"><?php echo esc_html__( 'Explore craftify\'s curated collection of and classic contemporary pieces designed to create luxury and functional living spaces.', 'craftify' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"0"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--60);margin-bottom:0"><!-- wp:button {"style":{"typography":{"textTransform":"capitalize"}},"fontSize":"small"} -->
<div class="wp-block-button has-custom-font-size has-small-font-size" style="text-transform:capitalize"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Explore now', 'craftify' ); ?> </a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->

<?php } ?>