<?php 
   if( !get_theme_mod( 'hide_article_area_setting', true)) :
?>

<div id="news">
  <div id="news_section" class="con_width pad_width">
    <div class="heading">
      <h2><?php echo get_theme_mod('article_title_setting'); ?></h2>
    </div>
    
    <ul class="news-ul">
      <?php 
        if( get_theme_mod('article_category_setting')!="") :
          $catID = get_theme_mod('article_category_setting');
              //echo $catID;
          $order = get_theme_mod('article_order_setting');
          $query=new WP_Query(array(
            'post_type' => 'post',
            'cat' => $catID,
            'posts_per_page' => 3,
            'order' => $order,
          ));
          if ($query->have_posts()):
            while ($query->have_posts()):
              $query->the_post();
              // Get the ID of a given category
              $category_id = $catID;
              // Get the URL of this category
              ?>
              <li>
                <?php if ( has_post_thumbnail() ) {  the_post_thumbnail('feature'); } ?>
                <div class="news-contents">
                  <h3 class="news-title"><?php the_title(); ?></h3>
                  <div class="news-rm"><a href="<?php echo get_permalink(); ?>">Continue </a></div>
                </div>
              </li>

            <?php endwhile; ?>
          <?php endif; ?>
        <?php else: ?>
          <?php
          $query_all=new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 3,
          ));
          // The loop
          if ($query_all->have_posts()):
            while ($query_all->have_posts()):
              $query_all->the_post();
              // Get the ID of a given category
              $catID =  the_category_ID($echo=false);
            ?>
              <li>
                <?php if ( has_post_thumbnail() ) {  the_post_thumbnail('feature'); } ?>
                <div class="news-contents">
                  <h3 class="news-title"><?php short_title('30'); ?></h3>
                  <div class="news-content"><?php short_content('120'); ?></div>
                  <div class="news-rm"><a href="<?php echo get_permalink(); ?>">Continue <i class="las la-long-arrow-alt-right"></i></a></div>
                </div>
              </li>
            <?php endwhile; ?>
          <?php endif; ?>
        <?php endif; ?>
    </ul>

   </div>
</div>
<?php endif; ?>