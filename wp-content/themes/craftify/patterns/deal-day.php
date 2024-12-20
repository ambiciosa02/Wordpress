<?php
/**
 * Title: Deal Day
 * Slug: craftify/deal-day
 * Categories: craftify
 *
 * @package Craftify
 * @since 1.0.0
 */

?>

<?php if (function_exists('wc_booster_load') && class_exists('WooCommerce')) { ?>

<!-- wp:group {"className":"craftify-pro-deal","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"24px","left":"24px","top":"40px","bottom":"40px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group craftify-pro-deal" style="margin-top:0;margin-bottom:0;padding-top:40px;padding-right:24px;padding-bottom:40px;padding-left:24px"><!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"1.2","fontStyle":"normal","fontWeight":"700"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"40px","left":"0","right":"0"}}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-text-align-center has-large-font-size" style="margin-top:0;margin-right:0;margin-bottom:40px;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:700;line-height:1.2"><?php echo esc_html__( 'Deal Of the Day', 'craftify' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:query {"queryId":19,"query":{"perPage":"2","pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[]},"metadata":{"categories":["posts"],"patternName":"core/query-medium-posts","name":"Image at left"}} -->
<div class="wp-block-query"><!-- wp:post-template -->
<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"radius":"12px"}},"backgroundColor":"base"} -->
<div class="wp-block-columns alignwide has-base-background-color has-background" style="border-radius:12px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"width":"45%"} -->
<div class="wp-block-column" style="flex-basis:45%"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/4","style":{"border":{"radius":"12px"}}} /--></div>
<!-- /wp:column -->

<!-- wp:column {"width":"55%","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}}} -->
<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40);flex-basis:55%"><!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0"}}},"fontSize":"medium-large"} /-->

<!-- wp:woocommerce/product-rating {"isDescendentOfQueryLoop":true,"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|40"}}}} /-->

<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"fontSize":"small","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"var:preset|spacing|50"}}}} /-->

<!-- wp:post-excerpt {"excerptLength":25,"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}},"typography":{"lineHeight":1.6}}} /-->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"blockGap":"1px"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--60);margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"5px","bottom":"5px","left":"20px","right":"20px"}}},"backgroundColor":"secondary-bg","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-secondary-bg-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:5px;padding-right:20px;padding-bottom:5px;padding-left:20px"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"medium"} -->
<p class="has-text-align-center has-medium-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:500;line-height:1.2">63</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"#8b8b8b"}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"color":{"text":"#8b8b8b"},"typography":{"lineHeight":"1"}},"fontSize":"medium-small"} -->
<p class="has-text-color has-link-color has-medium-small-font-size" style="color:#8b8b8b;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1">Days</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"5px","bottom":"5px","left":"20px","right":"20px"}}},"backgroundColor":"secondary-bg","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-secondary-bg-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:5px;padding-right:20px;padding-bottom:5px;padding-left:20px"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"medium"} -->
<p class="has-text-align-center has-medium-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:500;line-height:1.2">06</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"#8b8b8b"}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"color":{"text":"#8b8b8b"},"typography":{"lineHeight":"1"}},"fontSize":"medium-small"} -->
<p class="has-text-color has-link-color has-medium-small-font-size" style="color:#8b8b8b;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1">Hours</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"5px","bottom":"5px","left":"20px","right":"20px"}}},"backgroundColor":"secondary-bg","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-secondary-bg-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:5px;padding-right:20px;padding-bottom:5px;padding-left:20px"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"medium"} -->
<p class="has-text-align-center has-medium-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:500;line-height:1.2">57</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"#8b8b8b"}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"color":{"text":"#8b8b8b"},"typography":{"lineHeight":"1"}},"fontSize":"medium-small"} -->
<p class="has-text-color has-link-color has-medium-small-font-size" style="color:#8b8b8b;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1">Min</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"5px","bottom":"5px","left":"20px","right":"20px"}},"color":{"background":"#fafafaed"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background" style="background-color:#fafafaed;margin-top:0;margin-bottom:0;padding-top:5px;padding-right:20px;padding-bottom:5px;padding-left:20px"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"medium"} -->
<p class="has-text-align-center has-medium-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:500;line-height:1.2">21</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"#8b8b8b"}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"color":{"text":"#8b8b8b"},"typography":{"lineHeight":"1"}},"fontSize":"medium-small"} -->
<p class="has-text-color has-link-color has-medium-small-font-size" style="color:#8b8b8b;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1">Sec</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->   

