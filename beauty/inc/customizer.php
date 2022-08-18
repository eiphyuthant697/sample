<?php 
/**
 *Massage Spa Theme Customizer
 *
 * @package Massage Spa
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function massage_spa_customize_register( $wp_customize ) {	
	require_once get_template_directory() . '/inc/Real_Home_Customizer_Sanitize_Callback.php';
	require_once get_template_directory() . '/inc/customize_repeater_control.php';
	require_once get_template_directory() . '/inc/customize_repeater_setting.php';

	function massage_spa_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}
	
	function massage_spa_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}  
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	//Layout Options
	$wp_customize->add_section('layout_option',array(
			'title'	=> __('Site Layout','massage-spa'),			
			'priority'	=> 1,
	));		
	
	$wp_customize->add_setting('sitebox_layout',array(
			'sanitize_callback' => 'massage_spa_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'sitebox_layout', array(
    	   'section'   => 'layout_option',    	 
		   'label'	=> __('Check to Box Layout','massage-spa'),
		   'description'	=> __('if you want to box layout please check the Box Layout Option.','massage-spa'),
    	   'type'      => 'checkbox'
     )); //Layout Section 
	
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#0ABBB5',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','massage-spa'),			
			 'description'	=> __('More color options in PRO Version','massage-spa'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	// Slider Section		
	$wp_customize->add_section( 'slider_options', array(
            'title' => __('Slider Section', 'massage-spa'),
            'priority' => null,
			'description'	=> __('Default image size for slider is 1400 x 717 pixel.','massage-spa'),            			
    ));
	
	$wp_customize->add_setting('sliderpage1',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'massage_spa_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('sliderpage1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','massage-spa'),
			'section'	=> 'slider_options'
	));	
	
	$wp_customize->add_setting('sliderpage2',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'massage_spa_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('sliderpage2',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','massage-spa'),
			'section'	=> 'slider_options'
	));	
	
	$wp_customize->add_setting('sliderpage3',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'massage_spa_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('sliderpage3',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','massage-spa'),
			'section'	=> 'slider_options'
	));	// Slider Section	
	
	$wp_customize->add_setting('slider_morebtn',array(
	 		'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	 ));
	 
	 $wp_customize->add_control('slider_morebtn',array(
	 		'settings'	=> 'slider_morebtn',
			'section'	=> 'slider_options',
			'label'		=> __('Add text for slide read more button','massage-spa'),
			'type'		=> 'text'
	 ));// Slider Read more	
	
	$wp_customize->add_setting('show_slider',array(
				'default' => false,
				'sanitize_callback' => 'massage_spa_sanitize_checkbox',
				'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_slider', array(
			   'settings' => 'show_slider',
			   'section'   => 'slider_options',
			   'label'     => __('Check To Show This Section','massage-spa'),
			   'type'      => 'checkbox'
	 ));//Show Slider Section	
	 
	  // Three Column Services Section
	$wp_customize->add_section('pageboxs_section', array(
		'title'	=> __('Services Page Section','massage-spa'),
		'description'	=> __('Select pages from the dropdown for three column Services Page section','massage-spa'),
		'priority'	=> null
	));		
	$wp_customize->add_setting( 'service_title', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	  ) );
  
	  $wp_customize->add_control( 'service_title', array(
		'type' => 'text',
		'section' => 'pageboxs_section', // Add a default or your own section
		'label' => __( 'Service Title' ),
		'description' => __( 'Please add service title' ),
	  ) );

	  $wp_customize->add_setting( 'service_description', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	  ) );
  
	  $wp_customize->add_control( 'service_description', array(
		'type' => 'textarea',
		'section' => 'pageboxs_section', // Add a default or your own section
		'label' => __( 'Service Description' ),
		'description' => __( 'Please add service description' ),
	  ) );

	
	$wp_customize->add_setting('show_servicesbox',array(
			'default' => false,
			'sanitize_callback' => 'massage_spa_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_servicesbox', array(
			   'settings' => 'show_servicesbox',
			   'section'   => 'pageboxs_section',
			   'label'     => __('Check To Show This Section','massage-spa'),
			   'type'      => 'checkbox'
	 ));//Show Services Section	 
	
	
	// Fashioners Page Section 	
	$wp_customize->add_section('fashioners_section', array(
		'title'	=> __('We are Fashioners Section','massage-spa'),
		'description'	=> __('Select Pages from the dropdown for We are Fashioners section','massage-spa'),
		'priority'	=> null
	));		
	
	$wp_customize->add_setting('fashioner_page',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'massage_spa_sanitize_dropdown_pages'
		));
 
	$wp_customize->add_control(	'fashioner_page',array(
			'type' => 'dropdown-pages',			
			'section' => 'fashioners_section',
	));	
	$wp_customize->add_setting( 'fashioner_small_text', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	  ) );
  
	  $wp_customize->add_control( 'fashioner_small_text', array(
		'type' => 'text',
		'section' => 'fashioners_section', // Add a default or your own section
		'label' => __( 'Welcome Small Text' ),
		'description' => __( 'Please insert welcome small text' ),
	  ) );	

	  $wp_customize->add_setting( 'fashioner_sub_header', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	  ) );
  
	  $wp_customize->add_control( 'fashioner_sub_header', array(
		'type' => 'text',
		'section' => 'fashioners_section', // Add a default or your own section
		'label' => __( 'Welcome Sub Header' ),
		'description' => __( 'Please insert welcome sub header' ),
	  ) );	
	
	
	$wp_customize->add_setting('show_fashioner_page',array(
			'default' => false,
			'sanitize_callback' => 'massage_spa_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_fashioner_page', array(
			   'settings' => 'show_fashioner_page',
			   'section'   => 'fashioners_section',
			   'label'     => __('Check To Show This Section','massage-spa'),
			   'type'      => 'checkbox'
	 ));//Show Fashioner Page Section 

	// Quick contact section 	
	$wp_customize->add_section('salon_offer_section', array(
		'title'	=> __('Salon Offer','massage-spa'),
		'description'	=> __('Put the info of salon offer','massage-spa'),
		'priority'	=> null
	));		
	$wp_customize->add_setting( 'salon_offer_title', array(
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'salon_offer_title', array(
	  'type' => 'text',
	  'section' => 'salon_offer_section', // Add a default or your own section
	  'label' => __( 'Title' ),
	  'description' => __( 'Please insert title' ),
	) );

	$wp_customize->add_setting( 'salon_offer_sub_title', array(
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'salon_offer_sub_title', array(
	  'type' => 'text',
	  'section' => 'salon_offer_section', // Add a default or your own section
	  'label' => __( 'Sub Title' ),
	  'description' => __( 'Please insert sub title' ),
	) );

	$wp_customize->add_setting('show_salon_offer_page',array(
		'default' => false,
		'sanitize_callback' => 'massage_spa_sanitize_checkbox',
		'capability' => 'edit_theme_options',
    ));	 

    $wp_customize->add_control( 'show_salon_offer_page', array(
		   'settings' => 'show_salon_offer_page',
		   'section'   => 'salon_offer_section',
		   'label'     => __('Check To Show This Section','massage-spa'),
		   'type'      => 'checkbox'
    ));//Show Fashioner Page Section 

	//Register the setting
	$wp_customize->add_section('menu_slider_section', array(
		'title'	=> __('Menu Slider','massage-spa'),
		'description'	=> __('Put the info of menu slider','massage-spa'),
		'priority'	=> null
	));		
	$wp_customize->add_setting( 'menu_slider_title', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	  ) );
  
	  $wp_customize->add_control( 'menu_slider_title', array(
		'type' => 'text',
		'section' => 'menu_slider_section', // Add a default or your own section
		'label' => __( 'Title' ),
		'description' => __( 'Please insert title' ),
	  ) );
  
	  $wp_customize->add_setting( 'menu_slider_sub_title', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	  ) );
  
	  $wp_customize->add_control( 'menu_slider_sub_title', array(
		'type' => 'text',
		'section' => 'menu_slider_section', // Add a default or your own section
		'label' => __( 'Sub Title' ),
		'description' => __( 'Please insert sub title' ),
	  ) );
	  $wp_customize->add_setting( 'menu_slider_description', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	  ) );
  
	  $wp_customize->add_control( 'menu_slider_description', array(
		'type' => 'textarea',
		'section' => 'menu_slider_section', // Add a default or your own section
		'label' => __( 'Description' ),
		'description' => __( 'Please insert description' ),
	  ) );

	$wp_customize->add_setting(
		'menu_category_setting'
	);
	$wp_customize->add_control(
		new WP_Customize_Category_Control(
		$wp_customize,
		'menu_category_setting',
			array(
			  'label'    => 'Category',
			  'settings' => 'menu_category_setting',
			  'section'  => 'menu_slider_section'
			)
		)
	);

	// Category post order area
	$wp_customize->add_setting('menu_order_setting');

	$wp_customize->add_control( 'menu_order_setting', array(
		'type'    => 'select',
		'section' => 'menu_slider_section', // Add a default or your own section
		'label'   => __( 'Order Selection' ),
		// 'description' => __( 'This is a custom radio input.' ),
		'choices' => array(
		'DESC'    => __( 'desc' ),
		'ASC'     => __( 'asc' ),
		),
	) );

	//limit count
	$wp_customize->add_setting(
		'menu_post_limit_setting',array(
			'default' => -1
	));

	$wp_customize->add_control('menu_post_limit_setting',array(
		'type'        => 'number' ,
		'section'     => 'menu_slider_section' ,
		'settings'    => 'menu_post_limit_setting' ,
		'label'       => __('Range'),
		'description' => __('This is the description.'),
	));
	$wp_customize->add_setting( 'menu_slider_button_text', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	  ) );
  
	  $wp_customize->add_control( 'menu_slider_button_text', array(
		'type' => 'text',
		'section' => 'menu_slider_section', // Add a default or your own section
		'label' => __( 'Button Text' ),
		'description' => __( 'Please insert button text' ),
	  ) ); 
	  $wp_customize->add_setting( 'menu_slider_all_button_text', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	  ) );
  
	  $wp_customize->add_control( 'menu_slider_all_button_text', array(
		'type' => 'text',
		'section' => 'menu_slider_section', // Add a default or your own section
		'label' => __( 'All Button Text' ),
		'description' => __( 'Please insert all button text' ),
	  ) ); 

	$wp_customize->add_setting('show_menu_slider_page',array(
		'default' => false,
		'sanitize_callback' => 'massage_spa_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'show_menu_slider_page', array(
		   'settings' => 'show_menu_slider_page',
		   'section'   => 'menu_slider_section',
		   'label'     => __('Check To Show This Section','massage-spa'),
		   'type'      => 'checkbox'
	));//Show Fashioner Page Section

	//Register the setting
	$wp_customize->add_section('our_team_section', array(
		'title'	=> __('Our Team','massage-spa'),
		'description'	=> __('Put the info of our team','massage-spa'),
		'priority'	=> null
	));		
	$wp_customize->add_setting( 'our_team_title', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	  ) );
  
	  $wp_customize->add_control( 'our_team_title', array(
		'type' => 'text',
		'section' => 'our_team_section', // Add a default or your own section
		'label' => __( 'Title' ),
		'description' => __( 'Please insert title' ),
	  ) );
  
	  $wp_customize->add_setting( 'our_team_sub_title', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	  ) );
  
	  $wp_customize->add_control( 'our_team_sub_title', array(
		'type' => 'text',
		'section' => 'our_team_section', // Add a default or your own section
		'label' => __( 'Sub Title' ),
		'description' => __( 'Please insert sub title' ),
	  ) );

	$wp_customize->add_setting('show_our_team_page',array(
		'default' => false,
		'sanitize_callback' => 'massage_spa_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'show_our_team_page', array(
		   'settings' => 'show_our_team_page',
		   'section'   => 'our_team_section',
		   'label'     => __('Check To Show This Section','massage-spa'),
		   'type'      => 'checkbox'
	));//Show Fashioner Page Section

	$wp_customize->add_section('products_section', array(
		'title'	=> __('Our Products','massage-spa'),
		'description'	=> __('Put the info of our products','massage-spa'),
		'priority'	=> null
	));	


	$wp_customize->add_setting('show_our_product_page',array(
		'default' => false,
		'sanitize_callback' => 'massage_spa_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'show_our_product_page', array(
		   'settings' => 'show_our_product_page',
		   'section'   => 'products_section',
		   'label'     => __('Check To Show This Section','massage-spa'),
		   'type'      => 'checkbox'
	));//Show Fashioner Page Section
	$wp_customize->add_setting( 'product_list_title', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	  ) );
  
	  $wp_customize->add_control( 'product_list_title', array(
		'type' => 'text',
		'section' => 'products_section', // Add a default or your own section
		'label' => __( 'Title' ),
		'description' => __( 'Please insert title' ),
	  ) );
  
	  $wp_customize->add_setting( 'product_list_sub_title', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	  ) );
  
	  $wp_customize->add_control( 'product_list_sub_title', array(
		'type' => 'text',
		'section' => 'products_section', // Add a default or your own section
		'label' => __( 'Sub Title' ),
		'description' => __( 'Please insert sub title' ),
	  ) );
	  $wp_customize->add_setting( 'product_list_description', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	  ) );
  
	  $wp_customize->add_control( 'product_list_description', array(
		'type' => 'textarea',
		'section' => 'products_section', // Add a default or your own section
		'label' => __( 'Description' ),
		'description' => __( 'Please insert description' ),
	  ) );
	  $wp_customize->add_setting( 'product_list_view_more', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	  ) );
  
	  $wp_customize->add_control( 'product_list_view_more', array(
		'type' => 'text',
		'section' => 'products_section', // Add a default or your own section
		'label' => __( 'View More Text' ),
		'description' => __( 'Please insert view more text' ),
	  ) );
	// Front Page: Clients Logo
	$wp_customize->add_setting( new Real_Home_Customize_Repeater_Setting(
		$wp_customize,
		'real_home_front_page_clients_logo_lists',
		[
			'default'           => '',
			'sanitize_callback' => [ 'Real_Home_Customizer_Sanitize_Callback', 'sanitize_repeater'],
		]
	)
);
$wp_customize->add_control( new Real_Home_Customize_Repeater_Control(
		$wp_customize,
		'real_home_front_page_clients_logo_lists',
		[
			'section'           => 'products_section',
			'fields'            => [
				'product_image'         => [
					'type'              => 'image',
					'label'             => esc_html__( 'Image', 'real-home' )
				]
				,
				'product_title'         => [
					'type'          => 'text',
					'default'       => 'Test',
					'label'         => esc_html__( 'Title', 'real-home' )
				]
			],
			'row_label'         => [
				'type'              => 'field',
				'value'             => esc_html__( 'Product', 'real-home' ),
			],
			'priority'          => 15,
		]
	)
);

$wp_customize->add_section('blog_section', array(
	'title'	=> __('Our Blogs','massage-spa'),
	'description'	=> __('Put the info of our blogs','massage-spa'),
	'priority'	=> null
));	


$wp_customize->add_setting('show_our_blog_page',array(
	'default' => false,
	'sanitize_callback' => 'massage_spa_sanitize_checkbox',
	'capability' => 'edit_theme_options',
));	 

$wp_customize->add_control( 'show_our_blog_page', array(
	   'settings' => 'show_our_blog_page',
	   'section'   => 'blog_section',
	   'label'     => __('Check To Show This Section','massage-spa'),
	   'type'      => 'checkbox'
));//Show Fashioner Page Section
$wp_customize->add_setting( 'blog_title', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
  ) );

  $wp_customize->add_control( 'blog_title', array(
	'type' => 'text',
	'section' => 'blog_section', // Add a default or your own section
	'label' => __( 'Title' ),
	'description' => __( 'Please insert title' ),
  ) );

  $wp_customize->add_setting( 'blog_sub_title', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
  ) );

  $wp_customize->add_control( 'blog_sub_title', array(
	'type' => 'text',
	'section' => 'blog_section', // Add a default or your own section
	'label' => __( 'Sub Title' ),
	'description' => __( 'Please insert sub title' ),
  ) );
  $wp_customize->add_setting(
	'blog_category_setting'
);
$wp_customize->add_control(
	new WP_Customize_Category_Control(
	$wp_customize,
	'blog_category_setting',
		array(
		  'label'    => 'Category',
		  'settings' => 'blog_category_setting',
		  'section'  => 'blog_section'
		)
	)
);

// Category post order area
$wp_customize->add_setting('blog_order_setting');

$wp_customize->add_control( 'blog_order_setting', array(
	'type'    => 'select',
	'section' => 'blog_section', // Add a default or your own section
	'label'   => __( 'Order Selection' ),
	// 'description' => __( 'This is a custom radio input.' ),
	'choices' => array(
	'DESC'    => __( 'desc' ),
	'ASC'     => __( 'asc' ),
	),
) );

//limit count
$wp_customize->add_setting(
	'blog_limit_setting',array(
		'default' => -1
));

$wp_customize->add_control('blog_limit_setting',array(
	'type'        => 'number' ,
	'section'     => 'blog_section' ,
	'settings'    => 'blog_limit_setting' ,
	'label'       => __('Range'),
	'description' => __('This is the description.'),
));
$wp_customize->add_setting( 'blog_button_text', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
  ) );

  $wp_customize->add_control( 'blog_button_text', array(
	'type' => 'text',
	'section' => 'blog_section', // Add a default or your own section
	'label' => __( 'Button Text' ),
	'description' => __( 'Please insert button text' ),
  ) );
  $wp_customize->add_setting( 'blog_view_more', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
  ) );

  $wp_customize->add_control( 'blog_view_more', array(
	'type' => 'text',
	'section' => 'blog_section', // Add a default or your own section
	'label' => __( 'View More Text' ),
	'description' => __( 'Please insert view more text' ),
  ) );


  $wp_customize->add_section('extra_section', array(
	'title'	=> __('Extra Section','massage-spa'),
	'description'	=> __('Put the info of extra section','massage-spa'),
	'priority'	=> null
));	


$wp_customize->add_setting('show_extra_section',array(
	'default' => false,
	'sanitize_callback' => 'massage_spa_sanitize_checkbox',
	'capability' => 'edit_theme_options',
));	 

$wp_customize->add_control( 'show_extra_section', array(
	   'settings' => 'show_extra_section',
	   'section'   => 'extra_section',
	   'label'     => __('Check To Show This Section','massage-spa'),
	   'type'      => 'checkbox'
));//Show Fashioner Page Section
$wp_customize->add_setting( 'extra_section_description', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
  ) );

  $wp_customize->add_control( 'extra_section_description', array(
	'type' => 'text',
	'section' => 'extra_section', // Add a default or your own section
	'label' => __( 'Title' ),
	'description' => __( 'Please insert title' ),
  ) );

  $wp_customize->add_setting( 'extra_section_booking_text', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
  ) );

  $wp_customize->add_control( 'extra_section_booking_text', array(
	'type' => 'text',
	'section' => 'extra_section', // Add a default or your own section
	'label' => __( 'Booking Text' ),
	'description' => __( 'Please insert booking text' ),
  ) );
  $wp_customize->add_setting( 'extra_section_contact_phone_no', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
  ) );

  $wp_customize->add_control( 'extra_section_contact_phone_no', array(
	'type' => 'text',
	'section' => 'extra_section', // Add a default or your own section
	'label' => __( 'Phone No' ),
	'description' => __( 'Please insert phone no' ),
  ) );
  $wp_customize->add_setting( 'extra_bg_image',
  array(
	 'default' => '',
	 'transport' => 'refresh',
	 'sanitize_callback' => 'esc_url_raw'
  )
);

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'extra_bg_image',
  array(
	 'label' => __( 'Background Image' ),
	 'section' => 'extra_section',
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

// Access 
$wp_customize->add_section('access_section', array(
	'title'	=> __('Access Section','massage-spa'),
	'description'	=> __('Put the info of access section','massage-spa'),
	'priority'	=> null
));	


$wp_customize->add_setting('show_access_section',array(
	'default' => false,
	'sanitize_callback' => 'massage_spa_sanitize_checkbox',
	'capability' => 'edit_theme_options',
));	 

$wp_customize->add_control( 'show_access_section', array(
	   'settings' => 'show_access_section',
	   'section'   => 'access_section',
	   'label'     => __('Check To Show This Section','massage-spa'),
	   'type'      => 'checkbox'
));//Show Fashioner Page Section

$wp_customize->add_setting( 'access_section_title', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
  ) );

  $wp_customize->add_control( 'access_section_title', array(
	'type' => 'text',
	'section' => 'access_section', // Add a default or your own section
	'label' => __( 'Title' ),
	'description' => __( 'Please insert title' ),
  ) );

  $wp_customize->add_setting( 'access_section_sub_title', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
  ) );

  $wp_customize->add_control( 'access_section_sub_title', array(
	'type' => 'text',
	'section' => 'access_section', // Add a default or your own section
	'label' => __( 'Sub Title' ),
	'description' => __( 'Please insert sub title' ),
  ) );

$wp_customize->add_setting( 'access_section_address', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
  ) );

  $wp_customize->add_control( 'access_section_address', array(
	'type' => 'text',
	'section' => 'access_section', // Add a default or your own section
	'label' => __( 'Address' ),
	'description' => __( 'Please insert address' ),
  ) );

  $wp_customize->add_setting( 'access_section_mail', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
  ) );

  $wp_customize->add_control( 'access_section_mail', array(
	'type' => 'text',
	'section' => 'access_section', // Add a default or your own section
	'label' => __( 'Mail' ),
	'description' => __( 'Please insert mail' ),
  ) );

  $wp_customize->add_setting( 'access_section_phone', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
  ) );

  $wp_customize->add_control( 'access_section_phone', array(
	'type' => 'text',
	'section' => 'access_section', // Add a default or your own section
	'label' => __( 'Telephone' ),
	'description' => __( 'Please insert phone' ),
  ) );


  $wp_customize->add_setting( 'access_section_fax', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
  ) );

  $wp_customize->add_control( 'access_section_fax', array(
	'type' => 'text',
	'section' => 'access_section', // Add a default or your own section
	'label' => __( 'Fax' ),
	'description' => __( 'Please insert fax' ),
  ) );

  $wp_customize->add_setting( 'access_section_open', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
  ) );

  $wp_customize->add_control( 'access_section_open', array(
	'type' => 'text',
	'section' => 'access_section', // Add a default or your own section
	'label' => __( 'Open Time' ),
	'description' => __( 'Please insert open time' ),
  ) );


  $wp_customize->add_setting( 'access_section_additional', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
  ) );

  $wp_customize->add_control( 'access_section_additional', array(
	'type' => 'text',
	'section' => 'access_section', // Add a default or your own section
	'label' => __( 'Additional' ),
	'description' => __( 'Please insert additional' ),
  ) );
  $wp_customize->add_setting( 'access_section_contact', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
  ) );

  $wp_customize->add_control( 'access_section_contact', array(
	'type' => 'text',
	'section' => 'access_section', // Add a default or your own section
	'label' => __( 'Contact Phone' ),
	'description' => __( 'Please insert contact phone' ),
  ) );

  $wp_customize->add_setting( 'access_section_map_iframe', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
  ) );

  $wp_customize->add_control( 'access_section_map_iframe', array(
	'type' => 'textarea',
	'section' => 'access_section', // Add a default or your own section
	'label' => __( 'map iframe' ),
	'description' => __( 'Please insert map iframe' ),
  ) );

  $wp_customize->add_setting( 'access_section_google_map_link', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
  ) );

  $wp_customize->add_control( 'access_section_google_map_link', array(
	'type' => 'text',
	'section' => 'access_section', // Add a default or your own section
	'label' => __( 'Google Map Link' ),
	'description' => __( 'Please insert google map link' ),
  ) );

	// Instagram 
	$wp_customize->add_section('instagram_section', array(
		'title'	=> __('Instagram Section','massage-spa'),
		'description'	=> __('Put the info of instagram section','massage-spa'),
		'priority'	=> null
	));	


	$wp_customize->add_setting('show_instagram_section',array(
		'default' => false,
		'sanitize_callback' => 'massage_spa_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'show_instagram_section', array(
		   'settings' => 'show_instagram_section',
		   'section'   => 'instagram_section',
		   'label'     => __('Check To Show This Section','massage-spa'),
		   'type'      => 'checkbox'
	));//Show Fashioner Page Section

	$wp_customize->add_setting( 'instagram_section_title', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	  ) );

	  $wp_customize->add_control( 'instagram_section_title', array(
		'type' => 'text',
		'section' => 'instagram_section', // Add a default or your own section
		'label' => __( 'Title' ),
		'description' => __( 'Please insert title' ),
	  ) );

	/** add for test **/
	$rjs_categories_full_list = get_categories(array( 'orderby' => 'name', ));
 
    //Create an empty array
	$rjs_choices_list = [];
	 
	    //Loop through the array and add the correct values every time
	foreach( $rjs_categories_full_list as $rjs_single_cat ) {
	    $rjs_choices_list[$rjs_single_cat->slug] = esc_html__( $rjs_single_cat->name, 'text-domain' );
	}
	 

	/** end **/
		 
}
add_action( 'customize_register', 'massage_spa_customize_register' );

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

