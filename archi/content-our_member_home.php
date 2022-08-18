<?php 
$args = array( 
	'post_type' => 'our_member',
	'order'   => 'ASC',
	 );
$the_query = new WP_Query( $args ); 
?>
<?php if ( $the_query->have_posts() ) : ?>
	<div class="member-wrap">
	    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	    	<?php if( $the_query->current_post%2 == 1 ){ ?>
				<div class="member-inner left-post row">
					<div class="member-content left dwv col-md-7 col-sm-7">
						<h4><?php the_field('company_name'); ?></h4>
						<h3><?php echo get_the_title(); ?></h3>
						<p><?php the_field('description'); ?>
					</div>
					<div class="member-tp right dhp col-md-5 col-sm-5">
						<?php if ( has_post_thumbnail() ) {  the_post_thumbnail('foodica-loop-portrait'); } 
						else{?>
							<img src="/red/wp-content/uploads/2021/01/image13.png">
						<?php
							}
						?>
					</div>
					<div class="member-content left dhp col-md-7 col-sm-7">
						<h4><?php the_field('company_name'); ?></h4>
						<h3><?php echo get_the_title(); ?></h3>
						<p><?php the_field('description'); ?>
					</div>
					<div class="member-tp right dwv col-md-5 col-sm-5">
						<?php if ( has_post_thumbnail() ) {  the_post_thumbnail('foodica-loop-portrait'); } 
						else{?>
							<img src="/red/wp-content/uploads/2021/01/image13.png">
						<?php
							}
						?>
					</div>
				</div>
			<?php } ?>
			<?php if( $the_query->current_post%2 != 1 ){ ?>
				<div class="member-inner right-post row">
					<div class="member-tp left col-md-5 col-sm-5">
						<?php if ( has_post_thumbnail() ) {  the_post_thumbnail('foodica-loop-portrait'); } 
						else{?>
							<img src="/red/wp-content/uploads/2021/01/image13.png">
						<?php
							}
						?>
					</div>
					<div class="member-content right col-md-7 col-sm-7">
						<h4><?php the_field('company_name'); ?></h4>
						<h3><?php echo get_the_title(); ?></h3>
						<p><?php the_field('description'); ?>
					</div>
				</div>
			<?php } ?>
	    <?php endwhile; ?>
	</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
