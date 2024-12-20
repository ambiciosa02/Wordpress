<?php
/**
 * Sanitize Checkbox
 *
 * @param $input
 * @return void
 */
if ( !function_exists( 'shopcozi_sanitize_checkbox' ) ) {
    function shopcozi_sanitize_checkbox( $input ) {
        if ( $input == 1 ) {
            return 1;
        } else {
            return 0;
        }
    }
}

/**
 * Sanitize CSS Code
 *
 * @param $string
 * @return string
 */
function shopcozi_sanitize_css($string) {
    $string = preg_replace( '@<(script|style)[^>]*?>.*?</\\1>@si', '', $string );
    $string = strip_tags($string);
    return trim( $string );
}

/**
 * Sanitize Alpha Color Code
 *
 * @param $color
 * @return string
 */
function shopcozi_sanitize_color_alpha( $color ){
    $color = str_replace( '#', '', $color );
    if ( '' === $color ){
        return '';
    }

    // 3 or 6 hex digits, or the empty string.
    if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', '#' . $color ) ) {
        // convert to rgb
        $colour = $color;
        if ( strlen( $colour ) == 6 ) {
            list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
        } elseif ( strlen( $colour ) == 3 ) {
            list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
        } else {
            return false;
        }
        $r = hexdec( $r );
        $g = hexdec( $g );
        $b = hexdec( $b );
        return 'rgba('.join( ',', array( 'r' => $r, 'g' => $g, 'b' => $b, 'a' => 1 ) ).')';
    }

    return strpos( trim( $color ), 'rgb' ) !== false ?  $color : false;
}

/**
 * Sanitize File Upload URL
 *
 * @param $file_url
 * @return string
 */
function shopcozi_sanitize_file_url( $file_url ) {
    $output = '';
    $filetype = wp_check_filetype( $file_url );
    if ( $filetype["ext"] ) {
        $output = esc_url( $file_url );
    }
    return $output;
}

/**
 * Conditional to show more hero settings
 *
 * @param $control
 * @return bool
 */
function shopcozi_hero_fullscreen_callback ( $control ) {
    if ( $control->manager->get_setting('shopcozi_hero_fullscreen')->value() == '' ) {
        return true;
    } else {
        return false;
    }
}

/**
 * Sanitize Select Dropdown Settings
 *
 * @param $input, $setting
 * @return string
 */
function shopcozi_sanitize_select( $input, $setting ){

    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
    $input = sanitize_key($input);

    //get the list of possible select options
    $choices = $setting->manager->get_control( $setting->id )->choices;

    //return input if valid or return default option
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Sanitize Number Settings
 *
 * @param $input
 * @return integer
 */
function shopcozi_sanitize_number( $input ) {
    return balanceTags( $input );
}

/**
 * Sanitize Hex Color Code
 *
 * @param $color
 * @return string
 */
function shopcozi_sanitize_hex_color( $color ) {
    if ( $color === '' ) {
        return '';
    }
    if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
        return $color;
    }
    return null;
}

/**
 * Sanitize Text Setting
 *
 * @param $string
 * @return string
 */
function shopcozi_sanitize_text( $string ) {
    return wp_kses_post( balanceTags( $string ) );
}

/**
 * Sanitize HTML Setting
 *
 * @param $string
 * @return string
 */
function shopcozi_sanitize_html_input( $string ) {
    return wp_kses_allowed_html( $string );
}

/**
 * Conditional settings for the page templates
 *
 * @param $string
 * @return bool
 */
function shopcozi_showon_frontpage() {
    return is_page_template( 'template-homepage.php' );
    return true;
}

/**
 * Conditional settings for the upgrade to pro features
 *
 * @param $validity, $value
 * @return string
 */
function shopcozi_gallery_source_validate( $validity, $value ){
    if ( ! class_exists( 'Shopcozi_Pro' ) ) {
        if ( $value != 'page' ) {
            $validity->add('notice', sprintf( esc_html__('Upgrade to %1s to unlock this feature.', 'shopcozi' ), '<a target="_blank" href="https://www.britetechs.com/theme/shopcozi-pro/?utm_source=theme_customizer&utm_medium=text_link&utm_campaign=shopcozi_customizer#gallery">Shopcozi Pro</a>') );
        }
    }
    return $validity;
}

/**
 * Sanitize repeater data
 *
 * @param $input
 * @param $setting object $wp_customize
 * @return bool|mixed|string|void
 */
