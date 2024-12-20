<?php

/*-----------------------------------------------------------------------------------*/
/* Enqueue script and styles */
/*-----------------------------------------------------------------------------------*/

function interior_decor_consultation_enqueue_google_fonts() {

	require_once get_theme_file_path( 'core/includes/wptt-webfont-loader.php' );

	wp_enqueue_style(
		'google-fonts-archivo',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap' ),
		array(),
		'1.0'
	);
	
}
add_action( 'wp_enqueue_scripts', 'interior_decor_consultation_enqueue_google_fonts' );

if (!function_exists('interior_decor_consultation_enqueue_scripts')) {

	function interior_decor_consultation_enqueue_scripts() {

		wp_enqueue_style(
			'bootstrap-css',
			get_template_directory_uri() . '/css/bootstrap.css',
			array(),'4.5.0'
		);

		wp_enqueue_style(
			'fontawesome-css',
			get_template_directory_uri() . '/css/fontawesome-all.css',
			array(),'4.5.0'
		);

		wp_enqueue_style(
			'owl.carousel-css',
			get_template_directory_uri() . '/css/owl.carousel.css',
			array(),'2.3.4'
		);

		wp_enqueue_style('interior-decor-consultation-style', get_stylesheet_uri(), array() );

		wp_enqueue_style('dashicons');

		wp_style_add_data('interior-decor-consultation-style', 'rtl', 'replace');

		wp_enqueue_style(
			'interior-decor-consultation-media-css',
			get_template_directory_uri() . '/css/media.css',
			array(),'2.3.4'
		);

		wp_enqueue_style(
			'interior-decor-consultation-woocommerce-css',
			get_template_directory_uri() . '/css/woocommerce.css',
			array(),'2.3.4'
		);

		wp_enqueue_script(
			'interior-decor-consultation-navigation',
			get_template_directory_uri() . '/js/navigation.js',
			FALSE,
			'1.0',
			TRUE
		);

		wp_enqueue_script(
			'owl.carousel-js',
			get_template_directory_uri() . '/js/owl.carousel.js',
			array('jquery'),
			'2.3.4',
			TRUE
		);

		wp_enqueue_script(
			'interior-decor-consultation-script',
			get_template_directory_uri() . '/js/script.js',
			array('jquery'),
			'1.0',
			TRUE
		);


		if ( get_theme_mod( 'interior_decor_consultation_animation_enabled', true ) ) {
		        wp_enqueue_script(
		            'interior-decor-consultation-wow-script',
		            get_template_directory_uri() . '/js/wow.js',
		            array( 'jquery' ),
		            '1.0',
		            true
		        );

		        wp_enqueue_style(
		            'interior-decor-consultation-animate',
		            get_template_directory_uri() . '/css/animate.css',
		            array(),
		            '4.1.1'
		        );
		    }

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

		$interior_decor_consultation_css = '';

		if ( get_header_image() ) :

			$interior_decor_consultation_css .=  '
				header#site-navigation, .page-template-frontpage #site-navigation{
					background-image: url('.esc_url(get_header_image()).');
					-webkit-background-size: cover !important;
					-moz-background-size: cover !important;
					-o-background-size: cover !important;
					background-size: cover !important;
				}';

		endif;

		wp_add_inline_style( 'interior-decor-consultation-style', $interior_decor_consultation_css );

		// Theme Customize CSS.
		require get_template_directory(). '/core/includes/inline.php';
		wp_add_inline_style( 'interior-decor-consultation-style',$interior_decor_consultation_custom_css );

	}

	add_action( 'wp_enqueue_scripts', 'interior_decor_consultation_enqueue_scripts' );
}

/*-----------------------------------------------------------------------------------*/
/* Setup theme */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('interior_decor_consultation_after_setup_theme')) {

	function interior_decor_consultation_after_setup_theme() {

		load_theme_textdomain( 'interior-decor-consultation', get_stylesheet_directory() . '/languages' );
		if ( ! isset( $interior_decor_consultation_content_width ) ) $interior_decor_consultation_content_width = 900;

		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main Menu', 'interior-decor-consultation' ),
		));

		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'align-wide' );
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support( 'wp-block-styles' );
		add_theme_support('post-thumbnails');
		add_theme_support( 'custom-background', array(
		  'default-color' => 'f4f4f4'
		));

		add_theme_support( 'custom-logo', array(
			'height'      => 70,
			'width'       => 70,
		) );

		add_theme_support( 'custom-header', array(
			'header-text' => false,
			'width' => 1920,
			'height' => 100
		));

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

		add_editor_style( array( '/css/editor-style.css' ) );
	}

	add_action( 'after_setup_theme', 'interior_decor_consultation_after_setup_theme', 999 );

}

require get_template_directory() .'/core/includes/theme-breadcrumb.php';
require get_template_directory() .'/core/includes/tgm.php';
require get_template_directory() .'/core/includes/customizer.php';
require get_template_directory() .'/core/includes/main.php';

