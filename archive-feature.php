<?php get_header(); ?>
  <main id="main">
    <div class="container">
      <div class="row">
        <div class="primary-col">
          <?php
          if (have_posts()) {
            while (have_posts()) {
              the_post();
              get_template_part('template-parts/contents/feature');
            }
          }
          insert_pagination();
          ?>
        </div>
      </div>
    </div>
  </main><!-- main -->
<?php get_footer(); ?>
