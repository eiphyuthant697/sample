<?php 
$feature_args = array( 
    'post_type' => 'feature_content',
    'order'   => 'DSC',
     );
$feature_query = new WP_Query( $feature_args ); 
$post_count= 0;
?>
<?php if ( $feature_query->have_posts() ) : ?>
    <div class="feature-wrap">
        <?php while ( $feature_query->have_posts() ) : $feature_query->the_post(); ?>
                <div class="feature-inner">
                    <div class="feature-left">
                        <p class="fpost-count">
                            <?php 
                                $post_count += 1;
                                echo $post_count; 
                            ?>
                        </p>
                    </div>
                    <div class="feature-right">
                        <h3><?php echo get_the_title(); ?></h3>
                        <div class="feature-entry">
                            <p><?php echo get_the_content(); ?></p>
                        </div>
                    </div>
                </div>
        <?php endwhile; ?>
		<div class="rdm">
			<a href="/higashi/office-introduction/" class="contact">About Office</a>
		</div>
    </div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
