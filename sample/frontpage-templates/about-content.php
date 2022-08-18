<?php 
   if( !get_theme_mod( 'hide_about_us_content', true)) :
?>


<div class="show769" id="ddms">
  <ul>
            <li>
                <center class="wow fadeIn" data-wow-delay="0s" data-wow-duration="4.0s">
                    <div class="ddmsfirst">
                        <h1>04</h1>
                        <hr>
                        <h2>
                          <?php if(get_theme_mod('abt_content_4_title')!="") :?>
                              <?php echo get_theme_mod('abt_content_4_title'); ?>
                          <?php else: ?>
                              SUCCESS
                          <?php endif; ?>
                        </h2>
                    </div>

                    <div class="ddmssecond">
                        <p class="txtleft">
                          <?php if(get_theme_mod('abt_content_4_description')!="") :?>
                              <?php echo get_theme_mod('abt_content_4_description'); ?>
                          <?php else: ?>
                              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                          <?php endif; ?>
                        </p>
                    </div>

                    <div class="ddmsthird">
                        <div class="ddms2img ddms4">
                          <?php if(get_theme_mod('abt_content_4_image')!="") :?>
                              <img src="<?php echo get_theme_mod('abt_content_4_image'); ?>">
                          <?php else: ?>
                              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/ddms4.png" width="100%">
                          <?php endif; ?>
                            
                        </div>
                    </div>
                </center>
            </li>
            <li>
                <center class="wow fadeIn" data-wow-delay="0s" data-wow-duration="4.0s">
                    <div class="ddmsfirst">
                        <h1>03</h1>
                        <hr>
                        <h2>
                          <?php if(get_theme_mod('abt_content_3_title')!="") :?>
                              <?php echo get_theme_mod('abt_content_3_title'); ?>
                          <?php else: ?>
                              MARKETING
                          <?php endif; ?>
                        </h2>
                    </div>

                    <div class="ddmssecond">
                        <p class="txtleft">
                          <?php if(get_theme_mod('abt_content_3_description')!="") :?>
                              <?php echo get_theme_mod('abt_content_3_description'); ?>
                          <?php else: ?>
                              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                          <?php endif; ?>
                            
                        </p>
                    </div>

                    <div class="ddmsthird">
                        <div class="ddms2img ddms3">
                          <?php if(get_theme_mod('abt_content_3_image')!="") :?>
                              <img src="<?php echo get_theme_mod('abt_content_3_image'); ?>">
                          <?php else: ?>
                              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/ddms3.png" width="100%">
                          <?php endif; ?>
                            
                        </div>
                    </div>
                </center>
                <div class="clearfix"></div>
            </li>
            <li>
                <center class="wow fadeIn" data-wow-delay="0s" data-wow-duration="3.5s">
                    <div class="ddmsfirst fr">
                        <h1>02</h1>
                        <hr>
                        <h2>
                          <?php if(get_theme_mod('abt_content_2_title')!="") :?>
                              <?php echo get_theme_mod('abt_content_2_title'); ?>
                          <?php else: ?>
                              DEVELOP
                          <?php endif; ?>
                        </h2>
                    </div>

                    <div class="ddmssecond">
                        <p class="txtleft">
                          <?php if(get_theme_mod('abt_content_2_description')!="") :?>
                              <?php echo get_theme_mod('abt_content_2_description'); ?>
                          <?php else: ?>
                              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                          <?php endif; ?>
                        </p>
                    </div>

                    <div class="ddmsthird fr">
                        <div class="ddms2img ddms2">
                          <?php if(get_theme_mod('abt_content_2_image')!="") :?>
                              <img src="<?php echo get_theme_mod('abt_content_2_image'); ?>">
                          <?php else: ?>
                              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/ddms2.png" width="100%">
                          <?php endif; ?>
                            
                        </div>
                    </div>
                </center>
                <div class="clearfix"></div>
            </li>
        <li>
          <center class="wow fadeIn" data-wow-delay="0s" data-wow-duration="3.0s">
            <div class="ddmsfirst">
                <h1>01</h1>
                <hr>
                <h2>
                    <?php if(get_theme_mod('abt_content_1_title')!="") :?>
                      <?php echo get_theme_mod('abt_content_1_title'); ?>
                    <?php else: ?>
                      DESIGN
                    <?php endif; ?>
                </h2>
            </div>
            <div class="ddmssecond">
                <p class="txtleft">
                  <?php if(get_theme_mod('abt_content_1_description')!="") :?>
                      <?php echo get_theme_mod('abt_content_1_description'); ?>
                  <?php else: ?>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                  <?php endif; ?>
                            
                </p>
            </div>

            <div class="ddmsthird">
                <div class="ddms2img ddms1">
                    <?php if(get_theme_mod('abt_content_1_image')!="") :?>
                        <img src="<?php echo get_theme_mod('abt_content_1_image'); ?>">
                    <?php else: ?>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/ddms1.png" width="100%">
                    <?php endif; ?>
                </div>
            </div>

          </center>
          <div class="clearfix"></div>
      </li>
  </ul>
</div>

<?php endif; ?>
