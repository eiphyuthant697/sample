<?php
    $post_layout = get_post_meta( get_the_ID(), '_foodica_post_layout', true );

    if ($post_layout == 'column-full') {
        $size = "foodica-loop-full";
    }  else {
        $size = "foodica-loop-sticky";
    }
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<!--     <?php //if ( has_post_thumbnail() ) { ?>
        <div class="post-thumb">
            <?php //the_post_thumbnail($size, array( 'class' => 'photo' )); ?>
        </div>
    <?php //} ?> -->

    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        
    </header><!-- .entry-header -->


    <div class="entry-content">
        <?php the_content(); ?>
        <div class="clear"></div>

    </div><!-- .entry-content -->

</article><!-- #post-## -->

<footer class="entry-footer">
    <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'foodica' ),
            'after'  => '</div>',
        ) );
    ?>

    <?php the_tags( '<div class="tag_list">' . __( '<h4>Tags</h4>', 'foodica' ). ' ', ' ',  '</div>'  ); ?>

    <div class="prevnext">
        <?php
        $previous_post = get_previous_post();
        $next_post = get_next_post();
        if ( $previous_post != NULL ) {
            ?><div class="previous_post_pag">
                <div class="prevnext_container">
                     <?php if ( has_post_thumbnail( $previous_post->ID ) ) {
                        echo '<a href="' . esc_url(get_permalink( $previous_post->ID )) . '" title="' . esc_attr( $previous_post->post_title ) . '">';
                        echo get_the_post_thumbnail( $previous_post->ID, 'foodica-prevnext-small' );
                        echo '</a>';
                    } ?>
                    <a class="prevnext_title" href="<?php echo esc_url(get_permalink($previous_post->ID)); ?>" title="<?php echo esc_attr($previous_post->post_title); ?>"><?php echo esc_html($previous_post->post_title); ?></a>
                </div>
            </div><?php
        }

        if ( $next_post != NULL ) {
            ?><div class="next_post_pag">
                <div class="prevnext_container">
                    
                    <?php if ( has_post_thumbnail( $next_post->ID ) ) {
                        echo '<a href="' . esc_url(get_permalink( $next_post->ID )) . '" title="' . esc_attr( $next_post->post_title ) . '">';
                        echo get_the_post_thumbnail( $next_post->ID, 'foodica-prevnext-small' );
                        echo '</a>';
                    } ?>
					<a class="prevnext_title" href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" title="<?php echo esc_attr($next_post->post_title); ?>"><?php echo esc_html($next_post->post_title); ?></a>
                </div>
            </div><?php
        }
        ?>
    </div>

</footer><!-- .entry-footer -->