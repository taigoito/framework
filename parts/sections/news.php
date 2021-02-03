    <section id="news" class="news">
      <h2 class="news__heading">版画ゆうびん</h2>
      <div class="lists">
        <?php
        $posts = get_posts([
          'posts_per_page' => 5,
          'post_type' => ['post']
        ]);
        foreach ($posts as $post) {
          setup_postdata($post);
          get_template_part('parts/components/lists');
        }
        ?>
        <a class="news__detail" href="<?php echo get_post_type_archive_link('post'); ?>">版画ゆうびんを全て見る</a>
      </div><!-- .lists -->
    </section><!-- .news -->
