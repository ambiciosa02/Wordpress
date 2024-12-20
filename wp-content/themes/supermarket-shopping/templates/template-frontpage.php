<?php
/**
	Template Name: Frontpage
*/

get_header(); 

get_template_part('template-parts/sections/section','category');
get_template_part('template-parts/sections/section','slider');
get_template_part('template-parts/sections/section','products');
get_template_part('template-parts/sections/section','content'); ?>

<?php get_footer(); ?>