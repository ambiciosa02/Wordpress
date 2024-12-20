  <?php
  global $post;
  $post_author_id   = get_post_field( 'post_author', get_queried_object_id() );
  $interior_decor_consultation_get_post_column_layout = get_theme_mod( 'interior_decor_consultation_post_column_count', 2 );
  $interior_decor_consultation_post_column_layout = 'col-sm-12 col-md-6 col-lg-4';
  if ( $interior_decor_consultation_get_post_column_layout == 2 ) {
    $interior_decor_consultation_post_column_layout = 'col-lg-6 col-md-12';
  } else{
    $interior_decor_consultation_post_column_layout = 'col-sm-12 grid-layout';
  }
?>
<div class="<?php echo esc_attr($interior_decor_consultation_post_column_layout); ?> blog-grid-layout">
    <div id="post-<?php the_ID(); ?>" <?php post_class('post-box mb-4 p-3 wow zoomIn'); ?>>
        <?php if (has_post_thumbnail()) { ?>
            <div class="post-thumbnail mb-2">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_post_thumbnail(); ?>
                </a>
            </div>
        <?php } ?>
        <?php
        $interior_decor_consultation_archive_element_sortable = get_theme_mod('interior_decor_consultation_archive_element_sortable', array('option1', 'option2', 'option3'));
          foreach ($interior_decor_consultation_archive_element_sortable as $key => $value) {
            if($value === 'option1') { ?>
              <div class="post-meta my-3">
                <i class="far fa-user me-2"></i><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a>
                <span class="ms-3"><i class="far fa-comments me-2"></i> <?php comments_number(esc_html__( '0', 'interior-decor-consultation' ),esc_html__( '1', 'interior-decor-consultation' ),esc_html__( '%', 'interior-decor-consultation' ));?><?php esc_html_e( 'comments', 'interior-decor-consultation' ); ?>
                </span>
              </div>
            <?php }
            if($value === 'option2') { ?>
              <h3 class="post-title mb-3 mt-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php }
            if($value === 'option3') { ?>
                <div class="post-content mb-2">
                  <?php echo wp_trim_words(get_the_content(), get_theme_mod('interior_decor_consultation_post_excerpt_number', 15)); ?>
                </div>
            <?php }
          }

        ?>
    </div>
</div>