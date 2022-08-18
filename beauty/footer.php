<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Massage Spa
 */
?>

<div class="footer-copyright">
    <div class="footer-menu">
        <?php wp_nav_menu(array('theme_location' => '
        
        
        
        
        '));?>
    </div>
    <div class="footer-social">
        <?php wp_nav_menu(array('theme_location' => 'social-link'));?>
    </div>
        	<div class="container">
            	<div class="copyright-txt">
					<?php bloginfo('name'); ?>. <?php esc_html_e('All Rights Reserved', 'massage-spa');?>           
                </div>
                <div class="design-by">                 
                </div>
                 <div class="clear"></div>
            </div>           
        </div>        
</div><!--#end site-holder-->

<?php wp_footer(); ?>
<script>
    jQuery(document).ready(function($) {
        $('.about-humb .about-bg').css('height', $('.wearesuprime').height());
        $('.slick-slider').slick({
            nextArrow: '<i class="fa fas fa-arrow-circle-right slick-next"></i>',
            prevArrow: '<i class="fa fas fa-arrow-circle-left slick-prev"></i>',
        });
    });
</script>
</body>
</html>