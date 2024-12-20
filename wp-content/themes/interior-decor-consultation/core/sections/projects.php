<?php if ( get_theme_mod('interior_decor_consultation_projects_section_enable',false) ) : ?>

<div class="project py-5">
	<div class="container">
		<?php if ( get_theme_mod('interior_decor_consultation_projects_heading') ) : ?>
			<h3 class="mb-4 wow fadeInDown"><?php echo esc_html(get_theme_mod('interior_decor_consultation_projects_heading')); ?></h3>
		<?php endif; ?>
		<div class="tab wow fadeInRight">
	        <?php $interior_decor_consultation_featured_post = get_theme_mod('interior_decor_consultation_projects_number', '');
	          	for ( $interior_decor_consultation_j = 1; $interior_decor_consultation_j <= $interior_decor_consultation_featured_post; $interior_decor_consultation_j++ ){ ?>
          		<button class="tablinks" onclick="interior_decor_consultation_projects_tab(event, '<?php $interior_decor_consultation_main_id = get_theme_mod('interior_decor_consultation_projects_text'.$interior_decor_consultation_j); $interior_decor_consultation_tab_id = str_replace(' ', '-', $interior_decor_consultation_main_id); echo $interior_decor_consultation_tab_id; ?> ')">
	          	<?php echo esc_html(get_theme_mod('interior_decor_consultation_projects_text'.$interior_decor_consultation_j)); ?></button>
	        <?php }?>
      	</div>

  	  	<?php for ( $interior_decor_consultation_j = 1; $interior_decor_consultation_j <= $interior_decor_consultation_featured_post; $interior_decor_consultation_j++ ){ ?>
	        <div id="<?php $interior_decor_consultation_main_id = get_theme_mod('interior_decor_consultation_projects_text'.$interior_decor_consultation_j); $interior_decor_consultation_tab_id = str_replace(' ', '-', $interior_decor_consultation_main_id); echo $interior_decor_consultation_tab_id; ?>"  class="tabcontent mt-5">
		        <?php $interior_decor_consultation_args = array(
					'post_type' => 'post',
					'post_status' => 'publish',
					'category_name' =>  get_theme_mod('interior_decor_consultation_projects_category'.$interior_decor_consultation_j),
					'posts_per_page' => 6,
				); ?>
				<div class="row">
				    <?php $interior_decor_consultation_arr_posts = new WP_Query( $interior_decor_consultation_args );
				    	if ( $interior_decor_consultation_arr_posts->have_posts() ) :
				      	while ( $interior_decor_consultation_arr_posts->have_posts() ) :
				        $interior_decor_consultation_arr_posts->the_post();
				        ?>
				        <div class="col-lg-4 col-md-6 col-sm-6">
					        <div class="projects_inner_box mb-4 wow zoomIn">
								<?php
						            if ( has_post_thumbnail() ) :
						              the_post_thumbnail();
						            else:
						              ?>
						              <div class="slider-alternate">
						                <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/projects3.png'; ?>">
						              </div>
						              <?php
						            endif;
						          ?>
						        <div class="projects_icon">
						        	<a href="<?php the_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/search-normal.png'; ?>"></a>
						        </div>
								<div class="projects_content_box">
					        		<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					        		<div class="project_category">
										<?php
											$interior_decor_consultation_categories = get_the_category();
											if ( ! empty( $interior_decor_consultation_categories ) ) {
											    echo esc_html( $interior_decor_consultation_categories[0]->name );
											}
										?>
									</div>
					            </div>
					        </div>
					    </div>
				      	<?php
				    endwhile;
				    wp_reset_postdata();
				    endif; ?>
				</div>
			</div>
		<?php }?>
	</div>
</div>

<?php endif; ?>