<?php 
$individual_args = array( 
    'post_type' => 'lawyer',
    'order'   => 'ASC',
     );
$individual_query = new WP_Query( $individual_args ); 
?>
<?php if ( $individual_query->have_posts() ) : ?>
    <div class="lawyer-wwrap">
        <?php while ( $individual_query->have_posts() ) : $individual_query->the_post(); ?>
            <div class="lawyer-post" id="post-<?php the_ID(); ?>"> 
                <a data-toggle="modal" data-target="#post-<?php the_ID(); ?>">
                    <div class="lawyer-wrap">
                        <div class="lawyer-img">
                            <?php if ( has_post_thumbnail() ) {  the_post_thumbnail('foodica-loop-portrait'); } 
                                else{?>
                                    <img src="/higashi/wp-content/uploads/2021/05/lawyer_soon.jpg">
                            <?php
                                }
                            ?>
                        </div>
            
                        <div class="lawyer-content"> 
                            <h1>
                                <?php echo get_the_title(); ?>
                                <span><?php the_field('name_english'); ?></span>
                            </h1>
                        </div>
                    </div> 
                </a>
                <div class="lawyer-modal modal fade" id="post-<?php the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="post-<?php the_ID(); ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="container modal-content">
                            <div class="modal-header"> 
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                            </div>
                            <div class="modal-body">
                                <div class="lawyer-modal-wrap">
                                    <div class="lawyer-top row">
                                        <div class="col-md-4 col-sm-4 layer-top-left">
                                            <?php if ( has_post_thumbnail() ) {  the_post_thumbnail('foodica-loop-portrait'); }     
                                                else{?>
                                                    <img src="/higashi/wp-content/uploads/2021/05/lawyer_soon.jpg">
                                            <?php
                                                }
                                            ?>
                                            <h1>
                                                <?php echo get_the_title(); ?>
                                                <span><?php the_field('name_english'); ?></span>
                                            </h1>
<!-- 											<div class="rdm">
												<a href="<?php //the_permalink(); ?>" class="contact">Read Detail</a>
											</div> -->
                                
                                        </div> 
                                        <div class="col-md-8 col-sm-8 layer-top-right">
                                            <?php the_field('biography'); ?>
                                        </div> 
                                    </div>
                                    <?php
                                    if( have_rows('your_achievement') ):
                                        ?><ul>
                                        <?php while( have_rows('your_achievement') ) : the_row();
                                            $title = get_sub_field('achievement_title');
                                            $description = get_sub_field('achievements');?>
                                            <li class="lcontent-title"><?php echo $title; ?></li>
                                            <li class="lcontent-description"><?php echo $description; ?></li>
                                        <?php endwhile; ?>
                                        </ul>
                                    <?php endif; ?>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
