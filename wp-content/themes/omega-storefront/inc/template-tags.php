<?php
/**
 * Custom Functions
 * @package Omega Storefront
 * @since 1.0.0
 */

if( !function_exists('omega_storefront_site_logo') ):

    /**
     * Logo & Description
     */
    /**
     * Displays the site logo, either text or image.
     *
     * @param array $omega_storefront_args Arguments for displaying the site logo either as an image or text.
     * @param boolean $omega_storefront_echo Echo or return the HTML.
     *
     * @return string $omega_storefront_html Compiled HTML based on our arguments.
     */
    function omega_storefront_site_logo( $omega_storefront_args = array(), $omega_storefront_echo = true ){
        $omega_storefront_logo = get_custom_logo();
        $omega_storefront_site_title = get_bloginfo('name');
        $omega_storefront_contents = '';
        $omega_storefront_classname = '';
        $omega_storefront_defaults = array(
            'logo' => '%1$s<span class="screen-reader-text">%2$s</span>',
            'logo_class' => 'site-logo site-branding',
            'title' => '<a href="%1$s" class="custom-logo-name">%2$s</a>',
            'title_class' => 'site-title',
            'home_wrap' => '<h1 class="%1$s">%2$s</h1>',
            'single_wrap' => '<div class="%1$s">%2$s</div>',
            'condition' => (is_front_page() || is_home()) && !is_page(),
        );
        $omega_storefront_args = wp_parse_args($omega_storefront_args, $omega_storefront_defaults);
        /**
         * Filters the arguments for `omega_storefront_site_logo()`.
         *
         * @param array $omega_storefront_args Parsed arguments.
         * @param array $omega_storefront_defaults Function's default arguments.
         */
        $omega_storefront_args = apply_filters('omega_storefront_site_logo_args', $omega_storefront_args, $omega_storefront_defaults);
        if ( has_custom_logo() ) {
            $omega_storefront_contents = sprintf($omega_storefront_args['logo'], $omega_storefront_logo, esc_html($omega_storefront_site_title));
            $omega_storefront_contents .= sprintf($omega_storefront_args['title'], esc_url( get_home_url(null, '/') ), esc_html($omega_storefront_site_title));
            $omega_storefront_classname = $omega_storefront_args['logo_class'];
        } else {
            $omega_storefront_contents = sprintf($omega_storefront_args['title'], esc_url( get_home_url(null, '/') ), esc_html($omega_storefront_site_title));
            $omega_storefront_classname = $omega_storefront_args['title_class'];
        }
        $omega_storefront_wrap = $omega_storefront_args['condition'] ? 'home_wrap' : 'single_wrap';
        // $omega_storefront_wrap = 'home_wrap';
        $omega_storefront_html = sprintf($omega_storefront_args[$omega_storefront_wrap], $omega_storefront_classname, $omega_storefront_contents);
        /**
         * Filters the arguments for `omega_storefront_site_logo()`.
         *
         * @param string $omega_storefront_html Compiled html based on our arguments.
         * @param array $omega_storefront_args Parsed arguments.
         * @param string $omega_storefront_classname Class name based on current view, home or single.
         * @param string $omega_storefront_contents HTML for site title or logo.
         */
        $omega_storefront_html = apply_filters('omega_storefront_site_logo', $omega_storefront_html, $omega_storefront_args, $omega_storefront_classname, $omega_storefront_contents);
        if (!$omega_storefront_echo) {
            return $omega_storefront_html;
        }
        echo $omega_storefront_html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

    }

endif;

if( !function_exists('omega_storefront_site_description') ):

    /**
     * Displays the site description.
     *
     * @param boolean $omega_storefront_echo Echo or return the html.
     *
     * @return string $omega_storefront_html The HTML to display.
     */
    function omega_storefront_site_description($omega_storefront_echo = true){

        if ( get_theme_mod('omega_storefront_display_header_text', false) == true ) :
        $omega_storefront_description = get_bloginfo('description');
        if (!$omega_storefront_description) {
            return;
        }
        $omega_storefront_wrapper = '<div class="site-description"><span>%s</span></div><!-- .site-description -->';
        $omega_storefront_html = sprintf($omega_storefront_wrapper, esc_html($omega_storefront_description));
        /**
         * Filters the html for the site description.
         *
         * @param string $omega_storefront_html The HTML to display.
         * @param string $omega_storefront_description Site description via `bloginfo()`.
         * @param string $omega_storefront_wrapper The format used in case you want to reuse it in a `sprintf()`.
         * @since 1.0.0
         *
         */
        $omega_storefront_html = apply_filters('omega_storefront_site_description', $omega_storefront_html, $omega_storefront_description, $omega_storefront_wrapper);
        if (!$omega_storefront_echo) {
            return $omega_storefront_html;
        }
        echo $omega_storefront_html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        endif;
    }

