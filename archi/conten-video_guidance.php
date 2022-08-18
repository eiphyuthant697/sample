<div class="loat-news">
<?php 
$postPage = 2;
$args = array( 
    'posts_per_page' => $postPage,
	'post_type' => 'video_guidance',
	'order'   => 'ASC',
	 );
$the_query = new WP_Query( $args ); 
?>
<?php if ( $the_query->have_posts() ) : ?>
	<div class="vg-sec">
		<div class="vg-hd content">
			<h4>Video Guidance</h4>
		</div>
		<div id="ajaxN-posts" class="vg-wrap">
		    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div class="vg-inner">
					<div class="row">
						<div class="vg-tp col-md-4 col-sm-4">
							<?php if ( has_post_thumbnail() ) {  the_post_thumbnail('foodica-loop-portrait'); } 
							else{?>
								<img src="/red/wp-content/uploads/2021/01/image13.png">
								<?php
								}
								?>
						</div>
						<div class="vg-content col-md-8 col-sm-8">
							<span class="entry-date"><?php echo get_the_date( 'd M Y' ); ?></span>
					        <h3><?php echo get_the_title(); ?></h3>
					        <div class="news-entry">
					            <?php the_field('description'); ?>
					        </div>
						</div>
					</div>
				</div>
		    <?php endwhile; ?>
		</div>
	</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
<div class="content rg"><a id="moreN_posts">Load More</a></div>
</div>