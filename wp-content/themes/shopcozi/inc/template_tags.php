<?php

// Adding new body classes
function shopcozi_body_classes( $classes ) {
    $option = shopcozi_theme_options();
    $page_options = shopcozi_get_page_options();
    $layout = get_theme_mod('shopcozi_layout',$option['shopcozi_layout']);
    $h_style = get_theme_mod('shopcozi_h_style',$option['shopcozi_h_style']);

    if( isset($page_options['sc_layout']) && $page_options['sc_layout'] != '' ){
        $layout = $page_options['sc_layout'];
    }

    $classes[] = 'header_'.$h_style;

    if($layout=='boxed'){
        $classes[] = 'boxed';
    }

    if( !wp_is_mobile() ){
        $classes[] = 'sc_desktop';
    }
    
    global $is_safari;
    if( !empty($is_safari) ){
        $classes[] = 'is-safari';
    }

    return $classes;
}
add_filter( 'body_class', 'shopcozi_body_classes' );

if ( ! function_exists( 'shopcozi_logo' ) ) {
    function shopcozi_logo(){
        $class = array();
        $html = '';
        
        if ( function_exists( 'has_custom_logo' ) ) {
            if ( has_custom_logo()) {
                $html .= get_custom_logo();
            }else{
                $html .= '<h1 class="site-title"><a href="'.esc_url( home_url( '/' ) ).'" rel="home">' . get_bloginfo('name') . '</a></h1>';
                
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) {
                    $html .= '<p class="site-description mb-0">'.$description.'</p>';
                }
            }
        }
        ?>
        <div class="site-logo <?php echo esc_attr( join( ' ', $class ) ); ?>"><?php echo wp_kses_post($html); ?></div>
        <?php
    }
}

if ( ! function_exists( 'shopcozi_transparent_logo' ) ) {
    function shopcozi_transparent_logo(){
        $class = array();
        $html = '';

        $option = shopcozi_theme_options();
        $logo = get_theme_mod('shopcozi_h_transparent_logo',$option['shopcozi_h_transparent_logo']);
        
        if ( function_exists( 'has_custom_logo' ) ) {
            if ( has_custom_logo()) {
                $html .= get_custom_logo();

                if($logo!=''){
                    $html .= '<a href="'.esc_url( home_url( '/' ) ).'" class="transparent-logo-link" rel="home"><img src="'.esc_url($logo).'" class="custom-logo" alt="'.esc_attr(get_bloginfo('name')).'"></a>';
                }

            }else{
                $html .= '<h1 class="site-title"><a href="'.esc_url( home_url( '/' ) ).'" rel="home">' . get_bloginfo('name') . '</a></h1>';
                
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) {
                    $html .= '<p class="site-description mb-0">'.$description.'</p>';
                }
            }
        }
        ?>
        <div class="site-logo <?php echo esc_attr( join( ' ', $class ) ); ?>"><?php echo wp_kses_post($html); ?></div>
        <?php
    }
}

/* Display Menu on Frontend */
if( !class_exists('Shopcozi_Walker_Nav_Menu') ){
    class Shopcozi_Walker_Nav_Menu extends Walker_Nav_Menu{
        public $parent_is_megamenu;
        
        function __construct(){}
    
        function start_lvl( &$output, $depth = 0, $args = array() ){
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<ul class=\"sub-menu\">\n";
        }
        
        function end_lvl( &$output, $depth = 0, $args = array() ){
            $indent = str_repeat("\t", $depth);
            $output .= "$indent</ul>\n";
        }
        
        function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){
            global $wp_query;
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
            $item_output = '';
            
            $sub_label_text = get_post_meta( $item->ID, '_menu_item_shopcozi_sub_label_text', true );
            $is_megamenu = get_post_meta( $item->ID, '_menu_item_shopcozi_is_megamenu', true );
            $megamenu_column = get_post_meta( $item->ID, '_menu_item_shopcozi_megamenu_column', true );
            $megamenu_id = get_post_meta( $item->ID, '_menu_item_shopcozi_megamenu_id', true );
            $thumbnail_id = get_post_meta( $item->ID, '_menu_item_shopcozi_thumbnail_id', true );
            $background_id = get_post_meta( $item->ID, '_menu_item_shopcozi_background_id', true );
            $background_repeat = get_post_meta( $item->ID, '_menu_item_shopcozi_background_repeat', true );
            $background_position = get_post_meta( $item->ID, '_menu_item_shopcozi_background_position', true );
            
            if( !$megamenu_id ){
                $is_megamenu = false;
            }
            
            if( $depth === 0 ){
                $this->parent_is_megamenu = $is_megamenu;
            }
            
            /* Parent menu and sub normal menus */
            if( $depth === 0 || ( $depth > 0 && !$this->parent_is_megamenu ) ){
                $atts = array();
                $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
                $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
                $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
                $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

                $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

                $attributes = '';
                foreach ( $atts as $attr => $value ) {
                    if ( ! empty( $value ) ) {
                        $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                        $attributes .= ' ' . $attr . '="' . $value . '"';
                    }
                }
                    
                if( is_object($args) && isset($args->before) ){
                    $item_output = $args->before;
                }else{
                    $item_output = '';
                }
                
                $icon_html = '';
                if( $thumbnail_id > 0 ){
                    $icon_html = '<span class="menu-icon">'.wp_get_attachment_image( $thumbnail_id, 'shopcozi_menu_icon_thumb', false).'</span>';
                }
                $item_output .= $icon_html;
                
                $item_output .= "\n{$indent}\t<a". $attributes .'>';
                
                if( !isset($item->title) || strlen($item->title) <= 0 ){
                    $item->title = $item->post_title;
                }
                $title = '<span class="menu-label">'.apply_filters( 'the_title', $item->title, $item->ID ).'</span>';
                
                if( $sub_label_text ){
                    $title .= '<span class="menu-sub-label">'.esc_html($sub_label_text).'</span>';
                }
                
                if( is_object($args) && isset($args->link_before) && isset($args->link_after) ){
                    $item_output .= $args->link_before . $title . $args->link_after;
                }else{
                    $item_output .= $title;
                }
                
                if( strlen($item->description) > 0 ){
                    $item_output .= '<div class="menu-desc menu-desc-lv'.$depth.'">'.esc_html($item->description).'</div>';
                }
                
                $item_output .= '</a>';
                
                if( $item->sub_count > 0 || $this->parent_is_megamenu ){
                    $item_output .= '<span class="shopcozi-menu-drop-icon"></span>';
                }
            }
            
            /* Mega Menu */
            if( $depth === 0 && $item->sub_count == 0 && $is_megamenu ){
                $item_output .= "\n$indent<ul class=\"sub-menu\">\n";
                
                $item_output .= '<li><div class="shopcozi-megamenu-widgets-container shopcozi-megamenu-container">';
                $item_output .= $this->get_megamenu_content( $megamenu_id );
                $item_output .= '</div></li>';
                
                $item_output .= "</ul>";
            }
            
            /* Add content into li */
            $class_names = $value = '';
            $classes = empty( $item->classes ) ? array() : ( array ) $item->classes;
            $classes[] = 'menu-item-' . $item->ID;
            if( $depth === 0 && $is_megamenu ){
                $classes[] = 'hide shopcozi-megamenu shopcozi-megamenu-columns-' . $megamenu_column;
                if( $megamenu_column == 0 ){
                    $classes[] = 'shopcozi-megamenu-fullwidth';
                }
                if( $megamenu_column == -1 ){
                    $classes[] = 'shopcozi-megamenu-fullwidth shopcozi-megamenu-fullwidth-stretch no-stretch-content';
                }
                if( $megamenu_column == -2 ){
                    $classes[] = 'shopcozi-megamenu-fullwidth shopcozi-megamenu-fullwidth-stretch';
                }
            }
            
            
            if( $depth === 0 && !$is_megamenu ){
                $classes[] = 'shopcozi-normal-menu';
            }
            
            if( $item->sub_count || ( $depth === 0 && $is_megamenu ) ){
                $classes[] = 'parent';
            }
            
            if( $thumbnail_id ){
                $classes[] = 'has-icon';
            }
            
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
            
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
            $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
            
            $output .= $indent . '<li' . $id . $value . $class_names .'>';
            
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
        
        function end_el( &$output, $item, $depth = 0, $args = array() ) {
            $output .= "</li>\n";
        }
        
        function get_megamenu_content( $megamenu_id ){
            if( class_exists('Elementor\Plugin') && in_array( 'shopcozi_mega_menu', get_option( 'elementor_cpt_support', array() ) ) ){
                return Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $megamenu_id );
            }
            else{
                $post = get_post( $megamenu_id );
                if( is_object( $post ) ){
                    return do_shortcode( $post->post_content );
                }
            }
            return '';
        }
    }
}

