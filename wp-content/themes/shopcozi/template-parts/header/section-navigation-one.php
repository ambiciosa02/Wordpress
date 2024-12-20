<?php 
$option = shopcozi_theme_options();
$page_options = shopcozi_get_page_options();
$h_container_width = $option['shopcozi_h_container_width'];

if($page_options['sc_header_container_width']=='0'){
	$h_container_width = $h_container_width;
}else{
	$h_container_width = $page_options['sc_header_container_width'];
}

$sticky_class = '';
if($option['shopcozi_h_sticky_show']==true){
	$sticky_class = 'is-sticky';
}
?>
<div class="header-navigation <?php echo esc_attr($sticky_class); ?> d-lg-block d-md-none d-none">
	<div class="header-navigation-inside">
		<div class="main-naigation">
			<div class="<?php echo esc_attr($h_container_width); ?>">
				<div class="row align-items-center">
					<div class="col-lg-3">
						<?php shopcozi_logo(); ?>
					</div>
					<div class="col">
						<div class="row g-0">
						  <nav class="col navbar-area">
						   	<?php shopcozi_navigations(); ?>
						  </nav>
						  <?php shopcozi_navigation_icons(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>