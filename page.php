<?php get_header(); ?>
  <main id="main">
    <header id="page-header">
      <h1 id="page-title"><?php echo get_my_title(); ?></h1>
    </header>
    <div class="container">
      <?php
      if (have_posts()) {
        while (have_posts()) {
          the_post();
          //get_template_part('template-parts/contents/page');

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
      <a class="btn-contact" href="#front-contact">お問い合わせはこちら</a>
    </div><!-- .container -->
  </main><!-- main -->
  <div id="cover-gradient"></div>
  <div id="canvas-wrap"></div>
<?php get_footer(); ?>
