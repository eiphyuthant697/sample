<?php

// Blog Setting
function blog_setting_register($wp_customize){

    $wp_customize->add_panel('blog_panel',array(
        'title'      => __("Blog"),
        'priority'   =>110,
    ));

    // Blog Page / Archive
    $wp_customize->add_section('blog_setting_section', array(
        'title' => __('Blog Page / Archive'),
        'priority' => 130,
        'panel' => 'blog_panel'
    ));

    // Header Image
    $wp_customize->add_setting('page_header_image', array(
        'type' => 'theme_mod'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'page_header_image', array(
        'label' => __('Page Header Image'),
        'section' => 'blog_setting_section',
        'setting' => 'page_header_image'
    )));

    //limit count
    $wp_customize->add_setting( 'page_header_img_height_limit', array(
        'capability' => 'edit_theme_options',
        'default' => 700
    ) );

    $wp_customize->add_control( 'page_header_img_height_limit', array(
        'type' => 'number',
        'section' => 'blog_setting_section',
        'label' => __( 'Image Height Limit' ),
    ) );
  
    // Title Limit
    $wp_customize->add_setting( 'title_limit', array(
        'capability' => 'edit_theme_options',
        'default' => 60
    ) );

    $wp_customize->add_control( 'title_limit', array(
        'type' => 'number',
        'section' => 'blog_setting_section',
        'label' => __( 'Title Limit' ),
    ) );

    // Content Limit
    $wp_customize->add_setting( 'content_limit', array(
        'capability' => 'edit_theme_options',
        'default' => 200
    ) );

    $wp_customize->add_control( 'content_limit', array(
        'type' => 'number',
        'section' => 'blog_setting_section',
        'label' => __( 'Content Limit' ),
    ) );

    // Blog Button Text
    $wp_customize->add_setting( 'blog_button_text', array(
        'capability' => 'edit_theme_options',
        'default' => 'つづきを読む',
        'description' => 'For Blog Post Button'
    ) );

    $wp_customize->add_control( 'blog_button_text', array(
        'type' => 'text',
        'section' => 'blog_setting_section',
        'label' => __( 'Button Text' ),
    ) );

    // Single Post
    $single_post_section = 'single_post_section';
    $wp_customize->add_section($single_post_section, array(
        'title' => __('Single Post'),
        'priority' => 130,
        'panel' => 'blog_panel'
    ));

    // Hide Author
    $hide_author = "hide_author";
    $wp_customize->add_setting($hide_author, array(
        'default'   => true, 
    ));

    $wp_customize->add_control( $hide_author, array(
       'section'   => $single_post_section,
       'label'     => __('Hide Author'),
       'settings'  => $hide_author,
       'type'      => 'checkbox'
    ));

    // Hide Public Date
    $hide_public_date = "hide_public_date";
    $wp_customize->add_setting($hide_public_date, array(
        'default'   => true, 
    ));

    $wp_customize->add_control( $hide_public_date, array(
       'section'   => $single_post_section,
       'label'     => __('Hide Public Date'),
       'settings'  => $hide_public_date,
       'type'      => 'checkbox'
    ));

    // Hide Categories
    $hide_categories = "hide_categories";
    $wp_customize->add_setting($hide_categories, array(
        'default'   => false, 
    ));

    $wp_customize->add_control( $hide_categories, array(
       'section'   => $single_post_section,
       'label'     => __('Hide Categories'),
       'settings'  => $hide_categories,
       'type'      => 'checkbox'
    ));

    // Hide Comment Box
    $hide_comment_box = "hide_comment_box";
    $wp_customize->add_setting($hide_comment_box, array(
        'default'   => true, 
    ));

    $wp_customize->add_control( $hide_comment_box, array(
       'section'   => $single_post_section,
       'label'     => __('Hide Comment'),
       'settings'  => $hide_comment_box,
       'type'      => 'checkbox'
    ));

    // Hide Related Posts
    $hide_related_posts = "hide_related_posts";
    $wp_customize->add_setting($hide_related_posts, array(
        'default'   => false, 
    ));

    $wp_customize->add_control( $hide_related_posts, array(
       'section'   => $single_post_section,
       'label'     => __('Hide Related Posts'),
       'settings'  => $hide_related_posts,
       'type'      => 'checkbox'
    ));

    // Related Posts Title
    $wp_customize->add_setting( 'related_posts_title', array(
        'capability' => 'edit_theme_options',
        'default' => 'Related Posts',
    ) );

    $wp_customize->add_control( 'related_posts_title', array(
        'type' => 'text',
        'section' => $single_post_section,
    ) );
    
}
add_action('customize_register', 'blog_setting_register');