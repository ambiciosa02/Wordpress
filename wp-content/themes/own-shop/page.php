<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package own-shop
 */

get_header();
own_shop_get_breadcrumbs_content();
own_shop_before_title();
if(true===get_theme_mod( 'own_shop_enable_page_title',true)) :
own_shop_get_title();
endif;
own_shop_after_title();

?>


<div id="primary" class="<?php echo esc_attr(get_theme_mod('own_shop_header_menu_style','style1')); ?> content-area">
    <main id="main" class="site-main" role="main">
        <div class="content-inner clearfix">
            <?php
                $elementor_page = get_post_meta( get_the_ID(), '_elementor_edit_mode', true );
                if ( (bool)$elementor_page ) {
                    ?>
                        <div class="containerno clearfix">
                            <div class="clearfix"></div>
                            <?php
                                while ( have_posts() ) : the_post();
                                    if ( own_shop_is_active_woocommerce() ) :
                                        if ( is_page( 'cart' ) || is_cart() ) :
                                            get_template_part( 'template-parts/page/content', 'cart-page' );
                                        elseif ( is_page( 'checkout' ) || is_checkout() ) :
                                            get_template_part( 'template-parts/page/content', 'checkout-page' );
                                        elseif ( is_page( 'my-account' ) || is_account_page() ) :
                                            get_template_part( 'template-parts/page/content', 'myaccount-page' );
                                        else :
                                            get_template_part( 'template-parts/page/content', 'page' );
                                        endif;
                                    else:
                                        get_template_part( 'template-parts/page/content', 'page' );
                                    endif;

                                    if ( comments_open() || get_comments_number() ) :
                                        comments_template();  
                                    endif;
                                endwhile;
                            ?>
                        </div>
                    <?php  
                } else {
                    ?>
                        <div class="<?php echo esc_attr(OWN_SHOP_CONTAINER_CLASS) ?> clearfix"> <!-- Added clearfix class -->
                            <div class="row clearfix">
                                <div class="col-md-12 clearfix">
                                    <?php
                                        while ( have_posts() ) : the_post();
                                            if ( own_shop_is_active_woocommerce() ) :
                                                if ( is_page( 'cart' ) || is_cart() ) :
                                                    get_template_part( 'template-parts/page/content', 'cart-page' );
                                                elseif ( is_page( 'checkout' ) || is_checkout() ) :
                                                    get_template_part( 'template-parts/page/content', 'checkout-page' );
                                                elseif ( is_page( 'my-account' ) || is_account_page() ) :
                                                    get_template_part( 'template-parts/page/content', 'myaccount-page' );
                                                else :
                                                    get_template_part( 'template-parts/page/content', 'page' );
                                                endif;
                                            else:
                                                get_template_part( 'template-parts/page/content', 'page' );
                                            endif;

                                            if ( comments_open() || get_comments_number() ) :
                                                comments_template();  
                                            endif;
                                        endwhile;
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>     
    </main>
</div>

<?php
get_footer();