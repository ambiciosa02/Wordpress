<?php 
// getting post format
$format = get_post_format();
?>
<aside id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php get_template_part( 'template-parts/entry/media/entry-media', $format ); ?>

	<div class="post-content">								
		<?php
	        get_template_part( 'template-parts/entry/meta-category' );
	        get_template_part( 'template-parts/entry/title' );
	        get_template_part( 'template-parts/entry/content' );
	        get_template_part( 'template-parts/entry/meta' );
	    ?>
	</div>
</aside>