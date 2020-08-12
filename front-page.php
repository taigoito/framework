<?php get_header(); ?>
  <main class="main">
    <?php
    $array = ['news', 'about', 'project', 'product', 'photos', 'access', 'contact'];
    foreach ($array as $value) {
      get_template_part('parts/sections/' . $value);
    }
    ?>
  </main><!-- .main -->
  <div class="cover-image" style="background-image: url(<?php header_image(); ?>);"></div>
<?php get_footer(); ?>
