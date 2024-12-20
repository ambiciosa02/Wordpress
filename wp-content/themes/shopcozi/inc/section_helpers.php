<?php

// Recent Products
if( ! function_exists('shopcozi_recent_product_section') ){
	function shopcozi_recent_product_section(){
		get_template_part('template-parts/sections-homepage/section','product-recent');
	}

	$section_priority = apply_filters( 'shopcozi_section_priority', 16, 'shopcozi_recent_product_section' );
	if(isset($section_priority) && $section_priority != '' ){
		add_action('shopcozi_sections','shopcozi_recent_product_section', absint($section_priority));
	}
}

// Blog
if( ! function_exists('shopcozi_blog_section') ){
	function shopcozi_blog_section(){
		get_template_part('template-parts/sections-homepage/section','blog');
	}

	$section_priority = apply_filters( 'shopcozi_section_priority', 40, 'shopcozi_blog_section' );
	if(isset($section_priority) && $section_priority != '' ){
		add_action('shopcozi_sections','shopcozi_blog_section', absint($section_priority));
	}
}