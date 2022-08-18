<?php
//Custom Theme Option

function blog_customize_register( $wp_customize ) {

	$wp_customize->add_panel('main_panel',array(
        'title'      => __(" Theme Option "),
        'priority'   =>1,
    ));

        //Block 1 Section
    $wp_customize->add_section(
        'banner_section',
        array(
            'title'     => 'Banner',
            'priority'  => 202,
            'panel'     => 'main_panel'
        )
    );

    //hide checkbox
    $wp_customize->add_setting('hide_banner_setting',array(
             'default'   => true,
    ));  

    $wp_customize->add_control( 'hide_banner_setting', array(
           'section'   => 'banner_section',
           'label'     => __('Hide This Section'),
           'settings'  => 'hide_banner_setting',
           'type'      => 'checkbox'
    ));


    // title
	$wp_customize->add_setting('banner_title_setting', array(
	    'default'     => 'Popular News',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'banner_title_setting', array(
	     'label'             => __('About Us Title'),
	     'section'           => 'banner_section',
	     'settings'          => 'banner_title_setting',    
	)));



    //  Background Image
    $wp_customize->add_setting( 'banner_image',
       array(
          'default' => '',
          'transport' => 'refresh',
          'sanitize_callback' => 'esc_url_raw'
       )
    );
     
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'banner_image',
       array(
          'label' => __( 'About Us BgImage ' ),
          'section' => 'banner_section',
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

    //About Us Section
    $wp_customize->add_section(
        'home_block_1',
        array(
            'title'     => 'About Us',
            'priority'  => 202,
            'panel'     => 'main_panel'
        )
    );

    //hide checkbox
    $wp_customize->add_setting('hide_blog_1_area_setting',array(
             'default'   => true,
    ));  

    $wp_customize->add_control( 'hide_blog_1_area_setting', array(
           'section'   => 'home_block_1',
           'label'     => __('Hide This Section'),
           'settings'  => 'hide_blog_1_area_setting',
           'type'      => 'checkbox'
    ));


    // title
	$wp_customize->add_setting('home_title_block_1', array(
	    'default'     => 'WHAT’S NEXT INNOVATIONS',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_title_block_1', array(
	     'label'             => __('About Us Title'),
	     'section'           => 'home_block_1',
	     'settings'          => 'home_title_block_1',    
	)));


    // Description
    $wp_customize->add_setting('home_description_block_1', array(
        'default'     => 'As Next Innovations Co.,Ltd is a company based in Japan, we provide high quality and innovative web design with our professional web developers and satisfied customers. We are a staff of Japanese staff who have a lot of knowledge about UI, UX and also do many Japanese projects.',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_description_block_1', array(
         'label'             => __('About Us Description'),
         'section'           => 'home_block_1',
         'settings'          => 'home_description_block_1', 
         'type' => 'textarea'   
    )));

    //  Background Image
    $wp_customize->add_setting( 'abt_bgImage',
       array(
          'default' => '',
          'transport' => 'refresh',
          'sanitize_callback' => 'esc_url_raw'
       )
    );
     
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'abt_bgImage',
       array(
          'label' => __( 'About Us BgImage ' ),
          'section' => 'home_block_1',
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

    //About Us Content Section
    $wp_customize->add_section(
        'about_us_content_section',
        array(
            'title'     => 'About Us Content',
            'priority'  => 202,
            'panel'     => 'main_panel'
        )
    );

    //hide checkbox
    $wp_customize->add_setting('hide_about_us_content',array(
             'default'   => true,
    ));  

    $wp_customize->add_control( 'hide_about_us_content', array(
           'section'   => 'about_us_content_section',
           'label'     => __('Hide This Section'),
           'settings'  => 'hide_about_us_content',
           'type'      => 'checkbox'
    ));


    // Content 1 title
	$wp_customize->add_setting('abt_content_1_title', array(
	    'default'     => 'DESIGN',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'abt_content_1_title', array(
	     'label'             => __('Content 1 Title'),
	     'section'           => 'about_us_content_section',
	     'settings'          => 'abt_content_1_title',    
	)));

    // Content 1 Description
    $wp_customize->add_setting('abt_content_1_description', array(
        'default'     => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text

',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'abt_content_1_description', array(
         'label'             => __('Content 1 Description'),
         'section'           => 'about_us_content_section',
         'settings'          => 'abt_content_1_description', 
         'type' => 'textarea'   
    )));

    //  Content 1 Image
    $wp_customize->add_setting( 'abt_content_1_image',
       array(
          'default' => '',
          'transport' => 'refresh',
          'sanitize_callback' => 'esc_url_raw'
       )
    );
     
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'abt_content_1_image',
       array(
          'label' => __( 'Content 1 Image ' ),
          'section' => 'about_us_content_section',
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

    // Content 1 title
	$wp_customize->add_setting('abt_content_2_title', array(
	    'default'     => 'DEVELOP',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'abt_content_2_title', array(
	     'label'             => __('Content 2 Title'),
	     'section'           => 'about_us_content_section',
	     'settings'          => 'abt_content_2_title',    
	)));

    // Content 1 Description
    $wp_customize->add_setting('abt_content_2_description', array(
        'default'     => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'abt_content_2_description', array(
         'label'             => __('Contet 2 Description'),
         'section'           => 'about_us_content_section',
         'settings'          => 'abt_content_2_description', 
         'type' => 'textarea'   
    )));

    //  Content 1 Image
    $wp_customize->add_setting( 'abt_content_2_image',
       array(
          'default' => '',
          'transport' => 'refresh',
          'sanitize_callback' => 'esc_url_raw'
       )
    );
     
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'abt_content_2_image',
       array(
          'label' => __( 'Content 2 Image ' ),
          'section' => 'about_us_content_section',
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
    // Content 1 title
	$wp_customize->add_setting('abt_content_3_title', array(
	    'default'     => 'MARKETING',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'abt_content_3_title', array(
	     'label'             => __('Content 3 Title'),
	     'section'           => 'about_us_content_section',
	     'settings'          => 'abt_content_3_title',    
	)));

    // Content 1 Description
    $wp_customize->add_setting('abt_content_3_description', array(
        'default'     => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'abt_content_3_description', array(
         'label'             => __('Content 3 Description'),
         'section'           => 'about_us_content_section',
         'settings'          => 'abt_content_3_description', 
         'type' => 'textarea'   
    )));

    //  Content 1 Image
    $wp_customize->add_setting( 'abt_content_3_image',
       array(
          'default' => '',
          'transport' => 'refresh',
          'sanitize_callback' => 'esc_url_raw'
       )
    );
     
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'abt_content_3_image',
       array(
          'label' => __( 'Content 3 Image ' ),
          'section' => 'about_us_content_section',
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
    // Content 4 title
	$wp_customize->add_setting('abt_content_4_title', array(
	    'default'     => 'SUCCESS',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'abt_content_4_title', array(
	     'label'             => __('Content 4 Title'),
	     'section'           => 'about_us_content_section',
	     'settings'          => 'abt_content_4_title',    
	)));

    // Content 4 Description
    $wp_customize->add_setting('abt_content_4_description', array(
        'default'     => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'abt_content_4_description', array(
         'label'             => __('Content 4 Description'),
         'section'           => 'about_us_content_section',
         'settings'          => 'abt_content_4_description', 
         'type' => 'textarea'   
    )));

    //  Content 1 Image
    $wp_customize->add_setting( 'abt_content_4_image',
       array(
          'default' => '',
          'transport' => 'refresh',
          'sanitize_callback' => 'esc_url_raw'
       )
    );
     
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'abt_content_4_image',
       array(
          'label' => __( 'Content 4 Image ' ),
          'section' => 'about_us_content_section',
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



	//Our Service Section
    $wp_customize->add_section(
        'our_service_section',
        array(
            'title'     => 'Our Service',
            'priority'  => 202,
            'panel'     => 'main_panel'
        )
    );

    //hide checkbox
    $wp_customize->add_setting('hide_our_service_setting',array(
             'default'   => true,
    ));  

    $wp_customize->add_control( 'hide_our_service_setting', array(
           'section'   => 'our_service_section',
           'label'     => __('Hide Our Service Section'),
           'settings'  => 'hide_our_service_setting',
           'type'      => 'checkbox'
    ));

    //   Image 1
    $wp_customize->add_setting( 'service_1_image',
       array(
          'default' => '',
          'transport' => 'refresh',
          'sanitize_callback' => 'esc_url_raw'
       )
    );
     
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'service_1_image',
       array(
          'label' => __( 'Service 1 Image ' ),
          'section' => 'our_service_section',
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
        //   Image 2
    $wp_customize->add_setting( 'service_2_image',
       array(
          'default' => '',
          'transport' => 'refresh',
          'sanitize_callback' => 'esc_url_raw'
       )
    );
     
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'service_2_image',
       array(
          'label' => __( 'Service 2 Image ' ),
          'section' => 'our_service_section',
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
        //   Image 3
    $wp_customize->add_setting( 'service_3_image',
       array(
          'default' => '',
          'transport' => 'refresh',
          'sanitize_callback' => 'esc_url_raw'
       )
    );
     
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'service_3_image',
       array(
          'label' => __( 'Service 3 Image ' ),
          'section' => 'our_service_section',
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

    // Service title
	$wp_customize->add_setting('service_title', array(
	    'default'     => 'Offshore Development',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'service_title', array(
	     'label'             => __('Service Title'),
	     'section'           => 'our_service_section',
	     'settings'          => 'service_title',    
	)));

    // Content 4 Description
    $wp_customize->add_setting('service_description', array(
        'default'     => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'service_description', array(
         'label'             => __('Service Description'),
         'section'           => 'our_service_section',
         'settings'          => 'service_description', 
         'type' => 'textarea'   
    )));



	//client Section
    $wp_customize->add_section(
        'client_section',
        array(
            'title'     => 'Client Section',
            'priority'  => 202,
            'panel'     => 'main_panel'
        )
    );

    //hide checkbox
    $wp_customize->add_setting('hide_client_section',array(
             'default'   => true,
    ));  

    $wp_customize->add_control( 'hide_client_section', array(
           'section'   => 'client_section',
           'label'     => __('Hide This Section'),
           'settings'  => 'hide_client_section',
           'type'      => 'checkbox'
    ));

            //   Image 1
    $wp_customize->add_setting( 'client_1_image',
       array(
          'default' => '',
          'transport' => 'refresh',
          'sanitize_callback' => 'esc_url_raw'
       )
    );
     
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'client_1_image',
       array(
          'label' => __( 'Client 1 Image ' ),
          'section' => 'client_section',
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

    // title
	$wp_customize->add_setting('client_1_title', array(
	    'default'     => 'TDO Business Solution',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'client_1_title', array(
	     'label'             => __('Client 1 Title'),
	     'section'           => 'client_section',
	     'settings'          => 'client_1_title',    
	)));
                //   Image 2
    $wp_customize->add_setting( 'client_2_image',
       array(
          'default' => '',
          'transport' => 'refresh',
          'sanitize_callback' => 'esc_url_raw'
       )
    );
     
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'client_2_image',
       array(
          'label' => __( 'Client 2 Image ' ),
          'section' => 'client_section',
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

    // title
	$wp_customize->add_setting('client_2_title', array(
	    'default'     => 'Omedia',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'client_2_title', array(
	     'label'             => __('Client 2 Title'),
	     'section'           => 'client_section',
	     'settings'          => 'client_2_title',    
	)));
                //   Image 3
    $wp_customize->add_setting( 'client_3_image',
       array(
          'default' => '',
          'transport' => 'refresh',
          'sanitize_callback' => 'esc_url_raw'
       )
    );
     
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'client_3_image',
       array(
          'label' => __( 'Client 3 Image ' ),
          'section' => 'client_section',
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

        // title
	$wp_customize->add_setting('client_3_title', array(
	    'default'     => 'Trust Venture Partners',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'client_3_title', array(
	     'label'             => __('Client 3 Title'),
	     'section'           => 'client_section',
	     'settings'          => 'client_3_title',    
	)));
                //   Image 4
    $wp_customize->add_setting( 'client_4_image',
       array(
          'default' => '',
          'transport' => 'refresh',
          'sanitize_callback' => 'esc_url_raw'
       )
    );
     
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'client_4_image',
       array(
          'label' => __( 'Client 4 Image ' ),
          'section' => 'client_section',
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
            // title
	$wp_customize->add_setting('client_4_title', array(
	    'default'     => 'Trust Venture Partners',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'client_4_title', array(
	     'label'             => __('Client 4 Title'),
	     'section'           => 'client_section',
	     'settings'          => 'client_4_title',    
	)));
                //   Image 5
    $wp_customize->add_setting( 'client_5_image',
       array(
          'default' => '',
          'transport' => 'refresh',
          'sanitize_callback' => 'esc_url_raw'
       )
    );
     
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'client_5_image',
       array(
          'label' => __( 'Client 5 Image ' ),
          'section' => 'client_section',
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
    // title
	$wp_customize->add_setting('client_5_title', array(
	    'default'     => 'Trust Venture Partners',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'client_5_title', array(
	     'label'             => __('Client 5 Title'),
	     'section'           => 'client_section',
	     'settings'          => 'client_5_title',    
	)));   

                //   Image 6
    $wp_customize->add_setting( 'client_6_image',
       array(
          'default' => '',
          'transport' => 'refresh',
          'sanitize_callback' => 'esc_url_raw'
       )
    );
     
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'client_6_image',
       array(
          'label' => __( 'Client 6 Image ' ),
          'section' => 'client_section',
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
        // title
	$wp_customize->add_setting('client_6_title', array(
	    'default'     => 'Trust Venture Partners',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'client_6_title', array(
	     'label'             => __('Client 6 Title'),
	     'section'           => 'client_section',
	     'settings'          => 'client_6_title',    
	))); 
                    //   Image 6
    $wp_customize->add_setting( 'client_7_image',
       array(
          'default' => '',
          'transport' => 'refresh',
          'sanitize_callback' => 'esc_url_raw'
       )
    );
     
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'client_7_image',
       array(
          'label' => __( 'Client 7 Image ' ),
          'section' => 'client_section',
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
        // title
	$wp_customize->add_setting('client_7_title', array(
	    'default'     => 'Trust Venture Partners',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'client_7_title', array(
	     'label'             => __('Client 7 Title'),
	     'section'           => 'client_section',
	     'settings'          => 'client_7_title',    
	))); 
                    //   Image 6
    $wp_customize->add_setting( 'client_8_image',
       array(
          'default' => '',
          'transport' => 'refresh',
          'sanitize_callback' => 'esc_url_raw'
       )
    );
     
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'client_8_image',
       array(
          'label' => __( 'Client 8 Image ' ),
          'section' => 'client_section',
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
        // title
	$wp_customize->add_setting('client_8_title', array(
	    'default'     => 'Trust Venture Partners',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'client_8_title', array(
	     'label'             => __('Client 8 Title'),
	     'section'           => 'client_section',
	     'settings'          => 'client_8_title',    
	))); 
	//Block 2 Section
    $wp_customize->add_section(
        'home_block_2',
        array(
            'title'     => 'News',
            'priority'  => 202,
            'panel'     => 'main_panel'
        )
    );

    //hide checkbox
    $wp_customize->add_setting('hide_blog_2_area_setting',array(
             'default'   => true,
    ));  

    $wp_customize->add_control( 'hide_blog_2_area_setting', array(
           'section'   => 'home_block_2',
           'label'     => __('Hide This Section'),
           'settings'  => 'hide_blog_2_area_setting',
           'type'      => 'checkbox'
    ));

    //Category
	$wp_customize->add_setting(
		'news_category_setting'
	);
	$wp_customize->add_control(
		new WP_Customize_Category_Control(
		$wp_customize,
		'news_category_setting',
			array(
			  'label'    => 'Category',
			  'settings' => 'news_category_setting',
			  'section'  => 'home_block_2'
			)
		)
	);

	// Category post order area
	$wp_customize->add_setting('news_category_post_order_setting');

	$wp_customize->add_control( 'news_category_post_order_setting', array(
	    'type'    => 'select',
	    'section' => 'home_block_2', // Add a default or your own section
	    'label'   => __( 'Order Selection' ),
	    // 'description' => __( 'This is a custom radio input.' ),
	    'choices' => array(
	    'DESC'    => __( 'desc' ),
	    'ASC'     => __( 'asc' ),
	    ),
	) );

	//limit count
	$wp_customize->add_setting(
		'news_post_limit_setting',array(
	        'default' => -1
	));

	$wp_customize->add_control('news_post_limit_setting',array(
		'type'        => 'number' ,
		'section'     => 'home_block_2' ,
		'settings'    => 'news_post_limit_setting' ,
		'label'       => __('Range'),
		'description' => __('This is the description.'),
	));
}
add_action( 'customize_register', 'blog_customize_register' );

if (class_exists('WP_Customize_Control')) {
    class WP_Customize_Category_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         *
         * @since 3.4.0
         */
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select &mdash;' ),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                )
            );
 
            // Hackily add in the data link parameter.
            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
 
            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
        }
    }
}

//Custom Pagination
add_action( 'custom_pagination', 'post_pagination', 2 );
function custom_pagination($query){
    $big = 999999999; // need an unlikely integer
 
    echo paginate_links( array(
        'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format'    => '?page=%#%',
        'current'   => max( 1, get_query_var('page') ),
        'total'     => $query->max_num_pages,
        'prev_text' => __( '&laquo;', 'Sinatra' ),
        'next_text' => __( '&raquo;', 'Sinatra' ),
    ) );
}