<?php get_header(); ?>
  <main id="main">
    <?php
    $array = ['web', 'ac', 'news', 'profile'];
    foreach ($array as $value) {
      get_template_part('template-parts/sections/' . $value);
    }
    ?>
  </main><!-- #index-main -->
  <div id="canvas-wrap"></div>
<?php get_footer(); ?>