endif;

if( !function_exists('omega_storefront_posted_on') ):

    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function omega_storefront_posted_on( $omega_storefront_icon = true, $omega_storefront_animation_class = '' ){

        $omega_storefront_default = omega_storefront_get_default_theme_options();
        $omega_storefront_post_date = absint( get_theme_mod( 'omega_storefront_post_date',$omega_storefront_default['omega_storefront_post_date'] ) );

        if( $omega_storefront_post_date ){

            $omega_storefront_time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
            if (get_the_time('U') !== get_the_modified_time('U')) {
                $omega_storefront_time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
            }

            $omega_storefront_time_string = sprintf($omega_storefront_time_string,
                esc_attr(get_the_date(DATE_W3C)),
                esc_html(get_the_date()),
                esc_attr(get_the_modified_date(DATE_W3C)),
                esc_html(get_the_modified_date())
            );

            $omega_storefront_year = get_the_date('Y');
            $omega_storefront_month = get_the_date('m');
            $omega_storefront_day = get_the_date('d');
            $omega_storefront_link = get_day_link($omega_storefront_year, $omega_storefront_month, $omega_storefront_day);

            $omega_storefront_posted_on = '<a href="' . esc_url($omega_storefront_link) . '" rel="bookmark">' . $omega_storefront_time_string . '</a>';

            echo '<div class="entry-meta-item entry-meta-date">';
            echo '<div class="entry-meta-wrapper '.esc_attr( $omega_storefront_animation_class ).'">';

            if( $omega_storefront_icon ){

                echo '<span class="entry-meta-icon calendar-icon"> ';
                omega_storefront_the_theme_svg('calendar');
                echo '</span>';

            }

            echo '<span class="posted-on">' . $omega_storefront_posted_on . '</span>'; // WPCS: XSS OK.
            echo '</div>';
            echo '</div>';

        }

    }

endif;

if( !function_exists('omega_storefront_posted_by') ) :

    /**
     * Prints HTML with meta information for the current author.
     */
    function omega_storefront_posted_by( $omega_storefront_icon = true, $omega_storefront_animation_class = '' ){   

        $omega_storefront_default = omega_storefront_get_default_theme_options();
        $omega_storefront_post_author = absint( get_theme_mod( 'omega_storefront_post_author',$omega_storefront_default['omega_storefront_post_author'] ) );

        if( $omega_storefront_post_author ){

            echo '<div class="entry-meta-item entry-meta-author">';
            echo '<div class="entry-meta-wrapper '.esc_attr( $omega_storefront_animation_class ).'">';

            if( $omega_storefront_icon ){
            
                echo '<span class="entry-meta-icon author-icon"> ';
                omega_storefront_the_theme_svg('user');
                echo '</span>';
                
            }

            $omega_storefront_byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta('ID') ) ) . '">' . esc_html(get_the_author()) . '</a></span>';
            echo '<span class="byline"> ' . $omega_storefront_byline . '</span>'; // WPCS: XSS OK.
            echo '</div>';
            echo '</div>';

        }

    }

endif;


if( !function_exists('omega_storefront_posted_by_avatar') ) :

    /**
     * Prints HTML with meta information for the current author.
     */
    function omega_storefront_posted_by_avatar( $omega_storefront_date = false ){

        $omega_storefront_default = omega_storefront_get_default_theme_options();
        $omega_storefront_post_author = absint( get_theme_mod( 'omega_storefront_post_author',$omega_storefront_default['omega_storefront_post_author'] ) );

        if( $omega_storefront_post_author ){



            echo '<div class="entry-meta-left">';
            echo '<div class="entry-meta-item entry-meta-avatar">';
            echo wp_kses_post( get_avatar( get_the_author_meta( 'ID' ) ) );
            echo '</div>';
            echo '</div>';

            echo '<div class="entry-meta-right">';

            $omega_storefront_byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta('ID') ) ) . '">' . esc_html(get_the_author()) . '</a></span>';

            echo '<div class="entry-meta-item entry-meta-byline"> ' . $omega_storefront_byline . '</div>';

            if( $omega_storefront_date ){
                omega_storefront_posted_on($omega_storefront_icon = false);
            }
            echo '</div>';

        }

    }

endif;

