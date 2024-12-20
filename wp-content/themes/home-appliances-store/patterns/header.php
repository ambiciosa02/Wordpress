<?php
/**
 * Title: Header
 * Slug: home-appliances-store/header
 * Categories: header
 * Block Types: core/template-part/header
 */
?>

<!-- wp:group {"className":" header-box-upper","style":{"spacing":{"padding":{"right":"0","left":"0","top":"5px","bottom":"5px"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"},"color":{"background":"#ae072f"}},"layout":{"type":"constrained","contentSize":"90%"}} -->
<div class="wp-block-group  header-box-upper has-background" style="background-color:#ae072f;margin-top:0;margin-bottom:0;padding-top:5px;padding-right:0;padding-bottom:5px;padding-left:0"><!-- wp:columns {"className":"top-header-box","style":{"spacing":{"blockGap":{"top":"0"}}}} -->
<div class="wp-block-columns top-header-box"><!-- wp:column {"verticalAlignment":"center","width":"20%","className":"dummy-box"} -->
<div class="wp-block-column is-vertically-aligned-center dummy-box" style="flex-basis:20%"><!-- wp:group {"className":"social-row","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group social-row"><!-- wp:social-links {"className":"social-icon"} -->
<ul class="wp-block-social-links social-icon"><!-- wp:social-link {"url":"#","service":"instagram"} /-->

<!-- wp:social-link {"url":"#","service":"linkedin"} /-->

<!-- wp:social-link {"url":"#","service":"twitter"} /-->

<!-- wp:social-link {"url":"#","service":"facebook"} /--></ul>
<!-- /wp:social-links -->

<!-- wp:heading {"level":6,"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"typography":{"fontSize":"15px","fontStyle":"normal","fontWeight":"400","textTransform":"capitalize"}},"textColor":"base","fontFamily":"figtree"} -->
<h6 class="wp-block-heading has-base-color has-text-color has-link-color has-figtree-font-family" style="font-size:15px;font-style:normal;font-weight:400;text-transform:capitalize"><?php echo esc_html('Follow Us!','home-appliances-store'); ?></h6>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"60%","className":"top-text-box"} -->
<div class="wp-block-column is-vertically-aligned-center top-text-box" style="flex-basis:60%"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"id":19,"sizeSlug":"full","linkDestination":"media"} -->
<figure class="wp-block-image size-full"><a href="#"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/images/truck.png" alt="" class="wp-image-19"/></a></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"left","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"typography":{"fontSize":"15px","fontStyle":"normal","fontWeight":"400"}},"textColor":"base","fontFamily":"figtree"} -->
<p class="has-text-align-left has-base-color has-text-color has-link-color has-figtree-font-family" style="font-size:15px;font-style:normal;font-weight:400"><?php echo esc_html('Free Shipping Australia Wide – No Minimum Order – Search Over 30,000 Products','home-appliances-store'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"20%","className":"translator-box"} -->
<div class="wp-block-column is-vertically-aligned-center translator-box" style="flex-basis:20%"><!-- wp:group {"className":"shortcode-box","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
<div class="wp-block-group shortcode-box"><!-- wp:shortcode -->

<!-- /wp:shortcode -->

<!-- wp:shortcode -->

<!-- /wp:shortcode --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"header-middle-box","style":{"spacing":{"padding":{"top":"10px","bottom":"10px","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"90%"}} -->
<div class="wp-block-group header-middle-box" style="margin-top:0;margin-bottom:0;padding-top:10px;padding-right:0;padding-bottom:10px;padding-left:0"><!-- wp:columns {"className":"middle-header-column"} -->
<div class="wp-block-columns middle-header-column"><!-- wp:column {"verticalAlignment":"center","width":"20%","className":"head-logo-box"} -->
<div class="wp-block-column is-vertically-aligned-center head-logo-box" style="flex-basis:20%"><!-- wp:site-title {"style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"700"}},"fontFamily":"figtree"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"50%","className":"head-search-box"} -->
<div class="wp-block-column is-vertically-aligned-center head-search-box" style="flex-basis:50%"><!-- wp:columns {"verticalAlignment":"center","style":{"border":{"color":"#e7e7e6","width":"1px","radius":"5px"},"spacing":{"padding":{"top":"0.44em","bottom":"0.44em","left":"0.44em","right":"0.44em"},"blockGap":{"top":"0","left":"0"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center has-border-color" style="border-color:#e7e7e6;border-width:1px;border-radius:5px;padding-top:0.44em;padding-right:0.44em;padding-bottom:0.44em;padding-left:0.44em"><!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%"><!-- wp:woocommerce/product-categories {"hasCount":false,"isDropdown":true} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"60%","className":"search-inner","style":{"border":{"left":{"color":"#d9d9d9","width":"1px"}},"spacing":{"padding":{"left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-column is-vertically-aligned-center search-inner" style="border-left-color:#d9d9d9;border-left-width:1px;padding-left:var(--wp--preset--spacing--40);flex-basis:60%"><!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search for anything for you...","width":100,"widthUnit":"%","buttonText":"Search","buttonPosition":"button-inside","buttonUseIcon":true,"query":{"post_type":"product"},"style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"backgroundColor":"base","textColor":"black"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"30%","className":"head-icons"} -->
<div class="wp-block-column is-vertically-aligned-center head-icons" style="flex-basis:30%"><!-- wp:group {"className":"header-icon-box","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
<div class="wp-block-group header-icon-box"><!-- wp:woocommerce/customer-account {"iconClass":"wc-block-customer-account__account-icon","textColor":"black","fontFamily":"figtree","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}},"typography":{"fontSize":"14px"}}} /-->

<!-- wp:shortcode -->
<!-- /wp:shortcode -->

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}},"typography":{"fontSize":"14px","fontStyle":"normal","fontWeight":"600"}},"textColor":"black"} -->
<p class="has-black-color has-text-color has-link-color" style="font-size:14px;font-style:normal;font-weight:600"><?php echo esc_html('My Cart','home-appliances-store'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:woocommerce/mini-cart {"miniCartIcon":"bag-alt","iconColor":{"name":"Black","slug":"black","color":"#000000","class":"has-black-icon-color"},"style":{"typography":{"fontSize":"10px"}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"head-menu-box","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"}},"color":{"background":"#ea1044"}},"layout":{"type":"constrained","contentSize":"90%"}} -->
<div class="wp-block-group head-menu-box has-background" style="background-color:#ea1044;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:navigation {"textColor":"base","overlayBackgroundColor":"primary","overlayTextColor":"background","style":{"typography":{"fontSize":"14px","fontStyle":"normal","fontWeight":"500","textTransform":"capitalize"},"spacing":{"blockGap":"30px"}}} -->
<!-- wp:navigation-link {"label":"Home","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Brands","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Tools","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"painting","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Plumbing","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Fastners","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"About Us","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Contact Us","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- /wp:navigation --></div>
<!-- /wp:group -->