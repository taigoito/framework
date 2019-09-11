<?php get_header(); ?>
  <main id="main">
    <div class="slider-wrap">
      <div class="slider slider-lg">
        <div class="slider-inner">
          <?php
          $posts = get_posts([
            'posts_per_page' => 48,
            'post_type' => 'works'
          ]);
          foreach ($posts as $post) {
            setup_postdata($post);
            get_template_part('template-parts/contents/works');
          }
          ?>
        </div><!-- .slider-inner -->
        <a class="slider-prev" href="#"><span data-icon="ei-chevron-left" data-size="l"></span></a>
        <a class="slider-next" href="#"><span data-icon="ei-chevron-right" data-size="l"></span></a>
      </div><!-- .slider -->
      <div class="slider-caption"></div>
    </div><!-- .slider-wrap -->
  </main><!-- main -->
<?php get_footer(); ?>
