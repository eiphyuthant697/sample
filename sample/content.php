<?php  
if ( has_post_thumbnail() ) {     
    $image_single = get_the_post_thumbnail_url();  
}  
else {     
    $image_single = get_stylesheet_directory_uri().'/assets/img/noimage.png';  
}?>
<div class="single-post-wrapper">
<div class="pure-g">  
    <div class="more-info">      
        <?php if(is_single()): ?>        
            <div   div class="sub-banner single-service">
                <h2 class="item-title"><?php echo Blog; ?></h2>
                <div class="container">
                    <div class="banner-content">
                        <div class="bcontent-left float-left">
                            <h3 class="single-title"><?php the_title();?></h3>
                        </div>
                        <div class="bcontent-crub float-right">
                            <ul class="d-flex">
                                <li><a href="/sample">Top</a></li>
                                <li>/</li>
						 
                                <li><h4><?php wp_title(''); ?></h4></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="entry-media">          
                <img src="<?php echo $image_single; ?>" alt="blog">          
                <div class="blog-entry-meta">
					<div class="container">
						<div class="meta-content">     
							<?php if( !get_theme_mod( 'hide_categories', false ) ) : ?>
								<?php $categories = get_the_category();
									if ( ! empty( $categories ) ) {  
										echo '<div class="post-cat">is categorized in <ul class="cats"> '  ;   
										foreach($categories as $cat){
											echo '<li class="cat"><i class="fas fa-bookmark"></i><a href="'.esc_url( get_category_link($cat->term_id)).'">'.esc_html($cat->name).'</a>, </li>';            
										}  
										echo '</ul></div>';   
									}    
								?>        
							<?php endif; ?>

							<?php if( !get_theme_mod( 'hide_author', true ) ) : ?>           
							<div class="post-author"><?php echo str_repeat('&nbsp;', 2); ?> writen by <?php echo str_repeat('&nbsp;', 1); ?> <?php the_author(); ?></div>       
							<?php endif; ?>
							<?php if( !get_theme_mod( 'hide_public_date', true ) ) : ?>            
							<div class="post-date"><?php echo str_repeat('&nbsp;', 2); ?> at <?php echo str_repeat('&nbsp;', 1); ?> <a datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"> <?php echo get_the_date(); ?> </a>    </div>    
							<?php endif; ?>

						</div>
					</div> 
				</div>
            </div>   
			<?php if( have_rows('featured_content') ):?>
                <div class="post-features-wrap">
					<div class="container">
						<ul class="post-features">
							<?php $feature_count = 1;
							while( have_rows('featured_content') ) : the_row();?>
								<li class="post-feature">
									<div class="feature-left"><span><?php echo $feature_count; ?></span></div>
									<div class="feature-right">
										<h5><?php echo get_sub_field('featured_contents_title');?></h5>
										<p><?php echo the_sub_field('featured_contents_content'); ?></p>
									</div>
								</li>
							<?php $feature_count++; endwhile; ?>
						</ul>
					</div>
                </div>
            <?php endif; ?>
        <?php else: ?>          
            <h2 class="item-title"><?php wp_title(''); ?></h2>        
        <?php endif; ?>       
    </div>    
	<div class="post-content"><div class="container"><?php the_content(); ?> </div> </div>
    <?php if( !get_theme_mod( 'hide_comment_box', true ) ) : ?>      
        <?php comments_template(); ?>  
    <?php endif; ?>
</div>


</div>
