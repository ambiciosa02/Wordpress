<?php
/**
 * Category Section
 * 
 * slug: smart-home-automation/category-section
 * title: Category Section
 * categories: smart-home-automation
 */

$smart_home_automation_plugins_list = get_option( 'active_plugins' );
$smart_home_automation_plugin = 'woocommerce/woocommerce.php';
$smart_home_automation_results = in_array( $smart_home_automation_plugin , $smart_home_automation_plugins_list);
if ( $smart_home_automation_results )  {

return array(
    'title'      =>__( 'Category Section', 'smart-home-automation' ),
    'categories' => array( 'smart-home-automation' ),
    'content'    => '<!-- wp:group {"layout":{"type":"constrained","contentSize":"90%"}} -->
<div class="wp-block-group"><!-- wp:spacer {"height":"50px"} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"className":"category-area-title","fontSize":"large","fontFamily":"figtree"} -->
<h2 class="wp-block-heading category-area-title has-figtree-font-family has-large-font-size">'. esc_html('Shop By Category','smart-home-automation') .'</h2>
<!-- /wp:heading -->

<!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:woocommerce/featured-category {"dimRatio":60,"editMode":false,"minHeight":394,"categoryId":20,"showDesc":false,"className":"category-area","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"radius":{"topLeft":"15px","topRight":"15px"}}}} -->
<!-- wp:buttons {"lock":{"move":false,"remove":false},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"background","textColor":"accent","lock":{"move":true,"remove":true},"style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}},"typography":{"textTransform":"uppercase","letterSpacing":"2px"},"border":{"radius":"5px"}},"fontFamily":"figtree"} -->
<div class="wp-block-button has-figtree-font-family" style="letter-spacing:2px;text-transform:uppercase"><a class="wp-block-button__link has-accent-color has-background-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-radius:5px"><strong>'. esc_html('Shop Now','smart-home-automation') .'</strong></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
<!-- /wp:woocommerce/featured-category --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:woocommerce/featured-category {"dimRatio":60,"editMode":false,"minHeight":397,"categoryId":21,"showDesc":false,"className":"category-area","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"radius":{"topLeft":"15px","topRight":"15px"}}}} -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"background","textColor":"accent","style":{"border":{"radius":"5px"},"typography":{"letterSpacing":"2px","textTransform":"uppercase"},"elements":{"link":{"color":{"text":"var:preset|color|accent"}}}},"fontFamily":"figtree"} -->
<div class="wp-block-button has-figtree-font-family" style="letter-spacing:2px;text-transform:uppercase"><a class="wp-block-button__link has-accent-color has-background-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-radius:5px"><strong>'. esc_html('Shop Now','smart-home-automation') .'</strong></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
<!-- /wp:woocommerce/featured-category --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:woocommerce/featured-category {"dimRatio":60,"editMode":false,"minHeight":393,"categoryId":23,"showDesc":false,"className":"category-area","style":{"border":{"radius":{"topLeft":"15px","topRight":"15px"}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"background","textColor":"accent","style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}},"border":{"radius":"5px"},"typography":{"textTransform":"uppercase","letterSpacing":"2px"}},"fontFamily":"figtree"} -->
<div class="wp-block-button has-figtree-font-family" style="letter-spacing:2px;text-transform:uppercase"><a class="wp-block-button__link has-accent-color has-background-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-radius:5px"><strong>'. esc_html('Shop Now','smart-home-automation') .'</strong></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
<!-- /wp:woocommerce/featured-category --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:woocommerce/featured-category {"dimRatio":60,"editMode":false,"minHeight":396,"categoryId":18,"showDesc":false,"className":"category-area","style":{"border":{"radius":{"topLeft":"15px","topRight":"15px"}}}} -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"background","textColor":"accent","style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}},"border":{"radius":"5px"},"typography":{"letterSpacing":"2px","textTransform":"uppercase"}},"fontFamily":"figtree"} -->
<div class="wp-block-button has-figtree-font-family" style="letter-spacing:2px;text-transform:uppercase"><a class="wp-block-button__link has-accent-color has-background-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-radius:5px"><strong>'. esc_html('Shop Now','smart-home-automation') .'</strong></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
<!-- /wp:woocommerce/featured-category --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:woocommerce/featured-category {"dimRatio":60,"editMode":false,"minHeight":394,"categoryId":20,"showDesc":false,"className":"category-area","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"radius":{"topLeft":"15px","topRight":"15px"}}}} -->
<!-- wp:buttons {"lock":{"move":false,"remove":false},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"background","textColor":"accent","lock":{"move":true,"remove":true},"style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}},"typography":{"textTransform":"uppercase","letterSpacing":"2px"},"border":{"radius":"5px"}},"fontFamily":"figtree"} -->
<div class="wp-block-button has-figtree-font-family" style="letter-spacing:2px;text-transform:uppercase"><a class="wp-block-button__link has-accent-color has-background-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-radius:5px"><strong>'. esc_html('Shop Now','smart-home-automation') .'</strong></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
<!-- /wp:woocommerce/featured-category --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:woocommerce/featured-category {"dimRatio":60,"editMode":false,"minHeight":397,"categoryId":21,"showDesc":false,"className":"category-area","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"radius":{"topLeft":"15px","topRight":"15px","bottomLeft":"0px","bottomRight":"0px"}}}} -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"background","textColor":"accent","style":{"border":{"radius":"5px"},"typography":{"letterSpacing":"2px","textTransform":"uppercase"},"elements":{"link":{"color":{"text":"var:preset|color|accent"}}}},"fontFamily":"figtree"} -->
<div class="wp-block-button has-figtree-font-family" style="letter-spacing:2px;text-transform:uppercase"><a class="wp-block-button__link has-accent-color has-background-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-radius:5px"><strong>'. esc_html('Shop Now','smart-home-automation') .'</strong></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
<!-- /wp:woocommerce/featured-category --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:woocommerce/featured-category {"dimRatio":60,"editMode":false,"minHeight":393,"categoryId":23,"showDesc":false,"className":"category-area","style":{"border":{"radius":{"topLeft":"15px","topRight":"15px"}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"background","textColor":"accent","style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}},"border":{"radius":"5px"},"typography":{"textTransform":"uppercase","letterSpacing":"2px"}},"fontFamily":"figtree"} -->
<div class="wp-block-button has-figtree-font-family" style="letter-spacing:2px;text-transform:uppercase"><a class="wp-block-button__link has-accent-color has-background-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-radius:5px"><strong>'. esc_html('Shop Now','smart-home-automation') .'</strong></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
<!-- /wp:woocommerce/featured-category --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:woocommerce/featured-category {"dimRatio":60,"editMode":false,"minHeight":396,"categoryId":18,"showDesc":false,"className":"category-area","style":{"border":{"radius":{"topLeft":"15px","topRight":"15px"}}}} -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"background","textColor":"accent","style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}},"border":{"radius":"5px"},"typography":{"letterSpacing":"2px","textTransform":"uppercase"}},"fontFamily":"figtree"} -->
<div class="wp-block-button has-figtree-font-family" style="letter-spacing:2px;text-transform:uppercase"><a class="wp-block-button__link has-accent-color has-background-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-radius:5px"><strong>'. esc_html('Shop Now','smart-home-automation') .'</strong></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
<!-- /wp:woocommerce/featured-category --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"50px"} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->',
);

} else {

return array(
    'title'      =>__( 'Category Section', 'smart-home-automation' ),
    'categories' => array( 'smart-home-automation' ),
    'content'    => '<!-- wp:group {"layout":{"type":"constrained","contentSize":"90%"}} -->
<div class="wp-block-group"><!-- wp:spacer {"height":"50px"} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"className":"category-area-title","fontSize":"large","fontFamily":"figtree"} -->
<h2 class="wp-block-heading category-area-title has-figtree-font-family has-large-font-size">'. esc_html('Shop By Category','smart-home-automation') .'</h2>
<!-- /wp:heading -->

<!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"className":"category-area","layout":{"type":"constrained"}} -->
<div class="wp-block-group category-area"><!-- wp:image {"id":116,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"15px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/image1.png" alt="" class="wp-image-116" style="border-radius:15px"/></figure>
<!-- /wp:image -->

<!-- wp:buttons {"className":"category-area-btn","layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons category-area-btn"><!-- wp:button {"backgroundColor":"accent","textColor":"background","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"border":{"radius":"5px"},"typography":{"textTransform":"uppercase","letterSpacing":"2px"}},"fontFamily":"figtree"} -->
<div class="wp-block-button has-figtree-font-family" style="letter-spacing:2px;text-transform:uppercase"><a class="wp-block-button__link has-background-color has-accent-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:5px"><strong>'. esc_html('SHOP NOW','smart-home-automation') .'</strong></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}},"typography":{"fontStyle":"normal","fontWeight":"500","fontSize":"22px"}},"textColor":"black","fontFamily":"figtree"} -->
<h2 class="wp-block-heading has-text-align-center has-black-color has-text-color has-link-color has-figtree-font-family" style="font-size:22px;font-style:normal;font-weight:500">'. esc_html('Smart Cameras','smart-home-automation') .'</h2>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"className":"category-area","layout":{"type":"constrained"}} -->
<div class="wp-block-group category-area"><!-- wp:image {"id":117,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"15px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/image2.png" alt="" class="wp-image-117" style="border-radius:15px"/></figure>
<!-- /wp:image -->

<!-- wp:buttons {"className":"category-area-btn","layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons category-area-btn"><!-- wp:button {"backgroundColor":"accent","textColor":"background","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"border":{"radius":"5px"},"typography":{"textTransform":"uppercase","letterSpacing":"2px"}},"fontFamily":"figtree"} -->
<div class="wp-block-button has-figtree-font-family" style="letter-spacing:2px;text-transform:uppercase"><a class="wp-block-button__link has-background-color has-accent-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:5px"><strong>'. esc_html('SHOP NOW','smart-home-automation') .'</strong></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}},"typography":{"fontStyle":"normal","fontWeight":"500","fontSize":"22px"}},"textColor":"black","fontFamily":"figtree"} -->
<h2 class="wp-block-heading has-text-align-center has-black-color has-text-color has-link-color has-figtree-font-family" style="font-size:22px;font-style:normal;font-weight:500">'. esc_html('Smart Audio System','smart-home-automation') .'</h2>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"className":"category-area","layout":{"type":"constrained"}} -->
<div class="wp-block-group category-area"><!-- wp:image {"id":118,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"15px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/image3.png" alt="" class="wp-image-118" style="border-radius:15px"/></figure>
<!-- /wp:image -->

<!-- wp:buttons {"className":"category-area-btn","layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons category-area-btn"><!-- wp:button {"backgroundColor":"accent","textColor":"background","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"border":{"radius":"5px"},"typography":{"textTransform":"uppercase","letterSpacing":"2px"}},"fontFamily":"figtree"} -->
<div class="wp-block-button has-figtree-font-family" style="letter-spacing:2px;text-transform:uppercase"><a class="wp-block-button__link has-background-color has-accent-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:5px"><strong>'. esc_html('SHOP NOW','smart-home-automation') .'</strong></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}},"typography":{"fontStyle":"normal","fontWeight":"500","fontSize":"22px"}},"textColor":"black","fontFamily":"figtree"} -->
<h2 class="wp-block-heading has-text-align-center has-black-color has-text-color has-link-color has-figtree-font-family" style="font-size:22px;font-style:normal;font-weight:500">'. esc_html('Smart Lamps','smart-home-automation') .'</h2>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"className":"category-area","layout":{"type":"constrained"}} -->
<div class="wp-block-group category-area"><!-- wp:image {"id":119,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"15px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/image4.png" alt="" class="wp-image-119" style="border-radius:15px"/></figure>
<!-- /wp:image -->

<!-- wp:buttons {"className":"category-area-btn","layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons category-area-btn"><!-- wp:button {"backgroundColor":"accent","textColor":"background","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"border":{"radius":"5px"},"typography":{"textTransform":"uppercase","letterSpacing":"2px"}},"fontFamily":"figtree"} -->
<div class="wp-block-button has-figtree-font-family" style="letter-spacing:2px;text-transform:uppercase"><a class="wp-block-button__link has-background-color has-accent-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:5px"><strong>'. esc_html('SHOP NOW','smart-home-automation') .'</strong></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}},"typography":{"fontStyle":"normal","fontWeight":"500","fontSize":"22px"}},"textColor":"black","fontFamily":"figtree"} -->
<h2 class="wp-block-heading has-text-align-center has-black-color has-text-color has-link-color has-figtree-font-family" style="font-size:22px;font-style:normal;font-weight:500">'. esc_html('Smart Hubs','smart-home-automation') .'</h2>
<!-- /wp:heading --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"className":"category-area","layout":{"type":"constrained"}} -->
<div class="wp-block-group category-area"><!-- wp:image {"id":116,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"15px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/image1.png" alt="" class="wp-image-116" style="border-radius:15px"/></figure>
<!-- /wp:image -->

<!-- wp:buttons {"className":"category-area-btn","layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons category-area-btn"><!-- wp:button {"backgroundColor":"accent","textColor":"background","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"border":{"radius":"5px"},"typography":{"textTransform":"uppercase","letterSpacing":"2px"}},"fontFamily":"figtree"} -->
<div class="wp-block-button has-figtree-font-family" style="letter-spacing:2px;text-transform:uppercase"><a class="wp-block-button__link has-background-color has-accent-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:5px"><strong>'. esc_html('SHOP NOW','smart-home-automation') .'</strong></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}},"typography":{"fontStyle":"normal","fontWeight":"500","fontSize":"22px"}},"textColor":"black","fontFamily":"figtree"} -->
<h2 class="wp-block-heading has-text-align-center has-black-color has-text-color has-link-color has-figtree-font-family" style="font-size:22px;font-style:normal;font-weight:500">'. esc_html('Smart Cameras','smart-home-automation') .'</h2>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"className":"category-area","layout":{"type":"constrained"}} -->
<div class="wp-block-group category-area"><!-- wp:image {"id":118,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"15px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/image3.png" alt="" class="wp-image-118" style="border-radius:15px"/></figure>
<!-- /wp:image -->

<!-- wp:buttons {"className":"category-area-btn","layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons category-area-btn"><!-- wp:button {"backgroundColor":"accent","textColor":"background","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"border":{"radius":"5px"},"typography":{"textTransform":"uppercase","letterSpacing":"2px"}},"fontFamily":"figtree"} -->
<div class="wp-block-button has-figtree-font-family" style="letter-spacing:2px;text-transform:uppercase"><a class="wp-block-button__link has-background-color has-accent-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:5px"><strong>'. esc_html('SHOP NOW','smart-home-automation') .'</strong></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}},"typography":{"fontStyle":"normal","fontWeight":"500","fontSize":"22px"}},"textColor":"black","fontFamily":"figtree"} -->
<h2 class="wp-block-heading has-text-align-center has-black-color has-text-color has-link-color has-figtree-font-family" style="font-size:22px;font-style:normal;font-weight:500">'. esc_html('Smart Lamps','smart-home-automation') .'</h2>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"className":"category-area","layout":{"type":"constrained"}} -->
<div class="wp-block-group category-area"><!-- wp:image {"id":119,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"15px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/image4.png" alt="" class="wp-image-119" style="border-radius:15px"/></figure>
<!-- /wp:image -->

<!-- wp:buttons {"className":"category-area-btn","layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons category-area-btn"><!-- wp:button {"backgroundColor":"accent","textColor":"background","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"border":{"radius":"5px"},"typography":{"textTransform":"uppercase","letterSpacing":"2px"}},"fontFamily":"figtree"} -->
<div class="wp-block-button has-figtree-font-family" style="letter-spacing:2px;text-transform:uppercase"><a class="wp-block-button__link has-background-color has-accent-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:5px"><strong>'. esc_html('SHOP NOW','smart-home-automation') .'</strong></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}},"typography":{"fontStyle":"normal","fontWeight":"500","fontSize":"22px"}},"textColor":"black","fontFamily":"figtree"} -->
<h2 class="wp-block-heading has-text-align-center has-black-color has-text-color has-link-color has-figtree-font-family" style="font-size:22px;font-style:normal;font-weight:500">'. esc_html('Smart Hubs','smart-home-automation') .'</h2>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"className":"category-area","layout":{"type":"constrained"}} -->
<div class="wp-block-group category-area"><!-- wp:image {"id":117,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"15px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/image2.png" alt="" class="wp-image-117" style="border-radius:15px"/></figure>
<!-- /wp:image -->

<!-- wp:buttons {"className":"category-area-btn","layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons category-area-btn"><!-- wp:button {"backgroundColor":"accent","textColor":"background","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"border":{"radius":"5px"},"typography":{"textTransform":"uppercase","letterSpacing":"2px"}},"fontFamily":"figtree"} -->
<div class="wp-block-button has-figtree-font-family" style="letter-spacing:2px;text-transform:uppercase"><a class="wp-block-button__link has-background-color has-accent-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:5px"><strong>'. esc_html('SHOP NOW','smart-home-automation') .'</strong></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}},"typography":{"fontStyle":"normal","fontWeight":"500","fontSize":"22px"}},"textColor":"black","fontFamily":"figtree"} -->
<h2 class="wp-block-heading has-text-align-center has-black-color has-text-color has-link-color has-figtree-font-family" style="font-size:22px;font-style:normal;font-weight:500">'. esc_html('Smart Audio System','smart-home-automation') .'</h2>
<!-- /wp:heading --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"50px"} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->',
);

}