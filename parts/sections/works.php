    <section id="works" class="works">
      <h2 class="works__heading">最新作品</h2>
      <div id="slider" class="slider--size_lg">
        <div class="slider__inner">
          <?php
          $posts = get_posts([
            'posts_per_page' => 11,
            'post_type' =>['post']
          ]);
          $posts = array_splice($posts, 1, 11);
          foreach ($posts as $post) {
            setup_postdata($post);
            get_template_part("parts/components/slider");
          }
          ?>
        </div>
        <a class="slider__prev" href="#"><span data-icon="ei-chevron-left" data-size="l"></span></a>
        <a class="slider__next" href="#"><span data-icon="ei-chevron-right" data-size="l"></span></a>
      </div><!-- .slider -->
      <div class="works__detail"><a href="<?php echo get_post_type_archive_link('works'); ?>">作品を全て見る</a></div>
    </section><!-- .works -->
