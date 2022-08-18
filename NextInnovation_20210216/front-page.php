<?php get_header();  
$pageID = get_option('page_for_posts'); 
?>


<!-- About Us -->
<?php if( have_rows('about_us') ):?>
    <div class="about-whole">
        <?php while( have_rows('about_us') ) : the_row();?>
            <div class="about-content">
                <div class="about-left">
                    <div class="aleft">
                        <?php 							
                            $image = get_sub_field('about_us_image');							
                            $size = 'full'; // (thumbnail, medium, large, full or custom size)
                                if( $image ) {								
                                    echo wp_get_attachment_image( $image, $size );						}
                                else{?>							
                                    <img src="/ni/wp-content/uploads/2022/06/service.png">						
                            <?php
                            }						?>	
                        
                    </div>
                </div>
                <div class="about-right">
                    <div class="aright">
                        <div class="ht">
                        <?php if(get_sub_field('about_us_title')): ?><h3 class="htitle"><?php the_sub_field('about_us_title');?></h3><span></span><?php endif; ?>
                        </div>
                        
                        <?php if(get_sub_field('about_us_content')): ?><p><?php the_sub_field('about_us_content');?></p><?php endif; ?>
                            
                        <a href="#" class="view-more"><?php if(get_sub_field('link_text')){ ?><?php the_sub_field('link_text');?><?php }else { echo 'view more';} ?> <img src="/ni/wp-content/uploads/2022/06/view-more.svg" alt="">
                        <img src="/ni/wp-content/uploads/2022/07/view-more-white.svg" alt="" class ="view-more-white"></a>
                    </div>
                </div>
            </div>
            
        <?php endwhile; ?>
    </div>
<?php endif;?>

<!-- Strength -->
<?php if( have_rows('our_strength') ):?>
    <div class="strength-whole">
        <?php while( have_rows('our_strength') ) : the_row();?>
            <div class="ht">
            <?php if(get_sub_field('stength_title')): ?><h3 class="htitle"><?php the_sub_field('stength_title');?></h3><span></span><?php endif; ?>
            </div>
            <?php $count =1; ?>
            <?php if( have_rows('strength_content') ):?>
                <div class="strengths-whole">
                    <?php while( have_rows('strength_content') ) : the_row();?>
                        <div class="our-strength-content">
                            <div class="strength-left">0<?php echo $count; ?></div>
                            <div class="strength-right">
                                <?php if(get_sub_field('our_strength_content_title')): ?><p><strong><?php the_sub_field('our_strength_content_title');?> </strong><?php the_sub_field('our_strength_s_content');?></p><?php endif; ?>
                            </div>
                            
                        </div>
                    <?php     $count++;
                    endwhile; ?>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
    </div>
<?php endif;?>

<!-- Service -->
<?php get_template_part('frontpage-templates/hservice');   ?>

<!-- Client  -->
<?php if( have_rows('clients') ):?>
    <div class="client-whole">
        <?php while( have_rows('clients') ) : the_row();?>
            <div class="client-title-content">
                <div class="ht">
                    <h3 class="htitle"><?php the_sub_field('client_title'); ?></h3><span></span>
                </div>
                <?php if(get_sub_field('client_description')): ?><p class="csdesc"><?php the_sub_field('client_description');?></p><?php endif; ?>
            </div>
            <?php if( have_rows('clients_content') ):?>
                <div id="cclient_list">
                    <ul class="txtcenter">
                        <?php $i = 1 ; ?>
                        <?php while( have_rows('clients_content') ) : the_row();?>
                            <li class="fl client<?php echo $i; ?>">
                                <img id="tdo" src="<?php the_sub_field('client_image'); ?>">
                                <h4><?php the_sub_field('client_name'); ?> </h4>
                            </li>
                        <?php $i++; ?>
                        <?php endwhile; ?>
                    </ul>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
    </div>
<?php endif;?>

<!-- Our Work  -->
<?php if( have_rows('work_section') ):?>
    <div class="work-whole">
        <?php while( have_rows('work_section') ) : the_row();?>
            <div class="work-title-content">
                <div class="ht">
                    <h3 class="htitle"><?php the_sub_field('work_title'); ?></h3><span></span>
                </div>
                <?php if(get_sub_field('work_description')): ?><p class="wsdesc"><?php the_sub_field('work_description');?></p><?php endif; ?>
                <div class="work-vm">
                    <a href="/ni/our-work" class="view-more">view more <img src="/ni/wp-content/uploads/2022/06/view-more.svg" alt="">
                    <img src="/ni/wp-content/uploads/2022/07/view-more-white.svg" alt="" class ="view-more-white"></a>
                </div>
            </div>
            <?php if( have_rows('work_content') ):?>
                <div class="work_list">
                    <ul class="txtcenter">
                        <?php while( have_rows('work_content') ) : the_row();?>
                            <li>
                                <img src="<?php the_sub_field('work_image'); ?>">
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
    </div>
<?php endif;?>

<?php our_team(); ?>

<!-- Testimonials  -->
<?php if( have_rows('testimonials') ):?>
    <div class="testimonials-whole">
        <?php while( have_rows('testimonials') ) : the_row();?>
            <div class="testimonials-title-content">
                <div class="ht">
                    <h3 class="htitle"><?php the_sub_field('testimonials_title'); ?></h3><span></span>
                </div>
                <?php if(get_sub_field('testimonials_description')): ?><p class="tsdesc"><?php the_sub_field('testimonials_description');?></p><?php endif; ?>
            </div>
            
            <?php if( have_rows('testimonials_contents') ):?>
                <div class="testimonials_contents">
                    <ul class="ttxtcenter">
                        <?php while( have_rows('testimonials_contents') ) : the_row();?>
                            <li>
                                <img class="testimonial_photo" src="<?php the_sub_field('testimonial_photo'); ?>">
                                <h4 class="testimonial_name"><?php the_sub_field('testimonial_name'); ?></h4>
                                <p class="testimonial_position"><?php the_sub_field('testimonial_position'); ?></p>
                                <p class="testimonial_description"><?php the_sub_field('testimonial_description'); ?></p>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
    </div>
<?php endif;?>
<!-- News -->
<div class="news-whole">
    <?php if( have_rows('hnew_section') ):?>
        <?php while( have_rows('hnew_section') ) : the_row();?>
            <div class="news-title-content">
                <div class="ht">
                    <h3 class="htitle"><?php the_sub_field('hnew_title'); ?></h3><span></span>
                </div>
                <?php if(get_sub_field('hnews-description')): ?><p class="wsdesc"><?php the_sub_field('hnews-description');?></p><?php endif; ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php get_template_part('content', 'news'); ?>  
</div>  
<?php extra_footer_content(); ?>
<?php get_footer(); ?>