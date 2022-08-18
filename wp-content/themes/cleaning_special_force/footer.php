</div>
<?php
/**
 * The template for displaying the footer
 *
 */

?>

    <footer class="footer">
        <div class="inner">
            <?php if ( is_active_sidebar( 'footer_1' ) ) : ?>
                <aside class="widget-area footer-1-area mb-2">
                    <?php dynamic_sidebar( 'footer_1' ); ?>
                </aside>
            <?php endif; ?>
            <div class="copyright">
                <p style="text-align:center">©お掃除特殊部隊</p>
            </div>
        </div>
    </footer>
<!--     <div class="overlay overlay_start">
    <div class="inner">
        <div class="logo" style="transition: opacity 800ms ease 200ms;">
            <?php foodica_custom_logo() ?>
        </div>
    </div>
</div> -->

<?php wp_footer(); ?>
<script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js?ver=2.2.4' id='jquery-js'></script>
<!-- <script type='text/javascript' src="/wp-content/themes/bokujo/assets/js/jquery.simplyscroll.min.js"></script> -->
<script type='text/javascript' src='/wp-content/themes/bokujo/assets/js/custom-slick.js'></script>


 <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
    $(window).on('load', function() {

    $('body').css('overflow', 'hidden');
    $('.overlay .logo').css('transition', 'opacity 800ms 200ms');
    $('.overlay').addClass('overlay_start');


    setTimeout(function() {
        $('body').css('overflow', '');
        $('.overlay').fadeOut(800);


    }, 3000);

    });
    $("a, a img").attr('bis_size', '');
    $("img").attr('style', '');

</script>


    <!-- <script type="text/javascript">
    (function($) {
        $(function() { //on DOM ready 
            $("#scroller").simplyScroll({
                customClass: 'vert',
                orientation: 'vertical',
                auto: false,
                manualMode: 'loop',
                frameRate: 20,
                speed: 5
            });
        });
     })(jQuery);
</script> -->
<script>
        // When the user scrolls the page, execute myFunction
        window.onscroll = function() {
            myFunction();
			var x = window.matchMedia("(min-width: 768px)");
            sidebarDisplay(x);
			x.addListener(sidebarDisplay);
            
            };

        // Get the header
        var header = document.getElementById("sheader");
        var logo_bar = document.getElementById("logo_bar");
        var sticky_menu = document.getElementById("sticky-menu");

        // Get the offset position of the navbar
        var sticky = header.offsetTop;
        var logo_offsetTop = logo_bar.offsetTop;

        function sidebarDisplay(x) {
			if (x.matches) {
			  if (window.pageYOffset > logo_offsetTop) {
				document.getElementById("h_sidebar").style.display = "none";
			  } else {
				document.getElementById("h_sidebar").style.display = "block";
			  }
			}
			else {
				document.getElementById("h_sidebar").style.display = "block";
			}
		}

        // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
        function myFunction() {
          if (window.pageYOffset > sticky) {
            sticky_menu.classList.add("sticky");
          } else {
            sticky_menu.classList.remove("sticky");
          }
        }
</script>

<script>
    $(".testimonial-reviews").slick({
        infinite: true,
       dots: false,
        prevArrow: false,
        nextArrow: false,
        slidesToShow: 4,
        autoplay: false,
        autoplaySpeed: 3000,
        responsive: [
        {
        breakpoint: 1024,
        settings: {
            slidesToShow: 4,
            slidesToScroll: 4,
            infinite: true,
        }
        },
        {
        breakpoint: 600,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 2
        }
        },
        {
        breakpoint: 480,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 1
        }
        }]
    });

</script>

</body>
</html>