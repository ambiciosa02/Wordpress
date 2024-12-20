<?php
/**
 * Custom Functions.
 *
 * @package Omega Storefront
 */

if( !function_exists( 'omega_storefront_fonts_url' ) ) :

    //Google Fonts URL
    function omega_storefront_fonts_url(){

        $omega_storefront_font_families = array(
            'Outfit:wght@100..900',
            'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900',
        );

        $omega_storefront_fonts_url = add_query_arg( array(
            'family' => implode( '&family=', $omega_storefront_font_families ),
            'display' => 'swap',
        ), 'https://fonts.googleapis.com/css2' );

        return esc_url_raw($omega_storefront_fonts_url);

    }

endif;

if ( ! function_exists( 'omega_storefront_sub_menu_toggle_button' ) ) :

    function omega_storefront_sub_menu_toggle_button( $omega_storefront_args, $omega_storefront_item, $depth ) {

        // Add sub menu toggles to the main menu with toggles
        if ( $omega_storefront_args->theme_location == 'omega-storefront-primary-menu' && isset( $omega_storefront_args->show_toggles ) ) {
            
            // Wrap the menu item link contents in a div, used for positioning
            $omega_storefront_args->before = '<div class="submenu-wrapper">';
            $omega_storefront_args->after  = '';

            // Add a toggle to items with children
            if ( in_array( 'menu-item-has-children', $omega_storefront_item->classes ) ) {

                $toggle_target_string = '.menu-item.menu-item-' . $omega_storefront_item->ID . ' > .sub-menu';

                // Add the sub menu toggle
                $omega_storefront_args->after .= '<button type="button" class="theme-aria-button submenu-toggle" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="250" aria-expanded="false"><span class="btn__content" tabindex="-1"><span class="screen-reader-text">' . esc_html__( 'Show sub menu', 'omega-storefront' ) . '</span>' . omega_storefront_get_theme_svg( 'chevron-down' ) . '</span></button>';

            }

            // Close the wrapper
            $omega_storefront_args->after .= '</div><!-- .submenu-wrapper -->';
            // Add sub menu icons to the main menu without toggles (the fallback menu)

        }elseif( $omega_storefront_args->theme_location == 'omega-storefront-primary-menu' ) {

            if ( in_array( 'menu-item-has-children', $omega_storefront_item->classes ) ) {

                $omega_storefront_args->before = '<div class="link-icon-wrapper">';
                $omega_storefront_args->after  = omega_storefront_get_theme_svg( 'chevron-down' ) . '</div>';

            } else {

                $omega_storefront_args->before = '';
                $omega_storefront_args->after  = '';

            }

        }

        return $omega_storefront_args;

    }

endif;

add_filter( 'nav_menu_item_args', 'omega_storefront_sub_menu_toggle_button', 10, 3 );

