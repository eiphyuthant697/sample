<?php get_header(); ?>

<section class="blog-wrap-layout19">
    <div class="container">
        <div class="blog-content main-container">

                <div class="single-blog-box-layout1">
                    <?php if( have_posts() ): ?>
                        <?php while( have_posts() ) : the_post(); ?>
                            <?php get_template_part('content'); ?>         
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
        </div>
    </div>    
 </section>

<?php get_footer(); ?>