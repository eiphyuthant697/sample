<?php 
$args = array( 
    'post_type' => 'post',
    'posts_per_page' => 3,
    'order'   => 'DSC',
     );
$the_query = new WP_Query( $args ); 
?>
<?php if ( $the_query->have_posts() ) : ?>
<div class="news-wrap">
    <table class="news-inner">
        <tr><td></td><td></td></tr>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <tr>
                  <td><p class="news-date"><?php echo get_the_date( 'Y . m . d' ); ?></p> </td>
                  <td><p class="news-h"><a href="<?php the_permalink(); ?>"><?php echo get_the_title();//wp_trim_words( get_the_title(), 13, '...' ) ?></a></p></td>
                </tr> 
        <?php endwhile; ?>
        <tr><td></td><td></td></tr>
    </table>
    
</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
