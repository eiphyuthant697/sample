<?php 
$args = array( 	'post_type' => 'career',	'order'   => 'ASC',	 );
$the_query = new WP_Query( $args ); ?>
<?php if ( $the_query->have_posts() ) : ?>	
<div class="career-section">		
    <div class="row">		    
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="career-inner">					
                    <div class="career-tp">
                        <a href="<?php the_permalink(); ?>">
                        <?php 							
                        $image = get_field('featured_image');							
                        $size = 'full'; // (thumbnail, medium, large, full or custom size)
                            if( $image ) {								
                                echo wp_get_attachment_image( $image, $size );						}
                            else{?>							
                                <img src="/sample/wp-content/uploads/2021/03/marketing-ft.png">						
                        <?php
                        }						?>						
                        </a>
                    </div>					
                    <div class="career-content">
						<div class="cleft">							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>						</div>
						<div class="up-desc">
							<div class="company"><p><i class="fas fa-home"></i><?php the_field('company'); ?></p></div>
							<div class="full__part"><p><i class="far fa-clock"></i><?php the_field('full__part'); ?></p></div>
							<div class="place"><p><i class="fas fa-map-marker-alt"></i><?php the_field('place'); ?></p></div>
							<div class="salary"><p><i class="fas fa-dollar-sign"></i><?php the_field('salary'); ?></p></div>
						</div>
                        <p class="career-main-desc"><?php the_field('main_description'); ?></p>				
                    </div>				
        </div>		    
        <?php endwhile; ?>		
    </div>	
</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
