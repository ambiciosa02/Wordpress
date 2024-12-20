<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package home-decor-shop
 */
if ( ! function_exists( 'home_decor_shop_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function home_decor_shop_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'home-decor-shop' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'home-decor-shop' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
}
endif;

if ( ! function_exists( 'home_decor_shop_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function home_decor_shop_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'home-decor-shop' ) );
		if ( $categories_list && home_decor_shop_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'home-decor-shop' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'home-decor-shop' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'home-decor-shop' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'home-decor-shop' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'home-decor-shop' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function home_decor_shop_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'home_decor_shop_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'home_decor_shop_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so home_decor_shop_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so home_decor_shop_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in home_decor_shop_categorized_blog.
 */
function home_decor_shop_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'home_decor_shop_categories' );
}
add_action( 'edit_category', 'home_decor_shop_category_transient_flusher' );
add_action( 'save_post',     'home_decor_shop_category_transient_flusher' );


/**
 * Register Google fonts for home-decor-shop.
 */

function home_decor_shop_enqueue_google_fonts() {

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );
	
	wp_enqueue_style( 'google-fonts-outfit', 'https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap' );

}
add_action( 'wp_enqueue_scripts', 'home_decor_shop_enqueue_google_fonts' );

// Logo, Title, Description
if ( ! function_exists( 'home_decor_shop_logo_title_description' ) ) :
function home_decor_shop_logo_title_description() {
		if(has_custom_logo())
		{	
			the_custom_logo();
		}
	?>
	    <?php  if ( get_theme_mod( 'home_decor_shop_site_title_setting', true ) ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<h2 class="site-title"><?php echo esc_html(get_bloginfo('name')); ?></h2>
			</a>
		<?php endif; ?>
	<?php 
   		if ( get_theme_mod( 'home_decor_shop_tagline_setting', false ) ) :	
			$home_decor_shop_description = get_bloginfo( 'description');
			if ($home_decor_shop_description) : ?>
				<p class="site-description"><?php echo esc_html($home_decor_shop_description); ?></p>
		<?php endif; ?>
	<?php endif;
} 
endif;
?>