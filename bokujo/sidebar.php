<?php
/**
 * The sidebar.
 */
?>

<div id="sidebar" class="site-sidebar">

    <h3>サービス一覧</h3>
    <?php
    wp_nav_menu( 
	array( 
		'theme_location' => 'sidebar_services_list',
        'container' => 'nav',
		'menu_class' => 'sidebar_menu_services_list',
	) 
    ); 
    ?>


</div><!-- end .site-sidebar -->