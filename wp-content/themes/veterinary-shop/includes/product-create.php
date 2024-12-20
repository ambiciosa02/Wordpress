<?php

class Whizzie {

	public function __construct() {
		$this->init();
	}

	public function init()
	{
	
	}

	public static function veterinary_shop_setup_widgets(){

	$veterinary_shop_product_image_gallery = array();
	$veterinary_shop_product_ids = array();

	$veterinary_shop_product_category= array(
		'Product Category'       => array(
			'Product Title 01',
			'Product Title 02',
			'Product Title 03',
			'Product Title 04',
		),
	);

	$veterinary_shop_k = 1;
	foreach ( $veterinary_shop_product_category as $veterinary_shop_product_cats => $veterinary_shop_products_name ) { 
	// Insert porduct cats Start
	$content = 'This is sample product category';
	$veterinary_shop_parent_category	=	wp_insert_term(
	$veterinary_shop_product_cats, // the term
	'product_cat', // the taxonomy
		array(
		'description'=> $content,
		'slug' => str_replace( ' ', '-', $veterinary_shop_product_cats)
		)
	);

// -------------- create subcategory END -----------------

	$veterinary_shop_n=1;
	// create Product START
	foreach ( $veterinary_shop_products_name as $key => $veterinary_shop_product_title ) {
	$content = '
		<div class="main_content">
		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
		</div>';

	// Create post object
	$veterinary_shop_my_post = array(
		'post_title'    => wp_strip_all_tags( $veterinary_shop_product_title ),
		'post_content'  => $content,
		'post_status'   => 'publish',
		'post_type'     => 'product',
		'post_category' => [$veterinary_shop_parent_category['term_id']]
	);

	// Insert the post into the database

	$veterinary_shop_uqpost_id = wp_insert_post($veterinary_shop_my_post);
	wp_set_object_terms( $veterinary_shop_uqpost_id, str_replace( ' ', '-', $veterinary_shop_product_cats), 'product_cat', true );

	$veterinary_shop_product_price = array('49','49','49','49');
	$veterinary_shop_product_regular_price = array('99','99','99','99');
	$veterinary_shop_product_sale_price = array('49','49','49','49');
	
	update_post_meta( $veterinary_shop_uqpost_id, '_regular_price', $veterinary_shop_product_regular_price[$veterinary_shop_n-1] );
	update_post_meta( $veterinary_shop_uqpost_id, '_price', $veterinary_shop_product_price[$veterinary_shop_n-1] );
	update_post_meta( $veterinary_shop_uqpost_id, '_sale_price', $veterinary_shop_product_sale_price[$veterinary_shop_n-1] );
	array_push( $veterinary_shop_product_ids,  $veterinary_shop_uqpost_id );

	// Now replace meta w/ new updated value array
	$veterinary_shop_image_url = get_template_directory_uri().'/assets/images/product/'.$veterinary_shop_product_cats.'/' . str_replace(' ', '_', strtolower($veterinary_shop_product_title)).'.png';
	$veterinary_shop_image_name  = $veterinary_shop_product_title.'.png';
	$veterinary_shop_upload_dir = wp_upload_dir();
	// Set upload folder
	$veterinary_shop_image_data = file_get_contents(esc_url($veterinary_shop_image_url));
	// Get image data
	$unique_file_name = wp_unique_filename($veterinary_shop_upload_dir['path'], $veterinary_shop_image_name);
	// Generate unique name
	$veterinary_shop_filename = basename($unique_file_name);
	// Create image file name
	// Check folder permission and define file location
	if (wp_mkdir_p($veterinary_shop_upload_dir['path'])) {
	$veterinary_shop_file = $veterinary_shop_upload_dir['path'].'/'.$veterinary_shop_filename;
	} else {
	$veterinary_shop_file = $veterinary_shop_upload_dir['basedir'].'/'.$veterinary_shop_filename;
	}
	
	file_put_contents($veterinary_shop_file, $veterinary_shop_image_data);
	// Check image file type
	$wp_filetype = wp_check_filetype($veterinary_shop_filename, null);
	// Set attachment data
	$attachment = array(
		'post_mime_type' => $wp_filetype['type'],
		'post_title'     => sanitize_file_name($veterinary_shop_filename),
		'post_type'      => 'product',
		'post_status'    => 'inherit',
	);

	// Create the attachment
	$veterinary_shop_attach_id = wp_insert_attachment($attachment, $veterinary_shop_file, $veterinary_shop_uqpost_id);

	// Define attachment metadata
	$attach_data = wp_generate_attachment_metadata($veterinary_shop_attach_id, $veterinary_shop_file);

	// Assign metadata to attachment
	wp_update_attachment_metadata($veterinary_shop_attach_id, $attach_data);
	if ( count( $veterinary_shop_product_image_gallery ) < 3 ) {
		array_push( $veterinary_shop_product_image_gallery, $veterinary_shop_attach_id );
	}
	// // And finally assign featured image to post
	set_post_thumbnail($veterinary_shop_uqpost_id, $veterinary_shop_attach_id);
	++$veterinary_shop_n;
	}
	// Create product END
	++$veterinary_shop_k;
	}
	// Add Gallery in first simple product and second variable product START
	$veterinary_shop_product_image_gallery = implode( ',', $veterinary_shop_product_image_gallery );
	foreach ( $veterinary_shop_product_ids as $veterinary_shop_product_id ) {
	update_post_meta( $veterinary_shop_product_id, 'veterinary_shop_product_image_gallery', $veterinary_shop_product_image_gallery );
	}
}

}
 