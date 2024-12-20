<?php do_action( 'shopcozi_entry_title_before' ); ?>

<header class="entry-header">
	<h4 class="entry-title">
		<?php if( !is_single() && !is_page() ){ ?>

	    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
	        <?php the_title(); ?>
	    </a>

	    <?php } else { ?>

	        <?php the_title(); ?>

	    <?php } ?>
	</h4>
</header>

<?php do_action( 'shopcozi_entry_title_after' ); ?>