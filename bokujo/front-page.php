<?php
/**
 * The template used for displaying front page
 */
?>

<?php 
get_header();?>

<div class="service-wrap">
    <div class="l-container">
        <div class="inner">
            <nav class="snav-wrap">
                <?php wp_nav_menu( array(
                    'menu_class'     => 'navbar-wpz dropdown service-menu',
                    'theme_location' => 'secondary'
                ) ); ?>
            </nav>
        </div>
    </div>
</div>

<?php if( have_rows('main_services') ):?>
    <div class="main-service-wrap">
        <div class="l-container">
            <div class="inner">
                <ul class="main-services">
                    <?php while( have_rows('main_services') ) : the_row();?>
                        <li class="main-service">
                            <a href="<?php  $link = get_sub_field('main_service_link'); echo esc_url( $link ); ?>"  onMouseOver="this.style.backgroundColor='<?php the_sub_field('hover_bg_color'); ?>',this.style.color='#fff'" onMouseOut="this.style.backgroundColor='#fff',this.style.color='#0000ff'"><span class="upper-arrow"></span><span class="service-title"><?php echo get_sub_field('main_service_name'); ?></span><span class="service-img"><img src="<?php echo get_sub_field('main_service_icon'); ?>" alt="" class="ds"><img src="<?php echo get_sub_field('hover_icon'); ?>" alt="" class="hds"> </span></a>
                        </li>
                    <?php                 endwhile;?>
                </ul>   
            </div>
        </div>
    </div>
<?php   endif;?>  

           
<?php if( have_rows('news') ): ?>
    <div class="home-news-wrap">
        <div class="l-container">
            <div class="inner">
                <div class="news-wrap">
                    <?php while( have_rows('news') ): the_row(); ?>
                        <a class="news-left" href="<?php the_sub_field('news_link'); ?>">
                            <span class="news-left-title"><?php the_sub_field('news_title'); ?></span>
                            <span class="fa fa-angle-right"></span>
                        </a>
                        
                        <?php $query=new WP_Query(array(
                            'post_type' => 'post',
                            'category_name' => 'news',
                        ));
                        // The loop
                            if ($query->have_posts()):?>
                                <div class="news-home">
                                    <ul class="news-lists">
                                        <?php while ($query->have_posts()): $query->the_post();?>
                                        <li class="news-list">
											<div class="news-lt">
												<span class="news-time"><?php echo get_the_date( 'Y.n.j' ); ?></span>
												<span class="news-title">
													<a href="<?php the_permalink(); ?>"><?php echo get_the_title();?></a>
												</span>
											</div>
                                            
                                        </li>
                                        <?php endwhile; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <?php wp_reset_postdata(); ?>
                    <?php endwhile;?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

            
<?php if( have_rows('extra_information') ): ?>
    <div class="extra-wrap">
        <div class="l-container">
            <div class="inner">
                <div class="extra-inner">
                    <?php while( have_rows('extra_information') ): the_row(); ?>
                        <h4><?php the_sub_field('extra_info_title'); ?></h4>
                        <div class="extra-content"><span><img src="/cleaning_special_forces/wp-content/uploads/2021/12/favico.png"></span><p><?php the_sub_field('extra_info_text'); ?></p></div>
                        <div class="extra-op"><span class="eop-left">&smallsetminus;</span><?php the_sub_field('other_text'); ?><span class="eop-left">&sol;</span></div>
                        <div class="extra-infos">
                            <div class="extra-info tel-extra"><a href="tel:<?php echo get_theme_mod('line_contact'); ?>"><p class="hour-24"><?php the_sub_field('if_tel_is_24_hour'); ?></p><span class="icon-freecall-counselling"><img src="/cleaning_special_forces/wp-content/uploads/2021/12/tel-icon.png"></span><?php echo get_theme_mod('line_contact'); ?></a></div>
                            <div class="extra-info mail-extra"><a href="/cleaning_special_forces/#inquiries"><?php the_sub_field('text_for_mail_'); ?><span class="icon-freecall-counselling"><img src="/cleaning_special_forces/wp-content/uploads/2021/12/mail-icon.png"></span><?php echo get_theme_mod('contact_title'); ?></a></div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
    
<?php endif; ?>

<!-- <?php //if( have_rows('extra_section') ): ?>
    
    <?php //while( have_rows('extra_section') ): the_row(); ?>
        <div class="ranking">
            <img src="<?php //the_sub_field('extra_section_image'); ?>" /> 
        </div> 
    <?php //endwhile; ?>
    
<?php //endif; ?> -->

