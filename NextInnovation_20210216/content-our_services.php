<div class="service-title-whole">
	<?php if( have_rows('heading_style_1') ):?>
		<div class="service1-wrap">
			<?php while( have_rows('heading_style_1') ) : the_row();?>
				<div class="service1-title">
					<h3><?php the_sub_field('service_main_title'); ?></h3>
				</div>
				<?php if( have_rows('service_page_content') ):?>
					<ul class="service1-content-wrap">
						<?php while( have_rows('service_page_content') ) : the_row();?>
							<li class="service1-content">
								<h3 class="htitle"><?php the_sub_field('service_page_content_title'); ?></h3>
								<?php if(get_sub_field('service_page_content_content')): ?><p class="wsdesc"><?php the_sub_field('service_page_content_content');?></p><?php endif; ?>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>
	<?php get_template_part('frontpage-templates/hservice');   ?>
	<?php if( have_rows('heading_style_2') ):?>
		<div class="service2-wrap">
			<?php while( have_rows('heading_style_2') ) : the_row();?>
				<div class="service2-title">
					<h3><?php the_sub_field('service2_main_title'); ?></h3>
				</div>
				<?php if( have_rows('service2_page_contents') ):?>
					<div class="service2-content-wrap">
						<?php while( have_rows('service2_page_contents') ) : the_row();?>
							<div class="service2-content">
								<?php if(get_sub_field('service2_page_content_content')): ?><p class="s2desc"><?php the_sub_field('service2_page_content_content');?></p><?php endif; ?>
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>
</div> 