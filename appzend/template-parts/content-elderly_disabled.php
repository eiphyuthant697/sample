<?php 
$elder_args = array( 
  'post_type' => 'question_and_answer',
  'orderBy' => 'date',
  'order'   => 'DSC',
   );
$elder_query = new WP_Query( $elder_args ); 
$elder_count = 0;
?>

<?php if ( $elder_query->have_posts() ) : ?>
    <?php while ( $elder_query->have_posts() ) : $elder_query->the_post(); ?>
        <div class="elder-inner">
          
            <div class="elder-content">
				<div class="newspl-top">
					<?php $elder_count +=1; ?>
                	<h3><?php echo $elder_count; ?>. <?php echo get_the_title(); ?></h3>
				</div>
                <p><?php echo get_the_content();?></p>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>