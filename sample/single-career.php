<?php
get_header(); ?>
<?php
  if ( has_post_thumbnail() ) {
     $image_single = get_the_post_thumbnail_url();
  }
  else {
     $image_single = get_stylesheet_directory_uri().'/asset/img/noimage.png';
  }
?>
<!-- CONTENT BLOG -->
<div class="single-img">
  <img src="<?php echo $image_single; ?>">
<!-- 	<?php 
    $image = get_field('featured_image');
    $size = 'full'; 
    if( $image ) {
      echo wp_get_attachment_image( $image, $size );
    }
    else{?>
      <img src="/sample/wp-content/uploads/2021/03/marketing-ft.png" alt="service">
    <?php
      }
    ?> -->
<!--       <img src="<?php echo $image_single; ?>" alt="service"> -->
 </div>
<div id="service-single-content  d-flex">

  <div class="service-cntr">
		
    <div class="container">
      <div class="row">
          <div class="col-md-12">
            <?php if ( have_posts() ) : ?>
              <?php while (have_posts()) : the_post(); ?>
                <div class="post-controls cpw clearfix">
                    <h3><?php the_title();?></h3>
					
					<div class="uper-description">
<!-- 						<h2>Job Summary</h2> -->
						<div class="up-desc">
							<div class="company"><p><i class="fas fa-home"></i><?php the_field('company'); ?></p></div>
							<div class="full__part"><p><i class="far fa-clock"></i><?php the_field('full__part'); ?></p></div>
							<div class="place"><p><i class="fas fa-map-marker-alt"></i><?php the_field('place'); ?></p></div>
							<div class="salary"><p><i class="fas fa-dollar-sign"></i><?php the_field('salary'); ?></p></div>
						</div>
					</div>
					
					<?php the_field('main_description'); ?>
                  
                    <div class="cp-requirements">
                    	<?php if( have_rows('requirements') ):?>
                        <div class="cp-requirements">
                            <h5>Requirements</h5>
                            <ul class="cp-requirement">
                                <?php while( have_rows('requirements') ) : the_row();?>
                                    <li>
                                        <i class="fas fa-star-of-life"></i>
                                        <?php echo get_sub_field('requirement');?>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                        <?php if( have_rows('bonus_skills') ):?>
                        <div class="bonus_skill-wrap">
                            <h5>Bonus Skills</h5>
                            <ul class="bonus_skills">
                                <?php while( have_rows('bonus_skills') ) : the_row();?>
                                    <li class="bonus_skill"><i class="fas fa-check"></i><?php echo get_sub_field('bonus_skill');?></li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="clearfix"></div>
                    
                    <?php if( have_rows('qualifications') ):?>
                        <div class="qualifications">
                            <h5>Qualifications</h5>
                            <ul class="qualification">
                                <?php while( have_rows('qualifications') ) : the_row();?>
                                    <li><img src="<?php echo get_sub_field('qualification');?>"></li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
					<?php if( get_field('more_info') ) : ?>
                    <div class="more-info">
                      <p class="service-inner-main-content">
                        <?php the_field('more_info'); ?>
                      </p>
						<?php 
							$link = get_field('website_link');
							if( $link ): 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
								<p class="wb-link">More details at : <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></p>
							<?php endif; ?>
						<?php 
							$mlink = get_field('mail_to');
							if( $mlink ): 
								$mlink_url = $mlink['url'];
								$mlink_title = $mlink['title'];
								$mlink_target = $mlink['target'] ? $mlink['target'] : '_self';
								?>
								<p class="mail-link">Mail to : <a class="button" href="<?php echo esc_url( $mlink_url ); ?>" target="<?php echo esc_attr( $mlink_target ); ?>"><?php echo esc_html( $mlink_title ); ?></a></p>
							<?php endif; ?>
					  
                    </div> 
					<?php endif; ?>
              <?php endwhile;?>

            <?php else : ?>
              <p><?php esc_html_e('Sorry, no posts matched your criteria.', 'next-innovation'); ?></p>
            <?php endif; ?>
          </div>
      </div>
    </div>
  </div>
</div>
  
<!-- END CONTENT BLOG -->
<?php get_footer(); ?>	





  