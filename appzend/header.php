<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package appzend
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'appzend' ); ?></a>
<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>

	<header id="masthead" class="site-header <?php if(get_theme_mod('appzend_menu_relative', 'enable') == 'enable') echo 'relative-menu'; ?> <?php if(get_theme_mod('appzend_menu_sticky', 'disable') == 'enable') echo 'sticky-menu'; ?>"  style="background-image: url('<?php echo $backgroundImg[0]; ?>');">
		<div class="nav-classic">
			<div class="container-fluid">
				<div class="header-middle-inner">
					
					<div class="main-logo wow fadeInLeft">
						<h1>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php bloginfo( 'name' ); ?><span>弁護士事務所</span>
							</a>      
						</h1>
					</div>
					<?php
						$alignment = get_theme_mod('appzend_menu_alignment'); 
						$alignment_class = get_zppzend_alignment_class($alignment);
					?>
					<div class="nav-menu flex-align <?php echo esc_attr($alignment_class); ?> wow fadeInRight">
						<nav class="box-header-nav main-menu-wapper" aria-label="<?php esc_attr_e( 'Main Menu', 'appzend' ); ?>" role="navigation">
							<?php
								wp_nav_menu( array(
										'theme_location'  => 'menu-1',
										'menu'            => 'primary-menu',
										'container'       => '',
										'container_class' => '',
										'container_id'    => '',
										'menu_class'      => 'main-menu',
									)
								);
							?>
						</nav>
						
						<?php if(get_theme_mod('appzend_button_enable', 'disable') == 'enable'): ?>
						<div class="extralmenu-item">
							<div class="right-btn <?php echo esc_attr(get_theme_mod('appzend-button-class')); ?>">
								<a class="btn btn-primary" <?php if(get_theme_mod('appzend-button-open-link-new-tab')): echo 'target="_blank"'; endif; ?> href="<?php echo esc_url(get_theme_mod('appzend-button-url', "#")); ?>"><?php echo esc_html(get_theme_mod('appzend-button-text', 'Shop Now')); ?></a>
							</div>
						</div>
						<?php endif; ?>
						<?php do_action('appzend_menu_toggle'); ?>
					</div>
				</div>
			</div><!-- .container end -->
		</div>
<!-- <?php 
		//if (is_front_page() ) {?> -->
		<div class="header-content">
			<div class="hcon-top">
				<div class="container">
					<div class="htop-content">
							<div class="site-branding">


								<h1 class="site-title"  id="site-url-dn">
										<?php echo get_the_title(); ?>
								</h1>
								<h1  id="site-url-db">
									
								</h1>
								<h3 id="site-description"><?php the_field('sub_title_on_banner'); ?></h3>
								<h3 id="site-desc"></h3>
								
							</div> <!-- .site-branding -->
					
					</div>
				</div>
			</div>
			<div class="hcon-bottom">
				
				
				<div class="hbot-right  animated fadeInRight">
					<?php 
						$hNews = array( 
							'post_type' => 'news',
							'orderby' => 'post_name',
							'order'   => 'ASC',
							 );
						$hNews_query = new WP_Query( $hNews ); 

						?>
						<?php if ( $hNews_query->have_posts() ) : ?>
							<div class="hnews-wrap" > 
								<?php while ( $hNews_query->have_posts() ) : $hNews_query->the_post(); ?>
								<div class="hnews-content">
									<div class="hnews-top">
										<p class="hnews">NEWS</p>
										<p class="hnews-date"><?php echo get_the_date( ' Y -m - d' ); ?></p>
									</div>
									<div class="hnews-bot">
										<p class="hnews-header"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></p>
									</div>
								</div>
								<?php endwhile; ?>
								<div class="rdm"><a href="/higashi/news/">もっと見る</a></div>
							</div>

						<?php endif; ?>
						<?php wp_reset_postdata(); 
				
						?>
						

				</div>						
					
			</div>
			
		</div>
<!-- 		<?php
			//}
		?> -->
	</header><!-- #masthead -->
<?php 
					if (!is_front_page() ) {
					?>
							
						<div class="breadcumb">
							<div class="container">
								<h4 class="bread-home">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<i class="fa fa-home" aria-hidden="true"></i> Home </a> >
									<?php echo get_the_title(); ?>
								</h4>
							</div>
							
						</div>
						
					<?php
					}
				?>
	