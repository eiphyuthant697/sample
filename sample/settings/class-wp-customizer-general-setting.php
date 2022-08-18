<?php 

function wp_general_setting_register($wp_customize){

    $wp_customize->add_panel('general_setting_panel',array(
        'title'      => __("General Settings"),
        'priority'   =>1,
    ));

    $general_setting_section = 'general_setting_section';
    $wp_customize->add_section($general_setting_section, array(
        'title' => __('Base Color'),
        'priority' => 1,
        'panel' => 'general_setting_panel'
    ));

    // Body Background Color
    $wp_customize->add_setting( 'body_background_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'body_background_color',
        array(
            'label' => __( 'Body Background Color' ),
            'section' => $general_setting_section,
            'type' => 'color',
        ))
    );


    // Menu Section
    $menu_section = 'menu_section';
    $wp_customize->add_section($menu_section, array(
        'title' => __('Menu'),
        'priority' => 1,
        'panel' => 'general_setting_panel'
    ));

    // Menu Background Color
    $wp_customize->add_setting( 'menu_background_color',
        array(
            'default' => '#000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'menu_background_color',
        array(
            'label' => __( 'Menu Background Color' ),
            'section' => $menu_section,
            'type' => 'color',
        ))
    );

    // Logo Color
    $wp_customize->add_setting( 'menu_logo_color',
        array(
            'default' => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'menu_logo_color',
        array(
            'label' => __( 'Menu Logo Color' ),
            'section' => $menu_section,
            'type' => 'color',
        ))
    );

    // Link Color
    $wp_customize->add_setting( 'menu_link_color',
        array(
            'default' => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'menu_link_color',
        array(
            'label' => __( 'Menu Link Color' ),
            'section' => $menu_section,
            'type' => 'color',
        ))
    );

    // Link Active Color
    // $wp_customize->add_setting( 'menu_active_color',
    //     array(
    //         'default' => '#007bff',
    //         'sanitize_callback' => 'sanitize_hex_color',
    //     )
    // );

    // $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'menu_active_color',
    //     array(
    //         'label' => __( 'Link Active Color' ),
    //         'section' => $menu_section,
    //         'type' => 'color',
    //     ))
    // );

    // Widget Section
    $widget_section = 'widget_section';
    $wp_customize->add_section($widget_section, array(
        'title' => __('Widget'),
        'priority' => 1,
        'panel' => 'general_setting_panel'
    ));

    // Hide Widget
    $hide_widget = "hide_widget";
    $wp_customize->add_setting($hide_widget, array(
        'default'   => true, 
    ));

    $wp_customize->add_control( $hide_widget, array(
       'section'   => $widget_section,
       'label'     => __('Hide Footer Widget'),
       'settings'  => $hide_widget,
       'type'      => 'checkbox'
    ));
}
add_action('customize_register', 'wp_general_setting_register');