if ( ! function_exists( 'omega_storefront_the_theme_svg' ) ):
    
    function omega_storefront_the_theme_svg( $omega_storefront_svg_name, $omega_storefront_return = false ) {

        if( $omega_storefront_return ){

            return omega_storefront_get_theme_svg( $omega_storefront_svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in omega_storefront_get_theme_svg();.

        }else{

            echo omega_storefront_get_theme_svg( $omega_storefront_svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in omega_storefront_get_theme_svg();.

        }
    }

endif;

if ( ! function_exists( 'omega_storefront_get_theme_svg' ) ):

    function omega_storefront_get_theme_svg( $omega_storefront_svg_name ) {

        // Make sure that only our allowed tags and attributes are included.
        $omega_storefront_svg = wp_kses(
            Omega_Storefront_SVG_Icons::get_svg( $omega_storefront_svg_name ),
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
                'polyline' => array(
                    'fill'      => true,
                    'points'    => true,
                ),
                'line' => array(
                    'fill'      => true,
                    'x1'      => true,
                    'x2' => true,
                    'y1'    => true,
                    'y2' => true,
                ),
            )
        );
        if ( ! $omega_storefront_svg ) {
            return false;
        }
        return $omega_storefront_svg;

    }

endif;

if( !function_exists( 'omega_storefront_post_category_list' ) ) :

    // Post Category List.
    function omega_storefront_post_category_list( $omega_storefront_select_cat = true ){

        $omega_storefront_post_cat_lists = get_categories(
            array(
                'hide_empty' => '0',
                'exclude' => '1',
            )
        );

        $omega_storefront_post_cat_cat_array = array();
        if( $omega_storefront_select_cat ){

            $omega_storefront_post_cat_cat_array[''] = esc_html__( '-- Select Category --','omega-storefront' );

        }

        foreach ( $omega_storefront_post_cat_lists as $omega_storefront_post_cat_list ) {

            $omega_storefront_post_cat_cat_array[$omega_storefront_post_cat_list->slug] = $omega_storefront_post_cat_list->name;

        }

        return $omega_storefront_post_cat_cat_array;
    }

endif;

if( !function_exists('omega_storefront_single_post_navigation') ):

    function omega_storefront_single_post_navigation(){

        $omega_storefront_default = omega_storefront_get_default_theme_options();
        $omega_storefront_twp_navigation_type = esc_attr( get_post_meta( get_the_ID(), 'twp_disable_ajax_load_next_post', true ) );
        $omega_storefront_current_id = '';
        $article_wrap_class = '';
        global $post;
        $omega_storefront_current_id = $post->ID;
        if( $omega_storefront_twp_navigation_type == '' || $omega_storefront_twp_navigation_type == 'global-layout' ){
            $omega_storefront_twp_navigation_type = get_theme_mod('twp_navigation_type', $omega_storefront_default['twp_navigation_type']);
        }

        if( $omega_storefront_twp_navigation_type != 'no-navigation' && 'post' === get_post_type() ){

            if( $omega_storefront_twp_navigation_type == 'theme-normal-navigation' ){ ?>

                <div class="navigation-wrapper">
                    <?php
                    // Previous/next post navigation.
                    the_post_navigation(array(
                        'prev_text' => '<span class="arrow" aria-hidden="true">' . omega_storefront_the_theme_svg('arrow-left',$omega_storefront_return = true ) . '</span><span class="screen-reader-text">' . esc_html__('Previous post:', 'omega-storefront') . '</span><span class="post-title">%title</span>',
                        'next_text' => '<span class="arrow" aria-hidden="true">' . omega_storefront_the_theme_svg('arrow-right',$omega_storefront_return = true ) . '</span><span class="screen-reader-text">' . esc_html__('Next post:', 'omega-storefront') . '</span><span class="post-title">%title</span>',
                    )); ?>
                </div>
                <?php

            }else{

                $omega_storefront_next_post = get_next_post();
                if( isset( $omega_storefront_next_post->ID ) ){

                    $omega_storefront_next_post_id = $omega_storefront_next_post->ID;
                    echo '<div loop-count="1" next-post="' . absint( $omega_storefront_next_post_id ) . '" class="twp-single-infinity"></div>';

                }
            }

        }

    }

endif;

add_action( 'omega_storefront_navigation_action','omega_storefront_single_post_navigation',30 );

if( !function_exists('omega_storefront_content_offcanvas') ):

    // Offcanvas Contents
    function omega_storefront_content_offcanvas(){ ?>

        <div id="offcanvas-menu">
            <div class="offcanvas-wraper">
                <div class="close-offcanvas-menu">
                    <div class="offcanvas-close">
                        <a href="javascript:void(0)" class="skip-link-menu-start"></a>
                        <button type="button" class="button-offcanvas-close">
                            <span class="offcanvas-close-label">
                                <?php echo esc_html__('Close', 'omega-storefront'); ?>
                            </span>
                        </button>
                    </div>
                </div>
                <div id="primary-nav-offcanvas" class="offcanvas-item offcanvas-main-navigation">
                    <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'omega-storefront'); ?>" role="navigation">
                        <ul class="primary-menu theme-menu">
                            <?php
                            if (has_nav_menu('omega-storefront-primary-menu')) {
                                wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'omega-storefront-primary-menu',
                                        'show_toggles' => true,
                                    )
                                );
                            }else{

                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'show_sub_menu_icons' => true,
                                        'title_li' => false,
                                        'show_toggles' => true,
                                        'walker' => new Omega_Storefront_Walker_Page(),
                                    )
                                );
                            }
                            ?>
                        </ul>
                    </nav><!-- .primary-menu-wrapper -->
                </div>
                <a href="javascript:void(0)" class="skip-link-menu-end"></a>
            </div>
        </div>

    <?php
    }

endif;

add_action( 'omega_storefront_before_footer_content_action','omega_storefront_content_offcanvas',30 );

