<?php 
$args = array( 
  'post_type' => 'sliders',
  'posts_per_page' => 3,
  'order'   => 'ASC',
   );
$the_query = new WP_Query( $args ); 
$fact_count = 1;
?>
<?php if ( $the_query->have_posts() ) : ?>
    <div class="banner-main-slide">
        <div class="abt-slider">
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="slide-item" id="post-<?php the_ID(); ?>">
                    <div class="slide-image">
                        <?php if ( has_post_thumbnail() ) {  the_post_thumbnail('feature'); } ?>
                    </div>
                    <div class="slide-content">
                        <h2 class="sl-header"><?php echo get_the_title();?></h2>
                        <div class="sl-content"><?php echo get_the_content();?></div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        
    </div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

