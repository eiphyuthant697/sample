<?php
/**
 * @package foodica
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <?php
    wp_body_open();
    ?>

	<div class="page-wrap">

        <header class="site-header">

            <nav class="main-navbar" role="navigation">

                <div class="menu-wrap">

                    <div class="navbar-header-main">
                        <?php if ( has_nav_menu( 'mobile' ) ) {
                                wp_nav_menu( array(
                                   'container_id'   => 'menu-main-slide',
                                   'theme_location' => 'mobile'
                                ) );
                        } elseif ( has_nav_menu( 'primary' ) ) {
                           wp_nav_menu( array(
                              'container_id'   => 'menu-main-slide',
                              'theme_location' => 'primary'
                          ) );
                       } ?>

                    </div>

                    <div id="navbar-main">

                        <?php if ( has_nav_menu( 'primary' ) ) {
                            wp_nav_menu( array(
                                'container_id'   => 'menu-main-slide',
                                'menu_class'     => 'navbar-wpz dropdown sf-menu',
                                'theme_location' => 'primary'
                            ) );
                        } ?>

                    </div><!-- #navbar-main -->

                </div><!-- ./inner-wrap -->

            </nav><!-- .main-navbar -->

            <div class="logo-wrap">

                <div class="navbar-brand-wpz">

                   <?php foodica_custom_logo() ?>

                    <p class="site-description"><?php bloginfo('description')  ?></p>

                </div><!-- .navbar-brand -->

            </div>

            <div class="clear"></div>

        </header><!-- .site-header -->

        <div class="content-wrap">