if ( ! function_exists( 'shopcozi_navigations' ) ) {
    function shopcozi_navigations(){
        if ( has_nav_menu( 'primary' ) || ! has_nav_menu( 'expanded' ) ) {
        ?>
        <ul class="main-menu">
            <?php 
            if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu( array(
                    'container'  => '',
                    'items_wrap' => '%3$s',
                    'theme_location' => 'primary',
                    'walker' => new Shopcozi_Walker_Nav_Menu(),
                ) );
            }elseif( ! has_nav_menu( 'expanded' ) ) {
                wp_list_pages( array(
                    'match_menu_classes' => true,
                    'show_sub_menu_icons' => true,
                    'title_li' => false,
                    'walker'   => new Shopcozi_Walker_Page(),
                ) );
            }
            ?>
        </ul>
        <?php
        }
    }
}

if ( ! function_exists( 'shopcozi_navigations_mobile' ) ) {
    function shopcozi_navigations_mobile(){
        if ( has_nav_menu( 'primary' ) || ! has_nav_menu( 'expanded' ) ) {
        ?>
        <ul>
            <?php 
            if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu( array(
                    'container'  => '',
                    'items_wrap' => '%3$s',
                    'theme_location' => 'primary',
                ) );
            }elseif( ! has_nav_menu( 'expanded' ) ) {
                wp_list_pages( array(
                    'match_menu_classes' => true,
                    'show_sub_menu_icons' => true,
                    'title_li' => false,
                    'walker'   => new Shopcozi_Walker_Page(),
                ) );
            }
            ?>
        </ul>
        <?php
        }
    }
}

if( !function_exists('shopcozi_breadcrumbs_title') ){
    function shopcozi_breadcrumbs_title(){
        ?>
        <h2>
            <?php 
            if ( is_day() ) : 
                    
                printf( __( 'Daily Archives: %s', 'shopcozi' ), get_the_date() ); 
            
            elseif ( is_month() ) :
            
                printf( __( 'Monthly Archives: %s', 'shopcozi' ), get_the_date( 'F Y' ) );
                
            elseif ( is_year() ) :
            
                printf( __( 'Yearly Archives: %s', 'shopcozi' ), get_the_date( 'Y' )  );
                
            elseif ( is_category() ) :
            
                printf( __( 'Category Archives: %s', 'shopcozi' ), single_cat_title( '', false ) );

            elseif ( is_tag() ) :
            
                printf( __( 'Tag Archives: %s', 'shopcozi' ), single_tag_title( '', false ) );
                
            elseif ( is_404() ) :

                printf( __( 'Error 404', 'shopcozi' ));
                
            elseif ( is_author() ) :
            
                printf( __( 'Author: %s', 'shopcozi' ), get_the_author( '', false ) );

            elseif ( is_archive() ):

                if( is_post_type_archive() ){

                    printf( __( '%s', 'shopcozi' ), post_type_archive_title( '', false ) );

                }else{

                    printf( __( 'Archives: %s', 'shopcozi' ), post_type_archive_title( '', false ) );

                }

            elseif ( is_front_page() ):

                printf( __( 'Home', 'shopcozi' ) );

            elseif ( is_home() ):

                single_post_title();

            else :
                the_title();
            endif;
            ?>
        </h2>
        <?php
    }
}

