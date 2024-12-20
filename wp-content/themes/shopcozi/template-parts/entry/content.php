<?php do_action( 'shopcozi_entry_content_before' ); ?>

<div class="entry-content">
	<?php 
    $option = shopcozi_theme_options();
    $archive_content_type = $option['shopcozi_archive_content_type'];

    if( 'excerpt' == $archive_content_type && ( is_home() || is_archive() || is_search() ) ){
        the_excerpt();
    }else{        
        the_content();
    }

    wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'shopcozi' ),
                    'after'  => '</div>',
                ) );
    ?>
    <div class="clearfix"></div>
    <?php shopcozi_edit_link(); ?>
</div>

<?php do_action( 'shopcozi_entry_content_before' ); ?>