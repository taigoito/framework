<?php get_header(); ?>
  <main id="main">
    <?php
    $array = ['works', 'about', 'feature', 'exp', 'shop', 'profile', 'diary'];
    foreach ($array as $value) {
      get_template_part('template-parts/sections/' . $value);
    }
    ?>
  </main><!-- #index-main -->
<?php get_footer(); ?>
