<?php
/**
 * Title: About Us
 * Slug: craftify/about-us
 * Categories: craftify
 * Keywords: about-us
 *
 * @package Craftify
 * @since 1.0.0
 */

?>

<!-- wp:group {"tagName":"main","metadata":{"name":"About Us"},"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"24px","left":"24px","bottom":"40px","top":"40px"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:40px;padding-right:24px;padding-bottom:40px;padding-left:24px"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/kitchen.jpg","id":127,"dimRatio":0,"customOverlayColor":"#5d5141","isUserOverlayColor":true,"isDark":false,"style":{"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light" style="border-radius:12px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#5d5141"></span><img class="wp-block-cover__image-background wp-image-127" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/kitchen.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0"}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|70","left":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--70)"><!-- wp:paragraph {"style":{"typography":{"textTransform":"capitalize"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary"} -->
<p class="has-primary-color has-text-color has-link-color" style="text-transform:capitalize"><?php echo esc_html__( 'Furniture design ideas', 'craftify' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"lineHeight":"1.1"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"0","right":"0"}}},"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-x-large-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-right:0;margin-bottom:var(--wp--preset--spacing--30);margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1.1"><?php echo esc_html__( 'Luxury & Contemporary', 'craftify' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|60","left":"0","right":"0"}},"typography":{"lineHeight":"1.7"}}} -->
<p style="margin-top:var(--wp--preset--spacing--50);margin-right:0;margin-bottom:var(--wp--preset--spacing--60);margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1.7"><?php echo esc_html__( 'Explore craftify\'s curated collection of and classic contemporary pieces designed to create luxury and functional living spaces. Get modern and stylish functional living spaces.', 'craftify' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-buttons" style="margin-top:0;margin-bottom:0"><!-- wp:button {"fontSize":"small"} -->
<div class="wp-block-button has-custom-font-size has-small-font-size"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Shop Now', 'craftify' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></main>
<!-- /wp:group -->