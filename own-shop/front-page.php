<?php
/**
 * Own Shop Front Page.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package own-shop
 */


get_header(); ?>
<div class="<?php echo esc_attr(OWN_SHOP_CONTAINER_CLASS) ?>">
    <div id="primary" class="<?php echo esc_attr(get_theme_mod('own_shop_header_menu_style','style1')); ?> content-area">
        <main id="main" class="site-main" role="main">
            <div class="content-inner">
                <div class="row">
                    <div id="page-wrapper">
                        <div class="content-page">
                            <div class="page-content-area">
                                <div class="entry-content">
                                    <div class="special_best_secs con_width pad_width">
                                        <?php 
                                        //if( !get_theme_mod( 'hide_promotion_area_setting', true)) :
                                            echo do_shortcode( '[woocommerce_special_day_code]' );
                                        //endif;
                                        ?>
                                        <?php 
                                        if( !get_theme_mod( 'hide_best_seller_area_setting', true)) : ?>

                                            <div class="special_bests_wrap">
                                                <div class="special_best">
                                                    <div class="special_bests_photo">
                                                        <img src="<?php echo get_theme_mod('abt_bgImage'); ?>">
                                                    </div>
                                                    <div class="special_bests_content">
                                                        <h1 class="special_bests_title"><?php echo get_theme_mod('best_seller_title_setting'); ?></h1>
                                                        <p><?php echo get_theme_mod('best_seller_body_setting'); ?></p>
                                                        <div class="wp-block-button is-style-outline">
                                                            <a class="wp-block-button__link" style="border-radius:0px" href="<?php echo get_theme_mod('best_seller_link_setting'); ?>">Looking for</a>
                                                        </div>
                                                    </div>
                                                </div>                      
                                            </div>
                                        <?php endif;
                                        ?>
                                    </div>
                                    <?php 
                                        if( !get_theme_mod( 'hide_banner_setting', true)) :
                                    ?>
                                    <div class="hp-cat con_width pad_width">
                                        <div class="heading">
                                            <h2><?php echo get_theme_mod('category_title_setting'); ?></h2>
                                        </div>
                                        <?php
                                                echo do_shortcode( '[product_categories columns="5" limit="5"]' ); 
                                        ?>
                                    </div>
                                    <?php
                                        endif;
                                    ?>
                                    <?php 
                                        if( !get_theme_mod( 'hide_tab_products_area_setting', true)) :
                                    ?>
                                    <div class="list-products-section con_width pad_width">
                                        <div class="heading">
                                            <h2><?php echo get_theme_mod('product_tab_title_setting'); ?></h2>
                                        </div>
                                        <?php 
                                        echo do_shortcode('[show_product_categories_tabs]');
                                        ?>
                                    </div>
                                    <?php 
                                        endif;
                                        if( !get_theme_mod( 'hide_tab_collection_area_setting', true)) :
                                    ?>
                                        <div class="collection-list con_width pad_width">
                                            <div class="heading">
                                                <h2><?php echo get_theme_mod('collection_title_setting'); ?></h2>
                                            </div>
                                            <?php
                                                echo do_shortcode( '[woocommerce_subcats_from_Collection_code]' );
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php 
                                        if( !get_theme_mod( 'hide_promotion_area_setting', true)) :
                                    ?>
                                        <?php
                                            echo do_shortcode( '[woocommerce_promotion_code]' );
                                        ?>
                                    <?php endif; ?>
                                    <?php  echo do_shortcode( '[article_content_shortcode]' ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

                <?php get_footer();

