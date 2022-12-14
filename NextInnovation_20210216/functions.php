<?php

if ( class_exists( 'WP_Customize_Control' ) ) {
	require_once  dirname( __FILE__ ) . '/inc/class-customizer-toggle-control/class-customizer-toggle-control.php';
}

// Customize Settings
//require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/settings/class-wp-customizer-seo.php';
require_once get_template_directory() . '/settings/class-wp-customizer-footer.php';
require_once get_template_directory() . '/settings/class-wp-customizer-blog.php';
require_once get_template_directory() . '/settings/class-wp-customizer-general-setting.php';

/**
 * Register Custom Navigation Walker
 */
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


  
function custom_service_post_type() {
  
    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Services', 'Post Type General Name', 'twentytwentyone' ),
        'singular_name'       => _x( 'Service', 'Post Type Singular Name', 'twentytwentyone' ),
        'menu_name'           => __( 'Services', 'twentytwentyone' ),
        'parent_item_colon'   => __( 'Parent Service', 'twentytwentyone' ),
        'all_items'           => __( 'All Services', 'twentytwentyone' ),
        'view_item'           => __( 'View Service', 'twentytwentyone' ),
        'add_new_item'        => __( 'Add New Service', 'twentytwentyone' ),
        'add_new'             => __( 'Add New', 'twentytwentyone' ),
        'edit_item'           => __( 'Edit Service', 'twentytwentyone' ),
        'update_item'         => __( 'Update Service', 'twentytwentyone' ),
        'search_items'        => __( 'Search Service', 'twentytwentyone' ),
        'not_found'           => __( 'Not Found', 'twentytwentyone' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentytwentyone' ),
    );
		  
    // Set other options for Custom Post Type
		  
    $args = array(
        'label'               => __( 'services', 'twentytwentyone' ),
        'description'         => __( 'Service news and reviews', 'twentytwentyone' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
	  
    );
		  
    // Registering your Custom Post Type
    register_post_type( 'services', $args );


    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'News', 'Post Type General Name', 'twentytwentyone' ),
        'singular_name'       => _x( 'New', 'Post Type Singular Name', 'twentytwentyone' ),
        'menu_name'           => __( 'News', 'twentytwentyone' ),
        'parent_item_colon'   => __( 'Parent New', 'twentytwentyone' ),
        'all_items'           => __( 'All News', 'twentytwentyone' ),
        'view_item'           => __( 'View New', 'twentytwentyone' ),
        'add_new_item'        => __( 'Add New New', 'twentytwentyone' ),
        'add_new'             => __( 'Add New', 'twentytwentyone' ),
        'edit_item'           => __( 'Edit New', 'twentytwentyone' ),
        'update_item'         => __( 'Update New', 'twentytwentyone' ),
        'search_items'        => __( 'Search New', 'twentytwentyone' ),
        'not_found'           => __( 'Not Found', 'twentytwentyone' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentytwentyone' ),
    );
		  
    // Set other options for Custom Post Type
		  
    $args = array(
        'label'               => __( 'news', 'twentytwentyone' ),
        'description'         => __( 'New news and reviews', 'twentytwentyone' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
	  
    );
		  
    // Registering your Custom Post Type
    register_post_type( 'news', $args );
	    
}
	  
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
	  
add_action( 'init', 'custom_service_post_type', 0 );

// Post & Page Feature Image
function mytheme_post_thumbnails() {
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'mytheme_post_thumbnails' );

// Custom Title Length
function short_title($n) {
    $title = get_the_title($post->ID);
    $postTitle = mb_strimwidth($title, 0, $n, "???","UTF-8");
    echo $postTitle;
}

function short_content($c) {
    $content = get_the_excerpt($post->ID);
    $postContent = mb_strimwidth($content, 0, $c, "???","UTF-8");
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

            
         </style>
    <?php
}
add_action( 'wp_head', 'myGeneral_customize_css');

// 404 Page Title
function theme_slug_filter_wp_title( $title ) {
    if ( is_404() ) {
        $title = '?????????????????????????????????';
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

function about_us_shortcode($attr, $content, $tag) {
   get_template_part('content','about_us');
  
} 
add_shortcode( 'about_us_content', 'about_us_shortcode' );

function extra_footer_content() {
    ?>
    <?php
    if( have_rows('extra_footer') ):?>
        <div class="extra_footer_wrap">
        <?php while( have_rows('extra_footer') ) : the_row();?>
            <div class="extra_footer" style='background-image: url("<?php the_sub_field('extra_footer_image'); ?>");'>
            <div class="extra-footer-content">
                <?php if(get_sub_field('extra_footer_description')): ?><p class="exdesc"><?php the_sub_field('extra_footer_description');?></p><?php endif; ?>
                <div class="exft-vm">
                    <a href="<?php the_sub_field('extra_footer_link');?>" class="view-more"><?php the_sub_field('extra_footer_link_text');?> <img src="/ni/wp-content/uploads/2022/06/view-more.svg" alt="">
                    <img src="/ni/wp-content/uploads/2022/07/view-more-white.svg" alt="" class ="view-more-white"></a>
                </div>
                </div>
            </div>
        <?php endwhile; ?>
        </div>
    <?php endif; ?>
    <?php
   
 } 
// Our Team
 function our_team(){
    
    if( have_rows('team') ):?>
        <div class="team-whole">
            <?php while( have_rows('team') ) : the_row();?>
                <div class="team-title-content">
                    <div class="ht">
                        <h3 class="htitle"><?php the_sub_field('team_title'); ?></h3><span></span>
                    </div>
                    <?php if(get_sub_field('team_description')): ?><p class="tsdesc"><?php the_sub_field('team_description');?></p><?php endif; ?>
                </div>
            
                <?php if( have_rows('team_images') ):?>
                    <div class="team_list">
                        <ul class="tlxtcenter">
                            <?php while( have_rows('team_images') ) : the_row();?>
                                <li>
                                    <img src="<?php the_sub_field('team_image'); ?>">
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    <?php endif;
 }
 //add_shortcode( 'extra_footer_content', 'extra_footer_content_shortcode' );



add_action('admin_head', 'acf_table_styles');

function acf_table_styles() {
  echo '<style>
    .acf-table-header-cont,
    .acf-table-body-cont {
        white-space: pre-line;
    }
    .acf-field textarea {
        height: 100px!important;
    }
    .acf-field .wp-editor-tools, .acf-field input[value="close tags"] {
        // display: none!important;
    }
  </style>';
}

add_action( 'admin_enqueue_scripts', 'load_admin_styles' );
function load_admin_styles() {
echo '<style>
//     #menu-comments, #menu-appearance .wp-first-item, #menu-appearance li:nth-child(4), #menu-appearance li:nth-child(5), #menu-appearance li:last-child, #menu-plugins, #menu-users, #menu-tools, #menu-settings, #toplevel_page_edit-post_type-acf-field-group, #toplevel_page_cptui_main_menu, #toplevel_page_wpcf7, #accordion-panel-widgets, #accordion-panel-blog_panel, #accordion-section-custom_css, #accordion-section-meta_keyword, #accordion-panel-blog_panel, #accordion-panel-general_setting_panel, 
#accordion-panel-nav_menus {
		display: none!important;
	}
  </style>';
}