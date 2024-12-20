<?php
/**
 * The default template for displaying content
 * @package Omega Storefront
 * @since 1.0.0
 */

$omega_storefront_default = omega_storefront_get_default_theme_options();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 

	<?php if( is_single() && 'post' === get_post_type() ) { 
		// Check if it is a single post page
		if ( has_post_thumbnail() ) { // If the post has a featured image
			?>
			<div class="post-thumbnail">
				<?php omega_storefront_post_thumbnail(); ?>
			</div>
			<?php
		} else { 
			// No featured image, so show default image
			?>
			<div class="post-thumbnail">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/one.png' ); ?>" alt="<?php esc_attr_e( 'Omega Storefront Default Image', 'omega-storefront' ); ?>" />
			</div>
			<?php
		}
	} else { 
		// Don't show default image or featured image for other single pages (like static pages, etc.)
		?>
		<!-- Optionally you can add code for non-post pages here -->
	<?php } ?>

	<?php if ( is_singular() ) { ?>

		<header class="entry-header entry-header-1">
			<h1 class="entry-title entry-title-large">
				<span><?php the_title(); ?></span>
			</h1>
		</header>

	<?php }

	if( is_single() && 'post' === get_post_type() ){ ?>

		<div class="entry-meta">
			<?php
			omega_storefront_posted_by();
			omega_storefront_posted_on();
			omega_storefront_entry_footer( $cats = true, $tags = false, $edits = false );
			?>
		</div>

	<?php } ?>

	<div class="post-content-wrap">

		<div class="post-content">

			<div class="entry-content">

				<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Read More %s <span class="meta-nav">&rarr;</span>', 'omega-storefront' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'omega-storefront' ),
					'after'  => '</div>',
				) ); ?>

			</div>

			<?php
			if ( is_singular() && 'post' === get_post_type() ){ ?>

				<div class="entry-footer">
					<div class="entry-meta">
						<?php omega_storefront_entry_footer( $cats = false, $tags = true, $edits = true ); ?>
					</div>
				</div>

			<?php } ?>

		</div>

	</div>

</article>