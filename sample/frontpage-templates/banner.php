<?php 
   if( !get_theme_mod( 'hide_banner_setting', true)) :
?>
<div class="banner_section">
  <div class="banner-inner">
    <div id="bannertxt">
      <h2 class="banner-title wow fadeInTopLeft"  data-wow-delay="0s" data-wow-duration="3.0s">
        <?php if(get_theme_mod('banner_title_setting')!="") :?>
          <?php echo get_theme_mod('banner_title_setting'); ?>
        <?php else: ?>
          LOREM IPAUM IS SIMPLY DUMMY
        <?php endif; ?>
      </h2>
    </div> 
    <div id="banner-img">
          <?php if(get_theme_mod('banner_image')!="") :?>
            <?php $banner_img = get_theme_mod('banner_image'); ?>
            <img src="<?php echo $banner_img; ?>" alt="banner image">
          <?php else: ?>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner-min.jpg" alt="banner image">
          <?php endif; ?>
    </div>
  </div>
          
</div>
<?php endif; ?>