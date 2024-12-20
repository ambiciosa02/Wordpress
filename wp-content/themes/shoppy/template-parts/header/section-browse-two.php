<?php 
$option = shopcozi_theme_options();
$page_options = shopcozi_get_page_options();
$h_container_width = $option['shopcozi_h_container_width'];

if($page_options['sc_header_container_width']=='0'){
	$h_container_width = $h_container_width;
}else{
	$h_container_width = $page_options['sc_header_container_width'];
}
?>
<div class="browse-section pb-4">
	<div class="<?php echo esc_attr($h_container_width); ?>">
		<div class="row g-0 navbar-area align-items-center">
			<div class="col-lg-3 col-12">
				<div class="product-cat-browse">
					<button class="product-browse-button"><span><i class="fa-solid fa-list-ul"></i> <?php _e('All Categories','shoppy'); ?></span></button>
					<div class="browse-cat-menus">
						<div class="browse-cat-menu-list">
						    <?php shopcozi_browser_categories(); ?>						    
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-12">
				<div class="row g-0 align-items-center">
					<div class="col">
						<div class="browse-search-area">
							<?php shopcozi_header_product_search(); ?>
						</div>
					</div>
					<div class="col-auto d-lg-inline-block d-md-none d-none">
						<?php shopcozi_navigation_icons(); ?>
					</div>					
				</div>
			</div>			
		</div>
	</div>
</div>