if( !function_exists('shopcozi_breadcrumbs') ){
    function shopcozi_breadcrumbs(){

        //$delimiter_char = '<i class="fas fa-chevron-right"></i>';
        $delimiter_char = '';

        if( class_exists('WooCommerce') ){
            if( 
                function_exists('woocommerce_breadcrumb') && 
                function_exists('is_woocommerce') && 
                is_woocommerce() ){
                woocommerce_breadcrumb(
                    array(
                        'wrap_before'=>'<span class="page-breadcrumb">',
                        'delimiter'=>isset($delimiter_char) ?'<span>'.$delimiter_char.'</span>':'',
                        'wrap_after'=>'</span>'
                    )
                );
                return;
            }
        }

        $allowed_html = array(
            'a'     => array('href' => array(), 'title' => array()),
            'span' => array('class' => array()),
            'div'  => array('class' => array())
        );

        $output = '';

        $delimiter = isset($delimiter_char) ?'<span>'.$delimiter_char.'</span>':'';
        
        $ar_title = array(
                    'home'          => __('Home', 'shopcozi')
                    ,'search'       => __('Search results for ', 'shopcozi')
                    ,'404'          => __('Error 404', 'shopcozi')
                    ,'tagged'       => __('Tagged ', 'shopcozi')
                    ,'author'       => __('Articles posted by ', 'shopcozi')
                    ,'page'         => __('Page', 'shopcozi')
                    );
      
        $before = '<span class="current">'; /* tag before the current crumb */
        $after = '</span>'; /* tag after the current crumb */

        global $wp_rewrite, $post;

        $rewriteUrl = $wp_rewrite->using_permalinks();

        if( !is_home() && !is_front_page() || is_paged() ){

            $output .= '<span class="page-breadcrumb">';
     
            $homeLink = esc_url( home_url('/') ); 
            $output .= '<a href="' . $homeLink . '">' . $ar_title['home'] . '</a> ' . $delimiter . ' ';
     
            if( is_category() ){
                global $wp_query;
                $cat_obj = $wp_query->get_queried_object();
                $thisCat = $cat_obj->term_id;
                $thisCat = get_category($thisCat);
                $parentCat = get_category($thisCat->parent);
                if( $thisCat->parent != 0 ){ 
                    $output .= get_category_parents($parentCat, true, ' ' . $delimiter . ' ');
                }
                $output .= $before . single_cat_title('', false) . $after;
            }
            elseif( is_search() ){
                $output .= $before . $ar_title['search'] . '"' . get_search_query() . '"' . $after;
            }elseif( is_day() ){
                $output .= '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
                $output .= '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
                $output .= $before . get_the_time('d') . $after;
            }elseif( is_month() ){
                $output .= '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
                $output .= $before . get_the_time('F') . $after;
            }elseif( is_year() ){
                $output .= $before . get_the_time('Y') . $after;
            }elseif( is_single() && !is_attachment() ){
                if( get_post_type() != 'post' ){
                    $post_type = get_post_type_object(get_post_type());
                    $slug = $post_type->rewrite;
                    $post_type_name = $post_type->labels->singular_name;
                    if( $rewriteUrl ){
                        $output .= '<a href="' . $homeLink . $slug['slug'] . '/' . '">' . $post_type_name . '</a> ' . $delimiter . ' ';
                    }else{
                        $output .= '<a href="' . $homeLink . '?post_type=' . get_post_type() . '">' . $post_type_name . '</a> ' . $delimiter . ' ';
                    }
                    $output .= $before . get_the_title() . $after;
                }else{
                    $cat = get_the_category(); $cat = $cat[0];
                    $output .= get_category_parents($cat, true, ' ' . $delimiter . ' ');
                    $output .= $before . get_the_title() . $after;
                }
            }elseif( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ){
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                $post_type_name = $post_type->labels->singular_name;
                if( is_tag() ){
                    $output .= $before . $ar_title['tagged'] . '"' . single_tag_title('', false) . '"' . $after;
                }
                elseif( is_taxonomy_hierarchical(get_query_var('taxonomy')) ){
                    if( $rewriteUrl ){
                        $output .= '<a href="' . $homeLink . $slug['slug'] . '/' . '">' . $post_type_name . '</a> ' . $delimiter . ' ';
                    }else{
                        $output .= '<a href="' . $homeLink . '?post_type=' . get_post_type() . '">' . $post_type_name . '</a> ' . $delimiter . ' ';
                    }           
                    
                    $curTaxanomy = get_query_var('taxonomy');
                    $curTerm = get_query_var( 'term' );
                    $termNow = get_term_by( 'name', $curTerm, $curTaxanomy );
                    $pushPrintArr = array();
                    if( $termNow !== false ){
                        while( (int)$termNow->parent != 0 ){
                            $parentTerm = get_term((int)$termNow->parent,get_query_var('taxonomy'));
                            array_push($pushPrintArr,'<a href="' . get_term_link((int)$parentTerm->term_id,$curTaxanomy) . '">' . $parentTerm->name . '</a> ' . $delimiter . ' ');
                            $curTerm = $parentTerm->name;
                            $termNow = get_term_by( 'name', $curTerm, $curTaxanomy );
                        }
                    }
                    $pushPrintArr = array_reverse($pushPrintArr);
                    array_push($pushPrintArr,$before  . get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) )->name  . $after);
                    $output .= implode($pushPrintArr);
                }else{
                    $output .= $before . $post_type_name . $after;
                }
            }elseif( is_attachment() ){
                if( (int)$post->post_parent > 0 ){
                    $parent = get_post($post->post_parent);
                    $cat = get_the_category($parent->ID);
                    if( count($cat) > 0 ){
                        $cat = $cat[0];
                        $output .= get_category_parents($cat, true, ' ' . $delimiter . ' ');
                    }
                    $output .= '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
                }
                $output .= $before . get_the_title() . $after;
            }elseif( is_page() && !$post->post_parent ){
                $output .= $before . get_the_title() . $after;
            }elseif( is_page() && $post->post_parent ){
                $parent_id  = $post->post_parent;
                $breadcrumbs = array();
                while( $parent_id ){
                    $page = get_post($parent_id);
                    $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                    $parent_id  = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                foreach( $breadcrumbs as $crumb ){
                    $output .= $crumb . ' ' . $delimiter . ' ';
                }
                $output .= $before . get_the_title() . $after;
            }elseif( is_tag() ){
                $output .= $before . $ar_title['tagged'] . '"' . single_tag_title('', false) . '"' . $after;
            }elseif( is_author() ){
                global $author;
                $userdata = get_userdata($author);
                $output .= $before . $ar_title['author'] . $userdata->display_name . $after;
            }elseif( is_404() ){
                $output .= $before . $ar_title['404'] . $after;
            }
            if( get_query_var('paged') || get_query_var('page') ){
                if( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() || is_page_template() ||  is_post_type_archive() || is_archive() ){ 
                    $output .= $before .' ('; 
                }
                $output .= $ar_title['page'] . ' ' . ( get_query_var('paged')?get_query_var('paged'):get_query_var('page') );
                if( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() || is_page_template() ||  is_post_type_archive() || is_archive() ){ 
                    $output .= ')'. $after; 
                }
            }
            $output .= '</span>';
        }
        
        echo wp_kses($output, $allowed_html);
        
        wp_reset_postdata();
    }
}

