<?php

if ( class_exists( 'WP_Customize_Control' ) ) {
	require_once  dirname( __FILE__ ) . '/inc/class-customizer-toggle-control/class-customizer-toggle-control.php';
}

// Customize Settings
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/settings/class-wp-customizer-seo.php';
require_once get_template_directory() . '/settings/class-wp-customizer-footer.php';
require_once get_template_directory() . '/settings/class-wp-customizer-blog.php';
require_once get_template_directory() . '/settings/class-wp-customizer-general-setting.php';

/**
 * Register Custom Navigation Walker
 */
function custom_excerpt_length( $length ) {
	return 23;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function register_navwalker(){
	require_once get_template_directory() . '/inc/wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

// Menus
function my_cool_menu_function(){
    register_nav_menus( array(
        'primary-menu' => 'Primary Menu',
        'footer-menu' => 'Footer Menu',
    ));
  }
add_action( 'after_setup_theme', 'my_cool_menu_function' );

// Widget Sidebar Area
function my_sidebars(){

    register_sidebar(
        array(
            'name' => 'Sidebar',
            'id' => 'sidebar',
            'before_widget' => '<div class="widget">
                                    <div class="widget-categories">',
            'after_widget'  => '</div></div>',
            'before_title' => '<div class="section-heading heading-dark">
                                    <h3 class="item-heading">',
            'after_title' => '</h3></div>'
        )
    );

    for ($i = 1, $n = 2; $i <= $n; $i++) {
 
        register_sidebar(

          array(
                'name' => esc_html__( 'Footer ') . $i,
                'id' => 'footer-' . $i,
                'before_widget' => '<div class="pure-u-1 pure-u-lg-1-3">
                                        <div class="default-blog-post">
                                           <div class="widget widget-categories">
                                              <div class="widget-content">',
                'after_widget' => '</div></div></div></div>',
                'before_title' => '<h3>',
                'after_title' => '</h3>',
            )
        );
    }
}
add_action('widgets_init', 'my_sidebars');

// Post & Page Feature Image
function mytheme_post_thumbnails() {
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'mytheme_post_thumbnails' );

// Custom Title Length
function short_title($n) {
    $title = get_the_title($post->ID);
    $postTitle = mb_strimwidth($title, 0, $n, "…","UTF-8");
    echo $postTitle;
}

function short_content($c) {
    $content = get_the_excerpt($post->ID);
    $postContent = mb_strimwidth($content, 0, $c, "…","UTF-8");
    echo $postContent;
}
  
// Meta Box Custom Fields on Post & Page
add_action('admin_init', 'add_my_meta_box' );
function add_my_meta_box() {
    add_meta_box('my_meta_box_id', 'Meta Keyword', 'my_meta_box_field', array('page', 'post'), 'normal', 'high');
}
  
function my_meta_box_field(){
    global $post;
    $get_all_meta_values = get_post_custom($post->ID);
    $meta_title=$get_all_meta_values["meta_title"][0];
    $meta_desc = $get_all_meta_values["meta_desc"][0];
    echo '<label><strong>Meta Title</strong></label>
    <input type="text" name="meta_title" style="width: 100%;" value="'.$meta_title.'" />';
    echo '<br>'; echo '<br>';
    echo '<label><strong>Meta Description</strong></label>
    <input type="text" name="meta_desc" style="width: 100%;" value="'.$meta_desc.'" />';
}

add_action('save_post', 'save_my_meta_box');
function save_my_meta_box(){
    global $post;
    update_post_meta($post->ID, "meta_title", $_POST["meta_title"]);
    update_post_meta($post->ID, "meta_desc", $_POST["meta_desc"]);
}

// Categories Custom Fields
function wcr_category_fields($term) {
    // we check the name of the action because we need to have different output
    // if you have other taxonomy name, replace category with the name of your taxonomy. ex: book_add_form_fields, book_edit_form_fields
    if (current_filter() == 'category_edit_form_fields') {
        $cat_meta_description = get_term_meta($term->term_id, 'cat_meta_description', true);
        ?>
        <tr class="form-field">
            <th valign="top" scope="row"><label for="term_fields[cat_meta_description]"><?php _e('Meta Description'); ?></label></th>
            <td>
                <input type="text" size="40" value="<?php echo esc_attr($cat_meta_description); ?>" id="term_fields[cat_meta_description]" name="term_fields[cat_meta_description]"><br/>
                <span class="description"><?php _e('Please enter meta description'); ?></span>
            </td>
        </tr>   
    <?php } elseif (current_filter() == 'category_add_form_fields') {
        ?>
        <div class="form-field">
            <label for="term_fields[cat_meta_description]"><?php _e('Meta Description'); ?></label>
            <input type="text" size="40" value="" id="term_fields[cat_meta_description]" name="term_fields[cat_meta_description]">
            <p class="description"><?php _e('Please enter meta description'); ?></p>
        </div>  
    <?php
    }
}
  
// Add the fields, using our callback function  
// if you have other taxonomy name, replace category with the name of your taxonomy. ex: book_add_form_fields, book_edit_form_fields
add_action('category_add_form_fields', 'wcr_category_fields', 10, 2);
add_action('category_edit_form_fields', 'wcr_category_fields', 10, 2);

// save the fields values into options:
function wcr_save_category_fields($term_id) {
    if (!isset($_POST['term_fields'])) {
        return;
    }

    foreach ($_POST['term_fields'] as $key => $value) {
        update_term_meta($term_id, $key, sanitize_text_field($value));
    }
}

// Save the fields values, using our callback function
// if you have other taxonomy name, replace category with the name of your taxonomy. ex: edited_book, create_book
add_action('edited_category', 'wcr_save_category_fields', 10, 2);
add_action('create_category', 'wcr_save_category_fields', 10, 2);

// =================== End Category Meta Description ================================ //
  
// Tag Custom Fields
function tag_add_form_fields ( $taxonomy ){
    ?>
    
    <?php (current_filter() == 'tag_add_form_fields') ?>

    <div class="form-field">
        <label for="term_fields[tag_meta_description]"><?php _e('Meta Description'); ?></label>
        <input type="text" size="40" value="" id="term_fields[tag_meta_description]" name="tag_meta_description">
        <p class="description"><?php _e('Please enter meta description'); ?></p>
    </div> 

        <?php 
}
add_action('add_tag_form_fields','tag_add_form_fields');

function tag_edit_form_fields ( $term ) {

    $tag_meta_description = get_term_meta($term->term_id, 'tag_meta_description', true);

?>
    <tr class="form-field">
            <th valign="top" scope="row"><label for="term_fields[tag_meta_description]"><?php _e('Meta Description'); ?></label></th>
            <td>
                <input type="text" size="40" value="<?php echo esc_attr($tag_meta_description); ?>" id="tag_meta_description" 
                name="tag_meta_description"><br/>
                <span class="description"><?php _e('Please enter meta description'); ?></span>
            </td>
        </tr> 

    <?php
}
add_action('edit_tag_form_fields','tag_edit_form_fields');
  
function save_termmeta_tag( $term_id, $key, $taxonomy ) {
    // var_dump($taxonomy);

    if (isset($_POST['tag_meta_description'])) {
        update_term_meta($term_id, 'tag_meta_description', sanitize_text_field($_POST['tag_meta_description']));
        
    } 
} 
add_action( 'create_term', 'save_termmeta_tag',20,3 );
add_action( 'edited_term', 'save_termmeta_tag',20,3 );

// for category count
function wt_get_category_count($input = '') {
	global $wpdb;
	if($input == '')
	{
		$category = get_the_category();
		return $category[0]->category_count;
	}
	elseif(is_numeric($input))
	{
		$SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->term_taxonomy.term_id=$input";
		return $wpdb->get_var($SQL);
	}
	else
	{
		$SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->terms.slug='$input'";
		return $wpdb->get_var($SQL);
	}
}


function myGeneral_customize_css()
{
    ?>
         <style type="text/css">
			 /* Custom Css Start */
			.single-img img{
				height:inherit!important;
			}
			/* Custom Css End */
            body{
                background: <?php echo get_theme_mod('body_background_color', '#ffffff'); ?>;
            }

            #header-menu,.mobile-menu-nav-back,.mean-container .mean-nav > ul li a{
                background: <?php echo get_theme_mod('menu_background_color', '#000'); ?>;
            }

            .logo-area h1 a,.logo-mobile{
                color: <?php echo get_theme_mod('menu_logo_color', '#fff'); ?>;
            }

            #header-menu .menu-item a,.mean-container .mean-nav > ul li a{
                color: <?php echo get_theme_mod('menu_link_color', '#fff'); ?>;
            }

            .site-footer{
                background: <?php echo get_theme_mod('footer_bg_color', '#000'); ?>;
            }

            #aboutusbgimg{
                background-image: url('<?php echo get_theme_mod('abt_bgImage', '/sample/wp-content/themes/NextInnovation_20210216/assets/img/ni-abtbg.png'); ?>')!important;
            }
            .footer p,.site-footer .gallery-item, .site-footer ul li a, .site-footer h3,.site-footer .tagcloud a,.site-footer p,.footer-menu ul li a,.footer-menu a{
                color: <?php echo get_theme_mod('footer_text_color', '#fff'); ?>;
            }
            
         </style>
    <?php
}
add_action( 'wp_head', 'myGeneral_customize_css');

