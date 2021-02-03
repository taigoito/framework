    <section id="profile" class="profile">
      <h2 class="profile__heading">プロフィール</h2>
      <div class="one-col">
        <?php
        $posts = get_posts([
          'posts_per_page' => 1,
          'include' => 26,
          'post_type' => 'page'
        ]);
        foreach ($posts as $post) {
          setup_postdata($post);
          get_template_part('parts/components/one-col-os');
        }
        ?>
      </div><!-- .one-col -->
    </section><!-- .profile -->
