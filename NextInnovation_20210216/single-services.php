<?php
get_header(); ?>
<!-- <?php
  if ( has_post_thumbnail() ) {
     $image_single = get_the_post_thumbnail_url();
  }
  else {
     $image_single = get_stylesheet_directory_uri().'/images/noimage.png';
  }
?> -->

<!-- CONTENT BLOG -->
<?php if( have_rows('service_detail') ):?>
    <div class="service-detail-wrap">
        <?php while( have_rows('service_detail') ) : the_row();?>
            <?php if( have_rows('detail_content') ):?>
                <div class="service-detail-content-wrap">
                    <?php while( have_rows('detail_content') ) : the_row();?>
                        <div class="service-detail-content">
                            <div class="service-top-detail">
                                <h3><?php the_sub_field('detail_title'); ?></h3>
                                <p><?php the_sub_field('detail_description'); ?></p>
                            </div>    
                            <div class="service-bottom-detail"><?php the_sub_field('detail_content_content'); ?></div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
            <?php if( have_rows('service_plans') ):?>
                <div class="service-detail-plans-wrap">
                    <?php while( have_rows('service_plans') ) : the_row();?>
                        <div class="service-detail-plan <?php if( get_sub_field('is_it_special') == 1 ): echo 'special-list'; endif; ?>">
                            <div class="detail-plan-tilte-wrap">
                                <h3><?php the_sub_field('detail_plan_title'); ?></h3>
                                <?php if(get_sub_field('detail_plan_description')): ?><p><?php the_sub_field('detail_plan_description');?></p><?php endif; ?>
                            </div>
                            
                            <?php if( have_rows('detail_plan_lists') ):?>
                                <div class="detail-plan-lists">
                                    <?php while( have_rows('detail_plan_lists') ) : the_row();?>
                                        <div class="detail-plan-list <?php if( get_sub_field('bold_text') == 1 ): echo 'bold-list'; endif; ?>">
                                            <?php if( get_sub_field('get__not') == 1 ): ?>
                                                <i class="fas fa-solid fa-check"></i>
                                            <?php else : ?>
                                                <i class="fas fa-solid fa-xmark"></i>
                                            <?php endif; ?>
                                            <span><?php the_sub_field('detail_plan_list'); ?></span>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
        <div class="sservice-vm">
            <a href="/ni/contact/" class="view-more">Contact Us <img src="/ni/wp-content/uploads/2022/06/view-more.svg" alt="">
            <img src="/ni/wp-content/uploads/2022/07/view-more-white.svg" alt="" class ="view-more-white">
            </a>
        </div>
    </div>
<?php endif; ?>
<div class="other-service">
    <div class="oservice-title-content">
        <div class="ht">
            <h3 class="htitle">Other Services</h3><span></span>
        </div>
    </div>
    <?php get_template_part('frontpage-templates/hservice');   ?>
</div>

<!-- END CONTENT BLOG -->
<?php get_footer(); ?>	





  