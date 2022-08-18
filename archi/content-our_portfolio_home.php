<?php 
$args = array( 
	'post_type' => 'our_porfolio',
	'order'   => 'ASC',
	 );
$the_query = new WP_Query( $args ); 
?>
<?php if ( $the_query->have_posts() ) : ?>
	<div class="portfolio-sec">
		<div class="portfolio-hd content">
			<h4>Our Services</h4>
		</div>
		<div class="portfolio-wrap">
		    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div class="portfolio-inner">
					
						<div class="member-tp">
							<?php if ( has_post_thumbnail() ) {  the_post_thumbnail('foodica-loop-portrait'); } 
							else{?>
								<img src="/red/wp-content/uploads/2021/01/image13.png">
								<?php
								}
							?>
						</div>
						<div class="member-cnt">
							<h3><?php echo get_the_title(); ?></h3>
						</div>
					
				</div>
		    <?php endwhile; ?>
		</div>
	</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
