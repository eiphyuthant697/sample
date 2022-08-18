<?php
/**
 * Own Shop functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package own-shop
 */

/**
 *  Defining Constants
 */

// Core Constants
define('OWN_SHOP_REQUIRED_PHP_VERSION', '5.6' );
define('OWN_SHOP_DIR_PATH', get_template_directory());
define('OWN_SHOP_DIR_URI', get_template_directory_uri());
define('OWN_SHOP_THEME_AUTH','https://www.spiraclethemes.com/');
define('OWN_SHOP_THEME_URL','https://www.spiraclethemes.com/own-shop-free-wordpress-theme/');
define('OWN_SHOP_THEME_PRO_URL','https://www.spiraclethemes.com/own-shop-pro-addons/');
define('OWN_SHOP_THEME_DOC_URL','https://www.spiraclethemes.com/own-shop-documentation/');
define('OWN_SHOP_THEME_VIDEOS_URL','https://www.spiraclethemes.com/own-shop-video-tutorials/');
define('OWN_SHOP_THEME_SUPPORT_URL','https://wordpress.org/support/theme/own-shop/');
define('OWN_SHOP_THEME_RATINGS_URL','https://wordpress.org/support/theme/own-shop/reviews/#new-post');
define('OWN_SHOP_THEME_CHANGELOGS_URL','https://themes.trac.wordpress.org/log/own-shop/');
define('OWN_SHOP_THEME_CONTACT_URL','https://www.spiraclethemes.com/contact/');
define('OWN_SHOP_CONTAINER_CLASS', esc_html(get_theme_mod('own_shop_layout_content_width_ratio','os-container')));


//Register Required plugin
require_once(get_template_directory() .'/inc/class-tgm-plugin-activation.php');

/**
* Check for minimum PHP version requirement 
*
*/
function own_shop_check_theme_setup( $oldtheme_name, $oldtheme ) {
	// Compare versions.
	if ( version_compare(phpversion(), OWN_SHOP_REQUIRED_PHP_VERSION, '<') ) :
	// Theme not activated info message.
	add_action( 'admin_notices', 'own_shop_php_admin_notice' );
	function own_shop_php_admin_notice() {
		?>
			<div class="update-nag">
		  		<?php esc_html_e( 'You need to update your PHP version to a minimum of 5.6 to run Own Shop Theme.', 'own-shop' ); ?> <br />
		  		<?php esc_html_e( 'Actual version is:', 'own-shop' ) ?> <strong><?php echo phpversion(); ?></strong>, <?php esc_html_e( 'required is', 'own-shop' ) ?> <strong><?php echo OWN_SHOP_REQUIRED_PHP_VERSION; ?></strong>
			</div>
		<?php
	}
	// Switch back to previous theme.
	switch_theme( $oldtheme->stylesheet );
		return false;
	endif;
}
add_action( 'after_switch_theme', 'own_shop_check_theme_setup', 10, 2  );


