<?php if ( true == get_theme_mod( 'home_decor_shop_aboutus_on_off', 'off' ) ) : ?>

<?php 

$home_decor_shop_aboutus_image1 = get_theme_mod('home_decor_shop_aboutus_image1');
$home_decor_shop_aboutus_image2 = get_theme_mod('home_decor_shop_aboutus_image2');
$home_decor_shop_aboutus_image3 = get_theme_mod('home_decor_shop_aboutus_image3');
$home_decor_shop_aboutus_heading = get_theme_mod('home_decor_shop_aboutus_heading');
$home_decor_shop_aboutus_main_heading = get_theme_mod('home_decor_shop_aboutus_main_heading');
$home_decor_shop_aboutus_text = get_theme_mod('home_decor_shop_aboutus_text');
$home_decor_shop_aboutus_button_text = get_theme_mod('home_decor_shop_aboutus_button_text');
$home_decor_shop_aboutus_button_link = get_theme_mod('home_decor_shop_aboutus_button_link');

?>

<section id="home_aboutus" class="py-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 align-self-center">
				<div class="row mb-3">
					<div class="col-lg-6 col-md-6 col-sm-6 align-self-center">
						<?php if ( ! empty( $home_decor_shop_aboutus_image1 ) ) : ?>
							<img class="mb-3 mb-md-0" src="<?php echo esc_url( $home_decor_shop_aboutus_image1 ); ?>">
						<?php endif; ?>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 align-self-center">
						<?php if ( ! empty( $home_decor_shop_aboutus_image2 ) ) : ?>
							<img src="<?php echo esc_url( $home_decor_shop_aboutus_image2 ); ?>">
						<?php endif; ?>
					</div>
				</div>
				<?php if ( ! empty( $home_decor_shop_aboutus_image3 ) ) : ?>
					<img class="about_image_3 mb-3 mb-md-0" src="<?php echo esc_url( $home_decor_shop_aboutus_image3 ); ?>">
				<?php endif; ?>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 align-self-center">
				<div class="aboutus_main_box">
					<?php if ( ! empty( $home_decor_shop_aboutus_heading ) ) : ?>
						<h6><?php echo esc_html( $home_decor_shop_aboutus_heading ); ?></h6>
					<?php endif; ?>
					<?php if ( ! empty( $home_decor_shop_aboutus_main_heading ) ) : ?>
						<h3 class="my-4"><?php echo esc_html( $home_decor_shop_aboutus_main_heading ); ?></h3>
					<?php endif; ?>
					<?php if ( ! empty( $home_decor_shop_aboutus_text ) ) : ?>
						<p class="mb-0"><?php echo esc_html( $home_decor_shop_aboutus_text ); ?></p>
					<?php endif; ?>
					<div class="slider_button mt-4">
						<?php if ( ! empty( $home_decor_shop_aboutus_button_link ) || ! empty( $home_decor_shop_aboutus_button_text ) ): ?>
							<a href="<?php echo esc_url( $home_decor_shop_aboutus_button_link ); ?>"><?php echo esc_html( $home_decor_shop_aboutus_button_text ); ?></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php endif; ?>