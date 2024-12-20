<?php
/**
 *
 * Pagination Functions
 *
 * @package Omega Storefront
 */

/**
 * Pagination for archive.
 */
function omega_storefront_render_posts_pagination() {
    // Get the setting to check if pagination is enabled
    $omega_storefront_is_pagination_enabled = get_theme_mod( 'omega_storefront_enable_pagination', true );

    // Check if pagination is enabled
    if ( $omega_storefront_is_pagination_enabled ) {
        // Get the selected pagination type from the Customizer
        $omega_storefront_pagination_type = get_theme_mod( 'omega_storefront_theme_pagination_type', 'numeric' );

        // Check if the pagination type is "newer_older" (Previous/Next) or "numeric"
        if ( 'newer_older' === $omega_storefront_pagination_type ) :
            // Display "Newer/Older" pagination (Previous/Next navigation)
            the_posts_navigation(
                array(
                    'prev_text' => __( '&laquo; Newer', 'omega-storefront' ),  // Change the label for "previous"
                    'next_text' => __( 'Older &raquo;', 'omega-storefront' ),  // Change the label for "next"
                    'screen_reader_text' => __( 'Posts navigation', 'omega-storefront' ),
                )
            );
        else :
            // Display numeric pagination (Page numbers)
            the_posts_pagination(
                array(
                    'prev_text' => __( '&laquo; Previous', 'omega-storefront' ),
                    'next_text' => __( 'Next &raquo;', 'omega-storefront' ),
                    'type'      => 'list', // Display as <ul> <li> tags
                    'screen_reader_text' => __( 'Posts navigation', 'omega-storefront' ),
                )
            );
        endif;
    }
}
add_action( 'omega_storefront_posts_pagination', 'omega_storefront_render_posts_pagination', 10 );