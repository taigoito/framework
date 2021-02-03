<?php get_header(); ?>
  <main class="main" >
    <div id="slider" class="slider--size_lg">
      <div class="slider__inner">
        <?php
        $posts = get_posts([
          'posts_per_page' => 100,
          'post_type' => ['post', 'works']
        ]);
        foreach ($posts as $post) {
          setup_postdata($post);
        ?>
        <div class="slider__item">
        <?php
        if (has_post_thumbnail()) {
          the_post_thumbnail('large');
        } else {
          no_image();
        }
        ?>
          <div class="slider__caption--hidden">
            <?php the_title(); ?>
          </div>
        </div>
        <?php } ?>
      </div><!-- .slider-inner -->
      <a class="slider__prev" href="#"><span data-icon="ei-chevron-left" data-size="l"></span></a>
      <a class="slider__next" href="#"><span data-icon="ei-chevron-right" data-size="l"></span></a>
    </div><!-- .slider -->
    <div class="slider__caption"></div>
  </main><!-- main -->
<?php get_footer(); ?>
