<section class="section_pagetop">
    <span><img src="/EVOLStorm/wp-content/uploads/2021/10/ico_pagetop.svg" alt=""></span>
</section>
</main><!-- .site-main -->
<?php
/**
 * The template for displaying the footer
 *
 */

$widgets_areas = 4;

$has_active_sidebar = false;
if ( $widgets_areas > 0 ) {
    $i = 1;

    while ( $i <= $widgets_areas ) {
        if ( is_active_sidebar( 'footer_' . $i ) ) {
            $has_active_sidebar = true;
            break;
        }

        $i++;
    }
}

?>

    <footer class="footer">
        <div class="inner">
            <div class="logo">
            <?php foodica_custom_logo() ?>
            </div>
            <div class="links">
                <?php if ( has_nav_menu( 'primary' ) ) {
                    wp_nav_menu( array(
                        'menu_class'     => 'navbar-wpz dropdown sf-menu',
                        'theme_location' => 'primary'
                    ) );
                } ?>
            </div>
            <div class="copyright">
                <p>©EVOLStorm</p>
            </div>
        </div>
    </footer>
    <div class="overlay overlay_start">
    <div class="inner">
        <div class="logo" style="transition: opacity 800ms ease 200ms;">
            <?php foodica_custom_logo() ?>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>