<?php if ( true == get_theme_mod( 'home_decor_shop_slide_on_off', 'off' ) ) : ?>

<?php 

$slide_count = get_theme_mod('home_decor_shop_slide_count'); 
$home_decor_shop_banner_image1 = get_theme_mod('home_decor_shop_banner_image1');
$home_decor_shop_banner_image2 = get_theme_mod('home_decor_shop_banner_image2');
$home_decor_shop_banner_short_heading1 = get_theme_mod('home_decor_shop_banner_short_heading1');
$home_decor_shop_banner_short_heading2 = get_theme_mod('home_decor_shop_banner_short_heading2');
$home_decor_shop_banner_heading1 = get_theme_mod('home_decor_shop_banner_heading1');
$home_decor_shop_banner_heading2 = get_theme_mod('home_decor_shop_banner_heading2');

?>

<section id="home_slider">
	<div class="row m-0">
		<div class="col-lg-8 col-md-8 col-sm-8 px-0">
			<div class="owl-carousel">
				<?php for ($i=1; $i <= $slide_count; $i++) {
					$home_decor_shop_slider_image = get_theme_mod('home_decor_shop_slider_image'.$i);
					$home_decor_shop_slider_short_heading = get_theme_mod('home_decor_shop_slider_short_heading'.$i);
					$home_decor_shop_slider_heading = get_theme_mod('home_decor_shop_slider_heading'.$i);
					$home_decor_shop_slider_text = get_theme_mod('home_decor_shop_slider_text'.$i); 
					$home_decor_shop_slider_button_link = get_theme_mod('home_decor_shop_slider_button_link'.$i); 
					$home_decor_shop_slider_button_text = get_theme_mod('home_decor_shop_slider_button_text'.$i); ?>

					<div class="slider_main_box">
						<?php if ( ! empty( $home_decor_shop_slider_image ) ) : ?>
							<img src="<?php echo esc_url( $home_decor_shop_slider_image ); ?>">
							<div class="slider_content_box">
								<?php if ( ! empty( $home_decor_shop_slider_short_heading ) ) : ?>
									<h6><?php echo esc_html( $home_decor_shop_slider_short_heading ); ?></h6>
								<?php endif; ?>
								<?php if ( ! empty( $home_decor_shop_slider_heading ) ) : ?>
									<h3><?php echo esc_html( $home_decor_shop_slider_heading ); ?></h3>
								<?php endif; ?>
								<?php if ( ! empty( $home_decor_shop_slider_text ) ) : ?>
									<p><?php echo esc_html( $home_decor_shop_slider_text ); ?></p>
								<?php endif; ?>
								<div class="slider_button">
									<?php if ( ! empty( $home_decor_shop_slider_button_link ) || ! empty( $home_decor_shop_slider_button_text ) ): ?>
										<a href="<?php echo esc_url( $home_decor_shop_slider_button_link ); ?>"><?php echo esc_html( $home_decor_shop_slider_button_text ); ?></a>
									<?php endif; ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 pr-md-0">
			<div class="banner-image-1 mb-3">
				<?php if ( ! empty( $home_decor_shop_banner_image1 ) ) : ?>
					<img src="<?php echo esc_url( $home_decor_shop_banner_image1 ); ?>">
					<div class="banner_content_box1">
						<?php if ( ! empty( $home_decor_shop_banner_short_heading1 ) ) : ?>
							<h6><?php echo esc_html( $home_decor_shop_banner_short_heading1 ); ?></h6>
						<?php endif; ?>
						<?php if ( ! empty( $home_decor_shop_banner_heading1 ) ) : ?>
							<h3><?php echo esc_html( $home_decor_shop_banner_heading1 ); ?></h3>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="banner-image-2">
				<?php if ( ! empty( $home_decor_shop_banner_image2 ) ) : ?>
					<img src="<?php echo esc_url( $home_decor_shop_banner_image2 ); ?>">
					<div class="banner_content_box2">
						<?php if ( ! empty( $home_decor_shop_banner_short_heading2 ) ) : ?>
							<h6><?php echo esc_html( $home_decor_shop_banner_short_heading2 ); ?></h6>
						<?php endif; ?>
						<?php if ( ! empty( $home_decor_shop_banner_heading2 ) ) : ?>
							<h3><?php echo esc_html( $home_decor_shop_banner_heading2 ); ?></h3>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<?php endif; ?>