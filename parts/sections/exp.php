    <section id="exp" class="exp">
      <h2 class="exp__heading">版画教室</h2>
      <div class="one-col">
        <?php
        $posts = get_posts([
          'posts_per_page' => 1,
          'include' => 21,
          'post_type' => 'page'
        ]);
        foreach ($posts as $post) {
          setup_postdata($post);
          get_template_part('parts/components/one-col');
        }
        ?>
      </div><!-- .one-col -->
    </section><!-- .exp -->
