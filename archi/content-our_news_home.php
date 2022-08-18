<?php 
$args = array( 
	'post_type' => 'our_news',
	'order'   => 'ASC',
	 );
$the_query = new WP_Query( $args ); 
?>
<?php if ( $the_query->have_posts() ) : ?>
	<div class="news-wrap">
	    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div class="news-inner">
					<div class="news-content">
						<span class="entry-date"><?php echo get_the_date( 'j M Y' ); ?></span>
						<h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
						<div class="news-entry">
							<?php the_field('description'); ?>
						</div>
					</div>
				</div>
	    <?php endwhile; ?>
	</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
