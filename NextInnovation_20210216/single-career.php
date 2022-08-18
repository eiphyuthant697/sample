<?php
get_header(); ?>
<?php
  if ( has_post_thumbnail() ) {
     $image_single = get_the_post_thumbnail_url();
  }
  else {
     $image_single = get_stylesheet_directory_uri().'/asset/img/noimage.png';
  }
?>
<!-- CONTENT BLOG -->
<div class="single-cimg">
  <img src="<?php echo $image_single; ?>">
<!-- 	<?php 
    $image = get_field('featured_image');
    $size = 'full'; 
    if( $image ) {
      echo wp_get_attachment_image( $image, $size );
    }
    else{?>
      <img src="/sample/wp-content/uploads/2021/03/marketing-ft.png" alt="service">
    <?php
      }
    ?> -->
<!--       <img src="<?php echo $image_single; ?>" alt="service"> -->
 </div>
<div id="career-single-content  d-flex">
  <div class="career-cntl">
    <h4><?php the_field('sub_title');?></h4>
  </div>
  <div class="career-cntr">
		
    <div class="container">
      <div class="row">
          <div class="col-md-12">
            <?php if ( have_posts() ) : ?>
              <?php while (have_posts()) : the_post(); ?>
                <div class="post-controls cpc clearfix">
                    <h3><?php the_title();?></h3>
                  <?php the_field('sdescription'); ?>
                    <div class="respon-mkcontent">
                        <?php if( have_rows('responsibility_for_this_post') ):?>
                        <div class="responsibility">
                            <h2>Our Responsibilities</h2>
                            <ul class="responsibilities">
                                <?php while( have_rows('responsibility_for_this_post') ) : the_row();?>
                                    <li>
                                        <div class="respon-right"><i class="fas fa-caret-right"></i></div>
                                        <div class="respon-right">
                                            <h5><?php echo get_sub_field('responsibility');?></h5>
                                            <?php if( get_sub_field('responsibility_description') ){ ?>
                                                <p><?php the_sub_field('responsibility_description'); ?> </p>
                                            <?php } ?>
                                        </div>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                        <?php if( have_rows('must_know_contents') ):?>
                        <div class="requirement">
                            <h2>Requirements</h2>
                            <ul class="requirements">
                                <?php while( have_rows('must_know_contents') ) : the_row();?>
                                    <li><i class="fas fa-check"></i><?php echo get_sub_field('must_know_content');?></li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="clearfix" style="padding-top:30px;"></div>
                    <?php $table = get_field( 'table' );
                      if ( ! empty ( $table ) ) {
                        echo '<div class="table-responsive"><table border="0" class="service-table">';
                        if ( ! empty( $table['caption'] ) ) {
                          echo '<caption>' . $table['caption'] . '</caption>';
                        }
                        if ( ! empty( $table['header'] ) ) {
                          echo '<thead><tr>';
                          foreach ( $table['header'] as $th ) {
                            echo '<th>';
                            echo $th['c'];
                            echo '</th>';
                          }
                          echo '</tr>';
                          echo '</thead>';
                        }
                        echo '<tbody>';
                        foreach ( $table['body'] as $tr ) {
                          echo '<tr>';
                          foreach ( $tr as $td ) {
                            echo '<td>';
                            echo $td['c'];
                            echo '</td>';
                          }
                          echo '</tr>';
                        }
                        echo '</tbody></table></div>';
                      }
                    ?>
                    <?php if( have_rows('service_portfolios') ):?>
                        <div class="portfolios">
                            <h2>Portfolio</h2>
                            <ul class="portfolio">
                                <?php while( have_rows('service_portfolios') ) : the_row();?>
                                    <li><img src="<?php echo get_sub_field('service_portfolio');?>"></li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="service-inner-related">
                      <h2 class="service-inner-main-title">
                        <?php the_field('service_post_title'); ?>
                      </h2>
                      <p class="service-inner-main-content">
                        <?php the_field('related_with_this_post_content'); ?>
                      </p>
                      <?php
                        $featured_posts = get_field('service_post');
                        if( $featured_posts ): ?>
                          <ul class="service-inner-posts">
                            <?php foreach( $featured_posts as $post ): 
                              setup_postdata($post); ?>
                              <li class="service-inner-post">
                                <h2 class="service-inner-title">
                                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <div class="service-inner-content"><?php the_field( 'service_featured_description' ); ?></div>
							
                              </li>
                            <?php endforeach; ?>
                          </ul>
                          <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                    <div class="other-service">
                        <h2 class="other-service-main-title">
                            <?php the_field('other_service_title'); ?>
                        </h2>
                        <div class="other-service-main-content">
                            <?php the_field('other_post_content'); ?>
                        </div>
                    <?php
                      $other_posts = get_field('other_service_post');
                      if( $other_posts ): ?>
                        <ul class="other-service-posts">
                          <?php foreach( $other_posts as $other_post ): 
                            $permalink = get_permalink( $other_post->ID );
                            $title = get_the_title( $other_post->ID );?>
                            <li class="other-service-post">
                              <a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a>
                
                            </li>
                          <?php endforeach; ?>
                        </ul>
                      <?php endif; ?>
                </div>
              <?php endwhile;?>

            <?php else : ?>
              <p><?php esc_html_e('Sorry, no posts matched your criteria.', 'next-innovation'); ?></p>
            <?php endif; ?>
          </div>
      </div>
    </div>
  </div>
</div>
  
<!-- END CONTENT BLOG -->
<?php get_footer(); ?>	