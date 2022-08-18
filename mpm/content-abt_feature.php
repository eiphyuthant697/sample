<?php 
$args = array( 
  'post_type' => 'feature',
  // 'posts_per_page' => 6,
  'order'   => 'ASC',
   );
$the_query = new WP_Query( $args ); 
$fact_count = 1;
?>
<?php if ( $the_query->have_posts() ) : ?>
    <div class="abt-slide">
		<div class="abt-main-slide">
			
		<div class="caro-nav caro-left"><button class="carousel-nav carousel-prev"><img src="/mpm_naika/wp-content/uploads/2021/06/slick-left.png"></button></div>
      <div class="abt-slider">
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="slide-item" id="post-<?php the_ID(); ?>">
                <div class="slide-image">
                    <?php if ( has_post_thumbnail() ) {  the_post_thumbnail('feature'); } 
                        else{?>
                            <div class="no-photo"></div>
                    <?php
                        }
                    ?>
                </div>
                <div class="slide-content">
                    <h2><?php echo '0';echo $fact_count++; ?></h2>
                    <h3 class="fact-header"><?php echo get_the_title();?></h3>
                </div>
            </div>
        <?php endwhile; ?>
      </div>
			
      <div class="caro-nav caro-right">
		  <button class="carousel-nav carousel-next"><img src="/mpm_naika/wp-content/uploads/2021/06/slick-right.png"></button>
			</div>
			</div>
        <div class="slider-nav-thumbnails">
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="slick-slide">
                    <?php if ( has_post_thumbnail() ) {  the_post_thumbnail('feature'); } 
                    else{?>
                        <div class="no-photo"></div>
                    <?php
                        }
                    ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

