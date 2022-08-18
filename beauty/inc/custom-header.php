<?php
/**
 * @package Massage Spa
 * Setup the WordPress core custom header feature.
 *
 * @uses massage_spa_header_style()

 */
function massage_spa_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'massage_spa_custom_header_args', array(		
		'default-text-color'     => '333333',
		'width'                  => 1400,
		'height'                 => 280,
		'wp-head-callback'       => 'massage_spa_header_style',		
	) ) );
}
add_action( 'after_setup_theme', 'massage_spa_custom_header_setup' );

if ( ! function_exists( 'massage_spa_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see massage_spa_custom_header_setup().
 */
function massage_spa_header_style() {
	$header_text_color = get_header_textcolor();
	?>
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() || get_header_textcolor() ) :
	?>
		.header {
			background: url(<?php echo esc_url( get_header_image() ); ?>) no-repeat;
			background-position: center top;
		}
		.logo h1 a { color:#<?php echo esc_html(get_header_textcolor()); ?>;}
	<?php endif; ?>	
	</style>
    
    <?php
	// If the header text option is untouched, let's bail.
	if ( display_header_text() ) {
		return;
	}

	// If the header text has been hidden.
	?>
    <style type="text/css">		
		.logo h1,
		.logo p{
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}
    </style>
    
	<?php     
} 
endif; // massage_spa_header_style 