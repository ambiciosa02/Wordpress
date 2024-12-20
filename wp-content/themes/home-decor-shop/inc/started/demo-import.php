<?php 
	if(isset($_GET['import-demo']) && $_GET['import-demo'] == true){
		// ------- Create Nav Menu --------
		$home_decor_shop_menuname ='Primary Menu';
	    $home_decor_shop_bpmenulocation = 'primary_menu';
	    $home_decor_shop_menu_exists = wp_get_nav_menu_object( $home_decor_shop_menuname );
	    if( !$home_decor_shop_menu_exists){
	        $home_decor_shop_menu_id = wp_create_nav_menu($home_decor_shop_menuname);
	        $home_decor_shop_home_parent = wp_update_nav_menu_item($home_decor_shop_menu_id, 0, array(
				'menu-item-title' =>  __('Home','home-decor-shop'),
				'menu-item-classes' => 'home',
				'menu-item-url' =>home_url( '/' ),
				'menu-item-status' => 'publish')
			);

			wp_update_nav_menu_item($home_decor_shop_menu_id, 0, array(
	            'menu-item-title' =>  __('Shop','home-decor-shop'),
	            'menu-item-classes' => 'shop',
	            'menu-item-url' => home_url( '//shop/' ),
	            'menu-item-status' => 'publish'));

	        wp_update_nav_menu_item($home_decor_shop_menu_id, 0, array(
	            'menu-item-title' =>  __('Living Room','home-decor-shop'),
	            'menu-item-classes' => 'living-room',
	            'menu-item-url' => home_url( '//living-room/' ),
	            'menu-item-status' => 'publish'));

			wp_update_nav_menu_item($home_decor_shop_menu_id, 0, array(
	            'menu-item-title' =>  __('Kitchen','home-decor-shop'),
	            'menu-item-classes' => 'kitchen',
	            'menu-item-url' => home_url( '//kitchen/' ),
	            'menu-item-status' => 'publish'));

			wp_update_nav_menu_item($home_decor_shop_menu_id, 0, array(
	            'menu-item-title' =>  __('Decoration','home-decor-shop'),
	            'menu-item-classes' => 'decoration',
	            'menu-item-url' => home_url( '//decoration/' ),
	            'menu-item-status' => 'publish'));

			if( !has_nav_menu( $home_decor_shop_bpmenulocation ) ){
	            $locations = get_theme_mod('nav_menu_locations');
	            $locations[$home_decor_shop_bpmenulocation] = $home_decor_shop_menu_id;
	            set_theme_mod( 'nav_menu_locations', $locations );
	        }
	    }
	    $home_decor_shop_home_id='';
		$home_decor_shop_home_content = '';
		$home_decor_shop_home_title = 'Home';
		$home_decor_shop_home = array(
			'post_type' => 'page',
			'post_title' => $home_decor_shop_home_title,
			'post_content' => $home_decor_shop_home_content,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' => 'home'
		);
		$home_decor_shop_home_id = wp_insert_post($home_decor_shop_home);
	    
		add_post_meta( $home_decor_shop_home_id, '_wp_page_template', 'templates/template-homepage.php' );

		update_option( 'page_on_front', $home_decor_shop_home_id );
		update_option( 'show_on_front', 'page' );

		//---Header--//

		set_theme_mod('home_decor_shop_header_myaccount_feild', '#');
		set_theme_mod('home_decor_shop_header_wishlist_feild', '#');
		set_theme_mod('home_decor_shop_header_timer_feild', '25 March 2025');

		set_theme_mod('home_decor_shop_header_btn_link', '#');
		set_theme_mod('home_decor_shop_header_btn_text', 'Download App');

		//-----Slider-----//

		set_theme_mod( 'home_decor_shop_slide_on_off', 'on' );

		set_theme_mod('home_decor_shop_slide_count','2');

		$home_decor_shop_slider_title=array('New Stylish Sofa For Living Room', 'A Chic New Sofa For The Living Room');

		for ($i=1; $i <= 2; $i++) {
			set_theme_mod( 'home_decor_shop_slider_image'.$i, get_template_directory_uri().'/images/demo-import-images/slides/slide_'.$i.'.png' );
			
			set_theme_mod('home_decor_shop_slider_short_heading'.$i,'20% OFF ON DECORE ITEM');
			set_theme_mod('home_decor_shop_slider_heading'.$i, $home_decor_shop_slider_title[$i - 1]);
			set_theme_mod('home_decor_shop_slider_text'.$i,'Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices grav esdidaisus commodo viverra maecenas accumsan lacus vel facilisis.');
			set_theme_mod('home_decor_shop_slider_button_link'.$i, '#');
			set_theme_mod('home_decor_shop_slider_button_text'.$i, 'Explore More');
		}

		set_theme_mod( 'home_decor_shop_banner_image1', get_template_directory_uri().'/images/demo-import-images/slides/slidebanner-1.png' );
		set_theme_mod('home_decor_shop_banner_short_heading1','20% OFF');
		set_theme_mod('home_decor_shop_banner_heading1','New Stylish Sofa For Living Room');

		set_theme_mod( 'home_decor_shop_banner_image2', get_template_directory_uri().'/images/demo-import-images/slides/slidebanner-2.png' );
		set_theme_mod('home_decor_shop_banner_short_heading2','20% OFF');
		set_theme_mod('home_decor_shop_banner_heading2','A Chic New Sofa For The Living Room');



		//-----Projects-----//

		set_theme_mod( 'home_decor_shop_aboutus_on_off', 'on' );

		set_theme_mod( 'home_decor_shop_aboutus_image1', get_template_directory_uri().'/images/demo-import-images/aboutbanner-1.png' );
		set_theme_mod( 'home_decor_shop_aboutus_image2', get_template_directory_uri().'/images/demo-import-images/aboutbanner-2.png' );
		set_theme_mod( 'home_decor_shop_aboutus_image3', get_template_directory_uri().'/images/demo-import-images/aboutbanner-3.png' );
		set_theme_mod('home_decor_shop_aboutus_heading','ABOUT US');
		set_theme_mod('home_decor_shop_aboutus_main_heading','Decorate Your Life With Arts');
		set_theme_mod('home_decor_shop_aboutus_text','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in.');
		set_theme_mod('home_decor_shop_aboutus_button_link','#');
		set_theme_mod('home_decor_shop_aboutus_button_text','Explore More');

	}
?>