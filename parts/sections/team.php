    <section id="team" class="team">
      <h2 class="team__heading">team<span class="heading-dec"></span></h2>
      <div class="members">
        <?php
        $posts = get_posts([
          'posts_per_page' => 5,
          'include' => [102, 103],
          'order' => 'asc',
          'post_type' => 'page'
        ]);
        foreach ($posts as $post) {
          setup_postdata($post);
          get_template_part('parts/components/members');
        }
        ?>
      </div><!-- .members -->
    </section><!-- .team -->
