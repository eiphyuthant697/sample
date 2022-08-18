<?php 
$business_ags = array( 
    'post_type' => 'office_information',
    //'posts_per_page' => 6,
    'order'   => 'DSC',
     );
$business_query = new WP_Query( $business_ags ); 
?>
<?php if ( $business_query->have_posts() ) : ?>
<div class="custom-post-whole">
	
    <div class="custom-post-header">
        <h3>Office Information </h3>
    </div>
    <div class="office-wrap">
        
        <?php while ( $business_query->have_posts() ) : $business_query->the_post(); ?>
            <div class="office-post">
                <div class="office-post-apcontent">
                        <h3><?php echo get_the_title(); ?></h3>
                        <div class="pffice-post-content"><?php echo get_the_content(); ?></div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

