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
        // Get the post content
        $post_content = apply_filters('the_content', get_the_content());

        // Find and display the first image in the post content
        preg_match('/<img[^>]+src=[\'"]([^\'"]+)[\'"][^>]*>/i', $post_content, $matches);

        if (!empty($matches[1])) {
            $image_url = $matches[1];
            echo '<div class="embedded-image"><img src="' . esc_url($image_url) . '" alt="' . esc_attr(get_the_title()) . '"></div>';
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