<?php if( has_category() ) { ?>
<div class="entry-cat">
	<span class="cat-links">
		<?php the_category( ' ', get_the_ID() ); ?>
	</span>
</div>
<?php } ?>