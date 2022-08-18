<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Massage Spa
 */
?><!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
<meta charset="<?php bloginfo('charset');?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url');?>">
<link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP" rel="stylesheet">
<?php wp_head();?>
</head>
<body <?php body_class();?>>
<?php
//wp_body_open hook from WordPress 5.2
if (function_exists('wp_body_open')) {
    wp_body_open();
}
?>
<a class="skip-link screen-reader-text" href="#pagelayout_area">
<?php esc_html_e('Skip to content', 'massage-spa');?>
</a>
<?php
$show_slider = get_theme_mod('show_slider', false);
$service_title = get_theme_mod('service_title', false);
$service_description = get_theme_mod('service_description', false);
$fashioner_small_text = get_theme_mod('fashioner_small_text', false);
$fashioner_sub_header  = get_theme_mod('fashioner_sub_header', false);
$show_salon_offer_page  = get_theme_mod('show_salon_offer_page', false);
$salon_offer_title  = get_theme_mod('salon_offer_title', false);
$salon_offer_sub_title  = get_theme_mod('salon_offer_sub_title', false);
$show_fashioner_page = get_theme_mod('show_fashioner_page', false);
$show_servicesbox = get_theme_mod('show_servicesbox', false);
?>
<div id="site-holder" <?php if (get_theme_mod('sitebox_layout')) {echo 'class="boxlayout"';}?>>
<?php
if (is_front_page() && !is_home()) {
    if (!empty($show_slider)) {
        $inner_cls = '';
    } else {
        $inner_cls = 'siteinner';
    }
} else {
    $inner_cls = 'siteinner';
}
?>

    <div class="site-header <?php echo esc_attr($inner_cls); ?>">
        <div class="container">
            <div class="logo">
				<?php massage_spa_the_custom_logo();?>
                <h1><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name');?></a></h1>
                <?php $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()): ?>
                        <p><?php echo esc_html($description); ?></p>
                    <?php endif;?>
            </div><!-- logo -->
            <div class="head-rightpart">
                <div class="toggle">
                    <a class="toggleMenu" href="#"><?php esc_html_e('Menu', 'massage-spa');?></a>
                </div><!-- toggle -->
                <div class="header-menu">
                    <?php wp_nav_menu(array('theme_location' => 'primary'));?>
                    <?php do_action('social_links');?>
                </div><!--.header-menu -->
            </div><!-- .head-rightpart -->
     	    <div class="clear"></div>
            <?php
                $contact_url = get_theme_mod('contact_url', false);
                $booking_url = get_theme_mod('booking_url', false);
            ?>
            <div class="quick-contact">
                <a href="<?php echo $contact_url; ?>">
                    <div class="goto-contact">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/contact.png">
                        <br>
                        <span>問い合わせ</span>
                    </div>
                </a>
                <a href="<?php echo $booking_url; ?>">
                    <div class="goto-booking">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/Vector.png">Web<br>
                        <span>予約</span>
                    </div>
                </a>
            </div>
        </div><!-- container -->
    </div><!--.site-header -->



<?php
if (is_front_page() && !is_home()) {
    if ($show_slider != '') {
        for ($i = 1; $i <= 3; $i++) {
            if (get_theme_mod('sliderpage' . $i, false)) {
                $slider_Arr[] = absint(get_theme_mod('sliderpage' . $i, true));
            }
        }
        ?>

<?php if (!empty($slider_Arr)) {?>
    <div id="slider" class="nivoSlider">
        <?php
        $i = 1;
            $slidequery = new WP_Query(array('post_type' => 'page', 'post__in' => $slider_Arr, 'orderby' => 'post__in'));
            while ($slidequery->have_posts()): $slidequery->the_post();
                $image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));?>
	        <?php if (!empty($image)) {?>
	        <img src="<?php echo esc_url($image); ?>" title="#slidecaption<?php echo esc_attr($i); ?>" alt="<?php echo esc_attr($alt); ?>" />
	        <?php } else {?>
	        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slides/slider-default.jpg" title="#slidecaption<?php echo esc_attr($i); ?>" alt="<?php echo esc_attr($alt); ?>" />
	        <?php }?>
	        <?php $i++;endwhile;?>
    </div>

    <?php
        $j = 1;
            $slidequery->rewind_posts();
            while ($slidequery->have_posts()): $slidequery->the_post();?>
	        <div id="slidecaption<?php echo esc_attr($j); ?>" class="nivo-html-caption">
	            <div class="slide_info">
	                <!-- <h2><?php the_title();?></h2> -->
	                <p><?php echo esc_html(wp_trim_words(get_the_content(), 20, '')); ?></p>
	                <?php
                    $slider_morebtn = get_theme_mod('slider_morebtn');
                    if (!empty($slider_morebtn)) {?>
	                <a class="learnmore" href="<?php the_permalink();?>"><?php echo esc_html($slider_morebtn); ?></a>
	                <?php }?>
	            </div>
	        </div>
	        <?php $j++;
            endwhile;
            wp_reset_postdata();?>
            <div class="clear"></div>
            <?php } ?>
            <?php }} ?>

 