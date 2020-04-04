  <footer id="footer">
    <div id="footer-navigation">
      <div id="footer-navigation-bar">
        <div class="navigation-brand">
          <a href="<?php echo home_url('/'); ?>">Qwel Design</a>
        </div>
        <?php if (has_nav_menu('secondary')) wp_nav_menu(['menu' => 'secondary', 'menu_class' => 'navigation-menu']); ?>
      </div>
    </div>
    <small class="d-block"><?php copyright(); ?></small>
  </footer><!-- #footer -->
