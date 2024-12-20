<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Home Decor Shop
 */

get_header();
?>
<section id="blog-content">
	<div class="featured-img">
		<div class="post-thumbnail">
			<?php
				if ( is_single() ) :
				    if ( true == get_theme_mod( 'home_decor_shop_single_post_image_on_off', 'on' ) ) :
				        if ( has_post_thumbnail() ) : ?>
				                <?php the_post_thumbnail(); ?>
				        <?php else : ?>
				                <img src='<?php echo esc_url(get_template_directory_uri()); ?>/images/exist_img.png'>
				        <?php endif;
				    endif;
				endif;
			?>
			<div class="single-meta-box">
				<?php if ( is_single() ) : 
					if ( true == get_theme_mod( 'home_decor_shop_single_meta_on_off', 'on' ) ) :
					if ( is_single() ) {
					the_title( '<h1 class="entry-title">', '</h1>' );
					} else {
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					} ?>
				    <?php
					$post_id = get_the_ID();
					$author_id = get_post_field('post_author', $post_id);
					?>
					<ul class="meta-info list-inline">
					    <li class="posted-by"><i class="fa fa-user"></i> <?php esc_html_e('By', 'home-decor-shop'); ?> <a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>"><?php echo get_the_author_meta('display_name', $author_id); ?></a></li>
					    <li class="post-date"><a href="<?php echo esc_url(get_month_link(get_post_time('Y'), get_post_time('m'))); ?>"><i class="fa fa-calendar"></i> <?php echo esc_html(get_the_date('j M, Y')); ?></a></li>
					    <li class="post-category"><i class="fa fa-folder-open"></i> <a href="<?php the_permalink(); ?>"><?php the_category(', '); ?></a></li>
					</ul>
					<?php if ( get_theme_mod('home_decor_shop_breadcrumb_setting',true) ) : ?>
	              <div class="bread_crumb text-center">
	                <?php home_decor_shop_breadcrumb();  ?>
	              </div>
	            <?php endif; ?>
				    <?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8" >
				<?php if( have_posts() ): ?>					
					<?php while( have_posts() ): the_post(); ?>
						<?php get_template_part('template-parts/content','page'); ?>
					<?php endwhile; ?>
					
					<!-- Pagination -->
					    <?php if ( true == get_theme_mod( 'home_decor_shop_single_post_pagination_on_off', 'on' ) ) : ?>
							<div class="paginations">
								<?php
									// Previous/next page navigation.
									the_post_navigation( 
										array(
											'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
											'next_text'          => '<i class="fa fa-angle-double-right"></i>',
										) 
									); 
								?>
							</div>
						<?php endif; ?>
				
					<!-- Pagination -->
					
				<?php else: ?>
					
					<?php get_template_part('template-parts/content','none'); ?>
					
				<?php endif; ?>
				<?php comments_template( '', true ); // show comments  ?>
			</div>
			<div class="col-lg-4 col-md-4 sidebar">
				<?php get_sidebar();?>
			</div>
		</div>
	</div>
</section>	
<!-- End of Blog & Sidebar Section -->
 
<div class="clearfix"></div>

<?php get_footer(); ?>