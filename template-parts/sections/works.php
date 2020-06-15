    <section id="front-works" class="front-sec">
      <h2 class="front-sec-heading">版画ゆうびん</h2>
      <div class="slider slider-sm">
        <div class="slider-inner">
          <?php
          $posts = get_posts([
            'posts_per_page' => 12,
            'post_type' => ['works', 'post']
          ]);
          $posts = array_splice($posts, 1, 11);
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
    </section><!-- #works -->
