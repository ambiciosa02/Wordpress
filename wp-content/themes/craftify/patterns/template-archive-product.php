<?php
/**
 * Title: Template Archive Product
 * Slug: craftify/template-archive-product
 * Categories: craftify
 *
 * @package Craftify
 * @since 1.0.0
 */

?>
<!-- wp:group {"tagName":"main","style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group" style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"padding":{"right":"2px","left":"2px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-right:2px;padding-left:2px"><!-- wp:query-title {"type":"archive","showPrefix":false,"align":"wide","style":{"typography":{"letterSpacing":"1px","fontStyle":"normal","fontWeight":"600"}},"fontSize":"large"} /-->

<!-- wp:woocommerce/store-notices /-->

<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide"><!-- wp:woocommerce/product-results-count {"fontSize":"medium","style":{"color":{"text":"#343532"},"elements":{"link":{"color":{"text":"#343532"}}}}} /-->

<!-- wp:woocommerce/catalog-sorting /--></div>
<!-- /wp:group -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"},"margin":{"top":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--60)"><!-- wp:column {"width":"25%","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-column" style="padding-top:0;padding-bottom:0;flex-basis:25%"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"var:preset|spacing|30"}},"border":{"top":{"width":"0px","style":"none"},"right":{"width":"0px","style":"none"},"bottom":{"color":"#dddddd","width":"1px"},"left":{"width":"0px","style":"none"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-top-style:none;border-top-width:0px;border-right-style:none;border-right-width:0px;border-bottom-color:#dddddd;border-bottom-width:1px;border-left-style:none;border-left-width:0px;padding-top:0;padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:woocommerce/filter-wrapper {"filterType":"price-filter","heading":"Filter by price"} -->
<div class="wp-block-woocommerce-filter-wrapper"><!-- wp:heading {"level":3,"style":{"color":{"text":"#343532"},"elements":{"link":{"color":{"text":"#343532"}}},"typography":{"letterSpacing":"1px"}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-color has-link-color has-medium-font-size" style="color:#343532;letter-spacing:1px"><?php echo esc_html__( 'Filter by price', 'craftify' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:woocommerce/price-filter {"heading":"","lock":{"remove":true}} -->
<div class="wp-block-woocommerce-price-filter is-loading"><span aria-hidden="true" class="wc-block-product-categories__placeholder"></span></div>
<!-- /wp:woocommerce/price-filter --></div>
<!-- /wp:woocommerce/filter-wrapper --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"border":{"bottom":{"color":"#dddddd","width":"1px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-bottom-color:#dddddd;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:woocommerce/filter-wrapper {"filterType":"stock-filter","heading":"Filter by stock status"} -->
<div class="wp-block-woocommerce-filter-wrapper"><!-- wp:heading {"level":3,"style":{"color":{"text":"#343532"},"elements":{"link":{"color":{"text":"#343532"}}},"typography":{"letterSpacing":"1px"}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-color has-link-color has-medium-font-size" style="color:#343532;letter-spacing:1px"><?php echo esc_html__( 'Filter by stock status', 'craftify' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:woocommerce/stock-filter {"heading":"","lock":{"remove":true},"style":{"elements":{"link":{"color":{"text":"#343532"}}},"color":{"text":"#343532"}}} -->
<div class="wp-block-woocommerce-stock-filter is-loading has-text-color has-link-color" style="color:#343532"></div>
<!-- /wp:woocommerce/stock-filter --></div>
<!-- /wp:woocommerce/filter-wrapper --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"border":{"bottom":{"color":"#dddddd","width":"1px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-bottom-color:#dddddd;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:woocommerce/filter-wrapper {"filterType":"attribute-filter","heading":"Filter by attribute"} -->
<div class="wp-block-woocommerce-filter-wrapper"><!-- wp:heading {"level":3,"style":{"color":{"text":"#343532"},"elements":{"link":{"color":{"text":"#343532"}}},"typography":{"letterSpacing":"1px"}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-color has-link-color has-medium-font-size" style="color:#343532;letter-spacing:1px"><?php echo esc_html__( 'Filter by colors', 'craftify' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:woocommerce/attribute-filter {"attributeId":1,"heading":"","lock":{"remove":true},"style":{"color":{"text":"#343532"},"elements":{"link":{"color":{"text":"#343532"}}}}} -->
<div class="wp-block-woocommerce-attribute-filter is-loading has-text-color has-link-color" style="color:#343532"></div>
<!-- /wp:woocommerce/attribute-filter --></div>
<!-- /wp:woocommerce/filter-wrapper --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"border":{"bottom":{"width":"0px","style":"none"},"top":[],"right":[],"left":[]}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-bottom-style:none;border-bottom-width:0px;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:woocommerce/filter-wrapper {"filterType":"attribute-filter","heading":"Filter by attribute"} -->
<div class="wp-block-woocommerce-filter-wrapper"><!-- wp:heading {"level":3,"style":{"color":{"text":"#343532"},"elements":{"link":{"color":{"text":"#343532"}}},"typography":{"letterSpacing":"1px"}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-color has-link-color has-medium-font-size" style="color:#343532;letter-spacing:1px"><?php echo esc_html__( 'Filter by sizes', 'craftify' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:woocommerce/attribute-filter {"attributeId":2,"showCounts":true,"heading":"","lock":{"remove":true},"style":{"color":{"text":"#343532"},"elements":{"link":{"color":{"text":"#343532"}}}}} -->
<div class="wp-block-woocommerce-attribute-filter is-loading has-text-color has-link-color" style="color:#343532"></div>
<!-- /wp:woocommerce/attribute-filter --></div>
<!-- /wp:woocommerce/filter-wrapper --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":""} -->
<div class="wp-block-column"><!-- wp:woocommerce/product-collection {"queryId":1,"query":{"perPage":9,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","search":"","exclude":[],"inherit":true,"taxQuery":{},"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":false},"tagName":"div","displayLayout":{"type":"flex","columns":3,"shrinkColumns":true},"queryContextIncludes":["collection"],"__privatePreviewState":{"isPreview":false,"previewMessage":"Actual products will vary depending on the page being viewed."}} -->
<div class="wp-block-woocommerce-product-collection">
<?php if (function_exists('wc_booster_load') && class_exists('WooCommerce')) { ?>

<!-- wp:woocommerce/product-template -->
<!-- wp:wc-booster/product-companion {"block_id":"wc-booster-product-companion-block-87fb914e-c947-4680-8d2f-9bfcd39304b6","positionTop":{"activeUnit":"px","range":{"min":-100,"max":500},"values":{"desktop":10,"tablet":10,"mobile":10},"units":["%","px","em"]}} -->
<!-- wp:wc-booster/wish-list-button /-->

<!-- wp:wc-booster/quick-view /-->
<!-- /wp:wc-booster/product-companion -->

<!-- wp:woocommerce/product-image {"imageSizing":"thumbnail","isDescendentOfQueryLoop":true,"height":"320px","style":{"border":{"radius":"4px"}},"metadata":{"ignoredHookedBlocks":["wc-booster/wish-list-button","wc-booster/quick-view"]}} /-->

<!-- wp:post-title {"textAlign":"left","level":3,"isLink":true,"style":{"spacing":{"margin":{"bottom":"0.75rem","top":"0"}}},"fontSize":"medium","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->

<!-- wp:group {"className":"product-content","layout":{"type":"constrained"}} -->
<div class="wp-block-group product-content"><!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"left","fontSize":"small"} /-->
</div>
<!-- /wp:group -->

<?php if (function_exists('wc_booster_pro_load') && class_exists('WooCommerce')) { ?>
 <!-- wp:wc-booster-pro/product-variation {"block_id":"wc-booster-pro-product-variation-block-e95f3a56-c95d-49c4-abdb-56d961ab1d15","alignment":"left","swatchesHoverBgColor":"#000","swatchesHoverTextColor":"#ffffff","height":{"activeUnit":"px","range":{"min":1,"max":2000},"values":{"desktop":30,"tablet":30,"mobile":30},"units":["px","em"]}} /-->

<?php } ?>
<!-- /wp:woocommerce/product-template -->

<?php } else { ?>

<!-- wp:woocommerce/product-template -->
<!-- wp:woocommerce/product-image {"imageSizing":"thumbnail","isDescendentOfQueryLoop":true,"height":"320px","style":{"border":{"radius":"12px"}},"metadata":{"ignoredHookedBlocks":["wc-booster/wish-list-button","wc-booster/quick-view"]}} /-->

<!-- wp:post-title {"textAlign":"left","level":3,"isLink":true,"style":{"spacing":{"margin":{"bottom":"0.75rem","top":"0"}}},"fontSize":"medium","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->

<!-- wp:group {"className":"product-content","layout":{"type":"constrained"}} -->
<div class="wp-block-group product-content"><!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"left","fontSize":"small"} /-->

    <!-- wp:woocommerce/product-button {"textAlign":"left","width":100,"isDescendentOfQueryLoop":true,"className":"is-style-outline","fontSize":"small","style":{"border":{"radius":"50px"}}} /-->
</div>
<!-- /wp:group -->
<!-- /wp:woocommerce/product-template -->

<?php } ?>

<!-- wp:query-pagination {"paginationArrow":"arrow","showLabel":false,"layout":{"type":"flex","justifyContent":"center"}} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->

<!-- wp:woocommerce/product-collection-no-results -->
<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","flexWrap":"wrap"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size"><strong><?php echo esc_html__( 'No results found', 'craftify' ); ?></strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><?php echo esc_html__( 'You can try', 'craftify' ); ?> <a class="wc-link-clear-any-filters" href="#"><?php echo esc_html__( 'clearing any filters', 'craftify' ); ?></a> <?php echo esc_html__( 'or head to our', 'craftify' ); ?> <a class="wc-link-stores-home" href="#"><?php echo esc_html__( 'store\'s home', 'craftify' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
<!-- /wp:woocommerce/product-collection-no-results --></div>
<!-- /wp:woocommerce/product-collection --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"20px"} -->
<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></main>
<!-- /wp:group -->