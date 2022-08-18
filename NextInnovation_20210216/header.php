<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(); ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php get_template_part('inc/meta-seo'); ?>
    <meta name="robots" content="noindex, nofollow" />

  <!-- Google Fonts -->

  <link href="https://fonts.googleapis.com/css2?family=Herr+Von+Muellerhoff&family=Lato:wght@400;700&family=PT+Serif&display=swap" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="<?php echo get_template_directory_uri(); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="<?php echo get_template_directory_uri(); ?>/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    
    <?php wp_head(); ?>

</head>

<body <?php body_class( ); ?>>
    <div id="wrapper" class="wrapper">        
		<?php get_template_part('inc/navigation'); ?>        
		<?php get_template_part('inc/page-header'); ?>        
