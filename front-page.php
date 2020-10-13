<?php get_header(); ?>
  <main class="main">
    <?php
    $array = ['works', 'about', 'news', 'photos', 'access', 'contact'];
    foreach ($array as $value) {
      get_template_part('parts/sections/' . $value);
    }
    ?>
  </main><!-- .main -->
  <div id="sketch" class="sketch"></div>
<?php get_footer(); ?>
