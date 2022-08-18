
<div class="blog-section">
    <div class="container">
    <div class="with-lr-stick blog-header">
            <h2>
                <?php if(get_theme_mod('blog_title')!="") :?>
                    <?php echo get_theme_mod('blog_title'); ?>
                <?php endif; ?>
            </h2>
            <p>
                <?php if(get_theme_mod('blog_sub_title')!="") :?>
                    <?php echo get_theme_mod('blog_sub_title'); ?>
                <?php endif; ?>
            </p>
        
        </div>
        <div class="our-blogs-wrap">
         <?php 
            if( get_theme_mod('blog_category_setting')!="") :
              $catID = get_theme_mod('blog_category_setting');
              $post_limit = get_theme_mod('blog_limit_setting');
              $order = get_theme_mod('blog_order_setting');
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
                      $category_link = get_category_link( $category_id );?>
                    <div class="blog-content">
                        <?php if (has_post_thumbnail()) {?>
                            <div class="blog-thumb"><a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a></div>
                        <?php }?>
                        <div class="blog-content-wrap">
                            <div class="blog-inner">
                                <h3 class="blog-title">
                                    <a href="<?php echo get_permalink(); ?>"><?php the_title();?></a>
                                </h3>
                                <p class="blog-description"><?php echo esc_html(wp_trim_words(get_the_content(), 16, '...')); ?></p>
                                 
                                <p class="blog-read">
                                <span itemprop="datePublished"> <?php echo get_the_date("d/m/Y"); ?> </span><span class="blog-right"><a href="<?php echo get_permalink(); ?>"><?php if(get_theme_mod('blog_button_text')!="") :?><?php echo get_theme_mod('blog_button_text'); ?><?php endif; ?></a></span>
                                </p>
                            </div>
                            
                        </div>
                    
                    </div>
                   <?php endwhile; ?>
                <?php endif; endif;?>
            <?php else: ?>
              <?php
               $post_limit = get_theme_mod('blog_limit_setting');
               $query_all=new WP_Query(array(
               'post_type' => 'hair_salon',
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
                   $category_link = get_category_link( $category_id );?>
                        <div class="blog-content">
                            <?php if (has_post_thumbnail()) {?>
                                <div class="blog-thumb"><a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a></div>
                            <?php }?>
                            <div class="blog-content-wrap">
                                <div class="blog-inner">
                                    <h3 class="blog-title">
                                        <a href="<?php echo get_permalink(); ?>"><?php the_title();?></a>
                                    </h3>
                                    <p class="blog-description"><?php echo esc_html(wp_trim_words(get_the_content(), 10, '...')); ?></p>
                                    <p itemprop="datePublished"> <?php echo get_the_date("d/m/Y"); ?> </p> 
                                    <p class="blog-read">
                                        <a href="<?php echo get_permalink(); ?>"><?php if(get_theme_mod('blog_button_text')!="") :?><?php echo get_theme_mod('blog_button_text'); ?><?php endif; ?></a>
                                    </p>
                                </div>
                            
                            </div>
                    
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="all-view button-group"><a href="#"><?php if(get_theme_mod('blog_view_more')!="") :?><?php echo get_theme_mod('blog_view_more'); ?><?php endif; ?></a></div>
    </div>
</div>
