<?php get_header(); ?>
  <main class="main">
    <?php
    $array = ['about', 'service', 'shop', 'news', 'movies', 'recruit', 'access', 'contact'];
    foreach ($array as $value) {
      get_template_part('parts/sections/' . $value);
    }
    ?>
  </main><!-- .main -->
<?php get_footer(); ?>
