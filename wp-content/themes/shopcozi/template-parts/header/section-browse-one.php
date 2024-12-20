<?php 
$option = shopcozi_theme_options();

$option['shopcozi_browse_cat_title'] = isset($option['shopcozi_browse_cat_title']) && $option['shopcozi_browse_cat_title'] != ''?
$option['shopcozi_browse_cat_title']:
__('All Category','shopcozi');

$page_options = shopcozi_get_page_options();
$h_container_width = $option['shopcozi_h_container_width'];

if($page_options['sc_header_container_width']=='0'){
	$h_container_width = $h_container_width;
}else{
	$h_container_width = $page_options['sc_header_container_width'];
}


if( ($option['shopcozi_browse_cat_show']==true || $option['shopcozi_browse_form_show']==true) && class_exists('woocommerce') ){
?>
<div class="browse-section pb-4">
	<div class="<?php echo esc_attr($h_container_width); ?>">
		<div class="row align-items-center justify-content-center">

			<?php if($option['shopcozi_browse_cat_show']==true){ ?>
			<div class="col-lg-3 col-12">
				<div class="product-cat-browse">
					<button class="product-browse-button"><span><i class="fa-solid fa-list-ul"></i> <?php echo esc_html($option['shopcozi_browse_cat_title']); ?></span></button>
					<div class="browse-cat-menus">
						<div class="browse-cat-menu-list">
						    <?php shopcozi_browser_categories(); ?>						    
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
			
			<?php if($option['shopcozi_browse_form_show']==true){ ?>
			<div class="col-lg-9 col-12">
				<div class="browse-search-area">
					<?php shopcozi_header_product_search(); ?>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<?php } ?>