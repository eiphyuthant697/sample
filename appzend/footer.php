<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package appzend
 */

?>  
    <footer id="colophon" class="site-footer clear">
		<?php 
			if ( is_active_sidebar( 'footer-1' ) ):
			$footerarea =  count( wp_get_sidebars_widgets()['footer-1'] ); ?>
				<div class="footer-area">
					<div class="container">
						<div class="footer-inner footer-<?php echo intval( $footerarea ); ?>">
							<?php dynamic_sidebar( 'footer-1' ); ?>
						</div> 
					</div>
				</div>
		<?php endif; ?>

    </footer><!-- #colophon -->

    <div class="sub-footer">
        <div class="main-whole">
			<div class="flogo  flex-align text-left wow fadeInLeft">
				<?php the_custom_logo(); ?>

				<h1 class="flogo-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>
					</a>
				</h1>
				<h2 class="flogo-name">Law Office</h2>
				<h3> Higashi lkebukuro Law Office</h3>
			</div> <!-- .site-branding -->
			<div class="nav-menu flex-align text-right wow fadeInRight">
				<nav class="box-header-nav main-menu-wapper" aria-label="<?php esc_attr_e( 'Main Menu', 'appzend' ); ?>" role="navigation">
					<?php
						wp_nav_menu( array(
								'theme_location'  => 'menu-2',
								'menu'            => 'footer-menu',
								'container'       => '',
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => 'footer-menu',
							)
						);
					?>
				</nav>
			</div>
        </div>
    </div>

</div><!-- #page -->


<a href="#" id="back-to-top" class="progress" data-tooltip="Back To Top">
    <div class="arrow-top"></div>
    <div class="arrow-top-line"></div>
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="xMinYMin meet"> <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/></svg> 
</a>

<?php wp_footer(); ?>
<script>
	wow = new WOW(
        {
            boxClass:     'wow',      // default
        }
    )
    wow.init();
</script>
<script>
// 	jQuery(document).ready(function($){
// 		$mrd = $('.hmis-right').height();
// 		$('.hmis-left').css('height', $mrd);
// 	})
	jQuery(document).ready(function($){
		$trd = $('.feature-wrap').height();
		$('.hfet-left').css('height', $trd);
	})
	jQuery(document).ready(function($){
	$('.work-apcontent').css('display','none');
		$('.wmodal-content').hover(function(){
		$data_target = $(this).attr('data-target');
		$('.work-apcontent.'+$data_target).css('display','block');
		});
		$('.work-post').hover(function(){
		$('.work-apcontent').css('display','none');
		})

    $brd = $('.business').height()+ 100;
    $('.individual').css('height',$brd);
    $('.work-apcontent').on('click',function(){
        window.location = $(this).attr('href');
    });
// 	$('.hmission').attr("data-wow-delay",".5s");
		$mrd = $('.hmis-right').height();
		$('.hmis-left').css('height', $mrd);
	$('header').removeAttr('id');
	$('.home header').attr('id', 'masthead');
	$('.red ol').prev().css('color','#c55911');
	$('.red ol').next().css('color','#c55911');

$('div.contact-business').css('display', 'none');
$('span.contact-business').on('click',function(){
$('div.contact-business').css('display', 'block');
$('div.contact-indivdual').css('display', 'none');
})
$('span.contact-individual').on('click',function(){
$('div.contact-indivdual').css('display', 'block');
$('div.contact-business').css('display', 'none');
})
})

</script>

<script>
var string = document.getElementById('site-url-dn').innerText;
var array = string.split("");
var timer;

function frameLooper () {
	if (array.length > 0) {
		document.getElementById("site-url-db").innerHTML += array.shift();
	} else {
		clearTimeout(timer);
			}
	loopTimer = setTimeout('frameLooper()',70); /* change 70 for speed */

}
frameLooper();
</script>
<script>
var desc_string = document.getElementById('site-description').innerText;

var desc_array = desc_string.split("");
var desc_timer;

function descriptionframeLooper () {
	if (desc_array.length > 0) {
        
		document.getElementById("site-desc").innerHTML += desc_array.shift();
	} else {
		clearTimeout(desc_timer);
			}
	loopTimer = setTimeout('descriptionframeLooper()',70); /* change 70 for speed */

}
descriptionframeLooper();
</script>


</body>
</html>