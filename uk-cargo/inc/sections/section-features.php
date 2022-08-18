<?php 
/**
 * Template part for displaying Feature Section
 *
 *@package Businessbiz
 */

    $features_title       = businessbiz_get_option( 'features_title' );
    $img_url = businessbiz_get_option( 'features_custom_img');
    $feature_category = businessbiz_get_option( 'feature_category' );
    // for( $i=1; $i<=4; $i++ ) :
    //     $features_page_posts[] = absint(businessbiz_get_option( 'features_page_'.$i ) );
    // endfor;
    ?>
    <div class="features-section-wrapper <?php echo ! empty( $img_url) ? 'has-post-thumbnail' : 'no-post-thumbnail'; ?> "> 
        <?php if ( ! empty( $img_url ) ) : ?>
            <div class="featured-image" style="background-image: url('<?php echo esc_url( $img_url ) ?>');">
            </div><!-- .featured-image -->
        <?php endif; ?>
        <div class="entry-container">
            <?php if( !empty($features_title)):?>
                <div class="section-header">
                    <?php if( !empty($features_title)):?>
                        <h2 class="section-title"><?php echo esc_html($features_title);?></h2>
                    <?php endif;?><!-- .section-header -->
                </div>       
            <?php endif;?>       
            <div class="section-content col-2">
                <?php 
                    $features_args = array (
                        'posts_per_page' => 4,
                        'post_type'     => 'post',
                        'post_status' => 'publish',
						'order' => 'ASC',
                        'paged' => 1,
                        //'cat' => absint($feature_category),
                    );
                    if (absint($feature_category) > 0) {
                        $features_args['cat'] = absint($feature_category);
                    }
                    $loop = new WP_Query($features_args);                        
                    if ( $loop->have_posts() ) :
                        $i=-1;  
                        while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                        
                            <article class="ft-cnt-<?php echo $i; ?>">
                                <div class="features-content">
                                    <header class="entry-header">
                                        <h3 class="entry-title"><?php the_title();?></h3>
                                    </header>
                                <div class="entry-content">
									
                                    <?php
                                        //the_field('featured_description');
                                        //$excerpt = businessbiz_the_excerpt( 5 );
                                        //echo wp_kses_post( wpautop( $excerpt ) );
                                    ?>
									<?php if( have_rows('featured_descriptions') ):?>
                                        <div class="place-holders">
                                            <?php while( have_rows('featured_descriptions') ) : the_row();?>
												<div class="splace-holder">
													<p class="place-holder"><?php echo get_sub_field('featured_description'); ?></p>
													<?php if( have_rows('phones') ):?>
														<div class="phones">
															<?php while( have_rows('phones') ) : the_row();?>
																<a href="tel:<?php echo get_sub_field('phone');?>"><?php echo get_sub_field('phone');?></a>
															<?php endwhile; ?>
														</div>
													<?php endif; ?>
												</div>
                                            <?php endwhile; ?>
                                        </div>
                                    <?php endif; ?>
									
									<div class="place"><?php echo the_field('place'); ?></div>
                                </div><!-- .entry-content -->
                                </div>
                            </article>

                        <?php endwhile;?>
                      <?php wp_reset_postdata(); ?>
                    <?php endif;?>
				

            </div>  
			<div class="ft-cnt-rm"><p class="ft-cnt-rd"><a href="/uk-cargo/our-features/#drop-off" class="btn rm-btn">Explore More</a></p></div>
        </div>
    </div>
