<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if gte IE 8]>
<html class="ie ie8 no-js lt-ie9" <?php language_attributes(); ?>>    
<![endif]-->    
<!--[if !(IE 7) | !(gte IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<?php global $archi_option; ?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">	
	
    <!-- Favicons
    ================================================== -->
    <?php archi_custom_favicon() ?>	
	
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<?php 
    if(isset($archi_option['header_layout']) and $archi_option['header_layout']!="htop_page" ){
        get_template_part('framework/headers/header-sidenav'); 
    }else{  
?>
<div id="wrapper">
    <!-- header begin -->
    <header class="<?php archi_header_class(); ?>"> 
        <div class="<?php if($archi_option['header-wideboxed']!=false){echo 'container-fluid';}else{echo 'container';} ?>">
            <div class="row">
                <div class="col-md-12">
                    
                    <!--<span id="menu-btn"></span>-->
                    <!-- mainmenu begin -->
                    
                    <nav>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span id="menu-btn"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <?php 
                            $menu_type_class = ''; 
                            if($archi_option['menu_type']=='dotted'){ 
                                $menu_type_class = '';
                            }elseif ($archi_option['menu_type']=='line') {
                                $menu_type_class = 'class="line-separator"';
                            }elseif ($archi_option['menu_type']=='circle') {
                                $menu_type_class = 'class="circle-separator"';
                            }elseif ($archi_option['menu_type']=='square') {
                                $menu_type_class = 'class="square-separator"';
                            }elseif ($archi_option['menu_type']=='plus') {
                                $menu_type_class = 'class="plus-separator"';
                            }elseif ($archi_option['menu_type']=='strip') {
                                $menu_type_class = 'class="strip-separator"'; 
                            }else{
                                $menu_type_class = 'class="no-separator"';
                            }    
                        ?>
                        <?php
                            $primary = array(
                                'theme_location'  => 'primary',
                                'menu'            => '',
                                'container'       => '',
                                'container_class' => '',
                                'container_id'    => '',
                                'menu_class'      => '',
                                'menu_id'         => '',
                                'echo'            => true,
                                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                                'walker'          => new wp_bootstrap_navwalker(),
                                'before'          => '',
                                'after'           => '',
                                'link_before'     => '',
                                'link_after'      => '',
                                'items_wrap'      => '<ul id="mainmenu" '.$menu_type_class.'>%3$s</ul>',
                                'depth'           => 0,
                            );
                            if ( has_nav_menu( 'primary' ) ) {
                                wp_nav_menu( $primary );
                            }
                        ?>  
                        </div>
                    </nav>
                    
                </div>
                <!-- mainmenu close -->
            </div>
        </div>
    </header>
    <!-- header close -->

<?php } ?>    