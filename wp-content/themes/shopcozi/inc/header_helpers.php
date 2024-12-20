<?php
if( ! function_exists('shopcozi_header_section') ){
	function shopcozi_header_section(){
		get_template_part('template-parts/header/section','header');
	}
	add_action('shopcozi_header','shopcozi_header_section');
}

if( ! function_exists('shopcozi_header_mobile_nav_section') ){
	function shopcozi_header_mobile_nav_section(){
		get_template_part('template-parts/header/section','mobile-navigation');
	}
	add_action('shopcozi_header_area','shopcozi_header_mobile_nav_section', 5);
}

if( ! function_exists('shopcozi_header_navigation_section') ){
	function shopcozi_header_navigation_section(){
		$option = shopcozi_theme_options();
		$h_style = $option['shopcozi_h_style'];
		switch ($h_style) {
			case 'one':
				$style = 'one';
				break;
			case 'two':
				$style = 'two';
				break;
			case 'three':
				$style = 'three';
				break;
			case 'four':
				$style = 'four';
				break;
			case 'five':
				$style = 'five';
				break;
			case 'six':
				$style = 'six';
				break;
			case 'seven':
				$style = 'seven';
				break;
			case 'eight':
				$style = 'eight';
				break;
			default:
				$style = 'three';
				break;
			}
		get_template_part('template-parts/header/section-navigation',$style);
	}
	add_action('shopcozi_header_area','shopcozi_header_navigation_section', 10);
}

if( ! function_exists('shopcozi_header_browse_section') ){
	function shopcozi_header_browse_section(){
		$option = shopcozi_theme_options();
		$h_style = $option['shopcozi_h_style'];
		switch ($h_style) {
			case 'eight':
				$style = 'eight';
				break;
			case 'seven':
				$style = '';
				break;
			case 'four':
				$style = 'one';
				break;
			case 'three':
				$style = 'one';
				break;
			case 'two':
				$style = 'two';
				break;
			default:
				$style = 'one';
				break;
			}
		get_template_part('template-parts/header/section-browse',$style);
	}
	add_action('shopcozi_header_area','shopcozi_header_browse_section', 15);
}

if( ! function_exists('shopcozi_header_breadcrumbs') ){
	function shopcozi_header_breadcrumbs(){

		if( is_front_page() && !is_home() ){
			return;
		}

		get_template_part('template-parts/section-breadcrumbs');
	}
	add_action('shopcozi_header_after','shopcozi_header_breadcrumbs', 5);
}