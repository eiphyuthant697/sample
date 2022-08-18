<article id="post-<?php the_ID(); ?>" <?php post_class('regular-post'); ?>>

    <?php
        if ( has_post_thumbnail() ) : ?>
            <div class="post-thumb">
                <?php the_post_thumbnail('foodica-loop-portrait'); ?>
            </div>
    <?php endif; ?>

    <section class="entry-body">

<!--         <?php //printf( '<a href="<?php the_permalink(); ?>" title="<?php //the_title_attribute(); ?>"></a><a href="%s" rel="bookmark"><span class="cat-links">%s</span></a>', get_the_category_list( ', ' ) ); ?> -->
		<p class="sub-title"><?php the_field('sub_title'); ?></p>
		<h3 class="entry-title"><?php echo get_the_title(); ?> <span><?php the_field('menu_course'); ?></span></h3>
		<p class="price"><?php the_field('price'); ?></p>
        <p class="menu-content"><?php the_content(); ?></p>
            <div class="clear"></div>


    </section>

    <div class="clearfix"></div>
</article><!-- #post-<?php the_ID(); ?> -->