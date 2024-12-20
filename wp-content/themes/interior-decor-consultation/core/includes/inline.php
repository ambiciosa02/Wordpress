<?php

$interior_decor_consultation_custom_css = '';


$interior_decor_consultation_is_dark_mode_enabled = get_theme_mod( 'interior_decor_consultation_is_dark_mode_enabled', false );  // Default is false (light mode)

if ( $interior_decor_consultation_is_dark_mode_enabled ) {
    // CSS for dark mode
    $interior_decor_consultation_custom_css .= 'body,.fixed-header,tr:nth-child(2n+2) {';
    $interior_decor_consultation_custom_css .= 'background: #000;';  // Dark background
    $interior_decor_consultation_custom_css .= '}';

    $interior_decor_consultation_custom_css .= 'body,h1,h2,h3,h4,h5,p,#main-menu ul li a,.woocommerce .woocommerce-ordering select, .woocommerce form .form-row input.input-text, .woocommerce form .form-row textarea,a,.logo span,.project .tablinks{';
    $interior_decor_consultation_custom_css .= 'color: #fff;';  // Light text color for dark mode
    $interior_decor_consultation_custom_css .= '}';

    $interior_decor_consultation_custom_css .= 'a.wc-block-components-product-name, .wc-block-components-product-name,.wc-block-components-totals-footer-item .wc-block-components-totals-item__value,
.wc-block-components-totals-footer-item .wc-block-components-totals-item__label,
.wc-block-components-totals-item__label,.wc-block-components-totals-item__value,
.wc-block-components-product-metadata .wc-block-components-product-metadata__description>p,
.is-medium table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__total .wc-block-components-formatted-money-amount,
.wc-block-components-quantity-selector input.wc-block-components-quantity-selector__input,
.wc-block-components-quantity-selector .wc-block-components-quantity-selector__button,
.wc-block-components-quantity-selector,table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link,
.wc-block-components-product-price__value.is-discounted,del.wc-block-components-product-price__regular{';
    $interior_decor_consultation_custom_css .= 'color: #fff !important;';
    $interior_decor_consultation_custom_css .= '}';

    $interior_decor_consultation_custom_css .= 'h5.product-text a,#featured-product p.price,.card-header a,.comment-content.card-block p{';
    $interior_decor_consultation_custom_css .= 'color: #000 !important'; 
    $interior_decor_consultation_custom_css .= '}';

    $interior_decor_consultation_custom_css .= '.post-box{';
    $interior_decor_consultation_custom_css .= '    border: 1px solid rgb(229 229 229 / 48%)';
    $interior_decor_consultation_custom_css .= '}';
}

	/*---------------------------text-transform-------------------*/

	$interior_decor_consultation_text_transform = get_theme_mod( 'interior_decor_consultation_menu_text_transform','CAPITALISE');
    if($interior_decor_consultation_text_transform == 'CAPITALISE'){

		$interior_decor_consultation_custom_css .='#main-menu ul li a{';

			$interior_decor_consultation_custom_css .='text-transform: capitalize;';

		$interior_decor_consultation_custom_css .='}';

	}else if($interior_decor_consultation_text_transform == 'UPPERCASE'){

		$interior_decor_consultation_custom_css .='#main-menu ul li a{';

			$interior_decor_consultation_custom_css .='text-transform: uppercase;';

		$interior_decor_consultation_custom_css .='}';

	}else if($interior_decor_consultation_text_transform == 'LOWERCASE'){

		$interior_decor_consultation_custom_css .='#main-menu ul li a{';

			$interior_decor_consultation_custom_css .='text-transform: lowercase;';

		$interior_decor_consultation_custom_css .='}';
	}

		/*---------------------------menu-zoom-------------------*/

		$interior_decor_consultation_menu_zoom = get_theme_mod( 'interior_decor_consultation_menu_zoom','None');

    if($interior_decor_consultation_menu_zoom == 'Zoomout'){

		$interior_decor_consultation_custom_css .='#main-menu ul li a{';

			$interior_decor_consultation_custom_css .='';

		$interior_decor_consultation_custom_css .='}';

	}else if($interior_decor_consultation_menu_zoom == 'Zoominn'){

		$interior_decor_consultation_custom_css .='#main-menu ul li a:hover{';

			$interior_decor_consultation_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important; color: #CD9967;';

		$interior_decor_consultation_custom_css .='}';
	}

	/*---------------------------Container Width-------------------*/

$interior_decor_consultation_container_width = get_theme_mod('interior_decor_consultation_container_width');

		$interior_decor_consultation_custom_css .='body{';

			$interior_decor_consultation_custom_css .='width: '.esc_attr($interior_decor_consultation_container_width).'%; margin: auto';

		$interior_decor_consultation_custom_css .='}';

		/*---------------------------Copyright Text alignment-------------------*/

	$interior_decor_consultation_copyright_text_alignment = get_theme_mod( 'interior_decor_consultation_copyright_text_alignment','LEFT-ALIGN');

	if($interior_decor_consultation_copyright_text_alignment == 'LEFT-ALIGN'){

		$interior_decor_consultation_custom_css .='.copy-text p{';

			$interior_decor_consultation_custom_css .='text-align:left;';

		$interior_decor_consultation_custom_css .='}';


	}else if($interior_decor_consultation_copyright_text_alignment == 'CENTER-ALIGN'){

		$interior_decor_consultation_custom_css .='.copy-text p{';

			$interior_decor_consultation_custom_css .='text-align:center;';

		$interior_decor_consultation_custom_css .='}';


	}else if($interior_decor_consultation_copyright_text_alignment == 'RIGHT-ALIGN'){

		$interior_decor_consultation_custom_css .='.copy-text p{';

			$interior_decor_consultation_custom_css .='text-align:right;';

		$interior_decor_consultation_custom_css .='}';

	}

	/*---------------------------related Product Settings-------------------*/

$interior_decor_consultation_related_product_setting = get_theme_mod('interior_decor_consultation_related_product_setting',true);

	if($interior_decor_consultation_related_product_setting == false){

		$interior_decor_consultation_custom_css .='.related.products, .related h2{';

			$interior_decor_consultation_custom_css .='display: none;';

		$interior_decor_consultation_custom_css .='}';
	}

		/*---------------------------Scroll to Top Alignment Settings-------------------*/

		$interior_decor_consultation_scroll_top_position = get_theme_mod( 'interior_decor_consultation_scroll_top_position','Right');

		if($interior_decor_consultation_scroll_top_position == 'Right'){
	
			$interior_decor_consultation_custom_css .='.scroll-up{';
	
				$interior_decor_consultation_custom_css .='right: 20px;';
	
			$interior_decor_consultation_custom_css .='}';
	
		}else if($interior_decor_consultation_scroll_top_position == 'Left'){
	
			$interior_decor_consultation_custom_css .='.scroll-up{';
	
				$interior_decor_consultation_custom_css .='left: 20px;';
	
			$interior_decor_consultation_custom_css .='}';
	
		}else if($interior_decor_consultation_scroll_top_position == 'Center'){
	
			$interior_decor_consultation_custom_css .='.scroll-up{';
	
				$interior_decor_consultation_custom_css .='right: 50%;left: 50%;';
	
			$interior_decor_consultation_custom_css .='}';
		}
	
			/*---------------------------Pagination Settings-------------------*/
	
	
	$interior_decor_consultation_pagination_setting = get_theme_mod('interior_decor_consultation_pagination_setting',true);
	
		if($interior_decor_consultation_pagination_setting == false){
	
			$interior_decor_consultation_custom_css .='.nav-links{';
	
				$interior_decor_consultation_custom_css .='display: none;';
	
			$interior_decor_consultation_custom_css .='}';
		}

	/*---------------------------woocommerce pagination alignment settings-------------------*/

	$interior_decor_consultation_woocommerce_pagination_position = get_theme_mod( 'interior_decor_consultation_woocommerce_pagination_position','Center');

	if($interior_decor_consultation_woocommerce_pagination_position == 'Left'){

		$interior_decor_consultation_custom_css .='.woocommerce nav.woocommerce-pagination{';

			$interior_decor_consultation_custom_css .='text-align: left;';

		$interior_decor_consultation_custom_css .='}';

	}else if($interior_decor_consultation_woocommerce_pagination_position == 'Center'){

		$interior_decor_consultation_custom_css .='.woocommerce nav.woocommerce-pagination{';

			$interior_decor_consultation_custom_css .='text-align: center;';

		$interior_decor_consultation_custom_css .='}';

	}else if($interior_decor_consultation_woocommerce_pagination_position == 'Right'){

		$interior_decor_consultation_custom_css .='.woocommerce nav.woocommerce-pagination{';

			$interior_decor_consultation_custom_css .='text-align: right;';

		$interior_decor_consultation_custom_css .='}';
	}