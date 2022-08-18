<?php if( have_posts() ) : ?>
    
    <?php while( have_posts()): the_post(); ?>
        <?php if(is_page('OUR SERVICE')){
            get_template_part('content', 'our_services'); 

        }
        elseif(is_page('About us')){
            get_template_part('content', 'about_us'); 

        }
        elseif(is_page('Blog')){
            get_template_part('content', 'blog'); 

        }
        elseif(is_page('contact')){
            get_template_part('content', 'contact'); 

        }
        elseif(is_page('Our Work')){
            get_template_part('content', 'our_work'); 

        }
        else {?>

        
        <?php the_content();} ?>
    <?php endwhile; ?>

<?php endif; ?>
