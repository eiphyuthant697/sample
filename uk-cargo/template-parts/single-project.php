<?php 
 /*
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Businessbiz
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="project-detail">
        <div class="entry-meta">
            <?php businessbiz_posted_on();
            businessbiz_entry_meta(); ?>
        </div><!-- .entry-meta -->	
        <div class="entry-content">
            <div class="featured-image">
                <?php the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
            </div><!-- .featured-post-image -->
            <div class="entry-header">
                <h2><?php the_title(); ?></h2>
            </div>
            <p><?php the_field('service_long_description'); ?></p>
            <?php if( have_rows('service_feature_type_1') ):?>
                <div class="service_type_1">
                    <?php while( have_rows('service_feature_type_1') ) : the_row();?>
                        <div class="type_1">
                            <?php if( get_sub_field('type_2_image') ): ?>
                                <div class="type_1_left"><img src="<?php echo get_sub_field('type_2_image'); ?>" /></div>
                            <?php endif; ?>
                            <div class="type_1_right">
                                <div class="type_1_title"><h4><?php echo get_sub_field('type_1_title');?></h4></div>
                                <div class="type_1_description"><p><?php echo get_sub_field('type_2_description');?></p></div>
                                </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
            <?php if( have_rows('service_feature_type_2') ):?>
                <div class="service_type_2">
                    <?php while( have_rows('service_feature_type_2') ) : the_row();?>
                        <div class="type_2">
                            <div class="type_2_title"><h4><?php echo get_sub_field('single_main_features_title');?></h4></div>
                            <?php if( have_rows('single_feature_repeater') ):?>
                                <ul class="type_2_repeater">
                                <?php while( have_rows('single_feature_repeater') ) : the_row();?>
                                    <li><?php echo get_sub_field('single_feature');?></li>
                                <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
            <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'businessbiz' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div><!-- .entry-content -->
        <?php businessbiz_posts_tags(); ?>
        <?php if ( get_edit_post_link() ) : ?>
            <footer class="entry-footer">
                <?php
                    edit_post_link(
                        sprintf(
                            /* translators: %s: Name of current post */
                            esc_html__( 'Edit %s', 'businessbiz' ),
                            the_title( '<span class="screen-reader-text">"', '"</span>', false )
                        ),
                        '<span class="edit-link">',
                        '</span>'
                    );
                ?>
            </footer><!-- .entry-footer -->
        <?php endif; ?>	
    </div>
    
</article><!-- #post-## -->