<?php 
   if( !get_theme_mod( 'hide_blog_1_area_setting', true)) :
?>

<div id="abus">
    <div id="aboutusbgimg">
        <div id="aboutusover"><!-- data-aos="fade-right"  -->
            <h1 id="aboutush1">ABOUT US</h1>
            <div class="abt-inner wow fadeIn" data-wow-delay="0s" data-wow-duration="7.0s">
              <h3 id="whatnxtino">
                <?php if(get_theme_mod('home_title_block_1')!="") :?>
                  <?php echo get_theme_mod('home_title_block_1'); ?>
                <?php else: ?>
                  WHAT’S<br>NEXT<br> INNOVATIONS
                <?php endif; ?>
              </h3>
              <div class="nxt-cover">
                <div class="nxt-content wow slideInUp" data-wow-delay="0s" data-wow-duration="4.0s">
                  <p id="aboutuspara">
                      <?php if(get_theme_mod('home_description_block_1')!="") :?>
                        <?php echo get_theme_mod('home_description_block_1'); ?>
                      <?php else: ?>
                        As Next Innovations Co.,Ltd is a company based in Japan, we provide high quality and innovative web design with our professional web developers and satisfied customers. We are a staff of Japanese staff who have a lot of knowledge about UI, UX and also do many Japanese projects.
                      <?php endif; ?>
                    </p>
                    <p class="readmore">
                      <a href="/sample/about-us/">About Us            <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i></a>
                    </p>
                </div>
              </div>
              
            </div>
        </div>
    </div>
</div>

          
<?php endif; ?>

