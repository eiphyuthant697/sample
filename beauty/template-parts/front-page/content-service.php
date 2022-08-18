<?php
$service_title = get_theme_mod('service_title', false);
$service_description = get_theme_mod('service_description', false);
?>
<section id="sectiopn-first">
    <div class="container">
        <div class="service-header">
            <h2><?php echo $service_title; ?></h2>
            <p><?php echo $service_description; ?></p>
        </div>
        <div class="page-wrapper">

        <?php     
        $query_args = array(
            'post_type' => 'hair_salon',
            'category__and' => array(14,18),
            'posts_per_page' => 1,
          );

        $posts = new WP_Query( $query_args ); 
            if ( $posts->have_posts() ) : 
                while ( $posts->have_posts() ) : $posts->the_post();  ?>
                    <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                    <div class="column-four column-2" style="background-image: url('<?php echo $backgroundImg[0]; ?>');">
                        <div class="column-four-content">
                            <h5><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
                            <!-- <p><?php echo esc_html(wp_trim_words(get_the_content(), 10, '...')); ?></p>  -->

                        </div>
                        <div class="promo-section">
                            <div class="promo">
                                <div class="middle-border">
                                    <div></div>
                                </div>
                            </div>
                            <span><?php the_field('promotion'); ?></span>
                        </div>
                    </div>
                <?php endwhile;
            endif;
            wp_reset_postdata();?>
        <?php     
        $query_args = array(
            'post_type' => 'hair_salon',
            'category__and' => array(15,18),
            'posts_per_page' => 1,
          );

        $posts = new WP_Query( $query_args ); 
            if ( $posts->have_posts() ) : 
                while ( $posts->have_posts() ) : $posts->the_post();  ?>
                    <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                    <div class="column-four column-3" style="background-image: url('<?php echo $backgroundImg[0]; ?>');">
                        <div class="column-four-content">
                            <h5><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
                            <!-- <p><?php echo esc_html(wp_trim_words(get_the_content(), 10, '...')); ?></p>  -->

                        </div>
                        <div class="promo-section">
                            <div class="promo">
                                <div class="middle-border">
                                    <div></div>
                                </div>
                            </div>
                            <span><?php the_field('promotion'); ?></span>
                        </div>
                    </div>
                <?php endwhile;
            endif;
            wp_reset_postdata();?>
        <?php     
        $query_args = array(
            'post_type' => 'hair_salon',
            'category__and' => array(17,18),
            'posts_per_page' => 1,
          );

        $posts = new WP_Query( $query_args ); 
            if ( $posts->have_posts() ) : 
                while ( $posts->have_posts() ) : $posts->the_post();  ?>
                    <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                    <div class="column-four column-4" style="background-image: url('<?php echo $backgroundImg[0]; ?>');">
                        <div class="column-four-content">
                            <h5><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
                            <!-- <p><?php echo esc_html(wp_trim_words(get_the_content(), 10, '...')); ?></p>  -->

                        </div>
                        <div class="promo-section">
                            <div class="promo">
                                <div class="middle-border">
                                    <div></div>
                                </div>
                            </div>
                            <span><?php the_field('promotion'); ?></span>
                        </div>
                    </div>
                <?php endwhile;
            endif;
            wp_reset_postdata();?>
        <?php     
        $query_args = array(
            'post_type' => 'hair_salon',
            'category__and' => array(16,18),
            'posts_per_page' => 1,
          );

        $posts = new WP_Query( $query_args ); 
            if ( $posts->have_posts() ) : 
                while ( $posts->have_posts() ) : $posts->the_post();  ?>
                    <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                    <div class="column-four column-1" style="background-image: url('<?php echo $backgroundImg[0]; ?>');">
                        <div class="column-four-content">
                            <h5><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
                            <!-- <p><?php echo esc_html(wp_trim_words(get_the_content(), 10, '...')); ?></p>  -->

                        </div>
                        <div class="promo-section">
                            <div class="promo">
                                <div class="middle-border">
                                    <div></div>
                                </div>
                            </div>
                            <span><?php the_field('promotion'); ?></span>
                        </div>
                    </div>
                <?php endwhile;
            endif;
            wp_reset_postdata();?>
        <div class="clear"></div>
    </div><!-- .page-wrapper-->
</section><!-- .sectiopn-first-->

