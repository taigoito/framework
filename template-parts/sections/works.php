    <section id="front-works" class="front-sec">
      <h2 class="front-sec-heading">作品</h2>
      <div class="slider slider-sm">
        <div class="slider-inner">
          <?php
          $posts = get_posts([
            'posts_per_page' => 10,
            'post_type' => 'works'
          ]);
          $posts = array_splice($posts, 1, 9);
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
      <div class="link-inline-wrap">
        <a class="link-inline" href="<?php echo get_post_type_archive_link('works'); ?>">作品を全て見る</a>
      </div>
    </section><!-- #works -->
