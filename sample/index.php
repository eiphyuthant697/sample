<?php get_header(); ?>

<section class="blog-wrap-layout19">  
	<div class="blog-content">     
		<div class="pure-g gutters-50">        
			<div class="pure-u-1 pure-u-lg-3-5">           
				<div class="default-blog-post row">              
					<?php if( have_posts() ): ?>                  
					<?php $i = 1;                   
					while( have_posts() ) : the_post();                   
					$catID =  the_category_ID($echo=false);                  
					$category_id = $catID;                
					$category_link = get_category_link( $category_id );                  
					?>                     
					<div class="blog-box-layout4 col-md-3">                     
						<div class="cat-inner">                       
							<div class="item-img custom_cat">                          
								<?php                              
								if ( has_post_thumbnail() ) {                                 
									$image_cat = get_the_post_thumbnail_url();                              
								}                              
								else {                                 
									$image_cat = get_stylesheet_directory_uri().'/assets/img/noimage.png'; 
									
								}                          ?>                          
								<a href="<?php the_permalink(); ?>"><img src="<?php echo $image_cat; ?>" alt="blog"></a>                       								</div>                       
							<div class="item-content">                          
								<ul class="entry-meta meta-color-dark">                             
									<li><i class="fas fa-tag"></i><?php echo get_cat_name($catID); ?></li>                          
								</ul>                          
								<h3 class="item-title">
									<a href="<?php the_permalink(); ?>"><?php short_title(get_theme_mod('title_limit', '60')); ?></a>                          						</h3>                          
								<p><?php short_content(get_theme_mod('content_limit', '200')); ?></p>                          
								<div class="action-area">                             
									<a href="<?php the_permalink(); ?>" class="item-btn">
										<?php echo get_theme_mod('blog_button_text', 'つづきを読む'); ?><i class="fas fa-arrow-right"></i>
									</a>                          </div>                       </div>                           </div>                    							</div>                  
					<?php endwhile; ?>              
					<?php else: ?>                  
					<p>No posts found.</p>              
					<?php endif; ?>
              <div class="pagination-layout1">
                  <?php
                    $big = 999999999; 
                    $paginate_links    = paginate_links(array(
                        'base'         => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format'       => '?page=%#%',
                        'prev_text'    => __('«'),
                        'next_text'    => __('»'),
                    ));
                  ?>
                  <?php if ( $paginate_links ): ?>
                    <div class="pagin">
                      <?php echo $paginate_links;  ?>
                    </div>
                  <?php endif; ?>
              </div>
           </div>
        </div>

     </div>
  </div>
</section>

<?php get_footer(); ?>