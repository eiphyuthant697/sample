<?php 
$args = array( 
	'post_type' => 'our_services',
	'order'   => 'ASC',
	 );
$the_query = new WP_Query( $args ); 
?>
<?php if ( $the_query->have_posts() ) : ?>
	<div class="serivce-sec post-<?php the_ID(); ?>">
		<div class="service-wrap">
		    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div class="serivce-inner">
					<h3><?php echo get_the_title(); ?></h3>
					<?php
						if( have_rows('service_text') ){
							$count = 0;
    						while( have_rows('service_text') ) { the_row();
        						$sub_value = get_sub_field('service');
        						$count++;
        						
        			?>
        			<div class="service-text">
        				<p class="no"><?php echo '0';?><?php echo $count;?></p>
        				<p class="text"><?php echo $sub_value; ?></p>
        			</div> 
        			
        			<?php } 
        			} ?>
				</div>
		    <?php endwhile; ?>
		</div>
	</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
