<?php  

        for( $i=1; $i<=4; $i++ ) :
            $testimonial_page_posts[] = absint(businessbiz_get_option( 'testimonial_page_'.$i ) );
        endfor; 
        $testimonial_category = businessbiz_get_option( 'testimonial_category' );

    ?>             
        <div class="testimonial-slider-wrapper" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 800, "dots": true, "arrows":false, "autoplay": true, "fade": false }'>
                <?php $args = array (
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'paged' => 1,
                );
                if (absint($testimonial_category) > 0) {
                    $args['cat'] = absint($testimonial_category);
                } 
            
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
                $i=-1;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                    <article class="slick-item">
                        <div class="entry-content"><?php 
                        $excerpt = businessbiz_the_excerpt( 50 );
                                echo wp_kses_post( wpautop( $excerpt ) ); ?>
                        </div><!-- .entry-content -->
            
                        <div class="featured-image">
                            <img src="<?php the_post_thumbnail_url( 'full' ); ?>">
                
                            <header class="entry-header">
                                <h2 class="entry-title"><?php the_title(); ?></h2>
                                
                            </header>
                        </div><!-- .featured-image -->
                    </article><!-- .slick-item -->
                    <?php endwhile;?>
                <?php wp_reset_postdata(); 
             endif;?>
    </div><!-- .testimonial-slider-wrapper -->
