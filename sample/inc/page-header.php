	
          <?php if(is_single()): ?>
              <?php //echo get_the_title( get_option('page_for_posts', true) ); ?>
			<?php if ( is_singular( 'our_services' ) ) {?>
<div class="sub-banner single-service">
				<h2 class="item-title"><?php echo Services; ?></h2>
				<div class="container">
				  <div class="banner-content">
					 <div class="bcontent-left float-left">
			 			<h3 class="single-title"><?php the_title();?></h3>
					</div>
					<div class="bcontent-crub float-right">
					  <ul class="d-flex">
						<li><a href="/sample">Top</a></li>
						<li>/</li>
						  <li><h4>service</h4></li>
						<li>/</li>
						<li><h4><?php wp_title(''); ?></h4></li>
					  </ul>
					</div>
				  </div>
				</div>
</div>
			<?php }?>
          <?php else: ?>
<div class="sub-wh">
<div class="sub-banner">
             <h2 class="item-title"> <?php wp_title(''); ?></h2>
		
       
       
	<div class="container">
	  <div class="banner-content">
		 <div class="bcontent-left float-left">

			<?php if(the_field('sub_title')): ?><h3><?php the_field('sub_title');?></h3><?php endif; ?>
			 <?php if(is_category(1)): ?>
			 <h3>Uncategorized</h3>
			 <?php endif; ?>
			
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
			<?php if( get_field( 'description' ) ) {?>
	<div class="banner-des"><div class="container">
			  <p><?php the_field('description');?></p>
		</div></div>
			<?} ?>
</div>
	<?php endif; ?>
