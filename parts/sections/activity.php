    <section id="activity" class="activity">
      <h2 class="activity__heading">
        <div class="activity__heading-inner">activity<span class="heading-dec"></span></div>
      </h2>
      <div class="one-col">
        <?php
        $posts = get_posts([
          'posts_per_page' => 1,
          'include' => 18,
          'post_type' => 'page'
        ]);
        foreach ($posts as $post) {
          setup_postdata($post);
          get_template_part('parts/components/one-col');
        }
        ?>
      </div><!-- .one-col -->
    </section><!-- .activity -->
