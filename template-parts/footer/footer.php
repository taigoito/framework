  <footer id="footer">
    <div id="footer-nav">
      <div id="footer-nav-bar">
        <div class="nav-brand">
          <a href="<?php echo home_url('/'); ?>">Qwel Design</a>
        </div>
        <?php if (has_nav_menu('secondary')) wp_nav_menu(['menu' => 'secondary', 'menu_class' => 'nav-menu']); ?>
      </div>
    </div>
    <small class="d-block"><?php copyright(); ?></small>
  </footer><!-- #footer -->