if ( ! function_exists( 'shopcozi_navigation_icons' ) ) {
    function shopcozi_navigation_icons(){
        $option = shopcozi_theme_options();
        $account_icon = get_theme_mod('shopcozi_nav_account_icon_show',$option['shopcozi_nav_account_icon_show']);
        $cart_icon = get_theme_mod('shopcozi_nav_cart_icon_show',$option['shopcozi_nav_cart_icon_show']);
        $btn_label = get_theme_mod('shopcozi_nav_btn_label',$option['shopcozi_nav_btn_label']);
        $btn_link = get_theme_mod('shopcozi_nav_btn_link',$option['shopcozi_nav_btn_link']);
        $btn_target = get_theme_mod('shopcozi_nav_btn_target',$option['shopcozi_nav_btn_target']);     

        global $woocommerce;
        ?>
        <div class="col-auto justify-content-end main-navbar-right d-inline-block">
            <ul class="main-menu-list">
                <?php 
                if( is_user_logged_in() ){
                    $user_account_link = wp_logout_url( home_url() );
                    $user_account_icon = 'fa fa-sign-out';
                    $user_account_title = sprintf(__('Logout','shopcozi'));
                }else{
                    $user_account_link = get_permalink( get_option('woocommerce_myaccount_page_id') );
                    $user_account_icon = 'fa fa-user-circle-o';
                    $user_account_title = sprintf(__('Login','shopcozi'));
                }

                if( $account_icon == true ){
                ?>
                <li><a href="<?php echo esc_url( $user_account_link ); ?>" class="d-lg-block d-md-block d-none" title="<?php echo esc_attr( $user_account_title ); ?>"><i class="<?php echo esc_attr( $user_account_icon ); ?>"></i></a></li>
                <?php 
                }
                ?>

                <?php if( class_exists('WooCommerce') && $cart_icon == true ){ ?>
                <li class="woocommerce">
                    <a class="cart-total" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php echo esc_attr_e('Cart','shopcozi'); ?>"><i class="fa-solid fa-cart-shopping"></i>
                        <span class="count_value cart_value"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                    </a>
                    <div class="shopping_cart">
                      <?php get_template_part('woocommerce/cart/mini','cart'); ?>
                    </div>
                </li>
                <?php } ?>
                
                <?php if( $btn_link != '' ){ ?>
                <li class="menu-button"><a href="<?php echo esc_url($btn_link); ?>" class="btn btn-primary d-lg-block d-md-block d-none" <?php if( $btn_target == true ){ echo 'target="_blank"'; } ?>><?php echo esc_html($btn_label); ?></a></li>
                <?php } ?>
            </ul>
        </div>
        <?php
    }
}

if ( ! function_exists( 'shopcozi_navigation_content' ) ) {
    function shopcozi_navigation_content(){
        $option = shopcozi_theme_options();
        $nav_content = shopcozi_header_nav_data();
        if($option['shopcozi_nav_content_show']==true){
        ?>
        <div class="col-auto justify-content-end navbar-widget">
            <?php 
            if(!empty($nav_content)) { 
                foreach ($nav_content as $val) {
            ?>
            <aside class="widget-contact">
                <div class="widget-contact-wrap">
                    <div class="contact-icon"><i class="<?php echo esc_attr($val['icon']); ?>"></i></div>
                    <a href="#" class="contact-content">
                        <span class="title"><?php echo esc_html($val['title']); ?></span>
                        <span class="text"><?php echo esc_html($val['text']); ?></span>
                    </a>
                </div>
            </aside>
            <?php } } ?>                         
        </div>
        <?php
        }
    }
}

if( !function_exists('shopcozi_header_product_search') ){
    function shopcozi_header_product_search(){
        $option = shopcozi_theme_options();

        $option['shopcozi_browse_form_field'] = isset($option['shopcozi_browse_form_field']) && $option['shopcozi_browse_form_field'] != ''?
        $option['shopcozi_browse_form_field']:
        __('Search Product','shopcozi');

        $option['shopcozi_browse_form_dropdown'] = isset($option['shopcozi_browse_form_dropdown']) && $option['shopcozi_browse_form_dropdown'] != ''?
        $option['shopcozi_browse_form_dropdown']:
        __('Category','shopcozi');

        ?>
        <form class="browse-search-form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <input type="search" name="s" placeholder="<?php echo esc_attr($option['shopcozi_browse_form_field']); ?>">
            <select name="product_cat">
                <option value=""><?php echo esc_html($option['shopcozi_browse_form_dropdown']); ?></option>
                <?php 
                $categories = get_categories(array(
                                'taxonomy'     => 'product_cat',
                                'hide_empty'   => true
                            ));
                foreach ($categories as $category) {
                ?>
                <option value="<?php echo esc_attr($category->category_nicename); ?>"><?php echo esc_html($category->cat_name); ?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="post_type" value="product">
            <button type="submit"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
        </form>
        <?php
    }
}

class Shopcozi_Category_Walker extends Walker_Category {

  var $lev = -1;
  var $skip = 0;
  static $current_parent;

  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $this->lev = 0;
    $output .= "<ul>" . PHP_EOL;
  }

  function end_lvl( &$output, $depth = 0, $args = array() ) {
    $output .= "</ul>" . PHP_EOL;
    $this->lev = -1;
  }

  function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
    extract($args);

    $cat_name = esc_attr( $category->name );
    $class_current = $current_class ? $current_class . ' ' : 'current ';
    $class = '';

    if ( ! empty($current_category) ) {
      $_current_category = get_term( $current_category, $category->taxonomy );
      if ( $category->term_id == $current_category ) $class = $class_current;
      elseif ( $category->term_id == $_current_category->parent ) $class = rtrim($class_current) . '-parent ';
    } else {
      $class = '';
    }

    if ( ! $category->parent ) {

      if ( ! get_term_children( $category->term_id, $category->taxonomy ) ) {
          $this->skip = 1;
          if ($class == $class_current) self::$current_parent = $category->term_id;
            $icon_id = get_term_meta($category->term_id, 'icon_id', true);
            $image = wp_get_attachment_image_src( $icon_id,  'full' );
            if ( $image ){
                $img_src = $image[0];
                $cat_name = '<img src="'.esc_url($img_src).'" title="'.$cat_name.'" alt="'.$cat_name.'"> '. $cat_name;
            }
            $output .= "<li class='" . $class . $level_class . "'>" . PHP_EOL;
            $output .= sprintf($parent_title_format, $cat_name, esc_url( get_term_link($category) ) ) . PHP_EOL;
      } else {
        if ($class == $class_current) self::$current_parent = $category->term_id;
        $icon_id = get_term_meta($category->term_id, 'icon_id', true);
        $image = wp_get_attachment_image_src( $icon_id,  'full' );
        if ( $image ){
            $img_src = $image[0];
            $cat_name = '<img src="'.esc_url($img_src).'" title="'.$cat_name.'" alt="'.$cat_name.'"> '. $cat_name;
        }
        $output .= "<li class='" . $class . $level_class . "'>" . PHP_EOL;
        $output .= sprintf($parent_title_format, $cat_name, esc_url( get_term_link($category) ) ) . PHP_EOL;
      }

    } else { 

      if ( $this->lev == 0 && $category->parent) {
        $link = get_term_link(intval($category->parent) , $category->taxonomy);
        $stored_parent = intval(self::$current_parent);
        $now_parent = intval($category->parent);
        $all_class = ($stored_parent > 0 && ( $stored_parent === $now_parent) ) ? $class_current . ' all' : 'all';
        //$output .= "<li class='" . $all_class . "'><a href='" . $link . "'>" . __('All','shopcozi') . "</a></li>\n";
        self::$current_parent = null;
      }

      $icon_id = get_term_meta($category->term_id, 'icon_id', true);
      $image = wp_get_attachment_image_src( $icon_id,  'full' );
      if ( $image ){
        $img_src = $image[0];
        $cat_name = '<img src="'.esc_url($img_src).'" title="'.$cat_name.'" alt="'.$cat_name.'"> '. $cat_name;
      }
      $link = '<a href="' . esc_url( get_term_link($category) ) . '" >' . $cat_name . '</a>';
      $output .= "<li";
      $class .= $category->taxonomy . '-item ' . $category->taxonomy . '-item-' . $category->term_id;
      $output .=  ' class="' . $class . '"';
      $output .= ">" . $link;

    }

  }

  function end_el( &$output, $page, $depth = 0, $args = array() ) {
    $this->lev++;
    if ( $this->skip == 1 ) {
      $this->skip = 0;
      return;
    }
    $output .= "</li>" . PHP_EOL;
  }

}

