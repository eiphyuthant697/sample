<div class="blog-whole">
	<div class="row main-container">
		<div class="container">
	    <div class="row blog-description">
	    	<?php if( have_rows('blog') ):?>
	    		<?php while( have_rows('blog') ) : the_row();?>
	    			<div class="ht">
			        <h3 class="htitle"><?php the_sub_field('blog_title'); ?></h3><span></span>            
			    	</div>
	    			<div><?php the_sub_field('blog_description'); ?></div>
	    		<?php endwhile; ?>
	    	<?php endif; ?>
	    </div>
	    <!-- start blog -->
	    <div class="row blog-section">
	    	<?php 
				$args = array( 
				  'post_type' => 'news',
				  // 'posts_per_page' => 4,
				  'order'   => 'DSC',
				   );
				$the_query = new WP_Query( $args ); 
				?>
				<?php if ( $the_query->have_posts() ) : ?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		    <div class="blog-list">
		    	<div class="column blog-img">
		    		<?php if( have_rows('banner_section') ):?>
            <?php while( have_rows('banner_section') ) : the_row();?>
		    		<img class="thumbnail" src="<?php the_sub_field('banner_image');?>">
		    		<?php endwhile; ?>
            <?php endif; ?>
		    		<div class="date">20. 5. 2022</div>
		    	</div>
		    	<div class="column content">
		    		
		    		<h3><?php the_title(); ?></h3>
		    		<p><?php short_content(get_theme_mod('content_limit', '200')); ?></p>
		    		<a href="<?php the_permalink(); ?>" class="view-more">view more
		    		<img src="/ni/wp-content/uploads/2022/06/view-more.svg" alt="">
		    		<img src="/ni/wp-content/uploads/2022/07/view-more-white.svg" alt="" class ="view-more-white"></a>
		    	</div>
		    </div>
		    <?php endwhile; ?>
		    <?php endif; ?>
		  </div>
		</div>		
	</div>
</div>
<?php extra_footer_content(); ?>
<?php get_footer(); ?>