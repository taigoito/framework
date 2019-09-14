  <nav id="header-navigation">
    <div id="header-navigation-bar">
      <div class="navigation-brand">
        <a href="<?php home_url('/'); ?>">Qwel Design</a>
      </div>
      <?php if (has_nav_menu('primary')) wp_nav_menu(['menu' => 'primary', 'menu_class' => 'navigation-menu']); ?>
      <button id="navigation-toggler" type="button" data-toggle="slidebar"><span data-icon="ei-navicon" data-size="m"></span></button>
    </div>
  </nav><!-- #header-navigation -->
