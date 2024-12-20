<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Supermarket Shopping
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('blog-item'); ?>>
	<?php
    // Check if there is audio embedded in the post content
    $post_id = get_the_ID(); // Add this line to get the post ID
    $post = get_post($post_id);
    $content = do_shortcode(apply_filters('the_content', $post->post_content));
    $embeds = get_media_embedded_in_content($content);

    if (!empty($embeds)) {
        // Loop through embedded media and display audio
        foreach ($embeds as $embed) {
            // Check if the embed code contains an audio tag or specific audio providers like SoundCloud
            if (strpos($embed, 'audio') !== false || strpos($embed, 'soundcloud') !== false) {
                echo '<div class="embedded-audio">' . $embed . '</div>';
            }
        }
    }
    ?>	
	<h6 class="theme-button"><?php echo esc_html(get_the_date('j')); ?>, <?php echo esc_html(get_the_date('M'));  echo esc_html(get_the_date(' Y')); ?></h6>
	<div class="blog-content">
		<?php 
			if ( is_single() ) :
				
			the_title('<h5 class="post-title">', '</h5>' );
			
			else:
			
			the_title( sprintf( '<h5 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );
			
			endif; 
			
			the_excerpt();
		?>
	</div>
	<ul class="comment-timing">
		<li class="pe-lg-3 pe-2">
          <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
            <i class="fa fa-user pe-1"></i> <?php the_author(); ?>
          </a>
        </li>
		<li class="pe-lg-3 pe-2">
          <a href="<?php echo esc_url(get_permalink()); ?>#comments">
            <i class="fa fa-comment pe-1"></i> <?php echo esc_html(get_comments_number($post->ID)); ?>
          </a>
        </li>
		<li>
          <i class="fas fa-clock pe-1"></i> <?php echo esc_html(get_the_time('H:i')); ?> <?php esc_html_e('HOURS', 'supermarket-shopping'); ?>
        </li>
	</ul>
</div>