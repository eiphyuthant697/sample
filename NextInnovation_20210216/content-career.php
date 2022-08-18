<?php 
$args = array( 	'post_type' => 'our_services',	'order'   => 'ASC',	 );
$the_query = new WP_Query( $args ); ?>
<?php if ( $the_query->have_posts() ) : ?>	
<div class="service-section">		
    <div class="row">		    
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="service-inner col-md-6">					
                    <div class="serv-tp">
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
                    <div class="service-content d-flex">
                        <div class="sleft">							<h4><?php the_field('sub_title'); ?></h4>						</div>
                        <div class="sright">							
                            <h2><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>		
                            <p><?php the_field('service_featured_description'); ?></p>
                            <div style="display: none;">								
                                <?php $trim_length = 320;  //desired length of text to display
                                $custom_field = 'sdescription';								
                                $value = get_post_meta($post->ID, $custom_field, true);
                                if ($value) {									
                                    if (strlen($value) > $trim_length)										
                                        $value = rtrim(substr($value,0,$trim_length)) .'.';								 
                                    echo $value;								
                                }?>
                            </div>						
                        </div>					
                    </div>				
        </div>		    
        <?php endwhile; ?>		
    </div>	
</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
