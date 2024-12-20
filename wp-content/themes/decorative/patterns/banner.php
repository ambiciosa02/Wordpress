<?php
/**
 * Title: Banner
 * Slug: decorative/banner
 * Categories: decorative, banner
 */
?>

<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() . '/images/slider.jpg'); ?>","id":595,"dimRatio":20,"minHeight":800,"contentPosition":"center center","isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"20px","right":"20px","bottom":"20px","left":"20px"},"margin":{"top":"0px","bottom":"0px"}}}} -->
<div class="wp-block-cover alignfull is-light" style="margin-top:0px;margin-bottom:0px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px;min-height:800px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-20 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-595" alt="" src="<?php echo esc_url( get_template_directory_uri() . '/images/slider.jpg'); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20"}}}} -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":4,"backgroundColor":"secondary","textColor":"white","className":"banner-sub-title"} -->
<h4 class="wp-block-heading banner-sub-title has-white-color has-secondary-background-color has-text-color has-background"><?php esc_html_e('Decorative for Interior','decorative'); ?></h4>
<!-- /wp:heading -->

<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"800","lineHeight":"1"}},"textColor":"white","fontSize":"banner-title"} -->
<h2 class="wp-block-heading has-white-color has-text-color has-banner-title-font-size" style="font-style:normal;font-weight:800;line-height:1"><?php esc_html_e('Create a home that defines who you are','decorative'); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"white"} -->
<p class="has-white-color has-text-color"><?php esc_html_e('Pellentesque ultrices, ligula sit amet dictum vehicula, odio erat venenatis odio, ac placerat nisi risus a nisi. In et mi et ex ornare malesuada.','decorative'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--60)"><!-- wp:button {"style":{"typography":{"fontStyle":"normal","fontWeight":"700","letterSpacing":"2px"},"border":{"radius":"0px"},"spacing":{"padding":{"left":"30px","right":"30px","top":"18px","bottom":"18px"}}}} -->
<div class="wp-block-button" style="font-style:normal;font-weight:700;letter-spacing:2px"><a class="wp-block-button__link wp-element-button" style="border-radius:0px;padding-top:18px;padding-right:30px;padding-bottom:18px;padding-left:30px"><?php esc_html_e('Start Your Project','decorative'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->