<?php } else { ?>

<!-- wp:group {"metadata":{"name":"Deal Day"},"className":"craftify-deal","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"24px","left":"24px","bottom":"40px","top":"40px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group craftify-deal" style="margin-top:0;margin-bottom:0;padding-top:40px;padding-right:24px;padding-bottom:40px;padding-left:24px"><!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"1.2","fontStyle":"normal","fontWeight":"700"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"40px","left":"0","right":"0"}}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-text-align-center has-large-font-size" style="margin-top:0;margin-right:0;margin-bottom:40px;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:700;line-height:1.2"><?php echo esc_html__( 'Deal Of the Day', 'craftify' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"backgroundColor":"base"} -->
<div class="wp-block-column has-base-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"45%"} -->
<div class="wp-block-column" style="flex-basis:45%"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/living-2.jpg","id":126,"dimRatio":0,"customOverlayColor":"#f0f0ef","isUserOverlayColor":true,"contentPosition":"top left","isDark":false,"style":{"dimensions":{"aspectRatio":"3/4"},"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light has-custom-content-position is-position-top-left" style="border-radius:12px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#f0f0ef"></span><img class="wp-block-cover__image-background wp-image-126" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/living-2.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"spacing":{"padding":{"top":"5px","bottom":"5px","left":"8px","right":"8px"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"typography":{"lineHeight":"1"}},"backgroundColor":"primary","textColor":"base","fontSize":"x-small"} -->
<p class="has-base-color has-primary-background-color has-text-color has-background has-link-color has-x-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:5px;padding-right:8px;padding-bottom:5px;padding-left:8px;line-height:1"><?php echo esc_html__( 'Sale', 'craftify' ); ?></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"55%","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}}} -->
<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);flex-basis:55%"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"lineHeight":"1","fontStyle":"normal","fontWeight":"500"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"0","right":"0"}}},"fontSize":"medium-large"} -->
<h2 class="wp-block-heading has-medium-large-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-right:0;margin-bottom:var(--wp--preset--spacing--30);margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:500;line-height:1"><a href="#"><?php echo esc_html__( 'White fabric sofa', 'craftify' ); ?></a></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|luminous-vivid-amber"}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"typography":{"lineHeight":"1"}},"textColor":"luminous-vivid-amber","fontSize":"medium"} -->
<p class="has-luminous-vivid-amber-color has-text-color has-link-color has-medium-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1"><?php echo esc_html__( '☆☆☆☆☆', 'craftify' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"craftify-deal-price","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group craftify-deal-price" style="margin-top:0;margin-bottom:0"><!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"0","right":"0"}}}} -->
<p style="margin-top:var(--wp--preset--spacing--40);margin-right:0;margin-bottom:var(--wp--preset--spacing--40);margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php echo esc_html__( '$112.00', 'craftify' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|tertiary"}}}},"textColor":"tertiary"} -->
<p class="has-tertiary-color has-text-color has-link-color"><?php echo esc_html__( '$150.00', 'craftify' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"typography":{"lineHeight":"1.7"}}} -->
<p style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1.7"><?php echo esc_html__( 'Explore craftify\'s curated collection of and classic contemporary pieces designed to create luxury and functional living spaces.', 'craftify' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"blockGap":"1px"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--60);margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"5px","bottom":"5px","left":"20px","right":"20px"}}},"backgroundColor":"secondary-bg","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-secondary-bg-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:5px;padding-right:20px;padding-bottom:5px;padding-left:20px"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"medium"} -->
<p class="has-text-align-center has-medium-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:500;line-height:1.2"><?php echo esc_html__( '63', 'craftify' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"#8b8b8b"}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"color":{"text":"#8b8b8b"},"typography":{"lineHeight":"1"}},"fontSize":"medium-small"} -->
<p class="has-text-color has-link-color has-medium-small-font-size" style="color:#8b8b8b;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1"><?php echo esc_html__( 'Days', 'craftify' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"5px","bottom":"5px","left":"20px","right":"20px"}}},"backgroundColor":"secondary-bg","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-secondary-bg-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:5px;padding-right:20px;padding-bottom:5px;padding-left:20px"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"medium"} -->
<p class="has-text-align-center has-medium-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:500;line-height:1.2"><?php echo esc_html__( '06', 'craftify' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"#8b8b8b"}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"color":{"text":"#8b8b8b"},"typography":{"lineHeight":"1"}},"fontSize":"medium-small"} -->
<p class="has-text-color has-link-color has-medium-small-font-size" style="color:#8b8b8b;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1"><?php echo esc_html__( 'Hours', 'craftify' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"5px","bottom":"5px","left":"20px","right":"20px"}}},"backgroundColor":"secondary-bg","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-secondary-bg-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:5px;padding-right:20px;padding-bottom:5px;padding-left:20px"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"medium"} -->
<p class="has-text-align-center has-medium-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:500;line-height:1.2"><?php echo esc_html__( '57', 'craftify' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"#8b8b8b"}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"color":{"text":"#8b8b8b"},"typography":{"lineHeight":"1"}},"fontSize":"medium-small"} -->
<p class="has-text-color has-link-color has-medium-small-font-size" style="color:#8b8b8b;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1"><?php echo esc_html__( 'Min', 'craftify' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"5px","bottom":"5px","left":"20px","right":"20px"}},"color":{"background":"#fafafaed"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background" style="background-color:#fafafaed;margin-top:0;margin-bottom:0;padding-top:5px;padding-right:20px;padding-bottom:5px;padding-left:20px"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"medium"} -->
<p class="has-text-align-center has-medium-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:500;line-height:1.2"><?php echo esc_html__( '21', 'craftify' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"#8b8b8b"}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"color":{"text":"#8b8b8b"},"typography":{"lineHeight":"1"}},"fontSize":"medium-small"} -->
<p class="has-text-color has-link-color has-medium-small-font-size" style="color:#8b8b8b;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1"><?php echo esc_html__( 'Sec', 'craftify' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"backgroundColor":"base"} -->
<div class="wp-block-column has-base-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"45%"} -->
<div class="wp-block-column" style="flex-basis:45%"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner.jpg","id":72,"dimRatio":0,"customOverlayColor":"#f0f0ef","isUserOverlayColor":true,"contentPosition":"top left","style":{"dimensions":{"aspectRatio":"3/4"},"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover has-custom-content-position is-position-top-left" style="border-radius:12px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#f0f0ef"></span><img class="wp-block-cover__image-background wp-image-72" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"spacing":{"padding":{"top":"5px","bottom":"5px","left":"8px","right":"8px"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"typography":{"lineHeight":"1"}},"backgroundColor":"primary","textColor":"base","fontSize":"x-small"} -->
<p class="has-base-color has-primary-background-color has-text-color has-background has-link-color has-x-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:5px;padding-right:8px;padding-bottom:5px;padding-left:8px;line-height:1"><?php echo esc_html__( 'Sale', 'craftify' ); ?></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"55%","style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);flex-basis:55%"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"lineHeight":"1","fontStyle":"normal","fontWeight":"500"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"0","right":"0"}}},"fontSize":"medium-large"} -->
<h2 class="wp-block-heading has-medium-large-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-right:0;margin-bottom:var(--wp--preset--spacing--30);margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:500;line-height:1"><a href="#"><?php echo esc_html__( 'White fabric sofa', 'craftify' ); ?></a></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|luminous-vivid-amber"}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"typography":{"lineHeight":"1"}},"textColor":"luminous-vivid-amber","fontSize":"medium"} -->
<p class="has-luminous-vivid-amber-color has-text-color has-link-color has-medium-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1"><?php echo esc_html__( '☆☆☆☆☆', 'craftify' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"craftify-deal-price","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group craftify-deal-price" style="margin-top:0;margin-bottom:0"><!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"0","right":"0"}}}} -->
<p style="margin-top:var(--wp--preset--spacing--40);margin-right:0;margin-bottom:var(--wp--preset--spacing--40);margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php echo esc_html__( '$112.00', 'craftify' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|tertiary"}}}},"textColor":"tertiary"} -->
<p class="has-tertiary-color has-text-color has-link-color"><?php echo esc_html__( '$150.00', 'craftify' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"typography":{"lineHeight":"1.7"}}} -->
<p style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1.7"><?php echo esc_html__( 'Explore craftify\'s curated collection of and classic contemporary pieces designed to create luxury and functional living spaces.', 'craftify' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"blockGap":"1px"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--60);margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"5px","bottom":"5px","left":"20px","right":"20px"}}},"backgroundColor":"secondary-bg","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-secondary-bg-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:5px;padding-right:20px;padding-bottom:5px;padding-left:20px"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"medium"} -->
<p class="has-text-align-center has-medium-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:500;line-height:1.2"><?php echo esc_html__( '63', 'craftify' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"#8b8b8b"}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"color":{"text":"#8b8b8b"},"typography":{"lineHeight":"1"}},"fontSize":"medium-small"} -->
<p class="has-text-color has-link-color has-medium-small-font-size" style="color:#8b8b8b;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1"><?php echo esc_html__( 'Days', 'craftify' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"5px","bottom":"5px","left":"20px","right":"20px"}}},"backgroundColor":"secondary-bg","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-secondary-bg-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:5px;padding-right:20px;padding-bottom:5px;padding-left:20px"><!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.2","fontStyle":"normal","fontWeight":"500"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"medium"} -->
<p class="has-text-align-center has-medium-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:500;line-height:1.2"><?php echo esc_html__( '06', 'craftify' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"#8b8b8b"}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"color":{"text":"#8b8b8b"},"typography":{"lineHeight":"1"}},"fontSize":"medium-small"} -->
<p class="has-text-color has-link-color has-medium-small-font-size" style="color:#8b8b8b;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1"><?php echo esc_html__( 'Hours', 'craftify' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"5px","bottom":"5px","left":"20px","right":"20px"}}},"backgroundColor":"secondary-bg","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-secondary-bg-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:5px;padding-right:20px;padding-bottom:5px;padding-left:20px"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"medium"} -->
<p class="has-text-align-center has-medium-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:500;line-height:1.2"><?php echo esc_html__( '57', 'craftify' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"#8b8b8b"}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"color":{"text":"#8b8b8b"},"typography":{"lineHeight":"1"}},"fontSize":"medium-small"} -->
<p class="has-text-color has-link-color has-medium-small-font-size" style="color:#8b8b8b;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1"><?php echo esc_html__( 'Min', 'craftify' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"5px","bottom":"5px","left":"20px","right":"20px"}},"color":{"background":"#fafafaed"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background" style="background-color:#fafafaed;margin-top:0;margin-bottom:0;padding-top:5px;padding-right:20px;padding-bottom:5px;padding-left:20px"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"medium"} -->
<p class="has-text-align-center has-medium-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:500;line-height:1.2"><?php echo esc_html__( '21', 'craftify' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"#8b8b8b"}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"color":{"text":"#8b8b8b"},"typography":{"lineHeight":"1"}},"fontSize":"medium-small"} -->
<p class="has-text-color has-link-color has-medium-small-font-size" style="color:#8b8b8b;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1"><?php echo esc_html__( 'Sec', 'craftify' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<?php } ?>