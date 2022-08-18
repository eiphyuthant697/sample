		<div id="footer">
			<div class="up-arrow">
				<a href="#banner-whole"><img src="/ni/wp-content/uploads/2022/06/up.svg" alt=""></a>
			</div>
			<div class="footer-top">
			<?php if( !get_theme_mod( 'hide_footer_content_setting', true ) ) : ?>		        
			<div class="float-left" id="footerlogo">		            <center>		                
				<?php if(get_theme_mod('footer_logo')!="") :?>                            
				<?php $slider_1 = get_theme_mod('footer_logo'); ?>                            
				<img src="<?php echo $slider_1; ?>"  width="100%">                        
				<?php else: ?>                            
					<div class="logo footer-logo">
						<h1 class="text-light">
						  <a href="<?php echo get_home_url(); ?>">
							<?php bloginfo( 'name' ); ?><small><?php bloginfo( 'description' ); ?></small>
						  </a>
						</h1>
					  </div>                        
				<?php endif; ?>		            
				</center>		        </div>	
				<div class="float-right" id="footertxt">
					<div class="footer-right-nav">		        	
				<?php if( !get_theme_mod( 'hide_footer_menu', true ) ) : ?>		           
				<nav class="main-menu nav-menu dm-none">				        
					<?php
				          wp_nav_menu( array(		 'theme_location'  => 'primary-menu','depth'           => 1, 'container'       => '','walker'          => new WP_Bootstrap_Navwalker(),				          ) );				        ?>	
				</nav>				    
				<?php endif; ?>	
				</div>
				<div class="footer-right-content">
				<p>		            	
					<?php if(get_theme_mod('footer_address_setting')!="") : echo get_theme_mod('footer_address_setting');  else: ?>                            Next Innovations co.,LtdOffice Address - No(446),Thihathu Street,11 Ward,South Okkalapa Tsp,Yangon.                        
					<?php endif; ?>		                		                
					<br><br>		                
					<?php if(get_theme_mod('footer_ph_no')!="") : echo get_theme_mod('footer_ph_no');  else: ?>                            +95 (0)9 451663606, 9 898819468                        
					<?php endif; ?>		            
				</p>	
					</div>	            
			</div>		    
					        
			<?php endif; ?>	
					</div>
		<div class="copyright">	                   
			<p><?php echo get_theme_mod( 'footer_text', 'Copyright © Next Innovations' ) ?></p>	               
		</div>	            
</div>
			
	<?php wp_footer(); ?>
	<script src="https://kit.fontawesome.com/532f1fcad3.js" crossorigin="anonymous"></script>	
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.3.1.min.js"></script>		
	<script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/owl.carousel/owl.carousel.min.js"></script>	
	<script src="<?php echo get_template_directory_uri(); ?>/js/slick.js"></script>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/slick.css">
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>

<script>
jQuery(document).ready(function($) {
		$('a img').attr('style', '');
		$('a, img').attr('bis_size', '');
	
		$('.service-right').each(function(){
			$('.service-left-content').css('height', $(this).height() );
		})

		$('.news-slide').slick({
		  infinite: true,
		  speed: 300,
		  slidesToShow: 4,
		  centerMode: true,
		});
		

	}	)
</script>

<script>
	$(window).on('load', function(){	  
		$('.btn__toggle').on('click', function(e){		
			e.preventDefault();		var menu_height = $('.menu-toggle').outerHeight();    		$(this).toggleClass('open');		$('.nav__container').toggleClass('open');    		if($('.nav__container').hasClass('open')) {		  $('.nav__container').css('max-height', menu_height+'px');		}		else {		  $('.nav__container').css('max-height', '');		}	  });	});
</script>

</body>
</html>