if( !function_exists('omega_storefront_footer_content_widget') ):

    function omega_storefront_footer_content_widget(){

        $omega_storefront_default = omega_storefront_get_default_theme_options();
        
            $omega_storefront_footer_column_layout = absint(get_theme_mod('omega_storefront_footer_column_layout', $omega_storefront_default['omega_storefront_footer_column_layout']));
            $omega_storefront_footer_sidebar_class = 12;
            if($omega_storefront_footer_column_layout == 2) {
                $omega_storefront_footer_sidebar_class = 6;
            }
            if($omega_storefront_footer_column_layout == 3) {
                $omega_storefront_footer_sidebar_class = 4;
            }
            ?>
           
           <?php if ( get_theme_mod('omega_storefront_display_footer', false) == true ) : ?>
                <div class="footer-widgetarea">
                    <div class="wrapper">
                        <div class="column-row">

                            <?php for ($i=0; $i < $omega_storefront_footer_column_layout; $i++) {
                                ?>
                                <div class="column <?php echo 'column-' . absint($omega_storefront_footer_sidebar_class); ?> column-sm-12">
                                    <?php dynamic_sidebar('omega-storefront-footer-widget-' . $i); ?>
                                </div>
                           <?php } ?>

                        </div>
                    </div>
                </div>
           <?php endif; ?> 

        <?php

    }

endif;

add_action( 'omega_storefront_footer_content_action','omega_storefront_footer_content_widget',10 );

if( !function_exists('omega_storefront_footer_content_info') ):

    /**
     * Footer Copyright Area
    **/
    function omega_storefront_footer_content_info(){

        $omega_storefront_default = omega_storefront_get_default_theme_options(); ?>
        <div class="site-info">
            <div class="wrapper">
                <div class="column-row">
                    <div class="column column-9">
                        <div class="footer-credits">
                            <div class="footer-copyright">
                                <?php
                                $omega_storefront_footer_copyright_text = wp_kses_post( get_theme_mod( 'omega_storefront_footer_copyright_text', $omega_storefront_default['omega_storefront_footer_copyright_text'] ) );
                                    echo esc_html( $omega_storefront_footer_copyright_text );
                                    echo '<br>';
                                    echo esc_html__('Theme: ', 'omega-storefront') . '<a href="' . esc_url('https://www.omegathemes.com/products/free-storefront-wordpress-theme') . '" title="' . esc_attr__('OMEGA STOREFRONT ', 'omega-storefront') . '" target="_blank"><span>' . esc_html__('OMEGA STOREFRONT ', 'omega-storefront') . '</span></a>' . esc_html__('By ', 'omega-storefront') . '  <span>' . esc_html__('OMEGA ', 'omega-storefront') . '</span>';
                                    echo esc_html__('Powered by ', 'omega-storefront') . '<a href="' . esc_url('https://wordpress.org') . '" title="' . esc_attr__('WordPress', 'omega-storefront') . '" target="_blank"><span>' . esc_html__('WordPress.', 'omega-storefront') . '</span></a>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="column column-3 align-text-right">
                        <a class="to-the-top" href="#site-header">
                            <span class="to-the-top-long">
                                <?php if ( get_theme_mod('omega_storefront_enable_to_the_top', true) == true ) : ?>
                                    <?php
                                    $omega_storefront_to_the_top_text = get_theme_mod( 'omega_storefront_to_the_top_text', __( 'To the Top', 'omega-storefront' ) );
                                    printf( 
                                        wp_kses( 
                                            /* translators: %s is the arrow icon markup */
                                            '%s %s', 
                                            array( 'span' => array( 'class' => array(), 'aria-hidden' => array() ) ) 
                                        ), 
                                        esc_html( $omega_storefront_to_the_top_text ),
                                        '<span class="arrow" aria-hidden="true">&uarr;</span>' 
                                    );
                                    ?>
                                <?php endif; ?>
                            </span>
                        </a>

                    </div>
                </div>
            </div>
        </div>

    <?php
    }

endif;

add_action( 'omega_storefront_footer_content_action','omega_storefront_footer_content_info',20 );


