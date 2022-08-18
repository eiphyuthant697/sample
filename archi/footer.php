<?php
/**
 * The template for displaying the footer
 */
 global $archi_option; 
?>
<?php 
    if(isset($archi_option['header_layout']) and $archi_option['header_layout']!="htop_page" ){
        get_template_part('framework/footers/footer-sidenav'); 
    }else{  
?>
	<!-- footer begin -->
	<footer <?php if ( !is_active_sidebar( 'footer-area-1' ) && !is_active_sidebar( 'footer-area-2' ) && !is_active_sidebar( 'footer-area-3' ) && !is_active_sidebar( 'footer-area-4' ) ){ ?>class="no-padding"<?php } ?> >
		
		<?php if ( is_active_sidebar( 'footer-area-1' ) || is_active_sidebar( 'footer-area-2' ) || is_active_sidebar( 'footer-area-3' ) || is_active_sidebar( 'footer-area-4' ) ){ ?>
			<div class="main-footer">
	            <div class="<?php if($archi_option['footer-wideboxed']!=false){echo 'container-fluid';}else{echo 'container';} ?>">
	                <div class="row">
	                    <?php get_sidebar('footer');?>
	                </div>    
	            </div>
	        </div>
		<?php } ?>

		<div class="subfooter <?php if(isset($archi_option['footer_layout']) and $archi_option['footer_layout']=="footer2" ){echo 'padtop80 padbottom80 footer-2';} ?>">
			<div class="<?php if($archi_option['footer-wideboxed']!=false){echo 'container-fluid';}else{echo 'container';} ?>">
				<div class="copyright">
						<?php echo wp_specialchars_decode( do_shortcode( $archi_option['footer_text'] ) ); ?>                    
				</div>
			</div>
		</div>
		<a id="back-to-top" href="#" class="show"></a>
	</footer>

</div><!-- #wrapper -->

<?php } ?>

<div id="translate-magnific-popup" data-magnificloading="<?php echo esc_attr( $archi_option['portfolio_loading'] ); ?>" data-magnificclosex="<?php echo esc_attr( $archi_option['portfolio_closex'] ); ?>" ></div> 

<?php wp_footer(); ?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
jQuery(document).ready(function($){
    $dropdown_val = $('.information-header .right ul li:first-child p').text();
	    $('.information-header .right .dropdown button').html($dropdown_val+ '<i class="fa fa-chevron-down" aria-hidden="true"></i>');
   $('.information-header .right ul li p').click(function(){
      $('.information-header .right .dropdown button').html($(this).text()+ '<i class="fa fa-chevron-down" aria-hidden="true"></i>');
        
    });
});
jQuery(document).ready(function($){
    $('.info .news-inner').css('display', 'inline-block');    
   $('.information-header .right .dropdown ul li p').click(function(){
      if($(this).text() == 'all'){
      $('.info .news-inner').css('display', 'inline-block');
      }
      if($(this).text() == 'other'){
      $('.info .news-inner').css('display', 'none');
      $('.info .news-inner.other').css('display', 'inline-block');
      }
      if($(this).text() == 'remote_work'){
      $('.info .news-inner').css('display', 'none');
      $('.info .news-inner.remote_work').css('display', 'inline-block');
      }
      if($(this).text() == 'taxation'){
      $('.info .news-inner').css('display', 'none');
      $('.info .news-inner.taxation').css('display', 'inline-block');
      }

    });
});
$(window).scroll(function() {
		var get_header_height = $(".home .de_header_2.transparent").height();
		var scroll = $(window).scrollTop();
		
		if (scroll >= get_header_height) { 
			$('.home .de_header_2.transparent').addClass('bgWhite'); }
		else { 
		$('.home .de_header_2.transparent').removeClass('bgWhite');
		}
});
jQuery(document).ready(function($){
    
    $('.ft-service li a').removeAttr('href');
	$('.first-menu li a').removeAttr('href');
});
</script>
<script>
jQuery(document).ready(function($){
$("#more_posts").on("click",function(){ // When btn is pressed.
    $("#more_posts").attr("disabled",true); // Disable the button, temp.
    load_posts();
});
$("#moreN_posts").on("click",function(){ // When btn is pressed.
    $("#moreN_posts").attr("disabled",true); // Disable the button, temp.
    loadN_posts();
});
jQuery('#tablepress-1').parent().addClass('table-responsive');
})
</script>

</body>
</html>