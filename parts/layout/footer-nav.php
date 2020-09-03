    <div class="footer-nav">
      <div class="footer-nav__bar">
        <div class="footer-nav-brand">
          <?php
          if (has_custom_logo()) {
            the_custom_logo();
          } else {
            echo '<a href="' . home_url('/') . '">HOME</a>';
          }
          ?>

        </div>
        <?php if (has_nav_menu('primary')) wp_nav_menu(['menu' => 'primary', 'menu_class' => 'footer-nav-menu', 'container' => false]); ?>
      </div>
    </div><!-- .footer-nav -->
