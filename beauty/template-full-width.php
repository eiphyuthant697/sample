<?php
/**
 * The Template Name: Full Width
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Massage Spa
 */

get_header(); ?>

<div class="container">
<div id="pagelayout_area">
     <section class="site-maincontentarea fullwidth"> 
     <!-- services section -->
     <?php get_template_part('content', 'services'); ?>                
     <!-- member section -->
     <?php get_template_part('content', 'members'); ?>                       		
    </section><!-- section-->   
</div><!-- .pagelayout_area --> 
</div><!-- .container --> 
<?php get_footer(); ?>