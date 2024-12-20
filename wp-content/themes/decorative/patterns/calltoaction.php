<?php
/**
 * Title: Call to Action
 * Slug: decorative/cta
 * Categories: decorative, cta
 */
?>

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"top":"60px","right":"20px","bottom":"60px","left":"20px"}}},"backgroundColor":"section-bg","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-section-bg-background-color has-background" style="margin-top:0px;margin-bottom:0px;padding-top:60px;padding-right:20px;padding-bottom:60px;padding-left:20px"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() . '/images/ctabg.jpg'); ?>","id":146,"dimRatio":70,"style":{"border":{"width":"0px","style":"none","radius":"12px"},"spacing":{"padding":{"right":"var:preset|spacing|80","left":"var:preset|spacing|80"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover" style="border-style:none;border-width:0px;border-radius:12px;padding-right:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--80)"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-70 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-146" alt="" src="<?php echo esc_url( get_template_directory_uri() . '/images/ctabg.jpg'); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"700","lineHeight":"1"}},"textColor":"white","fontSize":"big"} -->
<h3 class="wp-block-heading has-text-align-center has-white-color has-text-color has-big-font-size" style="font-style:normal;font-weight:700;line-height:1"><?php esc_html_e('Have a Project in mind?','decorative'); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"2"}},"textColor":"white"} -->
<p class="has-text-align-center has-white-color has-text-color" style="line-height:2"><?php esc_html_e('Vivamus vel tortor et nibh eleifend porta. Suspendisse potenti. Vivamus elementum tincidunt urna nec hendrerit. Suspendisse egestas purus ut dolor sagittis pulvinar. Duis aliquet odio vel neque malesuada, sed eleifend quam rhoncus. Cras in bibendum urna.','decorative'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"0px"},"typography":{"fontStyle":"normal","fontWeight":"700"}}} -->
<div class="wp-block-button" style="font-style:normal;font-weight:700"><a class="wp-block-button__link wp-element-button" style="border-radius:0px"><?php esc_html_e('Reach out us','decorative'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->