<?php 
	if(isset($_GET['import-demo']) && $_GET['import-demo'] == true){
		// ------- Create Nav Menu --------
		$interior_decor_consultation_menuname ='Main Menus';
	    $interior_decor_consultation_bpmenulocation = 'main-menu';
	    $interior_decor_consultation_menu_exists = wp_get_nav_menu_object( $interior_decor_consultation_menuname );
	    if( !$interior_decor_consultation_menu_exists){
	        $interior_decor_consultation_menu_id = wp_create_nav_menu($interior_decor_consultation_menuname);
	        $interior_decor_consultation_home_parent = wp_update_nav_menu_item($interior_decor_consultation_menu_id, 0, array(
				'menu-item-title' =>  __('Home','interior-decor-consultation'),
				'menu-item-classes' => 'home',
				'menu-item-url' =>home_url( '/' ),
				'menu-item-status' => 'publish')
			);

			wp_update_nav_menu_item($interior_decor_consultation_menu_id, 0, array(
	            'menu-item-title' =>  __('Services','interior-decor-consultation'),
	            'menu-item-classes' => 'services',
	            'menu-item-url' => home_url( '//services/' ), 
	            'menu-item-status' => 'publish'));

	        wp_update_nav_menu_item($interior_decor_consultation_menu_id, 0, array(
	            'menu-item-title' =>  __('Work','interior-decor-consultation'),
	            'menu-item-classes' => 'work',
	            'menu-item-url' => home_url( '//work/' ), 
	            'menu-item-status' => 'publish'));

			wp_update_nav_menu_item($interior_decor_consultation_menu_id, 0, array(
	            'menu-item-title' =>  __('Client','interior-decor-consultation'),
	            'menu-item-classes' => 'client',
	            'menu-item-url' => home_url( '//client/' ), 
	            'menu-item-status' => 'publish'));

			wp_update_nav_menu_item($interior_decor_consultation_menu_id, 0, array(
	            'menu-item-title' =>  __('Team','interior-decor-consultation'),
	            'menu-item-classes' => 'team',
	            'menu-item-url' => home_url( '//team/' ), 
	            'menu-item-status' => 'publish'));

			wp_update_nav_menu_item($interior_decor_consultation_menu_id, 0, array(
	            'menu-item-title' =>  __('Blog','interior-decor-consultation'),
	            'menu-item-classes' => 'blog',
	            'menu-item-url' => home_url( '//blog/' ), 
	            'menu-item-status' => 'publish'));

			wp_update_nav_menu_item($interior_decor_consultation_menu_id, 0, array(
	            'menu-item-title' =>  __('Contact','interior-decor-consultation'),
	            'menu-item-classes' => 'contact',
	            'menu-item-url' => home_url( '//contact/' ), 
	            'menu-item-status' => 'publish'));
	        
			if( !has_nav_menu( $interior_decor_consultation_bpmenulocation ) ){
	            $locations = get_theme_mod('nav_menu_locations');
	            $locations[$interior_decor_consultation_bpmenulocation] = $interior_decor_consultation_menu_id;
	            set_theme_mod( 'nav_menu_locations', $locations );
	        }
	    }
	    $interior_decor_consultation_home_id='';
		$interior_decor_consultation_home_content = '';
		$interior_decor_consultation_home_title = 'Home';
		$interior_decor_consultation_home = array(
			'post_type' => 'page',
			'post_title' => $interior_decor_consultation_home_title,
			'post_content' => $interior_decor_consultation_home_content,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' => 'home'
		);
		$interior_decor_consultation_home_id = wp_insert_post($interior_decor_consultation_home);
	    
		add_post_meta( $interior_decor_consultation_home_id, '_wp_page_template', 'frontpage.php' );

		update_option( 'page_on_front', $interior_decor_consultation_home_id );
		update_option( 'show_on_front', 'page' );

		//---Header--//

		set_theme_mod( 'interior_decor_consultation_header_button', '#');

		//-----Slider-----//

		set_theme_mod( 'interior_decor_consultation_blog_box_enable', true);

		set_theme_mod( 'interior_decor_consultation_blog_slide_number', '3' );
		$interior_decor_consultation_latest_post_category = wp_create_category('Slider Post');
			set_theme_mod( 'interior_decor_consultation_blog_slide_category', 'Slider Post' ); 

		for($i=1; $i<=3; $i++) {

			$title =   'We Craft Affordable Design';
			$content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam';

			$interior_decor_consultation_extra_text=array('25% Dicount On Your First Design', '50% Dicount On Wallpaper', '30% Dicount On Chairs');

			set_theme_mod( 'interior_decor_consultation_slider_extra_text'.$i, $interior_decor_consultation_extra_text[$i-1]);

			set_theme_mod( 'interior_decor_consultation_slider1_'.$i, get_template_directory_uri().'/assets/images/image1_'.$i.'.png' );
			set_theme_mod( 'interior_decor_consultation_slider2_'.$i, get_template_directory_uri().'/assets/images/image2_'.$i.'.png' );

			// Create post object
			$interior_decor_consultation_my_post = array(
				'post_title'    => wp_strip_all_tags( $title ),
				'post_content'  => $content,
				'post_status'   => 'publish',
				'post_type'     => 'post',
				'post_category' => array($interior_decor_consultation_latest_post_category) 
			);

			// Insert the post into the database
			$interior_decor_consultation_post_id = wp_insert_post( $interior_decor_consultation_my_post );

			$interior_decor_consultation_image_url = get_template_directory_uri().'/assets/images/slider.png';

			$interior_decor_consultation_image_name = 'slider.png';
			$interior_decor_consultation_upload_dir = wp_upload_dir(); 
			// Set upload folder
			$interior_decor_consultation_image_data = file_get_contents($interior_decor_consultation_image_url); 
			 
			// Get image data
			$interior_decor_consultation_unique_file_name = wp_unique_filename( $interior_decor_consultation_upload_dir['path'], $interior_decor_consultation_image_name ); 
			// Generate unique name
			$filename= basename( $interior_decor_consultation_unique_file_name ); 
			// Create image file name
			// Check folder permission and define file location
			if( wp_mkdir_p( $interior_decor_consultation_upload_dir['path'] ) ) {
				$file = $interior_decor_consultation_upload_dir['path'] . '/' . $filename;
			} else {
				$file = $interior_decor_consultation_upload_dir['basedir'] . '/' . $filename;
			}
			file_put_contents( $file, $interior_decor_consultation_image_data );
			$interior_decor_consultation_wp_filetype = wp_check_filetype( $filename, null );
			$interior_decor_consultation_attachment = array(
				'post_mime_type' => $interior_decor_consultation_wp_filetype['type'],
				'post_title'     => sanitize_file_name( $filename ),
				'post_content'   => '',
				'post_type'     => 'post',
				'post_status'    => 'inherit'
			);
			$interior_decor_consultation_attach_id = wp_insert_attachment( $interior_decor_consultation_attachment, $file, $interior_decor_consultation_post_id );
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$interior_decor_consultation_attach_data = wp_generate_attachment_metadata( $interior_decor_consultation_attach_id, $file );
				wp_update_attachment_metadata( $interior_decor_consultation_attach_id, $interior_decor_consultation_attach_data );
				set_post_thumbnail( $interior_decor_consultation_post_id, $interior_decor_consultation_attach_id );
		}

		//--------------Project Section-----------//

		set_theme_mod( 'interior_decor_consultation_projects_section_enable', true);

		set_theme_mod( 'interior_decor_consultation_projects_heading', 'Our Projects');
		
		$interior_decor_consultation_case_studies_category = wp_create_category('Projects');
		for($i=1; $i<=7; $i++) {
			 
			$tab_name=array('All', 'Bathroom', 'Building', 'Decor', 'Furniture', 'Kitchen','Living');
			set_theme_mod( 'interior_decor_consultation_projects_text'.$i, $tab_name[$i-1] );

  		    set_theme_mod( 'interior_decor_consultation_projects_category'.$i, 'Projects' ); 

		}

        set_theme_mod( 'interior_decor_consultation_projects_number', 7);

		for($i=1; $i<=3; $i++) {

			$title =   'The Interior Design';
			$content = 'Quick sales business plan agile development equity churn rate social proof crowdsource iPhone ownership entrepreneur lean...';
			

			// Create post object
			$my_post = array(
				'post_title'    => wp_strip_all_tags( $title ),
				'post_content'  => $content,
				'post_status'   => 'publish',
				'post_type'     => 'post',
				'post_category' => array($interior_decor_consultation_case_studies_category) 
			);

			// Insert the post into the database
			$post_id = wp_insert_post( $my_post );
			
			$image_url = get_template_directory_uri().'/assets/images/projects'.$i.'.png';

			$image_name= 'projects'.$i.'.png';
			$upload_dir       = wp_upload_dir(); 
			// Set upload folder
			$image_data       = file_get_contents($image_url); 

			// Get image data
			$unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); 
			// Generate unique name
			$filename= basename( $unique_file_name ); 
			// Create image file name
			// Check folder permission and define file location
			if( wp_mkdir_p( $upload_dir['path'] ) ) {
				$file = $upload_dir['path'] . '/' . $filename;
			} else {
				$file = $upload_dir['basedir'] . '/' . $filename;
			}
			file_put_contents( $file, $image_data );
			$wp_filetype = wp_check_filetype( $filename, null );
			$attachment = array(
				'post_mime_type' => $wp_filetype['type'],
				'post_title'     => sanitize_file_name( $filename ),
				'post_content'   => '',
				'post_type'     => 'post',
				'post_status'    => 'inherit',
			);
			$attach_id = wp_insert_attachment( $attachment, $file, $post_id );
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$attach_data = wp_generate_attachment_metadata( $attach_id, $file );
				wp_update_attachment_metadata( $attach_id, $attach_data );
				set_post_thumbnail( $post_id, $attach_id );
		}
		
	}
?>