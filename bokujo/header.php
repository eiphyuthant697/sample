<?php
/**
 * @package foodica
 */
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php wp_head(); ?>
<link rel="shortcut icon" href="/wp-content/uploads/2021/12/favico.png">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i%7COswald:400,700" media="all">
<link rel="stylesheet" href="https://use.typekit.net/hdf1ker.css">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<link href="<?php echo get_template_directory_uri(); ?>/assets/css/reset.css">

</head>

<body <?php body_class(); ?>>

    <?php
    wp_body_open();
    ?>
    <div class="page-wrap">
        <div class="main-menu-bar" id="sticky-menu">
            <div class="inner mm-content">
                <div class="sticky-left">
                    <p>ゴミ屋敷の片付け、清掃・遺品整理・引越しゴミ・不用品回収ならお掃除特殊部隊！</p>
                    <h1 class="top-logo-box"><?php foodica_custom_logo(); ?></h1>
                </div>
                <ul class="menu-item contact-sticky">
                    
                    <li class="bar-contact menu-contact">
                        <?php if(get_theme_mod('line_contact')!="") :?>
                            <div class="contact-list tel">
                                <a href="tel:<?php echo get_theme_mod('line_contact'); ?>">
                                    <?php if(get_theme_mod('tel_limage')!="") :?>
                                        <img src="<?php echo get_theme_mod('tel_limage'); ?>">
                                    <?php else: ?>
                                        <i class="fas fa-phone-square-alt"></i>
                                    <?php endif; ?>
                                </a>
									<?php if(get_theme_mod('payment')!="") :?>
                            <span class="payment-list">
                                <img src="<?php echo get_theme_mod('payment'); ?>">
                            </span>
                        <?php endif; ?>
                            </div>
                        <?php endif; ?>
						<?php if(get_theme_mod('rpay_image')!="") :?>
                            <div class="contact-list rpay">
                                <img src="<?php echo get_theme_mod('rpay_image'); ?>">
                            </div>
                        <?php endif; ?>
                        <?php if(get_theme_mod('mail_link')!="") :?>
                            <div class="contact-list mail">
                                <a href="<?php echo get_theme_mod('mail_link'); ?>">
                                    <?php if(get_theme_mod('mail_limage')!="") :?>
                                        <img src="<?php echo get_theme_mod('mail_limage'); ?>">
                                    <?php else: ?>
                                        <i class="fas fa-envelope-square"></i>
                                    <?php endif; ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if(get_theme_mod('contact_text')!="") :?>
                            <div class="contact-list line">
                                <a href="<?php echo get_theme_mod('contact_text'); ?>">
                                    <?php if(get_theme_mod('line_limage')!="") :?>
                                        <img src="<?php echo get_theme_mod('line_limage'); ?>">
                                    <?php else: ?>
                                        <i class="fab fa-line"></i>
                                    <?php endif; ?>
                                </a>
                            </div>
                        <?php endif; ?>

                    </li>
                    
                </ul>
            </div>
        </div>
        <div class="h-sidebar" id="h_sidebar">
            <div class="contact-bar bar">
                
                <div class="contact-lists">
                    <?php if(get_theme_mod('line_contact')!="") :?>
                        <span class="contact-list lim tel-img">
                            <a href="tel:<?php echo get_theme_mod('line_contact'); ?>">
                                <img src="<?php echo get_theme_mod('tel_image'); ?>" class="pc">
                                <img src="<?php echo get_theme_mod('tel_limage'); ?>" class="ph">
                            </a>
							<span class="payment-list">
                                <img src="<?php echo get_theme_mod('payment'); ?>"  class="ph">
                            </span>
                        </span>
                        <!-- <span class="contact-list lt tel-text">
                            <a href="tel:<?php echo get_theme_mod('line_contact'); ?>">
                                <?php echo get_theme_mod('line_contact'); ?>
                            </a>
                        </span> -->
                    <?php endif; ?>
                </div>
				<div class="contact-lists">
                    <?php if(get_theme_mod('mail_link')!="") :?>
                        <span class="contact-list lim mail-img">
                            <a href="<?php echo get_theme_mod('mail_link'); ?>">
                                <img src="<?php echo get_theme_mod('mail_image'); ?>" class="pc">
                                <img src="<?php echo get_theme_mod('mail_limage'); ?>" class="ph">
                            </a>
							
                        </span>
                        <!-- <span class="contact-list lt mail-text">
                            <a href="mailto:<?php echo get_theme_mod('mail_link'); ?>">
                                <?php echo get_theme_mod('contact_title'); ?>
                            </a>
                        </span> -->
                    <?php endif; ?>
                </div>
                <div class="contact-lists">
                    <?php if(get_theme_mod('contact_text')!="") :?>
                        <span class="contact-list lim line-img">
                            <a href="<?php echo get_theme_mod('contact_text'); ?>">
                                <img src="<?php echo get_theme_mod('line_image'); ?>" class="pc">
                                <img src="<?php echo get_theme_mod('line_limage'); ?>" class="ph">
                            </a>
                        </span>
                        <!-- <span class="contact-list lt line-text">
                            <a href="<?php echo get_theme_mod('contact_text'); ?>">
                                <?php echo get_theme_mod('line_title'); ?>
                            </a>
                        </span> -->
                    <?php endif; ?>
                </div>
				<div class="contact-lists">
                    <?php if(get_theme_mod('rpay_image')!="") :?>
                        <span class="contact-list lim rpay">
                            <img src="<?php echo get_theme_mod('rpay_image'); ?>" class="ph">
                        </span>
                        
                    <?php endif; ?>
                </div>
            </div>
            <!-- <div class="payment-bar bar">
                
                    <?php if(get_theme_mod('payment_title')!="") :?>
                        <h4 class="bar-title"><?php echo get_theme_mod('payment_title'); ?></h4>
                    <?php endif; ?>
                
                <div class="payment-lists">
                    <?php if(get_theme_mod('payment')!="") :?>
                        <span class="payment-list">
                            <img src="<?php echo get_theme_mod('payment'); ?>">
                        </span>
                    <?php endif; ?>
                    
                </div>
            </div> -->
        </div>
        <div class="logo-bar" id="logo_bar">
            <div class="logo">
                <?php foodica_custom_logo(); ?>
            </div>
            <div class="menu-bar">
                <nav class="nav-wrap">
                    <?php wp_nav_menu( array(
                        'menu_class'     => 'navbar-wpz dropdown sf-menu',
                        'theme_location' => 'primary'
                    ) ); ?>
                </nav>
                <div class="spOnly Toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
                    
        </div>
        <header class="header" id="sheader">
            <div class="header-content">
                <div class="logo-bar" id="logo_bar" style="display:none;">
                    <div class="logo">
                        <?php foodica_custom_logo(); ?>
                    </div>
                    <div class="menu-bar">
                        <nav class="nav-wrap">
                            <?php wp_nav_menu( array(
                                'menu_class'     => 'navbar-wpz dropdown sf-menu',
                                'theme_location' => 'primary'
                            ) ); ?>
                        </nav>
                        <div class="spOnly Toggle">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
                <?php
                if( is_front_page() ){
                    if( have_rows('special_services') ):
                        ?>
                        <div class="special-services">
                        <?php
                        // Loop through rows.
                        while( have_rows('special_services') ) : the_row();

                            ?>
                            <div class="special-service">
                                <a href="<?php  $link = get_sub_field('service_link'); echo esc_url( $link ); ?>"><img src="<?php echo get_sub_field('service_image'); ?>" alt=""> </a>
                            </div>
                            <?php
                        endwhile;?>
                        </div>
                        <?php
                    endif;?>
            </div>
                    <?php if( have_rows('banner_slider') ): ?>
                        <?php while( have_rows('banner_slider') ): the_row(); 

                        ?>
                            <div class="banner">
                                <div class="banner-img"><div class="bimg"><img src="<?php the_sub_field('banner_image'); ?>" /></div></div>
                                <div class="content">
                                    <?php the_sub_field('banner_content'); ?>
                                </div>
                            </div>
                    
                        <?php endwhile; ?>
                    <?php endif; ?>

                <?php }
                ?>
        </header>

    