<?php if( have_rows( 'what_should_we_do' ) ): ?>
    <div class="wswd-wrap">
        <div class="l-container">
            <div class="inner">
                <?php while ( have_rows( 'what_should_we_do' ) ) : the_row(); 
                $wswd_tip = get_sub_field('wswd_the_tips');?>
                    <div class="wswd-whole">
                        
                        <div class="wswd-inner">
                            <div class="wswd-content <?php if( $wswd_tip ){?>wswd-left<?php }else{ ?>wswd-only<?php } ?>">
								<h2><span><?php the_sub_field('wswd_main_title'); ?></span></h2>
                                
                                <p><?php the_sub_field('wswd_featured_content'); ?></p>
                            </div>
                            <?php if( have_rows('wswd_the_tips') ):?>
                                <div class="wswd-content wswd-right">
                                    <ul class="wswd-right-lists">
                                        <?php while ( have_rows('wswd_the_tips') ) : the_row(); ?>
                                            <li class="wswd-right-list">
                                                <div class="wswd-icon"><img src="<?php the_sub_field('wswd_tip_icon'); ?>"></div>
                                                <div class="wswd-tip">
                                                    <h4><?php the_sub_field('wswd_tip_title'); ?></h4>
                                                    <p><?php the_sub_field('wswd_tip_content') ?></p>
                                                </div>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile;?>
                    
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if( have_rows('usage_flow') ): ?>
    <div class="usage-wrap">
        <div class="l-container">
            <div class="inner">
                <div class="usage-inner">
                    <?php while( have_rows('usage_flow') ): the_row(); ?>
                        <div class="usage-featured-content">
                            <h4><?php the_sub_field('usage_flow_main'); ?></h4>
                            <div class="usage-ft-content"><p class="uft-p"><?php the_sub_field('usage_flow_featured_content'); ?></p><p class="usage-more-link"><a href="#">詳しくはこちら</a></p></div>
                        </div>
                        
                        <?php $uf_query=new WP_Query(array(
                            'post_type' => 'post',
                            'category_name' => 'usage_flow',
                        ));
                        // The loop
                            if ($uf_query->have_posts()): $uf_count = 1; ?>
                                <div class="usage-flow">
                                    <ul class="usage-lists">
                                        <?php while ($uf_query->have_posts()): $uf_query->the_post();?>
                                        <li class="usage-list">
                                            <p class="usage-step"><?php echo $uf_count; ?></p>
                                            <?php if ( has_post_thumbnail() ) { ?>
                                                <div class="post-thumb">
                                                    <?php the_post_thumbnail(); ?>
                                                </div>
                                            <?php } ?>
                                            <p class="usage-title">
                                                <?php echo get_the_title();?>
                                            </p>
                                        </li>
                                        <?php $uf_count++;
                                        endwhile; ?>
                                    </ul>
                                </div>
                                
                            <?php endif; ?>
                            <?php wp_reset_postdata(); ?>
                    <?php endwhile;?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="blog-post">
    <div class="l-container">
    <div class="blog-inner">
            <header>
                <h3 class="movieslider-logo" >お掃除日記</h3>
                <a href="/cleaning_special_forces/category/blog/" class="movieslider-more">記事一覧を見る <i class="far fa-arrow-alt-circle-right"></i></a>
            </header>
                
                    
                <?php $uf_query=new WP_Query(array(
                    'post_type' => 'post',
                    'category_name' => 'blog',
                ));
                // The loop
                    if ($uf_query->have_posts()): $uf_count = 1; ?>
                        <div class="blog-slider-wrap">
                            <div class="blog-slider">
                                <div class="swiper-wrapper bg-slider">
                                    <?php while ($uf_query->have_posts()): $uf_query->the_post();?>
                                        <a class="swiper-slide" href="<?php the_permalink(); ?>">
                                            <article class="movieslider-item">
                                                <div class="media">
                                                    <?php if ( has_post_thumbnail() ) { ?>
                                                        <div class="media-inner">
                                                            <?php the_post_thumbnail(); ?>
                                                        </div>
                                                    <?php } ?>
                                                    <span class="media-tag media-tag-best"></span>
                                                </div>
                                            <p class="movieslider-date">
                                                <?php echo get_the_date( 'Y.m.d' ); ?>
                                            </p>
                                            <h3 class="movieslider-title"><?php echo get_the_title();?></h3>
                                            </article>
                                        </a>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                        
                                
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                    
                
        </div>
    </div>
</div>
<div class="services" id="services_fees">
    <header>
        <h4>料金プラン</h4>
    </header>
  
    <section class="tabs">
        <?php $service_query=new WP_Query(array(
            'post_type' => 'post',
            'category_name' => 'services',
            'showposts' => 4,
            'order' => 'DESC' 
        ));        
        $j = 1;
        if ($service_query->have_posts()) : 
        while ($service_query->have_posts()) : $service_query->the_post(); ?>   
        <input id="tab-<?php echo $j;?>" type="radio" name="radio-set" class="tab-selector-<?php echo $j;?>" <?php  echo $j == 1 ? 'checked' : '' ?>>
        <label for="tab-<?php echo $j;?>" class="tab-label-<?php echo $j;?>"><?php the_title(); ?></label>  
        <?php $j ++; endwhile;?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
        
        <div class="clear-shadow"></div>

        <div class="content">
            <?php
                
                  $i = 1;
                 if ($service_query->have_posts()) : while ($service_query->have_posts()) : $service_query->the_post(); 
                
            ?>   

            <div class="content-<?php echo $i;?>">
                 <h2><?php the_title(); ?></h2>
                 <?php the_content();?>
            </div>
            
            
            <?php $i ++;   endwhile;?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>    
        <div class="clear-shadow"></div>
        <p class="text-center notice">その他料金設定に関しては　見積もり時に現場の状況を見て　その場で料金をお伝え致しますのでまずは無料お見積もりを！と記載お願い致します！</p>
    </section>
