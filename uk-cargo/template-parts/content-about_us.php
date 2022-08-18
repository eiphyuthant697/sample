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
	<div class="about-us-wrap">
		<?php if( have_rows('founded') ):?>
			<div class="founded-wrap">
				<?php while( have_rows('founded') ) : the_row();?>
					<div class="founded">
						<?php if( get_sub_field('company_photo') ): ?>
							<div class="company_photo">
								<img src="<?php echo get_sub_field('company_photo'); ?>" />
							</div>
						<?php endif; ?>
						<div class="founded-right">
							<div class="company-descr">
								<?php echo get_sub_field('company_description'); ?>
							</div>
							<?php if( have_rows('founded_description') ):?>
							<table class="founded-description  table-bordered">
							<?php while( have_rows('founded_description') ) : the_row();?>
								<tr>
									<td><?php echo get_sub_field('founded_label');?></td>
									<td><?php echo get_sub_field('founded_labeled_description');?></td>
								</tr>
							<?php endwhile; ?>
							</table>
						<?php endif; ?>
						</div>
						
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
		<?php $disable_cta_section = businessbiz_get_option( 'disable_cta_section' );
		if( true ==$disable_cta_section): ?>
			<section class="abt-cta" id="cta">
				<div class="wrapper">
					<?php get_template_part( 'inc/sections/section', 'cta' ); ?>
				</div>
			</section>
		<?php endif; ?>
		<?php 
		$args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'category_name' => 'service',
			
		);
		$arr_posts = new WP_Query( $args );
  
		if ( $arr_posts->have_posts() ) :
			?>
			<div class="abtu-wrap">
				<div class="abtus-header">
					<h3>Core Services We Provide </h3>
				</div>
				<div class="about-us-service">
					
				<?php
				while ( $arr_posts->have_posts() ) :
					$arr_posts->the_post();
					?>
					<div class="abt-service">
						<div class="abts-sw">
							<?php
							if ( has_post_thumbnail() ) :
								the_post_thumbnail();
							endif;
							?>
							</div>
							<div class="abts-ew">
								<header class="abts-eh">
									<a href="<?php the_permalink(); ?>"><h1 class="abts-et"><?php the_title(); ?></h1></a>
								</header>
								<div class="abts-ec">
									<p><?php the_field('service_featured_description'); ?></p>
									<div class="abts-rm"><a href="<?php the_permalink(); ?>">Read More</a></div>
								</div>
							</div>
						
					</div>
					<?php
				endwhile;?>
				</div>
			</div>
		<?php endif; 
		wp_reset_postdata();
		?>
		<?php if( have_rows('member_section') ):?>
			<div class="member-wrap">
				<div class="member-header">
					<h3><?php echo the_field('member_section_title'); ?></h3>
					<h6><?php echo the_field('member_section_description'); ?></h6>
				</div>
				<div class="row">
					<?php while( have_rows('member_section') ) : the_row();?>
						<div class="members col-sm-4">
							<div class="single-membs">
								<?php if( get_sub_field('single_member_photo') ): ?>
									<div class="memb-photo">
										<img src="<?php echo get_sub_field('single_member_photo'); ?>" />
									</div>
								<?php endif; ?>
								<?php if( get_sub_field('single_member_name') ):?>
									<div class="memb-desc">
										<h4><?php echo get_sub_field('single_member_name'); ?></h4>
										<p><?php echo get_sub_field('single_members_position'); ?></p>
									</div>
								<?php endif; ?>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
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
