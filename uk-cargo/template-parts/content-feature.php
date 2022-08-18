<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Businessbiz
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="our-features-wrap" id="drop-off">
		<div class="of-wrap">
				<div class="of-header">
					<h3><?php echo the_field('feature_title'); ?></h3>
					<h6><?php echo the_field('feature_description'); ?></h6>
				</div>
				<div class="ourf-wrap row">
		<?php 
		$args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'category_name' => 'feature',
			'order' => 'ASC',
			
		);
		$arr_posts = new WP_Query( $args );
  
		if ( $arr_posts->have_posts() ) :
			?>
			
					<div class="col-sm-7">
						<div class="of-ss-wrap">
							<?php
							while ( $arr_posts->have_posts() ) :
								$arr_posts->the_post();
								?>
								<div class="of-single-wrap">
									<div class="of-single">
										<h3 class="of-et"><?php the_title(); ?></h3>
										
										<?php if( have_rows('featured_descriptions') ):?>
                                        <div class="place-holders">
                                            <?php while( have_rows('featured_descriptions') ) : the_row();?>
                                                <p class="place-holder"><?php echo get_sub_field('featured_description'); ?></p>
                                                <?php if( have_rows('phones') ):?>
                                                    <div class="phones">
                                                        <?php while( have_rows('phones') ) : the_row();?>
                                                            <a href="tel:<?php echo get_sub_field('phone');?>"><?php echo get_sub_field('phone');?></a>
                                                        <?php endwhile; ?>
                                                    </div>
                                                <?php endif; ?>
                                                
                                            <?php endwhile; ?>
                                        </div>
                                    <?php endif; ?>
										
									<div class="place"><?php echo the_field('place'); ?></div>
									</div>
								</div>
								<?php
							endwhile;?>
						</div>
					</div>
					
				
		<?php endif; 
		wp_reset_postdata();
		?>
					<div class="col-sm-5">
						<div class="of-right">
							<?php if( get_field('feature_image') ): ?>
								<img src="<?php the_field('feature_image'); ?>" />
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>

		<?php $disable_cta_section = businessbiz_get_option( 'disable_cta_section' );
		if( true ==$disable_cta_section): ?>
			<section class="abt-cta" id="cta">
				<div class="wrapper">
					<?php get_template_part( 'inc/sections/section', 'cta' ); ?>
				</div>
			</section>
		<?php endif; ?>
		<?php if( have_rows('prohibitions') ):?>
			<div class="prohibitions-wrap">
				<?php while( have_rows('prohibitions') ) : the_row();?>
					<div class="prohibitions">
						<div class="proh-header">
							<h3><?php echo get_sub_field('prohibitions_title'); ?></h3>
							<p><?php echo get_sub_field('prohibitions_description'); ?></p>
						</div>
						<?php if( have_rows('prohibitions_item') ):?>
							<div class="prohibitions-item">
							<?php while( have_rows('prohibitions_item') ) : the_row();?>
								<div class="prohibition-item">
									<div class="item-icon"><img src="<?php echo get_sub_field('prohibitions_icon');?>"></div>
									<div class="item-label"><?php echo get_sub_field('prohibitions_item_name');?></div>
								</div>
							<?php endwhile; ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>

	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?> 
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'businessbiz' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
