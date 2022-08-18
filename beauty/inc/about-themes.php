<?php
/**
 *Massage Spa About Theme
 *
 * @package Massage Spa
 */

//about theme info
add_action( 'admin_menu', 'massage_spa_abouttheme' );
function massage_spa_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'massage-spa'), __('About Theme Info', 'massage-spa'), 'edit_theme_options', 'massage_spa_guide', 'massage_spa_mostrar_guide');   
} 

//Info of the theme
function massage_spa_mostrar_guide() { 	
?>
<div class="wrap-GT">
	<div class="gt-left">
   		   <div class="heading-gt">
			  <h3><?php esc_html_e('About Theme Info', 'massage-spa'); ?></h3>
		   </div>
          <p><?php esc_html_e('Massage Spa is a clean and modern, flexible and visually accomplished, smooth and seamless, engaging and pleasant, creative and extremely customizable beauty salon WordPress theme. This theme has been developed to create a platform for the development and design of beautiful modern websites for massage and spa, hair and nail salons, health, yoga and beauty parlor.','massage-spa'); ?></p>
<div class="heading-gt"> <?php esc_html_e('Theme Features', 'massage-spa'); ?></div>
 

<div class="col-2">
  <h4><?php esc_html_e('Theme Customizer', 'massage-spa'); ?></h4>
  <div class="description"><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'massage-spa'); ?></div>
</div>

<div class="col-2">
  <h4><?php esc_html_e('Responsive Ready', 'massage-spa'); ?></h4>
  <div class="description"><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'massage-spa'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('Cross Browser Compatible', 'massage-spa'); ?></h4>
<div class="description"><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'massage-spa'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('E-commerce', 'massage-spa'); ?></h4>
<div class="description"><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'massage-spa'); ?></div>
</div>
<hr />  
</div><!-- .gt-left -->
	
<div class="gt-right">			
        <div>
        	<a href="https://gracethemes.com/documentation/massage-spa/#homepage-lite" target="_blank"><?php esc_html_e('Documentation', 'massage-spa'); ?></a> |	
        </div>		
</div><!-- .gt-right-->
<div class="clear"></div>
</div><!-- .wrap-GT -->
<?php } ?>