function shopcozi_list_categories( $args = '' ) {
  $defaults = array(
    'taxonomy' => 'category',
    'show_option_none' => '',
    'echo' => 1,
    'depth' => 2,
    'wrap_class' => '',
    'level_class' => '',
    'parent_title_format' => '%s',
    'current_class' => 'current'
  );

  $r = wp_parse_args( $args, $defaults );
  if ( ! isset( $r['wrap_class'] ) ) $r['wrap_class'] = ( 'category' == $r['taxonomy'] ) ? 'categories' : $r['taxonomy'];
  extract( $r );

  if ( ! taxonomy_exists($taxonomy) ){
    // return false;
  }

  $categories = get_categories( $r );
  $output = "<ul class='" . esc_attr( $wrap_class ) . "'>" . PHP_EOL;
  if ( empty( $categories ) ) {
    if ( ! empty( $show_option_none ) ) $output .= "<li>" . $show_option_none . "</li>" . PHP_EOL;
  } else {
    if ( is_category() || is_tax() || is_tag() ) {
      $current_term_object = get_queried_object();
      if ( $r['taxonomy'] == $current_term_object->taxonomy ) $r['current_category'] = get_queried_object_id();
    }
    $depth = $r['depth'];
    $walker = new Shopcozi_Category_Walker;
    $output .= $walker->walk($categories, $depth, $r);
  }
  $output .= "</ul>" . PHP_EOL;
  if ( $echo ) echo $output; else return $output;
}

if(!function_exists('shopcozi_browser_categories')){
    function shopcozi_browser_categories(){
        $args = array(
          'taxonomy' => 'product_cat',
          'hide_empty' => false,
          'show_option_none' => __('Woocommerce Not Installed.','shopcozi'),
          'echo' => 1,
          'depth' => 4,
          'wrap_class' => 'main-menu',
          'level_class' => '',
          'parent_title_format' => '<a href="%2$s" class="mb-0">%1$s</a>',
          'current_class' => 'selected'
        );
        shopcozi_list_categories( $args );
    }
}

if ( ! function_exists( 'shopcozi_get_media_url' ) ) {
    function shopcozi_get_media_url( $media = array(), $size = 'full' ) {

        $media = wp_parse_args( $media, array('url' => '', 'id' => '') );
        $url = '';

        if ($media['id'] != '') {
            if ( strpos( get_post_mime_type( $media['id'] ), 'image' ) !== false ) {
                $image = wp_get_attachment_image_src( $media['id'],  $size );
                if ( $image ){
                    $url = $image[0];
                }
            } else {
                $url = wp_get_attachment_url( $media['id'] );
            }
        }

        if ($url == '' && $media['url'] != '') {
            $id = attachment_url_to_postid( $media['url'] );
            if ( $id ) {
                if ( strpos( get_post_mime_type( $id ), 'image' ) !== false ) {
                    $image = wp_get_attachment_image_src( $id,  $size );
                    if ( $image ){
                        $url = $image[0];
                    }
                } else {
                    $url = wp_get_attachment_url( $id );
                }
            } else {
                $url = $media['url'];
            }
        }
        return $url;
    }
}

if ( ! function_exists( 'shopcozi_edit_link' ) ) :
    function shopcozi_edit_link() {
        edit_post_link(
            sprintf(
                /* translators: %s: Post title. */
                __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'shopcozi' ),
                get_the_title()
            ),
            '<span class="edit-link">',
            '</span>'
        );
    }
endif;

/*** Template Redirect ***/
add_action('template_redirect', 'shopcozi_template_redirect');
function shopcozi_template_redirect(){
    global $wp_query, $post, $product;

    /* Get Page Options */
    if( is_page() || is_tax( get_object_taxonomies( 'product' ) ) || is_post_type_archive('product') ){

        if( is_page() ){
            $page_id = isset($post->ID)?$post->ID:get_the_ID();
        }

        if( is_tax( get_object_taxonomies( 'product' ) ) || is_post_type_archive('product') ){
            $page_id = get_option('woocommerce_shop_page_id', 0);
        }
        
        $page_options = shopcozi_set_global_page_options( $page_id );
    }else{
        $page_id = isset($post->ID)?$post->ID:get_the_ID();
        $page_options = shopcozi_set_global_page_options( $page_id );
    }

    if( is_home() ){
        $page_id =  get_option( 'page_for_posts' );
        $page_options = shopcozi_set_global_page_options( $page_id );
    }

    if( is_single() ){
        $page_id = isset($post->ID)?$post->ID:get_the_ID();
        $page_options = shopcozi_set_global_page_options( $page_id );
    } 
}

/*** Change product query args ***/
function sc_filter_product_by_product_type( &$args = array(), $product_type = 'recent' ){
  switch( $product_type ){
    case 'sale':
      $args['post__in'] = array_merge( array( 0 ), wc_get_product_ids_on_sale() );
    break;
    case 'featured':
      $args['tax_query'][] = array(
        'taxonomy' => 'product_visibility',
        'field'    => 'name',
        'terms'    => 'featured',
        'operator' => 'IN',
      );
    break;
    case 'best_selling':
      $args['meta_key']   = 'total_sales';
      $args['orderby']  = 'meta_value_num';
      $args['order']    = 'desc';
    break;
    case 'top_rated':
      $args['meta_key']   = '_wc_average_rating';
      $args['orderby']  = 'meta_value_num';
      $args['order']    = 'desc';
    break;
    case 'mixed_order':
      $args['orderby']  = 'rand';
    break;
    default: /* Recent */
      $args['orderby']  = 'date';
      $args['order']    = 'desc';
    break;
  }
}

