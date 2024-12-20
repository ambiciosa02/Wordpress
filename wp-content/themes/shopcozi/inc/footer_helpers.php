<?php
if( ! function_exists('shopcozi_footer_section') ){
	function shopcozi_footer_section(){
		get_template_part('template-parts/footer/section','footer');
	}
	add_action('shopcozi_footer','shopcozi_footer_section');
}

if( ! function_exists('shopcozi_footer_widget_section') ){
	function shopcozi_footer_widget_section(){
		get_template_part('template-parts/footer/section','widget');
	}
	add_action('shopcozi_footer_area','shopcozi_footer_widget_section', 5);
}

if( ! function_exists('shopcozi_footer_bottom_section') ){
	function shopcozi_footer_bottom_section(){
		get_template_part('template-parts/footer/section','bottom');
	}
	add_action('shopcozi_footer_area','shopcozi_footer_bottom_section', 10);
}

if( ! function_exists('shopcozi_footer_backtotop_section') ){
	function shopcozi_footer_backtotop_section(){
		get_template_part('template-parts/footer/section','backtotop');
	}
	add_action('shopcozi_footer_area','shopcozi_footer_backtotop_section', 15);
}