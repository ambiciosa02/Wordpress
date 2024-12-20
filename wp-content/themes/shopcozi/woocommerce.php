<?php
get_header();
$option = shopcozi_theme_options();
$page_options = shopcozi_get_page_options();
$blog_layout = $option['shopcozi_woo_layout'];
$left_sidebar = $option['shopcozi_woo_leftsidebar'];
$right_sidebar = $option['shopcozi_woo_rightsidebar'];
$container_class = $option['shopcozi_woo_container_width'];

if( is_single() ){
	$blog_layout = $option['shopcozi_prod_layout'];
	$left_sidebar = $option['shopcozi_prod_leftsidebar'];
	$right_sidebar = $option['shopcozi_prod_rightsidebar'];
	$container_class = $option['shopcozi_prod_container_width'];
}

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

				<?php woocommerce_content(); ?>

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