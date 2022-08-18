<div class="loat-news">
<?php 
$postsPerPage = 4;
$args = array( 
  'post_type' => 'our_news',
  'posts_per_page' => $postsPerPage,
  'orderBy' => 'date',
  'order'   => 'DSC',
   );
$the_query = new WP_Query( $args ); 

?>

<?php if ( $the_query->have_posts() ) : ?>
  <div id="ajax-posts" class="news-wrap info">
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <div class="news-inner <?php

            $categories = get_the_category();
            if ( ! empty( $categories ) ) {
                echo $categories[0]->slug;
            }

            ?>">
          
          <div class="news-content">
            <span class="entry-date"><?php echo get_the_date( 'j M Y' ); ?></span>
            <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
            <div class="news-entry">
              <?php the_field('description'); ?>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
  </div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
 <div class="content rg"><a id="more_posts">Load More</a></div>
</div>