<?php 
$args = array( 
	'order'   => 'DESC',
	 );
$the_query = new WP_Query( $args ); 
?>
<?php if ( $the_query->have_posts() ) : ?>
	<div class="section_news" id="page_news">
		<div class="inner">
			<div class="title">
				<p>NEWS</p>
			</div>
			<div class="archives">
			    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<div class="list">
						<span data-micromodal-trigger="news_modal-pagename-<?php the_ID(); ?>">
							<div class="date">
								<p><?php echo get_the_date( 'M.j' ); ?></p>
							</div>
							<div class="text">
								<p><?php the_title(); ?></p>
							</div>
						</span>
						<div id="news_modal-pagename-<?php the_ID(); ?>" class="modal" aria-hidden="true">
							<div class="modal__overlay" tabindex="-1" data-micromodal-close="true">
								<div class="modal__container" role="dialog" aria-modal="true" data-micromodal-close="true">
									<div class="news_modal__box">
										<div class="news_modal__inner">
											<div class="date">
												<p><?php echo get_the_date( 'M.j' ); ?></p>
											</div>
											<div class="headline">
												<p><?php the_title(); ?></p>
											</div>
											<div class="entry-content modal_text">
												<?php the_content(); ?>
											</div>
											<img src="/EVOLStorm/wp-content/uploads/2021/10/ico_modal_close.svg" alt="" class="news_modal__close" data-micromodal-close="true">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			    <?php endwhile; ?>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

