<?php 
$option = shopcozi_theme_options();
$category_filter = $option['shopcozi_news_category_filter'];

if(
	isset($option['shopcozi_news_category']) && 
	$option['shopcozi_news_category'] != '' && 
	is_string($option['shopcozi_news_category'])
){
	$option['shopcozi_news_category'] = explode(',', $option['shopcozi_news_category']);
}elseif(
	isset($option['shopcozi_news_category']) && 
	$option['shopcozi_news_category'] != '' && 
	is_array($option['shopcozi_news_category'])
){
	$option['shopcozi_news_category'] = $option['shopcozi_news_category'];
}else{
	$option['shopcozi_news_category'] = array();
}

if($option['shopcozi_news_slider_show']==true && $option['shopcozi_news_slider_nav_show']==true && $option['shopcozi_news_slider_nav_position']!='default'){
	$slider_nav = true;
}else{
	$slider_nav = false;
}

if($option['shopcozi_news_slider_dots_show']==true){
	$slider_dots = true;
}else{
	$slider_dots = false;
}

$args = array(
    'post_type' => 'post',
);

/* Exclude hidden products from the loop */

$args['tax_query'] =  get_terms( array(
          'taxonomy'   => 'category',
          'hide_empty' => false,
        ) );

if (  isset($option['shopcozi_news_category']) ) {
    $args['include'] = $option['shopcozi_news_category'];
    $args['orderby'] = 'include';
}

$post_categories = get_terms( 'category', $args );
$count = count($post_categories);

if($option['shopcozi_news_show']==true){
?>
<section id="blog" class="blog-section theme-py-3">
	<div class="container">
		<?php if($option['shopcozi_news_title']!=''){ ?>
		<div class="row wow animate__animated animate__fadeInUp">
			<div class="col-12">
				<div class="section-title-container">
					<h4 class="section-title section-title-bold">
						<b></b>
						<span class="section-title-wrap"><?php echo esc_html($option['shopcozi_news_title']); ?></span>
						<b></b>
						<?php if ( $count > 0 && $category_filter == 1 ){ ?>
						<ul class="owl_filters">
							<li><a href="javascript:void(0);" class="item" data-filter="*">All</a></li>
							<?php foreach ( $post_categories as $key => $post_category ) { ?>
							<li>
								<a href="javascript:void(0);" class="item" data-filter=".category-<?php echo esc_attr($post_category->slug); ?>"><?php  echo esc_html($post_category->name); ?>	
								</a>
							</li>
							<?php } ?>
						</ul>
						<?php } ?>
						
						<?php if($option['shopcozi_news_slider_show']==true && $option['shopcozi_news_slider_nav_show']==true && $option['shopcozi_news_slider_nav_position']=='default'){ ?>
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
			<div class="col-12">
				<?php if($option['shopcozi_news_slider_show']==true){ ?>					
				<div id="news-slider" class="owl-carousel owl-theme mx-2" data-collg="<?php echo esc_attr($option['shopcozi_news_column']); ?>" data-colmd="2" data-colsm="2" data-colxs="1" data-itemspace="15" data-loop="false" data-autoplay="false" data-smartspeed="300" data-nav="<?php echo esc_attr($slider_nav); ?>" data-dots="<?php echo esc_attr($slider_dots); ?>" data-center="false">
				<?php }else{ ?>
				<div class="row g-3">
				<?php } ?>

					<?php
		            $args = array(
		                'posts_per_page' => $option['shopcozi_news_posts_per_page'],
		                'suppress_filters' => 0,
		            );

		            if (  isset($option['shopcozi_news_category']) ) {
                        $args['category__in'] = $option['shopcozi_news_category'];
                    }

		            $query = new WP_Query( $args );
		            if ( $query->have_posts() ) :
		            while ( $query->have_posts() ) : $query->the_post();		            	
		            ?>

		            <?php if($option['shopcozi_news_slider_show']==true){ ?>
		            <div id="post-<?php the_ID(); ?>" <?php post_class('item'); ?>>
					<?php } else { ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-4 col-md-6 col-12'); ?>>
					<?php } ?>

						<div class="blog_post one">

							<?php if( has_post_thumbnail() ): ?>
							<figure class="blog-img">
								<?php the_post_thumbnail(); ?>
								<div class="blog-overlay">
									<a href="<?php the_permalink(); ?>"><i class="fa-solid fa-link"></i></a>
								</div>
							</figure>
							<?php endif; ?>

							<div class="blog-content">
								<h3>
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
										<?php the_title(); ?>
									</a>
								</h3>

								<div class="blog-excerpt"><?php the_excerpt(); ?></div>

								<div class="blog-action">
									<span><i class="fa-regular fa-clock"></i> <?php the_time( get_option('date_format') ); ?></span>

									<?php if( has_category() ) { ?>
									<span class="myauto text-end"><i class="fa-solid fa-folder-open"></i> <?php the_category( ', ', get_the_ID() ); ?></span>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
					<?php 
					endwhile; 
					wp_reset_postdata();					
					endif;
					?>
				
				<?php if($option['shopcozi_news_slider_show']==true){ ?>
				</div>
				<?php }else{ ?>
				</div>
				<?php } ?>
			</div>			
		</div>
	</div>
</section>
<?php } ?>