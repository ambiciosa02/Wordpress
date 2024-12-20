<?php

function omega_storefront_enqueue_fonts() {
    $omega_storefront_default_font_content = 'roboto';
    $omega_storefront_default_font_heading = 'outfit';

    $omega_storefront_font_content = esc_attr(get_theme_mod('omega_storefront_content_typography_font', $omega_storefront_default_font_content));
    $omega_storefront_font_heading = esc_attr(get_theme_mod('omega_storefront_heading_typography_font', $omega_storefront_default_font_heading));

    $omega_storefront_css = '';

    // Always enqueue main font
    $omega_storefront_css .= '
    :root {
        --font-main: ' . $omega_storefront_font_content . ', ' . (in_array($omega_storefront_font_content, ['bitter', 'charis-sil']) ? 'serif' : 'sans-serif') . '!important;
    }';
    wp_enqueue_style('omega-storefront-style-font-general', get_template_directory_uri() . '/fonts/' . $omega_storefront_font_content . '/font.css');

    // Always enqueue header font
    $omega_storefront_css .= '
    :root {
        --font-head: ' . $omega_storefront_font_heading . ', ' . (in_array($omega_storefront_font_heading, ['bitter', 'charis-sil']) ? 'serif' : 'sans-serif') . '!important;
    }';
    wp_enqueue_style('omega-storefront-style-font-h', get_template_directory_uri() . '/fonts/' . $omega_storefront_font_heading . '/font.css');

    // Add inline style
    wp_add_inline_style('omega-storefront-style-font-general', $omega_storefront_css);
}
add_action('wp_enqueue_scripts', 'omega_storefront_enqueue_fonts', 50);