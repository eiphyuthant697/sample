<?php  if ( has_post_thumbnail() ) {     $image_single = get_the_post_thumbnail_url();  }  else {     $image_single = get_stylesheet_directory_uri().'/assets/img/noimage.png';  }?>

<div class="pure-g">  
  <div class="pure-u-1 masonry-item">     
    <div class="default-blog-post">      
      <article class="blog-item">              
      </article>      
    </div>  
  </div>
  <div class="more-info">      
    <?php if(is_single()): ?>        
      <div class="entry-date">          
        <span></span>        
      </div>        
      <h2 class="post-title"> <?php the_title(); ?></h2>
      <div class="entry-media">
        <img src="<?php echo $image_single; ?>" alt="blog">
        <div class="entry-overlay"></div>        
      </div>                
      <?php else: ?>          
        <h2 class="item-title"><?php wp_title(''); ?></h2>        
        <?php endif; ?>       
      </div>    
      <?php the_content(); ?>  <?php if( !get_theme_mod( 'hide_comment_box', true ) ) : ?>      <?php comments_template(); ?>  <?php endif; ?>
    </div>

<div class="blog-entry-meta">
  <ul>     
    <li class="item-tag">

        <?php if( !get_theme_mod( 'hide_categories', false ) ) : ?>
          <?php $categories = get_the_category();
              if ( ! empty( $categories ) ) {                  echo '<i class="fas fa-bookmark"></i><a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';              }         ?>        <?php endif; ?>

        <?php if( !get_theme_mod( 'hide_author', true ) ) : ?>           <?php echo str_repeat('&nbsp;', 2); ?> by <?php echo str_repeat('&nbsp;', 1); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"> <?php the_author(); ?> </a>         <?php endif; ?>
        <?php if( !get_theme_mod( 'hide_public_date', true ) ) : ?>            <?php echo str_repeat('&nbsp;', 2); ?> at <?php echo str_repeat('&nbsp;', 1); ?> <a datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"> <?php echo get_the_date(); ?> </a>        <?php endif; ?>
        
     </li>  
  </ul>
</div>
