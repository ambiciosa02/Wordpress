<?php if( get_theme_mod( 'supermarket_shopping_show_hide_category_section', true) != '') { ?>
    <section id="category" class="my-4">
        <div class="container">
            <div class="row">
                <?php if (class_exists('woocommerce')) { ?>
                    <?php
                        $supermarket_shopping_prod_categories = get_terms('product_cat', array(
                          'number'     => get_theme_mod('supermarket_shopping_products_category_number'),
                          'orderby'    => 'name',
                          'order'      => 'ASC',
                          'hide_empty' => 0
                        ));
                        foreach ($supermarket_shopping_prod_categories as $supermarket_shopping_prod_cat) :
                        $supermarket_shopping_cat_thumb_id = get_term_meta($supermarket_shopping_prod_cat->term_id, 'thumbnail_id', true);
                        $supermarket_shopping_cat_thumb_url = $supermarket_shopping_cat_thumb_id ? wp_get_attachment_thumb_url($supermarket_shopping_cat_thumb_id) : ''; 
                        $supermarket_shopping_term_link = get_term_link($supermarket_shopping_prod_cat, 'product_cat');
                    ?>
                    <div class="col-lg-2 col-md-4 align-self-center my-lg-3 my-2">
                        <div class="product_cat_box">
                            <div class="row">
                                <div class="col-lg-5 col-md-4 col-sm-4 col-4 align-self-center">
                                    <?php if ($supermarket_shopping_cat_thumb_url) : ?>
                                        <img src="<?php echo esc_url($supermarket_shopping_cat_thumb_url); ?>" alt="<?php echo esc_html($supermarket_shopping_prod_cat->name); ?>" />
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-7 col-md-8 col-sm-8 col-8 align-self-center">
                                    <p class="mb-0"><a href="<?php echo esc_url($supermarket_shopping_term_link); ?>"><?php echo esc_html($supermarket_shopping_prod_cat->name); ?></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; wp_reset_query(); ?>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>