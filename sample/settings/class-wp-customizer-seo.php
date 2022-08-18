<?php

// Site Meta Tag & Meta Description
function wpb_customize_register($wp_customize){
    // Meta Keyword
    $wp_customize->add_section('meta_keyword', array(
        'title' => __('Meta Keyword'),
        'priority' => 130
    ));
  
    // Meta Title
    $wp_customize->add_setting('meta_title', array(
        'type' => 'theme_mod'
    ));
  
    $wp_customize->add_control('meta_title', array(
        'label' => __('Meta Title'),
        'section' => 'meta_keyword',
        'input_attrs' => array( // Optional.
            'placeholder' => __( 'Enter Meta Title' ),
         ),
        'priority' => 3
    ));

    // Meta Description
    $wp_customize->add_setting('meta_description', array(
        'type' => 'theme_mod'
    ));
  
    $wp_customize->add_control('meta_description', array(
        'label' => __('Meta Description'),
        'section' => 'meta_keyword',
        'input_attrs' => array( // Optional.
            'placeholder' => __( 'Enter Meta Description' ),
        ),
        'priority' => 3
    ));
    
}
add_action('customize_register', 'wpb_customize_register');