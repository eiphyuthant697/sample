<input id="mySiteTitle" value="<?php bloginfo( 'name' ); ?>" type="hidden">
 <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">
      <div class="logo float-left">
        <h1 class="text-light">
          <a href="<?php echo get_home_url(); ?>">
            <?php bloginfo( 'name' ); ?><small><?php bloginfo( 'description' ); ?></small>
          </a>
        </h1>
      </div>
      <button class="btn__toggle">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </button>
      <nav class="main-menu nav-menu dm-none float-right d-lg-block">
<!-- 	d-none	   -->
        <?php
          wp_nav_menu( array(
            'theme_location'  => 'primary-menu',
            'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
            'container'       => '',
            'walker'          => new WP_Bootstrap_Navwalker(),
          ) );
        ?>
      </nav>
          

    </div>
    <div class="nav__container">
        <div class="menu-toggle">
          <div class="logo" bis_skin_checked="1">
            <h1 class="text-light">
              <a href="/sample" bis_skin_checked="1">
                Next Innovation<small>Web &amp; media</small>
              </a>
            </h1>
          </div>
          <nav class="nav-main">
    <!-- 	d-none	   -->
            <?php
              wp_nav_menu( array(
                'theme_location'  => 'primary-menu',
                'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                'container'       => '',
                'walker'          => new WP_Bootstrap_Navwalker(),
              ) );
            ?>
          </nav>
          </div>
        </div>
  </header><!-- End Header -->