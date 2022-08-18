<?php 
$business_ags = array( 
    'post_type' => 'individual',
    //'posts_per_page' => 6,
    'order'   => 'DSC',
     );
$business_query = new WP_Query( $business_ags ); 
?>
<?php if ( $business_query->have_posts() ) : ?>
    <div class="work-header">
        <h3>事業者・中小企業の方</h3>
    </div>
    <div class="work-wrap individual">
        
        <?php while ( $business_query->have_posts() ) : $business_query->the_post(); ?>
            <div class="work-post">
                <button class="wmodal-content" data-target="post-<?php the_ID(); ?>">
                    <div class="model-wrap">
                        <div class="work-fcontent">
							<h6><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h6>
                        </div>
                    </div>
                </button>
                <div class="work-apcontent post-<?php the_ID(); ?>">
                    <div class="modal-dialog" role="document">
                            <div class="modal-body">
                                <div class="work-modal-wrap">
                                    <div class="work-model-contel"> 
                                    	<h6><?php the_field('sub_title'); ?></h6>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
