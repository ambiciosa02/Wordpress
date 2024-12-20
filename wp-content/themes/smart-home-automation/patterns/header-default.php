<?php
/**
 * Header Default
 * 
 * slug: smart-home-automation/header-default
 * title: Header Default
 * categories: smart-home-automation
 */

return array(
    'title'      =>__( 'Header Default', 'smart-home-automation' ),
    'categories' => array( 'smart-home-automation' ),
    'content'    => '<!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"5px","bottom":"5px"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"backgroundColor":"accent","className":"wow fadeInDown header-box-upper","layout":{"type":"constrained","contentSize":"90%"}} -->
<div class="wp-block-group wow fadeInDown header-box-upper has-accent-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:5px;padding-right:0;padding-bottom:5px;padding-left:0"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":"20%","className":"dummy-box"} -->
<div class="wp-block-column is-vertically-aligned-center dummy-box" style="flex-basis:20%"></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"50%","className":"top-text-box"} -->
<div class="wp-block-column is-vertically-aligned-center top-text-box" style="flex-basis:50%"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:image {"id":18,"sizeSlug":"full","linkDestination":"media"} -->
<figure class="wp-block-image size-full"><a href="#"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/bus.png" alt="" class="wp-image-18"/></a></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"left","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","fontSize":"medium","fontFamily":"figtree"} -->
<p class="has-text-align-left has-background-color has-text-color has-link-color has-figtree-font-family has-medium-font-size">'. esc_html('Free Shipping Australia Wide – No Minimum Order – Search Over 30,000 Products','smart-home-automation') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"30%","className":"translator-box"} -->
<div class="wp-block-column is-vertically-aligned-center translator-box" style="flex-basis:30%"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
<div class="wp-block-group"><!-- wp:shortcode -->

<!-- /wp:shortcode -->

<!-- wp:shortcode -->

<!-- /wp:shortcode --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"className":"header-middle-box","layout":{"type":"constrained","contentSize":"90%"}} -->
<div class="wp-block-group header-middle-box" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":"20%","className":"head-logo-box"} -->
<div class="wp-block-column is-vertically-aligned-center head-logo-box" style="flex-basis:20%"><!-- wp:site-title {"style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"700"}},"fontFamily":"figtree"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"50%","className":"head-search-box"} -->
<div class="wp-block-column is-vertically-aligned-center head-search-box" style="flex-basis:50%"><!-- wp:columns {"verticalAlignment":"center","style":{"border":{"color":"#e7e7e6","width":"1px","radius":"5px"},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"},"blockGap":{"top":"0","left":"0"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center has-border-color" style="border-color:#e7e7e6;border-width:1px;border-radius:5px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%"><!-- wp:woocommerce/product-categories {"hasCount":false,"isDropdown":true} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"60%","style":{"border":{"left":{"color":"#d9d9d9","width":"1px"}},"spacing":{"padding":{"left":"var:preset|spacing|40"}}},"className":"search-inner"} -->
<div class="wp-block-column is-vertically-aligned-center search-inner" style="border-left-color:#d9d9d9;border-left-width:1px;padding-left:var(--wp--preset--spacing--40);flex-basis:60%"><!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search for anything for you...","buttonText":"Search","buttonPosition":"button-inside","buttonUseIcon":true,"query":{"post_type":"product"},"style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"textColor":"black"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"30%","className":"head-icons"} -->
<div class="wp-block-column is-vertically-aligned-center head-icons" style="flex-basis:30%"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
<div class="wp-block-group"><!-- wp:woocommerce/customer-account {"iconClass":"wc-block-customer-account__account-icon","textColor":"black","fontFamily":"figtree","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}},"typography":{"fontSize":"14px"}}} /-->

<!-- wp:shortcode -->

<!-- /wp:shortcode -->

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}},"typography":{"fontSize":"14px","fontStyle":"normal","fontWeight":"600"}},"textColor":"black"} -->
<p class="has-black-color has-text-color has-link-color" style="font-size:14px;font-style:normal;font-weight:600">'. esc_html('My Cart','smart-home-automation') .'</p>
<!-- /wp:paragraph -->

<!-- wp:woocommerce/mini-cart {"miniCartIcon":"bag-alt","iconColor":{"name":"Black","slug":"black","color":"#000000","class":"has-black-icon-color"},"style":{"typography":{"fontSize":"10px"}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"backgroundColor":"accent","className":"head-menu-box","layout":{"type":"constrained","contentSize":"90%"}} -->
<div class="wp-block-group head-menu-box has-accent-background-color has-background" style="padding-top:var(--wp--preset--spacing--20);padding-right:0;padding-bottom:var(--wp--preset--spacing--20);padding-left:0"><!-- wp:navigation {"textColor":"background","overlayBackgroundColor":"primary","overlayTextColor":"background","style":{"typography":{"fontSize":"14px","fontStyle":"normal","fontWeight":"500","textTransform":"capitalize"},"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
<!-- wp:navigation-link {"label":"Home","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Brands","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Tools","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"painting","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Plumbing","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Fastners","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"About Us","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Contact Us","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Get Pro","type":"","url":"https://www.wpradiant.net/products/smart-home-wordpress-theme","kind":"custom","isTopLevelLink":true,"className":"getpro"} /-->

<!-- /wp:navigation --></div>
<!-- /wp:group -->',
);