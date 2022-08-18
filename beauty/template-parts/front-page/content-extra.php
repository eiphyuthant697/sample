<div class="extra-section" style='background-image: url("<?php echo get_theme_mod('extra_bg_image'); ?>");'>
    <div class="extra-content">
        <div class="extra-description">
            <h2>
                <?php if(get_theme_mod('extra_section_description')!="") :?>
                    <?php echo get_theme_mod('extra_section_description'); ?>
                <?php else: ?>
                    皆さまが今より美しく、<br>
                    自身が持ったお肌と目元を実現できるようお手伝いさせて頂きます。
                <?php endif; ?>
            </h2>
        </div>
        <div class="button-group">
           <p class="button-left"><a href=""><?php if(get_theme_mod('extra_section_booking_text')!="") :?><?php echo get_theme_mod('extra_section_booking_text'); ?><?php endif; ?></a></p>
            <?php if(get_theme_mod('extra_section_contact_phone_no')!="") :?>
           <p class="button-right"><a href="tel:<?php echo get_theme_mod('extra_section_contact_phone_no'); ?>"><?php echo get_theme_mod('extra_section_contact_phone_no'); ?></a></p><?php endif; ?>
       </div>
    </div>
</div>