  <div class="site-header__container">
    <div class="site-header__inner">
      <h1 class="site-header__title"><?php echo get_my_title(); ?></h1>
    </div>
  </div>
  <div class="site-header__cover<?php if (is_page()) echo '--' . get_my_slug(); ?>"></div>
