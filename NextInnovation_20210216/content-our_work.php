<div class="container contact-section">
    	<!-- Our Work  -->
        <?php if( have_rows('work_section') ):?>
            <div class="work-whole">
                <?php while( have_rows('work_section') ) : the_row();?>
                    <div class="work-title-content">
                        <div class="ht">
                            <h3 class="htitle"><?php the_sub_field('work_title'); ?></h3><span></span>
                        </div>
                        <?php if(get_sub_field('work_description')): ?><p class="wsdesc"><?php the_sub_field('work_description');?></p><?php endif; ?>
                        <!-- <div class="work-vm">
                            <a href="/ni/our-work" class="view-more">view more <img src="/ni/wp-content/uploads/2022/06/view-more.svg" alt="">
                            <img src="/ni/wp-content/uploads/2022/07/view-more-white.svg" alt="" class ="view-more-white"></a>
                        </div> -->
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
        <!-- Video section -->
        <?php if( have_rows('video_section') ):?>
            <div class="work-whole">
                <?php while( have_rows('video_section') ) : the_row();?>
                    <div class="work-title-content">
                        <div class="ht videotitle">
                            <h3 class="htitle"><?php the_sub_field('video_title'); ?></h3><span></span>
                        </div>
                        <div class="video-description"><?php the_sub_field('video_description'); ?></div>
                    </div>
                    <div class="row main-container justify-content-md-center">
                        <div class="col-5"><?php the_sub_field('video1'); ?></div>
                        <div class="col-5"><?php the_sub_field('video2'); ?></div>
                    </div>
                    <div class="row main-container justify-content-md-center">
                        <div class="col-5"><?php the_sub_field('video3'); ?></div>
                        <div class="col-5"><?php the_sub_field('video4'); ?></div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif;?>
</div>