/*** Global Page Options ***/
if( !function_exists('shopcozi_set_global_page_options') ){
    function shopcozi_set_global_page_options( $page_id = 0 ){
        global $shopcozi_page_options;
        $post_custom = get_post_custom( $page_id );
        if( !is_array($post_custom) ){
            $post_custom = array();
        }
        foreach( $post_custom as $key => $value ){
            if( isset($value[0]) ){
                $shopcozi_page_options[$key] = $value[0];
            }
        }
        
        $default_options = array(
                            'sc_header_container_width'     => '0',
                            'sc_page_container_width'       => '0',
                            'sc_footer_container_width'     => '0',
                            'sc_layout'                     => '0',
                            'sc_page_sidebar_layout'        => '0-1-1',
                            'sc_left_sidebar'               => '0',
                            'sc_right_sidebar'              => '0',
                            'sc_breadcrumb_show'            => '1',
                            'sc_breadcrumb_title_show'      => '1',
                            'sc_breadcrumb_path_show'       => '1',
                            'sc_breadcrumb_bg_color'        => '',
                            'sc_breadcrumb_bg_image'        => '',
                            'sc_breadcrumb_attachment'      => '',
                            'sc_breadcrumb_repeat'          => '',
                            'sc_breadcrumb_position'        => '',
                            'sc_breadcrumb_size'            => '',
                            'sc_footer_block'               => '0',                          
                            );

        $shopcozi_page_options = array_merge($default_options, (array) $shopcozi_page_options);
        return $shopcozi_page_options;
    }
}

if( !function_exists('shopcozi_get_page_options') ){
    function shopcozi_get_page_options( $key = '', $default = '' ){
        global $shopcozi_page_options;
        if( !$key ){
            return $shopcozi_page_options;
        }
        else if( isset($shopcozi_page_options[$key]) ){
            return $shopcozi_page_options[$key];
        }
        else{
            return $default;
        }
    }
}

if( ! function_exists('shopcozi_get_list_sidebars') ){
    function shopcozi_get_list_sidebars(){
        return $GLOBALS['wp_registered_sidebars'];
    }
}

/*** Get excerpt ***/
if( !function_exists ('shopcozi_string_limit_words') ){
    function shopcozi_string_limit_words($string, $word_limit){
        $words = explode(' ', $string, ($word_limit + 1));
        if( count($words) > $word_limit ){
            array_pop($words);
        }
        return implode(' ', $words);
    }
}

if( !function_exists ('shopcozi_the_excerpt_max_words') ){
    function shopcozi_the_excerpt_max_words( $word_limit = -1, $post = '', $strip_tags = true, $extra_str = '', $echo = true ) {
        if( $post ){
            $excerpt = shopcozi_get_the_excerpt_by_id($post->ID);
        }
        else{
            $excerpt = get_the_excerpt();
        }
            
        if( !is_array($strip_tags) && $strip_tags ){
            $excerpt = wp_strip_all_tags($excerpt);
            $excerpt = strip_shortcodes($excerpt);
        }
        
        if( is_array($strip_tags) ){
            $excerpt = wp_kses($excerpt, $strip_tags); // allow, not strip
        }
            
        if( $word_limit != -1 ){
            $result = shopcozi_string_limit_words($excerpt, $word_limit);
            if( $result != $excerpt ){
                $result .= $extra_str;
            }
        }   
        else{
            $result = $excerpt;
        }
            
        if( $echo ){
            echo do_shortcode($result);
        }
        return $result;
    }
}

if( !function_exists('shopcozi_get_the_excerpt_by_id') ){
    function shopcozi_get_the_excerpt_by_id( $post_id = 0 ){
        global $wpdb;
        $query = "SELECT post_excerpt, post_content FROM $wpdb->posts WHERE ID = %d LIMIT 1";
        $result = $wpdb->get_results( $wpdb->prepare($query, $post_id), ARRAY_A );
        if( $result[0]['post_excerpt'] ){
            return $result[0]['post_excerpt'];
        }
        else{
            $content = $result[0]['post_content'];
            if( false !== strpos( $content, '<!--nextpage-->' ) ){
                $pages = explode( '<!--nextpage-->', $content );
                return $pages[0];
            }
            return $content;
        }
    }
}

/**
 * Custom excerpt length
 */
if ( ! function_exists( 'shopcozi_custom_excerpt_length' ) ) :
    add_filter( 'excerpt_length', 'shopcozi_custom_excerpt_length', 15 );
    function shopcozi_custom_excerpt_length( $length ) {
        $excerpt_length = get_theme_mod('shopcozi_archive_excerpt_length', 30);
        return absint( apply_filters( 'shopcozi_excerpt_length', $excerpt_length ) );
    }
endif;

/**
 * Remove […]
 */
if ( ! function_exists( 'shopcozi_new_excerpt_more' ) ) :
    add_filter('excerpt_more', 'shopcozi_new_excerpt_more', 15 );
    function shopcozi_new_excerpt_more( $more ) {
        $excerpt_readmore = get_theme_mod('shopcozi_archive_readmore_label',__('Read More','shopcozi'));

        // If empty, return
        if ( '' == $excerpt_readmore ) {
            return '';
        }
                
        return apply_filters( 'shopcozi_excerpt_more_output', sprintf(
            ' ... <div><a title="%1$s" class="more-link mb-3" href="%2$s">%3$s</a></div>',
            the_title_attribute( 'echo=0' ),
            esc_url( get_permalink( get_the_ID() ) ),
            wp_kses_post( $excerpt_readmore )
            ) );
    }
endif;

/* Content Read More */
if ( ! function_exists( 'shopcozi_blog_content_more' ) ) :
    add_filter( 'the_content_more_link', 'shopcozi_blog_content_more', 15 );
    function shopcozi_blog_content_more( $more ) {
        $excerpt_readmore = get_theme_mod('shopcozi_archive_readmore_label',__('Read More','shopcozi'));

        // If empty, return
        if ( '' == $excerpt_readmore ) {
            return '';
        }

        return apply_filters( 'shopcozi_content_more_link_output', sprintf( '<div><a title="%1$s" class="more-link mb-3" href="%2$s">%3$s%4$s</a></div>',
            the_title_attribute( 'echo=0' ),
            esc_url( get_permalink( get_the_ID() ) . apply_filters( 'shopcozi_more_jump','#more-' . get_the_ID() ) ),
            wp_kses_post( $excerpt_readmore ),
            '<span class="screen-reader-text">' . get_the_title() . '</span>'
        ) );
    }
endif;

