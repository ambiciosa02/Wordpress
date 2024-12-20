<?php 
$supermarket_shopping_slider = get_theme_mod('supermarket_shopping_slider_setting', true);

if ($supermarket_shopping_slider == '1') :
?>

<section id="main-slider">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div id="slider">
                    <div id="owl-carousel" class="owl-carousel">
                        <?php
                        // $supermarket_shopping_slide_pages = array();
                        // for ($supermarket_shopping_count = 1; $supermarket_shopping_count <= 4; $supermarket_shopping_count++) {
                        //     $supermarket_shopping_mod = intval(get_theme_mod('supermarket_shopping_slider_page' . $supermarket_shopping_count));
                        //     if ('page-none-selected' !== $supermarket_shopping_mod && $supermarket_shopping_mod > 0) {
                        //         $supermarket_shopping_slide_pages[] = $supermarket_shopping_mod;
                        //     }
                        // }

                        // Define an array to hold selected slider pages
                        $supermarket_shopping_slide_pages = array();

                        // Loop through the customizer settings to collect selected pages
                        for ($supermarket_shopping_count = 1; $supermarket_shopping_count <= 4; $supermarket_shopping_count++) {
                            $supermarket_shopping_mod = intval(get_theme_mod('supermarket_shopping_slider_page' . $supermarket_shopping_count));
                            if ($supermarket_shopping_mod && $supermarket_shopping_mod !== 'page-none-selected') {
                                $supermarket_shopping_slide_pages[] = $supermarket_shopping_mod;
                            }
                        }

                        // Fallback to default "slider-page" if no pages are selected
                        if (empty($supermarket_shopping_slide_pages)) {
                            $default_slider_page = get_page_id_by_slug('slider-page');
                            if ($default_slider_page > 0) {
                                $supermarket_shopping_slide_pages[] = $default_slider_page;
                            }
                        }

                        if (!empty($supermarket_shopping_slide_pages)) :
                            $supermarket_shopping_args = array(
                                'post_type' => 'page',
                                'post__in' => $supermarket_shopping_slide_pages,
                                'orderby' => 'post__in'
                            );
                            $supermarket_shopping_query = new WP_Query($supermarket_shopping_args);
                            if ($supermarket_shopping_query->have_posts()) :
                                while ($supermarket_shopping_query->have_posts()) : $supermarket_shopping_query->the_post(); ?>
                                    <div class="item">
                                        <?php if (has_post_thumbnail()) { ?>
                                            <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                                        <?php } else { ?>
                                            <div class="slider-color-box"></div>
                                        <?php } ?>

                                        <div class="container">
                                            <div class="carousel-caption">
                                                <div class="inner_carousel">
                                                    <h1>
                                                      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                    </h1>
                                                    <div class="short-content ps-3 my-3">
                                                        <?php if (get_theme_mod('supermarket_shopping_slider_short_heading') != '') { ?>
                                                            <p class="slidetop-text mb-3">
                                                                <span class="sale pe-3"><?php echo esc_html__('Sale Up To', 'supermarket-shopping'); ?></span>
                                                                <span class="discount-amount"><?php echo esc_html(get_theme_mod('supermarket_shopping_slider_short_heading', '')); ?></span>
                                                            </p>
                                                        <?php } ?>
                                                        <p class="m-0 slider-contents"><?php echo esc_html(wp_trim_words(get_the_content(), 7)); ?></p>
                                                    </div>
                                                    <div class="more-btn mt-4">
                                                        <?php 
                                                        $supermarket_shopping_btn_text = get_theme_mod('supermarket_shopping_slider_btn_text', __('DISCOVER MORE', 'supermarket-shopping'));
                                                        $supermarket_shopping_btn_link = get_theme_mod('supermarket_shopping_slider_btn_link');
                                                        
                                                        if ($supermarket_shopping_btn_text || $supermarket_shopping_btn_link) { ?>
                                                            <a target="_blank" class="text-capitalize mb-3 slider-btn1" href="<?php echo esc_url($supermarket_shopping_btn_link ? $supermarket_shopping_btn_link : get_permalink()); ?>">
                                                                <?php echo esc_html($supermarket_shopping_btn_text); ?><i class="fas fa-arrow-right ms-2" aria-hidden="true"></i>
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile;
                                wp_reset_postdata(); ?>
                            <?php else : ?>
                                <div class="no-postfound"></div>
                            <?php endif;
                        endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="slide-banner">
                  <?php if( get_theme_mod( 'supermarket_shopping_discount_sale_img1') != '') { ?>
                    <div class="banner-1 mb-3">
                      <div class="product-img">
                        <img src="<?php echo esc_url(get_theme_mod('supermarket_shopping_discount_sale_img1')); ?>" alt="<?php echo esc_attr(get_theme_mod('supermarket_shopping_topproduct_title1', 'Product Image')); ?>" />
                        <div class="product-content first">
                          <p class="toppro-text text-uppercase m-0"><?php echo esc_html(get_theme_mod('supermarket_shopping_topproduct_title1')); ?></p>
                          <h2 class="discount-text my-2 text-uppercase"><a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('supermarket_shopping_product_sale_discount_title1')); ?></a></h2>
                          <p class="toppro-content"><?php echo esc_html(get_theme_mod('supermarket_shopping_topproduct_content')); ?></p>
                          <div class="product-btn mt-3" data-wow-duration="2s">
                            <?php if(get_theme_mod('supermarket_shopping_product_btn_text1') != ''){ ?>
                              <a href="<?php echo esc_url(get_theme_mod('supermarket_shopping_product_btn_link1')); ?>"><?php echo esc_html(get_theme_mod('supermarket_shopping_product_btn_text1')); ?><i class="fas fa-arrow-right ps-2" aria-hidden="true"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('supermarket_shopping_product_btn_text1')); ?></span></a>
                            <?php }?>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                  <?php if( get_theme_mod( 'supermarket_shopping_discount_sale_img2') != '') { ?>
                    <div class="banner-2">
                      <div class="product-img">
                        <img src="<?php echo esc_url(get_theme_mod('supermarket_shopping_discount_sale_img2')); ?>" alt="<?php echo esc_attr(get_theme_mod('supermarket_shopping_topproduct_title2', 'Product Image')); ?>" />
                        <div class="product-content second">
                          <p class="toppro-text text-capitalize m-0"><?php echo esc_html(get_theme_mod('supermarket_shopping_topproduct_title2')); ?></p>
                          <h2 class="discount-text m-0 text-capitalize"><a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('supermarket_shopping_product_sale_discount_title2')); ?></a></h2>
                          <div class="product-btn mt-3" data-wow-duration="2s">
                            <?php if(get_theme_mod('supermarket_shopping_product_btn_text2') != ''){ ?>
                              <a href="<?php echo esc_url(get_theme_mod('supermarket_shopping_product_btn_link2')); ?>"><?php echo esc_html(get_theme_mod('supermarket_shopping_product_btn_text2')); ?><i class="fas fa-arrow-right ps-2" aria-hidden="true"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('supermarket_shopping_product_btn_text2')); ?></span></a>
                            <?php }?>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php endif; ?>