load_template( trailingslashit( get_template_directory() ) . '/core/includes/class-upgrade-pro.php' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue theme logo style */
/*-----------------------------------------------------------------------------------*/
function interior_decor_consultation_logo_resizer() {

    $interior_decor_consultation_theme_logo_size_css = '';
    $interior_decor_consultation_logo_resizer = get_theme_mod('interior_decor_consultation_logo_resizer');

	$interior_decor_consultation_theme_logo_size_css = '
		.custom-logo{
			height: '.esc_attr($interior_decor_consultation_logo_resizer).'px !important;
			width: '.esc_attr($interior_decor_consultation_logo_resizer).'px !important;
		}
	';
    wp_add_inline_style( 'interior-decor-consultation-style',$interior_decor_consultation_theme_logo_size_css );

}
add_action( 'wp_enqueue_scripts', 'interior_decor_consultation_logo_resizer' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Global color style */
/*-----------------------------------------------------------------------------------*/
function interior_decor_consultation_global_color() {

    $interior_decor_consultation_theme_color_css = '';
    $interior_decor_consultation_global_color = get_theme_mod('interior_decor_consultation_global_color');
    $interior_decor_consultation_copyright_bg = get_theme_mod('interior_decor_consultation_copyright_bg');

	$interior_decor_consultation_theme_color_css = '
		p.slider-button a,#main-menu ul.children ,#main-menu ul.sub-menu,.wp-block-woocommerce-cart .wc-block-cart__submit-button, .wc-block-components-checkout-place-order-button, .wc-block-components-totals-coupon__button,.wp-block-woocommerce-cart .wc-block-components-product-badge,.scroll-up a,.pagination .nav-links a:hover,.pagination .nav-links a:focus,.pagination .nav-links span.current,.interior-decor-consultation-pagination span.current,.interior-decor-consultation-pagination span.current:hover,.interior-decor-consultation-pagination span.current:focus,.interior-decor-consultation-pagination a span:hover,.interior-decor-consultation-pagination a span:focus,.woocommerce nav.woocommerce-pagination ul li span.current,.comment-respond input#submit,.comment-reply a,.sidebar-area h4.title, .sidebar-area h1.wp-block-heading,.sidebar-area h2.wp-block-heading,.sidebar-area h3.wp-block-heading,.sidebar-area h4.wp-block-heading,.sidebar-area h5.wp-block-heading,.sidebar-area h6.wp-block-heading,.sidebar-area .wp-block-search__label,.sidebar-area .tagcloud a,.searchform input[type=submit], .sidebar-area .wp-block-search__button,nav.woocommerce-MyAccount-navigation ul li,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce a.added_to_cart,.wp-block-woocommerce-cart .wc-block-cart__submit-button, .wc-block-components-checkout-place-order-button, .wc-block-components-totals-coupon__button,.wp-block-woocommerce-cart .wc-block-components-product-badge.project .tablinks:hover, .project .tablinks.active{
		background: '.esc_attr($interior_decor_consultation_global_color).';
		}
		.blog_box_inner {
		    background: rgba(0, 0, 0, 0) linear-gradient(90deg, #201B2F 50%, '.esc_attr($interior_decor_consultation_global_color).' 50%) repeat scroll 0 0;
		}
		@media screen and (min-width: 320px) and (max-width: 767px) {
		    .menu-toggle, .dropdown-toggle,button.close-menu {
		        background: '.esc_attr($interior_decor_consultation_global_color).';
		    }
		}
		.searchform input[type=submit]:hover,.searchform input[type=submit]:focus{
		background-color: '.esc_attr($interior_decor_consultation_global_color).';
		}
		p.get-started-btn a:hover,span.color_change,#main-menu a:hover,#main-menu ul li a:hover,#main-menu li:hover > a,#main-menu a:focus,#main-menu ul li a:focus,#main-menu li.focus > a,#main-menu li:focus > a,#main-menu ul li.current-menu-item > a,#main-menu ul li.current_page_item > a,#main-menu ul li.current-menu-parent > a,#main-menu ul li.current_page_ancestor > a,#main-menu ul li.current-menu-ancestor > a,a:hover,a:focus,.post-single a, .page-single a,.sidebar-area .textwidget a,.comment-content a,.woocommerce-product-details__short-description a,#tab-description a,.extra-home-content a,.post-meta i,.bread_crumb a:hover,.bread_crumb span,.woocommerce ul.products li.product .price,.woocommerce div.product p.price, .woocommerce div.product span.price {
			color: '.esc_attr($interior_decor_consultation_global_color).';
		}
    	.copyright {
			background: '.esc_attr($interior_decor_consultation_copyright_bg).';
		}
	';
    wp_add_inline_style( 'interior-decor-consultation-style',$interior_decor_consultation_theme_color_css );
    wp_add_inline_style( 'interior-decor-consultation-woocommerce-css',$interior_decor_consultation_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'interior_decor_consultation_global_color' );

/*-----------------------------------------------------------------------------------*/
/* Get post comments */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('interior_decor_consultation_comment')) :
    /**
     * Template for comments and pingbacks.
     *
     * Used as a callback by wp_list_comments() for displaying the comments.
     */
    function interior_decor_consultation_comment($comment, $args, $depth){

        if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) : ?>

            <li id="comment-<?php comment_ID(); ?>" <?php comment_class('media'); ?>>
            <div class="comment-body">
                <?php esc_html_e('Pingback:', 'interior-decor-consultation');
                comment_author_link(); ?><?php edit_comment_link(__('Edit', 'interior-decor-consultation'), '<span class="edit-link">', '</span>'); ?>
            </div>

        <?php else : ?>

        <li id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body media mb-4">
                <a class="pull-left" href="#">
                    <?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size']); ?>
                </a>
                <div class="media-body">
                    <div class="media-body-wrap card">
                        <div class="card-header">
                            <h5 class="mt-0"><?php /* translators: %s: author */ printf('<cite class="fn">%s</cite>', get_comment_author_link() ); ?></h5>
                            <div class="comment-meta">
							    <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
							        <time datetime="<?php comment_time( 'c' ); ?>">
							            <?php printf(
							                esc_html__( '%1$s at %2$s', 'interior-decor-consultation' ),
							                esc_html( get_comment_date() ), esc_html( get_comment_time() ) ); ?>
							        </time>
							    </a>
							    <?php
							    edit_comment_link(esc_html__( 'Edit', 'interior-decor-consultation' ),'<span class="edit-link">','</span>');?>
							</div>
                        </div>

                        <?php if ('0' == $comment->comment_approved) : ?>
                            <p class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'interior-decor-consultation'); ?></p>
                        <?php endif; ?>

                        <div class="comment-content card-block">
                            <?php comment_text(); ?>
                        </div>

                        <?php comment_reply_link(
                            array_merge(
                                $args, array(
                                    'add_below' => 'div-comment',
                                    'depth' => $depth,
                                    'max_depth' => $args['max_depth'],
                                    'before' => '<footer class="reply comment-reply card-footer">',
                                    'after' => '</footer><!-- .reply -->'
                                )
                            )
                        ); ?>
                    </div>
                </div>
            </article>

            <?php
        endif;
    }
