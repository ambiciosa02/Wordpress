<?php
/**
* Header Banner Options.
*
* @package Omega Storefront
*/

$omega_storefront_default = omega_storefront_get_default_theme_options();
$omega_storefront_post_category_list = omega_storefront_post_category_list();

$wp_customize->add_section( 'omega_storefront_header_banner_setting',
    array(
    'title'      => esc_html__( 'Slider Settings', 'omega-storefront' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'theme_home_pannel',
    )
);

$wp_customize->add_setting('omega_storefront_display_header_text',
    array(
        'default' => $omega_storefront_default['omega_storefront_header_banner'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_storefront_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_storefront_display_header_text',
    array(
        'label' => esc_html__('Enable / Disable Tagline', 'omega-storefront'),
        'section' => 'title_tagline',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('omega_storefront_header_banner',
    array(
        'default' => $omega_storefront_default['omega_storefront_header_banner'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_storefront_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_storefront_header_banner',
    array(
        'label' => esc_html__('Enable Slider', 'omega-storefront'),
        'section' => 'omega_storefront_header_banner_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'omega_storefront_slider_section_title',
    array(
    'default'           => $omega_storefront_default['omega_storefront_slider_section_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'omega_storefront_slider_section_title',
    array(
    'label'    => esc_html__( 'Slider Title', 'omega-storefront' ),
    'section'  => 'omega_storefront_header_banner_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'omega_storefront_header_banner_cat',
    array(
    'default'           => 'uncategorized',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'omega_storefront_sanitize_select',
    )
);
$wp_customize->add_control( 'omega_storefront_header_banner_cat',
    array(
    'label'       => esc_html__( 'Slider Post Category', 'omega-storefront' ),
    'section'     => 'omega_storefront_header_banner_setting',
    'type'        => 'select',
    'choices'     => $omega_storefront_post_category_list,
    )
);

// Product Settings

$wp_customize->add_section( 'product_column_setting',
    array(
    'title'      => esc_html__( 'Product Settings', 'omega-storefront' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'theme_home_pannel',
    )
);

$wp_customize->add_setting( 'omega_storefront_product_section_title',
    array(
    'default'           => $omega_storefront_default['omega_storefront_product_section_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'omega_storefront_product_section_title',
    array(
    'label'    => esc_html__( 'Product Title', 'omega-storefront' ),
    'section'  => 'product_column_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'omega_storefront_product_section_content',
    array(
    'default'           => $omega_storefront_default['omega_storefront_product_section_content'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'omega_storefront_product_section_content',
    array(
    'label'    => esc_html__( 'Product Content', 'omega-storefront' ),
    'section'  => 'product_column_setting',
    'type'     => 'text',
    )
);


$omega_storefront_args = array(
    'type'                     => 'product',
    'child_of'                 => 0,
    'parent'                   => '',
    'orderby'                  => 'term_group',
    'order'                    => 'ASC',
    'hide_empty'               => false,
    'hierarchical'             => 1,
    'number'                   => '',
    'taxonomy'                 => 'product_cat',
    'pad_counts'               => false
);

$categories = get_categories($omega_storefront_args);
$cat_posts = array();
$m = 0;
$cat_posts[]='Select';
foreach($categories as $category){
    if($m==0){
        $default = $category->slug;
        $m++;
    }
    $cat_posts[$category->slug] = $category->name;
}

$wp_customize->add_setting('omega_storefront_featured_product_category',array(
    'default'   => 'select',
    'sanitize_callback' => 'omega_storefront_sanitize_select',
));
$wp_customize->add_control('omega_storefront_featured_product_category',array(
    'type'    => 'select',
    'choices' => $cat_posts,
    'label' => __('Select category to display products ','omega-storefront'),
    'section' => 'product_column_setting',
));