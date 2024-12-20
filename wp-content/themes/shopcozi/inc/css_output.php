<?php
if ( ! function_exists( 'shopcozi_get_dynamic_css' ) ) :
	function shopcozi_get_dynamic_css() {

		$option = shopcozi_theme_options();

		// Calling Shopcozi_CSS class for generate dynamic css
		$pro_css = new Shopcozi_CSS;

		// $body_bg_color = get_background_color();
		// if($body_bg_color==''){
		// 	$body_bg_color = 'ffffff';
		// }
		// list($body_r, $body_g, $body_b) = sscanf( '#'.$body_bg_color, "#%02x%02x%02x" );

		$logo_width = json_decode($option['shopcozi_h_logo_width']);
		$site_title = json_decode($option['shopcozi_h_site_title_fontsize']);
		$site_desc = json_decode($option['shopcozi_h_site_desc_fontsize']);

		$breadcrumb_bg_color = $option['shopcozi_breadcrumb_bg_color'];
		$breadcrumb_bg_image = $option['shopcozi_breadcrumb_bg_image'];
		$breadcrumb_attachment = $option['shopcozi_breadcrumb_attachment'];
		$breadcrumb_repeat = $option['shopcozi_breadcrumb_repeat'];
		$breadcrumb_position = $option['shopcozi_breadcrumb_position'];
		$breadcrumb_size = $option['shopcozi_breadcrumb_size'];
		$breadcrumb_overlay = $option['shopcozi_breadcrumb_overlay'];
		$breadcrumb_height = json_decode($option['shopcozi_breadcrumb_height']);
	    
	    $slider_r_height = isset($option['shopcozi_slider_r_height'])?json_decode($option['shopcozi_slider_r_height']):166;

		$footer_bg_color = $option['shopcozi_footer_bg_color'];
		$footer_bg_image = $option['shopcozi_footer_bg_image'];
		$footer_attachment = $option['shopcozi_footer_bg_attachment'];
		$footer_repeat = $option['shopcozi_footer_bg_repeat'];
		$footer_position = $option['shopcozi_footer_bg_position'];
		$footer_size = $option['shopcozi_footer_bg_size'];
		$footer_overlay = $option['shopcozi_footer_overlay'];

		// Accent color 1
		$accent_color1 = $option['shopcozi_accent_color1'];
		list($r, $g, $b) = sscanf( $accent_color1, "#%02x%02x%02x" );

		// Accent color 2
		$accent_color2 = $option['shopcozi_accent_color2'];
		list($accent2_r, $accent2_g, $accent2_b) = sscanf( $accent_color2, "#%02x%02x%02x" );

		// Secondary Color
		$secondary_color = $option['shopcozi_secondary_color'];
		list($secondary_r, $secondary_g, $secondary_b) = sscanf( $secondary_color, "#%02x%02x%02x" );
		
		// All Root Vaiables
		$pro_css->set_selector( ':root' );		
		$pro_css->add_property( '--bs-primary', esc_attr($accent_color1));
		$pro_css->add_property( '--bs-primary-rgb', esc_attr($r).', '.esc_attr($g).', '.esc_attr($b));
		$pro_css->add_property( '--bs-primary-light', 'rgba('.esc_attr($r).', '.esc_attr($g).', '.esc_attr($b).', 5%)');
		$pro_css->add_property( '--bs-complementary', esc_attr($accent_color2));
		$pro_css->add_property( '--bs-complementary-rgb', esc_attr($accent2_r).', '.esc_attr($accent2_g).', '.esc_attr($accent2_b));
		$pro_css->add_property( '--bs-complementary-light', 'rgba('.esc_attr($accent2_r).', '.esc_attr($accent2_g).', '.esc_attr($accent2_b).', 5%)');
		$pro_css->add_property( '--bs-secondary', esc_attr($secondary_color));
		$pro_css->add_property( '--bs-secondary-rgb', esc_attr($secondary_r).', '.esc_attr($secondary_g).', '.esc_attr($secondary_b));
		$pro_css->add_property( '--bs-secondary-light', 'rgba('.esc_attr($secondary_r).', '.esc_attr($secondary_g).', '.esc_attr($secondary_b).', 5%)');

		$custom_header = get_custom_header();
		$header_image = '';
		if ( ! empty( $custom_header->attachment_id ) ) {
			$header_image = wp_get_attachment_image_url( $custom_header->attachment_id, 'full' );
		}
		$pro_css->add_property( '--header-image', 'url("'.esc_url($header_image).'")');

		$pro_css->add_property( '--breadcrumb-bg-color', esc_attr($breadcrumb_bg_color));
		$pro_css->add_property( '--breadcrumb-bg-image', 'url("'.esc_url($breadcrumb_bg_image).'")');
		$pro_css->add_property( '--breadcrumb-bg-attachment', esc_attr($breadcrumb_attachment));
		$pro_css->add_property( '--breadcrumb-bg-repeat', esc_attr($breadcrumb_repeat));
		$pro_css->add_property( '--breadcrumb-bg-position', esc_attr($breadcrumb_position));
		$pro_css->add_property( '--breadcrumb-bg-size', esc_attr($breadcrumb_size));
		$pro_css->add_property( '--breadcrumb-bg-overlay', esc_attr($breadcrumb_overlay));

		$pro_css->add_property( '--footer-bg-color', esc_attr($footer_bg_color));
		$pro_css->add_property( '--footer-bg-image', 'url("'.esc_url($footer_bg_image).'")');
		$pro_css->add_property( '--footer-bg-attachment', esc_attr($footer_attachment));
		$pro_css->add_property( '--footer-bg-repeat', esc_attr($footer_repeat));
		$pro_css->add_property( '--footer-bg-position', esc_attr($footer_position));
		$pro_css->add_property( '--footer-bg-size', esc_attr($footer_size));
		$pro_css->add_property( '--footer-bg-overlay', esc_attr($footer_overlay));	

		// Only Typography settings here
		$typo_sections = array('body','h1','h2','h3','h4','h5','h6');
		foreach($typo_sections as $sec) {
			$sec_fontsize = json_decode($option['shopcozi_'.$sec.'_fontsize']);
			$sec_lineheight = json_decode($option['shopcozi_'.$sec.'_lineheight']);
			$sec_letterspace = json_decode($option['shopcozi_'.$sec.'_letterspace']);
			$sec_fontweight = $option['shopcozi_'.$sec.'_fontweight'];
			$sec_texttransform = $option['shopcozi_'.$sec.'_texttransform'];

			$pro_css->set_selector( $sec );
			
			// Font Weight
			if($sec_fontweight!=''){
				$pro_css->add_property( 'font-weight', esc_attr($sec_fontweight));
			}
			
			// Text Transform
			if($sec_texttransform!=''){
				$pro_css->add_property( 'text-transform', esc_attr($sec_texttransform));
			}			

			// Desktop CSS
			$pro_css->start_media_query( apply_filters( 'shopcozi_'.$sec.'_desktop_media_query', '(min-width:991px)' ) );
				$pro_css->set_selector( $sec );
				if(isset($sec_fontsize->desktop)){
					$pro_css->add_property( 'font-size', esc_attr($sec_fontsize->desktop).'px' );
				}
				if(isset($sec_lineheight->desktop)){
				$pro_css->add_property( 'line-height', esc_attr($sec_lineheight->desktop) );
				}
				if(isset($sec_letterspace->desktop)){
				$pro_css->add_property( 'letter-spacing', esc_attr($sec_letterspace->desktop).'px' );
				}			
			$pro_css->stop_media_query();

			// Tablet CSS
			$pro_css->start_media_query( apply_filters( 'shopcozi_'.$sec.'_tablet_media_query', '(min-width:768px) and (max-width:991px)' ) );
				$pro_css->set_selector( $sec );
				if(isset($sec_fontsize->tablet)){
					$pro_css->add_property( 'font-size', esc_attr($sec_fontsize->tablet).'px' );
				}
				if(isset($sec_lineheight->tablet)){
				$pro_css->add_property( 'line-height', esc_attr($sec_lineheight->tablet) );
				}
				if(isset($sec_letterspace->tablet)){
				$pro_css->add_property( 'letter-spacing', esc_attr($sec_letterspace->tablet).'px' );
				}
			$pro_css->stop_media_query();

			// Mobile CSS
			$pro_css->start_media_query( apply_filters( 'shopcozi_'.$sec.'_mobile_media_query', '(max-width:768px)' ) );
				$pro_css->set_selector( $sec );
				if(isset($sec_fontsize->mobile)){
					$pro_css->add_property( 'font-size', esc_attr($sec_fontsize->mobile).'px' );
				}
				if(isset($sec_lineheight->mobile)){
				$pro_css->add_property( 'line-height', esc_attr($sec_lineheight->mobile) );
				}
				if(isset($sec_letterspace->mobile)){
				$pro_css->add_property( 'letter-spacing', esc_attr($sec_letterspace->mobile).'px' );
				}
			$pro_css->stop_media_query();
		}

		// Desktop CSS
		$pro_css->start_media_query( apply_filters( 'shopcozi_desktop_media_query', '(min-width:991px)' ) );
			if(isset($logo_width->desktop)){
				$pro_css->set_selector('.site-logo img');
				$pro_css->add_property('max-width', esc_attr($logo_width->desktop).'px');
			}

			if(isset($site_title->desktop)){
				$pro_css->set_selector('.site-title');
				$pro_css->add_property('font-size', esc_attr($site_title->desktop).'px');
			}

			if(isset($site_desc->desktop)){
				$pro_css->set_selector('.site-description' );
				$pro_css->add_property('font-size', esc_attr($site_desc->desktop).'px');
			}

			if(isset($breadcrumb_height->desktop)){
				$pro_css->set_selector('.breadcrumb-section' );
				$pro_css->add_property('min-height', esc_attr($breadcrumb_height->desktop).'px');
			}

			if(isset($slider_r_height->desktop)){
				$pro_css->set_selector('.slider-info' );
				$pro_css->add_property('min-height', esc_attr($slider_r_height->desktop).'px');
				$pro_css->add_property('max-height', esc_attr($slider_r_height->desktop).'px');
			}
		$pro_css->stop_media_query();

		// Tablet CSS
		$pro_css->start_media_query( apply_filters( 'shopcozi_tablet_media_query', '(min-width:768px) and (max-width:991px)' ) );
			if(isset($logo_width->tablet)){
				$pro_css->set_selector('.site-logo img');
				$pro_css->add_property('max-width', esc_attr($logo_width->tablet).'px');
			}

			if(isset($site_title->tablet)){
				$pro_css->set_selector('.site-title');
				$pro_css->add_property('font-size', esc_attr($site_title->tablet).'px');
			}

			if(isset($site_desc->tablet)){
				$pro_css->set_selector('.site-description' );
				$pro_css->add_property('font-size', esc_attr($site_desc->tablet).'px');
			}

			if(isset($breadcrumb_height->tablet)){
				$pro_css->set_selector('.breadcrumb-section' );
				$pro_css->add_property('min-height', esc_attr($breadcrumb_height->tablet).'px');
			}

			if(isset($slider_r_height->tablet)){
				$pro_css->set_selector('.slider-info' );
				$pro_css->add_property('min-height', esc_attr($slider_r_height->tablet).'px');
				$pro_css->add_property('max-height', esc_attr($slider_r_height->tablet).'px');
			}
		$pro_css->stop_media_query();

		// Mobile CSS
		$pro_css->start_media_query( apply_filters( 'shopcozi_mobile_media_query', '(max-width:768px)' ) );
			if(isset($logo_width->mobile)){
				$pro_css->set_selector('.site-logo img');
				$pro_css->add_property('max-width', esc_attr($logo_width->mobile).'px');
			}

			if(isset($site_title->mobile)){
				$pro_css->set_selector('.site-title');
				$pro_css->add_property('font-size', esc_attr($site_title->mobile).'px');
			}

			if(isset($site_desc->mobile)){
				$pro_css->set_selector('.site-description');
				$pro_css->add_property('font-size', esc_attr($site_desc->mobile).'px');
			}

			if(isset($breadcrumb_height->mobile)){
				$pro_css->set_selector('.breadcrumb-section' );
				$pro_css->add_property('min-height', esc_attr($breadcrumb_height->mobile).'px');
			}

			if(isset($slider_r_height->mobile)){
				$pro_css->set_selector('.slider-info' );
				$pro_css->add_property('min-height', esc_attr($slider_r_height->mobile).'px');
				$pro_css->add_property('max-height', esc_attr($slider_r_height->mobile).'px');
			}
		$pro_css->stop_media_query();

		return apply_filters( 'shopcozi_pro_dynamic_css', wp_strip_all_tags( $pro_css->css_output() ) );
	}
endif;

if ( ! function_exists( 'shopcozi_enqueue_dynamic_css' ) ) :
	function shopcozi_enqueue_dynamic_css() {
		$css = shopcozi_get_dynamic_css();
		wp_add_inline_style( 'shopcozi-style', wp_strip_all_tags( $css ) );
	}
	add_action( 'wp_enqueue_scripts', 'shopcozi_enqueue_dynamic_css');
endif;