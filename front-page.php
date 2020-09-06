<?php get_header(); ?>
  <main class="main">
    <?php
    $array = ['news', 'project', 'activity', 'team', 'access', 'contact'];
    foreach ($array as $value) {
      get_template_part('parts/sections/' . $value);
    }
    ?>
  </main><!-- .main -->
  <div class="cover-image"></div>
<?php get_footer(); ?>
