<?php 
$supermarket_shopping_aboutus = get_theme_mod('supermarket_shopping_our_products_show_hide_section', true);

if ($supermarket_shopping_aboutus == '1') : ?>
<section id="product-section" class="py-5 mx-md-0 mx-3">
  <div class="container">
    <?php
    // Section Heading
    $supermarket_shopping_our_products_heading_section = get_theme_mod('supermarket_shopping_our_products_heading_section');
    if (!empty($supermarket_shopping_our_products_heading_section)) : ?>
      <h2 class="text-start product-heading">
        <?php echo esc_html($supermarket_shopping_our_products_heading_section); ?>
      </h2>
    <?php endif; ?>
    
    <?php if (class_exists('WooCommerce')) : ?>
      <div class="row">
        <?php
        // Query Products by Selected Category
        $supermarket_shopping_selected_category = get_theme_mod('supermarket_shopping_our_product_product_category','product_cat1');
        if ($supermarket_shopping_selected_category) {
            $supermarket_shopping_args = array(
                'post_type'      => 'product',
                'posts_per_page' => 50,
                'product_cat'    => sanitize_text_field($supermarket_shopping_selected_category),
                'order'          => 'ASC'
            );
            $supermarket_shopping_loop = new WP_Query($supermarket_shopping_args);
            if ($supermarket_shopping_loop->have_posts()) : 
                while ($supermarket_shopping_loop->have_posts()) : $supermarket_shopping_loop->the_post();
                $product = wc_get_product(get_the_ID());

                // Calculate discount percentage
                $supermarket_shopping_regular_price = (float) $product->get_regular_price();
                $supermarket_shopping_sale_price = (float) $product->get_sale_price();
                $supermarket_shopping_discount_percentage = 0;
                if ($supermarket_shopping_regular_price && $supermarket_shopping_sale_price) {
                    $supermarket_shopping_discount_percentage = round((($supermarket_shopping_regular_price - $supermarket_shopping_sale_price) / $supermarket_shopping_regular_price) * 100);
                }
        ?>
          <div class="col-lg-3 col-md-4 product-col">
            <div class="product-box">
              <div class="product-image position-relative">
                <?php echo wp_kses_post($product->get_image()); ?>

                <!-- Wishlist Icon Button -->
                <div class="wishlist-button">
                  <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                </div>
              </div>
              <div class="product-content text-start">
                <p class="my-3 product-price" style="color: <?php echo esc_attr($product->is_on_sale() ? 'black' : 'gray'); ?>">
                  <?php echo wp_kses_post($product->get_price_html()); ?>
                </p>

                <h3 class="my-3"><a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_title()); ?></a></h3>
                <hr>
                <div class="my-4">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-6 align-self-center text-start">
                      <div class="products-pert">
                        <?php if ($supermarket_shopping_discount_percentage > 0) : ?>
                          <span class="discount-percent"><?php echo esc_html($supermarket_shopping_discount_percentage); ?>% <?php esc_html_e('Off', 'supermarket-shopping'); ?></span>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-6 align-self-center text-end">
                      <div class="cart-button">
                        <?php if ($product->is_type('simple')) { woocommerce_template_loop_add_to_cart(); } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php
          endwhile;
          wp_reset_postdata();
          endif;
        }
        ?>
      </div>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>