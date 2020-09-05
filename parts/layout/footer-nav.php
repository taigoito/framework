    <div class="footer-nav">
      <div class="footer-nav__bar">
        <div class="footer-nav-brand">
          <a href="<?php home_url('/'); ?>">HOME</a>
        </div>
        <?php if (has_nav_menu('primary')) wp_nav_menu(['menu' => 'primary', 'menu_class' => 'footer-nav-menu', 'container' => false]); ?>
      </div>
    </div><!-- .footer-nav -->