add_filter( 'shopcozi_excerpt_more_output', 'shopcozi_blog_read_more_button' );
add_filter( 'shopcozi_content_more_link_output', 'shopcozi_blog_read_more_button' );
function shopcozi_blog_read_more_button( $output ) {
    $excerpt_readmore = get_theme_mod('shopcozi_archive_readmore_label',__('Read More','shopcozi'));

    $class = 'mb-3';

    return sprintf( '%5$s<div><a title="%1$s" class="more-link %6$s" href="%2$s">%3$s%4$s</a></div>',
        the_title_attribute( 'echo=0' ),
        esc_url( get_permalink( get_the_ID() ) . apply_filters( 'shopcozi_more_jump','#more-' . get_the_ID() ) ),
        wp_kses_post( $excerpt_readmore ),
        '<span class="screen-reader-text">' . get_the_title() . '</span>',
        'shopcozi_excerpt_more_output' == current_filter() ? ' ... ' : '',
        esc_attr($class)
    );
}

if ( ! function_exists( 'shopcozi_show_excerpt' ) ) {
    function shopcozi_show_excerpt() {
        global $post;

        // If the more tag is used.
        $more_tag = apply_filters( 'shopcozi_more_tag', strpos( $post->post_content, '<!--more-->' ) );
        $postformat = ( false !== get_post_format() ) ? get_post_format() : 'standard';

        $show_excerpt = ( 'excerpt' === shopcozi_get_option('archive_content_type') ) ? true : false;
        $show_excerpt = ( 'standard' !== $postformat ) ? false : $show_excerpt;
        $show_excerpt = ( $more_tag ) ? false : $show_excerpt;
        $show_excerpt = ( is_search() ) ? true : $show_excerpt;

        return apply_filters( 'shopcozi_show_excerpt', $show_excerpt );
    }
}

/* kses allowed html */
add_filter('wp_kses_allowed_html', 'shopcozi_wp_kses_allowed_html', 10, 2);
function shopcozi_wp_kses_allowed_html( $tags, $context ){
    switch( $context ){
        case 'shopcozi_tgmpa':
            $tags = array(
                'a'         => array( 'href' => array(), 'class' => array(), 'target' => array() )
                ,'p'        => array( 'class' => array() )
                ,'span'     => array( 'class' => array() )
                ,'strong'   => array()
                ,'br'       => array()
            );
        break;
        case 'shopcozi_product_image':
            $tags = array(
                'img'       => array( 
                    'width'     => array()
                    ,'height'   => array()
                    ,'src'      => array()
                    ,'class'    => array()
                    ,'id'       => array()
                    ,'alt'      => array()
                    ,'loading'  => array()
                    ,'title'    => array()
                    ,'srcset'   => array()
                    ,'sizes'    => array()
                    ,'style'    => array()
                    ,'data-*'   => array()
                )
            );
        break;
        case 'shopcozi_product_name':
            $tags = array(
                'h3'        => array( 'class' => array() )
                ,'h4'       => array( 'class' => array() )
                ,'span'     => array( 'class' => array() )
                ,'a'        => array( 'href' => array(), 'class' => array(), 'title' => array(), 'target' => array() )
            );
        break;
        case 'shopcozi_product_price':
            $tags = array(
                'span'      => array( 'class' => array(), 'data-*' => array() )
                ,'div'      => array( 'class' => array(), 'data-*' => array() )
                ,'p'        => array( 'class' => array(), 'data-*' => array() )
                ,'bdi'      => array()
                ,'ins'      => array()
                ,'del'      => array()
            );
        break;
        case 'shopcozi_link':
            $tags = array(
                'a'         => array( 
                    'href'      => array()
                    ,'target'   => array()
                    ,'class'    => array()
                    ,'style'    => array()
                    ,'title'    => array()
                    ,'rel'      => array()
                    ,'data-*'   => array()
                )
            );
        break;
        case 'shopcozi_header_feature':
            $tags = array(
                'span'      => array( 'class' => array(), 'style' => array() )
            );
        break;
    }
    return $tags;
}

if( ! function_exists('shopcozi_theme_options') ){
    function shopcozi_theme_options(){
        global $shopcozi_theme_options;
        $shopcozi_theme_options = shopcozi_default_options();
        foreach($shopcozi_theme_options as $key => $val){
            $shopcozi_theme_options[$key] = get_theme_mod($key,$shopcozi_theme_options[$key]);
        }
        return $shopcozi_theme_options;
    }
}

function shopcozi_change_theme_options( $key, $value ){
    global $shopcozi_theme_options;
    if( isset( $shopcozi_theme_options[$key] ) ){
        $shopcozi_theme_options[$key] = $value;
    }
}

function shopcozi_get_theme_options( $key = '', $default = '' ){
    global $shopcozi_theme_options;
    
    if( !$key ){
        return $shopcozi_theme_options;
    }else if( isset($shopcozi_theme_options[$key]) ){
        return $shopcozi_theme_options[$key];
    }else{
        return $default;
    }
}

function shopcozi_categories(){
    $categories = get_categories( array(
        'taxonomy'=> 'category',
        'orderby' => 'name',
        'order'   => 'ASC',
        'hide_empty' => false
    ) );

    $cat_arg = array();

    foreach( $categories as $category ) {
        $cat_arg[$category->term_id] =  $category->name .' ('.$category->count.')';
    }
    return $cat_arg;
}

function shopcozi_product_categories(){
    $categories = get_categories( array(
        'taxonomy'=> 'product_cat',
        'orderby' => 'name',
        'order'   => 'ASC',
        'hide_empty' => false
    ) );

    $cat_arg = array();

    foreach( $categories as $category ) {
        $cat_arg[$category->term_id] =  $category->name .' ('.$category->count.')';
    }
    return $cat_arg;
}

function shopcozi_blendChannels(float $alpha, int $channel1, int $channel2): int{
    // blend 2 channels
    return intval(($channel1 * $alpha) + ($channel2 * (1.0 - $alpha)));
}

function shopcozi_convertRGBAtoHEX6(string $rgba): string{
    // sanitize
    $rgba = strtolower(trim($rgba));
    // check
    if (substr($rgba, 0, 5) != 'rgba(') {
        return $rgba;
    }
    // extract channels
    $channels = explode(',', substr($rgba, 5, strpos($rgba, ')') - 5));
    // compute rgb with white background
    $alpha = $channels[3];
    $r = shopcozi_blendChannels($alpha, $channels[0], 0xFF);
    $g = shopcozi_blendChannels($alpha, $channels[1], 0xFF);
    $b = shopcozi_blendChannels($alpha, $channels[2], 0xFF);
    return sprintf('#%02x%02x%02x', $r, $g, $b);
}


