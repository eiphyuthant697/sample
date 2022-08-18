<?php
/**
 * @package foodica
 */
?><!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
	<meta charset="<?php bloginfo('charset');?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url');?>" />

	<?php wp_head();?>
	<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=60d2f1a72b1ad10012445e18&product=inline-share-buttons" async="async"></script>
<!-- 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
<!-- 	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> -->
</head>

<body <?php body_class();?>>
 
    <?php
wp_body_open();
?>

	<div class="page-wrap <?php the_title(); ?>">

        <header class="site-header">
            <div class="header-whole">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="navbar-logo">

							<?php foodica_custom_logo() ?>
                            <p class="site-description"><?php bloginfo('description')?></p>

                        </div><!-- .navbar-brand -->
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <nav class="main-navbar" role="navigation">

                            <div class="menu-wrap">

                                <div class="navbar-header-main">
                                    <?php if (has_nav_menu('mobile')) {
                                        wp_nav_menu(array(
                                            'container_id' => 'menu-main-slide',
                                            'theme_location' => 'mobile',
                                        ));
                                    } elseif (has_nav_menu('primary')) {
                                        wp_nav_menu(array(
                                            'container_id' => 'menu-main-slide',
                                            'theme_location' => 'primary',
                                        ));
                                    }?>

                                </div>

                                <div id="navbar-main">

                                    <?php if (has_nav_menu('primary')) {
                                        wp_nav_menu(array(
                                            'menu_class' => 'navbar-wpz dropdown sf-menu',
                                            'theme_location' => 'primary',
                                        ));
                                    }?>
                                </div><!-- #navbar-main -->
                            </div><!-- ./inner-wrap -->
                        </nav><!-- .main-navbar -->
                    </div>
                </div>
            </div>
            <div class="clear"></div>
			<div class="mobile-header-whole">
				<div class="mobile-top1">
					<div class="navbar-header-main">
						 <?php if  (has_nav_menu('mobile')) {
							   wp_nav_menu(array(
							  'container_id' => 'menu-main-slide',
							  'theme_location' => 'mobile',
							));
						  }?>

					 </div>
					<div class="mobile-contact">
						<a href="/mpm_naika/contact">Contact</a>
					</div>
				</div>
				<div class="mobile-top2">
					<div class="mobile-navbar-logo">

						<?php foodica_custom_logo() ?>
                        <p class="site-description"><?php bloginfo('description')?></p>

                    </div><!-- .navbar-brand -->
				</div>
				
			</div>
        </header><!-- .site-header -->
		<?php if (!is_front_page() && is_page('Thank you') ) { ?>
			<div class="thank-header">
				<h1 class="banner-title"><?php the_title(); ?></h1>
                <p><?php the_field('sub_banner_title'); ?></p>
			</div>
		<?php } elseif (!is_front_page() && !is_page('Thank you') ) { ?>
            <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
          
            <div class="header-wrap" style="background-image: url('<?php echo $backgroundImg[0]; ?>');">
                <div class="banner-header">
                    <h1 class="banner-title"><?php the_title(); ?></h1>
                    <p><?php the_field('sub_banner_title'); ?></p>
                </div>
            </div>    
        <?php }?>
        <div class="content-wrap">
