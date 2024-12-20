z<?php
/**
 * Title: Latest News
 * Slug: decorative/latest-news
 * Categories: decorative, latest-news
 */
?>

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"top":"60px","right":"20px","bottom":"60px","left":"20px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px;padding-top:60px;padding-right:20px;padding-bottom:60px;padding-left:20px"><!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"align":"wide","className":"section_head","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide section_head"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"spacing":{"padding":{"top":"12px","bottom":"12px","right":"24px","left":"24px"}}},"backgroundColor":"secondary","textColor":"white","className":"section_sub_title","fontSize":"medium","fontFamily":"catamaran"} -->
<h4 class="wp-block-heading has-text-align-center section_sub_title has-white-color has-secondary-background-color has-text-color has-background has-catamaran-font-family has-medium-font-size" style="padding-top:12px;padding-right:24px;padding-bottom:12px;padding-left:24px;font-style:normal;font-weight:700"><?php esc_html_e('Our Blog','decorative'); ?></h4>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"top":"0px"}},"typography":{"fontStyle":"normal","fontWeight":"800"}},"className":"section_title","fontSize":"section-title"} -->
<h2 class="wp-block-heading has-text-align-center section_title has-section-title-font-size" style="margin-top:0px;font-style:normal;font-weight:800"><?php esc_html_e('Stay Updated With Us','decorative'); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php esc_html_e('Vestibulum commodo id mauris ut vulputate. Duis a libero posuere, dignissim felis malesuada, tincidunt felis. Mauris eu risus suscipit, euismod neque ut, maximus arcu.','decorative'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"10px"} -->
<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->

<!-- wp:query {"queryId":9,"query":{"perPage":3,"pages":"1","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:post-featured-image /-->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"20px","bottom":"20px","left":"20px","right":"20px"}}},"backgroundColor":"white","className":"shadow","layout":{"type":"constrained"}} -->
<div class="wp-block-group shadow has-white-background-color has-background" style="padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px"><!-- wp:group {"style":{"typography":{"fontStyle":"normal","fontWeight":"700","textTransform":"uppercase","fontSize":"12px"}},"textColor":"secondary","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group has-secondary-color has-text-color" style="font-size:12px;font-style:normal;font-weight:700;text-transform:uppercase"><!-- wp:post-date /-->

<!-- wp:post-terms {"term":"category"} /-->

<!-- wp:post-author {"showAvatar":false,"isLink":true,"linkTarget":"_blank"} /--></div>
<!-- /wp:group -->

<!-- wp:post-title {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700"}},"fontSize":"regular"} /-->

<!-- wp:post-excerpt /-->

<!-- wp:separator {"style":{"color":{"background":"#ececec"}},"className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#ececec;color:#ececec"/>
<!-- /wp:separator -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:read-more {"content":"Read More","style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"backgroundColor":"secondary","textColor":"white"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-pagination -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->