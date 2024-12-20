<?php
/**
* Body Classes.
* @package Omega Storefront
*/
 
 if (!function_exists('omega_storefront_body_classes')) :

    function omega_storefront_body_classes($omega_storefront_classes) {
        $omega_storefront_default = omega_storefront_get_default_theme_options();
        global $post;
    
        // Adds a class of hfeed to non-singular pages.
        if (!is_singular()) {
            $omega_storefront_classes[] = 'hfeed';
        }
    
        // Adds a class of no-sidebar when there is no sidebar present.
        if (!is_active_sidebar('sidebar-1')) {
            $omega_storefront_classes[] = 'no-sidebar';
        }
    
        $omega_storefront_global_sidebar_layout = esc_html(get_theme_mod('omega_storefront_global_sidebar_layout', $omega_storefront_default['omega_storefront_global_sidebar_layout']));
        $omega_storefront_page_sidebar_layout = esc_html(get_theme_mod('omega_storefront_page_sidebar_layout', $omega_storefront_global_sidebar_layout));
        $omega_storefront_post_sidebar_layout = esc_html(get_theme_mod('omega_storefront_post_sidebar_layout', $omega_storefront_global_sidebar_layout));
    
        if (is_page()) {
            $omega_storefront_classes[] = $omega_storefront_page_sidebar_layout;
        } elseif (is_single()) {
            $omega_storefront_classes[] = $omega_storefront_post_sidebar_layout;
        } else {
            $omega_storefront_classes[] = $omega_storefront_global_sidebar_layout;
        }
    
        return $omega_storefront_classes;
    }
    
endif;

add_filter('body_class', 'omega_storefront_body_classes');