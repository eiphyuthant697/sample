<?php 
$news_args = array( 
  'post_type' => 'feature',
  'orderBy' => 'date',
  'order'   => 'DSC',
   );
$news_query = new WP_Query( $news_args ); 

?>

<?php if ( $news_query->have_posts() ) : ?>
<div class="q-a-whole">
	
    <?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
        <div class="q-a-inner">
          
            <div class="q-a-content">
                <h3><?php echo get_the_title(); ?></h3>
                <p><?php echo wp_trim_words( get_the_content(), 5, '...' );?></p>
				<p class="contact">
					<a href="<?php the_permalink(); ?>" class="rdm">Read More</a>
				</p>
            </div>
        </div>
    <?php endwhile; ?>
</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

