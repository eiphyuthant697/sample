<?php
    /**
	 * Portfolio Work Section. 
	*/
	$wp_customize->add_section(new AppZend_Toggle_Section($wp_customize,'appzend_recentwork_section', array(
		'title'		=> 	esc_html__('Portfolio Section','appzend'),
		'panel'		=> 'appzend_frontpage_settings',
		'priority'  => appzend_get_section_position('appzend_recentwork_section'),
		'hiding_control' => 'appzend_recentwork_section',
	)));

		/**
		 * Tab Section
		 */
		$wp_customize->add_setting('appzend_recentwork_nav', array(
			'sanitize_callback' => 'wp_kses_post',
		));


		$wp_customize->add_control(new AppZend_Custom_Control_Tab($wp_customize, 'appzend_recentwork_nav', array(
			'type' => 'tab',
			'priority' => 1,
			'section' => 'appzend_recentwork_section',
			'buttons' => array(
				array(
					'name' => esc_html__('Content', 'appzend'),
					'fields' => array(
						'appzend_recentwork_super_title',
						'appzend_recentwork_title',
						'appzend_recentwork_sub_title',
						'appzend_portfolio',
						'appzend_portfolio_column'
					),
					'active' => true,
				),
				array(
					'name' => esc_html__('Style', 'appzend'),
					'fields' => array(
						'appzend_recentwork_bg_color',
						'appzend_recentwork_super_title_color',
						'appzend_recentwork_title_color',
						'appzend_recentwork_subtitle_color',
						'appzend_recentwork_color_group',
						'appzend_recentwork_margin_msg',
						'appzend_recentwork_margin',
						'appzend_recentwork_padding',
						'appzend_recentwork_alignment'
					),
				)
			),
		)));  

		//  Portfolio Page.
		$wp_customize->add_setting('appzend_portfolio', array(
		    'sanitize_callback' => 'appzend_sanitize_repeater',		
		    'default' => json_encode(array(
		        array(
		            'page' => '',
		            'logo' => ''
		        )
		    ))
		));

		$wp_customize->add_control(new AppZend_Repeater_Control( $wp_customize,
			'appzend_portfolio', 

			array(
			    'label' 	   => esc_html__('Portfolio Items', 'appzend'),
			    'section' 	   => 'appzend_recentwork_section',
			    'settings' 	   => 'appzend_portfolio',
			    'box_label' => esc_html__('Item #', 'appzend'),
			    'add_label' => esc_html__('Add New', 'appzend'),
			),
		    array(
		        'page' => array(
		            'type' => 'select',
		            'label' => esc_html__('Select Page', 'appzend'),
		            'options' => $pages
		        ),

		        'logo' => array(
		            'type' => 'upload',
		            'label' => esc_html__('Upload Project Logo', 'appzend')
		        )
			)
		));

		/** 
		 * Alignment
		 */
		$wp_customize->add_setting('appzend_portfolio_column', array(
			'default' => 2,
			'sanitize_callback' => 'appzend_sanitize_select'         
		));

		$wp_customize->add_control('appzend_portfolio_column', array(
			'label'   => esc_html__('Column','appzend'),
			'section' => 'appzend_recentwork_section',
			'type'    => 'select',
			'choices' => array(
				1 => esc_html__('One Column','appzend'),
				2 => esc_html__('Two Column','appzend'),			
				3 => esc_html__('Three Column','appzend'),			
				4 => esc_html__('Four Column','appzend'),			
			)
		));


		$wp_customize->selective_refresh->add_partial( 'appzend_portfolio', array(
            'selector'        => '#app-portfolio',
        ));
		$wp_customize->selective_refresh->add_partial( 'appzend_portfolio_super_title', array(
            'selector'        => '#app-portfolio .headlines h4'
        ));
		$wp_customize->selective_refresh->add_partial( 'appzend_portfolio_title', array(
            'selector'        => '#app-portfolio .headlines h2'
        ));
		$wp_customize->selective_refresh->add_partial( 'appzend_portfolio', array(
            'selector'        => '#app-portfolio .section-box'
        ));