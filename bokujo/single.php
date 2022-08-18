<?php
/**
 * The Template for displaying all single posts.
 */

$post_layout = get_post_meta( get_the_ID(), '_foodica_post_layout', true );

get_header(); ?>

    <main id="main" class="site-main<?php if ($post_layout == 'column-full') { echo ' full-width'; } ?>" role="main">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="service_menu">
                        <nav class="snav-wrap">
                            <?php wp_nav_menu( array(
                                'menu_class'     => 'navbar-wpz dropdown service-menu',
                                'theme_location' => 'secondary'
                            ) ); ?>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                  <?php while ( have_posts() ) : the_post(); ?>
                    <div class="content-area">
                        <?php get_template_part( 'content', 'single' ); ?>
                        <?php comments_template(); ?>
                    </div>
                    <?php endwhile; // end of the loop. ?>
                </div>
                <div class="col-sm-3">
                    <?php if ($post_layout != 'column-full') { ?>
                    <?php get_sidebar(); ?>
                    <?php } else { echo "<div class=\"clear\"></div>"; } ?>
                </div>
            </div>
        </div>
    </main><!-- #main -->

<?php get_footer(); ?>