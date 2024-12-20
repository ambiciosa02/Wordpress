<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spexo
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

get_header();

$hideTitle = false;
$get_page_settins = get_post_meta(get_the_ID(),'_elementor_page_settings');
if (isset($get_page_settins[0]['hide_title']) && $get_page_settins[0]['hide_title'] == 'yes') {
	
	$hideTitle = true;
}

?> <main id="content" <?php post_class( 'site-main' ); ?>> <?php 

if ($hideTitle == false) { ?>
	
	<header class="page-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>

<?php } ?>

		<?php

		while ( have_posts() ) :

			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php

get_footer();
