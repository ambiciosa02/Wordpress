<footer>
  <div class="container">
    <?php
      if (is_active_sidebar('interior-decor-consultation-footer-sidebar')) {
        echo '<div class="row sidebar-area footer-area wow rollIn">';
          dynamic_sidebar('interior-decor-consultation-footer-sidebar');
        echo '</div>';
      } else { ?>
        <div id="footer-widgets" role="contentinfo">
          <div class="container">
            <div class="row sidebar-area footer-area">
              <div id="categories-2" class="col-lg-3 col-md-6 widget_categories wow rollIn">
                  <h4 class="title"><?php esc_html_e('Categories', 'interior-decor-consultation'); ?></h4>
                  <ul>
                      <?php
                      wp_list_categories(array(
                          'title_li' => '',
                      ));
                      ?>
                  </ul>
              </div>
              <div id="pages-2" class="col-lg-3 col-md-6 widget_pages wow rollIn">
                  <h4 class="title"><?php esc_html_e('Pages', 'interior-decor-consultation'); ?></h4>
                  <ul>
                      <?php
                      wp_list_pages(array(
                          'title_li' => '',
                      ));
                      ?>
                  </ul>
              </div>
              <div id="archives-2" class="col-lg-3 col-md-6 widget_archive wow rollIn">
                  <h4 class="title"><?php esc_html_e('Archives', 'interior-decor-consultation'); ?></h4>
                  <ul>
                      <?php
                      wp_get_archives(array(
                          'type' => 'postbypost',
                          'format' => 'html',
                          'before' => '<li>',
                          'after' => '</li>',
                      ));
                      ?>
                  </ul>
              </div>
              <div id="calendar" class="col-lg-3 col-md-6 widget_calendar wow rollIn">
                <h4 class="title"><?php esc_html_e('Calendar', 'interior-decor-consultation'); ?></h4>
                <?php get_calendar(); ?>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
  </div>

  <div class="copyright">
    <div class="container">
      <div class="copy-text">
        <p class="mb-0 py-3">
            <?php
              if (!get_theme_mod('interior_decor_consultation_footer_text') ) { ?>
                 <a href="<?php echo esc_url('https://www.misbahwp.com/products/free-interior-wordpress-theme'); ?>" target="_blank">
                <?php esc_html_e('Interior Decor WordPress Theme ','interior-decor-consultation'); ?></a>
              <?php } else {
                echo esc_html(get_theme_mod('interior_decor_consultation_footer_text'));
              }
            ?>
            <?php if ( get_theme_mod('interior_decor_consultation_copyright_enable', true) == true ) : ?>
              <?php
              /* translators: %s: Misbah WP */
              printf( esc_html__( 'by %s', 'interior-decor-consultation' ), 'Misbah WP' ); ?>
              <a href="<?php echo esc_url('https://wordpress.org'); ?>" rel="generator"><?php  /* translators: %s: WordPress */  printf( esc_html__( ' | Proudly powered by %s', 'interior-decor-consultation' ), 'WordPress' ); ?></a>
            <?php endif; ?>
          </p>
      </div>
        <?php $interior_decor_consultation_scroll_top_icon = get_theme_mod( 'interior_decor_consultation_scroll_top_icon', 'dashicons dashicons-arrow-up-alt' ); ?>
        <?php if ( get_theme_mod('interior_decor_consultation_scroll_enable_setting', true) == true ) : ?>
          <div class="scroll-up">
              <a href="#tobottom"><span class="dashicons dashicons-<?php echo esc_attr( $interior_decor_consultation_scroll_top_icon ); ?>"></span></a>
          </div>
        <?php endif; ?>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>