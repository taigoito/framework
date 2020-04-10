  <nav id="header-nav">
    <div id="header-nav-bar">
      <div class="nav-brand">
        <a href="<?php echo home_url('/'); ?>">Qwel Design</a>
      </div>
      <?php if (has_nav_menu('primary')) wp_nav_menu(['menu' => 'primary', 'menu_class' => 'nav-menu']); ?>
      <button id="nav-toggler" type="button" data-toggle="slidebar"><span data-icon="ei-navicon" data-size="m"></span></button>
    </div>
  </nav><!-- #header-nav -->
