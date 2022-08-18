<?php 
$individual_args = array( 
    'post_type' => 'individual', 'business',
    'order'   => 'DSC',
     );
$individual_query = new WP_Query( $individual_args ); 
?>
<?php if ( $individual_query->have_posts() ) : ?>
    <div class="widget">
		
			<h3 class="widget-title">
				Handeling Fields
			</h3>
		
        <?php while ( $individual_query->have_posts() ) : $individual_query->the_post(); ?>
        <div class="service-post">
            <div class="service-image">
                <?php if ( has_post_thumbnail() ) {  the_post_thumbnail('foodica-loop-portrait'); } 
                    else{?>
                        <img src="/higashi/wp-content/uploads/2021/05/header-bimg.png">
                <?php
                    }
                ?>
            </div>
            <div class="service-fcontent">
                <h3><?php echo get_the_title(); ?></h3>
                <p class="service-date"><?php echo get_the_date( ' Y -m - d' ); ?></p>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