endif; // ends check for interior_decor_consultation_comment()

if (!function_exists('interior_decor_consultation_widgets_init')) {

	function interior_decor_consultation_widgets_init() {

		register_sidebar(array(

			'name' => esc_html__('Sidebar','interior-decor-consultation'),
			'id'   => 'interior-decor-consultation-sidebar',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'interior-decor-consultation'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Sidebar 2','interior-decor-consultation'),
			'id'   => 'interior-decor-consultation-sidebar-2',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'interior-decor-consultation'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Sidebar 3','interior-decor-consultation'),
			'id'   => 'interior-decor-consultation-sidebar-3',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'interior-decor-consultation'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Footer Sidebar','interior-decor-consultation'),
			'id'   => 'interior-decor-consultation-footer-sidebar',
			'description'   => esc_html__('This sidebar will be shown next at the bottom of your content.', 'interior-decor-consultation'),
			'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

	}

	add_action( 'widgets_init', 'interior_decor_consultation_widgets_init' );

}

function interior_decor_consultation_get_categories_select() {
	$teh_cats = get_categories();
	$results = array();
	$count = count($teh_cats);
	for ($i=0; $i < $count; $i++) {
	if (isset($teh_cats[$i]))
  		$results[$teh_cats[$i]->slug] = $teh_cats[$i]->name;
	else
  		$count++;
	}
	return $results;
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'interior_decor_consultation_loop_columns');
if (!function_exists('interior_decor_consultation_loop_columns')) {
	function interior_decor_consultation_loop_columns() {
		$interior_decor_consultation_columns = get_theme_mod( 'interior_decor_consultation_per_columns', 3 );
		return $interior_decor_consultation_columns;
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'interior_decor_consultation_per_page', 20 );
function interior_decor_consultation_per_page( $interior_decor_consultation_cols ) {
  	$interior_decor_consultation_cols = get_theme_mod( 'interior_decor_consultation_product_per_page', 9 );
	return $interior_decor_consultation_cols;
}

// Add filter to modify the number of related products
add_filter( 'woocommerce_output_related_products_args', 'interior_decor_consultation_products_args' );
function interior_decor_consultation_products_args( $args ) {
    $args['posts_per_page'] = get_theme_mod( 'custom_related_products_number', 6 );
    $args['columns'] = get_theme_mod( 'custom_related_products_number_per_row', 3 );
    return $args;
}

add_action('after_switch_theme', 'interior_decor_consultation_setup_options');
function interior_decor_consultation_setup_options () {
    update_option('dismissed-get_started', FALSE );
}

//add animation class
if ( class_exists( 'WooCommerce' ) ) { 
	add_filter('post_class', function($interior_decor_consultation, $class, $product_id) {
	    if( is_shop() || is_product_category() ){
	        
	        $interior_decor_consultation = array_merge(['wow','zoomIn'], $interior_decor_consultation);
	    }
	    return $interior_decor_consultation;
	},10,3);
}