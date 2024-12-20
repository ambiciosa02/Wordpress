<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Supermarket Shopping
 */

// For archive post setting
$supermarket_shopping_post_heading = get_theme_mod('supermarket_shopping_post_heading_settings','1');
$supermarket_shopping_post_content = get_theme_mod('supermarket_shopping_post_content_settings','1');
$supermarket_shopping_post_feature_image = get_theme_mod('supermarket_shopping_post_featured_image_settings','1');
$supermarket_shopping_post_date = get_theme_mod('supermarket_shopping_post_date_settings','1');
$supermarket_shopping_post_comments = get_theme_mod('supermarket_shopping_post_comments_settings','1');
$supermarket_shopping_post_author = get_theme_mod('supermarket_shopping_post_author_settings','1');
$supermarket_shopping_post_tags = get_theme_mod('supermarket_shopping_post_tags_settings','1');

// For single post setting
$supermarket_shopping_single_post_heading = get_theme_mod('supermarket_shopping_single_post_heading_settings','1');
$supermarket_shopping_single_post_content = get_theme_mod('supermarket_shopping_single_post_content_settings','1');
$supermarket_shopping_single_post_feature_image = get_theme_mod('supermarket_shopping_single_post_featured_image_settings','1');
$supermarket_shopping_single_post_date = get_theme_mod('supermarket_shopping_single_post_date_settings','1');
$supermarket_shopping_single_post_comments = get_theme_mod('supermarket_shopping_single_post_comments_settings','1');
$supermarket_shopping_single_post_author = get_theme_mod('supermarket_shopping_single_post_author_settings','1');
$supermarket_shopping_single_post_tags = get_theme_mod('supermarket_shopping_single_post_tags_settings','1');
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('blog-item'); ?>>
	<?php
    
		if ( is_single() ) :
			if ($supermarket_shopping_single_post_feature_image == '1') :
				if ( has_post_thumbnail() ) : ?>
					<div class="blog-thumb"><?php the_post_thumbnail(); ?></div>
			<?php endif;  ?>
    <?php endif; 
	
	else:
		if ($supermarket_shopping_post_feature_image == '1') :
			if ( has_post_thumbnail() ) : ?>
				<div class="blog-thumb"><?php the_post_thumbnail(); ?></div>
			<?php endif; ?>
	    <?php endif; 
	endif;

	if ( is_single() ) : 

		if ($supermarket_shopping_single_post_date == '1') : ?>
			<h6 class="theme-button"><?php echo esc_html(get_the_date('j')); ?>, <?php echo esc_html(get_the_date('M'));  echo esc_html(get_the_date(' Y')); ?></h6>
		<?php endif; ?>
	<?php
	else:
		if ($supermarket_shopping_post_date == '1') : ?>
    		<h6 class="theme-button"><?php echo esc_html(get_the_date('j')); ?>, <?php echo esc_html(get_the_date('M'));  echo esc_html(get_the_date(' Y')); ?></h6>
    	<?php endif; 
	endif; ?>

     
	<div class="blog-content">
		<?php 
			if ( is_single() ) :
				if ($supermarket_shopping_single_post_heading == '1') : 
					the_title('<h5 class="post-title">', '</h5>' );
			    endif;
			
			else:
				if ($supermarket_shopping_post_heading == '1') {

					the_title( sprintf( '<h5 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );

				}
			endif; 

		?>
		<?php
	        if ( is_singular() ) :
	        		if ($supermarket_shopping_single_post_content == '1') : 
	            		the_content();
	                endif;
	        else :
	        	if ($supermarket_shopping_post_content == '1') {
	           	 echo "<p>".wp_trim_words(get_the_excerpt(), 50)."</p>";
	            }
	            ?>
	            <?php
	        endif;
		?>
	</div>

	<?php
	    if ( is_singular() ) : ?>
            <ul class="comment-timing">
				<?php if ($supermarket_shopping_single_post_comments == '1') : ?>
					<li><a href="javascript:void(0);"><i class="fa fa-comment"></i> <?php echo esc_html(get_comments_number($post->ID)); ?></a></li>
				<?php endif; ?>

				<?php if ($supermarket_shopping_single_post_author == '1') : ?>
					<li><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><i class="fa fa-user"></i><?php esc_html_e('By','supermarket-shopping'); ?> <?php the_author(); ?></a></li>
				<?php endif; ?>
				<li>
		          <i class="fas fa-clock pe-1"></i> <?php echo esc_html(get_the_time('H:i')); ?> <?php esc_html_e('HOURS', 'supermarket-shopping'); ?>
		        </li>
			</ul>
	<?php
	    else : ?>
	        <ul class="comment-timing">
				<li class="pe-lg-3 pe-2">
		          <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
		            <i class="fa fa-user pe-1"></i> <?php the_author(); ?>
		          </a>
		        </li>
				<li class="pe-lg-3 pe-2">
		          <a href="<?php echo esc_url(get_permalink()); ?>#comments">
		            <i class="fa fa-comment pe-1"></i> <?php echo esc_html(get_comments_number($post->ID)); ?>
		          </a>
		        </li>
				<li>
		          <i class="fas fa-clock pe-1"></i> <?php echo esc_html(get_the_time('H:i')); ?> <?php esc_html_e('HOURS', 'supermarket-shopping'); ?>
		        </li>
			</ul>
	    <?php
	    endif;
		?>
	
	<?php
        if ( is_singular() ) :
    		if ($supermarket_shopping_single_post_tags == '1') : ?>
			    <div class="blog-tags mt-3">
					<?php  the_tags(); ?>
				</div>
	        <?php endif; 
        else :
        	 if ($supermarket_shopping_post_tags == '1') : ?>
		    	<div class="blog-tags mt-3">
					<?php  the_tags(); ?>
				</div>
			<?php endif; ?>
            <?php
        endif;
	?>
</div>