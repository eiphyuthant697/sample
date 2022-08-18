<?php
  global $archi_option;
  $link_audio = get_post_meta(get_the_ID(),'_cmb_link_audio', true);
  $link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true);
  $subtitle = get_post_meta(get_the_ID(),'_cmb_page_subtitle', true);
get_header(); ?>

<!-- CONTENT BLOG -->
<div id="content">
  <div class="container">
      <div class="row">
          <div class="information-detail">
          <div class="col-md-12">
            <?php if ( have_posts() ) : ?>
              <?php while (have_posts()) : the_post(); ?>

                <ul class="blog-list">
                  <li class="single">                  
                    <div class="post-content">

                        <!--<div class="date-box">-->
                        <!--    <div class="day"><?php the_time('d'); ?></div>-->
                        <!--    <div class="month"><?php the_time('M'); ?></div>-->
                        <!--</div>-->
                        
                        <div class="page-content entry-content">
                          <p class="backlink"> < Back to <a href="<?php echo get_page_link( get_page_by_path( 'infomation' ) ); ?>">INFORMATION</a></p>
                          <h3 class="single-title"><?php the_title(); ?></h3>
                        </div>
                    </div>
                    
                    <div class="post-social">

                   <?php $post_date = get_the_date( 'j M Y' );?>
                    <span class="showdate"><?php echo $post_date; ?></span>
                      <div class="clearfix"></div>
                    </div>
                </li>
              </ul>
              <div class="post-controls clearfix">
                 <?php the_content(); ?>
                 
              </div>
              
              <?php if ( comments_open() || get_comments_number() ) : ?>
                <div class='comments-box'><h4><?php comments_number( esc_html__('0 comments', 'archi'), esc_html__('1 comments', 'archi'), esc_html__('% comments', 'archi') ); ?><h4></div>
                <?php comments_template(); ?>
              <?php  endif; ?> 

              <?php endwhile;?>

            <?php else : ?>
              <p><?php esc_html_e('Sorry, no posts matched your criteria.', 'archi'); ?></p>
            <?php endif; ?>
          </div>

          <?php if(isset($archi_option['blog-layout']) and $archi_option['blog-layout'] == 3 ){ ?>
            <div class="<?php echo 'col-md-'.esc_attr($archi_option['blog_col_right']); ?>">
              <?php get_sidebar();?>
            </div>
          <?php } ?>

        </div>
    </div>
</div>
</div>
<!-- END CONTENT BLOG -->
<?php get_footer(); ?>	





  