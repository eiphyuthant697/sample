<?php 
   if( !get_theme_mod( 'hide_our_service_setting', true)) :
?>
  <?php 
  $args = array( 
    'post_type' => 'our_services',
    // 'posts_per_page' => 6,
    'order'   => 'ASC',
     );
  $the_query = new WP_Query( $args ); 
  ?>
  <?php if ( $the_query->have_posts() ) : ?>
    <div id="ourservice">
      <div class="home-service">
        <h3 id="whatnxtino" class="wow fadeIn" data-wow-delay="0s" data-wow-duration="7.0s">OUR SERVICE</h3>
        <h1 id="aboutush1">SERVICE</h1>
      </div>
      <div class="owl-carousel portfolio-details-carousel">
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <div class="item"><a href="<?php the_permalink(); ?>">
			<?php 
				$image = get_field('featured_image');
				$size = 'full'; 
				if( $image ) {
				  echo wp_get_attachment_image( $image, $size );
				}
				else{?>
				  <img src="/sample/wp-content/uploads/2021/03/marketing-ft.png" alt="service">
				<?php
				  }
				?>
<!--           <?php if ( has_post_thumbnail() ) {  the_post_thumbnail('feature'); } 
          else{?>
            <img src="/sample/wp-content/uploads/2021/03/slider2.png" width="100%"  class="img-fluid">
          <?php
              }
			?> -->
			
          <div id="slider_txt">
              <div class="sldt-inner">
                <h3>            <?php echo get_the_title(); ?>            </h3>
				  <p><span><?php the_field('service_featured_description'); ?></span>
<!--                   <?php $trim_length = 200;  
                  $custom_field = 'sdescription';
                  $value = get_post_meta($post->ID, $custom_field, true);
                  if ($value) {
                    if (strlen($value) > $trim_length)
                      $value = rtrim(substr($value,0,$trim_length)) .'.';
                   echo $value;
                  }?> -->
                </p>
                
              </div>
          </div>
			</a>
        </div>
  <?php endwhile; ?>
  </div>
  <div class="owl-readmore">
  <p class="readmore">
      <a href="/sample/service/">View All <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i></a>
    </p>
  </div>
      
      </div>
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php 
   if( get_theme_mod( 'hide_our_service_setting', true)) :
?>
<div id="ourservice">
  <div class="home-service">
    <h3 id="whatnxtino">OUR SERVICE</h3>
    <h1 id="aboutush1">SERVICE</h1>
  </div>
  <div class="owl-carousel portfolio-details-carousel">
    <div class="item">
    <?php if(get_theme_mod('service_1_image')!="") :?>
        <img src="<?php echo get_theme_mod('service_1_image'); ?>"  class="img-fluid">
      <?php else: ?>
        <img src="/sample/wp-content/uploads/2021/03/slider1.png" width="100%"  class="img-fluid">
      <?php endif; ?>
      <div id="slider_txt">
          <div class="sldt-inner">
            <h3>
              <?php if(get_theme_mod('service_title')!="") :?>
                  <?php echo get_theme_mod('service_title'); ?>
              <?php else: ?>
                  Offshore Development  
              <?php endif; ?>
            </h3>
            <p>
              <?php if(get_theme_mod('service_description')!="") :?>
                  <?php echo get_theme_mod('service_description'); ?>
              <?php else: ?>
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry.
              <?php endif; ?>
            </p>
            <p class="readmore">
              <a href="/sample/service/">View All <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i></a>
            </p>
          </div>
      </div>
    </div>
    <div class="item">
      <?php if(get_theme_mod('service_2_image')!="") :?>
        <img src="<?php echo get_theme_mod('service_2_image'); ?>"  class="img-fluid">
      <?php else: ?>
        <img src="/sample/wp-content/uploads/2021/03/slider2.png" width="100%"  class="img-fluid">
      <?php endif; ?>
      <div id="slider_txt">
          <div class="sldt-inner">
            <h3>
              <?php if(get_theme_mod('service_title')!="") :?>
                  <?php echo get_theme_mod('service_title'); ?>
              <?php else: ?>
                  Offshore Development  
              <?php endif; ?>
            </h3>
            <p>
              <?php if(get_theme_mod('service_description')!="") :?>
                  <?php echo get_theme_mod('service_description'); ?>
              <?php else: ?>
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry.
              <?php endif; ?>
            </p>
            <p class="readmore">
              <a href="/sample/service/">View All <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i></a>
            </p>
          </div>
      </div>
    </div>
    <div class="item">
    <?php if(get_theme_mod('service_3_image')!="") :?>
      <img src="<?php echo get_theme_mod('service_3_image'); ?>"  class="img-fluid">
    <?php else: ?>
      <img src="/sample/wp-content/uploads/2021/03/slider1.png" width="100%"  class="img-fluid">
    <?php endif; ?>
    <div id="slider_txt">
          <div class="sldt-inner">
            <h3>
              <?php if(get_theme_mod('service_title')!="") :?>
                  <?php echo get_theme_mod('service_title'); ?>
              <?php else: ?>
                  Offshore Development  
              <?php endif; ?>
            </h3>
            <p>
              <?php if(get_theme_mod('service_description')!="") :?>
                  <?php echo get_theme_mod('service_description'); ?>
              <?php else: ?>
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry.
              <?php endif; ?>
            </p>
            <p class="readmore">
              <a href="/sample/service/">View All <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i></a>
            </p>
          </div>
      </div>
    </div>

  </div>
      
</div>
<?php endif; ?>
