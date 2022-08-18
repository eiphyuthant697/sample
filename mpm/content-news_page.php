<?php 
$args = array( 
    'post_type' => 'post',
    // 'posts_per_page' => 3,
    'order'   => 'DSC',
     );
$the_query = new WP_Query( $args ); 
?>
<?php if ( $the_query->have_posts() ) : ?>
<div class="news-pg-wrap">
    <ul class="news-pg-inner">
        
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <li>
                    <div class="news-pg-single">
                        <?php if ( has_post_thumbnail() ) {  the_post_thumbnail('feature'); } 
                        else{?>
                            <div class="post-img" style="min-height: 250px; background: rgba(184, 152,0,10%);"></div>
                        <?php
                            }
                        ?>
                        <p class="news-pg-date"><?php echo get_the_date( 'Y . m . d' ); ?></p>
                        <p class="news-pg-h"><a href="<?php the_permalink(); ?>"><?php echo get_the_title();//wp_trim_words( get_the_title(), 13, '...' ) ?></a></p>
                    </div>
                </li> 
        <?php endwhile; ?>
        
    </ul>
</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
