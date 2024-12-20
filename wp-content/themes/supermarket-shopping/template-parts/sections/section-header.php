<header class="main-header">    
    <?php if (get_theme_mod('supermarket_shopping_top_header', true)) : ?>
        <div class="topbar py-2">
          <div class="container">
            <div class="row">
              <div class="topbar-text col-lg-6 col-md-6 col-12 align-self-center">
                <div class="top-header mb-md-0 mb-2">
                  <?php if (get_theme_mod('supermarket_shopping_topbar_text') !== '') : ?>
                    <p class="mb-0"><?php echo esc_html(get_theme_mod('supermarket_shopping_topbar_text', '')); ?></p>
                  <?php endif; ?>
                </div>
              </div>
              
              <div class="col-lg-6 col-md-6 col-12 align-self-center top-right-content text-md-end">
                <?php if (!empty(get_theme_mod('supermarket_shopping_about_us_link')) || !empty(get_theme_mod('supermarket_shopping_about_us_text'))) : ?>
                  <span class="abt-btn pe-md-2">
                    <a href="<?php echo esc_url(get_theme_mod('supermarket_shopping_about_us_link', '')); ?>">
                      <?php if (!empty(get_theme_mod('supermarket_shopping_about_us_text'))) : ?>
                        <i class="fas fa-info-circle me-2" aria-hidden="true"></i>
                        <?php echo esc_html(get_theme_mod('supermarket_shopping_about_us_text', '')); ?>
                      <?php endif; ?>
                    </a>
                  </span>
                <?php endif; ?>

                <?php if (!empty(get_theme_mod('supermarket_shopping_order_tracking_link')) || !empty(get_theme_mod('supermarket_shopping_order_tracking_text'))) : ?>
                  <span class="ps-md-3 track-btn">
                    <a href="<?php echo esc_url(get_theme_mod('supermarket_shopping_order_tracking_link', '')); ?>">
                      <?php if (!empty(get_theme_mod('supermarket_shopping_order_tracking_text'))) : ?>
                        <i class="fas fa-truck me-2" aria-hidden="true"></i>
                        <?php echo esc_html(get_theme_mod('supermarket_shopping_order_tracking_text', '')); ?>
                      <?php endif; ?>
                    </a>
                  </span>
                <?php endif; ?>
                <span class="social-media ps-4">
                  <?php if ($supermarket_shopping_facebook_url = get_theme_mod('supermarket_shopping_facebook_url','#')) : ?>
                    <a target="_blank" rel="noopener noreferrer" href="<?php echo esc_url($supermarket_shopping_facebook_url); ?>">
                      <i class="fab fa-facebook-f me-3" aria-hidden="true"></i>
                      <span class="screen-reader-text"><?php esc_html_e('Facebook', 'supermarket-shopping'); ?></span>
                    </a>
                  <?php endif; ?>

                  <?php if ($supermarket_shopping_twitter_url = get_theme_mod('supermarket_shopping_twitter_url','#')) : ?>
                    <a target="_blank" rel="noopener noreferrer" href="<?php echo esc_url($supermarket_shopping_twitter_url); ?>">
                      <i class="fab fa-twitter me-3" aria-hidden="true"></i>
                      <span class="screen-reader-text"><?php esc_html_e('Twitter', 'supermarket-shopping'); ?></span>
                    </a>
                  <?php endif; ?>

                  <?php if ($supermarket_shopping_instagram_url = get_theme_mod('supermarket_shopping_instagram_url','#')) : ?>
                    <a target="_blank" rel="noopener noreferrer" href="<?php echo esc_url($supermarket_shopping_instagram_url); ?>">
                      <i class="fab fa-instagram-square me-3" aria-hidden="true"></i>
                      <span class="screen-reader-text"><?php esc_html_e('Instagram', 'supermarket-shopping'); ?></span>
                    </a>
                  <?php endif; ?>

                  <?php if ($supermarket_shopping_youtube_url = get_theme_mod('supermarket_shopping_youtube_url','#')) : ?>
                    <a target="_blank" rel="noopener noreferrer" href="<?php echo esc_url($supermarket_shopping_youtube_url); ?>">
                      <i class="fab fa-youtube me-3" aria-hidden="true"></i>
                      <span class="screen-reader-text"><?php esc_html_e('YouTube', 'supermarket-shopping'); ?></span>
                    </a>
                  <?php endif; ?>
                </span>
              </div>
            </div>
          </div>
        </div>
    <?php endif; ?>

    <div class="middle-header-area py-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 logo-col text-md-start text-center align-self-center">
                    <div class="logo mb-lg-0 mb-md-3">
                        <?php 
                        if (has_custom_logo()) {
                            the_custom_logo();
                        } else {
                            // Check if both title and tagline settings are disabled
                            $supermarket_shopping_tagline_enabled = get_theme_mod('supermarket_shopping_tagline_setting', false);
                            $supermarket_shopping_title_enabled = get_theme_mod('supermarket_shopping_site_title_setting', false);

                            if (!$supermarket_shopping_tagline_enabled && !$supermarket_shopping_title_enabled) {
                                // Display the default logo
                                $default_logo_url = get_template_directory_uri() . '/assets/images/logo.png'; // Replace with your default logo path
                                echo '<a href="' . esc_url(home_url('/')) . '">';
                                echo '<img src="' . esc_url($default_logo_url) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
                                echo '</a>';
                            }

                            // Display tagline if the setting is enabled
                            if ($supermarket_shopping_tagline_enabled) :
                                $supermarket_shopping_site_desc = get_bloginfo('description'); ?>
                                <p class="site-description"><?php echo esc_html($supermarket_shopping_site_desc); ?></p>
                            <?php endif; ?>

                            <?php
                            // Display site title if the setting is enabled
                            if ($supermarket_shopping_title_enabled) : ?>
                                <p class="site-title">
                                    <a href="<?php echo esc_url(home_url('/')); ?>">
                                        <?php echo esc_html(get_bloginfo('name')); ?>
                                    </a>
                                </p>
                            <?php endif; ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 align-self-center cat-box text-end">
                    <?php if(class_exists('woocommerce')){ ?>
                        <button class="category-button text-lg-start text-md-end"><i class="fa fa-bars pe-2" aria-hidden="true"></i><?php esc_html_e('All Categories','supermarket-shopping'); ?></button>
                        <div class="cat-dropdown">
                            <?php
                              $args = array(
                                'number'     => get_theme_mod('supermarket_shopping_product_category_number'),
                                'orderby'    => 'title',
                                'order'      => 'ASC',
                                'hide_empty' => 0,
                                'parent'  => 0
                              );
                              $supermarket_shopping_product_categories = get_terms( 'product_cat', $args );
                              $supermarket_shopping_count = count($supermarket_shopping_product_categories);
                              if ( $supermarket_shopping_count > 0 ){
                                foreach ( $supermarket_shopping_product_categories as $product_category ) {
                                  $supermarket_shopping_cat_id   = $product_category->term_id;
                                  $cat_link = get_category_link( $supermarket_shopping_cat_id );
                                  if ($product_category->category_parent == 0) { ?>
                                <li class="drp_dwn_menu"><a href="<?php echo esc_url(get_term_link( $product_category ) ); ?>">
                                <?php
                              }
                                echo esc_html( $product_category->name ); ?></a></li>
                                <?php
                                }
                              }
                            ?>
                        </div>
                    <?php }?>
                </div>
                <div class="col-lg-4 col-md-6 main-cat-box text-md-end text-start align-self-center mb-lg-0 mb-3">
                    <?php if(class_exists('woocommerce')){ ?>
                        <div class="searching-area">
                            <div class="search-cat-box">
                                <div class="row m-0 align-items-center">
                                    <div class="col-lg-7 col-md-5 px-2 main-searh-col align-self-center">
                                        <form id="searchForm" action="<?php echo esc_url(home_url('/')); ?>" method="get">
                                            <input class="search-text" type="text" name="s" class="form-control" placeholder="<?php esc_attr_e('Search for Products', 'supermarket-shopping'); ?>">
                                            <input type="hidden" name="post_type" value="service">
                                            <input type="hidden" name="category" id="categoryInput" value="">
                                        </form>
                                    </div>
                                    <!-- Product Category Dropdown -->
                                    <div class="col-lg-4 col-md-5 px-2 align-self-center">
                                        <button class="category-btn btn btn-secondary">
                                            <?php esc_html_e('All Categories', 'supermarket-shopping'); ?> <i class="fas fa-chevron-down ps-3"></i>
                                        </button>
                                        <ul class="category-dropdown" style="display: none;">
                                            <?php
                                            $args = array(
                                                'taxonomy'   => 'product_cat',
                                                'orderby'    => 'name',    
                                                'order'      => 'ASC',   
                                                'hide_empty' => 0,           
                                                'parent'     => 0          
                                            );
                                            $product_categories = get_terms($args);

                                            if (!empty($product_categories)) {
                                                foreach ($product_categories as $product_category) {
                                                    echo '<li><a href="' . esc_url(get_term_link($product_category)) . '" data-id="' . esc_attr($product_category->term_id) . '">' . esc_html($product_category->name) . '</a></li>';
                                                }
                                            } else {
                                                echo '<li>' . esc_html__('No categories found.', 'supermarket-shopping') . '</li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>

                                    <div class="col-lg-1 col-md-2 searchbtn align-self-center">
                                        <button id="searchButton" class="btn btn-search w-100"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </div>
                <div class="col-lg-3 col-md-6 align-self-center text-end">
                    <div class="header-details d-flex align-items-center justify-content-md-end justify-content-center">
                        <p class="mb-0">
                            <?php if (class_exists('woocommerce')) : ?>
                                <?php if (is_user_logged_in()) : ?>
                                    <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" aria-label="<?php esc_attr_e('My Account', 'supermarket-shopping'); ?>">
                                        <i class="fas fa-user"></i><br>
                                        <span class="login-text"><?php esc_html_e('My Account', 'supermarket-shopping'); ?></span>
                                    </a>
                                <?php else : ?>
                                    <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" aria-label="<?php esc_attr_e('My Account', 'supermarket-shopping'); ?>">
                                        <i class="far fa-user"></i><br>
                                        <span class="login-text"><?php esc_html_e('My Account', 'supermarket-shopping'); ?></span>
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </p>

                        <?php if (class_exists('woocommerce')) : ?>
                            <?php if (get_theme_mod('supermarket_shopping_like_option') != '') : ?>
                                <p class="mb-0">
                                    <a href="<?php echo esc_url(get_theme_mod('supermarket_shopping_like_option')); ?>" aria-label="<?php esc_attr_e('Wishlist', 'supermarket-shopping'); ?>">
                                        <i class="far fa-heart"></i><br>
                                        <span class="login-text"><?php esc_html_e('Wishlist', 'supermarket-shopping'); ?></span>
                                    </a>
                                </p>
                            <?php endif; ?>

                            <?php if (class_exists('YITH_WCWL')) : ?>
                                <p class="mb-0">
                                    <a href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>" aria-label="<?php esc_attr_e('Wishlist', 'supermarket-shopping'); ?>">
                                        <i class="fas fa-heart"></i><br>
                                        <span class="login-text"><?php esc_html_e('Wishlist', 'supermarket-shopping'); ?></span>
                                    </a>
                                </p>
                            <?php endif; ?>
                        <?php endif; ?>

                        <p class="mb-0">
                            <?php if (class_exists('woocommerce')) : ?>
                                <span class="product-cart text-center position-relative">
                                    <a href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('Shopping Cart', 'supermarket-shopping'); ?>" aria-label="<?php esc_attr_e('My Cart', 'supermarket-shopping'); ?>">
                                        <i class="fas fa-cart-plus"></i><br>
                                        <span class="login-text"><?php esc_html_e('My Cart', 'supermarket-shopping'); ?></span>
                                    </a>
                                    <?php 
                                    $supermarket_shopping_cart_count = WC()->cart->get_cart_contents_count(); 
                                    if ($supermarket_shopping_cart_count > 0) : ?>
                                        <span class="cart-count">(<?php echo esc_html($supermarket_shopping_cart_count); ?>)</span>
                                    <?php endif; ?>
                                </span>
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="menu-box py-2 <?php if( get_theme_mod( 'supermarket_shopping_sticky_header', '0')) { ?>sticky-header<?php } else { ?>close-sticky<?php } ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-6 col-12 menu-col align-self-center">
                    <div class="menubox">
                        <nav class="navbar navbar-expand-lg navbaroffcanvas">
                            <div class="navbar-menubar responsive-menu">
                                <button class="navbar-toggler align-self-center" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-menu" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'supermarket-shopping'); ?>">
                                    <i class="fas fa-bars"></i>
                                </button>
                                <div class="collapse navbar-collapse navbar-menu">
                                    <button class="navbar-toggler navbar-toggler-close" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-menu" aria-expanded="false" aria-label="<?php esc_attr_e('Close navigation', 'supermarket-shopping'); ?>">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'primary',
                                        'container_class' => 'main-menu clearfix',
                                        'menu_class' => 'clearfix',
                                        'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                                        'fallback_cb' => 'wp_page_menu', // Fallback if no menu is assigned
                                    ));
                                    ?>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 align-self-center">
                    <span class="translate-btn d-flex justify-content-md-end justify-content-center">
                        <?php 
                        // Check if the translator option is enabled and the GTranslate plugin exists
                        if (get_theme_mod('supermarket_shopping_cart_language_translator', true) && class_exists('GTranslate')) : ?>
                            <div class="translate-lang position-relative d-md-inline-block">
                                <?php echo do_shortcode('[gtranslate]'); // Display the translator shortcode ?>
                            </div>
                        <?php endif; ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>