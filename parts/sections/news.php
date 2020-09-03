    <section id="news" class="news">
      <h2 class="news__heading">最新情報</h2>
      <p class="news__text">日々の暮らしやイベント情報などを綴っています。</p>
      <div class="lists">
        <?php
        $posts = get_posts([
          'posts_per_page' => 2,
          'post_type' => ['post']
        ]);
        foreach ($posts as $post) {
          setup_postdata($post);
          get_template_part('parts/components/lists');
        }
        ?>
      </div><!-- .lists -->
    </section><!-- .news -->
