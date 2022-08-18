
<div class="menu_slider">
   <div class="with-lr-stick menu_slider_section">
        <h2>
            <?php if(get_theme_mod('menu_slider_title')!="") :?>
                <?php echo get_theme_mod('menu_slider_title'); ?>
            <?php endif; ?>
        </h2>
        <p>
            <?php if(get_theme_mod('menu_slider_sub_title')!="") :?>
                <?php echo get_theme_mod('menu_slider_sub_title'); ?>
            <?php endif; ?>
        </p>
        
    </div>
    <div class="menu_slider_des">
        <p>
            <?php if(get_theme_mod('menu_slider_description')!="") :?>
               <?php echo get_theme_mod('menu_slider_description'); ?>
            <?php endif; ?>
        </p>
    </div>
    <div  id="menu_slider" class="menu-slider">
     <?php 
        if( get_theme_mod('menu_category_setting')!="") :
          $catID = get_theme_mod('menu_category_setting');
          $post_limit = get_theme_mod('menu_post_limit_setting');
          $order = get_theme_mod('menu_order_setting');
          if($catID):
            $query=new WP_Query(array(
              'post_type' => 'hair_salon',
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
                <div class="menu-slider-content">
                    <?php if (has_post_thumbnail()) {?>
                        <div class="about-humb"><a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a></div>
                    <?php }?>
                    <h3 class="post-title">
                        <a href="<?php echo get_permalink(); ?>"><?php the_title();?></a>
                    </h3>
                    <p class="post-category"><a href="<?php echo $category_link; ?>"><?php echo get_cat_name($catID); ?></a></p>
                    <p class="post-description"><?php echo esc_html(wp_trim_words(get_the_content(), 10, '...')); ?></p>
                    <p class="post-read">
                        <a href="<?php echo get_permalink(); ?>"><?php if(get_theme_mod('menu_slider_button_text')!="") :?><?php echo get_theme_mod('menu_slider_button_text'); ?><?php else: ?>メニュー詳細へ<?php endif; ?><span class="read-arrow"></span></a>
                    </p>
                </div>
               <?php endwhile; ?>
            <?php endif; endif;?>
        <?php else: ?>
          <?php
           $post_limit = get_theme_mod('menu_post_limit_setting');
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
                    <div class="menu-slider-content">
                        <?php if (has_post_thumbnail()) {?>
                            <div class="about-humb"><a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a></div>
                        <?php }?>
                        <h3 class="post-title">
                            <a href="<?php echo get_permalink(); ?>"><?php the_title();?></a>
                        </h3>
                        <p class="post-category"><a href="<?php echo $category_link; ?>"><?php echo get_cat_name($catID); ?></a></p>
                        <p class="post-price"><?php the_field('price'); ?></p>
                        <p class="post-description"><?php echo esc_html(wp_trim_words(get_the_content(), 10, '...')); ?></p>
                        <p class="post-read">
                            <a href="<?php echo get_permalink(); ?>"><?php if(get_theme_mod('menu_slider_button_text')!="") :?><?php echo get_theme_mod('menu_slider_button_text'); ?><?php endif; ?></a>
                        </p>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="all-view button-group"><a href="#"><?php if(get_theme_mod('menu_slider_all_button_text')!="") :?><?php echo get_theme_mod('menu_slider_all_button_text'); ?><?php endif; ?></a></div>
</div>
