<?php 
$args = array( 
  'post_type' => 'news',
  // 'posts_per_page' => 4,
  'order'   => 'DSC',
   );
$the_query = new WP_Query( $args ); 
?>
<?php if ( $the_query->have_posts() ) : ?>
    <div class="slider_container">
        <div class="news-wrap items">
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="new-item">  
              <?php if( have_rows('banner_section') ):?>
                  <?php while( have_rows('banner_section') ) : the_row();?>
                    <div class="news-image">
                        <img src="<?php the_sub_field('banner_image');?>">
                    </div>
                     <div class="news-content">
                        <a href="<?php echo get_permalink(); ?>">
                            <h3><?php the_title(); ?> see more</h3>
                        </a>
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

