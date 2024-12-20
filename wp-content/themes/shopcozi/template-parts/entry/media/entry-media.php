<?php if( has_post_thumbnail() ): ?>
<figure class="post-thumbnail">

	<?php if( ( ! is_single() ) ){ ?>
	<a href="<?php the_permalink(); ?>">
	<?php } ?>

		<?php the_post_thumbnail('full'); ?>
		
	<?php if( ( ! is_single() ) ){ ?>
	</a>
	<?php } ?>

	<?php if( ( ! is_single() ) ){ ?>
	<div class="post-thumbnail-overlay">
		<div class="post-thumbnail-overlay-inside">
			<a href="<?php the_permalink(); ?>" class="post-thumbnail-icon"><i class="fa-solid fa-link"></i></a>
		</div>
	</div>
	<?php } ?>

</figure>
<?php endif; ?>