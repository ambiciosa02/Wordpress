<?php
/**
 * Own Shop Trend: Dynamic CSS stylesheet
 * 
 */


function own_shop_trend_dynamic_css_stylesheet() {
    
    $layout= (OWN_SHOP_TREND_CONTAINER_CLASS=='os-container') ? '1350px' : '1170px';
    $primary_color= sanitize_hex_color(get_theme_mod( 'own_shop_site_primary_color','#333333' ));
    $secondary_color= sanitize_hex_color(get_theme_mod( 'own_shop_site_secondary_color','#000000' ));

    $css = '

        a, a:hover {
            text-decoration: underline;       
        }

        .wp-block-cover.alignwide,
        .wp-block-columns.alignwide,
        .wc-block-grid__products,
        .wp-block-cover-image .wp-block-cover__inner-container, 
        .wp-block-cover .wp-block-cover__inner-container {
             padding: 0 15px;
        }

        h1, h2, h3, h4, h5, h6,
        .single h1.entry-title a {
            color: #000;
        }

        .top-menu .navigation >li.current-menu-item  a {
            color: '.$primary_color.';
        }

        header button[type="submit"] {
            font-size: 0 !important;
        }

        footer#footer, footer#footer .footer-widgets-wrapper {
            clear: both;
        }

        .wp-block-button__link,
        .wc-block-grid__product-onsale,
        .wp-block-search .wp-block-search__button {
            background: '.$primary_color.' !important;
            color: #fff !important; 
            border: none;
        }

	';


    
	return apply_filters( 'own_shop_trend_dynamic_css_stylesheet', own_shop_trend_minimize_css($css));
}