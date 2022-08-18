<?php
$mwc = 1;$args = array(   'post_type' => 'about_us',  'order'   => 'ASC',   );$the_query = new WP_Query( $args ); ?>
<?php if ( $the_query->have_posts() ) : ?>
    <div class="work-post">  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

        <div class="model-wrap mw<?php echo $mwc++; ?>" data-target="post-<?php the_ID(); ?>">
          <div class="work-tp">            <div class="work-img-cat">              <?php if ( has_post_thumbnail() ) : ?>                <div class="post-thumb">                  <?php the_post_thumbnail(); ?>                </div>              <?php endif; ?>            </div>            <div class="work-content">              <h1><?php the_field('abttitle'); ?></h1>            </div>          </div>
        </div>		<div class="hs" id="post-<?php the_ID(); ?>"aria-hidden="true">	<div class="back_btn">				<button type="btn btn-primary">previous</button>			</div>		<div class="hsi">				
			
			<div class="hs-itp">						<?php 							$image = get_field('background_image');							$size = 'full'; // (thumbnail, medium, large, full or custom size)
							if( $image ) {								echo wp_get_attachment_image( $image, $size );						}
						else{?>							<img src="/sample/wp-content/uploads/2021/03/lycs-architecture-bg.png">						<?php							}						?>					</div>
				<div class="hs-inner d-flex">					<div class="hs-il">						<h1><?php the_field('abttitle'); ?></h1>
					</div>					<div class="hs-ir">						<?php the_field('abtdescription'); ?>					</div>
			  </div>				</div>		  </div>  <?php endwhile; ?>
		</div><?php endif; ?><?php wp_reset_postdata(); ?>
