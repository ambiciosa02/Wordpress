<?php
$option = shopcozi_theme_options();
$page_options = shopcozi_get_page_options();
$container_class = $option['shopcozi_footer_container_width'];

if($page_options['sc_footer_container_width']=='0'){
	$container_class = $container_class;
}else{
	$container_class = $page_options['sc_footer_container_width'];
}

$footer_copyright = $option['shopcozi_footer_copyright'];
if( SHOPCOZI_THEME_NAME == 'Shopcozi Pro' && $footer_copyright!='' ){
  $ft_copyright = $footer_copyright;
}else{
	if($footer_copyright!=''){
		$ft_copyright = $footer_copyright;
	}else{
		$ft_copyright = sprintf( __( 'Copyright %1$s %2$s %3$s <span>&ndash;</span>', 'shopcozi' ), '&copy;', esc_attr( date( 'Y' ) ), esc_attr( get_bloginfo() ) );
	}

	$theme = wp_get_theme();
  if( $theme->parent() ){
      $theme_name = $theme->parent()->get('Name');
      $theme_textdomain = $theme->parent()->get('TextDomain');
  }else{
      $theme_name = $theme->get('Name');
      $theme_textdomain = $theme->get('TextDomain');
  }
  
  $active_theme_name = $theme->get('Name');

  $ft_copyright .= sprintf( __( ' %1$s theme by %2$s', 'shopcozi' ), '<a href="' . esc_url( 'https://www.britetechs.com/', 'shopcozi' ) . '">'.esc_html($active_theme_name).'</a>', 'Britetechs' );
}

$options = array(
	'%current_year%',
	'%copy%'
);

$replace = array(
	date('Y'),
	'&copy;'
);

$copyright = str_replace( $options, $replace, $ft_copyright );

if($option['shopcozi_footer_copyright_show']==true){
?>
<div class="footer-bottom wow animate__animated animate__fadeInUp">
	<div class="<?php echo esc_attr($container_class); ?>">
		<div class="row g-lg-0 g-md-0 g-4 align-items-center justify-content-center mt-4">
			<?php if($copyright!=''){ ?>
			<div class="col-lg-6 col-md-6 col-12 text-lg-start text-center order-lg-1 order-md-1 order-2">
				<div class="copyright"><?php echo wp_kses_post($copyright); ?></div>
			</div>
			<?php } ?>			
		</div>
	</div>
</div>
<?php } ?>