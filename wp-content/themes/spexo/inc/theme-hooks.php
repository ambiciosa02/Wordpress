<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Semantic <header> hooks
 *
 * $tmpcoder_supports[] = 'header';
 */
function tmpcoder_header_before() {
	do_action( 'tmpcoder_header_before' );
}

/**
 * Site Header
 */
function tmpcoder_header() {
	
    do_action( 'tmpcoder_header' );
}

/**
 * Site Archive
 */

function tmpcoder_archive() {
    
    do_action( 'tmpcoder_archive' );
}

/**
 * Site Search Result Page
 */

function tmpcoder_search_result_page() {
    
    do_action( 'tmpcoder_search_result_page' );
}

/**
 * Site Single Post
 */

function tmpcoder_single_post() {
    
    do_action( 'tmpcoder_single_post' );
}

/**
 * Header After
 */
function tmpcoder_header_after() {
	do_action( 'tmpcoder_header_after' );
}


/**
 * Semantic <footer> hooks
 *
 * $tmpcoder_supports[] = 'footer';
 */

function tmpcoder_footer() {
	do_action( 'tmpcoder_footer' );
}

/**
 * Footer before
 */
function tmpcoder_footer_before() {
	do_action( 'tmpcoder_footer_before' );
}

/**
 * Footer after
 */
function tmpcoder_footer_after() {
	do_action( 'tmpcoder_footer_after' );
}

/**
 * Function to get site Header
 */
if ( ! function_exists( 'tmpcoder_header_markup' ) ) {

	/**
	 * Site Header - <header>
	 *
	 * @since 1.0.0
	 */
	function tmpcoder_header_markup() {

		do_action( 'tmpcoder_header_markup_before' );

        $tmpcoder_logo_image = Tmpcoder_Site_Settings::tmpcoder_get('tmpcoder_logo_image');
        $site_logo = ( Tmpcoder_Site_Settings::tmpcoder_has('tmpcoder_logo_image') ) ? $tmpcoder_logo_image['url'] : '';
		
		$logo_text = ( Tmpcoder_Site_Settings::tmpcoder_has('tmpcoder_logo_text') ) ? Tmpcoder_Site_Settings::tmpcoder_get('tmpcoder_logo_text') : '';

        $tagline = get_bloginfo( 'description', 'display' );

		?>
        
		<header id="site-header" class="tmpcoder-site-header">
            <div class="site-header">
                <div class="site-branding">
                    <a href="<?php echo esc_url( home_url()); ?>">
                        <?php 

                            if( class_exists( 'Redux_Framework_Plugin', false )){

                                if(!empty($site_logo)){
                                    echo '<img class="transition" src="' . esc_url( $site_logo ) . '" alt="' . esc_attr( get_bloginfo('name') ) . '" />';

                                } else {
                                    echo '<h1 class="transition">'. esc_html($logo_text).'</h1>';
                                }
                            }
                            else
                            {
                                echo '<h1 class="transition">' . esc_html( get_bloginfo('name') ) . '</h1>';
                            }

                            if ( $tagline ) : ?>

                                <p class="site-description"><?php esc_html($tagline); ?></p>

                                <?php
                            endif; 
                        ?>
                    </a>
                </div>

                <nav class="site-navigation">
                    <div class="wp-mobile-toggle-wrap">
                        <div class="wp-mobile-toggle">
                            <span class="wp-mobile-toggle-line"></span>
                            <span class="wp-mobile-toggle-line"></span>
                            <span class="wp-mobile-toggle-line"></span>
                        </div>
                    </div>
                    <?php
                        wp_nav_menu(
                            array(
                                'menu_class'        => 'menu wp-default-primary-menu',
                                'container'         => false,
                                'echo'              => true,
                                'theme_location'    => 'primary',
                                'menu_id'           => 'primary-menu',
                                'link_before'       => '<span>',
                                'link_after'        => '</span>',
                            )
                        );
                    ?>
                </nav>
            </div>
        </header>
		<?php

		do_action( 'tmpcoder_header_markup_after' );
	}
}

add_action( 'tmpcoder_header', 'tmpcoder_header_markup' );

/**
 * Function to get site Footer
*/

