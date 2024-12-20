<?php if ( get_theme_mod('interior_decor_consultation_blog_box_enable',false) ) : ?>

<?php $interior_decor_consultation_args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'category_name' =>  get_theme_mod('interior_decor_consultation_blog_slide_category'),
  'posts_per_page' => get_theme_mod('interior_decor_consultation_blog_slide_number'),
); ?>

<div class="slider">
  <div class="owl-carousel">
    <?php $interior_decor_consultation_arr_posts = new WP_Query( $interior_decor_consultation_args );

    $i = 1;
    if ( $interior_decor_consultation_arr_posts->have_posts() ) :
      while ( $interior_decor_consultation_arr_posts->have_posts() ) :
        $interior_decor_consultation_arr_posts->the_post();
        ?>
        <div class="blog_box_inner">
          <?php
            if ( has_post_thumbnail() ) { ?>
              <?php the_post_thumbnail(); ?>
            <?php } else { ?>
              <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/slider.png'; ?>">
          <?php } ?>
          <div class="blog_inner_content">
            <div class="row">
              <div class="col-lg-5 col-md-5 col-sm-5 align-self-center">
                <div class="slider_content wow fadeInLeft">
                  <?php if ( get_theme_mod('interior_decor_consultation_slider_extra_text'.$i) ) : ?>
                    <h4><?php echo esc_html(get_theme_mod('interior_decor_consultation_slider_extra_text'.$i));?></h4>
                  <?php endif; ?>
                  <h3><?php the_title(); ?></h3>
                  <p><?php echo wp_trim_words(get_the_content(), 30); ?></p>
                  <p class="slider-button mt-5">
                    <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php esc_html_e('EXPLORE MORE','interior-decor-consultation'); ?><i class="fas fa-arrow-right ms-2"></i></a>
                  </p>
                </div>
              </div>
              <div class="col-lg-1 col-md-1 col-sm-1 align-self-center">
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 align-self-center">
                <div class="slider_image">
                    <img class="image1 wow fadeInRight" src="<?php echo esc_url(get_theme_mod('interior_decor_consultation_slider1_'.$i));?>">
                    <img class="image2 wow zoomIn" src="<?php echo esc_url(get_theme_mod('interior_decor_consultation_slider2_'.$i));?>">
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php
      $i++;
    endwhile;
    wp_reset_postdata();
    endif; ?>
  </div>
</div>

<?php endif; ?>