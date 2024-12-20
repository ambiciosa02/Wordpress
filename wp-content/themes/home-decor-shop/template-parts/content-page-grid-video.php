<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package home-decor-shop
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
   <?php
        // Get the post ID
        $post_id = get_the_ID();
        // Check if there are videos embedded in the post content
        $post = get_post($post_id);
        $content = do_shortcode(apply_filters('the_content', $post->post_content));
        $embeds = get_media_embedded_in_content($content);

        if (!empty($embeds)) {
            // Loop through embedded media and display videos
            foreach ($embeds as $embed) {
                // Check if the embed code contains a video tag or specific video providers like YouTube or Vimeo
                if (strpos($embed, 'video') !== false || strpos($embed, 'youtube') !== false || strpos($embed, 'vimeo') !== false || strpos($embed, 'dailymotion') !== false || strpos($embed, 'vine') !== false || strpos($embed, 'wordPress.tv') !== false || strpos($embed, 'hulu') !== false) {
                    echo '<div class="embedded-video">' . $embed . '</div>';
                }
            }
        }
    ?>
    <div class="post-content">
        <?php if ( true == get_theme_mod( 'home_decor_shop_post_heading_on_off', 'on' ) ) : ?>
        <?php  
            if ( is_single() ) :
                the_title('<h4 class="post-title">', '</h4>' );
            else:
                the_title( sprintf( '<h4 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );
            endif; 
        ?>
        <?php endif; ?>
        <?php if ( true == get_theme_mod( 'home_decor_shop_post_content_on_off', 'on' ) ) : ?>
            <p><?php echo wp_trim_words( get_the_content(), get_theme_mod('home_decor_shop_post_content_limit',15) );?></p>
        <?php endif; ?>
    </div>
    <ul class="meta-info">
        <?php if ( true == get_theme_mod( 'home_decor_shop_post_date_on_off', 'on' ) ) : ?>
            <li class="post-date"><a href="<?php echo esc_url(get_month_link(get_post_time('Y'),get_post_time('m'))); ?>"><i class="fa fa-calendar"></i><?php echo esc_html(get_the_date('j M, Y')); ?></a></li>
        <?php endif; ?>
        <?php if ( true == get_theme_mod( 'home_decor_shop_post_comment_on_off', 'on' ) ) : ?>
            <li class="comments-quantity"><a href="<?php echo esc_url(get_comments_link( $post->ID )); ?>"><i class="fa fa-wechat"></i> (<?php echo get_comments_number($post->ID); ?>) <?php esc_html_e('Comments','home-decor-shop'); ?></a></li>
        <?php endif; ?>
        <?php if ( true == get_theme_mod( 'home_decor_shop_post_author_on_off', 'on' ) ) : ?>
            <li class="posted-by"><i class="fa  fa-user"></i> <?php esc_html_e('By','home-decor-shop'); ?> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php the_author(); ?></a></li>
        <?php endif; ?>
        <?php if ( true == get_theme_mod( 'home_decor_shop_post_categories_on_off', 'on' ) ) : ?>
            <li class="post-category"><i class="fa fa-folder-open"></i><a href="<?php the_permalink(); ?>"><?php the_category(', '); ?></a></li>
        <?php endif; ?>
    </ul>
</article>