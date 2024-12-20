<?php 
/**
 * This is blog detail template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Shopcozi
 * 
 * @since Shopcozi 0.1
 */

get_header();
$option = shopcozi_theme_options();
$page_options = shopcozi_get_page_options();
$blog_layout = $option['shopcozi_archive_blog_layout'];
$left_sidebar = $option['shopcozi_archive_blog_leftsidebar'];
$right_sidebar = $option['shopcozi_archive_blog_rightsidebar'];
$container_class = $option['shopcozi_archive_container_width'];

if($blog_layout=='1-1-1'){
	$sidebar_class = 'col-lg-3 col-md-3 col-12';
	$main_content_wrap_class = 'col-lg-6 col-md-6 col-12';
}elseif($blog_layout=='0-1-0'){
	$main_content_wrap_class = 'col-lg-12 col-md-12 col-12';
}else{
	$sidebar_class = 'col-lg-4 col-md-4 col-12';
	$main_content_wrap_class = 'col-lg-8 col-md-8 col-12';
}
?>
<?php do_action('shopcozi_main_content_before'); ?>
<section class="main-content">
	<?php do_action('shopcozi_main_content_inner_before'); ?>
	<div class="<?php echo esc_attr($container_class); ?>">
		<div class="row">

			<?php 
			if(
				$blog_layout == '1-1-0' || 
				$blog_layout == '1-1-1'
			){
				?>
				<div class="<?php echo esc_attr($sidebar_class); ?>">
				    <div class="sidebar">
				        <?php dynamic_sidebar($left_sidebar); ?>
				    </div>
				</div>
				<?php
			}
			?>
			
			<div class="<?php echo esc_attr($main_content_wrap_class); ?>">
				<?php do_action('shopcozi_content_before'); ?>

				<?php
            	// Check if posts exist
				if ( have_posts() ) :

					// loop
					while ( have_posts() ) : the_post();

						get_template_part('template-parts/entry/layout','single');

					endwhile;

					the_posts_pagination( array(
                                'prev_text' => '<i class="fa fa-angle-double-left"></i>',
                                'next_text' => '<i class="fa fa-angle-double-right"></i>',
                            ) );

					// If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;

				else:

					get_template_part('template-parts/entry/layout','none');

				endif;
            	?>

				<?php do_action('shopcozi_content_after'); ?>				
			</div>
			
			<?php 
			if(
				$blog_layout == '0-1-1' ||
				$blog_layout == '1-1-1'
			){
				?>
				<div class="<?php echo esc_attr($sidebar_class); ?>">
				    <div class="sidebar">
				        <?php dynamic_sidebar($right_sidebar); ?>
				    </div>
				</div>
				<?php
			}
			?>

		</div>
	</div>
	<?php do_action('shopcozi_main_content_inner_after'); ?>
</section>
<?php do_action('shopcozi_main_content_after'); ?>
<?php get_footer(); ?>