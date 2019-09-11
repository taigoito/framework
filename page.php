<?php get_header(); ?>
  <main id="main">
    <div class="container">
      <?php
      if (have_posts()) {
        while (have_posts()) {
          the_post();
          get_template_part('template-parts/contents/page');

          $posts = get_children([
            'post_parent' => get_the_ID(),
            'order' => 'ASC',
            'post_type'   => 'page',
            'post_status' => 'publish'
          ]);
          foreach ($posts as $post) {
            setup_postdata($post);
            get_template_part('template-parts/contents/page');
          }
        }
      }
      ?>
    </div><!-- .container -->
  </main><!-- main -->
<?php get_footer(); ?>