// 404 Page Title
function theme_slug_filter_wp_title( $title ) {
    if ( is_404() ) {
        $title = 'ページが見つかりません';
    }
    return $title;
}

// Hook into wp_title filter hook
add_filter( 'wp_title', 'theme_slug_filter_wp_title' );


//Breadcrumb
function get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow"><i class="fas fa-home"></i>&nbsp;&nbsp;Home</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;&#10151;&nbsp;&nbsp;";
        the_category(' &nbsp;&nbsp;&#10151;&nbsp;&nbsp; ');
            if (is_single()) {
                echo " &nbsp;&nbsp;&#10151;&nbsp;&nbsp; ";
                the_title();
            }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;&#10151;&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#10151;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}

function our_services_shortcode($attr, $content, $tag) {
   get_template_part('content','our_services');
  
} 
add_shortcode( 'our_services_content', 'our_services_shortcode' );


function our_career_shortcode($attr, $content, $tag) {
   get_template_part('content','career');
  
} 
add_shortcode( 'our_career_content', 'our_career_shortcode' );

function about_us_shortcode($attr, $content, $tag) {
   get_template_part('content','about_us');
  
} 
add_shortcode( 'about_us_content', 'about_us_shortcode' );

add_action('admin_head', 'acf_table_styles');
add_theme_support( 'custom-logo' );
function acf_table_styles() {
  echo '<style>
    .acf-table-header-cont,
    .acf-table-body-cont {
        white-space: pre-line;
    }
  </style>';
}
// add_action( 'admin_enqueue_scripts', 'load_admin_styles' );
// function load_admin_styles() {
// echo '<style>
//     #menu-comments, #menu-appearance .wp-first-item, #menu-appearance li:nth-child(4), #menu-appearance li:nth-child(5), #menu-appearance li:last-child, #menu-plugins, #menu-users, #menu-tools, #menu-settings, #toplevel_page_edit-post_type-acf-field-group, #toplevel_page_cptui_main_menu, #toplevel_page_wpcf7, #accordion-panel-widgets, #accordion-panel-blog_panel, #accordion-section-custom_css, #accordion-section-meta_keyword, #accordion-panel-blog_panel, #accordion-panel-general_setting_panel, #accordion-panel-nav_menus {
// 		display: none!important;
// 	}
//   </style>';
// }
