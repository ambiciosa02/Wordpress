<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Supermarket Shopping
 */

if ( ! function_exists( 'supermarket_shopping_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function supermarket_shopping_posted_on() {
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
		/* translators: %s: Date. */
		esc_html_x( 'Posted on %s', 'post date', 'supermarket-shopping' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		/* translators: %s: by. */
		esc_html_x( 'by %s', 'post author', 'supermarket-shopping' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
}
endif;


if ( ! function_exists( 'supermarket_shopping_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function supermarket_shopping_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$supermarket_shopping_categories_list = get_the_category_list( esc_html__( ', ', 'supermarket-shopping' ) );
		if ( $supermarket_shopping_categories_list && supermarket_shopping_categorized_blog() ) {
			/* translators: %1$s: Posted. */
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'supermarket-shopping' ) . '</span>', $supermarket_shopping_categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'supermarket-shopping' ) );
		if ( $tags_list ) {
			/* translators: %1$s: Tagged. */
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'supermarket-shopping' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'supermarket-shopping' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'supermarket-shopping' ),
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
function supermarket_shopping_categorized_blog() {
	if ( false === ( $supermarket_shopping_all_the_cool_cats = get_transient( 'supermarket_shopping_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$supermarket_shopping_all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$supermarket_shopping_all_the_cool_cats = count( $supermarket_shopping_all_the_cool_cats );

		set_transient( 'supermarket_shopping_categories', $supermarket_shopping_all_the_cool_cats );
	}

	if ( $supermarket_shopping_all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so supermarket_shopping_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so supermarket_shopping_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in supermarket_shopping_categorized_blog.
 */
function supermarket_shopping_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'supermarket_shopping_categories' );
}
add_action( 'edit_category', 'supermarket_shopping_category_transient_flusher' );
add_action( 'save_post',     'supermarket_shopping_category_transient_flusher' );

/**
 * Register Breadcrumb for Multiple Variation
 */
function supermarket_shopping_breadcrumbs_style() {
	get_template_part('./template-parts/sections/section','breadcrumb');
}

/**
 * This Function Check whether Sidebar active or Not
 */
if(!function_exists( 'supermarket_shopping_post_layout' )) :
function supermarket_shopping_post_layout(){
	if(is_active_sidebar('supermarket-shopping-sidebar-primary'))
		{ echo 'col-lg-8'; } 
	else 
		{ echo 'col-lg-12'; }  
} endif;