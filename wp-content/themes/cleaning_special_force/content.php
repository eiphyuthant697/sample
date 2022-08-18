<article id="post-<?php the_ID(); ?>" <?php post_class('regular-post'); ?>>

    <?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumb"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
               <?php the_post_thumbnail('full', array( 'class' => 'photo' )); ?>
            </a></div>
        <?php endif; ?>

    <section class="entry-body">
        <?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

        <div class="data">
            <span class="cat-links"><?php echo get_the_category_list( ', ' ); ?></span>
            <span>
                 <?php printf( '<span class="entry-date"><time class="entry-date" datetime="%1$s">%2$s</time></span>', esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() ) ); ?>
            </span>
        </div>

        <div class="entry-meta">
            <?php printf( '<span class="entry-author">%s ', __( 'by', 'foodica' ) ); the_author_posts_link(); print('</span>'); ?>

            <?php

            if ( ! post_password_required() && ( comments_open() || 0 != get_comments_number() ) ) :
                echo '<span class="comments-link">';
                comments_popup_link( __('0 comments', 'foodica'), __('1 comment', 'foodica'), __('% comments', 'foodica'), '', __('Comments are Disabled', 'foodica'));

                echo '</span>';
            endif; ?>

            <?php edit_post_link( __( 'Edit', 'foodica' ), '<span class="edit-link">', '</span>' ); ?>
        </div>

        <div class="entry-content">
            <?php the_excerpt(); ?>
        </div>

      

    </section>

    <div class="clearfix"></div>
</article><!-- #post-<?php the_ID(); ?> -->