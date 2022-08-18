<?php 
   if( !get_theme_mod( 'hide_blog_2_area_setting', true)) :
?>

<div id="news">
   <div id="news_section">
   <h1>
         <?php if(get_theme_mod('home_title_block_2')!="") :?>
            <?php echo get_theme_mod('home_title_block_2'); ?>
         <?php else: ?>
            NEWS
         <?php endif; ?>
      </h1>
      <ul class="news-ul">
         <?php 
            if( get_theme_mod('category_setting_blog_2')!="") :
              $catID = get_theme_mod('category_setting_blog_2');
              $post_limit = get_theme_mod('post_limit_blog_2_setting');
              $order = get_theme_mod('category_post_order_2_setting');
              if($catID):
                $query=new WP_Query(array(
                  'post_type' => 'post',
                  'cat' => $catID,
                  'posts_per_page' => $post_limit,
                  'order' => $order,
               ));
               if ($query->have_posts()):
                      while ($query->have_posts()):
                      $query->the_post();
                      // Get the ID of a given category
                      $category_id = $catID;
                      // Get the URL of this category
                      $category_link = get_category_link( $category_id );
               ?>
                  <li>
                    <div class="news-date"><?php echo get_the_date( 'j. m. Y' ); ?></div>
                    
                      
                        <p class="news-category"><a href="<?php echo $category_link; ?>"><?php echo get_cat_name($catID); ?></a></p>
                        <h3 class="news-title"><a href="<?php echo get_permalink(); ?>"><?php short_title(get_theme_mod('title_limit', '60')); ?></a>
                                 </h3>
                      
                    
                      </li>

                  <?php endwhile; ?>
               <?php endif; ?>

              <?php else: ?>
                <li>
                <div class="news-date"><small>2020.10</small> <p>01</p></div>
                <p class="news-category">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
                </li>
              <?php endif; ?>
            <?php else: ?>
              <?php
               $post_limit = get_theme_mod('post_limit_blog_2_setting');
               $query_all=new WP_Query(array(
               'post_type' => 'post',
               'posts_per_page' => $post_limit,
               ));
               // The loop
               if ($query_all->have_posts()):
                   while ($query_all->have_posts()):
                   $query_all->the_post();
                   // Get the ID of a given category
                   $catID =  the_category_ID($echo=false);
                   $category_id = $catID;
                   // Get the URL of this category
                   $category_link = get_category_link( $category_id );
            ?>
                <li>
                    <div class="news-date"><small><?php echo get_the_date( 'Y . m' ); ?></small> <p><?php echo get_the_date( 'j' ); ?></p></div>
                    
                      
                    <p class="news-category"><a href="<?php echo $category_link; ?>"><?php echo get_cat_name($catID); ?></a></p>
                        <h3 class="news-title"><a href="<?php echo get_permalink(); ?>"><?php short_title(get_theme_mod('title_limit', '60')); ?></a>
                                 </h3>
                   
                   </li>
               <?php endwhile; ?>
            <?php endif; ?>
            <?php endif; ?>
                   </ul>
      <!-- category read more -->
      <?php 
           if( get_theme_mod('category_setting_blog_2')!="") :
        ?>
        <?php if($catID): ?>
          <?php if($post_limit > 0): ?>
            <?php 
              $get_cat = wt_get_category_count(get_theme_mod('category_setting_blog_2')); 
            ?>
            <?php if($post_limit < $get_cat): ?>
              <div class="cat_read_more">
                <a href="<?php echo get_category_link( get_theme_mod('category_setting_blog_2') ); ?>">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/read_more.png">
                </a>
              </div>
            <?php endif; ?>
          <?php endif; ?>
        <?php endif; ?>
      <?php endif; ?>
      <!-- category read more -->
   </div>
</div>
<?php endif; ?>