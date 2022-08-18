        <div class="offersuprime with-green-plant">
            <div class="extension-wrap offer-wrap left-offer">
                <?php
                    $promoposts = new WP_Query( array( 'posts_per_page' => 1,'post_type' => 'hair_salon','order' => 'DESC','cat' => 14 ) );
                    if ( $promoposts->have_posts() ) : 
                    while ( $promoposts->have_posts() ) : $promoposts->the_post(); ?>
	                    <div class="offer-content-wrap ">
	                        
	                        <div class="offer-featured-img">
	                            <?php $image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));?>
	                                <?php if (!empty($image)) {?>
	                                    <img src="<?php echo esc_url($image); ?>" title="#slidecaption<?php echo esc_attr($i); ?>" alt="<?php echo esc_attr($alt); ?>" />
	                                <?php } else {?>
	                                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slides/slider-default.jpg" title="#slidecaption<?php echo esc_attr($i); ?>" alt="<?php echo esc_attr($alt); ?>" />
	                                <?php }?>
	                        </div>
                            <div class="offer-content">
                                <div class="extension-header">
                                    <p>01</p>
                                    <p class="title">extension</p>
                                </div>
                                <div class="offer-extension-content">
                                    <div class="offer-content-inner">
                                        <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                        <p><?php echo esc_html(wp_trim_words(get_the_content(), 10, '...')); ?></p>
                                    </div>
                                    
                                </div>
	                            
                            </div>
	                    </div>
	                <?php endwhile;
                    endif;
                        wp_reset_postdata();?>
            </div>
            <div class="clear"></div>
            <div class="body-care-wrap offer-wrap right-offer">
                <?php
                $promoposts = new WP_Query( array( 'posts_per_page' => 1,'post_type' => 'hair_salon','order' => 'DESC','cat' => 17 ) );
                if ( $promoposts->have_posts() ) : 
                while ( $promoposts->have_posts() ) : $promoposts->the_post(); ?>
	                <div class="offer-content-wrap ">
                    <div class="offer-content">
                            <div class="extension-header">
                                <p>02</p>
                                <p class="title">Body Care</p>
                            </div>
                            <div class="offer-extension-content">
                                <div class="offer-content-inner">
                                    <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                    <p><?php echo esc_html(wp_trim_words(get_the_content(), 10, '...')); ?></p>
                                </div>
                                
                            </div>
                        </div>
	                    <div class="offer-featured-img">
	                        <?php $image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));?>
	                            <?php if (!empty($image)) {?>
	                                <img src="<?php echo esc_url($image); ?>" title="#slidecaption<?php echo esc_attr($i); ?>" alt="<?php echo esc_attr($alt); ?>" />
	                            <?php } else {?>
	                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slides/slider-default.jpg" title="#slidecaption<?php echo esc_attr($i); ?>" alt="<?php echo esc_attr($alt); ?>" />
	                            <?php }?>
	                    </div>
                        

	                </div>
	            <?php endwhile;
                endif;
                wp_reset_postdata();?>

            </div>
            <div class="clear"></div>
            <div class="facial-peel-wrap offer-wrap left-offer">
            
                
                <?php
                $promoposts = new WP_Query( array( 'posts_per_page' => 1,'post_type' => 'hair_salon','order' => 'DESC','cat' => 15 ) );
                if ( $promoposts->have_posts() ) : 
                while ( $promoposts->have_posts() ) : $promoposts->the_post(); ?>
	                <div class="offer-content-wrap ">
	                    
	                    <div class="offer-featured-img">
	                        <?php $image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));?>
	                            <?php if (!empty($image)) {?>
	                                <img src="<?php echo esc_url($image); ?>" title="#slidecaption<?php echo esc_attr($i); ?>" alt="<?php echo esc_attr($alt); ?>" />
	                            <?php } else {?>
	                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slides/slider-default.jpg" title="#slidecaption<?php echo esc_attr($i); ?>" alt="<?php echo esc_attr($alt); ?>" />
	                            <?php }?>
	                    </div>
                        <div class="offer-content">
                            <div class="extension-header">
                                <p>03</p>
                                <p class="title">Facial Peeling</p>
                            </div>
                            <div class="offer-extension-content">
                                <div class="offer-content-inner">
                                    <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                    <p><?php echo esc_html(wp_trim_words(get_the_content(), 10, '...')); ?></p>
                                </div>
                                
                            </div>
                        </div>
	                </div>
	            <?php endwhile;
                endif;
                wp_reset_postdata();?>

            </div>
            <div class="clear"></div>
            <div class="facial-wrap offer-wrap right-offer">
                
                <?php
                    $promoposts = new WP_Query( array( 'posts_per_page' => 1,'post_type' => 'hair_salon','order' => 'DESC','cat' => 16 ) );
                    if ( $promoposts->have_posts() ) : 
                    while ( $promoposts->have_posts() ) : $promoposts->the_post(); ?>
	                <div class="offer-content-wrap ">
	                    <div class="offer-content">
                            <div class="extension-header">
                                <p>04</p>
                                <p class="title">Facial</p>
                            </div>
                            <div class="offer-extension-content">
                                <div class="offer-content-inner">
                                    <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                    <p><?php echo esc_html(wp_trim_words(get_the_content(), 10, '...')); ?></p>
                                </div>
                                
                            </div>
	                    </div>
	                    <div class="offer-featured-img">
	                        <?php $image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));?>
	                            <?php if (!empty($image)) {?>
	                                <img src="<?php echo esc_url($image); ?>" title="#slidecaption<?php echo esc_attr($i); ?>" alt="<?php echo esc_attr($alt); ?>" />
	                            <?php } else {?>
	                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slides/slider-default.jpg" title="#slidecaption<?php echo esc_attr($i); ?>" alt="<?php echo esc_attr($alt); ?>" />
	                            <?php }?>
	                    </div>

	                </div>
	                <?php endwhile;
                    endif;
                    wp_reset_postdata();?>

            </div>
            <div class="clear"></div>
        </div><!-- wearesuprime-->
 

    