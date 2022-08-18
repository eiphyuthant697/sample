<?php 
$args = array( 
  'post_type' => 'doctor',
  // 'posts_per_page' => 6,
  'order'   => 'DSC',
   );
$the_query = new WP_Query( $args ); 
$position = 1;
?>
<?php if ( $the_query->have_posts() ) : ?>
  <div class="doctor-wrap">
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <div class="doctor-content" id="post-<?php the_ID(); ?>">
          <div class="doctor-top row">
                <div class="col-md-3 doctor-photo col-sm-4">
                    <?php if ( has_post_thumbnail() ) {  the_post_thumbnail('feature'); } 
                    else{?>
                        <div class="post-img" style="min-height: 300px; background: rgba(184, 152,0,10%);"></div>
                    <?php
                        }
                    ?>
                </div>   
                <div class="col-md-9 col-sm-8">
                    <div class="doctor-self">
						
                        <h6><?php the_field('position'); ?></h6>
                        <h5><?php echo get_the_title(); ?>
							
						</h5>
                        <div class="profile">
                            <?php the_field('profile'); ?>
                        </div>
                    </div>
                </div>
            
          </div> 
          <div class="bio-other">
            <?php if( have_rows('biography') ):?>
                <div class="bio">
					<h3>Biography</h3>
					<table>
						
						
						<?php while( have_rows('biography') ) : the_row();?>
						<tr>
							<td><span><?php echo get_sub_field('biography_year');?></span></td>
							<td><p><?php echo get_sub_field('biography_text');?></p></td>
						</tr>
                    	<?php endwhile; ?>
						
					</table>
					
						<?php if( have_rows('other_position') ):?>
						<table class="position-table">
						<?php $count = count(get_field("other_position")); ?>
							
							<?php while( have_rows('other_position') ) : the_row();?>
								<tr class="other">
									<td rowspan="<?php echo $count; ?>" class="pos position-<?php echo $position++;?>">Other positions</td>
									<td><?php echo get_sub_field('position');?></td>
								</tr>
							<?php endwhile; ?>
							</table>
						<?php endif; ?>
					
					
                </div>
            <?php endif; ?>
            
          </div>
      </div>
    <?php endwhile; ?>
  </div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
