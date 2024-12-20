<?php 
$option = shopcozi_theme_options();
$page_options = shopcozi_get_page_options();

$class = '';
if($option['shopcozi_footer_bg_image']!=''){
	$class .= ' overlay';
}
?>

<?php if( $page_options['sc_footer_block'] != '0' ){ ?>
	<footer id="footer" class="footer-section-block">

		<?php shopcozi_get_footer_content($page_options['sc_footer_block']); ?>

	</footer>
<?php }else{ ?>
	<footer id="footer" class="footer-section <?php echo esc_attr($class); ?>">

	<?php do_action('shopcozi_footer_area'); ?>

	</footer>
<?php } ?>
