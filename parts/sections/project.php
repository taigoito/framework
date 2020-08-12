    <section id="project" class="project">
      <h2 class="project__heading">project</h2>
      <div class="cards">
        <div class="cards__container">
          <?php
          $posts = get_posts([
            'posts_per_page' => 4,
            'include' => [12, 13, 14, 15],
            'post_type' => 'page'
          ]);
          foreach ($posts as $post) {
            setup_postdata($post);
            get_template_part('parts/components/cards');
          }
          ?>
        </div>
      </div><!-- .cards -->
    </section><!-- .project -->
