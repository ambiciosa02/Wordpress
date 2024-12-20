<?php
/**
 * @author  Spexo
 * @since   1.0.0
 * @version 1.0.0
 */

$opt_name = TMPCODER_THEME_OPTION_NAME;

Redux::setSection( $opt_name, 
    array(
        'title'   => esc_html__( 'Custom CSS','spexo' ),
        'id'      => 'tmpcoder_custom_css_section',        
        'icon'    => 'el el-css',
        'desc'    => __( 'Add your custom CSS to style the theme.', 'spexo' ),
        'fields' => array(
            array(
                'id'       => 'tmpcoder_custom_css',
                'type'     => 'ace_editor',
                'mode'     => 'css',
                'title'    => __( 'Custom CSS', 'spexo' ),
                'subtitle' => __( 'Enter your custom CSS.', 'spexo' ),
                'theme'    => 'chrome',
                'desc'     => __( 'Add your custom CSS here.', 'spexo' ),
                'default'  => '',
            ),
        ),
    )
);

