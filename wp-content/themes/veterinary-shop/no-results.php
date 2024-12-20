<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package Veterinary Shop
 */
?>
<div class="col-12">
    <h2 class="entry-title-result mb-2">
        <?php echo esc_html(get_theme_mod('veterinary_shop_no_results_title', __('Nothing Found', 'veterinary-shop'))); ?>
    </h2>
</div>
<div class="col-12 mb-3">
    <?php if (is_home() && current_user_can('publish_posts')) : ?>
        <p>
            <?php printf(
                esc_html__('Ready to publish your first post? Get started %s.', 'veterinary-shop'),
                '<a href="' . esc_url(admin_url('post-new.php')) . '">' . esc_html__('here', 'veterinary-shop') . '</a>'
            ); ?>
        </p>
    <?php elseif (is_search()) : ?>
        <p class="mb-2">
            <?php echo esc_html(get_theme_mod('veterinary_shop_no_results_content', __('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'veterinary-shop'))); ?>
        </p>
        <br />
        <div class="result-search">
            <?php get_search_form(); ?>
        </div>
    <?php else : ?>
        <p>
            <?php esc_html_e('Don\'t worry&hellip; it happens to the best of us.', 'veterinary-shop'); ?>
        </p>
        <br />
        <div class="error-btn-result">
            <a class="view-more-result" href="<?php echo esc_url(home_url()); ?>">
                <?php esc_html_e('Back to Home Page', 'veterinary-shop'); ?>
                <span class="screen-reader-text">
                    <?php esc_html_e('Back to Home Page', 'veterinary-shop'); ?>
                </span>
            </a>
        </div>
    <?php endif; ?>
</div>

