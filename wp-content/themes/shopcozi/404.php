<?php
get_header();
$option = shopcozi_theme_options();
$error_code = $option['shopcozi_error_code'];
$error_title = $option['shopcozi_error_title'];
$error_desc = $option['shopcozi_error_desc'];
$error_btn_label = $option['shopcozi_error_btn_label'];
?>
<section class="error-section py-6">
	<div class="container-fluid gx-0">
		<div class="row">
			<div class="col-12 text-center">
				<div class="error-content">
					<?php if($error_code!=''){ ?>
					<h2 class="error-code"><?php echo wp_kses_post($error_code); ?></h2>
					<?php } ?>

					<?php if($error_title!=''){ ?>
					<h3 class="error-title"><?php echo wp_kses_post($error_title); ?></h3>
					<?php } ?>

					<?php if($error_desc!=''){ ?>
					<p class="error-desc"><?php echo esc_html($error_desc); ?></p>
					<?php } ?>
					
					<a class="button primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa-solid fa-arrow-left"></i> <?php echo esc_html($error_btn_label); ?></a>
				</div>
			</div>					
		</div>
	</div>
</section>
<?php get_footer(); ?>