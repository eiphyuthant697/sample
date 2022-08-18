<?php
/**
 * Template Name: Full Width
 */
$subtitle = get_post_meta(get_the_ID(),'_cmb_page_subtitle', true);
global $archi_option;
get_header(); ?>
<?php if($archi_option['subpage-switch']!=false){ ?>

   <!-- subheader begin -->
    <section id="subheader" data-speed="8" data-type="background"
            <?php $images = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
              style="background-image: url('<?php echo $images[0]; ?>');"
    >
        <div class="container">
            <div class="title-wrap">
                <h3><?php the_title(); ?></h3>
                <?php  $subtitle = the_field('sub_title');
                    if ($subtitle != '') { ?> <h1><?php echo $subtitle ?></h1> <?php } ?>
            </div>               
        </div>
    </section>
    <!-- subheader close -->

<?php }else{ ?>
    <section class="no-subpage"></section>
<?php } ?>

<?php //echo wp_specialchars_decode( do_shortcode( $archi_option['top_page_contact_info'] ) ); ?>

<?php if (have_posts()){ ?>
		<?php while (have_posts()) : the_post()?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	<?php }else {
		_e('Page Canvas For Page Builder', 'archi'); 
}?>

<?php get_footer(); ?>