if( !function_exists( 'omega_storefront_main_slider' ) ) :

    function omega_storefront_main_slider(){

        $omega_storefront_default = omega_storefront_get_default_theme_options();

        $omega_storefront_slider_section_title = esc_html( get_theme_mod( 'omega_storefront_slider_section_title',
        $omega_storefront_default['omega_storefront_slider_section_title'] ) );

        $omega_storefront_header_banner = get_theme_mod( 'omega_storefront_header_banner', $omega_storefront_default['omega_storefront_header_banner'] );
        $omega_storefront_header_banner_cat = get_theme_mod( 'omega_storefront_header_banner_cat','uncategorized');

        if( $omega_storefront_header_banner ){

            $omega_storefront_rtl = '';
            if( is_rtl() ){
                $omega_storefront_rtl = 'dir="rtl"';
            }

            $omega_storefront_banner_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 4,'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html( $omega_storefront_header_banner_cat ) ) );

            if( $omega_storefront_banner_query->have_posts() ): ?>

                <div class="theme-custom-block theme-banner-block">
                    <div class="swiper-container theme-main-carousel swiper-container" <?php echo $omega_storefront_rtl; ?>>
                        <div class="swiper-wrapper">
                            <?php
                            while( $omega_storefront_banner_query->have_posts() ):
                            $omega_storefront_banner_query->the_post();
                            $omega_storefront_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                            $default_image = get_template_directory_uri() . '/assets/images/banner.png'; // Replace with the actual path to your default image
                            $omega_storefront_featured_image = isset( $omega_storefront_featured_image[0] ) ? $omega_storefront_featured_image[0] : $default_image;?>
                                <div class="swiper-slide main-carousel-item">                                 
                                    <div class="theme-article-post">
                                        <div class="entry-thumbnail">
                                            <div class="data-bg data-bg-large" data-background="<?php echo esc_url($omega_storefront_featured_image); ?>">
                                                <a href="<?php the_permalink(); ?>" class="theme-image-responsive" tabindex="0"></a>
                                            </div>
                                            <?php omega_storefront_post_format_icon(); ?>
                                        </div>
                                
                                        <div class="main-carousel-caption">
                                            <div class="post-content">
                                                <header class="entry-header">
                                                    <?php if( $omega_storefront_slider_section_title ){ ?>
                                                        <h3><?php echo esc_html( $omega_storefront_slider_section_title ); ?></h3>
                                                    <?php } ?>
                                                    <h2 class="entry-title entry-title-big">
                                                        <a href="<?php the_permalink(); ?>" rel="bookmark"><span><?php the_title(); ?></span></a>
                                                    </h2>
                                                </header>
                                                <div class="entry-content">
                                                    <?php
                                                    if (has_excerpt()) {

                                                        the_excerpt();

                                                    } else {

                                                        echo esc_html(wp_trim_words(get_the_content(), 25, '...'));

                                                    } ?>
                                                </div>

                                                <a href="<?php the_permalink(); ?>" class="btn-fancy btn-fancy-primary" tabindex="0">
                                                    <?php echo esc_html__('Shop Now', 'omega-storefront'); ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

            <?php
            wp_reset_postdata();
            endif;
        }
    }

endif;