if( !function_exists('omega_storefront_entry_footer') ):

    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function omega_storefront_entry_footer( $omega_storefront_cats = true, $omega_storefront_tags = true, $omega_storefront_edits = true){   

        $omega_storefront_default = omega_storefront_get_default_theme_options();
        $omega_storefront_post_category = absint( get_theme_mod( 'omega_storefront_post_category',$omega_storefront_default['omega_storefront_post_category'] ) );
        $omega_storefront_post_tags = absint( get_theme_mod( 'omega_storefront_post_tags',$omega_storefront_default['omega_storefront_post_tags'] ) );

        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {

            if( $omega_storefront_cats && $omega_storefront_post_category ){

                /* translators: used between list items, there is a space after the comma */
                $omega_storefront_categories = get_the_category();
                if ($omega_storefront_categories) {
                    echo '<div class="entry-meta-item entry-meta-categories">';
                    echo '<div class="entry-meta-wrapper">';
                
                    /* translators: 1: list of categories. */
                    echo '<span class="cat-links">';
                    foreach( $omega_storefront_categories as $omega_storefront_category ){

                        $omega_storefront_cat_name = $omega_storefront_category->name;
                        $omega_storefront_cat_slug = $omega_storefront_category->slug;
                        $omega_storefront_cat_url = get_category_link( $omega_storefront_category->term_id );
                        ?>

                        <a class="twp_cat_<?php echo esc_attr( $omega_storefront_cat_slug ); ?>" href="<?php echo esc_url( $omega_storefront_cat_url ); ?>" rel="category tag"><?php echo esc_html( $omega_storefront_cat_name ); ?></a>

                    <?php }
                    echo '</span>'; // WPCS: XSS OK.
                    echo '</div>';
                    echo '</div>';
                }

            }

            if( $omega_storefront_tags && $omega_storefront_post_tags ){
                /* translators: used between list items, there is a space after the comma */
                $omega_storefront_tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'omega-storefront'));
                if( $omega_storefront_tags_list ){

                    echo '<div class="entry-meta-item entry-meta-tags">';
                    echo '<div class="entry-meta-wrapper">';

                    /* translators: 1: list of tags. */
                    echo '<span class="tags-links">';
                    echo wp_kses_post($omega_storefront_tags_list) . '</span>'; // WPCS: XSS OK.
                    echo '</div>';
                    echo '</div>';

                }

            }

            if( $omega_storefront_edits ){

                edit_post_link(
                    sprintf(
                        wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                            __('Edit <span class="screen-reader-text">%s</span>', 'omega-storefront'),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                    ),
                    '<span class="edit-link">',
                    '</span>'
                );
            }

        }
    }

endif;

if ( !function_exists('omega_storefront_post_thumbnail') ) :

    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views. If no post thumbnail is available, a default image is used.
     */
    function omega_storefront_post_thumbnail($omega_storefront_image_size = 'full'){

        if( post_password_required() || is_attachment() ){ return; }

        // Set the URL for your default image here (e.g. from your theme directory)
        $omega_storefront_default_image = get_template_directory_uri() . '/assets/images/one.png'; // Update this path accordingly

        if ( is_singular() ) : ?>
                <?php the_post_thumbnail(); ?>
        <?php else : ?>

            <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php

                $omega_storefront_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), $omega_storefront_image_size);
                $omega_storefront_featured_image = isset($omega_storefront_featured_image[0]) ? $omega_storefront_featured_image[0] : '';

                // Check if there's a featured image
                if ($omega_storefront_featured_image != '' ) {
                    // Display the featured image
                    the_post_thumbnail($omega_storefront_image_size, array(
                        'alt' => the_title_attribute(array(
                            'echo' => false,
                        )),
                    ));
                } else {
                    // No featured image, display the default image
                    echo '<img src="' . esc_url($omega_storefront_default_image) . '" alt="' . the_title_attribute(array('echo' => false)) . '" />';
                }
                ?>
            </a>

        <?php
        endif; // End is_singular().
    }

endif;

if( !function_exists('omega_storefront_is_comment_by_post_author') ):

    /**
     * Comments
     */
    /**
     * Check if the specified comment is written by the author of the post commented on.
     *
     * @param object $omega_storefront_comment Comment data.
     *
     * @return bool
     */
    function omega_storefront_is_comment_by_post_author($omega_storefront_comment = null){

        if (is_object($omega_storefront_comment) && $omega_storefront_comment->user_id > 0) {
            $omega_storefront_user = get_userdata($omega_storefront_comment->user_id);
            $omega_storefront_post = get_post($omega_storefront_comment->comment_post_ID);
            if (!empty($omega_storefront_user) && !empty($omega_storefront_post)) {
                return $omega_storefront_comment->user_id === $omega_storefront_post->post_author;
            }
        }
        return false;
    }

endif;

if( !function_exists('omega_storefront_breadcrumb') ) :

    /**
     * Omega Storefront Breadcrumb
     */
    function omega_storefront_breadcrumb($omega_storefront_comment = null){

        echo '<div class="entry-breadcrumb">';
        breadcrumb_trail();
        echo '</div>';

    }

endif;