<?php 
$args = array( 
  'post_type' => 'department_post',
  'order'   => 'ASC',
   );
$the_query = new WP_Query( $args ); 
$pc = 1;
?>
<?php if ( $the_query->have_posts() ) : ?>
<div class="service-sec">
  <div class="dep-wrap  ser-dep">
  <h3 class="widget-title">診療案内</h3>
    <div class="dep-inner">
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    
       <div class="dep_post" id="post-<?php the_ID(); ?>">

		  <div class="dep_btm"><div class="dep_content dep_top"><h4><?php echo get_the_title(); ?></h4></div><h4 class="no"><?php echo '#0';?></h4></div> 
      </div>
    <?php endwhile; ?>
    </div>
  </div>
  <div class="dep-contents">
      <ul class="web-dep">
          
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<li class="dep-li" id="dep-<?php the_ID(); ?>">
					<ul class="dep-content">
						<li>
							<p class="no"><?php echo '#0';?><?php echo $pc;?></p> 
						</li>
						<li class="dep-sli">
							<p class="no web-no"><?php echo '#0';?><?php echo $pc;?></p><h4><?php echo get_the_title(); ?></h4>
						</li>
						<li>
							<p><?php echo get_the_content();?></p>
						</li>
					</ul>
		  </li>
		  <?php $pc++;
             endwhile; ?>
        
    </ul>

  </div>
</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
