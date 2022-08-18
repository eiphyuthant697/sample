<?php
/**
 * Theme Customizer Controls
 *
 * @package own-shop
 */


if ( ! function_exists( 'own_shop_customizer_frontpage_register' ) ) :
function own_shop_customizer_frontpage_register( $wp_customize ) {

	$wp_customize->add_panel(
        'own_shop_frontpage_settings_panel',
        array (
            'priority'      => 21,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Frontpage Settings', 'own-shop' ),
        )
    );

	if ( own_shop_is_active_woocommerce() ) :	

	// Best Seller Section ===================================================
	$wp_customize->add_section(
		'own_shop_best_seller_settings',
		array (
			'priority'      => 25,
			'capability'    => 'edit_theme_options',
			'title'         => esc_html__( 'Best Seller', 'own-shop' ),
			'panel'          => 'own_shop_frontpage_settings_panel',
		)
	); 

	$wp_customize->add_setting( 
		'own_shop_label_best_seller_show', 
		array(
			'sanitize_callback' => 'own_shop_sanitize_title',
		) 
	);



	// Product Tab Area
	$wp_customize->add_control( 
		new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_best_seller_show', 
		array(
			'label'       => esc_html__( 'Best Seller Area', 'own-shop' ),
			'section'     => 'own_shop_best_seller_settings',
			'type'        => 'own-shop-title',
			'settings'    => 'own_shop_label_best_seller_show',
		) 
	));

		$wp_customize->add_setting('hide_best_seller_area_setting',array(
			'default'   => true,
		));  

		$wp_customize->add_control( 'hide_best_seller_area_setting', array(
			'section'   => 'own_shop_best_seller_settings',
			'label'     => __('Hide This Section'),
			'settings'  => 'hide_best_seller_area_setting',
			'type'      => 'checkbox'
		));

		// title
		$wp_customize->add_setting('best_seller_title_setting', array(
			'default'     => 'Our Collections',
		));

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'best_seller_title_setting', array(
			 'label'             => __('Best Seller Title'),
			 'section'           => 'own_shop_best_seller_settings',
			 'settings'          => 'best_seller_title_setting',    
		)));

	// title
	$wp_customize->add_setting('best_seller_body_setting', array(
		'default'     => 'Our Collections',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'best_seller_body_setting', array(
		 'label'             => __('Best Seller Body'),
		 'section'           => 'own_shop_best_seller_settings',
		 'settings'          => 'best_seller_body_setting',    
	)));

	// title
	$wp_customize->add_setting('best_seller_link_setting', array(
		'default'     => 'Our Collections',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'best_seller_link_setting', array(
		 'label'             => __('Best Seller Link'),
		 'section'           => 'own_shop_best_seller_settings',
		 'settings'          => 'best_seller_link_setting',    
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
		  'section' => 'own_shop_best_seller_settings',
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

	// Section Category Menu ===================================================
	    $wp_customize->add_section(
	        'own_shop_frontpage_category_settings',
	        array (
	            'priority'      => 25,
	            'capability'    => 'edit_theme_options',
	            'title'         => esc_html__( 'Product Category', 'own-shop' ),
	            'panel'          => 'own_shop_frontpage_settings_panel',
	        )
	    ); 

	    // Title label
		$wp_customize->add_setting( 
			'own_shop_label_header_category_menu_show', 
			array(
			    'sanitize_callback' => 'own_shop_sanitize_title',
			) 
		);

		$wp_customize->add_control( 
			new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_header_category_menu_show', 
			array(
			    'label'       => esc_html__( 'Product Category Area', 'own-shop' ),
			    'section'     => 'own_shop_frontpage_category_settings',
			    'type'        => 'own-shop-title',
			    'settings'    => 'own_shop_label_header_category_menu_show',
			) 
		));

		//hide checkbox
		$wp_customize->add_setting('hide_banner_setting',array(
			'default'   => true,
		));  

		$wp_customize->add_control( 'hide_banner_setting', array(
				'section'   => 'own_shop_frontpage_category_settings',
				'label'     => __('Hide This Section'),
				'settings'  => 'hide_banner_setting',
				'type'      => 'checkbox'
		));

	// title
	$wp_customize->add_setting('category_title_setting', array(
		'default'     => 'What are You Looking for ?',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'category_title_setting', array(
		 'label'             => __('Category Title'),
		 'section'           => 'own_shop_frontpage_category_settings',
		 'settings'          => 'category_title_setting',    
	)));


	// Tabble Products ===================================================
	$wp_customize->add_section(
		'own_shop_frontpage_tab_products_settings',
		array (
			'priority'      => 25,
			'capability'    => 'edit_theme_options',
			'title'         => esc_html__( 'Tab Products', 'own-shop' ),
			'panel'          => 'own_shop_frontpage_settings_panel',
		)
	); 

	$wp_customize->add_setting( 
		'own_shop_label_tab_products_show', 
		array(
			'sanitize_callback' => 'own_shop_sanitize_title',
		) 
	);



	$wp_customize->add_control( 
		new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_tab_products_show', 
		array(
			'label'       => esc_html__( 'Product Tab', 'own-shop' ),
			'section'     => 'own_shop_frontpage_tab_products_settings',
			'type'        => 'own-shop-title',
			'settings'    => 'own_shop_label_tab_products_show',
		) 
	));

		$wp_customize->add_setting('hide_tab_products_area_setting',array(
			'default'   => true,
		));  

		$wp_customize->add_control( 'hide_tab_products_area_setting', array(
			'section'   => 'own_shop_frontpage_tab_products_settings',
			'label'     => __('Hide This Section'),
			'settings'  => 'hide_tab_products_area_setting',
			'type'      => 'checkbox'
		));

		// title
		$wp_customize->add_setting('product_tab_title_setting', array(
			'default'     => 'New Arrival',
		));

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'product_tab_title_setting', array(
			 'label'             => __('Product Tab Title'),
			 'section'           => 'own_shop_frontpage_tab_products_settings',
			 'settings'          => 'product_tab_title_setting',    
		)));


		//limit count
		$wp_customize->add_setting(
			'products_tab_limit_setting',array(
			'default' => -1
		));

		$wp_customize->add_control('products_tab_limit_setting',array(
			'type'        => 'number' ,
			'section'     => 'own_shop_frontpage_tab_products_settings' ,
			'settings'    => 'products_tab_limit_setting' ,
			'label'       => __('Number of Product'),
			'description' => __('This is the description.'),
		));


	// Collection Section ===================================================
	$wp_customize->add_section(
		'own_shop_frontpage_collection_settings',
		array (
			'priority'      => 25,
			'capability'    => 'edit_theme_options',
			'title'         => esc_html__( 'Collections', 'own-shop' ),
			'panel'          => 'own_shop_frontpage_settings_panel',
		)
	); 

	$wp_customize->add_setting( 
		'own_shop_label_collection_show', 
		array(
			'sanitize_callback' => 'own_shop_sanitize_title',
		) 
	);



	// Product Tab Area
	$wp_customize->add_control( 
		new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_collection_show', 
		array(
			'label'       => esc_html__( 'Collection Area', 'own-shop' ),
			'section'     => 'own_shop_frontpage_collection_settings',
			'type'        => 'own-shop-title',
			'settings'    => 'own_shop_label_collection_show',
		) 
	));

		$wp_customize->add_setting('hide_tab_collection_area_setting',array(
			'default'   => true,
		));  

		$wp_customize->add_control( 'hide_tab_collection_area_setting', array(
			'section'   => 'own_shop_frontpage_collection_settings',
			'label'     => __('Hide This Section'),
			'settings'  => 'hide_tab_collection_area_setting',
			'type'      => 'checkbox'
		));

		// title
		$wp_customize->add_setting('collection_title_setting', array(
			'default'     => 'Our Collections',
		));

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'collection_title_setting', array(
			 'label'             => __('Collection Title'),
			 'section'           => 'own_shop_frontpage_collection_settings',
			 'settings'          => 'collection_title_setting',    
		)));

	// Promotion Home Page ===================================================
	$wp_customize->add_section(
		'own_shop_frontpage_promotion_settings',
		array (
			'priority'      => 25,
			'capability'    => 'edit_theme_options',
			'title'         => esc_html__( 'Promotion', 'own-shop' ),
			'panel'          => 'own_shop_frontpage_settings_panel',
		)
	); 

	$wp_customize->add_setting( 
		'own_shop_label_frontpage_promotion_show', 
		array(
			'sanitize_callback' => 'own_shop_sanitize_title',
		) 
	);

	// Promotion Area
	$wp_customize->add_control( 
		new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_frontpage_promotion_show', 
		array(
			'label'       => esc_html__( 'Promotion Area', 'own-shop' ),
			'section'     => 'own_shop_frontpage_promotion_settings',
			'type'        => 'own-shop-title',
			'settings'    => 'own_shop_label_frontpage_promotion_show',
		) 
	));

		$wp_customize->add_setting('hide_promotion_area_setting',array(
			'default'   => true,
		));  

		$wp_customize->add_control( 'hide_promotion_area_setting', array(
			'section'   => 'own_shop_frontpage_promotion_settings',
			'label'     => __('Hide This Section'),
			'settings'  => 'hide_promotion_area_setting',
			'type'      => 'checkbox'
		));

	// title
	$wp_customize->add_setting('promotion_title_setting', array(
		'default'     => 'Promotion Title',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'promotion_title_setting', array(
		 'label'             => __('Collection Title'),
		 'section'           => 'own_shop_frontpage_promotion_settings',
		 'settings'          => 'promotion_title_setting',    
	)));

	// How much Promotion
	$wp_customize->add_setting('promotion_percent_setting', array(
		'default'     => 'Our Collections',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'promotion_percent_setting', array(
		 'label'             => __('Promotion Percent'),
		 'section'           => 'own_shop_frontpage_promotion_settings',
		 'settings'          => 'promotion_percent_setting',    
	)));

	// Content 1 Description
	$wp_customize->add_setting('promotion_description', array(
		'default'     => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text

',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'promotion_description', array(
		 'label'             => __('Promotion Description'),
		 'section'           => 'own_shop_frontpage_promotion_settings',
		 'settings'          => 'promotion_description', 
		 'type' => 'textarea'   
	)));

	// Content 1 Description
	$wp_customize->add_setting('promotion_button_text', array(
		'default'     => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text

',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'promotion_button_text', array(
		 'label'             => __('Promotion Button Text'),
		 'section'           => 'own_shop_frontpage_promotion_settings',
		 'settings'          => 'promotion_button_text', 
	)));

	//  Background Image
	$wp_customize->add_setting( 'promotion_bg_image',
	   array(
		  'default' => '',
		  'transport' => 'refresh',
		  'sanitize_callback' => 'esc_url_raw'
	   )
	);
     
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'promotion_bg_image',
	   array(
		  'label' => __( 'Promotion Background' ),
		  'section' => 'own_shop_frontpage_promotion_settings',
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


	// Articles ===================================================
	$wp_customize->add_section(
		'own_shop_articles_settings',
		array (
			'priority'      => 25,
			'capability'    => 'edit_theme_options',
			'title'         => esc_html__( 'Article', 'own-shop' ),
			'panel'          => 'own_shop_frontpage_settings_panel',
		)
	); 

	$wp_customize->add_setting( 
		'own_shop_label_article_show', 
		array(
			'sanitize_callback' => 'own_shop_sanitize_title',
		) 
	);



	$wp_customize->add_control( 
		new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_article_show', 
		array(
			'label'       => esc_html__( 'Article', 'own-shop' ),
			'section'     => 'own_shop_articles_settings',
			'type'        => 'own-shop-title',
			'settings'    => 'own_shop_label_article_show',
		) 
	));

		$wp_customize->add_setting('hide_article_area_setting',array(
			'default'   => true,
		));  

		$wp_customize->add_control( 'hide_article_area_setting', array(
			'section'   => 'own_shop_articles_settings',
			'label'     => __('Hide This Section'),
			'settings'  => 'hide_article_area_setting',
			'type'      => 'checkbox'
		));

		// title
		$wp_customize->add_setting('article_title_setting', array(
			'default'     => 'New Arrival',
		));

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'article_title_setting', array(
			 'label'             => __('Articl Title'),
			 'section'           => 'own_shop_articles_settings',
			 'settings'          => 'article_title_setting',    
		)));

		//Category
		$wp_customize->add_setting(
			'article_category_setting'
		);
		$wp_customize->add_control(
			new WP_Customize_Category_Control(
			$wp_customize,
			'article_category_setting',
				array(
				  'label'    => 'Category',
				  'settings' => 'article_category_setting',
				  'section'  => 'own_shop_articles_settings'
				)
			)
		);

		// Category post order area
		$wp_customize->add_setting('article_order_setting');

		$wp_customize->add_control( 'article_order_setting', array(
			'type'    => 'select',
			'section' => 'own_shop_articles_settings', // Add a default or your own section
			'label'   => __( 'Order Selection' ),
			// 'description' => __( 'This is a custom radio input.' ),
			'choices' => array(
			'DESC'    => __( 'desc' ),
			'ASC'     => __( 'asc' ),
			),
		) );

	endif;

}
endif;

add_action( 'customize_register', 'own_shop_customizer_frontpage_register' );