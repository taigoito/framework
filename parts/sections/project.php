    <section id="project" class="project">
      <h2 class="project__heading">project<span class="heading-dec"></span></h2>
      <div class="lists">
        <?php
        $posts = get_posts([
          'posts_per_page' => 4,
          'include' => [12, 13, 14, 15],
          'order' => 'asc',
          'post_type' => 'page'
        ]);
        foreach ($posts as $post) {
          setup_postdata($post);
          get_template_part('parts/components/projects');
        }
        ?>
      </div><!-- .lists -->
    </section><!-- .project -->
