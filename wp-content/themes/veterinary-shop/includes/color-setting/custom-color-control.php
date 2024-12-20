<?php

  $veterinary_shop_theme_custom_setting_css = '';

	// Global Color
	$veterinary_shop_theme_color = get_theme_mod('veterinary_shop_theme_color', '#FF9D71');

	$veterinary_shop_theme_custom_setting_css .=':root {';
		$veterinary_shop_theme_custom_setting_css .='--primary-color: '.esc_attr($veterinary_shop_theme_color ).'!important;';
	$veterinary_shop_theme_custom_setting_css .='}';

	// Scroll to top alignment
	$veterinary_shop_scroll_alignment = get_theme_mod('veterinary_shop_scroll_alignment', 'right');

    if($veterinary_shop_scroll_alignment == 'right'){
        $veterinary_shop_theme_custom_setting_css .='.scroll-up{';
            $veterinary_shop_theme_custom_setting_css .='right: 30px;!important;';
			$veterinary_shop_theme_custom_setting_css .='left: auto;!important;';
        $veterinary_shop_theme_custom_setting_css .='}';
    }else if($veterinary_shop_scroll_alignment == 'center'){
        $veterinary_shop_theme_custom_setting_css .='.scroll-up{';
            $veterinary_shop_theme_custom_setting_css .='left: calc(50% - 10px) !important;';
        $veterinary_shop_theme_custom_setting_css .='}';
    }else if($veterinary_shop_scroll_alignment == 'left'){
        $veterinary_shop_theme_custom_setting_css .='.scroll-up{';
            $veterinary_shop_theme_custom_setting_css .='left: 30px;!important;';
			$veterinary_shop_theme_custom_setting_css .='right: auto;!important;';
        $veterinary_shop_theme_custom_setting_css .='}';
    }