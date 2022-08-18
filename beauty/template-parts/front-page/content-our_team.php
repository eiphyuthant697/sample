
<div class="our-team-section">
    <div class="container">
    <div class="with-lr-stick our-team-header">
             <h2>
                 <?php if(get_theme_mod('our_team_title')!="") :?>
                     <?php echo get_theme_mod('our_team_title'); ?>
                 <?php endif; ?>
             </h2>
             <p>
                 <?php if(get_theme_mod('our_team_sub_title')!="") :?>
                     <?php echo get_theme_mod('our_team_sub_title'); ?>
                 <?php endif; ?>
             </p>

         </div>
         <div  class="our-team-sec">
         <?php
            $query_all=new WP_Query(array(
            'post_type' => 'our_team',
            'posts_per_page' => 4,
            ));
            // The loop
            if ($query_all->have_posts()):
                while ($query_all->have_posts()):
                $query_all->the_post(); ?>

                <div class="our-team-content">
                    <?php if (has_post_thumbnail()) {?>
                        <div class="team-humb"><a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a></div>
                    <?php }?>
                    <h3 class="our-team-title">
                        <a href="<?php echo get_permalink(); ?>"><?php the_title();?></a>
                    </h3>
                    <p class="our-team-specialist"><?php the_field('specialization'); ?></p>

                     </div>
                 <?php endwhile; ?>
             <?php endif; ?>
         </div>
    </div>
 
</div>
