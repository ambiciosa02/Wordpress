<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package home-decor-shop
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post blog-style-1'); ?>>		
	<div class="post-content">
		<div class="post-content-inner read-more-wrapper">
		<?php 
		if ( is_single() ) :
			if ( true == get_theme_mod( 'home_decor_shop_single_post_content_on_off', 'on' ) ) :
				the_content( 
					sprintf( 
						__( 'Read More', 'home-decor-shop' ), 
						'<span class="screen-reader-text">  '.esc_html(get_the_title()).'</span>' 
					) 
				);
			endif;
			else:
					the_content( 
					sprintf( 
						__( 'Read More', 'home-decor-shop' ), 
						'<span class="screen-reader-text">  '.esc_html(get_the_title()).'</span>' 
					) 
				);
			endif;
		?>
		</div>
	</div>
</article>			