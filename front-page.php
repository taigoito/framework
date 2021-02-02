<?php get_header(); ?>
  <main class="main">
    <?php
    $array = ['works', 'about', 'news', 'photos', 'access', 'contact'];
    foreach ($array as $value) {
      get_template_part('parts/sections/' . $value);
    }
    ?>
  </main><!-- .main -->
<?php get_footer(); ?>
