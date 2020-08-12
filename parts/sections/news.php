    <section id="news" class="news">
      <h2 class="news__heading">news</h2>
      <div class="cols">
        <div class="cols__container">
          <?php
          $posts = get_posts([
            'posts_per_page' => 2,
            'post_type' => 'post'
          ]);
          foreach ($posts as $post) {
            setup_postdata($post);
            get_template_part('parts/components/cols');
          }
          ?>
        </div>
      </div><!-- .cols -->
    </section><!-- .news -->
