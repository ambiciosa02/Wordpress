<?php
/**
 * Banner Section
 * 
 * slug: smart-home-automation/banner
 * title: Banner
 * categories: smart-home-automation
 */

return array(
    'title'      =>__( 'Banner', 'smart-home-automation' ),
    'categories' => array( 'smart-home-automation' ),
    'content'    => '<!-- wp:group {"tagName":"main","className":"wp-block-group alignfull","layout":{"type":"constrained","contentSize":"100%"}} -->
<main class="wp-block-group alignfull"><!-- wp:columns {"style":{"color":{"background":"#d0d0d0"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"radius":{"bottomRight":"100px"}}},"className":"banner-area"} -->
<div class="wp-block-columns banner-area has-background" style="border-bottom-right-radius:100px;background-color:#d0d0d0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center","style":{"color":{"background":"#d0d0d0"},"spacing":{"padding":{"left":"0","right":"0","top":"147px","bottom":"147px"}}},"className":"banner-area-text-box"} -->
<div class="wp-block-column is-vertically-aligned-center banner-area-text-box has-background" style="background-color:#d0d0d0;padding-top:147px;padding-right:0;padding-bottom:147px;padding-left:0"><!-- wp:group {"layout":{"type":"constrained","contentSize":"80%"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"color":{"text":"var(--wp--preset--color--secaccent)"},"elements":{"link":{"color":{"text":"var(--wp--preset--color--secaccent)"}}},"typography":{"fontStyle":"normal","fontWeight":"700","lineHeight":"1.3","fontSize":"40px"}},"className":"banner-main-heading","fontFamily":"figtree"} -->
<h2 class="wp-block-heading banner-main-heading has-text-color has-link-color has-figtree-font-family" style="color:var(--wp--preset--color--secaccent);font-size:40px;font-style:normal;font-weight:700;line-height:1.3">'. esc_html('Discover Exciting','smart-home-automation') .'<br>'. esc_html('Offers: Explore Now','smart-home-automation') .'<br>'. esc_html('For Savings!','smart-home-automation') .'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"var(--wp--preset--color--secaccent)"},"elements":{"link":{"color":{"text":"var(--wp--preset--color--secaccent)"}}},"typography":{"fontStyle":"normal","fontWeight":"400","lineHeight":"1.4"}},"className":"banner-main-text","fontSize":"medium","fontFamily":"figtree"} -->
<p class="banner-main-text has-text-color has-link-color has-figtree-font-family has-medium-font-size" style="color:var(--wp--preset--color--secaccent);font-style:normal;font-weight:400;line-height:1.4">'. esc_html('Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.','smart-home-automation') .'<br>'. esc_html('Lorem Ipsum has been the industrys standard dummy text.','smart-home-automation') .'</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"className":"banner-temp-wrapper"} -->
<div class="wp-block-columns are-vertically-aligned-center banner-temp-wrapper" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"40%","className":"banner-btn-box"} -->
<div class="wp-block-column is-vertically-aligned-center banner-btn-box" style="flex-basis:40%"><!-- wp:buttons {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-buttons" style="margin-top:0;margin-bottom:0"><!-- wp:button {"backgroundColor":"accent","textColor":"background","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontStyle":"normal","fontWeight":"700","textTransform":"uppercase","letterSpacing":"2px"},"border":{"radius":"3px"}},"fontFamily":"figtree"} -->
<div class="wp-block-button has-figtree-font-family" style="font-style:normal;font-weight:700;letter-spacing:2px;text-transform:uppercase"><a class="wp-block-button__link has-background-color has-accent-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:3px">'. esc_html('SHOP COLLECTION','smart-home-automation') .'</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"40%","className":"temp-box"} -->
<div class="wp-block-column is-vertically-aligned-center temp-box" style="flex-basis:40%"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":148,"width":"60px","sizeSlug":"full","linkDestination":"none","align":"right"} -->
<figure class="wp-block-image alignright size-full is-resized"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/vector.svg" alt="" class="wp-image-148" style="width:60px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontSize":"50px"}},"textColor":"background","fontFamily":"figtree"} -->
<h2 class="wp-block-heading has-background-color has-text-color has-link-color has-figtree-font-family" style="font-size:50px">50<span>°</span><span class="celcious">F</span></h2>
<!-- /wp:heading --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"banner-dummy"} -->
<div class="wp-block-column banner-dummy"></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"color":{"background":"var(--wp--preset--color--secaccent)"},"spacing":{"padding":{"top":"135px","bottom":"135px","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"blockGap":"0"}},"className":"blue-bg"} -->
<div class="wp-block-column is-vertically-aligned-center blue-bg has-background" style="background-color:var(--wp--preset--color--secaccent);padding-top:135px;padding-right:var(--wp--preset--spacing--30);padding-bottom:135px;padding-left:var(--wp--preset--spacing--30)"><!-- wp:image {"id":154,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/banner-home.png" alt="" class="wp-image-154"/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"banner-text1","layout":{"type":"constrained"}} -->
<div class="wp-block-group banner-text1"><!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"background","fontSize":"upper-heading","fontFamily":"figtree"} -->
<p class="has-text-align-center has-background-color has-text-color has-link-color has-figtree-font-family has-upper-heading-font-size" style="font-style:normal;font-weight:600">'. esc_html('Enhanced','smart-home-automation') .'<br>'. esc_html('Security and','smart-home-automation') .' <br>'. esc_html('Safety','smart-home-automation') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"banner-text2","layout":{"type":"constrained"}} -->
<div class="wp-block-group banner-text2"><!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"background","fontSize":"upper-heading","fontFamily":"figtree"} -->
<p class="has-text-align-center has-background-color has-text-color has-link-color has-figtree-font-family has-upper-heading-font-size" style="font-style:normal;font-weight:600">'. esc_html('Energy','smart-home-automation') .'<br>'. esc_html('Efficiency and','smart-home-automation') .'<br>'. esc_html('Savings','smart-home-automation') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"banner-text3","layout":{"type":"constrained"}} -->
<div class="wp-block-group banner-text3"><!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"background","fontSize":"upper-heading","fontFamily":"figtree"} -->
<p class="has-text-align-center has-background-color has-text-color has-link-color has-figtree-font-family has-upper-heading-font-size" style="font-style:normal;font-weight:600">'. esc_html('Convenience','smart-home-automation') .' <br>'. esc_html('and Comfort','smart-home-automation') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"banner-text4","layout":{"type":"constrained"}} -->
<div class="wp-block-group banner-text4"><!-- wp:image {"id":8,"sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/info.png" alt="" class="wp-image-8"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></main>
<!-- /wp:group -->',
);