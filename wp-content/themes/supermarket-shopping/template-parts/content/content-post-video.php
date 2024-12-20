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
		$supermarket_shopping_post_id = get_the_ID();
		$supermarket_shopping_post = get_post($supermarket_shopping_post_id);
		$supermarket_shopping_content = do_shortcode(apply_filters('the_content', $supermarket_shopping_post->post_content));
		$supermarket_shopping_embeds = get_media_embedded_in_content($supermarket_shopping_content);

		if (!empty($supermarket_shopping_embeds)) {
			foreach ($supermarket_shopping_embeds as $supermarket_shopping_embed) {
				$supermarket_shopping_embed = wp_kses($supermarket_shopping_embed, array(
					'iframe' => array(
						'src' => array(),
						'width' => array(),
						'height' => array(),
						'frameborder' => array(),
						'allowfullscreen' => array(),
					),
					'video' => array(
						'src' => array(),
						'width' => array(),
						'height' => array(),
						'controls' => array(),
					),
				));
				if (strpos($supermarket_shopping_embed, 'video') !== false || 
					strpos($supermarket_shopping_embed, 'youtube') !== false || 
					strpos($supermarket_shopping_embed, 'vimeo') !== false || 
					strpos($supermarket_shopping_embed, 'dailymotion') !== false || 
					strpos($supermarket_shopping_embed, 'vine') !== false || 
					strpos($supermarket_shopping_embed, 'wordpress.tv') !== false || 
					strpos($supermarket_shopping_embed, 'hulu') !== false) {
					?>
					<div class="custom-embedded-video">
						<div class="video-container">
							<?php echo $supermarket_shopping_embed; ?>
						</div>
						<div class="video-comments">
							<?php comments_template(); ?>
						</div>
					</div>
					<?php
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
</div>s