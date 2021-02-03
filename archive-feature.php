<?php get_header(); ?>
  <main class="main">
    <div class="feature">
      <div class="feature__container">
        <?php
        if (have_posts()) {
          while (have_posts()) {
            the_post();
            get_template_part('parts/components/feature');
          }
        }
        insert_pagination();
        ?>
      </div>
    </div>
  </main><!-- main -->
<?php get_footer(); ?>
