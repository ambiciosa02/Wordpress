<?php
/**
 * Custom page walker for this theme.
 *
 * @package Omega Storefront
 */

if (!class_exists('Omega_Storefront_Walker_Page')) {
    /**
     * CUSTOM PAGE WALKER
     * A custom walker for pages.
     */
    class Omega_Storefront_Walker_Page extends Walker_Page
    {

        /**
         * Outputs the beginning of the current element in the tree.
         *
         * @param string $omega_storefront_output Used to append additional content. Passed by reference.
         * @param WP_Post $page Page data object.
         * @param int $omega_storefront_depth Optional. Depth of page. Used for padding. Default 0.
         * @param array $omega_storefront_args Optional. Array of arguments. Default empty array.
         * @param int $current_page Optional. Page ID. Default 0.
         * @since 2.1.0
         *
         * @see Walker::start_el()
         */

        public function start_lvl( &$omega_storefront_output, $omega_storefront_depth = 0, $omega_storefront_args = array() ) {
            $omega_storefront_indent  = str_repeat( "\t", $omega_storefront_depth );
            $omega_storefront_output .= "$omega_storefront_indent<ul class='sub-menu'>\n";
        }

        public function start_el(&$omega_storefront_output, $page, $omega_storefront_depth = 0, $omega_storefront_args = array(), $current_page = 0)
        {

            if (isset($omega_storefront_args['item_spacing']) && 'preserve' === $omega_storefront_args['item_spacing']) {
                $t = "\t";
                $n = "\n";
            } else {
                $t = '';
                $n = '';
            }
            if ($omega_storefront_depth) {
                $omega_storefront_indent = str_repeat($t, $omega_storefront_depth);
            } else {
                $omega_storefront_indent = '';
            }

            $omega_storefront_css_class = array('page_item', 'page-item-' . $page->ID);

            if (isset($omega_storefront_args['pages_with_children'][$page->ID])) {
                $omega_storefront_css_class[] = 'page_item_has_children';
            }

            if (!empty($current_page)) {
                $_current_page = get_post($current_page);
                if ($_current_page && in_array($page->ID, $_current_page->ancestors, true)) {
                    $omega_storefront_css_class[] = 'current_page_ancestor';
                }
                if ($page->ID === $current_page) {
                    $omega_storefront_css_class[] = 'current_page_item';
                } elseif ($_current_page && $page->ID === $_current_page->post_parent) {
                    $omega_storefront_css_class[] = 'current_page_parent';
                }
            } elseif (get_option('page_for_posts') === $page->ID) {
                $omega_storefront_css_class[] = 'current_page_parent';
            }

            /** This filter is documented in wp-includes/class-walker-page.php */
            $omega_storefront_css_classes = implode(' ', apply_filters('page_css_class', $omega_storefront_css_class, $page, $omega_storefront_depth, $omega_storefront_args, $current_page));
            $omega_storefront_css_classes = $omega_storefront_css_classes ? ' class="' . esc_attr($omega_storefront_css_classes) . '"' : '';

            if ('' === $page->post_title) {
                /* translators: %d: ID of a post. */
                $page->post_title = sprintf(__('#%d (no title)', 'omega-storefront'), $page->ID);
            }

            $omega_storefront_args['link_before'] = empty($omega_storefront_args['link_before']) ? '' : $omega_storefront_args['link_before'];
            $omega_storefront_args['link_after'] = empty($omega_storefront_args['link_after']) ? '' : $omega_storefront_args['link_after'];

            $omega_storefront_atts = array();
            $omega_storefront_atts['href'] = get_permalink($page->ID);
            $omega_storefront_atts['aria-current'] = ($page->ID === $current_page) ? 'page' : '';

            /** This filter is documented in wp-includes/class-walker-page.php */
            $omega_storefront_atts = apply_filters('page_menu_link_attributes', $omega_storefront_atts, $page, $omega_storefront_depth, $omega_storefront_args, $current_page);

            $omega_storefront_attributes = '';
            foreach ($omega_storefront_atts as $attr => $omega_storefront_value) {
                if (!empty($omega_storefront_value)) {
                    $omega_storefront_value = ('href' === $attr) ? esc_url($omega_storefront_value) : esc_attr($omega_storefront_value);
                    $omega_storefront_attributes .= ' ' . $attr . '="' . $omega_storefront_value . '"';
                }
            }

            $omega_storefront_args['list_item_before'] = '';
            $omega_storefront_args['list_item_after'] = '';
            $omega_storefront_args['icon_rennder'] = '';
            // Wrap the link in a div and append a sub menu toggle.
            if (isset($omega_storefront_args['show_toggles']) && true === $omega_storefront_args['show_toggles']) {
                // Wrap the menu item link contents in a div, used for positioning.
                $omega_storefront_args['list_item_after'] = '';
            }


            // Add icons to menu items with children.
            if (isset($omega_storefront_args['show_sub_menu_icons']) && true === $omega_storefront_args['show_sub_menu_icons']) {
                if (isset($omega_storefront_args['pages_with_children'][$page->ID])) {
                    $omega_storefront_args['icon_rennder'] = '';
                }
            }

            // Add icons to menu items with children.
            if (isset($omega_storefront_args['show_toggles']) && true === $omega_storefront_args['show_toggles']) {
                if (isset($omega_storefront_args['pages_with_children'][$page->ID])) {

                    $toggle_target_string = '.page_item.page-item-' . $page->ID . ' > .sub-menu';

                    $omega_storefront_args['list_item_after'] = '<button type="button" class="theme-aria-button submenu-toggle" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="250"><span class="btn__content" tabindex="-1"><span class="screen-reader-text">' . __( 'Show sub menu', 'omega-storefront' ) . '</span>' . omega_storefront_get_theme_svg( 'chevron-down' ) . '</span></button>';
                }
            }

            if (isset($omega_storefront_args['show_toggles']) && true === $omega_storefront_args['show_toggles']) {

                $omega_storefront_output .= $omega_storefront_indent . sprintf(
                        '<li%s>%s%s<a%s>%s%s%s</a>%s%s',
                        $omega_storefront_css_classes,
                        '<div class="submenu-wrapper">',
                        $omega_storefront_args['list_item_before'],
                        $omega_storefront_attributes,
                        $omega_storefront_args['link_before'],
                        /** This filter is documented in wp-includes/post-template.php */
                        apply_filters('the_title', $page->post_title, $page->ID),
                        $omega_storefront_args['link_after'],
                        $omega_storefront_args['list_item_after'],
                        '</div>'
                    );

            }else{

                $omega_storefront_output .= $omega_storefront_indent . sprintf(
                        '<li%s>%s<a%s>%s%s%s%s</a>%s',
                        $omega_storefront_css_classes,
                        $omega_storefront_args['list_item_before'],
                        $omega_storefront_attributes,
                        $omega_storefront_args['link_before'],
                        /** This filter is documented in wp-includes/post-template.php */
                        apply_filters('the_title', $page->post_title, $page->ID),
                        $omega_storefront_args['icon_rennder'],
                        $omega_storefront_args['link_after'],
                        $omega_storefront_args['list_item_after']
                    );

            }

            if (!empty($omega_storefront_args['show_date'])) {
                if ('modified' === $omega_storefront_args['show_date']) {
                    $omega_storefront_time = $page->post_modified;
                } else {
                    $omega_storefront_time = $page->post_date;
                }

                $omega_storefront_date_format = empty($omega_storefront_args['date_format']) ? '' : $omega_storefront_args['date_format'];
                $omega_storefront_output .= ' ' . mysql2date($omega_storefront_date_format, $omega_storefront_time);
            }
        }
    }
}