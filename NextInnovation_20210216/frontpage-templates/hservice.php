<div id="service-whole">
  <?php if( have_rows('service') ):?>
  <div class="service-title-content">
    <?php while( have_rows('service') ) : the_row();?>
      <div class="ht">
        <h3 class="htitle"><?php the_sub_field('service_title'); ?></h3><span></span>
      </div>
      <?php if(get_sub_field('hservice_description')): ?><p class="ssdesc"><?php the_sub_field('hservice_description');?></p><?php endif; ?>
    <?php endwhile; ?>
  </div>
  <?php endif; ?>
  
  <?php $service_count = 1;?>
   <div class="services-content-whole">
      <?php 
        $query=new WP_Query(array(
        'post_type' => 'services',
        ));
        if ($query->have_posts()):
          while ($query->have_posts()): $query->the_post();
            if( ($service_count % 2 ) != 0 ):
              ?>
                <div class="services-content services-right">
                  <div class="service-left">
                    <?php if( have_rows('banner_section') ):?>
                      <?php while( have_rows('banner_section') ) : the_row();?>
                        <div class="service-left-content" style='background-image: url("<?php the_sub_field('banner_image');?>");'>
                          <a href="<?php echo get_permalink(); ?>">
                            <h3 class="service-title"><?php the_title(); ?></h3>
                          </a>
                        </div>
                      <?php endwhile; ?>
                    <?php endif; ?>
                  </div>
                  <div class="service-right">
                    <div class="sr-content">
                      <?php if(get_field('service_short_description')): ?><h4 class="sh-title"><?php the_field('service_short_description');?></h4><?php endif; ?>
                        <div class="srdf">
                          <?php if( have_rows('banner_section') ):?>
                            <?php while( have_rows('banner_section') ) : the_row();?>
                              <?php if(get_sub_field('short_description')): ?><p class="ssdesc"><?php the_sub_field('short_description');?></p><?php endif; ?>
                            <?php endwhile; ?>
                          <?php endif; ?>
                          <p class="service-count">0<?php echo $service_count; ?></p>
                        </div>
                        
                        <div class="service-vm">
                          <a href="<?php echo get_permalink(); ?>" class="view-more">view more <img src="/ni/wp-content/uploads/2022/06/view-more.svg" alt="">
                          <img src="/ni/wp-content/uploads/2022/07/view-more-white.svg" alt="" class ="view-more-white"></a>
                        </div>
                    
                    </div>
                    
                  </div>
                </div>
            <?php else: ?>
              <div class="services-content services-left">
              <div class="service-right">
                  <div class="sr-content">
                    <?php if(get_field('service_short_description')): ?><h4 class="sh-title"><?php the_field('service_short_description');?></h4><?php endif; ?>
                      <div class="srdf">
                        <?php if( have_rows('banner_section') ):?>
                          <?php while( have_rows('banner_section') ) : the_row();?>
                            <?php if(get_sub_field('short_description')): ?><p class="ssdesc"><?php the_sub_field('short_description');?></p><?php endif; ?>
                          <?php endwhile; ?>
                        <?php endif; ?>
                        <p class="service-count">0<?php echo $service_count; ?></p>
                      </div>
                        
                      <div class="service-vm">
                        <a href="<?php echo get_permalink(); ?>" class="view-more">view more <img src="/ni/wp-content/uploads/2022/06/view-more.svg" alt="">
                        <img src="/ni/wp-content/uploads/2022/07/view-more-white.svg" alt="" class ="view-more-white"></a>
                      </div>
                    
                  </div>
                    
                </div>
                <div class="service-left">
                  <?php if( have_rows('banner_section') ):?>
                    <?php while( have_rows('banner_section') ) : the_row();?>
                      <div class="service-left-content" style='background-image: url("<?php the_sub_field('banner_image');?>");'>
                        <a href="<?php echo get_permalink(); ?>">
                          <h3 class="service-title"><?php the_title(); ?></h3>
                        </a>
                      </div>
                    <?php endwhile; ?>
                  <?php endif; ?>
                </div>
                
              </div>
            <?php endif; ?>

            <?php $service_count++; ?>
          <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
   </div>
</div>
