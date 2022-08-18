<?php
    $post_layout = get_post_meta( get_the_ID(), '_foodica_post_layout', true );

    if ($post_layout == 'column-full') {
        $size = "foodica-loop-full";
    }  else {
        $size = "foodica-loop-sticky";
    }
?>

    <?php
    $post_id = $post->ID; // current post ID
    $cat = get_the_category(); 
    $current_cat_id = $cat[0]->cat_ID; // current category ID 

    $args = array( 
        'category' => $current_cat_id,
        'orderby'  => 'post_date',
        'order'    => 'DESC'
    );
    $posts = get_posts( $args );
    // get IDs of posts retrieved from get_posts
    $ids = array();
    foreach ( $posts as $thepost ) {
        $ids[] = $thepost->ID;
    }
    // get and echo previous and next post in the same category
    $thisindex = array_search( $post_id, $ids );
    $previd    = isset( $ids[ $thisindex - 1 ] ) ? $ids[ $thisindex - 1 ] : false;
    $nextid    = isset( $ids[ $thisindex + 1 ] ) ? $ids[ $thisindex + 1 ] : false;
    ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ( has_post_thumbnail() ) { ?>
        <div class="post-thumb">
            <?php the_post_thumbnail('full', array( 'class' => 'photo' )); ?>
        </div>
    <?php } ?>

    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <div class="entry-meta">
            <?php printf( '<span class="entry-author">%s ', __( 'Written by', 'foodica' ) ); the_author_posts_link(); print('</span>'); ?>
            <span class="entry-date"><?php _e( 'on', 'foodica' ); ?> <?php printf( '<time class="entry-date" datetime="%1$s">%2$s</time> ', esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() ) ); ?></span>
            <span class="entry-category"><?php _e( 'in', 'foodica' ); ?> <?php the_category( ', ' ); ?></span>
            <?php edit_post_link( __( 'Edit', 'foodica' ), '<span class="edit-link">', '</span>' ); ?>
        </div>
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

    <div class="share">
        <a href="javascript:window.print()" title="<?php esc_attr_e( 'Print this Page', 'foodica' ); ?>" class="print"><?php _e( 'Print', 'foodica' ) ?></a>
        <div class="clear"></div>
    </div>

    <div class="post_author clearfix">
        <?php echo get_avatar( get_the_author_meta( 'ID' ) , 90 ); ?>
        <div class="author-description">
            <h3 class="author-title author"><?php the_author_posts_link(); ?></h3>
            <p class="author-bio">
                <?php the_author_meta( 'description' ); ?>
            </p>
        </div>
    </div>

    <div class="prevnext">
        <?php
            if (false !== $previd ) {
                ?><a rel="prev" href="<?php echo get_permalink($previd) ?>">Previous</a><?php
            }
            if (false !== $nextid ) {
                ?><a rel="next" href="<?php echo get_permalink($nextid) ?>">Next</a><?php
            }
        ?>
    </div>

</footer><!-- .entry-footer -->