<?php 
   if( !get_theme_mod( 'hide_blog_3_area_setting', true)) :
?>
<div class="" id="cclient">
        <center id="clienthead" class="wow fadeIn" data-wow-delay="0s" data-wow-duration="3.0s">CLIENT</center>
        <div id="cclient_list">
            <ul class="txtcenter">
                <li class="fl wow fadeIn" data-wow-delay="0s" data-wow-duration="4.0s">
                    <?php if(get_theme_mod('client_1_image')!="") :?>
                        <img id="tdo" src="<?php echo get_theme_mod('client_1_image'); ?>">
                    <?php else: ?>
                        <img id="tdo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/client1.png" width="100%">
                    <?php endif; ?>
                    
                    <hr>
                    <h4>
                    <?php if(get_theme_mod('client_1_title')!="") :?>
                        <?php echo get_theme_mod('client_1_title'); ?>
                    <?php else: ?>
                        TDO Business Solution
                    <?php endif; ?>
                    </h4>
                </li>
                <li class="fl wow fadeIn" data-wow-delay="0s" data-wow-duration="4.0s">
                    <?php if(get_theme_mod('client_2_image')!="") :?>
                        <img id="omedia" src="<?php echo get_theme_mod('client_2_image'); ?>">
                    <?php else: ?>
                        <img id="omedia" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/client2.png" width="100%">
                    <?php endif; ?>
                    <hr>
                    <h4>
                      <?php if(get_theme_mod('client_2_title')!="") :?>
                          <?php echo get_theme_mod('client_2_title'); ?>
                      <?php else: ?>
                          Omedia
                      <?php endif; ?>
                    </h4>
                </li>
                <li class="fl wow fadeIn" data-wow-delay="0s" data-wow-duration="4.0s">
                    <?php if(get_theme_mod('client_3_image')!="") :?>
                        <img id="trust" src="<?php echo get_theme_mod('client_3_image'); ?>">
                    <?php else: ?>
                        <img id="trust" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/client3.png" width="100%">
                    <?php endif; ?>
                    <hr>
                    <h4>
                      <?php if(get_theme_mod('client_3_title')!="") :?>
                          <?php echo get_theme_mod('client_3_title'); ?>
                      <?php else: ?>
                          Trust Venture Partners
                      <?php endif; ?>
                    </h4>
                </li>
                <li class="fl wow fadeIn" data-wow-delay="0s" data-wow-duration="4.0s">
                    <?php if(get_theme_mod('client_4_image')!="") :?>
                        <img id="phf" src="<?php echo get_theme_mod('client_4_image'); ?>">
                    <?php else: ?>
                        <img id="phf" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/client4.png" width="100%">
                    <?php endif; ?>
                    <hr>
                    <h4>
                      <?php if(get_theme_mod('client_4_title')!="") :?>
                          <?php echo get_theme_mod('client_4_title'); ?>
                      <?php else: ?>
                          PHF MYANMAR
                      <?php endif; ?>
                    </h4>
                </li>
            </ul>

            <div class="clearfix"></div>

            <ul class="txtcenter">
                <li class="fl wow fadeIn" data-wow-delay="0s" data-wow-duration="4.0s">
                    <?php if(get_theme_mod('client_5_image')!="") :?>
                        <img id="pcfprime" src="<?php echo get_theme_mod('client_5_image'); ?>">
                    <?php else: ?>
                        <img id="pcfprime" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/client5.png" width="100%">
                    <?php endif; ?>
                    <hr>
                    <h4>
                    <?php if(get_theme_mod('client_5_title')!="") :?>
                          <?php echo get_theme_mod('client_5_title'); ?>
                      <?php else: ?>
                          PACIFIC PRIME
                      <?php endif; ?>
                    </h4>
                </li>
                <li class="fl wow fadeIn" data-wow-delay="0s" data-wow-duration="4.0s">
                    <?php if(get_theme_mod('client_6_image')!="") :?>
                        <img id="miba" src="<?php echo get_theme_mod('client_6_image'); ?>">
                    <?php else: ?>
                        <img id="miba" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/client6.png" width="100%">
                    <?php endif; ?>
                    <hr>
                    <h4>
                      <?php if(get_theme_mod('client_6_title')!="") :?>
                          <?php echo get_theme_mod('client_6_title'); ?>
                      <?php else: ?>
                          Miba UNIVERSITY
                      <?php endif; ?>
                    </h4>
                </li>
                <li class="fl wow fadeIn" data-wow-delay="0s" data-wow-duration="4.0s">
                    <?php if(get_theme_mod('client_7_image')!="") :?>
                        <img id="ank" src="<?php echo get_theme_mod('client_7_image'); ?>">
                    <?php else: ?>
                        <img id="ank" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/client7.png" width="100%">
                    <?php endif; ?>
                    <hr>
                    <h4>
                      <?php if(get_theme_mod('client_7_title')!="") :?>
                          <?php echo get_theme_mod('client_7_title'); ?>
                      <?php else: ?>
                          MYANMAR A&amp;K Co.,Ltd
                      <?php endif; ?>
                    </h4>
                </li>
                <li class="fl wow fadeIn" data-wow-delay="0s" data-wow-duration="4.0s">
                    <?php if(get_theme_mod('client_8_image')!="") :?>
                        <img id="glb" src="<?php echo get_theme_mod('client_8_image'); ?>">
                    <?php else: ?>
                        <img id="glb" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/client8.png" width="100%">
                    <?php endif; ?>
                    <hr>
                    <h4>
                      <?php if(get_theme_mod('client_8_title')!="") :?>
                          <?php echo get_theme_mod('client_8_title'); ?>
                      <?php else: ?>
                          The Glambar Spa
                      <?php endif; ?>
                    </h4>
                </li>
            </ul>
        </div>

    </div>
<?php endif; ?>