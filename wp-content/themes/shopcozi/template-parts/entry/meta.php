<?php
global $authordata;
?>
<div class="entry-meta">
	<span class="author">
		<i class="fa-solid fa-user"></i>
		<a href="<?php echo esc_url( get_author_posts_url( $authordata->ID, $authordata->user_nicename ) ); ?>"><?php echo get_the_author(); ?></a>
	</span>
	<span class="date">
		<i class="fa-regular fa-clock"></i> 
		<a href="<?php echo esc_url( get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')));  ?>"><?php the_time( get_option('date_format') ); ?></a>
	</span>
	<?php if( has_tag() ) { ?>
	<span class="tags-links">
		<i class="fa-solid fa-folder-open"></i>
		<?php the_tags('',', ',''); ?>
	</span>
	<?php } ?>
</div>