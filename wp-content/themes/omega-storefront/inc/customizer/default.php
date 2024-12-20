<?php
/**
 * Default Values.
 *
 * @package Omega Storefront
 */

if ( ! function_exists( 'omega_storefront_get_default_theme_options' ) ) :
	function omega_storefront_get_default_theme_options() {

		$omega_storefront_defaults = array();
		
        // Options.
        $omega_storefront_defaults['logo_width_range']                                              = 300;
	$omega_storefront_defaults['omega_storefront_global_sidebar_layout']	               = 'right-sidebar';
        $omega_storefront_defaults['omega_storefront_header_layout_phone_number']                = esc_html__( '+(0321)7528659', 'omega-storefront' );
        $omega_storefront_defaults['omega_storefront_header_layout_email_id']                           = esc_html__( 'support@example.com', 'omega-storefront' );
        $omega_storefront_defaults['omega_storefront_header_layout_text']                               = esc_html__( 'Express Deilivery and free returns within 30 days', 'omega-storefront' );
        $omega_storefront_defaults['omega_storefront_header_layout_enable_translator']                  = 1;
        $omega_storefront_defaults['omega_storefront_header_layout_wishlist']                           = esc_url( '#', 'omega-storefront' );;
        $omega_storefront_defaults['omega_storefront_theme_pagination_options_alignment']                         = 'Center';
        $omega_storefront_defaults['omega_storefront_theme_breadcrumb_options_alignment']                         = 'Left';
        $omega_storefront_defaults['omega_storefront_pagination_layout']                                = 'numeric';
        $omega_storefront_defaults['omega_storefront_menu_text_transform']                              = 'capitalize';
        $omega_storefront_defaults['omega_storefront_single_page_content_alignment']                    = 'left';
        $omega_storefront_defaults['omega_storefront_footer_column_layout'] 		                = 3;
        $omega_storefront_defaults['omega_storefront_menu_font_size']                                   = 14;
        $omega_storefront_defaults['omega_storefront_copyright_font_size']                              = 16;
        $omega_storefront_defaults['omega_storefront_breadcrumb_font_size']                             = 16;
        $omega_storefront_defaults['omega_storefront_theme_loader']                  = 0;
        $omega_storefront_defaults['omega_storefront_theme_breadcrumb_enable']                 = 1;
        $omega_storefront_defaults['omega_storefront_single_post_content_alignment']                 = 'left';
        $omega_storefront_defaults['omega_storefront_excerpt_limit']                                    = 10;
        $omega_storefront_defaults['omega_storefront_per_columns']                                      = 3;
        $omega_storefront_defaults['omega_storefront_product_per_page']                                 = 9;
        $omega_storefront_defaults['omega_storefront_footer_copyright_text'] 		       = esc_html__( 'All rights reserved.', 'omega-storefront' );
        $omega_storefront_defaults['twp_navigation_type']              			       = 'theme-normal-navigation';
        $omega_storefront_defaults['omega_storefront_post_author']                	       = 1;
        $omega_storefront_defaults['omega_storefront_post_date']                		       = 1;
        $omega_storefront_defaults['omega_storefront_post_category']                	       = 1;
        $omega_storefront_defaults['omega_storefront_post_tags']                		       = 1;
        $omega_storefront_defaults['omega_storefront_floating_next_previous_nav']                = 1;
        $omega_storefront_defaults['omega_storefront_header_banner']               	       = 1;
        $omega_storefront_defaults['omega_storefront_category_section']                          = 0;
        $omega_storefront_defaults['omega_storefront_courses_category_section']                  = 0;
        $omega_storefront_defaults['omega_storefront_sticky']                                    = 0;
        $omega_storefront_defaults['omega_storefront_background_color']                          = '#fff';
        $omega_storefront_defaults['omega_storefront_product_section_title']                     = esc_html__( 'Best Sellers', 'omega-storefront' );
        $omega_storefront_defaults['omega_storefront_product_section_content']                   = esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting ', 'omega-storefront' );
        $omega_storefront_defaults['omega_storefront_slider_section_title']                      = esc_html__( 'UP TO 30% OFF TODAY', 'omega-storefront' );
        $omega_storefront_defaults['omega_storefront_display_footer']                         = 0;
        $omega_storefront_defaults['omega_storefront_footer_widget_title_alignment']                 = 'left'; 
        $omega_storefront_defaults['omega_storefront_show_hide_related_product']              = 1;
        $omega_storefront_defaults['omega_storefront_display_archive_post_image']             = 1;
        
        $omega_storefront_defaults['omega_storefront_enable_to_the_top']                      = 1;
        $omega_storefront_defaults['omega_storefront_to_the_top_text']                      = esc_html__( 'To The Top', 'omega-storefront' );

        $omega_storefront_defaults['omega_storefront_global_color']                                   = '#5482F7';
        $omega_storefront_defaults['omega_storefront_display_archive_post_category']          = 1;
        $omega_storefront_defaults['omega_storefront_display_archive_post_sticky_post']       = 1;
        $omega_storefront_defaults['omega_storefront_display_archive_post_title']             = 1;
        $omega_storefront_defaults['omega_storefront_display_archive_post_content']           = 1;
        $omega_storefront_defaults['omega_storefront_display_archive_post_button']            = 1;

        // Social Icon
        $omega_storefront_defaults['omega_storefront_header_layout_facebook_link']              = esc_url( '#', 'omega-storefront' );
        $omega_storefront_defaults['omega_storefront_header_layout_twitter_link']               = esc_url( '#', 'omega-storefront' );
        $omega_storefront_defaults['omega_storefront_header_layout_pintrest_link']              = esc_url( '#', 'omega-storefront' );
        $omega_storefront_defaults['omega_storefront_header_layout_instagram_link']             = esc_url( '#', 'omega-storefront' );
        $omega_storefront_defaults['omega_storefront_header_layout_youtube_link']               = esc_url( '#', 'omega-storefront' );

	// Pass through filter.
	$omega_storefront_defaults = apply_filters( 'omega_storefront_filter_default_theme_options', $omega_storefront_defaults );

		return $omega_storefront_defaults;
	}
endif;