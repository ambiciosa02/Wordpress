<?php 
/**
 * The footer for the shopcozi theme.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Shopcozi
 * 
 * @since Shopcozi 0.1
 */
?>

    <?php do_action( 'shopcozi_page_content_after' ); ?>

    </div><!-- .content -->

    <?php do_action( 'shopcozi_site_inner_after' ); ?>

	</div><!-- .site -->

    <?php do_action( 'shopcozi_site_after' ); ?>

    <?php
    do_action('shopcozi_footer');
    wp_footer(); 
    ?>
</body>
</html>