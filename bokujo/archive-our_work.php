<?php get_header();?>
<div class="work-post">
  <button data-toggle="modal" data-target="#post-<?php the_ID(); ?>">
    <div class="model-wrap">
      <div class="work-tp">
        <div class="work-img-cat">
          <?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumb">
              <?php the_post_thumbnail('foodica-loop-portrait'); ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="work-content">
          <span class="entry-date"><?php echo get_the_date( 'j. m. Y' ); ?></span>
          <h1><?php echo get_the_title(); ?></h1>
        </div>
      </div>
    </div>
  </button> 
  <div class="modal fade" id="post-<?php the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="post-<?php the_ID(); ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="work-modal-wrap">
          <?php
            $images = acf_photo_gallery('our_work_gallery', $post->ID);
            if( count($images) ):?>
              <ul>
              <?php
                foreach($images as $image):
                    $id = $image['id']; // The attachment id of the media
                    $title = $image['title']; //The title
                    $full_image_url= $image['full_image_url']; //Full size image url
                    $full_image_url = acf_photo_gallery_resize_image($full_image_url, 100, 100); //Resized size to 262px width by 160px height image url
                    $thumbnail_image_url= $image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
                    $target= $image['target']; //Open normal or new tab
          ?>
        
            <li>
              <img src="<?php echo $full_image_url; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>">
            </li>
          <?php endforeach;?></ul><?php endif; ?>
          <div class="work-model-contel">
            <span class="entry-date"><?php _e( 'on', 'foodica' ); ?> <?php printf( '<time class="entry-date" datetime="%1$s">%2$s</time> ', esc_attr( get_the_date( 'YYYY. MM. DD' ) ), esc_html( get_the_date() ) ); ?></span>
            <h1><?php echo get_the_title(); ?></h1>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>
</div>
<?php get_footer();