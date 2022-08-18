<?php  get_header();

    $fashioner_small_text = get_theme_mod('fashioner_small_text', false);
    $fashioner_sub_header  = get_theme_mod('fashioner_sub_header', false);
    $show_salon_offer_page  = get_theme_mod('show_salon_offer_page', false);
    $salon_offer_title  = get_theme_mod('salon_offer_title', false);
    $salon_offer_sub_title  = get_theme_mod('salon_offer_sub_title', false);
    $show_fashioner_page = get_theme_mod('show_fashioner_page', false);
    $show_servicesbox = get_theme_mod('show_servicesbox', false); 
    $show_menu_slider_page = get_theme_mod('show_menu_slider_page', false); 
    $show_our_team_page = get_theme_mod('show_our_team_page', false); 
    $show_our_product_page = get_theme_mod('show_our_product_page', false); 
    $show_our_blog_page = get_theme_mod('show_our_blog_page', false); 
    $show_extra_section = get_theme_mod('show_extra_section', false); 
    $show_access_section = get_theme_mod('show_access_section', false); 
    $show_instagram_section = get_theme_mod('show_instagram_section', false); 
    if ($show_servicesbox != '') {?>
        <?php get_template_part( '/template-parts/front-page/content', 'service' ); ?>
    <?php }?>

<?php if ($show_fashioner_page != '') {?>
    <section id="welcome-section">
                <div class="welcome-content">
                    <div class="wearesuprime">
                        <?php if (get_theme_mod('fashioner_page', false)) {?>
                            <?php $queryvar = new WP_Query('page_id=' . absint(get_theme_mod('fashioner_page', true)));?>
                                    <?php while ($queryvar->have_posts()): $queryvar->the_post();?>

                                         <div class="abouttitledes with-green-plant">
                                            <div class="abouttitle">
                                                <h4><?php the_title();?><small><?php echo $fashioner_small_text; ?></small></h4>
                                                <h3><?php echo $fashioner_sub_header; ?></h3>
                                            </div>
                                           <div class="aboutdesc"><p><?php echo esc_html(wp_trim_words(get_the_content(), 125, '...')); ?></p></div>
                                           <div class="about-read-more post-read" bis_skin_checked="1"><a class="read-more" href="<?php the_permalink();?>">もっと読む</a></div>
                                           
                                        </div>
                                            <?php if (has_post_thumbnail()) {?>
                                                <?php $aboutBg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                                                <div class="about-humb"><a href="<?php the_permalink();?>"><div class="about-bg" style="background-image: url('<?php echo $aboutBg[0]; ?>');"></a></div>
                                              <?php }?>
                                        <?php endwhile;
                                        wp_reset_postdata();?>
                                    <?php }?>
                    <div class="clear"></div>
                </div><!-- wearesuprime-->
            </div><!-- container -->
       </section><!-- #welcome-section -->
<?php }?>

<?php if ($show_salon_offer_page != '') { ?>
<section id="salon-offer-section">
    <div class="container">
            <div class="with-lr-stick salon-offer-header">
                <h2><?php echo $salon_offer_title; ?></h2>
                <p><?php echo $salon_offer_sub_title; ?></p>
            </div>
        <?php get_template_part( '/template-parts/front-page/content', 'offer'); ?>
    </div><!-- container -->
</section><!-- #salon offer section -->
 <?php }?>

<?php if ($show_menu_slider_page != '') { ?>
    <?php get_template_part( '/template-parts/front-page/content', 'menu_slider'); ?>
 <?php  } ?>

 <?php if ($show_our_team_page != '') { ?>
    <?php get_template_part( '/template-parts/front-page/content', 'our_team'); ?>
 <?php  } ?>

 <?php if ($show_our_product_page != '') { ?>
    <?php get_template_part( '/template-parts/front-page/content', 'products'); ?>
 <?php  } ?>

 <?php if ($show_our_blog_page != '') { ?>
    <?php get_template_part( '/template-parts/front-page/content', 'blog'); ?>
 <?php  } ?>

 <?php if ($show_extra_section != '') { ?>
    <?php get_template_part( '/template-parts/front-page/content', 'extra'); ?>
 <?php  } ?>

 <?php if ($show_access_section != '') { ?>
    <?php get_template_part( '/template-parts/front-page/content', 'access'); ?>
 <?php  } ?>

 <?php if ($show_instagram_section != '') { ?>
    <div class="instagram-section">
        <div class="container">
            <div class="instagram-header">
                <h2>
                    <?php if(get_theme_mod('instagram_section_title')):echo get_theme_mod('instagram_section_title'); endif; ?>
                </h2>
            </div>
            <div class="instagram-content">
                <?php echo do_shortcode('[instagram feed="217"]'); ?>
            </div>
        </div>
        
    </div>
 <?php  } ?>




<?php get_footer(); ?>
