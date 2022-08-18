<div class="newspl-loat-news">
<?php 
$postsPerPage = 7;
$news_args = array( 
  'post_type' => 'news',
  'posts_per_page' => $postsPerPage,
  'orderBy' => 'date',
  'order'   => 'DSC',
   );
$news_query = new WP_Query( $news_args ); 

?>

<?php if ( $news_query->have_posts() ) : ?>
  <div class="newspl-wrap">
      <?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>        
            <div class="newspl-content">
                <div class="newspl-top">
                    <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                    <p><span class="newspl-entry-date dd"><?php echo get_the_date( 'Y m j' ); ?></span></p>
                </div>
                <div class="newspl-entry">
                    <p><?php echo wp_trim_words( get_the_content(), 1, '...' );?></p>
                </div>
           </div>
       <?php endwhile; ?>
    </div>
<?php endif; ?>
	<div class="newspl-rg"><a  href="/#">Read More</a></div>
<?php wp_reset_postdata(); ?>

</div>