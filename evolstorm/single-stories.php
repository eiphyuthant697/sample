<?php

get_header(); ?>
<div class="story-post">
  <div class="title">
    <h3 class="widget-title"><?php echo get_the_title(); ?></h3>
    <p>Owner property</p>
  </div>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <p><?php the_field('description'); ?></p>
    <div class="story-tp row">
      <div class="col-md-6">
        <div class="story-tleft">
          <?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumb">
              <?php the_post_thumbnail('foodica-loop-portrait'); ?>
            </div>
          <?php endif; ?>
          <?php
            $images = acf_photo_gallery('story_gallery', $post->ID);
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
        </div> 
      </div>
      <div class="col-md-6">
        <div class="story-tright">
          <h2>賃料・初期費用</h2>
          <p class="rc"><?php the_field('key_money'); ?></p>
          <div class="fee-wrap">
            <div class="fee-inner">
              <div class="fee-tp">
                <div class="text-left">
                  <div class="btn-fee"><p>管理費・共益費</p></div>
                  <p><?php the_field('common_service_fee'); ?></p>
                </div>
                <div class="text-left">
                  <div class="btn-fee"><p>保証金</p></div>
                  <p>
                    <?php $value = get_field( "deposit" );
                    if( $value ) { echo $value;  } else{?>-<?php }?>
                  </p>
                </div>
              </div>
              <div class="fee-tp">
                <div class="text-left">
                  <div class="btn-fee"><p>敷金/礼金</p></div>
                  <p><?php the_field('key_money'); ?> / -</p>
                </div>
                <div class="text-left">
                  <div class="btn-fee"><p>敷引・償却</p></div>
                  <p>
                    <?php $value = get_field( "depreciation" );
                    if( $value ) { echo $value;  } else{?>-<?php }?>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="map">
            <?php if(get_field( "map" )){
            the_field('map'); }
            $image = get_field('map_screenshoot');
            $size = 'full'; // (thumbnail, medium, large, full or custom size)
            if( $image ) {
                echo wp_get_attachment_image( $image, $size );
            }?>
          </div>
        </div>
      </div>
    </div>
    <div class="story-feature">
      <h2>部屋の特徴・設備</h2>
      <p><?php the_field('features_facilities'); ?></p> 
    </div>
    <div class="property-description">
      
      <?php 
        $image = get_field('property_description');
        $size = 'full'; // (thumbnail, medium, large, full or custom size)
        if( $image ) {?><h2>物件概要</h2><div class="img-description"><?php
          echo wp_get_attachment_image( $image, $size );?></div><?php
      }?>
    </div>
  </article>
</div>
<?php

get_footer();
    