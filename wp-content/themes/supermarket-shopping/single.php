<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Supermarket Shopping
 */

get_header();
?>
<section class="blog-area inarea-blog-single-page-two">
	<div class="container">
		<div class="row">
            <?php 
                $supermarket_shopping_single_post_sidebar_setting = get_theme_mod('supermarket_shopping_single_post_sidebar_setting','1');
                $supermarket_shopping_sidebar_position = get_theme_mod('supermarket_shopping_sidebar_position', 'right');
                $supermarket_shopping_content_class = ($supermarket_shopping_single_post_sidebar_setting == '') ? 'col-lg-12' : 'col-lg-8';

                // Set classes for left or right sidebar
	            $supermarket_shopping_content_order_class = ($supermarket_shopping_sidebar_position == 'left') ? 'order-lg-2' : '';
	            $supermarket_shopping_sidebar_order_class = ($supermarket_shopping_sidebar_position == 'left') ? 'order-lg-1' : '';
            ?>
            <div class="<?php echo esc_attr($supermarket_shopping_content_class . ' ' . $supermarket_shopping_content_order_class); ?>">
				<div class="singel-page-area">
					<?php if( have_posts() ): ?>
						<?php while( have_posts() ): the_post(); ?>
							<?php get_template_part('template-parts/content/content-post', get_post_format() ); ?>
						<?php endwhile; ?>
					<?php endif; ?>
					<?php comments_template( '', true ); // show comments  ?>
				</div>
			</div>
			<?php if( $supermarket_shopping_single_post_sidebar_setting != '') { ?> 
                <?php get_sidebar(); ?>
            <?php } ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>