if( !function_exists( 'omega_storefront_product_section' ) ) :

    function omega_storefront_product_section(){ 

        $omega_storefront_default = omega_storefront_get_default_theme_options();

        $omega_storefront_product_section_title = esc_html( get_theme_mod( 'omega_storefront_product_section_title',
        $omega_storefront_default['omega_storefront_product_section_title'] ) );

        $omega_storefront_product_section_content = esc_html( get_theme_mod( 'omega_storefront_product_section_content',
        $omega_storefront_default['omega_storefront_product_section_content'] ) );

        $omega_storefront_catData = get_theme_mod('omega_storefront_featured_product_category','');
          
        if ( class_exists( 'WooCommerce' ) ) {
            $omega_storefront_args = array(
                'post_type' => 'product',
                'posts_per_page' => 100,
                'product_cat' => $omega_storefront_catData,
                'order' => 'ASC'
            ); ?>

            <div class="theme-product-block">
                <div class="wrapper">
                    <div class="shop-heading">
                        <?php if( $omega_storefront_product_section_title ){ ?>
                            <h3><?php echo esc_html( $omega_storefront_product_section_title ); ?></h3>
                        <?php } ?>
                        <?php if( $omega_storefront_product_section_content ){ ?>
                            <p><?php echo esc_html( $omega_storefront_product_section_content ); ?></p>
                        <?php } ?>
                    </div>
                    <div class="owl-carousel" role="listbox">
                        <?php 
                        $omega_storefront_loop = new WP_Query( $omega_storefront_args );
                        if ( $omega_storefront_loop->have_posts() ) {
                            while ( $omega_storefront_loop->have_posts() ) : $omega_storefront_loop->the_post(); 
                                global $product; 
                                $product_id = $product->get_id(); // Get product ID dynamically
                        ?>
                            <div class="grid-product">
                                <figure>
                                    <?php if (has_post_thumbnail( $omega_storefront_loop->post->ID )) echo get_the_post_thumbnail($omega_storefront_loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(wc_placeholder_img_src()).'" />'; ?>
                                    <div class="product-cart">
                                        <?php if( $product->is_type( 'simple' ) ) { woocommerce_template_loop_add_to_cart(  $omega_storefront_loop->post, $product );} ?>
                                    </div>
                                    <div class="product-sale">
                                        <?php woocommerce_show_product_sale_flash( $product ); ?>
                                    </div>
                                </figure>
                                <div class="product-text-box">
                                    <h5 class="product-text"><a href="<?php echo esc_url(get_permalink( $omega_storefront_loop->post->ID )); ?>"><?php the_title(); ?></a></h5>
                                    <p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> "><?php echo $product->get_price_html(); ?></p>
                                </div>
                            </div>
                        <?php 
                            endwhile; 
                            wp_reset_postdata();
                        } else { 
                            // Show fallback static products if no WooCommerce products found
                        ?>
                            <div class="grid-product">
                                <figure>
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/one.png' ); ?>" alt="<?php echo esc_attr( __( 'Default Product 1', 'omega-storefront' ) ); ?>" />
                                    <div class="product-cart">
                                        <a href="#" rel="nofollow"><?php esc_html_e( 'Add to Cart', 'omega-storefront' ); ?></a>
                                    </div>
                                </figure>
                                <div class="product-text-box">
                                    <h5 class="product-text"><a href="#"><?php esc_html_e( 'Product Name Here 1', 'omega-storefront' ); ?></a></h5>
                                    <p class="price"><?php echo esc_html( '$80.00' ); ?></p>
                                </div>
                            </div>
                            <div class="grid-product">
                                <figure>
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/two.png' ); ?>" alt="<?php echo esc_attr( __( 'Default Product 2', 'omega-storefront' ) ); ?>" />
                                    <div class="product-cart">
                                        <a href="#" rel="nofollow"><?php esc_html_e( 'Add to Cart', 'omega-storefront' ); ?></a>
                                    </div>
                                </figure>
                                <div class="product-text-box">
                                    <h5 class="product-text"><a href="#"><?php esc_html_e( 'Product Name Here 2', 'omega-storefront' ); ?></a></h5>
                                    <p class="price"><?php echo esc_html( '$80.00' ); ?></p>
                                </div>
                            </div>
                            <div class="grid-product">
                                <figure>
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/three.png' ); ?>" alt="<?php echo esc_attr( __( 'Default Product 3', 'omega-storefront' ) ); ?>" />
                                    <div class="product-cart">
                                        <a href="#" rel="nofollow"><?php esc_html_e( 'Add to Cart', 'omega-storefront' ); ?></a>
                                    </div>
                                </figure>
                                <div class="product-text-box">
                                    <h5 class="product-text"><a href="#"><?php esc_html_e( 'Product Name Here 3', 'omega-storefront' ); ?></a></h5>
                                    <p class="price"><?php echo esc_html( '$80.00' ); ?></p>
                                </div>
                            </div>
                            <div class="grid-product">
                                <figure>
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/four.png' ); ?>" alt="<?php echo esc_attr( __( 'Default Product 4', 'omega-storefront' ) ); ?>" />
                                    <div class="product-cart">
                                        <a href="#" rel="nofollow"><?php esc_html_e( 'Add to Cart', 'omega-storefront' ); ?></a>
                                    </div>
                                </figure>
                                <div class="product-text-box">
                                    <h5 class="product-text"><a href="#"><?php esc_html_e( 'Product Name Here 4', 'omega-storefront' ); ?></a></h5>
                                    <p class="price"><?php echo esc_html( '$80.00' ); ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php }

endif;


if (!function_exists('omega_storefront_post_format_icon')):

    // Post Format Icon.
    function omega_storefront_post_format_icon() {

        $omega_storefront_format = get_post_format(get_the_ID()) ?: 'standard';
        $omega_storefront_icon = '';
        $omega_storefront_title = '';
        if( $omega_storefront_format == 'video' ){
            $omega_storefront_icon = omega_storefront_get_theme_svg( 'video' );
            $omega_storefront_title = esc_html__('Video','omega-storefront');
        }elseif( $omega_storefront_format == 'audio' ){
            $omega_storefront_icon = omega_storefront_get_theme_svg( 'audio' );
            $omega_storefront_title = esc_html__('Audio','omega-storefront');
        }elseif( $omega_storefront_format == 'gallery' ){
            $omega_storefront_icon = omega_storefront_get_theme_svg( 'gallery' );
            $omega_storefront_title = esc_html__('Gallery','omega-storefront');
        }elseif( $omega_storefront_format == 'quote' ){
            $omega_storefront_icon = omega_storefront_get_theme_svg( 'quote' );
            $omega_storefront_title = esc_html__('Quote','omega-storefront');
        }elseif( $omega_storefront_format == 'image' ){
            $omega_storefront_icon = omega_storefront_get_theme_svg( 'image' );
            $omega_storefront_title = esc_html__('Image','omega-storefront');
        }
        
        if (!empty($omega_storefront_icon)) { ?>
            <div class="theme-post-format">
                <span class="post-format-icom"><?php echo omega_storefront_svg_escape($omega_storefront_icon); ?></span>
                <?php if( $omega_storefront_title ){ echo '<span class="post-format-label">'.esc_html( $omega_storefront_title ).'</span>'; } ?>
            </div>
        <?php }
    }

endif;

if ( ! function_exists( 'omega_storefront_svg_escape' ) ):

    /**
     * Get information about the SVG icon.
     *
     * @param string $omega_storefront_svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function omega_storefront_svg_escape( $omega_storefront_input ) {

        // Make sure that only our allowed tags and attributes are included.
        $omega_storefront_svg = wp_kses(
            $omega_storefront_input,
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
            )
        );

        if ( ! $omega_storefront_svg ) {
            return false;
        }

        return $omega_storefront_svg;

    }

endif;

if( !function_exists( 'omega_storefront_sanitize_sidebar_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function omega_storefront_sanitize_sidebar_option_meta( $omega_storefront_input ){

        $omega_storefront_metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $omega_storefront_input,$omega_storefront_metabox_options ) ){

            return $omega_storefront_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'omega_storefront_sanitize_pagination_meta' ) ) :

    // Sidebar Option Sanitize.
    function omega_storefront_sanitize_pagination_meta( $omega_storefront_input ){

        $omega_storefront_metabox_options = array( 'Center','Right','Left');
        if( in_array( $omega_storefront_input,$omega_storefront_metabox_options ) ){

            return $omega_storefront_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'omega_storefront_sanitize_menu_transform' ) ) :

    // Sidebar Option Sanitize.
    function omega_storefront_sanitize_menu_transform( $omega_storefront_input ){

        $omega_storefront_metabox_options = array( 'capitalize','uppercase','lowercase');
        if( in_array( $omega_storefront_input,$omega_storefront_metabox_options ) ){

            return $omega_storefront_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'omega_storefront_sanitize_page_content_alignment' ) ) :

    // Sidebar Option Sanitize.
    function omega_storefront_sanitize_page_content_alignment( $omega_storefront_input ){

        $omega_storefront_metabox_options = array( 'left','center','right');
        if( in_array( $omega_storefront_input,$omega_storefront_metabox_options ) ){

            return $omega_storefront_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'omega_storefront_sanitize_footer_widget_title_alignment' ) ) :

    // Footer Option Sanitize.
    function omega_storefront_sanitize_footer_widget_title_alignment( $omega_storefront_input ){

        $omega_storefront_metabox_options = array( 'left','center','right');
        if( in_array( $omega_storefront_input,$omega_storefront_metabox_options ) ){

            return $omega_storefront_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'omega_storefront_sanitize_pagination_type' ) ) :

    /**
     * Sanitize the pagination type setting.
     *
     * @param string $omega_storefront_input The input value from the Customizer.
     * @return string The sanitized value.
     */
    function omega_storefront_sanitize_pagination_type( $omega_storefront_input ) {
        // Define valid options for the pagination type.
        $omega_storefront_valid_options = array( 'numeric', 'newer_older' ); // Update valid options to include 'newer_older'

        // If the input is one of the valid options, return it. Otherwise, return the default option ('numeric').
        if ( in_array( $omega_storefront_input, $omega_storefront_valid_options, true ) ) {
            return $omega_storefront_input;
        } else {
            // Return 'numeric' as the fallback if the input is invalid.
            return 'numeric';
        }
    }

endif;


// Sanitize the enable/disable setting for pagination
if( !function_exists('omega_storefront_sanitize_enable_pagination') ) :
    function omega_storefront_sanitize_enable_pagination( $omega_storefront_input ) {
        return (bool) $omega_storefront_input;
    }
endif;