<?php if( have_rows('banner_section') ):?>
	<div class="banner-whole" id="banner-whole">
		<?php while( have_rows('banner_section') ) : the_row();?>
			<div class="banner-content">
				<div class="bcontent-left float-left">
					<div class="bleft">
						<?php if(get_sub_field('big_title')): ?><h3><?php the_sub_field('big_title');?></h3><?php endif; ?>
						<h2 class="item-title"> <?php the_title(); ?></h2>
						<?php 
						if (!is_single()) {
						?>
						<?php if(get_sub_field('short_description')): ?><p><?php the_sub_field('short_description');?></p>
						<?php endif; ?>
						<?php } ?>
						
					</div>
				</div>
				<div class="bcontent-right float-right">
					<div class="bright transbox">
						<!-- <div class="img_container"> -->
						<?php 							
								if( get_sub_field('banner_image') ) {	?>
									<img src="<?php the_sub_field('banner_image');?>">					
								<?php } else{?>							
									<img src="/ni/wp-content/uploads/2022/06/service.png">						
							<?php
							}						?>	
						<!-- <div> -->
					</div>
				</div>
			</div>
			<div class="banner-content-extra">
				<div class="bcontent-left float-left">
					<div class="bleft">
						<?php if(get_sub_field('banner_footer_content')): ?><p class="banner-footer"><?php the_sub_field('banner_footer_content');?></p><?php endif; ?>
					</div>
				</div>
				<div class="bcontent-right float-right">
					<div class="bright">
						<?php if(get_sub_field('banner_image_title')): ?><p class="image-content"><?php the_sub_field('banner_image_title');?></p><?php endif; ?>
						<div class="arrow-down">
						<a href="#footer"><img src="/ni/wp-content/uploads/2022/06/down-arrow.png"></a>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
<?php endif; ?>

