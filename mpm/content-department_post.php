<?php 
$args = array( 
  'post_type' => 'department_post',
  // 'posts_per_page' => 6,
  'order'   => 'ASC',
   );
$the_query = new WP_Query( $args ); 
$link = '/mpm_naika/service/'; 
?>
<?php if ( $the_query->have_posts() ) : ?>
  <div class="dep-wrap">
  <h3 class="widget-title">診療案内</h3>
    <div class="dep-inner">
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    
      <div class="dep_post" id="post-<?php the_ID(); ?>">
			
		  <div class="dep_btm"><div class="dep_content dep_top"><h4><a href="/mpm_naika<?php if( get_field('department_link') ){ the_field('department_link'); } else { echo '/mpm_naika/service/'; } ?>#dep-<?php the_ID(); ?>"><?php echo get_the_title(); ?></a></h4></div><h4 class="no"><?php echo '#0';?></h4></div> 
      </div>
<?php endwhile; ?>
    </div>
  </div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
<!-- <?php //if( get_field('estimate_time') ) { ?>
  <div class="est-time">
    <h3>所要時間</h3>
    <p><?php //the_field('estimate_time'); ?></p>
  </div>
  <?php //} ?> -->