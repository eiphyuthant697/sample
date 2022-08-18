<?php
global $archi_option;
/**
 * Redux Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package archi
 */

if ( ! class_exists( 'ReduxFramewrk' ) ) {
    require_once( get_template_directory() . '/framework/sample-config.php' );
    function removeDemoModeLink() { // Be sure to rename this function to something more unique
        if ( class_exists('ReduxFrameworkPlugin') ) {
            remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
        }
        if ( class_exists('ReduxFrameworkPlugin') ) {
            remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
        }
    }
    add_action('init', 'removeDemoModeLink');
}
function archi_fonts_url(){}

//Theme Set up:
function archi_theme_setup() {

    /** Set Content width **/
    if ( ! isset( $content_width ) ) {
        $content_width = 900;
    }

   /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on archi, use a find and replace
     * to change 'archi' to the name of your theme in all the template files
     */
	load_theme_textdomain( 'archi', get_template_directory() . '/languages' );

    // Add Image Size Function customize image    
    add_image_size( 'thumb-blog', 540, 300, true ); // 220 pixels wide by 180 pixels tall, soft proportional crop mode
    add_image_size( 'thumb-portfolio', 700, 466, true ); // 220 pixels wide by 180 pixels tall, hard crop mode
    add_image_size( 'thumb-service', 700, 358, true ); // Hard crop left top
    
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

    /*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );
	
    // This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'   => esc_html__('Primary Menu', 'archi'),
        'onepage'   => esc_html__('One Page Menu', 'archi'),
        'landing'   => esc_html__('Landing Page Menu', 'archi'),
		'service-menu'   => esc_html__('Service Page Menu', 'archi'),
	) );

    // Load default block styles.
    add_theme_support( 'wp-block-styles' );

    // Add support for responsive embeds.
    add_theme_support( 'responsive-embeds' );

    // Load regular editor styles into the new block-based editor.
    add_theme_support( 'editor-styles' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'css/editor-style.css', archi_fonts_url() ) );
}
add_action( 'after_setup_theme', 'archi_theme_setup' );

function archi_load_custom_wp_admin_style() {
        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/framework/admin/css/admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'archi_load_custom_wp_admin_style',1000 );

/**
 * Enqueue scripts and styles.
 */
function archi_theme_scripts_styles() {
	global $archi_option;
	$protocol = is_ssl() ? 'https' : 'http';
    $gmap_api = $archi_option['gmap_api'];
    
    // Add custom fonts, used in the main stylesheet.
    wp_enqueue_style( 'archi-fonts', archi_fonts_url(), array(), null );
	
    /** All frontend css files **/ 
    wp_enqueue_style( 'archi-bootstrap', get_template_directory_uri().'/css/bootstrap.css');

    if($archi_option['preload-switch']!=false){
        if(isset($archi_option['preloader_mode']) and $archi_option['preloader_mode']=="preloader_progress" ){
    	    wp_enqueue_style( 'archi-jpreloader', get_template_directory_uri().'/css/jpreloader.css');
        }else{
            wp_enqueue_style( 'archi-jpreloader', get_template_directory_uri().'/css/royal-preloader.css');
        }
    }

    if($archi_option['animate-switch']!=false){
    	wp_enqueue_style( 'archi-animate', get_template_directory_uri().'/css/animate.css');
    }
	wp_enqueue_style( 'archi-plugin', get_template_directory_uri().'/css/plugin.css');    

    /** load fonts **/
    wp_enqueue_style( 'archi-awesome-font', get_template_directory_uri().'/fonts/font-awesome/css/font-awesome.css');    
    wp_enqueue_style( 'archi-et-line-font', get_template_directory_uri().'/fonts/et-line-font/style.css');	
    wp_enqueue_style( 'archi-elegant-font', get_template_directory_uri().'/fonts/elegant-font/style.css'); 
    wp_enqueue_style( 'archi-YTPlayer', get_template_directory_uri().'/css/jquery.mb.YTPlayer.min.css');

    /** Theme stylesheet. **/
    wp_enqueue_style( 'archi-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
	
	/** Theme block stylesheet. **/
	wp_enqueue_style( 'archi-block-style', get_template_directory_uri().'/css/blocks.css');
    
    if(isset($archi_option['header_layout']) and $archi_option['header_layout']=="hleft_side" ){
        wp_enqueue_style( 'archi-header-sidenav', get_template_directory_uri().'/css/header-sidenav.css');
    }elseif (isset($archi_option['header_layout']) and $archi_option['header_layout']=="hleft_side_light") {
        wp_enqueue_style( 'archi-header-sidenav-light', get_template_directory_uri().'/css/header-sidenav-light.css');
    }else{}
    

    if (class_exists('woocommerce')) {
        wp_enqueue_style( 'archi-woocommerce', get_template_directory_uri().'/css/woocommerce.css');  
    }
    
    if($archi_option['version_type']=='light'){
        wp_enqueue_style( 'archi-style-light', get_template_directory_uri().'/css/light.css');        
    }        

    wp_enqueue_style( 'archi-twentytwenty', get_template_directory_uri().'/css/twentytwenty.css'); 

    /**
     * Load our IE specific stylesheet for a range of newer versions:
     * <!--[if gt IE 8]> ... <![endif]-->
     * <!--[if gte IE 9]> ... <![endif]-->
     * NOTE: You can use the 'greater than' or the 'greater than or equal to' syntax here interchangeably.
     */
    wp_enqueue_style( 'archi-theme-new-ie', get_stylesheet_directory_uri() . "/css/new-ie.css", array( 'archi-style' ) );
    wp_style_add_data( 'archi-theme-new-ie', 'conditional', 'gte IE 8' );

    /** Js for comment on single post **/    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    /** All frontend js files **/    
    if($archi_option['preload-switch']==true){
        if(isset($archi_option['preloader_mode']) and $archi_option['preloader_mode']=="preloader_progress" ){
            wp_enqueue_script("archi-jpreLoader", get_template_directory_uri()."/js/jpreLoader.js",array(),false,true);
        }else{
            wp_enqueue_script("archi-jpreLoader", get_template_directory_uri()."/js/royal_preloader.min.js",array(),false,false);
        }
    }
    
    if($gmap_api != ''){
        wp_enqueue_script( "archi-maps-js", "$protocol://maps.googleapis.com/maps/api/js?key=$gmap_api",array('jquery'),false,false);
        wp_enqueue_script("archi-maplace", get_template_directory_uri()."/js/maplace.js",array(),false,false); 
    } 

    wp_enqueue_script("archi-PageScroll2id", get_template_directory_uri()."/js/jquery.malihu.PageScroll2id.js",array(),false,false);
    wp_enqueue_script("isotope", get_template_directory_uri()."/js/jquery.isotope.min.js",array(),false,true);

    wp_enqueue_script( 'jquery-masonry', false );

    wp_enqueue_script("archi-total", get_template_directory_uri()."/js/total1.js",array(),false,true);    
    
	if(!is_page_template('page-templates/template-coming-soon-page.php') || !is_page_template('page-templates/template-coming-soon-video.php')){ 
        wp_enqueue_script("archi-classie", get_template_directory_uri()."/js/classie.js",array(),false,true);
	}

    if($archi_option['animate-switch']==true){
        wp_enqueue_script("archi-wow-js", get_template_directory_uri()."/js/wow.min.js",array(),false,true);
    }

    wp_enqueue_script("archi-custom", get_template_directory_uri()."/js/designesia.js",array('jQuery'),false,true);
   
    wp_enqueue_script("pyae-js", get_template_directory_uri()."/js/custom.js",array('jquery'),false,true);
    
    wp_enqueue_style( 'pyae-css', get_template_directory_uri().'/custom.css',true,'1.0'); 


}
add_action( 'wp_enqueue_scripts', 'archi_theme_scripts_styles');

/**
 * Enqueue editor styles for Gutenberg
 *
 * @since Archi 3.9.6
 */
function archi_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'archi-block-editor-style', get_template_directory_uri( '/css/editor-blocks.css' ) );
	// Add custom fonts.
	wp_enqueue_style( 'archi-fonts', archi_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'archi_block_editor_styles' );

if(!function_exists('archi_custom_frontend_scripts')){
    function archi_custom_frontend_scripts(){
        global $archi_option; 
    ?>
        <script type="text/javascript">
            window.jQuery = window.$ = jQuery;  
            (function($) { "use strict";
                <?php if(isset($archi_option['header_layout']) and $archi_option['header_layout']!="htop_page" ){ ?>
                    /* Page Scroll to id fn call */ 
                    jQuery(".mainmenu li a, a.scroll-to").mPageScroll2id({
                        highlightSelector:".mainmenu li a",
                        offset: 0,
                        scrollSpeed:750,
                        scrollEasing: "easeInOutCubic"
                    });
                <?php }else{ ?>
                    /* Page Scroll to id fn call */ 
                    jQuery("#mainmenu li a, a.scroll-to").mPageScroll2id({
                        highlightSelector:"#mainmenu li a",
                        offset: 68,
                        scrollSpeed:750,
                        scrollEasing: "easeInOutCubic"
                    }); 
                <?php } ?> 

                /* Enable/Disable Animate Scroll on Desktop and Mobile */
                <?php if($archi_option['animate-switch']!=false){ ?>
                    <?php                     
                        if($archi_option['animate-mobile-switch']==false){ 
                        $mobile_size = (!empty($archi_option['animation_mobile_screen_size'])) ? esc_attr($archi_option['animation_mobile_screen_size']) : 768;
                    ?>
                        jQuery(document).ready(function() {'use strict'; 
                            var width = $(window).width(); 
                            if(width >= <?php echo $mobile_size; ?>){                                 
                                new WOW().init(); 
                            } 
                        });
                    <?php }else{ ?>
                        jQuery(document).ready(function() {'use strict';                                                     
                            new WOW().init();                         
                        });
                    <?php } ?>
                <?php } ?>

                <?php if(isset($archi_option['preloader_mode']) and $archi_option['preloader_mode']=="preloader_logo" and $archi_option['preload-switch']==true ){ ?>
                    //Preloader Logo
                    Royal_Preloader.config({
                        mode           : 'logo',
                        logo           : '<?php echo esc_js($archi_option['logo_preload']['url']); ?>',
                        logo_size      : [<?php echo esc_js($archi_option['prelogo_width']); ?>, <?php echo esc_js($archi_option['prelogo_height']); ?>],
                        showProgress   : true,
                        showPercentage : true,
                        text_colour: '<?php echo esc_js($archi_option['preload-text-color']); ?>',
                        background:  '<?php echo esc_js($archi_option['preload-background-color']); ?>'
                    });
                <?php } ?>

            })(jQuery);
        </script>
    <?php        
    }
}
add_action('wp_footer', 'archi_custom_frontend_scripts');

// Widget Sidebar
function archi_widgets_init() {
	register_sidebar( array(
        'name'          => esc_html__( 'Primary Sidebar', 'archi' ),
        'id'            => 'sidebar-1',        
		'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'archi' ),        
		'before_widget' => '<div id="%1$s" class="widget %2$s">',        
		'after_widget'  => '</div>',        
		'before_title'  => '<h4>',        
		'after_title'   => '</h4><div class="small-border"></div>'
    ) );
	register_sidebar( array(
        'name'          => esc_html__( 'Shop Sidebar', 'archi' ),
        'id'            => 'shop-sidebar',        
        'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'archi' ),        
        'before_widget' => '<div id="%1$s" class="widget %2$s">',        
        'after_widget'  => '</div>',        
        'before_title'  => '<h4>',        
        'after_title'   => '</h4><div class="small-border"></div>'
    ) );
    register_sidebar( array(
		'name'          => esc_html__( 'Footer One Widget Area', 'archi' ),
		'id'            => 'footer-area-1',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'archi' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two Widget Area', 'archi' ),
		'id'            => 'footer-area-2',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'archi' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three Widget Area', 'archi' ),
		'id'            => 'footer-area-3',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'archi' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Fourth Widget Area', 'archi' ),
		'id'            => 'footer-area-4',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'archi' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );    
}
add_action( 'widgets_init', 'archi_widgets_init' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/framework/template-tags.php';

/**
 * Additional features to allow styling of the templates.
 */
require get_template_directory() . '/framework/template-functions.php';

/** Woocommerce Customize **/
require get_template_directory() . '/framework/woocommerce-customize.php';

/** Custom Visual Composer template vc_templates **/
require get_template_directory() . '/framework/theme-custom-visual-template.php';

/** customize theme option for color **/
require get_template_directory() . '/framework/color.php';

/** Install Plugins Required **/
require get_template_directory() . '/framework/plugin-requires.php';

/*Code Visual Composer.*/
require get_template_directory() . '/vc_shortcode.php';

/**
 * Customizer shortcode.
 */
require get_template_directory() . '/shortcodes.php';

/**
 * Implement the Custom Meta Boxs.
 */
require get_template_directory() . '/framework/meta-boxes.php';

/**
 * Customizer menu item.
 */
require get_template_directory() . '/framework/wp_bootstrap_navwalker.php';


function our_member_shortcode($attr, $content, $tag) {
   get_template_part('content','our_member_home');
  
} 
add_shortcode( 'our_home_member', 'our_member_shortcode' );
 
function our_portfolio_shortcode($attr, $content, $tag){
    get_template_part('content', 'our_portfolio_home');
}
add_shortcode('our_home_portfolio','our_portfolio_shortcode');

function our_news_shortcode($attr, $content, $tag){
    get_template_part('content', 'our_news_home');
}
add_shortcode('our_home_news_content', 'our_news_shortcode');

function our_services_shortcode($attr, $content, $tag){
    get_template_part('content', 'our_service_home');
}
add_shortcode('our_service_content', 'our_services_shortcode');

function our_information_shortcode($attr, $content, $tag){
    get_template_part('content', 'our_information');
}
add_shortcode('our_information_content', 'our_information_shortcode');

function our_news_categories_shortcode($attr, $content, $tag){
    get_template_part('content', 'news_categories');
}
add_shortcode('our_news_categories', 'our_news_categories_shortcode');

function our_video_guidance_shortcode($attr, $content, $tag){
    get_template_part('conten','video_guidance');
}
add_shortcode('our_video_guidance_information', 'our_video_guidance_shortcode');

wp_enqueue_script( 'functionNs_js', get_template_directory_uri().'/js/functionNs.js');
wp_localize_script( 'functionNs_js', 'ajaxN_posts', array(
    'ajaxurl' => admin_url( 'admin-ajax.php' ),
));
function more_post_vg_ajax(){

    $vgp = (isset($_POST["vgp"])) ? $_POST["vgp"] : 2;
    $vgPageNumber = (isset($_POST['vgPageNumber'])) ? $_POST['vgPageNumber'] : 0;

    header("Content-Type: text/html");

    $vgArgs = array(
        'suppress_filters' => true,
        'post_type' => 'video_guidance',
        'posts_per_page' => $vgp,
        'paged'    => $vgPageNumber,
    );

    $vgLoop = new WP_Query($vgArgs);

    $vgOutput = '';

    if ($vgLoop -> have_posts()) :  while ($vgLoop -> have_posts()) : $vgLoop -> the_post();
        $vgOutput .= '<div class="vg-inner">
					<div class="row">
						<div class="vg-tp col-md-4 col-sm-4">'.
							get_the_post_thumbnail()
								.'
						</div>
						<div class="vg-content col-md-8 col-sm-8">
							<span class="entry-date">'.get_the_date("d M Y").'</span>
					        <h3>'.get_the_title().'</h3>
					        <div class="news-entry">'.
					            get_the_content().'
					        </div>
						</div>
					</div>
				</div>';

    endwhile;
    endif;
    wp_reset_postdata();
    die($vgOutput);
}

add_action('wp_ajax_more_post_vg_ajax', 'more_post_vg_ajax');
add_action( 'wp_ajax_nopriv_more_post_vg_ajax', 'more_post_vg_ajax');

wp_enqueue_script( 'functions_js', get_template_directory_uri().'/js/functions.js');
wp_localize_script( 'functions_js', 'ajax_posts', array(
    'ajaxurl' => admin_url( 'admin-ajax.php' ),
));

function more_post_ajax(){

    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 4;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;

    header("Content-Type: text/html");

    $args = array(
        'suppress_filters' => true,
        'post_type' => 'our_news',
        'posts_per_page' => $ppp,
        'paged'    => $page,
    );

    $loop = new WP_Query($args);

    $out = '';

    if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();
        $out .= '<div class="news-inner">
          
          <div class="news-content">
            <span class="entry-date">'.get_the_date( "j M Y" ).'</span>
            <h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>
            <div class="news-entry"><p>'.get_the_content().'</p></div>
          </div>
        </div>';

    endwhile;
    endif;
    wp_reset_postdata();
    die($out);
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');

// body class filter
function my_body_class( $classes )
{   
    $include = array
    (
        // browsers/devices (https://codex.wordpress.org/Global_Variables)
        'is-iphone'            => $GLOBALS['is_iphone'],
        'is-chrome'            => $GLOBALS['is_chrome'],
        'is-safari'            => $GLOBALS['is_safari'],
        'is-ns4'               => $GLOBALS['is_NS4'],
        'is-opera'             => $GLOBALS['is_opera'],
        'is-mac-ie'            => $GLOBALS['is_macIE'],
        'is-win-ie'            => $GLOBALS['is_winIE'],
        'is-gecko'             => $GLOBALS['is_gecko'],
        'is-lynx'              => $GLOBALS['is_lynx'],
        'is-ie'                => $GLOBALS['is_IE'],
        'is-edge'              => $GLOBALS['is_edge'],
        // WP Query (already included by default, but nice to have same format)
        'is-archive'           => is_archive()
  
    );
    if ( is_page() ){
        $slug = get_queried_object()->post_name;
        $include["page-$slug"] = 'slug';
    }
    // Sidebars
    foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) 
    {
        $include[ "is-sidebar-{$sidebar['id']}" ] = is_active_sidebar( $sidebar['id'] );
    }
 
    // Add classes
 
    foreach ( $include as $class => $do_include ) 
    {
        if ( $do_include ) $classes[ $class ] = $class;
    }
 
    // Return
 
    return $classes;
}
 
