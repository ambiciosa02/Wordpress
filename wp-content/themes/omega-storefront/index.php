<?php
/**
 * The main template file
 * @package Omega Storefront
 * @since 1.0.0
 */

get_header();
$omega_storefront_default = omega_storefront_get_default_theme_options();
$omega_storefront_global_sidebar_layout = esc_html( get_theme_mod( 'omega_storefront_global_sidebar_layout',$omega_storefront_default['omega_storefront_global_sidebar_layout'] ) );
$omega_storefront_sidebar_column_class = 'column-order-2';
if ($omega_storefront_global_sidebar_layout == 'right-sidebar') {
    $omega_storefront_sidebar_column_class = 'column-order-1';
}

global $omega_storefront_archive_first_class; ?>
    <div class="archive-main-block">
        <div class="wrapper">
            <div class="column-row">

                <div id="primary" class="content-area <?php echo esc_attr($omega_storefront_sidebar_column_class) ; ?>">
                    <main id="site-content" role="main">

                        <?php

                        if( !is_front_page() ) {
                            omega_storefront_breadcrumb();
                        }

                        if( have_posts() ): ?>

                            <div class="article-wraper article-wraper-archive">
                                <?php
                                while( have_posts() ):
                                    the_post();

                                    get_template_part( 'template-parts/content', get_post_format() );

                                endwhile; ?>
                            </div>

                            <?php
                            if( is_search() ){
                                the_posts_pagination();
                            }else{
                                do_action('omega_storefront_posts_pagination');
                            }

                        else :

                            get_template_part('template-parts/content', 'none');

                        endif; ?>
                    </main>
                </div>
                <?php get_sidebar();?>
            </div>
        </div>
    </div>
<?php
get_footer();