<?php
/**
 * Template part for displaying Blog Section
 *
 *@package Businessbiz
 */
?>
<?php
$service_post_title = businessbiz_get_option('service_title');
$service_category = businessbiz_get_option('service_category');

?>
<div class="service-section">
    <?php if (!empty($service_post_title)): ?>
      <div class="ssh section-header">
        <h2 class="section-title"><?php echo esc_html($service_post_title); ?></h2>
      </div><!-- .section-header -->
    <?php endif;?>

  <div class="ssc section-content col-3">
    <?php
        $args = array(
            //'posts_per_page' => 3,
            'post_type' => 'post',
            'post_status' => 'publish',
            'paged' => 1,
        );
        if (absint($service_category) > 0) {
            $args['cat'] = absint($service_category);
        }

        $loop = new WP_Query($args);
        if ($loop->have_posts()):
            $i = -1;
            while ($loop->have_posts()): $loop->the_post();
            $i++;
	  		$url = str_replace(' ', '_', get_the_title());?>
		        <article>
                    <div class="service-article">
                        <a href="/uk-cargo/booking/?url=<?php echo $url; ?>">
                            <?php if (has_post_thumbnail()): ?>
                                <div class="sfi featured-image">
                                    <img src="<?php the_post_thumbnail_url('large');?>"/>
                                </div>
                            <?php endif;?>
                            <div class="sscnt service-content">
                                <header class="entry-header">
                                    <h2 class="entry-title"><?php the_title();?></h2>
                                </header>

                                <div class="entry-content">
                                    <?php 
                                        the_field('service_featured_description');
                                        //$excerpt = businessbiz_the_excerpt(20);
                                        //echo wp_kses_post(wpautop($excerpt));
                                    ?>
                                </div>
                                
                            </div>
                        </a>
                    </div>
	            </article>
	        <?php endwhile;?>
        <?php wp_reset_postdata();?>
        <?php endif;
        ?>
  </div>
</div>