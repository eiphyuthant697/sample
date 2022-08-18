<?php

// Footer Setting
function wp_footer_register($wp_customize){


    $wp_customize->add_panel('footer_general_panel',array(
        'title'      => __("Footer"),
        'priority'   =>130,
    ));

    // Footer's Content Settings
    $wp_customize->add_section('footer_content_section', array(
        'title' => __('Content Settings'),
        'priority' => 130,
        'panel' => 'footer_general_panel'
    ));

        //hide checkbox
    $wp_customize->add_setting('hide_footer_content_setting',array(
             'default'   => true,
    ));  

    $wp_customize->add_control( 'hide_footer_content_setting', array(
           'section'   => 'footer_content_section',
           'label'     => __('Hide This Section'),
           'settings'  => 'hide_footer_content_setting',
           'type'      => 'checkbox'
    ));


    // Footer Logo
    $wp_customize->add_setting( 'footer_logo',
       array(
          'default' => '',
          'transport' => 'refresh',
          'sanitize_callback' => 'esc_url_raw'
       )
    );
     
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo',
       array(
          'label' => __( 'Footer Logo' ),
          'section' => 'footer_content_section',
          'button_labels' => array( // Optional.
             'select' => __( 'Select Image' ),
             'change' => __( 'Change Image' ),
             'remove' => __( 'Remove' ),
             'default' => __( 'Default' ),
             'placeholder' => __( 'No image selected' ),
             'frame_title' => __( 'Select Image' ),
             'frame_button' => __( 'Choose Image' ),
          )
       )
    ) );


    //hide checkbox
    $wp_customize->add_setting('hide_footer_menu',array(
             'default'   => true,
    ));  

    $wp_customize->add_control( 'hide_footer_menu', array(
           'section'   => 'footer_content_section',
           'label'     => __('Hide Footer Menu'),
           'settings'  => 'hide_footer_menu',
           'type'      => 'checkbox'
    ));

        // Footer Phone no
    $wp_customize->add_setting('footer_ph_no', array(
        'default'     => '+95 (0)9 451663606, 9 898819468',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_ph_no', array(
         'label'             => __('Footer Phone'),
         'section'           => 'footer_content_section',
         'settings'          => 'footer_ph_no',    
    )));

    // Footer Address
    $wp_customize->add_setting('footer_address_setting', array(
        'default'     => 'Next Innovations co.,LtdOffice Address - No(446),Thihathu Street,11 Ward,South Okkalapa Tsp,Yangon.',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_address_setting', array(
         'label'             => __('Footer Address'),
         'section'           => 'footer_content_section',
         'settings'          => 'footer_address_setting', 
         'type' => 'textarea'   
    )));
    // Footer Text Color
    $wp_customize->add_setting( 'footer_text_color',
        array(
            'default' => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    // Footer's General Settings
    $wp_customize->add_section('footer_section', array(
        'title' => __('General Settings'),
        'priority' => 130,
        'panel' => 'footer_general_panel'
    ));

    // Footer background color
    $wp_customize->add_setting( 'footer_bg_color',
        array(
            'default' => '#000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_bg_color',
        array(
            'label' => __( 'Footer Background Color' ),
            'section' => 'footer_section',
            'type' => 'color',
        ))
    );


    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_text_color',
        array(
            'label' => __( 'Footer Text Color' ),
            'section' => 'footer_section',
            'type' => 'color',
        ))
    );
  
    // Footer Text
    $wp_customize->add_setting('footer_text', array(
        'type' => 'theme_mod',
        'default' => 'Copyright 2020. All rights reserved.'
    ));
  
    $wp_customize->add_control('footer_text', array(
        'label' => __('Meta Keyword'),
        'section' => 'footer_section',
    ));

}
add_action('customize_register', 'wp_footer_register');