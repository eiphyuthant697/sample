<?php  
/**
 *Massage Spa functions and definitions
 *
 * @package Massage Spa 
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'massage_spa_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.  
 */
function massage_spa_setup() {		
	$GLOBALS['content_width'] = apply_filters( 'massage_spa_content_width', 680 );		
	load_theme_textdomain( 'massage-spa', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );	
	add_theme_support( 'title-tag' );
	add_theme_support('html5');
	add_theme_support( 'post-thumbnails' );	
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );	
	add_theme_support( 'wp-block-styles' );	
	add_theme_support( 'custom-logo', array(
		'height'      => 50,
		'width'       => 150,
		'flex-height' => true,
	) );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'massage-spa' ),
		'social-link'  => __( 'Add Social Icons Only', 'massage-spa' ),		
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
} 
endif; // massage_spa_setup
add_action( 'after_setup_theme', 'massage_spa_setup' );
function massage_spa_widgets_init() { 	
	
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'massage-spa' ),
		'description'   => __( 'Appears on blog page sidebar', 'massage-spa' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Header Widget', 'massage-spa' ),
		'description'   => __( 'Appears on the site header', 'massage-spa' ),
		'id'            => 'header-widget',
		'before_widget' => '<aside id="%1$s" class="headerwidget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="header-title">',
		'after_title'   => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'massage_spa_widgets_init' );


function massage_spa_font_url(){
		$font_url = '';		
		
		/* Translators: If there are any character that are not
		* supported by Roboto, trsnalate this to off, do not
		* translate into your own language.
		*/
		$roboto = _x('on','Roboto:on or off','massage-spa');			
		
		if('off' !== $roboto ){
			$font_family = array();
			
			if('off' !== $roboto){
				$font_family[] = 'Roboto:300,400,600,700,800,900';
			}
					
						
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}


function massage_spa_scripts() {
	wp_enqueue_style('massage-spa-font', massage_spa_font_url(), array());
	wp_enqueue_style( 'massage-spa-basic-style', get_stylesheet_uri() );	
	wp_enqueue_style( 'nivo-slider', get_template_directory_uri()."/css/nivo-slider.css" );	
	wp_enqueue_style( 'slick-slider', get_template_directory_uri()."/css/slick.css" );	
	wp_enqueue_style( 'slick-theme', get_template_directory_uri()."/css/slick-theme.css" );	
	wp_enqueue_style( 'massage-spa-responsive', get_template_directory_uri()."/css/responsive.css" );
	wp_enqueue_script( 'jquery-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'massage-spa-editable', get_template_directory_uri() . '/js/editable.js' );
	wp_enqueue_script( 'massage-slick', get_template_directory_uri() . '/js/slick.js' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'massage_spa_scripts' );

function massage_spa_ie_stylesheet(){
	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style('massage-spa-ie', get_template_directory_uri().'/css/ie.css', array( 'massage-spa-style' ), '20160928' );
	wp_style_add_data('massage-spa-ie','conditional','lt IE 10');
	
	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'massage-spa-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'massage-spa-style' ), '20160928' );
	wp_style_add_data( 'massage-spa-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'massage-spa-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'massage-spa-style' ), '20160928' );
	wp_style_add_data( 'massage-spa-ie7', 'conditional', 'lt IE 8' );	
	wp_enqueue_style('font-awesome', get_template_directory_uri().'/assets/font-awesome/css/font-awesome.min.css');

	}
add_action('wp_enqueue_scripts','massage_spa_ie_stylesheet');

if ( ! function_exists( 'massage_spa_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function massage_spa_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Customize Pro included.
 */
require_once get_template_directory() . '/customize-pro/class-customize.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template for about theme.
 */
if ( is_admin() ) { 
require get_template_directory() . '/inc/about-themes.php';
}

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * WooCommerce Compatibility
 */
add_action( 'after_setup_theme', 'massage_spa_setup_woocommerce_support' );
function massage_spa_setup_woocommerce_support()   
{
  	add_theme_support('woocommerce');
	add_theme_support( 'wc-product-gallery-zoom' ); 
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' ); 
}

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function massage_spa_skip_link_focus_fix() {  
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php 
}
add_action( 'wp_print_footer_scripts', 'massage_spa_skip_link_focus_fix' );

/**************************** SOCIAL MENU *********************************************/
function social_links_display() {
		if ( has_nav_menu( 'social-link' ) ) : ?>
			
	<div class="social-links clearfix">
	<?php
		wp_nav_menu( array(
			'container' 	=> '',
			'theme_location' => 'social-link',
			'depth'          => 3,
			'items_wrap'      => '<ul>%3$s</ul>',
			'link_before'    => '<span class="dot">',
			'link_after'     => '</span>',
		) );
	?>
	</div><!-- end .social-links -->
	<?php endif; ?>
<?php }
add_action ('social_links', 'social_links_display');

/****************** customize section ***************************/
function custom_featured_image($id) {
    //Execute if singular
    if ( is_singular() ) {


        // Check if the post/page has featured image
        if ( has_post_thumbnail( $id ) ) {

            // Change thumbnail size, but I guess full is what you'll need
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'full' );

            $url = $image[0];

        } else {

            //Set a default image if Featured Image isn't set
            $url = '';

        }
    }

    return $url;
}

// Service Custom Post Type
// function service_init() {
//     // set up product labels
//     $labels = array(
//         'name' => 'Services',
//         'singular_name' => 'Service',
//         'add_new' => 'Add New Service',
//         'add_new_item' => 'Add New Service',
//         'edit_item' => 'Edit Service',
//         'new_item' => 'New Service',
//         'all_items' => 'All Services',
//         'view_item' => 'View Service',
//         'search_items' => 'Search Services',
//         'not_found' =>  'No Services Found',
//         'not_found_in_trash' => 'No Services found in Trash', 
//         'parent_item_colon' => '',
//         'menu_name' => 'Services',
//     );
    
//     // register post type
//     $args = array(
//         'labels' => $labels,
//         'public' => true,
//         'has_archive' => true,
//         'show_ui' => true,
//         'capability_type' => 'post',
//         'hierarchical' => false,
//         'rewrite' => array('slug' => 'service'),
//         'query_var' => true,
//         'menu_icon' => 'dashicons-randomize',
//         'supports' => array(
//             'title',
//             'editor',
//             'excerpt',
//             'trackbacks',
//             'custom-fields',
//             'comments',
//             'revisions',
//             'thumbnail',
//             'author',
//             'page-attributes'
//         )
//     );
//     register_post_type( 'service', $args );
    
//     // register taxonomy
//     register_taxonomy('service_category', 'service', array('hierarchical' => true, 'label' => 'Category', 'query_var' => true, 'rewrite' => array( 'slug' => 'service-category' )));
// }
// add_action( 'init', 'service_init' );




