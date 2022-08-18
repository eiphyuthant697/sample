<?php get_header(); ?>    
<div class="blog-content">        
	<?php if( has_post_thumbnail() ): ?>            
	<?php the_post_thumbnail('post-thumbnail', ['class' => '']); ?>        
	<?php endif; ?>       
	<?php get_template_part('inc/content', 'page'); ?>    
</div>    
<?php get_footer(); ?>