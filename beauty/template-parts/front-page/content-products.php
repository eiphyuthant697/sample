<?php
/**
 * Template part for displaying header social
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Real_Home
 */

$product_lists = get_theme_mod(
    'real_home_front_page_clients_logo_lists','');

if ( $product_lists ) :  ?>
<div class="product-list-section with-green-plant">
<div class="container">
    <div class="with-lr-stick product-lists-header">
        <h2>
            <?php if(get_theme_mod('product_list_title')!="") :?>
                 <?php echo get_theme_mod('product_list_title'); ?>
            <?php endif; ?>
        </h2>
        <p>
             <?php if(get_theme_mod('product_list_sub_title')!="") :?>
                 <?php echo get_theme_mod('product_list_sub_title'); ?>
             <?php endif; ?>
         </p>

     </div>
     <div class="product-list-des">
        <p>
            <?php if(get_theme_mod('product_list_description')!="") :?>
                <?php echo get_theme_mod('product_list_description'); ?>
            <?php endif; ?>
         </p>
     </div>
    <ul class="product-lists-wrap">

    <?php foreach ( $product_lists as $product_list ) : 
        if ( !empty( $product_list['product_image'] ) ) :
        $img_url = wp_get_attachment_image_src( absint($product_list['product_image']), 'full' );
        $img_url = $img_url[0];
        
        $product_title		= ($product_list['product_title'] != '') ? $product_list['product_title'] : 'Product';
        ?>
        <li class="product-item">
                <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo $product_title; ?>">
                <h3 class="item-title"><?php echo $product_title; ?></h3>
        </li>
    <?php endif; ?>
    <?php endforeach; ?>

</ul><!-- .social-icons -->
<div class="product-list-view-more">
    <a href="#"><?php if(get_theme_mod('product_list_view_more')!="") :?><?php echo get_theme_mod('product_list_view_more'); ?><?php endif; ?></a>
</div>
</div>
</div>
<?php
endif;