function massage_spa_custom_css(){
		?>
        	<style type="text/css"> 	
				a, .header-menu ul li.current-menu-item a,
				.header-menu ul li.current-menu-parent a.parent{
					color: #495057;
				}
				a:hover,.recent_articles h2 a:hover,
				#sidebar ul li a:hover,									
				.recent_articles h3 a:hover,					
				.recent-post h6:hover,					
				.page-four-column:hover h3,												
				.postmeta a:hover,				
				.header-menu ul li a:hover, 
				
				.header-menu ul li.current-menu-item ul.sub-menu li a:hover,
				.social-icons a:hover{ 
				   color:<?php echo esc_html( get_theme_mod('color_scheme','#0ABBB5')); ?>;
				   }					 
					
				.pagination ul li .current, .pagination ul li a:hover, 
				#commentform input#submit:hover,					
				.nivo-controlNav a.active,
				.learnmore,					
				.appbutton:hover,					
				#sidebar .search-form input.search-submit,				
				.wpcf7 input[type='submit'],
				#featureswrap,
				.column-four:hover .learnmore,
				nav.pagination .page-numbers.current{ 
					background-color:<?php echo esc_html( get_theme_mod('color_scheme','#0ABBB5')); ?>;
				}					
			</style> 
<?php          
}          
add_action('wp_head','massage_spa_custom_css');	 


/**
* Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
*/
function massage_spa_customize_preview_js() {
	wp_enqueue_script( 'massage_spa_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20171016', true );
}
add_action( 'customize_preview_init', 'massage_spa_customize_preview_js' );