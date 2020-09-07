    <section id="news" class="news">
      <h2 class="news__heading">
        <div class="news__heading-inner">news<span class="heading-dec"></span></div>
      </h2>
      <div class="info">
        <ul class="info__list">
          <?php
          $posts = get_posts([
            'posts_per_page' => 5,
            'post_type' => 'post'
          ]);
          foreach ($posts as $post) {
            setup_postdata($post);
            get_template_part('parts/components/info');
          }
          ?>
        </ul>
      </div><!-- .info -->
    </section><!-- .news -->