</div>




<?php if( have_rows('company_information') ): ?>
    <div class="company-infos" id="company_profile">
        <div class="l-container">
            <div class="inner">
                <div class="infos-inner">
					
				
    <?php while( have_rows('company_information') ): the_row(); ?>
                    <h4><?php the_sub_field('info_main_title'); ?></h4>
                    <ul class="infos">
        <?php if( have_rows('informations') ): ?>
            <?php while( have_rows('informations') ): the_row(); ?>
                        <li>
                            <span class="info-label"><?php the_sub_field('information_label'); ?></span>
                            <span class="info-ans"><?php the_sub_field('information_input'); ?></span>
                        </li>	
            <?php endwhile; ?>
        <?php endif; ?>
        <?php if( have_rows('google_map') ): ?>
            <?php while( have_rows('google_map') ): the_row(); ?>
                        <li>
                            <span class="info-label"><?php the_sub_field('google_map_label'); ?></span>
                            <span class="info-ans"><?php the_sub_field('google_map_iframe'); ?></span>
                        </li>
            <?php endwhile; ?>
        <?php endif; ?>
                    </ul>
    <?php endwhile; ?>
                </div>
                </div>
            </div>
    </div>
<?php endif; ?>

<?php if( have_rows('location') ): ?>
    <div class="contact-wrap location" id="correspondence_area">
        <div class="location-services">
			<div class="overlayss"></div>
				<div class="inner">
					<?php while( have_rows('location') ): the_row(); ?>
						<div class="location-inner">
							<h4><?php the_sub_field('title'); ?></h4>
							<img src="<?php the_sub_field('image'); ?>" class="img-fluid">
							<p class="content"><?php the_sub_field('data'); ?></p>
						</div>
					<?php endwhile; ?>
				</div>
        </div>
    </div>
<?php endif; ?>

   <?php $testimonial_query= new WP_Query(array(
        'post_type' => 'post',
        'category_name' => 'testimonials',
        'order' => 'DESC' 
    ));        
    $count = $testimonial_query->found_posts; ?>
    
    <?php if(isset($testimonial_query)):?>
        <div class="testimonials" id="customer_voice">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-center">お客様の声</h4>
                    </div>
                </div>
                <?php if ($count <= 4):?>
                <div class="row tsm-lists">
                        <?php
                        if ($testimonial_query->have_posts()) : 
                            while ($testimonial_query->have_posts()) : $testimonial_query->the_post(); ?>
                                <?php $image = get_the_post_thumbnail_url(get_the_ID(),'full');?>
                                    <div class="col-sm-6 col-md-3 tsm-list">
                                        <div class="card">
                                            <div class="face front-face"> 
                                                <img src="<?php echo $image ?>" alt="" class="profile">
                                                <div class="pt-3 text-uppercase name"> <?php the_title(); ?> </div>
                                            
                                            </div>
                                            <div class="face back-face"> 
                                                <span class="fas fa-quote-left"></span>
                                                <div class="testimonial"> <?php the_content(); ?></div>
                                                <span class="fas fa-quote-right"></span>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                            endwhile;
                        endif; 
                        wp_reset_postdata(); ?>
                </div>
                <?php else:?>
                    <div class="testimonial-reviews">
                        <?php
                        if ($testimonial_query->have_posts()) : 
                            while ($testimonial_query->have_posts()) : $testimonial_query->the_post(); ?>
                                <?php $image = get_the_post_thumbnail_url(get_the_ID(),'full');?>
                                
                                    <div class="card">
                                        <div class="face front-face">
                                            <img src="<?php echo $image ?>" alt="" class="profile">
                                            <div class="pt-3 text-uppercase name"> <?php the_title(); ?> </div>
                                            <div class="designation">Finance Director</div>
                                        </div>
                                        <div class="face back-face">
                                            <span class="fas fa-quote-left"></span>
                                            <div class="testimonial"> <?php the_content(); ?></div>
                                            <span class="fas fa-quote-right"></span>
                                        </div>
                                    </div>
                                    
                                
                                <?php
                            endwhile;
                        endif; 
                        wp_reset_postdata(); ?>
                    </div>
                <?php endif;?>
            </div>
        </div>
    <?php endif;?>

<?php if( have_rows('contact_form') ): ?>
    <div class="contact-wrap" id="inquiries">
        <div class="l-container">
            <div class="inner">
                <?php while( have_rows('contact_form') ): the_row(); ?>
                    <div class="contact-inner">
                        <h4><?php the_sub_field('contact_form_title'); ?></h4>
                        <p><?php the_sub_field('contact_form_text'); ?></p>
                        <div class="contact-form"><?php the_sub_field('contact_form'); ?></div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
<?php endif; ?>




<?php get_footer(); ?>