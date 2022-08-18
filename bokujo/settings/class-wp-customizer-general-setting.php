<?php 

function wp_general_setting_register($wp_customize){

    $wp_customize->add_panel('general_setting_panel',array(
        'title'      => __("General Settings"),
        'priority'   =>11,
    ));


    $header_setting_section = 'header_setting_section';
    $wp_customize->add_section($header_setting_section, array(
        'title' => __('Info'),
        'priority' => 1,
        'panel' => 'general_setting_panel'
    ));



    // Telephone No
    $wp_customize->add_setting('line_contact', array(
        
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'line_contact', array(
         'label'             => __('Telephone No'),
         'section'           => $header_setting_section,
         'settings'          => 'line_contact',    
    )));

    // Image
    $wp_customize->add_setting('tel_image', array(

    ));

    $wp_customize->add_control(
      new WP_Customize_Image_Control(
          $wp_customize,
          'tel_image',
          array(
              'label'      => __( 'Tel Image', 'tel_image' ),
              'section'    => $header_setting_section,
              'settings'   => 'tel_image',
            )
        )
    );

        // Image
        $wp_customize->add_setting('tel_limage', array(

        ));
    
        $wp_customize->add_control(
          new WP_Customize_Image_Control(
              $wp_customize,
              'tel_limage',
              array(
                  'label'      => __( 'Tel Image', 'tel_limage' ),
                  'section'    => $header_setting_section,
                  'settings'   => 'tel_limage',
                )
            )
        );

    // Telephone No
    $wp_customize->add_setting('contact_text', array(
        
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_text', array(
         'label'             => __('Line Link'),
         'section'           => $header_setting_section,
         'settings'          => 'contact_text',    
    )));

    // Contact Title
    $wp_customize->add_setting('line_title', array(
        
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'line_title ', array(
         'label'             => __('Line Text'),
         'section'           => $header_setting_section,
         'settings'          => 'line_title',    
    )));

    // Image
    $wp_customize->add_setting('line_image', array(

    ));

    $wp_customize->add_control(
      new WP_Customize_Image_Control(
          $wp_customize,
          'line_image',
          array(
              'label'      => __( 'Line Image', 'line_image' ),
              'section'    => $header_setting_section,
              'settings'   => 'line_image',
            )
        )
    );

        // Image
        $wp_customize->add_setting('line_limage', array(

        ));
    
        $wp_customize->add_control(
          new WP_Customize_Image_Control(
              $wp_customize,
              'line_limage',
              array(
                  'label'      => __( 'Line Large Image', 'line_limage' ),
                  'section'    => $header_setting_section,
                  'settings'   => 'line_limage',
                )
            )
        );


    $wp_customize->add_setting('mail_link', array(
        
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mail_link', array(
         'label'             => __('Mail Link'),
         'section'           => $header_setting_section,
         'settings'          => 'mail_link',    
    )));

    // Contact Title
    $wp_customize->add_setting('contact_title', array(
        
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_title ', array(
         'label'             => __('Mail Text'),
         'section'           => $header_setting_section,
         'settings'          => 'contact_title',    
    )));

    // Image
    $wp_customize->add_setting('mail_image', array(

    ));

    $wp_customize->add_control(
      new WP_Customize_Image_Control(
          $wp_customize,
          'mail_image',
          array(
              'label'      => __( 'Mail Image', 'mail_image' ),
              'section'    => $header_setting_section,
              'settings'   => 'mail_image',
            )
        )
    );

        // Image
        $wp_customize->add_setting('mail_limage', array(

        ));
    
        $wp_customize->add_control(
          new WP_Customize_Image_Control(
              $wp_customize,
              'mail_limage',
              array(
                  'label'      => __( 'Mail Large Image', 'mail_limage' ),
                  'section'    => $header_setting_section,
                  'settings'   => 'mail_limage',
                )
            )
        );



    $general_setting_section = 'general_setting_section';
    $wp_customize->add_section($general_setting_section, array(
        'title' => __('Payment System'),
        'priority' => 1,
        'panel' => 'general_setting_panel'
    ));


    $wp_customize->add_setting('payment_title', array(
        
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'payment_title', array(
         'label'             => __('Payment Title'),
         'section'           => $general_setting_section,
         'settings'          => 'payment_title',    
    )));

    // Image
    $wp_customize->add_setting('payment', array(

    ));

    $wp_customize->add_control(
      new WP_Customize_Image_Control(
          $wp_customize,
          'payment',
          array(
              'label'      => __( 'Payment Image', 'payment' ),
              'section'    => $general_setting_section,
              'settings'   => 'payment',
            )
        )
    );
	
	    // Image
    $wp_customize->add_setting('rpay_image', array(

    ));

    $wp_customize->add_control(
      new WP_Customize_Image_Control(
          $wp_customize,
          'rpay_image',
          array(
              'label'      => __( 'Rpay Image', 'rpay_image' ),
              'section'    => $general_setting_section,
              'settings'   => 'rpay_image',
            )
        )
    );





}
add_action('customize_register', 'wp_general_setting_register');