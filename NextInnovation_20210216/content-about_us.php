<div class="abobut-us-whole">
	<div id="abobut-us-whole" class="container">
		<?php if( have_rows('about_us') ):?>
  <div class="about-us-content">
    <?php while( have_rows('about_us') ) : the_row();?>
      <div class="about-us-description">
        <p><?php the_sub_field('about_us_description'); ?></p>
      </div>
      <!-- vision and mission section -->
      <div class="row justify-content-md-center main-container vision-mission-div">
		    <div class="col-5 vision-mission-section">
		      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Vision.svg" alt="vision">
		      <div class="vission">
		      		<?php the_sub_field('about_us_vision'); ?>
		      </div>
		    </div>
		    <!-- <div class="col-md-auto">
		    </div> -->
		    <div class="col-5 vision-mission-section">
		    	<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Misssion.svg" alt="mission">
		      	<div class="vission-mission">
		      		<?php the_sub_field('about_us_mision'); ?>
		      	</div>
		    </div>
		  </div>
    <?php endwhile; ?>
  </div>
  <?php endif; ?>
	</div>
	<!-- Outline section -->
	<div class="row outline-title">
		<div class="container">
			<div class="row main-container">
				<div class="ht">
	        <h3 class="htitle">OUTLINE</h3><span></span>            
	    	</div>
	    </div>
		</div>
	</div>
  <div class="row outline">
  	<div class="container">
  		<?php if( have_rows('about_us') ):?>
			<?php while( have_rows('about_us') ) : the_row();?>
				<!-- Show company outline -->
						<?php if( have_rows('about_us_outline') ):?>
								<?php while( have_rows('about_us_outline') ) : the_row();?>
											<div class="row main-container comp-outline">
												<div class="col-6 col-md-3 outline-border"><p><?php the_sub_field('outline_label'); ?></p>
												</div>
												<div class="col-6 col-md-4 outline-value-border">
										  		<?php the_sub_field('outline_value'); ?>
										  	</div>
										  	<div class="col-6 col-md-5"></div>
								  		</div>
								<?php endwhile; ?>
						<?php endif; ?>
					<!-- Show main customers -->
					<?php if( have_rows('main_customers') ):?>
											<div class="row main-customer main-container">
												<div class="col-12 col-md-3">Main Customers</div>
												<div class="col-12 col-md-7 cust-list">
													<ul>
													<?php while( have_rows('main_customers') ) : the_row();?>
										  			<li><?php the_sub_field('maincustomer_name'); ?></li>
										  		<?php endwhile; ?>
										  		</ul>
										  	</div>
								  		</div>
						<?php endif; ?>
  		<?php endwhile; ?>
			<?php endif; ?>
  	</div>
  </div>
	<div id="btn-download"><button>Download company profile materials</button></div>
	<?php our_team(); ?>
	<!-- Access section -->
	<div class="row access-section">
		<div class="container">
			<?php if( have_rows('about_us') ):?>
			<?php while( have_rows('about_us') ) : the_row();?>
			<div class="row justify-content-md-center access main-container">
					<?php if( have_rows('about_us_access') ):?>
					<?php while( have_rows('about_us_access') ) : the_row();?>
					<div class="col">
							<div class="ht">
				        <h3 class="htitle">ACCESS</h3><span></span>            
				    	</div>
									<?php the_sub_field('access_map'); ?>
					</div>
					<div class="col col-address">
						<h3>Address</h3>
							<?php the_sub_field('access_address'); ?>
						<h3 class="busstop">Nearest Busstop</h3>
						  <?php the_sub_field('access_nearest_station'); ?>
						 <a href="<?php the_sub_field('link_google_map'); ?>" class="btn btn-common google-link"><?php the_sub_field('link_text'); ?></a>
					</div>
					<?php endwhile; ?>
					<?php endif; ?>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php extra_footer_content(); ?>
<?php get_footer(); ?>