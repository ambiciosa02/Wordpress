<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Supermarket Shopping
 */

get_header(); ?>

<section class="error-area">
	<div class="container">
		<div class="error-item text-center">
			<h2><?php echo esc_html(get_theme_mod('supermarket_shopping_404_title', '404')); ?></h2>
			<h3><?php echo esc_html(get_theme_mod('supermarket_shopping_404_Text', 'Page Not Found')); ?></h3>	
			<p><?php echo esc_html(get_theme_mod('supermarket_shopping_404_content', 'The page you were looking for could not be found.')); ?></p>
			<a class="theme-button back-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Go to Home','supermarket-shopping'); ?></a>
		</div>
	</div>
</section>

<?php get_footer(); ?>