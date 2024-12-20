<?php
$option = shopcozi_theme_options();
$column = $option['shopcozi_p_recent_column'];
$category_filter = $option['shopcozi_p_recent_category_filter'];

if(
	isset($option['shopcozi_p_recent_category']) && 
	$option['shopcozi_p_recent_category'] != '' && 
	is_string($option['shopcozi_p_recent_category'])
){
	$option['shopcozi_p_recent_category'] = explode(',', $option['shopcozi_p_recent_category']);
}elseif(
	isset($option['shopcozi_p_recent_category']) && 
	$option['shopcozi_p_recent_category'] != '' && 
	is_array($option['shopcozi_p_recent_category'])
){
	$option['shopcozi_p_recent_category'] = $option['shopcozi_p_recent_category'];
}else{
	$option['shopcozi_p_recent_category'] = array();
}

if($option['shopcozi_p_recent_slider_show']==true && $option['shopcozi_p_recent_slider_nav_show']==true && $option['shopcozi_p_recent_slider_nav_position']!='default'){
	$slider_nav = true;
}else{
	$slider_nav = false;
}

if($option['shopcozi_p_recent_slider_dots_show']==true){
	$slider_dots = true;
}else{
	$slider_dots = false;
}

if ( class_exists( 'woocommerce' ) && $option['shopcozi_p_recent_show']==true ) {

	$args = array(
	    'post_type'      => 'product',
	    'post_status'    => 'publish',
	    'orderby'        => 'date',
		'order'          => 'desc',
	    'posts_per_page' => -1,
	);

	if($option['shopcozi_p_recent_posts_per_page'] != '' ){
		$args['posts_per_page'] = $option['shopcozi_p_recent_posts_per_page'];
	}

	if(isset($option['shopcozi_p_recent_category']) && $option['shopcozi_p_recent_category'] != null ){
		$args['tax_query'] = array(
		    array(
		      'taxonomy' => 'product_cat',
		      'terms' => $option['shopcozi_p_recent_category'],
		      'hide_empty' => true
		    ) 
		);
    }
?>
<section id="recent_products" class="recent_products theme-py-3">
	<div class="container">

		<?php if($option['shopcozi_p_recent_title']!=''){ ?>
		<div class="row wow animate__animated animate__fadeInUp">
			<div class="col-12">
				<div class="section-title-container">
					<h4 class="section-title section-title-bold">
						<b></b>

						<?php if($option['shopcozi_p_recent_title']!=''){ ?>
						<span class="section-title-wrap"><?php echo esc_html($option['shopcozi_p_recent_title']); ?></span>
						<?php } ?>
						
						<b></b>
						<?php 
						$cat_args = array(
						        'post_type' => 'product',
						        'post_status'    => 'publish',
						        'orderby'        => 'date',
								'order'          => 'desc',
						        'posts_per_page' => $args['posts_per_page'],
						        'fields' => 'ids',
						    );

						if(isset($option['shopcozi_p_recent_category']) && $option['shopcozi_p_recent_category'] != null ){
							$cat_args['tax_query'] = array(
							    array(
							      'taxonomy' => 'product_cat',
							      'terms' => $option['shopcozi_p_recent_category'],
							      'hide_empty' => true
							    ) 
							);
					    }

						$post_ids = get_posts($cat_args);
				        $product_categories = get_terms( 
					        						array(
												        'taxonomy' => 'product_cat',
												        'object_ids' => $post_ids,
												        'hide_empty' => true,
												    )
				        						);

				        $count = count($product_categories);

						if ( $count > 0 && $category_filter == 1 ){ ?>
						<ul class="owl_filters">
						<li><a href="javascript:void(0);" class="item" data-filter="*">All</a></li>
						<?php foreach ( $product_categories as $key => $product_category ) { ?>			
						<li>
							<a href="javascript:void(0);" class="item" data-filter=".product_cat-<?php echo esc_attr($product_category->slug); ?>">
								<?php  echo esc_html($product_category->name); ?>
							</a>
						</li>
						<?php } ?>
						</ul>
						<?php } ?>
						
						<?php if($option['shopcozi_p_recent_slider_show']==true && $option['shopcozi_p_recent_slider_nav_show']==true && $option['shopcozi_p_recent_slider_nav_position']=='default'){ ?>
						<div class="owl-slider-nav owl-nav">
							<button type="button" role="presentation" class="owl-prev">
								<i class="fa fa-chevron-left"></i>
							</button>
							<button type="button" role="presentation" class="owl-next">
								<i class="fa fa-chevron-right"></i>
							</button>
						</div>
						<?php } ?>
					</h4>
				</div>
			</div>
		</div>
		<?php } ?>

		<div class="row wow animate__animated animate__fadeInUp">
			<div class="col-12 woocommerce">

				<?php if($option['shopcozi_p_recent_slider_show']==true){ ?>
				<ul 
				id="recent_products_slider" class="products columns-1 owl-carousel owl-theme" 
				data-collg="<?php echo esc_attr($column); ?>" 
				data-colmd="3" 
				data-colsm="2" 
				data-colxs="1" 
				data-itemspace="15" 
				data-loop="false" 
				data-autoplay="false" 
				data-smartspeed="800" 
				data-nav="<?php echo esc_attr($slider_nav); ?>" 
				data-dots="<?php echo esc_attr($slider_dots); ?>"
				>
				<?php }else{ ?>
				<div class="row row-cols-lg-<?php echo esc_attr($column); ?> row-cols-md-2 row-cols-1 g-4 products">
				<?php }

					$loop = new WP_Query( $args );

					if ( $loop->have_posts() ) :
						while ( $loop->have_posts() ) : $loop->the_post(); 
						global $product;

						wc_get_template_part( 'content', 'product' );

					    endwhile; wp_reset_postdata();
					endif;					
					?>

				<?php if($option['shopcozi_p_recent_slider_show']==true){ ?>
				</ul>
				<?php } else { ?>
				</div><!-- .row -->
				<?php } ?>
			</div>						
		</div>
	</div>
</section>
<?php } ?>