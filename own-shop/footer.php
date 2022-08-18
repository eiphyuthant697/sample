<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package own-shop
 */

?>
	</div>
	<!-- Begin Footer Section -->
	<footer id="footer" class="con_width">
		<?php
			if ( is_active_sidebar( 'footer-1' ) ) :
				?>
					<div class="footer-widgets-wrapper">
						<div class="<?php echo esc_attr(OWN_SHOP_CONTAINER_CLASS) ?>">
							<div class="row">
								<div class="footer-widgets-wrapper">
					                	<?php get_sidebar( 'footer' ); ?>
					            </div>
					        </div>
					        
					    </div>
					</div>
				<?php
			endif;
		?>
		<div class="footer-copyrights-wrapper">
			<div class="<?php echo esc_attr(OWN_SHOP_CONTAINER_CLASS) ?>">
				<?php
			        /**
			         * Hook - own_shop_action_footer.
			         *
			         * @hooked own_shop_footer_copyrights - 10
			         */
			        do_action( 'own_shop_action_footer' );
		        ?>
		    </div>
		</div>
    </footer>
	<?php wp_footer(); ?>
	<link rel="stylesheet" href="/ztm/wp-content/themes/own-shop/css/slick.css">
	<link rel="stylesheet" href="/ztm/wp-content/themes/own-shop/css/jquery-ui.css">
	<link rel="stylesheet" href="/ztm/wp-content/themes/own-shop/css/slick-theme.css">
	<script src="/ztm/wp-content/themes/own-shop/js/slick.js"></script>
	<script src="/ztm/wp-content/themes/own-shop/js/jquery-ui.js"></script>
<script>
	jQuery(document).ready(function($){
		$('a img').attr('style', '');
		$('a, img').attr('bis_size', '');
	
		$('.abt-slider').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			arrows: true,
			speed: 500,
			dots: true,
			fade: true,
			//asNavFor: '.slider-nav-thumbnails',
		});

// 		$( "#tabs" ).tabs();
// 		$("#tabs ul li").delegate('a', 'click', function(e){
// 			e.preventDefault();
// 			return false;
// 		});
 		$('#tabs ul li').click(function(){
			var tab_id = $(this).attr('data-tab');

			$('#tabs ul li').removeClass('current');
			$('.tab_disnone').removeClass('current');

			$(this).addClass('current');
			$("#"+tab_id).addClass('current');
		})
		
		$('.tab-content ul.products li.product').on('click', function(){
			$(this).parents('.tab_disnone').addClass('current');
		})

		$('.product_list_widget li').each(function(){
			if ($(this).find('del').length){
				$(this).addClass('sale_product');
			}
		})
		var right_height = $('.collection-right').height();
		$('.collection-left .collection-photo').css('height', right_height);
	})
</script>
</body>
</html>