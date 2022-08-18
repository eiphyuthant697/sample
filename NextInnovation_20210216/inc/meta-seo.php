<?php if ( is_front_page() ) : ?>
    <?php if( get_theme_mod('meta_title') ) : ?>
        <meta name="keywords" content="<?php echo get_theme_mod('meta_title'); ?>">
    <?php endif; ?>
    <?php if( get_theme_mod('meta_description') ) : ?>
        <meta name="description" content="<?php echo get_theme_mod('meta_description'); ?>">
	<?php endif; ?>
<?php elseif( is_category() ): ?>
    <meta name="keywords" content="<?php echo single_cat_title();?>">
    <?php if(get_term_meta(get_queried_object()->term_id, 'cat_meta_description', true)): ?>
        <meta name="description" content="<?php echo get_term_meta(get_queried_object()->term_id, 'cat_meta_description', true); ?>">
    <?php endif; ?>
<?php elseif( is_tag() ): ?>
    <meta name="keywords" content="<?php echo single_tag_title();?>">
    <?php if(get_term_meta(get_queried_object()->term_id, 'tag_meta_description', true)): ?>
        <meta name="description" content="<?php echo get_term_meta(get_queried_object()->term_id, 'tag_meta_description', true); ?>">
    <?php endif; ?>
<?php else: ?>
     <?php if( $my_meta_title = get_post_meta($post->ID, 'meta_title', true) ) : ?>
        <meta name="keywords" content="<?php $my_meta_title = get_post_meta($post->ID, 'meta_title', true); echo $my_meta_title; ?>">
     <?php endif; ?>
     <?php if( $my_meta_desc = get_post_meta($post->ID, 'meta_desc', true) ) : ?>
        <meta name="description" content="<?php $my_meta_desc = get_post_meta($post->ID, 'meta_desc', true); echo $my_meta_desc; ?>">
     <?php endif; ?>
<?php endif; ?>