if ( ! function_exists( 'own_shop_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function own_shop_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Own Shop, use a find and replace
	 * to change 'own-shop' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'own-shop', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'own-shop' ),
		'topbar' => esc_html__( 'Top Bar', 'own-shop' ),
		'categorymenu' => esc_html__( 'Category Menu', 'own-shop' ),
		'footer-social' => esc_html__( 'Footer Social Menu', 'own-shop' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(		
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );


	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Remove theme support for new widgets block editor
	if(true===get_theme_mod( 'own_shop_disable_widgets_block_editor',true)) :
		remove_theme_support( 'widgets-block-editor' );
	endif;

	/**
	* Own Shop theme info
	*/
	require get_template_directory() . '/inc/theme-info.php';

	// Load default block styles.
	add_theme_support( 'wp-block-styles' );

	// Support for align full and align wide option.
	add_theme_support( 'align-wide' );

	// Add support for responsive embeds.
    add_theme_support( 'responsive-embeds' );

    // Add support for automatic feed links.
    add_theme_support( 'automatic-feed-links' );

	/**
	 * Own Shop custom posts image size
	 */
	add_image_size( 'own-shop-posts', 765, 500, true );

	/**
	 * Own Shop custom posts thumbs size
	 */
	add_image_size( 'own-shop-posts-thumb', 150, 100, true );

	/*
	* About page instance
	*/
	$config = array();
	Own_Shop_About_Page::own_shop_init( $config );

}
endif;
add_action( 'after_setup_theme', 'own_shop_setup' );


/**
* Custom Logo 
*
*/
function own_shop_logo_setup() {
    add_theme_support( 'custom-logo', array(
	   'height'      => 65,
	   'width'       => 350,
	   'flex-height' => true,
	   'flex-width' => true,	   
	) );
}
add_action( 'after_setup_theme', 'own_shop_logo_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function own_shop_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'own_shop_content_width', 640 );
}
add_action( 'after_setup_theme', 'own_shop_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function own_shop_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'own-shop' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'own-shop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	if ( own_shop_is_active_woocommerce() ) :
		register_sidebar( array(
			'name'          => esc_html__( 'WooCommerce Sidebar', 'own-shop' ),
			'id'            => 'woosidebar',
			'description'   => esc_html__( 'Add widgets here.', 'own-shop' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	endif;

	if ( true === get_theme_mod( 'own_shop_enable_page_sidebar', false )) :
		register_sidebar( array(
			'name'          => esc_html__( 'Page Sidebar', 'own-shop' ),
			'id'            => 'page-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'own-shop' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	endif;

	//Footer widget columns
    $widget_num = absint(get_theme_mod( 'own_shop_footer_widgets', '3' ));
    for ( $i=1; $i <= $widget_num; $i++ ) :
        register_sidebar( array(
            'name'          => esc_html__( 'Footer Column', 'own-shop' ) . $i,
            'id'            => 'footer-' . $i,
            'description'   => '',
            'before_widget' => '<div id="%1$s" class="section %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ) );
    endfor;

}
add_action( 'widgets_init', 'own_shop_widgets_init' );


/**
* Admin Scripts
*/
if ( ! function_exists( 'own_shop_admin_scripts' ) ) :
function own_shop_admin_scripts($hook) {
  	wp_enqueue_style( 'own-shop-info-css', get_template_directory_uri() . '/css/own-shop-theme-info.min.css', false ); 
}
endif;
add_action( 'admin_enqueue_scripts', 'own_shop_admin_scripts' );


/**
 * Display Dynamic CSS.
 */
function own_shop_dynamic_css_wrap() {
	require_once( get_parent_theme_file_path( '/css/dynamic.css.php' ) );  
	?>
  		<style type="text/css" id="own-shop-dynamic-style">
    		<?php echo own_shop_dynamic_css_stylesheet(); ?>
  		</style>
	<?php 
}
add_action( 'wp_head', 'own_shop_dynamic_css_wrap' );


/**
 * Google Font Preconnect
 */
function own_shop_fonts_preconnect() {  
    ?> 
		<link rel="preconnect" href="http://fonts.googleapis.com">
		<link rel="preconnect" href="http://fonts.gstatic.com" crossorigin>
    <?php
} 
add_action( 'wp_head', 'own_shop_fonts_preconnect' );


/**
 * Enqueue Styles and Scripts
 */
function own_shop_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7');
	
	wp_register_style( 'own-shop-main', get_template_directory_uri() . '/css/style-main.css', array(), wp_get_theme()->get('Version'));
	wp_style_add_data( 'own-shop-main', 'rtl', 'replace' );
	wp_style_add_data( 'own-shop-main', 'suffix', '.min' );
	wp_enqueue_style( 'own-shop-main' );

	wp_register_style( 'blocks-frontend', get_template_directory_uri() . '/css/blocks-frontend.css', array(), wp_get_theme()->get('Version'));
	wp_style_add_data( 'blocks-frontend', 'rtl', 'replace' );
	wp_style_add_data( 'blocks-frontend', 'suffix', '.min');
	wp_enqueue_style( 'blocks-frontend' );

	wp_enqueue_style( 'line-awesome', get_template_directory_uri() . '/css/line-awesome.min.css', array(), '1.3.0');
	wp_enqueue_style( 'm-customscrollbar', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.min.css', array(), '3.1.5');
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.min.css', array(), '3.7.2');
	wp_enqueue_style( 'poppins-google-font', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap', array(), '1.0'); 
	wp_enqueue_style( 'Josefins-google-font', 'https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;600;700&display=swap', array(), '1.0'); 
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) :
		wp_enqueue_script( 'comment-reply' );
	endif;

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.7', true );
	wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.min.js', array('jquery'), '1.3', true );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.min.js', array(), '2.6.2', true );
	wp_enqueue_script( 'resize-sensor', get_template_directory_uri() . '/js/ResizeSensor.min.js',array(),'1.0.0', true );	
	wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/js/theia-sticky-sidebar.min.js',array(),'1.7.0', true );
	wp_enqueue_script( 'm-customscrollbar-js', get_template_directory_uri() . '/js/jquery.mCustomScrollbar.min.js',array(),'3.1.5', true );
	wp_enqueue_script( 'own-shop-script', get_template_directory_uri() . '/js/main.min.js', array('jquery'), wp_get_theme()->get('Version'), true );
	wp_localize_script( 'own-shop-script', 'own_shop_object',
        array( 
            'add_to_cart' => esc_html__( 'Add to Cart', 'own-shop' ),
            'quick_view' => esc_html__( 'Quick View', 'own-shop' ),
            'add_to_wishlist' => esc_html__( 'Add to Wishlist', 'own-shop' ),
        )
    );
	wp_enqueue_script( 'html5shiv',get_template_directory_uri().'/js/html5shiv.min.js',array(), '3.7.3');
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'respond', get_template_directory_uri().'/js/respond.min.js' );
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

}
add_action( 'wp_enqueue_scripts', 'own_shop_scripts' );


/**
* Custom search form
*/
function own_shop_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . esc_url(home_url( '/' )) . '" >
    <div class="search">
      <input type="text" value="' . get_search_query() . '" class="blog-search" name="s" id="s" placeholder="'. esc_attr__( 'Search For','own-shop' ) .'">
      <label for="searchsubmit" class="search-icon"><i class="la la-search"></i></label>
      <input type="submit" id="searchsubmit" value="'. esc_attr__( '','own-shop' ) .'" />
    </div>
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'own_shop_search_form', 100 );


/** 
* Excerpt More
*/
function own_shop_excerpt_more( $more ) {
	if ( is_admin() ) :
		return $more;
	endif;
    return '&hellip;';
}
add_filter('excerpt_more', 'own_shop_excerpt_more');


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function own_shop_pingback_header() {
 	if ( is_singular() && pings_open() ) :
    	printf( '<link rel="pingback" href="%s">' . "\n", esc_url(get_bloginfo( 'pingback_url' )) );
  	endif;
}
add_action( 'wp_head', 'own_shop_pingback_header' );


/**
 * Load our Block Editor styles to style the Editor like the front-end
 */
if ( ! function_exists( 'own_shop_block_editor_width_styles' ) ) :
function own_shop_block_editor_width_styles() {
	$own_shop_layout_width = 1200;
	$styles = '';

	wp_enqueue_style( 'own-shop-blocks-style', trailingslashit( get_template_directory_uri() ) . 'css/blocks-style.min.css', array(), '1.0.0', 'all' );

	// Increase width of Title
	$styles .= 'body.gutenberg-editor-page .edit-post-visual-editor .editor-post-title .editor-post-title__block {max-width: ' . esc_attr( $own_shop_layout_width - 10 ) . 'px;}';

	// Increase width of all Blocks & Block Appender
	$styles .= 'body.gutenberg-editor-page .edit-post-visual-editor .editor-block-list__block {max-width: ' . esc_attr( $own_shop_layout_width - 10 ) . 'px;}';
	$styles .= 'body.gutenberg-editor-page .edit-post-visual-editor .editor-default-block-appender {max-width: ' . esc_attr( $own_shop_layout_width - 10 ) . 'px;}';

	// Increase width of Wide blocks
	$styles .= 'body.gutenberg-editor-page .edit-post-visual-editor .editor-block-list__block[data-align="wide"] {max-width: ' . esc_attr( $own_shop_layout_width - 10 + 400 ) . 'px;}';

	// Remove max-width on Full blocks
	$styles .= 'body.gutenberg-editor-page .edit-post-visual-editor .editor-block-list__block[data-align="full"] {max-width: none;}';

	// Output our styles into the <head> whenever our block styles are enqueued
	wp_add_inline_style( 'own-shop-blocks-style', $styles );
}
endif;
add_action( 'enqueue_block_editor_assets', 'own_shop_block_editor_width_styles' );

/** 
*  Plugins Required
*/
function own_shop_register_required_plugins() {
    $plugins = array(      
      array(
          'name'               => 'WooCommerce',
          'slug'               => 'woocommerce',
          'source'             => '',
          'required'           => false,          
          'force_activation'   => false,
      ),
      array(
          'name'               => 'YITH WooCommerce Quick View',
          'slug'               => 'yith-woocommerce-quick-view',
          'source'             => '',
          'required'           => false,          
          'force_activation'   => false,
      ),
      array(
          'name'               => 'One Click Demo Import',
          'slug'               => 'one-click-demo-import',
          'source'             => '',
          'required'           => false,          
          'force_activation'   => false,
      ),
      array(
          'name'               => 'Spiraclethemes Site Library',
          'slug'               => 'spiraclethemes-site-library',
          'source'             => '',
          'required'           => false,          
          'force_activation'   => false,
      ),    
    );

    $config = array(
            'id'           => 'own-shop',
            'default_path' => '',
            'menu'         => 'tgmpa-install-plugins',
            'has_notices'  => true,
            'dismissable'  => true,
            'dismiss_msg'  => '',
            'is_automatic' => false,
            'message'      => '',
            'strings'      => array()
    );

    tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'own_shop_register_required_plugins' );

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Template functions
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template hooks for this theme.
 */
require get_template_directory() . '/inc/template-hooks.php';

/**
 * Extra classes for this theme.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * WooCommerce Functions.
 */
if ( own_shop_is_active_woocommerce() ) :
	require get_template_directory() . '/inc/woocommerce-functions.php';
endif;

/**
 * Load Widgets.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Upgrade Pro
 */
require_once( trailingslashit( get_template_directory() ) . 'own-shop-pro/class-customize.php' );

/*
* Creating a function to create our CPT
*/

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
  
	function custom_slider_post_type() {
  
		// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Sliders', 'Post Type General Name', 'twentytwentyone' ),
			'singular_name'       => _x( 'Slider', 'Post Type Singular Name', 'twentytwentyone' ),
			'menu_name'           => __( 'Sliders', 'twentytwentyone' ),
			'parent_item_colon'   => __( 'Parent Slider', 'twentytwentyone' ),
			'all_items'           => __( 'All Sliders', 'twentytwentyone' ),
			'view_item'           => __( 'View Slider', 'twentytwentyone' ),
			'add_new_item'        => __( 'Add New Slider', 'twentytwentyone' ),
			'add_new'             => __( 'Add New', 'twentytwentyone' ),
			'edit_item'           => __( 'Edit Slider', 'twentytwentyone' ),
			'update_item'         => __( 'Update Slider', 'twentytwentyone' ),
			'search_items'        => __( 'Search Slider', 'twentytwentyone' ),
			'not_found'           => __( 'Not Found', 'twentytwentyone' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'twentytwentyone' ),
		);
		  
		// Set other options for Custom Post Type
		  
		$args = array(
			'label'               => __( 'sliders', 'twentytwentyone' ),
			'description'         => __( 'Slider news and reviews', 'twentytwentyone' ),
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
		register_post_type( 'sliders', $args );
	  
	}
	  
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
	  
	add_action( 'init', 'custom_slider_post_type', 0 );


	function article_section($attr, $content, $tag){
		get_template_part('template-parts/post/content', 'article');
	}
	add_shortcode('article_content_shortcode','article_section');

	function sliders_section($attr, $content, $tag){
		get_template_part('template-parts/post/content', 'slider');
	}
	add_shortcode('sliders_content_shortcode','sliders_section');
  
	// Category name before Product Title
	function wpa89819_wc_single_product(){

		$product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );
	
		if ( $product_cats && ! is_wp_error ( $product_cats ) ){
	
			$single_cat = array_shift( $product_cats ); ?>
	
			<h5 itemprop="name" class="product_category_title">Category : <span><?php echo $single_cat->name; ?></span></h5>
	
	<?php }
	}
	add_action( 'woocommerce_before_shop_loop_item_title', 'wpa89819_wc_single_product', 10,0 );
	
	// Categories and Product with Tab
	function show_product_categories_tabs( $args ){
		ob_start();
		?>
		<div class="tabbable-panel">
			<div class="tabbable-line">
				<div id="tabs">
					<ul class="nav nav-tabs">
						<li role="tab" class="current" data-tab="tab_all">All</li>
						<?php
						$cat_args = [
							'parent' => 0,
							'hide_empty' => true,
						];
						$categories = get_terms( 'product_cat', $cat_args );
						$product_limit = get_theme_mod('products_tab_limit_setting');
						foreach ( $categories as $key => $cat ) { 
							if($cat->slug != 'collections' && $cat->slug != 'uncategorized' && $cat->slug != 'special-day'){
							?>
							<li data-tab="tab_<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></li>
						<?php }  } ?>
					</ul>
					<div class="tab-content">
						<div id="tab_all"  class="tab_disnone current">
						<?php 
							echo do_shortcode( '[products limit="'.$product_limit.'"]');
						?>
						</div>
						<?php foreach ( $categories as $key => $catp ) { 
							if($catp->slug != 'collections' && $catp->slug != 'uncategorized' && $catp->slug != 'special-day'){ ?>
							<div id="tab_<?php echo $catp->slug; ?>" class="tab_disnone">
								<?php
								//product_design_homepage($product_limit, $cat->slug);
								echo do_shortcode( '[products limit="'.$product_limit.'" category="'.$catp->slug.'"]');
								?>
							</div>
						<?php } } ?>
					</div>
				</div>
			</div>
		</div>
			
		<?php 
	
		$html = ob_get_clean();
		return $html;
	}
	add_shortcode( 'show_product_categories_tabs', 'show_product_categories_tabs');




function woocommerce_special_day() {

	$special_args = [
		'parent' => 0,
		'hide_empty' => false,
	];
	$special_categories = get_terms( 'product_cat', $special_args ); ?>
		<?php 
		foreach ( $special_categories as $key => $special_cat ) { 
			if($special_cat->slug == 'special-day'){ ?>
				<?php $cat_thumb_id = get_woocommerce_term_meta( $special_cat->term_id, 'thumbnail_id', true );
				$cat_thumb_url = wp_get_attachment_thumb_url( $cat_thumb_id );
				$right_thumb_url_array = explode(".", $cat_thumb_url);
							//print_r($right_thumb_url_array[0].'.'.$right_thumb_url_array[1].'.'.$right_thumb_url_array[2]);						
				$right_thumb_1 = substr($right_thumb_url_array[3],0, -8);
				//print_r();
					//echo 	$right_thumb_1; die();							
				$right_thumb = $right_thumb_url_array[0].'.'.$right_thumb_url_array[1].'.'.$right_thumb_url_array[2].'.'.$right_thumb_1.'.'.$right_thumb_url_array[4];
													//print_r($right_thumb);
				$term_link = get_term_link( $special_cat, 'product_cat' );
				?>
				<div class="special_bests_wrap">
					<div class="special_best">
						<div class="special_bests_photo">
							<img src="<?php echo $right_thumb; ?>" alt=""> 
						</div>
						<div class="special_bests_content">
							<h1 class="special_bests_title"><?php echo $special_cat->name; ?></h1>
							<p><?php echo $special_cat->description; ?></p>
							<div class="wp-block-button is-style-outline">
								<a class="wp-block-button__link" style="border-radius:0px" href="<?php echo $term_link ?>">Looking for</a>
							</div>
						</div>
					</div>
				</div>
		<?php }  }  ?>
		
	<?php 
}
add_shortcode( 'woocommerce_special_day_code', 'woocommerce_special_day' );


function woocommerce_promotion() {
?>
	<div class="promotion-secs">
		<div class="promotion-sec-wrap">
			<div class="promotion-sec">
				
				<div class="promo-content">
					<h1 class="promo-title"><?php echo get_theme_mod( 'promotion_title_setting', true); ?></h1>
					<h3 class="promo-percent"><?php echo get_theme_mod( 'promotion_percent_setting', true); ?></h3>
					<p><?php echo get_theme_mod( 'promotion_description', true); ?></p>
					<div class="wp-block-button is-style-outline">
						<a class="wp-block-button__link" style="border-radius:0px" href="/ztm/shop/?orderby=on_sale"><?php echo get_theme_mod( 'promotion_button_text', true); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
		
	<?php 
}
add_shortcode( 'woocommerce_promotion_code', 'woocommerce_promotion' );

function woocommerce_subcats_from_parentcat_by_NAME() {

$taxonomyName = "product_cat";
$prod_categories = get_terms($taxonomyName, array(
    'orderby'=> 'name',
    'hierarchical' => 1,
    'parent' => 51,
    'order' => 'ASC',
    'hide_empty' => 0
));  ?>
<div class="collection-wrap">
    
        <?php $left_cat_thumb_id = get_woocommerce_term_meta( $prod_categories[0]->term_id, 'thumbnail_id', true );
        $left_cat_thumb_url = wp_get_attachment_thumb_url( $left_cat_thumb_id );
        $left_thumb_url_array = explode(".", $left_cat_thumb_url);
        $left_thumb_1 = substr($left_thumb_url_array[3],0, -8);
        $left_thumb = $left_thumb_url_array[0].'.'.$left_thumb_url_array[1].'.'.$left_thumb_url_array[2].'.'.$left_thumb_1.'.'.$left_thumb_url_array[4];
        $left_term_link = get_term_link( $prod_categories[0], 'product_cat' );
        ?>
    <div class="collection-left">
        <div class="collection-whole-wrap">
            <div class="collection-photo">
                <img  src="<?php echo $left_thumb; ?>" alt="" /> 
            </div>
            <div class="collection-content">
                <h2><?php echo $prod_categories[0]->name; ?> </h2>
                <a href="<?php echo $left_term_link; ?>"> View Collection</a>
            </div>
        </div>
    </div> 
    <?php 
    $product_categories_count = count($prod_categories); ?>
    <div class="collection-right">
    <?php for( $i=1; $i<$product_categories_count; $i++ ) : 
        // if ( $prod_cat->parent == 0 )
        // 	continue;
         ?>
        
        <?php $cat_thumb_id = get_woocommerce_term_meta( $prod_categories[$i]->term_id, 'thumbnail_id', true );
        $cat_thumb_url = wp_get_attachment_thumb_url( $cat_thumb_id );
        $right_thumb_aurl = explode(".", $cat_thumb_url);
        $right_1thumb = substr($right_thumb_aurl[3],0, -8);
        $right_thumb=$right_thumb_aurl[0].'.'.$right_thumb_aurl[1].'.'.$right_thumb_aurl[2].'.'.$right_1thumb.'.'.$right_thumb_aurl[4];
        $term_link = get_term_link( $prod_categories[$i], 'product_cat' );
        ?>
        <div class="collection-whole-wrap">
            <div class="collection-right-ww" style="background-image: url(<?php echo $right_thumb; ?>);">
                <!-- <div class="collection-photo">
                    <img  src="<?php echo $right_thumb; ?>" alt="" /> 
                </div> -->
                <div class="collection-content">
                    <h2><?php echo $prod_categories[$i]->name; ?> </h2>
                    <a href="<?php echo $term_link; ?>"> View Collection</a>
                </div>
            </div>
        </div>
        
        <?php endfor; 
        wp_reset_query(); ?>
    </div>
</div>
<?php 
}
add_shortcode( 'woocommerce_subcats_from_Collection_code', 'woocommerce_subcats_from_parentcat_by_NAME' );

function myGeneral_customize_css()
{ ?>
	<style type="text/css">
		.promotion-sec-wrap:before{
			background-image: url('<?php echo get_theme_mod('abt_bgImage', '/ztm/wp-content/uploads/2022/05/slider-2.jpg'); ?>')!important;
	}
	</style>
	<?php
}
add_action( 'wp_head', 'myGeneral_customize_css');


// Change WooCommerce "Related products" text in Product's Single Page

add_filter('gettext', 'change_rp_text', 10, 3);
add_filter('ngettext', 'change_rp_text', 10, 3);

function change_rp_text($translated, $text, $domain)
{
	 if ($text === 'Related products' && $domain === 'woocommerce') {
		 $translated = esc_html__('You may like', $domain);
	 }
	 return $translated;
}

/** 
 * Change the "Reviews" tab link text for single products
 */
add_filter( 'woocommerce_product_reviews_tab_title', 'isa_wc_reviews_tab_link_text', 999, 2 );
 
function isa_wc_reviews_tab_link_text( $text, $tab_key ) {
 
	return esc_html( 'Reviews & Ratings' );
 
}

add_filter( 'woocommerce_default_address_fields' , 'override_default_address_fields' );
function override_default_address_fields( $address_fields ) {

	// @ for city
	//$address_fields['city']['class'] = array('form-row-first');
	$address_fields['state']['label'] = __('State / Division', 'woocommerce');

	// @ for postcode
	//$address_fields['postcode']['label'] = __('Zipcode', 'woocommerce');

	return $address_fields;
}

function translate_reply($translated) {
 
$translated = str_ireplace('Shipping', 'Delivery Fee', $translated);
 
return $translated;
 
}


add_action('woocommerce_after_shop_loop_item_title', 'description_in_shop_loop_item', 3 );
function description_in_shop_loop_item() {
	global $product;

	// HERE define the number of words
	$limit = 5;

	$description = $product->post->post_excerpt; // Product description
	// or
	// $description = $product->get_short_description(); // Product short description

	// Limit the words length
	if (str_word_count($description, 0) > $limit) {
		$words = str_word_count($description, 2);
		$pos = array_keys($words);
		$excerpt = substr($description, 0, $pos[$limit]) . '...';
	} else {
		$excerpt = $description;
	}
    if($description != ""){
		echo '<p class="product_sdesc">'.$excerpt.'</p>';
	}
	
}



/*
 * Register new wishlist endpoint
*/
function primer_add_wishlist_endpoint() {
  add_rewrite_endpoint( 'wish-list', EP_ROOT | EP_PAGES );
}
 
add_action( 'init', 'primer_add_wishlist_endpoint' );
 
 
/*
 * Register new wishlist endpoint
*/
function primer_wishlist_query_vars( $vars ) {
    $vars[] = 'wish-list';
    return $vars;
}
 
add_filter( 'query_vars', 'primer_wishlist_query_vars', 0 );


/*
 * Change the order of the endpoints that appear in My Account Page - WooCommerce 2.6
 */
function wpb_woo_my_account_order() {
	$myorder = array(
		'dashboard'          => __( 'Dashboard', 'woocommerce' ),
		'orders'             => __( 'Past Orders', 'woocommerce' ),
		'wish-list'           => __( 'Wishlist', 'woocommerce' ),
		'edit-address'       => __( 'Addresses', 'woocommerce' ),
		'edit-account'       => __( 'Account Details', 'woocommerce' ),
		'customer-logout'    => __( 'Logout', 'woocommerce' ),
	);
	return $myorder;
}

add_filter ( 'woocommerce_account_menu_items', 'wpb_woo_my_account_order' );


/*
 * Add Wishlist Shortcode - https://wordpress.org/plugins/ti-woocommerce-wishlist/
*/
function woocommerce_wishlist_content() {
  echo do_shortcode( '[yith_wcwl_wishlist]' );
}
 
add_action( 'woocommerce_account_wish-list_endpoint', 'woocommerce_wishlist_content' );

add_action( 'woocommerce_single_product_summary', 'shoptimizer_custom_carats_field', 5 );
  
function shoptimizer_custom_carats_field() { ?>
 
<?php if(get_field('carats')) { ?>
<div class="carats"><span>Weight in Carat : </span><span><?php the_field('carats'); ?></span></div>
<?php }
}

add_filter( 'woocommerce_get_catalog_ordering_args', 'enable_catalog_ordering_by_on_sale', 10, 5 );

function enable_catalog_ordering_by_on_sale( $args ) {

    if ( isset( $_GET['orderby'] ) ) {
        if ( 'on_sale' == $_GET['orderby'] ) {
            return array(
                'orderby'  => 'meta_value_num',
                'order'    => 'ASC',
                'meta_key' => '_sale_price',
            );
        }
        // Make a clone of "menu_order" (default option)
        elseif ( 'natural_order' == $_GET['orderby'] ) {
            return array( 'orderby'  => 'menu_order title', 'order' => 'ASC' );
        }
    }

    return $args;
}

add_filter( 'woocommerce_catalog_orderby', 'add_catalog_orderby_by_on_sale', 10, 5 );
function add_catalog_orderby_by_on_sale( $orderby_options ) {
    // Insert "Sort by product reference (sku)" and the clone of "menu_order"
    return array(
        'on_sale'           => __("Sort by product reference (on sale)", "woocommerce"),
        'natural_order' => __("Sort by natural shop order", "woocommerce"), // <== To be renamed at your convenience
    ) + $orderby_options ;
}



add_action( 'woocommerce_product_query', 'product_query_by_on_sale', 10, 5 );
function product_query_by_on_sale( $q ) {
    if ( ! isset( $_GET['orderby'] ) && ! is_admin() ) {
        $q->set( 'order', 'ASC' );
        $q->set( 'meta_key', '');
    }
}









	
