<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package appzend
 */

$post_sidebar =  get_theme_mod( 'appzend_default_page_sidebar','right' );

get_header(); ?>

<div class="main-whole">
    <div id="single-bdetail" class="content-area">
        <main id="main" class="site-main">
            <div class="business-detail">	
                <?php
                    if ( have_posts() ) :

                        /* Start the Loop */
                        while ( have_posts() ) : the_post();

                ?>
                <div class="business-content"><?php the_content(); ?></div>
				<?php //get_sidebar(); ?>
                <? 

                        endwhile;

                        ?>	
							
                        
                        <?php
                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                    else :

                        get_template_part( 'template-parts/content', 'none' );

                    endif;
                ?>
            </div><!-- Articales Listings -->

        </main><!-- #main -->
    </div><!-- #primary -->

    
</div>

<?php get_footer();