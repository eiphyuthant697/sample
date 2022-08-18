<div class="access-section">
    <div class="container">
        <div class="with-lr-stick access-header">
            <?php if(get_theme_mod('access_section_title')!="") :?>
                <h2>
                    <?php echo get_theme_mod('access_section_title'); ?>
                </h2>
            <?php endif; ?>
             
            <?php if(get_theme_mod('access_section_sub_title')!="") :?>
                <p>
                    <?php echo get_theme_mod('access_section_sub_title'); ?>
                </p>
            <?php endif; ?>
        </div>
        <div class="access-content">
            <div class="access-des">
                <?php if (get_theme_mod('access_section_address')):?>
                    <p class="access-add"><?php echo get_theme_mod('access_section_address'); ?></p>
                <?php endif; ?>
                <?php if (get_theme_mod('access_section_mail')):?>
                    <p class="access-mail"><a href="mailto:<?php echo get_theme_mod('access_section_mail'); ?>"><?php echo get_theme_mod('access_section_mail');?></a></p>
                <?php endif; ?>
                <p class="access-tel">
                <?php if (get_theme_mod('access_section_phone')):?>
                    業者専用TEL: <a href="tel:<?php echo get_theme_mod('access_section_phone'); ?>"><?php echo get_theme_mod('access_section_phone');?></a>
                <?php endif; ?>
                <?php if (get_theme_mod('access_section_fax')):?>
                    / FAX: <a href="fax:<?php echo get_theme_mod('access_section_fax'); ?>"><?php echo get_theme_mod('access_section_fax');?></a>
                <?php endif; ?>
                </p>
                <?php if (get_theme_mod('access_section_open')):?>
                    <p class="access-open">open: <?php echo get_theme_mod('access_section_open');?></p>
                <?php endif; ?>
                <?php if (get_theme_mod('access_section_additional')):?>
                    <p class="access-additional"><?php echo get_theme_mod('access_section_additional');?></p>
                <?php endif; ?>
                <?php if (get_theme_mod('access_section_contact')):?>
                    <p class="access-contact"><i class="fa fas fa-phone"></i><a href="tel:<?php echo get_theme_mod('access_section_contact'); ?>"><?php echo get_theme_mod('access_section_contact');?></a></p>
                <?php endif; ?>
                <?php if(get_theme_mod('access_section_map_iframe')!="") :?>
                    <iframe src="<?php echo get_theme_mod('access_section_map_iframe'); ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <?php endif; ?>
                <?php if (get_theme_mod('access_section_google_map_link')):?>
                    <div class="button-group"><p class="access-link button-left"><a href="<?php echo get_theme_mod('access_section_google_map_link'); ?>">Googleマップへ</a></p></div>
                <?php endif; ?>
            </div>

            
            
        </div>
        
    </div>
</div>