if ( ! function_exists( 'tmpcoder_footer_markup' ) ) {

	/**
	 * Site Footer - <footer>
	 *
	 * @since 1.0.0
	 */

	function tmpcoder_footer_markup() {
        ?>

        <footer id="site-footer" class="site-footer">
            <div class="footer-inner">
                <div class="footer-copyright-text">
                    <?php

                        $site_title = get_bloginfo('name');
                        $current_year = gmdate('Y');

                        if( class_exists( 'Redux_Framework_Plugin', false )) {
                            
                            if ( Tmpcoder_Site_Settings::tmpcoder_has('tmpcoder_footer_copyright_text') ) {

                                $content = Tmpcoder_Site_Settings::tmpcoder_get('tmpcoder_footer_copyright_text');
                                
                                $content = str_replace( '[COPYRIGHT]', '&copy;', $content );
                                $content = str_replace( '[CURRENT_YEAR]', $current_year, $content );
                                $content = str_replace( '[SITE_TITLE]', $site_title, $content );
                                echo wp_kses_post($content);
                            }
                            else
                            { 
                                $content = sprintf(
                                    /* translators: %1$s is the URL, %2$s is the theme name */
                                    'Copyright [COPYRIGHT] [CURRENT_YEAR] [SITE_TITLE] | Powered by <a href="%1$s" target="_blank" rel="noopener nofollow">%2$s</a>', esc_url('https://spexoaddons.com/'), esc_html('Spexo WordPress Theme') );

                                $content = str_replace( '[COPYRIGHT]', '&copy;', $content );
                                $content = str_replace( '[CURRENT_YEAR]', $current_year, $content );
                                $content = str_replace( '[SITE_TITLE]', $site_title, $content );

                                ?>
                                <p><?php echo wp_kses_post($content); ?></p>
                                <?php 
                            }
                        }

                        else { 

                            $content = sprintf(
                                /* translators: %1$s is the URL, %2$s is the theme name */
                                'Copyright [COPYRIGHT] [CURRENT_YEAR] [SITE_TITLE] | Powered by <a href="%1$s" target="_blank" rel="noopener nofollow">%2$s</a>', esc_url('https://spexoaddons.com/'), esc_html('Spexo WordPress Theme') );

                            $content = str_replace( '[COPYRIGHT]', '&copy;', $content );
                            $content = str_replace( '[CURRENT_YEAR]', $current_year, $content );
                            $content = str_replace( '[SITE_TITLE]', $site_title, $content );

                            ?>
                            <p><?php echo wp_kses_post($content); ?></p>
                            <?php 
                        }
                    ?>
                </div>
                <nav class="site-navigation">
                    <?php
                        wp_nav_menu(
                            array(
                                'depth'				=> 1,
                                'container'         => false,
                                'echo'              => true,
                                'theme_location'	=> 'footer_menu',
                                'menu_id'        	=> 'footer-nav-menu',
                                'menu_class'	    => 'menu',
                            )
                        );
                    ?>
                </nav>
            </div>
        </footer>
		<?php
	}
}

add_action( 'tmpcoder_footer', 'tmpcoder_footer_markup' );

if (!function_exists('tmpcoder_archive_markup')) {
    
    function tmpcoder_archive_markup()
    {
        ?>
        <main id="content" class="site-main">

            <?php if ( apply_filters( 'tmpcoder_page_title', true ) ) : ?>
                <header class="page-header">
                    <?php
                    the_archive_title( '<h1 class="entry-title">', '</h1>' );
                    the_archive_description( '<p class="archive-description">', '</p>' );
                    ?>
                </header>
            <?php endif; ?>

            <?php if ( have_posts() ) :

            ?>

            <div class="page-content">
                
                <div class="blog-part">
                
                <?php
                /* Start the Loop */
                while ( have_posts() ) :
                    the_post();

                    /*
                    * Include the Post-Type-specific template for the content.
                    * If you want to override this in a child theme, then include a file
                    * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                    */

                    get_template_part( 'template-parts/content', get_post_type() );

                endwhile;

                global $wp_query; // use wp prebuild variable

                if ( $wp_query->max_num_pages > 1 ) :
                    $big = 999999999; // need an unlikely integer
                    echo '<div class="blog-list-pagination">';
                    echo wp_kses_post( paginate_links( array(
                        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format' => '?paged=%#%',
                        'current' => max( 1, get_query_var('paged') ),
                        'total' => $wp_query->max_num_pages,
                        'type' => 'list',
                        'prev_text' => '<i class="wp-previous-post fas fa-angle-left" aria-hidden="true"></i>',
                        'next_text' => '<i class="wp-next-post fas fa-angle-right" aria-hidden="true"></i>',
                        ) ) );
                    echo '</div>';
                    ?>

                <?php endif; ?> 

                </div>
            </div>
                
            <?php

            else :

                get_template_part( 'template-parts/content', 'none' );

            endif;
        ?>
        </main>
        <?php 

    }
}

add_action( 'tmpcoder_archive', 'tmpcoder_archive_markup' );

if (!function_exists('tmpcoder_single_post_markup')) {
    
    function tmpcoder_single_post_markup(){

        ?>

        <main id="content" <?php post_class( 'site-main' ); ?>>
        
            <?php

            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content-single', get_post_type() );
                
            endwhile; // End of the loop.

        ?> 

        </main>

        <?php
    }    
}

add_action( 'tmpcoder_single_post', 'tmpcoder_single_post_markup' );

if ( !function_exists('tmpcoder_search_result_page_markup')) {
    
    function tmpcoder_search_result_page_markup(){
        
        ?>

        <main id="content" class="site-main">   
        
            <?php if ( apply_filters( 'tmpcoder_page_title', true ) ) : ?>
                <header class="page-header">
                    <h1 class="entry-title">
                        <?php echo esc_html__( 'Search results for: ','spexo' ); ?>
                        <span><?php echo get_search_query(); ?></span>
                    </h1>
                </header>
            <?php endif; ?>
            <div class="page-content">
                
                <div class="blog-part">
                
                <?php if ( have_posts() ) : ?>

                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post();

                        /**
                         * Run the loop for the search to output the results.
                         * If you want to overload this in a child theme then include a file
                         * called content-search.php and that will be used instead.
                         */
                        get_template_part( 'template-parts/content', 'search' );

                    endwhile;
                    
                    tmpcoder_posts_pagination();

                    ?>

                    <?php
                else :

                    get_template_part( 'template-parts/content', 'none' );

                endif;
                ?>
                </div>
                <div class="sidebar-part">
                    <div class="blog-sidebar-default"><?php get_sidebar(); ?></div>
                </div>
            </div>
        </main>

        <?php
    }        
}    

add_action( 'tmpcoder_search_result_page', 'tmpcoder_search_result_page_markup' );