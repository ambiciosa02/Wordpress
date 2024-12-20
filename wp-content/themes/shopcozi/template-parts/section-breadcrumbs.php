<?php 
$option = shopcozi_theme_options();
$page_options = shopcozi_get_page_options();

$class = '';
if($option['shopcozi_breadcrumb_style']==1){
	$class .= ' style1';
}else if($option['shopcozi_breadcrumb_style']==2){
	$class .= ' style2';
}

if($option['shopcozi_breadcrumb_bg_image']!=''){
	$class .= ' overlay';
}

if($option['shopcozi_breadcrumb_show']==true){
?>
<div class="breadcrumb-section <?php echo esc_attr($class); ?>">
	<div class="container">
		<div class="row">
			<div class="col-12">				
				<div class="breadcrumb-inner">
					<?php if($option['shopcozi_breadcrumb_title_show']==true){ ?>
					<div class="page-header-title text-center">
						<?php shopcozi_breadcrumbs_title(); ?>
					</div>
					<?php } ?>

					<?php if($option['shopcozi_breadcrumb_path_show']==true){ ?>					
                    <?php shopcozi_breadcrumbs(); ?>
                	<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>