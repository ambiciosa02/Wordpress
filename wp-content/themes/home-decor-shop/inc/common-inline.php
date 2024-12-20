<?php

/*----------------------------------------------------------------------------------*/

$home_decor_shop_common_inline_css = '';

$home_decor_shop_scroll_top_alignment = get_theme_mod('home_decor_shop_scroll_top_alignment', 'Right');

$home_decor_shop_alignment_styles = [
    'Left' => 'left: 20px;',
    'Center' => 'right: 50%; left: 50%;',
    'Right' => 'right: 20px;'
];

$alignment_style = $home_decor_shop_alignment_styles[$home_decor_shop_scroll_top_alignment] ?? $home_decor_shop_alignment_styles['Right'];

$home_decor_shop_common_inline_css .= "a.scrollup { $alignment_style }";

/*----------------------------------------------------------------------------------*/