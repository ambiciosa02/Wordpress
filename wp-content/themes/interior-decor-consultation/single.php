<?php get_header(); ?>

<div class="feature-header">
  <div class="feature-post-thumbnail">
    <?php
      if ( has_post_thumbnail() ) :
        the_post_thumbnail();
      else:
        ?>
        <div class="slider-alternate">
          <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/banner.png'; ?>">
        </div>
        <?php
      endif;
    ?>
    <div class="header-area">
      <h1 class="post-title feature-header-title"><?php the_title(); ?></h1>
      <?php if ( get_theme_mod('interior_decor_consultation_breadcrumb_enable',true) ) : ?>
        <div class="bread_crumb text-center">
          <?php interior_decor_consultation_breadcrumb();  ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<div id="content">  
  <div class="container">
    <div class="row">
      <?php if(get_theme_mod('interior_decor_consultation_single_post_sidebar_layout', 'Right Sidebar') == 'Right Sidebar'){ ?>
      <div class="col-lg-8 col-md-8 mt-5">
        <?php
          while ( have_posts() ) :

            the_post();
            get_template_part( 'template-parts/content', 'post');

            wp_link_pages(
              array(
                'before' => '<div class="interior-decor-consultation-pagination">',
                'after' => '</div>',
                'link_before' => '<span>',
                'link_after' => '</span>'
              )
            );

            comments_template();
          endwhile;
        ?>
      </div>
      <div class="col-lg-4 col-md-4">
        <?php get_sidebar(); ?>
      </div>
      <?php } elseif(get_theme_mod('interior_decor_consultation_single_post_sidebar_layout', 'Right Sidebar') == 'Left Sidebar'){ ?>
      <div class="col-lg-4 col-md-4">
        <?php get_sidebar(); ?>
      </div>
      <div class="col-lg-8 col-md-8 mt-5">
        <?php
          while ( have_posts() ) :

            the_post();
            get_template_part( 'template-parts/content', 'post');

            wp_link_pages(
              array(
                'before' => '<div class="interior-decor-consultation-pagination">',
                'after' => '</div>',
                'link_before' => '<span>',
                'link_after' => '</span>'
              )
            );

            comments_template();
          endwhile;
        ?>
      </div>
      <?php } ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>