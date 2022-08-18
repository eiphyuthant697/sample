      <?php
      $arg = array(
         'post_type'         => 'feature',
         'order'             => 'ASC'
      );
      $slider = new WP_Query($arg);
      $i = 0;
      $j = 0;
      $k = 1;
      $l = 0;
	  $m = 0;
	$m = 1;
	$n = 1;
      $post_count = wp_count_posts('feature')->publish;
      ?>
   
<div id="myCarousel" class="carousel slide" data-ride="carousel"  data-interval="false">
<!-- Indicators -->
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <?php while($slider->have_posts()) : $slider->the_post(); ?>
	  
        <div class="item<?php echo $j==0 ? ' active': '';?>">
			<div class="slider-left<?php echo $j==0 ? ' active': '';?>">
			  <div class="title-left">
				  <h3 class="widget-title">
					  Facilities Gallery
				  </h3>
			  </div>
			<div class="nm-slider">
				<p>0<?php echo $m++; ?> / 0<?php echo $post_count; ?></p>
			</div>
		  </div>
			<div class="slider-right">
				
			
				<?php if ( has_post_thumbnail() ) {  the_post_thumbnail('feature'); } 
				else{?>
					<div class="post-img" style="min-height: 350px; background: rgba(184, 152,0,10%);"></div>
				<?php
					}
				?>
				<div class="caro-cap">

				<span class="sc<?php echo $k==1 ? ' active': '';?>">0<?php echo $k++; ?></span>
				<h2>MYANMAR PREMIUM J MEDICAL CLINIC                 <br>                 <span>施設の場所の名前</span>              </h2>
				</div>
			</div>
        </div>
        <?php $j++; endWhile; wp_reset_query(); ?>
        <ol class="carousel-indicators">
          <?php while($slider->have_posts()) : $slider->the_post(); ?>
          <li data-target="#myCarousel" id="carousel-selector-<?php echo $m++; ?>" data-slide-to="<?php echo $i++; ?>" class="<?php echo $l==0 ? ' active': '';?>"><p><?php the_title() ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0<?php echo $n++; ?></p></li>
          <?php $l++;?>
          <?php endWhile; wp_reset_query(); ?>    
        </ol>
  </div>

</div>
