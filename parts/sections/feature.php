    <section id="feature" class="feature">
      <h2 class="feature__heading">特集</h2>
      <div class="feature__container">
        <?php
        $posts = get_posts([
          'posts_per_page' => 4,
          'post_type' => ['feature']
        ]);
        foreach ($posts as $post) {
          setup_postdata($post);
          get_template_part('parts/components/feature');
        }
        ?>
      <a class="feature__detail" href="<?php echo get_post_type_archive_link('feature'); ?>">特集を全て見る</a>
      </div><!-- .container -->
    </section><!-- #feature -->
