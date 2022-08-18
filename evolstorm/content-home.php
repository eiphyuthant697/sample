<?php if( have_rows('slider') ): ?>
	<section class="section_mainvisual" id="page_mainvisual">
		<div class="slide">
			<ul>
				<?php while( have_rows('slider') ): the_row(); 
					if ( wp_is_mobile() ) {
					    $image = get_sub_field('slider_item_for_sp');
					}else{
						$image = get_sub_field('slider_item');
					}
				?>
					<li>
						<a href="<?php echo get_sub_field('slide_link'); ?>"><?php echo wp_get_attachment_image( $image, 'full' ); ?></a>
					</li>
				<?php endwhile; ?>
			</ul>
		</div>
	</section>
<?php endif; ?>
<?php the_field('news'); ?>
<section class="section_philosophy" id="page_philosophy">
	<div class="title">
		<p>
			
	        <?php the_field('philosophy_header'); ?>
	        
		</p>
	</div>
	<div class="catch">
		<div class="inner">
			<div class="headline">

				<p>
					
			        <?php the_field('philosophy_sub_header'); ?>
			        
				</p>
			</div>
			<div class="text">
				<p>
					
			        <?php the_field('philosophy'); ?>
			        
					
				</p>
			</div>
		</div>
	</div>
</section>
<section class="section_business" id="page_business">
	<div class="inner">
		<div class="title">
			<p>
				
	            <?php the_field('business_header'); ?>
	            
			</p>
		</div>
		<?php if( have_rows('business') ) { ?>
			<?php while( have_rows('business') ): the_row(); ?>
				<div class="link">
					<span data-micromodal-trigger="business_modal-digital-marketing-<?php the_ID(); ?>">
						<div class="text">
							<div class="wrap">
							    <?php echo get_sub_field('business_content'); ?>
							</div>
						</div>
						<?php $b_bgimage = get_sub_field('business_img');?>
							
						<div class="pic pic_business-01" style="
		                background-image:   url(<?php echo $b_bgimage['url']; ?>);

		            "></div>
					</span>
					<div id="business_modal-digital-marketing-<?php the_ID(); ?>" class="modal" aria-hidden="true">
						<div class="modal__overlay" tabindex="-1" data-micromodal-close="true">
							<div class="modal__container" role="dialog" aria-modal="true" data-micromodal-close="true">
								<div class="business_modal__box">
									<div class="business_modal__inner">
										<div class="modal_title">
											<?php echo get_sub_field('business_content'); ?>
										</div>
										<?php echo get_sub_field('popup'); ?>
										<img src="/EVOLStorm/wp-content/uploads/2021/10/ico_modal_close.svg" alt="" class="news_modal__close" data-micromodal-close="true">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		<?php } ?>

	</div>
</section>
<section class="section_company" id="page_company">
	<div class="inner">
		<div class="background">
			<div class="title">
				<p><?php the_field('info_header'); ?></p>
			</div>
			<div class="company_name">
				<p><?php the_field('info_sub_header'); ?></p>
			</div>
			<div class="address">
				<p><?php the_field('address'); ?></p>
			</div>
			<div class="tel">
				<p><?php the_field('telephone'); ?></p>
			</div>
			<div class="information">
				<?php if( have_rows('company_info') ): ?>
					<ul>
						<?php while( have_rows('company_info') ): the_row(); ?>
							<li>
								<div class="name">
									<p><?php echo get_sub_field('info_label'); ?></p>
								</div>
								<div class="text">
									<p><?php echo get_sub_field('info_text'); ?></p>
								</div>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
			<div class="business">
				<div class="name">
					<p>事業内容</p>
				</div>
				<div class="text">
					<p>
						<?php if( have_rows('business_content_field') ): ?>
							<?php while( have_rows('business_content_field') ): the_row(); ?>
								<?php echo get_sub_field('business_content_info'); ?><br>
							<?php endwhile; ?>
						<?php endif; ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section_contact" id="page_contact">
		<div class="inner">
			<div class="title">
				<p>
					
					<?php the_field('contact_header'); ?>
					
				</p>
			</div>
			<div class="form">
				<?php the_field('contact'); ?>
			</div>
		</div>
	</section>