// Content starter pack data
function shopcozi_wp_starter_pack() {

    // Define and register starter contents

    $starter_content = array(
        'widgets'     => array(
            'sidebar-1'   => array(
                'search',
                'categories',
                'tag',
                'meta',
            ),
            'footer-1'    => array(
                'my_text' => array(
                    'text',
                    array(
                        'title' => _x('About US', 'My text starter contents', 'shopcozi'),
                        'text'  =>  _x('Lorem ipsum dolor sit amet consectetur dipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim ad minim veniam.', 'My text starter contents', 'shopcozi'),
                    ),
                ),
            ),
            'footer-2'    => array(
                'search' => array(
                    'search',
                    array(
                        'title' => _x( 'search', 'My text starter contents', 'shopcozi' ),
                    )
                ),
            ),
            'footer-3'    => array(
                'categories'=> array(
                    'categories',
                    array(
                        'title' => _x( 'categories', 'My text starter contents', 'shopcozi' ),
                    )
                ),
            ),
        ),
        'posts'       => array(
            'home',
            'about',
            'contact',
            'blog',
        ),
        'options'     => array(
            'show_on_front'  => 'page',
            'page_on_front'  => '{{home}}',
            'page_for_posts' => '{{blog}}',
            'header_image'   => '',
        ),
        'nav_menus'   => array(
            'primary'    => array(
                'name'  => __( 'Primary Menu', 'shopcozi' ),
                'items' => array(
                    'link_home',
                    'page_about',
                    'page_blog',
                    'page_contact',
                    'page_loremuipsum' => array(
                        'type'      => 'post_type',
                        'object'    => 'page',
                        'object_id' => '{{loremipsum}}',
                    ),
                ),
            ),
        ),
    );

    return apply_filters( 'shopcozi_wp_starter_pack', $starter_content );
}

/**
 * Add monthly interval to the schedules (since WP doesnt provide it from the start)
 */
add_filter('cron_schedules','shopcozi_cron_add_oneday');
function shopcozi_cron_add_oneday($schedules) {
    $schedules['one_day'] = array(
      'interval' => 80640,
      'display' => __('Once per day','shopcozi')
    );
    return $schedules;
}
/**
 * Add the scheduling if it doesnt already exist
 */
add_action('wp','shopcozi_setup_schedule');
function shopcozi_setup_schedule() {
  if (!wp_next_scheduled('shopcozi_singleday_pruning') ) {
    wp_schedule_event( time(), 'one_day', 'shopcozi_singleday_pruning');
  }
}
/**
 * Add the function that takes care of removing all rows with post_type=post that are older than 30 days
 */
add_action( 'shopcozi_singleday_pruning', 'shopcozi_remove_old_option' );
function shopcozi_remove_old_option() {
    delete_option('dismissed-get_started');
}

// Get Started Notice

add_action( 'wp_ajax_shopcozi_dismissed_notice_handler', 'shopcozi_ajax_notice_handler' );
function shopcozi_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function shopcozi_deprecated_hook_admin_notice() {
        if ( ! get_option('dismissed-get_started', FALSE ) ) {
            $theme = wp_get_theme();
            if( $theme->parent() ){
                $theme_name = $theme->parent()->get('Name');
                $theme_textdomain = $theme->parent()->get('TextDomain');
            }else{
                $theme_name = $theme->get('Name');
                $theme_textdomain = $theme->get('TextDomain');
            }
            
            $active_theme_name = $theme->get('Name');
            ?>
            <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
                <div class="shopcozi-getting-started-notice clearfix">
                    <div class="shopcozi-theme-screenshot">
                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.png" class="screenshot" alt="<?php esc_attr_e( 'Theme Screenshot', 'shopcozi' ); ?>" />
                    </div>
                    <div class="shopcozi-theme-notice-content">
                        <h2 class="shopcozi-notice-h2">
                        <?php
                        printf(
                            /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                            esc_html__( 'Welcome! Thank you for choosing %1$s!', 'shopcozi' ), '<strong>'. esc_html($active_theme_name). '</strong>' );
                        ?>
                        </h2>

                        <p class="plugin-install-notice"><?php echo sprintf(__('Install and activate <strong>Britetechs Companion</strong> plugin for taking full advantage of all the features this theme has to offer.', 'shopcozi')) ?></p>

                        <?php printf(
                            /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                            __( '<a class="shopcozi-btn-get-started button button-primary button-hero shopcozi-button-padding" href="#" data-name="" data-slug=""> Get started with %1$s</a>', 'shopcozi' ), '<strong>'. esc_html($active_theme_name). '</strong>' );
                        ?>

                        <?php
                            /* translators: %1$s: Anchor link start %2$s: Anchor link end */
                            printf(
                                'OR <a class="button button-danger button-hero shopcozi-button-padding" target="_blank" href="https://www.britetechs.com/theme/%2$s-pro/"> Upgrade To %1$s</a>',
                                '<strong>'. esc_html($theme_name) . ' Pro</strong>',
                                esc_attr($theme_textdomain)
                            );
                        ?>

                        <?php
                            /* translators: %1$s: Anchor link start %2$s: Anchor link end */
                            printf(
                                'OR <a class="button button-primary button-hero shopcozi-button-padding" target="_blank" href="https://britetechs.com/demo/themes/%2$s-pro/">View PRO Demo</a>',
                                '<strong>'. esc_html($theme_name) . ' Pro</strong>',
                                esc_attr($theme_textdomain)
                            );
                        ?>

                        <span class="shopcozi-push-down">
                        <?php
                            /* translators: %1$s: Anchor link start %2$s: Anchor link end */
                            printf(
                                'OR %1$sCustomize theme%2$s</a></span>',
                                '<a target="_blank" href="' . esc_url( admin_url( 'customize.php' ) ) . '">',
                                '</a>'
                            );
                        ?>
                        </span>
                    </div>
                </div>
            </div>
        <?php }
}
add_action( 'admin_notices', 'shopcozi_deprecated_hook_admin_notice' );

// Plugin Installer

function shopcozi_admin_install_plugin() {

    include_once ABSPATH . '/wp-admin/includes/file.php';
    include_once ABSPATH . '/wp-admin/includes/class-wp-upgrader.php';
    include_once ABSPATH . '/wp-admin/includes/plugin-install.php';

    if ( ! file_exists( WP_PLUGIN_DIR . '/britetechs-companion' ) ) {
        $api = plugins_api( 'plugin_information', array(
            'slug'   => sanitize_key( wp_unslash( 'britetechs-companion' ) ),
            'fields' => array(
                'sections' => false,
            ),
        ) );

        $skin     = new WP_Ajax_Upgrader_Skin();
        $upgrader = new Plugin_Upgrader( $skin );
        $result   = $upgrader->install( $api->download_link );
    }

    // Activate plugin.
    if ( current_user_can( 'activate_plugin' ) ) {
        $result = activate_plugin( 'britetechs-companion/britetechs-companion.php' );
    }
}
add_action( 'wp_ajax_install_act_plugin', 'shopcozi_admin_install_plugin' );