function shopcozi_sanitize_repeatable_data_field( $input , $setting ){

    $control = $setting->manager->get_control( $setting->id );

    $fields = $control->fields;
    if ( is_string( $input ) ) {
        $input = json_decode( wp_unslash( $input ) , true );
    }
    $data = wp_parse_args( $input, array() );

    if ( ! is_array( $data ) ) {
        return false;
    }
    if ( ! isset( $data['_items'] ) ) {
        return  false;
    }
    $data = $data['_items'];

    foreach( $data as $i => $item_data ){
        foreach( $item_data as $id => $value ){

            if ( isset( $fields[ $id ] ) ){
                switch( strtolower( $fields[ $id ]['type'] ) ) {
                    case 'text':
                        $data[ $i ][ $id ] = sanitize_text_field( $value );
                        break;
                    case 'textarea':
                    	$data[ $i ][ $id ] = wp_kses_post( $value );
                        break;
                    case 'editor':
                        $data[ $i ][ $id ] = wp_kses_post( $value );
                        break;
                    case 'color':
                        $data[ $i ][ $id ] = sanitize_hex_color_no_hash( $value );
                        break;
                    case 'coloralpha':
                        $data[ $i ][ $id ] = shopcozi_sanitize_color_alpha( $value );
                        break;
                    case 'checkbox':
                        $data[ $i ][ $id ] =  shopcozi_sanitize_checkbox( $value );
                        break;
                    case 'select':
                        $data[ $i ][ $id ] = '';
                        if ( is_array( $fields[ $id ]['options'] ) && ! empty( $fields[ $id ]['options'] ) ){
                            // if is multiple choices
                            if ( is_array( $value ) ) {
                                foreach ( $value as $k => $v ) {
                                    if ( isset( $fields[ $id ]['options'][ $v ] ) ) {
                                        $value [ $k ] =  $v;
                                    }
                                }
                                $data[ $i ][ $id ] = $value;
                            }else { // is single choice
                                if (  isset( $fields[ $id ]['options'][ $value ] ) ) {
                                    $data[ $i ][ $id ] = $value;
                                }
                            }
                        }
                        break;
                    case 'radio':
                        $data[ $i ][ $id ] = sanitize_text_field( $value );
                        break;
                    case 'media':
                        $value = wp_parse_args( $value,
                            array(
                                'url' => '',
                                'id'=> false
                            )
                        );
                        $value['id'] = absint( $value['id'] );
                        $data[ $i ][ $id ]['url'] = sanitize_text_field( $value['url'] );

                        if ( $url = wp_get_attachment_url( $value['id'] ) ) {
                            $data[ $i ][ $id ]['id']   = $value['id'];
                            $data[ $i ][ $id ]['url']  = $url;
                        } else {
                            $data[ $i ][ $id ]['id'] = '';
                        }
                        break;
                    default:
                        $data[ $i ][ $id ] = wp_kses_post( $value );
                }

            }else {
                $data[ $i ][ $id ] = wp_kses_post( $value );
            }

            if ( count( $data[ $i ] ) !=  count( $fields ) ) {
                foreach ( $fields as $k => $f ){
                    if ( ! isset( $data[ $i ][ $k ] ) ) {
                        $data[ $i ][ $k ] = '';
                    }
                }
            }

        }
    }

    return $data;
}

function shopcozi_upgrade_pro_msg(){
    return wp_kses_post( __('Upgrade to <a target="_blank" href="https://www.britetechs.com/theme/shopcozi-pro/">Shopcozi Pro</a> to be able to add more items and unlock other premium features!','shopcozi'));
}

function shopcozi_sanitize_array( $input ) {
    $output = $input;
    if ( ! is_array( $input ) ) {
        $output = explode( ',', $input );
    }
    if ( ! empty( $output ) ) {
        return array_map( 'sanitize_text_field', $output );
    }
    return array();
}

function shopcozi_sanitize_html( $html ) {
    return wp_kses_post( force_balance_tags( $html ) );
}

/**
 * Text sanitization
 *
 * @param  string   Input to be sanitized (either a string containing a single string or multiple, separated by commas)
 * @return string   Sanitized input
 */
if ( ! function_exists( 'shopcozi_text_sanitization' ) ) {
    function shopcozi_text_sanitization( $input ) {

        if ( strpos( $input, ',' ) !== false) {
            $input = explode( ',', $input );
        }

        if( is_array( $input ) ) {
            foreach ( $input as $key => $value ) {
                $input[$key] = sanitize_text_field( $value );
            }
            $input = implode( ',', $input );
        }
        else {
            $input = sanitize_text_field( $input );
        }
        
        return $input;
    }
}