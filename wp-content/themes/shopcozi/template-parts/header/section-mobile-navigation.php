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
<div class="mobile-menus <?php echo esc_attr($sticky_class); ?> d-lg-none d-md-block d-block">
	<div class="<?php echo esc_attr($h_container_width); ?>">
		<div class="row">
			<div class="col-12">
				<div class="mobile-menu-inner">
					<?php shopcozi_logo(); ?>
					<div>
						<?php shopcozi_navigation_icons(); ?>
						<button class="btn mobile-menu-target" data-mobile-menu-target="#mobile-menu-container"><i class="fa-solid fa-bars"></i></button>
					</div>
				</div>
				<div id="mobile-menu-container" class="mobile-menu-container">
					<div class="mobile-menu-container-overlay"></div>
					<div class="mobile-menu-container-inner">
						<div class="mobile-menu-logo">
							<?php shopcozi_logo(); ?>
						</div>
						<nav class="mobile-menu">
							<?php shopcozi_navigations_mobile(); ?>
						</nav>						
					</div>
					<button class="btn btn-close mobile-menu-close" mobile-menu-close><i class="fa fa-times"></i></button>
				</div>				
			</div>
		</div>
	</div>
</div>